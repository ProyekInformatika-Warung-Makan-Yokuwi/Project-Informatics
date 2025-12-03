<?php
// Script to fix database structure
// Run this once to update your database

require 'app/Config/Database.php';

try {
    $db = \Config\Database::connect();

    echo "🔧 Starting database fix...\n";

    // Check if waktuPemesanan column exists
    $query = $db->query('DESCRIBE pesanan');
    $columns = $query->getResult();
    $columnNames = array_column($columns, 'Field');

    if (!in_array('waktuPemesanan', $columnNames)) {
        echo "📝 Adding waktuPemesanan column to pesanan table...\n";
        $db->query("ALTER TABLE `pesanan` ADD `waktuPemesanan` TIME NULL AFTER `tanggalPemesanan`;");
        echo "✅ waktuPemesanan column added successfully!\n";
    } else {
        echo "✅ waktuPemesanan column already exists\n";
    }

    // Check if notifikasi table exists
    $tables = $db->listTables();
    if (!in_array('notifikasi', $tables)) {
        echo "📝 Creating notifikasi table...\n";

        $db->query("CREATE TABLE `notifikasi` (
          `idNotif` int(11) NOT NULL AUTO_INCREMENT,
          `idPesanan` int(11) NOT NULL,
          `tipeNotifikasi` varchar(50) NOT NULL DEFAULT 'payment_confirmation',
          `status` enum('pending','done','ignored') NOT NULL DEFAULT 'pending',
          `ditujukanUntuk` varchar(50) NOT NULL DEFAULT 'admin',
          `waktuDibuat` timestamp NOT NULL DEFAULT current_timestamp(),
          PRIMARY KEY (`idNotif`),
          KEY `idPesanan` (`idPesanan`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");

        // Add foreign key constraint
        $db->query("ALTER TABLE `notifikasi`
          ADD CONSTRAINT `notifikasi_fk_pesanan` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`) ON DELETE CASCADE ON UPDATE CASCADE;");

        echo "✅ notifikasi table created successfully!\n";
    } else {
        echo "✅ notifikasi table already exists\n";
    }

    // Check if notifications exist for pending orders
    $pendingOrders = $db->table('pesanan')
        ->where('statusPembayaran', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)')
        ->get()
        ->getResultArray();

    $existingNotifications = $db->table('notifikasi')
        ->whereIn('idPesanan', array_column($pendingOrders, 'idPesanan'))
        ->countAllResults();

    if ($existingNotifications == 0 && !empty($pendingOrders)) {
        echo "📝 Inserting notifications for pending orders...\n";

        foreach ($pendingOrders as $order) {
            $db->table('notifikasi')->insert([
                'idPesanan' => $order['idPesanan'],
                'tipeNotifikasi' => 'payment_confirmation',
                'status' => 'pending',
                'ditujukanUntuk' => 'admin',
                'waktuDibuat' => date('Y-m-d H:i:s')
            ]);
        }

        echo "✅ Notifications inserted for " . count($pendingOrders) . " pending orders!\n";
    } else {
        echo "✅ Notifications already exist for pending orders\n";
    }

    echo "\n🎉 Database fix completed successfully!\n";
    echo "You can now test the payment system and notifications.\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
?>

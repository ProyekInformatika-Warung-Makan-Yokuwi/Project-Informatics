<?php
require 'vendor/autoload.php';

try {
    $db = \Config\Database::connect();

    // Check table structure for pesanan
    $query = $db->query('DESCRIBE pesanan');
    $result = $query->getResult();

    echo "Table structure for pesanan:\n";
    foreach($result as $row) {
        echo $row->Field . ' - ' . $row->Type . "\n";
    }

    echo "\n";

    // Check latest order
    $latestOrder = $db->query('SELECT * FROM pesanan ORDER BY idPesanan DESC LIMIT 1')->getRow();
    if ($latestOrder) {
        echo "Latest order:\n";
        echo "ID: " . $latestOrder->idPesanan . "\n";
        echo "Date: " . $latestOrder->tanggalPemesanan . "\n";
        echo "Time: " . ($latestOrder->waktuPemesanan ?? 'NULL') . "\n";
        echo "Customer: " . $latestOrder->namaPelanggan . "\n";
    } else {
        echo "No orders found\n";
    }

    echo "\n";

    // Check if notifications table exists
    $tables = $db->listTables();
    if (in_array('notifications', $tables)) {
        echo "Notifications table exists.\n";

        // Check table structure for notifications
        $query = $db->query('DESCRIBE notifications');
        $result = $query->getResult();

        echo "Table structure for notifications:\n";
        foreach($result as $row) {
            echo $row->Field . ' - ' . $row->Type . "\n";
        }
    } else {
        echo "Notifications table does not exist. Creating it now...\n";

        // Create notifications table
        $db->query("CREATE TABLE notifications (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            message TEXT NOT NULL,
            is_read TINYINT(1) NOT NULL DEFAULT 0,
            created_at DATETIME NOT NULL,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

        echo "Notifications table created successfully!\n";

        // Verify table was created
        $tables = $db->listTables();
        if (in_array('notifications', $tables)) {
            echo "Table creation verified.\n";

            // Check table structure
            $query = $db->query('DESCRIBE notifications');
            $result = $query->getResult();

            echo "Table structure for notifications:\n";
            foreach($result as $row) {
                echo $row->Field . ' - ' . $row->Type . "\n";
            }
        } else {
            echo "Failed to create notifications table.\n";
        }
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

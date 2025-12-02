<?php
require 'vendor/autoload.php';

try {
    $db = \Config\Database::connect();

    // Check table structure
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

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

<?php
require 'vendor/autoload.php';

try {
    $db = \Config\Database::connect();

    // Test basic connection
    echo "Database connected successfully!\n";

    // List all tables
    $tables = $db->listTables();
    echo "Tables in database: " . implode(', ', $tables) . "\n";

    // Check if notifications table exists
    if (in_array('notifications', $tables)) {
        echo "✅ Notifications table exists!\n";

        // Try to insert a test record
        $result = $db->table('notifications')->insert([
            'message' => 'Test notification',
            'is_read' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if ($result) {
            echo "✅ Successfully inserted test notification!\n";
            $insertId = $db->insertID();
            echo "Insert ID: $insertId\n";

            // Try to read it back
            $notification = $db->table('notifications')->where('id', $insertId)->get()->getRow();
            if ($notification) {
                echo "✅ Successfully read notification: " . $notification->message . "\n";
            }

            // Clean up - delete test record
            $db->table('notifications')->where('id', $insertId)->delete();
            echo "✅ Test notification deleted\n";
        } else {
            echo "❌ Failed to insert notification\n";
        }
    } else {
        echo "❌ Notifications table does not exist!\n";

        // Try to create it
        echo "Creating notifications table...\n";
        $db->query("CREATE TABLE notifications (
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            message TEXT NOT NULL,
            is_read TINYINT(1) NOT NULL DEFAULT 0,
            created_at DATETIME NOT NULL,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

        echo "Table created. Please run this script again to test.\n";
    }

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}

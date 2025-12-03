-- Fix database structure for waktuPemesanan column
-- Run this SQL script in phpMyAdmin or MySQL command line

-- Drop old columns and add new waktuPemesanan column
ALTER TABLE `pesanan` DROP COLUMN `tanggalPemesanan`;
ALTER TABLE `pesanan` DROP COLUMN `waktuPemesanan`;
ALTER TABLE `pesanan` ADD `waktuPemesanan` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `nomorTelepon`;

-- Create notifikasi table if it doesn't exist
CREATE TABLE IF NOT EXISTS `notifikasi` (
  `idNotif` int(11) NOT NULL AUTO_INCREMENT,
  `idPesanan` int(11) NOT NULL,
  `tipeNotifikasi` varchar(50) NOT NULL DEFAULT 'payment_confirmation',
  `status` enum('pending','done','ignored') NOT NULL DEFAULT 'pending',
  `ditujukanUntuk` varchar(50) NOT NULL DEFAULT 'admin',
  `waktuDibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idNotif`),
  KEY `idPesanan` (`idPesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Add foreign key constraint (only if table was just created)
SET @table_exists = (SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = DATABASE() AND table_name = 'notifikasi');
SET @constraint_exists = (SELECT COUNT(*) FROM information_schema.key_column_usage WHERE table_schema = DATABASE() AND table_name = 'notifikasi' AND constraint_name = 'notifikasi_fk_pesanan');

SET @sql = IF(@table_exists = 1 AND @constraint_exists = 0,
  'ALTER TABLE `notifikasi` ADD CONSTRAINT `notifikasi_fk_pesanan` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`) ON DELETE CASCADE ON UPDATE CASCADE;',
  'SELECT "Foreign key constraint already exists or table does not exist" as message;'
);

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Note: Notifications will be inserted automatically by the PHP script based on pending orders
-- No need to manually insert here as it will be handled dynamically

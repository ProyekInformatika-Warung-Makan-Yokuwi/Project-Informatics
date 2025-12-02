-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2025 at 02:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pi_yokuwi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','pemilik') DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'Carlo', 'carlo@gmail.com', '$2y$10$IJyaqNL8w/2Z1eLgBP/5eewDMCr6dgoE08Y4tUO5nLe70WUmbYgLa', 'admin'),
(2, 'dea', 'deanaisela@gmail.com', '$2y$10$C0aIsETA2gMA7fXvDs5RX.EWdNsLQYkm7Wt3Kjei1ri/HWWf1DAUy', 'admin'),
(3, 'Ardi', 'aryamukti@gmail.com', 'admin', 'admin'),
(4, 'panii', 'vinsensia@gmail.com', 'admin', 'admin'),
(5, 'Yokuwi', 'yokuwi@gmail.com', '$2y$10$uk9i2TTvbEmgGFmG5p.MReknqrpY7bhpRrSE5Ix7PqQLwUyMEZcO2', 'pemilik'),
(9, 'oscar', 'oscar@gmail', '$2y$10$rtvUewSqNxrypUMZu6BCf.8Bhjp2qoJZskJyOFBQXFNBQFSYRA6yG', 'admin'),
(10, 'Yokuwi01', 'yokuwi01@gmail.com', '$2y$10$hFNhAiB9/58xmFnoa61CquCAUKaPHQuLTOn3h5R0IGbUtHr064/t.', 'pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `idPesanan` int(11) DEFAULT NULL,
  `idMenu` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `hargaTransaksi` decimal(12,2) NOT NULL,
  `subTotal` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpesanan`
--

INSERT INTO `detailpesanan` (`idPesanan`, `idMenu`, `jumlah`, `hargaTransaksi`, `subTotal`) VALUES
(1, 4, 1, 9000.00, 9000.00),
(2, 4, 1, 9000.00, 9000.00),
(3, 2, 1, 2000.00, 2000.00),
(4, 1, 1, 3000.00, 3000.00),
(5, 3, 1, 2000.00, 2000.00),
(6, 1, 1, 3000.00, 3000.00),
(7, 3, 1, 2000.00, 2000.00),
(8, 1, 1, 3000.00, 3000.00),
(9, 2, 1, 2000.00, 2000.00),
(10, 2, 1, 2000.00, 2000.00),
(11, 1, 1, 3000.00, 3000.00),
(12, 1, 1, 3000.00, 3000.00),
(13, 3, 1, 2000.00, 2000.00),
(14, 3, 1, 2000.00, 2000.00),
(15, 2, 1, 2000.00, 2000.00),
(16, 2, 1, 2000.00, 2000.00),
(17, 2, 1, 2000.00, 2000.00),
(18, 2, 1, 2000.00, 2000.00),
(19, 2, 1, 2000.00, 2000.00),
(19, 4, 1, 9000.00, 9000.00),
(20, 3, 1, 2000.00, 2000.00),
(20, 4, 1, 9000.00, 9000.00),
(21, 2, 1, 2000.00, 2000.00),
(21, 3, 1, 2000.00, 2000.00),
(22, 2, 1, 2000.00, 2000.00),
(22, 3, 1, 2000.00, 2000.00),
(23, 2, 1, 2000.00, 2000.00),
(23, 33, 1, 5000.00, 5000.00),
(24, 2, 1, 2000.00, 2000.00),
(25, 2, 1, 2000.00, 2000.00),
(26, 35, 1, 1000.00, 1000.00),
(27, 2, 1, 2000.00, 2000.00),
(27, 3, 1, 2000.00, 2000.00),
(28, 2, 3, 2000.00, 6000.00),
(29, 3, 1, 2000.00, 2000.00),
(30, 26, 1, 14000.00, 14000.00),
(31, 1, 1, 3000.00, 3000.00),
(32, 15, 1, 3000.00, 3000.00),
(33, 3, 1, 2000.00, 2000.00),
(34, 13, 1, 5000.00, 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `namaMenu` varchar(100) NOT NULL,
  `hargaMenu` decimal(12,2) NOT NULL,
  `gambar` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `namaMenu`, `hargaMenu`, `gambar`) VALUES
(1, 'Nasi Putih', 3000.00, 'nasi_putih.png'),
(2, 'Sayur', 2000.00, 'sayur.png'),
(3, 'Tempe/Tahu Goreng', 2000.00, 'tempe_tahu.png'),
(4, 'Indomie Kuah Telor', 9000.00, 'indomie_kuah_telor.png'),
(5, 'Indomie Goreng Telor', 9000.00, 'indomie_goreng_telor.png'),
(6, 'Ampela Hati', 6000.00, 'ampela_hati.png'),
(13, 'Telur Crispy', 5000.00, 'telur_crispy.png'),
(15, 'Kol  Goreng', 3000.00, '1764589111_1e9d097602d4a9062b0b.png'),
(16, 'Terong Goreng', 3000.00, '1764588975_fe8eb93393a759442c79.png'),
(19, 'Nasi Lele Goreng Kremes', 12000.00, 'nasi_lele_goreng_kremes.png'),
(21, 'Nasi Ikan Nila Kremes', 13000.00, '1764589291_367872950c0b582df3c5.png'),
(22, 'Nasi Ayam Goreng Rempah', 13000.00, 'nasi_ayam_goreng_rempah.png'),
(23, 'Nasi Ayam Goreng Kremes', 13000.00, '1764591879_84fa4766efc9378cdb75.png'),
(25, 'Nasi Ayam Saos Asam Manis', 14000.00, '1764589525_5f71c70bdf354991db0e.png'),
(26, 'Nasi Ayam Saos Mentega', 14000.00, '1764589779_ad186bf380c8faaae49c.png'),
(27, 'Nasi Ayam Geprek', 10000.00, '1764590064_f3bbbf1e2d55e6d69c61.png'),
(28, 'Nasi Rica Rica', 12000.00, '1764589575_e99e8ac4762a183fc124.png'),
(30, 'Nasi Soto Ayam Telor', 12000.00, '1764589735_ab0dfecb72070d1f2f8b.png'),
(31, 'Indomie Goreng Telor', 9000.00, '1764590310_26af57b60f49d2cfc403.png'),
(32, 'Es Jeruk', 4000.00, '1764591568_712f5b88ddd129068040.png'),
(33, 'Kopi Hitam', 5000.00, '1764591986_97e15cdf2d35b7f0b7c5.png'),
(34, 'Es Teh', 3000.00, '1764592036_58f7ed2d083cd17bb4a6.png'),
(35, 'Air Es', 1000.00, '1764592062_c5020fc41574c8c7e7f4.png'),
(36, 'Es Susu Coklat', 5000.00, '1764592090_4973dc83a8eb0264808e.png'),
(37, 'Air Mineral', 1000.00, '1764592117_3fa74aea4bc46da6aea0.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '20241202133700', 'App\\Database\\Migrations\\AddPhoneToPesanan', 'default', 'App', 1764683018, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idPesanan` int(11) NOT NULL,
  `namaPelanggan` varchar(100) NOT NULL,
  `nomorTelepon` varchar(15) DEFAULT NULL,
  `tanggalPemesanan` date NOT NULL,
  `metodePembayaran` varchar(50) NOT NULL,
  `statusPembayaran` varchar(50) NOT NULL,
  `total` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idPesanan`, `namaPelanggan`, `nomorTelepon`, `tanggalPemesanan`, `metodePembayaran`, `statusPembayaran`, `total`) VALUES
(1, 'Pelanggan', NULL, '2025-11-06', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 9000.00),
(2, 'Pelanggan', NULL, '2025-11-06', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 9000.00),
(3, 'Pelanggan', NULL, '2025-11-06', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(4, 'Pelanggan', NULL, '2025-11-06', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 3000.00),
(5, 'Pelanggan', NULL, '2025-11-06', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(6, 'Pelanggan', NULL, '2025-11-07', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 3000.00),
(7, 'Pelanggan', NULL, '2025-11-11', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(8, 'Pelanggan', NULL, '2025-11-11', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 3000.00),
(9, 'Pelanggan', NULL, '2025-11-11', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(10, 'Pelanggan', NULL, '2025-11-11', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(11, 'Pelanggan', NULL, '2025-11-11', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 3000.00),
(12, 'Pelanggan', NULL, '2025-11-11', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 3000.00),
(13, 'Pelanggan', NULL, '2025-12-01', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(14, 'Pelanggan', NULL, '2025-12-01', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(15, 'Pelanggan', NULL, '2025-12-01', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(16, 'Pelanggan', NULL, '2025-12-01', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(17, 'Pelanggan', NULL, '2025-12-01', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(18, 'Pelanggan', NULL, '2025-12-01', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(19, 'Pelanggan', NULL, '2025-12-01', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 11000.00),
(20, 'Pelanggan', NULL, '2025-12-01', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 11000.00),
(21, 'Pelanggan', NULL, '2025-12-01', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 4000.00),
(22, 'Pelanggan', NULL, '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 4000.00),
(23, 'Pelanggan', NULL, '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 7000.00),
(24, 'Pelanggan', NULL, '2025-12-02', 'qris', 'Lunas (Pembayaran QRIS berhasil)', 2000.00),
(25, 'Pelanggan', NULL, '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(26, 'Pelanggan', NULL, '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 1000.00),
(27, 'Pelanggan', NULL, '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 4000.00),
(28, 'Pelanggan', NULL, '2025-12-02', 'qris', 'Lunas (Pembayaran QRIS berhasil)', 6000.00),
(29, 'Pelanggan', NULL, '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(30, 'Pelanggan', NULL, '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 14000.00),
(31, 'Pelanggan', NULL, '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 3000.00),
(32, 'Dimas', '081331630803', '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 3000.00),
(33, 'Dimas', '081331630803', '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 2000.00),
(34, 'Carlo', '081331630803', '2025-12-02', 'tunai', 'Menunggu Konfirmasi Admin (Pembayaran Tunai)', 5000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD KEY `idPesanan` (`idPesanan`),
  ADD KEY `idMenu` (`idMenu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idPesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD CONSTRAINT `detailpesanan_ibfk_1` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpesanan_ibfk_2` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

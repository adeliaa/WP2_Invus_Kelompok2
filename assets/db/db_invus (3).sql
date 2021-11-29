-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 05:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_invus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `kondisi` enum('Berfungsi','Rusak','Hilang','') NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `stok`, `kondisi`, `gambar`) VALUES
(1, 'Laptop', 20, 'Berfungsi', 'laptop1.jpg'),
(2, 'proyektor', 19, 'Berfungsi', 'proyektor11.jpg'),
(3, 'kamera', 18, 'Berfungsi', 'Harga_Kamera_Sony.jpg'),
(4, 'Printer', 35, 'Berfungsi', 'printer_(1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `status` enum('Di booking','Di pinjam','Kembali','Penggantian Barang','') NOT NULL,
  `kondisi_saat_pinjam` enum('Berfungsi','Rusak','Hilang','') NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `kondisi_kembali` enum('Berfungsi','Rusak','Hilang','') DEFAULT NULL,
  `denda` varchar(20) DEFAULT NULL,
  `biaya_penggantian_barang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `id_user`, `id_barang`, `jumlah_pinjam`, `tanggal_pinjam`, `status`, `kondisi_saat_pinjam`, `tanggal_pengembalian`, `tanggal_kembali`, `kondisi_kembali`, `denda`, `biaya_penggantian_barang`) VALUES
(1, 2, 1, 1, '2021-11-28', 'Kembali', 'Berfungsi', '2021-11-29', '2021-11-29', 'Berfungsi', '0', '0'),
(2, 2, 2, 1, '2021-11-28', 'Di pinjam', 'Berfungsi', '2021-11-29', NULL, NULL, NULL, NULL),
(3, 2, 3, 1, '2021-11-28', 'Di pinjam', 'Berfungsi', '2021-11-29', NULL, NULL, NULL, NULL),
(4, 3, 3, 1, '2021-11-28', 'Di booking', 'Berfungsi', '2021-11-28', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Admin','Peminjam','','') NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `no_telp` char(13) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `level`, `nama_peminjam`, `no_telp`, `kelas`, `alamat`, `image`) VALUES
(1, 'Admin', '$2y$10$wnxghNQ6f5La5V797XZjv.OJFLeoCFyMaQ.VPwtxrT11COEVpF0k2', 'Admin', 'Admin', NULL, NULL, NULL, ''),
(2, 'Adeliaa', '$2y$10$hvEYTRmd2qZsVhRWKB9.JOUusHu4l8t5t.9a0J9UkPKlP/P/g8KMq', 'Peminjam', 'Farah Adelia Putri', '081383231104', '19.3B.05', 'pondok ungu permai D18', 'pro1638113972.jpg'),
(3, 'Calee', '$2y$10$oSONpb4wiE1H4zOz2JdE..xmSUfcksa8q/7.TzsEmDiE.uh.dh2K2', 'Peminjam', 'Cale Henituse', '081383231104', '19.3B.05', 'pondok ungu permai D18', 'pro1638115753.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_laporan`
-- (See below for the actual view)
--
CREATE TABLE `view_laporan` (
`id_peminjaman` int(11)
,`id_user` int(11)
,`username` varchar(20)
,`nama_peminjam` varchar(50)
,`kelas` varchar(10)
,`tanggal_pinjam` date
,`tanggal_pengembalian` date
,`tanggal_kembali` date
,`id_barang` int(11)
,`nama_barang` varchar(50)
,`jumlah_pinjam` int(11)
,`kondisi_saat_pinjam` enum('Berfungsi','Rusak','Hilang','')
,`Kondisi_kembali` enum('Berfungsi','Rusak','Hilang','')
,`denda` varchar(20)
,`biaya_penggantian_barang` varchar(20)
,`status` enum('Di booking','Di pinjam','Kembali','Penggantian Barang','')
);

-- --------------------------------------------------------

--
-- Structure for view `view_laporan`
--
DROP TABLE IF EXISTS `view_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan`  AS SELECT `p`.`id_peminjaman` AS `id_peminjaman`, `p`.`id_user` AS `id_user`, `u`.`username` AS `username`, `u`.`nama_peminjam` AS `nama_peminjam`, `u`.`kelas` AS `kelas`, `p`.`tanggal_pinjam` AS `tanggal_pinjam`, `p`.`tanggal_pengembalian` AS `tanggal_pengembalian`, `p`.`tanggal_kembali` AS `tanggal_kembali`, `p`.`id_barang` AS `id_barang`, `b`.`nama_barang` AS `nama_barang`, `p`.`jumlah_pinjam` AS `jumlah_pinjam`, `p`.`kondisi_saat_pinjam` AS `kondisi_saat_pinjam`, `p`.`kondisi_kembali` AS `Kondisi_kembali`, `p`.`denda` AS `denda`, `p`.`biaya_penggantian_barang` AS `biaya_penggantian_barang`, `p`.`status` AS `status` FROM ((`tb_user` `u` join `tb_peminjaman` `p` on(`u`.`id` = `p`.`id_user`)) join `tb_barang` `b` on(`b`.`id_barang` = `p`.`id_barang`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_peminjam` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_peminjaman_ibfk_4` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

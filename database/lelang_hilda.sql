-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 08:37 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelang_hilda`
--

-- --------------------------------------------------------

--
-- Table structure for table `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(1, 10, 29, 6, 8000),
(2, 10, 29, 3, 9000),
(3, 10, 29, 3, 10000000),
(4, 12, 37, 3, 20000),
(5, 12, 37, 3, 30000),
(6, 11, 28, 7, 13000000),
(7, 13, 38, 7, 13000000),
(8, 13, 38, 1, 15000000),
(9, 14, 29, 7, 7500000),
(10, 14, 29, 7, 8000000),
(11, 15, 39, 8, 11000000),
(12, 17, 42, 7, 9500000),
(13, 17, 42, 1, 10000000),
(14, 18, 44, 7, 35000000),
(15, 18, 44, 1, 35500000),
(16, 19, 44, 10, 35000000),
(17, 19, 44, 1, 34000100),
(18, 20, 38, 1, 12500000),
(19, 20, 38, 11, 50000000),
(20, 16, 41, 11, 2147483647),
(21, 16, 41, 12, 80000000),
(22, 20, 38, 14, 2147483647),
(23, 22, 58, 14, 500000000),
(24, 23, 59, 14, 2147483647),
(25, 24, 60, 14, 16000000);

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(50) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(20) NOT NULL,
  `status_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `keterangan`, `photo`, `tgl`, `harga_awal`, `status_barang`) VALUES
(28, 'Dior White Diamond', 'New', 'dr1.JPG', '2023-02-15', 15000000, 'Terjual'),
(29, 'Channel Glamour Vibe', 'New Item', 'gc11.jpg', '2023-02-16', 9000000, ''),
(37, 'Louis Voition', 'New', 'lv5.jpg', '2023-02-16', 10000000, ''),
(38, 'LV', 'LV yyy', 'download4.jpg', '2023-02-12', 12000000, 'dilelang'),
(39, 'tas branded', 'keluaran paris', 'download6.jpg', '2023-02-23', 10000000, 'terjual'),
(41, 'Louis Voition', 'New', 'lv51.jpg', '2023-02-21', 7000000, 'terjual'),
(42, 'Channel Mamba', 'New', 'cl3.jpg', '2023-02-18', 9000000, 'terjual'),
(43, 'Tas Channel Type F', 'New Item', 'cl41.jpg', '2023-02-22', 25000000, 'terjual'),
(44, 'Dior Type G', 'New Item', 'dr6.JPG', '2023-02-22', 34000000, 'terjual'),
(50, 'okkk', 'ewufui', 'lv65.jpg', '2222-02-22', 9876, 'terjual'),
(55, 'tas import', 'ori', 'download.jpeg', '2023-03-07', 20000000, 'terjual'),
(56, 'luisvaitton', 'original', 'images.jpeg', '2023-03-07', 2147483647, 'terjual'),
(57, ' tas LV vuitton caputines', 'ori', 'images_(1).jpeg', '2023-03-07', 250000000, 'terjual'),
(58, 'caputines', 'oriii', 'images_(1)1.jpeg', '2023-03-07', 250000000, 'terjual'),
(59, 'tas channel ori', 'new ', 'b710834122db6bf2efffbbf0be123ecc.jpeg', '2023-03-07', 25000000, 'terjual'),
(60, 'sophie martin paris', 'new ', 'd51f0c89e6858d1bc4a2d14b189ce07b.jpeg', '2023-03-07', 15000000, 'terjual');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lelang`
--

CREATE TABLE `tb_lelang` (
  `id_lelang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` datetime NOT NULL,
  `harga_akhir` int(20) UNSIGNED DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL,
  `tgl_akhir` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lelang`
--

INSERT INTO `tb_lelang` (`id_lelang`, `nama_barang`, `id_barang`, `tgl_lelang`, `harga_akhir`, `id_user`, `id_petugas`, `status`, `tgl_akhir`) VALUES
(10, '', 37, '2023-02-22 06:16:19', 10000000, 3, 3, 'ditutup', NULL),
(11, '', 28, '2023-02-25 06:17:19', 13000000, 7, 9, 'ditutup', NULL),
(12, '', 37, '2023-02-10 19:24:00', 30000, 3, 5, 'ditutup', NULL),
(13, '', 38, '2023-05-02 12:00:00', 15000000, 1, 2, 'ditutup', NULL),
(14, '', 29, '2023-02-21 12:00:00', 8000000, 7, 3, 'ditutup', NULL),
(15, '', 39, '2023-02-23 21:25:00', 11000000, 8, 3, 'ditutup', NULL),
(16, '', 41, '2023-02-22 12:00:00', 2147483647, 11, 9, 'ditutup', NULL),
(17, '', 42, '2023-02-18 09:00:00', 10000000, 1, 12, 'ditutup', NULL),
(18, '', 44, '2023-02-22 04:56:00', 35500000, 1, 12, 'ditutup', NULL),
(19, '', 44, '2023-02-22 08:07:00', 35000000, 10, 13, 'ditutup', NULL),
(20, '', 38, '2023-02-22 08:20:00', 2147483647, 14, 9, 'ditutup', '2023-03-07 15:30:00'),
(21, '', 50, '2023-03-07 11:13:00', NULL, NULL, 20, 'ditutup', '2023-03-07 11:38:00'),
(22, '', 58, '2023-03-07 11:17:00', 500000000, 14, 20, 'ditutup', '2023-03-18 11:17:00'),
(23, '', 59, '2023-03-07 12:11:00', 2147483647, 14, 20, 'ditutup', '2023-03-20 12:11:00'),
(24, '', 60, '2023-03-07 14:14:00', NULL, NULL, 20, 'dibuka', '2023-03-14 14:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas','masyarakat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas'),
(3, 'masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masyarakat`
--

CREATE TABLE `tb_masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(125) NOT NULL,
  `telp` varchar(25) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masyarakat`
--

INSERT INTO `tb_masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`, `id_level`) VALUES
(1, 'Hilyatus zahro', 'hilya', '202cb962ac59075b964b07152d234b70', '082273615476', 3),
(2, 'shinta niasari', 'shinta', '202cb962ac59075b964b07152d234b70', '085567871123', 3),
(3, 'yaya', 'yaya', '202cb962ac59075b964b07152d234b70', '0867876765456', 3),
(4, 'admin2', 'admin2', '202cb962ac59075b964b07152d234b70', '093738928898', 3),
(5, 'popo', 'popo', '202cb962ac59075b964b07152d234b70', '0928228262826', 3),
(6, 'dinn', 'dinn', '202cb962ac59075b964b07152d234b70', '086567876567', 3),
(7, 'dindun', 'dindun', 'ac9b4e0b6a21758534db2a6324d34a54', '098989786765', 3),
(8, 'discaa', 'discaa', '827ccb0eea8a706c4c34a16891f84e7b', '089765432123', 3),
(9, 'Bianca', 'bianca', 'ac9b4e0b6a21758534db2a6324d34a54', '085678987654', 3),
(10, 'Dinda Putri Aisyah', 'dindaputriaisyah', 'ac9b4e0b6a21758534db2a6324d34a54', '085204576924', 3),
(11, 'hilda nurafifaa', 'hildaa', '202cb962ac59075b964b07152d234b70', '098765432112', 3),
(12, 'ekaafafafafaa', 'eka', '202cb962ac59075b964b07152d234b70', '123456789012', 3),
(13, 'ayu', 'ayu', '202cb962ac59075b964b07152d234b70', '085231456786', 3),
(14, 'afifaa', 'ifaa', 'ad31b478525413f0b1b1d8bf0aebeb7c', '123456789009', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(2, 'diva', 'petugas', 'd9b1d7db4cd6e70935368a1efb10e377', 2),
(3, 'Edi Surya', 'Edi', '8420c2405727e24f00126fd965f03655', 1),
(5, 'herni wati', 'herni', 'd9b1d7db4cd6e70935368a1efb10e377', 2),
(9, 'dawang', 'dawang', '202cb962ac59075b964b07152d234b70', 2),
(12, 'dinda', 'adinda', '8be9ce878be749516a25a13d228e8e26', 2),
(13, 'Discaaa', 'petugas', 'feab25394e85c96c4c2ddfbbcb073f65', 2),
(17, 'Dyah Barret', 'Dyah', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(19, 'hilda', 'hildaa', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(20, 'Alfian Risqi ', 'alfian', 'caf1a3dfb505ffed0d024130f58c5cfa', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_lelang` (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_lelang`) REFERENCES `tb_lelang` (`id_lelang`),
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Constraints for table `tamu`
--
ALTER TABLE `tamu`
  ADD CONSTRAINT `tamu_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`);

--
-- Constraints for table `tb_lelang`
--
ALTER TABLE `tb_lelang`
  ADD CONSTRAINT `tb_lelang_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  ADD CONSTRAINT `tb_lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_masyarakat` (`id_user`),
  ADD CONSTRAINT `tb_lelang_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Constraints for table `tb_masyarakat`
--
ALTER TABLE `tb_masyarakat`
  ADD CONSTRAINT `tb_masyarakat_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);

--
-- Constraints for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

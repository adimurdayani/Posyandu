-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 08:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan_ibu`
--

CREATE TABLE `catatan_ibu` (
  `id` int(11) NOT NULL,
  `register_id` int(11) NOT NULL,
  `keluhan` varchar(128) NOT NULL,
  `tekanan_darah` varchar(128) NOT NULL,
  `berat_badan` varchar(128) NOT NULL,
  `umur_kehamilan` varchar(128) NOT NULL,
  `tinggi_fundus` varchar(128) NOT NULL,
  `letak_janin` varchar(128) NOT NULL,
  `denyut` varchar(128) NOT NULL,
  `kaki_bengkak` varchar(128) NOT NULL,
  `hasil_pemeriksaan` varchar(128) NOT NULL,
  `tindakan` varchar(128) NOT NULL,
  `nasihat` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catatan_ibu`
--

INSERT INTO `catatan_ibu` (`id`, `register_id`, `keluhan`, `tekanan_darah`, `berat_badan`, `umur_kehamilan`, `tinggi_fundus`, `letak_janin`, `denyut`, `kaki_bengkak`, `hasil_pemeriksaan`, `tindakan`, `nasihat`, `keterangan`, `tgl`) VALUES
(1, 3, 'Pergerakan janin kurang', '110/60', '55kg', '38 Minggu', '34cm', 'Su', '-', '-/+', '-', 'Lanjut obat dokter', '-', 'PKM BUA', '12 2021 Nov 20:17:10'),
(2, 3, 'asdfasd', 'sadfasd', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asd', '12 2021 Nov 20:16:22'),
(3, 3, 'asdfasd', 'sadfas', 'asdfasd', 'fasdfasd', 'fasdf', 'asdf', 'asdfasd', 'asdfasd', 'fasdfas', 'dfasdf', 'sdf', 'asdf', '12 2021 Nov 20:15:57'),
(4, 3, 'asdfas', 'dfasdf', 'asdfasd', 'fasdf', 'asdfasd', 'fasdf', 'asdfasd', 'fasdfasdf', 'asdf', 'asdfasd', 'fasdfasd', 'asdfa', '12 2021 Nov 20:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `tgl_kegiatan` varchar(128) NOT NULL,
  `keterangan` text NOT NULL,
  `waktu_kegiatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `kelurahan_id`, `tgl_kegiatan`, `keterangan`, `waktu_kegiatan`) VALUES
(1, 1, '2021-09-20', 'Jadwal imunisasi di Kelurahan kambo, di harapkan kepada ibu hamil untuk  datang ke lokasi Posyandu.', '08:30'),
(2, 2, '2021-11-01', 'Jadwal imunisasi di Kelurahan Latuppa, di harapkan kepada ibu hamil untuk datang ke lokasi Posyandu.', '08:30'),
(3, 3, '2021-12-09', 'Jadwal imunisasi di Kelurahan Mungkajang, di harapkan kepada ibu hamil untuk datang ke lokasi Posyandu.', '09:30'),
(4, 4, '2021-11-25', 'Jadwal imunisasi di Kelurahan Murante, di harapkan kepada ibu hamil untuk datang ke lokasi Posyandu.', '09:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `kelurahan`) VALUES
(1, 'Kambo'),
(2, 'Latuppa'),
(3, 'Mungkajang'),
(4, 'Murante');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ibu`
--

CREATE TABLE `tb_ibu` (
  `id` int(11) NOT NULL,
  `no_regis` varchar(128) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `tgl_lahir` varchar(128) NOT NULL,
  `t_lahir` varchar(128) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `pendidikan` varchar(128) NOT NULL,
  `gol_darah` varchar(128) NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `nama_suami` varchar(128) NOT NULL,
  `tgl_lahir_suami` varchar(128) NOT NULL,
  `t_lahir_suami` varchar(128) NOT NULL,
  `agama_suami` int(11) NOT NULL,
  `pendidikan_suami` varchar(128) NOT NULL,
  `pekerjaan_suami` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `regis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ibu`
--

INSERT INTO `tb_ibu` (`id`, `no_regis`, `nama_ibu`, `tgl_lahir`, `t_lahir`, `agama`, `pendidikan`, `gol_darah`, `pekerjaan`, `nama_suami`, `tgl_lahir_suami`, `t_lahir_suami`, `agama_suami`, `pendidikan_suami`, `pekerjaan_suami`, `alamat`, `regis_id`) VALUES
(1, 'S-0001', 'Erni', '1991-08-09', 'Borowa', 'Islam', 'SD', 'A', 'IRT', 'Sukriyadi', '1992-01-09', 'Borowa', 0, 'SD', 'Wiraswasta', 'Ds. Borowa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_register`
--

CREATE TABLE `tb_register` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aktivasi` int(1) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` varchar(128) NOT NULL,
  `token_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_register`
--

INSERT INTO `tb_register` (`id`, `user_id`, `aktivasi`, `nama`, `username`, `email`, `no_hp`, `password`, `created_at`, `token_id`) VALUES
(3, 2, 1, 'Adi Murdayani', 'adi', 'adimurdayani@gmail.com', '081343703057', '4d4c29d886f5fe0b50d6ddcdade8fa65cd572d14', '12 Nov 2021 19:37:01', 'eXD5X33o5Eo:APA91bF6Sm3UjpRGQSFsXMxnezCISEO2hrOEo4qngasXD3SsDRUnDrbeaOfB8tqiYBv0B0_WPJjp-aBLouHzGEzTLLos86_yHZ5bWAteWjpUAhxwtMXNZSPorPaLOgBTR3gGZcuo56-v'),
(4, 2, 0, 'Dewi astuti', 'dewi', 'dewi@gmail.com', '', 'd80bb7c61f781ee38721285fdb65a1fd6390a5a0', '12 Nov 2021 18:49:55', 'eXD5X33o5Eo:APA91bF6Sm3UjpRGQSFsXMxnezCISEO2hrOEo4qngasXD3SsDRUnDrbeaOfB8tqiYBv0B0_WPJjp-aBLouHzGEzTLLos86_yHZ5bWAteWjpUAhxwtMXNZSPorPaLOgBTR3gGZcuo56-v'),
(5, 2, 1, 'Adi', 'adi', 'adi@gmail.com', '', '74e92d137df14c2f05a571ebf2dfc75145a69045', '12 Nov 2021', 'eXD5X33o5Eo:APA91bF6Sm3UjpRGQSFsXMxnezCISEO2hrOEo4qngasXD3SsDRUnDrbeaOfB8tqiYBv0B0_WPJjp-aBLouHzGEzTLLos86_yHZ5bWAteWjpUAhxwtMXNZSPorPaLOgBTR3gGZcuo56-v');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `nama`, `email`, `username`, `password`, `user_active`) VALUES
(1, 1, 'Administrator', 'admin@gmail.com', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `nama_role`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan_ibu`
--
ALTER TABLE `catatan_ibu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ibu`
--
ALTER TABLE `tb_ibu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan_ibu`
--
ALTER TABLE `catatan_ibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_ibu`
--
ALTER TABLE `tb_ibu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_register`
--
ALTER TABLE `tb_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

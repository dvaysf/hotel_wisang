-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 08:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_wisang`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `kode_booking` varchar(256) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `check_in` time NOT NULL,
  `check_out` time NOT NULL,
  `ruangan` varchar(128) NOT NULL,
  `jumlah_orang` varchar(128) NOT NULL,
  `data_masuk` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `username`, `id_ruangan`, `kode_booking`, `tanggal_mulai`, `tanggal_selesai`, `check_in`, `check_out`, `ruangan`, `jumlah_orang`, `data_masuk`) VALUES
(1, 'asdasd', 0, '', '0000-00-00', '0000-00-00', '00:00:11', '00:00:11', '', '', '00:00:00'),
(2, 'daffa', 0, '', '2022-09-05', '2022-09-14', '00:00:00', '00:00:00', ' double-double room', 'L', '00:00:00'),
(3, 'putra', 0, '', '2022-09-03', '2022-09-09', '00:00:00', '00:00:00', ' king room', '2', '00:00:00'),
(4, 'anjay', 0, '', '2022-09-02', '2022-09-01', '00:00:00', '00:00:00', ' double-double room', '2', '00:00:00'),
(5, '', 0, '', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', '', '', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id` int(11) NOT NULL,
  `nama_kamar` varchar(256) NOT NULL,
  `fasilitas_kamar` text NOT NULL,
  `tanggal_kamar` date NOT NULL,
  `tipe_harga` int(128) NOT NULL,
  `img` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id`, `nama_kamar`, `fasilitas_kamar`, `tanggal_kamar`, `tipe_harga`, `img`) VALUES
(9, 'deluxe room', 'ada Jhon Cena', '0000-00-00', 1011010, ''),
(10, 'king room', 'ada Jhon Cena', '0000-00-00', 1000, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `level` int(3) NOT NULL,
  `email` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `no_telepon` int(12) NOT NULL,
  `status` varchar(256) NOT NULL,
  `gender` enum('P,L') NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `data_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`, `email`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `no_telepon`, `status`, `gender`, `image`, `role_id`, `is_active`, `data_created`) VALUES
(6, 'tari', '$2y$10$vgAWLzfVFtcoJNzCDk7LBegOQfWIVaEG9hz25gt3jkjByQjuSO.ga', 'mentari', 2, 'tari@gmail.com', '2022-08-31', 'Bandung', 'jl.prof yohanes', 98120938, 'pelajar', 'P,L', 'default.jpg', 3, 1, 1664082558),
(7, 'dvaysf', '$2y$10$qIvE/O0CpYyoy2DFmWLPse1WMl3sU30X5TB88oDjbsdj.DxblsaYq', 'putra', 1, 'kimochi@gmail.com', '2022-09-07', 'Yogyakarta', 'jl.prof yohanes', 2147483647, 'babu', 'P,L', 'default.jpg', 1, 1, 1664083876),
(8, 'dvaysf', '$2y$10$kjfWaTj2BHTqK90j.4xFTeYJ2DWzA1CSrZHDmKGd4/ZxCpndFcQA6', 'dafa', 3, 'dpmansyur@gmail.com', '2022-09-13', 'Yogyakarta', 'jl.prof yohanes', 2147483647, 'janda', 'P,L', 'default.jpg', 3, 1, 1664457122);

-- --------------------------------------------------------

--
-- Table structure for table `wisang_ruangan`
--

CREATE TABLE `wisang_ruangan` (
  `id` int(11) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `nama_ruangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisang_ruangan`
--
ALTER TABLE `wisang_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wisang_ruangan`
--
ALTER TABLE `wisang_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

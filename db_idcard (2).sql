-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 11:53 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_idcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `desain`
--

CREATE TABLE `desain` (
  `id_desain` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `desain` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desain`
--

INSERT INTO `desain` (`id_desain`, `nama`, `file`, `desain`) VALUES
(1, 'Default', '', 'null.png'),
(2, 'Sekolah', '', 'null.png'),
(3, 'Bola', '', 'null.png');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id_organisasi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` text NOT NULL,
  `id_desain` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `printed` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id_organisasi`, `nama`, `kode`, `id_desain`, `id_user`, `logo`, `printed`) VALUES
(1, 'Chelsea FC', '0213i82', 3, 2, '', 0),
(19, 'Barcelona FC', '234jh', 3, 2, '', 0),
(20, 'Liverpool FC', 'KlbLnwPJ', 2, 2, '', 0),
(21, 'PT Indokomas', 'dfws221g', 1, 2, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `gambar` text NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `tgl_lahir`, `alamat`, `gambar`, `level`) VALUES
(1, 'Muhammad Iqbal R', 'iqbalcakep', '202cb962ac59075b964b07152d234b70', '1998-06-28', 'Kebonagung RT/RW 001/001 Kraksaan ', 'iqbal.jpg', 'admin'),
(2, 'Nabila Annisa', 'nabila', '202cb962ac59075b964b07152d234b70', '2002-08-14', 'Kebonagung Rt/Rw 001/001 kraksaan Probolinggo', 'tim_80x801.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desain`
--
ALTER TABLE `desain`
  ADD PRIMARY KEY (`id_desain`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desain`
--
ALTER TABLE `desain`
  MODIFY `id_desain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 09:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok_gaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_gaji`
--

CREATE TABLE `data_gaji` (
  `nomorinduk_karyawan` int(4) NOT NULL,
  `nama_karyawan` varchar(35) NOT NULL,
  `jabatan_karyawan` varchar(15) NOT NULL,
  `nomorhp_karyawan` int(14) DEFAULT NULL,
  `gajipokok_karyawan` int(30) NOT NULL,
  `bonus_karyawan` int(30) DEFAULT NULL,
  `absen_karyawan` int(2) DEFAULT NULL,
  `takehome_karyawan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_gaji`
--

INSERT INTO `data_gaji` (`nomorinduk_karyawan`, `nama_karyawan`, `jabatan_karyawan`, `nomorhp_karyawan`, `gajipokok_karyawan`, `bonus_karyawan`, `absen_karyawan`, `takehome_karyawan`) VALUES
(123, 'Hilmi mantab', 'Training', 2147483647, 1500000, 0, 0, 1500000),
(433, 'Firman', 'Operator', 2147483647, 2000000, 0, 2, 1960000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_gaji`
--
ALTER TABLE `data_gaji`
  ADD PRIMARY KEY (`nomorinduk_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

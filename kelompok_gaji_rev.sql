-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 07:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
-- Table structure for table `data_karyawan`
--
CREATE DATABASE IF NOT EXISTS `kelompok_gaji` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kelompok_gaji`;


CREATE TABLE `data_karyawan` (
  `id_karyawan` int(4) NOT NULL,
  `nama_karyawan` varchar(40) NOT NULL,
  `alamat_karyawan` varchar(255) DEFAULT NULL,
  `usia_karyawan` int(2) NOT NULL,
  `jabatan_karyawan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `usia_karyawan`, `jabatan_karyawan`) VALUES
(333, 'Herman', 'asdasdasd', 12, 'Operator'),
(442, 'aksjdaksd', 'asdasdasd', 12, 'Training');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_karyawan`
--

CREATE TABLE `gaji_karyawan` (
  `id_gaji` int(4) NOT NULL,
  `nama_gaji` varchar(30) NOT NULL,
  `pokok_gaji` bigint(20) NOT NULL,
  `lembur_gaji` bigint(20) DEFAULT NULL,
  `tunjangan_gaji` bigint(20) DEFAULT NULL,
  `bonus_gaji` bigint(20) DEFAULT NULL,
  `total_gaji` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gaji_karyawan`
--

INSERT INTO `gaji_karyawan` (`id_gaji`, `nama_gaji`, `pokok_gaji`, `lembur_gaji`, `tunjangan_gaji`, `bonus_gaji`, `total_gaji`) VALUES
(44, 'ucup mantap', 3000000, 50000, 10000, 100000, 3160000),
(55, 'Andre ganteng', 40000, 0, 0, 0, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_karyawan`
--

CREATE TABLE `potongan_karyawan` (
  `id_potongan` int(4) NOT NULL,
  `nama_potongan` varchar(30) NOT NULL,
  `jamkes_potongan` bigint(20) NOT NULL,
  `pajak_potongan` bigint(20) NOT NULL,
  `izin_potongan` int(2) DEFAULT NULL,
  `alpha_potongan` int(2) DEFAULT NULL,
  `total_potongan` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `potongan_karyawan`
--

INSERT INTO `potongan_karyawan` (`id_potongan`, `nama_potongan`, `jamkes_potongan`, `pajak_potongan`, `izin_potongan`, `alpha_potongan`, `total_potongan`) VALUES
(33, 'saiful jamil', 30000, 200000, 1, 0, 230000),
(44, 'astaghfirullah', 50500, 10000, 11, 2, 140500),
(55, 'tiara', 44444, 4444, 0, 0, 48888);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `gaji_karyawan`
--
ALTER TABLE `gaji_karyawan`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `potongan_karyawan`
--
ALTER TABLE `potongan_karyawan`
  ADD PRIMARY KEY (`id_potongan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

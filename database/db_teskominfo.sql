-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 11:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_teskominfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_sampel`
--

CREATE TABLE `pemeriksaan_sampel` (
  `nomor_regis` varchar(7) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `alamat_customer` text NOT NULL,
  `tgl_regis` date NOT NULL,
  `operator_penerima` varchar(255) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan_sampel`
--

INSERT INTO `pemeriksaan_sampel` (`nomor_regis`, `nama_customer`, `alamat_customer`, `tgl_regis`, `operator_penerima`, `parameter`, `qty`, `tarif`, `jumlah`) VALUES
('R00001', 'Julian Nasution', 'Cikampek', '2023-05-24', 'Julian', 'Paket Pemeriksaan Air Minum', 1, 464000, 1),
('R00002', 'Asep Saepul', 'Desa Singaparna, Kecamatan Banda Sakti, Kota Lhoksuemawe', '2023-05-22', 'Julian Nasution', 'Paket Pemeriksaan Air Minum', 1, 464000, 464000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama`, `alamat`, `no_telp`) VALUES
(1, 'operator', 'fe96dd39756ac41b74283a9292652d366d73931f', 'Julian', 'Karawang', '08122134394');

-- --------------------------------------------------------

--
-- Table structure for table `p_sampel_air`
--

CREATE TABLE `p_sampel_air` (
  `id_air` varchar(50) NOT NULL,
  `nama_parameter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_sampel_air`
--

INSERT INTO `p_sampel_air` (`id_air`, `nama_parameter`) VALUES
('1', 'Paket Pemeriksaaan Air Minum');

-- --------------------------------------------------------

--
-- Table structure for table `p_sampel_makanan`
--

CREATE TABLE `p_sampel_makanan` (
  `id_makanan` varchar(255) NOT NULL,
  `nama_parameter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_sampel_makanan`
--

INSERT INTO `p_sampel_makanan` (`id_makanan`, `nama_parameter`) VALUES
('1', 'E COLI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemeriksaan_sampel`
--
ALTER TABLE `pemeriksaan_sampel`
  ADD PRIMARY KEY (`nomor_regis`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `p_sampel_air`
--
ALTER TABLE `p_sampel_air`
  ADD PRIMARY KEY (`id_air`);

--
-- Indexes for table `p_sampel_makanan`
--
ALTER TABLE `p_sampel_makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

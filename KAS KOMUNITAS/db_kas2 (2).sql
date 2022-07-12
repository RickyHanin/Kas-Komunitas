-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 07:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `id_iuran` int(5) NOT NULL,
  `nama_iuran` varchar(250) NOT NULL,
  `keterangan_iuran` varchar(250) NOT NULL,
  `tgl_iuran` date NOT NULL,
  `nominal_iuran` int(250) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`id_iuran`, `nama_iuran`, `keterangan_iuran`, `tgl_iuran`, `nominal_iuran`, `bulan`) VALUES
(6, 'iuran peringatan 17 agustus', 'ya buat 17 an', '2021-08-02', 1000000, 'agustus'),
(7, 'coba', 'cobaaaaa', '2021-05-04', 500000, 'Mei'),
(10, 'coba', 'januari', '2021-01-02', 500000, 'Januari');

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `nominal` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_kas`, `id_pengguna`, `bulan`, `tgl_bayar`, `nominal`) VALUES
(40, 25, 'Januari', '2021-01-10', 20000),
(44, 24, 'Februari', '2021-05-03', 20000),
(46, 25, 'Februari', '2021-02-02', 20000),
(48, 24, 'Maret', '2021-03-31', 20000),
(50, 25, 'Maret', '2021-03-04', 20000),
(54, 30, 'Januari', '2021-01-02', 20000),
(55, 30, 'Februari', '2021-02-03', 20000),
(56, 24, 'Januari', '2021-01-02', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(5) NOT NULL,
  `nama_pengeluaran` varchar(250) NOT NULL,
  `keterangan_pengeluaran` varchar(250) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nominal_pengeluaran` int(250) NOT NULL,
  `bulan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `nama_pengeluaran`, `keterangan_pengeluaran`, `tgl_pengeluaran`, `nominal_pengeluaran`, `bulan`) VALUES
(2, 'listrik bulan maret', 'untk membayar listrik bulan april', '2021-04-07', 300000, ''),
(5, 'air', 'ya buat bayar air', '2021-05-02', 1000000, ''),
(6, 'cobaaaa', 'cobaaaaa', '2021-05-12', 500000, 'Mei'),
(9, 'aaaaa', 'aaaa', '2021-01-02', 500000, 'Januari');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `ussername` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `ussername`, `password`, `level`) VALUES
(8, 'mia putri setyawati', 'mia', '11', 'admin'),
(9, 'admin', 'admin', '123', 'admin'),
(10, 'muhammad anullah riandani', 'anu', '22', 'admin'),
(24, 'mia putri setyawati', 'mia putri setyawati', '1234567812345678', 'warga'),
(25, 'muhammad anullah riandani', 'muhammad anullah riandani', '1234512345', 'warga'),
(30, 'mia', 'mia', '111', 'warga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id_iuran`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id_iuran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

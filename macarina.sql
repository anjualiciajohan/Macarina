-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 07:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `macarina`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `kd_admin` varchar(5) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `alamat_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kd_admin`, `user`, `password`, `alamat_admin`) VALUES
('1', 'hammer', 'sad', '12321'),
('2', 'ww', '12', 'qwewqe');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` varchar(5) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `nama_rek` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar_brg` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` varchar(5) NOT NULL,
  `kd_barang` varchar(5) NOT NULL,
  `qty_det` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` varchar(8) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `isi` varchar(25) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `video` varchar(25) NOT NULL,
  `kd_admin` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(5) NOT NULL,
  `id_bank` varchar(5) NOT NULL,
  `kd_transaksi` varchar(5) NOT NULL,
  `kd_admin` varchar(5) NOT NULL,
  `bukti_bayar` varchar(25) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `nama_rek_res` varchar(25) NOT NULL,
  `no_rek_res` varchar(25) NOT NULL,
  `status_pesan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `kd_point` varchar(3) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `id_reseller` varchar(5) NOT NULL,
  `nama_reseller` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `total_point` int(11) NOT NULL,
  `scan_ktp` varchar(25) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `id_konten` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` varchar(5) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `grand_total` int(11) NOT NULL,
  `id_reseller` varchar(5) NOT NULL,
  `id_detail` varchar(5) NOT NULL,
  `kd_admin` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `barang` (`kd_barang`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`),
  ADD KEY `admin2` (`kd_admin`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `bank` (`id_bank`),
  ADD KEY `transaksi` (`kd_transaksi`),
  ADD KEY `admin1` (`kd_admin`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`kd_point`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id_reseller`),
  ADD KEY `konten` (`id_konten`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `reseller` (`id_reseller`),
  ADD KEY `admin` (`kd_admin`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `barang` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);

--
-- Constraints for table `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `admin2` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `admin1` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`),
  ADD CONSTRAINT `bank` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  ADD CONSTRAINT `transaksi` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`);

--
-- Constraints for table `reseller`
--
ALTER TABLE `reseller`
  ADD CONSTRAINT `konten` FOREIGN KEY (`id_konten`) REFERENCES `konten` (`id_konten`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `admin` FOREIGN KEY (`kd_admin`) REFERENCES `admin` (`kd_admin`),
  ADD CONSTRAINT `reseller` FOREIGN KEY (`id_reseller`) REFERENCES `reseller` (`id_reseller`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
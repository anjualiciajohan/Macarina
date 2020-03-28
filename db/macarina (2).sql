-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2020 pada 12.42
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `kd_admin` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `alamat_admin` varchar(50) NOT NULL,
  `gambar` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`kd_admin`, `user`, `password`, `alamat_admin`, `gambar`) VALUES
(1, 'macarina', 'admin', 'jln. Sriwijaya XX', 'dagytgimage.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_kirim`
--

CREATE TABLE `alamat_kirim` (
  `kd_al_kirim` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `kd_kab` int(11) NOT NULL,
  `sys_code` int(11) NOT NULL,
  `kd_kel` int(11) NOT NULL,
  `alamat_lengkap` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `nama_rek` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`, `nama_rek`) VALUES
(1, 'BRI', '7770009658688', 'MACARINA_BRI'),
(2, 'BNI', '55509847867867', 'MACARINA_BNI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar_brg` varchar(25) NOT NULL,
  `deskripsi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `harga`, `stok`, `gambar_brg`, `deskripsi`) VALUES
(1, 'Jagung Manis (150gr)', 6000, 38, 'jagung.jpg', 'manisnya jagung'),
(2, 'Original (150gr)', 2000, 27, 'ori.jpg', 'ori polosan'),
(3, 'BBQ (150gr)', 2000, 32, 'bbq.jpg', 'barbeque'),
(4, 'Balado (150gr)', 2000, 20, 'balado.jpg', 'balado pedas manis'),
(5, 'Coklat (150gr)', 6000, 20, 'cokalt.jpg', 'coklat lumerrr'),
(6, 'Keju (150gr)', 6000, 20, 'keju.jpg', 'keju lumerr'),
(7, 'Seawed (150gr)', 6000, 20, 'seawed.jpg', 'rumput laut'),
(8, 'Indomie(150gr)', 6000, 20, 'indomie.jpg', 'indomie goreng seger'),
(9, 'maarina keju manis', 2000, 10, 'd51858cd951e4b360c0658fea', 'Habis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `qty_det` int(11) NOT NULL DEFAULT '1',
  `subtotal` int(11) NOT NULL,
  `status` enum('Added to cart','Pending','PendingB') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `detail_transaksi`
--
DELIMITER $$
CREATE TRIGGER `stokk` AFTER DELETE ON `detail_transaksi` FOR EACH ROW UPDATE barang SET stok = stok + OLD.qty_det
WHERE kd_barang = OLD.kd_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stokplus` AFTER INSERT ON `detail_transaksi` FOR EACH ROW UPDATE barang SET stok = stok - NEW.qty_det
WHERE kd_barang = NEW.kd_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kab`
--

CREATE TABLE `kab` (
  `kd_kab` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `provinsi` varchar(16) NOT NULL,
  `kab_kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kab`
--

INSERT INTO `kab` (`kd_kab`, `code`, `provinsi`, `kab_kota`) VALUES
(1, 'JBR', 'Jawa Timur', 'Jember'),
(2, 'BWI', 'Jawa Timur', 'Banyuwangi'),
(3, 'BWS', 'Jawa Timur', 'Bondowoso');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kec`
--

CREATE TABLE `kec` (
  `sys_code` int(11) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kd_kab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kec`
--

INSERT INTO `kec` (`sys_code`, `kecamatan`, `kd_kab`) VALUES
(1, 'Ambulu', 1),
(2, 'Arjasa', 1),
(3, 'Balung', 1),
(4, 'Bangsalsari', 1),
(5, 'Gumuk Mas', 1),
(6, 'Jelbuk', 1),
(7, 'Jenggawah', 1),
(8, 'Kalisat', 1),
(9, 'Kencong', 1),
(10, 'Ledokombo', 1),
(11, 'Mayang', 1),
(12, 'Mumbulsari', 1),
(13, 'Pakusari', 1),
(14, 'Panti', 1),
(15, 'Puger', 1),
(16, 'Rambipuji', 1),
(17, 'Silo', 1),
(18, 'Sukorambi', 1),
(19, 'Sukowono', 1),
(20, 'Sumber Baru', 1),
(21, 'Sumber Jambe', 1),
(22, 'Tanggul', 1),
(23, 'Tempurejo', 1),
(24, 'Umbulsari', 1),
(25, 'Wuluhan', 1),
(26, 'Ajung', 1),
(27, 'Jombang', 1),
(28, 'Kaliwates', 1),
(29, 'Patrang', 1),
(30, 'Semboro', 1),
(31, 'Sumber Sari', 1),
(32, 'Banyuwangi', 2),
(33, 'Bangorejo', 2),
(34, 'Cluring', 2),
(35, 'Gambiran', 2),
(36, 'Genteng', 2),
(37, 'Glenmore', 2),
(38, 'Kabat', 2),
(39, 'Kalibaru', 2),
(40, 'Muncar', 2),
(41, 'Pesanggaran', 2),
(42, 'Purwoharjo', 2),
(43, 'Rogojampi', 2),
(44, 'Singojuruh', 2),
(45, 'Songgon', 2),
(46, 'Srono', 2),
(47, 'Tegaldlimo', 2),
(48, 'Wongsorejo', 2),
(49, 'Glagah', 2),
(50, 'Giri', 2),
(51, 'Kalipuro', 2),
(52, 'Licin', 2),
(53, 'Sempu', 2),
(54, 'Siliragung', 2),
(55, 'Tegalsari', 2),
(56, 'Bondowoso', 3),
(57, 'Cermee', 3),
(58, 'Curahdami', 3),
(59, 'Grujugan', 3),
(60, 'Klabang', 3),
(61, 'Maesan', 3),
(62, 'Pakem', 3),
(63, 'Prajekan', 3),
(64, 'Pujer', 3),
(65, 'Sempol', 3),
(66, 'Sukosari', 3),
(67, 'Tamanan', 3),
(68, 'Tapen', 3),
(69, 'Tegalampel', 3),
(70, 'Tenggarang', 3),
(71, 'Tlogosari', 3),
(72, 'Wonosari', 3),
(73, 'Wringin', 3),
(74, 'Binakal', 3),
(75, 'Sumber Wringin', 3),
(76, 'Taman Krocok', 3),
(77, 'Jambe Sari Darus Sho', 3),
(78, 'Botolinggo', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kel`
--

CREATE TABLE `kel` (
  `kd_kel` int(11) NOT NULL,
  `sys_code` int(11) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `cepat` int(11) NOT NULL,
  `lama` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kel`
--

INSERT INTO `kel` (`kd_kel`, `sys_code`, `kelurahan`, `kode_pos`, `price`, `cepat`, `lama`) VALUES
(1, 1, 'Ambulu', 68172, 10000, 2, 3),
(2, 1, 'Andongsari', 68172, 10000, 3, 6),
(3, 1, 'Karang Anyar', 68132, 10000, 3, 6),
(4, 1, 'Pontang', 68172, 10000, 3, 6),
(5, 1, 'Sabrang', 68172, 10000, 3, 6),
(6, 1, 'Sumberrejo', 68172, 10000, 3, 6),
(7, 1, 'Tegalsari', 68172, 10000, 3, 6),
(8, 2, 'Arjasa', 68191, 10000, 3, 6),
(9, 2, 'Biting', 68191, 10000, 3, 6),
(10, 2, 'Candijati', 68191, 10000, 3, 6),
(11, 2, 'Darsono', 68191, 10000, 3, 6),
(12, 2, 'Kamal', 68191, 10000, 3, 6),
(13, 2, 'Kemuningllor', 68191, 10000, 3, 6),
(14, 3, 'Balung Kidul', 68161, 10000, 3, 6),
(15, 3, 'Balung Kulon', 68161, 10000, 3, 6),
(16, 3, 'Balung Lor', 68161, 10000, 3, 6),
(17, 3, 'Curahlele', 68161, 10000, 3, 6),
(18, 3, 'Gumelar', 68161, 10000, 3, 6),
(19, 3, 'Karang Duren', 68161, 10000, 3, 6),
(20, 3, 'Karang Semanding', 68161, 10000, 3, 6),
(21, 3, 'Tutul', 68161, 10000, 3, 6),
(22, 4, 'Badean', 68154, 10000, 3, 6),
(23, 4, 'Bangsalsari', 68154, 10000, 3, 6),
(24, 4, 'Banjarsari', 68154, 10000, 3, 6),
(25, 4, 'Curah Kalong', 68154, 10000, 3, 6),
(26, 4, 'Gambirono', 68154, 10000, 3, 6),
(27, 4, 'Karangsono', 68154, 10000, 3, 6),
(28, 4, 'Langkap', 68154, 10000, 3, 6),
(29, 4, 'Petung', 68154, 10000, 3, 6),
(30, 4, 'Sukorejo', 68154, 10000, 3, 6),
(31, 4, 'Tisnogambar', 68154, 10000, 3, 6),
(32, 4, 'Tugusari', 68154, 10000, 3, 6),
(33, 5, 'Bagorejo', 68165, 10000, 3, 6),
(34, 5, 'Gumukmas', 68165, 10000, 3, 6),
(35, 5, 'Karang Rejo', 68165, 10000, 3, 6),
(36, 5, 'Kepanjen', 68165, 10000, 3, 6),
(37, 5, 'Mayangan', 68165, 10000, 3, 6),
(38, 5, 'Menampu', 68165, 10000, 3, 6),
(39, 5, 'Purwoasri', 68165, 10000, 3, 6),
(40, 5, 'Tembokrejo', 68165, 10000, 3, 6),
(41, 6, 'Jelbuk', 68192, 10000, 3, 6),
(42, 6, 'Panduman', 68192, 10000, 3, 6),
(43, 6, 'Suco Pangepok', 68192, 10000, 3, 6),
(44, 6, 'Suger Kidul', 68192, 10000, 3, 6),
(45, 6, 'Suko Jember', 68192, 10000, 3, 6),
(46, 6, 'Sukowiryo', 68192, 10000, 3, 6),
(47, 7, 'Cangkring', 68171, 10000, 3, 6),
(48, 7, 'Jatimulyo', 68171, 10000, 3, 6),
(49, 7, 'Jatisari', 68171, 10000, 3, 6),
(50, 7, 'Jenggawah', 68171, 10000, 3, 6),
(51, 7, 'Kemuning Sari Kidul', 68171, 10000, 3, 6),
(52, 7, 'Kertonegoro', 68171, 10000, 3, 6),
(53, 7, 'Seruni', 68171, 10000, 3, 6),
(54, 7, 'Wonojati', 68171, 10000, 3, 6),
(55, 8, 'Ajung', 68193, 10000, 3, 6),
(56, 8, 'Gambiran', 68193, 10000, 3, 6),
(57, 8, 'Glagahwero', 68193, 10000, 3, 6),
(58, 8, 'Gumuksari', 68193, 10000, 3, 6),
(59, 8, 'Kalisat', 68193, 10000, 3, 6),
(60, 8, 'Patempuran', 68193, 10000, 3, 6),
(61, 8, 'Plalangan', 68113, 10000, 3, 6),
(62, 8, 'Sebanen', 68193, 10000, 3, 6),
(63, 8, 'Sukoreno', 68193, 10000, 3, 6),
(64, 8, 'Sumber Jeruk', 68193, 10000, 3, 6),
(65, 8, 'Sumber Kalong', 68193, 10000, 3, 6),
(66, 8, 'Sumber Ketempah', 68193, 10000, 3, 6),
(67, 9, 'Cakru', 68167, 10000, 3, 6),
(68, 9, 'Kencong', 68167, 10000, 3, 6),
(69, 9, 'Kraton', 68167, 10000, 3, 6),
(70, 9, 'Paseban', 68167, 10000, 3, 6),
(71, 9, 'Wonorejo', 68167, 10000, 3, 6),
(72, 10, 'Karang Paiton', 68196, 10000, 3, 6),
(73, 10, 'Ledokombo', 68196, 10000, 3, 6),
(74, 10, 'Lembengan', 68196, 10000, 3, 6),
(75, 10, 'Slateng', 68196, 10000, 3, 6),
(76, 10, 'Sukogidri', 68196, 10000, 3, 6),
(77, 10, 'Sumber Anget', 68196, 10000, 3, 6),
(78, 10, 'Sumber Bulus', 68196, 10000, 3, 6),
(79, 10, 'Sumber Lesung', 68196, 10000, 3, 6),
(80, 10, 'Sumber Salak', 68196, 10000, 3, 6),
(81, 10, 'Suren', 68196, 10000, 3, 6),
(82, 11, 'Mayang', 68182, 10000, 3, 6),
(83, 11, 'Mrawan', 68182, 10000, 3, 6),
(84, 11, 'Seputih', 68182, 10000, 3, 6),
(85, 11, 'Sidomukti', 68182, 10000, 3, 6),
(86, 11, 'Sumber Kejayan', 68182, 10000, 3, 6),
(87, 11, 'Tegal Waru', 68182, 10000, 3, 6),
(88, 11, 'Tegalrejo', 68118, 10000, 3, 6),
(89, 12, 'Karangkedawung', 68174, 10000, 3, 6),
(90, 12, 'Kawangrejo', 68174, 10000, 3, 6),
(91, 12, 'Lampeji', 68174, 10000, 3, 6),
(92, 12, 'Lengkong', 68174, 10000, 3, 6),
(93, 12, 'Mumbulsari', 68174, 10000, 3, 6),
(94, 12, 'Suco', 68174, 10000, 3, 6),
(95, 12, 'Tamansari', 68174, 10000, 3, 6),
(96, 13, 'Bedadung', 68181, 10000, 3, 6),
(97, 13, 'Jatian', 68181, 10000, 3, 6),
(98, 13, 'Kertosari', 68181, 10000, 3, 6),
(99, 13, 'Pakusari', 68181, 10000, 3, 6),
(100, 13, 'Patemon', 68181, 10000, 3, 6),
(101, 13, 'Subo', 68181, 10000, 3, 6),
(102, 13, 'Sumber Pinang', 68181, 10000, 3, 6),
(103, 14, 'Glagahwero', 68153, 10000, 3, 6),
(104, 14, 'Kemiri', 68153, 10000, 3, 6),
(105, 14, 'Kemuningsari Lor', 68153, 10000, 3, 6),
(106, 14, 'Pakis', 68153, 10000, 3, 6),
(107, 14, 'Panti', 68153, 10000, 3, 6),
(108, 14, 'Serut', 68153, 10000, 3, 6),
(109, 14, 'Suci', 68153, 10000, 3, 6),
(110, 15, 'Bagon', 68164, 10000, 3, 6),
(111, 15, 'Grenden', 68164, 10000, 3, 6),
(112, 15, 'Jambearum', 68164, 10000, 3, 6),
(113, 15, 'Kasiyan', 68164, 10000, 3, 6),
(114, 15, 'Kasiyan Timur', 68164, 10000, 3, 6),
(115, 15, 'Mlokorejo', 68164, 10000, 3, 6),
(116, 15, 'Mojomulyo', 68164, 10000, 3, 6),
(117, 15, 'Mojosari', 68164, 10000, 3, 6),
(118, 15, 'Puger Kulon', 68164, 10000, 3, 6),
(119, 15, 'Puger Wetan', 68164, 10000, 3, 6),
(120, 15, 'Wonosari', 68164, 10000, 3, 6),
(121, 15, 'Wringin Telu', 68164, 10000, 3, 6),
(122, 16, 'Curahmalang', 68152, 10000, 3, 6),
(123, 16, 'Gugut', 68152, 10000, 3, 6),
(124, 16, 'Kaliwining', 68152, 10000, 3, 6),
(125, 16, 'Nogosari', 68152, 10000, 3, 6),
(126, 16, 'Pecoro', 68152, 10000, 3, 6),
(127, 16, 'Rambigundam', 68152, 10000, 3, 6),
(128, 16, 'Rambipuji', 68152, 10000, 3, 6),
(129, 16, 'Rowotamtu', 68152, 10000, 3, 6),
(130, 17, 'Garahan', 68184, 10000, 3, 6),
(131, 17, 'Harjomolyo', 68184, 10000, 3, 6),
(132, 17, 'Karangharjo', 68184, 10000, 3, 6),
(133, 17, 'Mulyorejo', 68184, 10000, 3, 6),
(134, 17, 'Pace', 68184, 10000, 3, 6),
(135, 17, 'Sempolan', 68184, 10000, 3, 6),
(136, 17, 'Sidomulyo', 68184, 10000, 3, 6),
(137, 17, 'Silo', 68184, 10000, 3, 6),
(138, 17, 'Sumberjati', 68184, 10000, 3, 6),
(139, 18, 'Dukuh Mencek', 68151, 10000, 3, 6),
(140, 18, 'Jubung', 68151, 10000, 3, 6),
(141, 18, 'Karangpring', 68151, 10000, 3, 6),
(142, 18, 'Kelungkung', 68151, 10000, 3, 6),
(143, 18, 'Sukorambi', 68151, 10000, 3, 6),
(144, 19, 'Arjasa', 68194, 10000, 3, 6),
(145, 19, 'Balet Baru', 68194, 10000, 3, 6),
(146, 19, 'Dawuhan Mangli', 68194, 10000, 3, 6),
(147, 19, 'Mojogeni', 68194, 10000, 3, 6),
(148, 19, 'Pocangan', 68194, 10000, 3, 6),
(149, 19, 'Sukokerto', 68194, 10000, 3, 6),
(150, 19, 'Sukorejo', 68194, 10000, 3, 6),
(151, 19, 'Sukosari', 68194, 10000, 3, 6),
(152, 19, 'Sukowono', 68194, 10000, 3, 6),
(153, 19, 'Sumber Wringin', 68194, 10000, 3, 6),
(154, 19, 'Sumberdanti', 68194, 10000, 3, 6),
(155, 19, 'Sumberwaru', 68194, 10000, 3, 6),
(156, 20, 'Gelang', 68156, 10000, 3, 6),
(157, 20, 'Jambesari', 68156, 10000, 3, 6),
(158, 20, 'Jamintoro', 68156, 10000, 3, 6),
(159, 20, 'Jatiroto', 68156, 10000, 3, 6),
(160, 20, 'Kaliglagah', 68156, 10000, 3, 6),
(161, 20, 'Karang Bayat', 68156, 10000, 3, 6),
(162, 20, 'Pringgowirawan', 68156, 10000, 3, 6),
(163, 20, 'Rowo Tengah', 68156, 10000, 3, 6),
(164, 20, 'Sumber Agung', 68156, 10000, 3, 6),
(165, 20, 'Yosorati', 68156, 10000, 3, 6),
(166, 21, 'Cumedak', 68195, 10000, 3, 6),
(167, 21, 'Gunung Malang', 68195, 10000, 3, 6),
(168, 21, 'Jambe Arum', 68195, 10000, 3, 6),
(169, 21, 'Plereyan', 68195, 10000, 3, 6),
(170, 21, 'Pringgondani', 68195, 10000, 3, 6),
(171, 21, 'Randu Agung', 68195, 10000, 3, 6),
(172, 21, 'Rowosari', 68195, 10000, 3, 6),
(173, 21, 'Sumber Pakem', 68195, 10000, 3, 6),
(174, 21, 'Sumberjambe', 68195, 10000, 3, 6),
(175, 22, 'Darungan', 68155, 10000, 3, 6),
(176, 22, 'Klatakan', 68155, 10000, 3, 6),
(177, 22, 'Kramat Sukoharjo', 68155, 10000, 3, 6),
(178, 22, 'Manggisan', 68155, 10000, 3, 6),
(179, 22, 'Patemon', 68155, 10000, 3, 6),
(180, 22, 'Selodakon', 68155, 10000, 3, 6),
(181, 22, 'Tanggul Kulon', 68155, 10000, 3, 6),
(182, 22, 'Tanggul Wetan', 68155, 10000, 3, 6),
(183, 23, 'Andongrejo', 68173, 10000, 3, 6),
(184, 23, 'Curahnongko', 68173, 10000, 3, 6),
(185, 23, 'Curahtakir', 68173, 10000, 3, 6),
(186, 23, 'Pondokrejo', 68173, 10000, 3, 6),
(187, 23, 'Sanenrejo', 68173, 10000, 3, 6),
(188, 23, 'Sidodadi', 68173, 10000, 3, 6),
(189, 23, 'Tempurejo', 68173, 10000, 3, 6),
(190, 23, 'Wonoasri', 68173, 10000, 3, 6),
(191, 24, 'Gadingrejo', 68166, 10000, 3, 6),
(192, 24, 'Gunungsari', 68166, 10000, 3, 6),
(193, 24, 'Mundurejo', 68166, 10000, 3, 6),
(194, 24, 'Paleran', 68166, 10000, 3, 6),
(195, 24, 'Sidorejo', 68166, 10000, 3, 6),
(196, 24, 'Sukoreno', 68166, 10000, 3, 6),
(197, 24, 'Tanjungsari', 68166, 10000, 3, 6),
(198, 24, 'Tegal Wangi', 68166, 10000, 3, 6),
(199, 24, 'Umbulrejo', 68166, 10000, 3, 6),
(200, 24, 'Umbulsari', 68166, 10000, 3, 6),
(201, 25, 'Ampel', 68162, 10000, 3, 6),
(202, 25, 'Dukuh Dempok', 68162, 10000, 3, 6),
(203, 25, 'Glundengan', 68162, 10000, 3, 6),
(204, 25, 'Kesilir', 68162, 10000, 3, 6),
(205, 25, 'Lojejer', 68162, 10000, 3, 6),
(206, 25, 'Tamansari', 68162, 10000, 3, 6),
(207, 25, 'Tanjung Rejo', 68162, 10000, 3, 6),
(208, 26, 'Ajung', 68175, 10000, 3, 6),
(209, 26, 'Klompangan', 68175, 10000, 3, 6),
(210, 26, 'Mangaran', 68175, 10000, 3, 6),
(211, 26, 'Pancakarya', 68175, 10000, 3, 6),
(212, 26, 'Rowo Indah', 68175, 10000, 3, 6),
(213, 26, 'Sukamakmur', 68175, 10000, 3, 6),
(214, 26, 'Wirowongso', 68175, 10000, 3, 6),
(215, 27, 'Jombang', 68168, 10000, 3, 6),
(216, 27, 'Keting', 68168, 10000, 3, 6),
(217, 27, 'Ngampelrejo', 68168, 10000, 3, 6),
(218, 27, 'Padomasan', 68168, 10000, 3, 6),
(219, 27, 'Sarimulyo', 68168, 10000, 3, 6),
(220, 27, 'Wringin Agung', 68168, 10000, 3, 6),
(221, 28, 'Jember Kidul', 68131, 8000, 3, 6),
(222, 28, 'Kaliwates', 68133, 8000, 2, 3),
(223, 28, 'Kebon Agung', 68137, 8000, 2, 3),
(224, 28, 'Kepatihan', 68137, 8000, 2, 3),
(225, 28, 'Mangli', 68136, 8000, 2, 3),
(226, 28, 'Sempusari', 68135, 8000, 2, 3),
(227, 28, 'Tegal Besar', 68132, 8000, 2, 3),
(228, 29, 'Banjar Sengon', 68118, 8000, 2, 3),
(229, 29, 'Baratan', 68112, 8000, 2, 3),
(230, 29, 'Bintoro', 68113, 8000, 2, 3),
(231, 29, 'Gebang', 68117, 8000, 2, 3),
(232, 29, 'Jember Lor', 68118, 8000, 2, 3),
(233, 29, 'Jumerto', 68114, 8000, 2, 3),
(234, 29, 'Patrang', 68111, 8000, 2, 3),
(235, 29, 'Slawu', 68116, 8000, 2, 3),
(236, 30, 'Pondok Dalem', 68157, 10000, 2, 3),
(237, 30, 'Pondok Joyo', 68157, 10000, 3, 6),
(238, 30, 'Rejo Agung', 68157, 10000, 3, 6),
(239, 30, 'Semboro', 68157, 10000, 3, 6),
(240, 30, 'Sidomekar', 68157, 10000, 3, 6),
(241, 30, 'Sidomulyo', 68157, 10000, 3, 6),
(242, 31, 'Antirogo', 68125, 8000, 3, 6),
(243, 31, 'Karangrejo', 68124, 8000, 2, 3),
(244, 31, 'Kebonsari', 68122, 8000, 2, 3),
(245, 31, 'Keranjingan', 68126, 8000, 2, 3),
(246, 31, 'Sumbersari', 68121, 8000, 2, 3),
(247, 31, 'Tegal Gede', 68124, 8000, 2, 3),
(248, 31, 'Wirolegi', 68124, 8000, 2, 3),
(249, 32, 'Kampung Mandar', 68419, 8000, 2, 3),
(250, 32, 'Kampung Melayu', 68412, 8000, 2, 3),
(251, 32, 'Karangrejo', 68411, 8000, 2, 3),
(252, 32, 'Kebalenan', 68417, 8000, 2, 3),
(253, 32, 'Kepatihan', 68411, 8000, 2, 3),
(254, 32, 'Kertosari', 68418, 8000, 2, 3),
(255, 32, 'Lateng', 68413, 8000, 2, 3),
(256, 32, 'Pakis', 68419, 8000, 2, 3),
(257, 32, 'Panderejo', 68415, 8000, 2, 3),
(258, 32, 'Penganjuran', 68416, 8000, 2, 3),
(259, 32, 'Pengantigan', 68414, 8000, 2, 3),
(260, 32, 'Singonegaran', 68415, 8000, 2, 3),
(261, 32, 'Singotrunan', 68414, 8000, 2, 3),
(262, 32, 'Sobo', 68418, 8000, 2, 3),
(263, 32, 'Sumberrejo', 68419, 8000, 2, 3),
(264, 32, 'Tamanbaru', 68416, 8000, 2, 3),
(265, 32, 'Temenggungan', 68412, 8000, 2, 3),
(266, 32, 'Tukangkayu', 68416, 8000, 2, 3),
(267, 33, 'Bangorejo', 68487, 10000, 2, 3),
(268, 33, 'Kebondalem', 68487, 10000, 3, 3),
(269, 33, 'Ringintelu', 68487, 10000, 3, 3),
(270, 33, 'Sambimulyo', 68487, 10000, 3, 3),
(271, 33, 'Sambirejo', 68487, 10000, 3, 3),
(272, 33, 'Sukorejo', 68487, 10000, 3, 3),
(273, 33, 'Temurejo', 68487, 10000, 3, 3),
(274, 34, 'Benculuk', 68482, 10000, 3, 3),
(275, 34, 'Cluring', 68482, 10000, 3, 3),
(276, 34, 'Kaliploso', 68482, 10000, 3, 3),
(277, 34, 'Plampangrejo', 68482, 10000, 3, 3),
(278, 34, 'Sarimulyo', 68482, 10000, 3, 3),
(279, 34, 'Sembulung', 68482, 10000, 3, 3),
(280, 34, 'Sraten', 68482, 10000, 3, 6),
(281, 34, 'Tamanagung', 68482, 10000, 3, 6),
(282, 34, 'Tampo', 68482, 10000, 3, 6),
(283, 35, 'Gambiran', 68486, 10000, 3, 6),
(284, 35, 'Jajag', 68486, 10000, 3, 6),
(285, 35, 'Purwodadi', 68486, 10000, 3, 6),
(286, 35, 'Wringin Agung', 68486, 10000, 3, 6),
(287, 35, 'Wringinrejo', 68486, 10000, 3, 6),
(288, 35, 'Yosomulyo', 68486, 10000, 3, 6),
(289, 36, 'Genteng Kulon', 68465, 8000, 3, 6),
(290, 36, 'Genteng Wetan', 68465, 8000, 2, 3),
(291, 36, 'Kaligondo', 68465, 8000, 2, 3),
(292, 36, 'Kembiritan', 68465, 8000, 2, 3),
(293, 36, 'Setail', 68465, 8000, 2, 3),
(294, 37, 'Bumiharjo', 68466, 10000, 2, 3),
(295, 37, 'Karangharjo', 68466, 10000, 3, 6),
(296, 37, 'Margomulyo', 68466, 10000, 3, 6),
(297, 37, 'Sepanjang', 68466, 10000, 3, 6),
(298, 37, 'Sumbergondo', 68466, 10000, 3, 6),
(299, 37, 'Tegalharjo', 68466, 10000, 3, 6),
(300, 37, 'Tulungrejo', 68466, 10000, 3, 6),
(301, 38, 'Badean', 68461, 10000, 3, 6),
(302, 38, 'Bareng', 68461, 10000, 3, 6),
(303, 38, 'Benelan Lor', 68461, 10000, 3, 6),
(304, 38, 'Bunder', 68461, 10000, 3, 6),
(305, 38, 'Dadapan', 68461, 10000, 3, 6),
(306, 38, 'Gombolirang', 68461, 10000, 3, 6),
(307, 38, 'Kabat', 68461, 10000, 3, 6),
(308, 38, 'Kalirejo', 68461, 10000, 3, 6),
(309, 38, 'Kedayunan', 68461, 10000, 3, 6),
(310, 38, 'Labanasem', 68461, 10000, 3, 6),
(311, 38, 'Macan Putih', 68461, 10000, 3, 6),
(312, 38, 'Pakistaji', 68461, 10000, 3, 6),
(313, 38, 'Pendarungan', 68461, 10000, 3, 6),
(314, 38, 'Pondoknongko', 68461, 10000, 3, 6),
(315, 38, 'Sukojati', 68461, 10000, 3, 6),
(316, 38, 'Tambong', 68461, 10000, 3, 6),
(317, 39, 'Banyuanyar', 68467, 10000, 3, 6),
(318, 39, 'Kajarharjo', 68467, 10000, 3, 6),
(319, 39, 'Kalibaru Kulon', 68467, 10000, 3, 6),
(320, 39, 'Kalibaru Manis', 68467, 10000, 3, 6),
(321, 39, 'Kalibaru Wetan', 68467, 10000, 3, 6),
(322, 39, 'Kebonrejo', 68467, 10000, 3, 6),
(323, 40, 'Blambangan', 68472, 10000, 3, 6),
(324, 40, 'Kedungrejo', 68472, 10000, 3, 6),
(325, 40, 'Kedungringin (Kedung', 68472, 10000, 3, 6),
(326, 40, 'Kumendung', 68472, 10000, 3, 6),
(327, 40, 'Sumberberas', 68472, 10000, 3, 6),
(328, 40, 'Sumbersewu', 68472, 10000, 3, 6),
(329, 40, 'Tambakrejo', 68472, 10000, 3, 6),
(330, 40, 'Tapanrejo', 68472, 10000, 3, 6),
(331, 40, 'Tembokrejo', 68472, 10000, 3, 6),
(332, 40, 'Wringin Putih', 68472, 10000, 3, 6),
(333, 41, 'Kandangan', 68488, 10000, 3, 6),
(334, 41, 'Pesanggaran', 68488, 10000, 3, 6),
(335, 41, 'Sarongan', 68488, 10000, 3, 6),
(336, 41, 'Sumberagung', 68488, 10000, 3, 6),
(337, 41, 'Sumbermulyo', 68488, 10000, 3, 6),
(338, 42, 'Bulurejo', 68483, 10000, 3, 6),
(339, 42, 'Glagahagung', 68483, 10000, 3, 6),
(340, 42, 'Grajagan', 68483, 10000, 3, 6),
(341, 42, 'Karetan (Keretan)', 68483, 10000, 3, 6),
(342, 42, 'Kradenan', 68483, 10000, 3, 6),
(343, 42, 'Purwoharjo', 68483, 10000, 3, 6),
(344, 42, 'Sidorejo', 68483, 10000, 3, 6),
(345, 42, 'Sumberasri', 68483, 10000, 3, 6),
(346, 43, 'Aliyan', 68462, 10000, 3, 6),
(347, 43, 'Blimbing Sari', 68462, 10000, 3, 6),
(348, 43, 'Bomo', 68462, 10000, 3, 6),
(349, 43, 'Bubuk', 68462, 10000, 3, 6),
(350, 43, 'Gintangan', 68462, 10000, 3, 6),
(351, 43, 'Gitik', 68462, 10000, 3, 6),
(352, 43, 'Gladag', 68462, 10000, 3, 6),
(353, 43, 'Kaligung', 68462, 10000, 3, 6),
(354, 43, 'Kaotan', 68462, 10000, 3, 6),
(355, 43, 'Karang Bendo', 68462, 10000, 3, 6),
(356, 43, 'Karangrejo', 68462, 10000, 3, 6),
(357, 43, 'Kedaleman', 68462, 10000, 3, 6),
(358, 43, 'Lemahbang Dewo', 68462, 10000, 3, 6),
(359, 43, 'Mangir', 68462, 10000, 3, 6),
(360, 43, 'Patoman', 68462, 10000, 3, 6),
(361, 43, 'Pengantigan', 68462, 10000, 3, 6),
(362, 43, 'Rogojampi', 68462, 10000, 3, 6),
(363, 43, 'Watu Kebo', 68462, 10000, 3, 6),
(364, 44, 'Alas Malang', 68464, 10000, 3, 6),
(365, 44, 'Benelan Kidul', 68464, 10000, 3, 6),
(366, 44, 'Cantuk', 68464, 10000, 3, 6),
(367, 44, 'Gambor', 68464, 10000, 3, 6),
(368, 44, 'Gumirih', 68464, 10000, 3, 6),
(369, 44, 'Kemiri', 68464, 10000, 3, 6),
(370, 44, 'Lemahbang Kulon', 68464, 10000, 3, 6),
(371, 44, 'Padang', 68464, 10000, 3, 6),
(372, 44, 'Singojuruh', 68464, 10000, 3, 6),
(373, 44, 'Singolatren', 68464, 10000, 3, 6),
(374, 44, 'Sumber Baru', 68464, 10000, 3, 6),
(375, 45, 'Balak', 68463, 10000, 3, 6),
(376, 45, 'Bangunsari', 68463, 10000, 3, 6),
(377, 45, 'Bayu', 68463, 10000, 3, 6),
(378, 45, 'Bedewang', 68463, 10000, 3, 6),
(379, 45, 'Parangharjo', 68463, 10000, 3, 6),
(380, 45, 'Songgon', 68463, 10000, 3, 6),
(381, 45, 'Sragi', 68463, 10000, 3, 6),
(382, 45, 'Sumber Arum', 68463, 10000, 3, 6),
(383, 45, 'Sumber Bulu', 68463, 10000, 3, 6),
(384, 46, 'Bagorejo', 68471, 10000, 3, 6),
(385, 46, 'Kebaman', 68471, 10000, 3, 6),
(386, 46, 'Kepundungan', 68471, 10000, 3, 6),
(387, 46, 'Parijatah Kulon', 68471, 10000, 3, 6),
(388, 46, 'Parijatah Wetan', 68471, 10000, 3, 6),
(389, 46, 'Rejoagung', 68471, 10000, 3, 6),
(390, 46, 'Sukomaju', 68471, 10000, 3, 6),
(391, 46, 'Sukonatar', 68471, 10000, 3, 6),
(392, 46, 'Sumbersari', 68471, 10000, 3, 6),
(393, 46, 'Wonosobo', 68471, 10000, 3, 6),
(394, 47, 'Kalipait', 68484, 10000, 3, 6),
(395, 47, 'Kedungasri', 68484, 10000, 3, 6),
(396, 47, 'Kedunggebang', 68484, 10000, 3, 6),
(397, 47, 'Kedungwungu', 68484, 10000, 3, 6),
(398, 47, 'Kendalrejo', 68484, 10000, 3, 6),
(399, 47, 'Purwoagung', 68484, 10000, 3, 6),
(400, 47, 'Purwoasri', 68484, 10000, 3, 6),
(401, 47, 'Tegaldlimo', 68484, 10000, 3, 6),
(402, 47, 'Wringinpitu', 68484, 10000, 3, 6),
(403, 48, 'Alasbulu', 68453, 10000, 3, 6),
(404, 48, 'Alasrejo', 68453, 10000, 3, 6),
(405, 48, 'Bajulmati', 68453, 10000, 3, 6),
(406, 48, 'Bangsring', 68453, 10000, 3, 6),
(407, 48, 'Bengkak', 68453, 10000, 3, 6),
(408, 48, 'Bimorejo', 68453, 10000, 3, 6),
(409, 48, 'Sidodadi', 68453, 10000, 3, 6),
(410, 48, 'Sidowangi', 68453, 10000, 3, 6),
(411, 48, 'Sumberanyar', 68453, 10000, 3, 6),
(412, 48, 'Sumberkencono', 68453, 10000, 3, 6),
(413, 48, 'Watukebo', 68453, 10000, 3, 6),
(414, 48, 'Wongsorejo', 68453, 10000, 3, 6),
(415, 49, 'Bakungan', 68431, 10000, 3, 6),
(416, 49, 'Banjarsari', 68432, 10000, 3, 6),
(417, 49, 'Glagah', 68432, 10000, 3, 6),
(418, 49, 'Kampunganyar', 68432, 10000, 3, 6),
(419, 49, 'Kemiren', 68432, 10000, 3, 6),
(420, 49, 'Kenjo', 68432, 10000, 3, 6),
(421, 49, 'Olehsari', 68432, 10000, 3, 6),
(422, 49, 'Paspan', 68432, 10000, 3, 6),
(423, 49, 'Rejosari', 68432, 10000, 3, 6),
(424, 49, 'Tamansuruh', 68432, 10000, 3, 6),
(425, 50, 'Boyolangu', 68424, 10000, 3, 6),
(426, 50, 'Giri', 68423, 10000, 3, 6),
(427, 50, 'Grogol', 68425, 10000, 3, 6),
(428, 50, 'Jambesari', 68425, 10000, 3, 6),
(429, 50, 'Mojopanggung', 68425, 10000, 3, 6),
(430, 50, 'Penataban', 68422, 10000, 3, 6),
(431, 51, 'Bulusan', 68455, 10000, 3, 6),
(432, 51, 'Bulusari', 68455, 10000, 3, 6),
(433, 51, 'Gombengsari', 68455, 10000, 3, 6),
(434, 51, 'Kalipuro', 68455, 10000, 3, 6),
(435, 51, 'Kelir', 68455, 10000, 3, 6),
(436, 51, 'Ketapang', 68455, 10000, 3, 6),
(437, 51, 'Klatak', 68421, 10000, 3, 6),
(438, 51, 'Pesucen', 68455, 10000, 3, 6),
(439, 51, 'Telemung', 68455, 10000, 3, 6),
(440, 52, 'Banjar', 68454, 10000, 3, 6),
(441, 52, 'Gumuk', 68454, 10000, 3, 6),
(442, 52, 'Jelun', 68454, 10000, 3, 6),
(443, 52, 'Kluncing', 68454, 10000, 3, 6),
(444, 52, 'Licin', 68454, 10000, 3, 6),
(445, 52, 'Pakel', 68454, 10000, 3, 6),
(446, 52, 'Segobang', 68454, 10000, 3, 6),
(447, 52, 'Tamansari', 68454, 10000, 3, 6),
(448, 53, 'Gendoh', 68468, 10000, 3, 6),
(449, 53, 'Jambewangi', 68468, 10000, 3, 6),
(450, 53, 'Karangsari', 68468, 10000, 3, 6),
(451, 53, 'Sempu', 68468, 10000, 3, 6),
(452, 53, 'Tegalarum', 68468, 10000, 3, 6),
(453, 53, 'Temuasri', 68468, 10000, 3, 6),
(454, 53, 'Temuguruh', 68468, 10000, 3, 6),
(455, 54, 'Barurejo', 68488, 10000, 3, 6),
(456, 54, 'Buluagung', 68488, 10000, 3, 6),
(457, 54, 'Kesilir', 68488, 10000, 3, 6),
(458, 54, 'Seneporejo', 68488, 10000, 3, 6),
(459, 54, 'Siliragung', 68488, 10000, 3, 6),
(460, 55, 'Dasri', 68485, 10000, 3, 6),
(461, 55, 'Karangdoro', 68485, 10000, 3, 6),
(462, 55, 'Karangmulyo', 68485, 10000, 3, 6),
(463, 55, 'Tamansari', 68485, 10000, 3, 6),
(464, 55, 'Tegalrejo', 68485, 10000, 3, 6),
(465, 55, 'Tegalsari', 68485, 10000, 3, 6),
(466, 56, 'Badean', 68214, 5000, 3, 6),
(467, 56, 'Blindungan', 68212, 5000, 1, 2),
(468, 56, 'Dabasah', 68211, 5000, 1, 2),
(469, 56, 'Kademangan', 68217, 5000, 1, 2),
(470, 56, 'Kembang', 68219, 5000, 1, 2),
(471, 56, 'Kotakulon', 68213, 5000, 1, 2),
(472, 56, 'Nangkaan', 68215, 5000, 1, 2),
(473, 56, 'Pancoran', 68219, 5000, 1, 2),
(474, 56, 'Pejaten', 68218, 5000, 1, 2),
(475, 56, 'Sukowiryo', 68219, 5000, 1, 2),
(476, 56, 'Tamansari', 68216, 5000, 1, 2),
(477, 57, 'Bajuran', 68286, 10000, 1, 2),
(478, 57, 'Batu Ampar', 68286, 10000, 3, 6),
(479, 57, 'Batu Salang', 68286, 10000, 3, 6),
(480, 57, 'Bercak', 68286, 10000, 3, 6),
(481, 57, 'Bercak Asri', 68286, 10000, 3, 6),
(482, 57, 'Cermee', 68286, 10000, 3, 6),
(483, 57, 'Grujugan', 68261, 10000, 3, 6),
(484, 57, 'Jirek Mas', 68286, 10000, 3, 6),
(485, 57, 'Kladi', 68286, 10000, 3, 6),
(486, 57, 'Pelalangan', 68286, 10000, 3, 6),
(487, 57, 'Ramban Kulon', 68286, 10000, 3, 6),
(488, 57, 'Ramban Wetan', 68286, 10000, 3, 6),
(489, 57, 'Solor', 68286, 10000, 3, 6),
(490, 57, 'Suling Kulon', 68286, 10000, 3, 6),
(491, 57, 'Suling Wetan', 68286, 10000, 3, 6),
(492, 58, 'Curahdami', 68251, 5000, 3, 6),
(493, 58, 'Curahpoh', 68251, 5000, 1, 2),
(494, 58, 'Jetis', 68251, 5000, 1, 2),
(495, 58, 'Kupang', 68251, 5000, 1, 2),
(496, 58, 'Locare', 68251, 5000, 1, 2),
(497, 58, 'Pakuwesi', 68251, 5000, 1, 2),
(498, 58, 'Penambangan', 68251, 5000, 1, 2),
(499, 58, 'Petung', 68251, 5000, 1, 2),
(500, 58, 'Poncogati', 68251, 5000, 1, 2),
(501, 58, 'Silolembu', 68251, 5000, 1, 2),
(502, 58, 'Sumber Salak', 68251, 5000, 1, 2),
(503, 58, 'Sumbersuko', 68251, 5000, 1, 2),
(504, 59, 'Dadapan', 68261, 5000, 1, 2),
(505, 59, 'Dawuhan', 68261, 5000, 1, 2),
(506, 59, 'Grujugan Kidul', 68261, 5000, 1, 2),
(507, 59, 'Kabuaran', 68261, 5000, 1, 2),
(508, 59, 'Kejawan', 68261, 5000, 1, 2),
(509, 59, 'Pekauman', 68261, 5000, 1, 2),
(510, 59, 'Sumberpandan', 68261, 5000, 1, 2),
(511, 59, 'Taman', 68261, 5000, 1, 2),
(512, 59, 'Tegalmijin', 68261, 5000, 1, 2),
(513, 59, 'Wanisodo', 68261, 5000, 1, 2),
(514, 59, 'Wonosari', 68261, 5000, 1, 2),
(515, 60, 'Besuk', 68284, 5000, 1, 2),
(516, 60, 'Blimbing', 68284, 5000, 1, 2),
(517, 60, 'Karang Sengon', 68284, 5000, 1, 2),
(518, 60, 'Karanganyar', 68284, 5000, 1, 2),
(519, 60, 'Klabang', 68284, 5000, 1, 2),
(520, 60, 'Klampokan', 68284, 5000, 1, 2),
(521, 60, 'Leprak', 68284, 5000, 1, 2),
(522, 60, 'Pandak', 68284, 5000, 1, 2),
(523, 60, 'Sumbersuko', 68284, 5000, 1, 2),
(524, 60, 'Wonoboyo', 68284, 5000, 1, 2),
(525, 60, 'Wonokerto', 68284, 5000, 1, 2),
(526, 61, 'Gambangan', 68262, 5000, 1, 2),
(527, 61, 'Gunung Sari', 68262, 5000, 1, 2),
(528, 61, 'Maesan', 68262, 5000, 1, 2),
(529, 61, 'Pakuniran', 68262, 5000, 1, 2),
(530, 61, 'Penanggungan', 68262, 5000, 1, 2),
(531, 61, 'Pujerbaru', 68262, 5000, 1, 2),
(532, 61, 'Sucolor', 68262, 5000, 1, 2),
(533, 61, 'Suger Lor', 68262, 5000, 1, 2),
(534, 61, 'Sumber Anyar', 68262, 5000, 1, 2),
(535, 61, 'Sumberpakem', 68262, 5000, 1, 2),
(536, 61, 'Sumbersari', 68262, 5000, 1, 2),
(537, 61, 'Tanahwulan', 68262, 5000, 1, 2),
(538, 62, 'Andungsari', 68253, 5000, 1, 2),
(539, 62, 'Ardisaeng', 68253, 5000, 1, 2),
(540, 62, 'Gadingsari', 68253, 5000, 1, 2),
(541, 62, 'Kupang', 68253, 5000, 1, 2),
(542, 62, 'Pakem', 68253, 5000, 1, 2),
(543, 62, 'Patemon', 68253, 5000, 1, 2),
(544, 62, 'Petung', 68253, 5000, 1, 2),
(545, 62, 'Sumber Dumpyong', 68253, 5000, 1, 2),
(546, 63, 'Bandilan', 68285, 5000, 1, 2),
(547, 63, 'Cangkring', 68285, 5000, 1, 2),
(548, 63, 'Prajekan Kidul', 68285, 5000, 1, 2),
(549, 63, 'Prajekan Lor', 68285, 5000, 1, 2),
(550, 63, 'Sempol', 68285, 5000, 1, 2),
(551, 63, 'Tarum', 68285, 5000, 1, 2),
(552, 63, 'Walidono', 68285, 5000, 1, 2),
(553, 64, 'Alassumur', 68271, 5000, 1, 2),
(554, 64, 'Kejayan', 68271, 5000, 1, 2),
(555, 64, 'Mangli', 68271, 5000, 1, 2),
(556, 64, 'Maskuning Kulon', 68271, 5000, 1, 2),
(557, 64, 'Maskuning Wetan', 68271, 5000, 1, 2),
(558, 64, 'Mengok', 68271, 5000, 1, 2),
(559, 64, 'Padasan', 68271, 5000, 1, 2),
(560, 64, 'Randucangkring', 68271, 5000, 1, 2),
(561, 64, 'Sukodono', 68271, 5000, 1, 2),
(562, 64, 'Sukokerto', 68271, 5000, 1, 2),
(563, 64, 'Sukowono', 68271, 5000, 1, 2),
(564, 65, 'Jampit', 68288, 10000, 1, 2),
(565, 65, 'Kalianyar', 68288, 10000, 3, 6),
(566, 65, 'Kaligedang', 68288, 10000, 3, 6),
(567, 65, 'Kalisat', 68288, 10000, 3, 6),
(568, 65, 'Sempol', 68288, 10000, 3, 6),
(569, 65, 'Sumber Rejo', 68288, 10000, 3, 6),
(570, 66, 'Kerang', 68287, 10000, 3, 6),
(571, 66, 'Nogosari', 68287, 10000, 3, 6),
(572, 66, 'Pecalongan', 68287, 10000, 3, 6),
(573, 66, 'Sukosari Lor', 68287, 10000, 3, 6),
(574, 67, 'Kalianyar', 68263, 5000, 3, 6),
(575, 67, 'Karangmelok', 68263, 5000, 1, 2),
(576, 67, 'Kemirian', 68263, 5000, 1, 2),
(577, 67, 'Mengen', 68263, 5000, 1, 2),
(578, 67, 'Sukosari', 68263, 5000, 1, 2),
(579, 67, 'Sumber Anom', 68263, 5000, 1, 2),
(580, 67, 'Sumberkemuning', 68263, 5000, 1, 2),
(581, 67, 'Tamanan', 68263, 5000, 1, 2),
(582, 67, 'Wonosuko', 68263, 5000, 1, 2),
(583, 68, 'Cindogo', 68283, 5000, 1, 2),
(584, 68, 'Gununganyar', 68283, 5000, 1, 2),
(585, 68, 'Jurangsapi', 68283, 5000, 1, 2),
(586, 68, 'Kalitapen', 68283, 5000, 1, 2),
(587, 68, 'Mangli Wetan', 68283, 5000, 1, 2),
(588, 68, 'Mrawan', 68283, 5000, 1, 2),
(589, 68, 'Taal', 68283, 5000, 1, 2),
(590, 68, 'Tapen', 68283, 5000, 1, 2),
(591, 68, 'Wonokusumo', 68283, 5000, 1, 2),
(592, 69, 'Karanganyar', 68291, 5000, 1, 2),
(593, 69, 'Klabang', 68291, 5000, 1, 2),
(594, 69, 'Klabang Agung', 68291, 5000, 1, 2),
(595, 69, 'Mandiro', 68291, 5000, 1, 2),
(596, 69, 'Purnama', 68291, 5000, 1, 2),
(597, 69, 'Sekarputih', 68291, 5000, 1, 2),
(598, 69, 'Tanggulangin', 68291, 5000, 1, 2),
(599, 69, 'Tegalampel', 68291, 5000, 1, 2),
(600, 70, 'Bataan', 68281, 5000, 1, 2),
(601, 70, 'Dawuhan', 68281, 5000, 1, 2),
(602, 70, 'Gebang', 68281, 5000, 1, 2),
(603, 70, 'Kajar', 68281, 5000, 1, 2),
(604, 70, 'Kesemek (Kasemek)', 68281, 5000, 1, 2),
(605, 70, 'Koncer Darul Alam', 68281, 5000, 1, 2),
(606, 70, 'Koncer Kidul', 68281, 5000, 1, 2),
(607, 70, 'Lojajar', 68281, 5000, 1, 2),
(608, 70, 'Pekalangan', 68281, 5000, 1, 2),
(609, 70, 'Sumbersalam', 68281, 5000, 1, 2),
(610, 70, 'Tangsil Kulon', 68281, 5000, 1, 2),
(611, 70, 'Tenggarang', 68281, 5000, 1, 2),
(612, 71, 'Brambang Darussolah', 68272, 10000, 1, 2),
(613, 71, 'Gunosari', 68272, 10000, 3, 6),
(614, 71, 'Jebung Kidul', 68272, 10000, 3, 6),
(615, 71, 'Jebung Lor', 68272, 10000, 3, 6),
(616, 71, 'Kembang', 68272, 10000, 3, 6),
(617, 71, 'Pakisan', 68272, 10000, 3, 6),
(618, 71, 'Patemon', 68272, 10000, 3, 6),
(619, 71, 'Sulek', 68272, 10000, 3, 6),
(620, 71, 'Tlogosari', 68272, 10000, 3, 6),
(621, 71, 'Trotosari', 68272, 10000, 3, 6),
(622, 72, 'Bendoarum', 68282, 5000, 3, 6),
(623, 72, 'Jumpong', 68282, 5000, 1, 2),
(624, 72, 'Kapuran', 68282, 5000, 1, 2),
(625, 72, 'Lombok Kulon', 68282, 5000, 1, 2),
(626, 72, 'Lombok Wetan', 68282, 5000, 1, 2),
(627, 72, 'Pasarejo', 68282, 5000, 1, 2),
(628, 72, 'Pelalangan', 68282, 5000, 1, 2),
(629, 72, 'Sumberkalong', 68282, 5000, 1, 2),
(630, 72, 'Tangsil Wetan', 68282, 5000, 1, 2),
(631, 72, 'Traktakan', 68282, 5000, 1, 2),
(632, 72, 'Tumpeng', 68282, 5000, 1, 2),
(633, 72, 'Wonosari', 68282, 5000, 1, 2),
(634, 73, 'Ambulu', 68252, 5000, 1, 2),
(635, 73, 'Ampelan', 68252, 5000, 1, 2),
(636, 73, 'Banyuputih', 68252, 5000, 1, 2),
(637, 73, 'Banyuwulu', 68252, 5000, 1, 2),
(638, 73, 'Bukor', 68252, 5000, 1, 2),
(639, 73, 'Glingseran', 68252, 5000, 1, 2),
(640, 73, 'Gubrih', 68252, 5000, 1, 2),
(641, 73, 'Jambewungu', 68252, 5000, 1, 2),
(642, 73, 'Jatisari', 68252, 5000, 1, 2),
(643, 73, 'Jatitamban', 68252, 5000, 1, 2),
(644, 73, 'Sumbercanting', 68252, 5000, 1, 2),
(645, 73, 'Sumbermalang', 68252, 5000, 1, 2),
(646, 73, 'Wringin', 68252, 5000, 1, 2),
(647, 74, 'Baratan', 68251, 5000, 1, 2),
(648, 74, 'Bendelan', 68251, 5000, 1, 2),
(649, 74, 'Binakal', 68251, 5000, 1, 2),
(650, 74, 'Gadingsari', 68251, 5000, 1, 2),
(651, 74, 'Jeruksoksok', 68251, 5000, 1, 2),
(652, 74, 'Kembangan', 68251, 5000, 1, 2),
(653, 74, 'Sumbertengah', 68251, 5000, 1, 2),
(654, 74, 'Sumberwaru', 68251, 5000, 1, 2),
(655, 75, 'Rejoagung', 68287, 10000, 1, 2),
(656, 75, 'Sukorejo', 68287, 10000, 3, 6),
(657, 75, 'Sukosari Kidul', 68287, 10000, 3, 6),
(658, 75, 'Sumber Gading', 68287, 10000, 3, 6),
(659, 75, 'Sumber Wringin', 68287, 10000, 3, 6),
(660, 75, 'Tegaljati', 68287, 10000, 3, 6),
(661, 76, 'Gentong', 68291, 10000, 3, 6),
(662, 76, 'Kemuningan', 68291, 10000, 3, 6),
(663, 76, 'Kretek', 68291, 10000, 3, 6),
(664, 76, 'Paguan', 68291, 10000, 3, 6),
(665, 76, 'Sumberkokap', 68291, 10000, 3, 6),
(666, 76, 'Taman', 68291, 10000, 3, 6),
(667, 76, 'Trebungan', 68291, 10000, 3, 6),
(668, 77, 'Grujugan Lor', 68261, 10000, 3, 6),
(669, 77, 'Jambe Anom', 68263, 10000, 3, 6),
(670, 77, 'Jambe Sari', 68263, 10000, 3, 6),
(671, 77, 'Pejagan', 68261, 10000, 3, 6),
(672, 77, 'Pengarang', 68271, 10000, 3, 6),
(673, 77, 'Pucang Anom', 68263, 10000, 3, 6),
(674, 77, 'Sumber Anyar', 68263, 10000, 3, 6),
(675, 77, 'Sumber Jeruk', 68263, 10000, 3, 6),
(676, 77, 'Tegalpasir', 68263, 10000, 3, 6),
(677, 78, 'Botolinggo', 68284, 10000, 3, 6),
(678, 78, 'Gayam', 68285, 10000, 3, 6),
(679, 78, 'Gayam Lor', 68285, 10000, 3, 6),
(680, 78, 'Klekehan (Klekean)', 68285, 10000, 3, 6),
(681, 78, 'Lanas', 68284, 10000, 3, 6),
(682, 78, 'Lumutan', 68284, 10000, 3, 6),
(683, 78, 'Penang', 68285, 10000, 3, 6),
(684, 78, 'Sumbercanting', 68284, 10000, 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(6) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_bank` int(5) NOT NULL,
  `kd_transaksi` int(11) NOT NULL,
  `bukti_bayar` varchar(25) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `nama_rek_res` varchar(25) NOT NULL,
  `no_rek_res` varchar(25) NOT NULL,
  `status_pesan` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reseller`
--

CREATE TABLE `reseller` (
  `id_reseller` int(11) NOT NULL,
  `nama_reseller` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `scan_ktp` varchar(50) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL,
  `status` varchar(10) NOT NULL,
  `pas_foto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reseller`
--

INSERT INTO `reseller` (`id_reseller`, `nama_reseller`, `alamat`, `no_tlp`, `scan_ktp`, `no_ktp`, `email`, `password`, `status`, `pas_foto`) VALUES
(12, 'Luqman Hakim', '', '089693556052', '', ' ', 'luqman.simdig05@gmail.com', 'sawahan1', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `grand_total` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indeks untuk tabel `alamat_kirim`
--
ALTER TABLE `alamat_kirim`
  ADD PRIMARY KEY (`kd_al_kirim`),
  ADD KEY `kel` (`kd_kel`),
  ADD KEY `ress1` (`id_reseller`),
  ADD KEY `kabupaten` (`kd_kab`),
  ADD KEY `kecamatan` (`sys_code`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `barang` (`kd_barang`),
  ADD KEY `reseller` (`id_reseller`);

--
-- Indeks untuk tabel `kab`
--
ALTER TABLE `kab`
  ADD PRIMARY KEY (`kd_kab`);

--
-- Indeks untuk tabel `kec`
--
ALTER TABLE `kec`
  ADD PRIMARY KEY (`sys_code`),
  ADD KEY `kab` (`kd_kab`);

--
-- Indeks untuk tabel `kel`
--
ALTER TABLE `kel`
  ADD PRIMARY KEY (`kd_kel`),
  ADD KEY `kec` (`sys_code`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `transaksi` (`kd_transaksi`),
  ADD KEY `bank` (`id_bank`);

--
-- Indeks untuk tabel `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id_reseller`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `res` (`id_reseller`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `kd_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `alamat_kirim`
--
ALTER TABLE `alamat_kirim`
  MODIFY `kd_al_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kab`
--
ALTER TABLE `kab`
  MODIFY `kd_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kec`
--
ALTER TABLE `kec`
  MODIFY `sys_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `kel`
--
ALTER TABLE `kel`
  MODIFY `kd_kel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=685;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `reseller`
--
ALTER TABLE `reseller`
  MODIFY `id_reseller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat_kirim`
--
ALTER TABLE `alamat_kirim`
  ADD CONSTRAINT `kabupaten` FOREIGN KEY (`kd_kab`) REFERENCES `kab` (`kd_kab`),
  ADD CONSTRAINT `kecamatan` FOREIGN KEY (`sys_code`) REFERENCES `kec` (`sys_code`),
  ADD CONSTRAINT `kel` FOREIGN KEY (`kd_kel`) REFERENCES `kel` (`kd_kel`),
  ADD CONSTRAINT `ress1` FOREIGN KEY (`id_reseller`) REFERENCES `reseller` (`id_reseller`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `barang` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`),
  ADD CONSTRAINT `reseller` FOREIGN KEY (`id_reseller`) REFERENCES `reseller` (`id_reseller`);

--
-- Ketidakleluasaan untuk tabel `kec`
--
ALTER TABLE `kec`
  ADD CONSTRAINT `kab` FOREIGN KEY (`kd_kab`) REFERENCES `kab` (`kd_kab`);

--
-- Ketidakleluasaan untuk tabel `kel`
--
ALTER TABLE `kel`
  ADD CONSTRAINT `kec` FOREIGN KEY (`sys_code`) REFERENCES `kec` (`sys_code`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `bank` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  ADD CONSTRAINT `transaksi` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `res` FOREIGN KEY (`id_reseller`) REFERENCES `reseller` (`id_reseller`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

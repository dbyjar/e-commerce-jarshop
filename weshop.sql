-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05 Jul 2019 pada 14.29
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `weshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int(10) NOT NULL AUTO_INCREMENT,
  `banner` varchar(100) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `link` varchar(500) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`banner_id`, `banner`, `gambar`, `link`, `status`) VALUES
(1, 'Vector Vexel JDindaaa', 'formal.jpg', '#', 'on'),
(2, 'Vector Vexel Cicilya', 'halfbody.jpg', '#', 'on'),
(3, 'Vector Vexel Alam', 'fullbody.jpg', '#', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `barang_id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(10) NOT NULL,
  `nama_barang` varchar(250) NOT NULL,
  `spesifikasi` text NOT NULL,
  `gambar` varchar(300) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` tinyint(1) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`barang_id`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `nama_barang`, `spesifikasi`, `gambar`, `harga`, `stok`, `status`) VALUES
(15, 1, 'Fact.co Old Black', '<p>Cotton Combed 30s</p>', 'aclbl1.jpg', 130000, 5, 'on'),
(16, 2, 'Vexel Formal', '<p><strong><em>KEPALA&nbsp;</em></strong>sampai&nbsp;<em>Bahu</em></p>', 'dinda.jpg', 75000, 1, 'on'),
(17, 1, 'Fact.co JAR White', '<p>Cotton Combed 30s</p>', 'aclwh2.jpg', 110000, 7, 'on'),
(18, 1, 'Fact.co String Raglan White', '<p>Cotton 100%</p>', 'aclrg2.jpg', 130000, 52, 'on'),
(19, 2, 'Vexel Half-Body', '<p><strong>KEPALA </strong><em>sampai <strong>Perut</strong></em></p>', 'cicil.jpg', 90000, 1, 'on'),
(20, 2, 'Vexel Full-Body', '<p><em><strong>SELURUH </strong>badan</em></p>', 'alam.jpg', 110000, 1, 'on'),
(21, 4, 'Give Away Vexel', '<p><strong>On <em>Instagram</em></strong></p>', 'Giveaway.jpg', 0, 1, 'on'),
(22, 4, 'Flat X 3D', '<p>20 x 20 cm 150px</p>', 'Versi 3.0.png', 50000, 1, 'on'),
(23, 4, 'Desain Kaos TPLM008', '<p>2018</p>', 'design1_08.jpg', 50000, 1, 'on'),
(24, 1, 'Baju', '<p>Cotton</p>', 'dinda.jpg', 120000, 15, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(10) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(150) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`, `status`) VALUES
(1, 'Clothing', 'on'),
(2, 'Vector Vexel', 'on'),
(4, 'Galery', 'on'),
(5, 'Logo', 'off'),
(7, 'Photo', 'off');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pembayaran` (
  `konfirmasi_id` int(10) NOT NULL AUTO_INCREMENT,
  `pesanan_id` int(10) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_account` varchar(150) NOT NULL,
  `total_pembayaran` int(10) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`konfirmasi_id`),
  KEY `pesanan_id` (`pesanan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`konfirmasi_id`, `pesanan_id`, `nomor_rekening`, `nama_account`, `total_pembayaran`, `tanggal_transfer`, `status`) VALUES
(4, 6, '879879879809098', 'Ardan', 0, '2019-06-23', 0),
(5, 8, '89098090', 'fajar al hakim', 0, '2019-12-09', 0),
(6, 8, '89098090', 'kjldfsd', 0, '2019-07-11', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `kota_id` int(10) NOT NULL AUTO_INCREMENT,
  `kota` varchar(150) NOT NULL,
  `tarif` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`kota_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kota_id`, `kota`, `tarif`, `status`) VALUES
(1, 'Bodetabek', 9000, 'on'),
(2, 'Jakarta', 6500, 'on'),
(3, 'Luar Jabodetabek', 15000, 'on'),
(4, 'Luar Pulau Jawa (WIB)', 21000, 'on'),
(5, 'Luar Pulau Jawa (WITA)', 25000, 'on'),
(6, 'Luar Pulau Jawa (WIT)', 30000, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `pesanan_id` int(10) NOT NULL AUTO_INCREMENT,
  `kota_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama_penerima` varchar(150) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`pesanan_id`),
  KEY `kota_id` (`kota_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `kota_id`, `user_id`, `nama_penerima`, `nomor_telepon`, `alamat`, `tanggal_pemesanan`, `status`) VALUES
(6, 4, 15, 'Paijo', '545645', 'jl. mgaso', '2019-06-23 15:02:58', 3),
(7, 1, 15, '', '', '', '2019-07-02 09:59:35', 0),
(8, 2, 15, 'Fajar', '089999', 'jl.njk', '2019-07-02 15:20:37', 1),
(9, 1, 15, 'Fajar', '9809', 'jl.,dv', '2019-07-02 15:22:31', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE IF NOT EXISTS `pesanan_detail` (
  `pesanan_id` int(10) NOT NULL,
  `barang_id` int(10) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `harga` int(10) NOT NULL,
  KEY `pesanan_id` (`pesanan_id`),
  KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`pesanan_id`, `barang_id`, `quantity`, `harga`) VALUES
(6, 18, 12, 130000),
(7, 23, 1, 50000),
(8, 24, 4, 120000),
(8, 18, 5, 130000),
(9, 18, 3, 130000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `level` varchar(30) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(160) NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `level`, `nama`, `email`, `alamat`, `phone`, `password`, `status`) VALUES
(15, 'superadmin', 'Fajar Al Hakim', 'fjralhakim@gmail.com', 'Kp. Sanggrahan', '085777774107', '4ac95507a2ac37e76f9f0a68dd686ef1', 'on'),
(17, 'customer', 'JDindaaa', 'jdindaaa@gmail.com', 'Bintaro Komplek BBC', '089678567456', 'd579117ca1bb21a92b0e8d8ce01ee56b', 'on');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

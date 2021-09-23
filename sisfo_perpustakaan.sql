-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 04:02 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sisfo_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_anggota` (
  `no_anggota` varchar(8) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `pass_anggota` text NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `status_anggota` enum('Siswa','Guru') NOT NULL,
  PRIMARY KEY (`no_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `kode_buku` varchar(15) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `penerbit_buku` varchar(50) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `stok_buku` int(5) NOT NULL,
  `id_kategori_buku` int(11) NOT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_pinjam`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_pinjam` (
  `no_pinjam` varchar(12) NOT NULL,
  `kode_buku` varchar(15) NOT NULL,
  `jumlah_pinjam` int(3) NOT NULL,
  `status_kembali` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori_buku` (
  `id_kategori_buku` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori_buku` varchar(100) NOT NULL,
  `status_kategori_buku` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id_kategori_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE IF NOT EXISTS `tbl_peminjaman` (
  `no_pinjam` varchar(12) NOT NULL,
  `no_anggota` varchar(8) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_pustakawan` int(5) NOT NULL,
  PRIMARY KEY (`no_pinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian`
--

CREATE TABLE IF NOT EXISTS `tbl_pengembalian` (
  `id_kembali` int(11) NOT NULL AUTO_INCREMENT,
  `no_pinjam` varchar(12) NOT NULL,
  `kode_buku` varchar(12) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` double NOT NULL,
  `id_pustakawan` int(5) NOT NULL,
  PRIMARY KEY (`id_kembali`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pustakawan`
--

CREATE TABLE IF NOT EXISTS `tbl_pustakawan` (
  `id_pustakawan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pustakawan` varchar(30) NOT NULL,
  `username_pustakawan` varchar(20) NOT NULL,
  `passw_pustakawan` text NOT NULL,
  `akses_pustakawan` enum('1','2') NOT NULL,
  PRIMARY KEY (`id_pustakawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_peminjaman`
--

CREATE TABLE IF NOT EXISTS `tbl_temp_peminjaman` (
  `id_peminjaman` varchar(12) NOT NULL,
  `no_anggota` varchar(8) NOT NULL,
  `kode_buku` varchar(15) NOT NULL,
  `jumlah_peminjaman` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

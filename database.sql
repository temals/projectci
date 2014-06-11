-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Jun 2014 pada 15.02
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ics_beta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_pick_ship`
--

CREATE TABLE IF NOT EXISTS `customer_pick_ship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `type` enum('Picking','Shipment') DEFAULT NULL,
  `address` text,
  `location_id` int(11) DEFAULT NULL,
  `last_modified` varchar(45) DEFAULT NULL,
  `status` enum('Active','Inactive','Trashed') DEFAULT NULL,
  `shipment_addresscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(45) DEFAULT NULL,
  `no_invoice` varchar(45) DEFAULT NULL,
  `faktur_pajak_id` varchar(45) DEFAULT NULL,
  `due_date` varchar(45) DEFAULT NULL COMMENT 'batas pembayaran',
  `payment_date` varchar(45) DEFAULT NULL COMMENT 'tanggal dilakukannya pembayaran',
  `down_payment` varchar(45) DEFAULT NULL COMMENT 'DP yang telah masuk',
  `description` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL COMMENT 'User Pembuat Invoice',
  `date` varchar(45) DEFAULT NULL COMMENT 'tanggal dibuat invoice',
  `status` enum('Pending','Approve','Complete') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table Invoice Penagihan, Dengan detail pada Invoice_detail' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_detail`
--

CREATE TABLE IF NOT EXISTS `invoice_detail` (
  `id` int(11) NOT NULL,
  `transaksi_id` varchar(45) DEFAULT NULL,
  `charge` varchar(45) DEFAULT NULL,
  `vat` varchar(45) DEFAULT NULL,
  `packing` varchar(45) DEFAULT NULL,
  `other` varchar(45) DEFAULT NULL,
  `down_payment` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Detail POD yang terpilih untuk penagihan invoice';

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_coa`
--

CREATE TABLE IF NOT EXISTS `master_coa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `master_coa`
--

INSERT INTO `master_coa` (`id`, `kode`, `name`, `description`) VALUES
(4, 'TEST2', 'TEST2', 'TEST2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_company`
--

CREATE TABLE IF NOT EXISTS `master_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Pusat','Cabang','Customer') DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` text,
  `npwp` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `bank` varchar(45) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `master_company`
--

INSERT INTO `master_company` (`id`, `type`, `name`, `address`, `npwp`, `phone`, `mobile`, `fax`, `email`, `bank`, `status`) VALUES
(10, NULL, 'test', 'jakarta', NULL, NULL, NULL, NULL, NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_faktur_pajak`
--

CREATE TABLE IF NOT EXISTS `master_faktur_pajak` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `no_faktur` varchar(45) DEFAULT NULL,
  `status` enum('Available','Unavailable') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_location`
--

CREATE TABLE IF NOT EXISTS `master_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `parent_id` int(45) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `master_location`
--

INSERT INTO `master_location` (`id`, `location`, `type`, `parent_id`, `status`) VALUES
(5, 'TEST LOCATION', 'TEST TYPE', 1, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_price`
--

CREATE TABLE IF NOT EXISTS `master_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` enum('Darat','Laut','Udara','Lainnya') DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `dest_location_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vehicle_price` int(11) DEFAULT NULL,
  `over_tonage_price` int(11) DEFAULT NULL COMMENT 'harga kelebihan beban jika menggunakan armada',
  `min_weight` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `description` text,
  `active` date DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `status` enum('Active','Inactive','Trashed') DEFAULT NULL,
  `delivery` int(11) DEFAULT NULL COMMENT 'Lama Pengiriman',
  `return_sj` int(11) DEFAULT NULL COMMENT 'Lama Dikembalikannya surat jalan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_unit`
--

CREATE TABLE IF NOT EXISTS `master_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(45) DEFAULT NULL,
  `type` enum('jarak','berat','waktu') DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_vehicle`
--

CREATE TABLE IF NOT EXISTS `master_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merk` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `jenis` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `no_polisi` varchar(45) DEFAULT NULL,
  `pemilik` varchar(45) DEFAULT NULL,
  `tahun_pembuatan` varchar(45) DEFAULT NULL,
  `no_rangka` varchar(45) DEFAULT NULL,
  `no_mesin` varchar(45) DEFAULT NULL,
  `bahan_bakar` varchar(45) DEFAULT NULL,
  `no_kir` varchar(45) DEFAULT NULL,
  `nomer_bbpkb` varchar(45) DEFAULT NULL,
  `capacity_weight` varchar(45) DEFAULT NULL,
  `expired_stnk` varchar(45) DEFAULT NULL,
  `expired_ibm` varchar(45) DEFAULT NULL,
  `expired_sipa` varchar(45) DEFAULT NULL,
  `driver` varchar(45) DEFAULT NULL,
  `company_id` varchar(45) DEFAULT NULL COMMENT 'untuk mengetahui pemilik adalah trimulya / vendor',
  `date` varchar(45) DEFAULT NULL,
  `last_modified` varchar(45) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `master_vehicle`
--

INSERT INTO `master_vehicle` (`id`, `merk`, `type`, `jenis`, `model`, `no_polisi`, `pemilik`, `tahun_pembuatan`, `no_rangka`, `no_mesin`, `bahan_bakar`, `no_kir`, `nomer_bbpkb`, `capacity_weight`, `expired_stnk`, `expired_ibm`, `expired_sipa`, `driver`, `company_id`, `date`, `last_modified`, `status`) VALUES
(4, 'TEST MERK', 'TEST TYPE', 'test', 'TEST MODEL', 'TEST NO POLISI', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'Inactive');

-- --------------------------------------------------------

--
-- Struktur dari tabel `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu` varchar(150) NOT NULL,
  `action` varchar(150) NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `privilege`
--

INSERT INTO `privilege` (`id`, `user_type_id`, `user_id`, `menu`, `action`, `last_modified`) VALUES
(1, 2, 0, 'master/company', 'view', '2014-06-10 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('17a4f516255726302b86395634df36c3', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0', 1402477190, ''),
('4ae46038e13e09265aca7d9a27e22b3c', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0', 1402481380, 'a:2:{s:9:"user_data";s:0:"";s:4:"user";a:4:{s:2:"id";s:1:"4";s:8:"username";s:9:"superuser";s:5:"email";s:19:"superuser@ics.co.id";s:12:"user_type_id";s:1:"1";}}'),
('7935a416119864b0399667b9a54c0dd1', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0', 1402477189, ''),
('7f0489fa5ebafc40d67924a5a1bf5038', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0', 1402477189, ''),
('99ea8dd54389c17d43844e0d528c0f48', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0', 1402477189, ''),
('b65def42f09d67e63f17f5d8d5e3b499', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0', 1402477190, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL,
  `no_pod` int(11) DEFAULT NULL COMMENT '(cmp)(yyyymmdd)(urutan)',
  `customer_id` int(11) DEFAULT NULL COMMENT 'relasi pada table company.id',
  `pick_address_id` varchar(45) DEFAULT NULL,
  `ship_address_id` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `gross_weight` float DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `volume_weight` float DEFAULT NULL,
  `drescription_goods` varchar(45) DEFAULT NULL,
  `dangerous_goods` varchar(45) DEFAULT NULL,
  `packing` varchar(45) DEFAULT NULL,
  `insurance` varchar(45) DEFAULT NULL,
  `vehicle_id` varchar(45) DEFAULT NULL,
  `transport_type` enum('Darat','Laut','Udara') DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `special_instruction` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `request_shipment_date` varchar(45) DEFAULT NULL,
  `status` enum('Pending','Shipping','Shipped','Invoiced','Complete','Cancel','Reject','Return') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_detail`
--

CREATE TABLE IF NOT EXISTS `transaction_detail` (
  `id` int(11) NOT NULL,
  `master_price_id` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `user_type_id` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `user_type_id`, `date`, `last_modified`, `last_activity`, `status`) VALUES
(1, 'temals', 'd41d8cd98f00b204e9800998ecf8427e', 'Slamet Mulyadi', 'temals.mulyadi@gmail.com', '1', '2014-06-09', '2014-06-09 00:00:00', '2014-06-09 00:00:00', 'Active'),
(2, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'Administrator', 'adminweb@ics.co.id', '1', '2014-06-10', '2014-06-10 00:00:00', '2014-06-10 00:00:00', 'Active'),
(4, 'superuser', 'd41d8cd98f00b204e9800998ecf8427e', 'super user', 'superuser@ics.co.id', '1', NULL, NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(150) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`, `description`) VALUES
(1, 'super_users', ''),
(2, 'Admnistrator', ''),
(4, 'moderator', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

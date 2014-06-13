-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jun 2014 pada 16.19
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
-- Struktur dari tabel `attachment`
--

CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(45) DEFAULT NULL,
  `attachment_no` varchar(45) DEFAULT NULL,
  `type` enum('Original','Copy','Other') DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL COMMENT 'nama dokumen',
  `filename` varchar(45) DEFAULT NULL COMMENT 'nama file beserta path yang tersimpan',
  `quantitiy` int(11) DEFAULT NULL COMMENT 'banyaknya dokumen',
  `unit_id` int(4) DEFAULT NULL,
  `status` enum('Hold','Shipping','Return') DEFAULT NULL COMMENT 'Hold = pegangan supir atau bukti expedisi, shipping = dikirim kepada penerima, return = dikembalikan pada customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `attachment_return`
--

CREATE TABLE IF NOT EXISTS `attachment_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(4) DEFAULT NULL,
  `attachment_id` int(4) DEFAULT NULL,
  `remark` text,
  `date` date DEFAULT NULL,
  `status` enum('Publish','Unpublish') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(4) DEFAULT NULL,
  `no_invoice` varchar(45) DEFAULT NULL,
  `faktur_pajak_id` int(4) DEFAULT NULL,
  `due_date` date DEFAULT NULL COMMENT 'batas pembayaran',
  `payment_date` date DEFAULT NULL COMMENT 'tanggal dilakukannya pembayaran',
  `down_payment` int(11) DEFAULT NULL COMMENT 'DP yang telah masuk',
  `description` text,
  `user_id` int(4) DEFAULT NULL COMMENT 'User Pembuat Invoice',
  `date` date DEFAULT NULL COMMENT 'tanggal dibuat invoice',
  `status` enum('Pending','Approve','Complete') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table Invoice Penagihan, Dengan detail pada Invoice_detail' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_detail`
--

CREATE TABLE IF NOT EXISTS `invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) DEFAULT NULL,
  `charge` int(11) DEFAULT NULL,
  `vat` int(11) DEFAULT NULL,
  `packing` int(11) DEFAULT NULL,
  `other` int(11) DEFAULT NULL,
  `down_payment` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Detail POD yang terpilih untuk penagihan invoice' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE IF NOT EXISTS `jurnal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_jurnal` varchar(45) DEFAULT NULL,
  `coa_id` int(11) DEFAULT NULL,
  `debit` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_address`
--

CREATE TABLE IF NOT EXISTS `master_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `type` enum('Picking','Shipment','Warehouse','Office','Other') DEFAULT NULL,
  `address` text,
  `location_id` int(11) DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `status` enum('Active','Inactive','Trashed') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_charter_price`
--

CREATE TABLE IF NOT EXISTS `master_charter_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type_id` int(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `location_id` int(4) DEFAULT NULL,
  `dest_location_id` int(4) DEFAULT NULL,
  `delivery_time` date DEFAULT NULL,
  `return_doc_time` date DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Harga Penyewaan Kendaraan' AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `master_charter_price`
--

INSERT INTO `master_charter_price` (`id`, `vehicle_type_id`, `price`, `location_id`, `dest_location_id`, `delivery_time`, `return_doc_time`, `status`) VALUES
(3, 3, 20000, 2, 1, '2014-06-28', '2014-06-26', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_coa`
--

CREATE TABLE IF NOT EXISTS `master_coa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `master_coa`
--

INSERT INTO `master_coa` (`id`, `kode`, `name`, `description`) VALUES
(1, '1001', 'Uang Kas', 'Uang Kas'),
(2, '1002', 'Tabungan BCA', 'description tabungan bca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_company`
--

CREATE TABLE IF NOT EXISTS `master_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Pusat','Cabang','Customer') DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `address` text,
  `location_id` int(4) DEFAULT NULL,
  `npwp` varchar(45) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact_name` varchar(45) DEFAULT NULL,
  `contact_phone` varchar(15) DEFAULT NULL,
  `tax` varchar(15) DEFAULT NULL,
  `discount` varchar(15) DEFAULT NULL,
  `term_payment` varchar(15) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `master_company`
--

INSERT INTO `master_company` (`id`, `type`, `name`, `address`, `location_id`, `npwp`, `phone`, `mobile`, `fax`, `email`, `contact_name`, `contact_phone`, `tax`, `discount`, `term_payment`, `status`) VALUES
(11, 'Customer', 'Dua Kelinci', 'Jl. Dua belas blok 14', NULL, '1132312312', '871238192', '0891291238', 'fax', 'lalal@lala.com', NULL, NULL, NULL, NULL, NULL, 'Active'),
(12, '', 'Digjaya Express', 'Jl duapuluh empat blok duapuluh lima', NULL, '77261283', '881293129', '08291293123', '881293128', 'dig@jaya.example', NULL, NULL, NULL, NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_faktur_pajak`
--

CREATE TABLE IF NOT EXISTS `master_faktur_pajak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_faktur` varchar(45) DEFAULT NULL,
  `status` enum('Available','Unavailable') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `master_faktur_pajak`
--

INSERT INTO `master_faktur_pajak` (`id`, `no_faktur`, `status`) VALUES
(1, '1001', 'Available');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `master_location`
--

INSERT INTO `master_location` (`id`, `location`, `type`, `parent_id`, `status`) VALUES
(1, 'Jakarta-Barat', 'Jawa-Barat', 1, 'Active'),
(2, 'Jakarta-Timur', 'Jawa-Barat', 2, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_price`
--

CREATE TABLE IF NOT EXISTS `master_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `dest_location_id` int(11) DEFAULT NULL,
  `min_weight` int(11) DEFAULT NULL,
  `land_price` int(11) DEFAULT NULL,
  `air_price` int(11) DEFAULT NULL,
  `water_price` int(11) DEFAULT NULL,
  `over_tonage_price` int(11) DEFAULT NULL COMMENT 'harga kelebihan beban jika menggunakan armada',
  `description` text,
  `expired` date DEFAULT NULL,
  `status` enum('Active','Inactive','Trashed') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `master_price`
--

INSERT INTO `master_price` (`id`, `name`, `location_id`, `dest_location_id`, `min_weight`, `land_price`, `air_price`, `water_price`, `over_tonage_price`, `description`, `expired`, `status`) VALUES
(4, 'Jabrik', 1, 2, 20, 20, 20, 20, 20, 'TES', '2014-06-11', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_staff`
--

CREATE TABLE IF NOT EXISTS `master_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(4) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  `identity` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `departemen` varchar(45) DEFAULT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `master_staff`
--

INSERT INTO `master_staff` (`id`, `company_id`, `user_id`, `identity`, `name`, `departemen`, `jabatan`, `gender`, `agama`, `address`, `phone`, `mobile`, `email`, `status`) VALUES
(2, 12, 1, '327502195207177', 'Slamet Mulyadi', 'Agama', 'Prjurit', 'Pria', 'Islam', 'Jakarta-Timur', '02195207177', '08811659664', 'Example@yanto.com', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_unit`
--

CREATE TABLE IF NOT EXISTS `master_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(45) DEFAULT NULL,
  `type` enum('Jarak','Berat','Waktu') DEFAULT NULL,
  `description` text,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `master_unit`
--

INSERT INTO `master_unit` (`id`, `unit`, `type`, `description`, `status`) VALUES
(1, '10', 'Jarak', 'Sedang melakukan perjalanan', 'Active');

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
  `no_polisi` varchar(15) DEFAULT NULL,
  `pemilik` varchar(45) DEFAULT NULL,
  `tahun_pembuatan` varchar(45) DEFAULT NULL,
  `no_rangka` varchar(45) DEFAULT NULL,
  `no_mesin` varchar(45) DEFAULT NULL,
  `bahan_bakar` varchar(45) DEFAULT NULL,
  `no_kir` varchar(45) DEFAULT NULL,
  `nomer_bbpkb` varchar(45) DEFAULT NULL,
  `capacity_weight` varchar(45) DEFAULT NULL,
  `expired_stnk` date DEFAULT NULL,
  `expired_ibm` date DEFAULT NULL,
  `expired_sipa` date DEFAULT NULL,
  `driver_id` int(4) DEFAULT NULL,
  `company_id` int(4) DEFAULT NULL COMMENT 'untuk mengetahui pemilik adalah trimulya / vendor',
  `date` date DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `master_vehicle`
--

INSERT INTO `master_vehicle` (`id`, `merk`, `type`, `jenis`, `model`, `no_polisi`, `pemilik`, `tahun_pembuatan`, `no_rangka`, `no_mesin`, `bahan_bakar`, `no_kir`, `nomer_bbpkb`, `capacity_weight`, `expired_stnk`, `expired_ibm`, `expired_sipa`, `driver_id`, `company_id`, `date`, `last_modified`, `status`) VALUES
(2, 'Datsun', 'TYPE 1', 'Lama', 'Baru', 'B 1010 PB', 'Jambrong', '1945', '01241561334313213', '021111455474115254', 'Premium', '00014524', '01245211', '100 ML', '2016-06-30', '2014-09-26', '2014-06-28', 2, 12, '2014-06-20', '2014-06-28 00:00:00', 'Active'),
(3, 'Daihatsu', 'TYPE 2', 'Lama', 'Baru', 'B 3010 SIP', 'Jabrik', '1945', '01241561334313213', '021111455474115254', 'Premium', '00014524', '01245211', '100 ML', '2016-06-30', '2014-09-26', '2014-06-28', 2, 11, '2014-06-20', '2014-06-28 00:00:00', 'Active');

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
('1ab673c8fe9ad5c43af344bb9b458bd9', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0', 1402755438, 'a:1:{s:4:"user";a:4:{s:2:"id";s:1:"4";s:8:"username";s:9:"superuser";s:5:"email";s:19:"superuser@ics.co.id";s:12:"user_type_id";s:1:"1";}}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipment`
--

CREATE TABLE IF NOT EXISTS `shipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sppb` varchar(45) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `second_driver_id` varchar(45) DEFAULT NULL,
  `active_location_id` varchar(45) DEFAULT NULL,
  `description` text,
  `date` date DEFAULT NULL,
  `penyerah` varchar(45) DEFAULT NULL COMMENT 'penyerah sppb, umumnya bagian gudang',
  `penerima` varchar(45) DEFAULT NULL COMMENT 'penerima barang untuk general, penerima secara detail pada bagian shipment detail',
  `shipping_date` date DEFAULT NULL COMMENT 'tanggal berangkat',
  `arrived_date` date DEFAULT NULL COMMENT 'tanggal sampai pada tujuan terakhir',
  `complete_date` date DEFAULT NULL COMMENT 'tanggal kembali',
  `status` enum('Pending','Shipping','Arrived','Complete') DEFAULT NULL COMMENT 'pending = tunda, shipping = prosess pengiriman, arrived = sampai pada tujuan, complete = telah kembali dan pengiriman selesai',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table Pengiriman' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipment_detail`
--

CREATE TABLE IF NOT EXISTS `shipment_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) DEFAULT NULL,
  `penyerah` varchar(45) DEFAULT NULL,
  `penerima` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shipping_date` date DEFAULT NULL,
  `arrived_date` date DEFAULT NULL,
  `complete_date` date DEFAULT NULL,
  `remark` text,
  `status` enum('Pending','Shipping','Arrived','Complete') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='detail pengiriman by pod atau transaksi' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pod` varchar(25) DEFAULT NULL COMMENT '(cmp)(yyyymmdd)(urutan)',
  `customer_id` int(4) DEFAULT NULL COMMENT 'relasi pada table company.id',
  `pick_address_id` int(4) DEFAULT NULL,
  `ship_address_id` int(4) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `gross_weight` float DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `volume_weight` float DEFAULT NULL,
  `drescription_goods` text,
  `dangerous_goods` int(1) DEFAULT NULL,
  `packing` int(1) DEFAULT NULL,
  `insurance` int(1) DEFAULT NULL,
  `vehicle_id` int(4) DEFAULT NULL COMMENT 'apakah charter kendaraan',
  `transport_type` enum('Darat','Laut','Udara') DEFAULT NULL,
  `remarks` text,
  `price` int(11) DEFAULT NULL COMMENT 'Total Harga, harga secara detail terdapat di transaction_detail',
  `special_instruction` text,
  `date` date DEFAULT NULL,
  `request_shipment_date` date DEFAULT NULL,
  `pickup_by` varchar(45) DEFAULT NULL,
  `pickup_date` date DEFAULT NULL,
  `delivered_by` varchar(45) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `handover_by` varchar(45) DEFAULT NULL,
  `handover_date` date DEFAULT NULL,
  `received_by` varchar(45) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `status` enum('Pending','Shipping','Shipped','Invoiced','Complete','Cancel','Reject','Return') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id`, `no_pod`, `customer_id`, `pick_address_id`, `ship_address_id`, `quantity`, `gross_weight`, `volume`, `volume_weight`, `drescription_goods`, `dangerous_goods`, `packing`, `insurance`, `vehicle_id`, `transport_type`, `remarks`, `price`, `special_instruction`, `date`, `request_shipment_date`, `pickup_by`, `pickup_date`, `delivered_by`, `delivery_date`, `handover_by`, `handover_date`, `received_by`, `received_date`, `status`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_detail_price`
--

CREATE TABLE IF NOT EXISTS `transaction_detail_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_price_id` int(11) DEFAULT NULL,
  `description` text,
  `price` int(11) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'temals', 'd41d8cd98f00b204e9800998ecf8427e', 'temals', 'temals.mulyadi@gmail.com', '1', '2014-06-09', '2014-06-09 00:00:00', '2014-06-09 00:00:00', 'Active'),
(2, 'admin', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Administrator', 'adminweb@ics.co.id', '2', '2014-06-10', '2014-06-10 00:00:00', '2014-06-10 00:00:00', 'Active'),
(4, 'superuser', '0baea2f0ae20150db78f58cddac442a9', 'super user', 'superuser@ics.co.id', '1', NULL, NULL, NULL, 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(150) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`, `description`) VALUES
(1, 'super_users', ''),
(2, 'Admnistrator', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

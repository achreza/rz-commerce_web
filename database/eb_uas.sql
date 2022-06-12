-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for eb_uas
CREATE DATABASE IF NOT EXISTS `eb_uas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `eb_uas`;

-- Dumping structure for table eb_uas.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(150) NOT NULL DEFAULT '0',
  `id_tipe` int(11) NOT NULL DEFAULT '0',
  `harga` int(11) NOT NULL DEFAULT '0',
  `deskripsi` varchar(250) NOT NULL DEFAULT '0',
  `stok` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.barang: ~3 rows (approximately)
DELETE FROM `barang`;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id`, `nama_barang`, `id_tipe`, `harga`, `deskripsi`, `stok`) VALUES
	(1, 'Baju Koko Spesial', 1, 750000, 'Baju Koko Kualitas Super', 49),
	(2, 'Hijab Army', 2, 80000, 'Hijab Kualitas Super', 1),
	(5, 'Baju Gamisz', 1, 750000, 'sdsadsa', 7);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table eb_uas.gambar
CREATE TABLE IF NOT EXISTS `gambar` (
  `id_barang` int(11) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.gambar: ~4 rows (approximately)
DELETE FROM `gambar`;
/*!40000 ALTER TABLE `gambar` DISABLE KEYS */;
INSERT INTO `gambar` (`id_barang`, `foto`) VALUES
	(1, 'wHMzM4XgCC.jpg'),
	(2, 'hijab-warna-army.jpg'),
	(4, 'photo6145706156417463327.jpg'),
	(5, 'WhatsApp Image 2022-04-22 at 09.13.14.jpeg');
/*!40000 ALTER TABLE `gambar` ENABLE KEYS */;

-- Dumping structure for table eb_uas.keranjang
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_barang` int(11) NOT NULL DEFAULT '0',
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `id_size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.keranjang: ~0 rows (approximately)
DELETE FROM `keranjang`;
/*!40000 ALTER TABLE `keranjang` DISABLE KEYS */;
INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `id_barang`, `jumlah`, `id_size`) VALUES
	(2, 1, 5, 1, 1);
/*!40000 ALTER TABLE `keranjang` ENABLE KEYS */;

-- Dumping structure for table eb_uas.level
CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.level: ~2 rows (approximately)
DELETE FROM `level`;
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`id_level`, `nama_level`) VALUES
	(1, 'Admin'),
	(2, 'Pengguna');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table eb_uas.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id_logs` int(11) NOT NULL AUTO_INCREMENT,
  `isi` varchar(250) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_logs`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.logs: ~0 rows (approximately)
DELETE FROM `logs`;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for table eb_uas.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.pembayaran: ~16 rows (approximately)
DELETE FROM `pembayaran`;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id`, `user`, `total`, `tanggal`) VALUES
	(1, 1, 20000, '2022-05-31'),
	(2, 1, 4820000, '2022-05-31'),
	(3, 1, 4820000, '2022-05-31'),
	(4, 1, 4820000, '2022-05-31'),
	(5, 1, 2250000, '2022-05-31'),
	(6, 1, 2250000, '2022-05-31'),
	(7, 1, 2250000, '2022-05-31'),
	(8, 1, 800000, '2022-05-31'),
	(9, 1, 160000, '2022-05-31'),
	(10, 1, 160000, '2022-05-31'),
	(11, 1, 1820000, '2022-05-31'),
	(12, 3, 3000000, '2022-05-31'),
	(13, 3, 1580000, '2022-06-01'),
	(14, 3, 160000, '2022-06-01'),
	(15, 3, 910000, '2022-06-01'),
	(16, 3, 320000, '2022-06-04');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

-- Dumping structure for table eb_uas.size
CREATE TABLE IF NOT EXISTS `size` (
  `id_size` int(11) NOT NULL AUTO_INCREMENT,
  `ukuran` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_size`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.size: ~5 rows (approximately)
DELETE FROM `size`;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` (`id_size`, `ukuran`) VALUES
	(1, 'S'),
	(2, 'M'),
	(3, 'L'),
	(4, 'XL'),
	(6, 'XXL');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;

-- Dumping structure for table eb_uas.tipe
CREATE TABLE IF NOT EXISTS `tipe` (
  `id_tipe` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipe`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.tipe: ~6 rows (approximately)
DELETE FROM `tipe`;
/*!40000 ALTER TABLE `tipe` DISABLE KEYS */;
INSERT INTO `tipe` (`id_tipe`, `nama_tipe`) VALUES
	(1, 'Nahass'),
	(2, 'Hijabs'),
	(3, 'Coba'),
	(4, 'sadsad'),
	(5, 'sasdsas'),
	(6, 'hahahaa');
/*!40000 ALTER TABLE `tipe` ENABLE KEYS */;

-- Dumping structure for table eb_uas.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL DEFAULT '0',
  `password` varchar(250) NOT NULL DEFAULT '0',
  `nama` varchar(250) DEFAULT NULL,
  `id_level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.user: ~3 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `nama`, `id_level`) VALUES
	(1, 'tes', 'tes', 'TESTING', 1),
	(2, 'reza', 'reza', 'Reza', 2),
	(3, 'eja', 'eja', 'Eja', 2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table eb_uas.wishlist
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id_wishlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_wishlist`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table eb_uas.wishlist: ~6 rows (approximately)
DELETE FROM `wishlist`;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` (`id_wishlist`, `id_barang`, `id_user`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 2, 1),
	(4, 2, 1),
	(5, 1, 1),
	(6, 1, 3);
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;

-- Dumping structure for trigger eb_uas.keranjang_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `keranjang_after_insert` AFTER INSERT ON `keranjang` FOR EACH ROW BEGIN
 UPDATE barang SET stok = stok - NEW.jumlah WHERE id = NEW.id_barang;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

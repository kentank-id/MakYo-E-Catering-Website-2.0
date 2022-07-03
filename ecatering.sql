-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2022 at 04:50 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecatering`
--

-- --------------------------------------------------------

--
-- Table structure for table `menumakanan`
--

DROP TABLE IF EXISTS `menumakanan`;
CREATE TABLE IF NOT EXISTS `menumakanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `rincian` text NOT NULL,
  `harga` int(20) NOT NULL,
  `rating` int(10) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menumakanan`
--

INSERT INTO `menumakanan` (`id`, `nama`, `rincian`, `harga`, `rating`, `gambar`) VALUES
(1, 'Makan 1', 'Nasi + Ayam Goreng + Sop Ayam + Lalapan', 15000, 5, 'http://localhost/uas_pwl/img/makan1.jpg'),
(2, 'Makan 2', 'Nasi Goreng + Mendoan + Kerupuk', 10000, 5, 'http://localhost/uas_pwl/img/makan2.jpg'),
(3, 'Makan 3', 'Nasi + Sop Ayam + Bakwan + Lalapan', 12000, 4, 'http://localhost/uas_pwl/img/makan3.jpg'),
(4, 'Makan 4', 'Lontong + Opor Ayam + Kerupuk', 15000, 4, 'http://localhost/uas_pwl/img/makan4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menuminuman`
--

DROP TABLE IF EXISTS `menuminuman`;
CREATE TABLE IF NOT EXISTS `menuminuman` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(50) NOT NULL,
  `rincian` text NOT NULL,
  `harga` int(20) NOT NULL,
  `rating` int(10) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuminuman`
--

INSERT INTO `menuminuman` (`id`, `nama`, `rincian`, `harga`, `rating`, `gambar`) VALUES
(5, 'Ice Tea', 'Perpaduan Es dan Teh Jawa', 3000, 6, 'http://localhost/uas_pwl/img/minum1.jpg'),
(6, 'Lemon Tea', 'Perpaduan Es + Teh dan Jeruk Limau', 4000, 5, 'http://localhost/uas_pwl/img/minum2.jpg'),
(7, 'Juz Jambu', 'Perpaduan Es dan Buah Jambu Kristal Fresh langsung dari pohon', 6000, 4, 'http://localhost/uas_pwl/img/minum3.jpg'),
(8, 'Soda Gembira', 'Perpaduan berbagai rasa manis dan asam dalam satu minuman yang mengembalikan mood gembira anda', 10000, 3, 'http://localhost/uas_pwl/img/minum4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

DROP TABLE IF EXISTS `pembeli`;
CREATE TABLE IF NOT EXISTS `pembeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempmakan`
--

DROP TABLE IF EXISTS `tempmakan`;
CREATE TABLE IF NOT EXISTS `tempmakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempminum`
--

DROP TABLE IF EXISTS `tempminum`;
CREATE TABLE IF NOT EXISTS `tempminum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembeli_id` int(11) NOT NULL,
  `makanan` json NOT NULL,
  `minuman` json NOT NULL,
  `totalharga` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

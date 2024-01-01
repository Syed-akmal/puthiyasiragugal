-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 01, 2024 at 12:31 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `savingId` int NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_on` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`) VALUES
(1, 'Administrator', 'admin', '5d41402abc4b2a76b9719d911017c592'),
(2, 'Administrator', 'Puthiyasiragugal', '25b173c5ec817ea1aa5f8a344141f292');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

DROP TABLE IF EXISTS `customer_details`;
CREATE TABLE IF NOT EXISTS `customer_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `namegroup` varchar(50) NOT NULL,
  `client_id` varchar(50) NOT NULL,
  `centre_name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `app_relation` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `additional_phone_number` varchar(50) NOT NULL,
  `marital_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `religion` varchar(50) NOT NULL,
  `co_applicant_name` varchar(50) NOT NULL,
  `co_applicant_dob` varchar(50) NOT NULL,
  `co_applicant_gender` varchar(50) NOT NULL,
  `co_applicant_app_relation` varchar(50) NOT NULL,
  `co_applicant_address` varchar(255) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `father_dob` varchar(50) NOT NULL,
  `father_app_relation` varchar(50) NOT NULL,
  `father_address` varchar(255) NOT NULL,
  `applicant_photo` varchar(255) NOT NULL,
  `applicant_photo2` varchar(255) NOT NULL,
  `aadhar_photo` varchar(255) NOT NULL,
  `ration_photo` varchar(255) NOT NULL,
  `co_applicant_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `co_applicant_aadhar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `co_applicant_ration` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `name`, `branch_code`, `branch`, `namegroup`, `client_id`, `centre_name`, `dob`, `gender`, `occupation`, `app_relation`, `address`, `phone_number`, `additional_phone_number`, `marital_status`, `religion`, `co_applicant_name`, `co_applicant_dob`, `co_applicant_gender`, `co_applicant_app_relation`, `co_applicant_address`, `father_name`, `father_dob`, `father_app_relation`, `father_address`, `applicant_photo`, `applicant_photo2`, `aadhar_photo`, `ration_photo`, `co_applicant_photo`, `co_applicant_aadhar`, `co_applicant_ration`, `created_date`) VALUES
(1, 'Syed Akmal', 'demo', 'demo', '', 'demo', 'demo', '', 'Male', 'Business', '', '36,KVR nagar, Mahalakshmi Nagar, K.Pudur, Madurai, Tamilnadu', '9489550848', '', '', '', '', '', '', '', '', 'demo', '', '', '', '1704010697_AadharPhoto.jpeg', '1704010697_ApplicantPhoto.png', '1704010697_fastura-logo_(1).png', '1704010697_panathottam.jpg', '', '', '', '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `kostumer`
--

DROP TABLE IF EXISTS `kostumer`;
CREATE TABLE IF NOT EXISTS `kostumer` (
  `kostumer_id` int NOT NULL AUTO_INCREMENT,
  `kostumer_nama` varchar(255) NOT NULL,
  `kostumer_alamat` text NOT NULL,
  `kostumer_jk` varchar(10) NOT NULL,
  `kostumer_hp` varchar(20) NOT NULL,
  `kostumer_ktp` varchar(50) NOT NULL,
  PRIMARY KEY (`kostumer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `loan_amount` varchar(255) NOT NULL,
  `totalloanamount` varchar(100) NOT NULL,
  `loan_period` varchar(100) NOT NULL,
  `loan_cycle` varchar(100) NOT NULL,
  `numberLoan` varchar(255) NOT NULL,
  `outstanding` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `created_on` date NOT NULL,
  `witness_signature_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `witness_signature_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `applicant_signature` varchar(255) NOT NULL,
  `co_applicant_signature` varchar(255) NOT NULL,
  `loanofficer_signature` varchar(255) NOT NULL,
  `loan_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `customer_id`, `loan_amount`, `totalloanamount`, `loan_period`, `loan_cycle`, `numberLoan`, `outstanding`, `paid`, `created_on`, `witness_signature_1`, `witness_signature_2`, `applicant_signature`, `co_applicant_signature`, `loanofficer_signature`, `loan_status`) VALUES
(1, 1, '1000', '1200', '7', 'monthly', '', '', '', '2024-01-01', '', '', '', '', '', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

DROP TABLE IF EXISTS `mobil`;
CREATE TABLE IF NOT EXISTS `mobil` (
  `mobil_id` int NOT NULL AUTO_INCREMENT,
  `mobil_merk` varchar(30) NOT NULL,
  `mobil_plat` varchar(20) NOT NULL,
  `mobil_warna` varchar(30) NOT NULL,
  `mobil_tahun` int NOT NULL,
  `mobil_status` int NOT NULL,
  PRIMARY KEY (`mobil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`mobil_id`, `mobil_merk`, `mobil_plat`, `mobil_warna`, `mobil_tahun`, `mobil_status`) VALUES
(1, 'rrtr', 'rtrt', '787', 90, 0),
(2, 'rrtr', 'rtrt', 'rtrt', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `saving_customer_details`
--

DROP TABLE IF EXISTS `saving_customer_details`;
CREATE TABLE IF NOT EXISTS `saving_customer_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `applicant_photo` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

DROP TABLE IF EXISTS `term`;
CREATE TABLE IF NOT EXISTS `term` (
  `id` int NOT NULL AUTO_INCREMENT,
  `loan_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `term` varchar(100) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `collectionDate` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `loan_id`, `customer_id`, `term`, `amount`, `collectionDate`, `status`) VALUES
(1, 1, 1, '1', '500', '2024-01-01', 'Paid'),
(2, 1, 1, '2', '700', '2024-01-01', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `termaccount`
--

DROP TABLE IF EXISTS `termaccount`;
CREATE TABLE IF NOT EXISTS `termaccount` (
  `id` int NOT NULL AUTO_INCREMENT,
  `savingid` int NOT NULL,
  `accountid` int NOT NULL,
  `term` int NOT NULL,
  `amount` int NOT NULL,
  `collectionDate` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE IF NOT EXISTS `transaksi` (
  `transaksi_id` int NOT NULL AUTO_INCREMENT,
  `transaksi_karyawan` int NOT NULL,
  `transaksi_kostumer` int NOT NULL,
  `transaksi_mobil` int NOT NULL,
  `transaksi_tgl_pinjam` date NOT NULL,
  `transaksi_tgl_kembali` date NOT NULL,
  `transaksi_harga` int NOT NULL,
  `transaksi_denda` int NOT NULL,
  `transaksi_tgl` date NOT NULL,
  `transaksi_totaldenda` int NOT NULL,
  `transaksi_status` int NOT NULL,
  `transaksi_tgldikembalikan` date NOT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

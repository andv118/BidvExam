-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 07:59 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidv-hcm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `maadmin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`maadmin`, `matkhau`) VALUES
('bidv-hcm', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `bode`
--

CREATE TABLE IF NOT EXISTS `bode` (
  `mabode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenbode` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `diemmax` float DEFAULT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cathi`
--

CREATE TABLE IF NOT EXISTS `cathi` (
  `macathi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tencathi` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ghichu` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `makythi` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cathi`
--

INSERT INTO `cathi` (`macathi`, `tencathi`, `bd`, `kt`, `ghichu`, `makythi`) VALUES
('KT-NNCV-CA01', 'Ca 1', '2018-12-10 17:00:00', '2018-12-14 17:00:00', 'Ca thi 1 buổi sáng', 'KT-NNCV');

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE IF NOT EXISTS `cauhoi` (
  `macauhoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tencauhoi` varchar(3200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapan` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paA` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paB` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paC` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paD` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paE` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paF` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviauTencauhoi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaA` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaB` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaC` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaD` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaE` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaF` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tron` int(1) DEFAULT NULL,
  `mucdo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodiem` float DEFAULT NULL,
  `mabode` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpthi`
--

CREATE TABLE IF NOT EXISTS `cpthi` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cpthi`
--

INSERT INTO `cpthi` (`sbd`, `mamodun`, `cp`) VALUES
('CV184', 'TAB', 'C'),
('CV184', 'TAC', 'C'),
('CV184', 'TQ', 'C'),
('CV185', 'TAB', 'C'),
('CV185', 'TAC', 'C'),
('CV185', 'TQ', 'C'),
('CV186', 'TAB', 'C'),
('CV186', 'TAC', 'C'),
('CV186', 'TQ', 'C'),
('CV187', 'TAB', 'C'),
('CV187', 'TAC', 'C'),
('CV187', 'TQ', 'C'),
('CV188', 'TAB', 'C'),
('CV188', 'TAC', 'C'),
('CV188', 'TQ', 'C'),
('CV189', 'TAB', 'C'),
('CV189', 'TAC', 'C'),
('CV189', 'TQ', 'C'),
('CV190', 'TAB', 'C'),
('CV190', 'TAC', 'C'),
('CV190', 'TQ', 'C'),
('CV191', 'TAB', 'C'),
('CV191', 'TAC', 'C'),
('CV191', 'TQ', 'C'),
('CV192', 'TAB', 'C'),
('CV192', 'TAC', 'C'),
('CV192', 'TQ', 'C'),
('CV193', 'TAB', 'C'),
('CV193', 'TAC', 'C'),
('CV193', 'TQ', 'C'),
('CV194', 'TAB', 'C'),
('CV194', 'TAC', 'C'),
('CV194', 'TQ', 'C'),
('CV195', 'TAB', 'C'),
('CV195', 'TAC', 'C'),
('CV195', 'TQ', 'C'),
('CV196', 'TAB', 'C'),
('CV196', 'TAC', 'C'),
('CV196', 'TQ', 'C'),
('CV197', 'TAB', 'C'),
('CV197', 'TAC', 'C'),
('CV197', 'TQ', 'C'),
('CV198', 'TAB', 'C'),
('CV198', 'TAC', 'C'),
('CV198', 'TQ', 'C'),
('CV199', 'TAB', 'C'),
('CV199', 'TAC', 'C'),
('CV199', 'TQ', 'C'),
('CV200', 'TAB', 'C'),
('CV200', 'TAC', 'C'),
('CV200', 'TQ', 'C'),
('CV201', 'TAB', 'C'),
('CV201', 'TAC', 'C'),
('CV201', 'TQ', 'C'),
('CV202', 'TAB', 'C'),
('CV202', 'TAC', 'C'),
('CV202', 'TQ', 'C'),
('CV203', 'TAB', 'C'),
('CV203', 'TAC', 'C'),
('CV203', 'TQ', 'C'),
('CV204', 'TAB', 'C'),
('CV204', 'TAC', 'C'),
('CV204', 'TQ', 'C'),
('CV205', 'TAB', 'C'),
('CV205', 'TAC', 'C'),
('CV205', 'TQ', 'C'),
('CV206', 'TAB', 'C'),
('CV206', 'TAC', 'C'),
('CV206', 'TQ', 'C'),
('CV207', 'TAB', 'C'),
('CV207', 'TAC', 'C'),
('CV207', 'TQ', 'C'),
('CV208', 'TAB', 'C'),
('CV208', 'TAC', 'C'),
('CV208', 'TQ', 'C'),
('CV209', 'TAB', 'C'),
('CV209', 'TAC', 'C'),
('CV209', 'TQ', 'C'),
('CV210', 'TAB', 'C'),
('CV210', 'TAC', 'C'),
('CV210', 'TQ', 'C'),
('CV211', 'TAB', 'C'),
('CV211', 'TAC', 'C'),
('CV211', 'TQ', 'C'),
('CV212', 'TAB', 'C'),
('CV212', 'TAC', 'C'),
('CV212', 'TQ', 'C'),
('CV213', 'TAB', 'C'),
('CV213', 'TAC', 'C'),
('CV213', 'TQ', 'C'),
('CV214', 'TAB', 'C'),
('CV214', 'TAC', 'C'),
('CV214', 'TQ', 'C'),
('CV215', 'TAB', 'C'),
('CV215', 'TAC', 'C'),
('CV215', 'TQ', 'C'),
('CV216', 'TAB', 'C'),
('CV216', 'TAC', 'C'),
('CV216', 'TQ', 'C'),
('CV217', 'TAB', 'C'),
('CV217', 'TAC', 'C'),
('CV217', 'TQ', 'C'),
('CV218', 'TAB', 'C'),
('CV218', 'TAC', 'C'),
('CV218', 'TQ', 'C'),
('CV219', 'TAB', 'C'),
('CV219', 'TAC', 'C'),
('CV219', 'TQ', 'C'),
('CV220', 'TAB', 'C'),
('CV220', 'TAC', 'C'),
('CV220', 'TQ', 'C'),
('CV221', 'TAB', 'C'),
('CV221', 'TAC', 'C'),
('CV221', 'TQ', 'C'),
('CV222', 'TAB', 'C'),
('CV222', 'TAC', 'C'),
('CV222', 'TQ', 'C'),
('CV223', 'TAB', 'C'),
('CV223', 'TAC', 'C'),
('CV223', 'TQ', 'C'),
('CV224', 'TAB', 'C'),
('CV224', 'TAC', 'C'),
('CV224', 'TQ', 'C'),
('CV225', 'TAB', 'C'),
('CV225', 'TAC', 'C'),
('CV225', 'TQ', 'C'),
('CV226', 'TAB', 'C'),
('CV226', 'TAC', 'C'),
('CV226', 'TQ', 'C'),
('CV227', 'TAB', 'C'),
('CV227', 'TAC', 'C'),
('CV227', 'TQ', 'C'),
('CV228', 'TAB', 'C'),
('CV228', 'TAC', 'C'),
('CV228', 'TQ', 'C'),
('CV229', 'TAB', 'C'),
('CV229', 'TAC', 'C'),
('CV229', 'TQ', 'C'),
('CV230', 'TAB', 'C'),
('CV230', 'TAC', 'C'),
('CV230', 'TQ', 'C'),
('CV231', 'TAB', 'C'),
('CV231', 'TAC', 'C'),
('CV231', 'TQ', 'C'),
('CV232', 'TAB', 'C'),
('CV232', 'TAC', 'C'),
('CV232', 'TQ', 'C'),
('CV233', 'TAB', 'C'),
('CV233', 'TAC', 'C'),
('CV233', 'TQ', 'C'),
('CV234', 'TAB', 'C'),
('CV234', 'TAC', 'C'),
('CV234', 'TQ', 'C'),
('CV235', 'TAB', 'C'),
('CV235', 'TAC', 'C'),
('CV235', 'TQ', 'C'),
('CV236', 'TAB', 'C'),
('CV236', 'TAC', 'C'),
('CV236', 'TQ', 'C'),
('CV237', 'TAB', 'C'),
('CV237', 'TAC', 'C'),
('CV237', 'TQ', 'C'),
('CV238', 'TAB', 'C'),
('CV238', 'TAC', 'C'),
('CV238', 'TQ', 'C'),
('CV239', 'TAB', 'C'),
('CV239', 'TAC', 'C'),
('CV239', 'TQ', 'C'),
('CV240', 'TAB', 'C'),
('CV240', 'TAC', 'C'),
('CV240', 'TQ', 'C'),
('CV241', 'TAB', 'C'),
('CV241', 'TAC', 'C'),
('CV241', 'TQ', 'C'),
('CV242', 'TAB', 'C'),
('CV242', 'TAC', 'C'),
('CV242', 'TQ', 'C'),
('CV243', 'TAB', 'C'),
('CV243', 'TAC', 'C'),
('CV243', 'TQ', 'C'),
('CV244', 'TAB', 'C'),
('CV244', 'TAC', 'C'),
('CV244', 'TQ', 'C'),
('CV245', 'TAB', 'C'),
('CV245', 'TAC', 'C'),
('CV245', 'TQ', 'C'),
('CV246', 'TAB', 'C'),
('CV246', 'TAC', 'C'),
('CV246', 'TQ', 'C'),
('CV247', 'TAB', 'C'),
('CV247', 'TAC', 'C'),
('CV247', 'TQ', 'C'),
('CV248', 'TAB', 'C'),
('CV248', 'TAC', 'C'),
('CV248', 'TQ', 'C'),
('CV249', 'TAB', 'C'),
('CV249', 'TAC', 'C'),
('CV249', 'TQ', 'C'),
('CV250', 'TAB', 'C'),
('CV250', 'TAC', 'C'),
('CV250', 'TQ', 'C'),
('CV251', 'TAB', 'C'),
('CV251', 'TAC', 'C'),
('CV251', 'TQ', 'C'),
('CV252', 'TAB', 'C'),
('CV252', 'TAC', 'C'),
('CV252', 'TQ', 'C'),
('CV253', 'TAB', 'C'),
('CV253', 'TAC', 'C'),
('CV253', 'TQ', 'C'),
('CV254', 'TAB', 'C'),
('CV254', 'TAC', 'C'),
('CV254', 'TQ', 'C'),
('CV255', 'TAB', 'C'),
('CV255', 'TAC', 'C'),
('CV255', 'TQ', 'C'),
('CV256', 'TAB', 'C'),
('CV256', 'TAC', 'C'),
('CV256', 'TQ', 'C'),
('CV257', 'TAB', 'C'),
('CV257', 'TAC', 'C'),
('CV257', 'TQ', 'C'),
('CV258', 'TAB', 'C'),
('CV258', 'TAC', 'C'),
('CV258', 'TQ', 'C'),
('CV259', 'TAB', 'C'),
('CV259', 'TAC', 'C'),
('CV259', 'TQ', 'C'),
('CV260', 'TAB', 'C'),
('CV260', 'TAC', 'C'),
('CV260', 'TQ', 'C'),
('CV261', 'TAB', 'C'),
('CV261', 'TAC', 'C'),
('CV261', 'TQ', 'C'),
('CV262', 'TAB', 'C'),
('CV262', 'TAC', 'C'),
('CV262', 'TQ', 'C'),
('CV263', 'TAB', 'C'),
('CV263', 'TAC', 'C'),
('CV263', 'TQ', 'C'),
('CV264', 'TAB', 'C'),
('CV264', 'TAC', 'C'),
('CV264', 'TQ', 'C'),
('CV265', 'TAB', 'C'),
('CV265', 'TAC', 'C'),
('CV265', 'TQ', 'C'),
('CV266', 'TAB', 'C'),
('CV266', 'TAC', 'C'),
('CV266', 'TQ', 'C'),
('CV267', 'TAB', 'C'),
('CV267', 'TAC', 'C'),
('CV267', 'TQ', 'C'),
('CV268', 'TAB', 'C'),
('CV268', 'TAC', 'C'),
('CV268', 'TQ', 'C'),
('CV269', 'TAB', 'C'),
('CV269', 'TAC', 'C'),
('CV269', 'TQ', 'C'),
('CV270', 'TAB', 'C'),
('CV270', 'TAC', 'C'),
('CV270', 'TQ', 'C'),
('CV271', 'TAB', 'C'),
('CV271', 'TAC', 'C'),
('CV271', 'TQ', 'C'),
('CV272', 'TAB', 'C'),
('CV272', 'TAC', 'C'),
('CV272', 'TQ', 'C'),
('CV273', 'TAB', 'C'),
('CV273', 'TAC', 'C'),
('CV273', 'TQ', 'C'),
('CV274', 'TAB', 'C'),
('CV274', 'TAC', 'C'),
('CV274', 'TQ', 'C'),
('CV275', 'TAB', 'C'),
('CV275', 'TAC', 'C'),
('CV275', 'TQ', 'C'),
('CV276', 'TAB', 'C'),
('CV276', 'TAC', 'C'),
('CV276', 'TQ', 'C'),
('CV277', 'TAB', 'C'),
('CV277', 'TAC', 'C'),
('CV277', 'TQ', 'C'),
('CV278', 'TAB', 'C'),
('CV278', 'TAC', 'C'),
('CV278', 'TQ', 'C'),
('CV279', 'TAB', 'C'),
('CV279', 'TAC', 'C'),
('CV279', 'TQ', 'C'),
('CV280', 'TAB', 'C'),
('CV280', 'TAC', 'C'),
('CV280', 'TQ', 'C'),
('CV281', 'TAB', 'C'),
('CV281', 'TAC', 'C'),
('CV281', 'TQ', 'C'),
('CV282', 'TAB', 'C'),
('CV282', 'TAC', 'C'),
('CV282', 'TQ', 'C'),
('CV283', 'TAB', 'C'),
('CV283', 'TAC', 'C'),
('CV283', 'TQ', 'C'),
('CV284', 'TAB', 'C'),
('CV284', 'TAC', 'C'),
('CV284', 'TQ', 'C'),
('CV285', 'TAB', 'C'),
('CV285', 'TAC', 'C'),
('CV285', 'TQ', 'C'),
('CV286', 'TAB', 'C'),
('CV286', 'TAC', 'C'),
('CV286', 'TQ', 'C'),
('CV287', 'TAB', 'C'),
('CV287', 'TAC', 'C'),
('CV287', 'TQ', 'C'),
('CV288', 'TAB', 'C'),
('CV288', 'TAC', 'C'),
('CV288', 'TQ', 'C'),
('CV289', 'TAB', 'C'),
('CV289', 'TAC', 'C'),
('CV289', 'TQ', 'C'),
('CV290', 'TAB', 'C'),
('CV290', 'TAC', 'C'),
('CV290', 'TQ', 'C'),
('CV291', 'TAB', 'C'),
('CV291', 'TAC', 'C'),
('CV291', 'TQ', 'C'),
('CV292', 'TAB', 'C'),
('CV292', 'TAC', 'C'),
('CV292', 'TQ', 'C'),
('CV293', 'TAB', 'C'),
('CV293', 'TAC', 'C'),
('CV293', 'TQ', 'C'),
('CV294', 'TAB', 'C'),
('CV294', 'TAC', 'C'),
('CV294', 'TQ', 'C'),
('CV295', 'TAB', 'C'),
('CV295', 'TAC', 'C'),
('CV295', 'TQ', 'C'),
('CV296', 'TAB', 'C'),
('CV296', 'TAC', 'C'),
('CV296', 'TQ', 'C'),
('CV297', 'TAB', 'C'),
('CV297', 'TAC', 'C'),
('CV297', 'TQ', 'C'),
('CV298', 'TAB', 'C'),
('CV298', 'TAC', 'C'),
('CV298', 'TQ', 'C'),
('CV299', 'TAB', 'C'),
('CV299', 'TAC', 'C'),
('CV299', 'TQ', 'C'),
('CV300', 'TAB', 'C'),
('CV300', 'TAC', 'C'),
('CV300', 'TQ', 'C'),
('CV301', 'TAB', 'C'),
('CV301', 'TAC', 'C'),
('CV301', 'TQ', 'C'),
('CV302', 'TAB', 'C'),
('CV302', 'TAC', 'C'),
('CV302', 'TQ', 'C'),
('CV303', 'TAB', 'C'),
('CV303', 'TAC', 'C'),
('CV303', 'TQ', 'C'),
('CV304', 'TAB', 'C'),
('CV304', 'TAC', 'C'),
('CV304', 'TQ', 'C'),
('CV305', 'TAB', 'C'),
('CV305', 'TAC', 'C'),
('CV305', 'TQ', 'C'),
('CV306', 'TAB', 'C'),
('CV306', 'TAC', 'C'),
('CV306', 'TQ', 'C'),
('CV307', 'TAB', 'C'),
('CV307', 'TAC', 'C'),
('CV307', 'TQ', 'C'),
('CV308', 'TAB', 'C'),
('CV308', 'TAC', 'C'),
('CV308', 'TQ', 'C'),
('CV309', 'TAB', 'C'),
('CV309', 'TAC', 'C'),
('CV309', 'TQ', 'C'),
('CV310', 'TAB', 'C'),
('CV310', 'TAC', 'C'),
('CV310', 'TQ', 'C'),
('CV311', 'TAB', 'C'),
('CV311', 'TAC', 'C'),
('CV311', 'TQ', 'C'),
('CV312', 'TAB', 'C'),
('CV312', 'TAC', 'C'),
('CV312', 'TQ', 'C'),
('CV313', 'TAB', 'C'),
('CV313', 'TAC', 'C'),
('CV313', 'TQ', 'C'),
('CV314', 'TAB', 'C'),
('CV314', 'TAC', 'C'),
('CV314', 'TQ', 'C'),
('CV315', 'TAB', 'C'),
('CV315', 'TAC', 'C'),
('CV315', 'TQ', 'C'),
('CV316', 'TAB', 'C'),
('CV316', 'TAC', 'C'),
('CV316', 'TQ', 'C'),
('CV317', 'TAB', 'C'),
('CV317', 'TAC', 'C'),
('CV317', 'TQ', 'C'),
('CV318', 'TAB', 'C'),
('CV318', 'TAC', 'C'),
('CV318', 'TQ', 'C'),
('CV319', 'TAB', 'C'),
('CV319', 'TAC', 'C'),
('CV319', 'TQ', 'C'),
('CV320', 'TAB', 'C'),
('CV320', 'TAC', 'C'),
('CV320', 'TQ', 'C'),
('CV321', 'TAB', 'C'),
('CV321', 'TAC', 'C'),
('CV321', 'TQ', 'C'),
('CV322', 'TAB', 'C'),
('CV322', 'TAC', 'C'),
('CV322', 'TQ', 'C'),
('CV323', 'TAB', 'C'),
('CV323', 'TAC', 'C'),
('CV323', 'TQ', 'C'),
('CV324', 'TAB', 'C'),
('CV324', 'TAC', 'C'),
('CV324', 'TQ', 'C'),
('CV325', 'TAB', 'C'),
('CV325', 'TAC', 'C'),
('CV325', 'TQ', 'C'),
('CV326', 'TAB', 'C'),
('CV326', 'TAC', 'C'),
('CV326', 'TQ', 'C'),
('CV327', 'TAB', 'C'),
('CV327', 'TAC', 'C'),
('CV327', 'TQ', 'C'),
('CV328', 'TAB', 'C'),
('CV328', 'TAC', 'C'),
('CV328', 'TQ', 'C'),
('CV329', 'TAB', 'C'),
('CV329', 'TAC', 'C'),
('CV329', 'TQ', 'C'),
('CV330', 'TAB', 'C'),
('CV330', 'TAC', 'C'),
('CV330', 'TQ', 'C'),
('CV331', 'TAB', 'C'),
('CV331', 'TAC', 'C'),
('CV331', 'TQ', 'C'),
('CV332', 'TAB', 'C'),
('CV332', 'TAC', 'C'),
('CV332', 'TQ', 'C'),
('CV333', 'TAB', 'C'),
('CV333', 'TAC', 'C'),
('CV333', 'TQ', 'C'),
('CV334', 'TAB', 'C'),
('CV334', 'TAC', 'C'),
('CV334', 'TQ', 'C'),
('CV335', 'TAB', 'C'),
('CV335', 'TAC', 'C'),
('CV335', 'TQ', 'C'),
('CV336', 'TAB', 'C'),
('CV336', 'TAC', 'C'),
('CV336', 'TQ', 'C'),
('CV337', 'TAB', 'C'),
('CV337', 'TAC', 'C'),
('CV337', 'TQ', 'C'),
('CV338', 'TAB', 'C'),
('CV338', 'TAC', 'C'),
('CV338', 'TQ', 'C'),
('CV339', 'TAB', 'C'),
('CV339', 'TAC', 'C'),
('CV339', 'TQ', 'C'),
('CV340', 'TAB', 'C'),
('CV340', 'TAC', 'C'),
('CV340', 'TQ', 'C'),
('CV341', 'TAB', 'C'),
('CV341', 'TAC', 'C'),
('CV341', 'TQ', 'C'),
('CV342', 'TAB', 'C'),
('CV342', 'TAC', 'C'),
('CV342', 'TQ', 'C'),
('CV343', 'TAB', 'C'),
('CV343', 'TAC', 'C'),
('CV343', 'TQ', 'C'),
('CV344', 'TAB', 'C'),
('CV344', 'TAC', 'C'),
('CV344', 'TQ', 'C'),
('CV345', 'TAB', 'C'),
('CV345', 'TAC', 'C'),
('CV345', 'TQ', 'C'),
('CV346', 'TAB', 'C'),
('CV346', 'TAC', 'C'),
('CV346', 'TQ', 'C'),
('CV347', 'TAB', 'C'),
('CV347', 'TAC', 'C'),
('CV347', 'TQ', 'C'),
('CV348', 'TAB', 'C'),
('CV348', 'TAC', 'C'),
('CV348', 'TQ', 'C'),
('CV349', 'TAB', 'C'),
('CV349', 'TAC', 'C'),
('CV349', 'TQ', 'C'),
('CV350', 'TAB', 'C'),
('CV350', 'TAC', 'C'),
('CV350', 'TQ', 'C'),
('CV351', 'TAB', 'C'),
('CV351', 'TAC', 'C'),
('CV351', 'TQ', 'C'),
('CV352', 'TAB', 'C'),
('CV352', 'TAC', 'C'),
('CV352', 'TQ', 'C'),
('CV353', 'TAB', 'C'),
('CV353', 'TAC', 'C'),
('CV353', 'TQ', 'C'),
('CV354', 'TAB', 'C'),
('CV354', 'TAC', 'C'),
('CV354', 'TQ', 'C'),
('CV355', 'TAB', 'C'),
('CV355', 'TAC', 'C'),
('CV355', 'TQ', 'C'),
('CV356', 'TAB', 'C'),
('CV356', 'TAC', 'C'),
('CV356', 'TQ', 'C'),
('CV357', 'TAB', 'C'),
('CV357', 'TAC', 'C'),
('CV357', 'TQ', 'C'),
('CV358', 'TAB', 'C'),
('CV358', 'TAC', 'C'),
('CV358', 'TQ', 'C'),
('CV359', 'TAB', 'C'),
('CV359', 'TAC', 'C'),
('CV359', 'TQ', 'C'),
('CV360', 'TAB', 'C'),
('CV360', 'TAC', 'C'),
('CV360', 'TQ', 'C'),
('CV361', 'TAB', 'C'),
('CV361', 'TAC', 'C'),
('CV361', 'TQ', 'C'),
('CV362', 'TAB', 'C'),
('CV362', 'TAC', 'C'),
('CV362', 'TQ', 'C'),
('CV363', 'TAB', 'C'),
('CV363', 'TAC', 'C'),
('CV363', 'TQ', 'C'),
('CV364', 'TAB', 'C'),
('CV364', 'TAC', 'C'),
('CV364', 'TQ', 'C'),
('CV365', 'TAB', 'C'),
('CV365', 'TAC', 'C'),
('CV365', 'TQ', 'C'),
('CV366', 'TAB', 'C'),
('CV366', 'TAC', 'C'),
('CV366', 'TQ', 'C'),
('CV367', 'TAB', 'C'),
('CV367', 'TAC', 'C'),
('CV367', 'TQ', 'C'),
('CV368', 'TAB', 'C'),
('CV368', 'TAC', 'C'),
('CV368', 'TQ', 'C'),
('CV369', 'TAB', 'C'),
('CV369', 'TAC', 'C'),
('CV369', 'TQ', 'C'),
('CV370', 'TAB', 'C'),
('CV370', 'TAC', 'C'),
('CV370', 'TQ', 'C'),
('CV371', 'TAB', 'C'),
('CV371', 'TAC', 'C'),
('CV371', 'TQ', 'C'),
('CV372', 'TAB', 'C'),
('CV372', 'TAC', 'C'),
('CV372', 'TQ', 'C'),
('CV373', 'TAB', 'C'),
('CV373', 'TAC', 'C'),
('CV373', 'TQ', 'C'),
('CV374', 'TAB', 'C'),
('CV374', 'TAC', 'C'),
('CV374', 'TQ', 'C'),
('CV375', 'TAB', 'C'),
('CV375', 'TAC', 'C'),
('CV375', 'TQ', 'C'),
('CV376', 'TAB', 'C'),
('CV376', 'TAC', 'C'),
('CV376', 'TQ', 'C'),
('CV377', 'TAB', 'C'),
('CV377', 'TAC', 'C'),
('CV377', 'TQ', 'C'),
('CV378', 'TAB', 'C'),
('CV378', 'TAC', 'C'),
('CV378', 'TQ', 'C'),
('CV379', 'TAB', 'C'),
('CV379', 'TAC', 'C'),
('CV379', 'TQ', 'C'),
('CV380', 'TAB', 'C'),
('CV380', 'TAC', 'C'),
('CV380', 'TQ', 'C'),
('CV381', 'TAB', 'C'),
('CV381', 'TAC', 'C'),
('CV381', 'TQ', 'C'),
('CV382', 'TAB', 'C'),
('CV382', 'TAC', 'C'),
('CV382', 'TQ', 'C'),
('CV383', 'TAB', 'C'),
('CV383', 'TAC', 'C'),
('CV383', 'TQ', 'C'),
('CV384', 'TAB', 'C'),
('CV384', 'TAC', 'C'),
('CV384', 'TQ', 'C'),
('CV385', 'TAB', 'C'),
('CV385', 'TAC', 'C'),
('CV385', 'TQ', 'C'),
('CV386', 'TAB', 'C'),
('CV386', 'TAC', 'C'),
('CV386', 'TQ', 'C'),
('CV387', 'TAB', 'C'),
('CV387', 'TAC', 'C'),
('CV387', 'TQ', 'C'),
('CV388', 'TAB', 'C'),
('CV388', 'TAC', 'C'),
('CV388', 'TQ', 'C'),
('CV389', 'TAB', 'C'),
('CV389', 'TAC', 'C'),
('CV389', 'TQ', 'C'),
('CV390', 'TAB', 'C'),
('CV390', 'TAC', 'C'),
('CV390', 'TQ', 'C'),
('CV391', 'TAB', 'C'),
('CV391', 'TAC', 'C'),
('CV391', 'TQ', 'C'),
('CV392', 'TAB', 'C'),
('CV392', 'TAC', 'C'),
('CV392', 'TQ', 'C'),
('CV393', 'TAB', 'C'),
('CV393', 'TAC', 'C'),
('CV393', 'TQ', 'C'),
('CV394', 'TAB', 'C'),
('CV394', 'TAC', 'C'),
('CV394', 'TQ', 'C'),
('CV395', 'TAB', 'C'),
('CV395', 'TAC', 'C'),
('CV395', 'TQ', 'C'),
('CV396', 'TAB', 'C'),
('CV396', 'TAC', 'C'),
('CV396', 'TQ', 'C'),
('CV397', 'TAB', 'C'),
('CV397', 'TAC', 'C'),
('CV397', 'TQ', 'C'),
('CV398', 'TAB', 'C'),
('CV398', 'TAC', 'C'),
('CV398', 'TQ', 'C'),
('CV399', 'TAB', 'C'),
('CV399', 'TAC', 'C'),
('CV399', 'TQ', 'C'),
('CV400', 'TAB', 'C'),
('CV400', 'TAC', 'C'),
('CV400', 'TQ', 'C'),
('CV401', 'TAB', 'C'),
('CV401', 'TAC', 'C'),
('CV401', 'TQ', 'C'),
('CV402', 'TAB', 'C'),
('CV402', 'TAC', 'C'),
('CV402', 'TQ', 'C'),
('CV403', 'TAB', 'C'),
('CV403', 'TAC', 'C'),
('CV403', 'TQ', 'C'),
('CV404', 'TAB', 'C'),
('CV404', 'TAC', 'C'),
('CV404', 'TQ', 'C'),
('CV405', 'TAB', 'C'),
('CV405', 'TAC', 'C'),
('CV405', 'TQ', 'C'),
('CV406', 'TAB', 'C'),
('CV406', 'TAC', 'C'),
('CV406', 'TQ', 'C'),
('CV407', 'TAB', 'C'),
('CV407', 'TAC', 'C'),
('CV407', 'TQ', 'C'),
('CV408', 'TAB', 'C'),
('CV408', 'TAC', 'C'),
('CV408', 'TQ', 'C'),
('CV409', 'TAB', 'C'),
('CV409', 'TAC', 'C'),
('CV409', 'TQ', 'C'),
('CV410', 'TAB', 'C'),
('CV410', 'TAC', 'C'),
('CV410', 'TQ', 'C'),
('CV411', 'TAB', 'C'),
('CV411', 'TAC', 'C'),
('CV411', 'TQ', 'C'),
('CV412', 'TAB', 'C'),
('CV412', 'TAC', 'C'),
('CV412', 'TQ', 'C'),
('CV413', 'TAB', 'C'),
('CV413', 'TAC', 'C'),
('CV413', 'TQ', 'C'),
('CV414', 'TAB', 'C'),
('CV414', 'TAC', 'C'),
('CV414', 'TQ', 'C'),
('CV415', 'TAB', 'C'),
('CV415', 'TAC', 'C'),
('CV415', 'TQ', 'C'),
('CV416', 'TAB', 'C'),
('CV416', 'TAC', 'C'),
('CV416', 'TQ', 'C'),
('CV417', 'TAB', 'C'),
('CV417', 'TAC', 'C'),
('CV417', 'TQ', 'C'),
('CV418', 'TAB', 'C'),
('CV418', 'TAC', 'C'),
('CV418', 'TQ', 'C'),
('CV419', 'TAB', 'C'),
('CV419', 'TAC', 'C'),
('CV419', 'TQ', 'C'),
('CV420', 'TAB', 'C'),
('CV420', 'TAC', 'C'),
('CV420', 'TQ', 'C'),
('CV421', 'TAB', 'C'),
('CV421', 'TAC', 'C'),
('CV421', 'TQ', 'C'),
('CV422', 'TAB', 'C'),
('CV422', 'TAC', 'C'),
('CV422', 'TQ', 'C'),
('CV423', 'TAB', 'C'),
('CV423', 'TAC', 'C'),
('CV423', 'TQ', 'C'),
('CV424', 'TAB', 'C'),
('CV424', 'TAC', 'C'),
('CV424', 'TQ', 'C'),
('CV425', 'TAB', 'C'),
('CV425', 'TAC', 'C'),
('CV425', 'TQ', 'C'),
('CV426', 'TAB', 'C'),
('CV426', 'TAC', 'C'),
('CV426', 'TQ', 'C'),
('CV427', 'TAB', 'C'),
('CV427', 'TAC', 'C'),
('CV427', 'TQ', 'C'),
('CV428', 'TAB', 'C'),
('CV428', 'TAC', 'C'),
('CV428', 'TQ', 'C'),
('CV429', 'TAB', 'C'),
('CV429', 'TAC', 'C'),
('CV429', 'TQ', 'C'),
('CV430', 'TAB', 'C'),
('CV430', 'TAC', 'C'),
('CV430', 'TQ', 'C'),
('CV431', 'TAB', 'C'),
('CV431', 'TAC', 'C'),
('CV431', 'TQ', 'C'),
('CV432', 'TAB', 'C'),
('CV432', 'TAC', 'C'),
('CV432', 'TQ', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `dethiprofile`
--

CREATE TABLE IF NOT EXISTS `dethiprofile` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cauhoi` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pmucdo` tinyint(2) DEFAULT NULL,
  `soluong` tinyint(4) DEFAULT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dethisinh`
--

CREATE TABLE IF NOT EXISTS `dethisinh` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `macauhoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `socau` smallint(6) DEFAULT NULL,
  `dapan` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanA` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanB` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanC` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanD` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanE` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanF` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaA` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaB` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgviaupaC` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaD` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaE` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaF` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `temp` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dethisinhthu`
--

CREATE TABLE IF NOT EXISTS `dethisinhthu` (
  `id` int(11) NOT NULL,
  `sbd` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `macauhoi` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tencauhoi` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socau` smallint(6) DEFAULT NULL,
  `dapan` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanA` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanB` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanC` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanD` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanE` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dapanF` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaA` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaB` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaC` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaD` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaE` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviaupaF` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `temp` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dethisinhthu`
--

INSERT INTO `dethisinhthu` (`id`, `sbd`, `macauhoi`, `tencauhoi`, `socau`, `dapan`, `dapanA`, `dapanB`, `dapanC`, `dapanD`, `dapanE`, `dapanF`, `imgviaupaA`, `imgviaupaB`, `imgviaupaC`, `imgviaupaD`, `imgviaupaE`, `imgviaupaF`, `temp`) VALUES
(1, 'QLthithu', 'PTP13-KTQL9', 'Người lãnh đạo có thể nhận biết dấu hiệu thay đổi từ nguồn nào?', 1, 'E', 'Từ yêu cầu nội tại của tổ chức', 'Từ đối thủ cạnh tranh', 'Từ môi trường xung quanh', 'A & B', 'A, B &C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'QLthithu', 'PTP13-KTQL4', 'Một người quản lý nên tìm cách giao việc hợp lý cho nhân viên thay vì ôm đồm, bởi giao việc hợp lý sẽ:', 2, 'E', 'Làm cho nhân viên cảm thấy được tin tưởng.', 'Khuyến khích tinh thần làm việc của nhân viên', 'Giảm bớt gánh nặng công việc cho người quản lý', 'A&C', 'A, B & C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'QLthithu', 'PTP13-KTQL6', 'Khi hai nhân viên trong Phòng của anh/chị có mâu thuẫn làm ảnh hưởng đến tiến độ công việc chung, anh/chị nên lựa chọn phương án xử lý nào sau đây?', 3, 'C', 'Trao đổi riêng với từng nhân viên, xác định nguyên nhân mâu thuẫn, xác định người gây mâu thuẫn chính và trao đổi với người đó.', 'Ra tối hậu thư yêu cầu hai nhân viên tự giải quyết và nêu thời hạn cụ thể.', 'Trao đổi xác định nguyên nhân và tạm thời điều chuyển hoặc tách công việc của nhân viên để không có sự liên quan đến nhau trong một thời gian.', 'Không nhất thiết phải xử lý, kết quả công việc được thể hiện ở việc đánh giá định kỳ. Việc mâu thuẫn dẫn đến kết quả đánh giá thấp sẽ làm cho nhân viên phải tự nhìn nhận và điều chỉnh bản thân.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'QLthithu', 'PTP13-KTQL8', 'Nhiệm vụ chính của một nhà quản lý là: Tổ chức thực hiện, kiểm soát việc thực hiện và đánh giá kết quả. Theo anh/chị nhiệm vụ trên còn thiếu nội dung nào? ', 4, 'D', 'Xây dựng văn hóa doanh nghiệp của tổ chức', 'Giám sát', 'Quản lý thay đổi', 'Lập kế hoạch', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'QLthithu', 'PTP13-KTQL2', 'Theo anh/chị, chỉ số nào dưới đây có thể là căn cứ để đánh giá thái độ cán bộ?\n1. Chỉ số về tính chủ động\n2. Chỉ số về tính tuân thủ\n3. Chỉ số về tinh thần hợp tác trong công việc\n4. Chỉ số về khả năng học hỏi và phát triển\n5. Chỉ số về động lực làm việc\n6. Chỉ số về tính trung thực', 5, 'A', '1, 2, 3, 4, 5, 6', '1, 3, 4, 5, 6', '1, 2, 3, 4, 5', '1, 2, 3, 5, 6', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'QLthithu', 'PTP13-KTQL10', 'Nhận thức nào sau đây về quản lý sự thay đổi là  không chính xác?', 6, 'D', 'Để thay đổi một điều nào đó của tổ chức thì nên thay đổi thí điểm trước khi nhân rộng.', 'Mọi sự thay đổi của tổ chức đều phải có mục tiêu rõ ràng', 'Việc thay đổi nên chú trọng vào một số nội dung trong đó có qui trình vì đó là yếu tố dẫn dắt và tác động đến các vấn đề liên quan của tổ chức.', 'Không có phương án nào đúng.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'QLthithu', 'PTP13-KTQL3', 'Khi một nhân viên giỏi của anh/chị xin nghỉ việc để chuyển sang một tổ chức khác, anh/chị không nên làm gì?', 7, 'E', 'Trao đổi để biết nguyên nhân ra đi của nhân viên.', 'Giữ liên lạc với nhân viên để nắm bắt tình hình nhân viên đó.', 'Thông tin kịp thời cho nhân viên những cơ hội nghề nghiệp mới tại tổ chức cũ.', 'Thể hiện thái độ tổ chức luôn đón chào nhân viên quay trở lại', 'Không có đáp án nào ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'QLthithu', 'PTP13-KTQL1', 'Tình hình công việc hiện nay của đa số nhân viên khiến Huy rất không hài lòng. Anh cảm thấy nhân viên uể oải và không có hứng khởi trong công việc. Huy đã nhiều lần họp nhóm, bày tỏ sự lo lắng và đề nghị nhân viên tập trung để nâng cao hiệu suất công việc. Tuy nhiên, tình hình vẫn chưa được cải thiện. Nếu gặp tình huống như Huy, anh/chị nên làm gì để cho tình hình trở nên tốt hơn?. ', 8, 'A', 'Trao đổi với nhân viên để xác định nguyên nhân dẫn đến tình trạng tinh thần làm việc không ổn và tìm cách điều chỉnh.', 'Quan sát các biểu hiện của từng nhân viên, chỉ ra những điểm bất hợp lý và hướng dẫn cho họ cách cải thiện. ', 'Chủ động làm việc tích cực để làm gương cho nhân viên.', 'Đưa ra chế tài nghiêm ngặt và yêu cầu nhân viên tuân thủ nghiêm túc.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'QLthithu', 'PTP13-KTQL5', 'Đâu là dấu hiệu cho thấy nhân viên đã tích cực làm việc sau khi được động viên?', 9, 'E', 'Tích cực đóng góp ý kiến khi tham gia các hoạt động chung.', 'Có phản ứng tích cực khi được giao việc', 'Luôn hướng đến chất lượng và hiệu quả công việc', 'Sẵn sàng trả lời khi được hỏi về tiến độ công việc', 'Cả 4 dấu hiệu ở trên', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'QLthithu', 'PTP13-KTQL7', 'Người Trưởng nhóm cần làm gì để có một cuộc họp nhóm hiệu quả?', 10, 'D', 'Bảo đảm các thành viên tham gia đầy đủ', 'Bảo đảm các thành viên hiểu được mục đích của cuộc họp.', 'Gửi trước chương trình và tài liệu thảo luận để nhóm có thời gian chuẩn bị', 'A, B & C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'QLthithu', 'PTP13-KTBIDV13', 'Bộ phận Tổ chức - nhân sự tại chi nhánh không thực hiện các nhiệm vụ nào sau đây?', 11, 'C', 'Quản lý tiền lương ', 'Quản lý cán bộ ', 'Nghiên cứu xây dựng đề án phát triển mạng lưới các kênh phân phối sản phẩm', 'Triển khai mô hình tổ chức của Chi nhánh theo phê duyệt của BIDV', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'QLthithu', 'PTP13-KTBIDV19', 'Người lao động được nghỉ việc riêng hưởng nguyên lương 3 ngày trong trường hợp nào?', 12, 'B', 'Con kết hôn', 'Bản thân kết hôn', 'Cháu kết hôn', 'Anh chị em ruột kết hôn', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'QLthithu', 'PTP13-KTBIDV20', 'Thời gian thử việc không quá 60 ngày áp dụng đối với trường hợp nào sau đây?', 13, 'C', 'Đối với công việc có chức danh nghề cần trình độ chuyên môn công nhân kỹ thuật, bằng nghề, nhân viên nghiệp vụ', 'Đối với công việc có chức danh nghề cần trình độ chuyên môn trung cấp', 'Đối với công việc có chức danh nghề cần trình độ chuyên môn, kỹ thuật từ cao đẳng trở lên', 'B và C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'QLthithu', 'PTP13-KTBIDV2', 'Tại Nghị quyết số 08/NQ-BIDV ngày 08/01/2018 về việc phê duyệt Phương án cơ cấu lại gắn với xử lý nợ xấu giai đoạn 2016-2020, mục tiêu đến năm 2020 của BIDV là gì?', 14, 'D', 'Top 100 ngân hàng lớn nhất Châu Á', 'Trở thành ngân hàng đẳng cấp hàng đầu khu vực Đông Nam Á', 'Trở thành ngân hàng đẳng cấp hàng đầu khu vực Châu Á', 'A & B', 'A & C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'QLthithu', 'PTP13-KTBIDV18', 'Điều nào sau đây là đúng về nghỉ phép hằng năm?', 15, 'D', 'Cán bộ làm việc đủ 12 tháng thì được nghỉ phép hằng năm hưởng nguyên lương', 'Đối với cán bộ có dưới 12 tháng làm việc thì thời gian nghỉ phép hằng năm được tính theo tỷ lệ tương ứng với số thời gian làm việc', 'Số ngày nghỉ phép hằng năm của cán bộ được tăng thêm theo thâm niên làm việc', 'A, B và C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'QLthithu', 'PTP13-KTBIDV8', 'Theo mô hình tổ chức mẫu của Chi nhánh, Phòng nào là đơn vị đầu mối phụ trách công tác quản lý thông tin khách hàng?', 16, 'B', 'Các Phòng Quản lý khách hàng', 'Phòng Quản trị tín dụng', 'Phòng Giao dịch khách hàng', 'Phòng Giao dịch', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'QLthithu', 'PTP13-KTBIDV7', 'Việc phân công công việc trong Ban Giám đốc Chi nhánh của BIDV thực hiện theo hướng phụ trách các Khối, đảm bảo nguyên tắc tách bạch giữa 03 khâu trong hoạt động nào sau đây?', 17, 'B', 'Tác nghiệp', 'Tín dụng', 'Huy động vốn', 'Chuyển tiền quốc tế', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'QLthithu', 'PTP13-KTBIDV14', 'Theo quy định hiện hành, nhiệm kỳ bổ nhiệm chức danh tối đa là bao nhiêu năm?', 18, 'C', '3', '4', '5', '6', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'QLthithu', 'PTP13-KTBIDV5', 'Tại Nghị quyết số 08/NQ-BIDV ngày 08/01/2018 về việc phê duyệt Phương án cơ cấu lại gắn với xử lý nợ xấu giai đoạn 2016-2020, nội dung xây dựng văn hóa doanh nghiệp BIDV là một trong những trọng tâm được nhấn mạnh. Anh/chị hãy cho biết, nội dung này thuộc nhóm giải pháp nào?', 19, 'C', 'Giải pháp nâng cao hiệu quả sử dụng chi phí', 'Giải pháp nâng cao năng lực quản trị điều hành, tính minh bạch trong hoạt động', 'Giải pháp về phát triển nguồn nhân lực', 'Giải pháp nâng cao chất lượng, hiệu quả, hiệu lực của công tác giám sát, kiểm tra nội bộ.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'QLthithu', 'PTP13-KTBIDV3', 'Tại Nghị quyết số 08/NQ-BIDV ngày 08/01/2018 về việc phê duyệt Phương án cơ cấu lại gắn với xử lý nợ xấu giai đoạn 2016-2020, mục tiêu của BIDV trong việc nâng cao chất lượng tín dụng tính đến 31/12/2020 được thể hiện bằng chỉ tiêu nào sau đây?', 20, 'A', 'Tỷ lệ nợ xấu gộp đạt dưới 2,5%', 'Tỷ lệ nợ xấu nội bảng đạt dưới 2,5%', 'Tỷ lệ nợ quá hạn đạt dưới 2,5%', 'Tỷ lệ nợ có khả năng mất vốn đạt dưới 2,5%', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'QLthithu', 'PTP13-KTBIDV16', 'Cán bộ tín dụng, kế toán tại Trụ sở chính và chi nhánh phải luân chuyển theo yêu cầu kiểm soát nội bộ khi nào?', 21, 'B', 'Đã có thời gian ở cùng một vị trí công tác liên tục từ 3 năm trở lên', 'Đã có thời gian ở cùng một vị trí công tác liên tục từ 5 năm trở lên', 'Đã có thời gian ở cùng một vị trí công tác liên tục từ 8 năm trở lên', 'Đã có thời gian ở cùng một vị trí công tác liên tục từ 10 năm trở lên', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'QLthithu', 'PTP13-KTBIDV6', 'Tại Nghị quyết số 08/NQ-BIDV ngày 08/01/2018 về việc phê duyệt Phương án cơ cấu lại gắn với xử lý nợ xấu giai đoạn 2016-2020, để tăng vốn chủ sở hữu, BIDV đặt mục tiêu giảm dần tỷ lệ sở hữu Nhà nước. Theo đó, đến năm 2020, tỷ lệ sở hữu của Nhà nước tại BIDV chiếm tối thiểu là:', 22, 'A', '65%', '55%', '60%', '70%', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'QLthithu', 'PTP13-KTBIDV17', 'Theo quy định quản lý lao động, đơn vị ký kết Hợp đồng lao động xác định thời hạn với cán bộ tối đa mấy lần sau thời gian thử việc và đạt yêu cầu?', 23, 'B', '1 lần', '2 lần', '3 lần', 'Do Giám đốc chi nhánh quyết định', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'QLthithu', 'PTP13-KTBIDV4', 'Tại Nghị quyết số 08/NQ-BIDV ngày 08/01/2018 về việc phê duyệt Phương án cơ cấu lại gắn với xử lý nợ xấu giai đoạn 2016-2020, BIDV sẽ tập trung đa dạng hóa nền khách hàng, trong đó tập trung đối tượng khách hàng nào?', 24, 'D', 'Khách hàng bán lẻ', 'Khách hàng  doanh nghiệp vừa và nhỏ, khách hàng doanh nghiệp nước  ngoài (FDI)', 'Khách hàng doanh nghiệp lớn', 'A & B', 'A, B & C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'QLthithu', 'PTP13-KTBIDV10', 'Theo mô hình tổ chức mẫu, Phòng Giao dịch trực thuộc Khối nào tại chi nhánh?', 25, 'C', 'Khối Quản lý khách hàng', 'Khối Quản lý rủi ro', 'Khối Trực thuộc', 'Khối Tác nghiệp', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'QLthithu', 'PTP13-KTBIDV12', 'Theo mô hình tổ chức mẫu tại chi nhánh, các Phòng/Tổ, Phòng Giao dịch do ai quyết định thành lập theo phân cấp ủy quyền hoặc phê duyệt của BIDV trong từng thời kỳ?', 26, 'D', 'Tổng Giám đốc', 'Phó Tổng Giám đốc phụ trách chi nhánh', 'Giám đốc Ban Tổ chức cán bộ', 'Giám đốc chi nhánh', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'QLthithu', 'PTP13-KTBIDV11', 'Phòng Khách hàng doanh nghiệp tại Chi nhánh thực hiện nhiệm vụ nào sau đây', 27, 'B', 'Lập báo cáo phân tích tình trạng tài sản đảm bảo nợ vay của Chi nhánh', 'Đầu mối quản lý nghiệp vụ tài trợ thương mại tại Chi nhánh', 'Quản lý, giám sát, phân tích, đánh giá rủi ro tiềm ẩn đối với danh mục tín dụng của Chi nhánh', 'B và C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'QLthithu', 'PTP13-KTBIDV9', 'Nhiệm vụ nào sau đây do Phòng Kế hoạch - tài chính/ Quản lý nội bộ thực hiện', 28, 'A', 'Nhiệm vụ quản lý, giám sát tài chính', 'Công tác phòng chống rửa tiền đối với các giao dịch phát sinh theo quy định của Nhà nước và của BIDV', 'Tính toán trích lập dự phòng rủi ro theo kết quả phân loại nợ của Phòng Khách hàng theo đúng các quy định của BIDV', 'Tham mưu cho Giám đốc Chi nhánh trong việc tổ chức tự kiểm tra thực hiện nhiệm vụ quản lý chất lượng theo tiêu chuẩn ISO', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'QLthithu', 'PTP13-KTBIDV1', 'Tại Nghị quyết số 08/NQ-BIDV ngày 08/01/2018 về việc phê duyệt Phương án cơ cấu lại gắn với xử lý nợ xấu giai đoạn 2016-2020, BIDV đã xác định sứ mệnh hiện nay của mình là đem lại lợi ích, tiện ích tốt nhất cho đối tượng nào?', 29, 'C', 'Khách hàng, cổ đông, người lao động', 'Khách hàng, cổ đông, cộng đồng xã hội', 'Khách hàng, người lao động, cổ đông, cộng đồng xã hội', 'Khách hàng, người lao động, cộng đồng xã hội', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'QLthithu', 'PTP13-KTBIDV15', 'Theo quy định, việc điều chuyển cán bộ từ đơn vị này đến làm việc ở đơn vị khác trong cùng hệ thống BIDV theo yêu cầu, nhiệm vụ công tác được hiểu là hình thức gì?', 30, 'A', 'Điều động', 'Biệt phái', 'Sa thải', 'A, B và C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'QLthithu', 'PTP13-TAH3', 'Theo anh/chị, đối tượng nào sau đây có khả năng tạo ảnh hưởng tốt nhất?', 31, 'B', 'Người kín đáo, giao tiếp thận trọng.', 'Người quảng giao, thường quan tâm, hỏi thăm đồng nghiệp.', 'Người lạc quan, nhiệt huyết với công việc, luôn đạt được kết quả công việc tốt hơn yêu cầu, tuy nhiên đôi khi không thực hiện được đúng cam kết.', 'Người có khả năng cung cấp nhiều loại thông tin và đưa thông tin nhiều chiều.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'QLthithu', 'PTP13-TAH5', 'Việc thuyết phục một nhân viên hay đồng nghiệp về một việc làm nào đó sẽ trở nên dễ dàng hơn khi chúng ta nêu ra cho họ những lợi ích đạt được. Theo anh/chị, cách làm nào dưới đây sẽ có khả năng thuyết phục người nghe tốt hơn?', 32, 'C', 'Nhấn mạnh lợi ích đối với tổ chức', 'Nhấn mạnh lợi ích đối với bộ phận của người đó', 'Nhấn mạnh lợi ích của chính đồng nghiệp đó', 'Không nhấn mạnh riêng lợi ích nào cả, chỉ nêu đồng đều các loại lợi ích.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'QLthithu', 'PTP13-TAH9', 'Tính cách, biểu hiện nào sau đây của con người sẽ tạo được ảnh hưởng tốt lên người khác?', 33, 'E', 'Luôn tự tin và thể hiện là người đáng tin cậy', 'Có mục tiêu định hướng rõ ràng và hành động theo mục tiêu đó.', 'Luôn có thái độ tích cực với mọi người xung quanh', 'Khả năng tập trung cao độ trong mọi hoàn cảnh', 'A, B, C & D', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'QLthithu', 'PTP13-TAH1', 'Việc tuân thủ văn hóa doanh nghiệp của tổ chức là hình thức tạo ảnh hưởng nào đối với nhân viên?', 34, 'C', 'Thuyết phục', 'Tạo sự tin tưởng', 'Làm gương', 'Thể hiện uy quyền', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'QLthithu', 'PTP13-TAH2', 'Theo anh/chị, việc người lãnh đạo hiểu và hành xử theo đúng văn hoá doanh nghiệp của tổ chức là đã thể hiện năng lực nào đối với nhân viên?', 35, 'C', 'Tạo động lực cho nhân viên', 'Phân công và ủy thác công việc', 'Tạo ảnh hưởng', 'Xây dựng nhóm', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'QLthithu', 'PTP13-TAH7', 'Khi trao đổi với khách hàng hoặc đối tác, để gây ấn tượng tốt và đạt hiệu quả trong quá trình trao đổi, anh/chị thường phải tìm hiểu trước về đối tượng sẽ gặp để xác định cách thức trao đổi. Theo anh/chị, phương thức trao đổi &quot;thể hiện sự chuyên nghiệp, nêu rõ mục tiêu và kế hoạch thực hiện một cách rành mạch, cụ thể, thể hiện sự hiểu biết và phân tích đầy đủ về các khía cạnh liên quan&quot; nên được áp dụng khi trao đổi với đối tượng nào sau đây?', 36, 'A', 'Người có tư duy hệ thống, hướng tới kết quả và tuân thủ nguyên tắc', 'Người ra quyết định nhanh, thích phá vỡ nguyên tắc', 'Người luôn đồng cảm, lo lắng về cảm nghĩ của người khác', 'Người thiên về nghiên cứu, ít nói, trầm ngâm', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'QLthithu', 'PTP13-TAH8', 'Theo anh/chị, việc tạo ảnh hưởng có thể thực hiện thông qua hình thức trao đổi nào sau đây?', 37, 'E', 'Trao đổi trực tiếp một - một', 'Trao đổi trong nhóm', 'Trao đổi trong các buổi gặp không chính thống (ăn trưa, dã ngoại) ', 'Trao đổi qua email', 'Quan trọng là nội dung và cách thức trao đổi, không tùy thuộc vào hình thức trao đổi', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'QLthithu', 'PTP13-TAH10', 'Kiểu hành vi nào sau đây của con người có khả năng tạo ảnh hưởng đến người khác?', 38, 'E', 'Quả quyết', 'Độc đoán', 'Dân chủ', 'A & B', 'A, B & C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'QLthithu', 'PTP13-TAH4', 'Linh là một nhân viên bình thường không nổi trội. Linh đã chia sẻ với trưởng phòng về mong muốn trở thành một chuyên viên tư vấn uy tín và đáng tin cậy trên thị trường. Nhận được chia sẻ của Linh, trưởng phòng cho rằng đây là dấu hiệu mình đã tạo ảnh hưởng tốt vì nhân viên tin tưởng mình trong việc định hướng phát triển nghề nghiệp tương lai. Là một trưởng phòng, anh/chị sẽ khuyên nhân viên đó thế nào để tạo ảnh hưởng tốt nhất trong trường hợp này?', 39, 'A', 'Ủng hộ và thể hiện sự tin tưởng nhân viên sẽ thành công. Thể hiện quan điểm sẵn sàng hỗ trợ nhân viên để đạt được mơ ước.', 'Khuyên nhân viên hãy bằng lòng và làm tốt vị trí công việc hiện tại.', 'Khuyên nhân viên hãy tin tưởng vào lãnh đạo phòng, lãnh đạo phòng sẽ làm mọi cách để nhân viên đạt được ước mơ.', 'Phân tích để nhân viên hiểu rằng năng lực hiện tại của nhân viên còn hạn chế, nhân viên cần có thời gian phấn đấu thêm.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'QLthithu', 'PTP13-TAH6', 'Dấu hiệu nào sau đây cho thấy tổ chức đang có người lãnh đạo có tầm ảnh hưởng tốt?', 40, 'E', 'Sự cam kết, tự nguyện của nhân viên đối với tổ chức.', 'Nhân viên được phát huy tối đa năng lực bản thân.', 'Nhân viên được ghi nhận xứng đáng', 'A & B', 'A, B & C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'QLthithu', 'PTP13-HDKC7', 'Việc thống nhất thời gian thực hiện hướng dẫn, kèm cặp giữa người hướng dẫn và người được hướng dẫn diễn ra khi nào?', 41, 'D', 'Sau khi hai bên đã thống nhất về giải pháp thực hiện', 'Sau khi hai bên đã thống nhất được mục tiêu hướng dẫn.', 'Sau khi đã đánh giá được tình hình thực tế của người được hướng dẫn .', 'A, B & C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'QLthithu', 'PTP13-HDKC2', 'Người Trưởng nhóm cần chú trọng làm gì đối với một nhóm đã hoạt động và đi vào ổn định?', 42, 'D', 'Đặt ra các công việc mang tính thử thách', 'Ủy quyền công việc cho một số thành viên có năng lực', 'Tuân thủ và bám sát những mục tiêu và thời gian biểu đã đề ra', 'A, B & C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'QLthithu', 'PTP13-HDKC6', 'Theo anh/chị, nhu cầu cần huấn luyện một nhân viên nào đó xuất phát từ đâu?', 43, 'E', 'Từ yêu cầu quản lý và phát triển nhân viên của người lãnh đạo trực tiếp', 'Từ đề xuất, yêu cầu của nhân viên.', 'Từ kế hoạch phát triển nguồn nhân lực của tổ chức', 'A & C', 'A, B & C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'QLthithu', 'PTP13-HDKC8', 'Phương thức huấn luyện nào sau đây thường không mang lại hiệu quả?', 44, 'D', 'Huấn luyện theo nhóm', 'Huấn luyện từ xa', 'Huấn luyện ngoài không gian làm việc', 'Không có phương án nào.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'QLthithu', 'PTP13-HDKC10', 'Việc hướng dẫn, kèm cặp một nhân viên sẽ góp phần nâng cao kỹ năng của ai?', 45, 'E', 'Của người được hướng dẫn', 'Của người hướng dẫn', 'Của người quản lý trực tiếp', 'A & B', 'A, B & C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'QLthithu', 'PTP13-HDKC4', 'Biểu hiện của việc huấn luyện nhân viên thành công là:', 46, 'D', 'Ít phải giám sát nhân viên hơn', 'Nhân viên có thể đảm nhiệm công việc đa dạng hơn', 'Nhân viên chịu được áp lực công việc tốt hơn', 'A, B &C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'QLthithu', 'PTP13-HDKC1', 'Hướng dẫn, kèm cặp nhân viên là?', 47, 'A', 'Một phương pháp để giúp đỡ nhân viên rèn luyện, phát triển, học hỏi những kỹ năng mới, đối mặt với thử thách cá nhân, kiểm soát sự thay đổi trong cuộc sống, xây dựng mục tiêu và đạt được thành công.', 'Việc giảng dạy các kiến thức cụ thể cho nhân viên nhằm nâng cao chất lượng làm việc của nhân viên.', 'Tạo điều kiện cho nhân viên suy nghĩ và làm việc độc lập trong công việc.', 'A&C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'QLthithu', 'PTP13-HDKC9', 'Đối với việc giám sát, theo dõi quá trình xử lý công việc của người được hướng dẫn, nên hạn chế phương thức kiểm tra, giám sát nào?', 48, 'D', 'Qua thư điện tử', 'Qua điện thoại', 'Trao đổi trực tiếp', 'Không cần hạn chế phương thức nào.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'QLthithu', 'PTP13-HDKC3', 'Nói đến việc hướng dẫn, kèm cặp nhân viên là nói đến huấn luyện cho nhân viên về:', 49, 'A', 'Kiến thức, kỹ năng, thái độ', 'Kỹ năng, thái độ', 'Kiến thức, thái độ', 'Kiến thức, kỹ năng', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'QLthithu', 'PTP13-HDKC5', 'Ai là người chịu trách nhiệm chính trong việc xác định phương thức hướng dẫn, kèm cặp nhân viên?', 50, 'B', 'Người được hướng dẫn kèm cặp', 'Người hướng dẫn, kèm cặp', 'Trưởng phòng trong trường hợp Trưởng phòng không phải là người hướng dẫn, kèm cặp. ', 'Phó Trưởng phòng phụ trách trực tiếp trong trường hợp Phó Trưởng phòng đó không phải là người hướng dẫn, kèm cặp. ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'QLthithu', 'PTP13-LVN10', 'Người trưởng nhóm nào sau đây có khả năng khiến nhóm làm việc tích cực đưa ra ý tưởng hơn?', 51, 'B', 'Trưởng nhóm chú trọng xây dựng nguyên tắc làm việc và thực hiện kiểm soát nghiêm ngặt', 'Trưởng nhóm chú trọng tạo môi trường và cảm hứng làm việc của nhóm', 'Trưởng nhóm chú trọng tạo áp lực tối đa trong công việc đối với các thành viên của nhóm', 'Trưởng nhóm luôn giải quyết các vấn đề trong nhóm thông qua họp toàn bộ thành viên của nhóm', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'QLthithu', 'PTP13-LVN4', 'Trong các nhiệm vụ sau đây, người trưởng nhóm nên chia sẻ nhiệm vụ nào với các thành viên trong nhóm?', 52, 'C', 'Phân công nhiệm vụ trong nhóm', 'Làm đại diện chính thức của nhóm', 'Xây dựng mục tiêu hoạt động của nhóm', 'Đánh giá kết quả hoạt động nhóm. ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'QLthithu', 'PTP13-LVN2', 'Đâu là quan điểm phù hợp về nhóm làm việc?', 53, 'E', 'Nhóm là một tập hợp mà các thành viên trong nhóm cần có sự tương tác với nhau và với trưởng nhóm để đạt được mục tiêu chung.', 'Nhóm là một tập hợp mà các thành viên trong nhóm có sự phụ thuộc vào thông tin của nhau để thực hiện phần việc của mình.', 'Nhóm là một tập hợp những cá nhân có các kỹ năng bổ sung cho nhau và cùng cam kết chịu trách nhiệm thực hiện một mục tiêu chung.', 'A&B', 'A, B & C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'QLthithu', 'PTP13-LVN1', 'Đâu là yếu tố xác định qui mô của một nhóm?', 54, 'D', 'Mục tiêu hoạt động của nhóm', 'Vai trò, trị trí của các thành viên trong nhóm.', 'Số lượng thành viên mà người tạo lập nhóm mong muốn.', 'A, B & C', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'QLthithu', 'PTP13-LVN8', 'Nhằm đảm bảo sự gắn kết giữa các thành viên trong nhóm, người trưởng nhóm cần duy trì phương thức liên lạc, trao đổi nào sau đây?', 55, 'D', 'Qua thư điện tử', 'Hệ thống trao đổi thông tin trực tuyến qua mạng', 'Hệ thống video call.', 'Gặp mặt trực tiếp', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'QLthithu', 'PTP13-LVN5', 'Theo anh/chị, đâu là nguyên tắc xử lý mâu thuẫn trong nội bộ nhóm?  ', 56, 'E', 'Xác định và công bố chuẩn mực về yêu cầu công việc và ứng xử trong hoạt động nhóm.', 'Xử lý ngay các tình huống có nguy cơ gây mâu thuẫn.', 'Tạm thời bỏ qua hoặc chưa xử lý đối với tình huống nhỏ nhặt, ít quan trọng.', 'A&B', 'A, B & C', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'QLthithu', 'PTP13-LVN9', 'Nội dung nào sau đây không đúng khi nói về mục tiêu hoạt động của nhóm?', 57, 'D', 'Mục tiêu nhóm cần có sự thống nhất của các thành viên', 'Mục tiêu nhóm ràng buộc hoạt động của các thành viên', 'Mục tiêu nhóm cần có sự thách thức nhất định', 'Không có phương án nào.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'QLthithu', 'PTP13-LVN7', 'Một cá nhân có kinh nghiệm nếu gia nhập một nhóm đang hoạt động thì nên thể hiện năng lực và tố chất của bản thân một cách mạnh mẽ nhất khi nào?', 58, 'B', 'Ngay buổi đầu tiên khi ra mắt toàn thể nhóm.', 'Sau khi quan sát nhóm và hiểu cơ bản về nhóm, nhiệm vụ và các thành viên của nhóm.', 'Ngay khi có cơ hội.', 'Sau khi tham khảo ý kiến của Trưởng nhóm.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'QLthithu', 'PTP13-LVN3', 'Đâu không phải là một nhóm làm việc?', 59, 'D', 'Đội thực hiện dự án của một tổ chức.', 'Nhóm cán bộ tham gia công tác lễ tân hội nghị tổng kết.', 'Nhóm vận động quyên góp 100 triệu đồng ủng hộ bệnh nhân nghèo. ', 'Nhóm cán bộ của chi nhánh trên một chuyến xe đi thăm quan. ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'QLthithu', 'PTP13-LVN6', 'Theo anh/chị, khi giao việc cho các thành viên trong nhóm cần có những nội dung nào?  ', 60, 'E', 'Nội dung, mục tiêu và yêu cầu chất lượng công việc', 'Đối tượng thực hiện, giám sát', 'Thời gian thực hiện', 'Phương thức và thời gian báo cáo, phản hồi', 'A, B, C & D', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE IF NOT EXISTS `diem` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `diem` float DEFAULT NULL,
  `socaudung` tinyint(4) DEFAULT NULL,
  `thoigianthi` timestamp NULL DEFAULT NULL,
  `timeconlai` int(11) DEFAULT NULL,
  `thoigianketthuc` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `errors`
--

CREATE TABLE IF NOT EXISTS `errors` (
  `id` int(11) NOT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `errors`
--

INSERT INTO `errors` (`id`, `content`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `hocvien`
--

CREATE TABLE IF NOT EXISTS `hocvien` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noisinh` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendv` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mapt` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocvien`
--

INSERT INTO `hocvien` (`sbd`, `hoten`, `ngaysinh`, `noisinh`, `tendv`, `matkhau`, `profile`, `mapt`) VALUES
('CV184', 'Lê Huỳnh Trường An', '17/10/1982', '', 'Sóc Trăng', '88e18b65c677c1d7e3ce8821571d6a47', NULL, 'KT-NNCV-CA01-P01'),
('CV185', 'Nguyễn Tiến An', '8/14/1987', '', 'Đồng Nai', 'ef914bae69a4da293615ffaf5f7d7aca', NULL, 'KT-NNCV-CA01-P01'),
('CV186', 'Diệp Trần Bảo An', '22/08/1991', '', 'Thủ Dầu Một', '3867efae83263512cddd0bd92eb625c7', NULL, 'KT-NNCV-CA01-P01'),
('CV187', 'Phạm Thúy An', '17/11/1989', '', 'Phú Tài', 'c3ab91563a1e594330099854541df51c', NULL, 'KT-NNCV-CA01-P01'),
('CV188', 'Nguyễn Lê Ngân Anh', '02/03/1990', '', 'Hậu Giang', '51eead32ac0fa7ecc95065fb94c67c48', NULL, 'KT-NNCV-CA01-P01'),
('CV189', 'Đặng Hoàng  Anh', '25/06/1982', '', 'Hậu Giang', 'd02efbd2583f88d0b8bc6c38e98721e1', NULL, 'KT-NNCV-CA01-P01'),
('CV190', 'Nguyễn Hải Anh', '16/02/1982', '', 'Kiên Giang', '64dda0c88777b0e29a78e38e123ea4c9', NULL, 'KT-NNCV-CA01-P01'),
('CV191', 'Trương Thị Kim Anh', '1/1/1987', '', 'Phú Mỹ Hưng', '83e40ea7546c2163652f79227d1b96b7', NULL, 'KT-NNCV-CA01-P01'),
('CV192', 'Trần Doãn Anh', '12/18/1991', '', 'Đông Đồng Nai', '05fd8f6dea1afc94542ad67ce7df91f6', NULL, 'KT-NNCV-CA01-P01'),
('CV193', 'Vũ Thị Ngọc Anh', '12/12/1989', '', 'Phú Mỹ', '24d2684935d70b2f01e64b2ec843de56', NULL, 'KT-NNCV-CA01-P01'),
('CV194', 'Phạm Ngọc Anh', '2/10/1988', '', 'Bà Rịa Vũng Tàu', 'e2795fcdabfd661776f6b72d8a72c2e0', NULL, 'KT-NNCV-CA01-P01'),
('CV195', 'Nguyễn Ngọc  Anh', '21/03/1978', '', 'Mỹ Tho', 'e4f3d59edfa9b020d151c1395f710359', NULL, 'KT-NNCV-CA01-P01'),
('CV196', 'Vũ Thúy  Anh', '4/12/1988', '', 'Bắc Sài Gòn', 'a8ac75aabbfbe4781b90184495fb6a99', NULL, 'KT-NNCV-CA01-P01'),
('CV197', 'Trần Thái Anh', '15/08/1988', '', 'Bình Định', '99904c1474556134349e40a27c04cb65', NULL, 'KT-NNCV-CA01-P01'),
('CV198', 'Đinh Tuấn  Anh ', '11/10/1990', '', 'Lâm Đồng', '726bb375b10e3267e8fa3ed43a1e7dce', NULL, 'KT-NNCV-CA01-P01'),
('CV199', 'Nguyễn Thanh Bình', '14/04/1977', '', 'Thủ Dầu Một', '3ef096784ac31bb02b5e1048c90b3697', NULL, 'KT-NNCV-CA01-P01'),
('CV200', 'Trương Nguyễn Huy Bình', '22/11/1978', '', 'Hội An', '68ec4ec97e8b53d001c9e8f744289a9f', NULL, 'KT-NNCV-CA01-P01'),
('CV201', 'Hồ Thị Nam  Châu', '17/10/1980', '', 'Bà Chiểu', 'd0b32d7c237e877725139dc5b42e9696', NULL, 'KT-NNCV-CA01-P01'),
('CV202', 'Trần Thị Kim Châu', '29/01/1986', '', 'Long An', '4b993a475f8aa4970a60ff18c9702f31', NULL, 'KT-NNCV-CA01-P01'),
('CV203', 'Nguyễn Hồ Ngọc Châu', '01/05/1988', '', 'Đà Nẵng', '9e9dd9e9c2ba5d8e9779c4e1002324b9', NULL, 'KT-NNCV-CA01-P01'),
('CV204', 'Nguyễn Thị Minh Châu', '07/05/1992', '', 'Dung Quất', '53c6b48fc026659a2b691ba909b71e15', NULL, 'KT-NNCV-CA01-P01'),
('CV205', 'Nguyễn Thị Kim  Chi', '3/1/1985', '', 'Sài Gòn', 'b0ebd45951ab0fc4adadd6ba3c416661', NULL, 'KT-NNCV-CA01-P01'),
('CV206', 'Nguyễn Thị Phương Chi', '05/09/1991', '', 'Bình Định', '9c7fdc85ad0cca0cffc40c76c962eafb', NULL, 'KT-NNCV-CA01-P01'),
('CV207', 'Hoàng Mai Nghĩa  Chinh', '6/6/1987', '', 'Gia Lai', '52ae5c357f027738ff0813a67caa8c09', NULL, 'KT-NNCV-CA01-P01'),
('CV208', 'Uông Văn Ninh Chữ', '29/12/1980', '', 'Bến Thành', '8637cd6169336616402f89e1f34d92e3', NULL, 'KT-NNCV-CA01-P01'),
('CV209', 'Nguyễn Ngọc  Công', '08/10/1985', '', 'Tp.HCM', 'f92c2ef052c024cf7ece8a57125572e2', NULL, 'KT-NNCV-CA01-P01'),
('CV210', 'Trương Thành  Công', '19/05/1988', '', 'Nhà Bè', '4ac1b30243c51efcc2e30ab29b9d9ff9', NULL, 'KT-NNCV-CA01-P01'),
('CV211', 'Nguyễn Công Cương', '31/08/1990', '', 'Trà Vinh', '9076ad1cc8dad4b0a22b6fb6ff6d4ca8', NULL, 'KT-NNCV-CA01-P01'),
('CV212', 'Trần Anh Cường', '31/10/1977', '', 'Củ Chi', '3b7e0da47c08b9f227b8138fe05db5e6', NULL, 'KT-NNCV-CA01-P02'),
('CV213', 'Trần Phú Cường', '30/05/1983', '', 'Đông Sài Gòn', 'e44a5d12da84b7bddf0ed343be130a60', NULL, 'KT-NNCV-CA01-P02'),
('CV214', 'Lê Thị Thúy Diễm', '23/08/1981', '', 'Sa Đéc', 'fca8ee584f4b7291a5e36c32a3f58fe3', NULL, 'KT-NNCV-CA01-P02'),
('CV215', 'Ngô Văn Diễn', '12/25/1987', '', 'Hóc Môn', '73dc9b0baccdbeaa3a1605790be42bcf', NULL, 'KT-NNCV-CA01-P02'),
('CV216', 'Lê Đinh Ngọc  Diệu', '29/05/1983', '', 'Trường Sơn', '862cf3936ad6062e253f5368445bde77', NULL, 'KT-NNCV-CA01-P02'),
('CV217', 'Nguyễn Thị Thùy  Dung', '30/08/1987', '', 'Đắk Lắk', '9362379dd74d140eef6bba719dde4d82', NULL, 'KT-NNCV-CA01-P02'),
('CV218', 'Võ Thụy Phương Dung', '15/08/1984', '', 'Đắk Nông', 'f34c4ec8d611ec2a9d3e8053d31bed8b', NULL, 'KT-NNCV-CA01-P02'),
('CV219', 'Nguyễn Thùy Dung', '2/13/1990', '', 'Bình Dương', 'c486fffa28ed0048406f2908eeb9f761', NULL, 'KT-NNCV-CA01-P02'),
('CV220', 'Nguyễn Thị Mỹ Dung', '1/12/1985', '', 'Mộc Hóa', 'bc71cec79ea94d180ccbe3b1ae8d2ad1', NULL, 'KT-NNCV-CA01-P02'),
('CV221', 'Nguyễn Thị Phương  Dung', '12/06/1987', '', 'Quảng Ngãi', '5f60cccf9632d0634d828ee97a6e441b', NULL, 'KT-NNCV-CA01-P02'),
('CV222', 'Lý  Mai  Dung', '14/06/1980', '', 'TTDVKQPN', 'af2fdce9964eb270d12f093b79c50e93', NULL, 'KT-NNCV-CA01-P02'),
('CV223', 'Lê Hoàng  Dũng', '11/10/1990', '', 'Phú Mỹ Hưng', '865b49231fa9b6903d9cc5c720aec548', NULL, 'KT-NNCV-CA01-P02'),
('CV224', 'Lê Hoàng Dũng', '03/06/1990', '', 'Ba Tháng Hai', '4ff9fe4c9ac03f3c6b77d573b566c784', NULL, 'KT-NNCV-CA01-P02'),
('CV225', 'Phạm Thị Thuý Hà', '20/02/1988', '', 'Đắk Nông', '1591616f9178031ec94096f8bac8d661', NULL, 'KT-NNCV-CA01-P02'),
('CV226', 'Phan Thị Mai  Hà', '16/12/1989', '', 'Nam Gia Lai', 'a57374dbcc2568afdeabf13ac4b37eaf', NULL, 'KT-NNCV-CA01-P02'),
('CV227', 'Phạm Thanh Hà', '1/16/1990', '', 'Bình Dương', 'e1be88f61c2502013184425d83bd25e2', NULL, 'KT-NNCV-CA01-P02'),
('CV228', 'Phạm Thị Ngọc Hà', '2/22/1991', '', 'Bà Rịa Vũng Tàu', '74676db9661055e583b7a1b885d96544', NULL, 'KT-NNCV-CA01-P02'),
('CV229', 'Đặng Thị Hà', '9/16/1983', '', 'Bến Thành', 'c2333f00892f1c931197dd47c4fe8713', NULL, 'KT-NNCV-CA01-P02'),
('CV230', 'Võ Thị  Hà', '29/03/1990', '', 'Gia Định', 'aae08b399d5db2a07e8fb2bd05b0533a', NULL, 'KT-NNCV-CA01-P02'),
('CV231', 'Nguyễn Thị Thanh Hải', '19/10/1978', '', 'Đất Mũi', '8e718d57324049acc9398653b33d0935', NULL, 'KT-NNCV-CA01-P02'),
('CV232', 'Nguyễn Thu Hằng', '9/6/1988', '', 'Bình Phước', '8903dbf4ce68ff016c74110f925b99a7', NULL, 'KT-NNCV-CA01-P02'),
('CV233', 'Huỳnh Thị Hồng  Hạnh', '1/13/1983', '', 'Bình Chánh', '1f2351a247732a98850dcfa7350b36ec', NULL, 'KT-NNCV-CA01-P02'),
('CV234', 'Trần Thị Hồng  Hạnh', '23/03/1991', '', 'Gia Định', 'df678b17a87e27d3e919040f0130ae18', NULL, 'KT-NNCV-CA01-P02'),
('CV235', 'Nguyễn Đức Hảo', '19/04/1987', '', 'TTDVKQPN', '68baf4cb7591680500f791098c1d54a9', NULL, 'KT-NNCV-CA01-P02'),
('CV236', 'Ngô Thảo Hiền', '07/04/1989', '', 'Long An', '2e313e0f3dc3dcc9052790fb253c0697', NULL, 'KT-NNCV-CA01-P02'),
('CV237', 'Mai Thị Hiền', '14/02/1987', '', 'TTCNTT', 'f3c77cc940d9b36345e9e808747a7217', NULL, 'KT-NNCV-CA01-P02'),
('CV238', 'Trịnh Tấn Hiếu', '26/4/1978', '', 'Đất Mũi', 'b9eaf2506bc7b0ce7aefa8780335903d', NULL, 'KT-NNCV-CA01-P02'),
('CV239', 'Đặng Xuân Hiệu', '12/6/1987', '', 'Bình Phước', '07b4c235f9a93b09425a7104f6d6b9aa', NULL, 'KT-NNCV-CA01-P02'),
('CV240', 'Phạm Thanh Hoa', '28/08/1987', '', 'Hậu Giang', 'af63eaa884153d8325f861ac295f699f', NULL, 'KT-NNCV-CA01-P03'),
('CV241', 'Phan Tấn  Hòa', '02/02/1985', '', 'Dĩ An - Bình Dương', '4c9cf8e410df5e5d3911db4d8a9b70ec', NULL, 'KT-NNCV-CA01-P03'),
('CV242', 'Lê Nguyễn Thái Hòa', '2/12/1988', '', 'Nam Kỳ Khởi Nghĩa', '27886d24c661bce5fa5ddac7738bd4d7', NULL, 'KT-NNCV-CA01-P03'),
('CV243', 'Lê Huy  Hoàng', '9/24/1983', '', 'Đồng Nai', 'f5b956c41778bd26933ae3388a3c62f2', NULL, 'KT-NNCV-CA01-P03'),
('CV244', 'Phan Thị Minh Hồng', '07/09/1981', '', 'Bình Thuận', 'adf454707563b68816444236d17127c2', NULL, 'KT-NNCV-CA01-P03'),
('CV245', 'Nguyễn Văn  Hưng', '12/01/1976', '', 'Sông Hàn', '9af503889288eb2146ee92f98f9d17b2', NULL, 'KT-NNCV-CA01-P03'),
('CV246', 'Phạm Thị  Hương', '4/4/1977', '', 'Bình Chánh', '60c1f3a8836a18afa29a18269d7a2b13', NULL, 'KT-NNCV-CA01-P03'),
('CV247', 'Nguyễn Thị Thu Hương', '22/02/1989', '', 'Châu Thành Sài Gòn', '7825318f084661b477aeed2ed649d541', NULL, 'KT-NNCV-CA01-P03'),
('CV248', 'Huỳnh Thị Liên Hương', '01/11/1976', '', 'Sa Đéc', '15d7e64ae3b30aa2693a2d06f61a5ef9', NULL, 'KT-NNCV-CA01-P03'),
('CV249', 'Trần Thị Thiên Hương', '21/10/1987', '', 'SGD2', '9c896f424d544b562b80d852f0ae3f98', NULL, 'KT-NNCV-CA01-P03'),
('CV250', 'Huỳnh Thị Thu Hương', '25/06/1982', '', 'Hội An', '7cfe4036ff13742ead5faeaccf81808b', NULL, 'KT-NNCV-CA01-P03'),
('CV251', 'Đoàn Thị Thu Hường', '17/01/1988', '', 'Mỹ Phước', 'cab1c4b19ff71d979df875c30198e4d7', NULL, 'KT-NNCV-CA01-P03'),
('CV252', 'Lê Thị Minh Thuỳ Ii', '10/06/1971', '', 'Long An', '734eaa26c7d9db98f5c9b5015146c076', NULL, 'KT-NNCV-CA01-P03'),
('CV253', 'Huỳnh Văn Kha', '15/02/1987', '', 'Quận 7 Sài Gòn', 'b05879857ca32a9da8f22cd940b80c37', NULL, 'KT-NNCV-CA01-P03'),
('CV254', 'Dương Quang  Khải', '1/11/1989', '', 'Vĩnh Long', '42ac7b76a95f079928cb968383a53926', NULL, 'KT-NNCV-CA01-P03'),
('CV255', 'Vũ Hồng  Khanh', '17/04/1982', '', 'Trường Sơn', '6aa7549d15aa0ed7e2e3af8a70b4ff50', NULL, 'KT-NNCV-CA01-P03'),
('CV256', 'Phạm Duy  Khánh', '25/12/1990', '', 'Bà Rịa Vũng Tàu', '00f0bc24d4ea07d7f82aff13fd53ded5', NULL, 'KT-NNCV-CA01-P03'),
('CV257', 'Trần Thị Mỹ Lan', '19/03/1978', '', 'Củ Chi', 'a7894169ba0869e4d0d0be07e6d9fe05', NULL, 'KT-NNCV-CA01-P03'),
('CV258', 'Trần Thị Xuân Lan', '25/09/1986', '', 'Tiền Giang', 'ebc8bfcfe155ddfebbb75544fa6603a2', NULL, 'KT-NNCV-CA01-P03'),
('CV259', 'Nguyễn Ngọc Lan', '24/04/1982', '', 'Long An', '0470354e8213cd8e67e6577f670aee41', NULL, 'KT-NNCV-CA01-P03'),
('CV260', 'Hồ Văn Lan', '24/12/1987', '', 'Quy Nhơn', 'ff5d4af9ae0d833975b68e4f4762fcc3', NULL, 'KT-NNCV-CA01-P03'),
('CV261', 'Phạm Thị Tuyết Lê', '08/04/1991', '', 'Quảng Nam', 'f2cb2af43a683f44d16f22b1b1e9bf54', NULL, 'KT-NNCV-CA01-P03'),
('CV262', 'Bùi Thị  Liên', '14/09/1991', '', 'Gia Định', 'ea4ebeb5782d30c800946aea2d348abd', NULL, 'KT-NNCV-CA01-P03'),
('CV263', 'Dương Thị  Liên', '20/03/1984', '', 'Nhà Bè', '77ebd7832bd3888e3014d35ca669ca1b', NULL, 'KT-NNCV-CA01-P03'),
('CV264', 'Nguyễn Ngọc Linh', '9/6/1989', '', 'Nam Gia Lai', 'c1f739759c3ed5702be18b26a4ec506d', NULL, 'KT-NNCV-CA01-P03'),
('CV265', 'Nguyễn Thị Thùy Linh', '20/8/1989', '', 'Nam Gia Lai', 'ae52a2e77c6ff471b1acbe7d07ad1825', NULL, 'KT-NNCV-CA01-P03'),
('CV266', 'Nguyễn Thị Trúc Linh', '22/02/1987', '', 'Bắc An Giang', '342c94492a00179a95c482726d9b9b76', NULL, 'KT-NNCV-CA01-P03'),
('CV267', 'Nguyễn Phương Linh', '6/6/1991', '', 'Phú Mỹ Hưng', '1012e8ca4f660f15314ccef63da351f3', NULL, 'KT-NNCV-CA01-P03'),
('CV268', 'Lưu Phương Linh', '08/05/1989', '', 'Mỹ Phước', '885b9f89babd3237ea0e91dade37d1d6', NULL, 'KT-NNCV-CA01-P04'),
('CV269', 'Nguyễn Khánh Linh', '02/08/1985', '', 'Nhà Bè', '52d595fd73cfd3f58dc522e8d3044f75', NULL, 'KT-NNCV-CA01-P04'),
('CV270', 'Nguyễn Hưng Thùy Linh', '22/01/1992', '', 'Phú Yên', '39b131b80a5c588386bd278a8337e286', NULL, 'KT-NNCV-CA01-P04'),
('CV271', 'Nguyễn Vĩnh Lộc', '2/10/1991', '', 'Đồng Nai', 'a91cc90c937f0fcc3bdb94376e841e16', NULL, 'KT-NNCV-CA01-P04'),
('CV272', 'Nguyễn Lâm Hồng  Mai', '20/09/1978', '', 'Hậu Giang', 'd165dd50ffa51a5dbe0772763f06fa87', NULL, 'KT-NNCV-CA01-P04'),
('CV273', 'Đặng Thị Mai', '7/28/1993', '', 'SGD2', '90db6556ba0ef10ade24cf2a2d4d1040', NULL, 'KT-NNCV-CA01-P04'),
('CV274', 'Nguyễn Thị Trúc Mai', '29/04/1985', '', 'Quảng Nam', '381524b423b6d93c05ba7766fc5a8bef', NULL, 'KT-NNCV-CA01-P04'),
('CV275', 'Nguyễn Khánh Mẫn', '16/01/1979', '', 'Ban QLDAPN', '6acc3e6bca66249c9ffc8b7301565b3e', NULL, 'KT-NNCV-CA01-P04'),
('CV276', 'Dương Nhựt Minh', '11/9/1990', '', 'Đồng Nai', 'fa2ca9286e5fc9ff8bee2dc58810180f', NULL, 'KT-NNCV-CA01-P04'),
('CV277', 'Đoàn Quang  Minh', '20/08/1987', '', 'Tây Sài Gòn', '4eee0d04d17eaf9f2d12ab286e435dde', NULL, 'KT-NNCV-CA01-P04'),
('CV278', 'Hoàng Huyền  Minh', '11/05/1991', '', 'Sài Gòn', 'c4f540fdd7979a4e96996808c34b923a', NULL, 'KT-NNCV-CA01-P04'),
('CV279', 'Dương Phan Nhật Minh', '04/10/1992', '', 'SGD2', '511f3a1b4cb8d42dd8b653facbf80d94', NULL, 'KT-NNCV-CA01-P04'),
('CV280', 'Nguyễn Thị Hằng My', '7/1/1991', '', 'Ba Tháng Hai', '84da7497e0763d014f718afa5891a276', NULL, 'KT-NNCV-CA01-P04'),
('CV281', 'Phạm Thanh Hoàng Nam', '11/11/1985', '', 'Kiên Giang', 'e7cd44ca23f2f33638e5533d42b799e5', NULL, 'KT-NNCV-CA01-P04'),
('CV282', 'Nguyễn Xuân Nam', '4/5/1981', '', 'Đồng Nai', '0e225512f46d585e9b0cf4373c9e46ac', NULL, 'KT-NNCV-CA01-P04'),
('CV283', 'Nguyễn Thị Ngọc  Nga', '19/06/1970', '', 'Long An', '8614e85bf53a9af0f6162ed2265d64b7', NULL, 'KT-NNCV-CA01-P04'),
('CV284', 'Trần Thị Tuyết Nga', '29/07/1984', '', 'Nam Kỳ Khởi Nghĩa', 'd8759c534c706c9c0b0a772433696d0d', NULL, 'KT-NNCV-CA01-P04'),
('CV285', 'Đoàn Văn Ngàn', '04/10/1987', '', 'Bến Thành', '040a7cbc331ce5fa161890168b6ca970', NULL, 'KT-NNCV-CA01-P04'),
('CV286', 'Trần Kim Ngân', '20/5/1979', '', 'Đất Mũi', 'c674fc8d8fe2a4b4f6510650bf146e5c', NULL, 'KT-NNCV-CA01-P04'),
('CV287', 'Nguyễn Thị Kim  Ngân', '15/08/1985', '', 'Hậu Giang', '13e891a4f7071ffdc61b3c16f5f586a6', NULL, 'KT-NNCV-CA01-P04'),
('CV288', 'Bùi Bảo  Ngân', '10/06/1987', '', 'Tây Sài Gòn', 'f171f5e99b46dfe9419ccf29c9d5ba58', NULL, 'KT-NNCV-CA01-P04'),
('CV289', 'Lê Thị Kim  Ngân', '12/02/1991', '', 'Tây Sài Gòn', 'a43b3afafff4b7d5549470c842549fcb', NULL, 'KT-NNCV-CA01-P04'),
('CV290', 'Trần Vũ Ngạn', '09/10/1985', '', 'Bình Thuận', 'e9a8934e66e4d5e319355b325c6f490a', NULL, 'KT-NNCV-CA01-P04'),
('CV291', 'Vũ Thị Hường  Ngát', '09/09/1986', '', 'Dĩ An - Bình Dương', 'afc92cdd54bf6a41881110fab28edc20', NULL, 'KT-NNCV-CA01-P04'),
('CV292', 'Nguyễn Thị Thanh Nghĩa', '2/28/1983', '', 'Hóc Môn', '6c511b55d1f618500b5e9bc035ced9de', NULL, 'KT-NNCV-CA01-P04'),
('CV293', 'Châu Thị Hồng Ngọc', '7/4/1993', '', 'Đông Đăklăk', 'ca896cfe77bb34e927a56df943cf859f', NULL, 'KT-NNCV-CA01-P04'),
('CV294', 'Lê Ngô Cẩm  Ngọc', '18/04/1974', '', 'Tây Đô', '9cfe16f2ce227a0070bb25cb8cbdae1f', NULL, 'KT-NNCV-CA01-P04'),
('CV295', 'Nguyễn Hạnh Ngọc', '01/11/1985', '', 'Khánh Hòa', 'fd8c138e7e80ae6af7ddc7ab1d59f821', NULL, 'KT-NNCV-CA01-P04'),
('CV296', 'Nguyễn Thị Ánh Nguyệt', '10/10/1986', '', 'Gia Lai', 'bdb264528122993d4e9302e1f08a7d85', NULL, 'KT-NNCV-CA01-P05'),
('CV297', 'Lê Ánh  Nguyệt', '2/19/1990', '', 'Châu Thành Sài Gòn', '4ce558beba84d623bd7ec35f8f11a65b', NULL, 'KT-NNCV-CA01-P05'),
('CV298', 'Nguyễn Thị Ánh Nguyệt', '20/02/1987', '', 'Phú Tài', '681ba6cbe62770126154dcc29b5499f7', NULL, 'KT-NNCV-CA01-P05'),
('CV299', 'Dương Thị Ánh Nguyệt', '26/01/1988', '', 'Phú Tài', 'c18ffbd94d5a98f0d76cadd263dfa3c4', NULL, 'KT-NNCV-CA01-P05'),
('CV300', 'Lê Thụy Nhã', '11/06/1986', '', 'Đông Đăklăk', '39091bb9ebd82a39cfc568462602852f', NULL, 'KT-NNCV-CA01-P05'),
('CV301', 'Nguyễn Thị  Nhân', '10/12/1989', '', 'Tp.HCM', 'bb553ef32e0cae352776e80a9660959f', NULL, 'KT-NNCV-CA01-P05'),
('CV302', 'Huỳnh Thị Quỳnh Như', '11/29/1992', '', 'Bình Dương', 'a32722b3cdcc657d955cfcb0c05ac54d', NULL, 'KT-NNCV-CA01-P05'),
('CV303', 'Hoàng Thị Nhung', '9/10/1984', '', 'Bắc Đắk Lắk', '0704c4ac7c1d3bbf3c1dd7af4349d458', NULL, 'KT-NNCV-CA01-P05'),
('CV304', 'Huỳnh Tuyết Nhung', '11/07/1988', '', 'Bạc Liêu', '6beaaa489ebbc96757a967e83ab0f306', NULL, 'KT-NNCV-CA01-P05'),
('CV305', 'Lê Thị Hồng  Nhung', '4/8/1982', '', 'Bình Chánh', 'e871d8401f97b400cd27513f50831ef1', NULL, 'KT-NNCV-CA01-P05'),
('CV306', 'Nguyễn Thị Hồng Nhung', '12/18/1988', '', 'Ba Tháng Hai', 'cc92817308773208504df057577de638', NULL, 'KT-NNCV-CA01-P05'),
('CV307', 'Võ Kim Nhựt', '8/30/1988', '', 'Phú Quốc', '4edd1bceb702d6be95d22b37cc03412d', NULL, 'KT-NNCV-CA01-P05'),
('CV308', 'Nguyễn Thị Xuân Nhựt', '02/02/1987', '', 'Bình Dương', '3ffb5bc7dfc7c2d1db6fcd4aa965791b', NULL, 'KT-NNCV-CA01-P05'),
('CV309', 'Lâm Thị Hồng Phấn', '12/06/1990', '', 'Mộc Hóa', '0bd8cbc3d4c3f72ce0c77a0fefc1bc5a', NULL, 'KT-NNCV-CA01-P05'),
('CV310', 'Nguyễn Tiến Phong', '10/30/1988', '', 'Bình Dương', '6ee8869bb16002232f0251d5c692e596', NULL, 'KT-NNCV-CA01-P05'),
('CV311', 'Phan Minh Phúc', '23/09/1984', '', 'Trà Vinh', '4b387931c6bf53bdd989df6ee6c47598', NULL, 'KT-NNCV-CA01-P05'),
('CV312', 'Nguyễn Hoàng Kim Phúc', '14/10/1991', '', 'Mỹ Phước', 'dac2fa2d84183f3f756ac1858c4887e3', NULL, 'KT-NNCV-CA01-P05'),
('CV313', 'Trần Thanh Phúc', '30/02/1973', '', 'TTCNTT', '6052ddd982bbf19b7092804229db49b4', NULL, 'KT-NNCV-CA01-P05'),
('CV314', 'Nguyễn Thị Thu  Phương', '05/10/1989', '', 'Bà Chiểu', '7fc7a2161e761a1feb793774e0222a59', NULL, 'KT-NNCV-CA01-P05'),
('CV315', 'Lê Thành  Phương', '8/28/1985', '', 'Tiền Giang', '6f80cf424c02d0c10e248848e3c8a0d7', NULL, 'KT-NNCV-CA01-P05'),
('CV316', 'Nguyễn Quốc Nam Phương', '04/11/1978', '', 'Bến Thành', '6a1c5cd401362741c38fcf84d183fe50', NULL, 'KT-NNCV-CA01-P05'),
('CV317', 'Phạm Thị Phương', '02/09/1986', '', 'Đông Sài Gòn', '2ed808a88f90620b569e5d914505296e', NULL, 'KT-NNCV-CA01-P05'),
('CV318', 'Lê Thị Linh Phương', '30/11/1988', '', 'Hải Vân', '9ccb388a9500a5bcc7eec8af70caa872', NULL, 'KT-NNCV-CA01-P05'),
('CV319', 'Nguyễn Thị Kim  Phượng', '10/7/1985', '', 'Vĩnh Long', 'ac39d8f08e9c60e87b4528837fbbe66d', NULL, 'KT-NNCV-CA01-P05'),
('CV320', 'Tạ Thị Minh  Phương ', '09/05/1981', '', 'An Giang ', '6cd2699eac240439fad624bad13168ca', NULL, 'KT-NNCV-CA01-P05'),
('CV321', 'Nguyễn Ngọc  Quân', '16/03/1983', '', 'Tây Sài Gòn', '3ed3e4420eebf615f43e03498f1637df', NULL, 'KT-NNCV-CA01-P05'),
('CV322', 'Đỗ Nhật  Quang', '31/01/1979', '', 'Dĩ An - Bình Dương', '78a72baa59adc8c23bfd18e62bc1684f', NULL, 'KT-NNCV-CA01-P05'),
('CV323', 'Đoàn Thị Ngọc Quí', '03/09/1990', '', 'Quảng Ngãi', '899d19493bec0f71f335600b12f2e883', NULL, 'KT-NNCV-CA01-P05'),
('CV324', 'Phạm Thị Kim  Quyên', '20/04/1983', '', 'Mỹ Tho', '3a1134809a58a7a33b859018386addb9', NULL, 'KT-NNCV-CA01-P06'),
('CV325', 'Nguyễn Thanh Sang', '18/08/1981', '', 'Mỹ Tho', '3a896040dedcf7f3d21c25e90575f324', NULL, 'KT-NNCV-CA01-P06'),
('CV326', 'Ngô Ngọc  Sơn', '2/17/1986', '', 'Nam Gia Lai', '43cf65f19239a4794c10452bd279e7a4', NULL, 'KT-NNCV-CA01-P06'),
('CV327', 'Lương Phan Hồng  Sơn', '20/06/1980', '', 'Kỳ Hòa ', '7cc043b8dfa0ef90a0625ffaa5082d68', NULL, 'KT-NNCV-CA01-P06'),
('CV328', 'Trương Thị Tuyết Sương', '5/4/1989', '', 'Ba Tháng Hai', 'a58a770ff1a013bd3f60ee609a851c2c', NULL, 'KT-NNCV-CA01-P06'),
('CV329', 'Nguyễn Đức  Tâm', '11/16/1977', '', 'Kiên Giang', 'a19a29cbcaec32059f22fd10f884ed87', NULL, 'KT-NNCV-CA01-P06'),
('CV330', 'Nguyễn Thị Thanh Tâm', '12/04/1988', '', 'Tp.HCM', 'af604e5e9a81ff78e547f60c20bb2073', NULL, 'KT-NNCV-CA01-P06'),
('CV331', 'Trần Hà Tân', '21/01/1991', '', 'Sóc Trăng', '4ae1a0ed8dabd4952f943cb626da0386', NULL, 'KT-NNCV-CA01-P06'),
('CV332', 'Lâm Hoàng Tân', '15/06/1985', '', 'Sa Đéc', '3f2051fd08248abb9e3ae58c764ad90b', NULL, 'KT-NNCV-CA01-P06'),
('CV333', 'Huỳnh Lê Nguyên Tần', '2/28/1992', '', 'Đồng Nai', 'cf96c5ab2e5ba7ef317d9104b4576dce', NULL, 'KT-NNCV-CA01-P06'),
('CV334', 'Đặng Quang Thạch', '16/08/1991', '', 'Bình Định', '4f565f419afdf9f41b70d6346417b9d1', NULL, 'KT-NNCV-CA01-P06'),
('CV335', 'Lương Phan Hồng Thắm', '25/06/1982', '', 'Tân Bình', '56c5961cfbab85c97c87ec9c0b82db1e', NULL, 'KT-NNCV-CA01-P06'),
('CV336', 'Hồ Thị Hồng  Thắm', '15/03/1992', '', 'Gia Định', '36b2bcb40f1dd0b51bdf072dc9dab77a', NULL, 'KT-NNCV-CA01-P06'),
('CV337', 'Đinh Văn Thân', '11/11/1980', '', 'Văn phòng 2', '65be17268233dbd6d5580b66f7ab2e4d', NULL, 'KT-NNCV-CA01-P06'),
('CV338', 'Hoàng Đức  Thắng', '1/15/1991', '', 'Bắc Sài Gòn', '80f3b4277df6fcfb03247b1d616689ea', NULL, 'KT-NNCV-CA01-P06'),
('CV339', 'Đinh Thị Phương Thanh', '14/9/1989', '', 'Nam Gia Lai', '9368ad6f414981936502a637c2acf54e', NULL, 'KT-NNCV-CA01-P06'),
('CV340', 'Huỳnh Võ Châu  Thanh', '17/08/1988', '', 'Thủ Dầu Một', '35534adba6face11c40bde1bbc7f859d', NULL, 'KT-NNCV-CA01-P06'),
('CV341', 'Nguyễn Tiến Thành', '07/11/1986', '', 'Đông Đồng Nai', 'c25e31f2003606c930d532fdd0945ada', NULL, 'KT-NNCV-CA01-P06'),
('CV342', 'Cao Ngọc Thành', '08/03/1989', '', 'Ba Tháng Hai', '4e1bb38977e14e6c9dee38160d4a1a55', NULL, 'KT-NNCV-CA01-P06'),
('CV343', 'Trương Thị Thanh Thảo', '25/6/1980', '', 'Nam Gia Lai', '96715048e8b026e6a915922dbbd3a07b', NULL, 'KT-NNCV-CA01-P06'),
('CV344', 'Trần Thị Phương  Thảo', '27/5/1977', '', 'Đất Mũi', 'cf03d24f7531a43f587c9a5d88310c3c', NULL, 'KT-NNCV-CA01-P06'),
('CV345', 'Huỳnh Trần Vi Thảo', '02/02/1979', '', 'Hậu Giang', '9c88059bb865272fe3ac492cf7e94b84', NULL, 'KT-NNCV-CA01-P06'),
('CV346', 'Phan Thị Thu Thảo', '5/18/1992', '', 'Tân Bình', '8459837baa8aa087b0592618e1097e16', NULL, 'KT-NNCV-CA01-P06'),
('CV347', 'Phạm Thị Bích  Thảo', '08/10/1982', '', 'Tây Đô', 'fc12e9def1070e381d54f82fb9dcf489', NULL, 'KT-NNCV-CA01-P06'),
('CV348', 'Đinh Thị Thảo', '02/09/1984', '', 'Kỳ Hòa ', 'a096dd057b0eff07942adb75c656f183', NULL, 'KT-NNCV-CA01-P06'),
('CV349', 'Châu Thị Phương  Thảo', '11/30/1979', '', 'Phú Mỹ Hưng', '8a70c9bcd1ef19893db7ee7c8d41c6be', NULL, 'KT-NNCV-CA01-P06'),
('CV350', 'Nguyễn Hoàng Phương Thảo', '7/2/1982', '', 'Bình Dương', '4c89023116a9d324e3c1a7dae699d27c', NULL, 'KT-NNCV-CA01-P06'),
('CV351', 'Bùi Thị Phương  Thảo', '04/04/1989', '', 'Dĩ An - Bình Dương', '96ef2f0707ed9814ba3aea9f36385cae', NULL, 'KT-NNCV-CA01-P06'),
('CV352', 'Phạm Thị Phương Thảo', '31/05/1989', '', 'Long An', 'b35ba54689862a8327604640983ffcb0', NULL, 'KT-NNCV-CA01-P07'),
('CV353', 'Lê Thị Thanh Thảo', '24/11/1981', '', 'Đồng Tháp', '602aead9ddd8bce35307cb85a1e6dc96', NULL, 'KT-NNCV-CA01-P07'),
('CV354', 'Trần Thị Thảo', '27/02/1980', '', 'Sa Đéc', '40767f40c59aaef63bbffc6dcbf29dbc', NULL, 'KT-NNCV-CA01-P07'),
('CV355', 'Trần Phương  Thảo', '30/04/1985', '', 'Gia Định', 'f356f41efbf8ba6f6b6d5a28b634c486', NULL, 'KT-NNCV-CA01-P07'),
('CV356', 'Trần Thị Mai Thảo', '24/06/1990', '', 'Tp.HCM', 'aeff2430da77e06c45da51d518e1119b', NULL, 'KT-NNCV-CA01-P07'),
('CV357', 'Nguyễn Thị Dạ  Thảo', '18/01/1990', '', 'Tây Sài Gòn', '09750ec67853c35932191d253d214ac1', NULL, 'KT-NNCV-CA01-P07'),
('CV358', 'Nguyễn Thị Anh Thảo', '17/04/1992', '', 'SGD2', 'd19715a025cf1d141e326ead8e41c69b', NULL, 'KT-NNCV-CA01-P07'),
('CV359', 'Nguyễn Thị Anh  Thi', '27/09/1985', '', 'Tp.HCM', '3b62741439b3cbed9130a0cc9dca1f1f', NULL, 'KT-NNCV-CA01-P07'),
('CV360', 'Đỗ Nguyên  Thiện', '05/06/1984', '', 'Nam Đồng Nai', 'acb104d71912a8c029841f1dc0995f64', NULL, 'KT-NNCV-CA01-P07'),
('CV361', 'Ngô Thị   Thính', '26/09/1983', '', 'TTDVKQPN', '3ef2de793a0dde5c6861a8d0ad60e480', NULL, 'KT-NNCV-CA01-P07'),
('CV362', 'Phan Thị Hồng Thơ', '05/03/1985', '', 'Đồng Khởi', '83b827880d5ae9e43efaadaf72c4378d', NULL, 'KT-NNCV-CA01-P07'),
('CV363', 'Nguyễn Thị Thi  Thơ', '16/09/1991', '', 'Phú Tài', 'd8577e594a9997adcba61f43026396d4', NULL, 'KT-NNCV-CA01-P07'),
('CV364', 'Huỳnh Thị Hồng Thoa', '19/04/2086', '', 'Hậu Giang', '3370c33470a0e5b64fb914779a5690c9', NULL, 'KT-NNCV-CA01-P07'),
('CV365', 'Lê Kim Thoa', '10/13/1984', '', 'Tiền Giang', 'cad27f5ff1502477beeff6a7e6900eb3', NULL, 'KT-NNCV-CA01-P07'),
('CV366', 'Lê Văn  Thoại', '11/12/1984', '', 'Bắc Sài Gòn', '47ac5a3b3d2397aa01f3fd9a390120e3', NULL, 'KT-NNCV-CA01-P07'),
('CV367', 'Hoàng Thị Thu', '8/14/1991', '', 'Đồng Nai', 'd6054b8891956550ee6251eb5e0c4e70', NULL, 'KT-NNCV-CA01-P07'),
('CV368', 'Nguyễn Thị Bích Thu', '8/20/1991', '', 'Mộc Hóa', '30dc3129e17ff8cd562b1b9d85e9cda4', NULL, 'KT-NNCV-CA01-P07'),
('CV369', 'Trần Ngọc Ánh Thu', '12/09/1981', '', 'Sa Đéc', '4251cff2694e737b7f02acb0b08ab869', NULL, 'KT-NNCV-CA01-P07'),
('CV370', 'Ngô Thị Ngọc Thu', '26/11/1987', '', 'Sa Đéc', '5957a6b4f6aefa3bcff1a5cc70887948', NULL, 'KT-NNCV-CA01-P07'),
('CV371', 'Trần Ngọc Mai  Thư', '06/09/1992', '', 'Nam Bình Dương', 'fa94ae05f511faa44b5139d6cb624ca8', NULL, 'KT-NNCV-CA01-P07'),
('CV372', 'Lê Thị Cẩm Thúy', '3/10/1976', '', 'Bạc Liêu', '96170cc43bd77a7b385939405c8df626', NULL, 'KT-NNCV-CA01-P07'),
('CV373', 'Tống Thị  Thúy', '26/12/1980', '', 'Hậu Giang', 'a8eb5bc42d4ebd3ce2e07fe4d450c7a6', NULL, 'KT-NNCV-CA01-P07'),
('CV374', 'Trần Thị Bảo Thúy', '1/21/1982', '', 'Bình Dương', '3f915870e6a5c15b0f9e8bbf0e319cd9', NULL, 'KT-NNCV-CA01-P07'),
('CV375', 'Nguyễn Phạm Thanh Thúy', '16/11/1989', '', 'Nam Bình Dương', '3e2c3507b0f10ba67a350eb354f2dd84', NULL, 'KT-NNCV-CA01-P07'),
('CV376', 'Lưu Thị Thùy Thúy', '20/01/1992', '', 'Quảng Ngãi', '9b59200db07d91929d66d0cacd4f0649', NULL, 'KT-NNCV-CA01-P07'),
('CV377', 'Lưu Thị Thanh Thủy', '11/18/1988', '', 'Đồng Nai', 'a337debe7ae19925a3c39ba2595efbb5', NULL, 'KT-NNCV-CA01-P07'),
('CV378', 'Nguyễn Ngọc Thủy', '9/1/1989', '', 'Bến Thành', 'bb800323dda2778904b44bff0721f63b', NULL, 'KT-NNCV-CA01-P07'),
('CV379', 'Lê Hoàng Ngọc Thụy', '2/19/1985', '', 'Đồng Nai', '99fc081e70165e8f1a7b71a6d9673e62', NULL, 'KT-NNCV-CA01-P07'),
('CV380', 'Đặng Thị Hòa Thuyên', '10/10/1989', '', 'Phú Nhuận', '4f573878d91314df6a9c9abda28cda77', NULL, 'KT-NNCV-CA01-P08'),
('CV381', 'Nguyễn Thanh Thế Toàn', '22/06/1984', '', 'Tiền Giang', '4d462e1dab089e43f455a2b6fa41bfb2', NULL, 'KT-NNCV-CA01-P08'),
('CV382', 'Đinh Trọng  Toàn', '21/01/1990', '', 'Phú Tài', '4a6279f8e7d30db235bd6fbe343dfa52', NULL, 'KT-NNCV-CA01-P08'),
('CV383', 'Võ Thị Thanh Trà', '4/17/1990', '', 'Bình Dương', 'ac92a6cfb52cab22360ab3f9003e7abf', NULL, 'KT-NNCV-CA01-P08'),
('CV384', 'Lê Thị Hương Trà', '05/05/1990', '', 'Tp.HCM', '007eb13ba0e40b04732f7fb7cc138f9f', NULL, 'KT-NNCV-CA01-P08'),
('CV385', 'Phạm Đỗ Bảo Trâm', '2/27/1989', '', 'Đồng Nai', 'd78f9ce0e645b6da784c37d4baeab9e0', NULL, 'KT-NNCV-CA01-P08'),
('CV386', 'Phan Thị Huyền  Trang', '25/11/1993', '', 'Bảo Lộc', 'd172b54cbe5f878c83ab4e5ec2296031', NULL, 'KT-NNCV-CA01-P08'),
('CV387', 'Hồ Thị Thùy  Trang', '21/05/1989', '', 'Dĩ An - Bình Dương', '755515f6be3d50e69d0f449e3b8319c3', NULL, 'KT-NNCV-CA01-P08'),
('CV388', 'Trần Thị Minh Trang', '8/25/1978', '', 'Tây Ninh', '7d2c84d3ce1bef77a8fd86ba0d37d13e', NULL, 'KT-NNCV-CA01-P08'),
('CV389', 'Nguyễn Thị Kiều Trang', '27/07/1987', '', 'Long An', 'ee2a47b1ac18731291eb716924e5ce9b', NULL, 'KT-NNCV-CA01-P08'),
('CV390', 'Trần Thị Kiều Trang', '24/01/1991', '', 'Long An', '441160dfce069f3ea8fc21492e7ef46e', NULL, 'KT-NNCV-CA01-P08'),
('CV391', 'Lê Thị Mỹ  Trang', '12/08/1984', '', 'Đông Sài Gòn', 'f3920ef45c4d891489208331969a94fc', NULL, 'KT-NNCV-CA01-P08'),
('CV392', 'Trịnh Văn Thu Trang', '09/01/1988', '', 'Sài Gòn', '232a0661a43ace3afb8423093c1d5f60', NULL, 'KT-NNCV-CA01-P08'),
('CV393', 'Trần Lê Đại  Trí', '26/06/1989', '', 'Đà Nẵng', 'd024ae933c9713ca220cda0c182d7c50', NULL, 'KT-NNCV-CA01-P08'),
('CV394', 'Huỳnh Thanh Triều', '16/09/1990', '', 'Trà Vinh', 'e773a987c995f8bafc1db39c80e90fac', NULL, 'KT-NNCV-CA01-P08'),
('CV395', 'Nguyễn Thị Tú Trinh', '7/2/1988', '', 'Gia Lai', 'bd71e0a44bd2246d2acada787c7f483f', NULL, 'KT-NNCV-CA01-P08'),
('CV396', 'Lại Thị Trinh', '15/05/1986', '', 'Long An', '56bf2280de1f95575595d4e1075acf43', NULL, 'KT-NNCV-CA01-P08'),
('CV397', 'Nguyễn Thụy Thanh Trúc', '9/17/1982', '', 'Kiên Giang', '862f4fe58683e9c945a2512e04a93c53', NULL, 'KT-NNCV-CA01-P08'),
('CV398', 'Trần Thanh Trúc', '8/24/1980', '', 'Bình Dương', '2bb1cf2ce8885c40b71b189ec38e455a', NULL, 'KT-NNCV-CA01-P08'),
('CV399', 'Nguyễn Thành Trung', '15/07/1982', '', 'Trà Vinh', '4d34a5d73163cd1581f4057db2b28c1a', NULL, 'KT-NNCV-CA01-P08'),
('CV400', 'Vũ Văn Trung', '5/20/1988', '', 'Nam Đồng Nai', 'ad7321bf21f58ebfbcbab703207585b9', NULL, 'KT-NNCV-CA01-P08'),
('CV401', 'Nguyễn Đức  Trung', '02/12/1988', '', 'Gia Định', '414ce21a30c85e51cb30b3202dfb9ff0', NULL, 'KT-NNCV-CA01-P08'),
('CV402', 'Nguyễn Đỗ Vĩnh  Trung', '1/3/1991', '', 'Nam Kỳ Khởi Nghĩa', '3306d3dedaaf9bd0cbd84b8de4f36215', NULL, 'KT-NNCV-CA01-P08'),
('CV403', 'Đỗ Thành  Trung', '24/01/1981', '', 'Tp.HCM', 'd4e841fc93e501a1ee95bba358194455', NULL, 'KT-NNCV-CA01-P08'),
('CV404', 'Nguyễn  Đình  Trung', '06/01/1987', '', 'TTDVKQPN', '1e91d3c55647b27e081c8e7b68b8ee27', NULL, 'KT-NNCV-CA01-P08'),
('CV405', 'Ngô Phi Trường', '20/05/1990', '', 'Bến Thành', '6a40d2d09c57d27285cb170aa898c9e2', NULL, 'KT-NNCV-CA01-P08'),
('CV406', 'Võ Ngọc Tú', '23/11/1988', '', 'Quy Nhơn', '2cdeb310cf50e27af6d88967d72b2a1e', NULL, 'KT-NNCV-CA01-P08'),
('CV407', 'Nguyễn Phương Tùng', '3/3/1981', '', 'Tân Bình', '09978f4749bc1fce0196ff93181d0880', NULL, 'KT-NNCV-CA01-P08'),
('CV408', 'Trần Thanh Tùng', '8/20/1984', '', 'Mộc Hóa', 'aa61808fe3d3359142ded340d5189ad7', NULL, 'KT-NNCV-CA01-P09'),
('CV409', 'Ngọ Thị Minh  Tuyền', '15/01/1989', '', 'Đông Đăklăk', '2fa2366001dbaf18790c22849cfd94c9', NULL, 'KT-NNCV-CA01-P09'),
('CV410', 'Trần Thị Thanh Tuyền', '30/05/1990', '', 'Đắk Nông', '18b74075c7e0287d0c477411a43f2e46', NULL, 'KT-NNCV-CA01-P09'),
('CV411', 'Phạm Quang  Tuyền', '02/08/1983', '', 'Đà Lạt', 'f1acbf8b5b1d37149a55b6d0a2bfdc98', NULL, 'KT-NNCV-CA01-P09'),
('CV412', 'Nguyễn Ngọc Thảo Uyên', '6/13/1978', '', 'Tiền Giang', 'b2cb1dfb7154b9af5ff1dc0a8f3d49c4', NULL, 'KT-NNCV-CA01-P09'),
('CV413', 'Trần Phạm Mai Uyên', '29/12/1987', '', 'Tp.HCM', '373500529549de9e5b9027084adf063e', NULL, 'KT-NNCV-CA01-P09'),
('CV414', 'Nguyễn Thị Phương  Uyên', '22/08/1986', '', 'Quảng Nam', '28dbd211eede0cce4ba41cfcd7005589', NULL, 'KT-NNCV-CA01-P09'),
('CV415', 'Trần Nguyễn Hương Vân', '07/03/1987', '', 'Nam Gia Lai', '45dfda10fe1d397e6fc24394e74bf9af', NULL, 'KT-NNCV-CA01-P09'),
('CV416', 'Nguyễn Thị Huyền  Vân', '02/11/1990', '', 'Thủ Đức', '5d4581c91c8b4be399a0b00c38535064', NULL, 'KT-NNCV-CA01-P09'),
('CV417', 'Nguyễn Thị Hồng  Vân', '06/11/1988', '', 'Tây Ninh', '3469b03296351a39484eded30a07f912', NULL, 'KT-NNCV-CA01-P09'),
('CV418', 'Nguyễn Thị Hồng Vân', '01/01/1980', '', 'Long An', '955e9aeb1bba63961ece64ab8d0e6e41', NULL, 'KT-NNCV-CA01-P09'),
('CV419', 'Nguyễn Ngọc Tường Vi', '04/12/1988', '', 'Vũng Tàu - Côn Đảo', '004b9ef9f133455fd22774b5b1fbbd34', NULL, 'KT-NNCV-CA01-P09'),
('CV420', 'Nguyễn Quang Vinh', '06/12/1977', '', 'Trà Vinh', 'b3bfef1835826ff1533cd52105b6c5dd', NULL, 'KT-NNCV-CA01-P09'),
('CV421', 'Võ Minh Vinh', '10/11/1988', '', 'Tân Bình', 'bbe48155b9d6daa1b662bd7a9a209593', NULL, 'KT-NNCV-CA01-P09'),
('CV422', 'Huỳnh Hoàng Uy Vũ', '14/09/1977', '', 'Mộc Hóa', '57641e967e67a627db5237545d124fc2', NULL, 'KT-NNCV-CA01-P09'),
('CV423', 'Lưu Nguyễn Tường Vy', '18/09/1988', '', 'Nam Gia Lai', 'b7dbb4e27ac1dd9a9ee7ae5015639e7e', NULL, 'KT-NNCV-CA01-P09'),
('CV424', 'Huỳnh Trần Tường  Vy', '19/12/1977', '', 'Biên Hòa', '6dc943f2c2dcfd0644a1a28562f2befc', NULL, 'KT-NNCV-CA01-P09'),
('CV425', 'Trần Lê Vy', '18/09/1988', '', 'Phú Tài', 'aade93f425b0f10b3c22a1931e473b09', NULL, 'KT-NNCV-CA01-P09'),
('CV426', 'Lê Thị Mai Vy', '06/02/1989', '', 'Phú Tài', '640e8c20d035251e933669755995e72c', NULL, 'KT-NNCV-CA01-P09'),
('CV427', 'Trương Thị Xinh', '14/4/1986', '', 'Bắc Đắk Lắk', '9e8d0ab0cc0e0c629f880ffb6ba7dedc', NULL, 'KT-NNCV-CA01-P09'),
('CV428', 'Vũ Thị Thanh  Xuân', '18/07/1984', '', 'Biên Hòa', '5034f1b26df95188dd2f571e9497b5e3', NULL, 'KT-NNCV-CA01-P09'),
('CV429', 'Trần Thị Kim  Xuyến', '13/06/1983', '', 'Sài Gòn', 'b0a079f43496836adfd18af49eaa6aaa', NULL, 'KT-NNCV-CA01-P09'),
('CV430', 'Nguyễn Thị Kim  Yến', '9/1/1987', '', 'Bình Tây Sài Gòn', '94a8b5105c6c64775bf29abe0c217df5', NULL, 'KT-NNCV-CA01-P09'),
('CV431', 'Nguyễn Thị  Yến', '11/11/1987', '', 'Đồng Nai', '7a5c87bdcbb6f8e7a005da0e2824d093', NULL, 'KT-NNCV-CA01-P09'),
('CV432', 'Lê Thụy Hải Yến', '16/04/1990', '', 'Bà Rịa Vũng Tàu', '3d7b36c625da8921cde9b92bfe173b30', NULL, 'KT-NNCV-CA01-P09');

-- --------------------------------------------------------

--
-- Table structure for table `kythi`
--

CREATE TABLE IF NOT EXISTS `kythi` (
  `makythi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenkythi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `tgbatdau` timestamp NULL DEFAULT NULL,
  `tgketthuc` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kythi`
--

INSERT INTO `kythi` (`makythi`, `tenkythi`, `tgbatdau`, `tgketthuc`) VALUES
('KT-NNCV', 'Kỳ thi chuyển đổi chức danh chuyên môn nghiệp vụ BIDV năm 2018', '2018-12-14 17:00:00', '2018-12-14 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `matkhau`
--

CREATE TABLE IF NOT EXISTS `matkhau` (
  `id` int(11) NOT NULL,
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `matkhau`
--

INSERT INTO `matkhau` (`id`, `sbd`, `matkhau`) VALUES
(1, 'CV184', '853883'),
(2, 'CV185', '795465'),
(3, 'CV186', '840925'),
(4, 'CV187', '197149'),
(5, 'CV188', '754621'),
(6, 'CV189', '756144'),
(7, 'CV190', '114681'),
(8, 'CV191', '900859'),
(9, 'CV192', '136281'),
(10, 'CV193', '729417'),
(11, 'CV194', '476241'),
(12, 'CV195', '541226'),
(13, 'CV196', '121816'),
(14, 'CV197', '137509'),
(15, 'CV198', '958916'),
(16, 'CV199', '833653'),
(17, 'CV200', '142718'),
(18, 'CV201', '811720'),
(19, 'CV202', '173130'),
(20, 'CV203', '398280'),
(21, 'CV204', '233229'),
(22, 'CV205', '375205'),
(23, 'CV206', '172815'),
(24, 'CV207', '269242'),
(25, 'CV208', '704463'),
(26, 'CV209', '851364'),
(27, 'CV210', '168593'),
(28, 'CV211', '667050'),
(29, 'CV212', '900509'),
(30, 'CV213', '625403'),
(31, 'CV214', '905086'),
(32, 'CV215', '617848'),
(33, 'CV216', '454721'),
(34, 'CV217', '920739'),
(35, 'CV218', '278051'),
(36, 'CV219', '934380'),
(37, 'CV220', '631956'),
(38, 'CV221', '800152'),
(39, 'CV222', '444653'),
(40, 'CV223', '917447'),
(41, 'CV224', '872325'),
(42, 'CV225', '598895'),
(43, 'CV226', '825106'),
(44, 'CV227', '959520'),
(45, 'CV228', '480160'),
(46, 'CV229', '435181'),
(47, 'CV230', '556733'),
(48, 'CV231', '203871'),
(49, 'CV232', '508895'),
(50, 'CV233', '526241'),
(51, 'CV234', '957764'),
(52, 'CV235', '871504'),
(53, 'CV236', '368432'),
(54, 'CV237', '302309'),
(55, 'CV238', '341324'),
(56, 'CV239', '396940'),
(57, 'CV240', '179661'),
(58, 'CV241', '570342'),
(59, 'CV242', '485387'),
(60, 'CV243', '916737'),
(61, 'CV244', '280136'),
(62, 'CV245', '757369'),
(63, 'CV246', '244629'),
(64, 'CV247', '439616'),
(65, 'CV248', '650121'),
(66, 'CV249', '733749'),
(67, 'CV250', '878433'),
(68, 'CV251', '266028'),
(69, 'CV252', '401939'),
(70, 'CV253', '720605'),
(71, 'CV254', '609239'),
(72, 'CV255', '622177'),
(73, 'CV256', '866700'),
(74, 'CV257', '942488'),
(75, 'CV258', '650152'),
(76, 'CV259', '938205'),
(77, 'CV260', '257849'),
(78, 'CV261', '641392'),
(79, 'CV262', '244412'),
(80, 'CV263', '418435'),
(81, 'CV264', '816407'),
(82, 'CV265', '129568'),
(83, 'CV266', '613434'),
(84, 'CV267', '203288'),
(85, 'CV268', '847888'),
(86, 'CV269', '529339'),
(87, 'CV270', '179369'),
(88, 'CV271', '516688'),
(89, 'CV272', '592223'),
(90, 'CV273', '263008'),
(91, 'CV274', '855300'),
(92, 'CV275', '889067'),
(93, 'CV276', '272945'),
(94, 'CV277', '464718'),
(95, 'CV278', '183789'),
(96, 'CV279', '236648'),
(97, 'CV280', '901177'),
(98, 'CV281', '354880'),
(99, 'CV282', '286839'),
(100, 'CV283', '978732'),
(101, 'CV284', '222121'),
(102, 'CV285', '267447'),
(103, 'CV286', '487773'),
(104, 'CV287', '358583'),
(105, 'CV288', '156130'),
(106, 'CV289', '313912'),
(107, 'CV290', '808832'),
(108, 'CV291', '678213'),
(109, 'CV292', '816335'),
(110, 'CV293', '926518'),
(111, 'CV294', '861340'),
(112, 'CV295', '982234'),
(113, 'CV296', '272313'),
(114, 'CV297', '895877'),
(115, 'CV298', '751735'),
(116, 'CV299', '699213'),
(117, 'CV300', '354661'),
(118, 'CV301', '529707'),
(119, 'CV302', '500328'),
(120, 'CV303', '284644'),
(121, 'CV304', '855708'),
(122, 'CV305', '516592'),
(123, 'CV306', '129317'),
(124, 'CV307', '203656'),
(125, 'CV308', '378857'),
(126, 'CV309', '197485'),
(127, 'CV310', '432834'),
(128, 'CV311', '878282'),
(129, 'CV312', '756240'),
(130, 'CV313', '587597'),
(131, 'CV314', '961202'),
(132, 'CV315', '612734'),
(133, 'CV316', '511090'),
(134, 'CV317', '106252'),
(135, 'CV318', '938852'),
(136, 'CV319', '558455'),
(137, 'CV320', '786649'),
(138, 'CV321', '899882'),
(139, 'CV322', '576708'),
(140, 'CV323', '818557'),
(141, 'CV324', '945121'),
(142, 'CV325', '428486'),
(143, 'CV326', '799518'),
(144, 'CV327', '681670'),
(145, 'CV328', '445758'),
(146, 'CV329', '743949'),
(147, 'CV330', '634570'),
(148, 'CV331', '929772'),
(149, 'CV332', '559340'),
(150, 'CV333', '301200'),
(151, 'CV334', '789768'),
(152, 'CV335', '207842'),
(153, 'CV336', '509209'),
(154, 'CV337', '427611'),
(155, 'CV338', '587384'),
(156, 'CV339', '578115'),
(157, 'CV340', '718678'),
(158, 'CV341', '331475'),
(159, 'CV342', '140681'),
(160, 'CV343', '234901'),
(161, 'CV344', '497779'),
(162, 'CV345', '268735'),
(163, 'CV346', '610761'),
(164, 'CV347', '538444'),
(165, 'CV348', '891924'),
(166, 'CV349', '228992'),
(167, 'CV350', '500077'),
(168, 'CV351', '774866'),
(169, 'CV352', '783100'),
(170, 'CV353', '367309'),
(171, 'CV354', '117283'),
(172, 'CV355', '834353'),
(173, 'CV356', '734906'),
(174, 'CV357', '652256'),
(175, 'CV358', '664617'),
(176, 'CV359', '919194'),
(177, 'CV360', '162278'),
(178, 'CV361', '978646'),
(179, 'CV362', '759115'),
(180, 'CV363', '206095'),
(181, 'CV364', '800320'),
(182, 'CV365', '656900'),
(183, 'CV366', '426028'),
(184, 'CV367', '816487'),
(185, 'CV368', '571393'),
(186, 'CV369', '820162'),
(187, 'CV370', '975560'),
(188, 'CV371', '374472'),
(189, 'CV372', '195600'),
(190, 'CV373', '911744'),
(191, 'CV374', '751952'),
(192, 'CV375', '610393'),
(193, 'CV376', '107385'),
(194, 'CV377', '233979'),
(195, 'CV378', '865327'),
(196, 'CV379', '247584'),
(197, 'CV380', '120467'),
(198, 'CV381', '856199'),
(199, 'CV382', '932712'),
(200, 'CV383', '902479'),
(201, 'CV384', '519409'),
(202, 'CV385', '283759'),
(203, 'CV386', '339137'),
(204, 'CV387', '625516'),
(205, 'CV388', '498173'),
(206, 'CV389', '411904'),
(207, 'CV390', '634346'),
(208, 'CV391', '977400'),
(209, 'CV392', '971902'),
(210, 'CV393', '994967'),
(211, 'CV394', '259771'),
(212, 'CV395', '189173'),
(213, 'CV396', '581018'),
(214, 'CV397', '134060'),
(215, 'CV398', '426544'),
(216, 'CV399', '364137'),
(217, 'CV400', '269623'),
(218, 'CV401', '863526'),
(219, 'CV402', '468977'),
(220, 'CV403', '955615'),
(221, 'CV404', '328961'),
(222, 'CV405', '604567'),
(223, 'CV406', '497305'),
(224, 'CV407', '264750'),
(225, 'CV408', '419849'),
(226, 'CV409', '717878'),
(227, 'CV410', '650287'),
(228, 'CV411', '309145'),
(229, 'CV412', '653324'),
(230, 'CV413', '876864'),
(231, 'CV414', '328786'),
(232, 'CV415', '917320'),
(233, 'CV416', '841144'),
(234, 'CV417', '854171'),
(235, 'CV418', '122035'),
(236, 'CV419', '794531'),
(237, 'CV420', '426320'),
(238, 'CV421', '871030'),
(239, 'CV422', '364467'),
(240, 'CV423', '673901'),
(241, 'CV424', '401306'),
(242, 'CV425', '252774'),
(243, 'CV426', '267285'),
(244, 'CV427', '185652'),
(245, 'CV428', '218294'),
(246, 'CV429', '217495'),
(247, 'CV430', '964740'),
(248, 'CV431', '234117'),
(249, 'CV432', '980526');

-- --------------------------------------------------------

--
-- Table structure for table `modun`
--

CREATE TABLE IF NOT EXISTS `modun` (
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenmodun` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `makythi` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modun`
--

INSERT INTO `modun` (`mamodun`, `tenmodun`, `makythi`) VALUES
('TAB', 'Tiếng Anh B', 'KT-NNCV'),
('TAC', 'Tiếng Anh C', 'KT-NNCV'),
('TQ', 'Tiếng Trung Quốc', 'KT-NNCV');

-- --------------------------------------------------------

--
-- Table structure for table `phongthi`
--

CREATE TABLE IF NOT EXISTS `phongthi` (
  `mapt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tenpt` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluongts` int(11) DEFAULT NULL,
  `ghichu` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macathi` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phongthi`
--

INSERT INTO `phongthi` (`mapt`, `tenpt`, `soluongts`, `ghichu`, `macathi`) VALUES
('KT-NNCV-CA01-P01', 'Phòng 01', 30, '', 'KT-NNCV-CA01'),
('KT-NNCV-CA01-P02', 'Phòng 02', 30, '', 'KT-NNCV-CA01'),
('KT-NNCV-CA01-P03', 'Phòng 03', 30, '', 'KT-NNCV-CA01'),
('KT-NNCV-CA01-P04', 'Phòng 04', 30, '', 'KT-NNCV-CA01'),
('KT-NNCV-CA01-P05', 'Phòng 05', 30, '', 'KT-NNCV-CA01'),
('KT-NNCV-CA01-P06', 'Phòng 06', 30, '', 'KT-NNCV-CA01'),
('KT-NNCV-CA01-P07', 'Phòng 07', 30, '', 'KT-NNCV-CA01'),
('KT-NNCV-CA01-P08', 'Phòng 08', 30, '', 'KT-NNCV-CA01'),
('KT-NNCV-CA01-P09', 'Phòng 09', 30, '', 'KT-NNCV-CA01');

-- --------------------------------------------------------

--
-- Table structure for table `remote`
--

CREATE TABLE IF NOT EXISTS `remote` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estatus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `sbd` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `traloi` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thoigianthi`
--

CREATE TABLE IF NOT EXISTS `thoigianthi` (
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tongcauhoi` tinyint(4) DEFAULT NULL,
  `tgthi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`maadmin`);

--
-- Indexes for table `bode`
--
ALTER TABLE `bode`
  ADD PRIMARY KEY (`mabode`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `cathi`
--
ALTER TABLE `cathi`
  ADD PRIMARY KEY (`macathi`),
  ADD KEY `makythi` (`makythi`);

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`macauhoi`),
  ADD KEY `mabode` (`mabode`);

--
-- Indexes for table `cpthi`
--
ALTER TABLE `cpthi`
  ADD PRIMARY KEY (`sbd`,`mamodun`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `dethiprofile`
--
ALTER TABLE `dethiprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `dethisinh`
--
ALTER TABLE `dethisinh`
  ADD PRIMARY KEY (`sbd`,`macauhoi`),
  ADD KEY `macauhoi` (`macauhoi`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `dethisinhthu`
--
ALTER TABLE `dethisinhthu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`sbd`,`mamodun`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`sbd`),
  ADD KEY `fr_hocvien` (`mapt`);

--
-- Indexes for table `kythi`
--
ALTER TABLE `kythi`
  ADD PRIMARY KEY (`makythi`);

--
-- Indexes for table `matkhau`
--
ALTER TABLE `matkhau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sbd` (`sbd`);

--
-- Indexes for table `modun`
--
ALTER TABLE `modun`
  ADD PRIMARY KEY (`mamodun`),
  ADD KEY `makythi` (`makythi`);

--
-- Indexes for table `phongthi`
--
ALTER TABLE `phongthi`
  ADD PRIMARY KEY (`mapt`),
  ADD KEY `macathi` (`macathi`);

--
-- Indexes for table `remote`
--
ALTER TABLE `remote`
  ADD PRIMARY KEY (`sbd`,`mamodun`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`sbd`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thoigianthi`
--
ALTER TABLE `thoigianthi`
  ADD PRIMARY KEY (`mamodun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dethisinhthu`
--
ALTER TABLE `dethisinhthu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `errors`
--
ALTER TABLE `errors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `matkhau`
--
ALTER TABLE `matkhau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bode`
--
ALTER TABLE `bode`
  ADD CONSTRAINT `fr_bode_1` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cathi`
--
ALTER TABLE `cathi`
  ADD CONSTRAINT `cathi_ibfk_1` FOREIGN KEY (`makythi`) REFERENCES `kythi` (`makythi`) ON UPDATE CASCADE;

--
-- Constraints for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_ibfk_1` FOREIGN KEY (`mabode`) REFERENCES `bode` (`mabode`) ON UPDATE CASCADE;

--
-- Constraints for table `cpthi`
--
ALTER TABLE `cpthi`
  ADD CONSTRAINT `cpthi_ibfk_1` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cpthi_ibfk_2` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dethiprofile`
--
ALTER TABLE `dethiprofile`
  ADD CONSTRAINT `fr_dethiprofile_1` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dethisinh`
--
ALTER TABLE `dethisinh`
  ADD CONSTRAINT `dethisinh_ibfk_1` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dethisinh_ibfk_2` FOREIGN KEY (`macauhoi`) REFERENCES `cauhoi` (`macauhoi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dethisinh_ibfk_3` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON UPDATE CASCADE;

--
-- Constraints for table `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`),
  ADD CONSTRAINT `fr_diem_1` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD CONSTRAINT `fr_hocvien` FOREIGN KEY (`mapt`) REFERENCES `phongthi` (`mapt`) ON UPDATE CASCADE;

--
-- Constraints for table `matkhau`
--
ALTER TABLE `matkhau`
  ADD CONSTRAINT `matkhau_ibfk_1` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`) ON UPDATE CASCADE;

--
-- Constraints for table `modun`
--
ALTER TABLE `modun`
  ADD CONSTRAINT `modun_ibfk_1` FOREIGN KEY (`makythi`) REFERENCES `kythi` (`makythi`);

--
-- Constraints for table `phongthi`
--
ALTER TABLE `phongthi`
  ADD CONSTRAINT `phongthi_ibfk_1` FOREIGN KEY (`macathi`) REFERENCES `cathi` (`macathi`) ON UPDATE CASCADE;

--
-- Constraints for table `remote`
--
ALTER TABLE `remote`
  ADD CONSTRAINT `fr_remote_1` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remote_ibfk_1` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`) ON UPDATE CASCADE;

--
-- Constraints for table `thoigianthi`
--
ALTER TABLE `thoigianthi`
  ADD CONSTRAINT `fr_thoigianthi_1` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

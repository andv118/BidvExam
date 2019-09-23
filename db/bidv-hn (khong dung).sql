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
-- Database: `bidv-hn`
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
('CV001', 'TAB', 'C'),
('CV001', 'TAC', 'C'),
('CV001', 'TQ', 'C'),
('CV002', 'TAB', 'C'),
('CV002', 'TAC', 'C'),
('CV002', 'TQ', 'C'),
('CV003', 'TAB', 'C'),
('CV003', 'TAC', 'C'),
('CV003', 'TQ', 'C'),
('CV004', 'TAB', 'C'),
('CV004', 'TAC', 'C'),
('CV004', 'TQ', 'C'),
('CV005', 'TAB', 'C'),
('CV005', 'TAC', 'C'),
('CV005', 'TQ', 'C'),
('CV006', 'TAB', 'C'),
('CV006', 'TAC', 'C'),
('CV006', 'TQ', 'C'),
('CV007', 'TAB', 'C'),
('CV007', 'TAC', 'C'),
('CV007', 'TQ', 'C'),
('CV008', 'TAB', 'C'),
('CV008', 'TAC', 'C'),
('CV008', 'TQ', 'C'),
('CV009', 'TAB', 'C'),
('CV009', 'TAC', 'C'),
('CV009', 'TQ', 'C'),
('CV010', 'TAB', 'C'),
('CV010', 'TAC', 'C'),
('CV010', 'TQ', 'C'),
('CV011', 'TAB', 'C'),
('CV011', 'TAC', 'C'),
('CV011', 'TQ', 'C'),
('CV012', 'TAB', 'C'),
('CV012', 'TAC', 'C'),
('CV012', 'TQ', 'C'),
('CV013', 'TAB', 'C'),
('CV013', 'TAC', 'C'),
('CV013', 'TQ', 'C'),
('CV014', 'TAB', 'C'),
('CV014', 'TAC', 'C'),
('CV014', 'TQ', 'C'),
('CV015', 'TAB', 'C'),
('CV015', 'TAC', 'C'),
('CV015', 'TQ', 'C'),
('CV016', 'TAB', 'C'),
('CV016', 'TAC', 'C'),
('CV016', 'TQ', 'C'),
('CV017', 'TAB', 'C'),
('CV017', 'TAC', 'C'),
('CV017', 'TQ', 'C'),
('CV018', 'TAB', 'C'),
('CV018', 'TAC', 'C'),
('CV018', 'TQ', 'C'),
('CV019', 'TAB', 'C'),
('CV019', 'TAC', 'C'),
('CV019', 'TQ', 'C'),
('CV020', 'TAB', 'C'),
('CV020', 'TAC', 'C'),
('CV020', 'TQ', 'C'),
('CV021', 'TAB', 'C'),
('CV021', 'TAC', 'C'),
('CV021', 'TQ', 'C'),
('CV022', 'TAB', 'C'),
('CV022', 'TAC', 'C'),
('CV022', 'TQ', 'C'),
('CV023', 'TAB', 'C'),
('CV023', 'TAC', 'C'),
('CV023', 'TQ', 'C'),
('CV024', 'TAB', 'C'),
('CV024', 'TAC', 'C'),
('CV024', 'TQ', 'C'),
('CV025', 'TAB', 'C'),
('CV025', 'TAC', 'C'),
('CV025', 'TQ', 'C'),
('CV026', 'TAB', 'C'),
('CV026', 'TAC', 'C'),
('CV026', 'TQ', 'C'),
('CV027', 'TAB', 'C'),
('CV027', 'TAC', 'C'),
('CV027', 'TQ', 'C'),
('CV028', 'TAB', 'C'),
('CV028', 'TAC', 'C'),
('CV028', 'TQ', 'C'),
('CV029', 'TAB', 'C'),
('CV029', 'TAC', 'C'),
('CV029', 'TQ', 'C'),
('CV030', 'TAB', 'C'),
('CV030', 'TAC', 'C'),
('CV030', 'TQ', 'C'),
('CV031', 'TAB', 'C'),
('CV031', 'TAC', 'C'),
('CV031', 'TQ', 'C'),
('CV032', 'TAB', 'C'),
('CV032', 'TAC', 'C'),
('CV032', 'TQ', 'C'),
('CV033', 'TAB', 'C'),
('CV033', 'TAC', 'C'),
('CV033', 'TQ', 'C'),
('CV034', 'TAB', 'C'),
('CV034', 'TAC', 'C'),
('CV034', 'TQ', 'C'),
('CV035', 'TAB', 'C'),
('CV035', 'TAC', 'C'),
('CV035', 'TQ', 'C'),
('CV036', 'TAB', 'C'),
('CV036', 'TAC', 'C'),
('CV036', 'TQ', 'C'),
('CV037', 'TAB', 'C'),
('CV037', 'TAC', 'C'),
('CV037', 'TQ', 'C'),
('CV038', 'TAB', 'C'),
('CV038', 'TAC', 'C'),
('CV038', 'TQ', 'C'),
('CV039', 'TAB', 'C'),
('CV039', 'TAC', 'C'),
('CV039', 'TQ', 'C'),
('CV040', 'TAB', 'C'),
('CV040', 'TAC', 'C'),
('CV040', 'TQ', 'C'),
('CV041', 'TAB', 'C'),
('CV041', 'TAC', 'C'),
('CV041', 'TQ', 'C'),
('CV042', 'TAB', 'C'),
('CV042', 'TAC', 'C'),
('CV042', 'TQ', 'C'),
('CV043', 'TAB', 'C'),
('CV043', 'TAC', 'C'),
('CV043', 'TQ', 'C'),
('CV044', 'TAB', 'C'),
('CV044', 'TAC', 'C'),
('CV044', 'TQ', 'C'),
('CV045', 'TAB', 'C'),
('CV045', 'TAC', 'C'),
('CV045', 'TQ', 'C'),
('CV046', 'TAB', 'C'),
('CV046', 'TAC', 'C'),
('CV046', 'TQ', 'C'),
('CV047', 'TAB', 'C'),
('CV047', 'TAC', 'C'),
('CV047', 'TQ', 'C'),
('CV048', 'TAB', 'C'),
('CV048', 'TAC', 'C'),
('CV048', 'TQ', 'C'),
('CV049', 'TAB', 'C'),
('CV049', 'TAC', 'C'),
('CV049', 'TQ', 'C'),
('CV050', 'TAB', 'C'),
('CV050', 'TAC', 'C'),
('CV050', 'TQ', 'C'),
('CV051', 'TAB', 'C'),
('CV051', 'TAC', 'C'),
('CV051', 'TQ', 'C'),
('CV052', 'TAB', 'C'),
('CV052', 'TAC', 'C'),
('CV052', 'TQ', 'C'),
('CV053', 'TAB', 'C'),
('CV053', 'TAC', 'C'),
('CV053', 'TQ', 'C'),
('CV054', 'TAB', 'C'),
('CV054', 'TAC', 'C'),
('CV054', 'TQ', 'C'),
('CV055', 'TAB', 'C'),
('CV055', 'TAC', 'C'),
('CV055', 'TQ', 'C'),
('CV056', 'TAB', 'C'),
('CV056', 'TAC', 'C'),
('CV056', 'TQ', 'C'),
('CV057', 'TAB', 'C'),
('CV057', 'TAC', 'C'),
('CV057', 'TQ', 'C'),
('CV058', 'TAB', 'C'),
('CV058', 'TAC', 'C'),
('CV058', 'TQ', 'C'),
('CV059', 'TAB', 'C'),
('CV059', 'TAC', 'C'),
('CV059', 'TQ', 'C'),
('CV060', 'TAB', 'C'),
('CV060', 'TAC', 'C'),
('CV060', 'TQ', 'C'),
('CV061', 'TAB', 'C'),
('CV061', 'TAC', 'C'),
('CV061', 'TQ', 'C'),
('CV062', 'TAB', 'C'),
('CV062', 'TAC', 'C'),
('CV062', 'TQ', 'C'),
('CV063', 'TAB', 'C'),
('CV063', 'TAC', 'C'),
('CV063', 'TQ', 'C'),
('CV064', 'TAB', 'C'),
('CV064', 'TAC', 'C'),
('CV064', 'TQ', 'C'),
('CV065', 'TAB', 'C'),
('CV065', 'TAC', 'C'),
('CV065', 'TQ', 'C'),
('CV066', 'TAB', 'C'),
('CV066', 'TAC', 'C'),
('CV066', 'TQ', 'C'),
('CV067', 'TAB', 'C'),
('CV067', 'TAC', 'C'),
('CV067', 'TQ', 'C'),
('CV068', 'TAB', 'C'),
('CV068', 'TAC', 'C'),
('CV068', 'TQ', 'C'),
('CV069', 'TAB', 'C'),
('CV069', 'TAC', 'C'),
('CV069', 'TQ', 'C'),
('CV070', 'TAB', 'C'),
('CV070', 'TAC', 'C'),
('CV070', 'TQ', 'C'),
('CV071', 'TAB', 'C'),
('CV071', 'TAC', 'C'),
('CV071', 'TQ', 'C'),
('CV072', 'TAB', 'C'),
('CV072', 'TAC', 'C'),
('CV072', 'TQ', 'C'),
('CV073', 'TAB', 'C'),
('CV073', 'TAC', 'C'),
('CV073', 'TQ', 'C'),
('CV074', 'TAB', 'C'),
('CV074', 'TAC', 'C'),
('CV074', 'TQ', 'C'),
('CV075', 'TAB', 'C'),
('CV075', 'TAC', 'C'),
('CV075', 'TQ', 'C'),
('CV076', 'TAB', 'C'),
('CV076', 'TAC', 'C'),
('CV076', 'TQ', 'C'),
('CV077', 'TAB', 'C'),
('CV077', 'TAC', 'C'),
('CV077', 'TQ', 'C'),
('CV078', 'TAB', 'C'),
('CV078', 'TAC', 'C'),
('CV078', 'TQ', 'C'),
('CV079', 'TAB', 'C'),
('CV079', 'TAC', 'C'),
('CV079', 'TQ', 'C'),
('CV080', 'TAB', 'C'),
('CV080', 'TAC', 'C'),
('CV080', 'TQ', 'C'),
('CV081', 'TAB', 'C'),
('CV081', 'TAC', 'C'),
('CV081', 'TQ', 'C'),
('CV082', 'TAB', 'C'),
('CV082', 'TAC', 'C'),
('CV082', 'TQ', 'C'),
('CV083', 'TAB', 'C'),
('CV083', 'TAC', 'C'),
('CV083', 'TQ', 'C'),
('CV084', 'TAB', 'C'),
('CV084', 'TAC', 'C'),
('CV084', 'TQ', 'C'),
('CV085', 'TAB', 'C'),
('CV085', 'TAC', 'C'),
('CV085', 'TQ', 'C'),
('CV086', 'TAB', 'C'),
('CV086', 'TAC', 'C'),
('CV086', 'TQ', 'C'),
('CV087', 'TAB', 'C'),
('CV087', 'TAC', 'C'),
('CV087', 'TQ', 'C'),
('CV088', 'TAB', 'C'),
('CV088', 'TAC', 'C'),
('CV088', 'TQ', 'C'),
('CV089', 'TAB', 'C'),
('CV089', 'TAC', 'C'),
('CV089', 'TQ', 'C'),
('CV090', 'TAB', 'C'),
('CV090', 'TAC', 'C'),
('CV090', 'TQ', 'C'),
('CV091', 'TAB', 'C'),
('CV091', 'TAC', 'C'),
('CV091', 'TQ', 'C'),
('CV092', 'TAB', 'C'),
('CV092', 'TAC', 'C'),
('CV092', 'TQ', 'C'),
('CV093', 'TAB', 'C'),
('CV093', 'TAC', 'C'),
('CV093', 'TQ', 'C'),
('CV094', 'TAB', 'C'),
('CV094', 'TAC', 'C'),
('CV094', 'TQ', 'C'),
('CV095', 'TAB', 'C'),
('CV095', 'TAC', 'C'),
('CV095', 'TQ', 'C'),
('CV096', 'TAB', 'C'),
('CV096', 'TAC', 'C'),
('CV096', 'TQ', 'C'),
('CV097', 'TAB', 'C'),
('CV097', 'TAC', 'C'),
('CV097', 'TQ', 'C'),
('CV098', 'TAB', 'C'),
('CV098', 'TAC', 'C'),
('CV098', 'TQ', 'C'),
('CV099', 'TAB', 'C'),
('CV099', 'TAC', 'C'),
('CV099', 'TQ', 'C'),
('CV100', 'TAB', 'C'),
('CV100', 'TAC', 'C'),
('CV100', 'TQ', 'C'),
('CV101', 'TAB', 'C'),
('CV101', 'TAC', 'C'),
('CV101', 'TQ', 'C'),
('CV102', 'TAB', 'C'),
('CV102', 'TAC', 'C'),
('CV102', 'TQ', 'C'),
('CV103', 'TAB', 'C'),
('CV103', 'TAC', 'C'),
('CV103', 'TQ', 'C'),
('CV104', 'TAB', 'C'),
('CV104', 'TAC', 'C'),
('CV104', 'TQ', 'C'),
('CV105', 'TAB', 'C'),
('CV105', 'TAC', 'C'),
('CV105', 'TQ', 'C'),
('CV106', 'TAB', 'C'),
('CV106', 'TAC', 'C'),
('CV106', 'TQ', 'C'),
('CV107', 'TAB', 'C'),
('CV107', 'TAC', 'C'),
('CV107', 'TQ', 'C'),
('CV108', 'TAB', 'C'),
('CV108', 'TAC', 'C'),
('CV108', 'TQ', 'C'),
('CV109', 'TAB', 'C'),
('CV109', 'TAC', 'C'),
('CV109', 'TQ', 'C'),
('CV110', 'TAB', 'C'),
('CV110', 'TAC', 'C'),
('CV110', 'TQ', 'C'),
('CV111', 'TAB', 'C'),
('CV111', 'TAC', 'C'),
('CV111', 'TQ', 'C'),
('CV112', 'TAB', 'C'),
('CV112', 'TAC', 'C'),
('CV112', 'TQ', 'C'),
('CV113', 'TAB', 'C'),
('CV113', 'TAC', 'C'),
('CV113', 'TQ', 'C'),
('CV114', 'TAB', 'C'),
('CV114', 'TAC', 'C'),
('CV114', 'TQ', 'C'),
('CV115', 'TAB', 'C'),
('CV115', 'TAC', 'C'),
('CV115', 'TQ', 'C'),
('CV116', 'TAB', 'C'),
('CV116', 'TAC', 'C'),
('CV116', 'TQ', 'C'),
('CV117', 'TAB', 'C'),
('CV117', 'TAC', 'C'),
('CV117', 'TQ', 'C'),
('CV118', 'TAB', 'C'),
('CV118', 'TAC', 'C'),
('CV118', 'TQ', 'C'),
('CV119', 'TAB', 'C'),
('CV119', 'TAC', 'C'),
('CV119', 'TQ', 'C'),
('CV120', 'TAB', 'C'),
('CV120', 'TAC', 'C'),
('CV120', 'TQ', 'C'),
('CV121', 'TAB', 'C'),
('CV121', 'TAC', 'C'),
('CV121', 'TQ', 'C'),
('CV122', 'TAB', 'C'),
('CV122', 'TAC', 'C'),
('CV122', 'TQ', 'C'),
('CV123', 'TAB', 'C'),
('CV123', 'TAC', 'C'),
('CV123', 'TQ', 'C'),
('CV124', 'TAB', 'C'),
('CV124', 'TAC', 'C'),
('CV124', 'TQ', 'C'),
('CV125', 'TAB', 'C'),
('CV125', 'TAC', 'C'),
('CV125', 'TQ', 'C'),
('CV126', 'TAB', 'C'),
('CV126', 'TAC', 'C'),
('CV126', 'TQ', 'C'),
('CV127', 'TAB', 'C'),
('CV127', 'TAC', 'C'),
('CV127', 'TQ', 'C'),
('CV128', 'TAB', 'C'),
('CV128', 'TAC', 'C'),
('CV128', 'TQ', 'C'),
('CV129', 'TAB', 'C'),
('CV129', 'TAC', 'C'),
('CV129', 'TQ', 'C'),
('CV130', 'TAB', 'C'),
('CV130', 'TAC', 'C'),
('CV130', 'TQ', 'C'),
('CV131', 'TAB', 'C'),
('CV131', 'TAC', 'C'),
('CV131', 'TQ', 'C'),
('CV132', 'TAB', 'C'),
('CV132', 'TAC', 'C'),
('CV132', 'TQ', 'C'),
('CV133', 'TAB', 'C'),
('CV133', 'TAC', 'C'),
('CV133', 'TQ', 'C'),
('CV134', 'TAB', 'C'),
('CV134', 'TAC', 'C'),
('CV134', 'TQ', 'C'),
('CV135', 'TAB', 'C'),
('CV135', 'TAC', 'C'),
('CV135', 'TQ', 'C'),
('CV136', 'TAB', 'C'),
('CV136', 'TAC', 'C'),
('CV136', 'TQ', 'C'),
('CV137', 'TAB', 'C'),
('CV137', 'TAC', 'C'),
('CV137', 'TQ', 'C'),
('CV138', 'TAB', 'C'),
('CV138', 'TAC', 'C'),
('CV138', 'TQ', 'C'),
('CV139', 'TAB', 'C'),
('CV139', 'TAC', 'C'),
('CV139', 'TQ', 'C'),
('CV140', 'TAB', 'C'),
('CV140', 'TAC', 'C'),
('CV140', 'TQ', 'C'),
('CV141', 'TAB', 'C'),
('CV141', 'TAC', 'C'),
('CV141', 'TQ', 'C'),
('CV142', 'TAB', 'C'),
('CV142', 'TAC', 'C'),
('CV142', 'TQ', 'C'),
('CV143', 'TAB', 'C'),
('CV143', 'TAC', 'C'),
('CV143', 'TQ', 'C'),
('CV144', 'TAB', 'C'),
('CV144', 'TAC', 'C'),
('CV144', 'TQ', 'C'),
('CV145', 'TAB', 'C'),
('CV145', 'TAC', 'C'),
('CV145', 'TQ', 'C'),
('CV146', 'TAB', 'C'),
('CV146', 'TAC', 'C'),
('CV146', 'TQ', 'C'),
('CV147', 'TAB', 'C'),
('CV147', 'TAC', 'C'),
('CV147', 'TQ', 'C'),
('CV148', 'TAB', 'C'),
('CV148', 'TAC', 'C'),
('CV148', 'TQ', 'C'),
('CV149', 'TAB', 'C'),
('CV149', 'TAC', 'C'),
('CV149', 'TQ', 'C'),
('CV150', 'TAB', 'C'),
('CV150', 'TAC', 'C'),
('CV150', 'TQ', 'C'),
('CV151', 'TAB', 'C'),
('CV151', 'TAC', 'C'),
('CV151', 'TQ', 'C'),
('CV152', 'TAB', 'C'),
('CV152', 'TAC', 'C'),
('CV152', 'TQ', 'C'),
('CV153', 'TAB', 'C'),
('CV153', 'TAC', 'C'),
('CV153', 'TQ', 'C'),
('CV154', 'TAB', 'C'),
('CV154', 'TAC', 'C'),
('CV154', 'TQ', 'C'),
('CV155', 'TAB', 'C'),
('CV155', 'TAC', 'C'),
('CV155', 'TQ', 'C'),
('CV156', 'TAB', 'C'),
('CV156', 'TAC', 'C'),
('CV156', 'TQ', 'C'),
('CV157', 'TAB', 'C'),
('CV157', 'TAC', 'C'),
('CV157', 'TQ', 'C'),
('CV158', 'TAB', 'C'),
('CV158', 'TAC', 'C'),
('CV158', 'TQ', 'C'),
('CV159', 'TAB', 'C'),
('CV159', 'TAC', 'C'),
('CV159', 'TQ', 'C'),
('CV160', 'TAB', 'C'),
('CV160', 'TAC', 'C'),
('CV160', 'TQ', 'C'),
('CV161', 'TAB', 'C'),
('CV161', 'TAC', 'C'),
('CV161', 'TQ', 'C'),
('CV162', 'TAB', 'C'),
('CV162', 'TAC', 'C'),
('CV162', 'TQ', 'C'),
('CV163', 'TAB', 'C'),
('CV163', 'TAC', 'C'),
('CV163', 'TQ', 'C'),
('CV164', 'TAB', 'C'),
('CV164', 'TAC', 'C'),
('CV164', 'TQ', 'C'),
('CV165', 'TAB', 'C'),
('CV165', 'TAC', 'C'),
('CV165', 'TQ', 'C'),
('CV166', 'TAB', 'C'),
('CV166', 'TAC', 'C'),
('CV166', 'TQ', 'C'),
('CV167', 'TAB', 'C'),
('CV167', 'TAC', 'C'),
('CV167', 'TQ', 'C'),
('CV168', 'TAB', 'C'),
('CV168', 'TAC', 'C'),
('CV168', 'TQ', 'C'),
('CV169', 'TAB', 'C'),
('CV169', 'TAC', 'C'),
('CV169', 'TQ', 'C'),
('CV170', 'TAB', 'C'),
('CV170', 'TAC', 'C'),
('CV170', 'TQ', 'C'),
('CV171', 'TAB', 'C'),
('CV171', 'TAC', 'C'),
('CV171', 'TQ', 'C'),
('CV172', 'TAB', 'C'),
('CV172', 'TAC', 'C'),
('CV172', 'TQ', 'C'),
('CV173', 'TAB', 'C'),
('CV173', 'TAC', 'C'),
('CV173', 'TQ', 'C'),
('CV174', 'TAB', 'C'),
('CV174', 'TAC', 'C'),
('CV174', 'TQ', 'C'),
('CV175', 'TAB', 'C'),
('CV175', 'TAC', 'C'),
('CV175', 'TQ', 'C'),
('CV176', 'TAB', 'C'),
('CV176', 'TAC', 'C'),
('CV176', 'TQ', 'C'),
('CV177', 'TAB', 'C'),
('CV177', 'TAC', 'C'),
('CV177', 'TQ', 'C'),
('CV178', 'TAB', 'C'),
('CV178', 'TAC', 'C'),
('CV178', 'TQ', 'C'),
('CV179', 'TAB', 'C'),
('CV179', 'TAC', 'C'),
('CV179', 'TQ', 'C'),
('CV180', 'TAB', 'C'),
('CV180', 'TAC', 'C'),
('CV180', 'TQ', 'C'),
('CV181', 'TAB', 'C'),
('CV181', 'TAC', 'C'),
('CV181', 'TQ', 'C'),
('CV182', 'TAB', 'C'),
('CV182', 'TAC', 'C'),
('CV182', 'TQ', 'C'),
('CV183', 'TAB', 'C'),
('CV183', 'TAC', 'C'),
('CV183', 'TQ', 'C');

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
('CV001', 'Đỗ Thị  An', '10/2/1984', '', 'SGD1', 'a03f9289bce624de508d59621b00ad3d', NULL, 'KT-NNCV-CA01-P01'),
('CV002', 'Trần Thị Kim Anh', '10/12/1990', '', 'Thành Đô', '2bb423d27e17428db6afbf0cc170f906', NULL, 'KT-NNCV-CA01-P01'),
('CV003', 'Vũ Thị Vân Anh', '18/01/1985', '', 'Thành Đô', '2059d216132201a5b1efa53d581d0fc7', NULL, 'KT-NNCV-CA01-P01'),
('CV004', 'Phạm Thùy Anh', '28/08/1991', '', 'Thành Đô', '6ebe3993a63122690c1656baaabcaebd', NULL, 'KT-NNCV-CA01-P01'),
('CV005', 'Nhâm Nguyễn Ngọc Anh', '8/10/1992', '', 'Thanh Xuân', 'fbc466bbd0191696fc8dbf5b0a2c5e2b', NULL, 'KT-NNCV-CA01-P01'),
('CV006', 'Đỗ Huyền  Anh', '30/10/1981', '', 'Hùng Vương', 'ba01fd18ece3d54e72c221dd26dd1065', NULL, 'KT-NNCV-CA01-P01'),
('CV007', 'Nguyễn Thị Lan  Anh', '22/06/1990', '', 'Hòa Bình ', 'c4919dfab9d9ecc55637a9540b0ad0a0', NULL, 'KT-NNCV-CA01-P01'),
('CV008', 'Nguyễn Thị Vân Anh', '22/06/1989', '', 'Thái Nguyên', '4605dc0f4e279aeb4fd4793cc1dc3bfa', NULL, 'KT-NNCV-CA01-P01'),
('CV009', 'Nguyễn Thị Huệ Anh', '08/09/1987', '', 'Thái Nguyên', '289e758c7a9e54e4141148637b4c0424', NULL, 'KT-NNCV-CA01-P01'),
('CV010', 'Nguyễn Thị Ngọc  Anh', '9/11/1990', '', 'Thanh Hóa', 'b573d129891aa32e109df1ea9cccce2e', NULL, 'KT-NNCV-CA01-P01'),
('CV011', 'Nguyễn Thị Quỳnh Anh', '23/10/1987', '', 'Lai Châu', '60f9eb9e188c199c7b919a7f58e18f9d', NULL, 'KT-NNCV-CA01-P01'),
('CV012', 'Bùi Tuấn Anh', '05/10/1990', '', 'Lào Cai', 'a1d6d67fa292f704b6a118ab9de143e4', NULL, 'KT-NNCV-CA01-P01'),
('CV013', 'Nguyễn Hồng Ánh', '2/15/1986', '', 'Cẩm Phả', 'd13300ddd265c165e4297d173e9201bd', NULL, 'KT-NNCV-CA01-P01'),
('CV014', 'Dương Thành Ba', '10/6/1980', '', 'Hai Bà Trưng', '747335b9ca7e25733d4d583adb01640f', NULL, 'KT-NNCV-CA01-P01'),
('CV015', 'Dương Thị  Bắc', '5/2/1983', '', 'Bắc Hà Nội', 'd2bcdbb5736fd55270525acc065e2ebf', NULL, 'KT-NNCV-CA01-P01'),
('CV016', 'Nguyễn Thị Phương  Bắc', '22/08/1983', '', 'Hùng Vương', '01e190ad90dd1e8d165e01edef53d8e2', NULL, 'KT-NNCV-CA01-P01'),
('CV017', 'Nguyễn Xuân  Bách', '20/05/1989', '', 'TTCNTT', 'da8e3b402992820600758376153d4df2', NULL, 'KT-NNCV-CA01-P01'),
('CV018', 'Nguyễn Thị Bích', '16/05/1983', '', 'Hà Tây', '1ab34645420b74fe2be9295beb96a1f9', NULL, 'KT-NNCV-CA01-P01'),
('CV019', 'Trần Thị Ngọc Bích', '28/07/1984', '', 'Hạ Long', 'cae80ad948cec824d718a41888742e27', NULL, 'KT-NNCV-CA01-P01'),
('CV020', 'Trần Huy Bình', '12/2/1985', '', 'Thành Nam', '79f15ae152c6472d28036bf4d288d9d1', NULL, 'KT-NNCV-CA01-P01'),
('CV021', 'Tẩn Kim Bình', '21/12/1988', '', 'Lai Châu', '32ebf91f274c37a1dd0b61db0e7aff87', NULL, 'KT-NNCV-CA01-P01'),
('CV022', 'Nguyễn Văn Canh', '14/6/1990', '', 'Quảng Bình', '412375a90b92dd4c71d1245b5332c134', NULL, 'KT-NNCV-CA01-P01'),
('CV023', 'Nguyễn Thị Minh  Châu', '22/09/1984', '', 'Gia Lâm', '26b86214ce1d24b7bad7309e0696b902', NULL, 'KT-NNCV-CA01-P01'),
('CV024', 'Lưu Thị Huyền Châu', '17/04/1987', '', 'Hùng Vương', '12d289b442ce3420c67916c11257b815', NULL, 'KT-NNCV-CA01-P01'),
('CV025', 'Phạm Thùy  Chi', '10/7/1989', '', 'Quang Trung', '24786578eea88971e3a1c3ee90a56870', NULL, 'KT-NNCV-CA01-P01'),
('CV026', 'Nguyễn Lan Chi', '30/10/1981', '', 'Móng Cái', 'a264a2b1904c803291ab15f56b0b54d2', NULL, 'KT-NNCV-CA01-P01'),
('CV027', 'Vũ Đình Chiến', '5/25/1991', '', 'Quảng Ninh', '4490dc3421d4f00914de8885b084969c', NULL, 'KT-NNCV-CA01-P02'),
('CV028', 'Nguyễn Thanh Tú  Chinh', '21/09/1984', '', 'Móng Cái', '706247d521b1b4f9a6ed1bc24ad72066', NULL, 'KT-NNCV-CA01-P02'),
('CV029', 'Nguyễn Thị  Chuẩn', '2/17/1983', '', 'Tràng An', 'c16891aee51fd93df9a18c7178911e3a', NULL, 'KT-NNCV-CA01-P02'),
('CV030', 'Phạm Văn Chung', '14/11/1990', '', 'Tam Điệp', 'aba47a2f2c0b1d81d8649ad0b72cd356', NULL, 'KT-NNCV-CA01-P02'),
('CV031', 'Nguyễn Văn Chuyển', '14/04/1989', '', 'Bắc Kạn', 'aee401bbc74a4d2fc0cd24a8069c9e3f', NULL, 'KT-NNCV-CA01-P02'),
('CV032', 'Vũ Văn Công', '24/03/1988', '', 'Hà Thành', '61508a7eacad85962d9e03571ddfcc29', NULL, 'KT-NNCV-CA01-P02'),
('CV033', 'Trần Hải  Cường', '22/12/1989', '', 'Thanh Hóa', '819d7858b09fc60cca8a6b03f7020eba', NULL, 'KT-NNCV-CA01-P02'),
('CV034', 'Nguyễn Tuấn Đạt', '12/9/1988', '', 'Quảng Bình', 'a975a3e57dd0b09b3d3a31deea3b240e', NULL, 'KT-NNCV-CA01-P02'),
('CV035', 'Đào Trọng Đạt', '02/12/1990', '', 'Kỳ Anh', 'f9e030fdc71600cc36113c97278c6784', NULL, 'KT-NNCV-CA01-P02'),
('CV036', 'Hoàng Điệp', '21/10/1987', '', 'Hòa Bình ', '312a7cf4372577188588e92e25706f5b', NULL, 'KT-NNCV-CA01-P02'),
('CV037', 'Nguyễn Thanh  Định', '1/7/1985', '', 'Thạch Thất', '03fe51e5889849816f8cf185383e7980', NULL, 'KT-NNCV-CA01-P02'),
('CV038', 'Đặng Thùy Doan', '27/06/1989', '', 'Hồng Hà', 'c18958bcf31ebfdad8c1aa0aeaf57398', NULL, 'KT-NNCV-CA01-P02'),
('CV039', 'Nguyễn Xuân Đông', '07/09/1989', '', 'Bắc Giang', 'edb6f1a08c4bf56a0f562989afb16a1d', NULL, 'KT-NNCV-CA01-P02'),
('CV040', 'Nguyễn Bá Đức', '26/12/1989', '', 'Hà Tây', '58d08a8dd9911c692dddd56fed9fb83a', NULL, 'KT-NNCV-CA01-P02'),
('CV041', 'Cù Phương Dung', '26/4/1990', '', 'Đông Đô', 'b8e965c54e68bd631906da475de373a2', NULL, 'KT-NNCV-CA01-P02'),
('CV042', 'Nguyễn Thị  Dung', '12/4/1982', '', 'Thạch Thất', 'c65fe6dd2fdd1f857d2f1f983cece3d8', NULL, 'KT-NNCV-CA01-P02'),
('CV043', 'Nguyễn Phương Dung', '23/12/1989', '', 'Sơn Tây', '53f1d31c0de49c457fb2d35be33443ce', NULL, 'KT-NNCV-CA01-P02'),
('CV044', 'Lê Thị Huyền  Dung', '18/05/1982', '', 'Hùng Vương', '0a9019e5fdc2cfa77a3aa8527bdec5e2', NULL, 'KT-NNCV-CA01-P02'),
('CV045', 'Lê Thùy  Dung', '22/11/1989', '', 'Nghệ An', '8401d4efe7d135a3642af25abd6a20e0', NULL, 'KT-NNCV-CA01-P02'),
('CV046', 'Nguyễn Thị Thùy Dung', '15/11/1993', '', 'Bỉm Sơn', '81878fc887304f199ae6ede548c84fd1', NULL, 'KT-NNCV-CA01-P02'),
('CV047', 'Vương Đắc  Dũng ', '5/14/1982', '', 'CN Thái Hà', 'adf868958e525f410950bb2ac76e064e', NULL, 'KT-NNCV-CA01-P02'),
('CV048', 'Lê Thị Dương', '12/9/1990', '', 'Cẩm Phả', '4f0ff54798c5bc946947bb1a2b4d6a92', NULL, 'KT-NNCV-CA01-P02'),
('CV049', 'Bùi Thị Thùy Dương', '21/01/1989', '', 'Quảng Ninh', '56a11c9c1b2dab7207b3c39c64726852', NULL, 'KT-NNCV-CA01-P02'),
('CV050', 'Nguyễn Văn  Dương', '15/08/1988', '', 'Thanh Hóa', '961cd2fdfe906556e4c11e80be431c62', NULL, 'KT-NNCV-CA01-P02'),
('CV051', 'Đỗ Minh Đường', '02/04/1983', '', 'TTCNTT', 'e8bc2eec6b648a0d4ad8653f2bde5595', NULL, 'KT-NNCV-CA01-P02'),
('CV052', 'Đỗ Hoàng Duy', '9/11/1990', '', 'Hà Nam', '78449874abee06b376d4fee2beaa2ec7', NULL, 'KT-NNCV-CA01-P02'),
('CV053', 'Nguyễn Thị Giang', '5/1/1986', '', 'Hà Thành', 'b5d251b22c123819cf93ba5be0763d23', NULL, 'KT-NNCV-CA01-P03'),
('CV054', 'Phùng Hương Giang', '4/10/1990', '', 'Quang Minh', 'e9b68e3ab7370772df92786a7399396b', NULL, 'KT-NNCV-CA01-P03'),
('CV055', 'Lâm Thị  Giang', '24/08/1985', '', 'Thành Đô', '7acb3d591175e131e4f9d0a5ea4c1c91', NULL, 'KT-NNCV-CA01-P03'),
('CV056', 'Trần Hương Giang', '3/7/1981', '', 'Tràng An', '0146db84c72ceb8c2baade3cb06f6676', NULL, 'KT-NNCV-CA01-P03'),
('CV057', 'Lương Thị Kim  Giao', '15/01/1984', '', 'Phủ Quỳ', '3043bc377276e1e01981705469ee5f09', NULL, 'KT-NNCV-CA01-P03'),
('CV058', 'Nguyễn Thị Hà', '1/6/1990', '', 'Ngọc khánh Hà Nội', 'b5c952d78368dae6033328eeab2aceca', NULL, 'KT-NNCV-CA01-P03'),
('CV059', 'Phạm Thu Hà', '22/12/1993', '', 'Thăng Long', '87eeff2d5e37ea7fbcf0c3555276bee0', NULL, 'KT-NNCV-CA01-P03'),
('CV060', 'Nguyễn Thảo Hà', '24/02/1988', '', 'SGD1', 'f525eb34d2f49407e01c579139350e72', NULL, 'KT-NNCV-CA01-P03'),
('CV061', 'Lê Thị Hà', '13/08/1986', '', 'TTCNTT', 'd02900277fbf76d5a1b57be3d2d014bb', NULL, 'KT-NNCV-CA01-P03'),
('CV062', 'Ngô Việt  Hà', '28/04/1987', '', 'Hùng Vương', 'c45b13f484edbf4ea16cf2c359124b5e', NULL, 'KT-NNCV-CA01-P03'),
('CV063', 'Nguyễn Việt  Hà', '10/5/1992', '', 'Hải Dương', '1873d09837eda11681e6cf43698421f2', NULL, 'KT-NNCV-CA01-P03'),
('CV064', 'Triệu Thu Hà', '13/09/1989', '', 'Sa Pa', '72036834326bc3ef536a9936538bf6bc', NULL, 'KT-NNCV-CA01-P03'),
('CV065', 'Nguyễn Nam Hải', '7/11/1983', '', 'Hà Thành', 'b8c4adf50635f76a531c8e7542c4aa1a', NULL, 'KT-NNCV-CA01-P03'),
('CV066', 'Phạm Văn Hải', '26/11/1990', '', 'Đông Đô', 'd386d300f97bba0084e682b0f6e4a10f', NULL, 'KT-NNCV-CA01-P03'),
('CV067', 'Nguyễn Xuân Hải', '16/09/1983', '', 'Phủ Quỳ', 'f24161d7d45bc4bb7a73948b010e437c', NULL, 'KT-NNCV-CA01-P03'),
('CV068', 'Luyện Thị Thúy Hằng', '8/4/1990', '', 'Thanh Xuân', '3602ff09a39fa1918341374408f227c9', NULL, 'KT-NNCV-CA01-P03'),
('CV069', 'Lương Tuấn Hằng', '17/8/1986', '', 'Mỹ Đình', 'de09ed17b874357c393788896591cdad', NULL, 'KT-NNCV-CA01-P03'),
('CV070', 'Nguyễn Thị  Hằng', '10/10/1986', '', 'Quang Trung', 'b767c182395c9fbf334d64852f88ca6b', NULL, 'KT-NNCV-CA01-P03'),
('CV071', 'Nguyễn Thị Thúy Hằng', '22/03/1983', '', 'Từ Sơn', '563d367c68b847463bc37875680cc90d', NULL, 'KT-NNCV-CA01-P03'),
('CV072', 'Phạm Thanh Hằng', '01/10/1988', '', 'Móng Cái', '3f072f8dfc833f71af96bd3204d37d56', NULL, 'KT-NNCV-CA01-P03'),
('CV073', 'Nguyễn Thị Thúy  Hằng', '28/7/1992', '', 'Quảng Bình', 'b7a03f445304002d0e238432dcc85895', NULL, 'KT-NNCV-CA01-P03'),
('CV074', 'Lê Thị Thúy  Hằng', '5/5/1990', '', 'Bắc Quảng Bình', '5e58dc44cf0382ec33e826b2cb6e7ac9', NULL, 'KT-NNCV-CA01-P03'),
('CV075', 'Tạ Thu  Hằng ', '5/2/1985', '', 'CN Thái Hà', 'eb8aba6fc741a347f8ee73bca55a7b22', NULL, 'KT-NNCV-CA01-P03'),
('CV076', 'Ngô Quỳnh Hạnh', '15/5/1989', '', 'Đông Đô', '67f612e6a6f8c9b2574878b881637b96', NULL, 'KT-NNCV-CA01-P03'),
('CV077', 'Vũ Thị Hạnh', '27/06/1989', '', 'Bắc Hưng Yên', '98760d43e3d48fae2a2b12a280cf53d3', NULL, 'KT-NNCV-CA01-P03'),
('CV078', 'Phạm Thu  Hiền', '10/9/1987', '', 'Quang Trung', 'fb2f63e40b6ad4fb8849bb3a5f39bde3', NULL, 'KT-NNCV-CA01-P03'),
('CV079', 'Đinh Văn  Hiệp', '18/06/1984', '', 'Phủ Quỳ', 'cf4defed30baf78c15dd3361fbb7c2db', NULL, 'KT-NNCV-CA01-P04'),
('CV080', 'Phạm Ngọc Hiếu', '16/01/1990', '', 'Đông Đô', '95cc92b900fac0162fe0cf77d943b9dd', NULL, 'KT-NNCV-CA01-P04'),
('CV081', 'Tống Thị Thanh  Hoa', '9/10/1991', '', 'Thanh Hóa', '3c76ab8915b7a904882dc9ff937a0a6e', NULL, 'KT-NNCV-CA01-P04'),
('CV082', 'Trần Thị Thu Hoài', '15/9/1990', '', 'Tam Điệp', '707d837b18f57c6e8f884fba638ff4e2', NULL, 'KT-NNCV-CA01-P04'),
('CV083', 'Nguyễn Thị Thu  Hoài', '17/10/1982', '', 'Lạch Tray', 'c720fd458c951b203fd58b8cf69f644c', NULL, 'KT-NNCV-CA01-P04'),
('CV084', 'Phạm Văn  Hoàn', '11/7/1983', '', 'Hải Dương', '5aefd12ea6342afb91e32ee4b0b6a46a', NULL, 'KT-NNCV-CA01-P04'),
('CV085', 'Đặng Thị Thu Hồng', '6/3/1982', '', 'Hoàn Kiếm', 'bf5d55f1cde64cd0bb9788141a580bd9', NULL, 'KT-NNCV-CA01-P04'),
('CV086', 'Nguyễn Thị Bích   Hồng', '21/11/1980', '', 'Chương Dương', 'a82c32bc4f1eb9adf6a133b490c35ab8', NULL, 'KT-NNCV-CA01-P04'),
('CV087', 'Trần Thị Thu Hương', '12/10/1987', '', 'Đông Đô', '7255210c0ea692dfc2361bed58a4b721', NULL, 'KT-NNCV-CA01-P04'),
('CV088', 'Vũ Thị  Hương', '11/11/1984', '', 'Hạ Long', '2a8efe010c994908212a95a1426455b4', NULL, 'KT-NNCV-CA01-P04'),
('CV089', 'Phạm Thị Lan Hương', '10/04/1980', '', 'Phủ Diễn', 'd5b7f85fcfd68d8ff1c1c7252c13069e', NULL, 'KT-NNCV-CA01-P04'),
('CV090', 'Trần Thị Mai Hương', '08/04/1987', '', 'Sa Pa', 'db02855bd78d99e50abc0661821e2c99', NULL, 'KT-NNCV-CA01-P04'),
('CV091', 'Hoàng Thị Minh Khoa', '30/10/1979', '', 'Móng Cái', '34e999cdde4783f5721381c51bda2148', NULL, 'KT-NNCV-CA01-P04'),
('CV092', 'Nguyễn Thị Thanh Loan', '18/07/1987', '', 'Quang Trung', '6c3e5fd1f1ef9b74b0e299b3fb5466b5', NULL, 'KT-NNCV-CA01-P04'),
('CV093', 'Nguyễn Mai Loan', '27/6/1988', '', 'Lạng Sơn', '754525754c5faa93ee55df52c499a5dc', NULL, 'KT-NNCV-CA01-P04'),
('CV094', 'Trần Thị Lợi', '12/03/1985', '', 'Phủ Quỳ', '92cdaecf8a46f7dd946c5112bf0c0f0a', NULL, 'KT-NNCV-CA01-P04'),
('CV095', 'Nguyễn Thành  Luân', '4/3/1989', '', 'Thành Nam', 'a47ede49965a07d839d1ff63701d0fb3', NULL, 'KT-NNCV-CA01-P04'),
('CV096', 'Đỗ Văn Lực', '06/02/1982', '', 'Tuyên Quang', 'db3f670386363296bbd0229da1123b9e', NULL, 'KT-NNCV-CA01-P04'),
('CV097', 'Vũ Minh  Lượng', '11/12/1992', '', 'Quang Trung', '99a898318a414cee5f6b23d4a4f77a92', NULL, 'KT-NNCV-CA01-P04'),
('CV098', 'Nguyễn Thị Hồng  Lý ', '11/11/1985', '', 'CN Thái Hà', '7f8702c80e8d7f480b37919c9b53183d', NULL, 'KT-NNCV-CA01-P04'),
('CV099', 'Phạm Quỳnh Mai', '20/01/1986', '', 'Hà Thành', '2c8ae8443e85372763631d6e4c4bdb38', NULL, 'KT-NNCV-CA01-P04'),
('CV100', 'Nguyễn Thanh Mai', '11/11/1983', '', 'Thanh Xuân', '9d2150325fc2ece9b21f6a937006a4ba', NULL, 'KT-NNCV-CA01-P04'),
('CV101', 'Lê Thanh Mai', '14/02/1992', '', 'Ba Đình', 'f773fe03b47c63e506babf5d25598eca', NULL, 'KT-NNCV-CA01-P04'),
('CV102', 'Vũ Thị Tuyết Mai', '26/05/1990', '', 'Sơn Tây', 'f16ddc9153d241600ad2e83b0a743b96', NULL, 'KT-NNCV-CA01-P04'),
('CV103', 'Hoàng Thị Minh', '5/4/1983', '', 'Ngọc khánh Hà Nội', 'f3b85b6de3341536a714e2dd04726e96', NULL, 'KT-NNCV-CA01-P04'),
('CV104', 'Phạm Thị Hà  My', '27/10/1984', '', 'Hoàn Kiếm', '2c35b1b763b4b876f865a2402e110708', NULL, 'KT-NNCV-CA01-P04'),
('CV105', 'Phạm Vũ Trà  My', '27/04/1988', '', 'Quang Trung', 'f744bf1e212e58bf59df6dd86c9eb8e0', NULL, 'KT-NNCV-CA01-P05'),
('CV106', 'Nguyễn Tiến Nam', '18/12/1989', '', 'Ba Đình', '45e0061844476f38bd0e72254d4075c4', NULL, 'KT-NNCV-CA01-P05'),
('CV107', 'Đậu Kim  Nam', '9/8/1982', '', 'Thái Hà', 'cdb78372d0d90352fd98482198f4cb02', NULL, 'KT-NNCV-CA01-P05'),
('CV108', 'Nguyễn Thị Hồng  Năm', '1/3/1992', '', 'Thạch Thất', '43c49fa4a9be768581bdf2c41ddf47cb', NULL, 'KT-NNCV-CA01-P05'),
('CV109', 'Phan Thị  Nga', '1/6/1992', '', 'Quang Minh', '819532374746a0838b9ad5c901adf0f9', NULL, 'KT-NNCV-CA01-P05'),
('CV110', 'Nguyễn Thị Thúy Nga', '11/11/1978', '', 'Mỹ Đình', '77ccca3c767288e5aa96d5e84f8075b9', NULL, 'KT-NNCV-CA01-P05'),
('CV111', 'Đặng Thị  Nga', '30/04/1990', '', 'Thái Nguyên', '55c4c4f20d6868de9c8f18a2678b61b8', NULL, 'KT-NNCV-CA01-P05'),
('CV112', 'Tạ Thị Nga', '6/17/1984', '', 'Cẩm Phả', 'ff6c559fafd413005ccafffc3c055a69', NULL, 'KT-NNCV-CA01-P05'),
('CV113', 'Trần Thúy  Nga', '24/08/1989', '', 'Móng Cái', '45ab4e21245efed5f460222d7803d826', NULL, 'KT-NNCV-CA01-P05'),
('CV114', 'Nguyễn Thị Hồng Nga', '2/7/1988', '', 'Tây Nam Quảng Ninh', '1f42a6a75864e9a09694c0a2f527409b', NULL, 'KT-NNCV-CA01-P05'),
('CV115', 'Phan Thị  Ngát', '2/2/1982', '', 'Chương Dương', '2896a949958ec4c08725b719b4afe998', NULL, 'KT-NNCV-CA01-P05'),
('CV116', 'Đinh Trọng Nghiêm', '20/05/1987', '', 'Phủ Quỳ', '187f24fa87f28ffd4dcf37e695f8ffc7', NULL, 'KT-NNCV-CA01-P05'),
('CV117', 'Trần Thị Hồng Ngoan', '1/5/1990', '', 'Hà Thành', '43630bf866dd82076842a14c302d9de1', NULL, 'KT-NNCV-CA01-P05'),
('CV118', 'Nguyễn Minh  Ngọc', '18/08/1989', '', 'Quang Trung', 'f01a2e43e12cff2d71705c9bab57c3c6', NULL, 'KT-NNCV-CA01-P05'),
('CV119', 'Đinh Quang Ngọc', '13/08/1984', '', 'TTCNTT', '14497429b4f5a24892968655954c8af8', NULL, 'KT-NNCV-CA01-P05'),
('CV120', 'Nguyễn Thị Như  Ngọc', '11/18/1991', '', 'Hải Dương', 'fd0b228765d04ade55d6dff6450242e0', NULL, 'KT-NNCV-CA01-P05'),
('CV121', 'Lương Thảo Nguyên', '12/8/1991', '', 'Thanh Xuân', '4460144315f5de1837f0c53600b345e0', NULL, 'KT-NNCV-CA01-P05'),
('CV122', 'Trần Thị Bích Nguyệt', '11/11/1981', '', 'Hạ Long', '06f158f037d7ea7e5c9a49063196ccd9', NULL, 'KT-NNCV-CA01-P05'),
('CV123', 'Vũ Thị  Nhung', '1/7/1991', '', 'Tam Điệp', 'c654df834f1b9495b2a75de4c7d2fbe4', NULL, 'KT-NNCV-CA01-P05'),
('CV124', 'Hoàng Thị Ngọc Nhung', '28/10/1989', '', 'Hai Bà Trưng', '0e5ad6ec5dfff573937a954dbb6b3f52', NULL, 'KT-NNCV-CA01-P05'),
('CV125', 'Nguyễn Thị  Nhung', '22/05/1989', '', 'Quang Trung', '55cca65b2d1c5252a6c9f9557b2952f4', NULL, 'KT-NNCV-CA01-P05'),
('CV126', 'Nguyễn Thị Tuyết Nhung', '24/10/1986', '', 'Móng Cái', '766b2d537f38f6e355d0efc9c90f0686', NULL, 'KT-NNCV-CA01-P05'),
('CV127', 'Vũ Thị Nụ', '3/2/1987', '', 'Cẩm Phả', 'ec7f7eba95383ff9c7a5bbc16db21087', NULL, 'KT-NNCV-CA01-P05'),
('CV128', 'Lê Thị Kim  Oanh', '26/07/1988', '', 'SGD3', '33f7fd1dbd017d20461b38c02e88ec31', NULL, 'KT-NNCV-CA01-P05'),
('CV129', 'Nguyễn Cường  Pháp', '19/7/1992', '', 'Bắc Hà Nội', '0f3353bfccbba60bc05ac3de055e15df', NULL, 'KT-NNCV-CA01-P05'),
('CV130', 'Phạm Tuấn  Phong', '25/11/1988', '', 'Từ Sơn', '7d91af63d7d8984f7e95a6e3217200f8', NULL, 'KT-NNCV-CA01-P05'),
('CV131', 'Vũ Văn  Phú', '9/12/1991', '', 'Quảng Ninh', '6e2d7a196ed27810084bc82b5ed4181c', NULL, 'KT-NNCV-CA01-P06'),
('CV132', 'Nguyễn Thị  Phương', '15/9/1987', '', 'Ninh Bình', '59fdaa1eb7d8c2ae19f3e0444d9d1faa', NULL, 'KT-NNCV-CA01-P06'),
('CV133', 'Trần Huy Phương', '9/11/1977', '', 'Hà Thành', '78a0e688fa171894808ed612fb25d13e', NULL, 'KT-NNCV-CA01-P06'),
('CV134', 'Nguyễn Thị Hoài Phương', '25/12/1989', '', 'Từ Liêm', 'fbb29c38052f51b29b1975c613e3d52e', NULL, 'KT-NNCV-CA01-P06'),
('CV135', 'Chu Thị Thu  Phương', '3/8/1987', '', 'Bắc Hà', 'afc503824ce30810cdc1f3a566d6460c', NULL, 'KT-NNCV-CA01-P06'),
('CV136', 'Hoàng Thị Phương', '2/8/1976', '', 'TT QL&DV Kho Quỹ', 'bec4930d370ec3279c309c50d14806b9', NULL, 'KT-NNCV-CA01-P06'),
('CV137', 'Nguyễn Hồng Quý', '05/05/1981', '', 'Lai Châu', '88d64c41603306a350b329f3da904451', NULL, 'KT-NNCV-CA01-P06'),
('CV138', 'Mai Thị  Quyên', '14/12/1982', '', 'Trung tâm Chăm sóc khác hàng ', '728f9cc8c626307d0c011e19b9f8dc63', NULL, 'KT-NNCV-CA01-P06'),
('CV139', 'Lý Mạnh   Quyết', '01/09/1987', '', 'Hà Giang', 'a8c2f837c80e18b5504f17f2c7aac598', NULL, 'KT-NNCV-CA01-P06'),
('CV140', 'Hồ Thị Anh Quỳnh', '20/01/1991', '', 'Thành Đô', 'ebd4dedf63d08e439acefb267f26cfdd', NULL, 'KT-NNCV-CA01-P06'),
('CV141', 'Trần Thị Quỳnh', '2/7/1989', '', 'Đông Đô', 'ddcbe426b3fca8cf9ebf82e9914d6ee3', NULL, 'KT-NNCV-CA01-P06'),
('CV142', 'Lê Thanh  Sơn', '12/07/1986', '', 'TTCNTT', 'b768e7f3e969d459a40c58bf1c8f292f', NULL, 'KT-NNCV-CA01-P06'),
('CV143', 'Nguyễn Hữu Tài', '22/11/1988', '', 'Cầu Giấy', 'b74f1d5b3946981f897c4c0eff4673eb', NULL, 'KT-NNCV-CA01-P06'),
('CV144', 'Nguyễn Đăng Tài', '8/9/1987', '', 'TT QL&DV Kho Quỹ', '0ac035ba27aa7b3ff13b49c62df99651', NULL, 'KT-NNCV-CA01-P06'),
('CV145', 'Đinh Thị Thanh Tâm', '4/27/1988', '', 'Quang Minh', 'c386372249b7a3dbf713ee5f8eccc481', NULL, 'KT-NNCV-CA01-P06'),
('CV146', 'Trương Ngọc  Tâm', '3/12/1983', '', 'Tràng An', '9d1f813958c00c1c62755a2812521802', NULL, 'KT-NNCV-CA01-P06'),
('CV147', 'Phan Thị Hồng Thắm', '19/08/1985', '', 'Kỳ Anh', '15ff53f6d7bf6e9f693d961bd159ee2d', NULL, 'KT-NNCV-CA01-P06'),
('CV148', 'Nguyễn Tất  Thắng', '07/12/1989', '', 'Nam Thái Nguyên', '656ba01e2b2455bc91ea44a554e03df8', NULL, 'KT-NNCV-CA01-P06'),
('CV149', 'Phạm Thị Giang Thanh', '2/2/1992', '', 'Thăng Long', '8eeb7053266dc83b150994d4dd973d44', NULL, 'KT-NNCV-CA01-P06'),
('CV150', 'Nguyễn Thị Hồng  Thanh', '9/4/1985', '', 'SGD3', '69361f671faa549a557953ce2ec2570a', NULL, 'KT-NNCV-CA01-P06'),
('CV151', 'Phan Thị Phương Thảo', '10/7/1990', '', 'Hà Tĩnh', 'f75f7d4f88d181c39254be80ebac837c', NULL, 'KT-NNCV-CA01-P06'),
('CV152', 'Lê Hương Thảo', '13/07/1988', '', 'Sa Pa', '4be96196a0724f3e2f624db101d43737', NULL, 'KT-NNCV-CA01-P06'),
('CV153', 'Nguyễn Thị  Thoa', '1/10/1990', '', 'Hưng Yên', 'f70afb105bba0c9cd53caa0b14baabb9', NULL, 'KT-NNCV-CA01-P06'),
('CV154', 'Nguyễn Thị Thơm', '13/12/1984', '', 'Lạch Tray', 'ec53b63b02886d3dc835b2a902544d88', NULL, 'KT-NNCV-CA01-P06'),
('CV155', 'Nguyễn Đăng Tiến', '29/08/1989', '', 'Đông Đô', 'e8861d336f0542d409cf1ddb74e1f007', NULL, 'KT-NNCV-CA01-P06'),
('CV156', 'Phạm Văn Toại', '7/6/1983', '', 'Thành Đô', '08c0c2c770bafdde1909e87ea526b7da', NULL, 'KT-NNCV-CA01-P06'),
('CV157', 'Mai Thị Trâm', '16/01/1985', '', 'Đống Đa', 'aab1c2a61f1eaa4b49337a39700537ad', NULL, 'KT-NNCV-CA01-P07'),
('CV158', 'Đỗ Thị Huyền  Trang', '26/1/1992', '', 'Ninh Bình', '01178a7289ffd56ddcc072f429383175', NULL, 'KT-NNCV-CA01-P07'),
('CV159', 'Nguyễn Thị Thu  Trang', '29/11/1989', '', 'Ninh Bình', 'daf680f89c547f2fbc7c2fd0eaad7086', NULL, 'KT-NNCV-CA01-P07'),
('CV160', 'Hoàng Hải  Trang', '10/10/1987', '', 'Ngọc khánh Hà Nội', '9e4436901bfadc23f16816d4a60b402c', NULL, 'KT-NNCV-CA01-P07'),
('CV161', 'Hoàng Thu Trang', '23/10/1991', '', 'Từ Liêm', 'b76bc022ec53631e8b596254cc9f945e', NULL, 'KT-NNCV-CA01-P07'),
('CV162', 'Nguyễn Thu Trang', '12/5/1984', '', 'TT QL&DV Kho Quỹ', 'b718b7d8d5d50b5adabae91a1db36880', NULL, 'KT-NNCV-CA01-P07'),
('CV163', 'Hòa Thị Thu Trang', '23/08/1988', '', 'Đông Hải Phòng', 'b8d92b7c83c1a7d2ff311f242d417bc2', NULL, 'KT-NNCV-CA01-P07'),
('CV164', 'Bùi Minh Trang', '04/09/1992', '', 'Đông Hải Phòng', 'e8633c135b4e90ca8172a4b200d91147', NULL, 'KT-NNCV-CA01-P07'),
('CV165', 'Vũ Thị Thu  Trang ', '17/09/1987', '', 'CN Thái Hà', '1ac01be1c13eee66d0c3d2e4b629b1f1', NULL, 'KT-NNCV-CA01-P07'),
('CV166', 'Khương Văn  Triều', '24/2/1987', '', 'Ninh Bình', '777af2a3d06981f5441eb2b5aeb5dea3', NULL, 'KT-NNCV-CA01-P07'),
('CV167', 'Đỗ Văn  Trọng', '22/02/1979', '', 'SGD3', '54891e075c1cffc1013892ff36cb0e24', NULL, 'KT-NNCV-CA01-P07'),
('CV168', 'Lê Văn Trung', '24/03/1989', '', 'TTCNTT', '6247d8b14755753ab0ccea9dc49424b0', NULL, 'KT-NNCV-CA01-P07'),
('CV169', 'Hồ Quang Trung', '07/06/1985', '', 'Lai Châu', '975923a4882f5a5725a0b5e844b1b2d9', NULL, 'KT-NNCV-CA01-P07'),
('CV170', 'Hoàng Thị Cẩm Tú', '22/07/1992', '', 'Thanh Xuân', '63a54efca76089d0b5cf4bdb498d2a0a', NULL, 'KT-NNCV-CA01-P07'),
('CV171', 'Nguyễn Đình Tú', '5/22/1989', '', 'Nam Thái Nguyên', '3cd5309a6bb178c0d46271f1c32a27df', NULL, 'KT-NNCV-CA01-P07'),
('CV172', 'Nguyễn Khắc Tung', '1/8/1990', '', 'Thanh Xuân', '97905db184662d0cd8fc6712bbdceeda', NULL, 'KT-NNCV-CA01-P07'),
('CV173', 'Lê Thanh Sơn Tùng', '1/9/1988', '', 'Tây Hồ', 'c7150cb3b081606d20596c58cea89100', NULL, 'KT-NNCV-CA01-P07'),
('CV174', 'Trần Thị Tuyết', '23/06/1986', '', 'Thanh Xuân', '08e7099a3114e14b3ff0d0dca17f53f2', NULL, 'KT-NNCV-CA01-P07'),
('CV175', 'Nguyễn Thị Thanh Vân', '12/19/1992', '', 'Đông Hà Nội', '1655d41654a2d5325356d105e127016d', NULL, 'KT-NNCV-CA01-P07'),
('CV176', 'Phạm Thúy Vân', '12/07/1986', '', 'Quảng Ninh', '1cbfce9201fe17c675aafd9576af3fea', NULL, 'KT-NNCV-CA01-P07'),
('CV177', 'Nguyễn Trường  Vũ', '1/22/1990', '', 'Kỳ Anh', '52ea3dce45ae592e7557c307308c8b3d', NULL, 'KT-NNCV-CA01-P07'),
('CV178', 'Mai Thu  Vui', '2/23/1985', '', 'TT QL&DV Kho Quỹ', '53626aa06b115118808018a2f5051d2f', NULL, 'KT-NNCV-CA01-P07'),
('CV179', 'Trần Thị  Vui', '11/20/1983', '', 'BIDV Bắc Hưng Yên', '595b25efcbc59ea295ee1485f0bf2f9a', NULL, 'KT-NNCV-CA01-P07'),
('CV180', 'Nguyễn Ngọc Vượng', '10/2/1984', '', 'Thanh Xuân', '568e8f00d9593dd0f495cdd86b26eef4', NULL, 'KT-NNCV-CA01-P07'),
('CV181', 'Nguyễn Thị Hải  Yến', '7/8/1990', '', 'Hải Dương', '167be18a311abe5a88a529b7ae6081a8', NULL, 'KT-NNCV-CA01-P07'),
('CV182', 'Phan Thị Yến', '11/09/1988', '', 'Phủ Diễn', 'e16edfe44a70ddcd591494cd7dbaefe9', NULL, 'KT-NNCV-CA01-P07'),
('CV183', 'Phạm Thị Hải  Yến ', '26/10/1984', '', 'CN Thái Hà', '41a453887ccea8689020178f9a701581', NULL, 'KT-NNCV-CA01-P07');

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
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `matkhau`
--

INSERT INTO `matkhau` (`id`, `sbd`, `matkhau`) VALUES
(1, 'CV001', '778124'),
(2, 'CV002', '101050'),
(3, 'CV003', '543564'),
(4, 'CV004', '545971'),
(5, 'CV005', '883227'),
(6, 'CV006', '934781'),
(7, 'CV007', '457041'),
(8, 'CV008', '885179'),
(9, 'CV009', '369162'),
(10, 'CV010', '889097'),
(11, 'CV011', '368411'),
(12, 'CV012', '753124'),
(13, 'CV013', '568053'),
(14, 'CV014', '178212'),
(15, 'CV015', '609907'),
(16, 'CV016', '562058'),
(17, 'CV017', '693220'),
(18, 'CV018', '724476'),
(19, 'CV019', '482831'),
(20, 'CV020', '463173'),
(21, 'CV021', '978997'),
(22, 'CV022', '260093'),
(23, 'CV023', '930336'),
(24, 'CV024', '660723'),
(25, 'CV025', '643406'),
(26, 'CV026', '627105'),
(27, 'CV027', '676825'),
(28, 'CV028', '585929'),
(29, 'CV029', '122969'),
(30, 'CV030', '228126'),
(31, 'CV031', '641439'),
(32, 'CV032', '261294'),
(33, 'CV033', '438700'),
(34, 'CV034', '486286'),
(35, 'CV035', '250492'),
(36, 'CV036', '110670'),
(37, 'CV037', '911050'),
(38, 'CV038', '334609'),
(39, 'CV039', '542115'),
(40, 'CV040', '374660'),
(41, 'CV041', '867032'),
(42, 'CV042', '103607'),
(43, 'CV043', '823622'),
(44, 'CV044', '256217'),
(45, 'CV045', '525169'),
(46, 'CV046', '206423'),
(47, 'CV047', '523365'),
(48, 'CV048', '899833'),
(49, 'CV049', '120584'),
(50, 'CV050', '887370'),
(51, 'CV051', '776436'),
(52, 'CV052', '605650'),
(53, 'CV053', '884497'),
(54, 'CV054', '246699'),
(55, 'CV055', '894288'),
(56, 'CV056', '827892'),
(57, 'CV057', '929143'),
(58, 'CV058', '518493'),
(59, 'CV059', '909813'),
(60, 'CV060', '666880'),
(61, 'CV061', '867754'),
(62, 'CV062', '133105'),
(63, 'CV063', '344674'),
(64, 'CV064', '366756'),
(65, 'CV065', '642741'),
(66, 'CV066', '216857'),
(67, 'CV067', '321874'),
(68, 'CV068', '139915'),
(69, 'CV069', '585238'),
(70, 'CV070', '188972'),
(71, 'CV071', '183734'),
(72, 'CV072', '308507'),
(73, 'CV073', '910557'),
(74, 'CV074', '871662'),
(75, 'CV075', '833498'),
(76, 'CV076', '115846'),
(77, 'CV077', '948731'),
(78, 'CV078', '899170'),
(79, 'CV079', '760574'),
(80, 'CV080', '725631'),
(81, 'CV081', '420703'),
(82, 'CV082', '227063'),
(83, 'CV083', '251857'),
(84, 'CV084', '565916'),
(85, 'CV085', '591402'),
(86, 'CV086', '923545'),
(87, 'CV087', '331592'),
(88, 'CV088', '171862'),
(89, 'CV089', '988625'),
(90, 'CV090', '101940'),
(91, 'CV091', '423723'),
(92, 'CV092', '773601'),
(93, 'CV093', '183594'),
(94, 'CV094', '992200'),
(95, 'CV095', '759862'),
(96, 'CV096', '606566'),
(97, 'CV097', '958333'),
(98, 'CV098', '810846'),
(99, 'CV099', '652040'),
(100, 'CV100', '271960'),
(101, 'CV101', '186483'),
(102, 'CV102', '796082'),
(103, 'CV103', '334582'),
(104, 'CV104', '422934'),
(105, 'CV105', '530946'),
(106, 'CV106', '253961'),
(107, 'CV107', '848619'),
(108, 'CV108', '769892'),
(109, 'CV109', '692167'),
(110, 'CV110', '334894'),
(111, 'CV111', '686553'),
(112, 'CV112', '427876'),
(113, 'CV113', '515356'),
(114, 'CV114', '331004'),
(115, 'CV115', '981528'),
(116, 'CV116', '637398'),
(117, 'CV117', '510747'),
(118, 'CV118', '507813'),
(119, 'CV119', '185865'),
(120, 'CV120', '601481'),
(121, 'CV121', '912562'),
(122, 'CV122', '254365'),
(123, 'CV123', '291888'),
(124, 'CV124', '784467'),
(125, 'CV125', '941123'),
(126, 'CV126', '505862'),
(127, 'CV127', '442528'),
(128, 'CV128', '186579'),
(129, 'CV129', '821663'),
(130, 'CV130', '791645'),
(131, 'CV131', '269499'),
(132, 'CV132', '120010'),
(133, 'CV133', '883405'),
(134, 'CV134', '247038'),
(135, 'CV135', '765622'),
(136, 'CV136', '730221'),
(137, 'CV137', '342660'),
(138, 'CV138', '984153'),
(139, 'CV139', '384341'),
(140, 'CV140', '547336'),
(141, 'CV141', '328573'),
(142, 'CV142', '524223'),
(143, 'CV143', '146087'),
(144, 'CV144', '674556'),
(145, 'CV145', '265354'),
(146, 'CV146', '990680'),
(147, 'CV147', '376654'),
(148, 'CV148', '353225'),
(149, 'CV149', '185446'),
(150, 'CV150', '636547'),
(151, 'CV151', '384783'),
(152, 'CV152', '797455'),
(153, 'CV153', '400053'),
(154, 'CV154', '742235'),
(155, 'CV155', '315398'),
(156, 'CV156', '249688'),
(157, 'CV157', '903378'),
(158, 'CV158', '762153'),
(159, 'CV159', '912382'),
(160, 'CV160', '484728'),
(161, 'CV161', '615696'),
(162, 'CV162', '592673'),
(163, 'CV163', '235453'),
(164, 'CV164', '768739'),
(165, 'CV165', '202574'),
(166, 'CV166', '638506'),
(167, 'CV167', '749246'),
(168, 'CV168', '964235'),
(169, 'CV169', '696367'),
(170, 'CV170', '392295'),
(171, 'CV171', '157193'),
(172, 'CV172', '504639'),
(173, 'CV173', '591355'),
(174, 'CV174', '906854'),
(175, 'CV175', '301327'),
(176, 'CV176', '591083'),
(177, 'CV177', '948701'),
(178, 'CV178', '604614'),
(179, 'CV179', '614951'),
(180, 'CV180', '387880'),
(181, 'CV181', '179708'),
(182, 'CV182', '797998'),
(183, 'CV183', '508427');

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
('KT-NNCV-CA01-P07', 'Phòng 07', 30, '', 'KT-NNCV-CA01');

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

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`sbd`, `traloi`) VALUES
('CV083', '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=184;
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

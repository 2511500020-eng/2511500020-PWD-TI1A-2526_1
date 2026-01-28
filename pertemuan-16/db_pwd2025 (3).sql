-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2026 at 04:24 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biodata`
--

CREATE TABLE `tbl_biodata` (
  `bid` int(11) NOT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `namalengkap` varchar(50) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tanggal` varchar(20) DEFAULT NULL,
  `hobi` varchar(100) DEFAULT NULL,
  `pasangan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `ortu` varchar(100) DEFAULT NULL,
  `kakak` varchar(100) DEFAULT NULL,
  `adik` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biodata`
--

INSERT INTO `tbl_biodata` (`bid`, `nim`, `namalengkap`, `tempat`, `tanggal`, `hobi`, `pasangan`, `pekerjaan`, `ortu`, `kakak`, `adik`) VALUES
(3, '777', 'ppp', 'p', 'p', 'p', 'p', 'p', 'p', 'p', 'p'),
(4, '3', 'aaa', 'ba', 'ca', 'da', 'ea', 'fa', 'ga', 'ha', 'ia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `did` int(11) NOT NULL,
  `dkode` varchar(10) DEFAULT NULL,
  `dnama` varchar(50) DEFAULT NULL,
  `dalamat` varchar(100) DEFAULT NULL,
  `dtanggal` varchar(20) DEFAULT NULL,
  `djja` varchar(100) DEFAULT NULL,
  `dprodi` varchar(100) DEFAULT NULL,
  `dnohp` varchar(100) DEFAULT NULL,
  `dpasangan` varchar(100) DEFAULT NULL,
  `danak` varchar(100) DEFAULT NULL,
  `dbilmu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`did`, `dkode`, `dnama`, `dalamat`, `dtanggal`, `djja`, `dprodi`, `dnohp`, `dpasangan`, `danak`, `dbilmu`) VALUES
(1, 'a', 'baa', 'ca', 'da', 'ea', 'fa', 'ga', 'ha', 'ia', 'ja');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `cid` int(11) NOT NULL,
  `cnama` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cpesan` text,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated_at`) VALUES
(23, 'Widya', 'widyaserena1290@gmail.com', 'peninggg kepalaaaaaaaa', '2025-12-24 12:22:20'),
(24, 'Ahza', 'ahza@gmail.com', 'hehhhhhhhhhh', '2026-01-07 21:00:46'),
(25, 'aaa', 'a@gmail.com', 'pppppppppppp', '2026-01-27 19:56:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biodata`
--
ALTER TABLE `tbl_biodata`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

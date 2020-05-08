-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 01:11 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andd2478_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk`
--

CREATE TABLE `helpdesk` (
  `no_tiket` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_tiket` varchar(20) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `jalur_helpdesk` varchar(50) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `follow_up` text NOT NULL,
  `tgl_close` varchar(20) NOT NULL,
  `baru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `helpdesk`
--

INSERT INTO `helpdesk` (`no_tiket`, `nik`, `nama`, `no_hp`, `email`, `tgl_tiket`, `unit`, `jalur_helpdesk`, `kategori`, `deskripsi`, `status`, `follow_up`, `tgl_close`, `baru`) VALUES
('TCU00001', '965240', 'septian adhi', '083878382918', 'septianadhiwicak@gmail.com', '2020-05-01 14:50:00', 'AMA CopU', 'Website', 'Komunikasi', 'Tidak bisa mengakses kesalahan dalam membuat laporan.', 'Completed', 'sedang dikerjakan oleh ahli', '2020-05-05 07:45:00', ''),
('TCU00002', '965232', 'bambang', '08387232342', 'soykoola@gmail.com', '2020-05-06 00:12:00', 'AMA CopU', 'Website', 'Komunikasi', 'dawdaweadaweacwae', 'On Process', 'awedwaecawesadwqesadwqesadweqweq', '2020-05-06 00:03:00', ''),
('TCU00003', '965435', 'woryt', '083875435433', 'soykoola@gmail.com', '2020-05-06 00:31:00', 'GSD-Teknisi CorpU', 'Telephone', 'Komunikasi', 'eawe2ewadwaewqda', 'Submitted', 'awqedaweqdasaweqw', '2020-05-06 00:12:00', ''),
('TCU00004', '962132', 'erty', '083878341213', 'soykoola@gmail.com', '2020-05-06 00:03:00', 'AMA CopU', 'Website', 'Komunikasi', 'awewqdsaweqawdasaewq', 'Closed', 'aweqdaweadadwaweqdawe', '2020-05-20 13:12:00', ''),
('TCU00005', '965247', 'yudo', '08387432422', 'soykoola@gmail.com', '2020-05-06 00:12:00', 'Infomedia', 'Website', 'Komunikasi', 'adwqesadwqesadwqeadqwe', 'Submitted', 'aweqdawedsawewqdsaewq', '2020-05-06 00:03:00', ''),
('TCU00006', '963121', 'viho', '083812314211', 'soykoola@gmail.com', '2020-05-21 00:31:00', 'AMA CopU', 'Website', 'Komunikasi', 'dawqewadwqesadwqeqdawewq', 'On Process', 'awqdawewqdqweqdwqeqdaweqa', '2020-05-06 00:12:00', '');

--
-- Triggers `helpdesk`
--
DELIMITER $$
CREATE TRIGGER `after` AFTER INSERT ON `helpdesk` FOR EACH ROW INSERT INTO log
    set ket = new.nik,
    old_data = new.status,
    new_data = new.follow_up,
    tgl_proses = new.tgl_tiket,
    noti = new.no_tiket,
    date = NOW()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `helpdesk` FOR EACH ROW DELETE FROM log
	WHERE old.no_tiket = noti
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update` AFTER UPDATE ON `helpdesk` FOR EACH ROW INSERT INTO log
    set ket = new.nik,
    old_data = new.status,
    new_data = new.follow_up,
    tgl_proses = new.tgl_tiket,
    noti = new.no_tiket,
    date = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `ket` varchar(20) NOT NULL,
  `date` datetime DEFAULT NULL,
  `tgl_proses` varchar(20) NOT NULL,
  `old_data` varchar(500) NOT NULL,
  `new_data` varchar(500) NOT NULL,
  `noti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`ket`, `date`, `tgl_proses`, `old_data`, `new_data`, `noti`) VALUES
('965240', '2020-05-06 00:53:28', '2020-05-01 14:50:00', 'Submitted', 'sedang dikerjakan', 'TCU00001'),
('965240', '2020-05-06 00:54:34', '2020-05-01 14:50:00', 'On Process', 'sedang dikerjakan oleh ahli', 'TCU00001'),
('965240', '2020-05-06 01:31:29', '2020-05-01 14:50:00', 'Completed', 'sedang dikerjakan oleh ahli', 'TCU00001'),
('965232', '2020-05-06 10:40:43', '2020-05-06 00:12:00', 'Submitted', 'awedwaecawesadwqesadwqesadweqweq', 'TCU00002'),
('965232', '2020-05-06 10:44:25', '2020-05-06 00:12:00', 'On Process', 'awedwaecawesadwqesadwqesadweqweq', 'TCU00002'),
('965435', '2020-05-06 10:51:32', '2020-05-06 00:31:00', 'Submitted', 'awqedaweqdasaweqw', 'TCU00003'),
('962132', '2020-05-06 10:54:13', '2020-05-06 00:03:00', 'Submitted', 'aweqdaweadadwaweqdawe', 'TCU00004'),
('965247', '2020-05-06 11:04:52', '2020-05-06 00:12:00', 'Submitted', 'aweqdawedsawewqdsaewq', 'TCU00005'),
('963121', '2020-05-06 11:06:05', '2020-05-21 00:31:00', 'Submitted', 'awqdawewqdqweqdwqeqdaweqa', 'TCU00006'),
('963121', '2020-05-06 11:06:53', '2020-05-21 00:31:00', 'On Process', 'awqdawewqdqweqdwqeqdaweqa', 'TCU00006'),
('962132', '2020-05-06 11:24:24', '2020-05-06 00:03:00', 'Closed', 'aweqdaweadadwaweqdawe', 'TCU00004');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Id_Usergroup_User` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Foto` varchar(150) NOT NULL DEFAULT 'ids.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Id_Usergroup_User`, `Username`, `Password`, `Foto`) VALUES
(1, 1, 'admin', 'admin', 'ids.jpg'),
(2, 1, 'admincorpu', 'admincorpu', 'ids.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD KEY `FK_user_usergroup` (`Id_Usergroup_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

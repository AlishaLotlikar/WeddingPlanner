-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 04:02 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weddingplanner`
--
CREATE DATABASE IF NOT EXISTS `weddingplanner` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `weddingplanner`;

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

DROP TABLE IF EXISTS `aboutus`;
CREATE TABLE `aboutus` (
  `Id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `College` varchar(50) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`Id`, `Name`, `College`, `Contact`, `Email`, `Image`) VALUES
(8, 'Alisha Lotlikar', 'Goa University', 8806529800, 'alishalotlikar@gmail.com', 0x576861747341707020496d61676520323031372d31312d313720617420372e31302e313820504d2e6a706567),
(9, 'Jolwina Fernandes', 'Goa University', 8806728107, 'jolwinafernandes@gmail.com', 0x576861747341707020496d61676520323031372d31312d32302061742031302e30312e353320414d2e6a706567),
(10, 'Resha Kunkalekar', 'Goa University', 7507370545, 'reshakunkalekar@gmail.com', 0x576861747341707020496d61676520323031372d31312d32302061742031312e32372e323920414d2e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

DROP TABLE IF EXISTS `band`;
CREATE TABLE `band` (
  `bandid` int(10) NOT NULL,
  `bandname` varchar(50) DEFAULT NULL,
  `bandaddress` varchar(50) DEFAULT NULL,
  `bandcontact` varchar(10) DEFAULT NULL,
  `bandPrice` int(10) DEFAULT NULL,
  `bandratings` varchar(20) DEFAULT NULL,
  `bandImages` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`bandid`, `bandname`, `bandaddress`, `bandcontact`, `bandPrice`, `bandratings`, `bandImages`) VALUES
(1, 'Cascades', 'Aldona', '9876532410', 60000, '4', 0x636173636164652e6a7067),
(2, 'The Big Country Band', 'Vasco', '8956777100', 75000, '4.5', 0x62696720636f756e7472792e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `cake`
--

DROP TABLE IF EXISTS `cake`;
CREATE TABLE `cake` (
  `cakeid` int(10) NOT NULL,
  `cakename` varchar(50) DEFAULT NULL,
  `caketype` varchar(50) DEFAULT NULL,
  `cakePrice` int(10) DEFAULT NULL,
  `cakeratings` varchar(20) DEFAULT NULL,
  `cpid` int(10) DEFAULT NULL,
  `cakeimages` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`cakeid`, `cakename`, `caketype`, `cakePrice`, `cakeratings`, `cpid`, `cakeimages`) VALUES
(1, 'Caked', 'BUTTER CAKE', 5000, '3', 1, 0x6d6f672d6c697374696e672e676966),
(2, 'Rainbow', 'Red Velvet', 3000, '4', 1, 0x73616e74692d63616b65732d676f612e676966);

-- --------------------------------------------------------

--
-- Table structure for table `cakeproducers`
--

DROP TABLE IF EXISTS `cakeproducers`;
CREATE TABLE `cakeproducers` (
  `cpid` int(10) NOT NULL,
  `cpname` varchar(50) DEFAULT NULL,
  `cpaddress` varchar(50) DEFAULT NULL,
  `cpcontact` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cakeproducers`
--

INSERT INTO `cakeproducers` (`cpid`, `cpname`, `cpaddress`, `cpcontact`) VALUES
(1, 'Rachel Dias', 'Porvorim', '8956326633');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `Cid` int(10) NOT NULL,
  `CType` varchar(50) DEFAULT NULL,
  `COno` int(20) DEFAULT NULL,
  `CPrice` int(10) DEFAULT NULL,
  `Cratings` varchar(20) DEFAULT NULL,
  `Cimages` longblob,
  `COid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Cid`, `CType`, `COno`, `CPrice`, `Cratings`, `Cimages`, `COid`) VALUES
(1, 'JAGUAR XF', 1001, 20000, '4.5', 0x4a41475541522058462e6a7067, 1),
(2, 'MERCEDES C CLASS', 6666, 10000, '4', 0x332e6a7067, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carowner`
--

DROP TABLE IF EXISTS `carowner`;
CREATE TABLE `carowner` (
  `COid` int(10) NOT NULL,
  `COname` varchar(50) DEFAULT NULL,
  `COaddress` varchar(50) DEFAULT NULL,
  `COcontact` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carowner`
--

INSERT INTO `carowner` (`COid`, `COname`, `COaddress`, `COcontact`) VALUES
(1, 'Push : Tours and Travels', 'Margao', '8974556322');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `type`, `name`, `price`) VALUES
(2, 'band', 'The Big Country Band', 75000),
(1, 'mc', 'Frazier Martins ', 15000),
(1, 'caterer', 'Jiza Caterers', 100000),
(2, 'decorator', 'Golden Eagle Events', 50000),
(1, 'hall', 'The Golden Orchid', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `caterer`
--

DROP TABLE IF EXISTS `caterer`;
CREATE TABLE `caterer` (
  `Caid` int(10) NOT NULL,
  `Caname` varchar(50) DEFAULT NULL,
  `Caaddress` varchar(50) DEFAULT NULL,
  `Cacontact` varchar(10) DEFAULT NULL,
  `CaPrice` int(10) DEFAULT NULL,
  `Caratings` varchar(20) DEFAULT NULL,
  `Caimages` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caterer`
--

INSERT INTO `caterer` (`Caid`, `Caname`, `Caaddress`, `Cacontact`, `CaPrice`, `Caratings`, `Caimages`) VALUES
(1, 'Jiza Caterers', 'Margao', '8563296325', 100000, '4', 0x6a697a612e6a7067),
(2, 'Be Happy', 'Navelim', '8574369210', 80000, '4', 0x62652d68617070792e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

DROP TABLE IF EXISTS `creditcard`;
CREATE TABLE `creditcard` (
  `credit` int(10) NOT NULL,
  `creditCardNo` varchar(16) NOT NULL,
  `creditEx` varchar(20) NOT NULL,
  `creditCVV` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `custpackage`
--

DROP TABLE IF EXISTS `custpackage`;
CREATE TABLE `custpackage` (
  `Pckgid` int(10) DEFAULT NULL,
  `Hid` int(10) DEFAULT NULL,
  `Cid` int(10) DEFAULT NULL,
  `Did` int(10) DEFAULT NULL,
  `Caid` int(10) DEFAULT NULL,
  `djid` int(10) DEFAULT NULL,
  `Mcid` int(10) DEFAULT NULL,
  `bandid` int(10) DEFAULT NULL,
  `cakid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `debitcard`
--

DROP TABLE IF EXISTS `debitcard`;
CREATE TABLE `debitcard` (
  `debitid` int(10) NOT NULL,
  `debitCardNo` varchar(16) NOT NULL,
  `debitEx` varchar(20) NOT NULL,
  `debitCVV` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `decorator`
--

DROP TABLE IF EXISTS `decorator`;
CREATE TABLE `decorator` (
  `Did` int(10) NOT NULL,
  `Dname` varchar(50) DEFAULT NULL,
  `DOaddress` varchar(50) DEFAULT NULL,
  `DContact` varchar(10) DEFAULT NULL,
  `DPrice` int(10) DEFAULT NULL,
  `Dratings` varchar(20) DEFAULT NULL,
  `Dimages` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `decorator`
--

INSERT INTO `decorator` (`Did`, `Dname`, `DOaddress`, `DContact`, `DPrice`, `Dratings`, `Dimages`) VALUES
(1, 'My Dream Destination', 'Panaji', '8956232563', 30000, '3', 0x6d792d647265616d2e6a7067),
(2, 'Golden Eagle Events', 'Davorlim', '8566329910', 50000, '4', 0x676f6c64656e2d6561676c652d6576656e74732e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `dj`
--

DROP TABLE IF EXISTS `dj`;
CREATE TABLE `dj` (
  `djid` int(10) NOT NULL,
  `djname` varchar(50) DEFAULT NULL,
  `djaddress` varchar(50) DEFAULT NULL,
  `djcontact` varchar(10) DEFAULT NULL,
  `djPrice` int(10) DEFAULT NULL,
  `djratings` varchar(20) DEFAULT NULL,
  `djimages` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dj`
--

INSERT INTO `dj` (`djid`, `djname`, `djaddress`, `djcontact`, `djPrice`, `djratings`, `djimages`) VALUES
(1, 'Dj Vally', 'Calangut', '9922170478', 10000, '3', 0x646a2d76616c6c792e676966),
(2, 'Dj Reonn', 'Porvorim', '7798611806', 12000, '3.5', 0x646a2d72656f6e6e2d676f612e676966);

-- --------------------------------------------------------

--
-- Table structure for table `goldpackage`
--

DROP TABLE IF EXISTS `goldpackage`;
CREATE TABLE `goldpackage` (
  `gid` int(10) NOT NULL,
  `Pckgid` int(10) DEFAULT NULL,
  `Hid` int(10) DEFAULT NULL,
  `Cid` int(10) DEFAULT NULL,
  `Did` int(10) DEFAULT NULL,
  `Caid` int(10) DEFAULT NULL,
  `djid` int(10) DEFAULT NULL,
  `Mcid` int(10) DEFAULT NULL,
  `bandid` int(10) DEFAULT NULL,
  `cakid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `goldpackage`
--

INSERT INTO `goldpackage` (`gid`, `Pckgid`, `Hid`, `Cid`, `Did`, `Caid`, `djid`, `Mcid`, `bandid`, `cakid`) VALUES
(2, 6, 2, 2, 1, 2, 1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

DROP TABLE IF EXISTS `hall`;
CREATE TABLE `hall` (
  `Hid` int(10) NOT NULL,
  `Hname` varchar(50) DEFAULT NULL,
  `Haddress` varchar(50) DEFAULT NULL,
  `HPrice` int(10) DEFAULT NULL,
  `Hratings` varchar(20) DEFAULT NULL,
  `Himages` longblob,
  `HOid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`Hid`, `Hname`, `Haddress`, `HPrice`, `Hratings`, `Himages`, `HOid`) VALUES
(1, 'The Golden Orchid', 'Duler, Mapusa', 50000, '4', 0x54686520476f6c64656e204f72636869642e6a7067, 1),
(2, 'Blueberry Hills', 'Verna', 45000, '4', 0x426c75655f42657272795f48696c6c2e6a7067, 1),
(3, 'Tavir', 'Vasco', 50000, '4', 0x62652d68617070792e6a7067, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hallowner`
--

DROP TABLE IF EXISTS `hallowner`;
CREATE TABLE `hallowner` (
  `HOid` int(10) NOT NULL,
  `HOname` varchar(50) DEFAULT NULL,
  `HOaddress` varchar(50) DEFAULT NULL,
  `HOcontact` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hallowner`
--

INSERT INTO `hallowner` (`HOid`, `HOname`, `HOaddress`, `HOcontact`) VALUES
(1, 'Sameer Kumar ', 'Porvorim', '8965223341');

-- --------------------------------------------------------

--
-- Table structure for table `mc`
--

DROP TABLE IF EXISTS `mc`;
CREATE TABLE `mc` (
  `Mcid` int(10) NOT NULL,
  `Mcname` varchar(50) DEFAULT NULL,
  `Mcaddress` varchar(50) DEFAULT NULL,
  `Mccontact` varchar(10) DEFAULT NULL,
  `McPrice` int(10) DEFAULT NULL,
  `Mcratings` varchar(20) DEFAULT NULL,
  `Mcimages` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mc`
--

INSERT INTO `mc` (`Mcid`, `Mcname`, `Mcaddress`, `Mccontact`, `McPrice`, `Mcratings`, `Mcimages`) VALUES
(1, 'Frazier Martins ', 'Margao', '9820468298', 15000, '4.5', 0x6672617a6965722d6d617274696e732e6a7067),
(2, 'Pearl Roma Dsouza ', 'Caranzalem', '8806488567', 12000, '4.5', 0x6d632d706561726c2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
CREATE TABLE `package` (
  `Pckgid` int(10) NOT NULL,
  `PckgType` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`Pckgid`, `PckgType`) VALUES
(4, 'Silver'),
(5, 'Platinum'),
(6, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `planner`
--

DROP TABLE IF EXISTS `planner`;
CREATE TABLE `planner` (
  `Pid` int(10) NOT NULL,
  `Pfirstname` varchar(20) DEFAULT NULL,
  `Plastname` varchar(20) NOT NULL,
  `Pcontact` bigint(10) DEFAULT NULL,
  `Pemail` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planner`
--

INSERT INTO `planner` (`Pid`, `Pfirstname`, `Plastname`, `Pcontact`, `Pemail`, `Password`) VALUES
(1, 'Alisha', 'Lotlikar', 8806529800, 'alisha_lotlikar@hotmail.com', 'Alisha95'),
(2, 'Jolwina', 'fernandes', 9850727821, 'jolwinafernandes@gmail.com', 'Jolu123'),
(3, 'Resha', 'Kunkalekar', 9876543210, 'resha123@gmail.com', 'Resha123');

-- --------------------------------------------------------

--
-- Table structure for table `platinumpackage`
--

DROP TABLE IF EXISTS `platinumpackage`;
CREATE TABLE `platinumpackage` (
  `pid` int(10) NOT NULL,
  `Pckgid` int(10) DEFAULT NULL,
  `Hid` int(10) DEFAULT NULL,
  `Cid` int(10) DEFAULT NULL,
  `Did` int(10) DEFAULT NULL,
  `Caid` int(10) DEFAULT NULL,
  `djid` int(10) DEFAULT NULL,
  `Mcid` int(10) DEFAULT NULL,
  `bandid` int(10) DEFAULT NULL,
  `cakid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platinumpackage`
--

INSERT INTO `platinumpackage` (`pid`, `Pckgid`, `Hid`, `Cid`, `Did`, `Caid`, `djid`, `Mcid`, `bandid`, `cakid`) VALUES
(1, 5, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `silverpackage`
--

DROP TABLE IF EXISTS `silverpackage`;
CREATE TABLE `silverpackage` (
  `sid` int(10) NOT NULL,
  `Pckgid` int(10) DEFAULT NULL,
  `Hid` int(10) DEFAULT NULL,
  `Cid` int(10) DEFAULT NULL,
  `Did` int(10) DEFAULT NULL,
  `Caid` int(10) DEFAULT NULL,
  `djid` int(10) DEFAULT NULL,
  `Mcid` int(10) DEFAULT NULL,
  `bandid` int(10) DEFAULT NULL,
  `cakid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `silverpackage`
--

INSERT INTO `silverpackage` (`sid`, `Pckgid`, `Hid`, `Cid`, `Did`, `Caid`, `djid`, `Mcid`, `bandid`, `cakid`) VALUES
(2, 4, 1, 2, 2, 2, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Uid` int(10) NOT NULL,
  `Ufirstname` varchar(20) DEFAULT NULL,
  `Ulastname` varchar(20) NOT NULL,
  `UContact` bigint(10) DEFAULT NULL,
  `Uemail` varchar(50) NOT NULL,
  `Upassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Uid`, `Ufirstname`, `Ulastname`, `UContact`, `Uemail`, `Upassword`) VALUES
(1, 'Alisha', 'Lotlikar', 8806529800, 'alishalotlikar@gmail', 'Alisha95'),
(2, 'Mickey', 'Mouse', 8956320147, 'asdfghj@gmail.com', 'qwerty'),
(3, 'abc', 'fdvd', 9874563210, 'poi@gmail.com', 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`bandid`);

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`cakeid`),
  ADD KEY `cpid` (`cpid`);

--
-- Indexes for table `cakeproducers`
--
ALTER TABLE `cakeproducers`
  ADD PRIMARY KEY (`cpid`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `COid` (`COid`);

--
-- Indexes for table `carowner`
--
ALTER TABLE `carowner`
  ADD PRIMARY KEY (`COid`);

--
-- Indexes for table `caterer`
--
ALTER TABLE `caterer`
  ADD PRIMARY KEY (`Caid`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`credit`);

--
-- Indexes for table `custpackage`
--
ALTER TABLE `custpackage`
  ADD KEY `Pckgid` (`Pckgid`),
  ADD KEY `Hid` (`Hid`),
  ADD KEY `Cid` (`Cid`),
  ADD KEY `Did` (`Did`),
  ADD KEY `Caid` (`Caid`),
  ADD KEY `djid` (`djid`),
  ADD KEY `Mcid` (`Mcid`),
  ADD KEY `bandid` (`bandid`),
  ADD KEY `cakid` (`cakid`);

--
-- Indexes for table `debitcard`
--
ALTER TABLE `debitcard`
  ADD PRIMARY KEY (`debitid`);

--
-- Indexes for table `decorator`
--
ALTER TABLE `decorator`
  ADD PRIMARY KEY (`Did`);

--
-- Indexes for table `dj`
--
ALTER TABLE `dj`
  ADD PRIMARY KEY (`djid`);

--
-- Indexes for table `goldpackage`
--
ALTER TABLE `goldpackage`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `Pckgid` (`Pckgid`),
  ADD KEY `Hid` (`Hid`),
  ADD KEY `Cid` (`Cid`),
  ADD KEY `Did` (`Did`),
  ADD KEY `Caid` (`Caid`),
  ADD KEY `djid` (`djid`),
  ADD KEY `Mcid` (`Mcid`),
  ADD KEY `bandid` (`bandid`),
  ADD KEY `cakid` (`cakid`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`Hid`),
  ADD KEY `HOid` (`HOid`);

--
-- Indexes for table `hallowner`
--
ALTER TABLE `hallowner`
  ADD PRIMARY KEY (`HOid`);

--
-- Indexes for table `mc`
--
ALTER TABLE `mc`
  ADD PRIMARY KEY (`Mcid`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Pckgid`);

--
-- Indexes for table `planner`
--
ALTER TABLE `planner`
  ADD PRIMARY KEY (`Pid`),
  ADD UNIQUE KEY `Pemail` (`Pemail`);

--
-- Indexes for table `platinumpackage`
--
ALTER TABLE `platinumpackage`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `Pckgid` (`Pckgid`),
  ADD KEY `Hid` (`Hid`),
  ADD KEY `Cid` (`Cid`),
  ADD KEY `Did` (`Did`),
  ADD KEY `Caid` (`Caid`),
  ADD KEY `djid` (`djid`),
  ADD KEY `Mcid` (`Mcid`),
  ADD KEY `bandid` (`bandid`),
  ADD KEY `cakid` (`cakid`);

--
-- Indexes for table `silverpackage`
--
ALTER TABLE `silverpackage`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `Pckgid` (`Pckgid`),
  ADD KEY `Hid` (`Hid`),
  ADD KEY `Cid` (`Cid`),
  ADD KEY `Did` (`Did`),
  ADD KEY `Caid` (`Caid`),
  ADD KEY `djid` (`djid`),
  ADD KEY `Mcid` (`Mcid`),
  ADD KEY `bandid` (`bandid`),
  ADD KEY `cakid` (`cakid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Uid`),
  ADD UNIQUE KEY `Uemail` (`Uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `bandid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cake`
--
ALTER TABLE `cake`
  MODIFY `cakeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cakeproducers`
--
ALTER TABLE `cakeproducers`
  MODIFY `cpid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `Cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carowner`
--
ALTER TABLE `carowner`
  MODIFY `COid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `caterer`
--
ALTER TABLE `caterer`
  MODIFY `Caid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `credit` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debitcard`
--
ALTER TABLE `debitcard`
  MODIFY `debitid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `decorator`
--
ALTER TABLE `decorator`
  MODIFY `Did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dj`
--
ALTER TABLE `dj`
  MODIFY `djid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goldpackage`
--
ALTER TABLE `goldpackage`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `Hid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hallowner`
--
ALTER TABLE `hallowner`
  MODIFY `HOid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mc`
--
ALTER TABLE `mc`
  MODIFY `Mcid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `Pckgid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `planner`
--
ALTER TABLE `planner`
  MODIFY `Pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `platinumpackage`
--
ALTER TABLE `platinumpackage`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `silverpackage`
--
ALTER TABLE `silverpackage`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cake`
--
ALTER TABLE `cake`
  ADD CONSTRAINT `cake_ibfk_1` FOREIGN KEY (`cpid`) REFERENCES `cakeproducers` (`cpid`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`COid`) REFERENCES `carowner` (`COid`);

--
-- Constraints for table `custpackage`
--
ALTER TABLE `custpackage`
  ADD CONSTRAINT `custpackage_ibfk_10` FOREIGN KEY (`Pckgid`) REFERENCES `package` (`Pckgid`),
  ADD CONSTRAINT `custpackage_ibfk_2` FOREIGN KEY (`Hid`) REFERENCES `hall` (`Hid`),
  ADD CONSTRAINT `custpackage_ibfk_3` FOREIGN KEY (`Cid`) REFERENCES `car` (`Cid`),
  ADD CONSTRAINT `custpackage_ibfk_4` FOREIGN KEY (`Did`) REFERENCES `decorator` (`Did`),
  ADD CONSTRAINT `custpackage_ibfk_5` FOREIGN KEY (`Caid`) REFERENCES `caterer` (`Caid`),
  ADD CONSTRAINT `custpackage_ibfk_6` FOREIGN KEY (`djid`) REFERENCES `dj` (`djid`),
  ADD CONSTRAINT `custpackage_ibfk_7` FOREIGN KEY (`Mcid`) REFERENCES `mc` (`Mcid`),
  ADD CONSTRAINT `custpackage_ibfk_8` FOREIGN KEY (`bandid`) REFERENCES `band` (`bandid`),
  ADD CONSTRAINT `custpackage_ibfk_9` FOREIGN KEY (`cakid`) REFERENCES `cake` (`cakeid`);

--
-- Constraints for table `goldpackage`
--
ALTER TABLE `goldpackage`
  ADD CONSTRAINT `goldpackage_ibfk_10` FOREIGN KEY (`Pckgid`) REFERENCES `package` (`Pckgid`),
  ADD CONSTRAINT `goldpackage_ibfk_2` FOREIGN KEY (`Hid`) REFERENCES `hall` (`Hid`),
  ADD CONSTRAINT `goldpackage_ibfk_3` FOREIGN KEY (`Cid`) REFERENCES `car` (`Cid`),
  ADD CONSTRAINT `goldpackage_ibfk_4` FOREIGN KEY (`Did`) REFERENCES `decorator` (`Did`),
  ADD CONSTRAINT `goldpackage_ibfk_5` FOREIGN KEY (`Caid`) REFERENCES `caterer` (`Caid`),
  ADD CONSTRAINT `goldpackage_ibfk_6` FOREIGN KEY (`djid`) REFERENCES `dj` (`djid`),
  ADD CONSTRAINT `goldpackage_ibfk_7` FOREIGN KEY (`Mcid`) REFERENCES `mc` (`Mcid`),
  ADD CONSTRAINT `goldpackage_ibfk_8` FOREIGN KEY (`bandid`) REFERENCES `band` (`bandid`),
  ADD CONSTRAINT `goldpackage_ibfk_9` FOREIGN KEY (`cakid`) REFERENCES `cake` (`cakeid`);

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `hall_ibfk_1` FOREIGN KEY (`HOid`) REFERENCES `hallowner` (`HOid`);

--
-- Constraints for table `platinumpackage`
--
ALTER TABLE `platinumpackage`
  ADD CONSTRAINT `platinumpackage_ibfk_10` FOREIGN KEY (`Pckgid`) REFERENCES `package` (`Pckgid`),
  ADD CONSTRAINT `platinumpackage_ibfk_2` FOREIGN KEY (`Hid`) REFERENCES `hall` (`Hid`),
  ADD CONSTRAINT `platinumpackage_ibfk_3` FOREIGN KEY (`Cid`) REFERENCES `car` (`Cid`),
  ADD CONSTRAINT `platinumpackage_ibfk_4` FOREIGN KEY (`Did`) REFERENCES `decorator` (`Did`),
  ADD CONSTRAINT `platinumpackage_ibfk_5` FOREIGN KEY (`Caid`) REFERENCES `caterer` (`Caid`),
  ADD CONSTRAINT `platinumpackage_ibfk_6` FOREIGN KEY (`djid`) REFERENCES `dj` (`djid`),
  ADD CONSTRAINT `platinumpackage_ibfk_7` FOREIGN KEY (`Mcid`) REFERENCES `mc` (`Mcid`),
  ADD CONSTRAINT `platinumpackage_ibfk_8` FOREIGN KEY (`bandid`) REFERENCES `band` (`bandid`),
  ADD CONSTRAINT `platinumpackage_ibfk_9` FOREIGN KEY (`cakid`) REFERENCES `cake` (`cakeid`);

--
-- Constraints for table `silverpackage`
--
ALTER TABLE `silverpackage`
  ADD CONSTRAINT `silverpackage_ibfk_10` FOREIGN KEY (`Pckgid`) REFERENCES `package` (`Pckgid`),
  ADD CONSTRAINT `silverpackage_ibfk_2` FOREIGN KEY (`Hid`) REFERENCES `hall` (`Hid`),
  ADD CONSTRAINT `silverpackage_ibfk_3` FOREIGN KEY (`Cid`) REFERENCES `car` (`Cid`),
  ADD CONSTRAINT `silverpackage_ibfk_4` FOREIGN KEY (`Did`) REFERENCES `decorator` (`Did`),
  ADD CONSTRAINT `silverpackage_ibfk_5` FOREIGN KEY (`Caid`) REFERENCES `caterer` (`Caid`),
  ADD CONSTRAINT `silverpackage_ibfk_6` FOREIGN KEY (`djid`) REFERENCES `dj` (`djid`),
  ADD CONSTRAINT `silverpackage_ibfk_7` FOREIGN KEY (`Mcid`) REFERENCES `mc` (`Mcid`),
  ADD CONSTRAINT `silverpackage_ibfk_8` FOREIGN KEY (`bandid`) REFERENCES `band` (`bandid`),
  ADD CONSTRAINT `silverpackage_ibfk_9` FOREIGN KEY (`cakid`) REFERENCES `cake` (`cakeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

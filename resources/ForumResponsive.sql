-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2017 at 04:42 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ForumResponsive`
--

-- --------------------------------------------------------

--
-- Table structure for table `TBmeta`
--

CREATE TABLE `TBmeta` (
  `Post_ID` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` mediumtext NOT NULL,
  `User_ID` int(11) NOT NULL,
  `imageURL` mediumtext NOT NULL,
  `isOP` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TBmeta`
--

INSERT INTO `TBmeta` (`Post_ID`, `Date`, `content`, `User_ID`, `imageURL`, `isOP`) VALUES
('OP1503326319?9', '2017-08-21 14:38:44', 'Content', 9, 'dd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TBPost`
--

CREATE TABLE `TBPost` (
  `Post_ID` varchar(255) NOT NULL,
  `Title` mediumtext NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `TBPost`
--

INSERT INTO `TBPost` (`Post_ID`, `Title`, `DateCreated`) VALUES
('1', 'Hi', '2017-08-21 02:07:40'),
('OP1503326319?9', 'TEST', '2017-08-21 14:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `TBrate`
--

CREATE TABLE `TBrate` (
  `Post_ID` varchar(255) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Rating` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TBTag`
--

CREATE TABLE `TBTag` (
  `Post_ID` varchar(255) NOT NULL,
  `Tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TBUser`
--

CREATE TABLE `TBUser` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `UserName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `PW` mediumtext CHARACTER SET utf8 NOT NULL,
  `Created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AvatarURL` mediumtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `TBUser`
--

INSERT INTO `TBUser` (`User_ID`, `Name`, `UserName`, `PW`, `Created_date`, `AvatarURL`) VALUES
(1, 'TAE', 'test', '123232323', '2017-08-19 09:54:27', ''),
(9, 'เต้', 'tachihd', '54a68bd17f8a56f940f69ab0d703b5df', '2017-08-20 03:16:57', ''),
(11, 'ดาว', 'dao', '202cb962ac59075b964b07152d234b70', '2017-08-20 14:11:04', ''),
(12, 'Tachid', 'Tachid', '81dc9bdb52d04dc20036dbd8313ed055', '2017-08-21 06:18:52', '/resources/images/avatar/default_Avatar.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TBmeta`
--
ALTER TABLE `TBmeta`
  ADD PRIMARY KEY (`Post_ID`,`Date`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `TBPost`
--
ALTER TABLE `TBPost`
  ADD PRIMARY KEY (`Post_ID`);

--
-- Indexes for table `TBrate`
--
ALTER TABLE `TBrate`
  ADD PRIMARY KEY (`Post_ID`,`User_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `TBTag`
--
ALTER TABLE `TBTag`
  ADD PRIMARY KEY (`Post_ID`,`Tag`);

--
-- Indexes for table `TBUser`
--
ALTER TABLE `TBUser`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TBUser`
--
ALTER TABLE `TBUser`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `TBmeta`
--
ALTER TABLE `TBmeta`
  ADD CONSTRAINT `tbmeta_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `TBPost` (`Post_ID`),
  ADD CONSTRAINT `tbmeta_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `TBUser` (`User_ID`);

--
-- Constraints for table `TBrate`
--
ALTER TABLE `TBrate`
  ADD CONSTRAINT `tbrate_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `TBPost` (`Post_ID`),
  ADD CONSTRAINT `tbrate_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `TBUser` (`User_ID`);

--
-- Constraints for table `TBTag`
--
ALTER TABLE `TBTag`
  ADD CONSTRAINT `tbTag_ibfk_1` FOREIGN KEY (`Post_ID`) REFERENCES `TBPost` (`Post_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

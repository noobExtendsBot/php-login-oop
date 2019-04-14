-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 09:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `DegID` int(11) NOT NULL,
  `DegRole` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`DegID`, `DegRole`) VALUES
(1, 'customer'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `DegID` int(11) DEFAULT NULL,
  `Created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FullName`, `Email`, `Mobile`, `Password`, `DegID`, `Created`) VALUES
(1, 'Nazish', 'nazish@gmail.com', '1234567890', '$2y$10$U.v06S.r8L2n1L/EOiHw3.WgI72KlRrmOI7Hmn0tDs7CKibuTRW8O', 2, '2019-04-14 23:08:32'),
(2, 'Rahul', 'rahul@gmail.com', '1234567890', '$2y$10$FHWpcVcSwV6Mp1bURuUR8uNy6vUNXT237wyvwxLWvxL1zmX9hOkWu', 1, '2019-04-14 23:15:42'),
(3, 'priya sharma', 'priyasharma@gmail.com', '9997457397', '$2y$10$rQSG6KbDS0SVUZFfsE.gcOl0J/dIuFGhoJ0Z1bhIv7oYiWARy/r16', 1, '2019-04-15 00:55:45'),
(4, 'random123', 'random123@gmail.com', '1234567890', '$2y$10$Bk8cyA0motMAGgTlpXDKs.iAE64uF2cOOayl4mwsIbg7XAjPZpHQq', 2, '2019-04-15 00:56:42'),
(5, 'nate diaz', 'nate@gmail.com', '1234567890', '$2y$10$UOASvH4cmEI9g2XVaJ9yrOgjdTk8eywRdmyfdzNjKHrcx4Aqyj9iq', 2, '2019-04-15 00:57:46'),
(6, 'random12345', 'random@gmail.com', '7762886360', '$2y$10$3jb/ZR1kn8VRw0TYFRV7EOJLJfaZElc0n2M56U2nJXD41vRb.gdhu', 1, '2019-04-15 01:00:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`DegID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `DegID` (`DegID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `DegID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`DegID`) REFERENCES `designation` (`DegID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

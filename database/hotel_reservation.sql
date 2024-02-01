-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 01:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoteldata`
--

CREATE TABLE `hoteldata` (
  `hotelID` int(11) NOT NULL,
  `hotelName` varchar(255) DEFAULT NULL,
  `hotelEmail` varchar(20) DEFAULT NULL,
  `hotelPhoneNo` int(10) DEFAULT NULL,
  `hotelLocation` varchar(100) DEFAULT NULL,
  `additionalComment` varchar(500) DEFAULT NULL,
  `hotelPhoto` varchar(150) NOT NULL,
  `hotelCategory` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoteldata`
--

INSERT INTO `hoteldata` (`hotelID`, `hotelName`, `hotelEmail`, `hotelPhoneNo`, `hotelLocation`, `additionalComment`, `hotelPhoto`, `hotelCategory`) VALUES
(17, 'Royal Colombo', 'royalcolombo@gmail.c', 119090900, 'Colombo', 'Best One', 'WhatsApp Image 2024-01-30 at 19.35.02.jpeg', '7');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `bookinID` int(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `creditcardNumber` varchar(250) NOT NULL,
  `expireMonth` varchar(250) NOT NULL,
  `year` varchar(250) NOT NULL,
  `cvc` varchar(3) NOT NULL,
  `NIC` varchar(50) NOT NULL,
  `cardName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`bookinID`, `email`, `creditcardNumber`, `expireMonth`, `year`, `cvc`, `NIC`, `cardName`) VALUES
(1, 'bihan@gmail.com', '1234567890123456', 'January', '2025', '123', '22222v', 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `roomsdelails`
--

CREATE TABLE `roomsdelails` (
  `roomID` int(11) NOT NULL,
  `hotelName` varchar(150) DEFAULT NULL,
  `offers` varchar(150) DEFAULT NULL,
  `veiuPoint` varchar(150) DEFAULT NULL,
  `overView` varchar(150) DEFAULT NULL,
  `price` int(150) DEFAULT NULL,
  `hotelID` int(11) NOT NULL,
  `roomPhoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomsdelails`
--

INSERT INTO `roomsdelails` (`roomID`, `hotelName`, `offers`, `veiuPoint`, `overView`, `price`, `hotelID`, `roomPhoto`) VALUES
(4, 'Royal Colombo', '20%', 'Lotous Tower', 'Best Room', 2000, 17, 'WhatsApp Image 2024-01-30 at 19.37.34.jpeg'),
(5, 'Royal Colombo', '40%', 'fghjk', 'ghjk', 5000, 17, 'WhatsApp Image 2024-01-30 at 19.44.05.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `userhelp`
--

CREATE TABLE `userhelp` (
  `helpId` int(11) NOT NULL,
  `NIC` varchar(50) DEFAULT NULL,
  `massages` varchar(500) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `userName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userprofileid`
--

CREATE TABLE `userprofileid` (
  `profileID` int(50) NOT NULL,
  `profilePhoto` varchar(255) DEFAULT 'userProfile.png',
  `NIC` varchar(150) DEFAULT NULL,
  `userName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userprofileid`
--

INSERT INTO `userprofileid` (`profileID`, `profilePhoto`, `NIC`, `userName`) VALUES
(22, 'WhatsApp Image 2024-01-30 at 21.27.01 (2).jpeg', '22222v', 'bihan'),
(24, 'WhatsApp Image 2024-01-30 at 21.27.01 (1).jpeg', '200003301037', 'kasun20');

-- --------------------------------------------------------

--
-- Table structure for table `userregistation`
--

CREATE TABLE `userregistation` (
  `fullName` varchar(150) NOT NULL,
  `userName` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `contactNumber` int(10) NOT NULL,
  `homeTown` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `NIC` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `conformPassword` varchar(150) NOT NULL,
  `userRoole` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userregistation`
--

INSERT INTO `userregistation` (`fullName`, `userName`, `Email`, `contactNumber`, `homeTown`, `DOB`, `NIC`, `password`, `conformPassword`, `userRoole`) VALUES
('kasun', 'kasun20', 'kasun@gmail.com', 753737218, 'Sri lanka', '2024-01-31', '200003301037', '$2y$10$evyiWsz/ofYfRkrQFF3JOu71KTBE86mP1MkMzgDYdltIzhs3e56.O', '$2y$10$AA2QcVWIojtJkhUEahun6e3c/1dzhgdJS1Y7BMwLDC668nlum693C', 'admin'),
('Bihan', 'bihan', 'bihan@gmail.com', 789090902, 'lanka', '2024-01-16', '22222v', '$2y$10$fdpj5hZlLvLp0tlmlyZuYe7c.r6znsDhXp3bnoNH5EWBqTbqJFTR6', '$2y$10$/rEeRXxqLRKRG89nq.KT2udhom5pd0VjdQ4nfB/z7lbw8paTsQbrS', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoteldata`
--
ALTER TABLE `hoteldata`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`bookinID`),
  ADD KEY `fk_Email` (`NIC`);

--
-- Indexes for table `roomsdelails`
--
ALTER TABLE `roomsdelails`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `fk_hotelCategory` (`hotelID`);

--
-- Indexes for table `userhelp`
--
ALTER TABLE `userhelp`
  ADD PRIMARY KEY (`helpId`),
  ADD KEY `NIC` (`NIC`);

--
-- Indexes for table `userprofileid`
--
ALTER TABLE `userprofileid`
  ADD PRIMARY KEY (`profileID`),
  ADD KEY `fk_NIC` (`NIC`);

--
-- Indexes for table `userregistation`
--
ALTER TABLE `userregistation`
  ADD PRIMARY KEY (`NIC`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoteldata`
--
ALTER TABLE `hoteldata`
  MODIFY `hotelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `bookinID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roomsdelails`
--
ALTER TABLE `roomsdelails`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userhelp`
--
ALTER TABLE `userhelp`
  MODIFY `helpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userprofileid`
--
ALTER TABLE `userprofileid`
  MODIFY `profileID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD CONSTRAINT `fk_Email` FOREIGN KEY (`NIC`) REFERENCES `userregistation` (`NIC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userhelp`
--
ALTER TABLE `userhelp`
  ADD CONSTRAINT `userhelp_ibfk_1` FOREIGN KEY (`NIC`) REFERENCES `userregistation` (`NIC`);

--
-- Constraints for table `userprofileid`
--
ALTER TABLE `userprofileid`
  ADD CONSTRAINT `fk_NIC` FOREIGN KEY (`NIC`) REFERENCES `userregistation` (`NIC`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

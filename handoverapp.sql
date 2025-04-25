-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 07:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handoverapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblactions`
--

CREATE TABLE `tblactions` (
  `ID` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `assocNoteID` int(11) NOT NULL,
  `description` text NOT NULL,
  `actionOwner` varchar(50) NOT NULL,
  `dueDate` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `attachments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblhandovernotes`
--

CREATE TABLE `tblhandovernotes` (
  `ID` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `note` text NOT NULL,
  `createDate` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `actions` text NOT NULL,
  `actionOwner` varchar(50) NOT NULL,
  `attachments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsections`
--

CREATE TABLE `tblsections` (
  `ID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblteammembers`
--

CREATE TABLE `tblteammembers` (
  `ID` int(11) NOT NULL,
  `companyID` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblactions`
--
ALTER TABLE `tblactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblhandovernotes`
--
ALTER TABLE `tblhandovernotes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsections`
--
ALTER TABLE `tblsections`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblteammembers`
--
ALTER TABLE `tblteammembers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblactions`
--
ALTER TABLE `tblactions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblhandovernotes`
--
ALTER TABLE `tblhandovernotes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsections`
--
ALTER TABLE `tblsections`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblteammembers`
--
ALTER TABLE `tblteammembers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 02:04 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsaledatatracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `tproductsalesdataprocessed`
--

CREATE TABLE `tproductsalesdataprocessed` (
  `ID` int(11) NOT NULL,
  `submitionID` int(11) NOT NULL,
  `ProductCode` int(11) NOT NULL,
  `SalesCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tproductsalesdataprocessed`
--

INSERT INTO `tproductsalesdataprocessed` (`ID`, `submitionID`, `ProductCode`, `SalesCount`) VALUES
(1, 1, 1, 20),
(2, 1, 2, 50),
(3, 1, 3, 30),
(4, 2, 1, 40),
(5, 2, 2, 10),
(6, 2, 3, 5),
(7, 3, 1, 60),
(8, 3, 2, 20),
(9, 3, 3, 3),
(10, 4, 1, 24),
(11, 4, 2, 4),
(12, 4, 3, 23),
(13, 5, 1, 55),
(14, 5, 2, 59),
(15, 5, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tproductsalesdatasubmitted`
--

CREATE TABLE `tproductsalesdatasubmitted` (
  `ID` int(11) NOT NULL,
  `SalesDataInputString` varchar(100) NOT NULL,
  `Submittedby` int(11) NOT NULL,
  `Submittedfor` int(11) NOT NULL,
  `SubmittedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tproductsalesdatasubmitted`
--

INSERT INTO `tproductsalesdatasubmitted` (`ID`, `SalesDataInputString`, `Submittedby`, `Submittedfor`, `SubmittedDate`) VALUES
(1, '', 1, 1, '2017-03-01'),
(2, '', 2, 2, '2017-03-01'),
(3, '', 3, 3, '2017-03-01'),
(4, '', 4, 4, '2017-03-01'),
(5, '', 5, 5, '2017-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `tsalesteaminformation`
--

CREATE TABLE `tsalesteaminformation` (
  `ID` int(11) NOT NULL,
  `TeamName` varchar(20) NOT NULL,
  `TeamLeadID` int(11) NOT NULL,
  `CreatedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsalesteaminformation`
--

INSERT INTO `tsalesteaminformation` (`ID`, `TeamName`, `TeamLeadID`, `CreatedDate`) VALUES
(1, 'A', 101, '2017-03-01'),
(2, 'B', 102, '2017-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `tuserinfromations`
--

CREATE TABLE `tuserinfromations` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `EMailAddress` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuserinfromations`
--

INSERT INTO `tuserinfromations` (`ID`, `FullName`, `EMailAddress`) VALUES
(1, 'Rohit', 'rohit'),
(2, 'Mohit', 'mohit'),
(3, 'Pouroush', 'pouroush'),
(4, 'nikunj', 'nikunj'),
(5, 'janil', 'janil'),
(101, 'LeadRohit', 'lrohit'),
(102, 'LeadPouroush', 'lpouroush'),
(6, 'Guruji', 'guruji');

-- --------------------------------------------------------

--
-- Table structure for table `tuserreportinghierarchy`
--

CREATE TABLE `tuserreportinghierarchy` (
  `ID` int(11) NOT NULL,
  `LeadsUserID` int(11) NOT NULL,
  `MembersUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuserreportinghierarchy`
--

INSERT INTO `tuserreportinghierarchy` (`ID`, `LeadsUserID`, `MembersUserID`) VALUES
(1, 101, 1),
(2, 101, 2),
(3, 101, 3),
(4, 101, 4),
(5, 101, 5),
(6, 102, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tproductsalesdataprocessed`
--
ALTER TABLE `tproductsalesdataprocessed`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tproductsalesdatasubmitted`
--
ALTER TABLE `tproductsalesdatasubmitted`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tsalesteaminformation`
--
ALTER TABLE `tsalesteaminformation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tuserreportinghierarchy`
--
ALTER TABLE `tuserreportinghierarchy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tproductsalesdataprocessed`
--
ALTER TABLE `tproductsalesdataprocessed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tproductsalesdatasubmitted`
--
ALTER TABLE `tproductsalesdatasubmitted`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tsalesteaminformation`
--
ALTER TABLE `tsalesteaminformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tuserreportinghierarchy`
--
ALTER TABLE `tuserreportinghierarchy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

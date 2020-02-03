-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 12:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ndjobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `appliedjobs`
--

CREATE TABLE `appliedjobs` (
  `jobid` bigint(10) NOT NULL,
  `seekeremail` varchar(255) NOT NULL,
  `provideremail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appliedjobs`
--

INSERT INTO `appliedjobs` (`jobid`, `seekeremail`, `provideremail`) VALUES
(19, 'nikhlesh@gmail.com', 'nik@gmail.com'),
(23, 'nikhlesh@gmail.com', 'nik2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `email` varchar(255) NOT NULL,
  `jobid` bigint(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `yoe` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `keywords` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`email`, `jobid`, `title`, `company`, `location`, `yoe`, `salary`, `description`, `keywords`) VALUES
('nik@gmail.com', 19, 'Web Developer', 'ndjobs', 'toronto', '2+', '60000', 'Web developer needed', 'toronto,web,developer,ndjobs,'),
('nik@gmail.com', 20, 'JAVA Developer', 'IBM', 'Missisauga', '2+', '70000', 'Java developer needed', 'java,developer,missisauga,ibm,'),
('nik@gmail.com', 21, 'Merhandise Handler', 'Gap', 'Brampton', 'Fresher', '30000', 'Associate needed', 'gap,handler,associate,merchandise,brampton,'),
('nik@gmail.com', 22, 'Customer Care Executive', 'TD Bank', 'Brampton', '1+', '50000', 'CRM expert needed', 'td,bank,crm,customer,care,executive,brampton,'),
('nik2@gmail.com', 23, 'Delivery Agent', 'Canada Post', 'toronto', 'Fresher', '30000', 'Delivery agent needed', 'canada,post,toronto,delivery,agent,');

-- --------------------------------------------------------

--
-- Table structure for table `regprovider`
--

CREATE TABLE `regprovider` (
  `providername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regprovider`
--

INSERT INTO `regprovider` (`providername`, `email`, `password`) VALUES
('nik2', 'nik2@gmail.com', '111111'),
('nik', 'nik@gmail.com', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `regseeker`
--

CREATE TABLE `regseeker` (
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `curaddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regseeker`
--

INSERT INTO `regseeker` (`firstname`, `lastname`, `email`, `password`, `dob`, `gender`, `phone`, `curaddress`) VALUES
('Nikhlesh', 'Taneja', 'nikhlesh@gmail.com', '111111', '1990-12-07', 'Male', 4165093793, 'Brampton');

-- --------------------------------------------------------

--
-- Table structure for table `seekerdata`
--

CREATE TABLE `seekerdata` (
  `email` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `yop` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `yoe` varchar(255) NOT NULL,
  `ctc` varchar(255) NOT NULL,
  `resumefname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seekerdata`
--

INSERT INTO `seekerdata` (`email`, `qualification`, `course`, `college`, `yop`, `designation`, `company`, `yoe`, `ctc`, `resumefname`) VALUES
('nikhlesh@gmail.com', 'Graduation', 'B.Tech', 'Lovely Professional University', '2013', 'Web Developer', 'Stream Infotech', '2+', '50000', '5e375c44a8e50.doc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appliedjobs`
--
ALTER TABLE `appliedjobs`
  ADD KEY `jobid` (`jobid`),
  ADD KEY `provideremail` (`provideremail`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `regprovider`
--
ALTER TABLE `regprovider`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `regseeker`
--
ALTER TABLE `regseeker`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `seekerdata`
--
ALTER TABLE `seekerdata`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`email`) REFERENCES `regprovider` (`email`);

--
-- Constraints for table `seekerdata`
--
ALTER TABLE `seekerdata`
  ADD CONSTRAINT `seekerdata_ibfk_1` FOREIGN KEY (`email`) REFERENCES `regseeker` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

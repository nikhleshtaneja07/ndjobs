-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2020 at 01:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

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
(7, 'nik@gmail.com', 'stream@gmail.com'),
(7, 'sdak@gmail.com', 'stream@gmail.com'),
(18, 'gagangmail.com', 'nik@gmail.com');

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
('stream@gmail.com', 7, 'Engineer', 'infosys', 'Noida', '2+', '10 lac', 'Stream is hiring new members.', 'engineer, noida, infosys,'),
('stream@gmail.com', 8, 'Web Designer', '99acres', 'gurgaon', '2+', '12 lac', 'MBBS required.', 'web, designer, web designer, 99acres, gurgaon,'),
('deep@gmail.com', 10, 'Salesman', 'Audi', 'Chandigarh', '2+', '13 lac', '8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 th pass8 t', 'salesman, audi, chandigarh,'),
('deep@gmail.com', 11, 'ssp', 'punjab Police', 'Patiala', '2+', '15 lac', 'Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...EntEnter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...EntEnter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...EntEnter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...EntEnter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...EntEnter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...EntEnter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...EntEnter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Enter text here...Ent', 'ssp, punjab, patiala, police, punjab police,'),
('nik@gmail.com', 18, 'Hello', 'Stream Infotech', 'HEllo', '1+', '12 lac', 'sada', 'keywords');

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
('Deepanshu', 'deep@gmail.com', '111111'),
('ndJOBS', 'nik@gmail.com', '111111'),
('Stream', 'stream@gmail.com', '111111');

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
('deep', 'mittal', 'deep@gmail.com', '111111', '2019-04-05', 'Male', 1212121212, 'nabha'),
('Gagan', 'singh', 'gagangmail.com', '12345678', '2111-12-12', 'Male', 1234567890, 'Nabha'),
('Nikhlesh', 'Taneja', 'nik1@gmail.com', '111111', '2019-05-02', 'Male', 1234512345, 'patiala'),
('Nikhlesh', 'Taneja', 'nik@gmail.com', '111111', '1990-12-07', 'Male', 8054151662, '#5283 Arorian Street, Patiala'),
('Nikhlesh', 'Taneja', 'niku@gmail.com', '111111', '2019-05-14', 'Male', 1111122222, 'patiala'),
('Nikhlesh1', 'Taneja', 'nikwsde@gmail.com', '111111', '2019-05-06', 'Male', 1234512345, '#5283 Arorian Street, Patiala'),
('asd', 'asd', 'sdak@gmail.com', '111111', '2019-04-10', 'Male', 1212121212, 'nabha');

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
('deep@gmail.com', 'High School', 'BA', 'nabha college', '2018', 'designer', 'stream', '1+', '3 lac', ''),
('gagangmail.com', 'Ph.D', 'BCA', 'jb', 'ytfc', 'yugv', 're1', '3+', '2lac', ''),
('nik1@gmail.com', '', '', '', '', '', '', '', '', ''),
('nik@gmail.com', 'High School', 'B.Tech', 'LPU', '2013', 'Web Developer', 'Stream Infotech', '2+', '5 lac', '5ccaba5acb128.pdf'),
('niku@gmail.com', '', '', '', '', '', '', '', '', ''),
('nikwsde@gmail.com', 'High School', 'BBA', 'LPU', '2013', 'Web Developer', 'Stream Infotech', '1+', '5 lakjkj', ''),
('sdak@gmail.com', 'High School', 'BA', 'nabha college', '2018', 'designer', 'stream', '5+', '3 lac', '');

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
  MODIFY `jobid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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

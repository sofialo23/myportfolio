-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 03:54 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sofia`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `email`, `password`) VALUES
('admin', 'admin@account.com', '21232f297a57a5a743894a0e4a801fc3'),
('ana', 'ana@gmail.com', '276b6c4692e78d4799c12ada515bc3e4'),
('clau', 'clau@hotmail.com', '7221a7ae112d4036da0e1c822544f83d'),
('kenya', 'kenya@gmail.com', '577e905f157abece95f454ad0b3058cf'),
('momo', 'momo@123.com', '06c56a89949d617def52f371c357b6db'),
('sandra', 'sofialo23@outlook.com', '202cb962ac59075b964b07152d234b70'),
('sofia', 'sofia@gmail.com', '17da1ae431f965d839ec8eb93087fb2b'),
('sushi', 'sushi@gmail.com', 'aea6de9cbaee9d2704dcf81f4a194991');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `Name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Release_date` date NOT NULL,
  `Artist` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Number_of_songs` int(11) NOT NULL,
  `Producer` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`Name`, `Release_date`, `Artist`, `Number_of_songs`, `Producer`, `Price`) VALUES
('Diary', '2015-05-06', 'avril', 17, 'Charles W.', 20.00),
('Happiness', '2016-05-12', 'Taemin', 15, 'Elsa Bynes', 18.00),
('Hello', '2016-05-10', 'Shakira', 8, 'Alice Park', 8.00),
('I love you', '2017-05-11', 'Taemin', 15, 'Amanda Bynes', 35.00),
('Last Winter', '2010-05-01', 'avril', 12, 'Charles W.', 30.00),
('Me', '2009-05-10', 'Shakira', 20, 'Alice Park', 19.00),
('move', '2017-12-12', 'Taemin', 5, 'Kim So', 13.00),
('Only you', '2017-05-01', 'Taemin', 15, 'Sandra George', 35.00),
('summer', '2015-05-03', 'avril', 12, 'Usher', 20.00),
('us', '2006-08-01', 'avril', 11, 'James Gordon', 11.00),
('you', '2016-02-03', 'avril', 10, 'James Gordon', 30.00),
('You and I', '2009-05-01', 'avril', 12, 'Charles W.', 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `Stage_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Real_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Join_date` date NOT NULL,
  `Manager` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Age` int(11) NOT NULL,
  `Sex` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`Stage_name`, `Real_name`, `Join_date`, `Manager`, `Age`, `Sex`) VALUES
('Avril', 'Avril Lavigne', '2000-05-03', 'Carlos', 25, 'F'),
('Shakira', 'Shakira Isabel Mebarak', '2000-01-01', 'SMJ012', 30, 'F'),
('Taemin', 'Kim Taemin', '2008-06-04', 'Lous A', 20, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oID` int(11) NOT NULL,
  `cID` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `AlbumName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oID`, `cID`, `AlbumName`, `Price`) VALUES
(58, 'sushi', 'move', 13.00),
(158, 'ana', 'Happiness', 18.00),
(163, 'ana', 'Happiness', 18.00),
(519, 'ana', 'Happiness', 18.00),
(528, 'ana', 'Happiness', 18.00),
(794, 'ana', 'Happiness', 18.00),
(820, 'ana', 'Happiness', 18.00),
(961, 'ana', 'Happiness', 18.00),
(1150, 'ana', 'Happiness', 18.00),
(1344, 'ana', 'Happiness', 18.00),
(1405, 'ana', 'Happiness', 18.00),
(1717, 'ana', 'Happiness', 18.00),
(2039, 'ana', 'Happiness', 18.00),
(2239, 'ana', 'Happiness', 18.00),
(2395, 'ana', 'Happiness', 18.00),
(2412, 'ana', 'Happiness', 18.00),
(2713, 'ana', 'Happiness', 18.00),
(2752, 'ana', 'Happiness', 18.00),
(2821, 'ana', 'Happiness', 18.00),
(2862, 'ana', 'Happiness', 18.00),
(2987, 'ana', 'Happiness', 18.00),
(3033, 'ana', 'Happiness', 18.00),
(3128, 'ana', 'Happiness', 18.00),
(3158, 'ana', 'Happiness', 18.00),
(3267, 'ana', 'Happiness', 18.00),
(3522, 'ana', 'Happiness', 18.00),
(3622, 'ana', 'Happiness', 18.00),
(3643, 'ana', 'Happiness', 18.00),
(3667, 'ana', 'Happiness', 18.00),
(3775, 'ana', 'Diary', 20.00),
(3830, 'ana', 'Happiness', 18.00),
(3844, 'ana', 'Happiness', 18.00),
(3941, 'ana', 'Happiness', 18.00),
(3948, 'kenya', 'us', 11.00),
(4203, 'ana', 'Happiness', 18.00),
(4284, 'ana', 'Happiness', 18.00),
(4493, 'ana', 'Happiness', 18.00),
(4518, 'ana', 'Happiness', 18.00),
(4698, 'ana', 'Happiness', 18.00),
(4702, 'ana', 'Happiness', 18.00),
(4774, 'ana', 'Happiness', 18.00),
(4843, 'ana', 'Happiness', 18.00),
(4894, 'ana', 'Happiness', 18.00),
(4970, 'sandra', 'Diary', 20.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`Name`),
  ADD KEY `Artist` (`Artist`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`Stage_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oID`),
  ADD KEY `cID` (`cID`),
  ADD KEY `AlbumName` (`AlbumName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4971;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`Artist`) REFERENCES `artist` (`Stage_name`),
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`Artist`) REFERENCES `artist` (`Stage_name`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cID`) REFERENCES `accounts` (`username`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`AlbumName`) REFERENCES `album` (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

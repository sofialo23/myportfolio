-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 12:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_notif`
--

CREATE TABLE `activity_notif` (
  `activity_notif_id` int(11) NOT NULL,
  `activity_notif_creator` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activity_notif_msg` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `activity_notif_activity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity_notif`
--

INSERT INTO `activity_notif` (`activity_notif_id`, `activity_notif_creator`, `activity_notif_msg`, `activity_notif_activity_id`) VALUES
(1, 'first', 'Vayan a la puta actividad no sean culeros!', 1),
(2, 'first', 'Ya les dije que vayan y no van que mulas!', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_notif`
--
ALTER TABLE `activity_notif`
  ADD PRIMARY KEY (`activity_notif_id`),
  ADD KEY `activity_notif_creator` (`activity_notif_creator`),
  ADD KEY `activity_notif_activity_id` (`activity_notif_activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_notif`
--
ALTER TABLE `activity_notif`
  MODIFY `activity_notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_notif`
--
ALTER TABLE `activity_notif`
  ADD CONSTRAINT `activity_notif_ibfk_1` FOREIGN KEY (`activity_notif_creator`) REFERENCES `user_info` (`user_name`),
  ADD CONSTRAINT `activity_notif_ibfk_2` FOREIGN KEY (`activity_notif_activity_id`) REFERENCES `activity_info` (`activity_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

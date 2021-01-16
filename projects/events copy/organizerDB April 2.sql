-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 02:53 PM
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
-- Table structure for table `activity_atst`
--

CREATE TABLE `activity_atst` (
  `activity_atst_id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activity_id` int(11) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity_atst`
--

INSERT INTO `activity_atst` (`activity_atst_id`, `user_name`, `activity_id`, `rol`) VALUES
(1, '410321166', 1, 1),
(2, 'first', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `activity_info`
--

CREATE TABLE `activity_info` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activity_host_depto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activity_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activity_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activity_info` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `activity_staff_limit` int(11) NOT NULL,
  `activity_staff_counter` int(11) NOT NULL,
  `activity_creator` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activity_place` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity_info`
--

INSERT INTO `activity_info` (`activity_id`, `activity_name`, `activity_host_depto`, `activity_created_date`, `activity_date`, `activity_info`, `activity_staff_limit`, `activity_staff_counter`, `activity_creator`, `activity_place`) VALUES
(1, 'First Activity', 'Department of life science', '2019-03-18 08:50:11', '0000-00-00 00:00:00', 'First Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info', 10, 0, 'first', 'Social and Humanities Building 3, room D888'),
(2, 'First Activity', 'Department of life science', '2019-03-18 08:51:50', '2019-03-27 03:30:00', 'First Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info', 10, 0, 'first', 'Social and Humanities Building 3, room R888'),
(3, 'Activity Example', 'Department of chemistry', '2019-03-30 07:34:06', '2019-04-09 10:00:00', 'Info Random de la actividad culera para la Universidad', 10, 0, 'first', 'Social and Humanities Building 3, Room D299');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `user_depto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `user_rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_name`, `user_email`, `user_depto`, `user_rol`) VALUES
('410321166', '410321166@gms.ndhu.edu.tw', 'Department of chemistry', 0),
('first', 'first@gms.ndhu.edu.tw', 'Department of chemistry', 1),
('fourth', '410321161@gms.ndhu.edu.tw', 'Department of Computer Science and Information Engineering', 0),
('second', 'second@gms.ndhu.edu.tw', 'Undergraduate program of Law', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_atst`
--
ALTER TABLE `activity_atst`
  ADD PRIMARY KEY (`activity_atst_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `activity_info`
--
ALTER TABLE `activity_info`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `activity_creator` (`activity_creator`);

--
-- Indexes for table `activity_notif`
--
ALTER TABLE `activity_notif`
  ADD PRIMARY KEY (`activity_notif_id`),
  ADD KEY `activity_notif_creator` (`activity_notif_creator`),
  ADD KEY `activity_notif_activity_id` (`activity_notif_activity_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_atst`
--
ALTER TABLE `activity_atst`
  MODIFY `activity_atst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activity_info`
--
ALTER TABLE `activity_info`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activity_notif`
--
ALTER TABLE `activity_notif`
  MODIFY `activity_notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_atst`
--
ALTER TABLE `activity_atst`
  ADD CONSTRAINT `activity_atst_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_info` (`user_name`),
  ADD CONSTRAINT `activity_atst_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity_info` (`activity_id`);

--
-- Constraints for table `activity_info`
--
ALTER TABLE `activity_info`
  ADD CONSTRAINT `activity_info_ibfk_1` FOREIGN KEY (`activity_creator`) REFERENCES `user_info` (`user_name`);

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

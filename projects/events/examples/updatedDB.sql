-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 04:35 PM
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
-- Database: `events`
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
  `activity_host_depto` int(11) NOT NULL,
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
(1, 'First Activity', 5, '2019-04-10 08:33:32', '0000-00-00 00:00:00', 'First Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info', 10, 0, 'first', 'Social and Humanities Building 3, room D888'),
(2, 'First Activity', 7, '2019-04-10 08:33:50', '2019-03-27 03:30:00', 'First Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info\r\nFirst Activity Info', 10, 0, 'first', 'Social and Humanities Building 3, room R888'),
(3, 'Activity Example', 23, '2019-04-10 08:33:57', '2019-04-09 10:00:00', 'Info Random de la actividad culera para la Universidad', 10, 0, 'first', 'Social and Humanities Building 3, Room D299'),
(4, 'one more activity', 23, '2019-04-10 08:34:05', '2019-04-17 10:00:00', 'Info Random de la actividad para la Universidad', 20, 0, 'first', 'Social and Humanities Building 3, Room C302');

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
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id_college` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id_college`, `name`) VALUES
(3, 'College of Science and Engineering'),
(4, 'College of Management'),
(5, 'College of Humanities and Social Sciences'),
(6, 'College of Indigenous Studies'),
(7, 'College of Marine Sciences'),
(8, 'Hua-Shih College of Education'),
(9, 'College of The Arts'),
(10, 'College of Environmental Studies'),
(11, 'Committe for General Educatiion');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id_department` int(11) NOT NULL,
  `name_department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_college` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id_department`, `name_department`, `id_college`) VALUES
(1, 'Department of applied mathematics', 3),
(2, 'Department of physics ', 3),
(3, 'Department of life science', 3),
(4, 'Department of chemistry', 3),
(5, 'Department of computer science and information engineering', 3),
(6, 'Department of materials science and engineering', 3),
(7, 'Department of electrical engineering', 3),
(8, 'Department of Opto-Electronic Engineering', 3),
(9, 'Department of Applied Science ', 3),
(10, 'Bacelor Program of Management Science and Finance(International Program)', 4),
(11, 'Executive Master Program of Business Administration', 4),
(12, 'Graduate Institute of Logistics Management', 4),
(13, 'Department of Business Administration', 4),
(14, 'Department of International Business', 4),
(15, 'Department of Accounting', 4),
(16, 'Department of Information Management', 4),
(17, 'Department of Finance', 4),
(18, 'Department of Tourism, Recreation and Leisure Studies', 4),
(19, 'Undergraduate program of Law', 5),
(20, 'Department of Conseling and Clinical Psychology', 5),
(21, 'Department of Sinophone Literatures', 5),
(22, 'Department of Chinese Language and Literature', 5),
(23, 'Department of English', 5),
(24, 'Department of Taiwan and Reional Studies', 5),
(25, 'Department of Sociology', 5),
(26, 'Institute of Financial and Economic Law', 5),
(27, 'Department of Public Administration', 5),
(28, 'Department of History', 5),
(29, 'Department of Economics', 5),
(30, 'Undergraduate Program of Indigenous Social Work', 6),
(31, 'Department of Ethnic Relations and Cultures', 6),
(32, 'Department of Indigenous Languages and Communication', 6),
(33, 'Department of Indigenous Affairs and Ethno-Development', 6),
(34, 'Graduate Institute of Marine Biology', 7),
(35, 'Department of Curriculum Design and Human Potentials ', 8),
(36, 'Department of Education Administration and Management', 8),
(37, 'Department of Special Education', 8),
(38, 'Department of Physical Education and Kinesiology', 8),
(39, 'Department of Early Childhood Eduation', 8),
(40, 'Affiliated Preschool', 8),
(41, 'Department of Music', 9),
(42, 'Department of Arts and Design', 9),
(43, 'Department of Arts and Creative Industries', 9),
(44, 'Master of Humanity and Environmental Science Program', 10),
(45, 'Department of Natural Resources and Environmental Studies\r\n', 10),
(46, 'General Education Center', 11),
(47, 'Arts Center', 11),
(48, 'Physical Education Center', 11),
(49, 'Language Center', 11),
(50, 'Chinese Language Center', 11);

-- --------------------------------------------------------

--
-- Table structure for table `recovery_keys`
--

CREATE TABLE `recovery_keys` (
  `userID` int(11) NOT NULL,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `user_depto` int(11) NOT NULL,
  `user_rol` int(2) NOT NULL,
  `pw` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `vkey` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `signup_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`name`, `user_name`, `user_email`, `user_depto`, `user_rol`, `pw`, `vkey`, `verified`, `signup_date`) VALUES
('Sofia', '410321161', '410321161@gms.ndhu.edu.tw', 17, 0, '202cb962ac59075b964b07152d234b', '62d3d68e868ffda19d9a5c744e9b73', 0, '0000-00-00 00:00:00'),
('', '410321166', '410321166@gms.ndhu.edu.tw', 17, 0, '', '', 0, '2019-04-08 18:26:21'),
('', 'first', 'first@gms.ndhu.edu.tw', 17, 1, '', '', 0, '2019-04-08 18:26:29'),
('', 'second', 'second@gms.ndhu.edu.tw', 40, 2, '', '', 0, '2019-04-08 18:26:43');

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
  ADD KEY `activity_creator` (`activity_creator`),
  ADD KEY `activity_host_depto` (`activity_host_depto`);

--
-- Indexes for table `activity_notif`
--
ALTER TABLE `activity_notif`
  ADD PRIMARY KEY (`activity_notif_id`),
  ADD KEY `activity_notif_creator` (`activity_notif_creator`),
  ADD KEY `activity_notif_activity_id` (`activity_notif_activity_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id_college`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id_department`),
  ADD KEY `id_college` (`id_college`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_name`),
  ADD KEY `user_depto` (`user_depto`);

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
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `activity_notif`
--
ALTER TABLE `activity_notif`
  MODIFY `activity_notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id_college` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

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
  ADD CONSTRAINT `activity_info_ibfk_1` FOREIGN KEY (`activity_creator`) REFERENCES `user_info` (`user_name`),
  ADD CONSTRAINT `activity_info_ibfk_2` FOREIGN KEY (`activity_host_depto`) REFERENCES `departments` (`id_department`);

--
-- Constraints for table `activity_notif`
--
ALTER TABLE `activity_notif`
  ADD CONSTRAINT `activity_notif_ibfk_1` FOREIGN KEY (`activity_notif_creator`) REFERENCES `user_info` (`user_name`),
  ADD CONSTRAINT `activity_notif_ibfk_2` FOREIGN KEY (`activity_notif_activity_id`) REFERENCES `activity_info` (`activity_id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`id_college`) REFERENCES `colleges` (`id_college`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_depto`) REFERENCES `departments` (`id_department`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

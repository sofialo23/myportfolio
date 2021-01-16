-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 03:41 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`codeandwine`@`localhost` PROCEDURE `InsertGetActivity` (IN `activityName` VARCHAR(100), IN `hostDepto` INT(11), IN `dateAc` TIMESTAMP, IN `info` VARCHAR(250), IN `staffLimit` INT(11), IN `staffCounter` INT(11), IN `creator` VARCHAR(50), IN `place` VARCHAR(100))  BEGIN
Insert into activity_info (activity_name,activity_host_depto, activity_date, activity_info , activity_staff_limit, activity_staff_counter, activity_creator, activity_place) VALUES (activityName,hostDepto, dateAc, info, staffLimit, staffCounter, creator, place);
    
    select LAST_INSERT_ID() AS 'outId';
    
    END$$

DELIMITER ;

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
(2, 'first', 2, 0),
(18, '410321166', 5, 0),
(19, '410321166', 10, 1),
(20, '410321166', 1, 0),
(21, '410321166', 2, 1),
(22, '410321166', 3, 1),
(23, '410321166', 4, 0),
(29, '410321166', 6, 0),
(30, '410321166', 8, 1),
(31, '410321166', 9, 0),
(34, '410321166', 12, 1),
(35, '410321166', 11, 0),
(37, '410321166', 14, 0),
(39, '410321166', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `activity_category`
--

CREATE TABLE `activity_category` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity_category`
--

INSERT INTO `activity_category` (`id`, `activity_id`, `category_id`) VALUES
(29, 19, 1),
(30, 19, 2),
(21, 17, 3),
(31, 19, 3),
(22, 17, 4),
(32, 19, 4),
(23, 17, 5),
(24, 17, 6),
(25, 18, 6),
(26, 18, 7),
(27, 18, 8),
(28, 18, 9);

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
(1, 'First Activity', 5, '2019-05-07 09:21:28', '0000-00-00 00:00:00', 'Info Activity 1', 10, 1, 'first', 'Social and Humanities Building 3, room D888'),
(2, 'Second Activity', 7, '2019-05-07 11:58:19', '2019-03-27 03:30:00', 'Info Activity 2', 10, 0, '410321166', 'Social and Humanities Building 3, room R888'),
(3, 'Third Activity', 17, '2019-05-07 09:21:41', '2019-04-12 10:00:00', 'Info Activity 3', 10, 9, 'first', 'Social and Humanities Building 3, Room D299'),
(4, 'Fourth Activity', 23, '2019-05-07 09:21:46', '2019-04-17 10:00:00', 'Info Activity 4', 20, 0, 'first', 'Social and Humanities Building 3, Room C302'),
(5, 'Fifth Activity', 4, '2019-05-07 09:23:40', '2019-04-19 08:25:00', 'Info Activity 5', 33, 0, 'first', 'Place 5'),
(6, 'Sixth Activity', 9, '2019-05-07 09:24:52', '2019-04-24 22:30:00', 'Info Activity 6', 0, 0, '410321166', 'Place 6'),
(7, 'Seventh Activity', 6, '2019-05-07 09:24:59', '2019-04-29 22:30:00', 'Info Activity 7', 0, 0, '410321166', 'Place 7'),
(8, 'Eight Activity', 4, '2019-05-07 09:23:49', '2019-04-23 21:25:00', 'Info Activity 8', 0, 0, '410321166', 'Social and Humanities Building 3, Room D299'),
(9, 'Ninth Activity', 10, '2019-05-07 09:25:06', '2019-04-25 10:30:00', 'Info Activity 9', 0, 0, '410321166', 'Place 9'),
(10, 'Tenth Activity', 8, '2019-05-07 09:25:13', '2019-04-26 10:30:00', 'Info Activity 10', 0, 0, '410321166', 'Place 10'),
(11, 'Eleventh Activity', 5, '2019-05-07 09:25:20', '2019-04-26 12:40:00', 'Info Activity 11', 0, 0, '410321166', 'Place 11'),
(12, 'Twelve Activity', 2, '2019-05-07 09:25:27', '2019-04-28 19:30:00', 'Info Activity 12', 0, 0, '410321166', 'Place 12'),
(13, 'Thirteenth Activity', 5, '2019-05-07 09:25:31', '2019-06-18 10:30:00', 'Info Activity 13', 0, 0, '410321166', 'Place 13'),
(14, 'Fourteenth activity', 2, '2019-05-07 09:25:35', '2019-06-18 10:30:00', 'Info Activity 14', 0, 0, '410430002', 'Place 14'),
(15, 'Fifteenth Activity', 2, '2019-05-07 09:25:41', '2019-06-18 10:30:00', 'Info Activity 15', 0, 2, '410321166', 'Place 15'),
(16, 'Sixteenth Activity', 10, '2019-05-07 09:25:45', '2019-04-20 10:30:00', 'Info Activity 16', 85, 0, '410321166', 'Place 16'),
(17, 'Seventeenth Activity', 2, '2019-05-07 09:25:53', '2019-04-30 09:25:00', 'Info Activity 17', 56, 1, '410321166', 'Place 17'),
(18, 'Example Activity 18', 4, '2019-05-30 19:01:45', '2019-05-30 22:25:00', 'Description for Example Activity 18', 20, 0, '410321166', 'Social and Humanities Building 3, Room C302'),
(19, 'Activity Family Andres', 8, '2019-05-29 18:06:03', '2019-05-31 08:20:00', 'asdfasdfasdf', 0, 0, '410321166', 'Guatemala city, Marriot Hotel'),
(47, 'Programming workshop', 5, '2019-05-30 19:05:06', '2019-06-14 06:00:00', 'Join us to improve your Programming skills', 0, 0, '410321161', 'Engineering Building II B337');

-- --------------------------------------------------------

--
-- Table structure for table `activity_notif`
--

CREATE TABLE `activity_notif` (
  `activity_notif_id` int(11) NOT NULL,
  `activity_notif_creator` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activity_notif_msg` varchar(720) COLLATE utf8_unicode_ci NOT NULL,
  `activity_notif_activity_id` int(11) NOT NULL,
  `activity_notif_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activity_notif`
--

INSERT INTO `activity_notif` (`activity_notif_id`, `activity_notif_creator`, `activity_notif_msg`, `activity_notif_activity_id`, `activity_notif_date_created`) VALUES
(1, 'first', 'Announcement No 1', 1, '2019-05-08 17:45:15'),
(2, 'first', 'Announcement No. 2', 1, '2019-05-08 17:45:27'),
(3, 'first', 'Announcement No. 3', 3, '2019-05-08 17:45:33'),
(4, 'first', 'Announcement No. 4', 3, '2019-05-08 17:45:42'),
(5, 'first', 'Announcement No. 5', 5, '2019-05-08 17:45:48'),
(6, 'first', 'Announcement No. 6', 4, '2019-05-08 17:46:17'),
(7, 'first', 'Announcement No. 7', 4, '2019-05-08 17:46:22'),
(8, 'first', 'Announcement No. 8', 5, '2019-05-08 17:46:28'),
(9, 'first', 'Announcement No. 9', 5, '2019-05-08 17:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(3) NOT NULL,
  `name_category` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(1, 'Sports'),
(2, 'Recreation'),
(3, 'Art'),
(4, 'Music'),
(5, 'Performing Arts'),
(6, 'Politics'),
(7, 'Speech'),
(8, 'Social Studies'),
(9, 'Volunteering'),
(10, 'Activism'),
(11, 'Extracurricular Activities'),
(12, 'Biology'),
(13, 'Chemistry'),
(14, 'Economics'),
(15, 'Electronics'),
(16, 'Engineering'),
(17, 'Languages'),
(18, 'English'),
(19, 'Education'),
(20, 'History'),
(21, 'Science'),
(22, 'Literary'),
(23, 'Math'),
(24, 'Physics'),
(25, 'Robotics'),
(26, 'Web Design'),
(27, 'Coding'),
(28, 'Software'),
(29, 'Writing'),
(30, 'Tech'),
(31, 'Animation'),
(32, 'Graphic Design'),
(33, 'Photography'),
(34, 'Video Game'),
(35, 'Video'),
(36, 'Chinese'),
(37, 'French'),
(38, 'Food'),
(39, 'International'),
(40, 'Latin'),
(41, 'Europe'),
(42, 'America'),
(43, 'Spanish'),
(44, 'Knowledge'),
(45, 'Community'),
(46, 'Radio'),
(47, 'Television'),
(48, 'Web Site'),
(49, 'Jazz'),
(50, 'Music Band'),
(51, 'Orchestra'),
(52, 'Film'),
(53, 'Theater'),
(54, 'Religion'),
(55, 'Health'),
(56, 'Chess'),
(57, 'Board Games'),
(58, 'Guitar'),
(59, 'Debate'),
(60, 'Basketball'),
(61, 'Baseball'),
(62, 'Hiking'),
(63, 'Martial Arts'),
(64, 'Social Media'),
(65, 'Church'),
(66, 'Animal Rescue'),
(67, 'Culture'),
(68, 'Indoor Activity'),
(69, 'Outdoor Activity'),
(70, 'Climbing'),
(71, 'Nature'),
(72, 'Photography'),
(73, 'Electrical Engineering'),
(74, 'Applied Science'),
(75, 'Teaching'),
(76, 'Finance'),
(77, 'Business'),
(78, 'Psychology'),
(79, 'Information'),
(80, 'Management'),
(81, 'Logistics'),
(82, 'Literature'),
(83, 'Sociology'),
(84, 'Law'),
(85, 'Accounting'),
(86, 'Material Science'),
(87, 'Natural Resources');

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
(24, 'Department of Taiwan and Regional Studies', 5),
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
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activity_id` int(11) NOT NULL,
  `content` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `checked` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user1`, `user2`, `date`, `activity_id`, `content`, `checked`) VALUES
(1, '410430002', '410321166', '2019-04-29 12:37:15', 3, 'First Message', 0),
(2, '410430002', '410321166', '2019-04-29 12:40:29', 10, 'Activity 5 Message 1', 0),
(3, '410430002', '410321166', '2019-04-29 12:40:29', 3, 'Activity Example Update 1 Staff Message 1', 0),
(4, '410430002', '410321166', '2019-04-29 12:40:29', 2, 'First Activity Staff Message 1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recovery_keys`
--

CREATE TABLE `recovery_keys` (
  `userID` int(11) NOT NULL,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recovery_keys`
--

INSERT INTO `recovery_keys` (`userID`, `token`, `valid`) VALUES
(410321166, '38a94f70454d6aaa2b543301c1b2611f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` longblob NOT NULL,
  `act_id` int(11) NOT NULL
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
  `pw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vkey` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `signup_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`name`, `user_name`, `user_email`, `user_depto`, `user_rol`, `pw`, `vkey`, `verified`, `signup_date`) VALUES
('Sofia', '410321161', '410321161@gms.ndhu.edu.tw', 5, 1, '202cb962ac59075b964b07152d234b70', 'aa62aa6025e84ec69fb2b2bd9f8b90a6', 1, '2019-05-30 19:03:35'),
('Andres', '410321166', '410321166@gms.ndhu.edu.tw', 5, 1, '4734292867042ce845ab65165a4fb9f8', '41fb09ea0a0427d14a52254a89792486', 1, '2019-05-29 11:40:43'),
('Elaine', '410430002', '410430002@gms.ndhu.edu.tw', 31, 1, 'v698d51a19d8a121ce581499d7b701668', '02b174b7332419335c3e5ea609952c49', 0, '2019-04-28 10:00:37'),
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
  ADD UNIQUE KEY `user_name_2` (`user_name`,`activity_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `activity_category`
--
ALTER TABLE `activity_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pair_values` (`category_id`,`activity_id`),
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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_fk` (`user1`),
  ADD KEY `users_fk2` (`user2`),
  ADD KEY `idactivity_FK` (`activity_id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `act_id` (`act_id`);

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
  MODIFY `activity_atst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `activity_category`
--
ALTER TABLE `activity_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `activity_info`
--
ALTER TABLE `activity_info`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `activity_notif`
--
ALTER TABLE `activity_notif`
  MODIFY `activity_notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Constraints for table `activity_category`
--
ALTER TABLE `activity_category`
  ADD CONSTRAINT `activity_category_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity_info` (`activity_id`),
  ADD CONSTRAINT `activity_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id_category`);

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
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `idactivity_FK` FOREIGN KEY (`activity_id`) REFERENCES `activity_info` (`activity_id`),
  ADD CONSTRAINT `users_fk` FOREIGN KEY (`user1`) REFERENCES `user_info` (`user_name`),
  ADD CONSTRAINT `users_fk2` FOREIGN KEY (`user2`) REFERENCES `user_info` (`user_name`);

--
-- Constraints for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD CONSTRAINT `tbl_images_ibfk_1` FOREIGN KEY (`act_id`) REFERENCES `activity_info` (`activity_id`);

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_depto`) REFERENCES `departments` (`id_department`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

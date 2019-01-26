-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2019 at 03:36 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queue_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `system_tables`
--

CREATE TABLE `system_tables` (
  `table_id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `capacity` int(10) NOT NULL,
  `number` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_tables`
--

INSERT INTO `system_tables` (`table_id`, `name`, `capacity`, `number`, `status`, `regDate`) VALUES
(1, 'Karisimbi', 20, '2089', 'AVAILABLE', '2019-01-25 07:36:49'),
(2, 'Muhabura', 20, '1209', 'AVAILABLE', '2019-01-25 07:37:46'),
(3, 'Kiyovu', 20, '2084', 'AVAILABLE', '2019-01-25 07:38:02'),
(4, 'Musanze', 20, '1900', 'AVAILABLE', '2019-01-25 07:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `user_id` int(100) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `password` varchar(255) NOT NULL,
  `names` varchar(1024) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `user_type` int(2) NOT NULL,
  `verified` int(2) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `isOnline` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`user_id`, `email`, `password`, `names`, `phone`, `gender`, `user_type`, `verified`, `verification_code`, `status`, `isOnline`, `regDate`) VALUES
(1, 'sam@gmail.com', 'samuels', 'Jackson DUSHIMIMANA', '0987654321', 'M', 1, 1, '123456', 'ACTIVE', '0', '2018-08-26 07:13:35'),
(2, 'dsdsd@gmail.com', 'samuels', 'dsdsd', '222222222222', '', 0, 0, '', 'ACTIVE', '', '2018-09-03 10:07:35'),
(3, 'dsdsd@gmail.com', 'samuels', 'dsdsd', '222222222222', '', 1, 0, '', 'ACTIVE', '', '2018-09-03 10:07:56'),
(4, 'dsdsd@gmail.com', 'samuels', 'dsdsd', '222222222222', '', 2, 0, '', 'ACTIVE', '', '2018-09-03 10:08:11'),
(5, 'dsdsd@gmail.com', 'samuels', 'dsdsd', '333333333333333', '', 1, 0, '', 'ACTIVE', '', '2018-09-03 10:12:58'),
(6, 'elisa@gmail.com', '123456', 'elisa pro', '078898765', '', 2, 0, '', 'ACTIVE', '', '2018-09-03 11:19:00'),
(7, 'redbluejd@redbluejd.com', 'chief editor', 'Jackson REDBLUEJD', '07854213689', '', 2, 0, '', 'ACTIVE', '', '2018-11-11 08:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `slot_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `time_range` datetime(6) NOT NULL,
  `end_time` datetime(6) NOT NULL,
  `status` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`slot_id`, `name`, `time_range`, `end_time`, `status`, `regDate`) VALUES
(1, 'AM', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'TAKEN', '2019-01-25 12:08:16'),
(2, 'AM', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'TAKEN', '2019-01-25 12:09:14'),
(3, 'AM', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'TAKEN', '2019-01-25 12:09:14'),
(4, 'AM', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'ACTIVE', '2019-01-25 12:09:14'),
(5, 'AM', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'ACTIVE', '2019-01-25 12:09:14'),
(6, 'AM', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'ACTIVE', '2019-01-25 12:09:14'),
(7, 'AM', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 'ACTIVE', '2019-01-25 12:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `training_id` int(11) NOT NULL,
  `names` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `station` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_file`
--

CREATE TABLE `uploaded_file` (
  `file_id` int(100) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `training_id` int(100) NOT NULL,
  `trainee_names` varchar(1024) NOT NULL,
  `trainee_number` varchar(50) NOT NULL,
  `train_date` varchar(200) NOT NULL,
  `train_time` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `savedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded_file`
--

INSERT INTO `uploaded_file` (`file_id`, `slot_id`, `training_id`, `trainee_names`, `trainee_number`, `train_date`, `train_time`, `status`, `savedDate`) VALUES
(3, 3, 1234, 'Sugira samuel', '140', '12/10/2019', '10:00', 'APPROVED', '2019-01-25 11:33:30'),
(4, 4, 1234, 'Sugira samuel', '123', '12/10/2019', '10:00', 'APPROVED', '2019-01-25 11:34:39'),
(5, 4, 1234, 'Sugira samuel', '130', '12/10/2019', '10:00', 'APPROVED', '2019-01-25 11:36:49'),
(6, 4, 1234, 'Sugira samuel', '124', '12/11/2019', '11:00', 'APPROVED', '2019-01-25 11:36:49'),
(7, 0, 1234, 'Sugira samuel', '125', '12/12/2019', '12:00', 'UNAPPROVED', '2019-01-25 11:36:49'),
(8, 0, 1234, 'Sugira samuel', '126', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-25 11:36:49'),
(9, 0, 1234, 'Sugira samuel', '127', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-25 11:36:49'),
(10, 0, 1234, 'Sugira samuel', '128', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-25 11:36:49'),
(11, 0, 1234, 'Sugira samuel', '129', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-25 11:36:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `system_tables`
--
ALTER TABLE `system_tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  ADD PRIMARY KEY (`file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `system_tables`
--
ALTER TABLE `system_tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  MODIFY `file_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

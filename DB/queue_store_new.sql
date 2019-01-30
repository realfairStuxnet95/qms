-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 07:48 PM
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
-- Table structure for table `display_test`
--

CREATE TABLE `display_test` (
  `id` int(100) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display_test`
--

INSERT INTO `display_test` (`id`, `start_time`, `end_time`, `status`, `regDate`) VALUES
(1, '19:21', '18:21', 'DELETED', '2019-01-30 16:16:22'),
(2, '20:18', '20:30', 'DELETED', '2019-01-30 16:17:47'),
(3, '20:7', '20:8', 'DELETED', '2019-01-30 16:17:47'),
(4, '19:24', '18:33', 'DELETED', '2019-01-30 16:17:47'),
(5, '18:34', '18:36', 'DELETED', '2019-01-30 16:17:47'),
(6, '18:37', '18:38', 'DELETED', '2019-01-30 16:17:47'),
(7, '18:39', '18:42', 'DELETED', '2019-01-30 16:17:47'),
(8, '20:22', '21:01', 'DELETED', '2019-01-30 18:31:42'),
(9, '20:32', '21:0', 'ACTIVE', '2019-01-30 18:32:13');

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
(1, 'Karisimbi', 20, '2089', 'DELETED', '2019-01-25 07:36:49'),
(2, 'Muhabura', 20, '1209', 'DELETED', '2019-01-25 07:37:46'),
(3, 'Kiyovu', 20, '2084', 'TAKEN', '2019-01-25 07:38:02'),
(4, 'Musanze', 20, '1900', 'TAKEN', '2019-01-25 07:38:02'),
(5, 'ssssss', 23, '', 'TAKEN', '2019-01-26 14:40:12'),
(6, '1234', 10, '', 'TAKEN', '2019-01-27 22:43:10'),
(7, '98989', 10, '', 'TAKEN', '2019-01-28 21:59:37'),
(8, '9876', 10, '', 'TAKEN', '2019-01-28 21:59:51'),
(9, '12334', 10, '', 'TAKEN', '2019-01-30 14:34:36');

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
  `time_range` varchar(100) NOT NULL,
  `end_time` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`slot_id`, `name`, `time_range`, `end_time`, `status`, `regDate`) VALUES
(10, 'Today TimeSlot', '1548686940', '1548690840', 'AVAILABLE', '2019-01-28 12:51:56'),
(11, 'Today TimeSlot', '1548666000', '1548673200', 'AVAILABLE', '2019-01-28 21:56:49'),
(12, 'Today TimeSlot', '1548676800', '1548684000', 'AVAILABLE', '2019-01-28 21:57:25'),
(13, 'Today TimeSlot', '1548687600', '1548694800', 'AVAILABLE', '2019-01-28 21:57:58');

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
  `table_id` int(100) NOT NULL,
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

INSERT INTO `uploaded_file` (`file_id`, `slot_id`, `table_id`, `training_id`, `trainee_names`, `trainee_number`, `train_date`, `train_time`, `status`, `savedDate`) VALUES
(3, 9, 0, 1234, 'Sugira samuel', '140', '12/10/2019', '10:00', 'APPROVED', '2019-01-25 11:33:30'),
(4, 9, 8, 1234, 'Sugira samuel', '123', '12/10/2019', '10:00', 'APPROVED', '2019-01-25 11:34:39'),
(5, 9, 0, 1234, 'Sugira samuel', '130', '12/10/2019', '10:00', 'APPROVED', '2019-01-25 11:36:49'),
(6, 9, 0, 1234, 'Sugira samuel', '124', '12/11/2019', '11:00', 'APPROVED', '2019-01-25 11:36:49'),
(7, 9, 0, 1234, 'Sugira samuel', '125', '12/12/2019', '12:00', 'APPROVED', '2019-01-25 11:36:49'),
(8, 9, 4, 1234, 'Sugira samuel', '126', '12/13/2019', '13:00', 'APPROVED', '2019-01-25 11:36:49'),
(9, 9, 5, 1234, 'Sugira samuel', '127', '12/14/2019', '14:00', 'APPROVED', '2019-01-25 11:36:49'),
(10, 9, 6, 1234, 'Sugira samuel', '128', '12/15/2019', '15:00', 'APPROVED', '2019-01-25 11:36:49'),
(11, 9, 7, 1234, 'Sugira samuel', '129', '12/16/2019', '16:00', 'APPROVED', '2019-01-25 11:36:49'),
(12, 0, 0, 1234, 'Morris Kay', '6878', 'Date', 'Time', 'APPROVED', '2019-01-28 22:40:26'),
(14, 9, 0, 1234, 'Sugira samuel Mushya', '1242222', '12/11/2019', '11:00', 'APPROVED', '2019-01-28 22:40:26'),
(15, 9, 0, 1234, 'Sugira samuel', '125', '12/12/2019', '12:00', 'APPROVED', '2019-01-28 22:40:26'),
(16, 9, 0, 1234, 'Sugira samuel', '126', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-28 22:40:26'),
(17, 9, 0, 1234, 'Sugira samuel', '127', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-28 22:40:26'),
(18, 9, 0, 1234, 'Sugira samuel', '128', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-28 22:40:26'),
(19, 9, 0, 1234, 'Sugira samuel', '129', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-28 22:40:26'),
(20, 9, 0, 1234, 'Igihozo Yankee', '3456', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(21, 9, 0, 1234, 'Murenzi Gustave', '6565', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(22, 9, 9, 1234, 'Bizimana Fred', '9674', '12/12/2019', '12:00', 'APPROVED', '2019-01-30 10:28:00'),
(23, 9, 0, 1234, 'Kamanzi enock', '12783', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(24, 8, 0, 1234, 'Mutesi Hellen', '15892', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(25, 8, 0, 1234, 'Kalirwanda Sammy', '19001', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(26, 8, 0, 1234, 'Mugisha Emma', '22110', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(27, 0, 0, 1234, 'Eric Gakwaya Mushya', '2937', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(28, 8, 0, 1234, 'Sam', '11323', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(29, 8, 0, 1234, 'Igihozo Yankee', '15832.94444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(30, 8, 0, 1234, 'Murenzi Gustave', '16694.17778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(31, 8, 0, 1234, 'Bizimana Fred', '17555.41111', '12/12/2019', '12:00', 'APPROVED', '2019-01-30 10:28:00'),
(32, 0, 0, 1234, 'Kamanzi enock', '18416.64444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(33, 0, 0, 1234, 'Mutesi Hellen', '19277.87778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(34, 0, 0, 1234, 'Kalirwanda Sammy', '20139.11111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(35, 0, 0, 1234, 'Mugisha Emma', '21000.34444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(36, 0, 0, 1234, 'Eric Gakwaya', '21861.57778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(37, 0, 0, 1234, 'Sam', '22722.81111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(38, 0, 0, 1234, 'Igihozo Yankee', '23584.04444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(39, 0, 0, 1234, 'Murenzi Gustave', '24445.27778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(40, 11, 0, 1234, 'Bizimana Fred', '25306.51111', '12/12/2019', '12:00', 'APPROVED', '2019-01-30 10:28:00'),
(41, 0, 0, 1234, 'Kamanzi enock', '26167.74444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(42, 0, 0, 1234, 'Mutesi Hellen', '27028.97778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(43, 0, 0, 1234, 'Kalirwanda Sammy', '27890.21111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(44, 0, 0, 1234, 'Mugisha Emma', '28751.44444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(45, 0, 0, 1234, 'Eric Gakwaya', '29612.67778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(46, 0, 0, 1234, 'Sam', '30473.91111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(47, 0, 0, 1234, 'Igihozo Yankee', '31335.14444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(48, 0, 0, 1234, 'Murenzi Gustave', '32196.37778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(49, 0, 0, 1234, 'Bizimana Fred', '33057.61111', '12/12/2019', '12:00', 'APPROVED', '2019-01-30 10:28:00'),
(50, 0, 0, 1234, 'Kamanzi enock', '33918.84444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(51, 0, 0, 1234, 'Mutesi Hellen', '34780.07778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(52, 0, 0, 1234, 'Kalirwanda Sammy', '35641.31111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(53, 0, 0, 1234, 'Mugisha Emma', '36502.54444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(54, 0, 0, 1234, 'Eric Gakwaya', '37363.77778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(55, 0, 0, 1234, 'Sam', '38225.01111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(56, 0, 0, 1234, 'Igihozo Yankee', '39086.24444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(57, 0, 0, 1234, 'Murenzi Gustave', '39947.47778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(58, 0, 0, 1234, 'Bizimana Fred', '40808.71111', '12/12/2019', '12:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(59, 0, 0, 1234, 'Kamanzi enock', '41669.94444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(60, 0, 0, 1234, 'Mutesi Hellen', '42531.17778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(61, 0, 0, 1234, 'Kalirwanda Sammy', '43392.41111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(62, 0, 0, 1234, 'Mugisha Emma', '44253.64444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(63, 0, 0, 1234, 'Eric Gakwaya', '45114.87778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(64, 0, 0, 1234, 'Sam', '45976.11111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(65, 0, 0, 1234, 'Igihozo Yankee', '46837.34444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(66, 0, 0, 1234, 'Murenzi Gustave', '47698.57778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(67, 0, 0, 1234, 'Bizimana Fred', '48559.81111', '12/12/2019', '12:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(68, 0, 0, 1234, 'Kamanzi enock', '49421.04444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(69, 0, 0, 1234, 'Mutesi Hellen', '50282.27778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(70, 0, 0, 1234, 'Kalirwanda Sammy', '51143.51111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(71, 0, 0, 1234, 'Mugisha Emma', '52004.74444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(72, 0, 0, 1234, 'Eric Gakwaya', '52865.97778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(73, 0, 0, 1234, 'Sam', '53727.21111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(74, 0, 0, 1234, 'Igihozo Yankee', '54588.44444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(75, 0, 0, 1234, 'Murenzi Gustave', '55449.67778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(76, 0, 0, 1234, 'Bizimana Fred', '56310.91111', '12/12/2019', '12:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(77, 0, 0, 1234, 'Kamanzi enock', '57172.14444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(78, 0, 0, 1234, 'Mutesi Hellen', '58033.37778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(79, 0, 0, 1234, 'Kalirwanda Sammy', '58894.61111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(80, 0, 0, 1234, 'Mugisha Emma', '59755.84444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(81, 0, 0, 1234, 'Eric Gakwaya', '60617.07778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(82, 0, 0, 1234, 'Sam', '61478.31111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(83, 0, 0, 1234, 'Igihozo Yankee', '62339.54444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(84, 0, 0, 1234, 'Murenzi Gustave', '63200.77778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(85, 0, 0, 1234, 'Bizimana Fred', '64062.01111', '12/12/2019', '12:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(86, 0, 0, 1234, 'Kamanzi enock', '64923.24444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(87, 0, 0, 1234, 'Mutesi Hellen', '65784.47778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(88, 0, 0, 1234, 'Kalirwanda Sammy', '66645.71111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(89, 0, 0, 1234, 'Mugisha Emma', '67506.94444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(90, 0, 0, 1234, 'Eric Gakwaya', '68368.17778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(91, 0, 0, 1234, 'Sam', '69229.41111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(92, 0, 0, 1234, 'Igihozo Yankee', '70090.64444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(93, 0, 0, 1234, 'Murenzi Gustave', '70951.87778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(94, 0, 0, 1234, 'Bizimana Fred', '71813.11111', '12/12/2019', '12:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(95, 0, 0, 1234, 'Kamanzi enock', '72674.34444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(96, 0, 0, 1234, 'Mutesi Hellen', '73535.57778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(97, 0, 0, 1234, 'Kalirwanda Sammy', '74396.81111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(98, 0, 0, 1234, 'Mugisha Emma', '75258.04444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(99, 0, 0, 1234, 'Eric Gakwaya', '76119.27778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(100, 0, 0, 1234, 'Sam', '76980.51111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(101, 0, 0, 1234, 'Igihozo Yankee', '77841.74444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(102, 0, 0, 1234, 'Murenzi Gustave', '78702.97778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(103, 0, 0, 1234, 'Bizimana Fred', '79564.21111', '12/12/2019', '12:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(104, 0, 0, 1234, 'Kamanzi enock', '80425.44444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(105, 0, 0, 1234, 'Mutesi Hellen', '81286.67778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(106, 0, 0, 1234, 'Kalirwanda Sammy', '82147.91111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(107, 0, 0, 1234, 'Mugisha Emma', '83009.14444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(108, 0, 0, 1234, 'Eric Gakwaya', '83870.37778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(109, 0, 0, 1234, 'Sam', '84731.61111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(110, 0, 0, 1234, 'Igihozo Yankee', '85592.84444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(111, 0, 0, 1234, 'Murenzi Gustave', '86454.07778', '12/11/2019', '11:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(112, 0, 0, 1234, 'Bizimana Fred', '87315.31111', '12/12/2019', '12:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(113, 0, 0, 1234, 'Kamanzi enock', '88176.54444', '12/13/2019', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(114, 0, 0, 1234, 'Mutesi Hellen', '89037.77778', '12/14/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(115, 0, 0, 1234, 'Kalirwanda Sammy', '89899.01111', '12/15/2019', '15:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(116, 0, 0, 1234, 'Mugisha Emma', '90760.24444', '12/16/2019', '16:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(117, 0, 0, 1234, 'Eric Gakwaya', '91621.47778', '12/12/2019', '14:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(118, 0, 0, 1234, 'Sam', '92482.71111', '6/29/1988', '13:00', 'UNAPPROVED', '2019-01-30 10:28:00'),
(119, 0, 0, 1234, 'Igihozo Yankee', '93343.94444', '12/10/2019', '10:00', 'UNAPPROVED', '2019-01-30 10:28:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `display_test`
--
ALTER TABLE `display_test`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `display_test`
--
ALTER TABLE `display_test`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `system_tables`
--
ALTER TABLE `system_tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  MODIFY `file_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

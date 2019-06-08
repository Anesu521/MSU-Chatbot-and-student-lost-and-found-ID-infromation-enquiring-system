-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 09:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `security_question` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_name`, `password`, `name`, `security_question`, `answer`) VALUES
('a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `admin_posts`
--

CREATE TABLE `admin_posts` (
  `id` int(5) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `message_image` varchar(500) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `program` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_posts`
--

INSERT INTO `admin_posts` (`id`, `subject`, `message`, `message_image`, `date`, `program`) VALUES
(8, 'level 2.2 and 4.2 date line for submission of dissertation', 'The date line for submission of deserations for level 2.2s and 4.2s is 16th of May . Please submit your work.', 'a6a24999178914431af5a33d6a479ef6', '2019-05-17 11:17:35.284703', 'information systems'),
(9, 'hello', 'there is going to be working related orientation for all level 2.2 in marketing department', '', '2019-05-23 05:08:39.148503', 'marketing'),
(10, 'code', 'hie, all we need are you details', '', '2019-05-23 14:56:51.521653', 'marketing'),
(11, 'days to defend', 'all level 2.2s are going to defend  from 21 to 24 may 2019', '', '2019-05-23 15:49:13.910003', 'information systems');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(6) NOT NULL,
  `sender_regnum` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `reg_num` varchar(12) NOT NULL,
  `password` varchar(40) NOT NULL,
  `count` int(12) NOT NULL,
  `date_time_login` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`reg_num`, `password`, `count`, `date_time_login`) VALUES
('r1710091q', 'user', 10, '2019-05-24 11:38:24.000000'),
('r1710092q', 'user', 14, '2019-05-24 11:34:29.000000');

-- --------------------------------------------------------

--
-- Table structure for table `lost_ids`
--

CREATE TABLE `lost_ids` (
  `reg_num` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_to_call` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost_ids`
--

INSERT INTO `lost_ids` (`reg_num`, `name`, `phone_to_call`, `date`) VALUES
('r1710091q', 'anesu phiri', 779278524, '2019-05-12 20:16:00'),
('r1710092q', 'chipo manhimanzi', 789654765, '2019-05-12 17:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `notice` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `reg_num` varchar(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `program` varchar(30) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `phone_number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`reg_num`, `name`, `program`, `email_address`, `phone_number`) VALUES
('', 'iiyvf', '', '', 0),
('r1710091q', 'anesu phiri', 'information systems', 'sehphirry@gmail.com', 779278524),
('r1710092q', 'chipo manhimanzi', 'marketing', 'anesu@post.com', 789654765);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `admin_posts`
--
ALTER TABLE `admin_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`reg_num`);

--
-- Indexes for table `lost_ids`
--
ALTER TABLE `lost_ids`
  ADD PRIMARY KEY (`reg_num`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`reg_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_posts`
--
ALTER TABLE `admin_posts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

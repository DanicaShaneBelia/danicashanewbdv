-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 12:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sd208`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `ootd` varchar(255) NOT NULL,
  `remarks` enum('ongoing','done','cancelled') NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `name`, `date`, `time`, `location`, `ootd`, `remarks`) VALUES
(3, 0, 'cilo', '2023-10-03', '19:46:00', 'talamban', 'casual', 'ongoing'),
(4, 0, 'marvin te', '2023-10-07', '00:03:00', 'usctc dfdsfd', 'uniform fdfdg', 'ongoing'),
(5, 0, 'marian adonay', '2023-10-07', '00:05:00', 'usctcfdfgdg', 'halfuniformfgfdgfhf', 'done'),
(6, 0, 'sads', '2023-10-05', '14:20:00', 'dsds', 'sdsd', 'ongoing'),
(7, 0, 'sds', '2023-10-05', '14:21:00', 'dsds', 'dsds', 'ongoing'),
(8, 0, 'asd', '2023-10-05', '14:25:00', 'dsdd', 'dssd', 'ongoing'),
(9, 0, 'asd', '2023-10-05', '14:25:00', 'dsdd', 'dssd', 'ongoing'),
(10, 0, 'bata', '0212-12-12', '15:45:00', 'huiggyg', 'anvut', 'done'),
(11, 0, 'cilo', '2023-10-05', '14:27:00', '4141535', '4534545', 'ongoing'),
(12, 0, 'sads', '2023-10-05', '14:30:00', 'dsds', 'halfuniform', 'ongoing'),
(13, 0, 'sads', '2023-10-05', '14:30:00', 'dsds', 'halfuniform', 'ongoing'),
(24, 0, 'dfdf', '2023-10-21', '03:02:00', 'dfd', 'fdfd', 'ongoing'),
(30, 11, 'magbarog', '2023-10-13', '23:37:00', 'talamban', 'Puti', 'ongoing'),
(32, 11, 'Sleep', '2023-10-09', '00:14:00', 'Lapu-Lapu City', 'Green Shirt', 'ongoing'),
(35, 11, 'Magtihaya', '2023-10-04', '12:39:00', 'Gaisano Grand Mall Beach', 'Naked', 'ongoing'),
(36, 12, 'james', '2023-10-24', '12:41:00', 'talamban', 'white', 'ongoing'),
(41, 4, 'Matulog', '2023-10-04', '23:56:00', 'Iskina', 'ambot', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`) VALUES
(22, 'asdasd', 'sadasd'),
(23, 'Prepare', 'Ambot'),
(24, 'asdsa', 'dsads'),
(26, 'charr', 'hello everyone ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL DEFAULT 'male',
  `age` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `gender`, `age`, `email`, `address`, `password`, `Role`, `Status`) VALUES
(5, 'cilo', 'elgerra', 'female', 19, 'cilo@usc.edu.ph', 'barili', 'cilo', 'user', 'active'),
(6, 'james', 'tampoy', 'male', 20, 'james@gmail.com', 'barili', '12345', 'user', 'active'),
(8, 'daniela', 'belia', 'male', 12, 'daniela@gmail.com', 'nalhub', 'daniela', 'admin', 'active'),
(10, 'admin', 'admin', 'male', 23, 'admin@gmail.com', 'adasdsad', 'admin', 'admin', 'active'),
(11, 'Reyver', 'Abellanosa', 'male', 21, 'reyverako@gmail.com', 'assadasdasd', '123456789', 'user', 'active'),
(12, 'James ', 'Tampoy', 'male', 23, 'jamestampoy@gmail.com', 'Cabancalan', 'james', 'user', 'active'),
(14, 'jaysa', 'lendio', 'female', 12, 'jaysa@gmail.com', '123', 'jaysa', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2016 at 06:08 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accepted`
--

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `remindOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `created`, `modified`, `title`, `description`, `user_id`, `remindOn`) VALUES
(1, '2016-07-23 20:06:55', '2016-07-23 20:06:55', 'vbnvb', 'vbnvb', 1, '2016-07-23 20:06:55'),
(2, '2016-07-23 20:08:20', '2016-07-23 20:08:20', 'fghfgh', 'fghfgh', 1, '2016-07-23 20:08:20'),
(3, '2016-07-23 20:29:32', '2016-07-23 20:29:32', 'bnmbm', 'bnmbnm', 2, '2016-07-23 20:29:32'),
(4, '2016-07-23 23:19:36', '2016-07-23 23:19:36', 'jhkh', 'hjkhk', 1, '2016-07-23 23:19:36'),
(5, '2016-07-23 23:20:37', '2016-07-23 23:20:37', 'fgfh', 'fghfh', 1, '2016-07-23 23:20:37'),
(6, '2016-07-23 23:20:52', '2016-07-23 23:20:52', 'fgfh', 'fghfh', 1, '2016-07-23 23:20:52'),
(7, '2016-07-24 21:37:05', '2016-07-24 21:37:05', 'fdfgdffgdf', 'dfgdfgdf', 1, '2016-07-24 21:37:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

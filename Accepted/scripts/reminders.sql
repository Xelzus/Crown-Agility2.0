-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2016 at 02:24 AM
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
  `remindOn` date NOT NULL,
  `isActive` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `created`, `modified`, `title`, `description`, `user_id`, `remindOn`, `isActive`) VALUES
(1, '2016-07-23 20:06:55', '2016-07-28 20:29:16', 'vbnvb', 'vbnvb', 1, '2016-07-23', b'0'),
(2, '2016-07-23 20:08:20', '2016-07-28 20:35:15', 'fghfgh', 'fghfgh', 1, '2016-07-23', b'0'),
(3, '2016-07-23 20:29:32', '2016-07-28 21:55:39', 'bnmbm', 'bnmbnm', 2, '2016-07-23', b'0'),
(4, '2016-07-23 23:19:36', '2016-07-28 20:37:54', 'jhkh', 'hjkhk', 1, '2016-07-23', b'0'),
(5, '2016-07-23 23:20:37', '2016-07-28 20:33:27', 'fgfh', 'fghfh', 1, '2016-07-23', b'0'),
(6, '2016-07-23 23:20:52', '2016-07-28 20:31:37', 'fgfh', 'fghfh', 1, '2016-07-23', b'0'),
(7, '2016-07-24 21:37:05', '2016-07-28 20:30:51', 'fdfgdffgdf', 'dfgdfgdf', 1, '2016-07-24', b'0'),
(8, '2016-07-28 18:39:03', '2016-07-28 18:39:03', 'Auburn University at Montgomery Deadline', 'The last day for applications for Auburn University at Montgomery is Aug 1, 2016', 1, '2016-07-27', b'1'),
(9, '2016-07-28 18:45:17', '2016-07-28 20:27:31', 'Trinity College of Florida Deadline', 'The last day for applications for Trinity College of Florida is Jul 31, 2016', 1, '2016-07-26', b'0'),
(10, '2016-07-28 21:45:30', '2016-07-28 21:45:48', 'Nova Southeastern University Deadline', 'The last day for applications for Nova Southeastern University is Aug 1, 2016', 1, '2016-07-27', b'0'),
(11, '2016-07-28 21:56:03', '2016-07-28 22:57:52', 'Fresno Pacific University Deadline', 'The last day for applications for Fresno Pacific University is Jul 31, 2016', 2, '2016-07-26', b'0'),
(12, '2016-07-28 22:58:06', '2016-07-28 22:58:06', 'Auburn University at Montgomery Deadline', 'The last day for applications for Auburn University at Montgomery is Aug 1, 2016', 2, '2016-07-27', b'1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

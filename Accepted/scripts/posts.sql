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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `topic_id`, `forum_id`, `created`, `modified`, `content`, `user_id`) VALUES
(1, 1, 1, '2016-07-22 00:00:00', '2016-07-22 00:00:00', 'Test1', 1),
(2, 3, 1, '2016-07-21 00:00:00', '2016-07-21 00:00:00', 'hello to you, my son', 1),
(3, 2, 1, '2016-07-22 00:00:00', '2016-07-22 00:00:00', 'this is a test', 1),
(4, 2, 1, '2016-07-22 00:00:00', '2016-07-22 00:00:00', 'This is another test!', 1),
(5, 2, 1, '2016-07-22 23:13:54', '2016-07-22 23:13:54', 'test3!!!!!!!!', 1),
(6, 4, 2, '2016-07-22 23:19:11', '2016-07-22 23:19:11', 'Yes', 1),
(7, 1, 1, '2016-07-23 21:50:03', '2016-07-23 21:50:03', 'Get out of here, admin!', 2),
(8, 2, 1, '2016-07-23 22:36:21', '2016-07-23 22:36:21', 'dfgdffg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

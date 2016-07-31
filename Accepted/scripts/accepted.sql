-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2016 at 07:06 PM
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

DROP TABLE `forums`;
DROP TABLE `posts`;
DROP TABLE `profiles`;
DROP TABLE `reminders`;
DROP TABLE `topics`;
DROP TABLE `users`;


--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `name`, `created`, `modified`) VALUES
(1, 'General Discussion', '2016-07-19 00:00:00', '2016-07-19 00:00:00'),
(2, 'Not General Discussion', '2016-07-19 00:00:00', '2016-07-19 00:00:00');

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
(8, 2, 1, '2016-07-23 22:36:21', '2016-07-23 22:36:21', 'dfgdffg', 2),
(9, 1, 1, '2016-07-28 07:34:27', '2016-07-28 07:34:27', 'no.', 1),
(10, 1, 1, '2016-07-28 23:36:24', '2016-07-28 23:36:24', 'ghjgj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `school` varchar(250) NOT NULL,
  `about_me` text NOT NULL,
  `image_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `school`, `about_me`, `image_name`) VALUES
(1, 1, 'admin', 'admin', 'Admin U', 'I''m an admin and co-founder of this site.', '1469920538.jpg'),
(2, 2, 'Christopher', 'Talavera', 'Florida Atlantic University', 'I''m a senior of FAU and a graduate of Coral Glades High School 2012.', '1469921557.jpg');

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
(8, '2016-07-28 18:39:03', '2016-07-29 02:16:57', 'Auburn University at Montgomery Deadline', 'The last day for applications for Auburn University at Montgomery is Aug 1, 2016', 1, '2016-07-27', b'0'),
(9, '2016-07-28 18:45:17', '2016-07-28 20:27:31', 'Trinity College of Florida Deadline', 'The last day for applications for Trinity College of Florida is Jul 31, 2016', 1, '2016-07-26', b'0'),
(10, '2016-07-28 21:45:30', '2016-07-28 21:45:48', 'Nova Southeastern University Deadline', 'The last day for applications for Nova Southeastern University is Aug 1, 2016', 1, '2016-07-27', b'0'),
(11, '2016-07-28 21:56:03', '2016-07-28 22:57:52', 'Fresno Pacific University Deadline', 'The last day for applications for Fresno Pacific University is Jul 31, 2016', 2, '2016-07-26', b'0'),
(12, '2016-07-28 22:58:06', '2016-07-28 22:58:06', 'Auburn University at Montgomery Deadline', 'The last day for applications for Auburn University at Montgomery is Aug 1, 2016', 2, '2016-07-27', b'1'),
(13, '2016-07-29 02:17:07', '2016-07-29 02:17:17', 'dfgdg', 'dfgdfg', 1, '2016-07-29', b'0'),
(14, '2016-07-29 02:17:33', '2016-07-29 02:17:33', 'University of Montevallo Deadline', 'The last day for applications for University of Montevallo is Aug 1, 2016', 1, '2016-07-27', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `content`, `created`, `modified`, `forum_id`, `user_id`) VALUES
(1, 'Test', 'Test Topic', '2016-07-19 00:00:00', '2016-07-19 00:00:00', 1, 1),
(2, 'dfs', 'sdffs', '2016-07-21 00:00:00', '2016-07-21 00:00:00', 1, 1),
(3, 'hello', 'world', '2016-07-21 00:00:00', '2016-07-21 00:00:00', 1, 1),
(4, 'College Classes', 'Are they difficult?', '2016-07-22 23:18:54', '2016-07-22 23:18:54', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `modified`) VALUES
(1, 'admin', '$2y$10$l6oRmzC/T.MkHonZiJsBYuAe8d5EOSVbT7C9sjYA45pdFrdwZGqcC', 'ctalavera@mysite.com', '2016-07-22 00:00:00', '2016-07-22 00:00:00'),
(2, 'ctalave1', '$2y$10$9LSmVhZAAYeVDdKZ65Vn5Om1EX.1212TaMVWLI8qDRTvqEbuHLrZq', 'test@test.com', '2016-07-23 20:26:40', '2016-07-23 20:26:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

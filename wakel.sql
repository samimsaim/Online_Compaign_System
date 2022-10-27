-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2018 at 08:22 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wakel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `last_name`, `phone`, `email`, `image`, `create_at`, `update_at`) VALUES
(7, 'samim', 'saim', '+98783670859', 'samim.saim1212@gmail.com', '../assets/img/users/images (5).jpg101854.jpeg', '2018-11-22', '2018-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `boigraphy`
--

CREATE TABLE IF NOT EXISTS `boigraphy` (
`boi_id` int(11) NOT NULL,
  `boi_kandid` text NOT NULL,
  `kan_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`com_id` int(11) NOT NULL,
  `com_mark` text NOT NULL,
  `po_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_mark`, `po_id`, `post_id`, `create_at`) VALUES
(1, 'good', 35, 7, '2018-11-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `message`, `created_at`) VALUES
(1, 'samim', 'saim', 'samim.saim@gmail.com', 'your application is very good', '2018-11-27 22:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE IF NOT EXISTS `follower` (
`fa_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `kan_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `follower`
--

INSERT INTO `follower` (`fa_id`, `people_id`, `kan_id`, `created_at`) VALUES
(5, 35, 20, '2018-11-27 11:38:48'),
(6, 35, 19, '2018-11-27 11:40:38'),
(7, 35, 18, '2018-11-29 18:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `kandid`
--

CREATE TABLE IF NOT EXISTS `kandid` (
`kan_id` int(11) NOT NULL,
  `kan_number` int(11) NOT NULL,
  `kan_page_number` int(11) NOT NULL,
  `kan_name` varchar(64) NOT NULL,
  `kan_last_name` varchar(64) NOT NULL,
  `kan_cover` varchar(64) NOT NULL,
  `kan_profile_photo` varchar(64) NOT NULL,
  `kan_province` varchar(64) NOT NULL,
  `kan_typeOfkan` varchar(64) NOT NULL,
  `kan_type` varchar(64) NOT NULL,
  `kan_email` varchar(64) NOT NULL,
  `kan_phone` varchar(13) NOT NULL,
  `kan_slogon` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kandid`
--

INSERT INTO `kandid` (`kan_id`, `kan_number`, `kan_page_number`, `kan_name`, `kan_last_name`, `kan_cover`, `kan_profile_photo`, `kan_province`, `kan_typeOfkan`, `kan_type`, `kan_email`, `kan_phone`, `kan_slogon`, `gender`, `create_at`, `update_at`) VALUES
(11, 287, 6, 'احمد', 'سعیدی', '../assets/img/kandid/cover/saydi_cover.jpg', '../assets/img/kandid/saydi.jpg', 'کابل', 'مستقل', 'پارلمان', 'ahmad.saydi@gmail.com', '0783670859', 'زنده با افغانستان', 'm', '2018-11-22', '0000-00-00'),
(18, 297, 7, 'فدا محمد الفت', 'صالح', '../assets/img/kandid/cover/ulfat_cover.jpg', '../assets/img/kandid/ulfat.jpg', 'کابل', 'مستقل', 'پارلمان', 'ulfat.saleh@gmail.com', '0783670859', 'زنده با افغانستان', 'm', '2018-11-22', '0000-00-00'),
(19, 68, 3, 'نیلوفر', 'ابراهیمی', '../assets/img/kandid/cover/nelofar_cover.jpg', '../assets/img/kandid/nelofar.jpg', 'بدخشان', 'مستقل', 'پارلمان', 'nelofar.ibrahimi@gmail.com', '0783670859', 'زنده با افغانستان', 'f', '2018-11-22', '0000-00-00'),
(20, 384, 11, 'حاجی اجمل', 'رحمانی', '../assets/img/kandid/cover/ajmal_cover.jpg', '../assets/img/kandid/ajmal.jpg', 'کابل', 'مستقل', 'پارلمان', 'ajmal.rahmani@gmail.com', '0783670859', 'زنده با افغانستان', 'm', '2018-11-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kandid_contact`
--

CREATE TABLE IF NOT EXISTS `kandid_contact` (
`kandid_contact` int(11) NOT NULL,
  `kan_id` int(11) NOT NULL,
  `kan_phone_number` varchar(64) NOT NULL,
  `let` double NOT NULL,
  `lang` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
`like_id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`like_id`, `person_id`, `post_id`, `created_at`) VALUES
(1, 35, 7, '2018-11-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `poeple`
--

CREATE TABLE IF NOT EXISTS `poeple` (
`po_id` int(11) NOT NULL,
  `po_name` varchar(128) NOT NULL,
  `po_last_name` varchar(128) NOT NULL,
  `po_photo` varchar(128) NOT NULL,
  `po_email` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poeple`
--

INSERT INTO `poeple` (`po_id`, `po_name`, `po_last_name`, `po_photo`, `po_email`, `password`, `gender`, `create_at`, `update_at`) VALUES
(29, 'samim', 'saim', '../assets/img/people/samim.jpg', 'samim.saim1212@gmail.com', '', 'm', '2018-11-20 08:41:43', '2018-11-20 08:41:43'),
(32, 'abdulfatah', 'nasrat', '../assets/img/people/nasrat.jpg', 'fatah.nasrat@gmail.com', '', 'm', '2018-11-20 08:41:43', '2018-11-20 08:41:43'),
(33, 'samiullah', 'ounib', '../assets/img/people/samiullah.jpg', 'sami.ounib@gmail.com', '', 'm', '2018-11-20 08:41:43', '2018-11-20 08:41:43'),
(34, 'nourullah', 'ahmadi', '../assets/img/people/nourullah.jpg', 'nour.ahmadi@gmail.com', '', 'm', '2018-11-20 08:41:43', '2018-11-20 08:41:43'),
(35, 'samim', 'saim', '../assets/img/people/samim.jpg', 'samim.saim@gmail.com', '9070f0d609fb3f3a038f76f61f6bb78f700da44b', 'm', '2018-11-26 21:55:01', '2018-11-26 21:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`post_id` int(11) NOT NULL,
  `post_details` text,
  `kan_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_details`, `kan_id`, `create_at`, `update_at`) VALUES
(7, 'طوریکه همه شاهد هشتن این اولین پوست بنده میباشد', 18, '2018-11-26 00:00:00', '2018-11-26 00:00:00'),
(8, '', 18, '2018-11-27 00:00:00', '2018-11-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_image`
--

CREATE TABLE IF NOT EXISTS `post_image` (
`id` int(11) NOT NULL,
  `image` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `kan_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_image`
--

INSERT INTO `post_image` (`id`, `image`, `post_id`, `kan_id`, `created_at`) VALUES
(1, '../assets/img/post/1.jpg', 7, 18, '2018-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_video`
--

CREATE TABLE IF NOT EXISTS `post_video` (
`id` int(11) NOT NULL,
  `video` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `kan_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_video`
--

INSERT INTO `post_video` (`id`, `video`, `post_id`, `kan_id`, `created_at`) VALUES
(2, '../assets/img/post/videos/second.mp4', 8, 18, '2018-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `user_level` int(1) NOT NULL,
  `person_type` varchar(128) NOT NULL,
  `person_id` int(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_level`, `person_type`, `person_id`, `gender`, `create_at`, `update_at`) VALUES
(92, 'ajmal', '7c6a81c352924eee9443154a8101f6572643b245', 2, 'kandid', 20, 'm', '2018-11-25 00:00:00', '2018-11-25 00:00:00'),
(93, 'nelofar', '57aff9a9cf3ba764b9c3bd994037b164bc9b4c9b', 2, 'kandid', 19, 'm', '2018-11-25 00:00:00', '2018-11-25 00:00:00'),
(94, 'ulfat', 'd82bdd8ab566ac078a000f0465042cdb6c85d96a', 2, 'kandid', 18, 'm', '2018-11-25 00:00:00', '2018-11-25 00:00:00'),
(95, 'ahmad', 'b5b0d096dcb56ceb813f25ae2681ea3a20cc1dbf', 2, 'kandid', 11, 'm', '2018-11-25 00:00:00', '2018-11-25 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boigraphy`
--
ALTER TABLE `boigraphy`
 ADD PRIMARY KEY (`boi_id`), ADD UNIQUE KEY `kan_id` (`kan_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`com_id`), ADD KEY `poeple_comment_fk` (`po_id`), ADD KEY `post_camment_fk` (`post_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follower`
--
ALTER TABLE `follower`
 ADD PRIMARY KEY (`fa_id`);

--
-- Indexes for table `kandid`
--
ALTER TABLE `kandid`
 ADD PRIMARY KEY (`kan_id`);

--
-- Indexes for table `kandid_contact`
--
ALTER TABLE `kandid_contact`
 ADD PRIMARY KEY (`kandid_contact`), ADD KEY `kandid_contact_fk` (`kan_id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
 ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `poeple`
--
ALTER TABLE `poeple`
 ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`post_id`), ADD KEY `post_kandid_fk` (`kan_id`);

--
-- Indexes for table `post_image`
--
ALTER TABLE `post_image`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_video`
--
ALTER TABLE `post_video`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `boigraphy`
--
ALTER TABLE `boigraphy`
MODIFY `boi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `follower`
--
ALTER TABLE `follower`
MODIFY `fa_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kandid`
--
ALTER TABLE `kandid`
MODIFY `kan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `kandid_contact`
--
ALTER TABLE `kandid_contact`
MODIFY `kandid_contact` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `poeple`
--
ALTER TABLE `poeple`
MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `post_image`
--
ALTER TABLE `post_image`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post_video`
--
ALTER TABLE `post_video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `boigraphy`
--
ALTER TABLE `boigraphy`
ADD CONSTRAINT `kandid_boigraphy_fk` FOREIGN KEY (`kan_id`) REFERENCES `kandid` (`kan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
ADD CONSTRAINT `poeple_comment_fk` FOREIGN KEY (`po_id`) REFERENCES `poeple` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `post_camment_fk` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kandid_contact`
--
ALTER TABLE `kandid_contact`
ADD CONSTRAINT `kandid_contact_fk` FOREIGN KEY (`kan_id`) REFERENCES `kandid` (`kan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
ADD CONSTRAINT `post_kandid_fk` FOREIGN KEY (`kan_id`) REFERENCES `kandid` (`kan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

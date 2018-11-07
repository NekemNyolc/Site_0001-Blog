-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 01:43 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_0001_-_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(200) COLLATE utf8_hungarian_ci NOT NULL,
  `b_content` text COLLATE utf8_hungarian_ci NOT NULL,
  `b_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `b_game_id` int(11) NOT NULL,
  `b_author_id` int(11) NOT NULL,
  `b_tags` text COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`b_id`, `b_title`, `b_content`, `b_date`, `b_game_id`, `b_author_id`, `b_tags`) VALUES
(7, 'First Minecraft Blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum tellus ac ex accumsan mollis. Aenean aliquam, nisl eget ornare vestibulum, eros leo tempus nunc, et commodo felis augue id nisi. Nunc nisl tortor, mollis vel diam id, fermentum pellentesque leo. Proin mi ligula, facilisis sed purus sed, tincidunt condimentum augue. Ut efficitur lectus at tortor pharetra ultrices. Donec facilisis dignissim leo, ut ultrices orci viverra a. Etiam facilisis euismod massa non finibus. Ut fermentum nunc maximus nibh vehicula, id tincidunt orci rutrum. Donec sed mattis risus, eu sollicitudin est. Nullam lobortis leo at cursus mollis. Phasellus sem lectus, molestie non ultrices vitae, dignissim a lectus. Sed vulputate, nulla sed pulvinar tincidunt, nisi odio volutpat massa, at euismod urna lorem in est. Nullam scelerisque dolor urna, maximus luctus tortor ornare non.\r\n\r\nSed quis ex non tortor molestie aliquet quis quis magna. Aliquam tempor, sapien non commodo tempus, diam lectus cursus sapien, ac vestibulum enim mauris non felis. Donec vel lobortis tellus. Suspendisse potenti. Praesent faucibus vestibulum lorem. Ut pretium nibh sit amet arcu accumsan, eget cursus mauris dignissim. Aenean nec ipsum accumsan, dapibus libero ac, tincidunt neque. Curabitur luctus nunc vitae porta iaculis. Maecenas bibendum vel tellus sed mattis. Duis condimentum, odio vel rhoncus pulvinar, massa velit pellentesque enim, ornare fringilla magna orci tincidunt justo. Fusce laoreet dictum purus. Proin ultricies ac massa eget laoreet. In hac habitasse platea dictumst. Vestibulum nec ligula vel mi interdum mattis. Vivamus id enim et lorem tempor hendrerit.', '2018-11-07 11:34:11', 2, 4, 'minecraft,first,blog,asd,lorem');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(200) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`g_id`, `g_name`) VALUES
(2, 'Minecraft'),
(1, 'Redout'),
(6, 'Spore');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(64) COLLATE utf8_hungarian_ci NOT NULL,
  `u_password` blob NOT NULL,
  `u_email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `u_realname` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `u_image` text COLLATE utf8_hungarian_ci NOT NULL COMMENT 'Location of the profile image.',
  `u_regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_username`, `u_password`, `u_email`, `u_realname`, `u_image`, `u_regdate`) VALUES
(4, 'canis11', 0x8264ecbc0b0545b49dc6a0c2d49766b9b59f9bcab2279b04a4199ca270e4d2423cf25124a41fa31b, 'canis@lupus.familiaris', 'Canis Lupus', './images/canis11.jpg', '2018-11-07 12:37:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `b_game_id` (`b_game_id`),
  ADD KEY `b_author_id` (`b_author_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`g_id`),
  ADD UNIQUE KEY `g_name` (`g_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_username` (`u_username`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`b_game_id`) REFERENCES `games` (`g_id`),
  ADD CONSTRAINT `blogs_ibfk_2` FOREIGN KEY (`b_author_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

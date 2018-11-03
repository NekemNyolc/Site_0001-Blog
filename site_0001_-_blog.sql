-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2018 at 03:54 PM
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
(3, 'First Minecraft Blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet cursus sit amet dictum sit amet justo donec. Lectus sit amet est placerat in. Egestas purus viverra accumsan in nisl nisi scelerisque. Pharetra convallis posuere morbi leo urna molestie at elementum eu. A lacus vestibulum sed arcu non. Facilisis gravida neque convallis a cras semper. Nulla aliquet enim tortor at auctor urna nunc id. Ornare lectus sit amet est. Morbi tristique senectus et netus et. Non pulvinar neque laoreet suspendisse interdum consectetur. Ut morbi tincidunt augue interdum velit euismod in.\r\n\r\nBlandit turpis cursus in hac. Vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus. Ut tristique et egestas quis. Cursus eget nunc scelerisque viverra mauris in aliquam. Bibendum neque egestas congue quisque egestas diam in. Sit amet justo donec enim diam. Enim nulla aliquet porttitor lacus. Nunc aliquet bibendum enim facilisis gravida neque convallis a. Faucibus nisl tincidunt eget nullam non nisi est sit amet. Tristique sollicitudin nibh sit amet commodo. Blandit volutpat maecenas volutpat blandit. Tellus integer feugiat scelerisque varius morbi enim nunc. Sed viverra tellus in hac habitasse platea dictumst vestibulum rhoncus. Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque. Euismod quis viverra nibh cras pulvinar. Mauris ultrices eros in cursus turpis massa tincidunt. Aliquam malesuada bibendum arcu vitae elementum curabitur.\r\n\r\nDictum sit amet justo donec enim diam vulputate ut. Luctus venenatis lectus magna fringilla. Arcu non odio euismod lacinia at. Elementum sagittis vitae et leo duis ut diam. Congue mauris rhoncus aenean vel elit scelerisque mauris. In iaculis nunc sed augue. Nisl suscipit adipiscing bibendum est. Posuere urna nec tincidunt praesent semper feugiat nibh. Id donec ultrices tincidunt arcu non. Proin nibh nisl condimentum id venenatis. Sagittis aliquam malesuada bibendum arcu vitae elementum curabitur. Egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris. Tempus egestas sed sed risus pretium quam vulputate dignissim suspendisse. Non odio euismod lacinia at quis risus. Odio aenean sed adipiscing diam donec adipiscing tristique risus. Amet dictum sit amet justo donec.\r\n\r\nIpsum dolor sit amet consectetur adipiscing. Nulla facilisi nullam vehicula ipsum a. Enim facilisis gravida neque convallis a cras semper. Nunc sed augue lacus viverra. Eget nunc scelerisque viverra mauris in aliquam sem fringilla. Feugiat sed lectus vestibulum mattis ullamcorper velit. Donec ultrices tincidunt arcu non sodales neque. Ac felis donec et odio pellentesque diam. Hendrerit gravida rutrum quisque non tellus orci ac auctor. Ac tortor vitae purus faucibus ornare suspendisse sed nisi lacus. Bibendum arcu vitae elementum curabitur vitae nunc sed velit dignissim. Lacus sed viverra tellus in hac habitasse platea. Tempor commodo ullamcorper a lacus vestibulum. Urna id volutpat lacus laoreet. Nibh ipsum consequat nisl vel pretium lectus quam id. Duis tristique sollicitudin nibh sit. Justo donec enim diam vulputate ut pharetra sit. Libero justo laoreet sit amet cursus sit. Aenean sed adipiscing diam donec.\r\n\r\nTincidunt praesent semper feugiat nibh sed pulvinar proin gravida. Varius sit amet mattis vulputate enim nulla aliquet porttitor. Vel pretium lectus quam id leo. Pellentesque sit amet porttitor eget dolor. Placerat orci nulla pellentesque dignissim enim sit amet. Velit laoreet id donec ultrices tincidunt. Habitant morbi tristique senectus et netus et malesuada fames ac. Sem viverra aliquet eget sit. Sit amet commodo nulla facilisi nullam vehicula ipsum a arcu. Integer malesuada nunc vel risus commodo viverra maecenas accumsan. Luctus venenatis lectus magna fringilla. Tortor consequat id porta nibh venenatis cras sed felis eget. Vulputate odio ut enim blandit volutpat maecenas. Feugiat vivamus at augue eget arcu dictum varius duis. Aliquam vestibulum morbi blandit cursus risus at ultrices mi. Mattis aliquam faucibus purus in massa tempor. Pellentesque elit ullamcorper dignissim cras. Donec pretium vulputate sapien nec sagittis aliquam malesuada bibendum arcu.', '2018-11-01 23:48:10', 2, 2, 'minecraft,first,blog,asd,lorem'),
(4, 'Spóra... Spóra mindenütt', 'There\'s estimated 16 or 18 spice geysers appear around the player\'s homeworld. The player can claim the spice geysers with their land vehicles or sea vehicles to earn Sporebucks per minute. However, the air vehicles can\'t claim the spice geysers unlike land or sea vehicles. The player can also claim the spice geysers from other nations, though it lowers nation\'s relationship. If every nation\'s cities got conquered by other nations and no longer exist, their capture of spice geysers will be disbanded, so any nation can claim before others. Also, if the player has captured every single spice geysers on their homeworld, they will receive the Spice Hoarder achievement.', '2018-11-02 00:18:05', 6, 3, 'spore,alma,spice'),
(5, 'Second Minecraft Blog', 'Just a short test post.', '2018-11-03 14:40:33', 2, 2, 'just,a,short,test,post');

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
  `u_realname` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_username`, `u_password`, `u_email`, `u_realname`) VALUES
(2, 'asd', 0xcfb1399040bb475377829079456d2f15bbdc3dce9c18ecabf2be525178e31a1d62ef09c45c6d1f27, 'asd@asd.asd', 'Asd Asd'),
(3, 'alma', 0x6b10e391052d58886fcbbcbbf1cc1d98c28160e28561606f7289b77e2a0a8cb18edf0e1f97334450, 'alma@alma.alma', 'Alma Körte');

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
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

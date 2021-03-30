-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 06:01 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ydar`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `img` text COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `img`) VALUES
(1, 'Action', 'action.jpg'),
(2, 'Horror', 'horror.jpg'),
(3, 'Comedy', 'comedy.jpg'),
(4, 'Drama', 'drama.jpg'),
(5, 'Romance', 'romance.jpg'),
(6, 'Mystery', 'mystery.jpg'),
(7, 'Adventure', 'adventure.jpg'),
(9, 'Science Fiction', 'sciencefiction.jpg'),
(11, 'Crime', 'crime.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_user`
--

CREATE TABLE `category_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `category_user`
--

INSERT INTO `category_user` (`id`, `user_id`, `category_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(4, 2, 3),
(6, 2, 5),
(7, 2, 4),
(8, 2, 4),
(9, 2, 6),
(12, 2, 2),
(14, 3, 5),
(15, 3, 3),
(16, 1, 5),
(18, 4, 4),
(19, 1, 2),
(20, 1, 7),
(21, 1, 2),
(24, 5, 2),
(25, 5, 6),
(26, 5, 1),
(27, 3, 1),
(28, 1, 1),
(30, 6, 2),
(31, 6, 3),
(32, 6, 1),
(33, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `img` text COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `img`) VALUES
(1, 'Amir', 'amir.jpg'),
(2, 'Vox', 'vox.jpg'),
(3, 'San Stefano', 'san.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cinema_movie`
--

CREATE TABLE `cinema_movie` (
  `id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `cinema_movie`
--

INSERT INTO `cinema_movie` (`id`, `cinema_id`, `movie_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 1, 2),
(4, 1, 9),
(5, 2, 1),
(7, 2, 3),
(8, 2, 8),
(9, 2, 5),
(10, 3, 1),
(11, 3, 6),
(12, 3, 10),
(13, 3, 11),
(14, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `img` text COLLATE utf16_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `img`, `category_id`) VALUES
(1, 'Joker', 'joker.jpg', 4),
(2, 'Aladdin', 'aladdin.jpg', 3),
(3, '1917', '1917.jpg', 1),
(4, 'Intersteller', 'intersteller.jpg', 6),
(5, 'Black Panther', 'blackpanther.jpg', 7),
(6, 'Avengers', 'avengers.jpg', 7),
(7, 'Inception', 'inception.jpg', 4),
(8, 'Brid Box', 'bridbox.jpg', 6),
(9, 'Me Before You', 'me before you.jpg', 5),
(10, 'Insidious', 'insidious.jpg', 2),
(11, 'The Platform', 'platform.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `show_id`, `user_id`, `number`) VALUES
(3, 23, 2, 9),
(4, 23, 2, 10),
(14, 23, 4, 17),
(15, 23, 4, 18),
(16, 23, 4, 19),
(17, 23, 4, 20),
(18, 12, 4, 6),
(19, 12, 4, 7),
(35, 11, 5, 17),
(36, 11, 5, 18),
(37, 11, 5, 19),
(38, 11, 5, 20),
(39, 11, 3, 30),
(40, 11, 3, 31),
(44, 11, 1, 42),
(45, 11, 1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` text COLLATE utf16_unicode_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `cinema_id`, `movie_id`, `date`, `time`, `price`) VALUES
(1, 1, 3, '2021-03-10', 'From 9 To 12', 50),
(2, 1, 3, '2021-03-10', 'From 6 To 9 ', 50),
(3, 1, 4, '2021-03-10', 'From 9 To 12', 50),
(4, 1, 4, '2021-03-10', 'From 6 To 9 ', 50),
(5, 1, 2, '2021-03-10', 'From 9 To 12', 50),
(6, 1, 2, '2021-03-10', 'From 6 To 9 ', 50),
(7, 1, 9, '2021-03-10', 'From 9 To 12', 50),
(8, 1, 9, '2021-03-10', 'From 6 To 9 ', 50),
(9, 2, 1, '2021-03-10', 'From 9 To 12', 50),
(10, 2, 1, '2021-03-10', 'From 6 To 9 ', 50),
(11, 2, 3, '2021-03-10', 'From 9 To 12', 50),
(12, 2, 3, '2021-03-10', 'From 6 To 9 ', 50),
(13, 2, 8, '2021-03-10', 'From 9 To 12', 50),
(14, 2, 8, '2021-03-10', 'From 6 To 9 ', 50),
(15, 2, 5, '2021-03-10', 'From 9 To 12', 50),
(16, 2, 5, '2021-03-10', 'From 6 To 9 ', 50),
(17, 2, 9, '2021-03-10', 'From 9 To 12', 50),
(18, 2, 9, '2021-03-10', 'From 6 To 9 ', 50),
(19, 3, 1, '2021-03-10', 'From 9 To 12', 50),
(20, 3, 1, '2021-03-10', 'From 6 To 9 ', 50),
(21, 3, 6, '2021-03-10', 'From 9 To 12', 50),
(22, 3, 6, '2021-03-10', 'From 6 To 9 ', 50),
(23, 3, 10, '2021-03-10', 'From 9 To 12', 50),
(24, 3, 10, '2021-03-10', 'From 6 To 9 ', 50),
(25, 3, 11, '2021-03-10', 'From 9 To 12', 50),
(26, 3, 11, '2021-03-10', 'From 6 To 9 ', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf16_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf16_unicode_ci NOT NULL,
  `payment` int(11) DEFAULT NULL,
  `next` varchar(255) COLLATE utf16_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `payment`, `next`) VALUES
(1, 'Amin', 'amin@ydar.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(2, 'Hassan', 'hassan@ydar.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(3, 'Tolba', 'boda@ydar.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(4, 'Mahmoud', '7oda@ydar.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(5, 'kiro', 'kiro@ydar.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(6, 'Noura', 'noura@ydar.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_user`
--
ALTER TABLE `category_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `OM Category` (`category_id`),
  ADD KEY `OM User` (`user_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cinema_movie`
--
ALTER TABLE `cinema_movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Category One to Many` (`category_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinema_id` (`cinema_id`),
  ADD KEY `shows_ibfk_2` (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_user`
--
ALTER TABLE `category_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cinema_movie`
--
ALTER TABLE `cinema_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_user`
--
ALTER TABLE `category_user`
  ADD CONSTRAINT `OM Category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OM User` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cinema_movie`
--
ALTER TABLE `cinema_movie`
  ADD CONSTRAINT `cinema_movie_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cinema_movie_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `Category One to Many` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seats_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `shows_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shows_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

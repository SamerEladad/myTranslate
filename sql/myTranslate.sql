-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 06:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egypt`
--

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`) VALUES
(1, 'English'),
(2, 'German'),
(3, 'Spanish'),
(4, 'French'),
(5, 'Portuguese');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `source_text` text NOT NULL,
  `source_language_id` int(11) DEFAULT NULL,
  `translated_text` text DEFAULT NULL,
  `translated_language_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `student_id`, `teacher_id`, `source_text`, `source_language_id`, `translated_text`, `translated_language_id`, `status_id`, `created_at`) VALUES
(110, 9, 10, 'hello there i am trying to translate this text from english to german. i would like you to assist me in this text.', 1, 'hola, estoy tratando de traducir este texto del inglés al alemán. Me gustaría que me ayudara en este texto.', 3, 2, '2023-05-26 03:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'student'),
(2, 'teacher'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status_name`) VALUES
(1, 'pending'),
(2, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_points`
--

CREATE TABLE `teacher_points` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `points` decimal(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_points`
--

INSERT INTO `teacher_points` (`id`, `teacher_id`, `points`) VALUES
(1, 10, '6'),
(2, 11, '5'),
(3, 12, '13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `reset_code` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `language_id`, `code`, `reset_code`, `verified`, `created_at`) VALUES
(9, 'student1', 'student1@gmail.com', '$2y$10$7FDZGyxFBD8AV0MHacv9.udopooToJH9x2Vb3DhMl3Oahp93v51AO', 1, NULL, NULL, 'ff42b98dab023bb5fb23236ce4e067c2', 1, '2023-04-22 21:46:34'),
(10, 'teacher1', 'teacher1@gmail.com', '$2y$10$oN0vSRul5awhBX6Ra2hN4uey9wce3./2yyM8qdr58n6EgEizyCq0.', 2, 3, NULL, 'c868490355d79a0227d3cb79cd91ae24', 1, '2023-04-22 23:22:25'),
(11, 'teacher2', 'teacher2@gmail.com', '$2y$10$oN0vSRul5awhBX6Ra2hN4uey9wce3./2yyM8qdr58n6EgEizyCq0.', 2, 4, NULL, 'c868490355d79a0227d3cb79cd91ae24', 1, '2023-04-22 23:22:25'),
(12, 'teacher3', 'teacher3@gmail.com', '$2y$10$oN0vSRul5awhBX6Ra2hN4uey9wce3./2yyM8qdr58n6EgEizyCq0.', 2, 5, NULL, 'c868490355d79a0227d3cb79cd91ae24', 1, '2023-04-22 23:22:25'),
(37, 'admin', 'admin@gmail.com', '$2y$10$oN0vSRul5awhBX6Ra2hN4uey9wce3./2yyM8qdr58n6EgEizyCq0.', 3, 1, NULL, 'c868490355d79a0227d3cb79cd91ae24', 0, '2023-04-22 23:22:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `idx_orders_status_id` (`status_id`),
  ADD KEY `fk_orders_source_language` (`source_language_id`),
  ADD KEY `fk_orders_translated_language` (`translated_language_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_points`
--
ALTER TABLE `teacher_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `language_id` (`language_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `teacher_points`
--
ALTER TABLE `teacher_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_source_language` FOREIGN KEY (`source_language_id`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `fk_orders_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_orders_translated_language` FOREIGN KEY (`translated_language_id`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

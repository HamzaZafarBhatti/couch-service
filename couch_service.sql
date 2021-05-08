-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 11:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `couch_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `couches`
--

CREATE TABLE `couches` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_available` tinyint(1) DEFAULT 0,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couches`
--

INSERT INTO `couches` (`id`, `user_id`, `is_available`, `address`, `city`, `country`) VALUES
(9, 0, 0, 'abc street', 'iowa', 'usa');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `to_user_id`, `from_user_id`, `message`, `status`, `timestamp`) VALUES
(2, 16, 6, 'Hi!', 1, '2021-05-08 08:36:24'),
(3, 16, 6, 'Nice', 1, '2021-05-08 08:36:52'),
(4, 16, 6, 'Checking\n', 1, '2021-05-08 08:37:17'),
(5, 16, 6, 'WEW\n', 1, '2021-05-08 08:38:17'),
(6, 6, 16, 'Hi thanks for messaging me\n', 1, '2021-05-08 09:00:39'),
(7, 16, 6, 'No problem', 1, '2021-05-08 09:00:46'),
(8, 16, 23, 'Yo bro\n', 1, '2021-05-08 09:06:26'),
(9, 23, 16, 'Hi I want to rent a couch from you', 1, '2021-05-08 09:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_on`) VALUES
(1, 'Admin', '2021-05-02 15:00:54'),
(2, 'Traveller', '2021-05-02 15:09:06'),
(3, 'Host', '2021-05-02 15:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `role_id`, `password`, `is_online`, `phone`, `address`, `city`, `state`, `country`, `status`, `created_on`) VALUES
(6, 'admin', 'admin@admin.com', 'Admin', 1, '$2y$10$4gc.hzRTtrDoM2spJ9lzYuSg3ko5qfc4HcoUYqQ9NKN4yd4VjUgCq', 0, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-08 09:10:41'),
(16, 'traveller', 'user@traveller.com', 'Saif Ijaz', 2, '$2y$10$8eJz89P1EkK1j.neZQV1A./7VUl.0ppsDKoJeRFcPVrF3dfUkw8zq', 1, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-08 09:10:32'),
(23, 'Host', 'user@host.com', 'Hamza Bhatti', 3, '$2y$10$FX0geObdEQgPLZikjcMRFushBvI3M2sUXu8NlQzbIiJjI42PlCkei', 1, '03330952454', 'Abcd Street', 'Jhelum', 'Punjab', 'Pakistan', 1, '2021-05-08 09:13:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `couches`
--
ALTER TABLE `couches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `couches`
--
ALTER TABLE `couches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

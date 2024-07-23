-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2024 at 02:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobility`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `invoice_number` varchar(50) NOT NULL,
  `number_of_seats` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `trip_id`, `user_id`, `booking_date`, `invoice_number`, `number_of_seats`) VALUES
(7, 14, 10, '2024-07-22 00:00:00', '292884141', 1),
(8, 14, 10, '2024-07-22 00:00:00', '614056332', 1),
(9, 14, 10, '2024-07-22 00:00:00', '466676511', 1),
(10, 14, 10, '2024-07-22 00:00:00', '1608626500', 1),
(11, 12, 10, '2024-07-23 00:00:00', '1901389749', 1),
(12, 12, 10, '2024-07-23 00:00:00', '404478008', 1),
(13, 12, 10, '2024-07-23 00:00:00', '114229882', 1),
(14, 12, 10, '2024-07-23 00:00:00', '510453891', 3),
(15, 14, 10, '2024-07-23 00:00:00', '1920139797', 2),
(16, 14, 10, '2024-07-23 00:00:00', '1795642527', 3),
(17, 12, 10, '2024-07-23 00:32:35', '641422859', 2),
(18, 12, 10, '2024-07-23 01:27:32', '711875955', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `bus_id` int(11) NOT NULL,
  `bus_number` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `bus_status` enum('active','inactive','maintenance/unavailable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`bus_id`, `bus_number`, `capacity`, `bus_name`, `bus_status`) VALUES
(20, 'Boengun', 3355, 'ddd', 'inactive'),
(36, '4567ATK', 35, 'Siyaya222', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `user_id`, `payment_date`, `amount`) VALUES
(1, 7, 10, '2024-07-22', '35.00'),
(2, 8, 10, '2024-07-22', '35.00'),
(3, 9, 10, '2024-07-22', '35.00'),
(4, 10, 10, '2024-07-22', '35.00'),
(5, 11, 10, '2024-07-23', '35.00'),
(6, 12, 10, '2024-07-23', '35.00'),
(7, 13, 10, '2024-07-23', '35.00'),
(8, 14, 10, '2024-07-23', '105.00'),
(9, 15, 10, '2024-07-23', '70.00'),
(10, 16, 10, '2024-07-23', '105.00'),
(11, 17, 10, '2024-07-23', '70.00'),
(12, 18, 10, '2024-07-23', '70.00');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trip_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `trip_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `route` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`trip_id`, `bus_id`, `first_name`, `last_name`, `trip_date`, `departure_time`, `route`) VALUES
(12, 20, 'Nana', 'Emma', '2024-07-28', '18:00:00', 'Legon'),
(14, 20, 'Nana', 'Emma', '2024-07-30', '19:00:00', 'Madina');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `role` int(2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `role`, `date_created`) VALUES
(2, 'Judercio', 'N', 'jn@gmail.com', '$2y$10$lAQ/gPYYRzmBdJMw/uslJOQkb.V4scXZKW1B5FdIXWItRAgFNbANO', 203456789, 3, '2024-07-18 19:55:37'),
(3, 'Nana', 'Emma', 'emma@gmail.com', '$2y$10$NVbhCq34nS/z8RrCpazSD.qOrLZBByBaTbXnqw5BDr2tQUbTkrjRC', 203456589, 2, '2024-07-18 20:11:13'),
(4, 'Joao', '', 'j@gmail.com', '$2y$10$PxpR5oGkli7vdDg9/C75B.A27yKTQNPBvFGuqUCJ06aAERtNnENrG', 595189482, 1, '2024-07-20 19:09:12'),
(9, 'James ', 'Rodriguez', 'rodir@gmail.com', '$2y$10$YPcn/ypPNx4qJdhXASlGP.ALtHZXKKXbOJqV7eH8p5B/3ITQM1Y56', 595449482, 3, '2024-07-20 19:56:50'),
(10, 'James', 'Joaoa', 'jaja@gmail.com', '$2y$10$YXS5oRJAgqNyiptXkrjCseUaFnkXJDdHtj2J7apbWzjX2gbm6GEIW', 595189482, 3, '2024-07-22 19:00:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `trip_id` (`trip_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `trip_id` (`trip_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`bus_id`),
  ADD UNIQUE KEY `bus_number` (`bus_number`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`last_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`trip_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`trip_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

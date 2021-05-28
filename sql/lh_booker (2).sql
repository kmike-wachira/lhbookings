-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 02:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lh_booker`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecture_rooms`
--

CREATE TABLE `lecture_rooms` (
  `id` int(11) NOT NULL,
  `lh_name` varchar(255) NOT NULL,
  `lh_capacity` int(11) NOT NULL,
  `lh_cover_image` varchar(255) NOT NULL,
  `lh_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture_rooms`
--

INSERT INTO `lecture_rooms` (`id`, `lh_name`, `lh_capacity`, `lh_cover_image`, `lh_desc`) VALUES
(1, 'kahkjah', 123, 'bible.png', 'addlectureroom.html'),
(2, 'lecture hall 15', 130, 'logo.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure nihil numquam excepturi laborum vel, ullam consectetur velit cum explicabo voluptate, similique nemo, iste odit vitae aliquid reiciendis quae corporis qui!\r\n'),
(3, 'Lecture hall 17', 600, 'FB_IMG_15872744201651434.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ducimus quam dolorum quisquam, rerum dignissimos similique eum placeat facere! Voluptas sunt non dolore accusantium natus, facilis quae error ratione corrupti.\r\n'),
(4, 'lecture hall 15 name', 1000, 'FB_IMG_15958234420966040.jpg', 'I hereby declare that this research project proposal on “Online Make-up class scheduler for Kiriri Women’s University” is my own original work done under the supervision of Mr. Geoffrey Makori, faculty of Computer Science except for citations and quotations which have been acknowledged. The results embodied in this project have not been submitted for award of degree or diploma at Kiriri Women’s University of science and Technology.');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `lecturehall_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `period` varchar(10) NOT NULL,
  `unit_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `lecturehall_id`, `lecturer_id`, `date`, `period`, `unit_name`) VALUES
(1, 4, 1, '2021-06-01', '1', 'Operating Systems 1'),
(2, 4, 1, '2021-06-01', '1', 'Microsoft Packages'),
(3, 4, 1, '2021-06-01', '2', 'Operating Systems g'),
(4, 4, 1, '2021-06-02', '2', 'Operating Systems'),
(5, 4, 1, '2021-06-02', '2', 'MVm 11'),
(6, 4, 1, '2021-05-20', '1', 'Operating Systems'),
(7, 1, 1, '2021-05-05', '2', 'Operating Systems'),
(8, 1, 1, '2021-05-05', '1', 'Operating Systems'),
(9, 4, 1, '2021-06-01', '1', 'Operating Systems'),
(10, 4, 1, '2021-06-01', '1', 'Operating Systems'),
(11, 4, 1, '2021-05-27', '1', 'Operating Systems');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `period` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `unit_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `date`, `period`, `hall_id`, `unit_name`) VALUES
(1, '2021-06-01', 1, 4, 'ywyywyy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecture_rooms`
--
ALTER TABLE `lecture_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecture_rooms`
--
ALTER TABLE `lecture_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

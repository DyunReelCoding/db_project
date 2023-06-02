-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 07:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_tbl`
--

CREATE TABLE `event_tbl` (
  `event_id` int(11) NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_tbl`
--

INSERT INTO `event_tbl` (`event_id`, `building_name`, `room_number`, `subject_id`, `event_date`, `event_time`) VALUES
(3, 'ccis', '1', 1, '2023-06-01', '11:25:00'),
(4, 'ccis', 'cl1', 4, '2023-06-03', '12:14:00'),
(5, 'ccis', 'cl1', 4, '2023-06-03', '12:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`subject_id`, `subject_code`, `subject_name`) VALUES
(1, 'CCIS', 'ite16'),
(2, '1', 'ITE106'),
(3, '1', 'ITE106'),
(4, 'ITE14', 'programming'),
(5, 'ITE14', 'programming');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'jonriel', 'iamkirito50@gmail.com', 'jonriel123', 'instructor'),
(2, 'user', 'jonriel@gmail.com', 'jonriel123', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_tbl`
--
ALTER TABLE `event_tbl`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_tbl`
--
ALTER TABLE `event_tbl`
  ADD CONSTRAINT `event_tbl_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject_tbl` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

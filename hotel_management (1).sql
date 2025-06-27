-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 12:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_hotels`
--

CREATE TABLE `booked_hotels` (
  `name` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `place` varchar(16) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `room_category` varchar(15) NOT NULL,
  `bedding_category` varchar(15) NOT NULL,
  `breakfast` varchar(15) NOT NULL,
  `no_of_rooms` int(10) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `hotelname` varchar(50) NOT NULL,
  `prize` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_hotels`
--

INSERT INTO `booked_hotels` (`name`, `email`, `password`, `place`, `phone`, `room_category`, `bedding_category`, `breakfast`, `no_of_rooms`, `check_in`, `check_out`, `hotelname`, `prize`) VALUES
('aman', 'aman@gmail.com', 'aman', 'Uttar Pardesh', '12314231', 'DELUX ROOM', 'Triple', 'Room Only', 2, '2025-03-06', '2025-03-18', 'Travelodge Hotel Chandigarh Airport', 21000),
('honey', 'honey@gmail.com', '8968695593@honey', 'chandigarh', '8098044348', 'SUPERIOR ROOM', 'Double', 'Meal', 1, '2025-04-06', '2025-04-16', 'Meriton Suites Sussex Street, Chandigarh', 13470),
('honey', 'honey@gmail.com', '8968695593@honey', 'chandigarh', '8098044348', 'SUPERIOR ROOM', 'Double', 'Meal', 1, '2025-04-06', '2025-04-16', 'Meriton Suites Sussex Street, Chandigarh', 13470),
('aman', 'aman@gmail.com', 'aman', 'chandigarh', '9876543210', 'SUPERIOR ROOM', 'Single', 'Meal', 1, '2025-04-07', '2025-04-29', 'Travelodge Hotel Chandigarh Airport', 10500),
('honey', 'honey@gmail.com', '123', 'chandigarh', '12314231', 'SUPERIOR ROOM', 'Single', 'Meal', 1, '2025-04-15', '2025-04-29', 'Travelodge Hotel Chandigarh Airport', 10500);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `name` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `complaint` varchar(100) NOT NULL,
  `complaint_from` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `id` varchar(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`id`, `name`, `email`, `password`) VALUES
('44113', 'Honey', 'a@gmail.com', '8968695593@honey'),
('97981', 'Abhijeet', 'abhijeet@gmail.com', 'abhi123'),
('47824', 'adhi', 'adhi@gmail.com', '123'),
('12602', 'aman', 'aman@gmail.com', '1234'),
('80251', 'bee', 'bee@gmail.com', 'bee'),
('82325', 'Honey', 'Honey@gmail.com', '123'),
('89235', 'myaccount', 'myaccount@gmail.com', '123'),
('72981', 'pushpa', 'pushpa@gmail.com', 'pushparaaj'),
('21334', 'reena', 'reena@gmail.com', 'reena'),
('75601', 'saman', 'saman@gmail.com', 'saman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

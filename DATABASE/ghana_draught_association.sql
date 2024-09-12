-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 07:56 PM
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
-- Database: `ghana_draught_association`
--

-- --------------------------------------------------------

--
-- Table structure for table `camptbl`
--

CREATE TABLE `camptbl` (
  `id` int(11) NOT NULL,
  `campName` varchar(255) NOT NULL,
  `regionId` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `camptbl`
--

INSERT INTO `camptbl` (`id`, `campName`, `regionId`, `description`) VALUES
(1, 'Power', 1, 'power stars'),
(3, 'Suntaa', 1, ''),
(4, 'BDA', 5, 'goog'),
(5, 'Testing user', 5, 'Tester');

-- --------------------------------------------------------

--
-- Table structure for table `competitiontbl`
--

CREATE TABLE `competitiontbl` (
  `id` int(11) UNSIGNED NOT NULL,
  `competitionName` varchar(255) NOT NULL,
  `yearWon` int(4) NOT NULL,
  `playerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competitiontbl`
--

INSERT INTO `competitiontbl` (`id`, `competitionName`, `yearWon`, `playerId`) VALUES
(1, 'cham', 322, 89),
(3, 'cham', 322, 92),
(4, 'lali', 678, 92),
(5, 'dre', 98, 92),
(6, 'cham', 322, 93),
(7, 'lali', 678, 93),
(8, 'Bundis Liga', 2019, 93),
(9, 'Europe', 201323, 93),
(10, 'Bundis Liga', 2030, 82),
(13, 'cham', 1111, 93),
(14, 'cham', 1111, 93),
(15, '23', 2, 93),
(16, 'cham', 2023, 86),
(21, 'Laliga', 2019, 101),
(22, ' Champions League', 2023, 101),
(23, 'Laliga', 2019, 102),
(24, ' Champions League', 2023, 102);

-- --------------------------------------------------------

--
-- Table structure for table `playerstbl`
--

CREATE TABLE `playerstbl` (
  `id` int(11) NOT NULL,
  `fullName` varchar(200) NOT NULL,
  `nickname` varchar(150) NOT NULL,
  `dateOfBirth` varchar(100) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `regionId` int(11) NOT NULL,
  `campId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `competitionsWon` varchar(255) NOT NULL,
  `yearWon` varchar(255) NOT NULL,
  `passportPicture` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `playerstbl`
--

INSERT INTO `playerstbl` (`id`, `fullName`, `nickname`, `dateOfBirth`, `gender`, `contact`, `regionId`, `campId`, `userId`, `competitionsWon`, `yearWon`, `passportPicture`, `regDate`) VALUES
(2, 'Mohammed Abdul Halim', 'King', '1985-12-16', 'Male', '', 1, 3, 0, 'Laliga', '2017', 'PG03479231720738361.jpg', '2024-07-13 20:03:40'),
(76, 'Issahaku Ibrahim', 'Kofi', '2024-07-11', 'Female', '', 1, 1, 0, 'Laliga', '2018', 'H11721607925.jpg', '2024-07-22 00:25:25'),
(81, 'Nana', 'Naa', '2024-08-20', 'Male', '0546399332', 5, 4, 0, '', '', 'avatar.png', '2024-08-10 16:14:34'),
(86, 'Abubakari Abdul Wahab', 'we', '2024-09-02', 'Male', '', 5, 4, 7, 'Array', 'Array', 'avatar.png', '2024-09-04 01:18:40'),
(87, 'Abubakari Abdul Wahab', 'we', '2024-09-02', 'Male', '', 5, 4, 7, 'Array', 'Array', 'avatar.png', '2024-09-04 01:20:29'),
(88, 'Abubakari Abdul Wahab', 'we', '2024-09-02', 'Male', '', 5, 4, 7, '', '', 'avatar.png', '2024-09-04 01:21:09'),
(89, 'Abubakari Abdul Wahab', 'we', '2024-09-02', 'Male', '', 5, 4, 7, '', '', 'avatar.png', '2024-09-04 01:22:06'),
(90, 'Abubakari Abdul Wahab', 'we', '2024-09-02', 'Male', '', 5, 4, 7, '', '', 'avatar.png', '2024-09-04 01:23:35'),
(92, 'Abubakari Abdul Wahab', 'we', '2024-09-02', 'Male', '', 5, 5, 7, '', '', 'avatar.png', '2024-09-04 01:26:38'),
(93, 'Abubakari Abdul Wahab', 'work', '2024-09-02', 'Male', '', 5, 5, 7, 'Array', 'Array', 'avatar.png', '2024-09-04 21:04:03'),
(101, 'Demo Data', 'Demo', '3/23/2003', 'Male', '546399552', 5, 4, 6, '', '', 'avatar.png', '2024-09-05 18:15:10'),
(102, 'Demo Data', 'Demo', '3/23/2003', 'Male', '546399552', 5, 4, 7, '', '', 'avatar.png', '2024-09-05 18:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `regiontbl`
--

CREATE TABLE `regiontbl` (
  `id` int(11) NOT NULL,
  `regionName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regiontbl`
--

INSERT INTO `regiontbl` (`id`, `regionName`) VALUES
(1, 'Upper West'),
(2, 'Upper East'),
(5, 'Greater Accra');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `role` varchar(5) NOT NULL,
  `regionId` int(11) NOT NULL,
  `campId` int(11) NOT NULL,
  `profilePicture` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `fullName`, `username`, `email`, `contact`, `gender`, `role`, `regionId`, `campId`, `profilePicture`, `password`) VALUES
(3, 'John Doe', 'John', 'john@gmail.com', '+2335423358', 'Male', '', 0, 0, 'pexels-alipazani-26132601720914381.jpg', '26c78f57ef82cf897b16d399e4070f45'),
(6, 'demo', 'demo', 'demo@gmail.com', '054342232', 'Male', 'Admin', 0, 0, 'avatar1725277439.png', '26c78f57ef82cf897b16d399e4070f45'),
(7, 'Abubakari Abdul Aziz', 'Don', 'azizabubakari55@gmail.com', '024343343', 'Male', 'User', 5, 4, 'avatar.png', '26c78f57ef82cf897b16d399e4070f45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `camptbl`
--
ALTER TABLE `camptbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitiontbl`
--
ALTER TABLE `competitiontbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playerstbl`
--
ALTER TABLE `playerstbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regiontbl`
--
ALTER TABLE `regiontbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `camptbl`
--
ALTER TABLE `camptbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `competitiontbl`
--
ALTER TABLE `competitiontbl`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `playerstbl`
--
ALTER TABLE `playerstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `regiontbl`
--
ALTER TABLE `regiontbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2025 at 03:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teammanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `team_membar`
--

CREATE TABLE `team_membar` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `secondname` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive','suspended') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_membar`
--

INSERT INTO `team_membar` (`id`, `FirstName`, `secondname`, `position`, `status`) VALUES
(1, 'KDB', 'MUZA', 'Player', 'active'),
(2, 'KDB', 'MUZA', 'Player', 'inactive'),
(3, 'KDB', 'MUZA', 'Manager', 'inactive'),
(4, 'Paulo ', 'solm', 'Suspended', 'suspended'),
(5, 'hamis ', 'kiiza', 'Player', 'suspended'),
(6, 'hamis ', 'kiiza', 'Player', 'active'),
(7, 'Faustini', 'shown', 'Doctor', 'active'),
(8, 'issa', 'mwanga', 'Player', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `team_membar`
--
ALTER TABLE `team_membar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `team_membar`
--
ALTER TABLE `team_membar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

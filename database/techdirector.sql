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
-- Table structure for table `techdirector`
--

CREATE TABLE `techdirector` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `techdirector`
--

INSERT INTO `techdirector` (`id`, `email`, `password`) VALUES
(1, 'PaulSolm@gmail.com', '$2y$10$SSXd2hvvhy2JOzvKNqqsCuvGhM7VwhGvQIJg0e62vrCAHxl2aJ/Gq'),
(2, 'PaulSolm@gmail.com', '$2y$10$L54oPWog1xLS5EHjqqbOu.5xIW0eY.x/kYkbwupo2kDbRlwZxoZPe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `techdirector`
--
ALTER TABLE `techdirector`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `techdirector`
--
ALTER TABLE `techdirector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

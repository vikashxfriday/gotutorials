-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 06:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `itio_tutorial_title`
--

CREATE TABLE `itio_tutorial_title` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `priority` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itio_tutorial_title`
--

INSERT INTO `itio_tutorial_title` (`id`, `title`, `icon`, `status`, `priority`) VALUES
(1, 'GoLang', '', 1, 0),
(2, 'PHP', '', 1, 0),
(3, 'Docker', '', 1, 0),
(4, 'kubernetes', '', 1, 0),
(5, 'MongoDB', '', 1, 0),
(6, 'PostgreSql', '', 1, 0),
(7, 'MySql', '', 1, 0),
(8, 'SQL', '', 1, 0),
(9, 'HTML', '', 1, 0),
(10, 'CSS', '', 1, 0),
(11, 'JavaScript', '', 1, 0),
(12, 'Jquery', '', 1, 0),
(13, 'Ajax', '', 1, 0),
(14, 'Bootstrap', '', 1, 0),
(15, 'Git', '', 1, 0),
(16, 'AWS', '', 1, 0),
(17, 'Azure', '', 1, 0),
(18, 'GCP', '', 1, 0),
(19, 'TypeScript', '', 1, 0),
(20, 'ReactJS', '', 1, 0),
(21, 'NextJS', '', 1, 0),
(22, 'NodeJs', '', 1, 0),
(23, 'Java', '', 1, 0),
(24, 'Python', '', 1, 0),
(25, 'Kotlin', '', 1, 0),
(26, 'XML', '', 1, 0),
(27, 'ASP', NULL, 1, 0),
(28, 'C', NULL, 1, 0),
(29, 'C++', NULL, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itio_tutorial_title`
--
ALTER TABLE `itio_tutorial_title`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itio_tutorial_title`
--
ALTER TABLE `itio_tutorial_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

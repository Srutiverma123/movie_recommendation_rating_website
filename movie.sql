-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 07:15 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `mid` int(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `m_year` int(4) DEFAULT NULL,
  `director` varchar(30) DEFAULT NULL,
  `stars` varchar(30) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `trailer` varchar(30) DEFAULT NULL,
  `writers` varchar(30) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `storyline` varchar(100) DEFAULT NULL,
  `Rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`mid`, `title`, `category`, `m_year`, `director`, `stars`, `cover`, `trailer`, `writers`, `release_date`, `storyline`, `Rating`) VALUES
(1, 'The Shawshank Redemption', 'Drama', 1994, 'Frank Darabont', 'Tim Robbins', 'shaw.jpg', NULL, 'Stephen King', '1994-02-17', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts ', 9.2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`mid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `mid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

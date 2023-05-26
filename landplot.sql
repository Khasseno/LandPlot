-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2023 at 06:11 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landplot`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iin` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `certificateId` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `disctrict` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `iin`, `pass`, `status`, `certificateId`, `region`, `disctrict`, `city`, `address`) VALUES
(1, 'Сеитбеков Айбек Қалдарбекұлы', '020407501146', '1231', 'head', '1234', 'г.Астана', 'Алматинский', 'г.Астана', 'где-то там'),
(2, 'Утаров Алибек Жанаталапович', '030720000010', '1234', 'user', '1234', 'г.Астана', 'Есил', 'г.Астана', 'тоже где-то там'),
(3, 'Хасенов Алтай Елтайұлы', '040209550012', '1235', 'worker', '1234', 'г.Астана', 'Алматинский', 'г.Астана', 'вообще где-то там');

-- --------------------------------------------------------

--
-- Table structure for table `landdivide`
--

CREATE TABLE `landdivide` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iin` varchar(255) NOT NULL,
  `certificateId` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `application` varbinary(3000) NOT NULL,
  `scheme` varbinary(3000) NOT NULL,
  `copy` varbinary(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landdivide`
--
ALTER TABLE `landdivide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `landdivide`
--
ALTER TABLE `landdivide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

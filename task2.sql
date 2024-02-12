-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 12, 2024 at 02:18 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.3.2-1+ubuntu22.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'gkrav', 'gkrav');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` varchar(250) NOT NULL,
  `user_email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `user_email`) VALUES
(10, 'GAURAV KUMAR +91', 'gkgreenlight@gmail.com', 'hello sir \r\n', 'user@gmail.com'),
(16, 'Tushar', 'naintushar@hotmail.com', 'Demo Message', 'naintushar@hotmail.com'),
(17, 'root', 'gkgreenlight@gmail.com', 'hukgkj', 'user@gmail.com'),
(18, 'GAURAV KUMAR +91', 'gkrav1317@GMAIL.COM', 'hello user demo user', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(155) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `register_time`) VALUES
(33, 'user', 'user@gmail.com', '9817048784', '$2y$10$JZNH/UZC7/BipOxR6CodKOBSLEw.zlPJrzwvgv74gRLC9ZRSoAtWa', '2024-02-12 11:29:31'),
(34, 'GAURAV KUMAR +91', 'gkgreenlight@gmail.com', '09817048784', '$2y$10$f7gUiMEEbC3WUDmoO9ckLOn2XB8R5eE72JgqjtmYupWeS6SBLh2Aa', '2024-02-12 12:05:34'),
(35, 'Happy', 'happybathla294@gmail.com', '07206073481', '$2y$10$kPcdjjfL/AaEmKQXI5zvTu9yEgP3xTFveDhqoGR6Q2XACVNZcQFA2', '2024-02-12 12:15:14'),
(36, 'gaurav', 'gaurav@gmail.com', '09817048784', '$2y$10$VXUBuI82Rg1OFFLbc/Zbu.tEx0XMuKysnoV9MseE6l788Ba/PiUWi', '2024-02-12 12:20:42'),
(37, 'Tushar', 'naintushar@hotmail.com', '09898878767', '$2y$10$PNOq7FkwWro6W0EzcdosIuU9CZ74vlBfzw1KKVGYxJs5pVqSGnIzW', '2024-02-12 12:28:51'),
(38, 'gkrav', 'gkgreenl11ght@gmail.com', '09817048784', '$2y$10$ObIfFPt3rT9yLLZylVEkxeWLgXwI1YK36swpIe1FAPjNMnRCNv/KO', '2024-02-12 14:15:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

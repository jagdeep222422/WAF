-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 01:44 PM
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
-- Database: `wafauthsuite`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(2, 'test1', '$2y$10$cL89r5ajVywKn.btwiaMvOtvkJUjLaZPKf0gMgp2TCSTWNs/iseUq', 'test1@gmail.com'),
(3, 'test2', '$2y$10$H89pKR/UwvIxKlhi9lXpkOACVyQAaahQDEtMML2bgg5Umm2GdgZWO', 'test2@gmail.com'),
(4, 'test3', '$2y$10$dCCAe1lbsjWAhCFCaXCYle0yZjTbopYiIrRh1Uje0tF1Y2SOIKGlC', 'test3@gmail.com'),
(5, 'test4', '$2y$10$ESVFoYjc3v653s732Mdbg.3Y1/u1Ivchcpp/kGO2Wl4rUL.4uo/ju', 'test4@gmail.com'),
(6, 'test5', '$2y$10$zY863vb9gKJZ4WaI1SQZ0OK1hMQTINeMN0TVaDlhHxqdZUxiX7mhq', 'test5@gmail.com'),
(12, 'test6', '$2y$10$er2VVl.gkde8a4OXRniXneRqwv16jJtmJFH1ak2dKlzR2J/wrskVS', 'test6@gmail.com'),
(13, 'test8', '$2y$10$7m80zYHpIh9n4osJxcrrDOvKCF7XXQugcig3mDOLTGbtSk4Ab/0Zi', 'test8@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

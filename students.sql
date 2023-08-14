-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 08:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `course` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `course`) VALUES
(2, 'Siri Prabhakar Shetty', 'shettysiriphysios@gmail.com', '9892210752', 'MPT(Cardio Pulmonary Physiotherapist)'),
(3, 'Asha Shetty', 'aaashashetty@gmail.com', '9757057910', 'BAF'),
(4, 'Mansi Sharma', 'mansisharma2002@gmail.com', '9076496121', 'BA'),
(5, 'Shashikala Shetty', 'herganidhi06@gmail.com', '7738002448', 'MCA'),
(7, 'Manisha Vishwakarma', 'mani1995@gmail.com', '9969885376', 'MSc Computer Science'),
(8, 'Kashyap ', 'kashyap17@gmail.com', '9594253788', 'MSc IT'),
(9, 'Rashmi Singh', 'rashmisingh_1995@gmail.com', '9969885376', 'MSc Computer Science'),
(10, 'Prabhakar Shetty', 'hergaprabhakarshetty@gmail.com', '9969885376', 'BE(Chemical Engineering)'),
(11, 'Nidhi Prabhakar Shetty', 'herganidhi06@gmail.com', '9757057904', 'MSc Computer Science'),
(12, 'Lavanya Shetty', 'lavanyashetty39@gmail.com', '9164169855', 'BBM(Accounts & Finance)'),
(13, 'Rajvi Bobale', 'rajvibobale404@gmail.com', '9221479512', 'BSc(Computer Science)'),
(15, 'Rashi Shetty', 'rashishetty20@gmail.com', '8850906872', 'CA(Chartered Accountant)'),
(16, 'Nishita Shetty', 'nishitashetty31@gmail.com', '9969762926', 'BE(Electronics & Telecommunication)'),
(17, 'Arundhathi  Shetty', 'hergaprabhakarshetty@gmail.com', '9969885376', 'BE(Electronics & Telecommunication)'),
(18, 'Jyoti Shetty', 'hergaprabhakarshetty@gmail.com', '7411377853', 'BA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

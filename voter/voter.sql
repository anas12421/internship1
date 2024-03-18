-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2024 at 04:34 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voter`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int NOT NULL,
  `name` varchar(1111) NOT NULL,
  `symbol` varchar(1111) NOT NULL,
  `photo` varchar(1111) NOT NULL,
  `area` varchar(1111) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `votes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `symbol`, `photo`, `area`, `status`, `votes`) VALUES
(1, 'Hero Alom', 'lion', 'Hero-Alom.jpg', 'Bogura', 0, 7),
(2, 'Sheikh Hasina', 'nouka', 'Sheikh-Hasina.webp', 'Gopalgonj', 0, 12),
(4, 'G m kader', 'langol', 'G-m-kader.png', 'sherpur', 0, 5),
(9, 'islami andolon', 'hat pakha', 'islami-andolon.png', 'chittagong', 0, 7),
(10, 'bangladesh communist party', 'kaste', 'bangladesh-communist-party.png', 'sylhet', 0, 0),
(11, 'bangladesh workers party', 'haturi', 'bangladesh-workers-party.png', 'narayangonj', 0, 0),
(12, 'Zaker party', 'golap ful', 'Zaker-party.png', 'rajshahi', 0, 0),
(13, 'bangladesh national awami party', 'kureghor', 'bangladesh-national-awami-party.png', 'barishal', 0, 0),
(15, 'khaleda zia', 'dhaner sish', 'khaleda-zia.png', 'dhaka', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `phone` int NOT NULL,
  `nid` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  `gender` varchar(111) NOT NULL,
  `division` varchar(111) NOT NULL,
  `district` varchar(111) NOT NULL,
  `subdistrict` varchar(111) NOT NULL,
  `photo` varchar(111) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0',
  `vote` int NOT NULL DEFAULT '0',
  `deleted_at` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `nid`, `date`, `gender`, `division`, `district`, `subdistrict`, `photo`, `role`, `vote`, `deleted_at`) VALUES
(1, 'anas', 'anas161090@gmail.com', 1867830522, '4212555983', '2002-08-13', 'male', 'dhaka', 'dhaka', 'keranigonj', '56159.jpg', 1, 0, 0),
(15, 'Saimon', 'saimon152166@gmail.com', 1568130676, '5562707017', '2002-08-13', 'male', 'dhaka', 'dhaka-1313', 'keranigonj', 'nid-5562707017.png', 0, 0, 0),
(23, 'Quinn Case', 'raqof@mailinator.com', 94, '6', '2012-07-21', 'male', 'Consequatur Sequi f', 'Id omnis rem et dolo', 'Esse dolore delectus', '67272.png', 0, 0, 0),
(26, 'Chanda Justice', 'vaqenywe@mailinator.com', 12, '34', '2023-03-16', 'female', 'Architecto sed qui s', 'Sint sed velit est v', 'Minus maiores quam e', '34-.jpg', 0, 0, 0),
(27, 'Yvonne Dale', 'mipoqom@mailinator.com', 89, '10', '1989-03-23', 'female', 'Mollitia cum magnam ', 'Et facere consequatu', 'Cupidatat praesentiu', '7804.png', 0, 0, 1),
(28, 'Samuel Camacho', 'zizovor@mailinator.com', 11, '5', '1984-04-13', 'male', 'Omnis omnis saepe qu', 'Et incididunt totam ', 'Sit eos quod aut re', '30405.png', 0, 0, 0),
(29, 'Sarah Maddox', 'vukonaket@mailinator.com', 52, '57', '1977-07-14', 'female', 'Earum vel molestiae ', 'Vitae vel consequat', 'Minim labore a maxim', 'nid-57.png', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int NOT NULL,
  `candidate_id` int NOT NULL,
  `voter_id` int NOT NULL,
  `name` varchar(1111) NOT NULL,
  `symbol` varchar(1111) NOT NULL,
  `photo` varchar(1111) NOT NULL,
  `area` varchar(1111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

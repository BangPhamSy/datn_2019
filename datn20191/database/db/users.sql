-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 06:16 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems4`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(109) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `created_at`, `remember_token`, `updated_at`) VALUES
(1, 'Student5', 'student5@gmail.com', '$2y$10$Z32/7UtQd0S.0gcnLdm/W.j/cWdhI2HHeKF1yvD4MtXQcVoM7Xi.2', 3, '2019-03-14 08:00:40', NULL, '2019-03-14 08:00:40'),
(2, 'BangPS', 'bangps@gmail.com', '$2y$10$Ge821pXgLVX3LYfXZBzjje5e4wZK.GuH49RHJOIiXLUCqn1VXexge', 1, '2019-03-14 09:21:42', NULL, '2019-03-14 09:21:42'),
(3, 'Teacher1', 'teacher1@gmail.com', '$2y$10$pwXw3doU.4UeDekvcjDf0.opAWP.rVNgJQO4dLUiwTcBDA58Jss2C', 2, '2019-03-14 10:01:18', NULL, '2019-03-14 10:01:18'),
(4, 'Student2', 'student2@gmail.com', '$2y$10$9G05cCUoEDznYNsuoI.61uIJajiReyKIFM2MVKBul6b5BLN8sRHR2', 3, '2019-03-20 23:25:47', NULL, '2019-03-20 23:25:47'),
(17, 'Pham Bang', '20155119@gmail.com', '$2y$10$u1WkuIm/rHltcTRV9AtuNOHwjablnVd/VPZvxOl6Q6/xtHkioPzHm', 3, '2019-03-20 17:00:00', NULL, '2019-03-20 17:00:00'),
(18, 'Khổng Minh', '20155120@gmail.com', '$2y$10$Z2GcbGhy69bNM5b4T1sBfO2hy/TN5lkOBD3i6wUbn9AXox800TOnK', 3, '2019-03-20 17:00:00', NULL, '2019-03-20 17:00:00'),
(19, 'ollaa', 'ssa@gmail.com', '$2y$10$VcuwoRgHp5y3XNU.mGJDrOqnaxZAu9tEOYbPlBeT.a5B/6DoZkRpS', 2, '2019-03-25 17:00:00', NULL, NULL),
(27, 'aak', 'ssa113@gmail.com', '$2y$10$7ejSdGTKPUrIQbDsQZ7lxeqET31yK5CdilXBFvS0AiLEWJzm1LaVm', 2, '2019-03-25 17:00:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

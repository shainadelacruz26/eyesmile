-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 03:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `ext_name` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clinic` varchar(100) DEFAULT NULL,
  `insurance` tinyint(1) NOT NULL,
  `insurance_no` int(11) NOT NULL,
  `insurance_exp` date DEFAULT NULL,
  `procedure_type` varchar(100) NOT NULL,
  `preffered_date` date NOT NULL,
  `preffered_time` time NOT NULL,
  `reference_no` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT 'Pending',
  `date_encoded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `first_name`, `last_name`, `middle_name`, `ext_name`, `phone`, `email`, `clinic`, `insurance`, `insurance_no`, `insurance_exp`, `procedure_type`, `preffered_date`, `preffered_time`, `reference_no`, `status`, `date_encoded`) VALUES
(1, 'sdsds', 'dfd', 'dfdf', 'fdf', 'fdf', 'dfdf@gmail.com', 'clinic1', 0, 0, '2023-12-26', '0', '2023-12-20', '00:00:00', '', '', '2023-12-04 16:59:29'),
(2, 'sdsds', 'dfd', 'dfdf', 'fdf', 'fdf', 'dfdf@gmail.com', 'clinic1', 0, 0, '2023-12-26', '0', '2023-12-20', '00:00:00', '', '', '2023-12-04 17:19:07'),
(10, 'Shaina Bianca', 'Dela Cruz', 'dgdg', 'dgdgd', '09128280311', 'fshaina75@gmail.com', 'clinic1', 0, 0, '2023-12-20', 'procedure1', '2023-12-14', '00:00:00', '', 'Pending', '2023-12-04 20:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `otp_check`
--

CREATE TABLE `otp_check` (
  `id` int(255) NOT NULL,
  `otp` varchar(128) NOT NULL,
  `is_expired` varchar(128) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_check`
--

INSERT INTO `otp_check` (`id`, `otp`, `is_expired`, `create_at`) VALUES
(1, '58118', '0', '0000-00-00 00:00:00'),
(2, '71351', '0', '0000-00-00 00:00:00'),
(3, '38463', '0', '0000-00-00 00:00:00'),
(4, '44081', '0', '0000-00-00 00:00:00'),
(5, '94320', '0', '0000-00-00 00:00:00'),
(6, '64224', '1', '2023-11-30 12:55:52'),
(7, '12674', '0', '2023-11-30 14:26:28'),
(8, '58123', '0', '2023-11-30 14:27:36'),
(9, '67695', '0', '2023-12-02 13:05:40'),
(10, '57211', '0', '2023-12-02 13:07:25'),
(11, '71241', '0', '2023-12-02 16:13:33'),
(12, '83836', '0', '2023-12-02 16:14:22'),
(13, '44780', '0', '2023-12-02 16:15:17'),
(14, '76918', '0', '2023-12-02 16:15:55'),
(15, '96870', '0', '2023-12-02 16:22:51'),
(16, '54824', '0', '2023-12-02 16:30:19'),
(17, '23200', '0', '2023-12-02 16:30:28'),
(18, '38657', '0', '2023-12-02 16:30:59'),
(19, '87350', '0', '2023-12-02 16:53:36'),
(20, '65780', '0', '2023-12-02 17:00:40'),
(21, '77068', '0', '2023-12-02 17:00:45'),
(22, '39208', '0', '2023-12-02 17:04:10'),
(23, '57317', '0', '2023-12-02 17:08:56'),
(24, '86228', '0', '2023-12-02 17:15:57'),
(25, '69498', '0', '2023-12-02 17:24:25'),
(26, '81354', '0', '2023-12-02 17:26:22'),
(27, '40312', '0', '2023-12-02 17:29:29'),
(28, '48977', '0', '2023-12-02 17:29:55'),
(29, '85821', '0', '2023-12-02 17:32:05'),
(30, '33162', '0', '2023-12-02 17:35:06'),
(31, '76605', '1', '2023-12-02 17:44:53'),
(32, '95819', '1', '2023-12-02 17:49:33'),
(33, '79140', '1', '2023-12-03 06:13:23'),
(34, '13755', '1', '2023-12-03 06:17:29'),
(35, '29708', '0', '2023-12-03 06:21:36'),
(36, '30471', '1', '2023-12-03 06:25:28'),
(37, '13329', '1', '2023-12-03 06:28:33'),
(38, '91332', '1', '2023-12-03 06:29:12'),
(39, '64272', '1', '2023-12-03 06:32:10'),
(40, '80783', '1', '2023-12-03 11:43:05'),
(41, '17513', '1', '2023-12-03 11:50:54'),
(42, '25879', '0', '2023-12-03 11:52:50'),
(43, '21025', '0', '2023-12-03 14:58:49'),
(44, '55249', '1', '2023-12-03 14:59:20'),
(45, '11962', '1', '2023-12-03 15:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT '',
  `status` tinyint(1) DEFAULT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `user_type`, `status`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'Admin', 'sdsds', 'testing@gmail.com', 'test123', 'sdss', 'admin', 0, NULL, NULL),
(2, 'Staff', '4545', 'testing2@gmail.com', 'test321', '45545', 'Select Role', 0, '17b6c5b8a11bdbba3f02232f0a85b50f9c9380125a9fa99eeadd69dab194a5f2', '2023-11-28 12:54:31'),
(3, 'Test3', 'sdsd', 'workmail3r@gmail.com', 'testing', 'sdsds', 'Select Role', 0, '33617b10567e6f0ef6b71c73c92cad9e64a7badfd0a5d13aa7a7181dc2746362', '2023-11-30 15:57:08'),
(4, 'shaina', 'dela cruz', 'caps77602@gmail.com', '$2y$10$w7dhT.d6mpxu5iYw1xboYu.8RVzVEEtVlKIDcYUrGWaX4esKy91yq', 'e55e565656', 'admin', 0, 'bb2484a238881cacb5416a624e56c7ad332819c1dcc3f359448591d519d69b1d', '2023-12-02 19:04:29'),
(11, 'Shaina Bianca', 'Dela Cruz', 'fshaina75@gmail.com', 'ina2002', '008080', 'admin', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `otp_check`
--
ALTER TABLE `otp_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `otp_check`
--
ALTER TABLE `otp_check`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 09:27 PM
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
-- Database: `hmisphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `his_admin`
--

CREATE TABLE `his_admin` (
  `ad_id` int(20) NOT NULL,
  `ad_fname` varchar(200) DEFAULT NULL,
  `ad_lname` varchar(200) DEFAULT NULL,
  `ad_email` varchar(200) DEFAULT NULL,
  `ad_pwd` varchar(200) DEFAULT NULL,
  `ad_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_admin`
--

INSERT INTO `his_admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`) VALUES
(1, 'System', 'Administrator', 'admin@mail.com', '4c7f5919e957f354d57243d37f223cf31e9e7181', 'doc-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `his_docs`
--

CREATE TABLE `his_docs` (
  `doc_id` int(20) NOT NULL,
  `doc_fname` varchar(200) DEFAULT NULL,
  `doc_lname` varchar(200) DEFAULT NULL,
  `doc_email` varchar(200) DEFAULT NULL,
  `doc_pwd` varchar(200) DEFAULT NULL,
  `doc_number` varchar(200) DEFAULT NULL,
  `doc_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_docs`
--

INSERT INTO `his_docs` (`doc_id`, `doc_fname`, `doc_lname`, `doc_email`, `doc_pwd`, `doc_number`, `doc_dpic`) VALUES
(13, 'Gunawan', 'Rio', 'rio@mail.com', 'adcd7048512e64b48da55b027577886ee5a36350', 'GRW17', 'fotor-ai-2024031725544.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `his_patients`
--

CREATE TABLE `his_patients` (
  `pat_id` int(20) NOT NULL,
  `pat_fname` varchar(200) DEFAULT NULL,
  `pat_gender` varchar(20) NOT NULL,
  `pat_age` int(3) NOT NULL,
  `pat_diagnose` varchar(200) NOT NULL,
  `pat_date_joined` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_patients`
--

INSERT INTO `his_patients` (`pat_id`, `pat_fname`, `pat_gender`, `pat_age`, `pat_diagnose`, `pat_date_joined`) VALUES
(1, 'Record 1', 'Perempuan', 20, 'Jantung normal', '2024-04-27 04:10:32.572882'),
(2, 'Record 2', 'Perempuan', 28, 'Jantung normal', '2024-04-27 05:31:52.523482'),
(3, 'Record 3', 'Perempuan', 38, 'Jantung normal', '2024-04-27 06:40:39.163882'),
(4, 'Record 4', 'Laki - Laki', 42, 'Jantung normal', '2024-04-27 07:10:14.183527'),
(5, 'Record 5', 'Laki - Laki', 32, 'Jantung normal', '2024-04-27 11:28:29.128937'),
(6, 'Record 6', 'Perempuan', 35, 'Jantung normal', '2024-04-28 05:10:12.122456'),
(7, 'Record 7', 'Laki - Laki', 26, 'Jantung normal', '2024-04-28 14:23:14.172649'),
(8, 'Record 8', 'Perempuan', 32, 'Jantung normal', '2024-04-28 15:13:15.167251'),
(9, 'Record 9', 'Perempuan', 20, 'Jantung normal', '2024-04-29 04:43:14.127859'),
(10, 'Record 10', 'Perempuan', 45, 'Jantung normal', '2024-04-29 05:17:34.828751'),
(11, 'Record 11', 'Perempuan', 32, 'Jantung normal', '2024-04-29 07:46:31.124514'),
(12, 'Record 12', 'Perempuan', 26, 'Jantung normal', '2024-04-29 08:10:51.128763'),
(13, 'Record 13', 'Perempuan', 34, 'Jantung normal', '2024-04-29 11:41:11.127846'),
(14, 'Record 14', 'Perempuan', 41, 'Jantung normal', '2024-04-29 12:31:36.381638'),
(15, 'Record 15', 'Laki - Laki', 45, 'Jantung normal', '2024-04-29 12:45:59.271946'),
(16, 'Record 16', 'Laki - Laki', 34, 'Jantung normal', '2024-04-29 13:18:57.892331'),
(17, 'Record 17', 'Perempuan', 38, 'Jantung normal', '2024-04-29 14:15:34.573629'),
(18, 'Record 18', 'Perempuan', 50, 'Jantung normal', '2024-04-29 14:51:36.194783');

-- --------------------------------------------------------

--
-- Table structure for table `his_pwdresets`
--

CREATE TABLE `his_pwdresets` (
  `id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `date_joined` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `his_pwdresets`
--

INSERT INTO `his_pwdresets` (`id`, `email`, `pwd`, `status`, `date_joined`, `token`) VALUES
(12, 'rio@mail.com', '2CB6YDQaGm', 'Reset', '2024-04-29 19:05:19.940499', '7cf9bcc8a471d9259180');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `his_admin`
--
ALTER TABLE `his_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `his_docs`
--
ALTER TABLE `his_docs`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `his_patients`
--
ALTER TABLE `his_patients`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `his_pwdresets`
--
ALTER TABLE `his_pwdresets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `his_admin`
--
ALTER TABLE `his_admin`
  MODIFY `ad_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_docs`
--
ALTER TABLE `his_docs`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `his_patients`
--
ALTER TABLE `his_patients`
  MODIFY `pat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `his_pwdresets`
--
ALTER TABLE `his_pwdresets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

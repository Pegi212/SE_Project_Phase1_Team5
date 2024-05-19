-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 09:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alb_esthetics`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`) VALUES
(7, 'Pegi');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(11) NOT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `s_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `docclinic` varchar(15) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `specialties` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `surname`, `docclinic`, `country`, `city`, `address`, `specialties`, `telephone`, `department`) VALUES
(13, 'John', 'Doe', 'Dermatology Cli', 'USA', 'New York', '123 Main St', '4', '123-456-7890', 'Dermatology Department'),
(14, 'Jane', 'Smith', 'Pediatric Clini', 'USA', 'Los Angeles', '456 Oak St', '4', '987-654-3210', 'Pediatric Department'),
(16, 'Emily', 'Williams', 'Surgical Clinic', 'Canada', 'Toronto', '101 Pine St', '4', '222-333-4444', 'Surgical Department'),
(17, '       Davidi', 'Brown', 'Hair Restoratio', 'Australia', 'Sydney', '202 Maple St', '1', '111-222-3333', 'Hair Restoration Department'),
(22, '      dfsd aas', ' scaa', 'sdsad ', '', 'Mali Robit', 'asd', '1', ' 123123123 ', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `reg_date` datetime NOT NULL,
  `ptel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `surname`, `address`, `country`, `city`, `reg_date`, `ptel`) VALUES
(23, 'p1we', 's1', 'sds', '', 'Durres', '2024-05-12 00:00:00', '0355699555');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `s_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`s_time`) VALUES
('08:00'),
('08:30'),
('09:00'),
('09:30'),
('10:00'),
('10:30'),
('11:00'),
('11:30'),
('12:00'),
('12:30'),
('13:00'),
('13:30'),
('14:00'),
('14:30'),
('15:00'),
('15:30'),
('16:00'),
('16:30'),
('17:00'),
('17:30'),
('18:00'),
('18:30');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(2) NOT NULL,
  `sname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `sname`) VALUES
(1, 'Medical Dermatology'),
(2, 'Cosmetic Dermatology'),
(3, 'Surgical Dermatology'),
(4, 'Pediatric Dermatology'),
(5, 'Plastic Surgery'),
(6, 'Dermatopathology'),
(7, 'Mohs Surgery'),
(8, 'Dermatologic Oncology'),
(9, 'Dermatologic Immunology'),
(10, 'Dermatologic Surgery'),
(11, 'Laser Dermatology'),
(12, 'Dermatologic Infectious Diseases'),
(13, 'Teledermatology'),
(14, 'Dermatoeidemiology'),
(15, 'Dermato-trichology'),
(16, 'Dermatologic Allergy'),
(17, 'Dermatologic Genomics'),
(18, 'Dermatologic Toxicology'),
(19, 'Dermatologic Radiology');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` enum('a','d','p') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `usertype`) VALUES
(6, 'admin@alb_esthetics.com', '$2y$10$Ael6oaqXBIAj8ao1HQ0gw.0o2VeGAHyS2KXiSuiC9hldIneThAFFq', 'a'),
(7, 'admin@albesthetics.com', '$2y$10$Ael6oaqXBIAj8ao1HQ0gw.0o2VeGAHyS2KXiSuiC9hldIneThAFFq', 'a'),
(13, 'john@example.com', 'password123', 'd'),
(14, 'jane@example.com', 'password456', 'd'),
(16, 'emily@example.com', 'password101112', 'd'),
(17, 'david@example.com', '$2y$10$wHr8zv/eU.47CF5Aw.2G/.qztG7Vck9Bm87aBlgbPtCG3t.RRXlQK', 'd'),
(22, 'casca@gsd.com', '$2y$10$7cUxsfpo67LhdjHWnlXZY.EatBMMYyq1ppKkCDzzmbu4HgbCBwN5y', 'd'),
(23, 'ronaldorucid56@gmail.com', '$2y$10$7cUxsfpo67LhdjHWnlXZY.EatBMMYyq1ppKkCDzzmbu4HgbCBwN5y', 'p');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`s_time`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

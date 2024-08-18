-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 07:09 PM
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
-- Database: `stu_id_card`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblprint`
--

CREATE TABLE `tblprint` (
  `print_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `printed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblprint`
--

INSERT INTO `tblprint` (`print_id`, `stu_id`, `user_id`, `printed_date`) VALUES
(3, 1, 1, '2007-10-24'),
(5, 3, 1, '2007-10-24'),
(7, 4, 1, '2007-11-24'),
(13, 4, 1, '2007-11-24'),
(14, 4, 1, '2007-11-24'),
(15, 4, 1, '2007-11-24'),
(16, 11, 1, '2007-11-24'),
(17, 4, 1, '2007-11-24'),
(18, 4, 1, '2007-11-24'),
(19, 12, 1, '2007-11-24'),
(20, 12, 1, '2007-11-24'),
(21, 12, 1, '2007-11-24'),
(22, 12, 1, '2007-11-24'),
(23, 11, 1, '2007-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `stu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `couse` varchar(30) NOT NULL,
  `stu_class` varchar(30) NOT NULL,
  `stu_img` varchar(255) NOT NULL,
  `exp_date` varchar(15) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`stu_id`, `user_id`, `firstname`, `lastname`, `othername`, `gender`, `phonenumber`, `couse`, `stu_class`, `stu_img`, `exp_date`, `created_date`) VALUES
(1, 0, 'Abubakar', 'Sajo', '', 'male', '08063044690', 'science', 'SS_ONE_A', '', '2024-07-08', '2024-07-04'),
(4, 1, 'Ibrahim', 'Sali', '', 'male ', '02025896325', 'art', 'SS_TWO_A', 'altumcode-U0tBTn8UR8I-unsplash.jpg', '', '2024-07-08'),
(11, 1, 'Rabiat', 'Abdulsalam', '', 'female ', '09123345678', 'science', 'SS_ONE_B', 'altumcode-U0tBTn8UR8I-unsplash.jpg', '2024-07-11', '2024-07-11'),
(12, 1, 'Abubakar', 'sajo', '', 'male ', '02020202028', 'science', 'SS_ONE_A', 'img.jpg', '2024-07-11', '2024-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `registered_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `firstname`, `lastname`, `othername`, `email`, `gender`, `username`, `password`, `user_role`, `status`, `registered_date`) VALUES
(1, 'Rabiatu', 'Musa', '', 'rabi@gmail.com', 'female', 'abbksajo', '12345', 'user', 1, '2024-07-09'),
(2, 'Abubakar ', 'Sajo', '', 'abbk@gmail.com', 'male', '', 'Abk12345', 'admin', 1, '2024-07-09'),
(4, 'Yusuf', 'Musa', 'Ali', 'yusuf@gmail.com', 'male', '', '12345', 'user', 1, '2024-07-11'),
(12, 'Yusuf', 'Musa', '', ' yusuf@gmail.com', 'male', '', '1111', 'admin', 1, '2024-07-11'),
(15, 'Abubakar', 'Sajo', '', 'abbk@gmail.com', 'male', '', 'admin', 'admin', 1, '2024-07-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblprint`
--
ALTER TABLE `tblprint`
  ADD PRIMARY KEY (`print_id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblprint`
--
ALTER TABLE `tblprint`
  MODIFY `print_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

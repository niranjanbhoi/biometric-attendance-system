-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 08:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creative_tm`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_admin`
--

CREATE TABLE `ct_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `password` varchar(60) CHARACTER SET latin1 NOT NULL,
  `images` varchar(250) NOT NULL,
  `user_type` text CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ct_admin`
--

INSERT INTO `ct_admin` (`id`, `username`, `email`, `password`, `images`, `user_type`, `date`) VALUES
(7, 'helloworld', 'helloworld@hotmail.com', '$2y$10$rGlxGsESTmcGkteS5ePh2.MuTMafewnFtuTLh7BzoLK2l4JCtzuJu', 'placeholder.jpg', '2', '2020-04-07 19:19:44'),
(8, 'admin', 'admin@hotmail.com', '$2y$10$rGlxGsESTmcGkteS5ePh2.MuTMafewnFtuTLh7BzoLK2l4JCtzuJu', 'IMG_20190701_235114_883.jpg', '1', '2020-04-07 19:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `ct_blog`
--

CREATE TABLE `ct_blog` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ct_blog`
--

INSERT INTO `ct_blog` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'Bld Mihail Kogalniceanu, nr. 8,\r\n7652 Bucharest,\r\nRomania', 'creativetm@gmail.com', 8975275060, NULL, 'Mon - Fri, 8:00-22:00');

-- --------------------------------------------------------

--
-- Table structure for table `ct_device_info`
--

CREATE TABLE `ct_device_info` (
  `id` int(11) NOT NULL,
  `device_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `device_ip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `device_mac` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ct_device_info`
--

INSERT INTO `ct_device_info` (`id`, `device_name`, `device_ip`, `device_mac`) VALUES
(2, 'raspberrypi', '127.0.1.1', '202481595080174');

-- --------------------------------------------------------

--
-- Table structure for table `ct_register`
--

CREATE TABLE `ct_register` (
  `id` int(255) NOT NULL,
  `sha_hash` varchar(255) CHARACTER SET swe7 NOT NULL,
  `images` varchar(255) CHARACTER SET swe7 NOT NULL,
  `firstname` varchar(50) CHARACTER SET swe7 NOT NULL,
  `lastname` varchar(50) CHARACTER SET swe7 NOT NULL,
  `date` date NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `smob` int(10) NOT NULL,
  `pmob` int(10) NOT NULL,
  `gender` varchar(6) CHARACTER SET swe7 NOT NULL,
  `address` varchar(255) CHARACTER SET swe7 NOT NULL,
  `pin` int(6) NOT NULL,
  `state` varchar(50) CHARACTER SET swe7 NOT NULL,
  `city` varchar(50) CHARACTER SET swe7 NOT NULL,
  `device_ip` varchar(50) CHARACTER SET swe7 NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ct_register`
--

INSERT INTO `ct_register` (`id`, `sha_hash`, `images`, `firstname`, `lastname`, `date`, `email`, `smob`, `pmob`, `gender`, `address`, `pin`, `state`, `city`, `device_ip`, `creation_date`) VALUES
(11, '', 'FB_IMG_15280595311318648.jpg', 'vaivhavi', 'mehta', '2020-04-24', 'admin@gmail.com', 2147483647, 2147483647, 'Male', 'At/p ramanand nagar', 416308, 'Maharashtra', 'Sangli', '127.0.1.1', '2020-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `ct_role`
--

CREATE TABLE `ct_role` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `creation_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ct_role`
--

INSERT INTO `ct_role` (`id`, `name`, `description`, `creation_date`) VALUES
(13, 'Admin', 'This is the administration role	', '2020-03-11 14:41:42'),
(14, 'Creator', 'This is the creator role', '2020-03-11 14:43:51'),
(15, 'Member', 'This is the member role', '2020-03-11 14:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `ct_user_entry`
--

CREATE TABLE `ct_user_entry` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `device_ip` varchar(11) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `time` time NOT NULL,
  `ct_io_status` int(1) NOT NULL,
  `out_time` time NOT NULL,
  `L_E_entey` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_admin`
--
ALTER TABLE `ct_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ct_blog`
--
ALTER TABLE `ct_blog`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ct_device_info`
--
ALTER TABLE `ct_device_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ct_register`
--
ALTER TABLE `ct_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ct_role`
--
ALTER TABLE `ct_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ct_user_entry`
--
ALTER TABLE `ct_user_entry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ct_admin`
--
ALTER TABLE `ct_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ct_blog`
--
ALTER TABLE `ct_blog`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ct_device_info`
--
ALTER TABLE `ct_device_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ct_register`
--
ALTER TABLE `ct_register`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ct_role`
--
ALTER TABLE `ct_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ct_user_entry`
--
ALTER TABLE `ct_user_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2023 at 02:53 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crgm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_name`, `email`, `admin_password`) VALUES
('Mario', 'gauran33@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `ivy`
--

CREATE TABLE `ivy` (
  `id` int(11) NOT NULL,
  `waeq` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT NULL,
  `added_by` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`, `access`, `added_by`) VALUES
(1, 'Mario', 'gauran', 'gauran33@gmail.com', '25d55ad283aa400af464c76d713c07ad', '09268119607', 'Mallig', 'administrator', '2023-10-15 09:12:23'),
(2, 'Ivy', 'Sarmientp', 'sarmiento@gmail.com', '25f9e794323b453885f5181f1b624d0b', '09123456789', 'Roxas', 'cashier', '2023-10-15 09:13:14'),
(3, 'Lerie', 'De Guzman', 'deguzman@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '09987654321', 'Roxas', 'accounting', '2023-10-15 09:14:07'),
(4, 'Jay-em', 'Agriam', 'agriam@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '09325416874', 'Mallig', 'crgm', '2023-10-16 09:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `rice_production_dry_activities`
--

CREATE TABLE `rice_production_dry_activities` (
  `id` int(11) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `land_preparation` varchar(255) NOT NULL,
  `seed_sowing` varchar(255) NOT NULL,
  `mulluscicide` varchar(255) NOT NULL,
  `transplanting_direct_seeding` varchar(255) NOT NULL,
  `basal` varchar(255) NOT NULL,
  `first_fertilizer_application` varchar(255) NOT NULL,
  `herbicide` varchar(255) NOT NULL,
  `second_fertilizer_application` varchar(255) NOT NULL,
  `insecticide` varchar(255) NOT NULL,
  `top_dress` varchar(255) NOT NULL,
  `foliar_with_insecticide` varchar(255) NOT NULL,
  `harvest_gross` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rice_production_wet_activities`
--

CREATE TABLE `rice_production_wet_activities` (
  `id` int(11) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `land_preparation` varchar(255) NOT NULL,
  `seed_sowing` varchar(255) NOT NULL,
  `mulluscicide` varchar(255) NOT NULL,
  `transplanting_direct_seeding` varchar(255) NOT NULL,
  `basal` varchar(255) NOT NULL,
  `first_fertilizer_application` varchar(255) NOT NULL,
  `herbicide` varchar(255) NOT NULL,
  `second_fertilizer_application` varchar(255) NOT NULL,
  `insecticide` varchar(255) NOT NULL,
  `top_dress` varchar(255) NOT NULL,
  `foliar_with_insecticide` varchar(255) NOT NULL,
  `harvest_gross` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rice_production_wet_activities`
--

INSERT INTO `rice_production_wet_activities` (`id`, `activities`, `land_preparation`, `seed_sowing`, `mulluscicide`, `transplanting_direct_seeding`, `basal`, `first_fertilizer_application`, `herbicide`, `second_fertilizer_application`, `insecticide`, `top_dress`, `foliar_with_insecticide`, `harvest_gross`) VALUES
(1, 'asdwa', 'asdgse', 'asdwar', 'ahsd', 'g', 'h', 'gyu', 'gg', 'ug', 'iug', 'iugu', 'ygy', 'gyug');

-- --------------------------------------------------------

--
-- Table structure for table `rice_production_wet_expenses`
--

CREATE TABLE `rice_production_wet_expenses` (
  `id` int(11) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `land_preparation` varchar(255) NOT NULL,
  `seed_sowing` varchar(255) NOT NULL,
  `mulluscicide` varchar(255) NOT NULL,
  `transplanting_direct_seeding` varchar(255) NOT NULL,
  `basal` varchar(255) NOT NULL,
  `first_fertilizer_application` varchar(255) NOT NULL,
  `herbicide` varchar(255) NOT NULL,
  `second_fertilizer_application` varchar(255) NOT NULL,
  `insecticide` varchar(255) NOT NULL,
  `top_dress` varchar(255) NOT NULL,
  `foliar_with_insecticide` varchar(255) NOT NULL,
  `harvest_gross` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ivy`
--
ALTER TABLE `ivy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rice_production_dry_activities`
--
ALTER TABLE `rice_production_dry_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rice_production_wet_activities`
--
ALTER TABLE `rice_production_wet_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rice_production_wet_expenses`
--
ALTER TABLE `rice_production_wet_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ivy`
--
ALTER TABLE `ivy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rice_production_dry_activities`
--
ALTER TABLE `rice_production_dry_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rice_production_wet_activities`
--
ALTER TABLE `rice_production_wet_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rice_production_wet_expenses`
--
ALTER TABLE `rice_production_wet_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

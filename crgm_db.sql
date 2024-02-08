-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 03:42 PM
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
-- Table structure for table `accounting_credit_order`
--

CREATE TABLE `accounting_credit_order` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `business_enterprise` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `totalAmount` decimal(10,2) DEFAULT NULL,
  `ornumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cashier_data`
--

CREATE TABLE `cashier_data` (
  `id` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `ornumber` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `rice` varchar(255) NOT NULL,
  `poultry` varchar(255) NOT NULL,
  `large_ruminants` varchar(255) NOT NULL,
  `aqua_culture` varchar(255) NOT NULL,
  `id_fee` varchar(255) NOT NULL,
  `id_lace` varchar(255) NOT NULL,
  `hard_bound` varchar(255) NOT NULL,
  `cottage_dorm` varchar(255) NOT NULL,
  `sablay` varchar(255) NOT NULL,
  `cap_gown` varchar(255) NOT NULL,
  `deposit` varchar(255) NOT NULL,
  `disallowance` varchar(255) NOT NULL,
  `fin_assistance` varchar(255) NOT NULL,
  `internet_subsc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashier_data`
--

INSERT INTO `cashier_data` (`id`, `date`, `ornumber`, `fullname`, `rice`, `poultry`, `large_ruminants`, `aqua_culture`, `id_fee`, `id_lace`, `hard_bound`, `cottage_dorm`, `sablay`, `cap_gown`, `deposit`, `disallowance`, `fin_assistance`, `internet_subsc`) VALUES
(1, '2024-01-29 00:00:00', '1245312342', 'IVYTOS', '33', '242', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cash_order`
--

CREATE TABLE `cash_order` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `business_enterprise` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `totalAmount` decimal(10,2) DEFAULT NULL,
  `ornumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_order`
--

INSERT INTO `cash_order` (`id`, `fullname`, `created_at`, `product_name`, `business_enterprise`, `code`, `quantity`, `amount`, `totalAmount`, `ornumber`) VALUES
(1, 'marioaa', '2024-01-26', 'bilog', 'Rice Production', 'Agri-01', '10', '50', '500.00', 'asdqwdqaa'),
(2, 'mario', '2024-01-27', 'yots', 'Rice Production', 'Agri-01', '2', '17', '34.00', 'qasdwq'),
(3, 'dran', '2024-01-26', 'bilog', 'Farm Machineries- Harvester', 'Agri-02', '2', '20', '40.00', 'asdwqaq'),
(4, 'dran', '2024-01-27', 'aasad', 'Rice Production', 'Agri-01', '2', '100', '200.00', 'qasdwqa'),
(5, 'ivsy', '2024-01-27', 'Empi', 'Swine Production', 'Agri-07', '5', '140', '700.00', 'adwq'),
(6, 'lerys', '2024-01-27', 'bilog', 'Fishpond Production', 'Agri-05', '17', '60', '1020.00', 'asdnnsdf'),
(7, 'adv', '2024-01-27', 'balatong', 'Vegetable Production', 'Agri-10', '76', '20', '1520.00', 'sdqgxcvrtnhjhtgjuyt'),
(8, 'nar', '2024-01-27', 'gfrer', 'Turmeric Egg', 'Agri-04', '50', '10', '500.00', 'dfewgfh'),
(9, 'fregrteg', '2024-01-27', 'balatong', 'Swine Production', 'Agri-07', '26', '166', '4316.00', 'aferge'),
(10, 'marti', '2024-01-27', 'Empi', 'Farm Machineries- Rotovator', 'Agri-03', '76', '50', '3800.00', 'asferter'),
(11, 'adv', '2024-01-27', 'Empi', 'Mango Production', 'Agri-09', '2', '25', '50.00', 'fgzghrger'),
(12, 'fdgbfdc', '2024-01-29', 'dfbhd', 'Rice Production', 'Agri-01', '1', '1000', '1000.00', 'bxfdbgdfb'),
(13, 'mario dfvd', '2024-03-30', 'mais', 'Rice Production', 'Agri-01', '1', '2500', '2500.00', 'vxvdfgbfdc'),
(14, 'Mario', '2024-01-30', 'asda', 'Poultry Production-small ruminants', 'Agri-08', '2', '20', '40.00', 'wdqdas'),
(15, 'Mariqq', '2024-01-31', 'Kamatis', 'Rice Production', 'Agri-01', '50', '200', '10000.00', '1231412413'),
(16, 'ivyyyy', '2024-01-31', 'jdkhj', 'Rice Production', 'Agri-01', '3', '43', '129.00', 'kfjc'),
(17, 'frkjehe', '2024-01-31', 'jrehfr', 'Rice Production', 'Agri-01', '100', '5000', '500000.00', 'hfurfr');

-- --------------------------------------------------------

--
-- Table structure for table `credit_order`
--

CREATE TABLE `credit_order` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `business_enterprise` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `totalAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_order`
--

INSERT INTO `credit_order` (`id`, `fullname`, `created_at`, `product_name`, `business_enterprise`, `code`, `quantity`, `amount`, `totalAmount`) VALUES
(1, 'dran', '2024-01-26', 'Empi', 'Farm Machineries- Rotovator', 'Agri-03', 17, '140.00', '2380.00'),
(2, 'Mario', '2024-01-28', 'mais', 'Turmeric Egg', 'Agri-04', 2, '27.00', '54.00'),
(3, 'cbgcfb', '2024-01-29', 'fbcf', 'Farm Machineries- Harvester', 'Agri-02', 4, '6.00', '24.00'),
(4, 'dran', '2024-01-29', 'bilog', 'Rice Production', 'Agri-01', 12, '70.00', '840.00');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_data`
--

CREATE TABLE `expenses_data` (
  `id` int(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `business_enterprise` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `expenses` decimal(10,2) DEFAULT NULL,
  `expenses_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses_data`
--

INSERT INTO `expenses_data` (`id`, `created_at`, `business_enterprise`, `code`, `expenses`, `expenses_description`) VALUES
(1, '2024-01-26', 'Rice Production', 'Agri-01', '50.00', 'rice'),
(2, '2024-01-26', 'Farm Machineries- Rotovator', 'Agri-03', '100.00', 'mais'),
(3, '2024-01-28', 'Fishpond Production', 'Agri-05', '788.00', 'maidd');

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
(6, 'dran', 'valerozo', 'dranvalerozo@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '09083220447', 'sandiat', 'crgm', '2023-11-30 12:11:42'),
(7, 'mario', 'echavarre', 'mario@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '09268119607', 'Mallig', 'crgm', '2023-12-03 21:28:07'),
(8, 'lerie', 'de guzman', 'deguzman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1235469874', 'Roxas', 'accounting', '2024-01-09 14:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `id` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `unit_of_issue` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `estimated_unit_cost` varchar(255) NOT NULL,
  `estimated_cost` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_request`
--

INSERT INTO `purchase_request` (`id`, `created_at`, `qty`, `unit_of_issue`, `item_description`, `estimated_unit_cost`, `estimated_cost`, `purpose`) VALUES
(1, '2024-01-16 00:00:00', '24', 'qweq', '1231asd', '4121', '31321', 'fsdfsde');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_credit_order`
--
ALTER TABLE `accounting_credit_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashier_data`
--
ALTER TABLE `cashier_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_order`
--
ALTER TABLE `cash_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_order`
--
ALTER TABLE `credit_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_data`
--
ALTER TABLE `expenses_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_credit_order`
--
ALTER TABLE `accounting_credit_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashier_data`
--
ALTER TABLE `cashier_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cash_order`
--
ALTER TABLE `cash_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `credit_order`
--
ALTER TABLE `credit_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses_data`
--
ALTER TABLE `expenses_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

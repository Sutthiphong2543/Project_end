-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 10:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amornsap_village`
--

-- --------------------------------------------------------

--
-- Table structure for table `announce_news`
--

CREATE TABLE `announce_news` (
  `announce_news_id` int(11) NOT NULL,
  `announce_news_detail` varchar(200) NOT NULL,
  `announce_news_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appeals`
--

CREATE TABLE `appeals` (
  `appeal_id` int(11) NOT NULL,
  `villager_id` int(11) NOT NULL,
  `appeal_subject` varchar(100) NOT NULL,
  `appeal_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expenses_id` int(11) NOT NULL,
  `expenses_date` date NOT NULL,
  `expenses_total_cost` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL,
  `notice_payment_id` int(11) NOT NULL,
  `income_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `villager_id` int(5) NOT NULL,
  `month` int(5) NOT NULL,
  `invoice_cmf` int(5) NOT NULL,
  `elect_bill` int(5) NOT NULL,
  `water_bill` int(5) NOT NULL,
  `another_bill` int(5) NOT NULL,
  `invoice_overdue` int(5) NOT NULL,
  `total_amount` int(5) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status_pay` int(2) NOT NULL DEFAULT 1,
  `img_slip` varchar(250) NOT NULL,
  `pay_amount` int(5) NOT NULL,
  `date_pay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `villager_id`, `month`, `invoice_cmf`, `elect_bill`, `water_bill`, `another_bill`, `invoice_overdue`, `total_amount`, `date_start`, `date_end`, `status_pay`, `img_slip`, `pay_amount`, `date_pay`) VALUES
(19, 46, 1, 100, 0, 0, 0, 0, 100, '2023-01-22', '2023-01-29', 4, '1149281660.jpg', 200, '2023-01-22 21:07:49'),
(20, 48, 1, 100, 0, 0, 0, 0, 100, '2023-01-22', '2023-01-29', 2, '1827944481.jpg', 100, '2023-01-22 21:25:37'),
(21, 50, 1, 100, 0, 0, 0, 0, 100, '2023-01-22', '2023-01-29', 1, '', 0, '0000-00-00 00:00:00'),
(22, 46, 2, 100, 0, 0, 0, 100, 200, '2023-01-25', '2023-02-05', 2, '1736089573.jpg', 200, '2023-01-22 21:34:54'),
(23, 48, 2, 100, 0, 0, 0, 0, 100, '2023-01-25', '2023-02-05', 1, '', 0, '0000-00-00 00:00:00'),
(24, 50, 2, 100, 0, 0, 0, 0, 100, '2023-01-25', '2023-02-05', 1, '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `legal_entity`
--

CREATE TABLE `legal_entity` (
  `legal_entity_id` int(5) NOT NULL,
  `legal_entity_fname` varchar(50) NOT NULL,
  `legal_entity_lname` varchar(30) NOT NULL,
  `legal_entity_tel` varchar(12) NOT NULL,
  `legal_entity_username` varchar(50) NOT NULL,
  `legal_entity_password` varchar(50) NOT NULL,
  `legal_entity_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `legal_entity`
--

INSERT INTO `legal_entity` (`legal_entity_id`, `legal_entity_fname`, `legal_entity_lname`, `legal_entity_tel`, `legal_entity_username`, `legal_entity_password`, `legal_entity_img`) VALUES
(1, 'First', 'Admin', '0888888888', 'admin', 'b9d11b3be25f5a1a7dc8ca04cd310b28', '254369410.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice_payment`
--

CREATE TABLE `notice_payment` (
  `notice_payment_id` int(11) NOT NULL,
  `overdue_id` int(11) NOT NULL,
  `villager_id` int(11) NOT NULL,
  `notice_payment_amount` int(5) NOT NULL,
  `notice_payment_date` date NOT NULL,
  `notice_payment_receipt` int(11) NOT NULL,
  `notice_payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overdues`
--

CREATE TABLE `overdues` (
  `overdue_id` int(11) NOT NULL,
  `villager_id` int(11) NOT NULL,
  `overdue_month` date NOT NULL,
  `overdue_total` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repair_notice`
--

CREATE TABLE `repair_notice` (
  `noti_repair_id` int(11) NOT NULL,
  `villager_id` int(11) NOT NULL,
  `noti_repair_subject` varchar(100) NOT NULL,
  `noti_repair_detail` varchar(150) NOT NULL,
  `noti_repair_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `role_id` int(2) NOT NULL,
  `role_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`role_id`, `role_status`) VALUES
(1, 'ยังอยู่'),
(2, 'ย้ายออก');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'b9d11b3be25f5a1a7dc8ca04cd310b28');

-- --------------------------------------------------------

--
-- Table structure for table `villagers`
--

CREATE TABLE `villagers` (
  `villager_id` int(11) NOT NULL,
  `villager_fname` varchar(50) NOT NULL,
  `villager_lname` varchar(30) NOT NULL,
  `villager_housenum` varchar(10) NOT NULL,
  `villager_tel` varchar(12) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `img_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `villagers`
--

INSERT INTO `villagers` (`villager_id`, `villager_fname`, `villager_lname`, `villager_housenum`, `villager_tel`, `add_date`, `role_id`, `username`, `password`, `img_profile`) VALUES
(46, 'Sutthiphong', 'Singkham', '241/119', '0954690775', '2023-01-17 16:13:56', 1, 'amornsap241119', 'feab66b55151f9544eac2ec2097c14c7', '2068865871.jpg'),
(48, 'สุทธิพงษ์', 'สิงห์คำ', '241/118', '0954690775', '2023-01-17 10:38:59', 1, 'amornsap241118', '0f8b2401e26b0331f59d1e1c262775a7', '1134737351.jpg'),
(50, 'Yanisa', 'noivisat', '241/117', '0854685131', '2023-01-19 09:11:36', 2, 'aoyyanis', 'bf89f5c68c1baaa72390f14827cad98a', '919728075.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announce_news`
--
ALTER TABLE `announce_news`
  ADD PRIMARY KEY (`announce_news_id`);

--
-- Indexes for table `appeals`
--
ALTER TABLE `appeals`
  ADD PRIMARY KEY (`appeal_id`),
  ADD KEY `villager_id` (`villager_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenses_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`),
  ADD KEY `notice_payment_id` (`notice_payment_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `villager_id` (`villager_id`);

--
-- Indexes for table `legal_entity`
--
ALTER TABLE `legal_entity`
  ADD PRIMARY KEY (`legal_entity_id`);

--
-- Indexes for table `notice_payment`
--
ALTER TABLE `notice_payment`
  ADD PRIMARY KEY (`notice_payment_id`),
  ADD KEY `overdue_id` (`overdue_id`),
  ADD KEY `villager_id` (`villager_id`);

--
-- Indexes for table `overdues`
--
ALTER TABLE `overdues`
  ADD PRIMARY KEY (`overdue_id`),
  ADD KEY `villager_id` (`villager_id`);

--
-- Indexes for table `repair_notice`
--
ALTER TABLE `repair_notice`
  ADD PRIMARY KEY (`noti_repair_id`),
  ADD KEY `noti_repair_id` (`noti_repair_id`,`villager_id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villagers`
--
ALTER TABLE `villagers`
  ADD PRIMARY KEY (`villager_id`),
  ADD KEY `role_users` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announce_news`
--
ALTER TABLE `announce_news`
  MODIFY `announce_news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appeals`
--
ALTER TABLE `appeals`
  MODIFY `appeal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenses_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `legal_entity`
--
ALTER TABLE `legal_entity`
  MODIFY `legal_entity_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice_payment`
--
ALTER TABLE `notice_payment`
  MODIFY `notice_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overdues`
--
ALTER TABLE `overdues`
  MODIFY `overdue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repair_notice`
--
ALTER TABLE `repair_notice`
  MODIFY `noti_repair_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `role_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `villagers`
--
ALTER TABLE `villagers`
  MODIFY `villager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `villagers`
--
ALTER TABLE `villagers`
  ADD CONSTRAINT `FK_villagers_role_users` FOREIGN KEY (`role_id`) REFERENCES `role_users` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

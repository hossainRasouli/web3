-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 05:08 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_id` int(10) UNSIGNED NOT NULL,
  `currency_name` varchar(30) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `address` varchar(128) NOT NULL,
  `gender` enum('آقا','خانم','','') NOT NULL,
  `hire_date` date NOT NULL,
  `marital_status` enum('متاهل','مجرد','','') NOT NULL,
  `salary` float UNSIGNED NOT NULL,
  `salary_type` set('معاش ثابت','فیصدی') NOT NULL DEFAULT 'معاش ثابت',
  `shift` varchar(32) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `agreement_paper` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `position_id`, `phone`, `email`, `address`, `gender`, `hire_date`, `marital_status`, `salary`, `salary_type`, `shift`, `photo`, `agreement_paper`, `status`) VALUES
(4, 'Karim', 'Jawadi', 1, '07875454323', 'karim@gmail.com', 'Herart Jebr', '', '2019-04-08', '', 5000, 'معاش ثابت', 'afternoon', 'http//:localhost/imge', 'http//:localhost/imge', 1),
(5, 'محمد جواد', 'احمدی', 1, '0778893334', 'mostafanabavi2016@gmail.com', 'هرات جبرئیل', '', '2019-05-08', '', 50, 'فیصدی', 'پیش ظهر', 'image/1556979451.jpg', 'image/per_1556979451.docx', 1),
(7, 'Mostafa', 'Nabawi', 2, '0777211866', 'mostafanabavi2019@gmail.com', 'هرات جبرئیل', '', '1398-02-01', '', 54, 'فیصدی', 'بعدازظهر', 'image/1558347499.jpg', 'image/per_1558347499.sql', 1),
(11, 'Fahiem', 'Karimi', 1, '0778834334', 'mostafanabavi2d016@gmail.com', 'Herat Jebraiel', '', '1398-03-08', '', 6700, 'معاش ثابت', 'بعدازظهر', 'image/empty_profile.jpg', 'image/agreement.jpg', 1),
(12, 'Jawad', 'yHasani', 1, '0775893334', 'mostafanabavei2016@gmail.com', 'هرات جبرئیل', '', '1398-03-03', '', 5000, 'معاش ثابت', 'قبل ازظهر', 'image/1558949606.jpg', 'image/per_1558949606.pdf', 0),
(14, '3Fahim', 'Karimi', 1, '0708893334', 'mostafanabadvi2016@gmail.com', 'هرات جبرئیل توحید', '', '1398-03-07', 'متاهل', 9000, 'معاش ثابت', 'تمام وقت', 'image/1558950733.jpg', 'image/per_1558950733.docx', 1),
(15, 'Zia', 'yamin', 1, '07766555655', 'zia@gmail.com', 'هرات جبرئیل توحید2', '', '1398-04-01', 'متاهل', 59, 'فیصدی', 'قبل ازظهر', 'image/empty_profile.jpg', 'image/agreement.jpg', 0),
(16, 'حسین', 'رسولی', 1, '0789632171', 'mo.hosain2016@gmail.com', 'هرات، محل حاج عباس، سه راه محمودی', 'آقا', '1398-09-05', 'متاهل', 10000, 'معاش ثابت', 'قبل ازظهر', 'image/1574758503.jpg', 'image/per_1574758503.pdf', 0),
(19, 'حسین', 'رسولی', 1, '0789632172', 'moh.hosain2016@gmail.com', 'هرات، محل حاج عباس، سه راه محمودی', 'آقا', '1398-09-05', 'متاهل', 10000, 'معاش ثابت', 'قبل ازظهر', 'image/1574758931.jpg', 'image/per_1574758931.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary_payment`
--

CREATE TABLE `salary_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_date` date NOT NULL,
  `payment_month` varchar(15) NOT NULL,
  `payment_amount` float NOT NULL,
  `payment_borrow` float NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_payment`
--

INSERT INTO `salary_payment` (`payment_id`, `payment_date`, `payment_month`, `payment_amount`, `payment_borrow`, `employee_id`, `status`) VALUES
(1, '1398-02-03', 'ثــور', 10004000, -9999000, 4, 0),
(6, '1398-02-03', 'ثــور', 4000, 0, 4, 0),
(7, '1398-02-08', 'جــوزا', 4000, 1000, 4, 0),
(8, '1398-03-01', 'جــوزا', 6500, 500, 5, 0),
(9, '1398-02-01', 'اســد', 5000, 0, 4, 0),
(10, '1398-09-05', 'حمل', 4000, 6000, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ssn_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `box_number` varchar(32) NOT NULL,
  `recive_date` date NOT NULL,
  `distribute_date` date DEFAULT NULL,
  `gender` enum('مرد','زن','','') NOT NULL,
  `state` enum('فعال','غیرفعال','','') NOT NULL,
  `secondary_ssn` text,
  `ssn_number` varchar(64) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ssn_id`, `name`, `lname`, `fname`, `box_number`, `recive_date`, `distribute_date`, `gender`, `state`, `secondary_ssn`, `ssn_number`, `status`) VALUES
(1, 'حسین', 'رسولی', 'غلام حسین', '444', '1398-09-05', '1398-09-07', 'مرد', 'فعال', NULL, '4444444444', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `user_level` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `last_name`, `username`, `remember_token`, `password`, `user_level`, `status`) VALUES
(1, 'Hussain', 'Moddaber', 'admin', 'xzhShvKf9CHdkhBoF6S0vHv0Hb6GZrBbnF3ZxTAummqfjzGM1J7DUD482k69', '$2y$10$I5Cg1daymP28uwRhEiByiOxESR5RXFnlkLt26wjaBSGvXSVCI8DBq', 1, 0),
(2, 'حسین', 'رسولی', 'hosain', NULL, '$2y$10$4R6rVyPTLU6CRVE5vnlIy.VptvA0NjaVkY4MJTUdnHdKhNS4xbVVq', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_EmployeePosition` (`position_id`);

--
-- Indexes for table `salary_payment`
--
ALTER TABLE `salary_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ssn_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `salary_payment`
--
ALTER TABLE `salary_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ssn_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_EmployeePosition` FOREIGN KEY (`position_id`) REFERENCES `employee_position` (`position_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

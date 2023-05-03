-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 19 พ.ค. 2022 เมื่อ 04:32 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.3.34-MariaDB-log-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeedplay_1234movie`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tv_cate`
--

CREATE TABLE `tv_cate` (
  `id` int(2) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tv_cate`
--

INSERT INTO `tv_cate` (`id`, `name`, `status`) VALUES
(1, 'ดูทีวีออนไลน์ รายการทีวีออนไลน์', '0'),
(3, 'ดูทีวีออนไลน์ รายการกีฬาออนไลน์', '0'),
(5, 'ช่องรายการถ่ายทอดสด', '0'),
(6, 'รายการสารคดี ท่องเที่ยว', '0'),
(7, 'ข่าวทั่วไป', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tv_cate`
--
ALTER TABLE `tv_cate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tv_cate`
--
ALTER TABLE `tv_cate`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

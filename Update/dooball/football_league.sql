-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2022 at 02:44 PM
-- Server version: 10.3.34-MariaDB-log
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `postkhai_movie6`
--

-- --------------------------------------------------------

--
-- Table structure for table `football_league`
--

CREATE TABLE `football_league` (
  `id` int(11) NOT NULL,
  `date_league` date NOT NULL,
  `time_league` time NOT NULL,
  `home_league` varchar(200) NOT NULL,
  `icon_home` text NOT NULL,
  `visit_league` varchar(200) NOT NULL,
  `icon_visit` text NOT NULL,
  `link_league` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `football_league`
--

INSERT INTO `football_league` (`id`, `date_league`, `time_league`, `home_league`, `icon_home`, `visit_league`, `icon_visit`, `link_league`) VALUES
(1, '2020-12-02', '18:00:00', 'การท่าเรือ เอฟซี', '1607316483_2018231438-hOAuxACa-zas0t51T.png', 'ทดสอบเยือน 2', '1607316489_2018232052-nPunuMCa-YVr2m4Kp.png', 'https://live.thairath.co.th/trtv2/playlist.m3u8'),
(2, '2020-12-07', '12:40:00', 'Shenzhen JiaZhaoye(N)', '1607316410_2020202041-2018231342-6NmiGswS-QRfxNAAA.png', 'Tianjin Teda', '1607316410_2020175658-Shenzhen_FC_2017.png', 'https://thaipbs-live.cdn.byteark.com/live/playlist_1080p/index.m3u8'),
(3, '2020-12-09', '13:00:00', 'Kyoto Sanga', '1607318695_2018232052-nPunuMCa-YVr2m4Kp.png', 'Giravanz Kitakyushu', '1607318695_2020202928-2020234655-2018231925-x0YB6veM-Gp7OHZN8.png', 'https://live2.streaming88.com:7443/live/channel1/playlist.m3u8'),
(4, '2020-12-31', '13:20:00', 'โกรนิงเก้น', '1607318790_2020175658-Shenzhen_FC_2017.png', 'สตุ๊ตการ์ต	', '1607318790_2018231342-S00UK6FG-ddEH2tPe.png', 'https://aka-amd-njpwworld-hls-enlive.akamaized.net/hls/video/njpw_en/njpw_en_channel01_3/chunklist_DVR.m3u8'),
(5, '2020-12-31', '13:00:00', 'จูบิโล อิวาตะ	', '1607318895_2018231744-CO33NAcM-KtABeVh8.png', 'เอสเปรานซ์	', '1607318895_2018231619-hI59rDzS-CxYZ36Gn.png', 'https://live.thairath.co.th/trtv2/playlist.m3u8'),
(6, '2020-12-30', '13:00:00', 'ไรยาซาน วีดีวี (ญ)	', '1607318929_2018231438-bRWF8Vh5-MkKZWjBM.png', 'เชอร์ตาโนโว (ญ)	', '1607318929_2019233151-2018231744-r9aDJ9eM-fXJWG6Mg.png', 'https://freelive.inwstream.com:1936/freelive-edge/onehd/playlist.m3u8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `football_league`
--
ALTER TABLE `football_league`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `football_league`
--
ALTER TABLE `football_league`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

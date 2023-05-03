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
-- โครงสร้างตาราง `tv_post`
--

CREATE TABLE `tv_post` (
  `id` int(2) NOT NULL,
  `tv_cate` text COLLATE utf8_unicode_ci NOT NULL,
  `tv_name` text COLLATE utf8_unicode_ci NOT NULL,
  `tv_img` text COLLATE utf8_unicode_ci NOT NULL,
  `tv_url` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tv_post`
--

INSERT INTO `tv_post` (`id`, `tv_cate`, `tv_name`, `tv_img`, `tv_url`, `title`, `description`, `keyword`, `view`, `detail`) VALUES
(1, '1', 'ช่อง ONE31', '627140dbc11f6_hd-gmmone.png', 'https://freelive.inwstream.com:1936/freelive-edge/onehd/playlist.m3u8', 'ดูทีวีออนไลน์ ดูTV ดูTVonilne ดูช่องone ดูช่องone31 ดูช่อง31 ดูช่องoneonline ดูช่องone31online', 'ดูทีวีออนไลน์ ดูTV ดูTVonilne ดูช่องone ดูช่องone31 ดูช่อง31 ดูช่องoneonline ดูช่องone31online', 'ดูทีวีออนไลน์ ดูTV ดูTVonilne ดูช่องone ดูช่องone31 ดูช่อง31 ดูช่องoneonline ดูช่องone31online', 138, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(2, '1', 'ช่อง 3', '626fd5b010648_hd-ch3.png', 'https://ch3-33-web.cdn.byteark.com/live/playlist.m3u8?x_ark_access_id=D78MkxZFEr5Zr9PE&x_ark_auth_type=ark-v2&x_ark_expires=1652520154&x_ark_max_resolution=720p&x_ark_path_prefix=%2Flive%2F&x_ark_signature=y49FPD_X86se0u28nejUTwZTEZHZytOaURtU25Qb2VLQW1VQXlGcFJmWURNQzFPS0dvU1NCTjBUeUxVTGw3TTNXc01DdmZmRHdEOTh2dFg5SXlsdmFyNEgrSjEzempFMjlyOFd5bTlnclNCVEZBPT0=,e5168d8df815dfe3260cfd10489d2884bk5SL201Y01WdldYaG85aHhnPT0=,1fa87f8ff30a0963d271f5f442b4de2czWG53MERiODM5VnhmM3gzYWhvckc3dVUxamQvalBZM1hoRE1CWW1vQUdwQk12N3ZVTTYzSkhtVG5RNTU3MVRCaWNTZkQrTFdlYTVmdHhKRVIxMVNLUk1xbVZaS01qSy91ekNzYzlPUmhnPT0=,c95ee02786929b63df3abd4aac2d1849bWU9NS84LzIwMjIgMjowNDo1NSBBTSZoYXNoX3ZhbHVlPUw1UERhWHR0dWxJWFA0aW1yWFlkTmc9PSZ2YWxpZG1pbnV0ZXM9MSZzdHJtX2xlbj0xOCZpZD03OTkwMDM=', '1', '1', '1', 122, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(3, '1', 'ช่อง 5', '6271dc5dcd0c1_hd-ch5.png', 'https://freelive2.inwstream.com:1936/freelive-edge/5hd/chunks.m3u8', '', '', '', 64, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(4, '1', 'ช่อง 7', '6271dcead8af6_hd-ch7.png', 'https://freelive.inwstream.com:1936/freelive-edge/7hd/playlist.m3u8', '', '', '', 95, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(39, '3', 'Golf', '627db78b082f6_hd-golf.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/golf/playlist.m3u8', '', '', '', 10, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(40, '3', 'NBA ', '627db83c66e43_hd-nba.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/nba/playlist.m3u8', '', '', '', 12, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(5, '1', 'ช่อง 8', '6271dd2e28a50_hd-ch8.png', 'https://freelive2.inwstream.com:1936/freelive-edge/ch8/chunks.m3u8', '', '', '', 30, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(38, '3', 'Spo TV 2', '627db6757dd06_hd-spotv2.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/spotv2/playlist.m3u8', '', '', '', 7, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(13, '1', 'mono 29', '627298cb8beb1_hd-mono.png', 'https://freelive2.inwstream.com:1936/freelive-edge/mono29/chunks.m3u8', '', '', '', 125, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(14, '1', 'workpoint', '6272992e5de05_hd-workpoint.png', 'https://freelive.inwstream.com:1936/freelive-edge/workpointtv/chunks.m3u8', '', '', '', 27, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(21, '1', 'ช่อง 9', '62729f2881824_InShot_20220504_085953047.jpg', 'https://c0.cdn.vet/live/ch9/i/ch9i.m3u8?sid=bjeMWFkODMyOTA3MjY3MzQ4MDFmMANWZlMzk3NWJhZmU2NTFl', '', '', '', 23, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(37, '3', 'Spo TV 1', '627db64aa99b5_hd-spotv1.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/spotv/playlist.m3u8', '', '', '', 9, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(22, '3', 'ture football 1', '6275b261d17c3_doomovie-epl1.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/tpf1_480/playlist.m3u8', '', '', '', 255, ''),
(24, '3', 'ture football 2', '627c63a28bf32_doomovie-epl2.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/tpf2/playlist.m3u8', '', '', '', 60, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(25, '3', 'ture football 3', '627c63da9fefc_doomovie-epl3.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/tpf3/playlist.m3u8', '', '', '', 20, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(26, '3', 'ture football 4', '627c63f72f30a_doomovie-epl4.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/tpf4/playlist.m3u8', '', '', '', 9, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(15, '1', 'ture4u', '627299955c5e6_sd-24u.png', 'https://freelive.inwstream.com:1936/freelive-edge/true4u/chunks.m3u8', '', '', '', 29, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(16, '1', 'amarin', '62729a04a1489_hd-amarin.png', 'https://amarin-ks7jcc.cdn.byteark.com/fleetstream/amarin-live/index.m3u8m1CenFJZ1BGSlFoVHVFa0ZCalZZcjZOa2gyOGtZNmxPdVd0TDg1SlorVDdsekVHNzg4cFZVbzdkRllLaE9LVkN0L000TnVNYWR1YlJKQktxaVRGWlZCSXJGc29sM1RBPT0=,ad729baa26b7cc51c806626e04d85693', '', '', '', 43, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(17, '1', 'GMM 25', '62729a86262b9_sd-gmmchannel.png', 'https://freelive.inwstream.com:1936/freelive-edge/gmmchannel/playlist.m3u8', '', '', '', 13, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(43, '3', 'NFL', '627f24ee8265a_nfl-network.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/nfl/playlist.m3u8', '', '', '', 13, ''),
(18, '1', 'ไทยรัฐ TV', '62729ad6e364a_hd-thairath.png', 'https://freelive.inwstream.com:1936/freelive-edge/thairahttvhd/playlist.m3u8', '', '', '', 28, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(19, '1', 'PPTV ช่อง 36', '62729b24957bc_hd-pptv.png', 'https://freelive.inwstream.com:1936/freelive-edge/pptvhd/playlist.m3u8', '', '', '', 26, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(20, '1', 'Thai Pbs', '62729b983a350_hd-tpbs.png', 'https://freelive.inwstream.com:1936/freelive-edge/thaipbs/chunks.m3u8', '', '', '', 23, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(44, '3', 'Sport TV 1', '627f648bb5179_InShot_20220514_151241997.jpg', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/sporttv1/playlist.m3u8', '', '', '', 21, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(45, '3', 'Sport TV 2', '627f65398ba9c_InShot_20220514_151456247.jpg', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/sporttv2/playlist.m3u8', '', '', '', 10, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(27, '3', 'ture football 5', '627c6415f0797_doomovie-epl5.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/tpf5/playlist.m3u8', '', '', '', 21, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(28, '3', 'ture sport 1', '627c7749cefd2_hd-tsport1-1.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/thd1/playlist.m3u8', '', '', '', 31, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(29, '3', 'ture sport 2', '627c6649f16a5_hd-tsport2.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/thd2/playlist.m3u8', '', '', '', 21, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(30, '3', 'ture sport 3', '627c6676e198b_hd-tsport3.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/thd3/playlist.m3u8', '', '', '', 11, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(31, '3', 'ture sport 4', '627c67e05041b_hd-tsport4.png', 'https://streaming.livescorethai.net/iptv/epl-bein1.stream/playlist.m3u8', '', '', '', 21, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(32, '3', 'ture sport 5', '627c68d3b823b_sd-tsport5.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/tsp5/playlist.m3u8', '', '', '', 17, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(33, '3', 'ture sport 6', '627c6930b830a_sd-tsport6.png', '', '', '', '', 13, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(34, '3', 'ture sport 7', '627c6952dce9b_sd-tsport7.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/tsp7/playlist.m3u8', '', '', '', 22, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(35, '3', 'bein Sports Premium 1', '627d9c45c960e_epl-bein1.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/bein1premiumarab/playlist.m3u8', '', '', '', 56, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n'),
(36, '3', 'bein Sports Premium 2 ', '627db3f9d9fd0_epl-bein2-1.png', 'https://r1-sn-w5nuxa-o73.googlevideocdn.com/168dooball/bein2premiumarab/playlist.m3u8', '', '', '', 21, '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body></body>\r\n</html>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tv_post`
--
ALTER TABLE `tv_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tv_post`
--
ALTER TABLE `tv_post`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

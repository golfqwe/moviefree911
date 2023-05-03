-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 24 เม.ย. 2022 เมื่อ 02:18 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.3.34-MariaDB-log-cll-lve
-- PHP Version: 7.4.28

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
-- โครงสร้างตาราง `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `m_id` int(6) NOT NULL,
  `title` varchar(555) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link_youtube` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` date NOT NULL DEFAULT '0000-00-00',
  `view` int(11) NOT NULL,
  `tag_1` text COLLATE utf8_unicode_ci NOT NULL,
  `tag_2` text COLLATE utf8_unicode_ci NOT NULL,
  `tag_3` text COLLATE utf8_unicode_ci NOT NULL,
  `tag_4` text COLLATE utf8_unicode_ci NOT NULL,
  `tag_5` text COLLATE utf8_unicode_ci NOT NULL,
  `tag_6` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_tiele` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `blog`
--

INSERT INTO `blog` (`id`, `m_id`, `title`, `detail`, `img`, `link_youtube`, `post_date`, `view`, `tag_1`, `tag_2`, `tag_3`, `tag_4`, `tag_5`, `tag_6`, `meta_tiele`, `meta_description`, `meta_keyword`) VALUES
(2, 1, 'รีวิวหนัง Fantastic Beasts: The Secrets of Dumbledore ความพยายามเฮือกสุดท้าย', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<h2><a href=\"https://movie.trueid.net/\" rel=\"noopener\" target=\"_blank\">หนังใหม่ รีวิวหนัง วิจารณ์หนัง</a>&nbsp;Fantastic Beasts: The Secrets of Dumbledore</h2>\r\n\r\n<p>จักรวาลเวทมนตร์ยังคงดำเนินต่อไป แม้ว่าเวลาจะล่วงเลยผ่านไป 2 ทศวรรษ แต่ก็ยังมีความพยายามที่จะสร้างแฟรนไชส์หนังชุดใหม่ ๆ ออกมา เพื่อขยายความแข็งแกร่งให้กับจักรวาลนี้ และภาคล่าสุดของหนังชุดที่ยังดำเนินเรื่องอยู่ในเวลานนี้ก็คือ&nbsp;&quot;Fantastic Beasts: The Secrets of Dumbledore&quot;&nbsp;ได้ฤกษ์ลงโรงฉายอย่างเป็นทางการ ท่ามกลางการแบกรับแรงกดดันมหาศาลของหนังเรื่องนี้ เพราะนี่อาจจะเป็นเครื่องชี้้ชะตาความเป็น-ความตายของหนังเลยก็ว่าได้...</p>\r\n\r\n<p><img alt=\"รีวิวหนัง Fantastic Beasts: The Secrets of Dumbledore\" src=\"https://cms.dmpcdn.com/moviearticle/2022/03/23/3bbadb90-aa50-11ec-adfd-c3145f5040a3_webp_original.jpg\" /></p>\r\n\r\n<p>Fantastic Beasts: The Secrets of Dumbledore เป็นเรื่องราวเมื่อ ศาสตราจารย์ อัลบัส ดัมเบิลดอร์ รู้ว่าพ่อมดศาสตร์มืด เกลเลิร์ต กรินเดลวัลด์ เริ่มเดินแผนการหวังปกครองโลกเวทมนตร์ด้วยตัวเอง แต่เขาก็ไม่สามารถหยุดอดีตเพื่อนรักได้ด้วยตัวคนเดียว เขาจึงมอบหมายให้ศิษย์รักนักสัตว์วิเศษวิทยา นิวท์ สคามันเดอร์ นำทัพเหล่าพ่อมด-แม่มด รวมถึงมักเกิลนักทำเบเกอรี่ผู้กล้าหาญเผชิญหน้ากับภารกิจเสี่ยงอันตราย ที่พวกเขาต้องต่อสู้กับสัตว์วิเศษทั้งเก่าและใหม่ รวมถึงกองทัพผู้ติดตาม กรินเดลวัลด์ ในสถานการณ์ที่ต้องเดิมพันสูงเช่นนี้ ดัมเบิลดอร์ จะสามารถดึงตัวเพื่อนรักของเขากลับมาได้หรือไม่?</p>\r\n\r\n<p><img alt=\"รีวิวหนัง Fantastic Beasts: The Secrets of Dumbledore\" src=\"https://cms.dmpcdn.com/moviearticle/2021/12/13/801a7eb0-5c28-11ec-bfa1-578c6faec9e4_webp_original.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>คงจะต้องบอกตรง ๆ ว่า การกลับมาครั้งนี้เป็นการเติมเต็มไตรภาคที่เต็มไปด้วยความพยายามอย่างขึงขังของหนังเรื่องนี้ หลังจากที่ภาคก่อนทำเอาไว้ได้ค่อนข้างเลวร้ายและต่ำกว่ามาตรฐาน ทำให้แฟรนไชส์หนังเรื่องนี้ต้องตกอยู่ภายใต้ความเสี่ยง แม้ว่าภาคนี้จะยังคงเต็มไปด้วยทัมนักแสดงและทีมงานชุดเดิม &quot;เดวิด เยตส์&quot; ยังคงกลับมารับหน้าที่กำกับหนังเช่นเคย พร้อมกับ &quot;เจ. เค. โรลลิ่ง&quot; ที่ยังมาทำหน้าที่ดูแลภาพรวมในส่วนของเรื่องราว แม้ว่าเธอจะถูกลดบทบาทไม่ค่อยให้ยุ่งกับบทหนังแล้วก็ตาม</p>\r\n\r\n<p>แต่กระนั้น Fantastic Beasts: The Secrets of Dumbledore ก็ยังคงเป็นความพยายามที่ยังไม่ได้ประสบความสำเร็จได้ดีเลิศอะไรสักเท่าไหร่ แต่เมื่อเปรียบเทียบกับหนังภาคที่แล้ว ก็นับว่าหนังได้ช่วยยกระดับได้ดีขึ้นเป็นเท่าตัว โดยเฉพาะองค์ประกอบของบทหนังที่มีการขัดเกลาและปรับให้ลื่นไหลมากยิ่งขึ้น แม้จะยังไม่ใช่ความกลมกล่อมที่เพอร์เฟคอะไรสักเท่าไหร่ แต่ถือว่าเป็นการพัฒนาไปในทางที่ดี</p>\r\n\r\n<p><img alt=\"รีวิวหนัง Fantastic Beasts: The Secrets of Dumbledore\" src=\"https://cms.dmpcdn.com/moviearticle/2022/03/23/3ba298a0-aa50-11ec-afb5-497601619541_webp_original.jpg\" /></p>\r\n\r\n<p>Fantastic Beasts: The Secrets of Dumbledore ยังคงมีจุดอ่อนในส่วนของแรงดึงดูดและเสน่ห์ของการเล่าเรื่อง เพราะกลายเป็นจุดที่หนังไม่สามารถใกล้เคียงความสมบูรณ์แบบแบบที่ Harry Potter เคยทำเอาไว้ได้เลยสักนิด จึงทำให้ภาคนี้ยังเต็มไปด้วยอรรถรสที่ยังค่อนข้างจืดชืด น่าเบื่อหน่าย และไม่มีแรงดึงดูดเรียกความสนใจให้ตรึงใจสักเท่าไหร่ แม้ว่าหนังจะพยายามสร้างความขึงขังและเข้มข้นมากขึ้นแล้วก็ตาม</p>\r\n\r\n<p>มาในภาคนี้มีองค์ประกอบของตัวละครมากมายเต็มไปหมด แต่หลัก ๆ ก็หลายเป็นการเบนเข็มไปเล่าเรื่องราวหลักของ ดัมเบิลดอร์ ที่ &quot;จู๊ด ลอว์&quot; ได้กลายมาเป็นบทนำ ที่เขาก็ยังคงรับบทนำได้อย่างสมบทบาทตามมาตรฐาน แม้ว่าการขยายฐานของตัวละครนี้จะยังไม่ได้น่าประทับใจสักเท่าไหร่ก็ตาม ในขณะที่ &quot;แมดส์ มิคเคลสัน&quot; ที่เข้ามาเป็น กรินเดลวัลด์ แทนในภาคนี้ ก็นับว่าเขามารับไม้ต่อที่ค่อนข้างน่าพอใจ ไว้วางใจฝีมือการแสดงของเขาไว้ได้เลย และทักษะของเขาก็ช่วยส่งเสริมตัวหนังได้ค่อนข้างดี</p>\r\n\r\n<p><img alt=\"รีวิวหนัง Fantastic Beasts: The Secrets of Dumbledore\" src=\"https://cms.dmpcdn.com/moviearticle/2022/03/23/3b26d8f0-aa50-11ec-8b1f-0d240fa52d21_webp_original.jpg\" /></p>\r\n\r\n<p>แต่กลับกลายเป็นว่า &quot;เอ็ดดี้ เรดเมย์น&quot; ในบท นิวท์ ได้ผันตัวกลายเป็นตัวละครสมทบของหนังเรื่องนี้ไปอย่างน่าเสียดาย เหมือนหนังยังเอาเขามาประดับเอาไว้ เพื่อให้สอดคล้องกับชื่อเรื่องที่ยังต้องใช้ชื่อนี้อยู่ แต่ส่วนประกอบของเขาที่ได้รับหน้าที่นั้นถือว่าค่อนข้างใช้งานได้ไม่เต็มไปประสิทธิภาพ และทอดทิ้งเอาไว้อย่างน่าเสียดาย รวมทั้งองค์ประกอบของเหล่าวิเศษต่าง ๆ ที่หนังเคยปูเรื่องเอาไว้ ถูกทิ้งเอาไว้กลางทางแบบไม่ใยดี และเขาก็ไม่สามารถดึงตัวเองขึ้นมาให้โดดเด่นได้เช่นกัน</p>\r\n\r\n<p>Fantastic Beasts: The Secrets of Dumbledore ยังเป็นภาคที่ถือว่าไม่ได้รู้สึกประทับใจอะไรสักเท่าไหร่ แต่ก็ไม่ถึงกับเลวร้ายเหมือนภาคที่แล้ว ด้วยวิธีการเล่าเรื่องและปมประเด็นต่าง ๆ ที่ยังไม่ทำให้คนดูรู้สึกคล้อยตามได้สักเท่าไหร่ แม้ว่าจะมีความพยายามแก้ไขบทและวิธีเล่าเรื่องแล้วก็ตาม แต่หนังก็ยังมีรสชาติจืดอยู่ กลายเป็น 2 ชั่วโมงที่ถ้าหลับได้ก็หลับไปแล้ว แต่ช่วง 20 นาทีสุดท้ายของหนัง กลายเป็นไคลแม็กซ์ที่น่าจะดีที่สุดเท่าที่หนังเรื่องนี้มอบให้</p>\r\n\r\n<p>ทั้งนี้ หนึ่งในประเด็นที่หนังภาคนี้ถ่ายทอดออกมาให้ชัดเจนยิ่งขึ้นและเป็นสิ่งแปลกใหม่ที่น่าสนใจ นั่นก็คือความเป็นตัวตนของดัมเบิลดอร์ ที่เป็นการขยี้ปมที่ช่วยสร้างกระจ่างให้กับแฟน ๆ ได้มากยิ่งขึ้น โดยเฉพาะประเด็นความสัมพันธ์เขากับ กรินเดลวัลด์ ที่กลายเป็นมิตรภาพที่เหนี่ยวแน่นและยิ่งใหญ่กว่าที่ใครคิด นับว่าเป็นโจทย์ที่ท้าทายที่หนังเลือกที่จะหยิบใส่เข้ามาในหนังเรื่องนี้ กลายเป็นการสร้างความหลากหลายที่ต้องปรบมือให้</p>\r\n\r\n<p>โดยภาพรวมแล้ว Fantastic Beasts: The Secrets of Dumbledore ก็ถือว่าเป็นภาคที่ 3 ของหนังชุดนี้ที่ยังเต็มไปด้วยความพยายามและเจตนาดีที่หมายมั้นจะปลุกพลังให้กับหนังชุดนี้ แต่ในความพยายามนั้นยังไม่สามารถก้าวข้ามจุดด้อยเดิม ๆ ไปได้สักเท่าไหร่นัก แต่ก็ถือว่าเป็นแนวทางการพัฒนาขึ้นจากภาคที่แล้วอย่างชัดเจน ถึงองค์ประกอบการเล่าเรื่องและทิศทางของเรื่องจะยังไม่ดึงดูดใจได้เพียงพอ แต่ก็เป็นสิ่งที่ยังช่วยเติมเต็มจินตนาการของแฟน ๆ หนังชุดได้ไม่มากก็น้อยได้อยู่ดี โดยเฉพาะกลิ่นอายความคิดถึงและอีสเตอร์เอ้กต่างๆ ที่เชื่อมโยงจาก Harry Potter ที่เป็นสิ่งที่ทำให้เราชวนติดตาม...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>\r\n', '23042022125639-3bbadb90-aa50-11ec-adfd-c3145f5040a3_webp_original.jpg', 'znjUF-hMC94', '2022-04-23', 48, 'Dumbledore', 'รีวิวหนัง', 'Fantastic Beasts', '', '', '', 'รีวิวหนัง Fantastic Beasts: The Secrets of Dumbledore', 'รีวิวหนัง Fantastic Beasts: The Secrets of Dumbledore', 'รีวิวหนัง Fantastic Beasts: The Secrets of Dumbledore'),
(3, 1, 'รีวิวNetfilx The Silent Sea', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<section data-element_type=\"section\" data-id=\"92bfc19\">\r\n<p><strong>รีวิวNetflix&nbsp;</strong>The Silent Sea ภารกิจเสี่ยงตายที่กำลังจะเปิดเผยความลับอันดำมืดที่สุดขอดวงจันทร์ กับโอกาสสำหรับการกลับมามีแค่เพียง 10 % เพียงเท่านั้น ลูกเรือทุกคนจะมีชีวิตรอดกลับไปหรือไม่ ปริศนา ณ สถานีร้างบนดวงจันทร์กำลังจะได้เผยโฉมแล้ว</p>\r\n</section>\r\n\r\n<section data-element_type=\"section\" data-id=\"3c463f2\">\r\n<p>สำหรับซีรีส์ The Silent Sea จากทางNetflix ที่เกาหลีกำลังมีความพยายามขึ้นเป็นแนวหน้าในวงการซอฟต์พาวเวอร์ของโลก ซึ่งในระดับเวทีโลกหรือรางวัลต่างๆพวกเขาก็สามารถเขาไปได้ไกลถึง ออสการ์ ได้สำเร็จแล้ว ในด้านความนิยมหนังหรือซีรส์เกาหลีแนวซอมบี้และดราม่ากลายเป็นปรากฏการณ์ที่ฝรั่งเองก็ให้การยอมรับและต้องมารับชมผลงานที่พวกเขาได้สร้างสรรค์ขึ้นมา และอีกหนึ่งเป้าหมายสำคัญของมหาอำนาจภาพยนตร์โลกนั้นเช่นเดียวกับยุคสงครามเย็น มันก็คือการปักธงในหนังแนวไซไฟที่อาจจว่าเป็นขั้นสุดของมวลองค์ความรู้และด้านศักยภาพในทางโปรดักชันของประเทศนั้นๆ ที่ต้องถึงมาตรฐาน และหลังจากความสำเร็จของในทางโปรดักชันที่ทัดเทียมกับงานของ ฮอลลีวูด ได้ใน &ldquo;Space Sweepers&rdquo; (2021) ของ ซงจุงกิ เมื่อช่วงต้นปี2021 ที่ผ่านมา ส่งผลให้โครงการหนัง &ldquo;The Silent Sea&rdquo; ของทาง Netflix เกาหลีได้ดาราระดับแม่เหล็กโลกทั้ง กงยู และ แบดูนา ที่มาร่วมแสดง คือหลักไมล์ที่ต้องจับตามองว่าถึงเวลาเอาจริงของพวกเขาแล้วหรือยัง</p>\r\n</section>\r\n\r\n<section data-element_type=\"section\" data-id=\"f6f797a\"><img alt=\"\" data-lazy-sizes=\"(max-width: 800px) 100vw, 800px\" data-lazy-src=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-1024x683.jpg\" data-lazy-srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-1024x683.jpg 1024w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-300x200.jpg 300w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-768x512.jpg 768w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-1536x1024.jpg 1536w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-2048x1366.jpg 2048w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-272x182.jpg 272w\" data-ll-status=\"loaded\" height=\"534\" sizes=\"(max-width: 800px) 100vw, 800px\" src=\"https://flowthefilm.com/wp-content/uploads/2022/02/%E0%B8%A3%E0%B8%B5%E0%B8%A7%E0%B8%B4%E0%B8%A7Netflix-The-Silent-Sea_Flowthefilm_03-1024x683.jpg\" srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-1024x683.jpg 1024w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-300x200.jpg 300w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-768x512.jpg 768w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-1536x1024.jpg 1536w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-2048x1366.jpg 2048w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_03-272x182.jpg 272w\" width=\"800\" /></section>\r\n\r\n<section data-element_type=\"section\" data-id=\"0b108e4\">\r\n<p><img alt=\"\" data-lazy-sizes=\"(max-width: 728px) 100vw, 728px\" data-lazy-src=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_02.jpg\" data-lazy-srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_02.jpg 728w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_02-300x200.jpg 300w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_02-272x182.jpg 272w\" data-ll-status=\"loaded\" height=\"486\" sizes=\"(max-width: 728px) 100vw, 728px\" src=\"https://flowthefilm.com/wp-content/uploads/2022/02/%E0%B8%A3%E0%B8%B5%E0%B8%A7%E0%B8%B4%E0%B8%A7Netflix-The-Silent-Sea_Flowthefilm_02.jpg\" srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_02.jpg 728w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_02-300x200.jpg 300w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_02-272x182.jpg 272w\" width=\"728\" /></p>\r\n</section>\r\n\r\n<section data-element_type=\"section\" data-id=\"80810c2\">\r\n<p>เนื่องด้วยความคาดหวังที่ตั้งไว้สูง และด้านศักยภาพที่เป็นไปได้ของวัตถุดิบที่รวบรวมมาทั้งนักแสดงและตัวอย่างงานสร้างที่มองดูแล้วน่าสนใจ และได้บทหนังจากนักเขียนบทมือรางวัลอย่าง พาร์อึนเคียว ที่เคยรวมงานกับผู้กำกับมากความสามารถอย่าง บงจุนโฮ ในภาพยนตร์ Mother เมื่อ2009 และยังมีโอกาสได้เขียนหนังระดับบล็อกบัสเตอร์ของเกาหลีอย่าง The Great Battle ในปี2018 มาแล้ว</p>\r\n</section>\r\n\r\n<section data-element_type=\"section\" data-id=\"8944f94\">\r\n<p>แต่ทว่ามันก็อาจจะยังไม่มากพอสำหรับการสร้างมาตรฐานของความคาดหวังที่เราจะมีต่อสำหรับซีรีส์เรื่องนี้ ถึงแม้จะมีนักแสดงดาราคุณภาพระดับ กงยู และ แบดูนา อยู่ในเรื่อง เราก็ต่างคาดหวังไว้ลึกๆของตัวละครที่พวกเขาจะได้ถ่ายทอด ไอเดียวไซไฟที่น่าสนใจและบ่มเพาะมานับตั้งแต่ปี 2014 และอาจก่อนหน้านั้นแต่ช่วง 7 ปีที่พัฒนามา มันกลับยังเต็มไปด้วยรอยรั่วในตัวพล็อตอย่างไม่น่าให้อภัยเพราะดันมาตกม้าตายในเรื่องที่สำคัญอันดับแรกๆคือพื้นฐานของหนังไซไฟคือหลัการและวิธีของทางวิทยาศาสตร์ มันพลาดที่ทั้งๆมีมือเขียนบทระดับรางวัลที่ผ่านงานดราม่าในเวทีระดีบนานาชาติและในเกาหลีก็แข็งแกร่งในเรื่องของการสร้างฉากอารมณ์ แต่เรากลับเห็นแค่เพียงฉากที่รู้สึกรียูสนำไอเดียเก่าๆ จากหนังเรื่องต่างๆ (อย่างเช่น Train to Busan ปี2016) ที่มันอาจจะทำให้คนดูต้องมองและเบ้ปากว่าจะมามุขนี้อีกแล้วเหรอ หรือไม่คิดที่จะนำเสนออะไรที่แปลกใหม่หรือแตกต่างที่น่าสนใจมากพอ</p>\r\n</section>\r\n\r\n<section data-element_type=\"section\" data-id=\"a70a6e8\">\r\n<p>ตัวหนังจะนำเสนอเรื่องของโลกในยุคอนาคตที่น้ำเหือดแห้งไปจนกลายเป็นของมีค่าที่แบ่งแยกสถานะของผู้คนได้จากสิทธิ์การได้รับน้ำ เกาหลีจึงต้องการปลุกโครงการวิจัยบนดวงจันทร์ที่เคยล้มเหลวจนต้องปิดสถานีวิจัยทิ้งเมื่อ 5 ปีก่อน โดยส่งลูกเรือและนักวิทยาศาสตร์ทางด้านพฤติกรรมศาสตร์ที่เคยศึกษาเรื่องชีววิทยาไปกับทีม โดยมีอดีตผู้รอดชีวิตจากสถานีวิจัยเมื่อ 5 ปีก่อนไปด้วยอีกคนซึ่งดูเหมือนว่าทางรัฐบาลจะไม่ได้พูดทุกอย่างที่พวกเขาควรจะได้รู้ก่อนส่งขึ้นไป</p>\r\n\r\n<p><img alt=\"\" data-lazy-sizes=\"(max-width: 720px) 100vw, 720px\" data-lazy-src=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_04.jpg\" data-lazy-srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_04.jpg 720w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_04-300x190.jpg 300w\" data-ll-status=\"loaded\" height=\"457\" sizes=\"(max-width: 720px) 100vw, 720px\" src=\"https://flowthefilm.com/wp-content/uploads/2022/02/%E0%B8%A3%E0%B8%B5%E0%B8%A7%E0%B8%B4%E0%B8%A7Netflix-The-Silent-Sea_Flowthefilm_04.jpg\" srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_04.jpg 720w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_04-300x190.jpg 300w\" width=\"720\" /></p>\r\n<img alt=\"\" data-lazy-sizes=\"(max-width: 800px) 100vw, 800px\" data-lazy-src=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05-1024x683.jpg\" data-lazy-srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05-1024x683.jpg 1024w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05-300x200.jpg 300w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05-768x512.jpg 768w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05-272x182.jpg 272w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05.jpg 1200w\" data-ll-status=\"loaded\" height=\"534\" sizes=\"(max-width: 800px) 100vw, 800px\" src=\"https://flowthefilm.com/wp-content/uploads/2022/02/%E0%B8%A3%E0%B8%B5%E0%B8%A7%E0%B8%B4%E0%B8%A7Netflix-The-Silent-Sea_Flowthefilm_05-1024x683.jpg\" srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05-1024x683.jpg 1024w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05-300x200.jpg 300w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05-768x512.jpg 768w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05-272x182.jpg 272w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_05.jpg 1200w\" width=\"800\" /></section>\r\n\r\n<section data-element_type=\"section\" data-id=\"2edff7e\">\r\n<p>และโดยธรรมชาติของหนังแนวไซไฟธรริลเลอร์ที่อาศัยปริศนาของภารกิจและภูมิหลังความลับของตัวละครที่จะค่อยๆ เริ่มเปิดเผย เราจะได้พบเห็นอุปสรรคจากความบังเอิญและจากการกระทำของเหล่าตัวละครที่จะค่อยๆเติม ค่อยๆเปิดเผย เราจะพบเห็นอุปสรรคจากความบังเอิญและจากากรกระทำของตัวละครเข้ามารุมเร้ากลุ่มตัวละครตั้งแต่เริ่มเรื่อง และต้องจำเพาะเสมอว่าคนที่มีประโยชน์กับภารกิจมากที่สุดจำเป็นต้องตายเป็นคนแรกๆ ซึ่งว่ากันถึงจุดนี้หนังยังประคองทิศทางที่ตัวเองต้องการไปได้ แต่การค่อยๆ เผยเนื้อหาดราม่าตัวละครทีละนิดแต่ก็ไม่ได้ลงดีเทลอะไรมากมายขนาดคนดูเองจะคาดเดาว่าไม่ได้ว่าจะเซอร์ไพรส์หรือก็กลายเป็นซีนอารมณ์ร่วมให้ไม่ต่อเนื่อง เพราะมันยังต้องคอยตัดไปเล่าอีกฉากในอดีตเป็นระยะๆโดยข้อมูลใหม่นั้นไม่ได้มีความน่าตื่นเต้นมากเท่าไหร่ และเมื่อตัวหนังมีพื้นที่ที่ดูจำกัดหลบมุมอยู่แค่ในสถานีวิจัยมันก็ต้องการสิ่งเร้าใดๆ จากอย่างอื่นๆที่มากกว่ามาตรึงความสนใจในตัวผู้ชมซึ่งหนังก็มีความพยายามที่ดีแต่มันยังไม่มากพอเท่าที่ควร</p>\r\n\r\n<p><img alt=\"\" data-lazy-sizes=\"(max-width: 696px) 100vw, 696px\" data-lazy-src=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_06.jpg\" data-lazy-srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_06.jpg 696w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_06-300x190.jpg 300w\" data-ll-status=\"loaded\" height=\"441\" sizes=\"(max-width: 696px) 100vw, 696px\" src=\"https://flowthefilm.com/wp-content/uploads/2022/02/%E0%B8%A3%E0%B8%B5%E0%B8%A7%E0%B8%B4%E0%B8%A7Netflix-The-Silent-Sea_Flowthefilm_06.jpg\" srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_06.jpg 696w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_06-300x190.jpg 300w\" width=\"696\" /></p>\r\n\r\n<p><img alt=\"\" data-lazy-sizes=\"(max-width: 750px) 100vw, 750px\" data-lazy-src=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_08.jpg\" data-lazy-srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_08.jpg 750w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_08-300x169.jpg 300w\" data-ll-status=\"loaded\" height=\"422\" sizes=\"(max-width: 750px) 100vw, 750px\" src=\"https://flowthefilm.com/wp-content/uploads/2022/02/%E0%B8%A3%E0%B8%B5%E0%B8%A7%E0%B8%B4%E0%B8%A7Netflix-The-Silent-Sea_Flowthefilm_08.jpg\" srcset=\"https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_08.jpg 750w, https://flowthefilm.com/wp-content/uploads/2022/02/รีวิวNetflix-The-Silent-Sea_Flowthefilm_08-300x169.jpg 300w\" width=\"750\" /></p>\r\n</section>\r\n\r\n<section data-element_type=\"section\" data-id=\"fd54899\">\r\n<p>ในเรื่องโปรดักชันก็มีความแปลกๆ ให้ได้เจอบ้างในฉากCGของโลกที่แสนจะแร้นแค้นเห็นถนน อาคาร และฐานยิงจรวด แต่เรื่องคุณภาพนั้นแค่ดีกว่าคลิปที่โมเดสสามมิติแบบจำลองทางโฆษณาขายพวกคอนโดขึ้นมานิดหนึ่งเท่านั้น ทั้งเรื่องรายละเอียดและการเคลื่อนกล้องที่แสนธรรมดา ที่สำคัญไปกว่านั้นคือมันติดความหลอกตาอยู่ หากจะลองเทียบกับ &ldquo;Space Sweepers&rdquo; มันหนักหนากว่าตรงโทนเนื้อเรื่องนั้นมันแฟนตาซีแต่เรื่องนี้มันมาทางซีเรียสจริงจังที่ควรเน้นอะไรพวกนี้ให้ดูดีและสมจริงมากกว่านี้</p>\r\n</section>\r\n\r\n<section data-element_type=\"section\" data-id=\"f763af9\">\r\n<p><strong>รับชมตัวอย่างหนัง :&nbsp;The Silent Sea</strong></p>\r\n</section>\r\n</body>\r\n</html>\r\n', '24042022083117-2304202220472.jpg', 'tfIgFZoqr8Y', '2022-04-23', 44, 'Netfilx', 'The Silent Sea', 'รีวิวหนัง', '', '', '', 'รีวิวNetfilx The Silent Sea', 'รีวิวNetfilx The Silent Sea', 'รีวิวNetfilx The Silent Sea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

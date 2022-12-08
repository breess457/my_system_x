-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 02:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nusantara_patani`
--

-- --------------------------------------------------------

--
-- Table structure for table `appeal`
--

CREATE TABLE `appeal` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `date_new` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `header_appeal` varchar(300) NOT NULL,
  `content_appeal` text NOT NULL,
  `appel_image` varchar(100) NOT NULL,
  `post_datenow` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appeal`
--

INSERT INTO `appeal` (`id`, `full_name`, `phone`, `date_new`, `email`, `address`, `header_appeal`, `content_appeal`, `appel_image`, `post_datenow`) VALUES
(5, 'นาย ซอลาฮุดดีน  xxx', '0980986675', '2022-10-05', 'fff@gmail.com', 'xxx', 'xxx', 'xxx', 'img_6357f45c0839c.jpg', '2022-10-25');

-- --------------------------------------------------------

--
-- Table structure for table `board_users`
--

CREATE TABLE `board_users` (
  `bord_id` int(11) NOT NULL,
  `titleboard` varchar(15) NOT NULL,
  `fullname_bord` varchar(350) NOT NULL,
  `lastname_board` varchar(50) NOT NULL,
  `position_bord` varchar(150) NOT NULL,
  `birthday_board` date NOT NULL,
  `number_cardid_board` varchar(15) NOT NULL,
  `occupation_board` varchar(200) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `board_religion` varchar(70) NOT NULL,
  `board_status` varchar(15) NOT NULL,
  `board_age` int(11) NOT NULL,
  `number_of_balls` varchar(9) NOT NULL,
  `board_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board_users`
--

INSERT INTO `board_users` (`bord_id`, `titleboard`, `fullname_bord`, `lastname_board`, `position_bord`, `birthday_board`, `number_cardid_board`, `occupation_board`, `sex`, `board_religion`, `board_status`, `board_age`, `number_of_balls`, `board_image`) VALUES
(4, 'นาย', 'mustafar  ', 'saleh', 'herungi', '2540-04-15', '1940100202441', 'devlopper', 'ชาย', 'islam', 'หม้าย', 25, '3', 'img_63150120a48c9.jpg'),
(5, 'นาย', 'faisol ', 'datu', 'ฝ่ายดูแล', '2541-12-14', '1940200440221', 'นักโบราณคดี', 'ชาย', 'islam', 'แต่งงาน', 29, '1', 'img_631502026b69d.jpeg'),
(6, 'นาย', 'อัฟฟาน', 'นาเซ', 'ฝ่ายการเงิน', '2542-06-13', '1940100303221', 'หน่วยค้นหาทางทะเล(ทหารเรือ)', 'ชาย', 'islam', 'โสด', 32, '0', 'img_631502156b608.jpeg'),
(7, 'นาย', 'cxx', 'yarane', 'รองประธาน', '2540-07-12', '1940100304112', 'รองประธาน สมาคมh', 'ชาย', 'xxx', 'โสด', 25, '0', 'img_631502791cfcd.jpg'),
(8, 'นาย', 'mustafar', 'datu', 'herungi', '2540-07-12', '1940100202447', 'พ่อบ้าน นักฆ่า', 'ชาย', 'islam', 'แต่งงาน', 25, '3', 'img_631502f2e0160.jpg'),
(9, 'นาย', 'mustafar', 'saleh', 'herungi', '2541-09-23', '1940100202449', 'ดารา นักแสดง', 'ชาย', 'islam', 'โสด', 23, '0', 'img_6314fff02d30a.jpg'),
(11, 'นาย', 'มะฮำหมัด', 'ซูคอยรู', 'ฝ่ายช่วยเหลือ', '1999-01-14', '1980100204331', 'กราฟฟิกดีไซน์', 'ชาย', 'อิสลาม', 'โสด', 23, '0', 'img_63448db76bb6a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `board_users2_contact`
--

CREATE TABLE `board_users2_contact` (
  `board2_id` int(11) NOT NULL,
  `get_boardid` int(11) NOT NULL,
  `board_email` varchar(150) NOT NULL,
  `board_facebook` varchar(150) NOT NULL,
  `board_phone` varchar(15) NOT NULL,
  `work_history` varchar(300) NOT NULL,
  `motto` varchar(300) NOT NULL,
  `talent` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board_users2_contact`
--

INSERT INTO `board_users2_contact` (`board2_id`, `get_boardid`, `board_email`, `board_facebook`, `board_phone`, `work_history`, `motto`, `talent`) VALUES
(4, 4, 'fustafar.com', 'mustafa 777', '0940832213', 'เป็นพนักงานบริษัท แห่งหนึ่ง', 'ไม่หลับไม่นอน', 'ไม่หลับไม่นอน'),
(5, 5, 'faison@gmail.com', 'faison', '0840942201', 'เป็นพนักงานบริษัทmedia แห่งหนึ่ง', 'งานไม่เสร็จ ไม่เที่ยว', 'ทำอดิเรตหลายอย่าง'),
(6, 6, 'affan@gmail.com', 'affan_12', '0840942203', 'รับราชการ', 'ไม่ยอมแพ้ตราบใดที่ยังไม่มีเงิน', 'มีความชำนาญด้านการเมือง'),
(7, 7, 'c.com', 'cccc', '0840930098', 'xxx', 'xxx', 'cccc'),
(8, 8, 'fustafarx.com', 'mustafa 777', '0840930098', 'เป็นพนักงานบริษัท แห่งหนึ่ง', 'งานไม่เสร็จ ไม่เที่ยว', 'xxxxx'),
(9, 9, 'fustafar.com', 'mustafa 777d', '0840930091', 'เป็นพนักงานบริษัท แห่งหนึ่ง', 'ไม่หลับไม่นอน', 'คนมันหล่อ'),
(11, 11, 'mahamad12@gmail.com', 'mathamaddim', '0830942201', 'เป็นพนักงานบริษัท แห่งหนึ่ง', 'รักนะจุบๆ', 'รักได้หลายคน');

-- --------------------------------------------------------

--
-- Table structure for table `board_users3_school`
--

CREATE TABLE `board_users3_school` (
  `board3_id` int(11) NOT NULL,
  `get_boardid` int(11) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `institution` varchar(70) NOT NULL,
  `branch` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board_users3_school`
--

INSERT INTO `board_users3_school` (`board3_id`, `get_boardid`, `qualification`, `institution`, `branch`) VALUES
(1, 4, 'ปริญญาตรี', 'ราชฎัตยะลา', 'บัญชี'),
(2, 5, 'ปริญญาโท', 'ธรรมศาสตร์', 'นิติ'),
(3, 6, 'ปริญญาตรี', 'สงขลานคริน', 'การแพทย์'),
(4, 7, 'ปริญญาเอก', 'จุฬาลงกรณ์', 'การเมืองการปกครอง'),
(5, 8, 'ปริญญาโท', 'ราชฎัตเชียงใหม่', 'การเกษตร'),
(6, 9, 'ปริญญาตรี', 'ราชฎัตสงขลา', 'วิศวะไฟฟ้า'),
(8, 11, 'ปริญญาตรี', 'มหาวิทยาลัยราชภัฎยะลา', 'บัญชี');

-- --------------------------------------------------------

--
-- Table structure for table `board_users4_location_address`
--

CREATE TABLE `board_users4_location_address` (
  `board4_id` int(11) NOT NULL,
  `home1_id` varchar(100) NOT NULL,
  `home1_district` varchar(150) NOT NULL,
  `home1_amphoe` varchar(100) NOT NULL,
  `home1_province` varchar(100) NOT NULL,
  `home1_zipcode` varchar(10) NOT NULL,
  `home2_id` varchar(150) NOT NULL,
  `home2_district` varchar(100) NOT NULL,
  `home2_amphoe` varchar(100) NOT NULL,
  `home2_province` varchar(100) NOT NULL,
  `home2_zipcode` varchar(11) NOT NULL,
  `get_boarduser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board_users4_location_address`
--

INSERT INTO `board_users4_location_address` (`board4_id`, `home1_id`, `home1_district`, `home1_amphoe`, `home1_province`, `home1_zipcode`, `home2_id`, `home2_district`, `home2_amphoe`, `home2_province`, `home2_zipcode`, `get_boarduser_id`) VALUES
(4, '47/6 กไปงตารง m.4', 'ตะโละกาโปร์', 'ยะหริ่ง', 'ปัตตานี', '94150', '47/6 กไปงตารง m.4', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', '94000', 4),
(5, '23/4 กูวิง หมู่.5', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', '94000', '23/4 กูวิง หมู่.5', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', '94000', 5),
(6, '56/5 ปะการัง หมู่5', 'ตะลุโบะ', 'เมืองปัตตานี', 'ปัตตานี', '94000', '56/5 ปะการัง หมู่5', 'ตะลุโบะ', 'เมืองปัตตานี', 'ปัตตานี', '94000', 6),
(7, '44/44 kawin m.5', 'ตลิ่งชัน', 'บันนังสตา', 'ยะลา', '95130', '44/44 kawin m.5', 'ตลิ่งชัน', 'บันนังสตา', 'ยะลา', '95130', 7),
(8, '47/6 กไปงตารง m.4', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', '94000', '47/6 กไปงตารง m.4', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', '94000', 8),
(9, '23/4 กูวิง หมู่.5', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', '94000', '23/4 กูวิง หมู่.5', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', '94000', 9),
(11, '34/9 ซอย6 ถนนยะรัง', 'จะบังติกอ', 'เมืองปัตตานี', 'ปัตตานี', '94000', '34/9 ซอย6 ถนนยะรัง', 'จะบังติกอ', 'เมืองปัตตานี', 'ปัตตานี', '94000', 11);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expenses_id` int(11) NOT NULL,
  `expenses_name` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `date_y_m_d` date NOT NULL,
  `amount` int(40) NOT NULL,
  `evidence_slip` varchar(50) NOT NULL,
  `years` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expenses_id`, `expenses_name`, `details`, `date_y_m_d`, `amount`, `evidence_slip`, `years`) VALUES
(4, 'myset expenses a company where pizza s', 'pizza one state amount 100$ tha pizza 120 state x s', '2021-08-04', 12000, 'img_61e90ee48dc65.jpeg', '2021'),
(6, 'expenses project', 'epenses project ndivea', '2021-11-20', 13200, 'img_61e90ed797705.jpeg', '2021'),
(7, 'x', 'xxx', '2022-01-20', 50000, 'img_61e90ecabdb7e.jpeg', '2022'),
(9, 'cf', 'hello cf', '2019-02-01', 15000, 'img_61f82e244dd5e.jpeg', '2019'),
(11, 'ค่าปฎิกร นิวเคลียร์ อีหร่าน', 'จ่ายค่าปฎิกร นิวเคลียร์ อีหร่าน เพื่อร่วมผลิตขี่ปนาวุธข้ามทวีป', '2020-09-13', 100000, 'img_6320aa305f693.jpeg', '2022'),
(12, 'expenses men', 'xxxddeexx', '2022-10-15', 20000, 'img_6349f652e936b.jpeg', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `formfour_status_orphan`
--

CREATE TABLE `formfour_status_orphan` (
  `id_formfour` int(11) NOT NULL,
  `id_join_orphan` int(11) NOT NULL,
  `image_home` varchar(150) NOT NULL,
  `family_status` varchar(350) NOT NULL,
  `level_help` varchar(70) NOT NULL,
  `estimate_help` varchar(100) NOT NULL,
  `deceased` varchar(50) NOT NULL,
  `cause_death` varchar(300) NOT NULL,
  `death_day` date NOT NULL,
  `study_status` varchar(120) NOT NULL,
  `year_study` varchar(70) NOT NULL,
  `cause_stop_study` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formfour_status_orphan`
--

INSERT INTO `formfour_status_orphan` (`id_formfour`, `id_join_orphan`, `image_home`, `family_status`, `level_help`, `estimate_help`, `deceased`, `cause_death`, `death_day`, `study_status`, `year_study`, `cause_stop_study`) VALUES
(2, 2, 'img_61da5747280cd.jpeg', 'อยู่กับเเม่', 'ปกติ', 'ด้านอารมฌ์และจิตใจ', 'ด้านสังคม', 'ด้านร่างกาย', '2022-10-27', 'กำลังเรียน', 'ด้านเศรษฐกิจ', 'ไม่มี'),
(5, 6, 'img_6294f2545bfac.jpg', 'พอกิน', 'ปกติ', 'ด้านร่างกาย', 'แม่เสียชีวิต', 'โรค', '2021-04-14', 'กำลังเรียน', 'ป.4', '-'),
(6, 7, 'img_629b592d0bb64.png', 'ปกติ', 'ปกติ', 'ด้านอารมฌ์และจิตใจ', 'แม่เสียชีวิต', 'โดนลอบฆ่า', '2021-05-11', 'กำลังเรียน', 'ม.1', '-not'),
(7, 8, 'img_629f95c8b64c7.jpg', 'ไม่มีรายได้ไม่มีทางออก', 'เร่งด่วน', 'ด้านอารมณ์และจิตใจ', 'เสียชีวิตทั้งพ่อและแม่', 'พ่อโดนประหาร/แม่โดนลอบสังหาร', '2022-06-01', 'กำลังเรียน', 'ป.5', '-'),
(8, 9, 'img_63011d75aef2e.jpg', 'ค่อนข้างยากจน', 'ปานกลาง', 'ด้านอารมฌ์และจิตใจ', 'แม่เสียชีวิต', 'คลอดบุตร', '2022-08-10', 'กำลังเรียน', 'ม1', '-'),
(9, 10, 'img_630120d1ad1dc.jpeg', 'การเงินไม่มีปัญหาแต่เสียกำลังใจ', 'ปานกลาง', 'ด้านอารมฌ์และจิตใจ', 'พ่อเสียชีวิต', 'ตกรถบนเขา', '2022-07-09', 'กำลังเรียน', 'ป5', 'ไม่มี'),
(10, 11, 'img_6307a126a0c5f.jpg', 'พอมีรายได้', 'ปกติ', 'ด้านอารมฌ์และจิตใจ', 'พ่อเสียชีวิต', 'ถูกวิสามัญ', '2022-08-03', 'กำลังเรียน', 'ป.6', '-'),
(11, 12, 'img_6307a5bd635c1.jpg', 'พออยู่ได้', 'ปกติ', 'ด้านสังคม', 'แม่เสียชีวิต', 'คลอดลูก', '2021-07-20', 'กำลังเรียน', 'ป.4', '-'),
(12, 13, 'img_63244c2ee4941.png', 'ลำบากมาก', 'เร่งด่วน', 'ด้านเศรษฐกิจ', 'พ่อเสียชีวิต', 'รถชน', '2022-09-07', 'กำลังเรียน', 'ม1', '-'),
(14, 15, 'img_634fffa64879c.jpg', 'weee', 'ปานกลาง', 'ด้านอารมฌ์และจิตใจ', 'พ่อเสียชีวิต', 'wwww', '2018-11-06', 'กำลังเรียน', '34', '122'),
(19, 31, 'img_6358aab05781f.png', 'ยากจนมาก', 'ปกติ', 'ด้านอารมฌ์และจิตใจ', '', '', '2022-10-26', 'หยุดเรียน', '', 'xxxx');

-- --------------------------------------------------------

--
-- Table structure for table `formone_orphan_record`
--

CREATE TABLE `formone_orphan_record` (
  `id_orphan` int(11) NOT NULL,
  `day_add_record` date NOT NULL,
  `title_me` varchar(15) NOT NULL,
  `first_name_me` varchar(150) NOT NULL,
  `last_name_me` varchar(120) NOT NULL,
  `berd_day_me` date NOT NULL,
  `age_me` int(11) NOT NULL,
  `heigh_me` int(11) NOT NULL,
  `weigth_me` int(11) NOT NULL,
  `blood_group_me` varchar(5) NOT NULL,
  `card_id` varchar(20) NOT NULL,
  `call_me` varchar(15) NOT NULL,
  `siblings_number` int(7) NOT NULL,
  `me_number` int(5) NOT NULL,
  `profile_orphan` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formone_orphan_record`
--

INSERT INTO `formone_orphan_record` (`id_orphan`, `day_add_record`, `title_me`, `first_name_me`, `last_name_me`, `berd_day_me`, `age_me`, `heigh_me`, `weigth_me`, `blood_group_me`, `card_id`, `call_me`, `siblings_number`, `me_number`, `profile_orphan`) VALUES
(2, '2021-12-22', 'เด็กหญิง', 'ซูไรนี', 'มามะ', '2010-06-15', 24, 143, 31, 'b', '1940100302345', '0841987301', 3, 1, 'img_61c355931e4f3.jpeg'),
(6, '2022-05-30', 'เด็กหญิง', 'ปะตีฮะ', 'ดอเลาะ', '2012-05-09', 10, 124, 16, 'ab', '1920100203442', 'not', 3, 3, 'img_6294f2545b2b8.jpg'),
(7, '2022-06-04', 'เด็กชาย', 'คิรัว', 'โซลดิก', '2010-01-12', 12, 145, 20, 'b', '1940100213331', '0850922207', 5, 3, 'img_629b592d0aae3.jpg'),
(8, '2022-06-08', 'เด็กหญิง', 'มิคาสะ', 'แอคเคอร์แมน', '2011-06-08', 11, 145, 23, 'o', '1970277430112', '0840921109', 1, 1, 'img_629f8acfde9a7.jpg'),
(9, '2022-08-21', 'เด็กหญิง', 'ฟาติน', 'อาแด', '2009-07-13', 13, 130, 21, 'o', '1970200305770', '0630968035', 2, 1, 'img_63011d6296b5f.jpg'),
(10, '2022-08-21', 'เด็กชาย', 'อาลาวิ', 'สาและ', '2013-06-10', 11, 127, 27, 'b', '1980100202448', '0980983303', 3, 2, 'img_630120d1aca8c.jpg'),
(11, '2022-08-25', 'เด็กชาย', 'มะหามะ', 'เจะยอ', '2010-08-20', 12, 110, 27, 'o', '1940100233009', '0940830010', 1, 1, 'img_6307a1269f517.jpg'),
(12, '2022-08-25', 'เด็กชาย', 'มูระ', 'กาวะ', '2012-08-14', 10, 103, 17, 'b', '1970100213441', '0940878700', 2, 1, 'img_6307a5bd624e5.jpg'),
(13, '2022-09-16', 'เด็กชาย', 'โรเบิตร์', 'ไอสตาย', '2010-04-12', 12, 150, 23, 'ab', '3940100242559', '0970839909', 2, 2, 'img_63244c2ee33a7.jpg'),
(15, '2022-10-19', 'เด็กหญิง', 'คาราคซัง', 'เย้เย้', '2010-11-16', 11, 123, 23, 'o', '1234567789876', '1234567898', 5, 3, 'img_63555f9d02199.jpg'),
(31, '2022-10-26', 'เด็กชาย', 'จอร์นดี้', 'โบย่า', '2022-10-25', 0, 22, 2, 'o', '1980100204338', '0980987765', 1, 1, 'img_6358aab05712f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `formtree_parents_orphan`
--

CREATE TABLE `formtree_parents_orphan` (
  `id_parents` int(11) NOT NULL,
  `join_id_orphan` int(11) NOT NULL,
  `fullname_father` varchar(250) NOT NULL,
  `occupation_father` varchar(120) NOT NULL,
  `income_father` int(20) NOT NULL,
  `berd_day_father` date NOT NULL,
  `age_father` int(11) NOT NULL,
  `tell_father` varchar(16) NOT NULL,
  `status_father` varchar(50) NOT NULL,
  `cause_death_f` varchar(400) NOT NULL,
  `fullname_mather` varchar(250) NOT NULL,
  `occupation_mather` varchar(120) NOT NULL,
  `income_mather` int(20) NOT NULL,
  `berd_day_mather` date NOT NULL,
  `age_mather` int(11) NOT NULL,
  `tell_mather` varchar(15) NOT NULL,
  `status_mather` varchar(50) NOT NULL,
  `cause_death_m` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formtree_parents_orphan`
--

INSERT INTO `formtree_parents_orphan` (`id_parents`, `join_id_orphan`, `fullname_father`, `occupation_father`, `income_father`, `berd_day_father`, `age_father`, `tell_father`, `status_father`, `cause_death_f`, `fullname_mather`, `occupation_mather`, `income_mather`, `berd_day_mather`, `age_mather`, `tell_mather`, `status_mather`, `cause_death_m`) VALUES
(2, 2, 'นาย ซอและ  มามะ', 'ชาวนา', 7200, '1983-05-02', 38, '0820965897', 'ยังมีชีวิตอยู่', '', 'นางสาว ฮุสณี  ลาเตะ', 'แม่ค้า', 12000, '1986-08-11', 35, '0820965897', 'เสียชีวิต', ''),
(4, 6, 'นาย ฮารุน  ดอเลาะ', 'ครู', 12000, '1980-04-12', 42, '0933013719', 'ยังมีชีวิตอยู่', '', 'นางสาว มารียัม  โหระ', '-', 0, '1985-05-10', 37, '0840931102', 'เสียชีวิต', ''),
(5, 7, 'นาย ซิลเวอร์  โซลดิก', 'นักฆ่า', 15000, '1990-01-23', 32, '0940874089', 'ยังมีชีวิตอยู่', '', 'นางสาว คิเคียว  โซลดิก', 'แม่บ้าน', 1000, '1994-06-04', 28, '0954103018', 'เสียชีวิต', ''),
(6, 8, 'นาย เคต์นนี้  แอคเคอร์แมน', 'สายลับ(ฝั่งกบฏ)', 50000, '2092-11-03', 31, '0984193018', 'เสียชีวิต', '', 'นางสาว ไดอานี  แอคเคอร์แมน', 'ข้าราชกาลลับ', 56000, '2095-02-19', 28, '0984103918', 'เสียชีวิต', ''),
(7, 9, 'นาย ฮาบุลเลาะห์  อาแด', 'ชาวประมง', 7000, '1995-02-04', 28, '0840991103', 'ยังมีชีวิตอยู่', '', 'นางสาว มัรยัม  กาซา', 'ค้าขาย', 9000, '1997-12-11', 25, '0870989009', 'เสียชีวิต', ''),
(8, 10, 'นาย อามะ  สาและ', 'กรีดยาง', 10000, '1985-07-10', 37, '0630979056', 'เสียชีวิต', '', 'นางสาว แวยะห์  ดาลอ', 'กรีดยาง', 10000, '1989-08-01', 33, '0670391145', 'ยังมีชีวิตอยู่', ''),
(9, 11, 'นาย ฮาซัน  เจะแว', 'ก่อสร้าง', 15000, '1997-10-03', 26, '0630843467', 'เสียชีวิต', '', 'นางสาว ฮาสนะ  ดอเลาะ', 'กรีดยาง', 12000, '1998-08-18', 25, '0876345582', 'ยังมีชีวิตอยู่', ''),
(10, 12, 'นาย อิสยัส  กาวะ', 'ทำโรงงาน', 15000, '1995-09-18', 28, '0940939933', 'ยังมีชีวิตอยู่', '', 'นางสาว รอกียะ  สามะ', 'ทำโรงงาน', 15000, '1997-07-10', 26, '0870939001', 'เสียชีวิต', ''),
(11, 13, 'นาย ยูโซะ  มานะ', 'พ่อค้า', 10000, '1980-10-16', 42, '0980970098', 'เสียชีวิต', '', 'นางสาว มูน่า  มารา', 'แม่บ้าน', 0, '1985-10-23', 38, '0970878088', 'ยังมีชีวิตอยู่', ''),
(13, 15, 'นาย ำพกก  กกก', 'กกก', 123432, '1972-09-12', 50, '1234567655', 'ยังมีชีวิตอยู่', '', 'นาง ddd  dddd', 'fffff', 123, '1980-11-12', 41, '1231222222', 'เสียชีวิต', ''),
(24, 31, 'นาย มะดิง  แบโระ', 'พ่อค้า', 1200, '1954-10-06', 68, '0980998876', 'ยังมีชีวิตอยู่', '..', 'นาง ไซตง  เดะ', 'ไม่มี', 0, '1957-10-11', 65, '0970980045', 'เสียชีวิต', 'xxxx');

-- --------------------------------------------------------

--
-- Table structure for table `formtrue_orphan_school`
--

CREATE TABLE `formtrue_orphan_school` (
  `id_addr_school` int(11) NOT NULL,
  `home_id` varchar(112) NOT NULL,
  `district_home` varchar(150) NOT NULL,
  `amphoe_home` varchar(150) NOT NULL,
  `province_home` varchar(150) NOT NULL,
  `zipcode_home` int(15) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `district_school` varchar(150) NOT NULL,
  `amphoe_school` varchar(150) NOT NULL,
  `province_school` varchar(160) NOT NULL,
  `zipcode_school` int(15) NOT NULL,
  `school2_name` varchar(160) NOT NULL,
  `district_school2` varchar(150) NOT NULL,
  `amphoe_school2` varchar(150) NOT NULL,
  `province_school2` varchar(160) NOT NULL,
  `zipcode_school2` int(11) NOT NULL,
  `getid_jion_orphan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formtrue_orphan_school`
--

INSERT INTO `formtrue_orphan_school` (`id_addr_school`, `home_id`, `district_home`, `amphoe_home`, `province_home`, `zipcode_home`, `school_name`, `district_school`, `amphoe_school`, `province_school`, `zipcode_school`, `school2_name`, `district_school2`, `amphoe_school2`, `province_school2`, `zipcode_school2`, `getid_jion_orphan`) VALUES
(2, '77/12  บ้านกำปงตารง  ม4', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', 94000, 'พัฒนาอิสลาม', 'ตะลุโบะ', 'เมืองปัตตานี', 'ปัตตานี', 94000, 'บ้านจะรังบองอ', 'ตะลุโบะ', 'เมืองปัตตานี', 'ปัตตานี', 94000, 2),
(6, '55', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', 94000, 'ยังไม่เรียน', '-', '-', '-', 94000, 'บ้านกูวิง', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', 94000, 6),
(7, '23/3', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', 94000, 'จงระกสัดวิทยา', 'ตันหยงลุโละ', 'เมืองปัตตานี', 'ปัตตานี', 94000, 'บ้านบานา', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', 94000, 7),
(8, '51/9 บ้านดี ม.6', 'กะมิยอ', 'เมืองปัตตานี', 'ปัตตานี', 94000, 'ยังไม่เรียน', '-', '-', '-', 94000, 'บ้านกะมียอ', 'กะมิยอ', 'เมืองปัตตานี', 'ปัตตานี', 94000, 8),
(9, '57/12', 'ตะปอเยาะ', 'ยี่งอ', 'นราธิวาส', 96180, 'ดรุณศาสตร์วิทยา', 'ตะลุบัน', 'สายบุรี', 'ปัตตานี', 94110, 'จาแรกาแซ', 'ตะปอเยาะ', 'ยี่งอ', 'นราธิวาส', 96180, 9),
(10, '14/44', 'บ้านแหร', 'ธารโต', 'ยะลา', 95150, '-ยังเรียนประถมอยู่', 'บ้านแหร', 'ธารโต', 'ยะลา', 95150, 'บ้านบ่อทอง', 'บ้านแหร', 'ธารโต', 'ยะลา', 95150, 10),
(11, '57/98 เมาะมาวี', 'เมาะมาวี', 'ยะรัง', 'ปัตตานี', 94160, 'ยังไม่เรียน', 'เมาะมาวี', 'ยะรัง', 'ปัตตานี', 94160, 'บ้านเมามาวี', 'เมาะมาวี', 'ยะรัง', 'ปัตตานี', 94160, 11),
(12, '54 กาปัง 5', 'ตาเซะ', 'เมืองยะลา', 'ยะลา', 95000, '-ยังเรียนประถมอยู่', 'ตาเซะ', 'เมืองยะลา', 'ยะลา', 95000, 'โรงเรียนบ้านตะเซะ', 'ตาเซะ', 'เมืองยะลา', 'ยะลา', 95000, 12),
(13, '23/13 ประจันใต้ ', 'ประจัน', 'ยะรัง', 'ปัตตานี', 94160, 'บราโอ', 'บาราโหม', 'เมืองปัตตานี', 'ปัตตานี', 94000, 'บราโอ', 'บาราโหม', 'เมืองปัตตานี', 'ปัตตานี', 94000, 13),
(15, 'dddd', 'บากเรือ', 'มหาชนะชัย', 'ยโสธร', 35130, 'กกก', 'ยกกระบัตร', 'สามเงา', 'ตาก', 63130, 'ำพ', 'นรสิงห์', 'ป่าโมก', 'อ่างทอง', 14130, 15),
(31, '45/6 กูวิง หมู่7', 'ลำใหม่', 'เมืองยะลา', 'ยะลา', 95160, 'รร บ้านลำใหม่นอก', 'ตะปอเยาะ', 'ยี่งอ', 'นราธิวาส', 96180, 'ดรุณศาสตร์วิทยา', 'ลำใหม่', 'เมืองยะลา', 'ยะลา', 95160, 31);

-- --------------------------------------------------------

--
-- Table structure for table `fundation`
--

CREATE TABLE `fundation` (
  `id_fundation` int(11) NOT NULL,
  `title_fundation` varchar(20) NOT NULL,
  `firstname_fundation` varchar(100) NOT NULL,
  `lastname_fundation` varchar(100) NOT NULL,
  `age_fundation` int(5) NOT NULL,
  `sex_fundation` varchar(22) NOT NULL,
  `email` varchar(150) NOT NULL,
  `tell_fundation` varchar(15) NOT NULL,
  `cardnumber` varchar(200) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `workplace` varchar(150) NOT NULL,
  `image_fundation` varchar(150) NOT NULL,
  `homeadress` varchar(300) NOT NULL,
  `district` varchar(150) NOT NULL,
  `amphoe` varchar(150) NOT NULL,
  `province` varchar(150) NOT NULL,
  `zipcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fundation`
--

INSERT INTO `fundation` (`id_fundation`, `title_fundation`, `firstname_fundation`, `lastname_fundation`, `age_fundation`, `sex_fundation`, `email`, `tell_fundation`, `cardnumber`, `occupation`, `workplace`, `image_fundation`, `homeadress`, `district`, `amphoe`, `province`, `zipcode`) VALUES
(5, 'นางสาว', 'ฟัตมา', 'สาแม', 24, 'หญิง', 'fatma24@gmail.com', '0940831102', '1970611034221', 'ครู', 'โรงเรียนแห่งหนึ่ง', 'img_62a05d48b65a3.jpg', '51/5 กูนิง ม8', 'กะรุบี', 'กะพ้อ', 'ปัตตานี', '94230'),
(11, 'นาย', 'อดอฟ', 'ฮิตเลอร์', 45, 'ชาย', 'hitler12@gmail.com', '0980931104', '1970100204331', 'ผู้บัญชาการรบ', 'ค่ายทหารแห่ง', 'img_633f45c5300a4.jpg', '97/98', 'บาราโหม', 'เมืองปัตตานี', 'ปัตตานี', '94000'),
(13, 'นาย', 'อารารัต', 'มานา', 31, 'ชาย', 'ararat12@gmail.com', '0940831106', '1930100505442', 'it support', 'bangkok', 'img_6344f19798612.jpg', '45/6 กูวิง หมู่7', 'ลำใหม่', 'เมืองยะลา', 'ยะลา', '95160'),
(18, 'นาย', 'อารารัต', 'มานา', 32, 'ชาย', 'ararat12@gmail.com', '0980987786', '1941994108855', 'vvv', 'vvvbbbbbb', 'img_63502763cb01a.webp', 'bbbb', 'ลำใหม่', 'เมืองยะลา', 'ยะลา', '95160');

-- --------------------------------------------------------

--
-- Table structure for table `joins_id_project`
--

CREATE TABLE `joins_id_project` (
  `join_id` int(11) NOT NULL,
  `id_project` int(14) NOT NULL,
  `id_data_peple_register` int(14) NOT NULL,
  `new_date_project` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joins_id_project`
--

INSERT INTO `joins_id_project` (`join_id`, `id_project`, `id_data_peple_register`, `new_date_project`) VALUES
(10, 24, 5, '2021-08-30'),
(11, 24, 6, '2021-08-30'),
(12, 24, 7, '2021-08-30'),
(13, 24, 8, '2021-08-30'),
(14, 24, 9, '2021-08-30'),
(15, 24, 10, '2021-08-30'),
(17, 21, 5, '2021-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `map_location_orphan`
--

CREATE TABLE `map_location_orphan` (
  `map_id` int(11) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `logitude` varchar(50) NOT NULL,
  `get_orphan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `map_location_orphan`
--

INSERT INTO `map_location_orphan` (`map_id`, `latitude`, `logitude`, `get_orphan_id`) VALUES
(1, '6.866330569741549', '101.280839935343', 2),
(2, '6.8742875487628385', '101.28758957062165', 6),
(3, '6.790442643391635', '101.29277050495148', 13),
(4, '6.465739826012837', '101.67813678125593', 9),
(5, '6.61408188622996', '101.25829180155198', 12),
(6, '6.56798774552006', '101.19947254657745', 14),
(7, '6.1156784343044475', '101.18961274623871', 10),
(8, '6.67192880149564', '101.30387398972901', 11),
(9, '6.850353421533063', '101.31394644121382', 8),
(10, '6.874159641779474', '101.29285623172971', 7),
(11, '8.820668193527345', '99.70209434686173', 15),
(12, '6.307684579569369', '101.69900715351105', 16),
(13, '', '', 17),
(14, '6.786619805787244', '101.29284814548764', 18),
(15, '', '', 19),
(16, '6.750555624263809', '101.35763684539779', 20),
(17, '6.788841262042893', '101.33128885876499', 21),
(18, '6.75525209553552', '101.30314862678082', 22),
(19, '6.75971568697553', '101.33341321133545', 23),
(20, '6.780045408885289', '101.31853396112427', 24),
(21, '', '', 25),
(22, '6.506932577163931', '101.4765340089798', 26),
(23, '6.725902025067586', '101.3120588702653', 27),
(24, '', '', 28),
(25, '6.556352447721175', '101.22219825591127', 29),
(26, '6.348590194618799', '101.24346482405603', 30),
(27, '6.490558976754585', '101.3611775636673', 31);

-- --------------------------------------------------------

--
-- Table structure for table `patron`
--

CREATE TABLE `patron` (
  `id` int(10) NOT NULL,
  `title` varchar(10) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `id_card` varchar(13) NOT NULL,
  `number_home` varchar(50) NOT NULL,
  `district_t` varchar(20) NOT NULL,
  `district_a` varchar(20) NOT NULL,
  `district_j` varchar(20) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `tell` varchar(20) NOT NULL,
  `career` varchar(50) NOT NULL,
  `workplace` varchar(50) NOT NULL,
  `img_slip_patron` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patron`
--

INSERT INTO `patron` (`id`, `title`, `f_name`, `l_name`, `id_card`, `number_home`, `district_t`, `district_a`, `district_j`, `zip_code`, `tell`, `career`, `workplace`, `img_slip_patron`) VALUES
(31, 'นาย', 'selver', 'soldic', '1709005018853', '54/32', 'บานา', 'เมืองปัตตานี', 'ปัตตานี', '94000', '0830942201', 'killerกก', 'allowed', 'img_62f626c4a42d1.jpeg'),
(32, 'นางสาว', 'ซิสเตอร์', 'พาราโนดี', '1709005018851', '45/12', 'พงสตา', 'ยะรัง', 'ปัตตานี', '94005', '0980876754', 'พยาบาลd', 'รพ เอกชน ปัตตานี', 'img_6318c52606b7a.jpg'),
(33, 'นาย', 'isact', 'netelo', '1940100200559', '34/34', 'พงสตา', 'ยะรัง', 'ปัตตานี', '94003', '0987650098', 'นักมวย', 'ในเมืองยะลา', 'img_6320ad94af143.jpg'),
(35, 'นาย', 'beyong', 'jun o ja', '1970100405226', '45/54', 'เขาตูม', 'ยะรัง', 'ปัตตานี', '94009', '0930862254', 'ผู้บุกเบิก แห่งทวีปใหม่ ทวีปมืด', 'องค์กร สหประชาชาติ', 'img_6315bcda0257c.jpg'),
(36, 'นางสาว', 'มิคาสะ', 'แอคเคอร์แมน', '1980300405336', '34/67', 'ตะลุโบะ', 'เมือง', 'ปัตตานี', '94001', '0870982202', 'ทหารหน่วยสำรวจ', 'เอลเดีย', 'img_6318d2c63aa4a.jpg'),
(37, 'นางสาว', 'โรสมีนา', 'กุลาบแดง', '1940100223441', '342', 'สะเตง', 'เมืองยะลา', 'ยะลา', '95000', '0830942266', 'ประธานสมาคมว่ายน้ำ', 'ที่แห่วหนึง', 'img_631a0f64b3207.webp');

-- --------------------------------------------------------

--
-- Table structure for table `patron_scholarship`
--

CREATE TABLE `patron_scholarship` (
  `id_scholarship` int(11) NOT NULL,
  `id_patrons` int(11) NOT NULL,
  `id_grantee` int(11) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patron_scholarship`
--

INSERT INTO `patron_scholarship` (`id_scholarship`, `id_patrons`, `id_grantee`, `entry_date`) VALUES
(109, 13, 8, '2022-09-12'),
(110, 13, 9, '2022-09-12'),
(111, 13, 10, '2022-09-12'),
(112, 12, 2, '2022-09-12'),
(115, 14, 12, '2022-09-12'),
(116, 15, 6, '2022-09-13'),
(118, 15, 8, '2022-09-13'),
(119, 15, 12, '2022-09-13'),
(120, 15, 2, '2022-09-13'),
(121, 15, 7, '2022-09-13'),
(122, 15, 9, '2022-09-13'),
(123, 15, 10, '2022-09-13'),
(125, 14, 8, '2022-09-14'),
(126, 14, 7, '2022-09-14'),
(128, 12, 7, '2022-09-15'),
(129, 13, 7, '2022-09-15'),
(146, 16, 8, '2022-10-23'),
(147, 16, 7, '2022-10-23'),
(148, 16, 6, '2022-10-23'),
(149, 16, 10, '2022-10-23'),
(150, 16, 2, '2022-10-24'),
(151, 16, 13, '2022-10-24'),
(152, 16, 15, '2022-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_user`
--

CREATE TABLE `personal_user` (
  `personal_id` int(11) NOT NULL,
  `get_userid` int(11) NOT NULL,
  `title` varchar(15) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(110) NOT NULL,
  `idcard` varchar(20) NOT NULL,
  `tell` varchar(16) NOT NULL,
  `email` varchar(220) NOT NULL,
  `photo_me` varchar(170) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_user`
--

INSERT INTO `personal_user` (`personal_id`, `get_userid`, `title`, `first_name`, `last_name`, `idcard`, `tell`, `email`, `photo_me`, `age`, `sex`) VALUES
(5, 19, 'mr', 'myadmin zero', 'defoult', '2940200304331', '0930870987', 'defoultadmin@gmail.com', 'x1x2.jpg', 22, 'ชาย'),
(22, 41, 'นาย', 'อิฟฟาน', 'สาและ', '1941000272051', '0933080097', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62c579d899900.jpg', 15, 'ชาย'),
(23, 42, 'นาย', 'อับดุลเราะมาน', 'เส็นสอ', '1941000272052', '0933080097', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62c57a8d9a9a4.jpg', 25, 'ชาย'),
(28, 47, 'นาย', 'softwan', 'ahmad', '1940100202331', '0962315546', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62c8673cb706c.jpg', 23, 'ชาย'),
(29, 48, 'นาย', 'ฟามี่', 'เคราวฟ์', '1980100204331', '0930830010', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62cc5167c540f.jpeg', 24, 'ชาย'),
(30, 49, 'นางสาว', 'มีลัยอาร์', 'สรรนารี', '1970100203442', '0623092517', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_633fd6c56f89f.webp', 27, 'หญิง'),
(44, 63, 'นาย', 'retort', 'qweqwe', '1980100204339', '0980987654', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_635049a3af613.jpg', 22, 'ชาย');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `select_fundation_id` int(11) NOT NULL,
  `detail_project` text NOT NULL,
  `operating_area` varchar(200) NOT NULL,
  `project_year` varchar(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `img_project` varchar(150) NOT NULL,
  `filename_project` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `select_fundation_id`, `detail_project`, `operating_area`, `project_year`, `start_date`, `end_date`, `img_project`, `filename_project`) VALUES
(27, 'x mrct', 11, 'xcvbnhgfr', 'xxx area', '2022', '2022-07-13', '2022-07-26', 'img_62d459019168e.jpg', 'file_62d45901919b8.pdf'),
(28, 'tom and jerry', 11, 'xxxxxxxx frif;;skdo test file PDF', 'pattani', '2022', '2022-07-19', '2022-07-27', 'img_62d44fbf91282.jpg', 'file_62d44fbf91740.pdf'),
(29, 'of deeree', 5, 'cxxxx', 'xxx', '2022', '2022-08-04', '2022-08-16', 'img_62ebed66d8e4c.png', 'file_62ebed66d8f8c.pdf'),
(31, 'new word order', 5, 'new word order on virus corona', 'mosco russia', '2022', '2022-10-07', '2022-10-16', 'img_633f43b80b6b5.webp', 'file_633f43b80b7a7.pdf'),
(32, 'master key hack', 5, 'web Ackerman 007', 'area 57 usa', '2022', '2022-10-10', '2022-10-25', 'img_6344f1ec73d9f.jpg', 'file_6344f1ec73ec1.pdf'),
(33, 'xxx', 11, 'xxxx', 'mosco russia', '2022', '2022-10-27', '2022-10-31', 'img_635a75aa4848c.jpg', 'file_635a75aa48643.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `project_participant`
--

CREATE TABLE `project_participant` (
  `id_project_participant` int(11) NOT NULL,
  `getid_project` int(11) NOT NULL,
  `getid_participan` int(11) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_participant`
--

INSERT INTO `project_participant` (`id_project_participant`, `getid_project`, `getid_participan`, `entry_date`) VALUES
(37, 21, 2, '2022-01-14'),
(42, 21, 6, '2022-07-13'),
(43, 21, 7, '2022-07-13'),
(44, 21, 8, '2022-07-13'),
(58, 29, 2, '2022-08-07'),
(59, 29, 6, '2022-08-07'),
(62, 28, 6, '2022-08-08'),
(68, 31, 13, '2022-10-11'),
(69, 31, 14, '2022-10-11'),
(70, 27, 2, '2022-10-22'),
(71, 27, 6, '2022-10-22'),
(72, 27, 7, '2022-10-22'),
(73, 27, 8, '2022-10-22'),
(74, 27, 9, '2022-10-22'),
(75, 27, 10, '2022-10-22'),
(76, 27, 11, '2022-10-22'),
(77, 27, 12, '2022-10-22'),
(78, 27, 13, '2022-10-22'),
(81, 32, 7, '2022-10-24'),
(82, 32, 8, '2022-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `PROVINCE_ID` int(5) NOT NULL,
  `PROVINCE_CODE` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE_NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `GEO_ID` int(5) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`PROVINCE_ID`, `PROVINCE_CODE`, `PROVINCE_NAME`, `GEO_ID`) VALUES
(1, '10', 'กรุงเทพมหานคร   ', 2),
(2, '11', 'สมุทรปราการ   ', 2),
(3, '12', 'นนทบุรี   ', 2),
(4, '13', 'ปทุมธานี   ', 2),
(5, '14', 'พระนครศรีอยุธยา   ', 2),
(6, '15', 'อ่างทอง   ', 2),
(7, '16', 'ลพบุรี   ', 2),
(8, '17', 'สิงห์บุรี   ', 2),
(9, '18', 'ชัยนาท   ', 2),
(10, '19', 'สระบุรี', 2),
(11, '20', 'ชลบุรี   ', 5),
(12, '21', 'ระยอง   ', 5),
(13, '22', 'จันทบุรี   ', 5),
(14, '23', 'ตราด   ', 5),
(15, '24', 'ฉะเชิงเทรา   ', 5),
(16, '25', 'ปราจีนบุรี   ', 5),
(17, '26', 'นครนายก   ', 2),
(18, '27', 'สระแก้ว   ', 5),
(19, '30', 'นครราชสีมา   ', 3),
(20, '31', 'บุรีรัมย์   ', 3),
(21, '32', 'สุรินทร์   ', 3),
(22, '33', 'ศรีสะเกษ   ', 3),
(23, '34', 'อุบลราชธานี   ', 3),
(24, '35', 'ยโสธร   ', 3),
(25, '36', 'ชัยภูมิ   ', 3),
(26, '37', 'อำนาจเจริญ   ', 3),
(27, '39', 'หนองบัวลำภู   ', 3),
(28, '40', 'ขอนแก่น   ', 3),
(29, '41', 'อุดรธานี   ', 3),
(30, '42', 'เลย   ', 3),
(31, '43', 'หนองคาย   ', 3),
(32, '44', 'มหาสารคาม   ', 3),
(33, '45', 'ร้อยเอ็ด   ', 3),
(34, '46', 'กาฬสินธุ์   ', 3),
(35, '47', 'สกลนคร   ', 3),
(36, '48', 'นครพนม   ', 3),
(37, '49', 'มุกดาหาร   ', 3),
(38, '50', 'เชียงใหม่   ', 1),
(39, '51', 'ลำพูน   ', 1),
(40, '52', 'ลำปาง   ', 1),
(41, '53', 'อุตรดิตถ์   ', 1),
(42, '54', 'แพร่   ', 1),
(43, '55', 'น่าน   ', 1),
(44, '56', 'พะเยา   ', 1),
(45, '57', 'เชียงราย   ', 1),
(46, '58', 'แม่ฮ่องสอน   ', 1),
(47, '60', 'นครสวรรค์   ', 2),
(48, '61', 'อุทัยธานี   ', 2),
(49, '62', 'กำแพงเพชร   ', 2),
(50, '63', 'ตาก   ', 4),
(51, '64', 'สุโขทัย   ', 2),
(52, '65', 'พิษณุโลก   ', 2),
(53, '66', 'พิจิตร   ', 2),
(54, '67', 'เพชรบูรณ์   ', 2),
(55, '70', 'ราชบุรี   ', 4),
(56, '71', 'กาญจนบุรี   ', 4),
(57, '72', 'สุพรรณบุรี   ', 2),
(58, '73', 'นครปฐม   ', 2),
(59, '74', 'สมุทรสาคร   ', 2),
(60, '75', 'สมุทรสงคราม   ', 2),
(61, '76', 'เพชรบุรี   ', 4),
(62, '77', 'ประจวบคีรีขันธ์   ', 4),
(63, '80', 'นครศรีธรรมราช   ', 6),
(64, '81', 'กระบี่   ', 6),
(65, '82', 'พังงา   ', 6),
(66, '83', 'ภูเก็ต   ', 6),
(67, '84', 'สุราษฎร์ธานี   ', 6),
(68, '85', 'ระนอง   ', 6),
(69, '86', 'ชุมพร   ', 6),
(70, '90', 'สงขลา   ', 6),
(71, '91', 'สตูล   ', 6),
(72, '92', 'ตรัง   ', 6),
(73, '93', 'พัทลุง   ', 6),
(74, '94', 'ปัตตานี   ', 6),
(75, '95', 'ยะลา   ', 6),
(76, '96', 'นราธิวาส   ', 6),
(77, '97', 'บึงกาฬ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `re_venue`
--

CREATE TABLE `re_venue` (
  `revenue_id` int(11) NOT NULL,
  `revenue_name` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `date_y_m_d` date NOT NULL,
  `amount` int(40) NOT NULL,
  `evidence_slip` varchar(300) NOT NULL,
  `years` varchar(22) NOT NULL,
  `id_user` varchar(110) NOT NULL,
  `funder` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_venue`
--

INSERT INTO `re_venue` (`revenue_id`, `revenue_name`, `details`, `date_y_m_d`, `amount`, `evidence_slip`, `years`, `id_user`, `funder`) VALUES
(36, 'xxc', 'xxcvd >^< # $ % ', '2022-08-02', 22000, 'img_62e9402695714.jpeg', '2022', 'ฟามี่ เคราวฟ์', 'marea soree'),
(38, 'xxxx', 'xxxx123', '2022-08-25', 112000, 'img_63075ffb3e3b8.jpeg', '2022', 'ฟามี่ เคราวฟ์', 'kimjon en'),
(39, 'ssss', 'sss', '2022-08-25', 1000, 'img_630761335ebff.jpeg', '2022', 'ฟามี่ เคราวฟ์', 'mataja'),
(41, 'xxxx', 'xxxx', '2022-08-26', 10000, 'img_630859275388b.jpg', '2022', 'ฟามี่ เคราวฟ์', 'caree waa'),
(42, 'ccccc', 'hhhhh', '2020-08-26', 123000, 'img_6308598454c51.jpg', '2020', 'ฟามี่ เคราวฟ์', 'reawee cha'),
(43, 'set revenue', 'revenue test men 2022', '2022-06-26', 13000, 'img_63085ab94f143.jpg', '2022', 'softwan ahmad', 'selensky'),
(44, 'xxx', 'xxxx', '2021-05-06', 124000, 'img_63163acd038b5.jpeg', '2021', 'ฟามี่ เคราวฟ์', 'sekutghi sabel'),
(45, 'cxccxx taliban แจก money', 'taliban of kongkerer afkanistan to fab moune', '2019-03-06', 1100000, 'img_63163b54d2a6b.jpeg', '2019', 'ฟามี่ เคราวฟ์', 'rohman kalingse'),
(46, 'majahidin แจก money เพื่อซื่อ Gun', 'majahidin ถายใต้ binlading สนับสนุนให้ kongkerer is the konstandtinoble19', '2022-09-06', 900009, 'img_63163c462ab39.jpeg', '2022', 'ฟามี่ เคราวฟ์', 'osama binlading'),
(47, 'xccc', 'reteee menber munny', '2022-10-15', 25500, 'img_634ac3cd28123.jpeg', '2022', 'ฟามี่ เคราวฟ์', 'master day'),
(50, 'ปปป', 'ปอปอปอป', '2022-10-24', 20000, 'img_6356450d15c44.jpeg', '2022', 'ฟามี่ เคราวฟ์', 'kussibel');

-- --------------------------------------------------------

--
-- Table structure for table `set_patrons`
--

CREATE TABLE `set_patrons` (
  `setidpatron` int(11) NOT NULL,
  `patron_id` int(11) NOT NULL,
  `scholarship_amount` int(11) NOT NULL,
  `total_money` int(11) NOT NULL,
  `patron_day` date NOT NULL,
  `person_number` int(11) NOT NULL,
  `slip_image_patronset` varchar(100) NOT NULL,
  `date_capital` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `set_patrons`
--

INSERT INTO `set_patrons` (`setidpatron`, `patron_id`, `scholarship_amount`, `total_money`, `patron_day`, `person_number`, `slip_image_patronset`, `date_capital`) VALUES
(12, 31, 10000, 100000, '2022-09-09', 10, 'img_631a57026c7ee.jpeg', '2022-09-09'),
(13, 36, 500, 2000, '2022-09-07', 4, 'img_631a5ea61d789.jpeg', '2022-09-09'),
(14, 37, 1000, 3000, '2022-09-10', 3, 'img_631f6033e2ad5.jpeg', '2022-09-12'),
(15, 33, 1000, 20000, '2022-09-12', 20, 'img_6320acd43397e.jpeg', '2022-09-13'),
(16, 35, 1000, 20000, '2022-10-22', 20, 'img_63555819da272.jpeg', '2022-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `topnews`
--

CREATE TABLE `topnews` (
  `id_news` int(11) NOT NULL,
  `header_news` text NOT NULL,
  `detail_news` text NOT NULL,
  `type_news` varchar(100) NOT NULL,
  `id_user_create` int(11) NOT NULL,
  `set_date` date NOT NULL,
  `news_image` varchar(130) NOT NULL,
  `preview_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topnews`
--

INSERT INTO `topnews` (`id_news`, `header_news`, `detail_news`, `type_news`, `id_user_create`, `set_date`, `news_image`, `preview_number`) VALUES
(1, 'กิจกรรม สานสัมพันธ์ เครื่อยาติพี่น้องและคนต่างถิ่น ', 'กิจกรรมจะถูกจัดขึ้น ณ สถานที่หนึ่งใน3จังหวัดชายแดนภาคใต้ โดยให้ผู้เข้าร่วมทำความรู้จัก วิถีชีวิตของชาวบ้าน กิจกรรมนี้จัดขึ้นโดยใช้เวลาประมาณ3วัน ', 'ข่าวสารทั่วไป', 19, '2021-12-13', 'img_61b63724959b5.jpeg', 9),
(3, 'จักรวาลมาร์เวล', 'จักรวาลภาพยนตร์มาร์เวล (อังกฤษ: Marvel Cinematic Universe; MCU) เป็นสื่อแฟรนไชส์อเมริกันและจักรวาลร่วมซึ่งมีศูนย์กลางอยู่ที่ภาพยนตร์ชุดของภาพยนตร์ซูเปอร์ฮีโรที่สร้างโดย มาร์เวลสตูดิโอส์ ซึ่งสร้างจากตัวละครที่ปรากฏอยู่ในหนังสือการ์ตูนอเมริกันที่ตีพิมพ์โดย มาร์เวลคอมิกส์ แฟรนไชส์ยังประกอบด้วย หนังสือการ์ตูน ภาพยนตร์สั้น ละครชุดโทรทัศน์และดิจิทัลซีรีส์ จักรวาลร่วมนั้นเหมือนกับ จักรวาลมาร์เวล ในหนังสือการ์ตูน ที่มีการข้ามฝั่งระหว่างองค์ประกอบโครงเรื่องทั่วไป สถานที่ดำเนินเรื่อง นักแสดงและตัวละคร', 'โครงการ', 19, '2021-12-14', 'img_61b788fb976ef.jpeg', 9),
(4, 'mavel expresso xxcs', 'This is a wider card with supporting text below as a natural lead-in to additional content. This is a wider card with supporting text below as a natural lead-in to additional content.', 'กิจกรรม', 48, '2022-07-12', 'img_62cc68de1cccc.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status_users` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `fullname`, `photo`, `status_users`) VALUES
(19, 'admin1@gmail.com', '12345', 'myadmin zero defoult', 'x1x2.jpg', 'admin'),
(41, 'fatin114@gmail.com', '123456', 'อิฟฟาน สาและ', '', 'chairman'),
(42, 'adul_007@hotmail.com', '123456', 'อับดุลเราะมาน เส็นสอ', '131578287_3126554114112765_5864583287024527668_n.jpg', 'officer'),
(47, 'softwan112@gmail.com', '123123', 'softwan ahmad', '22497-removebg-preview.jpg', 'volunteer'),
(48, 'volunteer1@gmail.com', '123123volunteer', 'ฟามี่ เคราวฟ์', 'images (2).jpeg', 'volunteer'),
(49, 'officer1@gmail.com', '123456', 'มีลัยอาร์ สรรนารี', 'images (1).jpeg', 'officer'),
(63, 'eerr1@gmail.com', '112233qw', 'retort qweqwe', '385843ea0d.jpg', 'volunteer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appeal`
--
ALTER TABLE `appeal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board_users`
--
ALTER TABLE `board_users`
  ADD PRIMARY KEY (`bord_id`);

--
-- Indexes for table `board_users2_contact`
--
ALTER TABLE `board_users2_contact`
  ADD PRIMARY KEY (`board2_id`);

--
-- Indexes for table `board_users3_school`
--
ALTER TABLE `board_users3_school`
  ADD PRIMARY KEY (`board3_id`);

--
-- Indexes for table `board_users4_location_address`
--
ALTER TABLE `board_users4_location_address`
  ADD PRIMARY KEY (`board4_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expenses_id`);

--
-- Indexes for table `formfour_status_orphan`
--
ALTER TABLE `formfour_status_orphan`
  ADD PRIMARY KEY (`id_formfour`);

--
-- Indexes for table `formone_orphan_record`
--
ALTER TABLE `formone_orphan_record`
  ADD PRIMARY KEY (`id_orphan`);

--
-- Indexes for table `formtree_parents_orphan`
--
ALTER TABLE `formtree_parents_orphan`
  ADD PRIMARY KEY (`id_parents`);

--
-- Indexes for table `formtrue_orphan_school`
--
ALTER TABLE `formtrue_orphan_school`
  ADD PRIMARY KEY (`id_addr_school`);

--
-- Indexes for table `fundation`
--
ALTER TABLE `fundation`
  ADD PRIMARY KEY (`id_fundation`);

--
-- Indexes for table `joins_id_project`
--
ALTER TABLE `joins_id_project`
  ADD PRIMARY KEY (`join_id`);

--
-- Indexes for table `map_location_orphan`
--
ALTER TABLE `map_location_orphan`
  ADD PRIMARY KEY (`map_id`);

--
-- Indexes for table `patron`
--
ALTER TABLE `patron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patron_scholarship`
--
ALTER TABLE `patron_scholarship`
  ADD PRIMARY KEY (`id_scholarship`);

--
-- Indexes for table `personal_user`
--
ALTER TABLE `personal_user`
  ADD PRIMARY KEY (`personal_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_participant`
--
ALTER TABLE `project_participant`
  ADD PRIMARY KEY (`id_project_participant`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`PROVINCE_ID`);

--
-- Indexes for table `re_venue`
--
ALTER TABLE `re_venue`
  ADD PRIMARY KEY (`revenue_id`);

--
-- Indexes for table `set_patrons`
--
ALTER TABLE `set_patrons`
  ADD PRIMARY KEY (`setidpatron`);

--
-- Indexes for table `topnews`
--
ALTER TABLE `topnews`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appeal`
--
ALTER TABLE `appeal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `board_users`
--
ALTER TABLE `board_users`
  MODIFY `bord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `board_users2_contact`
--
ALTER TABLE `board_users2_contact`
  MODIFY `board2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `board_users3_school`
--
ALTER TABLE `board_users3_school`
  MODIFY `board3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `board_users4_location_address`
--
ALTER TABLE `board_users4_location_address`
  MODIFY `board4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `formfour_status_orphan`
--
ALTER TABLE `formfour_status_orphan`
  MODIFY `id_formfour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `formone_orphan_record`
--
ALTER TABLE `formone_orphan_record`
  MODIFY `id_orphan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `formtree_parents_orphan`
--
ALTER TABLE `formtree_parents_orphan`
  MODIFY `id_parents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `formtrue_orphan_school`
--
ALTER TABLE `formtrue_orphan_school`
  MODIFY `id_addr_school` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `fundation`
--
ALTER TABLE `fundation`
  MODIFY `id_fundation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `joins_id_project`
--
ALTER TABLE `joins_id_project`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `map_location_orphan`
--
ALTER TABLE `map_location_orphan`
  MODIFY `map_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `patron`
--
ALTER TABLE `patron`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `patron_scholarship`
--
ALTER TABLE `patron_scholarship`
  MODIFY `id_scholarship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `personal_user`
--
ALTER TABLE `personal_user`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `project_participant`
--
ALTER TABLE `project_participant`
  MODIFY `id_project_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `PROVINCE_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `re_venue`
--
ALTER TABLE `re_venue`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `set_patrons`
--
ALTER TABLE `set_patrons`
  MODIFY `setidpatron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `topnews`
--
ALTER TABLE `topnews`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

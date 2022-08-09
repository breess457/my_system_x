-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2022 at 03:52 PM
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
  `post_datenow` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appeal`
--

INSERT INTO `appeal` (`id`, `full_name`, `phone`, `date_new`, `email`, `address`, `header_appeal`, `content_appeal`, `post_datenow`) VALUES
(1, 'นาย อูซาม่า  บินลาดิน', '0934102731', '2010-08-02', 'uSamaBinladin121@gmail.com', '65/1 cowing babana woruncity kabur affkanistan 67990 ', 'ถูกตามล่าโดยเมกา ', 'ถูกกล่าวหาว่า เป็นผู้นำกลุ่มก่อการร้ายข้่ามชาติ(อัลกออีดะห์) ', '2022-08-02');

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
(3, 'นรน xx', 'สาสาสา', '2021-08-01', 5555, 'img_61e90ef3ae70b.jpeg', '2021'),
(4, 'myset expenses a company where pizza s', 'pizza one state amount 100$ tha pizza 120 state x s', '2021-08-04', 12000, 'img_61e90ee48dc65.jpeg', '2021'),
(6, 'expenses project', 'epenses project ndivea', '2021-11-20', 13200, 'img_61e90ed797705.jpeg', '2021'),
(7, 'x', 'xxx', '2022-01-20', 50000, 'img_61e90ecabdb7e.jpeg', '2022'),
(9, 'cf', 'hello cf', '2022-02-01', 15000, 'img_61f82e244dd5e.jpeg', '2022');

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
  `revenue_family` int(16) NOT NULL,
  `deceased` varchar(50) NOT NULL,
  `cause_death` varchar(300) NOT NULL,
  `death_day` date NOT NULL,
  `study_status` varchar(120) NOT NULL,
  `year_study` varchar(70) NOT NULL,
  `cause_stop_study` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formfour_status_orphan`
--

INSERT INTO `formfour_status_orphan` (`id_formfour`, `id_join_orphan`, `image_home`, `family_status`, `level_help`, `estimate_help`, `revenue_family`, `deceased`, `cause_death`, `death_day`, `study_status`, `year_study`, `cause_stop_study`) VALUES
(2, 2, 'img_61da5747280cd.jpeg', 'ยากจนรายไม่เพียงพอ', 'ปกติ', 'ด้านเศรษฐกิจ', 7300, 'แม่เสียชีวิต', 'รถชน', '2019-12-27', 'กำลังเรียน', 'ป.4', 'ไม่มี'),
(5, 6, 'img_6294f2545bfac.jpg', 'พอกิน', 'ปกติ', 'ด้านร่างกาย', 14000, 'แม่เสียชีวิต', 'โรค', '2021-04-14', 'กำลังเรียน', 'ป.4', '-'),
(6, 7, 'img_629b592d0bb64.png', 'ปกติ', 'ปกติ', 'ด้านอารมฌ์และจิตใจ', 15000, 'แม่เสียชีวิต', 'โดนลอบฆ่า', '2021-05-11', 'กำลังเรียน', 'ม.1', '-not'),
(7, 8, 'img_629f95c8b64c7.jpg', 'ไม่มีรายได้ไม่มีทางออก', 'เร่งด่วน', 'ด้านอารมณ์และจิตใจ', 0, 'เสียชีวิตทั้งพ่อและแม่', 'พ่อโดนประหาร/แม่โดนลอบสังหาร', '2022-06-01', 'กำลังเรียน', 'ป.5', '-');

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
(8, '2022-06-08', 'เด็กหญิง', 'มิคาสะ', 'แอคเคอร์แมน', '2011-06-08', 11, 145, 23, 'o', '1970277430112', '0840921109', 1, 1, 'img_629f8acfde9a7.jpg');

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
  `fullname_mather` varchar(250) NOT NULL,
  `occupation_mather` varchar(120) NOT NULL,
  `income_mather` int(20) NOT NULL,
  `berd_day_mather` date NOT NULL,
  `age_mather` int(11) NOT NULL,
  `tell_mather` varchar(15) NOT NULL,
  `status_mather` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formtree_parents_orphan`
--

INSERT INTO `formtree_parents_orphan` (`id_parents`, `join_id_orphan`, `fullname_father`, `occupation_father`, `income_father`, `berd_day_father`, `age_father`, `tell_father`, `status_father`, `fullname_mather`, `occupation_mather`, `income_mather`, `berd_day_mather`, `age_mather`, `tell_mather`, `status_mather`) VALUES
(2, 2, 'นาย ซอและ  มามะ', 'ชาวนา', 7200, '1983-05-02', 38, '0820965897', 'ยังมีชีวิตอยู่', 'นางสาว ฮุสณี  ลาเตะ', 'แม่ค้า', 12000, '1986-08-11', 35, '0820965897', 'เสียชีวิต'),
(4, 6, 'นาย ฮารุน  ดอเลาะ', 'ครู', 12000, '1980-04-12', 42, '0933013719', 'ยังมีชีวิตอยู่', 'นางสาว มารียัม  โหระ', '-', 0, '1985-05-10', 37, '0840931102', 'เสียชีวิต'),
(5, 7, 'นาย ซิลเวอร์  โซลดิก', 'นักฆ่า', 15000, '1990-01-23', 32, '0940874089', 'ยังมีชีวิตอยู่', 'นางสาว คิเคียว  โซลดิก', 'แม่บ้าน', 1000, '1994-06-04', 28, '0954103018', 'เสียชีวิต'),
(6, 8, 'นาย เคต์นนี้  แอคเคอร์แมน', 'สายลับ(ฝั่งกบฏ)', 50000, '2092-11-03', 31, '0984193018', 'เสียชีวิต', 'นางสาว ไดอานี  แอคเคอร์แมน', 'ข้าราชกาลลับ', 56000, '2095-02-19', 28, '0984103918', 'เสียชีวิต');

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
(8, '51/9 บ้านดี ม.6', 'กะมิยอ', 'เมืองปัตตานี', 'ปัตตานี', 94000, 'ยังไม่เรียน', '-', '-', '-', 94000, 'บ้านกะมียอ', 'กะมิยอ', 'เมืองปัตตานี', 'ปัตตานี', 94000, 8);

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
(1, 'นาย', 'มุสตาวาก', 'สาและ', 30, 'ชาย', 'mustawa1@gmail.com', '0932514940', '1940800394551', 'devloper', 'compane One', 'img_62a06c5e05ace.jpg', '99/12 บ้านกูนิง ม6', 'ยาบี', 'หนองจิก', 'ปัตตานี', '94170'),
(5, 'นางสาว', 'ฟัตมา', 'สาแม', 24, 'หญิง', 'fatma24@gmail.com', '0940831102', '1970611034221', 'ครู', 'โรงเรียนแห่งหนึ่ง', 'img_62a05d48b65a3.jpg', '51/5 กูนิง ม8', 'กะรุบี', 'กะพ้อ', 'ปัตตานี', '94230'),
(10, 'นาย', 'ั้เ', 'เ้เ', 55, 'ชาย', 'adul_007@gmail.com', '0933080097', '19419941088552', 'าาาา', '่ืืืดเดเด', 'img_62d441acdd86f.jpeg', 'เ้เด้', 'ดเก้กดเ้', 'กดเ้กดเ้', 'เด้กดเ้', '54555588888');

-- --------------------------------------------------------

--
-- Table structure for table `get_help_from`
--

CREATE TABLE `get_help_from` (
  `id` int(10) NOT NULL,
  `id_orphan` varchar(10) NOT NULL,
  `project_1` varchar(20) NOT NULL,
  `project_2` varchar(20) NOT NULL,
  `project_3` varchar(20) NOT NULL,
  `project_4` varchar(20) NOT NULL,
  `project_5` varchar(20) NOT NULL,
  `project_6` varchar(20) NOT NULL,
  `project_7` varchar(20) NOT NULL,
  `project_8` varchar(20) NOT NULL,
  `project_9` varchar(20) NOT NULL,
  `project_10` varchar(20) NOT NULL,
  `project_11` varchar(20) NOT NULL,
  `project_12` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `new_date` date NOT NULL,
  `end_date` date NOT NULL,
  `munny` varchar(15) NOT NULL,
  `all_munny` varchar(20) NOT NULL,
  `img_slip_patron` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patron`
--

INSERT INTO `patron` (`id`, `title`, `f_name`, `l_name`, `id_card`, `number_home`, `district_t`, `district_a`, `district_j`, `zip_code`, `tell`, `career`, `workplace`, `new_date`, `end_date`, `munny`, `all_munny`, `img_slip_patron`) VALUES
(20, 'นาย', 'hell', 'me', '1940100213334', '59/1', 'bana', 'moung', 'pattani', '98000', '0940832213', 'programmer', 'work from home', '2021-11-24', '2021-11-30', '300', '13000', 'img_619e6f317d06a.png'),
(25, 'นาย', 'hell', 'me', '1940100213334', '60/9', 'donruk', 'nongjic', 'pattani', '99099', '0940832211', 'dev master', 'work from home', '2021-11-26', '2021-11-27', '500', '50000', 'img_619fe139e0cff.jpeg'),
(27, 'นาย', 'hell woman', 'kill me', '1940100213334', '60/9', 'donruk', 'nongjic', 'pattani', '99999', '0940832213', 'dev master', 'work from home', '2021-11-26', '2021-11-27', '200', '20000', ''),
(28, 'นาย', 'มะนาวี', 'สาและ', '1941000272000', '5/9 หมู่ 7', 'อาเนาะรู', 'เมือง', 'ปัตตานี', '94160', '0933080097', 'พ่อค้า', 'สวนยาง', '2022-07-20', '2022-07-28', '1000', '111000', '');

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
(24, 20, 2, '2022-01-14'),
(25, 25, 2, '2022-01-14'),
(29, 20, 6, '2022-06-01');

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
(22, 41, 'นาย', 'อิฟฟาน', 'สาและ', '1941000272052', '0933080097', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62c579d899900.jpg', 15, 'ชาย'),
(23, 42, 'นาย', 'อับดุลเราะมาน', 'เส็นสอ', '1941000272052', '0933080097', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62c57a8d9a9a4.jpg', 25, 'ชาย'),
(26, 45, 'นาย', 'อับดุลเราะมาน', 'เส็นสอ', '1941000272052', '5555555555444444', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62c8669b00e63.jpg', 24, 'ชาย'),
(28, 47, 'นาย', 'softwan', 'ahmad', '1940100202331', '0962315546', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62c8673cb706c.jpg', 23, 'ชาย'),
(29, 48, 'นาย', 'ฟามี่', 'เคราวฟ์', '1980100204331', '0930830010', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62cc5167c540f.jpeg', 24, 'ชาย'),
(30, 49, 'นางสาว', 'มีลัยอาร์', 'สรรน', '1970100203442', '0623092515', 'ถูกเอาออก ถ้าลบcolum นี้ออก error แน่', 'img_62cc4eef855e7.jpeg', 25, 'หญิง');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `title` varchar(10) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
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

INSERT INTO `project` (`id`, `project_id`, `project_name`, `title`, `f_name`, `l_name`, `detail_project`, `operating_area`, `project_year`, `start_date`, `end_date`, `img_project`, `filename_project`) VALUES
(25, '4057', 'edit my mom', 'my', 'masterxx', 'root', 'Detail my mom hell extentded html elements x', 'mayoa pattani 94000', '2021', '2021-11-11', '2021-11-22', 'img_62571bb6eaba1.webp', 'file_62d4591d5f84a.pdf'),
(27, '0', 'x mrct', 'xx', 'vvsess', 'cc', 'xcvbnhgfr', 'xxx area', '2022', '2022-07-13', '2022-07-26', 'img_62d459019168e.jpg', 'file_62d45901919b8.pdf'),
(28, '0', 'tom and jerry', 'mr', 'mister', 'been', 'xxxxxxxx frif;;skdo test file PDF', 'pattani', '2022', '2022-07-19', '2022-07-27', 'img_62d44fbf91282.jpg', 'file_62d44fbf91740.pdf'),
(29, 'ถ้าลบ error แน่', 'of deeree', 'is', 'values sql xxx', 'dekree', 'cxxxx', 'xxx', '2022', '2022-08-04', '2022-08-16', 'img_62ebed66d8e4c.png', 'file_62ebed66d8f8c.pdf');

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
(49, 27, 2, '2022-07-19'),
(50, 27, 6, '2022-07-19'),
(54, 25, 2, '2022-08-05'),
(55, 25, 7, '2022-08-05'),
(56, 25, 8, '2022-08-05'),
(58, 29, 2, '2022-08-07'),
(59, 29, 6, '2022-08-07'),
(60, 27, 7, '2022-08-07'),
(62, 28, 6, '2022-08-08');

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
  `years` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `re_venue`
--

INSERT INTO `re_venue` (`revenue_id`, `revenue_name`, `details`, `date_y_m_d`, `amount`, `evidence_slip`, `years`) VALUES
(34, 'revenue test 2022', 'xxx revenue 20000 year2022', '2022-07-30', 20000, 'img_62e55fb96ded3.jpeg', '2022'),
(35, 'revenue test year 2021', 'xxx > = xx $ {}', '2021-08-02', 23000, 'img_62e93f89a2928.jpeg', '2022'),
(36, 'xxc', 'xxcvd >^< # $ % ', '2022-08-02', 12000, 'img_62e9402695714.jpeg', '2022'),
(37, 'xxx', 'xxx', '2022-08-05', 12000, 'img_62ec9f9c5864e.png', '2022');

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
(1, 'กิจกรรม สานสัมพันธ์ เครื่อยาติพี่น้องและคนต่างถิ่น ', 'กิจกรรมจะถูกจัดขึ้น ณ สถานที่หนึ่งใน3จังหวัดชายแดนภาคใต้ โดยให้ผู้เข้าร่วมทำความรู้จัก วิถีชีวิตของชาวบ้าน กิจกรรมนี้จัดขึ้นโดยใช้เวลาประมาณ3วัน ', 'กิจกรรม', 19, '2021-12-13', 'img_61b63724959b5.jpeg', 5),
(3, 'จักรวาลมาร์เวล', 'จักรวาลภาพยนตร์มาร์เวล (อังกฤษ: Marvel Cinematic Universe; MCU) เป็นสื่อแฟรนไชส์อเมริกันและจักรวาลร่วมซึ่งมีศูนย์กลางอยู่ที่ภาพยนตร์ชุดของภาพยนตร์ซูเปอร์ฮีโรที่สร้างโดย มาร์เวลสตูดิโอส์ ซึ่งสร้างจากตัวละครที่ปรากฏอยู่ในหนังสือการ์ตูนอเมริกันที่ตีพิมพ์โดย มาร์เวลคอมิกส์ แฟรนไชส์ยังประกอบด้วย หนังสือการ์ตูน ภาพยนตร์สั้น ละครชุดโทรทัศน์และดิจิทัลซีรีส์ จักรวาลร่วมนั้นเหมือนกับ จักรวาลมาร์เวล ในหนังสือการ์ตูน ที่มีการข้ามฝั่งระหว่างองค์ประกอบโครงเรื่องทั่วไป สถานที่ดำเนินเรื่อง นักแสดงและตัวละคร', 'บันเทิง', 19, '2021-12-14', 'img_61b788fb976ef.jpeg', 7),
(4, 'mavel expresso xxcs', 'This is a wider card with supporting text below as a natural lead-in to additional content. This is a wider card with supporting text below as a natural lead-in to additional content.', 'กิจกรรม', 48, '2022-07-12', 'img_62cc68de1cccc.jpg', 3);

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
(45, 'fatin1J14@gmail.com', '123456', 'อับดุลเราะมาน เส็นสอ', '', 'volunteer'),
(47, 'softwan112@gmail.com', '123123', 'softwan ahmad', '22497-removebg-preview.jpg', 'volunteer'),
(48, 'volunteer1@gmail.com', '123123volunteer', 'ฟามี่ เคราวฟ์', 'images (2).jpeg', 'volunteer'),
(49, 'officer1@gmail.com', '12345', 'มีลัยอาร์ สรรน', 'images (1).jpeg', 'officer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appeal`
--
ALTER TABLE `appeal`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `get_help_from`
--
ALTER TABLE `get_help_from`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joins_id_project`
--
ALTER TABLE `joins_id_project`
  ADD PRIMARY KEY (`join_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expenses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `formfour_status_orphan`
--
ALTER TABLE `formfour_status_orphan`
  MODIFY `id_formfour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `formone_orphan_record`
--
ALTER TABLE `formone_orphan_record`
  MODIFY `id_orphan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `formtree_parents_orphan`
--
ALTER TABLE `formtree_parents_orphan`
  MODIFY `id_parents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `formtrue_orphan_school`
--
ALTER TABLE `formtrue_orphan_school`
  MODIFY `id_addr_school` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fundation`
--
ALTER TABLE `fundation`
  MODIFY `id_fundation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `get_help_from`
--
ALTER TABLE `get_help_from`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joins_id_project`
--
ALTER TABLE `joins_id_project`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patron`
--
ALTER TABLE `patron`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `patron_scholarship`
--
ALTER TABLE `patron_scholarship`
  MODIFY `id_scholarship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_user`
--
ALTER TABLE `personal_user`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `project_participant`
--
ALTER TABLE `project_participant`
  MODIFY `id_project_participant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `PROVINCE_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `re_venue`
--
ALTER TABLE `re_venue`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `topnews`
--
ALTER TABLE `topnews`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

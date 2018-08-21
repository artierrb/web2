-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 06:34 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `b_id` int(2) NOT NULL,
  `b_name` varchar(250) NOT NULL,
  `b_score` int(2) NOT NULL,
  `b_info` varchar(250) NOT NULL,
  `b_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`b_id`, `b_name`, `b_score`, `b_info`, `b_image`) VALUES
(1, 'ฟาร์มฮัก', 10, 'ฟาร์มแกะและร้านอาหารสไตล์คาวบอย ชื่อว่า Farm Hug สามารถเข้าไปให้เข้าไปให้อาหารได้อย่างใกล้ชิด', 'img/portfolio/แกะ.png'),
(3, 'พระตำหนักภูพาน', 5, 'เป็นที่ประทับแรมของพระเจ้าอยู่หัว รัชกาลที่ 9 ใช้เมื่อทรงมาเยี่ยมประชาชนในพื้นที่ภาคอีสาน ตกแต่งแบบเรียบง่าย และใกล้ชิดธรรมชาต', 'img/portfolio/ภูพาน.png'),
(5, 'หมู่บ้านท่าเกลือ', 6, 'หมู่บ้านทำเกลือ ตั้งอยู่ที่ อ.วานรนิวาส เป็นสถานที่ทำเกลือจากใต้ดิน ที่ใหญ่ที่สุดในอีสาน', 'img/portfolio/เกลือ.png');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `score_point` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `score_point`) VALUES
(1, 3),
(2, 5),
(3, 1),
(4, 2),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbladministrator`
--

CREATE TABLE `tbladministrator` (
  `admin_id` int(3) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูผูดูแลระบบ';

-- --------------------------------------------------------

--
-- Table structure for table `tblads_banner`
--

CREATE TABLE `tblads_banner` (
  `banner_id` int(3) NOT NULL,
  `banner_file` varchar(255) NOT NULL,
  `banner_timeup` date NOT NULL,
  `banner_timeend` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblattrlocation_type`
--

CREATE TABLE `tblattrlocation_type` (
  `location_type_id` int(11) NOT NULL,
  `location_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูประเภทสถานที';

-- --------------------------------------------------------

--
-- Table structure for table `tblfestival`
--

CREATE TABLE `tblfestival` (
  `Festival_ID` int(11) NOT NULL,
  `Festival_Header` varchar(250) NOT NULL,
  `Festival_Info` text NOT NULL,
  `Festival_Season` text NOT NULL,
  `Festival_Img1` varchar(250) NOT NULL,
  `Festival_Img2` varchar(250) NOT NULL,
  `Festival_Img3` varchar(250) NOT NULL,
  `Festival_Img4` varchar(250) NOT NULL,
  `Festival_Img5` varchar(250) NOT NULL,
  `Festival_Img6` varchar(250) NOT NULL,
  `Festival_Img7` varchar(250) NOT NULL,
  `Festival_Img8` varchar(250) NOT NULL,
  `Festival_Img9` varchar(250) NOT NULL,
  `Festival_Img10` varchar(250) NOT NULL,
  `Festival_Imginfo1` text NOT NULL,
  `Festival_Imginfo2` text NOT NULL,
  `Festival_Imginfo3` text NOT NULL,
  `Festival_Imginfo4` text NOT NULL,
  `Festival_Imginfo5` text NOT NULL,
  `Festival_Imginfo6` text NOT NULL,
  `Festival_Imginfo7` text NOT NULL,
  `Festival_Imginfo8` text NOT NULL,
  `Festival_Imginfo9` text NOT NULL,
  `Festival_Imginfo10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblfestival`
--

INSERT INTO `tblfestival` (`Festival_ID`, `Festival_Header`, `Festival_Info`, `Festival_Season`, `Festival_Img1`, `Festival_Img2`, `Festival_Img3`, `Festival_Img4`, `Festival_Img5`, `Festival_Img6`, `Festival_Img7`, `Festival_Img8`, `Festival_Img9`, `Festival_Img10`, `Festival_Imginfo1`, `Festival_Imginfo2`, `Festival_Imginfo3`, `Festival_Imginfo4`, `Festival_Imginfo5`, `Festival_Imginfo6`, `Festival_Imginfo7`, `Festival_Imginfo8`, `Festival_Imginfo9`, `Festival_Imginfo10`) VALUES
(1, 'เทศกาลแห่ดาว ท่าแร่', 'ชมขบวนแห่ดาวคริสต์มาส “มหัศจรรย์สีสันดาวบนดิน” กว่า 20 คันชมสถาปัตยกรรมโคโลเนียลอายุกว่า 100 ปี บ้านเรือนที่ประดับไปด้วยดาว ไฟแสงสีระยิบยับ การสาธิตการทำดาว และถนนคนเดิน', '23 - 25 ธันวาคม', 'img/p1/festival/1.jpg', 'img/p1/festival/2.jpg', 'img/p1/festival/3.jpg', 'img/p1/festival/4.jpg', 'img/p1/festival/5.jpg', 'img/p1/festival/6.jpg', '', '', '', '', 'Festival info 1', 'Festival info 2', 'Festival info 3', 'Festival info 4', 'Festival info 5', 'Festival info 6', '', '', '', ''),
(3, 'เทศกาลแห่ดาว ท่าแร่', 'ชมขบวนแห่ดาวคริสต์มาส “มหัศจรรย์สีสันดาวบนดิน” กว่า 20 คันชมสถาปัตยกรรมโคโลเนียลอายุกว่า 100 ปี บ้านเรือนที่ประดับไปด้วยดาว ไฟแสงสีระยิบยับ การสาธิตการทำดาว และถนนคนเดิน', '23 - 25 ธันวาคม', 'img/p1/festival/1.jpg', 'img/p1/festival/2.jpg', 'img/p1/festival/3.jpg', 'img/p1/festival/4.jpg', 'img/p1/festival/5.jpg', 'img/p1/festival/6.jpg', '', '', '', '', 'Festival info 1', 'Festival info 2', 'Festival info 3', 'Festival info 4', 'Festival info 5', 'Festival info 6', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblfestival2`
--

CREATE TABLE `tblfestival2` (
  `location_id` int(11) NOT NULL,
  `festival_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `festival_name` varchar(50) NOT NULL,
  `festival_info` text NOT NULL,
  `festival_timeup` date NOT NULL,
  `festival_timeend` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูเทศกาล';

--
-- Dumping data for table `tblfestival2`
--

INSERT INTO `tblfestival2` (`location_id`, `festival_id`, `member_id`, `festival_name`, `festival_info`, `festival_timeup`, `festival_timeend`) VALUES
(1, 1, 0, 'เทศกาลแห่ดาว ท่าแร่', 'ชมขบวนแห่ดาวคริสต์มาส “มหัศจรรย์สีสันดาวบนดิน” กว่า 20 คันชมสถาปัตยกรรมโคโลเนียลอายุกว่า 100 ปี บ้านเรือนที่ประดับไปด้วยดาว ไฟแสงสีระยิบยับ การสาธิตการทำดาว และถนนคนเดิน', '2018-03-05', '2018-03-06'),
(217, 217, 108, '6', '6', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tblfestival2_image`
--

CREATE TABLE `tblfestival2_image` (
  `location_id` int(11) NOT NULL,
  `festival_id` int(11) NOT NULL,
  `festival_image_id` int(2) NOT NULL,
  `festival_image_file` varchar(255) NOT NULL,
  `festival_image_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูภาพเทศกาล';

--
-- Dumping data for table `tblfestival2_image`
--

INSERT INTO `tblfestival2_image` (`location_id`, `festival_id`, `festival_image_id`, `festival_image_file`, `festival_image_info`) VALUES
(0, 1, 1, 'img/festival/1.jpg', 'fs1'),
(0, 1, 2, 'img/festival/2.jpg', 'fs2'),
(0, 1, 3, 'img/festival/3.jpg', 'fs3'),
(0, 1, 4, 'img/festival/4.jpg', 'fs4'),
(0, 1, 5, 'img/festival/5.jpg', 'fs5'),
(0, 1, 6, 'img/festival/6.jpg', 'fs6'),
(217, 217, 7, 'img/6.jpg', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tblhotel`
--

CREATE TABLE `tblhotel` (
  `Hotel_ID` int(11) NOT NULL,
  `Hotel_Header` varchar(250) NOT NULL,
  `Hotel_Info` text NOT NULL,
  `Hotel_Telephone` int(10) NOT NULL,
  `Hotel_Price` varchar(250) NOT NULL,
  `Hotel_Img1` varchar(250) NOT NULL,
  `Hotel_Img2` varchar(250) NOT NULL,
  `Hotel_Img3` varchar(250) NOT NULL,
  `Hotel_Img4` varchar(250) NOT NULL,
  `Hotel_Img5` varchar(250) NOT NULL,
  `Hotel_Img6` varchar(250) NOT NULL,
  `Hotel_Img7` varchar(250) NOT NULL,
  `Hotel_Img8` varchar(250) NOT NULL,
  `Hotel_Img9` varchar(250) NOT NULL,
  `Hotel_Img10` varchar(250) NOT NULL,
  `Hotel_Imginfo1` text NOT NULL,
  `Hotel_Imginfo2` text NOT NULL,
  `Hotel_Imginfo3` text NOT NULL,
  `Hotel_Imginfo4` text NOT NULL,
  `Hotel_Imginfo5` text NOT NULL,
  `Hotel_Imginfo6` text NOT NULL,
  `Hotel_Imginfo7` text NOT NULL,
  `Hotel_Imginfo8` text NOT NULL,
  `Hotel_Imginfo9` text NOT NULL,
  `Hotel_Imginfo10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblhotel`
--

INSERT INTO `tblhotel` (`Hotel_ID`, `Hotel_Header`, `Hotel_Info`, `Hotel_Telephone`, `Hotel_Price`, `Hotel_Img1`, `Hotel_Img2`, `Hotel_Img3`, `Hotel_Img4`, `Hotel_Img5`, `Hotel_Img6`, `Hotel_Img7`, `Hotel_Img8`, `Hotel_Img9`, `Hotel_Img10`, `Hotel_Imginfo1`, `Hotel_Imginfo2`, `Hotel_Imginfo3`, `Hotel_Imginfo4`, `Hotel_Imginfo5`, `Hotel_Imginfo6`, `Hotel_Imginfo7`, `Hotel_Imginfo8`, `Hotel_Imginfo9`, `Hotel_Imginfo10`) VALUES
(1, 'โรงแรมคุณทอง', 'บริการที่พักภายในฟาร์ม', 911111111, '300 - 2500 บาท', 'img/p1/hotel/1.jpg', 'img/p1/hotel/2.jpg', 'img/p1/hotel/3.jpg', 'img/p1/hotel/4.jpg', 'img/p1/hotel/5.jpg', 'img/p1/hotel/6.jpg', '', '', '', '', 'Hotel info 1', 'Hotel info 2', 'Hotel info 3', 'Hotel info 4', 'Hotel info 5', 'Hotel info 6', '', '', '', ''),
(3, 'โรงแรมคุณทอง', 'บริการที่พักภายในฟาร์ม', 911111111, '300 - 2500 บาท', 'img/p1/hotel/1.jpg', 'img/p1/hotel/2.jpg', 'img/p1/hotel/3.jpg', 'img/p1/hotel/4.jpg', 'img/p1/hotel/5.jpg', 'img/p1/hotel/6.jpg', '', '', '', '', 'Hotel info 1', 'Hotel info 2', 'Hotel info 3', 'Hotel info 4', 'Hotel info 5', 'Hotel info 6', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

CREATE TABLE `tbllocation` (
  `location_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `location_type` varchar(50) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `location_info` text NOT NULL,
  `location_address` text NOT NULL,
  `location_latitude` varchar(256) NOT NULL,
  `location_longitude` varchar(256) NOT NULL,
  `location_fee` varchar(20) NOT NULL,
  `location_route` text NOT NULL,
  `location_landmark` varchar(255) NOT NULL,
  `location_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บข้อมูลสถานที่';

--
-- Dumping data for table `tbllocation`
--

INSERT INTO `tbllocation` (`location_id`, `member_id`, `location_type`, `location_name`, `location_info`, `location_address`, `location_latitude`, `location_longitude`, `location_fee`, `location_route`, `location_landmark`, `location_date`) VALUES
(1, 0, '1', 'ฟาร์มฮัก', 'ฟาร์มแกะและร้านอาหารสไตล์คาวบอย ชื่อว่า Farm Hug สามารถเข้าไปให้เข้าไปให้อาหารได้อย่างใกล้ชิด', 'ตำบล โนนหอม อำเภอเมืองสกลนคร จังหวัดสกลนคร', 'TBL 01 LATITUDE', 'TBL 01 LONGITUDE', '500 - 900', 'หากเดินทางจากท่าอากาศยานสกลนคร ให้ตรงมาตามเส้นถนนหลักประมาณ 20 กิโลเมตร อยู่ติดกับถนนใหญ่ 223 เส้น สกลนคร-นายก จุดสังเกตง่าย ๆ คือข้างหน้าฟาร์มจะเป็นร้านโคขุนคุณทอง', 'ข้างหน้าเป็นร้านอาหารร้านโคขุนคุณทอง', '0000-00-00'),
(2, 0, '2', 'พระตำหนักภูพาน', 'เป็นที่ประทับแรมของพระเจ้าอยู่หัว รัชกาลที่ 9 ใช้เมื่อทรงมาเยี่ยมประชาชนในพื้นที่ภาคอีสาน ตกแต่งแบบเรียบง่าย และใกล้ชิดธรรมชาติ สร้างขึ้นในบริเวณเทือกเขาภูพาน ใน พ.ศ.2518 ภายในมีอาคารประทับส่วนพระองค์ \r\nอาคารพักองค์มนตรี ข้าราชบริภาร ', 'TBL 02 ADDRESS', 'TBL 02 LATITUDE', 'TBL 02 LONGITUDE', 'TBL 02 550', 'TBL 02 47000', 'TBL 02 LANDMARK', '0000-00-00'),
(3, 0, '0', 'หมู่บ้านท่าเกลือ', 'หมู่บ้านทำเกลือ ตั้งอยู่ที่ อ.วานรนิวาส เป็นสถานที่ทำเกลือจากใต้ดิน ที่ใหญ่ที่สุดในอีสาน', 'TBL 03 ADDRESS', 'TBL 03 LATITUDE', 'TBL 03 LONGITUDE', 'TBL 03 1000', 'TBL 03 ROUTE 66', 'TBL 03 LANDMARK', '0000-00-00'),
(4, 0, '0', 'หนองหาร', 'สกลนคร ก็คู่กับ หนองหาร\r\nเพราะ เป็นหนองน้ำขนาดใหญ่ เป็นแห่งประมง ที่พักผ่อนหย่อนใจ ของชาวสกลนคร', 'TBL 04 ADDRESS', 'TBL 04 LATITUDE', 'TBL 04 LONGITUDE', 'TBL 04 FEE', 'TBL 4 ROUTE', 'TBL 04 LANDMARK', '0000-00-00'),
(5, 0, '0', 'โฮงเจ้าฟองคำ', 'ตั้งอยู่ในพื้นที่ซึ่งแต่เดิม คือ คุ้มของเจ้าศรีตุมมา (หลานเจ้ามหาวงศ์เจ้าผู้ครองนครน่านองค์ที่ 6) ', '', '', '', '', '', '', '0000-00-00'),
(6, 0, '0', 'วัดพระธาตุเชิงชุม', 'ภายในวัดมีสิ่งศักดิ์สิทธิ์สำคัญของจังหวัด ได้แก่ พระธาตุเชิงชุม หลวงพ่อองค์แสน\r\nบ่อน้ำศักดิ์สิทธิ์', '', '', '', '', '', '', '0000-00-00'),
(7, 0, '0', 'ย่านชุมชนโบราณท่าแร่', 'หลายคนอาจสงสัยว่ามันน่าไปตรงไหน ? หลายคนไม่เคยรู้จัก...\r\nท่าแร่เป็นเมืองโบราณของชาวเวียดนาม  มีอาคารบ้านเรือนแบบโบราณมากมาย', '', '', '', '', '', '', '0000-00-00'),
(8, 0, '0', 'วัดถ้ำผาเด่น', 'วัดถ้ำผ่าเด่น เป็นวัดที่สร้างบนภูเขาหินทราย ตั้งอยู่ระหว่างเทือกเขาภูพาน และภูผายล  ศาสนาสถานถูกสร้างจากหินทรายขนาดใหญ่ โดยแกะสลักอย่างสวยงาม \r\nมีจุดชมวิวซึ่งสามารถชมวิวตัวเมืองสกลนคร 180 องศา ได้อย่างสวยงาม', '', '', '', '', '', '', '0000-00-00'),
(9, 0, '0', 'วัดป่าสุทธาวาส ', 'เป็นวัดที่หลวงปู่มั่น ภูริทัตโต มั่นเคยจำพรรษาอยู่ \r\nซึ่งภายในวัดเป็นที่ต้องของ พิพิธภัณฑ์อัฐบริขาร ซึ่งเก็บรวบรวมเครื่องใช้ต่างๆ\r\nรวมถึงหลักธรรมคำสอนของท่าน', '', '', '', '', '', '', '0000-00-00'),
(10, 0, '0', 'ตลาด 100 ปี เมืองปากพนัง', 'เป็นตลาดเก่าแก่ดั้งเดิมมากว่า 100 ปี ตั้งอยู่ บริเวณท่าเรือข้ามฝากฝั่งตะวันออก อาคารบ้านเรือนส่วนใหญ่ สร้างด้วยไม้ด้วยความที่ไม่ได้เป็นตลาดปรุงแต่ง ให้เก่าเหมือนหลาย ๆ ที่ ความเรียบง่ายและธรรมชาติของวิถีชีวิตผู้คนแถวนั้น', '', '', '', '', '', '', '0000-00-00'),
(11, 0, '0', 'พิพิธภัณฑ์อาจารย์มั่น ภูริทัตโต', 'ตั้งอยู่ในวัดป่าสุทธาวาส  อ.เมือง สกลนคร ตรงข้ามศูนย์ราชการจังหวัด พิพิธภัณฑ์มีลักษณะการ ก่อสร้างแบบสถาปัตยกรรมสมัยใหม่ประยุกต์ สร้างด้วยกระเบื้องดินเผา ภายในพิพิธภัณฑ์มีรูปหล่อเหมือนองค์ของพระอาจารย์มั่น ในท่านั่งสมาธิ  และมีตู้กระจกบรรจุอัฐิของท่านที่แปรสภาพเป็นแก้วผลึกใสสีขาว ยกฐานสูงพื้นปูด้วยหินอ่อน พร้อมทั้งตู้แสดงเครื่องอัฐ บริขาร รวมทั้งประวัติความเป็นมาของท่านตั้งแต่เกิดจนมรณภาพ', '', '', '', '', '', '', '0000-00-00'),
(12, 0, '0', 'จำลองชุดข้อมูลที่ 12', 'รายละเอียดชุดข้อมูลจำลองที่ 12', '', '', '', '', '', '', '0000-00-00'),
(13, 0, '0', 'จำลองชุดข้อมูลที่ 13', 'รายละเอียดชุดข้อมูลจำลองที่ 13', '', '', '', '', '', '', '0000-00-00'),
(14, 0, '0', 'จำลองชุดข้อมูลที่ 14', 'รายละเอียดชุดข้อมูลจำลองที่ 14', '', '', '', '', '', '', '0000-00-00'),
(15, 0, '0', 'จำลองชุดข้อมูลที่ 15', 'รายละเอียดชุดข้อมูลจำลองที่ 15', '', '', '', '', '', '', '0000-00-00'),
(16, 0, '0', 'จำลองชุดข้อมูลที่ 16', 'รายละเอียดชุดข้อมูลจำลองที่ 16', '', '', '', '', '', '', '0000-00-00'),
(17, 0, '0', 'จำลองชุดข้อมูลที่ 17', 'รายละเอียดชุดข้อมูลจำลองที่ 17', '', '', '', '', '', '', '0000-00-00'),
(18, 0, '0', 'จำลองชุดข้อมูลที่ 18', 'รายละเอียดชุดข้อมูลจำลองที่ 18', '', '', '', '', '', '', '0000-00-00'),
(19, 0, '0', 'จำลองชุดข้อมูลที่ 19', 'รายละเอียดชุดข้อมูลจำลองที่ 19', '', '', '', '', '', '', '0000-00-00'),
(20, 0, '0', 'จำลองชุดข้อมูลที่ 20', 'รายละเอียดชุดข้อมูลจำลองที่ 20', '', '', '', '', '', '', '0000-00-00'),
(138, 108, 'การท่องเที่ยวเชิงนิเวศ', 'ฟหกฟหกฟหก', '', '', '', '', '', '', '', '2018-05-30'),
(139, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-04'),
(140, 108, 'การท่องเที่ยวเชิงนิเวศ', 'asdasd', '', '', '', '', '', '', '', '2018-06-04'),
(141, 108, 'การท่องเที่ยวเชิงนิเวศ', 'sss', '', '', '', '', '', '', '', '2018-06-04'),
(142, 108, 'การท่องเที่ยวเชิงนิเวศ', 'ddd', '', '', '', '', '', '', '', '2018-06-04'),
(143, 108, 'การท่องเที่ยวเชิงนิเวศ', 'asdasdasdasdad', '', '', '', '', '', '', '', '2018-06-04'),
(144, 108, 'การท่องเที่ยวเชิงนิเวศ', 'sad', '', '', '', '', '', '', '', '2018-06-04'),
(145, 108, 'การท่องเที่ยวเชิงนิเวศ', 'sssssssssssssssssss', '', '', '', '', '', '', '', '2018-06-04'),
(146, 108, 'การท่องเที่ยวเชิงนิเวศ', 'd', '', '', '', '', '', '', '', '2018-06-04'),
(147, 108, 'การท่องเที่ยวเชิงนิเวศ', 'd', '', '', '', '', '', '', '', '2018-06-04'),
(148, 108, 'การท่องเที่ยวเชิงนิเวศ', 'w', '', '', '', '', '', '', '', '2018-06-04'),
(149, 108, 'การท่องเที่ยวเชิงนิเวศ', 'f', '', '', '', '', '', '', '', '2018-06-04'),
(150, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-04'),
(151, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AAASASDASD', '', '', '', '', '', '', '', '2018-06-04'),
(152, 108, 'การท่องเที่ยวเชิงนิเวศ', 'a', '', '', '', '', '', '', '', '2018-06-04'),
(153, 108, 'การท่องเที่ยวเชิงนิเวศ', 'a', '', '', '', '', '', '', '', '2018-06-04'),
(154, 108, 'การท่องเที่ยวเชิงนิเวศ', 'a', '', '', '', '', '', '', '', '2018-06-04'),
(155, 108, 'การท่องเที่ยวเชิงธรรมชาติ', 'AA', 'asdasd', 'asdasd', '3', '2', 'ไม่มีค่าธรรมเนียม', 'asd', 'asdasdasd', '2018-06-04'),
(156, 108, 'การท่องเที่ยวเชิงวัฒนธรรม', 'aaaaaa', 'qeqe', 'qweqwe', '4', '4', '222222', 'wqeqwe', 'qweqweqwe', '2018-06-04'),
(157, 108, 'การท่องเที่ยวเชิงวัฒนธรรม', '4444444', '44', '444', '4', '44', 'ไม่มีค่าธรรมเนียม', '444', '444', '2018-06-04'),
(158, 108, 'การท่องเที่ยวเชิงนิเวศ', '444444', '', '', '', '', '', '', '', '2018-06-04'),
(159, 108, 'การท่องเที่ยวเชิงนิเวศ', '4', '', '', '', '', '', '', '', '2018-06-04'),
(160, 108, 'การท่องเที่ยวเชิงนิเวศ', 'd', '', '', '', '', '', '', '', '2018-06-04'),
(161, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(162, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(163, 108, 'การท่องเที่ยวเชิงนิเวศ', '2', '', '', '', '', '', '', '', '2018-06-04'),
(164, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(165, 108, 'การท่องเที่ยวเชิงนิเวศ', 'd', '', '', '', '', '', '', '', '2018-06-04'),
(166, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(167, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(168, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(169, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(170, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(171, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(172, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(173, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(174, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(175, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(176, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(177, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(178, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(179, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(180, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(181, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(182, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(183, 108, 'การท่องเที่ยวเชิงนิเวศ', '', '', '', '', '', '', '', '', '2018-06-04'),
(184, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(185, 108, 'การท่องเที่ยวเชิงนิเวศ', 'a', '', '', '', '', '', '', '', '2018-06-05'),
(186, 108, 'การท่องเที่ยวเชิงนิเวศ', 'a', '', '', '', '', '', '', '', '2018-06-05'),
(187, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(188, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(189, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(190, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(191, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(192, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(193, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(194, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(195, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(196, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', 'AA', '', '', '', '', '', '', '2018-06-05'),
(197, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(198, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(199, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(200, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(201, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(202, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(203, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(204, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(205, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(206, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(207, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(208, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(209, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', 'ไม่มีค่าธรรมเนียม', '', '', '2018-06-05'),
(210, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(211, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(212, 108, 'การท่องเที่ยวเชิงนิเวศ', 'aa', '', '', '', '', '', '', '', '2018-06-05'),
(213, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(214, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(215, 108, 'การท่องเที่ยวเชิงนิเวศ', 'AA', '', '', '', '', '', '', '', '2018-06-05'),
(216, 108, 'การท่องเที่ยวเชิงนิเวศ', 'a', 'a', 'a', '1', '2', 'ไม่มีค่าธรรมเนียม', 'a', 'a', '2018-06-05'),
(217, 108, 'การท่องเที่ยวเชิงนิเวศ', '1', '1', '1', '1.00', '1', '1', '1', '1', '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation_image`
--

CREATE TABLE `tbllocation_image` (
  `location_id` int(11) NOT NULL,
  `location_image_id` int(2) NOT NULL,
  `location_image_file` varchar(255) NOT NULL,
  `location_image_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูภาพสถานที';

--
-- Dumping data for table `tbllocation_image`
--

INSERT INTO `tbllocation_image` (`location_id`, `location_image_id`, `location_image_file`, `location_image_info`) VALUES
(1, 1, 'img/page/1.jpg', 'ฟาร์มแกะและร้านอาหารสไตล์คาวบอย'),
(2, 2, 'img/page/14.jpg', 'เป็นที่ประทับแรมของพระเจ้าอยู่หัว รัชกาลที่ 9'),
(3, 3, 'img/portfolio/เกลือ.png', 'หมู่บ้านทำเกลือ ตั้งอยู่ที่ อ.วานรนิวาส'),
(4, 4, 'img/portfolio/หนองหาร.png', 'หนองหาร'),
(5, 5, 'img\\portfolio\\โฮงเจ้าฟองคำ.png', 'โฮงเจ้าฟองคำ'),
(6, 6, 'img\\portfolio\\วัด.png', 'วัดพระธาตุเชิงชุม วัดคู่บ่านคู่เมืองของสกลนคร'),
(7, 7, 'img\\portfolio\\หมู่บ้าน.png', 'ย่านชุมชนโบราณท่าแร่'),
(8, 8, 'img\\portfolio\\วัดถ้ำผาเด่น.png', 'วัดถ้ำผาเด่น'),
(9, 9, 'img\\portfolio\\วัดป่าสุทธาวาส.png', 'วัดป่าสุทธาวาส'),
(10, 10, 'img\\portfolio\\ตลาด.png', 'ตลาด 100 ปี เมืองปากพนัง'),
(11, 11, 'img\\portfolio\\ภูรืทัตโต.png', 'พิพิธภัณฑ์อาจารย์มั่น ภูริทัตโต'),
(12, 12, 'img\\portfolio\\1.png', ''),
(13, 13, 'img\\portfolio\\1.png', ''),
(14, 14, 'img\\portfolio\\1.png', ''),
(15, 15, 'img\\portfolio\\1.png', ''),
(16, 16, 'img\\portfolio\\1.png', ''),
(17, 17, 'img\\portfolio\\1.png', ''),
(18, 18, 'img\\portfolio\\1.png', ''),
(19, 19, 'img\\portfolio\\1.png', ''),
(20, 20, 'img\\portfolio\\1.png', ''),
(1, 21, 'img/page/6.jpg', 'test'),
(1, 22, 'img/page/2.jpg', 'asd'),
(1, 23, 'img/page/3.jpg', 'sss'),
(1, 24, 'img/page/4.jpg', 'ddd'),
(1, 25, 'img/page/5.jpg', ''),
(1, 26, 'img/page/6.jpg', ''),
(0, 27, '4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', ''),
(0, 28, '4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', ''),
(0, 29, '4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', ''),
(0, 30, '9f8ae0b8aa17d91301294ed86a15c5c6.jpg', ''),
(0, 31, '260.jpg', ''),
(0, 32, '260.jpg', ''),
(0, 33, '260.jpg', ''),
(0, 34, '3339658-pubglivestream_promo-2.jpg', 'test'),
(0, 35, '6.jpg', 'test'),
(0, 36, '552aa5173619f19556c89591d9311657.jpg', 'asd'),
(0, 37, '27867904_2188512674712436_7767856975610135976_n.jpg', 'ssss'),
(0, 38, '260.jpg', ''),
(0, 39, '3339658-pubglivestream_promo-2.jpg', ''),
(0, 40, '260.jpg', ''),
(0, 41, '260.jpg', ''),
(0, 42, '260.jpg', ''),
(0, 43, '260.jpg', ''),
(0, 44, '260.jpg', ''),
(0, 45, '260.jpg', ''),
(0, 46, '260.jpg', ''),
(0, 47, '260.jpg', ''),
(0, 48, '260.jpg', ''),
(0, 49, '8.jpg', ''),
(0, 50, '9.jpg', ''),
(0, 51, '6.jpg', ''),
(0, 52, '16-512.png', ''),
(0, 53, '260.jpg', ''),
(0, 54, 'dawae.jpg', ''),
(0, 55, 'dawae.jpg', ''),
(0, 56, '512x512.png', ''),
(0, 57, 'dawae.jpg', 'dawae'),
(0, 58, '23536082_B.jpg', '2'),
(0, 59, '3339658-pubglivestream_promo-2.jpg', 'pubg'),
(0, 60, '260.jpg', 'eeeee'),
(0, 61, '16-512.png', 'twitch'),
(0, 62, '16-512.png', ''),
(0, 63, '16-512.png', ''),
(0, 64, '16-512.png', ''),
(0, 65, '16-512.png', ''),
(0, 66, '7.jpg', ''),
(0, 67, '16-512.png', ''),
(0, 68, '', ''),
(0, 69, '', ''),
(0, 70, '', ''),
(75, 88, 'img/260.jpg', ''),
(0, 89, '4', ''),
(0, 90, '4', ''),
(0, 91, '4', ''),
(0, 92, '4', ''),
(0, 93, 'img/6.jpg', ''),
(115, 94, 'img/6.jpg', ''),
(116, 95, 'img/4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', ''),
(117, 96, 'img/4.jpg', 'lets go 2'),
(118, 97, 'img/14.jpg', ''),
(119, 98, 'img/4.jpg', ''),
(120, 99, 'img/260.jpg', ''),
(121, 100, 'img/4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', 'test'),
(122, 101, 'img/4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', ''),
(123, 102, 'img/4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', ''),
(124, 103, 'img/5557535823865315479.png', ''),
(125, 104, 'img/4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', ''),
(128, 105, 'img/4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', ''),
(129, 106, 'img/6.jpg', ''),
(130, 107, 'img/6.jpg', ''),
(139, 108, 'img/4.jpg', ''),
(140, 109, 'img/4.jpg', ''),
(141, 110, 'img/4.jpg', ''),
(142, 111, 'img/5.jpg', 'asd'),
(143, 112, 'img/5', ''),
(144, 113, 'img/5', ''),
(145, 114, 'img/5', ''),
(146, 115, 'img/5', ''),
(147, 116, 'img/5', ''),
(148, 117, 'img/5', ''),
(149, 118, 'img/5', ''),
(151, 119, 'img/5', ''),
(153, 120, 'img/', ''),
(153, 121, 'img/', ''),
(154, 122, 'img/4.jpg', ''),
(154, 123, 'img/5.jpg', ''),
(155, 124, 'img/4.jpg', '10'),
(155, 125, 'img/4-Live-Stream-Platforms-Your-Startups-Should-Explore.jpg', '10'),
(155, 126, 'img/5.jpg', '10'),
(155, 127, 'img/5.jpg', '10'),
(155, 128, 'img/6.jpg', '10'),
(155, 129, 'img/9c8976d6b632d356beed392043a9091323b0577e_full.jpg', '10'),
(155, 130, 'img/2.jpg', '10'),
(155, 131, 'img/3.jpg', '10'),
(155, 132, 'img/27-lil-pump.w710.h473.2x.jpg', '10'),
(155, 133, 'img/260.jpg', '10'),
(156, 134, 'img/1.png', '10'),
(156, 135, 'img/2.png', '10'),
(156, 136, 'img/3.png', '10'),
(156, 137, 'img/4.png', '10'),
(156, 138, 'img/5.png', '10'),
(156, 139, 'img/6.png', '10'),
(156, 140, 'img/7.png', '10'),
(156, 141, 'img/9.png', '10'),
(156, 142, 'img/8.png', '10'),
(156, 143, 'img/10.png', '10'),
(157, 144, 'img/1.png', '10'),
(157, 145, 'img/2.png', '10'),
(157, 146, 'img/3.png', '10'),
(157, 147, 'img/4.png', '10'),
(157, 148, 'img/5.png', '10'),
(157, 149, 'img/6.png', '10'),
(157, 150, 'img/7.png', '10'),
(157, 151, 'img/8.png', '10'),
(157, 152, 'img/9.png', '10'),
(157, 153, 'img/10.png', '10'),
(158, 154, 'img/1.png', ''),
(158, 155, 'img/2.png', ''),
(159, 156, 'img/1.png', ''),
(159, 157, 'img/2.png', ''),
(160, 158, 'img/1.png', ''),
(160, 159, 'img/2.png', ''),
(161, 160, 'img/1.png', ''),
(161, 161, 'img/2.png', ''),
(162, 162, 'img/10.png', ''),
(162, 163, 'img/9.png', ''),
(163, 164, 'img/1.png', ''),
(163, 165, 'img/2.png', ''),
(164, 166, 'img/1.png', ''),
(164, 167, 'img/2.png', ''),
(167, 168, 'img/1.png', ''),
(167, 169, 'img/2.png', ''),
(168, 170, 'img/1.png', ''),
(168, 171, 'img/2.png', ''),
(169, 172, 'img/1.png', '3'),
(169, 173, 'img/2.png', '3'),
(170, 174, 'img/1.png', '1'),
(171, 175, 'img/1.png', '2'),
(171, 176, 'img/2.png', '2'),
(172, 177, 'img/1.png', ''),
(173, 178, 'img/1.png', ''),
(174, 179, 'img/1.png', ''),
(174, 180, 'img/2.png', ''),
(184, 181, 'img/1.png', 'Array'),
(184, 182, 'img/2.png', 'Array'),
(185, 183, 'img/1.png', ''),
(185, 184, 'img/2.png', ''),
(186, 185, 'img/1.png', '1'),
(186, 186, 'img/2.png', '2'),
(187, 187, 'img/1.png', '1'),
(187, 188, 'img/2.png', '2'),
(187, 189, 'img/3.png', '3'),
(187, 190, 'img/4.png', '4'),
(187, 191, 'img/5.png', '5'),
(187, 192, 'img/6.png', '6'),
(187, 193, 'img/7.png', '7'),
(187, 194, 'img/8.png', '8'),
(187, 195, 'img/9.png', '9'),
(187, 196, 'img/10.png', '10'),
(188, 197, 'img/1.png', '1'),
(188, 198, 'img/2.png', '2'),
(189, 199, 'img/1.png', '1'),
(189, 200, 'img/2.png', '2'),
(190, 201, 'img/1.png', '1'),
(190, 202, 'img/2.png', '2'),
(191, 203, 'img/1.png', '1'),
(191, 204, 'img/2.png', '2'),
(192, 205, 'img/1.png', '1'),
(192, 206, 'img/2.png', '2'),
(193, 207, 'img/1.png', '1'),
(193, 208, 'img/2.png', '2'),
(205, 209, 'img/1.png', '1'),
(205, 210, 'img/2.png', '2'),
(206, 211, 'img/1.png', '1'),
(206, 212, 'img/2.png', '2'),
(207, 213, 'img/1.png', '1'),
(207, 214, 'img/2.png', '2'),
(208, 215, 'img/1.png', '1'),
(208, 216, 'img/2.png', '2'),
(209, 217, 'img/1.png', '1'),
(209, 218, 'img/2.png', '2'),
(209, 219, 'img/3.png', '3'),
(209, 220, 'img/4.png', '4'),
(213, 221, 'img/1.png', '1'),
(213, 222, 'img/2.png', '2'),
(214, 223, 'img/1.png', '1'),
(214, 224, 'img/2.png', '2'),
(215, 225, 'img/1.jpg', '1'),
(215, 226, 'img/2.jpg', '2'),
(216, 227, 'img/1.jpg', '1'),
(217, 228, 'img/1.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbllodge`
--

CREATE TABLE `tbllodge` (
  `location_id` int(11) NOT NULL,
  `lodge_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `lodge_name` varchar(50) NOT NULL,
  `lodge_info` text NOT NULL,
  `lodge_price` varchar(20) NOT NULL,
  `lodge_tell` int(10) NOT NULL,
  `lodge_website` varchar(255) NOT NULL,
  `lodge_address` text NOT NULL,
  `lodge_type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูที่พัก ';

--
-- Dumping data for table `tbllodge`
--

INSERT INTO `tbllodge` (`location_id`, `lodge_id`, `member_id`, `lodge_name`, `lodge_info`, `lodge_price`, `lodge_tell`, `lodge_website`, `lodge_address`, `lodge_type`) VALUES
(1, 1, 0, 'โรงแรมคุณทอง', 'บริการที่พักภายในฟาร์ม', '300 - 2500 บาท', 911111111, 'https://www.traveloka.com', '1912 Tor Phatthana Road, That Choeng Chum, That Choeng Chum, Mueang Sakon Nakhon District, Sakon Nakhon, Thailand, 47000', ''),
(216, 216, 108, 'e', 'e', 'e', 0, 'e', 'e', 'e'),
(217, 217, 108, '5', '5', '5', 5, '5', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbllodge_image`
--

CREATE TABLE `tbllodge_image` (
  `location_id` int(11) NOT NULL,
  `lodge_id` int(11) NOT NULL,
  `lodge_image_id` int(2) NOT NULL,
  `lodge_image_file` varchar(255) NOT NULL,
  `lodge_image_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูภาพที่พัก ';

--
-- Dumping data for table `tbllodge_image`
--

INSERT INTO `tbllodge_image` (`location_id`, `lodge_id`, `lodge_image_id`, `lodge_image_file`, `lodge_image_info`) VALUES
(0, 1, 1, 'img/lodge/1.jpg', 'ld1'),
(0, 1, 2, 'img/lodge/2.jpg', 'ld2'),
(0, 1, 3, 'img/lodge/3.jpg', 'ld3'),
(0, 1, 4, 'img/lodge/4.jpg', 'ld4'),
(0, 1, 5, 'img/lodge/5.jpg', 'ld5'),
(0, 1, 6, 'img/lodge/6.jpg', 'ld6'),
(216, 216, 7, 'img/5.jpg', '5'),
(217, 217, 8, 'img/5.jpg', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

CREATE TABLE `tblmember` (
  `member_id` int(11) NOT NULL,
  `member_username` varchar(20) NOT NULL,
  `member_password` varchar(256) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_surname` varchar(255) NOT NULL,
  `member_sex` varchar(20) NOT NULL,
  `member_bdate` varchar(10) NOT NULL,
  `member_address` varchar(255) NOT NULL,
  `member_province` varchar(100) NOT NULL,
  `member_postcode` int(5) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_facebook` varchar(255) NOT NULL,
  `member_twitter` varchar(255) NOT NULL,
  `member_instagram` varchar(255) NOT NULL,
  `member_image` varchar(256) NOT NULL,
  `member_role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูสมาชิก ';

--
-- Dumping data for table `tblmember`
--

INSERT INTO `tblmember` (`member_id`, `member_username`, `member_password`, `member_name`, `member_surname`, `member_sex`, `member_bdate`, `member_address`, `member_province`, `member_postcode`, `member_email`, `member_facebook`, `member_twitter`, `member_instagram`, `member_image`, `member_role`) VALUES
(0, 'guest', '', 'guest', '', '', '', '', '', 0, '', '', '', '', '', 0),
(1, 'aa01', '1234', 'member_aa01', 'name 01', '', '', '', '', 0, 'aa01@email.com', 'aa 01', '', '', '', 0),
(2, 'aa 02', '1234', 'aa02', '', '', '', '', '', 0, '', '', '', '', '', 0),
(3, 'aa 03', '1234', 'aa 03', '', '', '', '', '', 0, '', '', '', '', '', 0),
(4, 'aa04', '1234', 'aa 04', '', '', '', '', '', 0, '', '', '', '', '', 0),
(5, 'aa05', '1234', 'aa 05', '', '', '', '', '', 0, '', '', '', '', '', 0),
(6, 'aa06', '1234', 'aa 06', '', '', '', '', '', 0, '', '', '', '', '', 0),
(7, 'aa07', '1234', 'aa 07', '', '', '', '', '', 0, '', '', '', '', '', 0),
(8, 'aa08', '1234', 'aa 08', '', '', '', '', '', 0, '', '', '', '', '', 0),
(9, 'aa09', '1234', 'aa 09', '', '', '', '', '', 0, '', '', '', '', '', 0),
(10, 'aa10', '1234', 'aa 10', '', '', '', '', '', 0, '', '', '', '', '', 0),
(11, 'a', 's', 'd', 'f', '', '', '', '', 0, 'g', 'h', 'i', 'j', '', 0),
(12, '1', '2', '3', '4', '', '', '', '', 0, '5', '6', '7', '8', '', 0),
(13, 'b', 's', 'd', 'f', '', '', '', '', 0, 'g', '', '', '', '', 0),
(15, 'c', 'c', 'c', 'c', '', '', '', '', 0, 'c', '', '', '', '', 0),
(28, 'd', 'd', 'd', 'd', '', '', '', '', 0, 'd', '', '', '', '', 0),
(29, 'pangponpaper', '0ebf68fe5efc1d7f58c4', 'chaiwat', 'ratchasing', '', '', '', '', 0, 'art_paper@hotmail.com', 'artier rb', 'RB', 'headmasterxii', '', 0),
(31, 'artierrb', '0ebf68fe5efc1d7f58c4', 'à¸Šà¸±à¸¢à¸§à¸±à¸’à¸™à¹Œ ', 'à¸£à¸²à¸Šà¸ªà¸´à¸‡à¸«à¹Œ', '', '', '', '', 0, 'art_paper@hotmail.com', '', '', '', '', 0),
(32, 'kkk', 'e06f6f3e5ee0ef398122', 'ทดสอบ', 'ภาษาไทย', '', '', '', '', 0, 'asd', '', '', '', '', 0),
(33, 'admin', '1234', 'Admin', '', '', '', '', '', 0, '', '', '', '', '', 1),
(34, 'test', '04ca2a7b0056145ae367', 'test', 'test', '', '', '', '', 0, 'test', '', '', '', '', 0),
(35, 'test2', '486257765391ddc7afb9', 'test2', 'test2', '', '', '', '', 0, 'test2', '', '', '', '', 0),
(36, 'aaaa', '499dbfe047ec6d1be088', 'aaaa', 'bbbb', '', '', '', '', 0, 'cccc', '', '', '', '', 0),
(37, 'zzz', 'ec01d43e5c034598b82e', 'xxx', 'yyy', '', '', '', '', 0, 'vvv@hotmail.com', '', '', '', '', 0),
(38, 'qqq', '0decb120b41a1ec12ef7', 'qqq', 'qqq', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(39, 'user', 'ec01d43e5c034598b82e', 'Hi I am Gosu', 'The Legend', '', '', '', '', 0, 'gosu@gmail.com', 'Gosu', '@Gosu', '@GosuIG', '', 0),
(40, 'ooo', '192744103d7f1d6e4c40', 'ooo', 'ooo', '', '', '', '', 0, 'ooo@hotmail.com', '', '', '', '', 0),
(41, 'qwer', '499dbfe047ec6d1be088', 'Chaiwat', 'Ratchasing', '', '', '', '', 0, 'art_paper@hotmail.com', 'artier rb', 'RB', 'headmasterxii', '', 0),
(42, 'gggg', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'Ggez', 'Pz', '', '', '', '', 0, 'ggez@gmail.com', 'gg', 'ez', 'pz', '', 0),
(43, 'test3', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'ABC กขค', 'okay', '', '', '', '', 0, 'test3@gmail.com', 'FBFB', 'TWTW', 'IGIG', '', 0),
(44, 'aaa', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'aaa', 'bbb', '', '', '', '', 0, 'art_paper@hotmail.com', '', '', '', '', 0),
(45, 'qqqq', 'c899dfc04c6d2602e83ab57e61b6df3f29ed9349e2171830e60038c93bd60f43', 'QQ', 'Nihaoma', '', '', '', '', 0, 'qqq@hotmail.com', 'QQ-1234', 'QQ-1234@tw', 'QQ-1234', '', 0),
(79, 'iiii', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'iiii', 'iiii', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(80, 'uuuu', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'qqqq', 'qqqq', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(82, 'ioio', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'ioio', 'ioio', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(84, '789', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', '789', '789', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(85, '9999', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'qqqq', 'qqqq', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(86, '6666', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'qqqq', 'qqqq', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(87, 'testpassword', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'test', 'test', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(94, 'test4', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'test4', 'test4', '', '', '', '', 0, 'test4@hotmail.com', '', '', '', '', 0),
(102, 'qqqqe', 'e505b3359fabddf9296bbd11fb4c5158f1821fc313beab4f2039f32f43a970ad', 'qqqqq', 'qqqq', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(103, 'qweqweqwe', 'e8730e71bbe10d2c40a15ab4b86b2413b033ee1fa04588069f6e4444fab0c23f', 'qweqwe', 'qweqwe', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(104, 'test5', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'test5', 'test5', '', '', '', '', 0, 'qqq@hotmail.com', '', '', '', '', 0),
(105, 'test6', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'test6', 'test6', '', '', '', '', 0, 'test6@hotmail.com', '', '', '', '', 0),
(106, 'pangpon', 'fb3d037f8b7deb1b08fbf51b1a3b62204e7255c64e9823e972177c13275fb190', 'Chitawan', 'Ratchasing', '', '', '', '', 0, 'art_paper@hotmail.com', 'Artier RB', 'Do u know d wae', 'Head Master', '', 0),
(107, 'pangponpoper', 'fb3d037f8b7deb1b08fbf51b1a3b62204e7255c64e9823e972177c13275fb190', 'Vayn', 'Gosu', '', '', '', '', 0, 'Gosu@hotmail.com', 'Gosu', 'GosuTwit', 'GosuIG', '', 0),
(108, 'liluzi', 'fb3d037f8b7deb1b08fbf51b1a3b62204e7255c64e9823e972177c13275fb190', 'Guci', 'Gang', 'ชาย', '02/04/2539', '414 ม.15 ต.ขามใหญ่ อ.เมือง', 'สกลนคร', 47000, 'art_paper2@hotmail.com', 'Artier RB2', 'GosuTwit2', 'Head Master2', 'nak.jpg', 0),
(109, '12345678911234567891', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'qqqq', 'qqqq', 'ชาย', '16', 'qwe', 'กระบี่', 34000, 'art_paper@hotmail.com', '', '', '', '', 0),
(110, 'jjjj', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'Chitawan', 'Ratchasing', 'ชาย', '04/02/1996', '434 ม.15 ต.ขามใหญ่ อ.เมือง', 'อุบลราชธานี', 34000, 'art_paper@hotmail.com', '', '', '', '', 0),
(111, 'llll', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'aaaa', 'qqqq', 'ชาย', '04/24/2018', '434 ม.15 ต.ขามใหญ่ อ.เมือง', 'ตราด', 0, 'art_paper@hotmail.com', '', '', '', '', 0),
(112, 'jrjr', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'jr', 'junior', 'ชาย', '04/02/2018', '434 ม.15 ต.ขามใหญ่ อ.เมือง', 'นครนายก', 47000, 'art_paper@hotmail.com', 'https://www.facebook.com/artierrbz', 'https://www.facebook.com/artierrbz', 'https://www.facebook.com/artierrbz', '', 0),
(113, 'popopo', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'มานี', 'มีชัย', 'ชาย', '14/02/2561', '414 ม.15 ต.ขามใหญ่ อ.เมือง', 'กระบี่', 47000, 'qqq@hotmail.com', 'https://www.facebook.com/artierrbz', 'https://www.facebook.com/artierrbz', 'https://www.facebook.com/artierrbz', '', 0),
(114, 'nice1', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'มาลี', 'มานี', 'ชาย', '02/04/2539', '414 ม.15 ต.ขามใหญ่ อ.เมือง', 'นครปฐม', 47000, 'artierrbevent03@gmail.com', 'https://www.facebook.com/artierrbz', 'https://www.facebook.com/artierrbz', 'https://www.facebook.com/artierrbz', '', 0),
(115, 'qeqeqeqeqeqe', '499dbfe047ec6d1be088d659ee5bff4e1a72d5ca2038e5638c90306ef217ff39', 'มาลี', 'มานี', 'ชาย', '02/04/2561', '', 'ตราด', 47000, 'qqq@hotmail.com', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `Product_ID` int(11) NOT NULL,
  `Product_Header` varchar(250) NOT NULL,
  `Product_Info` text NOT NULL,
  `Product_Price` varchar(250) NOT NULL,
  `Product_Address` text NOT NULL,
  `Product_Img1` varchar(250) NOT NULL,
  `Product_Img2` varchar(250) NOT NULL,
  `Product_Img3` varchar(250) NOT NULL,
  `Product_Img4` varchar(250) NOT NULL,
  `Product_Img5` varchar(250) NOT NULL,
  `Product_Img6` varchar(250) NOT NULL,
  `Product_Img7` varchar(250) NOT NULL,
  `Product_Img8` varchar(250) NOT NULL,
  `Product_Img9` varchar(250) NOT NULL,
  `Product_Img10` varchar(250) NOT NULL,
  `Product_Imginfo1` text NOT NULL,
  `Product_Imginfo2` text NOT NULL,
  `Product_Imginfo3` text NOT NULL,
  `Product_Imginfo4` text NOT NULL,
  `Product_Imginfo5` text NOT NULL,
  `Product_Imginfo6` text NOT NULL,
  `Product_Imginfo7` text NOT NULL,
  `Product_Imginfo8` text NOT NULL,
  `Product_Imginfo9` text NOT NULL,
  `Product_Imginfo10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`Product_ID`, `Product_Header`, `Product_Info`, `Product_Price`, `Product_Address`, `Product_Img1`, `Product_Img2`, `Product_Img3`, `Product_Img4`, `Product_Img5`, `Product_Img6`, `Product_Img7`, `Product_Img8`, `Product_Img9`, `Product_Img10`, `Product_Imginfo1`, `Product_Imginfo2`, `Product_Imginfo3`, `Product_Imginfo4`, `Product_Imginfo5`, `Product_Imginfo6`, `Product_Imginfo7`, `Product_Imginfo8`, `Product_Imginfo9`, `Product_Imginfo10`) VALUES
(1, 'ร้านโคขุนคุณทอง ฟาร์มฮัก', 'มีตั้งแต่ตุ๊กตา ของเล่นที่ระลึก นมในแพ็คเกจวินเทจเก๋ ๆ ผลิตภัณฑ์เนื้อจากฟาร์ม', '25 - 800 บาท', 'ร้านโคขุนคุณทอง หน้าฟาร์มฮัก', 'img/p1/product/1.jpg', 'img/p1/product/2.jpg', 'img/p1/product/3.jpg', 'img/p1/product/4.jpg', 'img/p1/product/5.jpg', 'img/p1/product/6.jpg', '', '', '', '', 'ตุ๊กตาแกะ', 'ตุ๊กตาแกะ ขาว-ดำ', 'โมเดลรถโบราณ', 'ผลิตภัณฑ์นม', 'ผลิตภัณฑ์เนื้อ', 'ผลิตภัณฑ์เนื้อวัวโคขุน', '', '', '', ''),
(3, 'ร้านโคขุนคุณทอง ฟาร์มฮัก', 'มีตั้งแต่ตุ๊กตา ของเล่นที่ระลึก นมในแพ็คเกจวินเทจเก๋ ๆ ผลิตภัณฑ์เนื้อจากฟาร์ม', '25 - 800 บาท', 'ร้านโคขุนคุณทอง หน้าฟาร์มฮัก', 'img/p1/product/1.jpg', 'img/p1/product/2.jpg', 'img/p1/product/3.jpg', 'img/p1/product/4.jpg', 'img/p1/product/5.jpg', 'img/p1/product/6.jpg', '', '', '', '', 'ตุ๊กตาแกะ', 'ตุ๊กตาแกะ ขาว-ดำ', 'โมเดลรถโบราณ', 'ผลิตภัณฑ์นม', 'ผลิตภัณฑ์เนื้อ', 'ผลิตภัณฑ์เนื้อวัวโคขุน', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct2`
--

CREATE TABLE `tblproduct2` (
  `location_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_store` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_info` text NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูสินคา';

--
-- Dumping data for table `tblproduct2`
--

INSERT INTO `tblproduct2` (`location_id`, `member_id`, `product_id`, `product_store`, `product_name`, `product_info`, `product_price`, `product_address`) VALUES
(1, 0, 1, 'ร้านโคขุนคุณทอง ฟาร์มฮัก', '', 'มีตั้งแต่ตุ๊กตา ของเล่นที่ระลึก นมในแพ็คเกจวินเทจเก๋ ๆ ผลิตภัณฑ์เนื้อจากฟาร์ม', '25 - 800 บาท', 'ร้านโคขุนคุณทอง หน้าฟาร์มฮัก'),
(0, 108, 2, 'AA', '', '', '', ''),
(0, 108, 3, 'AA', '', '', '', ''),
(195, 108, 4, 'SS', '', '', '', ''),
(196, 108, 5, 'SS', '', 'SS', '99', ''),
(197, 108, 6, 'SS', '', 'SS', 'SS', 'SS'),
(198, 108, 7, 'ss', '', '', '', ''),
(204, 108, 204, 'bb', '', '', '', ''),
(205, 108, 205, 'BB', '', 'BB', '1234', '1234'),
(206, 108, 206, 'BB', '', '', '', ''),
(207, 108, 207, 'bb', '', '', '', ''),
(208, 108, 208, 'bb', '', '', '', ''),
(209, 108, 209, 'BB', '', '', '1111', ''),
(210, 108, 210, 'aa', '', '', '', ''),
(211, 108, 211, 'aa', '', '', '', ''),
(212, 108, 212, 'aa', '', '', '', ''),
(213, 108, 213, 'AA', '', '', '', ''),
(214, 108, 214, 'AA', '', '', '', ''),
(215, 108, 215, 'AA', '', '', '', ''),
(216, 108, 216, 'b', '', 'b', 'b', 'b'),
(217, 108, 217, '2', '', '2', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct_image`
--

CREATE TABLE `tblproduct_image` (
  `location_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image_id` int(2) NOT NULL,
  `product_image_file` varchar(255) NOT NULL,
  `product_image_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูภาพสินคา';

--
-- Dumping data for table `tblproduct_image`
--

INSERT INTO `tblproduct_image` (`location_id`, `product_id`, `product_image_id`, `product_image_file`, `product_image_info`) VALUES
(0, 1, 1, 'img/product/7.jpg', '7'),
(0, 1, 2, 'img/product/8.jpg', '8'),
(0, 1, 3, 'img/product/9.jpg', '9'),
(0, 1, 4, 'img/product/10.jpg', '10'),
(0, 1, 5, 'img/product/11.jpg', '11'),
(208, 208, 6, 'img/3.png', '3'),
(208, 208, 7, 'img/4.png', '4'),
(209, 209, 8, 'img/5.png', '5'),
(209, 209, 9, 'img/6.png', '6'),
(209, 209, 10, 'img/7.png', '7'),
(209, 209, 11, 'img/8.png', '8'),
(213, 213, 12, 'img/3.png', '3'),
(213, 213, 13, 'img/4.png', '4'),
(213, 213, 14, 'img/4.png', '4'),
(213, 213, 15, 'img/4.png', '4'),
(214, 214, 16, 'img/3.png', '3'),
(214, 214, 17, 'img/4.png', '4'),
(215, 215, 18, 'img/3.jpg', '3'),
(215, 215, 19, 'img/4.jpg', '4'),
(216, 216, 20, 'img/2.jpg', '2'),
(217, 217, 21, 'img/2.jpg', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblreportcomment`
--

CREATE TABLE `tblreportcomment` (
  `reportcomment_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแจงลบความคิดเห็น';

-- --------------------------------------------------------

--
-- Table structure for table `tblreportlocation`
--

CREATE TABLE `tblreportlocation` (
  `reportlocation_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแจงลบสถานที่ ';

-- --------------------------------------------------------

--
-- Table structure for table `tblrestaurant`
--

CREATE TABLE `tblrestaurant` (
  `Restaurant_ID` int(11) NOT NULL,
  `Restaurant_Header` varchar(250) NOT NULL,
  `Restaurant_Info` text NOT NULL,
  `Restaurant_Recommend` text NOT NULL,
  `Restaurant_Address` text NOT NULL,
  `Restaurant_Telephone` int(10) NOT NULL,
  `Restaurant_Website` text NOT NULL,
  `Restaurant_Opening` varchar(250) NOT NULL,
  `Restaurant_Type` varchar(250) NOT NULL,
  `Restaurant_Img1` varchar(250) NOT NULL,
  `Restaurant_Img2` varchar(250) NOT NULL,
  `Restaurant_Img3` varchar(250) NOT NULL,
  `Restaurant_Img4` varchar(250) NOT NULL,
  `Restaurant_Img5` varchar(250) NOT NULL,
  `Restaurant_Img6` varchar(250) NOT NULL,
  `Restaurant_Img7` varchar(250) NOT NULL,
  `Restaurant_Img8` varchar(250) NOT NULL,
  `Restaurant_Img9` varchar(250) NOT NULL,
  `Restaurant_Img10` varchar(250) NOT NULL,
  `Restaurant_Imginfo1` text NOT NULL,
  `Restaurant_Imginfo2` text NOT NULL,
  `Restaurant_Imginfo3` text NOT NULL,
  `Restaurant_Imginfo4` text NOT NULL,
  `Restaurant_Imginfo5` text NOT NULL,
  `Restaurant_Imginfo6` text NOT NULL,
  `Restaurant_Imginfo7` text NOT NULL,
  `Restaurant_Imginfo8` text NOT NULL,
  `Restaurant_Imginfo9` text NOT NULL,
  `Restaurant_Imginfo10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblrestaurant`
--

INSERT INTO `tblrestaurant` (`Restaurant_ID`, `Restaurant_Header`, `Restaurant_Info`, `Restaurant_Recommend`, `Restaurant_Address`, `Restaurant_Telephone`, `Restaurant_Website`, `Restaurant_Opening`, `Restaurant_Type`, `Restaurant_Img1`, `Restaurant_Img2`, `Restaurant_Img3`, `Restaurant_Img4`, `Restaurant_Img5`, `Restaurant_Img6`, `Restaurant_Img7`, `Restaurant_Img8`, `Restaurant_Img9`, `Restaurant_Img10`, `Restaurant_Imginfo1`, `Restaurant_Imginfo2`, `Restaurant_Imginfo3`, `Restaurant_Imginfo4`, `Restaurant_Imginfo5`, `Restaurant_Imginfo6`, `Restaurant_Imginfo7`, `Restaurant_Imginfo8`, `Restaurant_Imginfo9`, `Restaurant_Imginfo10`) VALUES
(1, 'ร้านโคขุนคุณทอง โคขุน สเต็ก และสลัดบาร์', 'มีบริการอาหารประเภทเนื้อวัวโคขุน สเต็ก และสลัดบาร์ ', 'Tomahawk Ribeye Steak ', 'ร้านโคขุนคุณทอง บริเวณหน้าฟาร์มแกะ ', 911111111, 'http://www.nusr-et.com.tr/en/home.aspx ', '11.00 - 22.00 น. ', 'ฟรีโฟล - อาลาคาร์ท ', 'img/p1/restaurant/1.jpg\r\n', 'img/p1/restaurant/2.jpg\r\n', 'img/p1/restaurant/3.jpg\r\n', 'img/p1/restaurant/4.jpg\r\n', 'img/p1/restaurant/5.jpg\r\n', 'img/p1/restaurant/6.jpg\r\n', '', '', '', '', 'Reataurant 1', 'Reataurant 2', 'Reataurant 3', 'Reataurant 4', 'Reataurant 5', 'Reataurant 6', '', '', '', ''),
(2, 'ร้านโคขุนคุณทอง โคขุน สเต็ก และสลัดบาร์', 'มีบริการอาหารประเภทเนื้อวัวโคขุน สเต็ก และสลัดบาร์ ', 'Tomahawk Ribeye Steak ', 'ร้านโคขุนคุณทอง บริเวณหน้าฟาร์มแกะ ', 911111111, 'http://www.nusr-et.com.tr/en/home.aspx ', '11.00 - 22.00 น. ', 'ฟรีโฟล - อาลาคาร์ท ', 'img/p1/restaurant/1.jpg\r\n', 'img/p1/restaurant/2.jpg\r\n', 'img/p1/restaurant/3.jpg\r\n', 'img/p1/restaurant/4.jpg\r\n', 'img/p1/restaurant/5.jpg\r\n', 'img/p1/restaurant/6.jpg\r\n', '', '', '', '', 'Reataurant 1', 'Reataurant 2', 'Reataurant 3', 'Reataurant 4', 'Reataurant 5', 'Reataurant 6', '', '', '', ''),
(3, 'ร้านโคขุนคุณทอง โคขุน สเต็ก และสลัดบาร์', 'มีบริการอาหารประเภทเนื้อวัวโคขุน สเต็ก และสลัดบาร์ ', 'Tomahawk Ribeye Steak ', 'ร้านโคขุนคุณทอง บริเวณหน้าฟาร์มแกะ ', 911111111, 'http://www.nusr-et.com.tr/en/home.aspx ', '11.00 - 22.00 น. ', 'ฟรีโฟล - อาลาคาร์ท ', 'img/p1/restaurant/1.jpg\r\n', 'img/p1/restaurant/2.jpg\r\n', 'img/p1/restaurant/3.jpg\r\n', 'img/p1/restaurant/4.jpg\r\n', 'img/p1/restaurant/5.jpg\r\n', 'img/p1/restaurant/6.jpg\r\n', '', '', '', '', 'Reataurant 1', 'Reataurant 2', 'Reataurant 3', 'Reataurant 4', 'Reataurant 5', 'Reataurant 6', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblrestaurant2`
--

CREATE TABLE `tblrestaurant2` (
  `location_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL,
  `restaurant_info` text NOT NULL,
  `restaurant_reccomment` varchar(100) NOT NULL,
  `restaurant_address` text NOT NULL,
  `restaurant_tell` int(10) NOT NULL,
  `restaurant_website` varchar(255) NOT NULL,
  `restaurant_opentime` datetime NOT NULL,
  `restaurant_type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูรานอาหาร';

--
-- Dumping data for table `tblrestaurant2`
--

INSERT INTO `tblrestaurant2` (`location_id`, `member_id`, `restaurant_id`, `restaurant_name`, `restaurant_info`, `restaurant_reccomment`, `restaurant_address`, `restaurant_tell`, `restaurant_website`, `restaurant_opentime`, `restaurant_type`) VALUES
(1, 0, 1, 'ร้านโคขุนคุณทอง โคขุน สเต็ก และสลัดบาร์', 'มีบริการอาหารประเภทเนื้อวัวโคขุน สเต็ก และสลัดบาร์ ', 'Tomahawk Ribeye Steak ', 'ร้านโคขุนคุณทอง บริเวณหน้าฟาร์มแกะ ', 911111111, 'http://www.nusr-et.com.tr/en/home.aspx ', '2018-03-05 00:00:00', ''),
(215, 108, 215, 'AA', 'AA', 'AA', 'AA', 0, 'AA', '0000-00-00 00:00:00', 'AA'),
(216, 108, 216, 'd', 'd', 'd', 'd', 0, 'd', '0000-00-00 00:00:00', 'd'),
(217, 108, 217, '4', '4', '4', '4', 4, '4', '0000-00-00 00:00:00', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tblrestaurant2_image`
--

CREATE TABLE `tblrestaurant2_image` (
  `location_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `restaurant_image_id` int(2) NOT NULL,
  `restaurant_image_file` varchar(255) NOT NULL,
  `restaurant_image_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูภาพรานอาหาร';

--
-- Dumping data for table `tblrestaurant2_image`
--

INSERT INTO `tblrestaurant2_image` (`location_id`, `restaurant_id`, `restaurant_image_id`, `restaurant_image_file`, `restaurant_image_info`) VALUES
(0, 1, 1, 'img/restaurant/1.jpg', 'res1'),
(0, 1, 2, 'img/restaurant/2.jpg', 'res2'),
(0, 1, 3, 'img/restaurant/3.jpg', 'res3'),
(0, 1, 4, 'img/restaurant/4.jpg', 'res4'),
(0, 1, 5, 'img/restaurant/5.jpg', 'res5'),
(0, 1, 6, 'img/restaurant/6.jpg', 'res6'),
(215, 215, 7, 'img/7.jpg', '7'),
(215, 215, 8, 'img/8.jpg', '8'),
(216, 216, 9, 'img/4.jpg', '4'),
(217, 217, 10, 'img/4.jpg', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

CREATE TABLE `tblservice` (
  `Service_ID` int(11) NOT NULL,
  `Service_Header` varchar(250) NOT NULL,
  `Service_Info` text NOT NULL,
  `Service_Price` varchar(250) NOT NULL,
  `Service_Address` text NOT NULL,
  `Service_Img1` varchar(250) NOT NULL,
  `Service_Img2` varchar(250) NOT NULL,
  `Service_Img3` varchar(250) NOT NULL,
  `Service_Img4` varchar(250) NOT NULL,
  `Service_Img5` varchar(250) NOT NULL,
  `Service_Img6` varchar(250) NOT NULL,
  `Service_Img7` varchar(250) NOT NULL,
  `Service_Img8` varchar(250) NOT NULL,
  `Service_Img9` varchar(250) NOT NULL,
  `Service_Img10` varchar(250) NOT NULL,
  `Service_Imginfo1` text NOT NULL,
  `Service_Imginfo2` text NOT NULL,
  `Service_Imginfo3` text NOT NULL,
  `Service_Imginfo4` text NOT NULL,
  `Service_Imginfo5` text NOT NULL,
  `Service_Imginfo6` text NOT NULL,
  `Service_Imginfo7` text NOT NULL,
  `Service_Imginfo8` text NOT NULL,
  `Service_Imginfo9` text NOT NULL,
  `Service_Imginfo10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblservice`
--

INSERT INTO `tblservice` (`Service_ID`, `Service_Header`, `Service_Info`, `Service_Price`, `Service_Address`, `Service_Img1`, `Service_Img2`, `Service_Img3`, `Service_Img4`, `Service_Img5`, `Service_Img6`, `Service_Img7`, `Service_Img8`, `Service_Img9`, `Service_Img10`, `Service_Imginfo1`, `Service_Imginfo2`, `Service_Imginfo3`, `Service_Imginfo4`, `Service_Imginfo5`, `Service_Imginfo6`, `Service_Imginfo7`, `Service_Imginfo8`, `Service_Imginfo9`, `Service_Imginfo10`) VALUES
(1, 'บริการสปาเท้า', 'มีบริการสปาเท้า บริการนวดน้ำมัน และบริการนวดแผนไทย ', '450 - 2500 บาท', 'ร้านสปาคุณทอง บริเวณข้างฟาร์มแกะ', 'img/p1/service/1.jpg', 'img/p1/service/2.jpg', 'img/p1/service/3.jpg', 'img/p1/service/4.jpg', 'img/p1/service/5.jpg', 'img/p1/service/6.jpg', '', '', '', '', 'สปาเท้า1', 'สปาเท้า2', 'สปาเท้า3', 'สปาเท้า4', 'สปาเท้า5', 'สปาเท้า6', '', '', '', ''),
(2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'บริการสปาเท้า', 'มีบริการสปาเท้า บริการนวดน้ำมัน และบริการนวดแผนไทย ', '450 - 2500 บาท', 'ร้านสปาคุณทอง บริเวณข้างฟาร์มแกะ', 'img/p1/service/1.jpg', 'img/p1/service/2.jpg', 'img/p1/service/3.jpg', 'img/p1/service/4.jpg', 'img/p1/service/5.jpg', 'img/p1/service/6.jpg', '', '', '', '', 'สปาเท้า1', 'สปาเท้า2', 'สปาเท้า3', 'สปาเท้า4', 'สปาเท้า5', 'สปาเท้า6', '', '', '', ''),
(4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblservice2`
--

CREATE TABLE `tblservice2` (
  `location_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_info` text NOT NULL,
  `service_fee` varchar(20) NOT NULL,
  `service_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟ้มขอมูลบริการ';

--
-- Dumping data for table `tblservice2`
--

INSERT INTO `tblservice2` (`location_id`, `member_id`, `service_id`, `service_name`, `service_info`, `service_fee`, `service_address`) VALUES
(1, 0, 1, 'บริการสปาเท้า', 'มีบริการสปาเท้า บริการนวดน้ำมัน และบริการนวดแผนไทย ', '450 - 2500 บาท', 'ร้านสปาคุณทอง บริเวณข้างฟาร์มแกะ'),
(212, 108, 212, 'aa', '', '', ''),
(213, 108, 213, 'AA', '', '', ''),
(214, 108, 214, 'AA', '', '', ''),
(215, 108, 215, 'AA', '', '', ''),
(216, 108, 216, 'c', 'c', 'c', 'c'),
(217, 108, 217, '3', '3', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tblservice2_image`
--

CREATE TABLE `tblservice2_image` (
  `location_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_image_id` int(2) NOT NULL,
  `service_image_file` varchar(255) NOT NULL,
  `service_image_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางแฟมขอมลูภาพบรกิาร';

--
-- Dumping data for table `tblservice2_image`
--

INSERT INTO `tblservice2_image` (`location_id`, `service_id`, `service_image_id`, `service_image_file`, `service_image_info`) VALUES
(0, 1, 1, 'img/service/1.jpg', 'sv1'),
(0, 1, 2, 'img/service/2.jpg', 'sv2'),
(0, 1, 3, 'img/service/3.jpg', 'sv3'),
(0, 1, 4, 'img/service/4.jpg', 'sv4'),
(0, 1, 5, 'img/service/5.jpg', 'sv5'),
(0, 1, 6, 'img/service/6.jpg', 'sv6'),
(214, 214, 7, 'img/5.png', '5'),
(214, 214, 8, 'img/6.png', '6'),
(215, 215, 9, 'img/5.jpg', '5'),
(215, 215, 10, 'img/6.jpg', '6'),
(216, 216, 11, 'img/3.jpg', '3'),
(217, 217, 12, 'img/3.jpg', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbltravel`
--

CREATE TABLE `tbltravel` (
  `Attraction_ID` int(11) NOT NULL,
  `Attraction_Header` varchar(250) NOT NULL,
  `Attraction_Address` text NOT NULL,
  `Attraction_Info` text NOT NULL,
  `Attraction_Fee` varchar(250) NOT NULL,
  `Attraction_Nearlm` varchar(250) NOT NULL,
  `Attraction_Travel` text NOT NULL,
  `Attraction_Map` text NOT NULL,
  `Attraction_Img1` varchar(250) NOT NULL,
  `Attraction_Img2` varchar(250) NOT NULL,
  `Attraction_Img3` varchar(250) NOT NULL,
  `Attraction_Img4` varchar(250) NOT NULL,
  `Attraction_Img5` varchar(250) NOT NULL,
  `Attraction_Img6` varchar(250) NOT NULL,
  `Attraction_Img7` varchar(250) NOT NULL,
  `Attraction_Img8` varchar(250) NOT NULL,
  `Attraction_Img9` varchar(250) NOT NULL,
  `Attraction_Img10` varchar(250) NOT NULL,
  `Attraction_Imginfo1` text NOT NULL,
  `Attraction_Imginfo2` text NOT NULL,
  `Attraction_Imginfo3` text NOT NULL,
  `Attraction_Imginfo4` text NOT NULL,
  `Attraction_Imginfo5` text NOT NULL,
  `Attraction_Imginfo6` text NOT NULL,
  `Attraction_Imginfo7` text NOT NULL,
  `Attraction_Imginfo8` text NOT NULL,
  `Attraction_Imginfo9` text NOT NULL,
  `Attraction_Imginfo10` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltravel`
--

INSERT INTO `tbltravel` (`Attraction_ID`, `Attraction_Header`, `Attraction_Address`, `Attraction_Info`, `Attraction_Fee`, `Attraction_Nearlm`, `Attraction_Travel`, `Attraction_Map`, `Attraction_Img1`, `Attraction_Img2`, `Attraction_Img3`, `Attraction_Img4`, `Attraction_Img5`, `Attraction_Img6`, `Attraction_Img7`, `Attraction_Img8`, `Attraction_Img9`, `Attraction_Img10`, `Attraction_Imginfo1`, `Attraction_Imginfo2`, `Attraction_Imginfo3`, `Attraction_Imginfo4`, `Attraction_Imginfo5`, `Attraction_Imginfo6`, `Attraction_Imginfo7`, `Attraction_Imginfo8`, `Attraction_Imginfo9`, `Attraction_Imginfo10`) VALUES
(1, 'Farm Hug สกลนคร', 'ตำบล โนนหอม อำเภอเมืองสกลนคร จังหวัดสกลนคร', 'เป็นร้านอาหาร open air มีร้านกาแฟ ฟาร์มแกะ มีการจัดมุมต่างๆ ไว้สำหรับถ่ายภาย ให้บรรยากาศตะวันตกแบบ cowboy', '500 - 900 บาท', 'ข้างหน้าเป็นร้านอาหารร้านโคขุนคุณทอง', 'หากเดินทางจากท่าอากาศยานสกลนคร ให้ตรงมาตามเส้นถนนหลักประมาณ 20 กิโลเมตร อยู่ติดกับถนนใหญ่ 223 เส้น สกลนคร-นายก จุดสังเกตง่าย ๆ คือข้างหน้าฟาร์มจะเป็นร้านโคขุนคุณทอง', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61031.499955394385!2d104.14117922450326!3d17.04970923115418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313cf3f16e6558ab%3A0x5d4a8457902ecde3!2z4Lif4Liy4Lij4LmM4Lih4Liu4Lix4LiBIEZhcm0gSHVn!5e0!3m2!1sth!2sth!4v1503286513940', 'img/p1/1.jpg', 'img/p1/2.jpg', 'img/p1/3.jpg', 'img/p1/4.jpg', 'img/p1/5.jpg', 'img/p1/6.jpg', '', '', '', '', 'รายละเอียดภาพที่ 1 เทสข้อความแบบยาว ๆ \r\nTEST IMAGE INFO LONG TEXT LONG TEXT LONG ใครหลายๆคนอาจไม่รู้ว่า สกลนครก็มีฟาร์มแกะเหมือนกันด้วยนะครับ...กับที่นี้เลย \r\nร้านโคขุนคุณทอง สกลนคร เป็นร้านขายอาหาร ที่เน้นเรื่องโคขุนโพนยางคำ  ', 'รายละเอียดภาพที่ 2 เทสข้อความแบบยาว ๆ \r\nTEST IMAGE INFO LONG TEXT LONG TEXT LONG แต่ข้างๆๆร้าน ได้สร้างเป็นฟาร์มแกะ ชื่อว่า Farm Hug\r\nสามารถเข้าไปให้เข้าไปให้อาหารได้อย่างใกล้ชิด\r\nแกะกว่า 30 ตัว นอกจากนี้ยังมีสวนกระต่าย ซึ่งอยู่ข้างๆกัน', 'รายละเอียดภาพที่ 3 เทสข้อความแบบยาว ๆ \r\nTEST IMAGE INFO LONG TEXT LONG TEXT LONG ค่าเข้าชมเเกะและสวน คนละ 30 บาท\r\nแถมอาหารให้แกะ 1 ชุด\r\nร้านและฟาร์ม เปิด-ปิด เวลา 11.30-22.00 น.', 'รายละเอียดภาพที่ 4 เทสข้อความแบบยาว ๆ \r\nTEST IMAGE INFO LONG TEXT LONG TEXT LONG ร้านได้จัดสถานที่ในบรรยากาศ cow boy ด้วยนะครับ\r\nในบางช่วงโอกาศ มีการปลูกสวนดอกไม้ ดอกทานตะวัน\r\nมีมุมสวยๆหลายจุดเลยทีเดียว ลองแวะมาถ่ายรูปกันดูนะครับ', 'รายละเอียดภาพที่ 5 เทสข้อความแบบยาว ๆ \r\nTEST IMAGE INFO LONG TEXT LONG TEXT LONG เข้าไปดูรีวิวเพิ่มเติมได้ที่...รีวิว Farm hug สกลนคร (ที่เป็นข่าวกันใหญ่โต)\r\nhttp://pantip.com/topic/32429904', 'รายละเอียดภาพที่ 6 เทสข้อความแบบยาว ๆ \r\nTEST IMAGE INFO LONG TEXT LONG TEXT LONG ฟาร์มแกะและร้านอาหารสไตล์คาวบอย ', '', '', '', ''),
(2, 'พระตำหนักภูพาน', 'ตั้งอยู่กลางเทือกเขาภูพาน บนเส้นทางหลวงสายสกลนคร-กาฬสินธุ์ เส้นทางหลวงหมายเลข 213 ห่างจากตัวเมืองสกลนคร 13 กิโลเมตร มีทางแยกเข้าไปทางด้านขวามือ ตามเส้นทางหลวงหมายเลข 2106', 'เป็นที่ประทับแรมของพระเจ้าอยู่หัว รัชกาลที่ 9 ใช้เมื่อทรงมาเยี่ยมประชาชนในพื้นที่ภาคอีสาน ตกแต่งแบบเรียบง่าย และใกล้ชิดธรรมชาติ บริเวณสถานที่ตั้งเป็นป่าไม้ร่มรื่น มีไม้ดอกไม้ประดับตกแต่งไว้อย่างสวยงาม', '100 - 250 บาท', 'ทางเข้าพระตำหนัก จะมีป้ายหินขนาดใหญ่ เขียนว่าพระตำหนักภูพานราขนิเวศน์', 'ขับรถไปยังพระตำหนักภูพานราชนิเวศน์โดยเส้นทางหมายเลข 213 ระยะทางจากที่พักประมาณ 15 กิโลเมตร', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15251.94073810641!2d104.0268113!3d17.122222!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x43a37fbc25b0fd6e!2z4Lie4Lij4Liw4LiV4Liz4Lir4LiZ4Lix4LiB4Lig4Li54Lie4Liy4LiZ4Lij4Liy4LiK4LiZ4Li04LmA4Lin4Lio4LiZ4LmM!5e0!3m2!1sth!2sth!4v1504668624367\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen', 'img/p1/14.jpg', 'img/p1/15.jpg', 'img/p1/16.jpg', 'img/p1/17.jpg', 'img/p1/18.jpg', 'img/p1/19.jpg', '', '', '', '', 'พระตำหนักภูพาน ภาพที่ 1', 'พระตำหนักภูพาน ภาพที่ 2', 'พระตำหนักภูพาน ภาพที่ 3', 'พระตำหนักภูพาน ภาพที่ 4', 'พระตำหนักภูพาน ภาพที่ 5', 'พระตำหนักภูพาน ภาพที่ 6', '', '', '', ''),
(4, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblvote_comment`
--

CREATE TABLE `tblvote_comment` (
  `vote_comment_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `ip_address` varchar(32) NOT NULL,
  `member_id` int(11) NOT NULL,
  `rating_score` float NOT NULL,
  `rating_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บข้อมูลคะแนนและความคิดเห็น';

--
-- Dumping data for table `tblvote_comment`
--

INSERT INTO `tblvote_comment` (`vote_comment_id`, `location_id`, `ip_address`, `member_id`, `rating_score`, `rating_comment`) VALUES
(1, 1, '', 1, 5, 'LOCATION ID 1 COMMENT SCORE 10'),
(2, 1, '', 2, 5, 'LOCATION ID 1 COMMENT SCORE 5'),
(3, 2, '', 0, 4, ''),
(4, 4, '', 0, 3, ''),
(5, 5, '', 0, 4, ''),
(6, 6, '', 0, 3, ''),
(7, 7, '', 0, 3, ''),
(8, 8, '', 0, 4, ''),
(9, 9, '', 0, 3, ''),
(10, 10, '', 0, 2, ''),
(11, 11, '', 0, 1, ''),
(12, 5, '', 0, 3, ''),
(13, 5, '', 0, 2, ''),
(14, 1, '', 3, 3, 'บริการดีมากๆจ้า อย่าลืมไปกันนะคะ'),
(15, 1, '', 4, 4, 'น้องแกะน่ารักมากเลยค่า พนักงานบริการโอเคเลยค่ะ'),
(16, 2, '', 5, 4, 'บรรยากาศร่มรื่นดีครับ'),
(17, 1, '', 6, 2, 'แอบมองเธออยู่นะจ๊ะ'),
(18, 1, '', 7, 4, 'ให้คุกกี้ืทำนายกัน'),
(19, 1, '', 8, 4, 'จะครบแล้ววววววว'),
(20, 1, '', 9, 3, 'ลุยเล้ยยยยยยยยยยยยยยยยยยยยยยยย'),
(21, 1, '', 5, 1, 'อ้าวลืมคอมเม้นที่ 5'),
(22, 1, '', 10, 3, 'GG EZ'),
(23, 2, '', 0, 4, ''),
(24, 2, '', 0, 5, ''),
(25, 2, '', 0, 5, ''),
(26, 2, '', 0, 3, ''),
(27, 2, '', 0, 4, ''),
(28, 2, '', 0, 0, ''),
(29, 2, '', 0, 2, ''),
(30, 2, '', 0, 1, ''),
(31, 3, '', 0, 4, ''),
(32, 3, '', 0, 3, ''),
(33, 3, '', 0, 1, ''),
(34, 3, '', 0, 2, ''),
(35, 3, '', 0, 4, ''),
(36, 3, '', 0, 3, ''),
(37, 3, '', 0, 2, ''),
(38, 3, '', 0, 4, ''),
(39, 3, '', 0, 4, ''),
(40, 3, '', 0, 3, ''),
(41, 0, '', 0, 0, 'TEST'),
(42, 0, '', 0, 0, 'test2'),
(43, 0, '', 0, 0, 'test3'),
(44, 0, '', 0, 0, 'test4'),
(45, 0, '', 0, 0, 'test5'),
(46, 0, '', 0, 0, 'test6'),
(47, 0, '', 0, 0, 'test7'),
(48, 0, '', 0, 0, 'test8'),
(49, 0, '', 0, 0, 'test9\r\n'),
(50, 0, '', 0, 5, 'test10'),
(51, 0, '', 0, 1, 'test11'),
(52, 0, '', 0, 1, 'test11'),
(53, 0, '', 0, 3, 'test11'),
(54, 0, '', 0, 0.75, 'test12'),
(55, 0, '', 0, 1.5, 'bmkhkjh'),
(56, 0, '', 0, 5, ''),
(57, 0, '', 0, 5, 'okay'),
(58, 0, '', 0, 5, ''),
(196, 1, '', 0, 5, 'ทดสอบ'),
(200, 1, '', 108, 5, 'สวย'),
(207, 2, '', 108, 5, 'test'),
(208, 3, '', 108, 5, 'test'),
(209, 4, '', 108, 5, 'test'),
(210, 5, '', 108, 4, 'test'),
(211, 6, '', 108, 3.5, 'test'),
(212, 7, '', 108, 3.5, 'test'),
(213, 8, '', 108, 4, 'test'),
(214, 9, '', 108, 3, 'test'),
(215, 10, '', 108, 2, 'sd'),
(216, 1, '::1', 0, 2.5, 'ddd'),
(217, 1, '', 108, 0, 'test test'),
(218, 1, '', 108, 5, 'test test'),
(219, 1, '', 108, 3, 'kk'),
(220, 1, '', 108, 3, 'kk');

-- --------------------------------------------------------

--
-- Table structure for table `test_up_img`
--

CREATE TABLE `test_up_img` (
  `test_up_id` int(11) NOT NULL,
  `test_up_file` varchar(256) NOT NULL,
  `test_up_info` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `tbladministrator`
--
ALTER TABLE `tbladministrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tblads_banner`
--
ALTER TABLE `tblads_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tblattrlocation_type`
--
ALTER TABLE `tblattrlocation_type`
  ADD PRIMARY KEY (`location_type_id`);

--
-- Indexes for table `tblfestival`
--
ALTER TABLE `tblfestival`
  ADD PRIMARY KEY (`Festival_ID`);

--
-- Indexes for table `tblfestival2`
--
ALTER TABLE `tblfestival2`
  ADD PRIMARY KEY (`festival_id`);

--
-- Indexes for table `tblfestival2_image`
--
ALTER TABLE `tblfestival2_image`
  ADD PRIMARY KEY (`festival_image_id`);

--
-- Indexes for table `tblhotel`
--
ALTER TABLE `tblhotel`
  ADD PRIMARY KEY (`Hotel_ID`);

--
-- Indexes for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbllocation_image`
--
ALTER TABLE `tbllocation_image`
  ADD PRIMARY KEY (`location_image_id`);

--
-- Indexes for table `tbllodge`
--
ALTER TABLE `tbllodge`
  ADD PRIMARY KEY (`lodge_id`);

--
-- Indexes for table `tbllodge_image`
--
ALTER TABLE `tbllodge_image`
  ADD PRIMARY KEY (`lodge_image_id`);

--
-- Indexes for table `tblmember`
--
ALTER TABLE `tblmember`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_username` (`member_username`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `tblproduct2`
--
ALTER TABLE `tblproduct2`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tblproduct_image`
--
ALTER TABLE `tblproduct_image`
  ADD PRIMARY KEY (`product_image_id`);

--
-- Indexes for table `tblreportcomment`
--
ALTER TABLE `tblreportcomment`
  ADD PRIMARY KEY (`reportcomment_id`);

--
-- Indexes for table `tblreportlocation`
--
ALTER TABLE `tblreportlocation`
  ADD PRIMARY KEY (`reportlocation_id`);

--
-- Indexes for table `tblrestaurant`
--
ALTER TABLE `tblrestaurant`
  ADD PRIMARY KEY (`Restaurant_ID`);

--
-- Indexes for table `tblrestaurant2`
--
ALTER TABLE `tblrestaurant2`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `tblrestaurant2_image`
--
ALTER TABLE `tblrestaurant2_image`
  ADD PRIMARY KEY (`restaurant_image_id`);

--
-- Indexes for table `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`Service_ID`);

--
-- Indexes for table `tblservice2`
--
ALTER TABLE `tblservice2`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tblservice2_image`
--
ALTER TABLE `tblservice2_image`
  ADD PRIMARY KEY (`service_image_id`);

--
-- Indexes for table `tbltravel`
--
ALTER TABLE `tbltravel`
  ADD PRIMARY KEY (`Attraction_ID`);

--
-- Indexes for table `tblvote_comment`
--
ALTER TABLE `tblvote_comment`
  ADD PRIMARY KEY (`vote_comment_id`);

--
-- Indexes for table `test_up_img`
--
ALTER TABLE `test_up_img`
  ADD PRIMARY KEY (`test_up_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `b_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbladministrator`
--
ALTER TABLE `tbladministrator`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblads_banner`
--
ALTER TABLE `tblads_banner`
  MODIFY `banner_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblattrlocation_type`
--
ALTER TABLE `tblattrlocation_type`
  MODIFY `location_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblfestival`
--
ALTER TABLE `tblfestival`
  MODIFY `Festival_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblfestival2`
--
ALTER TABLE `tblfestival2`
  MODIFY `festival_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tblfestival2_image`
--
ALTER TABLE `tblfestival2_image`
  MODIFY `festival_image_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblhotel`
--
ALTER TABLE `tblhotel`
  MODIFY `Hotel_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tbllocation_image`
--
ALTER TABLE `tbllocation_image`
  MODIFY `location_image_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `tbllodge`
--
ALTER TABLE `tbllodge`
  MODIFY `lodge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tbllodge_image`
--
ALTER TABLE `tbllodge_image`
  MODIFY `lodge_image_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblmember`
--
ALTER TABLE `tblmember`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblproduct2`
--
ALTER TABLE `tblproduct2`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tblproduct_image`
--
ALTER TABLE `tblproduct_image`
  MODIFY `product_image_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblreportcomment`
--
ALTER TABLE `tblreportcomment`
  MODIFY `reportcomment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblreportlocation`
--
ALTER TABLE `tblreportlocation`
  MODIFY `reportlocation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblrestaurant`
--
ALTER TABLE `tblrestaurant`
  MODIFY `Restaurant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblrestaurant2`
--
ALTER TABLE `tblrestaurant2`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tblrestaurant2_image`
--
ALTER TABLE `tblrestaurant2_image`
  MODIFY `restaurant_image_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `Service_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblservice2`
--
ALTER TABLE `tblservice2`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `tblservice2_image`
--
ALTER TABLE `tblservice2_image`
  MODIFY `service_image_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbltravel`
--
ALTER TABLE `tbltravel`
  MODIFY `Attraction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblvote_comment`
--
ALTER TABLE `tblvote_comment`
  MODIFY `vote_comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `test_up_img`
--
ALTER TABLE `test_up_img`
  MODIFY `test_up_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

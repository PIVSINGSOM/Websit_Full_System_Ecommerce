-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2018 at 05:05 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Bank` varchar(100) NOT NULL,
  `Account` varchar(100) NOT NULL,
  `Branch` varchar(100) NOT NULL,
  `ืNumber` int(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`ID`, `Bank`, `Account`, `Branch`, `ืNumber`) VALUES
(1, 'ธนาคารไทยพาณิชย์ (SCB)', '', '', 0),
(2, 'ธนาคารกรุงเทพ (BBL)', '', '', 0),
(3, 'ธนาคารกสิกรไทย (KBANK)	', '', '', 0),
(4, 'ธนาคารกรุงไทย (KTB)	', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Image` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`ID`, `Image`) VALUES
(1, 'Banner.png'),
(2, 'Banner2.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `ID_Category` int(100) NOT NULL AUTO_INCREMENT,
  `Product_Category` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Category`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID_Category`, `Product_Category`) VALUES
(20, 'ปลากัดหม้อ'),
(19, 'ปลากัดป่า'),
(18, 'ปลากัดหม้อฮาฟ'),
(17, 'ปลากัดคราวเทล'),
(16, 'ปลากัดจีน');

-- --------------------------------------------------------

--
-- Table structure for table `member_user`
--

DROP TABLE IF EXISTS `member_user`;
CREATE TABLE IF NOT EXISTS `member_user` (
  `UserID` int(100) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `User` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `Status` varchar(1) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_user`
--

INSERT INTO `member_user` (`UserID`, `Name`, `Address`, `Tel`, `Email`, `User`, `Pass`, `Status`) VALUES
(11, 'admin', '123/55 ม.1 ต.วิชิต อ.เมือง จ.ภูเก็ต', '0836590753', 'admin@hotmail.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'A'),
(12, 'สามารถ หมันการ', '188 ม.6 ต.ควนโพธิ์ อ.เมือง จ.สตูล 91140', '0839622842', 'nihla85@hotmail.com', 'Samart', 'c33367701511b4f6020ec61ded352059', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int(100) NOT NULL AUTO_INCREMENT,
  `OrderDate` datetime NOT NULL,
  `UserID` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Paid` varchar(10) NOT NULL,
  `Delivery` varchar(10) NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=MyISAM AUTO_INCREMENT=100156 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `UserID`, `Name`, `Address`, `Tel`, `Paid`, `Delivery`) VALUES
(100143, '2018-04-22 06:24:08', 11, 'admin', '188 ม.6 ต.ควนโพธิ์ อ.เมือง จ.สตูล', '0836590753', 'Yes', 'Yes'),
(100144, '2018-04-22 06:24:20', 11, 'admin', '188 ม.6 ต.ควนโพธิ์ อ.เมือง จ.สตูล', '0836590753', 'Yes', 'Yes'),
(100146, '2018-04-22 07:40:42', 11, 'admin', '188 ม.6 ต.ควนโพธิ์ อ.เมือง จ.สตูล', '0836590753', 'Yes', 'Yes'),
(100153, '2018-05-05 19:57:23', 12, 'สามารถ หมันการ', '188 ม.6 ต.ควนโพธิ์ อ.เมือง จ.สตูล 56221', '0839622842', 'Yes', 'Yes'),
(100147, '2018-04-25 13:03:59', 11, 'admin', '188 ม.6 ต.ควนโพธิ์ อ.เมือง จ.สตูล', '0836590753', 'Checking', 'No'),
(100155, '2018-05-07 10:43:23', 12, 'สามารถ หมันการ', '188 ม.6 ต.ควนโพธิ์ อ.เมือง จ.สตูล 91140', '0839622842', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

DROP TABLE IF EXISTS `orders_detail`;
CREATE TABLE IF NOT EXISTS `orders_detail` (
  `OrderID` int(100) NOT NULL,
  `ProductID` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`OrderID`, `ProductID`) VALUES
(100143, 100026),
(100143, 100027),
(100144, 100028),
(100146, 100025),
(100146, 100029),
(100147, 100026),
(100155, 100025),
(100153, 100029);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `Pay_ID` int(100) NOT NULL AUTO_INCREMENT,
  `OrderID` int(100) NOT NULL,
  `UserID` int(100) NOT NULL,
  `Bank` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Date_transfer` datetime NOT NULL,
  `Confirm` varchar(10) NOT NULL,
  PRIMARY KEY (`Pay_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=564433 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Pay_ID`, `OrderID`, `UserID`, `Bank`, `Amount`, `Date_transfer`, `Confirm`) VALUES
(564430, 100144, 11, 'ธนาคารไทยพาณิชย์ (SCB)', 360, '2018-04-10 10:00:00', 'Yes'),
(564431, 100146, 11, 'ธนาคารกสิกรไทย (KBANK)', 910, '2018-04-03 07:41:00', 'Yes'),
(564432, 100153, 12, 'ธนาคารไทยพาณิชย์ (SCB)', 500, '2018-05-18 22:00:00', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int(100) NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(100) NOT NULL,
  `Product_Sex` varchar(100) NOT NULL,
  `Product_Size` varchar(100) NOT NULL,
  `Product_Age` varchar(100) NOT NULL,
  `ID_Category` int(100) NOT NULL,
  `Product_Content` varchar(10000) NOT NULL,
  `Product_Price` int(100) NOT NULL,
  `Product_Image` varchar(100) NOT NULL,
  `Product_Video` varchar(1000) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM AUTO_INCREMENT=100032 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Product_Name`, `Product_Sex`, `Product_Size`, `Product_Age`, `ID_Category`, `Product_Content`, `Product_Price`, `Product_Image`, `Product_Video`, `Status`) VALUES
(100031, 'ปลากัดโค่ย', 'ผู้', '2.2', '4', 18, 'โค่ยสีสันลวดลายคมชัดสวยงาม ซื้อไปพร้อมใช้ผสมเป็นพ่อพันธุ์ทำสายต่อได้ทันที', 380, '100031.jpg', '<iframe width=\"100%\" height=\"300\" src=\"https://www.youtube.com/embed/LfCse_eGVvI\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 1),
(100025, 'ปลากัดโค่ย', 'ผู้', '2', '3', 20, 'เป็นปลากัดจีนที่มีลายจุดโดดเด่นมีหลายสีในตัวเดียวกัน ลักษณะของปลาแข็งแรงสมบูรณ์ ไม่ซึม', 580, '100025.jpg', '<iframe width=\"100%\" height=\"300\" src=\"https://www.youtube.com/embed/QFdFWK_WHOY?controls=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0),
(100026, 'ปลากัดโค่ย', 'ผู้', '2', '3', 20, 'ปลาพร้อมผสม สายเลือดดี มีลวดลายลักษณะสีส้มแปร๊ดเด่นชัดเฉพาะตัว ตัดด้วยจุดสีดำบนตัวของปลา', 380, '100026.jpg', '<iframe width=\"100%\" height=\"300\" src=\"https://www.youtube.com/embed/tfQEXHVDCGk?controls=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0),
(100027, 'ปลากัดจีนมาหาชัย', 'ผู้', '2.1', '4', 20, 'เป็นปลากัดมหาชัยที่พัฒนามาจนมีหางยาวเรียวสวยแบบปลากัดจีนแต่มีลวดลายแบบป่ากัดป่ามหาชัย', 780, '100027.jpg', '<iframe width=\"100%\" height=\"300\" src=\"https://www.youtube.com/embed/2nitNY86Wzg?controls=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 1),
(100028, 'ปลากัดแฟนซี', 'ผู้', '2', '3', 20, 'ปลาแฟนซีสีสดใส มีหลายสีในตัวเดียวกัน ไม่ว่าจะเป็นสีส้ม แดง ดำ และฟ้า ลักษณะตัวอ้วนแข็งแรง', 280, '100028.jpg', '<iframe width=\"100%\" height=\"300\" src=\"https://www.youtube.com/embed/0UIE3XD9xO0?controls=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 1),
(100029, 'ปลากัดป่าอีสาน', 'ผู้', '2.2', '4', 19, 'ลูกเพาะ ปลากัดป่าของภาคอีสาน รูปทรงปราดเปรียว หลบเก่ง กัดไว', 250, '100029.jpg', '<iframe width=\"100%\" height=\"300\" src=\"https://www.youtube.com/embed/5SZjgwZsiZ0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 0),
(100030, 'ปลากัดแฟนซี', 'ผู้', '2.1', '4', 18, 'ปลาแฟนซี สีดำทะมึน แข็งแรงร่าเริงว่ายน้ำคล่องแคล่ว', 180, '100030.jpg', '<iframe width=\"100%\" height=\"300\" src=\"https://www.youtube.com/embed/hPh2edZ7vv4?controls=0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `QuestionID` int(10) NOT NULL AUTO_INCREMENT,
  `Question` varchar(100) NOT NULL,
  `Answer` varchar(1000) NOT NULL,
  PRIMARY KEY (`QuestionID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `Question`, `Answer`) VALUES
(1, 'ส่งต่างจังหวัดไหม', 'ส่งทุกจังหวัดทั่วประเทศไทยค่ะ'),
(2, 'ร้านอยู่ที่ไหน', 'อยู่สตูลค่ะ'),
(3, ' มีหน้าร้านไหม', 'สามารถเข้ามาเลือกได้ที่บ่อเพาะพันธุ์ค่ะ'),
(4, 'ไม่มีไรแดงให้ลูกปลากัดกิน ให้อะไรแทนได้บ้าง', 'ให้อาทีเมียร์แทนได้ครับ'),
(5, 'ดูยังไงว่าปลาออกไข่แล้ว', 'สังเกตุในหวอดของปลาจะมีเม็ดไข่กลมๆสีขาวอมเหลืองนิดๆ อยู่ภายในหวอด');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `ReviewID` int(10) NOT NULL AUTO_INCREMENT,
  `UserID` int(100) NOT NULL,
  `OrderID` int(100) NOT NULL,
  `Detail` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `Star` int(1) NOT NULL,
  `Date` timestamp NOT NULL,
  PRIMARY KEY (`ReviewID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `UserID`, `OrderID`, `Detail`, `Star`, `Date`) VALUES
(11, 11, 100143, 'ดีมากๆเลยครับ', 5, '2018-04-21 23:48:55'),
(12, 11, 100143, 'ของโคตรดี', 4, '2018-04-25 06:08:15'),
(13, 12, 100153, 'ส่งของไวมากๆครับ ปลาสวยมาก', 5, '2018-05-05 13:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `StaffID` int(100) NOT NULL AUTO_INCREMENT,
  `FName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `LName` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `zipcode`
--

DROP TABLE IF EXISTS `zipcode`;
CREATE TABLE IF NOT EXISTS `zipcode` (
  `OrderID` int(100) NOT NULL,
  `Code` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zipcode`
--

INSERT INTO `zipcode` (`OrderID`, `Code`) VALUES
(100098, 'TH23213123'),
(100144, '264512315'),
(100146, '32as6dd'),
(100153, '2564651');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

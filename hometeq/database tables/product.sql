-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 04:27 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tute3`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proId` int(4) NOT NULL,
  `prodname` varchar(30) NOT NULL,
  `prodPicNameSmall` varchar(100) NOT NULL,
  `prodPicNameLarge` varchar(100) NOT NULL,
  `prodDescriShort` varchar(1000) DEFAULT NULL,
  `prodDescripLong` varchar(3000) DEFAULT NULL,
  `prodPrice` decimal(6,2) NOT NULL,
  `prodQuantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proId`, `prodname`, `prodPicNameSmall`, `prodPicNameLarge`, `prodDescriShort`, `prodDescripLong`, `prodPrice`, `prodQuantity`) VALUES
(1, 'Samsung Smart TV', 'tv1-s.jpg', 'TV1.jpg', 'The new Samsung Smart TV offers a completely new visual experience to your playlist\r\n', 'Enter a world saturated with color and sharpened to refreshing clarity, all of it made possible through the power of Quantum Dot technology. ... 50\" Class NU6900 Smart 4K UHD TV (2018) ... 49\" Class Q60R QLED Smart 4K UHD TV (2019)', '699.99', 6),
(2, 'Samsung Smart fridge', 'fridge-1-ss.jpg', 'fridge-1-s.jpg', 'Samsung Electronics Debuts Next Generation of Family Hub Refrigerator at CES 2018\r\n', 'Family Hub in 2018 offers a wide range of smart features that allow consumers to do what they could not do before. These include syncing up food storage with meal preparation, keeping family members better connected and organized, and providing enhanced entertainment. Family Hub is also more intuitive and intelligent with the addition of Bixby voice control and its integration with Samsung’s SmartThings IoT ecosystem.\r\n', '999.99', 5),
(3, 'Samsung Washing Machine', 'WM-1.png', 'WM_L.jpg', 'Alarm Sounds on a Samsung Washing Machine.\r\n', 'The purpose of the alarm sounds on your Samsung washing machine is to notify you when a washing cycle has finished.\r\nAlarm sounds also chime in conjunction with the Child Lock feature. If you have deactivated the Child Lock feature and the door has been opened for 1 minute or more, an alarm will sound for up to 2 minutes.\r\nIf you close the door within 2 minutes, the door locks and Child Lock is reactivated. However, if the door is not closed properly, the alarm will keep sounding for 2 minutes. This is the same feature as the door being left open.\r\n', '899.00', 4),
(4, 'Smart stove', 'stove-s.jpg', 'stove-l.jpg', '5.9 CU. FT. ELECTRIC FLEX DUO® RANGE WITH SOFT CLOSE AND DUAL DOOR™ BY SAMSUNG APPLIANCES\r\n', 'The Samsung Electric Flex Duo® Range splits in to two ovens (2.7 cu. ft. Upper/ 3.0 cu. ft Lower), so you can cook two dishes simultaneously at two different temperatures. Plus with the Dual Door™ you can open just the top section or full oven for cooking flexibility and energy efficiency. Easily and quietly close the oven door with the whisper-quiet Soft Close Door. The 5.9 cu. ft. capacity and Flexible Cooktop ensures you have the flexibility to cook multiple dishes at once. Then keep food warm in the Warming Draw until ready to eat.', '700.00', 0),
(5, 'iPad-pro-18-s', 'iPad-pro-18-s.jpg', '', 'The iPad Pro 11-inch is excellent, and easily the best tablet Apple has ever made – but you\'ll need to know how to get the best out of it. It\'s designed for the professional, and those in creative lines of work will love the power, precision and overall quality on offer. If you\'re a \'standard\' user, then you\'ll be buying the iPad Pro as a luxury device and media powerhouse – and you\'ll be paying for the privilege.', 'Ever since the original iPad Pro, Apple needed to improve on its formula, and the iPad Pro 11 (2018) is the tablet it always set out to make. With a smaller frame but larger screen, bags of power, and a new redesigned Apple Pencil, this is the new face of Apple\'s slate game.\r\n\r\nApple needed to make these improvements so the iPad Pro 11 could be the true device for a professional user, and it seems the company has delivered. So here we are with the iPad Pro 11-inch (or iPad Pro 11, to you and us), which aims to fix the various issues the first Pros had. There\'s also the iPad Pro 12.9, with a screen that\'s a little bigger, for those of you who need extra screen real estate.', '500.00', 5),
(6, 'msi-gs75-s', 'msi-gs75-s.jpg', '', 'Power up with 40% performance gains over the previous generation with the extra cores.', 'The premium glass touchpad comes with an enlarged surface area and an extremely smooth finish, perfect for all your for click, scroll, and multi-touch gesture needs.Have all you games and data on-the-go with up to 3 M.2 SSD storage slots,\r\nall within a slim and sleek chassis.', '750.00', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

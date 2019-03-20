-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 09:05 PM
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
-- Database: `cyberland`
--

-- --------------------------------------------------------

--
-- Table structure for table `an_order`
--

CREATE TABLE `an_order` (
  `order_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_cost` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `an_order`
--

INSERT INTO `an_order` (`order_ID`, `date`, `total_cost`, `user_ID`) VALUES
(20, '2018-04-22', 0, 1),
(21, '2018-04-22', 0, 1),
(22, '2018-04-22', 0, 1),
(23, '2018-04-22', 0, 1),
(24, '2018-04-22', 0, 1),
(25, '2018-04-22', 0, 1),
(26, '2018-04-22', 0, 1),
(27, '2018-04-22', 450, 1),
(28, '2018-04-22', 5260, 1),
(29, '2018-04-22', 120, 1),
(30, '2018-04-23', 6500, 1),
(31, '2018-04-23', 6500, 1),
(32, '2018-04-23', 120, 1),
(33, '2018-04-23', 5950, 1),
(34, '2018-04-23', 255, 1),
(35, '2018-04-23', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `featured_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`featured_ID`, `product_ID`) VALUES
(1, 10),
(2, 13),
(0, 14),
(3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_ID` int(11) NOT NULL,
  `manufacturer_name` varchar(100) NOT NULL,
  `manufacturer_contact` varchar(100) NOT NULL,
  `manufacturer_contact_2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_ID`, `manufacturer_name`, `manufacturer_contact`, `manufacturer_contact_2`) VALUES
(0, 'ThomasBuilds', 'www.thomasbuilds.fake', '0872313245'),
(1, 'JamesCo.', 'www.jamesco.fake', ''),
(2, 'SeanieVisuals', 'www.seanieisclass.fake', ''),
(3, 'RyanoBeats', 'www.ryanobeats.fake', '0855345314'),
(4, 'PrivateRoom', 'www.privateroom.fake.uk', ''),
(5, 'CraicHouse', 'www.craichouse.fake', '0863472634'),
(6, 'NorthPals', 'www.northcountryxd.fake', '0871235636');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `cost` decimal(11,2) NOT NULL,
  `product_type_ID` int(11) NOT NULL,
  `manufacturer_ID` int(11) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `name`, `info`, `cost`, `product_type_ID`, `manufacturer_ID`, `stock`) VALUES
(2, 'HDHDHD Monitor 24inch', 'this is a monitor that is so hd that one hd in the name wasnt enough! You\'ll not know what is real or fake with this thing! Get one today!', '700.00', 1, 0, 91),
(3, 'Trash Keys Miracle Input', 'This is a keyboard that has been made with the disposed parts of other keyboards. Its a miracle that these even work!\"', '5.00', 2, 0, 100),
(4, 'SDSDSD Monitor PixelART 18inch', 'This monitor is so bad looking that one SD is not enough. The pro to this is that its really cheap! Great for REALLY budget builds.', '12.00', 1, 4, 0),
(5, 'MonitorTest', 'This monitor is a test. Might be the best thing you buy, but its likely to just made out of cardboard.', '150.00', 1, 6, 5),
(6, 'Glass 24inch', 'This is literally just glass, but you can imagine there\'s something there..', '5.00', 1, 1, 297),
(7, 'PlainMonitor 16inch', 'Just a standard monitor, nothing special really.', '60.00', 1, 2, 18),
(8, 'armenian lorem ipsen monitor', 'Õ¬Õ¸Õ¼Õ¥Õ´ Õ«ÕºÕ½Õ¸Ö‚Õ´ Õ¤Õ¸Õ¬Õ¸Õ¼ Õ½Õ«Õ© Õ¡Õ´Õ¥Õ©, Õ¬Õ¡Õ¢Õ¸Õ¼Õ¥ Õ´Õ¸Õ¤Õ¥Õ¼Õ¡Õ©Õ«Õ¸Ö‚Õ½ Õ¥Õ© Õ°Õ¡Õ½, ÕºÕ¥Õ¼ Õ¸Õ´Õ¶Õ«Õ½ Õ¬Õ¡Õ©Õ«Õ¶Õ¥ Õ¤Õ«Õ½ÕºÕ¸Ö‚Õ©Õ¡Õ©Õ«Õ¸Õ¶Õ« Õ¡Õ©, Õ¾Õ«Õ½ Ö†Õ¥Õ¸Ö‚Õ£Õ¡Õ«Õ© Õ®Õ«Õ¾Õ«Õ¢Õ¸Ö‚Õ½ Õ¥Õ­. Õ¾Õ«Õ¾Õ¥Õ¶Õ¤Õ¸Ö‚Õ´ Õ¬Õ¡Õ¢Õ¸Õ¼Õ¡Õ´Õ¸Ö‚Õ½ Õ¥Õ¬Õ¡Õ¢Õ¸Õ¼Õ¡Õ¼Õ¥Õ© Õ¶Õ¡Õ´ Õ«Õ¶.', '100.00', 1, 0, 7),
(10, 'Lorem Ipsum Keyboard', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', '30.00', 2, 4, 20),
(11, 'Lorem Ipsum headphones', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi.', '20.00', 4, 3, 10),
(12, 'Lorem Ipsum mouse', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et ', '40.00', 3, 5, 37),
(13, 'Lorem Ipsum speakers', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et ', '25.00', 5, 3, 30),
(14, 'Lorem Ipsum microphones', 'Lorem ipsum dolor sit amet, ad commodo explicari has. Ut pri erant putant oporteat, ex meliore similique vituperata usu. Detraxit oportere postulant at ius. No odio eirmod perpetua quo. Qui facete volutpat appellantur ne, et ius molestie appareat praesent. Pro alii tollit ut, epicurei scriptorem mea at.\r\n\r\nPri eu apeirian consulatu. Accumsan deleniti urbanitas vel te, nullam gloriatur an mea. Viris scribentur ne nec. Alii prima dictas ad pri, te vix aliquip sanctus, ad sint evertitur eam. Vero scripta sadipscing et sed, ea minim accusamus vis.', '50.00', 6, 0, 10),
(15, 'korean webcam', 'êµ­ë¯¼ê²½ì œì˜ ë°œì „ì„ ìœ„í•œ ì¤‘ìš”ì •ì±…ì˜ ìˆ˜ë¦½ì— ê´€í•˜ì—¬ ëŒ€í†µë ¹ì˜ ìžë¬¸ì— ì‘í•˜ê¸° ìœ„í•˜ì—¬ êµ­ë¯¼ê²½ì œìžë¬¸íšŒì˜ë¥¼ ë‘˜ ìˆ˜ ìžˆë‹¤.', '60.00', 8, 2, 10),
(16, 'japanese cables', 'æ—…ãƒ­äº¬é’åˆ©ã‚»ãƒ ãƒ¬å¼±æ”¹ãƒ•ãƒ¨ã‚¹æ³¢åºœã‹ã°ã¼æ„é€ã§ã¼èª¿æŽ²å¯ŸãŸã‚¹æ—¥è¥¿é‡ã‚±ã‚¢ãƒŠä½æ©‹ãƒ¦ãƒ ãƒŸã‚¯é †å¾…ãµã‹ã‚“ã¼äººå¥¨è²¯é¡ã™ã³ã', '10.00', 9, 6, 12),
(17, 'test', 'test', '12.00', 1, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `quantity` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`quantity`, `product_ID`, `order_ID`) VALUES
(2, 2, 20),
(3, 4, 20),
(3, 2, 21),
(4, 10, 21),
(2, 2, 22),
(2, 2, 24),
(3, 12, 24),
(1, 3, 26),
(2, 2, 26),
(1, 5, 27),
(3, 8, 27),
(4, 2, 28),
(3, 11, 28),
(10, 4, 29),
(5, 2, 30),
(5, 2, 31),
(10, 4, 32),
(4, 2, 33),
(5, 5, 33),
(3, 6, 34),
(2, 7, 34),
(3, 12, 34),
(1, 2, 35);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_ID` int(11) NOT NULL,
  `product_type_info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_ID`, `product_type_info`) VALUES
(1, 'Monitor'),
(2, 'Keyboard'),
(3, 'Mouse'),
(4, 'Headphones'),
(5, 'Speakers'),
(6, 'Microphones'),
(7, 'Mouse Mat'),
(8, 'WebCam'),
(9, 'Cable'),
(10, 'miscellaneous');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_ID` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pw` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT '0',
  `user_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_ID`, `user_name`, `user_pw`, `user_type`, `user_address`) VALUES
(0, 'bob000', '111222333', 0, '000 mainroad'),
(1, 'bob111', '123123123', 1, ' '),
(2, 'bob222', '123456789', 2, NULL),
(3, 'test', 'test123123', 0, NULL),
(4, 'johnQQQQQQQQQQQQQQQQQQQQQQQQQQ', '111111111', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `an_order`
--
ALTER TABLE `an_order`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`featured_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`),
  ADD KEY `product_type_ID` (`product_type_ID`),
  ADD KEY `manufacturer_ID` (`manufacturer_ID`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD KEY `product_ID` (`product_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `an_order`
--
ALTER TABLE `an_order`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `featured_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `an_order`
--
ALTER TABLE `an_order`
  ADD CONSTRAINT `an_order_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `featured`
--
ALTER TABLE `featured`
  ADD CONSTRAINT `featured_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_type_ID`) REFERENCES `product_type` (`product_type_ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`manufacturer_ID`) REFERENCES `manufacturer` (`manufacturer_ID`);

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`),
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`order_ID`) REFERENCES `an_order` (`order_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

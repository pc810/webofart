-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2019 at 07:42 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webofart`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `assign_art` ()  BEGIN
DECLARE n INT DEFAULT 0;
DECLARE i INT DEFAULT 0;
SELECT COUNT(*) FROM archive_auction INTO n;
SET i=0;
WHILE i<n DO 
  SET @art_id = (SELECT art_id from archive_auction LIMIT i,1);
  SET @time = (SELECT auction_end from auction WHERE auction_id = 
               (
               	SELECT auction_id from archive_auction WHERE art_id = @art_id LIMIT i,1
               ) LIMIT 1);
  SET @current = (SELECT now());
  
  IF @current > @time 
  then
  SET @myid = (SELECT archive_id from archive_auction LIMIT i,1);
  SET @username = (SELECT username from archive_auction LIMIT i,1);
  SET @order_status = "on time";
  SET @dely_date = (SELECT archive_posted from archive_auction LIMIT i,1);
  SET @dely_addr = (SELECT user_addr from user WHERE username = @username);
  SET @sale_amount = (SELECT user_current_bid from archive_auction LIMIT i,1);
  SET @sale_date = (SELECT archive_posted from archive_auction LIMIT i,1);
  
  INSERT INTO auction_sales_order(username,order_status,dely_date,dely_addr,sale_amount,sale_date) VALUES(@username,@order_status, @dely_date,@dely_addr,@sale_amount, @sale_date);
  
  SET @sale_id = (SELECT max(sale_id) from auction_sales_order LIMIT 1);
  INSERT INTO auction_sales_order_details(sale_id,art_id) VALUES(@sale_id,@art_id);
  end IF;
  
  SET i = i + 1;
END WHILE;
End$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `archive_auction`
--

CREATE TABLE `archive_auction` (
  `archive_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `user_current_bid` float NOT NULL,
  `archive_posted` datetime NOT NULL,
  `art_id` int(11) DEFAULT NULL,
  `status_art` varchar(20) NOT NULL DEFAULT 'notconfirmed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `art_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `art_title` varchar(256) NOT NULL,
  `art_medium` varchar(256) NOT NULL,
  `art_width` float NOT NULL,
  `art_height` float NOT NULL,
  `art_loc` varchar(500) NOT NULL,
  `art_about` varchar(2000) NOT NULL,
  `art_price` float NOT NULL,
  `art_genre` varchar(25) NOT NULL,
  `art_posted` datetime NOT NULL,
  `art_created_date` date NOT NULL,
  `art_status` varchar(15) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `auction_id` int(11) NOT NULL,
  `auction_name` varchar(255) NOT NULL,
  `auction_about` varchar(20000) NOT NULL,
  `art_loc` varchar(500) NOT NULL,
  `auction_posted` datetime NOT NULL,
  `auction_start` datetime NOT NULL,
  `auction_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auctioned_art`
--

CREATE TABLE `auctioned_art` (
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `auctioned_art`
--
DELIMITER $$
CREATE TRIGGER `maybe_trigger` AFTER INSERT ON `auctioned_art` FOR EACH ROW begin SET @myid = NEW.art_id; SET @mymax = (SELECT MAX(user_current_bid) from live_auction GROUP BY(art_id) HAVING art_id = @myid); SET @myusername = (SELECT username FROM live_auction WHERE art_id = @myid and user_current_bid = @mymax); if NEW.art_id not in (SELECT art_id from archive_auction) then INSERT INTO archive_auction(username,user_current_bid,archive_posted,art_id) VALUES(@myusername,@mymax,now(),NEW.art_id); ELSE UPDATE archive_auction SET user_current_bid = @mymax WHERE art_id = NEW.art_id; UPDATE archive_auction SET username = myusername WHERE art_id = NEW.art_id; UPDATE archive_auction SET archive_posted = now() WHERE art_id = NEW.art_id; end if; END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `maybe_trigger_update` AFTER UPDATE ON `auctioned_art` FOR EACH ROW begin
	SET @myid = NEW.art_id; 
    SET @mymax = (SELECT MAX(user_current_bid) from live_auction GROUP BY(art_id) HAVING art_id = @myid); 
    SET @myusername = (SELECT username FROM live_auction WHERE art_id = @myid and user_current_bid = @mymax); 
    UPDATE archive_auction SET user_current_bid = @mymax WHERE art_id = NEW.art_id;
    UPDATE archive_auction SET username = @myusername WHERE art_id = NEW.art_id; 
    UPDATE archive_auction SET archive_posted = now() WHERE art_id = NEW.art_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `auction_art`
--

CREATE TABLE `auction_art` (
  `art_id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `art_title` varchar(256) NOT NULL,
  `art_medium` varchar(256) NOT NULL,
  `art_width` float NOT NULL,
  `art_height` float NOT NULL,
  `art_loc` varchar(500) NOT NULL,
  `art_about` varchar(20000) NOT NULL,
  `art_genre` varchar(25) NOT NULL,
  `art_posted` datetime NOT NULL,
  `art_created_date` date NOT NULL,
  `art_status` varchar(15) NOT NULL DEFAULT 'available',
  `username` varchar(15) NOT NULL,
  `art_current_bid` float NOT NULL,
  `art_min_raise` int(11) NOT NULL,
  `art_max_raise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction_sales_order`
--

CREATE TABLE `auction_sales_order` (
  `sale_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `order_status` varchar(256) NOT NULL,
  `dely_date` date NOT NULL,
  `dely_addr` varchar(256) NOT NULL,
  `sale_amount` float NOT NULL,
  `sale_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction_sales_order_details`
--

CREATE TABLE `auction_sales_order_details` (
  `sale_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_content`
--

CREATE TABLE `cart_content` (
  `cart_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `live_auction`
--

CREATE TABLE `live_auction` (
  `live_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `user_current_bid` float NOT NULL,
  `live_posted` datetime NOT NULL,
  `art_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `live_auction`
--
DELIMITER $$
CREATE TRIGGER `insert_into_live_auction` AFTER INSERT ON `live_auction` FOR EACH ROW if NEW.art_id not in (SELECT art_id from auctioned_art) then
INSERT INTO auctioned_art VALUES(NEW.art_id);
ELSE
UPDATE auctioned_art set art_id = NEW.art_id WHERE art_id = NEW.art_id;
end if
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `sale_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `order_status` varchar(256) NOT NULL,
  `dely_date` date NOT NULL,
  `dely_addr` varchar(256) NOT NULL,
  `sale_amount` float NOT NULL,
  `sale_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_detail`
--

CREATE TABLE `sales_order_detail` (
  `sale_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `posted` datetime DEFAULT NULL,
  `user_addr` varchar(256) NOT NULL,
  `user_photo` varchar(256) NOT NULL,
  `user_city` varchar(256) NOT NULL,
  `user_pincode` varchar(256) NOT NULL,
  `user_state` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `archive_auction`
--
ALTER TABLE `archive_auction`
  ADD PRIMARY KEY (`archive_id`),
  ADD KEY `archive_auction_ibfk_1` (`username`),
  ADD KEY `archive_auction_ibfk_2` (`art_id`);

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `user_art_fk` (`username`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auction_id`);

--
-- Indexes for table `auctioned_art`
--
ALTER TABLE `auctioned_art`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `auction_art`
--
ALTER TABLE `auction_art`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `auction_art_ibfk_1` (`username`),
  ADD KEY `auction_art_ibfk_2` (`auction_id`);

--
-- Indexes for table `auction_sales_order`
--
ALTER TABLE `auction_sales_order`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `a_sales_order_username` (`username`);

--
-- Indexes for table `auction_sales_order_details`
--
ALTER TABLE `auction_sales_order_details`
  ADD PRIMARY KEY (`sale_id`,`art_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `cart_content`
--
ALTER TABLE `cart_content`
  ADD PRIMARY KEY (`art_id`,`cart_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `live_auction`
--
ALTER TABLE `live_auction`
  ADD PRIMARY KEY (`live_id`),
  ADD KEY `live_auction_ibfk_2` (`art_id`),
  ADD KEY `live_auction_username` (`username`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  ADD PRIMARY KEY (`sale_id`,`art_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_auction`
--
ALTER TABLE `archive_auction`
  MODIFY `archive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `auction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auction_art`
--
ALTER TABLE `auction_art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auction_sales_order`
--
ALTER TABLE `auction_sales_order`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `live_auction`
--
ALTER TABLE `live_auction`
  MODIFY `live_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD CONSTRAINT `admin_user_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `archive_auction`
--
ALTER TABLE `archive_auction`
  ADD CONSTRAINT `archive_auction_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `archive_auction_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `auction_art` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `art`
--
ALTER TABLE `art`
  ADD CONSTRAINT `user_art_fk` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `auctioned_art`
--
ALTER TABLE `auctioned_art`
  ADD CONSTRAINT `auctioned_art_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `auction_art` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auction_art`
--
ALTER TABLE `auction_art`
  ADD CONSTRAINT `auction_art_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_art_ibfk_2` FOREIGN KEY (`auction_id`) REFERENCES `auction` (`auction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auction_sales_order`
--
ALTER TABLE `auction_sales_order`
  ADD CONSTRAINT `a_sales_order_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auction_sales_order_details`
--
ALTER TABLE `auction_sales_order_details`
  ADD CONSTRAINT `auction_sales_order_details_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `auction_art` (`art_id`),
  ADD CONSTRAINT `auction_sales_order_details_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `auction_sales_order` (`sale_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `cart_content`
--
ALTER TABLE `cart_content`
  ADD CONSTRAINT `cart_content_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_content_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `art` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `live_auction`
--
ALTER TABLE `live_auction`
  ADD CONSTRAINT `live_auction_ibfk_2` FOREIGN KEY (`art_id`) REFERENCES `auction_art` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `live_auction_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `sales_order_detail`
--
ALTER TABLE `sales_order_detail`
  ADD CONSTRAINT `sales_order_detail_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `art` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_order_detail_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sales_order` (`sale_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

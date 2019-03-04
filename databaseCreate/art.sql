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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`art_id`, `username`, `art_title`, `art_medium`, `art_width`, `art_height`, `art_loc`, `art_about`, `art_price`, `art_genre`, `art_posted`, `art_created_date`, `art_status`) VALUES
(2, 'smp1613s', 'imageofsmile', 'oil', 5000, 5000, 'max-van-den-oetelaar-1150510-unsplash.jpg', 'good one day  1 sfdad jfasjkdsf\r\nsdf\r\nsfg dsajf jkdas jkadsf\r\nsfgs', 300000, 'oil', '2019-02-21 11:11:08', '2019-02-21', 'available'),
(3, 'smp1613s', 'image2', 'oil', 500, 500, 'anna-sullivan-518434-unsplash.jpg', 'good one', 110000, 'oil', '2019-02-21 11:11:08', '2019-02-20', 'available'),
(4, 'smp1613', 'image3', 'oil', 500, 500, 'clodagh-da-paixao-683851-unsplash.jpg', 'good one', 301000, 'oil', '2019-02-21 11:11:08', '2019-02-20', 'available'),
(5, 'smp1613s', 'image3', 'oil', 500, 500, 'federica-campanaro-27450-unsplash.jpg', 'good one asfjdsfj asdjfklasdklf sadfjaksdfj asjdfkl;jasdklf asjdfkljksadf sdjfklasjdkf adsklfjkj', 130000, 'oil', '2019-02-21 11:11:08', '2019-02-20', 'available'),
(6, 'smp1613s', 'image3', 'oil', 500, 500, 'steve-johnson-1266861-unsplash.jpg', 'good one asdfjkkdfskjskf sdfjklsdf dsfk asdfkj dsfkla sdjfl;jasf kjsadlf', 3110000, 'oil', '2019-02-21 11:11:08', '2019-02-20', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `user_art_fk` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `art`
--
ALTER TABLE `art`
  ADD CONSTRAINT `user_art_fk` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 03:25 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alessandrodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Downhill', 'downhill'),
(2, 'Enduro', 'enduro');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
`id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(1, 1, 'Bergamont Trailster', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'bergamont-trailster', 1599, 'bergamonttrailster.jpg', '2018-07-09', 2),
(2, 1, 'Canyon Strive CF5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'canyon-strive-cf5', 2099, 'gambler710.jpg', '2018-05-10', 3),
(3, 1, 'Canyon Strive CF8', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'cayon-strive0cf8', 2599, 'giantreign.jpg', '2018-05-12', 1),
(4, 1, 'Craftwork ENR', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'craftwork-enr', 2999, 'giantreignadvanced1.jpg', '2018-05-10', 3),
(5, 1, 'Gambler 710', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'gambler-710', 3599, 'scottcontessa.jpg', '2018-07-09', 3),
(6, 1, 'GASGAS Enduro', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'gasgas-enduro', 3999, 'scotteride.jpg', '0000-00-00', 0),
(7, 2, 'Giant Glory 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'giant-glory-1', 4499, 'scottgenius.jpg', '0000-00-00', 0),
(8, 1, 'Giant Glory 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'giant-glory-2', 5199, 'scottransom900j.jpg', '0000-00-00', 0),
(9, 2, 'Giant Reign', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'giant-reign', 4599, 'specializedenduroelite.jpg', '0000-00-00', 0),
(10, 2, 'GT Force Elite', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'gt-force-elite', 4099, 'specializedswork.jpg', '2018-05-10', 1),
(11, 2, 'GT Fury 29', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'gt-fury', 3499, 'triaero.jpg', '2018-05-12', 1),
(12, 2, 'Haibike X Enduro', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'haibike-x-duro', 3000, 'triareo.jpg', '2018-05-12', 3),
(13, 2, 'Norco Aurum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'norco-aurum', 2499, 'bergamonttrailster.jpg', '2018-05-12', 1),
(14, 2, 'Norco Stryk', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'norco-stryk', 2199, 'gambler710.jpg', '2018-05-10', 13),
(15, 2, 'Orange 324', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'orange-324', 1799, 'giantreign.jpg', '2018-07-09', 1),
(16, 2, 'Pivot Match 5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'pivot-mach5', 1499, 'giantreignadvanced1.jpg', '2018-05-10', 2),
(17, 1, 'Pole Evolink', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'pole-evolink', 2999, 'scottcontessa.jpg', '2018-05-12', 1),
(18, 1, 'Polygon Siskiu', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'polygon-siskiu', 3499, 'scotteride.jpg', '2018-05-12', 2),
(19, 1, 'Polygon XQuarone', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'polygon-xquarone', 4000, 'scottgenius.jpg', '2018-05-10', 1),
(20, 1, 'Santa Cruz V10', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'santa-cruz-v10', 4599, 'specializedenduroelite.jpg', '2018-05-12', 1),
(27, 1, 'Saracen Myst', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'saracen-myst', 5000, 'specializedswork.jpg', '2018-07-09', 9),
(28, 2, 'Scott Contessa', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus</p>\r\n', 'scott-contessa', 5129, 'triaero.jpg', '0000-00-00', 0),
(29, 2, 'Scott Genius', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum eros vel fringilla maximus.</p>\r\n', 'scott-genius', 5020, 'triareo.jpg', '2018-07-09', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(9, 9, 'PAY-1RT494832H294925RLLZ7TZA', '2018-05-10'),
(10, 9, 'PAY-21700797GV667562HLLZ7ZVY', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'Chiodino', 'Chiodini', '', '', 'admin.png', 1, '', '', '2018-05-01'),
(9, 'lui@egli.com', '$2y$10$NCLGfeg/BUMJyEm2sCqEhe.D2hApmNrX2fufvigzpMdujFSTcpDWi', 0, 'Lui', 'Egli', 'Altavista Val Verde', '0515552525', 'lui.png', 1, 'k8FBpynQfqsv', 'wzPGkX5IODlTYHg', '2018-05-09'),
(12, 'lei@ella.com', '$2y$10$Jak8OssreR9yIQL2YR/kjufhGyswq5iWmCHb1E5Y6/qunsRAq3vkW', 0, 'Lei', 'Ella', 'Esperanza Val Verde', '05152978484', 'lei.jpg', 1, '', '', '2018-07-09');

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
`id` int(11) NOT NULL,
  `url` varchar(80) NOT NULL,
  `title` varchar(20) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `url`, `title`, `upload_date`) VALUES
(1, 'https://www.youtube.com/embed/ZCVqzLwJ0zY', 'Track Tricks', '2020-10-10'),
(2, 'https://www.youtube.com/embed/-QNmxV0FD1M', 'Dirt Shed', '2020-10-08'),
(3, 'https://www.youtube.com/embed/k95DMGuBatk', 'Avoid This', '2020-08-08');

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

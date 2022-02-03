-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 06:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `date`) VALUES
(6, 'admin', 'cc03e747a6afbbcbf8be7668acfebee5', 'admin@gmail.com', '2021-01-27 06:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(222) NOT NULL,
  `codes` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` longtext NOT NULL,
  `visit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL,
  `c_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `in_today_menu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`, `c_id`, `date`, `status`, `in_today_menu`) VALUES
(23, 0, 'Samosa', 'Best in Collage', '25.00', '6013e49c03dc8.jpg', 27, '2021-02-08 10:45:20', 1, 0),
(24, 0, 'Vada Pav', 'Must try it', '20.00', '6013e5334a696.jpg', 27, '2021-02-08 11:14:56', 1, 0),
(25, 0, 'Chocolate thik sake', 'Icey', '85.00', '6017e3ca28bc6.jpg', 32, '2021-02-08 11:14:45', 1, 0),
(26, 0, 'Mixed Fruits', 'fresh fruits', '60.00', '6017e40d0848a.jpg', 32, '2021-02-08 10:59:40', 1, 0),
(27, 0, 'Chicken Burger', 'crispy chicken Tikki with Cheese', '105.00', '6018d745b8dc8.jpg', 28, '2021-02-08 10:59:49', 1, 0),
(28, 0, 'ItalianPizza', 'All ingredient toppins inside', '115.00', '601801bef37e7.jpg', 28, '2021-02-08 11:30:45', 1, 0),
(29, 0, 'South Indian Thali', '2 Dhosa ,2 Chutney,Coldrinks', '150.00', '60180195314dd.jpg', 34, '2021-02-10 07:48:40', 1, 0),
(30, 0, 'Veg Dry Manchurian', 'Very Smooth And Pure Veg', '75.00', '6017e6cf5eeb4.png', 29, '2021-02-08 10:52:45', 1, 0),
(31, 0, 'Noodles', 'Chicken,veg,Cabbage etc...', '85.00', '601a77fd86313.png', 29, '2021-02-08 10:48:55', 1, 0),
(32, 0, 'Healthy Salad', 'Boiled egg,Cocumber.......', '55.00', '601a580b17b6c.jpg', 31, '2021-02-08 10:44:45', 1, 0),
(34, 0, 'Green Salad', 'Fresh veges and leaves salads', '50.00', '602115443e4bf.jpg', 31, '2021-02-08 10:41:08', 1, 0),
(35, 0, 'Idli', 'best idli and sabhar and chutney', '70.00', '6020d893ae48a.jpg', 30, '2021-02-10 07:44:41', 1, 0),
(36, 0, 'Masala Dhosa ', 'Pure south Indian taste is here', '80.00', '6021137791482.jpg', 35, '2021-02-10 07:48:13', 1, 0),
(37, 0, 'Paneer Tikka', 'Fresh Amul Paneer Tikka', '85.00', '60211b80ecc15.jpg', 27, '2021-02-09 08:04:12', 1, 0),
(38, 0, 'Punjabi Thali', '3 Paratha,Paneer,Gulab Jamun...', '90.00', '602390cdb70af.png', 34, '2021-02-10 07:53:03', 1, 0),
(39, 0, 'Gujrati Thali', '2 sabji,Sweets,Raita,4 Roti,butter milk', '80.00', '60239133a0436.jpg', 34, '2021-02-10 07:54:27', 1, 0),
(40, 0, 'Tea', 'Mine Fresh tea With Gingers', '20.00', '602394ecb4c11.jpg', 30, '2021-02-10 08:10:20', 1, 0),
(41, 0, 'Coffee', 'Refresh your mine with our Coffee', '25.00', '602395206c76c.jpg', 30, '2021-02-10 08:11:12', 1, 0),
(42, 0, 'Aloo Paratha', 'Made with fresh potatos And Masala', '20.00', '602395ad6197b.jpg', 30, '2021-02-10 08:13:33', 1, 0),
(43, 0, 'Sandwich', 'Grill ,Tometo,Cabbage,Onion...', '50.00', '602396323e16e.jpg', 30, '2021-02-10 08:37:45', 0, 0),
(44, 0, 'Chicken Tikka', 'Best delicious Chicken Tikka ', '85.00', '602baec5d50dc.jpg', 27, '2021-02-22 08:24:52', 1, 1),
(45, 0, 'Chicken Lilipop', 'Fresh ,Crunchy & Spicy tikka', '90.00', '602bafb07b130.jpg', 27, '2021-02-17 07:08:19', 1, 1),
(46, 0, 'Kachori', 'Made with best Mung daal ', '40.00', '602bb089b4f97.jpg', 27, '2021-02-27 07:21:29', 1, 1),
(47, 0, 'French Fries', 'Fresh & Crunchy Fries & Source', '65.00', '602bb2321b25f.jpg', 28, '2021-02-22 08:24:33', 1, 0),
(48, 0, 'Hot Dog', 'Hot And Spicy with full toppins', '60.00', '602bb303cf3ae.jpg', 28, '2021-02-17 07:07:51', 1, 1),
(49, 0, 'Wrap', 'Mixed with Chicken & Vegetables', '60.00', '602bb3e182eb9.jpg', 28, '2021-02-22 08:24:20', 1, 1),
(52, 0, 'Merinda', 'Pagalpanti Bhi Zaruri Hai....', '40.00', '602bb5ef75954.jpg', 32, '2021-02-16 12:09:19', 1, 0),
(53, 0, 'Chinese Rice', 'Made with best masala and fresh ingredients', '70.00', '602bb721e4e7b.jpg', 29, '2021-02-22 08:23:58', 1, 0),
(56, 0, 'Chinese Bhel', 'It has a unique and appetizing Tate', '80.00', '602bb80283d51.jpg', 29, '2021-02-17 06:54:31', 1, 1),
(57, 0, 'Pepsi', 'Tatse the thunder.....', '40.00', '60336bd879e6f.jpg', 32, '2021-02-27 07:22:38', 0, 0),
(58, 0, 'Coke', 'Taste the Feeling.....', '40.00', '60336c13030b5.jpg', 32, '2021-08-30 07:40:46', 1, 0),
(61, 0, 'chocolate ice cream', 'ice cream', '20.00', '612c8bc7440da.jpg', 38, '2021-08-30 07:41:59', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(114, 215, 'prepared', 'in processing', '2021-08-30 07:42:40'),
(115, 215, 'closed', 'done', '2021-08-30 07:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(49, 5, 'The Great Kabab Factory', 'kwbab@gmail.com', '011 2677 9070', 'kwbab.com', '6am', '5pm', 'mon-fri', 'Radisson Blu Plaza Hotel, Delhi Airport, NH-8, New Delhi, 110037', '5ad74de005016.jpg', '2018-04-18 13:53:36'),
(50, 6, 'Aarkay Vaishno Dhaba', 'Vaishno@gmail.com', '090410 35147', 'Vaishno.com', '6am', '6pm', 'mon-sat', 'Bhargav Nagar, Jalandhar - Nakodar Rd, Jalandhar, Punjab 144003', '5ad74e5310ae4.jpg', '2018-04-18 13:55:31'),
(51, 7, 'Martini', 'martin@gmail.com', '3454345654', 'martin.com', '8am', '4pm', 'mon-thu', '399 L Near Apple Showroom, Model Town,', '5ad74ebf1d103.jpg', '2018-04-18 13:57:19'),
(52, 8, 'hudson', 'hud@gmail.com', '2345434567', 'hudson.com', '6am', '7pm', 'mon-fri', 'Opposite Lovely Sweets, Nakodar Road, Jalandhar, Punjab 144001', '5ad756f1429e3.jpg', '2018-04-18 14:32:17'),
(53, 9, 'kriyana store', 'kari@gmail.com', '4512545784', 'kari.com', '7am', '7pm', 'mon-sat', 'near kalu gali hotel india what everrrr.', '5ad79e7d01c5a.jpg', '2018-04-18 19:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `image`, `date`) VALUES
(27, 'Starter', '6013e2231458a.jpg', '2021-01-29 10:23:31'),
(28, 'Fast Food', '6013e2622574b.jpg', '2021-01-29 10:24:34'),
(29, 'Chinese Food', '6013e2b1436b6.jpg', '2021-01-29 10:25:53'),
(30, 'Breackfast', '6013e3347804d.jpg', '2021-01-29 10:28:04'),
(31, 'Salad', '6013e3ca885c1.jpg', '2021-01-29 10:30:34'),
(32, 'beverage', '6013e4337fba4.jpg', '2021-02-10 07:40:08'),
(34, 'Thali', '60238e85b8fea.jpg', '2021-02-10 07:43:01'),
(35, 'Main course', '60238faaee3d5.jpg', '2021-02-10 07:47:54'),
(38, 'Ice Creams', '612c8b6d68750.jpg', '2021-08-30 07:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `st_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `role` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`st_id`, `username`, `role`, `password`, `date`) VALUES
(7, 'Mr Patel', 'Cook', 'cc03e747a6afbbcbf8be7668acfebee5', '2021-12-27 17:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_picktime`
--

CREATE TABLE `tbl_picktime` (
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `o_id` int(11) NOT NULL,
  `pick_time` varchar(250) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `roll_no` varchar(222) NOT NULL,
  `student_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `roll_no`, `student_name`, `email`, `phone`, `password`, `status`, `date`) VALUES
(40, '12345678', 'Test', 'Test@gmail.com', '2563147895', 'cc03e747a6afbbcbf8be7668acfebee5', 1, '2021-08-30 06:22:05'),
(41, '123456789', 'Test Student', 'test2@gmail.com', '1234567894', 'cc03e747a6afbbcbf8be7668acfebee5', 1, '2021-08-30 06:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `pick_time` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `pick_time`, `date`) VALUES
(212, 41, 'Idli', 1, '70.00', NULL, '13:30', '2021-08-30 07:00:04'),
(213, 41, 'Tea', 1, '20.00', 'rejected', '13:30', '2021-08-30 07:00:19'),
(214, 41, 'Samosa', 1, '25.00', NULL, '13:05', '2021-08-30 07:06:19'),
(215, 41, 'Vada Pav', 1, '20.00', 'closed', '13:05', '2021-08-30 07:55:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `admin_codes`
--
ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_picktime`
--
ALTER TABLE `tbl_picktime`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_codes`
--
ALTER TABLE `admin_codes`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_picktime`
--
ALTER TABLE `tbl_picktime`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

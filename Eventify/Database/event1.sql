-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 06:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_fullname` varchar(255) DEFAULT NULL,
  `a_email` varchar(220) DEFAULT NULL,
  `user_name` varchar(210) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `updation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_fullname`, `a_email`, `user_name`, `password`, `updation_date`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', '2023-07-16 20:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `booking_id` bigint(12) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `no_member` int(11) DEFAULT NULL,
  `user_remarks` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `admin_remarks` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_cancel_remarks` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `booking_status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_updation_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `booking_id`, `user_id`, `event_id`, `no_member`, `user_remarks`, `admin_remarks`, `user_cancel_remarks`, `booking_date`, `booking_status`, `last_updation_date`) VALUES
(2, 355945027, 9, 6, 20, 'Reddds', NULL, NULL, '2023-09-04 23:34:38', NULL, NULL),
(3, 702378547, 11, 5, 20, 'Make ', NULL, NULL, '2023-09-05 01:52:13', 'Confirmed', '2023-09-05 01:53:40'),
(4, 238517995, 12, 4, 10, 'A', NULL, 'Maza', '2023-09-05 01:56:05', 'Cancelled', '2023-09-05 01:56:22'),
(5, 911730534, 13, 6, 20, 'dds', NULL, NULL, '2023-09-05 07:24:32', NULL, NULL),
(6, 679593315, 11, 1, 10, 'hj', NULL, 'na', '2023-09-05 07:58:33', 'Cancelled', '2023-09-08 19:47:20'),
(7, 687065805, 11, 3, 2, 'gjh', NULL, NULL, '2023-09-05 08:26:46', NULL, NULL),
(9, 691296868, 11, 6, 20, 'hell', NULL, NULL, '2023-09-08 15:03:04', 'Confirmed', NULL),
(10, 633280706, 9, 6, 2, 'Red', NULL, NULL, '2023-09-14 01:36:20', 'Confirmed', NULL),
(11, 444433436, 11, 3, 1, 'Red', NULL, NULL, '2023-09-15 03:18:43', 'Confirmed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cat_discription` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cat_creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `cat_updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_discription`, `cat_creationdate`, `cat_updationdate`, `Is_Active`) VALUES
(3, 'Sports', 'Sports', '2023-08-28 19:49:47', NULL, '1'),
(4, 'Festival', 'Festival', '2023-09-06 22:38:42', NULL, '1'),
(5, 'Exhibition', 'Exhibition', '2023-08-28 19:50:32', NULL, '1'),
(6, 'Cooperate', 'Cooperate', '2023-08-28 19:50:56', NULL, '1'),
(7, 'Seminars', 'Seminars', '2023-08-28 19:52:08', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `cat_id` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sponser_id` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `event_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `event_discription` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  `event_location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `event_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `price` varchar(225) NOT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp(),
  `last_updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `cat_id`, `sponser_id`, `event_name`, `event_discription`, `event_start_date`, `event_end_date`, `event_location`, `event_image`, `price`, `posting_date`, `last_updationdate`, `is_active`) VALUES
(1, '3', '2', 'Cricket World Cup', 'Ind Vs Pak', '2023-10-14', '2023-10-14', 'Ahemedabad ,India', '203263986d825caa910ecd6c029704c4.jpg', '4000', '2023-08-28 20:19:18', '2023-09-14 00:55:34', 1),
(2, '3', '4', 'Asia Cup', 'Pak Vs Ind', '2023-09-02', '2023-09-02', 'Kandy ,Srilanka', '97c6021d05ef4a6a42475323c0cf7f48.png', '2000', '2023-08-28 21:08:48', '2023-09-14 00:55:40', 1),
(3, '4', '1', 'Karachi Eat', 'Food Festival', '2023-11-10', '2023-11-10', 'Portgrand ,Karachi', '415d7e229eba6cc358984025b30a70bc.png', '3000', '2023-08-28 21:14:10', '2023-09-14 00:55:51', 1),
(4, '4', '3', 'Concert', 'Atif Aslam', '2023-10-06', '2023-10-07', 'Seaview , Karachi', '553645ecf95aaba77a77b17d4d3ded56.jpg', '1500', '2023-08-28 21:17:21', '2023-09-08 14:13:23', 1),
(5, '5', '4', 'Art Exhibition', 'Sadequain', '2023-11-15', '2023-11-15', 'Pearl Continental ,Karachi', '0abc5ba401226d9c27cbda8b272649eb.jpg', '1000', '2023-08-28 21:22:57', '2023-09-14 00:55:56', 1),
(6, '6', '3', 'Online Business Conference', 'Sharing tips and trick about Business', '2023-12-15', '2023-12-15', 'Online', '0bb97e98726167c39ce02299df6c7cdb.jpg', '800', '2023-08-28 21:26:24', '2023-09-08 14:13:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gernalsetting`
--

CREATE TABLE `tbl_gernalsetting` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `phone_no` bigint(12) DEFAULT NULL,
  `email_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `footer_content` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gernalsetting`
--

INSERT INTO `tbl_gernalsetting` (`id`, `site_name`, `phone_no`, `email_id`, `address`, `footer_content`, `last_updationdate`) VALUES
(1, 'event', 3080408601, 'event@gmail.com', 'North Nazimabad ', 'Event Management System', '2023-07-18 07:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_msg`
--

CREATE TABLE `tbl_msg` (
  `m_id` int(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_email` varchar(255) NOT NULL,
  `m_number` varchar(255) NOT NULL,
  `m_msg` varchar(255) NOT NULL,
  `m_postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_msg`
--

INSERT INTO `tbl_msg` (`m_id`, `m_name`, `m_email`, `m_number`, `m_msg`, `m_postingdate`) VALUES
(1, 'Faaiz', 'faaiz@gmail.com', '03080409703', 'Hello There', '2023-08-29 20:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `n_id` int(11) NOT NULL,
  `news_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `news_details` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `news_img` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`n_id`, `news_title`, `news_details`, `news_img`, `posting_date`, `last_updationdate`) VALUES
(1, 'Cricket Asia Cup (Ind Vs Pak)', 'The Cricket Asia Cup is a major cricketing event featuring teams from across Asia. One of the most anticipated and exciting matches in the Asia Cup is when India (Ind) faces off against Pakistan (Pak). These matches are known for their intense rivalry and draw large audiences from both countries and around the world.The India vs. Pakistan match in the Asia Cup is not only a cricketing contest but also a significant cultural and emotional event for fans on both sides. It often transcends the boundaries of sports and becomes a source of national pride and excitement.', '355f04755324b4df2f282bce26c9a409.jpg', '2023-08-31 06:25:14', NULL),
(2, 'Entrepreneurship Conference', 'An entrepreneurship conference is a gathering of entrepreneurs, aspiring business owners, investors, industry experts, and other stakeholders interested in the field of entrepreneurship. These conferences provide a platform for networking, learning, idea exchange, and inspiration for individuals involved in entrepreneurship or considering starting their own businesses.These conferences play a vital role in fostering innovation, connecting entrepreneurs with resources and support, and contributing to the growth of the entrepreneurial ecosystem.', 'e7d9cce01ce878e8b694a8335ed30644.jpg', '2023-08-30 06:26:17', '2023-08-31 07:41:48'),
(3, 'Cricket World Cup (Ind Vs Pak)', ' The India vs. Pakistan cricket match in the Cricket World Cup is one of the most highly anticipated and widely watched sporting events in the world. This intense cricket rivalry has deep historical and cultural significance for both nations, and matches between India and Pakistan are among the most thrilling and emotionally charged contests in cricket.Overall, India vs. Pakistan matches in the Cricket World Cup are not just sporting events; they are cultural phenomena that capture the imaginations of millions and create lasting memories in the world of cricket.', '3288994281527ffb45baf9903c6f4d37.jpg', '2023-08-29 06:28:04', '2023-08-31 07:41:55'),
(5, 'Karachi Eat Festival', 'Karachi Eat\" is a popular food festival held annually in Karachi, Pakistan. It is a highly anticipated event for food enthusiasts and features a wide range of local and international cuisines, street food vendors, food stalls, and culinary experiences. Karachi Eat provides a platform for both established and emerging chefs and food businesses to showcase their dishes and gain exposure.Visitors to Karachi Eat can enjoy a diverse array of food options, including traditional Pakistani dishes, international cuisines, desserts, and beverages. The festival often includes live music, entertainment, and a vibrant atmosphere that adds to the overall experience.', '2b20adce030c362e0f756d62d4af583d.jpg', '2023-09-05 00:25:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `p_id` int(11) NOT NULL,
  `page_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `page_details` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_company` varchar(255) NOT NULL,
  `r_email` varchar(255) NOT NULL,
  `r_number` varchar(255) NOT NULL,
  `r_postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`r_id`, `r_name`, `r_company`, `r_email`, `r_number`, `r_postingdate`) VALUES
(1, 'Danial Arif', 'H&M', 'daniyal.arif2004@gmail.com', '03080408601', '2023-08-29 16:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `ser_id` int(11) NOT NULL,
  `ser_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ser_price` varchar(200) DEFAULT NULL,
  `ser_posting_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ser_last_updationdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`ser_id`, `ser_name`, `ser_price`, `ser_posting_date`, `ser_last_updationdate`) VALUES
(1, 'Catering ', '200000', '2023-09-15 04:06:31', '2023-09-15 04:06:31'),
(2, 'Photography', '85000', '2023-09-15 04:06:58', '2023-09-15 04:06:58'),
(3, 'Decoration', '100000', '2023-09-15 04:07:24', '2023-09-15 04:07:24'),
(4, 'DJ', '45000', '2023-09-15 04:07:46', '2023-09-15 04:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sponser`
--

CREATE TABLE `tbl_sponser` (
  `s_id` int(11) NOT NULL,
  `sponsers_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sponsers_logo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updationdate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sponser`
--

INSERT INTO `tbl_sponser` (`s_id`, `sponsers_name`, `sponsers_logo`, `posting_date`, `last_updationdate`) VALUES
(1, 'Pepsi', 'a4e8fea3541916077021c3dcbd401483.jpg', '2023-08-28 16:38:17', '2023-08-28 16:38:17'),
(2, 'Red Bull', 'af114988d046687297106fd0a793ce62.jpg', '2023-08-28 16:38:38', '2023-08-28 16:38:38'),
(3, 'Nike', 'eccff1d034bfb8934714406cb6a42514.jpg', '2023-08-28 16:38:49', '2023-08-30 21:20:26'),
(4, 'Samsung', 'bafb018edc8829720cd70dd10c5c672e.jpg', '2023-08-28 16:39:01', '2023-08-28 16:39:01'),
(5, 'Telenor', 'bc8d21b1942819dcc6e004ca067c48cd.jpg', '2023-08-30 21:21:27', '2023-08-30 21:21:27'),
(6, 'Ali Baba', 'b2e1b9d002307a509bc5216aa4c69686.jpg', '2023-08-30 21:22:31', '2023-08-30 21:22:31'),
(7, 'Adidas', 'aafe917744e034fc2ab70bdf41d8471f.jpg', '2023-08-30 21:23:25', '2023-08-30 21:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `sub_id` int(11) NOT NULL,
  `user_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`sub_id`, `user_email`, `reg_date`) VALUES
(1, 'taha@gmail.com', '2023-08-29 19:34:12'),
(2, 'daniyal.arif2004@gmail.com', '2023-09-05 00:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_phoneno` bigint(12) DEFAULT NULL,
  `user_gender` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_updationdate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_active` int(1) DEFAULT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `full_name`, `user_name`, `user_email`, `user_phoneno`, `user_gender`, `user_password`, `user_reg_date`, `last_updationdate`, `is_active`, `code`) VALUES
(9, 'aiman', 'aiman', 'aiman.naseem144@gmail.com', 3080408601, 'Female', '202cb962ac59075b964b07152d234b70', '2023-09-03 19:55:42', NULL, 1, '9c7a33594ec2a378febac7f834c6ad7e'),
(11, 'Danial Arif', 'Daniyal', 'daniyal.arif2004@gmail.com', 3080408601, 'Male', '202cb962ac59075b964b07152d234b70', '2023-09-05 01:51:29', NULL, 1, 'de9b4ae7745969f42f697c5cc69ae8a3'),
(12, 'Darakshan', 'Darakshan21', 'darakhshanshah8@gmail.com', 3112640770, 'Female', '202cb962ac59075b964b07152d234b70', '2023-09-05 01:54:48', NULL, 1, '20921e384aee4d1a916abb6b685fe759'),
(13, 'Danial Arif', 'DANIYAL', 'yameend41@gmail.com', 3080408601, 'Male', '202cb962ac59075b964b07152d234b70', '2023-09-05 07:23:26', NULL, 1, 'ef7dd80e207bca5b455e314771108094'),
(14, 'amdullah', 'amdullah12', 'amdullah8bpyt@gmail.com', 3080408601, 'Male', '202cb962ac59075b964b07152d234b70', '2023-09-05 07:55:02', NULL, 1, 'dd67c6050cbe95592339e1ae14859015'),
(15, 'muhammmad', 'mah', 'muhammadwasif.aptech@gmail.com', 3448312985, 'Male', '202cb962ac59075b964b07152d234b70', '2023-09-05 08:25:12', NULL, 1, 'f97822bcbb33ac62caa142810414b2a6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usrcategory`
--

CREATE TABLE `tbl_usrcategory` (
  `uc_id` int(11) NOT NULL,
  `uc_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `uc_discription` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `uc_creationdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uc_updationdate` timestamp NULL DEFAULT NULL,
  `Is_Active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usrcategory`
--

INSERT INTO `tbl_usrcategory` (`uc_id`, `uc_name`, `uc_discription`, `uc_creationdate`, `uc_updationdate`, `Is_Active`) VALUES
(1, 'Wedding', 'Shaadi', '2023-09-15 04:10:31', NULL, '1'),
(2, 'Party', 'Takreeb', '2023-09-15 04:10:54', NULL, '1'),
(3, 'Concert', 'Gana Bajana', '2023-09-15 04:11:16', NULL, '1'),
(4, 'Cooperate', 'Tahwon', '2023-09-15 04:12:49', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usrevent`
--

CREATE TABLE `tbl_usrevent` (
  `uevent_id` int(11) NOT NULL,
  `uc_id` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ser_id` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `uevent_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `uevent_discription` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `uevent_date` date DEFAULT NULL,
  `uevent_location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `us_no_of_members` int(66) DEFAULT NULL,
  `uevent_posting_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `uevent_last_updationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usrevent`
--

INSERT INTO `tbl_usrevent` (`uevent_id`, `uc_id`, `ser_id`, `user_id`, `uevent_name`, `uevent_discription`, `uevent_date`, `uevent_location`, `us_no_of_members`, `uevent_posting_date`, `uevent_last_updationdate`, `is_active`) VALUES
(850304706, '4', '3', 11, NULL, 'Make It professional', '2023-09-22', 'Pearl Continental ', 200, NULL, '2023-09-15 04:31:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `tmp_id` int(11) NOT NULL,
  `booking_id` bigint(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `no_member` int(11) NOT NULL,
  `user_remarks` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_remarks` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_cancel_remarks` mediumtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_status` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart2`
--

CREATE TABLE `temp_cart2` (
  `uevent_id` int(11) NOT NULL,
  `uc_id` char(10) NOT NULL,
  `ser_id` char(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uevent_discription` mediumtext NOT NULL,
  `uevent_date` date NOT NULL,
  `uevent_location` varchar(255) NOT NULL,
  `us_no_of_members` int(66) NOT NULL,
  `uevent_posting_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gernalsetting`
--
ALTER TABLE `tbl_gernalsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_sponser`
--
ALTER TABLE `tbl_sponser`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_usrcategory`
--
ALTER TABLE `tbl_usrcategory`
  ADD PRIMARY KEY (`uc_id`);

--
-- Indexes for table `tbl_usrevent`
--
ALTER TABLE `tbl_usrevent`
  ADD PRIMARY KEY (`uevent_id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`tmp_id`);

--
-- Indexes for table `temp_cart2`
--
ALTER TABLE `temp_cart2`
  ADD PRIMARY KEY (`uevent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_gernalsetting`
--
ALTER TABLE `tbl_gernalsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_msg`
--
ALTER TABLE `tbl_msg`
  MODIFY `m_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sponser`
--
ALTER TABLE `tbl_sponser`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_usrcategory`
--
ALTER TABLE `tbl_usrcategory`
  MODIFY `uc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_usrevent`
--
ALTER TABLE `tbl_usrevent`
  MODIFY `uevent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=850304707;

--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `tmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `temp_cart2`
--
ALTER TABLE `temp_cart2`
  MODIFY `uevent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=964802478;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

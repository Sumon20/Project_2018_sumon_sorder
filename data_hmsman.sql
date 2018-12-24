-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2018 at 08:16 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_hmsman`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `appointment_id` varchar(20) DEFAULT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `problem` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `appointment_id`, `patient_id`, `department_id`, `doctor_id`, `schedule_id`, `serial_no`, `date`, `problem`, `created_by`, `create_date`, `status`, `email`, `mobile`) VALUES
(46, 'AP51C49Z', 'P7OGZGC3', 10, 17, 17, 12, '2018-10-25', 'dyqwdy', 0, '2018-10-25', 1, 'shahidul7889@gmail.com', '01672364847'),
(47, 'A6OGZGC3', 'P7OGZGC3', 10, 17, 17, 2, '2018-11-29', 'eye sight', 0, '2018-10-26', 1, 'shahidul7889@gmail.com', '0167236487'),
(48, 'ASUU178P', 'P7OGZGC3', 11, 8, 5, 3, '2018-11-26', 'pain in back', 0, '2018-10-30', 1, 'shahiduli935@gmail.com', '01672364847'),
(49, 'AYJD6C9B', 'P7OGZGC3', 8, 1, 6, 3, '2018-11-27', 'test', 0, '2018-10-30', 1, 'shahiduli935@gmail.com', '+8801672364847'),
(50, 'AIJ60EBO', 'P7OGZGC3', 10, 7, 10, 3, '2018-11-29', 'test', 0, '2018-10-30', 1, 'shahiduli935@gmail.com', '+8801672364847'),
(51, 'AEP3D6EK', 'PZ329IB8', 10, 17, 17, 15, '2018-11-08', '', 0, '2018-10-30', 1, 'sumonsorderkucse20@gmail.com', '+8801689481907'),
(52, 'ALJKNO3B', 'PZ329IB8', 11, 8, 5, 1, '2018-11-19', 'pain in mouth', 0, '2018-10-30', 1, 'sumonsorderkucse20@gmail.com', '+8801689481907'),
(53, 'AF1R8I8T', 'P7OGZGC3', 8, 1, 6, 6, '2018-12-25', 'leg pain', 0, '2018-12-17', 1, 'shahidul7889@gmail.com', '01672364847'),
(54, 'AZXZ5I56', 'P7OGZGC3', 10, 17, 17, 12, '2018-12-27', 'leg pain', 0, '2018-12-17', 1, 'shahidul7889@gmail.com', '01672364847'),
(55, 'A4L2FBAK', 'P7OGZGC3', 8, 1, 6, 5, '2018-12-18', 'leg pain', 0, '2018-12-17', 1, 'shahidul7889@gmail.com', '01672364847'),
(56, 'AE0PBSFH', 'P7OGZGC3', 10, 7, 9, 6, '2018-12-23', 'leg problem', 0, '2018-12-17', 1, 'shahidul7889@gmail.com', '01672364847'),
(57, 'AI134B0Z', 'P7OGZGC3', 10, 7, 10, 11, '2018-12-27', 'pain in leg', 0, '2018-12-18', 1, 'somonsorderkucse20@gmail.com', '01521455686'),
(58, 'A9T1K0Y0', 'PZKY02DQ', 10, 17, 6, 3, '2018-12-25', 'test', 0, '2018-12-18', 1, 'sumonsorderkucse20@gmail.com', '01689481907');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dprt_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dprt_id`, `name`, `description`, `status`) VALUES
(8, 'General Surgery', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on', 1),
(9, 'Chaplaincy', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on', 1),
(10, 'Cardiologist', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on', 1),
(11, 'Ophthalmaologist', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on', 1),
(12, 'physician', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dir_articles`
--

CREATE TABLE `dir_articles` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `article_name` varchar(250) NOT NULL,
  `article_details` text NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_articles`
--

INSERT INTO `dir_articles` (`article_id`, `user_id`, `listing_id`, `article_name`, `article_details`, `image_path`, `total_views`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(5, 2, 8, 'WELCOME TO LEMIGO HOTEL', 'Set in an urban oasis within the city center/business district. This contemporary 4 * hotel is only 5km from the airport and provides your home away from home whilst in Kigali with free WiFi and complimentary airport shuttle. The Kigali Financial Centre, Rwanda Development Board (RDB), Parliament, International Conference center and the ministries are all close by. Whether you stay in one of our bright and airy classic rooms or one of our stunning suites you’ll enjoy the friendly Rwandan welcome in a safe and relaxing environment with an efficient service and modern technology to ensure you enjoy your stay. When there is time to relax guests can enjoy the Gym and large outdoor pool and in the rooms there are; tea/coffee facilities, cable TV on a 46” screen, laptop sized safe plus iron & ironing board. For a little extra, guests can choose the Executive Club Floor with private check-in/out, boardroom, and exclusive lounge with the balcony looking over the city serving complimentary evening canapés with selected wines and champagne in an exclusive “home away from home” atmosphere. The Lobby Lounge is the place to meet and talk business over coffee and Lemigo Restaurant offers International and Rwandan dishes after a drink in the sophisticated atmosphere of the one2one Bar. The conference center on the ground floor features the 736 sqm ballroom with 5 adjacent breakout rooms, business center and large pre-function ideal for conferences, cocktail parties and social events. Our dedicated conference team are on hand at every stage to ensure your events success', 'd18ac86387fcad84694e7dc4a09d401d.jpg', 46, 1, 1, '2017-07-29 15:48:17', '2017-09-24 18:49:33'),
(6, 2, 1, 'How to make a pizza:', 'How to make a pizza:\r\nStep 1: Place a pizza stone or an inverted baking sheet on the lowest oven rack and preheat to 500 degrees.\r\nStep 2: Stretch 1 pound dough on a floured pizza peel, large wooden cutting board or parchment paper.\r\nStep 3: Top as desired, then slide the pizza (with the parchment paper, if using) onto the stone or baking sheet. Bake until golden, about 15 minutes.\r\n\r\nPizza Dough\r\nWhisk 3 3/4 cups flour and 1 1/2 teaspoons salt. Make a well and add 1 1/3 cups warm water, 1 tablespoon sugar and 1 packet yeast. When foamy, mix in 3 tablespoons olive oil; knead until smooth, 5 minutes. Brush with olive oil, cover in a bowl and let rise until doubled, about 1 hour 30 minutes. Divide into two 1-pound balls. Use 1 pound per recipe unless noted.\r\n\r\nShort on time? Buy dough from a pizzeria.\r\n\r\n1. Margherita Stretch dough into two thin 9-inch rounds. Top each with 1/2 cup crushed San Marzano tomatoes, dried oregano, salt, pepper and olive oil; bake until golden. Sprinkle with1/2 pound diced mozzarella, torn basil and salt. Bake until the cheese melts, then drizzle with olive oil.\r\n\r\n2. Tomato Pie Make Margherita Pizzas (No. 1) without mozzarella or basil. Use extra oregano.\r\n\r\nKO_FN_01StaggionePizza1_017.tif\r\nKana Okada\r\n#3. Quattro Stagioli Pizza\r\n3. Quattro Stagioni Make Margherita Pizzas (No. 1); before adding cheese, top with olives, artichoke hearts, ham and sauteed mushrooms in 4 sections.\r\n\r\n4. Puttanesca Make Margherita Pizzas (No. 1); chop 1 garlic clove, 6 anchovies, 1 tablespoon capers,1/4 cup olives and some parsley and scatter over the tomatoes before baking.\r\n\r\n5. Roasted Pepper Make Margherita Pizzas (No. 1); add roasted pepper strips and red pepper flakes with the cheese.\r\n\r\n6. New York-Style Press dough into an oiled 15-inch pizza pan. Drizzle with olive oil, then top with 1/2 cup tomato sauce and 2 cups shredded mozzarella. Bake, then garnish with pecorino, dried oregano and olive oil.\r\n\r\n7. Pepperoni-Mushroom Make New York-Style Pizza (No. 6); top with sauteed mushrooms and sliced pepperoni before baking.\r\n\r\n8. Sausage-Broccoli Rabe Make New York-Style Pizza (No. 6) with only 1 1/2 cups mozzarella. Add 2 crumbled raw sausages. Bake until just crisp, then top with 4 ounces bocconcini, sauteed broccoli rabe and jarred cherry peppers. Bake until the cheese melts.\r\n\r\n9. Stuffed Crust Make New York-Style Pizza (No. 6), but before topping, place 8 string-cheese sticks along the edge and fold the dough over. Brush the stuffed crust with olive oil and sprinkle with dried oregano.', '2576d3774463dc52b82f03fbbd800d52.jpeg', 1, 1, 1, '2017-09-25 19:25:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_article_comments`
--

CREATE TABLE `dir_article_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_article_hearts`
--

CREATE TABLE `dir_article_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_bookmarks`
--

CREATE TABLE `dir_bookmarks` (
  `bookmark_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_categories`
--

CREATE TABLE `dir_categories` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `icon_name` varchar(50) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_categories`
--

INSERT INTO `dir_categories` (`category_id`, `user_id`, `category_name`, `description`, `color_name`, `icon_name`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(3, 1, 'Hospital', 'Details about hospital...', 'bgpurpal-1', 'hospital-o', 1, 0, '2017-04-25 22:50:42', '2017-09-24 17:25:35'),
(14, 1, 'Ambulance', 'Ambulance', 'bgblue-1', 'hospital-o', 1, 0, '2018-12-04 09:19:46', NULL),
(15, 1, 'Doctor', 'Doctor', 'bgbrown-1', 'hospital-o', 1, 0, '2018-12-04 09:20:05', NULL),
(16, 1, 'Medicine', 'Medicine', 'bgpurpal-1', 'hospital-o', 1, 0, '2018-12-04 09:20:27', NULL),
(17, 1, 'Blood', 'Blood', 'bgred-1', 'hospital-o', 1, 0, '2018-12-04 09:21:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_cities`
--

CREATE TABLE `dir_cities` (
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_cities`
--

INSERT INTO `dir_cities` (`city_id`, `user_id`, `country_id`, `city_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 1, 'Dhaka', 'Details.............', 1, 0, '2017-04-26 01:18:08', '2017-08-11 18:33:45'),
(2, 1, 1, 'Rangpur', 'Details............', 1, 0, '2017-04-27 01:05:23', '2017-04-27 01:06:33'),
(3, 1, 1, 'Khulna', 'Details............', 1, 0, '2017-04-27 01:05:44', '2017-08-29 00:17:00'),
(4, 1, 1, 'Rajshahi', 'Details............', 1, 0, '2017-04-27 01:06:04', '2017-04-27 01:07:30'),
(7, 1, 1, 'Borisal', 'Borisal', 1, 0, '2018-12-04 09:25:18', NULL),
(8, 1, 1, 'Chittagonj', 'Chittagonj', 1, 0, '2018-12-04 09:25:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_countries`
--

CREATE TABLE `dir_countries` (
  `country_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_countries`
--

INSERT INTO `dir_countries` (`country_id`, `user_id`, `country_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Bangladesh', 'Details.....', 1, 0, '2017-04-26 00:38:01', '2017-04-26 00:38:17'),
(2, 1, 'USA', 'Details..........', 1, 1, '2017-04-27 01:07:56', NULL),
(3, 1, 'INDIA', 'India', 1, 1, '2017-09-17 17:31:55', '2017-09-17 17:32:17'),
(4, 1, 'Turkey', 'Details...', 1, 1, '2017-09-24 17:40:45', NULL),
(5, 1, 'Germany', 'Details...', 1, 1, '2017-09-24 17:41:01', NULL),
(6, 1, 'Thailand', 'Details', 1, 1, '2017-09-24 17:41:29', NULL),
(7, 1, 'Pakisthan', 'Details...', 1, 1, '2017-09-24 17:42:07', NULL),
(8, 1, 'UK', 'Details', 1, 1, '2017-09-24 17:42:34', NULL),
(9, 1, 'Taiwan', 'Details', 1, 1, '2017-09-24 17:42:54', NULL),
(10, 1, 'Ukrain', 'Details...', 1, 1, '2017-09-24 17:43:21', NULL),
(11, 1, 'Brazil', 'Details...', 1, 1, '2017-09-24 17:44:42', NULL),
(12, 1, 'Rwanda', 'Details...', 1, 1, '2017-09-24 17:53:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_images`
--

CREATE TABLE `dir_images` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_images`
--

INSERT INTO `dir_images` (`image_id`, `user_id`, `listing_id`, `caption`, `image_path`, `total_views`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(12, 7, 9, 'bdtest', 'a40b83bca07c63ffd31bcb6ded159931.jpg', 2, 1, 1, '2018-12-02 11:11:50', NULL),
(13, 7, 9, 'Akij Ad-Din Medical College Hospital', '9dcdbb6764e69e5a2ba8437ffedb8b00.jpg', 4, 1, 0, '2018-12-15 10:27:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_image_comments`
--

CREATE TABLE `dir_image_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_image_hearts`
--

CREATE TABLE `dir_image_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_keywords`
--

CREATE TABLE `dir_keywords` (
  `keyword_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `keyword_name` varchar(250) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_keywords`
--

INSERT INTO `dir_keywords` (`keyword_id`, `user_id`, `listing_id`, `keyword_name`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(8, 7, 9, 'Akij Ad-Din Medical College Hospital', 1, 0, '2018-12-08 21:41:38', '2018-12-15 10:18:37'),
(9, 7, 11, 'Badhon', 1, 0, '2018-12-15 10:24:47', NULL),
(10, 7, 10, 'Abul Kalam', 1, 0, '2018-12-15 10:25:11', NULL),
(11, 7, 11, 'A+', 1, 0, '2018-12-17 19:21:15', NULL),
(12, 7, 10, 'Pathology', 1, 0, '2018-12-17 19:22:00', NULL),
(13, 7, 13, 'B+', 1, 0, '2018-12-19 15:49:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_listing`
--

CREATE TABLE `dir_listing` (
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  `city_id` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(250) NOT NULL,
  `registration_code` varchar(50) NOT NULL,
  `vat_registration` varchar(50) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `about_company` text NOT NULL,
  `employees` varchar(10) NOT NULL,
  `establishment_year` varchar(4) NOT NULL,
  `company_manager` varchar(100) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `saturday` varchar(20) NOT NULL,
  `sunday` varchar(20) NOT NULL,
  `monday` varchar(20) NOT NULL,
  `tuesday` varchar(20) NOT NULL,
  `wednesday` varchar(20) NOT NULL,
  `thursday` varchar(20) NOT NULL,
  `friday` varchar(20) NOT NULL,
  `total_views` int(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `verification_status` tinyint(4) NOT NULL DEFAULT '0',
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(4) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `specialist` varchar(250) DEFAULT NULL,
  `short_biography` varchar(250) DEFAULT NULL,
  `degree` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_listing`
--

INSERT INTO `dir_listing` (`listing_id`, `user_id`, `category_id`, `company_name`, `company_logo`, `city_id`, `state`, `address`, `zip`, `fax`, `phone`, `mobile`, `email`, `website`, `registration_code`, `vat_registration`, `contact_person`, `about_company`, `employees`, `establishment_year`, `company_manager`, `lat`, `lng`, `saturday`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `total_views`, `is_featured`, `verification_status`, `publication_status`, `deletion_status`, `date_added`, `last_updated`, `designation`, `specialist`, `short_biography`, `degree`) VALUES
(9, 7, 3, 'Akij Ad Din Medical College Hospital', '9ecd62b19472a8df5fcf808f6896fbbc.jpg', '3', 'khulna', 'khulna', '9000', 'wef', '', '56565665656', 'test@test.com', '', '7894', '789', 'contact', 'Boyra, Khulna - Jessore - Dhaka Hwy, Khulna 9000', '11-15', '2008', 'name', '22.84109874852761', '89.5387351512909', '', '', '', '', '', '', '', 49, 1, 1, 1, 0, '2018-12-02 10:04:24', '2018-12-15 10:18:19', NULL, NULL, NULL, NULL),
(10, 7, 15, 'Abul Kalam', '95e8f9109f4a5b78d33e84725968e654.jpg', '3', 'Khulna', 'Khulna', '9000', '889777', '8989', '559877456982', 'stest@test.com', 'test.com', '', '', 'testperson', 'Gazi medical', '51-100', '2001', '8 am', '23.11004929735674', '89.49462890625', '', '', '', '', '', '', '', 86, 1, 1, 1, 0, '2018-12-04 10:55:03', '2018-12-15 09:58:34', NULL, NULL, NULL, NULL),
(11, 7, 17, 'Badhon', 'b523937ae8c6510348b58faae643ff91.jpeg', '3', 'Khulna', 'ddv', '56', '', '', '5464566', 'tecr8990ds@outlook.com', '', '989', '544', 'htrh', 'ascs', '26-50', '2006', '66', '22.802076947215475', '89.53314542770386', '', '', '', '', '', '', '', 12, 1, 1, 1, 0, '2018-12-07 20:27:45', '2018-12-15 10:11:47', NULL, NULL, NULL, NULL),
(12, 7, 15, 'md hasn ali', '3debd60c6980516b4c6203cda9abd427.jpg', '3', 'Khulna', 'Khulna', '', '', '01672364847', '01675236987', 'lai@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 7, 1, 1, 1, 0, '0000-00-00 00:00:00', '2018-12-24 13:09:06', 'MBBS', 'Brain', '<p>Bio</p>', '<p>MBBS</p>'),
(13, 7, 15, 'Karima Khan', '82c347fc6951482affa0a3e2c80ae769.jpg', '7', '', 'rgre', '', '', '8895656656', '8989865656', 'passman@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 1, 1, 0, '0000-00-00 00:00:00', '2018-12-24 13:08:39', 'mmm', 'erer', '<p>bio</p>', '<p>fef</p>'),
(14, 7, 15, 'man ali man', '610e6d65361a936f1f10760a5521454a.jpg', '3', '', 'khulna', '', '', '7889966', '12365478', 'testali@gmail.com', '', '', '', '', '', '', '', '', '0000', '0000', '', '', '', '', '', '', '', 8, 1, 1, 1, 0, '0000-00-00 00:00:00', '2018-12-24 13:08:04', 'mbbs', 'efew', '<p>bio</p>', '<p>dd</p>');

-- --------------------------------------------------------

--
-- Table structure for table `dir_packages`
--

CREATE TABLE `dir_packages` (
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `listing` int(11) NOT NULL,
  `images` int(11) NOT NULL,
  `videos` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `services` int(11) NOT NULL,
  `articles` int(11) NOT NULL,
  `keywords` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_payments`
--

CREATE TABLE `dir_payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `payment_type` tinyint(4) NOT NULL,
  `payment_purpose` tinyint(4) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_payments`
--

INSERT INTO `dir_payments` (`payment_id`, `user_id`, `listing_id`, `payment_type`, `payment_purpose`, `amount`, `status`, `date_added`) VALUES
(1, 2, 1, 1, 2, 15, 1, '2017-08-27 08:32:53'),
(2, 12, 2, 1, 3, 11, 1, '2017-08-27 10:51:59'),
(3, 32, NULL, 1, 1, 0, 0, '2017-09-23 03:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `dir_products`
--

CREATE TABLE `dir_products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_details` text NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_product_comments`
--

CREATE TABLE `dir_product_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_product_hearts`
--

CREATE TABLE `dir_product_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_services`
--

CREATE TABLE `dir_services` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_details` text NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_service_comments`
--

CREATE TABLE `dir_service_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_service_hearts`
--

CREATE TABLE `dir_service_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_service_hearts`
--

INSERT INTO `dir_service_hearts` (`heart_id`, `user_id`, `service_id`, `date_added`) VALUES
(1, 2, 5, '2017-07-29 16:08:07'),
(2, 2, 3, '2017-08-30 08:00:49'),
(3, 28, 1, '2017-08-30 08:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `dir_subscribers`
--

CREATE TABLE `dir_subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_subscribers`
--

INSERT INTO `dir_subscribers` (`subscriber_id`, `email_address`, `deletion_status`, `date_added`) VALUES
(1, 'msnawazbd@gmail.com', 0, '2017-08-27 14:15:48'),
(2, 'noyon2nil@gmail.com', 0, '2017-08-27 04:06:13'),
(3, 'nahidhaque33@gmail.com', 0, '2017-08-27 03:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `dir_sub_categories`
--

CREATE TABLE `dir_sub_categories` (
  `sub_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_sub_categories`
--

INSERT INTO `dir_sub_categories` (`sub_category_id`, `user_id`, `category_id`, `sub_category_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 1, 'IT', 'Details of IT', 1, 0, '2017-04-25 11:41:52', '2017-04-27 02:32:01'),
(2, 1, 2, 'Restaurant', 'Details about restaurant...', 1, 0, '2017-04-25 22:49:35', '2017-04-27 02:31:54'),
(3, 1, 3, 'Hospital', 'Details about hospital...', 1, 0, '2017-04-25 22:50:42', '2017-04-27 02:31:46'),
(4, 1, 1, 'Training Center', 'Details....', 1, 0, '2017-04-27 02:24:06', '2017-04-27 02:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `dir_videos`
--

CREATE TABLE `dir_videos` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `video_name` varchar(250) NOT NULL,
  `video_details` text NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_video_comments`
--

CREATE TABLE `dir_video_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dir_video_hearts`
--

CREATE TABLE `dir_video_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `enquiry` text,
  `checked` tinyint(1) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `checked_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enquiry_id`, `email`, `phone`, `name`, `enquiry`, `checked`, `ip_address`, `user_agent`, `checked_by`, `created_date`, `status`) VALUES
(1, 'mai@mail.com', '01675366', 'sumon', 'pain in back ', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36', 2, '2018-09-27 09:06:36', 1),
(2, 'test@testman.com', '01672364847', 'test aligg', 'eyfggfgfygy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', NULL, '2018-12-18 13:11:29', 1),
(3, 'testali@mail.com', '01672364845', 'ded', 'dd', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134', 2, '2018-12-18 13:11:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `affliate` varchar(50) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `Email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `firstname`, `lastname`, `phone`, `mobile`, `address`, `sex`, `blood_group`, `date_of_birth`, `affliate`, `picture`, `created_by`, `create_date`, `status`, `Email`) VALUES
(1, 'P7OGZGC3', 'Tuhin', 'Sorkar', '0123456789', '0123456789', '98 Green Road, Farmgate, Dhaka-1215', 'Male', '', '2015-11-01', NULL, 'assets/images/patient/2016-11-20/p14.png', 2, '2016-09-04', 1, 'shahidul7889@gmail.com'),
(2, 'PH8TEPFG', 'dwbqu', 'dqwb', '544`', '454', 'dbwubdu', 'Male', 'A+', '2018-11-15', NULL, 'assets/images/patient/2018-10-03/k.jpg', 2, '2018-10-03', 1, ''),
(3, 'PK2ZUESF', 'test', 'last', '01655', '158', 'ku', 'Male', 'B+', '2018-10-11', NULL, 'assets/images/patient/2018-10-11/k.jpg', 17, '2018-10-11', 1, ''),
(4, 'PQZ5I563', 'MD ALIM ', 'ULLAH', '01672364847', '01698774665', 'khulna', 'Male', 'B+', '2018-10-10', NULL, 'assets/images/patient/2018-10-25/k.jpg', NULL, '2018-10-25', 1, 'mail@mail.com'),
(5, 'PZ329IB8', 'MD Korim Ullah', 'Alom', '+8801689481907', '+8801689481907', 'Khulna , Bagarhat', 'Male', 'O+', '2018-10-09', NULL, 'assets/images/patient/2018-10-30/t.jpg', NULL, '2018-10-30', 1, 'sumonsorderkucse20@gmail.com'),
(6, 'P3PEEE5V', 'md man', 'man', '799', '5655', 'qwdw', 'Male', 'B+', '2018-12-26', NULL, 'assets/images/patient/2018-12-13/0.jpg', NULL, '2018-12-13', 1, 'dtest.c60'),
(7, 'PZKY02DQ', 'sumon ali', 'man', '01678965', '4578965', 'khulna', 'Male', 'O+', '2018-12-11', NULL, 'assets/images/patient/2018-12-18/M.jpg', NULL, '2018-12-18', 1, 'testsumon@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `port_blogs`
--

CREATE TABLE `port_blogs` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_blog_categories`
--

CREATE TABLE `port_blog_categories` (
  `blog_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_clients`
--

CREATE TABLE `port_clients` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_educational_experiences`
--

CREATE TABLE `port_educational_experiences` (
  `educational_experience_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `achievement` varchar(250) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_portfolio`
--

CREATE TABLE `port_portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `portfolio_category_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_portfolio_categories`
--

CREATE TABLE `port_portfolio_categories` (
  `portfolio_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_prices`
--

CREATE TABLE `port_prices` (
  `price_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `icon_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_services`
--

CREATE TABLE `port_services` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `icon_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_skills`
--

CREATE TABLE `port_skills` (
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `icon_name` varchar(100) NOT NULL,
  `skill_percentage` int(3) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `port_working_experiences`
--

CREATE TABLE `port_working_experiences` (
  `working_experience_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` varchar(10) DEFAULT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_working_experiences`
--

INSERT INTO `port_working_experiences` (`working_experience_id`, `user_id`, `company_name`, `designation`, `start_date`, `end_date`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Softxilla', 'Junior Software Engineer', '2015-06-01', '2016-06-01', 'I worked as a junior software engineer', 1, 0, '2017-04-02 07:39:44', '0000-00-00 00:00:00'),
(2, 1, 'Atique IT', 'Software Engineer', '2016-06-01', '2017-02-15', 'Worked as a Software Engineer', 1, 0, '2017-04-02 07:43:28', '0000-00-00 00:00:00'),
(3, 1, 'Clustercoding', 'Senior Software Engineer', '2016-01-01', 'Continue', 'Working as a Senior Software Engineer', 1, 0, '2017-04-02 07:44:55', '2017-04-21 23:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `available_days` varchar(50) DEFAULT NULL,
  `per_patient_time` time DEFAULT NULL,
  `serial_visibility_type` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `doctor_id`, `start_time`, `end_time`, `available_days`, `per_patient_time`, `serial_visibility_type`, `status`) VALUES
(5, 8, '09:00:00', '12:00:00', 'Monday', '00:30:00', 2, 1),
(6, 1, '09:00:00', '12:00:00', 'Tuesday', '00:30:00', 1, 1),
(9, 7, '10:00:00', '20:00:00', 'Sunday', '00:30:00', 2, 1),
(10, 7, '10:00:00', '20:00:00', 'Thursday', '00:30:00', 1, 1),
(11, 1, '11:00:00', '10:00:00', 'Sunday', '13:35:00', 1, 1),
(16, 11, '09:10:00', '12:00:00', 'Monday', '00:15:00', 2, 1),
(17, 17, '09:00:00', '15:00:00', 'Thursday', '00:15:00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `title`, `description`, `email`, `phone`, `logo`, `favicon`, `footer_text`) VALUES
(1, 'BD Hospital ', 'BD Hospital ', 'admin@example.com', '041-721791', 'assets/images/apps/2016-11-17/l.png', 'assets/images/icons/2016-11-20/f.png', '©2018 Khulna University'),
(2, 'BD Hospital ', 'BD Hospital ', 'admin@example.com', '041-721791', 'assets/images/apps/l.png', 'assets/images/icons/2016-11-20/f.png', '©2018 Khulna University');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_id` int(10) NOT NULL,
  `Student_Name` varchar(255) NOT NULL,
  `Student_Email` varchar(255) NOT NULL,
  `Student_Mobile` varchar(255) NOT NULL,
  `Student_Address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_id`, `Student_Name`, `Student_Email`, `Student_Mobile`, `Student_Address`) VALUES
(1, 'md alom islam', 'test@test.com', '8801672364847', 'Khulna University');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email_address` varchar(100) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `access_level` tinyint(1) NOT NULL COMMENT 'for super_admin = 1, manager = 2',
  `mobile_no` varchar(15) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `position` varchar(255) NOT NULL,
  `about_me` text NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email_address`, `admin_password`, `access_level`, `mobile_no`, `date_of_birth`, `gender`, `position`, `about_me`, `join_date`) VALUES
(1, 'Md Shahid Nawaz', 'msnawazbd@gmail.com', '52e98dae382f1f636a431cd0162b508d', 1, '01761913331', '1993-12-20', 'Male', 'Director', 'Studying B.Sc In Software Engineering at Deffodil Internation University', '2015-06-19 18:35:39'),
(2, 'Md Aeshadul Haque', 'noyon2nil@gmail.com', '3b712de48137572f3849aabd5666a4e3', 2, '', '0000-00-00', '', '', '', '2015-06-19 18:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `setting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `paypal_id` varchar(100) NOT NULL,
  `web` varchar(250) NOT NULL,
  `language` varchar(50) NOT NULL,
  `time_zone` varchar(50) NOT NULL,
  `time_format` int(2) NOT NULL,
  `date_format` varchar(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postal_code` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `google_plus` varchar(250) NOT NULL,
  `youtube` varchar(250) NOT NULL,
  `terms_conditions` text NOT NULL,
  `privacy_policy` text NOT NULL,
  `site_logo` varchar(250) NOT NULL,
  `site_favicon` varchar(250) NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`setting_id`, `user_id`, `site_name`, `email_address`, `paypal_id`, `web`, `language`, `time_zone`, `time_format`, `date_format`, `address`, `state`, `city`, `postal_code`, `fax`, `mobile_number`, `phone_number`, `facebook`, `twitter`, `google_plus`, `youtube`, `terms_conditions`, `privacy_policy`, `site_logo`, `site_favicon`, `last_updated`) VALUES
(1, 1, 'BD HOSPITAL', 'admin@demo.com', 'admin@demo.com', 'KU.AC.BD', 'en', 'Asia/Dhaka', 24, 'dd/mm/yyyy', '46/1 b, shukrabad, dhanmondi', 'dhanmondi', 'krasnodar', '120711', '11221', '01792935353', '1717888464', '', '', '', '', '<p>terms and conditions</p>', '<p>privacy and policy</p>', '05f8a79bf43c3c772318cc0433eaf780.png', 'f824f87914b0955fc6a4a6247ffa2b48.png', '2017-09-03 00:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `about` text,
  `education` varchar(255) DEFAULT NULL,
  `work` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(25) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` text,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `google_plus` varchar(250) DEFAULT NULL,
  `linkedin` varchar(250) DEFAULT NULL,
  `youtube` varchar(250) DEFAULT NULL,
  `github` varchar(250) DEFAULT NULL,
  `access_label` tinyint(1) NOT NULL COMMENT 'for superadmin = 1, for admin = 2, for user = 5',
  `activation_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `package_id`, `first_name`, `last_name`, `username`, `email_address`, `password`, `intro`, `about`, `education`, `work`, `mobile_number`, `gender`, `date_of_birth`, `avatar`, `company`, `address`, `state`, `city`, `country`, `zip_code`, `facebook`, `twitter`, `google_plus`, `linkedin`, `youtube`, `github`, `access_label`, `activation_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(7, 6, 'KU', 'CSE', 'user', 'admin@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', '', '1-658-8547', 'm', '0000-00-00', '31f3ab5381973b39ff5fd143b8b5107e.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 5, 1, 0, '2017-04-24 01:14:43', '2018-12-15 11:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_role` tinyint(1) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `short_biography` text,
  `picture` varchar(50) DEFAULT NULL,
  `specialist` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `city_id` int(11) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `user_role`, `designation`, `department_id`, `address`, `phone`, `mobile`, `short_biography`, `picture`, `specialist`, `date_of_birth`, `sex`, `blood_group`, `degree`, `created_by`, `create_date`, `update_date`, `status`, `city_id`, `lat`, `lng`) VALUES
(1, 'Samim', 'Khan', 'doctor@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '', 8, 'It is a long established fact that a reader will be distracted by the readable content ', '0123456798', '0123456798', '<p>It is a long established fact that a reader will be distracted by the readable content</p>', 'assets/images/doctor/2018-09-27/D.jpg', '', '2016-10-12', 'Male', 'A+', '<p>It is a long established fact that a reader will be distracted by the readable content</p>', 2, '2018-09-27', NULL, 1, 0, NULL, NULL),
(2, 'KU', 'CSE', 'admin@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '', 0, 'khulna', '01111', '01111', '', 'assets/images/doctor/2018-10-03/k.jpg', '', '1994-02-10', 'Male', 'B+', '', 2, '2018-10-03', NULL, 1, 0, NULL, NULL),
(4, 'Md. Jabed', 'Mahmud', 'doctor@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'Frontent Developer', 1, '98 Green Road, Farmgate, Dhaka-1215', '0123456798', '1234567890', '<p>TEST</p>', 'assets/images/representative/2016-11-20/p1.png', 'MBBS', '2016-10-11', 'Male', 'B-', '<p>TEST</p>', 2, '2016-10-15', NULL, 1, 0, NULL, NULL),
(7, 'Dr. Jeffrey ', 'Poynor', 'tuhin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 'Seniro Doctor', 10, 'It is a long established fact that a reader will be distracted by the readable content ', '01234567980', '01234567980', '<p>It is a long established fact that a reader will be distracted by the readable content</p>', 'assets/images/doctor/2018-09-27/f.jpg', 'MBBS', '2016-10-11', 'Male', 'A+', '<p>It is a long established fact that a reader will be distracted by the readable content</p>', 2, '2018-09-27', NULL, 1, 0, NULL, NULL),
(8, 'Dr. Jade ', 'Urps', 'naeem@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'Frontent Developer', 11, 'Dhaka', '1234567890', '1234567890', '<p>sdfaasdfasdfs</p>', 'assets/images/doctor/2018-09-27/B2.jpg', '', '2016-10-10', 'Male', 'B+', '<p>It is a long established fact that a reader will be distracted by the readable content</p>', 2, '2018-09-27', NULL, 1, 0, NULL, NULL),
(9, 'Kamrul', 'Anam', 'agent@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, '', 2, 'Dhaka Bangladesh', '0180525666', '0182554885', '', 'assets/images/representative/2016-11-20/p.png', '', '2016-10-02', 'Male', 'B-', '', 2, '2016-10-15', NULL, 1, 0, NULL, NULL),
(10, 'Dr. Eric', ' Martt', 'jane@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'Doctor', 12, 'Dhaka, Bangladesh', '1234567890', '1234567890', '<p>Test</p>', 'assets/images/doctor/2018-09-27/B.jpg', '', '1994-11-01', 'Male', 'B+', '', 2, '2018-09-27', NULL, 1, 0, NULL, NULL),
(12, 'stuff', 'man', 'stuff@test.com', '2b891ea5ca5f7b18cc395f5be624bf0f', 3, NULL, NULL, 'Khulna', '5669992', '016723648', NULL, 'assets/images/representative/2018-12-15/P.jpg', NULL, '2017-08-15', 'Male', 'A-', NULL, 12, '2018-09-24', NULL, 1, 0, NULL, NULL),
(14, 'md ', 'Asaduzzman', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 'dr', 10, 'ddewf', '01111', '01111', '', 'assets/images/doctor/2018-09-27/B3.jpg', '', '0000-00-00', 'Male', '', '', 2, '2018-09-27', NULL, 1, 0, NULL, NULL),
(17, 'Md Solim Ullah', 'Khan', 'add@add.com', 'a70a73db01b6f55210b1c884c5808c67', 2, 'Dr', 10, 'Khulna Gazi Medical Hospital', '0167234847', '0158942387', '<p>Thanks</p>', 'assets/images/doctor/2018-10-23/D.jpg', 'das', '2018-10-10', 'Male', 'O+', '<p>csa</p>', 17, '2018-10-23', NULL, 1, 0, NULL, NULL),
(18, 'md testman', 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 2, 'dg', 9, 'ewf', '98', '65656', 'wef', 'assets/images/doctor/2018-12-13/0.jpg', 'wef', '2018-12-26', 'Male', 'B+', 'wef', NULL, '2018-12-13', NULL, 1, 0, NULL, NULL),
(19, 'md testmanvai', 'vai', 'testvai@test.com', '098f6bcd4621d373cade4e832627b4f6', 2, 'test', 8, 'efge', '8898', '89898', 'fygf', 'assets/images/doctor/2018-12-13/01.jpg', 'ewfw', '2018-12-18', 'Male', 'O-', 'fwe', NULL, '2018-12-13', NULL, 1, 0, NULL, NULL),
(20, 'man vai test ', 'test', 'abdultesmant@test.com', '098f6bcd4621d373cade4e832627b4f6', 2, 'fuewg', 11, 'qwfw', '8889', '8998', 'fwef', 'assets/images/doctor/2018-12-13/02.jpg', 'ewfw', '2018-12-18', 'Male', 'B+', 'grer', NULL, '2018-12-13', NULL, 1, 0, NULL, NULL),
(21, 'testman', 'pappu', 'test@tesddt.com', '098f6bcd4621d373cade4e832627b4f6', 2, 'sqss', 12, 'sdd', '8989', '0167599', '<p>thebeu</p>', 'assets/images/doctor/2018-12-15/0.jpg', 'mlm', '2018-12-18', 'Male', 'B+', '<p>jkjk</p>', 2, '2018-12-15', NULL, 1, 0, NULL, NULL),
(22, 'testsumon', 'fwef', 'admin@demeo.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'ef', 11, 'efe', '88899', '898989', '<p>ewf</p>', 'assets/images/doctor/2018-12-16/P.jpg', 'gefegfgeg', '2018-12-21', 'Male', 'O+', '<p>ewfwe</p>', 2, '2018-12-16', NULL, 1, 0, NULL, NULL),
(25, 'testman vai', 'vai man', 'workhars@hard.com', '6ab25433b25005b1e98e2406f57bd0e2', 2, NULL, NULL, 'khulna university', NULL, '559877456982', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, 0, NULL, NULL),
(26, 'md arman ', 'hosseain', 'arman89@gmail.com', 'a11569f960a27e7f1f2866fafa61a818', 2, NULL, NULL, 'Khulna University', NULL, '01672364845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, 0, NULL, NULL),
(28, 'md abul kalam', 'hasan', 'hasan@gmail.com', 'd8658e3d41a274aa3c733965b39b7a4c', 2, NULL, NULL, 'Khulna University', NULL, '1672364847', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, 0, NULL, NULL),
(29, 'testwork', 'testman', 'testwork@gmail.com', '63738f0bbddc3fdf68837bd0885bfae6', 2, NULL, NULL, 'Khulna University', NULL, '01672364845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, 0, NULL, NULL),
(30, 'md test', 'tesman', 'testtest@test.com', '70873e8580c9900986939611618d7b1e', 2, NULL, NULL, 'dhaka city', NULL, '016723648486', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, 0, NULL, NULL),
(31, 'md alim', 'ullah', 'testmn@mail.com', '35f504164d5a963d6a820e71614a4009', 2, NULL, NULL, 'khulna bangladesh', NULL, '016746987456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, 0, NULL, NULL),
(32, 'work hard', 'man', 'testali@mail.com', '4ad7a38244b1d2b5e4163d401313ea6f', 2, NULL, NULL, 'khulna university', NULL, '01672364845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 1, 0, NULL, NULL),
(33, 'md hasn ali', 'khan', 'lai@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', 2, 'MBBS', 9, 'Khulna', '01672364847', '01675236987', '<p>Bio</p>', 'assets/images/doctor/2018-12-19/03.jpg', 'Brain', '2018-12-11', 'Male', 'B-', '<p>MBBS</p>', 2, '2018-12-19', NULL, 1, 3, NULL, NULL),
(34, 'man ali man', 'uddin', 'testali@gmail.com', '4ad7a38244b1d2b5e4163d401313ea6f', 2, 'mbbs', 10, 'khulna', '7889966', '12365478', '<p>bio</p>', 'assets/images/doctor/2018-12-19/P.jpg', 'efew', '2018-12-17', 'Male', 'B+', '<p>dd</p>', 2, '2018-12-19', NULL, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ws_comment`
--

CREATE TABLE `ws_comment` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `add_to_website` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ws_item`
--

CREATE TABLE `ws_item` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `icon_image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `position` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `counter` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ws_item`
--

INSERT INTO `ws_item` (`id`, `name`, `icon_image`, `title`, `description`, `position`, `status`, `counter`, `date`) VALUES
(1, 'about', 'assets_web/images/icon_image/a1.jpg', 'About Us', 'We have world class facilities to care you\r\n\r\n Trained laboratory staff are providing best services which includes painless blood withdrawal.\r\n\r\n 24hours ECG services including machine report, done by trained staff.\r\n\r\n 24 hours patient transport vehicle available.\r\n\r\n Free reliable quality medicines are available to beneficiaries on doctor prescription during OPD hours.', 0, 1, 3, '2017-09-26'),
(24, 'about', 'assets_web/images/icon_image/a1.jpg', 'Our Mission at Medical', 'Emergency Care Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever Call Center 24/7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever Call Center 24/7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever Blood Test Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever Cardiac Surgery Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever Dental Care Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever Outdoor Checkup Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever Ophthalmology Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever Heart disease Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever', 1, 1, 3, '2018-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `ws_section`
--

CREATE TABLE `ws_section` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `featured_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ws_section`
--

INSERT INTO `ws_section` (`id`, `name`, `title`, `description`, `featured_image`) VALUES
(20, 'about', 'About Us', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature froLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,m 45 BC.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.', 'assets_web/images/uploads/a1.jpg'),
(26, 'doctor', 'OUR DOCTOR', 'Our department & special service ', 'assets_web/images/uploads/2016-11-20/a4.png');

-- --------------------------------------------------------

--
-- Table structure for table `ws_setting`
--

CREATE TABLE `ws_setting` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `copyright_text` varchar(255) DEFAULT NULL,
  `twitter_api` text,
  `google_map` text,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `vimeo` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `dribbble` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `google_plus` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ws_setting`
--

INSERT INTO `ws_setting` (`id`, `title`, `description`, `logo`, `favicon`, `meta_tag`, `meta_keyword`, `email`, `phone`, `address`, `copyright_text`, `twitter_api`, `google_map`, `facebook`, `twitter`, `vimeo`, `instagram`, `dribbble`, `skype`, `google_plus`, `status`) VALUES
(3, 'BD Hospital ', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ', 'assets_web/images/icons/l1.png', 'assets_web/images/icons/2016-11-03/f.png', 'Hospital, Appointment, System', 'Hospital Appointment System', 'KU@hospital.com', '041-721791', 'Khulna University', '<p>© 2018 <a title=\"Khulna University\" href=\"http://ku.ac.bd/\" target=\"_blank\">BD HOSPITAL</a>. All rights reservedÂ </p>', '', '', 'http://facebook.com/', 'http://', 'http://', 'http://', 'http://', 'http://', 'http://', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ws_slider`
--

CREATE TABLE `ws_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(100) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ws_slider`
--

INSERT INTO `ws_slider` (`id`, `title`, `subtitle`, `description`, `image`, `position`, `status`) VALUES
(2, '', '', '', 'assets_web/images/slider/p1.jpg', 2, 1),
(5, 'First  Slide ', 'Welcome TO BD Hospital', '<p> early to bed and early to rise makes a man healthy, wealthy, and wise</p>', 'assets_web/images/slider/p2.jpg', 1, 1),
(7, '', '', '', 'assets_web/images/slider/p3.png', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dprt_id`);

--
-- Indexes for table `dir_articles`
--
ALTER TABLE `dir_articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `dir_article_comments`
--
ALTER TABLE `dir_article_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_article_hearts`
--
ALTER TABLE `dir_article_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `dir_bookmarks`
--
ALTER TABLE `dir_bookmarks`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `dir_categories`
--
ALTER TABLE `dir_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dir_cities`
--
ALTER TABLE `dir_cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `dir_countries`
--
ALTER TABLE `dir_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `dir_images`
--
ALTER TABLE `dir_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `dir_image_comments`
--
ALTER TABLE `dir_image_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_image_hearts`
--
ALTER TABLE `dir_image_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `dir_keywords`
--
ALTER TABLE `dir_keywords`
  ADD PRIMARY KEY (`keyword_id`);

--
-- Indexes for table `dir_listing`
--
ALTER TABLE `dir_listing`
  ADD PRIMARY KEY (`listing_id`);

--
-- Indexes for table `dir_packages`
--
ALTER TABLE `dir_packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `dir_payments`
--
ALTER TABLE `dir_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `dir_products`
--
ALTER TABLE `dir_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `dir_product_comments`
--
ALTER TABLE `dir_product_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_product_hearts`
--
ALTER TABLE `dir_product_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `dir_services`
--
ALTER TABLE `dir_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `dir_service_comments`
--
ALTER TABLE `dir_service_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_service_hearts`
--
ALTER TABLE `dir_service_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `dir_subscribers`
--
ALTER TABLE `dir_subscribers`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `dir_sub_categories`
--
ALTER TABLE `dir_sub_categories`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `dir_videos`
--
ALTER TABLE `dir_videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `dir_video_comments`
--
ALTER TABLE `dir_video_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_video_hearts`
--
ALTER TABLE `dir_video_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port_blogs`
--
ALTER TABLE `port_blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `port_blog_categories`
--
ALTER TABLE `port_blog_categories`
  ADD PRIMARY KEY (`blog_category_id`);

--
-- Indexes for table `port_clients`
--
ALTER TABLE `port_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `port_educational_experiences`
--
ALTER TABLE `port_educational_experiences`
  ADD PRIMARY KEY (`educational_experience_id`);

--
-- Indexes for table `port_portfolio`
--
ALTER TABLE `port_portfolio`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Indexes for table `port_portfolio_categories`
--
ALTER TABLE `port_portfolio_categories`
  ADD PRIMARY KEY (`portfolio_category_id`);

--
-- Indexes for table `port_prices`
--
ALTER TABLE `port_prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `port_services`
--
ALTER TABLE `port_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `port_skills`
--
ALTER TABLE `port_skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `port_working_experiences`
--
ALTER TABLE `port_working_experiences`
  ADD PRIMARY KEY (`working_experience_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ws_comment`
--
ALTER TABLE `ws_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ws_item`
--
ALTER TABLE `ws_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ws_section`
--
ALTER TABLE `ws_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ws_setting`
--
ALTER TABLE `ws_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ws_slider`
--
ALTER TABLE `ws_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dprt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dir_articles`
--
ALTER TABLE `dir_articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dir_article_comments`
--
ALTER TABLE `dir_article_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dir_article_hearts`
--
ALTER TABLE `dir_article_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dir_bookmarks`
--
ALTER TABLE `dir_bookmarks`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dir_categories`
--
ALTER TABLE `dir_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dir_cities`
--
ALTER TABLE `dir_cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dir_countries`
--
ALTER TABLE `dir_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dir_images`
--
ALTER TABLE `dir_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dir_image_comments`
--
ALTER TABLE `dir_image_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dir_image_hearts`
--
ALTER TABLE `dir_image_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dir_keywords`
--
ALTER TABLE `dir_keywords`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dir_listing`
--
ALTER TABLE `dir_listing`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dir_packages`
--
ALTER TABLE `dir_packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dir_payments`
--
ALTER TABLE `dir_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dir_products`
--
ALTER TABLE `dir_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dir_product_comments`
--
ALTER TABLE `dir_product_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dir_product_hearts`
--
ALTER TABLE `dir_product_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dir_services`
--
ALTER TABLE `dir_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dir_service_comments`
--
ALTER TABLE `dir_service_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dir_service_hearts`
--
ALTER TABLE `dir_service_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dir_subscribers`
--
ALTER TABLE `dir_subscribers`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dir_sub_categories`
--
ALTER TABLE `dir_sub_categories`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dir_videos`
--
ALTER TABLE `dir_videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dir_video_comments`
--
ALTER TABLE `dir_video_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dir_video_hearts`
--
ALTER TABLE `dir_video_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `port_blogs`
--
ALTER TABLE `port_blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `port_blog_categories`
--
ALTER TABLE `port_blog_categories`
  MODIFY `blog_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `port_clients`
--
ALTER TABLE `port_clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `port_educational_experiences`
--
ALTER TABLE `port_educational_experiences`
  MODIFY `educational_experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `port_portfolio`
--
ALTER TABLE `port_portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `port_portfolio_categories`
--
ALTER TABLE `port_portfolio_categories`
  MODIFY `portfolio_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `port_prices`
--
ALTER TABLE `port_prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `port_services`
--
ALTER TABLE `port_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `port_skills`
--
ALTER TABLE `port_skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `port_working_experiences`
--
ALTER TABLE `port_working_experiences`
  MODIFY `working_experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `ws_comment`
--
ALTER TABLE `ws_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ws_item`
--
ALTER TABLE `ws_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ws_section`
--
ALTER TABLE `ws_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ws_setting`
--
ALTER TABLE `ws_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ws_slider`
--
ALTER TABLE `ws_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

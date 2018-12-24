-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2016 at 11:52 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_appointment`
--
CREATE DATABASE IF NOT EXISTS `db_appointment` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_appointment`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `appointment_id`, `patient_id`, `department_id`, `doctor_id`, `schedule_id`, `serial_no`, `date`, `problem`, `created_by`, `create_date`, `status`) VALUES
(42, 'ASOQ60KT', 'PEJNSXWO', 2, 1, 4, 2, '2016-07-03', 'Test', 2, '2016-05-13', 1),
(43, 'AAKE0PBS', 'PEJNSXWO', 2, 1, 4, 1, '2016-09-22', 'Test', 4, '2015-05-13', 1),
(44, 'AAVGOT04', 'PEJNSXWO', 2, 1, 5, 1, '2016-08-17', 'PEJNSXWO', 4, '2016-10-13', 1),
(45, 'AES1FCCN', 'P7OGZGC3', 2, 5, 2, 1, '2016-06-15', '', 2, '2016-07-15', 1),
(46, 'AKYLZQ5G', 'P7OGZGC3', 2, 10, 8, 1, '2016-05-21', 'Test', 2, '2016-06-15', 1),
(47, 'A8FEEE5V', 'PDX3KY02', 1, 8, 5, 1, '2016-04-24', 'Test', 2, '2016-04-22', 1),
(48, 'ABH6BY50', 'PDX3KY02', 3, 7, 10, 1, '2016-03-27', 'Test', 1, '2016-03-05', 1),
(49, 'A9XKRCFB', 'P7OGZGC3', 2, 1, 6, 1, '2016-02-25', '10-25-2016', 1, '2016-02-04', 1),
(50, 'A1W3R6RJ', 'P7OGZGC3', 3, 7, 9, 1, '2016-10-23', 'P7OGZGC3 to Jahed Abdullah', 9, '2016-07-05', 1),
(51, 'AM4VOTQR', 'PDX3KY02', 2, 1, 6, 1, '2016-10-25', 'Test', 1, '2016-10-25', 1),
(53, 'AQEHTZNB', 'PEJNSXWO', 1, 8, 5, 1, '2016-10-31', 'Test', 2, '2016-10-25', 1),
(54, 'ALAUGR46', 'PEJNSXWO', 2, 1, 6, 2, '2016-10-25', 'Test', 2, '2016-10-25', 1),
(55, 'AD8TIJ3T', 'P7OGZGC3', 1, 8, 5, 2, '2016-10-31', 'T2', 9, '2016-10-25', 1),
(56, 'A8JRGYH7', 'P7OGZGC3', 2, 1, 6, 3, '2016-10-25', 'T3', 9, '2016-10-25', 1),
(57, 'AFLN6EJN', 'PEJNSXWO', 2, 1, 6, 1, '2016-11-01', 'Hello World', 2, '2016-10-26', 1),
(58, 'AB5VRYAU', 'P7OGZGC3', 2, 1, 6, 2, '2016-11-01', 'Test 2', 2, '2016-10-26', 1),
(59, 'A3TX7HK4', 'PF3A7NPY', 1, 8, 5, 3, '2016-10-31', 'Test', 9, '2016-10-27', 1),
(60, 'A92JT9L6', 'PB92AZ7I', 3, 7, 10, 1, '2016-10-27', 'Hasan', 1, '2016-10-27', 1),
(61, 'ATCZXWLO', 'PEJNSXWO', 1, 8, 5, 1, '2016-11-14', 'Test', 2, '2016-11-09', 1),
(63, 'AUGOT04K', 'PB92AZ7I', 2, 1, 6, 1, '2016-11-15', 'Test', 2, '2016-11-09', 1),
(64, 'AQ9NFJJU', 'PF3A7NPY', 2, 1, 6, 2, '2016-11-15', 'Test', 2, '2016-11-09', 1),
(65, 'AMRJYLZQ', 'PB92AZ7I', 1, 8, 5, 2, '2016-11-14', 'Test3', 2, '2016-11-09', 1),
(66, 'AQS0YEOF', 'PEJNSXWO', 3, 7, 10, 1, '2016-11-10', 'Test', 2, '2016-11-09', 1),
(67, 'AXP1MQK0', 'PEJNSXWO', 2, 1, 6, 3, '2016-11-15', 'TEST', 2, '2016-11-09', 1),
(68, 'AKNYTQRP', 'P7OGZGC3', 1, 8, 5, 3, '2016-11-14', 'TST', 0, '2016-11-10', 1),
(69, 'AP1MQK0P', 'P7OGZGC3', 1, 8, 5, 1, '2016-11-21', 'P7OGZGC3', 0, '2016-11-10', 1),
(70, 'AC6C9BZ3', 'PEJNSXWC', 2, 1, 6, 1, '2016-11-22', 'TEST', 0, '2016-11-17', 1),
(71, 'AOAJMOYY', 'P4FXWA25', 1, 8, 5, 2, '2016-11-21', '', 0, '2016-11-19', 1),
(72, 'ATSIC92A', 'P4FXWA25', 2, 1, 6, 2, '2016-11-22', 'TEST', 0, '2016-11-19', 1),
(73, 'AV3470JX', 'PPBSFHZP', 2, 1, 6, 3, '2016-11-22', 'TEST ', 0, '2016-11-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dprt_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`dprt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dprt_id`, `name`, `description`, `status`) VALUES
(1, 'Apple', 'The apple tree is a deciduous tree in the rose family best known for its sweet, pomaceous fruit, the apple. It is cultivated worldwide as a fruit tree, and is the most widely grown species in the genus Malus.', 1),
(2, 'Orange', 'The orange is the fruit of the citrus species Citrus × sinensis in the family Rutaceae. The fruit of the Citrus × sinensis is considered a sweet orange, whereas the fruit of the Citrus × aurantium is considered a bitter orange.', 1),
(3, 'Mango', 'The mango is a juicy stone fruit belonging to the genus Mangifera, consisting of numerous tropical fruiting trees, cultivated mostly for edible fruit. The majority of these species are found in nature as wild mangoes.', 1),
(4, 'Bannana', 'The banana is an edible fruit, botanically a berry, produced by several kinds of large herbaceous flowering plants in the genus Musa. In some countries, bananas used for cooking may be called plantains', 1),
(5, 'Lemon', 'The lemon is a species of small evergreen tree native to Asia. The tree''s ellipsoidal yellow fruit is used for culinary and non-culinary purposes throughout the world, primarily for its juice, which has both culinary and cleaning uses', 1),
(6, 'Jackfruit', 'The jackfruit, also known as jack tree, jakfruit, or sometimes simply jack or jak, is a species of tree in the fig, mulberry and breadfruit family.', 1),
(7, 'Test', 'Test Department\r\n', 1),
(8, 'Watermelon', 'Citrullus lanatus is a plant species in the family Cucurbitaceae, a vine-like flowering plant originally from West Africa. It is cultivated ', 1),
(9, 'Pineapple', 'The pineapple is a tropical plant with edible multiple fruit consisting of coalesced berries, also called pineapples, and the most economica', 1),
(10, 'Grape', 'A grape is a fruiting berry of the deciduous woody vines of the botanical genus Vitis. Grapes can be eaten fresh as table grapes or they can', 1),
(11, 'Olive', 'The olive, known by the botanical name Olea europaea, meaning "european olive", is a species of small tree in the family Oleaceae, found in \nLorem Ipsum\n"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."\n"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."\nWhat is Lorem Ipsum?\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\nWhy do we use it?\n line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 1),
(12, 'Hasan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nWhy do we use it?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `enquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `enquiry` text,
  `checked` tinyint(1) DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `checked_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enquiry_id`, `email`, `phone`, `name`, `enquiry`, `checked`, `ip_address`, `user_agent`, `checked_by`, `created_date`, `status`) VALUES
(1, 'enquiry@example.com', '0123456789', 'Jane Doe', 'HTML5 doctype\n\nBootstrap makes use of certain HTML elements and CSS properties that require the use of the HTML5 doctype. Include it at the beginning of all your projects.\n\n<!DOCTYPE html>\n<html lang="en">\n  ...\n</html>\n\nMobile first\n\nWith Bootstrap 2, we added optional mobile friendly styles for key aspects of the framework. With Bootstrap 3, we''ve rewritten the project to be mobile friendly from the start. Instead of adding on optional mobile styles, they''re baked right into the core. In fact, Bootstrap is mobile first. Mobile first styles can be found throughout the entire library instead of in separate files.\n\nTo ensure proper rendering and touch zooming, add the viewport meta tag to your <head>.\n\n<meta name="viewport" content="width=device-width, initial-scale=1">\n\nYou can disable zooming capabilities on mobile devices by adding user-scalable=no to the viewport meta tag. This disables zooming, meaning users are only able to scroll, and results in your site feeling a bit more like a native application. Overall, we don''t recommend this on every site, so use caution!', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(4, 'enquiry@example.com', '0123456789', 'Jhon Doe 2', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(10, 'enquiry@example.com', '0123456789', 'Jhon Doe 3 ', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(11, 'enquiry@example.com', '0123456789', 'Jhon Doe 4 ', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(19, 'enquiry@example.com', '0123456789', 'Jhon Doe 5 ', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(20, 'enquiry@example.com', '0123456789', 'Jhon Doe 6 ', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(22, 'enquiry@example.com', '0123456789', 'Jhon Doe 7 ', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(23, 'enquiry@example.com', '0123456789', 'Jhon Doe', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(24, 'enquiry@example.com', '0123456789', 'Jhon Doe', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 0, '2016-10-12 11:25:00', 1),
(25, 'enquiry@example.com', '0123456789', 'Jhon Doe', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\n\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 0, '2016-10-12 11:25:00', 1),
(26, 'enquiry@example.com', '0123456789', 'Jhon Doe', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 1, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(27, 'enquiry@example.com', '0123456789', 'Jhon Doe', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 0, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 0, '2016-10-12 11:25:00', 1),
(28, 'enquiry@example.com', '0123456789', 'Jhon Doe', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 1, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(30, 'enquiry@example.com', '0123456789', 'Jhon Doe', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 1, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(35, 'enquiry@example.com', '0123456789', 'Jhon Doe -1', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 1, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(36, 'enquiry@example.com', '0123456789', 'Jhon Doe 0 ', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 1, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(37, 'enquiry@example.com', '0123456789', 'Jhon Doe 1', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 1, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(38, 'enquiry@example.com', '0123456789', 'Jhon Doe 2', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 1, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(39, 'enquiry@example.com', '0123456789', 'Jhon Doe 3', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 1, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(40, 'enquiry@example.com', '0123456789', 'Jhon Doe 4', 'Grid system\r\n\r\nBootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 12 columns as the device or viewport size increases. It includes predefined classes for easy layout options, as well as powerful mixins for generating more semantic layouts.\r\nIntroduction\r\n\r\nGrid systems are used for creating page layouts through a series of rows and columns that house your content. Here''s how the Bootstrap grid system works:\r\n\r\n    Rows must be placed within a .container (fixed-width) or .container-fluid (full-width) for proper alignment and padding.\r\n    Use rows to create horizontal groups of columns.\r\n    Content should be placed within columns, and only columns may be immediate children of rows.\r\n    Predefined grid classes like .row and .col-xs-4 are available for quickly making grid layouts. Less mixins can also be used for more semantic layouts.\r\n    Columns create gutters (gaps between column content) via padding. That padding is offset in rows for the first and last column via negative margin on .rows.\r\n    The negative margin is why the examples below are outdented. It''s so that content within grid columns is lined up with non-grid content.\r\n    Grid columns are created by specifying the number of twelve available columns you wish to span. For example, three equal columns would use three .col-xs-4.\r\n    If more than 12 columns are placed within a single row, each group of extra columns will, as one unit, wrap onto a new line.\r\n    Grid classes apply to devices with screen widths greater than or equal to the breakpoint sizes, and override grid classes targeted at smaller devices. Therefore, e.g. applying any .col-md-* class to an element will not only affect its styling on medium devices but also on large devices if a .col-lg-* class is not present.\r\n\r\nLook to the examples for applying these principles to your code.', 1, '198.168.0.25', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-12 11:25:00', 1),
(42, 'tuhin@sorkar.com', '12398479238479', 'Test', '\r\nWhy do I have to complete a CAPTCHA?\r\n\r\nCompleting the CAPTCHA proves you are a human and gives you temporary access to the web property.\r\nWhat can I do to prevent this in the future?\r\n\r\nIf you are on a personal connection, like at home, you can run an anti-virus scan on your device to make sure it is not infected with malware.\r\n\r\nIf you are at an office or shared network, you can ask the network administrator to run a scan across the network looking for misconfigured or infected devices.\r\n\r\nWhy do I have to complete a CAPTCHA?\r\n\r\nCompleting the CAPTCHA proves you are a human and gives you temporary access to the web property.\r\nWhat can I do to prevent this in the future?\r\n\r\nIf you are on a personal connection, like at home, you can run an anti-virus scan on your device to make sure it is not infected with malware.\r\n\r\nIf you are at an office or shared network, you can ask the network administrator to run a scan across the network looking for misconfigured or infected devices.\r\n\r\nWhy do I have to complete a CAPTCHA?\r\n\r\nCompleting the CAPTCHA proves you are a human and gives you temporary access to the web property.\r\nWhat can I do to prevent this in the future?\r\n\r\nIf you are on a personal connection, like at home, you can run an anti-virus scan on your device to make sure it is not infected with malware.\r\n\r\nIf you are at an office or shared network, you can ask the network administrator to run a scan across the network looking for misconfigured or infected devices.\r\n\r\nWhy do I have to complete a CAPTCHA?\r\n\r\nCompleting the CAPTCHA proves you are a human and gives you temporary access to the web property.\r\nWhat can I do to prevent this in the future?\r\n\r\nIf you are on a personal connection, like at home, you can run an anti-virus scan on your device to make sure it is not infected with malware.\r\n\r\nIf you are at an office or shared network, you can ask the network administrator to run a scan across the network looking for misconfigured or infected devices.\r\n\r\nWhy do I have to complete a CAPTCHA?\r\n\r\nCompleting the CAPTCHA proves you are a human and gives you temporary access to the web property.\r\nWhat can I do to prevent this in the future?\r\n\r\nIf you are on a personal connection, like at home, you can run an anti-virus scan on your device to make sure it is not infected with malware.\r\n\r\nIf you are at an office or shared network, you can ask the network administrator to run a scan across the network looking for misconfigured or infected devices.\r\n\r\nWhy do I have to complete a CAPTCHA?\r\n\r\nCompleting the CAPTCHA proves you are a human and gives you temporary access to the web property.\r\nWhat can I do to prevent this in the future?\r\n\r\nIf you are on a personal connection, like at home, you can run an anti-virus scan on your device to make sure it is not infected with malware.\r\n\r\nIf you are at an office or shared network, you can ask the network administrator to run a scan across the network looking for misconfigured or infected devices.\r\n\r\nWhy do I have to complete a CAPTCHA?\r\n\r\nCompleting the CAPTCHA proves you are a human and gives you temporary access to the web property.\r\nWhat can I do to prevent this in the future?\r\n\r\nIf you are on a personal connection, like at home, you can run an anti-virus scan on your device to make sure it is not infected with malware.\r\n\r\nIf you are at an office or shared network, you can ask the network administrator to run a scan across the network looking for misconfigured or infected devices.\r\n', 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-10-17 11:31:11', 1),
(43, 'hello@example.com', '1234567980', 'Hello World', 'Test Enquiry', 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-11-14 10:37:14', 1),
(44, 'hello@example.com', '1234567980', 'Hello World', 'Test Enquiry', 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-11-14 10:38:11', 1),
(45, 'hello@example.com', '1234567980', 'Hello World', 'est', 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-11-14 10:39:42', 1),
(46, 'admin@example.com', '1234567980', 'Samim Hasan', 'TESER', 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-11-14 10:40:00', 1),
(54, 'samim_hasan@gmail.com', '23580009866', 'Samim Hasan', 'Samim Hasan', 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:49.0) Gecko/20100101 Firefox/49.0', 2, '2016-11-14 11:09:31', 1),
(55, 'haas@gmail.com', '0123456789', 'Harald Haas', 'Hello World!', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', NULL, '2016-11-19 06:54:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_id`, `firstname`, `lastname`, `phone`, `mobile`, `address`, `sex`, `blood_group`, `date_of_birth`, `affliate`, `picture`, `created_by`, `create_date`, `status`) VALUES
(9, 'P7OGZGC3', 'Tuhin', 'Sorkar', '0123456789', '0123456789', 'Test', 'Male', '', '2015-11-01', NULL, 'assets/images/patient/2016-10-13/A1.jpg', 2, '2016-09-04', 1),
(10, 'PDX3KY02', 'Raihan', 'Rahman', '0123456789', '0123456789', 'Test', 'Male', 'B-', '2016-09-29', NULL, 'assets/images/patient/2016-10-13/t1.jpg', 2, '2011-10-19', 1),
(11, 'PEJNSXWO', 'Kamal', 'Uddin', '', '0123456789', 'Test', 'Male', 'B+', '1988-10-02', NULL, 'assets/images/patient/2016-10-13/W.jpg', 2, '2016-08-10', 1),
(12, 'PEJNSXWC', 'Hashem', 'Roy', '0123456789', '0123456789', 'Test', 'Male', 'O+', '1988-10-02', NULL, 'assets/images/patient/2016-10-13/W.jpg', 2, '2016-08-03', 1),
(13, 'P02DQ9T1', 'Hello', 'World', '0123456789', '0123456789', 'Test Address', 'Female', 'O+', '1996-10-01', NULL, 'assets/images/patient/2016-10-27/d.jpg', 9, '2016-10-27', 1),
(15, 'PSUR2YIC', 'Hello', 'World', '0123456789', '0123456789', 'Test Address', 'Female', 'B+', '1996-10-01', NULL, '', 2, '2016-10-27', 1),
(16, 'PF3A7NPY', 'Nazmul', 'Islam', '0123456789', '0123456789', 'Test', 'Male', 'O-', '2010-10-01', NULL, 'assets/images/patient/2016-10-27/i.jpg', 9, '2016-10-27', 1),
(17, 'PB92AZ7I', 'Hasan', 'Mashood', '0123456789', '0123456789', 'Noakhali', 'Male', 'AB+', '1996-10-01', NULL, 'assets/images/patient/2016-10-27/i1.jpg', 1, '2016-10-27', 1),
(18, 'PMO8J6J9', 'Jhon', 'Doe', '0123456789', '0123456789', 'TEST', 'Male', 'A+', '2016-11-19', NULL, NULL, NULL, '2016-11-19', 1),
(19, 'P5FJJUQS', 'Jhon', 'Doe', '0123456789', '0123456789', 'TEST', 'Male', 'A+', '2016-11-19', NULL, NULL, NULL, '2016-11-19', 1),
(20, 'PHO969YL', 'Jhon', 'Doe', '0123456789', '0123456789', 'TEST', 'Male', 'A+', '2016-11-01', NULL, NULL, NULL, '2016-11-19', 1),
(21, 'P2FBAKE0', 'Jhon', 'Doe', '0123456789', '0123456789', 'TEST', 'Male', 'A+', '2016-11-01', NULL, 'assets/images/patient/2016-11-19/A.jpg', NULL, '2016-11-19', 1),
(23, 'P4FXWA25', 'Jhon', 'Doe', '0123456789', '0123456789', 'TEST', 'Male', 'A+', '2016-11-01', NULL, 'assets/images/patient/2016-11-19/A3.jpg', NULL, '2016-11-19', 1),
(24, 'PPBSFHZP', 'Harald', 'Hass', '0123456789', '0123456789', 'Edinburgh, Scotland', 'Male', 'A+', '2016-11-01', NULL, 'assets/images/patient/2016-11-19/K.jpg', 2, '2016-11-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `available_days` varchar(50) DEFAULT NULL,
  `per_patient_time` time DEFAULT NULL,
  `serial_visibility_type` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `doctor_id`, `start_time`, `end_time`, `available_days`, `per_patient_time`, `serial_visibility_type`, `status`) VALUES
(5, 8, '09:00:00', '12:00:00', 'Monday', '00:30:00', 2, 1),
(6, 1, '09:00:00', '12:00:00', 'Tuesday', '00:30:00', 1, 1),
(9, 7, '10:00:00', '20:00:00', 'Sunday', '00:30:00', 2, 1),
(10, 7, '10:00:00', '20:00:00', 'Thursday', '00:30:00', 1, 1),
(11, 1, '11:00:00', '10:00:00', 'Sunday', '13:35:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `title`, `description`, `email`, `phone`, `logo`, `favicon`, `footer_text`) VALUES
(1, 'Hospital Application System', 'Hospital Application System', 'admin@example.com', '0123456788', 'assets/images/apps/2016-11-17/l.png', 'assets/images/icons/2016-11-02/f.ico', '©2016 bdtask.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `user_role`, `designation`, `department_id`, `address`, `phone`, `mobile`, `short_biography`, `picture`, `specialist`, `date_of_birth`, `sex`, `blood_group`, `degree`, `created_by`, `create_date`, `update_date`, `status`) VALUES
(1, 'Samim', 'Khan', 'doctor@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '', 2, 'Test', '0123456798', '0123456798', '', 'assets/images/doctor/2016-11-03/d1.png', '', '2016-10-12', 'Male', 'A+', '', 2, '2016-11-03', NULL, 1),
(2, 'Shohrab', 'Hossain', 'admin@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '', 0, 'Dhaka', '01821742285', '01821742285', '', 'assets/images/doctor/2016-11-14/i.jpg', '', '1994-02-10', 'Male', 'B+', '', 2, '2016-11-17', NULL, 1),
(4, 'Md. Jabed', 'Mahmud', 'doctor@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'Frontent Developer', 1, 'Test', '0123456798', '1234567890', '<p>TEST</p>', 'assets/images/representative/2016-10-23/i1.jpg', 'MBBS', '2016-10-11', 'Male', 'B-', '<p>TEST</p>', 2, '2016-10-15', NULL, 1),
(7, 'Jahed', 'Abdullah', 'tuhin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, 'Seniro Doctor', 3, 'sdfsdfXSDFSDF', '01234567980', '01234567980', '<p>TEST</p>', 'assets/images/doctor/2016-11-03/a1.jpg', 'MBBS', '2016-10-11', 'Male', 'A+', '<p>asdfsadf sdfasdfsdf</p>', 2, '2016-11-03', NULL, 1),
(8, 'Naeem', 'Khan', 'naeem@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'Frontent Developer', 1, 'Dhaka', '1234567890', '1234567890', '<p>sdfaasdfasdfs</p>', 'assets/images/doctor/2016-11-03/d2.png', '', '2016-10-10', 'Male', 'B+', '<p>asdfsdfsdafsasdfsdfsdf</p>', 2, '2016-11-14', NULL, 1),
(9, 'Kamrul', 'Anam', 'agent@demo.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, '', 2, 'Dhaka Bangladesh', '0180525666', '0182554885', '', 'assets/images/representative/2016-10-25/i.jpg', '', '2016-10-02', 'Male', 'B-', '', 2, '2016-10-15', NULL, 1),
(10, 'Jane ', 'Doe', 'jane@example.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'Doctor', 2, 'Dhaka, Bangladesh', '1234567890', '1234567890', '<p>Test</p>', 'assets/images/doctor/2016-11-03/d.png', '', '1994-11-01', 'Female', 'B+', '', 2, '2016-11-03', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ws_comment`
--

DROP TABLE IF EXISTS `ws_comment`;
CREATE TABLE IF NOT EXISTS `ws_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `add_to_website` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ws_comment`
--

INSERT INTO `ws_comment` (`id`, `item_id`, `name`, `email`, `comment`, `date`, `add_to_website`) VALUES
(17, 22, 'Admin', 'Test@test.com', 'TEST', '2016-11-08 07:41:34', 2),
(20, 19, 'Sahed', 'sahed@gmail.com', 'The quick brown fox jumps over the lazy dog.\r\nTHE QUICK BROWN FOX JUMPS OVER THE LAZY DOG\r\nThe Quick Brown Fox Jumps Over The Lazy Dog\r\nTHe QUick BRown FOx Jumps OVer THe LAzy DOg\r\nthE quicK browN foX jumpS oveR thE lazY doG', '2016-11-08 08:10:53', 1),
(23, 19, 'Rahim', 'rahim@example.com', '     \r\n\r\n90% Unlimited Downloads Choose from Over 300,000 Vectors, Graphics & Photos.\r\nads via Carbon\r\n\r\nYou asked, Font Awesome delivers with 41 shiny new icons in version 4.7. Want to request new icons? Here''s how. Need vectors or want to use on the desktop? Check the cheatsheet.\r\n', '2016-11-08 08:25:06', 2),
(27, 18, 'Shohrab Hossain', 'sourav@example.com', 'This is test comment.\r\n[removed]alert&amp;#40;''Hospital''&amp;#41;[removed]', '2016-11-08 08:31:42', 6),
(30, 17, 'Shohrab Hossain', 'admin@example.com', 'TEst', '2016-11-08 08:35:58', 2),
(31, 17, 'Shohrab Hossain', 'admin@example.com', 'Shohrab Hossain', '2016-11-08 08:36:29', 2),
(32, 17, 'Hello World', 'hello@world.com', 'please visit Font Awesome\r\n\r\nhttp://fontawesome.io/icons/', '2016-11-08 08:37:18', 2),
(34, 23, '--; 0'' OR ''1''=''1', 'admin@example.com', 'Test', '2016-11-08 08:41:26', NULL),
(36, 1, 'TEST', 'hello@world.com', 'TEST', '2016-11-08 10:59:55', 2),
(37, 4, 'Al Amin', 'alamin@gmail.com', 'TEST COMMENTS', '2016-11-09 07:46:15', 2),
(38, 4, 'Hello World', 'hello@world.com', 'HELLO WORLD', '2016-11-09 07:46:43', 2),
(39, 4, 'Al Amin', 'hello@world.com', 'TEST', '2016-11-09 08:04:22', 2),
(40, 18, 'Jahangir Alam', 'jahangirmahi1@gmail.com', 'I honestly just don''t know what else to do...\r\nI am a jewelry designer and opened my shop back in June 2016. I have been all over social media, sending out emails, etc... and as a result I receive likes, followers, traffic but NO SALES.\r\nRead More ', '2016-11-09 08:07:39', 3),
(41, 18, 'Hello World', 'hello@world.com', 'Test', '2016-11-09 08:26:43', 3),
(42, 18, 'Jahangir Alam', 'jahangirmahi1@gmail.com', 'TEST AGAIN', '2016-11-09 08:27:15', 2),
(43, 18, 'Hasan ', 'hasan@gmail.com', 'Hi, \r\nThis is awesome article\r\nLove it!', '2016-11-09 08:28:03', 2),
(44, 18, 'Naeem', 'naeem@gmail.com', 'Demo Hospital Limited...\r\ncopyright&amp;copy; All rights reserved.\r\nPower by bdtask.\r\nOfficial website Bdtask', '2016-11-10 07:12:27', 2),
(45, 2, 'Naeem', 'naeem@gmail.com', 'Test comment', '2016-11-10 07:30:01', 2),
(46, 2, 'Naeem', 'naeem@gmail.com', 'TEST', '2016-11-10 07:30:43', 2),
(47, 18, 'Jane Doe', 'jane@doe.com', 'Hello World!', '2016-11-10 10:31:09', 2),
(48, 6, 'Jane Doe', 'jane@doe.com', 'This is example comment...', '2016-11-10 11:04:11', 2),
(49, 6, 'Jane Doe', 'jane@doe.com', 'This is second comment', '2016-11-10 11:04:42', 2),
(50, 22, 'Naeem', 'naeem@gmail.com', 'Demo hospital limited...', '2016-11-10 11:05:19', 2),
(51, 22, 'Naeem', 'jane@doe.com', 'LEAVE A COMMENT', '2016-11-10 11:29:53', 2),
(52, 2, 'Jane Doe', 'jane@doe.com', 'LEAVE A COMMENT', '2016-11-10 11:30:48', 2),
(53, 17, 'Jahed Abdullah', 'jahed@example.com', 'Jahed Abdullah', '2016-11-13 08:12:13', 2),
(54, 1, 'Tuhin Sorkar', 'tuhin@example.com', 'Emergency Care Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Call Center 24/7 Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '2016-11-13 01:41:25', 1),
(55, 1, 'Jahed Abdullah', 'jahed@example.com', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration…', '2016-11-13 01:45:28', 1),
(56, 17, 'Samim Hasan', 'samim_hasan@gmail.com', 'TEST COMMENT', '2016-11-14 06:36:59', 2),
(57, 4, 'Jennifer ', 'jennifer@example.com', 'Awesome!', '2016-11-14 11:58:32', 2),
(58, 17, 'Hasan', 'hasan@boss.com', 'Hasan Boss', '2016-11-14 01:51:26', 1),
(59, 17, 'Zahid', 'zahid.samorita@sebaghar.com', 'Test Comment', '2016-11-15 06:24:31', 2),
(60, 18, 'Harald Haas', 'haas@gmail.com', 'Hello World!', '2016-11-19 06:55:05', 2),
(61, 1, 'Harald Haas', 'haas@gmail.com', 'TEST', '2016-11-19 07:58:23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ws_item`
--

DROP TABLE IF EXISTS `ws_item`;
CREATE TABLE IF NOT EXISTS `ws_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `icon_image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `position` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `counter` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ws_item`
--

INSERT INTO `ws_item` (`id`, `name`, `icon_image`, `title`, `description`, `position`, `status`, `counter`, `date`) VALUES
(1, 'about', 'assets_web/images/icon_image/2016-11-07/a1.jpg', 'About Us', 'Emergency Care Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Call Center 24/7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Call Center 24/7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Blood Test Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Cardiac Surgery Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Dental Care Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Outdoor Checkup Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Ophthalmology Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Heart disease Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever', 0, 1, 4, '2016-11-10'),
(2, 'about', 'assets_web/images/icon_image/2016-11-05/b2.jpg', 'Our Vision & Mission', 'Emergency Care Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Call Center 24/7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Call Center 24/7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Blood Test Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Cardiac Surgery Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Dental Care Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Outdoor Checkup Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Ophthalmology Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever Heart disease Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever', 2, 1, 2, '2016-11-10'),
(3, 'service', 'assets_web/images/icon_image/2016-11-05/C.jpg', 'Call Center 24/7', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever', 2, 1, 21, '2016-11-05'),
(4, 'blog', 'assets_web/images/icon_image/2016-11-05/b1.jpg', 'Predefined functions', '<p>JavaScript has several top-level, built-in functions: eval&#40;&#41; The eval&#40;&#41; method evaluates JavaScript code represe</p>', 0, 1, 113, '2016-11-05'),
(5, 'blog', 'assets_web/images/icon_image/2016-11-05/b3.jpg', 'Blog Title 2', '<p>There are many variations passages available, but the lorem, ipsum sit have suffered alteration</p>', 2, 1, 104, '2016-11-05'),
(6, 'blog', 'assets_web/images/icon_image/2016-11-05/s.jpg', 'Blog Title 3', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BCContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BCContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</p>', 3, 1, 25, '2016-11-05'),
(7, 'service', 'assets_web/images/icon_image/2016-11-05/c1.jpg', 'Emergency Care', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever', 1, 1, 11, '2016-11-05'),
(8, 'service', 'assets_web/images/icon_image/2016-11-05/l.gif', 'Cardiac Surgery', ' \r\n\r\nCall Center 24/7\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever\r\n', 3, 1, 11, '2016-11-05'),
(9, 'service', 'assets_web/images/icon_image/2016-11-05/s1.jpg', 'Dental Care', ' \r\n\r\nCall Center 24/7\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever\r\n', 4, 1, 11, '2016-11-05'),
(10, 'service', 'assets_web/images/icon_image/2016-11-05/.jpeg', ' Ophthalmology', ' \r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever\r\n', 5, 1, 13, '2016-11-05'),
(11, 'service', '', 'Heart disease', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever', 6, 1, 13, '2016-11-05'),
(12, 'appointment', 'assets_web/images/icon_image/2016-11-05/a.jpg', 'Test Appointment', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.', 1, 1, 13, '2016-11-05'),
(14, 'appointment', 'assets_web/images/icon_image/2016-11-05/c1.jpg', 'Emergency Care', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever', 1, 1, 30, '2016-11-05'),
(15, 'appointment', 'assets_web/images/icon_image/2016-11-05/l.gif', 'Cardiac Surgery', ' \r\n\r\nCall Center 24/7\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever\r\n', 3, 1, 16, '2016-11-05'),
(16, 'appointment', 'assets_web/images/icon_image/2016-11-09/t.jpg', 'Cardiac Surgery', '  Call Center 24/7 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever', 3, 1, 0, '2016-11-09'),
(17, 'blog', 'assets_web/images/icon_image/2016-11-05/C.jpg', 'Call Center 24/7', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever</p>', 2, 1, 4, '2016-11-17'),
(18, 'blog', 'assets_web/images/icon_image/2016-11-06/t.jpg', '3 Latest Headphones for Music Fans in Bangladesh', '<p>Here’s a question for you! What exactly are you using these days for listening to your music collection while you are at home, at work or you are on the move?</p>\r\n<p>Your answer would most probably be the terrible headphones you got packed along with your iPhone, cellular phone or the ones you stole from your younger brother. Whether you are using in-ears or over-ears for listening to your music library, you need making sure that your headphones are of top quality. By making use of cheap headphones we are doing our music library, a flagrant disservice by marrying it off to sub-standard headphones. As mentioned at Wikipedia as well as at various other sources, Bangladesh is one of the fastest growing electronics and multimedia markets in the world; which is the reason why you can find a great diversity in headphones across this part of the world.</p>\r\n<p>We have compiled a list of few latest headphones that have hit the Bangladeshi market with a bang!</p>', 1, 1, 177, '2016-11-06'),
(22, 'blog', 'assets_web/images/icon_image/2016-11-05/s.jpg', 'Blog Title 22', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BCContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BCContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</p>', 3, 1, 86, '2016-11-05'),
(23, 'blog', 'assets_web/images/icon_image/2016-11-05/s.jpg', 'Blog Title 23', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BCContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BCContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</p>', 3, 1, 68, '2016-11-05');

-- --------------------------------------------------------

--
-- Table structure for table `ws_section`
--

DROP TABLE IF EXISTS `ws_section`;
CREATE TABLE IF NOT EXISTS `ws_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `featured_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ws_section`
--

INSERT INTO `ws_section` (`id`, `name`, `title`, `description`, `featured_image`) VALUES
(19, 'service', 'Service We Offer', 'Our department & special service ', 'assets_web/images/uploads/2016-11-02/b.jpg'),
(20, 'about', 'About Us', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature froLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,m 45 BC.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.', 'assets_web/images/uploads/2016-11-05/a1.jpg'),
(23, 'appointment', 'Why Choose Us', 'Our department & special service ', 'assets_web/images/uploads/2016-11-06/d.png'),
(26, 'doctor', 'OUR DOCTOR', 'Our department & special service ', 'assets_web/images/uploads/2016-11-05/d.png'),
(27, 'department', 'DEPARTMENT', 'Our department & special service 2', ''),
(28, 'blog', 'Lates Blog', 'Latest topics of the webstie', 'assets_web/images/uploads/2016-11-05/c.png');

-- --------------------------------------------------------

--
-- Table structure for table `ws_setting`
--

DROP TABLE IF EXISTS `ws_setting`;
CREATE TABLE IF NOT EXISTS `ws_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ws_setting`
--

INSERT INTO `ws_setting` (`id`, `title`, `description`, `logo`, `favicon`, `meta_tag`, `meta_keyword`, `email`, `phone`, `address`, `copyright_text`, `twitter_api`, `google_map`, `facebook`, `twitter`, `vimeo`, `instagram`, `dribbble`, `skype`, `google_plus`, `status`) VALUES
(3, 'Demo Hospital Limited', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. ', 'assets_web/images/icons/2016-11-03/l1.png', 'assets_web/images/icons/2016-11-03/f.png', 'Hospital, Appointment, System', '                                          Hospital Appointment System', 'demo@hospital.com', '0123456788', '123/A, Street, State-12345, Demo', '<p>© 2016 <a title="BdTask" href="http://bdtask.com" target="_blank">bdtask</a>. All rights reserved </p>', '<a class="twitter-timeline" data-lang="en" data-dnt="true" data-link-color="#207FDD" href="https://twitter.com/taylorswift13">Tweets by taylorswift13</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>', '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29215.021939977993!2d90.40923229999999!3d23.75173875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sbn!2sbd!4v1477987829881" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'http://facebook.com/', 'http://', 'http://', 'http://', 'http://', 'http://', 'http://', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ws_slider`
--

DROP TABLE IF EXISTS `ws_slider`;
CREATE TABLE IF NOT EXISTS `ws_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(100) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ws_slider`
--

INSERT INTO `ws_slider` (`id`, `title`, `subtitle`, `description`, `image`, `position`, `status`) VALUES
(1, '', '', '', 'assets_web/images/slider/2016-11-03/a2.jpg', 3, 1),
(2, 'Welcome to', 'Demo Hospital', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', 'assets_web/images/slider/2016-11-03/b.jpg', 0, 1),
(5, 'Second Slide ', 'Welcome back - Second slide', '<p><strong>Lorem Ipsum</strong></p>\r\n<hr>\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>\r\n<p>- Demo Hospital Limited</p>', 'assets_web/images/slider/2016-11-03/s.jpg', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

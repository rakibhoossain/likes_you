-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 14, 2019 at 06:18 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `likesyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `fb_user`
--

DROP TABLE IF EXISTS `fb_user`;
CREATE TABLE IF NOT EXISTS `fb_user` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(17) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `update_date` date DEFAULT NULL,
  `count` int(10) DEFAULT '1',
  PRIMARY KEY (`sn`),
  UNIQUE KEY `sn` (`sn`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fb_user`
--

INSERT INTO `fb_user` (`sn`, `id`, `name`, `update_date`, `count`) VALUES
(65, '100007084030087', 'Samiul Islam Sakil', '2019-09-14', 2),
(64, '100007882086052', 'Kawsar Ahmed Neloy', '2019-09-14', 2),
(63, '100007497423395', 'ALvine ALim', '2019-09-14', 2),
(62, '100008361792105', 'Mehedi Hasan Joy', '2019-09-14', 2),
(61, '100002743160358', 'Morshadul Hasan', '2019-09-14', 2),
(60, '100008752390554', 'Anisur Rahman', '2019-09-14', 2),
(59, '100008457962738', 'Atif Aslam', '2019-09-14', 2),
(58, '100023095130843', 'Krishnendu Goswami', '2019-09-14', 2),
(57, '100005468956500', 'Wakil Ahmed', '2019-09-14', 2),
(56, '100006906998186', 'Fazly Rabby', '2019-09-14', 2),
(55, '100011271283623', 'BM Mazharul Islam', '2019-09-14', 2),
(54, '100002299368434', 'Atiqul Islam Chowdhury', '2019-09-14', 2),
(53, '100008930670587', 'Momin Sarkar', '2019-09-14', 2),
(52, '100005323364740', 'Hassan Shuvo', '2019-09-14', 2),
(51, '100006531939088', 'Md Nashed Ahmed', '2019-09-14', 2),
(50, '100029800503795', 'Mir Forid', '2019-09-14', 2),
(49, '100002610251918', 'Nirob Khan', '2019-09-14', 2),
(48, '100009085557606', 'MD Kawsar Ahmed', '2019-09-14', 2),
(47, '100008045899414', 'MD Momin Hossain', '2019-09-14', 2),
(46, '100006665743448', 'Sokal Afrin Sokal', '2019-09-14', 2),
(45, '100007195030094', 'Rocky Roy', '2019-09-14', 2),
(44, '100003768745629', 'Md. Jahirul Alam Reza', '2019-09-14', 2),
(43, '100004731736387', 'Badsha Alom', '2019-09-14', 2),
(42, '1673570132', 'Mohammad Khairul Islam', '2019-09-14', 2),
(41, '100005265823065', 'S M Abu Sahad', '2019-09-14', 2),
(40, '100011290907102', 'Mahmuder Rahman Mahmud', '2019-09-14', 2),
(39, '100003132535867', 'Sibbir Ahmed Kausar', '2019-09-14', 2),
(66, '100003436256360', 'Manik Al Hasan', '2019-09-14', 2),
(67, '100001352079430', 'Ishrak Ananto', '2019-09-14', 2),
(68, '100003032841335', 'Ariful Islam', '2019-09-14', 2),
(69, '100010143211520', 'MD Firoj', '2019-09-14', 2),
(70, '100008053545680', 'রায়হান প্রধান', '2019-09-14', 2),
(71, '100007866424665', 'Hira Sarkar', '2019-09-14', 2),
(72, '100007268466033', 'Alamgir Hossan Ashik', '2019-09-14', 2),
(73, '100005981777813', 'রিকন সরকার', '2019-09-14', 2),
(74, '100003199194543', 'Md Jasimuddin', '2019-09-14', 2),
(75, '100001785358709', 'NaSir Rahman', '2019-09-14', 2),
(76, '100001656247452', 'Sahadat Sagar', '2019-09-14', 2),
(77, '100005698937861', 'Khokon Reza', '2019-09-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fb_user_all`
--

DROP TABLE IF EXISTS `fb_user_all`;
CREATE TABLE IF NOT EXISTS `fb_user_all` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(17) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `update_date` date DEFAULT NULL,
  PRIMARY KEY (`sn`),
  UNIQUE KEY `sn` (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fb_user_all`
--

INSERT INTO `fb_user_all` (`sn`, `id`, `name`, `update_date`) VALUES
(130, '100002299368434', 'Atiqul Islam Chowdhury', '2019-09-14'),
(129, '100008930670587', 'Momin Sarkar', '2019-09-14'),
(128, '100005323364740', 'Hassan Shuvo', '2019-09-14'),
(127, '100006531939088', 'Md Nashed Ahmed', '2019-09-14'),
(126, '100029800503795', 'Mir Forid', '2019-09-14'),
(125, '100002610251918', 'Nirob Khan', '2019-09-14'),
(124, '100009085557606', 'MD Kawsar Ahmed', '2019-09-14'),
(123, '100008045899414', 'MD Momin Hossain', '2019-09-14'),
(122, '100006665743448', 'Sokal Afrin Sokal', '2019-09-14'),
(121, '100007195030094', 'Rocky Roy', '2019-09-14'),
(120, '100003768745629', 'Md. Jahirul Alam Reza', '2019-09-14'),
(119, '100004731736387', 'Badsha Alom', '2019-09-14'),
(118, '1673570132', 'Mohammad Khairul Islam', '2019-09-14'),
(117, '100005265823065', 'S M Abu Sahad', '2019-09-14'),
(116, '100011290907102', 'Mahmuder Rahman Mahmud', '2019-09-14'),
(115, '100003132535867', 'Sibbir Ahmed Kausar', '2019-09-14'),
(114, '100001656247452', 'Sahadat Sagar', '2019-09-15'),
(113, '100001785358709', 'NaSir Rahman', '2019-09-15'),
(112, '100003199194543', 'Md Jasimuddin', '2019-09-15'),
(111, '100005981777813', 'রিকন সরকার', '2019-09-15'),
(110, '100007268466033', 'Alamgir Hossan Ashik', '2019-09-15'),
(109, '100007866424665', 'Hira Sarkar', '2019-09-15'),
(108, '100008053545680', 'রায়হান প্রধান', '2019-09-15'),
(107, '100010143211520', 'MD Firoj', '2019-09-15'),
(106, '100003032841335', 'Ariful Islam', '2019-09-15'),
(105, '100001352079430', 'Ishrak Ananto', '2019-09-15'),
(104, '100003436256360', 'Manik Al Hasan', '2019-09-15'),
(103, '100007084030087', 'Samiul Islam Sakil', '2019-09-15'),
(102, '100007882086052', 'Kawsar Ahmed Neloy', '2019-09-15'),
(101, '100007497423395', 'ALvine ALim', '2019-09-15'),
(100, '100008361792105', 'Mehedi Hasan Joy', '2019-09-15'),
(99, '100002743160358', 'Morshadul Hasan', '2019-09-15'),
(98, '100008752390554', 'Anisur Rahman', '2019-09-15'),
(97, '100008457962738', 'Atif Aslam', '2019-09-15'),
(96, '100023095130843', 'Krishnendu Goswami', '2019-09-15'),
(95, '100005468956500', 'Wakil Ahmed', '2019-09-15'),
(94, '100006906998186', 'Fazly Rabby', '2019-09-15'),
(93, '100011271283623', 'BM Mazharul Islam', '2019-09-15'),
(92, '100002299368434', 'Atiqul Islam Chowdhury', '2019-09-15'),
(91, '100008930670587', 'Momin Sarkar', '2019-09-15'),
(90, '100005323364740', 'Hassan Shuvo', '2019-09-15'),
(89, '100006531939088', 'Md Nashed Ahmed', '2019-09-15'),
(88, '100029800503795', 'Mir Forid', '2019-09-15'),
(87, '100002610251918', 'Nirob Khan', '2019-09-15'),
(86, '100009085557606', 'MD Kawsar Ahmed', '2019-09-15'),
(85, '100008045899414', 'MD Momin Hossain', '2019-09-15'),
(84, '100006665743448', 'Sokal Afrin Sokal', '2019-09-15'),
(83, '100007195030094', 'Rocky Roy', '2019-09-15'),
(82, '100003768745629', 'Md. Jahirul Alam Reza', '2019-09-15'),
(81, '100004731736387', 'Badsha Alom', '2019-09-15'),
(80, '1673570132', 'Mohammad Khairul Islam', '2019-09-15'),
(79, '100005265823065', 'S M Abu Sahad', '2019-09-15'),
(78, '100011290907102', 'Mahmuder Rahman Mahmud', '2019-09-15'),
(77, '100003132535867', 'Sibbir Ahmed Kausar', '2019-09-15'),
(131, '100011271283623', 'BM Mazharul Islam', '2019-09-14'),
(132, '100006906998186', 'Fazly Rabby', '2019-09-14'),
(133, '100005468956500', 'Wakil Ahmed', '2019-09-14'),
(134, '100023095130843', 'Krishnendu Goswami', '2019-09-14'),
(135, '100008457962738', 'Atif Aslam', '2019-09-14'),
(136, '100008752390554', 'Anisur Rahman', '2019-09-14'),
(137, '100002743160358', 'Morshadul Hasan', '2019-09-14'),
(138, '100008361792105', 'Mehedi Hasan Joy', '2019-09-14'),
(139, '100007497423395', 'ALvine ALim', '2019-09-14'),
(140, '100007882086052', 'Kawsar Ahmed Neloy', '2019-09-14'),
(141, '100007084030087', 'Samiul Islam Sakil', '2019-09-14'),
(142, '100003436256360', 'Manik Al Hasan', '2019-09-14'),
(143, '100001352079430', 'Ishrak Ananto', '2019-09-14'),
(144, '100003032841335', 'Ariful Islam', '2019-09-14'),
(145, '100010143211520', 'MD Firoj', '2019-09-14'),
(146, '100008053545680', 'রায়হান প্রধান', '2019-09-14'),
(147, '100007866424665', 'Hira Sarkar', '2019-09-14'),
(148, '100007268466033', 'Alamgir Hossan Ashik', '2019-09-14'),
(149, '100005981777813', 'রিকন সরকার', '2019-09-14'),
(150, '100003199194543', 'Md Jasimuddin', '2019-09-14'),
(151, '100001785358709', 'NaSir Rahman', '2019-09-14'),
(152, '100001656247452', 'Sahadat Sagar', '2019-09-14'),
(153, '100005698937861', 'Khokon Reza', '2019-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `fb_user_old`
--

DROP TABLE IF EXISTS `fb_user_old`;
CREATE TABLE IF NOT EXISTS `fb_user_old` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(17) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` date DEFAULT NULL,
  `count` int(10) DEFAULT NULL,
  PRIMARY KEY (`sn`),
  UNIQUE KEY `sn` (`sn`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fb_user_old`
--

INSERT INTO `fb_user_old` (`sn`, `id`, `name`, `date`, `count`) VALUES
(87, '100009477049112', 'Md Sadek Hossin Khoka', NULL, NULL),
(88, '100008005060179', 'Md Sumon', NULL, NULL),
(89, '100015876940882', 'Vorer Pakhi', NULL, NULL),
(90, '100015194797982', 'Sumon Ahmed Sr.', NULL, NULL),
(91, '100013148837994', 'আলো আঁধার জীবন', NULL, NULL),
(92, '100012176043115', 'Mahmuda Khanom', NULL, NULL),
(93, '100010537967445', 'Juwel Hossain Desh', NULL, NULL),
(94, '100010340702688', 'রাত জাগা পাখি', NULL, NULL),
(95, '100010265297422', 'Shujon Khan', NULL, NULL),
(96, '100009913991651', 'Tarek Hasan', NULL, NULL),
(97, '100009793141940', 'Hafizur Rahaman', NULL, NULL),
(98, '100009676751240', 'MD Røkîbüllæh Shøhäñ', NULL, NULL),
(99, '100009623402446', 'Munsur Rahman', NULL, NULL),
(100, '100008772883371', 'Nahar Afrin', NULL, NULL),
(101, '100008447836820', 'ভালোবাসা অসমাপ্ত', NULL, NULL),
(102, '100008295098978', 'Khan MD Amin', NULL, NULL),
(103, '100008264928752', 'Abid Hasan Akash', NULL, NULL),
(104, '100008226884820', 'Robin Khan', NULL, NULL),
(105, '100008047934833', 'Almas Uddin Avash', NULL, NULL),
(106, '100007300964233', 'Kazi Seam Shafin', NULL, NULL),
(107, '100007265499128', 'Rifat Pk', NULL, NULL),
(108, '100007180179334', 'Misty Abir', NULL, NULL),
(109, '100007149730049', 'Soumik Ahmed Mizan', NULL, NULL),
(110, '100006860236805', 'Rashed Patwary', NULL, NULL),
(111, '100006848358791', 'Rasel Kobir', NULL, NULL),
(112, '100005471388809', 'Reza Rezaul Karim', NULL, NULL),
(113, '100005276389403', 'Sazzat Hossain Shojib', NULL, NULL),
(114, '100005089968792', 'Md Gaffar Khan', NULL, NULL),
(115, '100004927332494', 'Fahad Munna', NULL, NULL),
(116, '100003310791022', 'Amitabh Chokraborty', NULL, NULL),
(117, '100015822643974', 'Adnan Shojib', NULL, NULL),
(118, '100011710253765', 'Naymul Ashfak', NULL, NULL),
(119, '100010426359575', 'Md Mizanur Rahman', NULL, NULL),
(120, '100009049921073', 'Shakib Bari', NULL, NULL),
(121, '100008517301859', 'SM-Pappu Hossain', NULL, NULL),
(122, '100006614561011', 'Selim Reza', NULL, NULL),
(123, '100013108218444', 'Ojhor Bristy', NULL, NULL),
(124, '100012307393066', 'নিল চিঠি', NULL, NULL),
(125, '100009055875549', 'Md Jannat Hossain', NULL, NULL),
(126, '100007853252347', 'MD Raja Hossen', NULL, NULL),
(127, '100007470367499', 'Nill Akasher Chadni', NULL, NULL),
(128, '100007469923563', 'Mehedi Hasan Alif', NULL, NULL),
(129, '100007341701447', 'Km Emran Hossaan', NULL, NULL),
(130, '100007315750737', 'Jahidul Islam Korno ', NULL, NULL),
(131, '100007052460353', 'Mehedi Hasan Shishir', NULL, NULL),
(132, '100006915580051', 'Md Sujon Mahamud Sohan', NULL, NULL),
(133, '100006277477561', 'Nk Nissan Khan', NULL, NULL),
(134, '100005931708927', 'Mahabub Hasan', NULL, NULL),
(135, '100014543371149', 'Md Shahin Khan', NULL, NULL),
(136, '100010750868825', 'Md Rafsan Kabir', NULL, NULL),
(137, '100006966584417', 'Md Rafiqul Islam', NULL, NULL),
(138, '100001721215889', 'Mir Emon', NULL, NULL),
(139, '100012055120392', 'Rubel Hossain Mihir', NULL, NULL),
(140, '100011312767313', 'Shariful Islam', NULL, NULL),
(141, '100009583667211', 'AL Mamun', NULL, NULL),
(142, '100008499284760', 'Arif Khan', NULL, NULL),
(143, '100008303259031', 'Arif AJ', NULL, NULL),
(144, '100007316744036', 'MD Ripon Khan', NULL, NULL),
(145, '100007282413500', 'Naymul Ashfak Shamim', NULL, NULL),
(146, '100006986744226', 'Unsmart Boy Mamun', NULL, NULL),
(147, '100006795244401', 'Zahid Hasan', NULL, NULL),
(148, '100006642990387', 'Sayed Khan', NULL, NULL),
(149, '100005431606543', 'Sojib Molla', NULL, NULL),
(150, '100003632122753', 'Rifat Bin Rahat', NULL, NULL),
(151, '100002913307630', 'S M Saddam Hossain', NULL, NULL),
(152, '100009912727459', 'Shakhawat Hossain', NULL, NULL),
(153, '100009581280314', 'Miskatul Abir', NULL, NULL),
(154, '100009417685242', 'Marquies Rana', NULL, NULL),
(155, '100007898478967', 'আমি সুজানগরের বাসিন্দা', NULL, NULL),
(156, '100007454223857', 'Shahriar', NULL, NULL),
(157, '100005009688089', 'Selim Hossan', NULL, NULL),
(158, '100011647565125', 'Kausar Mamun', NULL, NULL),
(159, '100007553384311', 'Hridoy Hossen Nisho', NULL, NULL),
(160, '100011941814303', 'Marufa Yasmin Liya', NULL, NULL),
(161, '100007464846845', 'Rezwanul Haque Rumon', NULL, NULL),
(162, '100006379835863', 'Aminul Islam', NULL, NULL),
(163, '100005593784946', 'A.H. Opurbo', NULL, NULL),
(164, '100005227125320', 'Alamin Khan', NULL, NULL),
(165, '100005147258584', 'Rase L Patwary', NULL, NULL),
(166, '100003628949145', 'Juwel Rana', NULL, NULL),
(167, '100012556955768', 'Kamrunn Nahar', NULL, NULL),
(168, '100010357417595', 'Sayed Khan', NULL, NULL),
(169, '100009679517799', 'Shabiba Tahmin Shanila', NULL, NULL),
(170, '100007996052143', 'Murad Siddique', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

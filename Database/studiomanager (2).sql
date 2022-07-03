-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2022 at 12:20 AM
-- Server version: 5.7.37-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studiomanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `attribute_parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attribute_parent_id`) VALUES
(5, 'Blue', 2),
(6, 'White', 2),
(7, 'M', 3),
(8, 'L', 3),
(9, 'Green', 2),
(10, 'Black', 2),
(12, 'Grey', 2),
(13, 'S', 3);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `branch_address` varchar(255) DEFAULT NULL,
  `branch_phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `active`, `branch_address`, `branch_phone`) VALUES
(5, 'Norfolks', 1, '31 Trinity Road', '1911712121'),
(6, 'Salt Lake', 1, '2A Church Road SL City', '1111111121');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `service_charge_value`, `vat_charge_value`, `address`, `phone`, `country`, `message`, `currency`) VALUES
(1, 'Infosys private', '13', '10', 'Madrid', '758676851', 'Spain', 'hello everyone one', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `shortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `shortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `shortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `shortname`, `name`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 93),
(2, 'AL', 'Albania', 355),
(3, 'DZ', 'Algeria', 213),
(4, 'AS', 'American Samoa', 1684),
(5, 'AD', 'Andorra', 376),
(6, 'AO', 'Angola', 244),
(7, 'AI', 'Anguilla', 1264),
(8, 'AQ', 'Antarctica', 0),
(9, 'AG', 'Antigua And Barbuda', 1268),
(10, 'AR', 'Argentina', 54),
(11, 'AM', 'Armenia', 374),
(12, 'AW', 'Aruba', 297),
(13, 'AU', 'Australia', 61),
(14, 'AT', 'Austria', 43),
(15, 'AZ', 'Azerbaijan', 994),
(16, 'BS', 'Bahamas The', 1242),
(17, 'BH', 'Bahrain', 973),
(18, 'BD', 'Bangladesh', 880),
(19, 'BB', 'Barbados', 1246),
(20, 'BY', 'Belarus', 375),
(21, 'BE', 'Belgium', 32),
(22, 'BZ', 'Belize', 501),
(23, 'BJ', 'Benin', 229),
(24, 'BM', 'Bermuda', 1441),
(25, 'BT', 'Bhutan', 975),
(26, 'BO', 'Bolivia', 591),
(27, 'BA', 'Bosnia and Herzegovina', 387),
(28, 'BW', 'Botswana', 267),
(29, 'BV', 'Bouvet Island', 0),
(30, 'BR', 'Brazil', 55),
(31, 'IO', 'British Indian Ocean Territory', 246),
(32, 'BN', 'Brunei', 673),
(33, 'BG', 'Bulgaria', 359),
(34, 'BF', 'Burkina Faso', 226),
(35, 'BI', 'Burundi', 257),
(36, 'KH', 'Cambodia', 855),
(37, 'CM', 'Cameroon', 237),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 238),
(40, 'KY', 'Cayman Islands', 1345),
(41, 'CF', 'Central African Republic', 236),
(42, 'TD', 'Chad', 235),
(43, 'CL', 'Chile', 56),
(44, 'CN', 'China', 86),
(45, 'CX', 'Christmas Island', 61),
(46, 'CC', 'Cocos (Keeling) Islands', 672),
(47, 'CO', 'Colombia', 57),
(48, 'KM', 'Comoros', 269),
(49, 'CG', 'Republic Of The Congo', 242),
(50, 'CD', 'Democratic Republic Of The Congo', 242),
(51, 'CK', 'Cook Islands', 682),
(52, 'CR', 'Costa Rica', 506),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 225),
(54, 'HR', 'Croatia (Hrvatska)', 385),
(55, 'CU', 'Cuba', 53),
(56, 'CY', 'Cyprus', 357),
(57, 'CZ', 'Czech Republic', 420),
(58, 'DK', 'Denmark', 45),
(59, 'DJ', 'Djibouti', 253),
(60, 'DM', 'Dominica', 1767),
(61, 'DO', 'Dominican Republic', 1809),
(62, 'TP', 'East Timor', 670),
(63, 'EC', 'Ecuador', 593),
(64, 'EG', 'Egypt', 20),
(65, 'SV', 'El Salvador', 503),
(66, 'GQ', 'Equatorial Guinea', 240),
(67, 'ER', 'Eritrea', 291),
(68, 'EE', 'Estonia', 372),
(69, 'ET', 'Ethiopia', 251),
(70, 'XA', 'External Territories of Australia', 61),
(71, 'FK', 'Falkland Islands', 500),
(72, 'FO', 'Faroe Islands', 298),
(73, 'FJ', 'Fiji Islands', 679),
(74, 'FI', 'Finland', 358),
(75, 'FR', 'France', 33),
(76, 'GF', 'French Guiana', 594),
(77, 'PF', 'French Polynesia', 689),
(78, 'TF', 'French Southern Territories', 0),
(79, 'GA', 'Gabon', 241),
(80, 'GM', 'Gambia The', 220),
(81, 'GE', 'Georgia', 995),
(82, 'DE', 'Germany', 49),
(83, 'GH', 'Ghana', 233),
(84, 'GI', 'Gibraltar', 350),
(85, 'GR', 'Greece', 30),
(86, 'GL', 'Greenland', 299),
(87, 'GD', 'Grenada', 1473),
(88, 'GP', 'Guadeloupe', 590),
(89, 'GU', 'Guam', 1671),
(90, 'GT', 'Guatemala', 502),
(91, 'XU', 'Guernsey and Alderney', 44),
(92, 'GN', 'Guinea', 224),
(93, 'GW', 'Guinea-Bissau', 245),
(94, 'GY', 'Guyana', 592),
(95, 'HT', 'Haiti', 509),
(96, 'HM', 'Heard and McDonald Islands', 0),
(97, 'HN', 'Honduras', 504),
(98, 'HK', 'Hong Kong S.A.R.', 852),
(99, 'HU', 'Hungary', 36),
(100, 'IS', 'Iceland', 354),
(101, 'IN', 'India', 91),
(102, 'ID', 'Indonesia', 62),
(103, 'IR', 'Iran', 98),
(104, 'IQ', 'Iraq', 964),
(105, 'IE', 'Ireland', 353),
(106, 'IL', 'Israel', 972),
(107, 'IT', 'Italy', 39),
(108, 'JM', 'Jamaica', 1876),
(109, 'JP', 'Japan', 81),
(110, 'XJ', 'Jersey', 44),
(111, 'JO', 'Jordan', 962),
(112, 'KZ', 'Kazakhstan', 7),
(113, 'KE', 'Kenya', 254),
(114, 'KI', 'Kiribati', 686),
(115, 'KP', 'Korea North', 850),
(116, 'KR', 'Korea South', 82),
(117, 'KW', 'Kuwait', 965),
(118, 'KG', 'Kyrgyzstan', 996),
(119, 'LA', 'Laos', 856),
(120, 'LV', 'Latvia', 371),
(121, 'LB', 'Lebanon', 961),
(122, 'LS', 'Lesotho', 266),
(123, 'LR', 'Liberia', 231),
(124, 'LY', 'Libya', 218),
(125, 'LI', 'Liechtenstein', 423),
(126, 'LT', 'Lithuania', 370),
(127, 'LU', 'Luxembourg', 352),
(128, 'MO', 'Macau S.A.R.', 853),
(129, 'MK', 'Macedonia', 389),
(130, 'MG', 'Madagascar', 261),
(131, 'MW', 'Malawi', 265),
(132, 'MY', 'Malaysia', 60),
(133, 'MV', 'Maldives', 960),
(134, 'ML', 'Mali', 223),
(135, 'MT', 'Malta', 356),
(136, 'XM', 'Man (Isle of)', 44),
(137, 'MH', 'Marshall Islands', 692),
(138, 'MQ', 'Martinique', 596),
(139, 'MR', 'Mauritania', 222),
(140, 'MU', 'Mauritius', 230),
(141, 'YT', 'Mayotte', 269),
(142, 'MX', 'Mexico', 52),
(143, 'FM', 'Micronesia', 691),
(144, 'MD', 'Moldova', 373),
(145, 'MC', 'Monaco', 377),
(146, 'MN', 'Mongolia', 976),
(147, 'MS', 'Montserrat', 1664),
(148, 'MA', 'Morocco', 212),
(149, 'MZ', 'Mozambique', 258),
(150, 'MM', 'Myanmar', 95),
(151, 'NA', 'Namibia', 264),
(152, 'NR', 'Nauru', 674),
(153, 'NP', 'Nepal', 977),
(154, 'AN', 'Netherlands Antilles', 599),
(155, 'NL', 'Netherlands The', 31),
(156, 'NC', 'New Caledonia', 687),
(157, 'NZ', 'New Zealand', 64),
(158, 'NI', 'Nicaragua', 505),
(159, 'NE', 'Niger', 227),
(160, 'NG', 'Nigeria', 234),
(161, 'NU', 'Niue', 683),
(162, 'NF', 'Norfolk Island', 672),
(163, 'MP', 'Northern Mariana Islands', 1670),
(164, 'NO', 'Norway', 47),
(165, 'OM', 'Oman', 968),
(166, 'PK', 'Pakistan', 92),
(167, 'PW', 'Palau', 680),
(168, 'PS', 'Palestinian Territory Occupied', 970),
(169, 'PA', 'Panama', 507),
(170, 'PG', 'Papua new Guinea', 675),
(171, 'PY', 'Paraguay', 595),
(172, 'PE', 'Peru', 51),
(173, 'PH', 'Philippines', 63),
(174, 'PN', 'Pitcairn Island', 0),
(175, 'PL', 'Poland', 48),
(176, 'PT', 'Portugal', 351),
(177, 'PR', 'Puerto Rico', 1787),
(178, 'QA', 'Qatar', 974),
(179, 'RE', 'Reunion', 262),
(180, 'RO', 'Romania', 40),
(181, 'RU', 'Russia', 70),
(182, 'RW', 'Rwanda', 250),
(183, 'SH', 'Saint Helena', 290),
(184, 'KN', 'Saint Kitts And Nevis', 1869),
(185, 'LC', 'Saint Lucia', 1758),
(186, 'PM', 'Saint Pierre and Miquelon', 508),
(187, 'VC', 'Saint Vincent And The Grenadines', 1784),
(188, 'WS', 'Samoa', 684),
(189, 'SM', 'San Marino', 378),
(190, 'ST', 'Sao Tome and Principe', 239),
(191, 'SA', 'Saudi Arabia', 966),
(192, 'SN', 'Senegal', 221),
(193, 'RS', 'Serbia', 381),
(194, 'SC', 'Seychelles', 248),
(195, 'SL', 'Sierra Leone', 232),
(196, 'SG', 'Singapore', 65),
(197, 'SK', 'Slovakia', 421),
(198, 'SI', 'Slovenia', 386),
(199, 'XG', 'Smaller Territories of the UK', 44),
(200, 'SB', 'Solomon Islands', 677),
(201, 'SO', 'Somalia', 252),
(202, 'ZA', 'South Africa', 27),
(203, 'GS', 'South Georgia', 0),
(204, 'SS', 'South Sudan', 211),
(205, 'ES', 'Spain', 34),
(206, 'LK', 'Sri Lanka', 94),
(207, 'SD', 'Sudan', 249),
(208, 'SR', 'Suriname', 597),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 47),
(210, 'SZ', 'Swaziland', 268),
(211, 'SE', 'Sweden', 46),
(212, 'CH', 'Switzerland', 41),
(213, 'SY', 'Syria', 963),
(214, 'TW', 'Taiwan', 886),
(215, 'TJ', 'Tajikistan', 992),
(216, 'TZ', 'Tanzania', 255),
(217, 'TH', 'Thailand', 66),
(218, 'TG', 'Togo', 228),
(219, 'TK', 'Tokelau', 690),
(220, 'TO', 'Tonga', 676),
(221, 'TT', 'Trinidad And Tobago', 1868),
(222, 'TN', 'Tunisia', 216),
(223, 'TR', 'Turkey', 90),
(224, 'TM', 'Turkmenistan', 7370),
(225, 'TC', 'Turks And Caicos Islands', 1649),
(226, 'TV', 'Tuvalu', 688),
(227, 'UG', 'Uganda', 256),
(228, 'UA', 'Ukraine', 380),
(229, 'AE', 'United Arab Emirates', 971),
(230, 'GB', 'United Kingdom', 44),
(231, 'US', 'United States', 1),
(232, 'UM', 'United States Minor Outlying Islands', 1),
(233, 'UY', 'Uruguay', 598),
(234, 'UZ', 'Uzbekistan', 998),
(235, 'VU', 'Vanuatu', 678),
(236, 'VA', 'Vatican City State (Holy See)', 39),
(237, 'VE', 'Venezuela', 58),
(238, 'VN', 'Vietnam', 84),
(239, 'VG', 'Virgin Islands (British)', 1284),
(240, 'VI', 'Virgin Islands (US)', 1340),
(241, 'WF', 'Wallis And Futuna Islands', 681),
(242, 'EH', 'Western Sahara', 212),
(243, 'YE', 'Yemen', 967),
(244, 'YU', 'Yugoslavia', 38),
(245, 'ZM', 'Zambia', 260),
(246, 'ZW', 'Zimbabwe', 263);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `full_name` varchar(40) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `mobile_number` varchar(60) DEFAULT NULL,
  `pr_image` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `address` text,
  `dob` varchar(255) DEFAULT NULL,
  `other_docs` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `password` varchar(40) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `cust_plan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `full_name`, `email`, `mobile_number`, `pr_image`, `branch_id`, `address`, `dob`, `other_docs`, `is_active`, `password`, `created_at`, `cust_plan`) VALUES
(17, 'Smith John', 'soumyaranjanbehera082@gmail.com', '+17538936140', '029408200_1647279186.png', 5, 'Norfolks\r\nUSA', '2022-03-01', '', 1, '173753', '2022-03-04 22:47:58', 8),
(18, 'Mark Johnson', 'soumya123@gmail.com', '+17538936140', '068966200_1647279133.png', 5, 'Norfloks', '2022-03-11', '020464100_1646476511.pdf', 1, '888884', '2022-03-05 16:05:12', 7);

-- --------------------------------------------------------

--
-- Table structure for table `financial_exp_master`
--

CREATE TABLE `financial_exp_master` (
  `fan_exp_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financial_exp_master`
--

INSERT INTO `financial_exp_master` (`fan_exp_id`, `type`, `name`) VALUES
(2, 'Expense', 'Salary'),
(3, 'Income', 'Membership Income'),
(4, 'Income', 'Charges'),
(5, 'Income', 'Other Income'),
(6, 'Expense', 'Other Expenses'),
(7, 'Expense', 'Miscellaneous');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Administrator', 'a:30:{i:0;s:12:\"createBranch\";i:1;s:12:\"updateBranch\";i:2;s:10:\"viewBranch\";i:3;s:12:\"deleteBranch\";i:4;s:14:\"createCustomer\";i:5;s:14:\"updateCustomer\";i:6;s:12:\"viewCustomer\";i:7;s:14:\"deleteCustomer\";i:8;s:15:\"createFinancial\";i:9;s:15:\"updateFinancial\";i:10;s:13:\"viewFinancial\";i:11;s:15:\"deleteFinancial\";i:12;s:11:\"createGroup\";i:13;s:11:\"updateGroup\";i:14;s:9:\"viewGroup\";i:15;s:11:\"deleteGroup\";i:16;s:13:\"createProduct\";i:17;s:13:\"updateProduct\";i:18;s:11:\"viewProduct\";i:19;s:13:\"deleteProduct\";i:20;s:13:\"updateProfile\";i:21;s:11:\"viewProfile\";i:22;s:11:\"createSales\";i:23;s:11:\"updateSales\";i:24;s:9:\"viewSales\";i:25;s:11:\"deleteSales\";i:26;s:10:\"createUser\";i:27;s:10:\"updateUser\";i:28;s:8:\"viewUser\";i:29;s:10:\"deleteUser\";}'),
(4, 'EPM', 'a:4:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:11:\"viewProfile\";}');

-- --------------------------------------------------------

--
-- Table structure for table `membership_list`
--

CREATE TABLE `membership_list` (
  `memberlist_id` int(11) NOT NULL,
  `tax_type` varchar(20) DEFAULT NULL,
  `product_image` varchar(50) DEFAULT NULL,
  `description` text,
  `name` varchar(50) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `dis_price` varchar(20) DEFAULT NULL,
  `validty_days` varchar(20) DEFAULT NULL,
  `no_session` varchar(20) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `mode_id` int(11) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `membership_product_type` text,
  `cancel_policy` int(11) DEFAULT NULL,
  `is_show` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership_list`
--

INSERT INTO `membership_list` (`memberlist_id`, `tax_type`, `product_image`, `description`, `name`, `price`, `dis_price`, `validty_days`, `no_session`, `branch_id`, `mode_id`, `created_at`, `membership_product_type`, `cancel_policy`, `is_show`) VALUES
(2, '4', '044812300_1647245118.jpg', 'In Studio Unlimited Yoga Class. Book classes from various timings. Get Free Weight-loss consultation.  ', '50 Days Unlimited - In Person', '500', '450', '50', '500', 5, 7, '2022-03-07', 'Membership', 2, 1),
(3, '3', '006988500_1647244897.jpg', 'Online Yoga Class with 1-to-1 Consultation; Flexible timing. ', 'Digital Membership', '400', '300', '50', '10', 5, 6, '2022-03-10', 'Membership', 1, 1),
(4, '4', '083297300_1647244761.jpeg', '100% Eco Friendly Mat, Exercise & Gym Mat with Yoga Strap Yoga Mat', 'Yoga Mat - Premium Qulaity', '6000', '5500', '30', '20', 5, 6, '2022-03-10', 'Product', 2, 1),
(5, '3', '063641800_1647245540.jpg', 'Yoga bricks for beginners. ', 'Yoga Bricks', '200', '175', '', '', 5, 0, '2022-03-14', 'Product', 1, 0),
(6, '3', '003741000_1647245633.jpg', 'Yoga bricks for beginners.', 'Yoga Bricks', '200', '175', '', '', 0, 0, '2022-03-14', 'Product', 2, 0),
(7, '3', '079880100_1647246181.jpg', 'Premium Yoga Wheel', 'Yoga Wheel', '210', '190', '', '', 5, 6, '2022-03-14', 'Product', 1, 1),
(8, '4', '019900700_1648360319.jpg', 'Premium Bottle', 'Bottle', '4000', '4000', '50', '400', 6, 7, '2022-03-21', 'Membership', 2, 0),
(9, '4', '034125100_1648360565.jpg', 'Yoga For Kids', 'Kids Yoga Virtual', '5000', '4000', '50', '999', 5, 6, '2022-03-24', 'Membership', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mode_list`
--

CREATE TABLE `mode_list` (
  `mode_id` int(11) NOT NULL,
  `mode_name` varchar(20) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mode_list`
--

INSERT INTO `mode_list` (`mode_id`, `mode_name`, `created_at`) VALUES
(6, 'Online', '2022-02-22'),
(7, 'On Premises', '2022-02-22'),
(8, 'Hybrid', '2022-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buyer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders_old`
--

CREATE TABLE `orders_old` (
  `id` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discounted_price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `availble_at` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `discounted_price`, `image`, `type`, `availble_at`, `created_at`, `description`) VALUES
(3, 'Mobile Phone', '4000', '3550', '076755200_1645464601.png', '5', '5', '2022-02-21', 'Apply For Our Annual Plan For 10% Off And Set Up Your Store On Shopify Today! Grow Your Business With Our Unified Platform. Start 14 Day Free Trial Now. Unlimited 24/7 Support. SEO Optimized. Full Blogging Platform. Drop Shipping Integration.'),
(4, 'Mobile Cver', '4000', '4000', '031274200_1645467774.png', '4', '5', '2022-02-21', 'TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `sl_cust_id` int(11) DEFAULT NULL,
  `sl_product_id` int(11) DEFAULT NULL,
  `sl_pr_suscription` int(11) DEFAULT NULL,
  `sale_discount` varchar(20) DEFAULT NULL,
  `sale_received_as` varchar(20) DEFAULT NULL,
  `product_cost` varchar(20) DEFAULT NULL,
  `received_amount` varchar(20) DEFAULT NULL,
  `sale_tarnsction_id` varchar(20) DEFAULT NULL,
  `sal_trans_attachments` varchar(255) DEFAULT NULL,
  `due_amt` varchar(50) DEFAULT NULL,
  `created_at` varchar(25) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `invoice_no` varchar(25) DEFAULT NULL,
  `sale_qty` int(11) DEFAULT '0',
  `sale_total_price` int(11) DEFAULT '0',
  `sale_tax` int(11) DEFAULT '0',
  `created_month` varchar(10) DEFAULT NULL,
  `created_year` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sl_cust_id`, `sl_product_id`, `sl_pr_suscription`, `sale_discount`, `sale_received_as`, `product_cost`, `received_amount`, `sale_tarnsction_id`, `sal_trans_attachments`, `due_amt`, `created_at`, `created_by`, `is_deleted`, `invoice_no`, `sale_qty`, `sale_total_price`, `sale_tax`, `created_month`, `created_year`) VALUES
(9, 18, 2, 4, '50', 'Card', '450', '300', '3t3t34t34', NULL, '324', '2022-03-10', 1, 0, 'INV97504', 1, 624, 56, '03', '2022'),
(10, 17, 4, 4, '50', 'Cash', '5500', '3000', '3t3t34t34', NULL, '3267', '2022-03-15', 1, 0, 'INV36829', 1, 6268, 15, '02', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `sales_due`
--

CREATE TABLE `sales_due` (
  `sales_due_id` int(11) NOT NULL,
  `sale_invoice` varchar(30) DEFAULT NULL,
  `sale_data_id` int(10) DEFAULT NULL,
  `due_sale` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_due`
--

INSERT INTO `sales_due` (`sales_due_id`, `sale_invoice`, `sale_data_id`, `due_sale`) VALUES
(7, 'INV97504', 9, '424'),
(8, 'INV36829', 10, '3267'),
(9, 'INV87870', 11, '326');

-- --------------------------------------------------------

--
-- Table structure for table `sale_tarnsction`
--

CREATE TABLE `sale_tarnsction` (
  `trn_id` int(11) NOT NULL,
  `invoice_no_sale` varchar(20) DEFAULT NULL,
  `sale_da_id` int(11) DEFAULT NULL,
  `custmr_id` int(11) DEFAULT NULL,
  `rest_amount` varchar(20) DEFAULT NULL,
  `pay_date` varchar(20) DEFAULT NULL,
  `pay_method` varchar(255) DEFAULT NULL,
  `payment_note` text,
  `pay_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_tarnsction`
--

INSERT INTO `sale_tarnsction` (`trn_id`, `invoice_no_sale`, `sale_da_id`, `custmr_id`, `rest_amount`, `pay_date`, `pay_method`, `payment_note`, `pay_desc`) VALUES
(10, 'INV97504', 9, 18, '100', '2022-03-09', 'Card', 'jnkjnkn', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `sch_booking`
--

CREATE TABLE `sch_booking` (
  `sch_booking_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `user_bas_id` int(11) DEFAULT NULL,
  `added_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sch_booking`
--

INSERT INTO `sch_booking` (`sch_booking_id`, `status`, `schedule_id`, `user_bas_id`, `added_on`) VALUES
(41, 2, 124, 18, '2022-03-23'),
(42, 2, 124, 17, '2022-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `site_fav` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_url` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `registered_address` varchar(255) DEFAULT NULL,
  `pincone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_data` varchar(255) DEFAULT NULL,
  `setting_value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`setting_id`, `setting_data`, `setting_value`) VALUES
(1, 'site_logo', 'logo.png'),
(2, 'site_fav', 'favicon.ico'),
(3, 'site_name', 'Yoga'),
(4, 'site_url', 'http://localhost/yoga/');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tax_master`
--

CREATE TABLE `tax_master` (
  `tax_id` int(11) NOT NULL,
  `template_name` varchar(25) DEFAULT NULL,
  `tax_name` varchar(25) DEFAULT NULL,
  `percentage` varchar(22) DEFAULT NULL,
  `applicable_on` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax_master`
--

INSERT INTO `tax_master` (`tax_id`, `template_name`, `tax_name`, `percentage`, `applicable_on`) VALUES
(3, 'For Product', 'GST', '15', '4'),
(4, 'For Subscription', 'GST', '56', '3'),
(5, 'For Wallet', 'GST', '18', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancelation_policy`
--

CREATE TABLE `tbl_cancelation_policy` (
  `cancel_id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `cancelation_fee` varchar(20) DEFAULT NULL,
  `cancelation_class` varchar(10) DEFAULT NULL,
  `policy_applied_hours` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cancelation_policy`
--

INSERT INTO `tbl_cancelation_policy` (`cancel_id`, `type`, `cancelation_fee`, `cancelation_class`, `policy_applied_hours`) VALUES
(1, 'Limited', '0', '1', '12'),
(2, 'Unlimited', '10', '0', '12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancel_boking_sch`
--

CREATE TABLE `tbl_cancel_boking_sch` (
  `can_sch_id` int(11) NOT NULL,
  `sch_cust_id` int(11) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `added_on` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cancel_boking_sch`
--

INSERT INTO `tbl_cancel_boking_sch` (`can_sch_id`, `sch_cust_id`, `amount`, `added_on`) VALUES
(4, 18, '0', NULL),
(5, 17, '7', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_finview_expense`
--

CREATE TABLE `tbl_finview_expense` (
  `fin_id` int(11) NOT NULL,
  `fin_date` varchar(24) DEFAULT NULL,
  `type` varchar(11) DEFAULT NULL,
  `towards` int(11) DEFAULT NULL,
  `fin_amount` varchar(24) DEFAULT NULL,
  `tagged_to` int(11) DEFAULT NULL,
  `refrenece` varchar(24) DEFAULT NULL,
  `attach_refrence` varchar(255) DEFAULT NULL,
  `mode` varchar(25) DEFAULT NULL,
  `enter_by` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `added_on` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_finview_expense`
--

INSERT INTO `tbl_finview_expense` (`fin_id`, `fin_date`, `type`, `towards`, `fin_amount`, `tagged_to`, `refrenece`, `attach_refrence`, `mode`, `enter_by`, `remarks`, `added_on`) VALUES
(2, '2022-03-25', 'Expense', 2, '5000', 6, 'yes', '022102600_1648202891.pdf', 'Card', 1, 'rrergerew', '2022-03-25'),
(3, '2022-03-25', 'Expense', 2, '5000', 6, 'yes', '022102600_1648202891.pdf', 'Card', 1, 'rrergerew', '2022-03-25'),
(4, '2022-03-25', 'Expense', 6, '5000', 6, 'yes', '022102600_1648202891.pdf', 'Card', 1, 'rrergerew', '2022-03-25'),
(5, '2022-03-25', 'Expense', 6, '5000', 6, 'yes', '022102600_1648202891.pdf', 'Card', 1, 'rrergerew', '2022-03-25'),
(6, '2022-03-27', 'Expense', 6, '500', 0, 'Rent Jan', NULL, 'Cash', 1, '', '2022-03-27'),
(7, '2022-03-25', 'Income', 6, '5000', 6, 'yes', '022102600_1648202891.pdf', 'Card', 1, 'rrergerew', '2022-03-25'),
(8, '2022-03-27', 'Income', 6, '500', 0, 'Rent Jan', NULL, 'Cash', 1, '', '2022-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schdl_cust_group`
--

CREATE TABLE `tbl_schdl_cust_group` (
  `schdl_cust_grp_id` int(11) NOT NULL,
  `cust_group_id` int(11) DEFAULT NULL,
  `schdl_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schdl_cust_group`
--

INSERT INTO `tbl_schdl_cust_group` (`schdl_cust_grp_id`, `cust_group_id`, `schdl_id`) VALUES
(1, 7, 151),
(2, 4, 151),
(3, 2, 151),
(4, 7, 152),
(5, 3, 152),
(6, 2, 152),
(7, 7, 153),
(8, 3, 153),
(9, 2, 153),
(10, 2, 154),
(11, 2, 155),
(12, 2, 156),
(13, 2, 157),
(14, 2, 158),
(15, 2, 159),
(16, 2, 160),
(17, 2, 161),
(18, 2, 162),
(19, 2, 163),
(20, 2, 164),
(21, 2, 165),
(22, 2, 166),
(23, 2, 167),
(24, 2, 168),
(25, 2, 169),
(26, 2, 170),
(27, 2, 171),
(28, 2, 172),
(29, 2, 173),
(30, 2, 174),
(31, 2, 175),
(32, 2, 176),
(33, 2, 177),
(34, 2, 178),
(35, 2, 179),
(36, 3, 180),
(37, 3, 181),
(38, 3, 182),
(39, 3, 183),
(40, 3, 184),
(41, 3, 185),
(42, 3, 186),
(43, 3, 187),
(44, 3, 188),
(45, 3, 189),
(46, 3, 190),
(47, 3, 191),
(48, 3, 192),
(49, 3, 193),
(50, 3, 194),
(51, 3, 195),
(52, 3, 196),
(53, 3, 197),
(54, 3, 198),
(55, 3, 199),
(56, 3, 200),
(57, 3, 201),
(58, 3, 202),
(59, 3, 203),
(60, 3, 204),
(61, 2, 205),
(62, 2, 206),
(63, 2, 207),
(64, 2, 208),
(65, 2, 209),
(66, 2, 210),
(67, 2, 211),
(68, 2, 212),
(69, 2, 213),
(70, 2, 214),
(71, 2, 215),
(72, 2, 216),
(73, 2, 217),
(74, 2, 218),
(75, 2, 219),
(76, 2, 220),
(77, 2, 221),
(78, 2, 222),
(79, 2, 223),
(80, 2, 224),
(81, 2, 225),
(82, 2, 226),
(83, 2, 227),
(84, 2, 228),
(85, 2, 229),
(86, 2, 230),
(87, 2, 231),
(88, 2, 232),
(89, 2, 233),
(90, 2, 234),
(91, 2, 235),
(92, 2, 236),
(93, 2, 237),
(94, 2, 238),
(95, 2, 239),
(96, 2, 240),
(97, 2, 241),
(98, 2, 242),
(99, 2, 243);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule_mang`
--

CREATE TABLE `tbl_schedule_mang` (
  `sch_id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sc_branch_id` int(11) DEFAULT NULL,
  `sc_staff_id` int(11) DEFAULT NULL,
  `capacity` varchar(20) DEFAULT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `medium_data` varchar(30) DEFAULT NULL,
  `zoom_id` varchar(255) DEFAULT NULL,
  `zoom_password` varchar(255) DEFAULT NULL,
  `google_meet_link` varchar(255) DEFAULT NULL,
  `time_from` varchar(30) DEFAULT NULL,
  `time_to` varchar(20) DEFAULT NULL,
  `booking_allowed_time` varchar(20) DEFAULT NULL,
  `sc_customer` int(11) DEFAULT NULL,
  `cancelation_policy` varchar(20) DEFAULT NULL,
  `sc_image` varchar(255) DEFAULT NULL,
  `excluded_days` varchar(255) DEFAULT NULL,
  `class_time` varchar(30) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `created_month` varchar(20) DEFAULT NULL,
  `created_year` varchar(20) DEFAULT NULL,
  `created_da` varchar(11) DEFAULT NULL,
  `day_name` varchar(255) DEFAULT NULL,
  `sch_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_schedule_mang`
--

INSERT INTO `tbl_schedule_mang` (`sch_id`, `class_name`, `description`, `sc_branch_id`, `sc_staff_id`, `capacity`, `duration`, `medium_data`, `zoom_id`, `zoom_password`, `google_meet_link`, `time_from`, `time_to`, `booking_allowed_time`, `sc_customer`, `cancelation_policy`, `sc_image`, `excluded_days`, `class_time`, `created_at`, `created_month`, `created_year`, `created_da`, `day_name`, `sch_status`) VALUES
(121, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 5, 6, '30', '30', 'Offline', '', '', '', '2022-03-19', '2022-03-30', '2', 7, '', '074746100_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-19', '03', '2022', '19', 'Saturday', 0),
(122, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 5, 6, '30', '30', 'Offline', '', '', '', '2022-03-21', '2022-03-30', '2', 7, '', '074891800_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-21', '03', '2022', '21', 'Monday', 0),
(123, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 5, 6, '30', '30', 'Offline', '', '', '', '2022-03-22', '2022-03-30', '2', 7, '', '074956200_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-22', '03', '2022', '22', 'Tuesday', 0),
(124, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 5, 6, '30', '30', 'Offline', '', '', '', '2022-03-23', '2022-03-30', '2', 7, '', '074988200_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-23', '03', '2022', '23', 'Wednesday', 0),
(125, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 5, 6, '30', '30', 'Offline', '', '', '', '2022-03-24', '2022-03-30', '2', 7, '', '075020700_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-24', '03', '2022', '24', 'Thursday', 0),
(126, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 5, 6, '30', '30', 'Offline', '', '', '', '2022-03-25', '2022-03-30', '2', 7, '', '075050300_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-25', '03', '2022', '25', 'Friday', 0),
(127, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 5, 6, '30', '30', 'Offline', '', '', '', '2022-03-26', '2022-03-30', '2', 7, '', '075080400_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-26', '03', '2022', '26', 'Saturday', 2),
(128, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 5, 6, '30', '30', 'Offline', '', '', '', '2022-03-28', '2022-03-30', '2', 7, '', '075112300_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-28', '03', '2022', '28', 'Monday', 0),
(129, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 6, 6, '30', '30', 'Offline', '', '', '', '2022-03-29', '2022-03-30', '2', 7, '', '075142100_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-29', '03', '2022', '29', 'Tuesday', 0),
(130, 'Infra Vinyasa 1', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 6, 6, '30', '30', 'Offline', '', '', '', '2022-03-30', '2022-03-30', '2', 7, '', '075172000_1647668683.jpg', '[{\"excluded_days\":\"Sunday\"}]', '12:00', '2022-03-30', '03', '2022', '30', 'Wednesday', 0),
(145, 'Infra Vinyasa 3', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 6, 6, '30', '30', 'Offline', '', '', '', '2022-03-22', '2022-03-27', '1', 4, 'Infra Vinyasa 1 Infr', '076423000_1647783968.png', '[]', '12:30', '2022-03-22', '03', '2022', '22', 'Tuesday', 0),
(146, 'Infra Vinyasa 3', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 6, 6, '30', '30', 'Offline', '', '', '', '2022-03-23', '2022-03-27', '1', 4, 'Infra Vinyasa 1 Infr', '076505800_1647783968.png', '[]', '12:30', '2022-03-23', '03', '2022', '23', 'Wednesday', 0),
(147, 'Infra Vinyasa 3', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 6, 6, '30', '30', 'Offline', '', '', '', '2022-03-24', '2022-03-27', '1', 4, 'Infra Vinyasa 1 Infr', '076540400_1647783968.png', '[]', '12:30', '2022-03-24', '03', '2022', '24', 'Thursday', 0),
(148, 'Infra Vinyasa 3', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 6, 6, '30', '30', 'Offline', '', '', '', '2022-03-25', '2022-03-27', '1', 4, 'Infra Vinyasa 1 Infr', '076571200_1647783968.png', '[]', '12:30', '2022-03-25', '03', '2022', '25', 'Friday', 0),
(149, 'Infra Vinyasa 3', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 6, 6, '30', '30', 'Offline', '', '', '', '2022-03-26', '2022-03-27', '1', 4, 'Infra Vinyasa 1 Infr', '076601800_1647783968.png', '[]', '12:30', '2022-03-26', '03', '2022', '26', 'Saturday', 0),
(150, 'Infra Vinyasa 3', 'Rachel Mah Rachel started Yoga as an alternative body conditioning to complement her marathon training during her school days. This allowed her to perform better by unlocking an even greater range of movement, endurance, stability and power.   After 10 ye', 6, 6, '30', '30', 'Offline', '', '', '', '2022-03-27', '2022-03-27', '1', 4, 'Infra Vinyasa 1 Infr', '076631200_1647783968.png', '[]', '12:30', '2022-03-27', '03', '2022', '27', 'Sunday', 0),
(151, '3(Three)', 'Construction  Relationship', 6, 6, '1222', '100', 'Offline', '', '', '', '2022-03-21', '2022-03-24', '2', 5, 'tttttttttttttt', NULL, '[{\"excluded_days\":\"Wednesday\"}]', '03:20', '2022-03-21', '03', '2022', '21', 'Monday', 0),
(152, '3(Three)', 'Construction  Relationship', 6, 6, '1222', '100', 'Offline', '', '', '', '2022-03-22', '2022-03-24', '2', 2, 'tttttttttttttt', NULL, '[{\"excluded_days\":\"Wednesday\"}]', '23:20', '2022-03-22', '03', '2022', '22', 'Tuesday', 0),
(153, '3(Three)', 'Construction  Relationship', 6, 6, '1222', '100', 'Offline', '', '', '', '2022-03-24', '2022-03-24', '2', NULL, 'tttttttttttttt', NULL, '[{\"excluded_days\":\"Wednesday\"}]', '23:20', '2022-03-24', '03', '2022', '24', 'Thursday', 0),
(154, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-01', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '073601500_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-01', '04', '2022', '01', 'Friday', 0),
(155, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-02', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '073706700_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-02', '04', '2022', '02', 'Saturday', 0),
(156, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-04', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '073782100_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-04', '04', '2022', '04', 'Monday', 0),
(157, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-05', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '073832100_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-05', '04', '2022', '05', 'Tuesday', 0),
(158, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-06', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '073875100_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-06', '04', '2022', '06', 'Wednesday', 0),
(159, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-07', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '073916800_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-07', '04', '2022', '07', 'Thursday', 0),
(160, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-08', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '073962900_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-08', '04', '2022', '08', 'Friday', 0),
(161, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-09', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074009100_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-09', '04', '2022', '09', 'Saturday', 0),
(162, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-11', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074054300_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-11', '04', '2022', '11', 'Monday', 0),
(163, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-12', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074096800_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-12', '04', '2022', '12', 'Tuesday', 0),
(164, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-13', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074152400_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-13', '04', '2022', '13', 'Wednesday', 0),
(165, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-14', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074191200_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-14', '04', '2022', '14', 'Thursday', 0),
(166, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-15', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074229200_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-15', '04', '2022', '15', 'Friday', 0),
(167, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-16', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074264900_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-16', '04', '2022', '16', 'Saturday', 0),
(168, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-18', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074299600_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-18', '04', '2022', '18', 'Monday', 0),
(169, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-19', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074334900_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-19', '04', '2022', '19', 'Tuesday', 0),
(170, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-20', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074370700_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-20', '04', '2022', '20', 'Wednesday', 0),
(171, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-21', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074406200_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-21', '04', '2022', '21', 'Thursday', 0),
(172, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-22', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074441200_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-22', '04', '2022', '22', 'Friday', 0),
(173, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-23', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074476000_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-23', '04', '2022', '23', 'Saturday', 0),
(174, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-25', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074510500_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-25', '04', '2022', '25', 'Monday', 0),
(175, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-26', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074544900_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-26', '04', '2022', '26', 'Tuesday', 0),
(176, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-27', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074599700_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-27', '04', '2022', '27', 'Wednesday', 0),
(177, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-28', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074638300_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-28', '04', '2022', '28', 'Thursday', 0),
(178, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-29', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074674300_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-29', '04', '2022', '29', 'Friday', 0),
(179, 'Hatha Beginners', 'Hatha for beginners ', 5, 10, '10', '60', 'Offline', '', '', '', '2022-04-30', '2022-04-30', '2', NULL, 'Cancel before 24 hou', '074707600_1648393664.jpg', '[{\"excluded_days\":\"Sunday\"}]', '08:30', '2022-04-30', '04', '2022', '30', 'Saturday', 0),
(180, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-03-28', '2022-04-25', '1', NULL, 'Standard Cancellatio', '039611500_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-03-28', '03', '2022', '28', 'Monday', 0),
(181, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-03-29', '2022-04-25', '1', NULL, 'Standard Cancellatio', '039721500_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-03-29', '03', '2022', '29', 'Tuesday', 0),
(182, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-03-30', '2022-04-25', '1', NULL, 'Standard Cancellatio', '039763900_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-03-30', '03', '2022', '30', 'Wednesday', 0),
(183, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-03-31', '2022-04-25', '1', NULL, 'Standard Cancellatio', '039806900_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-03-31', '03', '2022', '31', 'Thursday', 0),
(184, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-01', '2022-04-25', '1', NULL, 'Standard Cancellatio', '039846400_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-01', '04', '2022', '01', 'Friday', 0),
(185, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-03', '2022-04-25', '1', NULL, 'Standard Cancellatio', '039883500_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-03', '04', '2022', '03', 'Sunday', 0),
(186, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-04', '2022-04-25', '1', NULL, 'Standard Cancellatio', '039917600_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-04', '04', '2022', '04', 'Monday', 0),
(187, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-05', '2022-04-25', '1', NULL, 'Standard Cancellatio', '039984100_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-05', '04', '2022', '05', 'Tuesday', 0),
(188, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-06', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040019400_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-06', '04', '2022', '06', 'Wednesday', 0),
(189, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-07', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040053200_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-07', '04', '2022', '07', 'Thursday', 0),
(190, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-08', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040087400_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-08', '04', '2022', '08', 'Friday', 0),
(191, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-10', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040122000_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-10', '04', '2022', '10', 'Sunday', 0),
(192, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-11', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040155300_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-11', '04', '2022', '11', 'Monday', 0),
(193, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-12', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040189500_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-12', '04', '2022', '12', 'Tuesday', 0),
(194, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-13', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040222900_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-13', '04', '2022', '13', 'Wednesday', 0),
(195, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-14', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040257500_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-14', '04', '2022', '14', 'Thursday', 0),
(196, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-15', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040292500_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-15', '04', '2022', '15', 'Friday', 0),
(197, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-17', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040327200_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-17', '04', '2022', '17', 'Sunday', 0),
(198, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-18', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040359700_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-18', '04', '2022', '18', 'Monday', 0),
(199, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-19', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040392400_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-19', '04', '2022', '19', 'Tuesday', 0),
(200, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-20', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040425400_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-20', '04', '2022', '20', 'Wednesday', 0),
(201, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-21', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040458800_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-21', '04', '2022', '21', 'Thursday', 0),
(202, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-22', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040492200_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-22', '04', '2022', '22', 'Friday', 0),
(203, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-24', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040524900_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-24', '04', '2022', '24', 'Sunday', 0),
(204, 'YIn Yoga', 'Yin for Kids', 6, 9, '15', '45', 'Online', 'zoom.us', '123456', 'meet.goolge.com', '2022-04-25', '2022-04-25', '1', NULL, 'Standard Cancellatio', '040558200_1648394009.jpg', '[{\"excluded_days\":\"Saturday\"}]', '09:45', '2022-04-25', '04', '2022', '25', 'Monday', 0),
(205, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-09', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-09', '05', '2022', '09', 'Monday', 0),
(206, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-10', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-10', '05', '2022', '10', 'Tuesday', 0),
(207, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-11', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-11', '05', '2022', '11', 'Wednesday', 0),
(208, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-12', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-12', '05', '2022', '12', 'Thursday', 0),
(209, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-13', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-13', '05', '2022', '13', 'Friday', 0),
(210, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-14', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-14', '05', '2022', '14', 'Saturday', 0),
(211, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-16', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-16', '05', '2022', '16', 'Monday', 0),
(212, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-17', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-17', '05', '2022', '17', 'Tuesday', 0),
(213, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-18', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-18', '05', '2022', '18', 'Wednesday', 0),
(214, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-19', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-19', '05', '2022', '19', 'Thursday', 0),
(215, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-20', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-20', '05', '2022', '20', 'Friday', 0),
(216, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-21', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-21', '05', '2022', '21', 'Saturday', 0),
(217, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-23', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-23', '05', '2022', '23', 'Monday', 0),
(218, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-24', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-24', '05', '2022', '24', 'Tuesday', 0),
(219, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-25', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-25', '05', '2022', '25', 'Wednesday', 0),
(220, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-26', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-26', '05', '2022', '26', 'Thursday', 0),
(221, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-27', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-27', '05', '2022', '27', 'Friday', 0),
(222, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-28', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-28', '05', '2022', '28', 'Saturday', 0),
(223, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-30', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-30', '05', '2022', '30', 'Monday', 0),
(224, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-05-31', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-05-31', '05', '2022', '31', 'Tuesday', 0),
(225, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-01', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-01', '06', '2022', '01', 'Wednesday', 0),
(226, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-02', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-02', '06', '2022', '02', 'Thursday', 0),
(227, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-03', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-03', '06', '2022', '03', 'Friday', 0),
(228, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-04', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-04', '06', '2022', '04', 'Saturday', 0),
(229, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-06', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-06', '06', '2022', '06', 'Monday', 0),
(230, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-07', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-07', '06', '2022', '07', 'Tuesday', 0),
(231, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-08', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-08', '06', '2022', '08', 'Wednesday', 0),
(232, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-09', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-09', '06', '2022', '09', 'Thursday', 0),
(233, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-10', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-10', '06', '2022', '10', 'Friday', 0),
(234, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-11', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-11', '06', '2022', '11', 'Saturday', 0),
(235, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-13', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-13', '06', '2022', '13', 'Monday', 0),
(236, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-14', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-14', '06', '2022', '14', 'Tuesday', 0),
(237, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-15', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-15', '06', '2022', '15', 'Wednesday', 0),
(238, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-16', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-16', '06', '2022', '16', 'Thursday', 0),
(239, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-17', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-17', '06', '2022', '17', 'Friday', 0),
(240, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-18', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-18', '06', '2022', '18', 'Saturday', 0),
(241, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-20', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-20', '06', '2022', '20', 'Monday', 0),
(242, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-21', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-21', '06', '2022', '21', 'Tuesday', 0),
(243, 'Hatha Masterclass', 'Hatha Yoga for Yogis', 5, 9, '10', '90', 'Offline', '', '', '', '2022-06-22', '2022-06-22', '1', NULL, 'Standard Cancellatio', NULL, '[{\"excluded_days\":\"Sunday\"}]', '09:00', '2022-06-22', '06', '2022', '22', 'Wednesday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `emp_ment_typ` varchar(255) DEFAULT NULL,
  `emp_docs` varchar(255) DEFAULT NULL,
  `id_docs_name` varchar(255) DEFAULT NULL,
  `id_docs_no` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `tax_id` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `date_of_joining` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `full_name`, `email`, `mobile_no`, `emp_ment_typ`, `emp_docs`, `id_docs_name`, `id_docs_no`, `profile_img`, `tax_id`, `dob`, `gender`, `date_of_joining`, `updated_at`, `is_active`, `is_deleted`, `created_at`) VALUES
(1, NULL, 'soumya123@gmail.com', '+917538936140', 'Contractual', NULL, 'erdhryh', '434363643463', '43drge4t4y', '43drge4t4y', '2022-02-16', 'Female', '2022-02-15', NULL, 1, 0, '2022-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallet_transction`
--

CREATE TABLE `tbl_wallet_transction` (
  `wlt_trn_id` int(11) NOT NULL,
  `custmr_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `pay_date` varchar(255) DEFAULT NULL,
  `pay_method` varchar(255) DEFAULT NULL,
  `payment_note` varchar(255) DEFAULT NULL,
  `pay_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wallet_transction`
--

INSERT INTO `tbl_wallet_transction` (`wlt_trn_id`, `custmr_id`, `amount`, `pay_date`, `pay_method`, `payment_note`, `pay_desc`) VALUES
(1, 17, 1, '2022-03-24', 'Cash', 'Payment For Penlaty', 'Wallet Balance'),
(2, 17, 2, '2022-03-24', 'Cash', 'Payment For Penlaty', 'Wallet Balance');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pin` varchar(255) DEFAULT NULL,
  `emp_ment_typ` varchar(25) DEFAULT NULL,
  `emp_docs` varchar(255) DEFAULT NULL,
  `id_docs_name` varchar(25) DEFAULT NULL,
  `id_docs_no` varchar(25) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `tax_id` varchar(255) DEFAULT NULL,
  `dob` varchar(23) DEFAULT NULL,
  `date_of_joining` varchar(34) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `phone`, `gender`, `address`, `country`, `pin`, `emp_ment_typ`, `emp_docs`, `id_docs_name`, `id_docs_no`, `profile_img`, `tax_id`, `dob`, `date_of_joining`, `created_at`, `is_active`, `is_deleted`) VALUES
(1, 'Adminjonny', '$2y$10$ziQ2NzIn8lcEnjLSu1R7KuQPdSEYOyi4/gwKh42fN2DGWTwTMJR0O', 'admin@admin.com', 'Jonny', 'Dey', '45502440', 1, '18 Mt Alexander Road', 'Australia', '4545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(9, 'koushikpramanick24@gmail.com', '$2y$10$xI3XfdnYQEdqWdxU.vDfkur6iNliDkPpA2ahub893YxaX10OzjkFC', 'koushikwebidea@gmail.com', 'Linda', 'Johnson', '09851518072', 2, NULL, NULL, NULL, 'Contractual', '022122400_1648355717.png', 'ID', 'BC-1245', '052558600_1648393337.jpg', 'BC-12455', '2022-03-20', '2022-03-27', '2022-03-27', 1, 0),
(10, 'koushikpramanick23@gmail.com', '$2y$10$e/Vnvy0e1cCyDt.GPjcEKulb79QaqZiKW5cwxQ3VXk6Fh9J/vSSeO', 'koushikpramanick23@gmail.com', 'Smith', 'Ray', '+919851518072', 1, NULL, NULL, NULL, 'Contractual', '022250100_1648355917.jpg', 'ID', 'BC-1245', '026339100_1648393421.jpg', 'BC-12455', '2022-03-20', '2022-03-27', '2022-03-27', 1, 0),
(18, 'soumyaranjanbehera082@gmail.com', '$2y$10$cHAdDZEn9.SzWc8n.nUrKu7stkPallRukR2cY7Id5ECwIryqrC8ri', 'soumyaranjanbehera082@gmail.com', 'Soumya Ranjan', 'Behera', '+917538936140', 2, NULL, NULL, NULL, 'Permanent', NULL, 'Adahr Card', '434363643463', NULL, '43drge4t4y', '2022-03-10', '2022-03-28', '2022-03-27', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `financial_exp_master`
--
ALTER TABLE `financial_exp_master`
  ADD PRIMARY KEY (`fan_exp_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_list`
--
ALTER TABLE `membership_list`
  ADD PRIMARY KEY (`memberlist_id`);

--
-- Indexes for table `mode_list`
--
ALTER TABLE `mode_list`
  ADD PRIMARY KEY (`mode_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_old`
--
ALTER TABLE `orders_old`
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
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sales_due`
--
ALTER TABLE `sales_due`
  ADD PRIMARY KEY (`sales_due_id`);

--
-- Indexes for table `sale_tarnsction`
--
ALTER TABLE `sale_tarnsction`
  ADD PRIMARY KEY (`trn_id`);

--
-- Indexes for table `sch_booking`
--
ALTER TABLE `sch_booking`
  ADD PRIMARY KEY (`sch_booking_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_master`
--
ALTER TABLE `tax_master`
  ADD PRIMARY KEY (`tax_id`);

--
-- Indexes for table `tbl_cancelation_policy`
--
ALTER TABLE `tbl_cancelation_policy`
  ADD PRIMARY KEY (`cancel_id`);

--
-- Indexes for table `tbl_cancel_boking_sch`
--
ALTER TABLE `tbl_cancel_boking_sch`
  ADD PRIMARY KEY (`can_sch_id`);

--
-- Indexes for table `tbl_finview_expense`
--
ALTER TABLE `tbl_finview_expense`
  ADD PRIMARY KEY (`fin_id`);

--
-- Indexes for table `tbl_schdl_cust_group`
--
ALTER TABLE `tbl_schdl_cust_group`
  ADD PRIMARY KEY (`schdl_cust_grp_id`);

--
-- Indexes for table `tbl_schedule_mang`
--
ALTER TABLE `tbl_schedule_mang`
  ADD PRIMARY KEY (`sch_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_wallet_transction`
--
ALTER TABLE `tbl_wallet_transction`
  ADD PRIMARY KEY (`wlt_trn_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `financial_exp_master`
--
ALTER TABLE `financial_exp_master`
  MODIFY `fan_exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership_list`
--
ALTER TABLE `membership_list`
  MODIFY `memberlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mode_list`
--
ALTER TABLE `mode_list`
  MODIFY `mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_old`
--
ALTER TABLE `orders_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_due`
--
ALTER TABLE `sales_due`
  MODIFY `sales_due_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sale_tarnsction`
--
ALTER TABLE `sale_tarnsction`
  MODIFY `trn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sch_booking`
--
ALTER TABLE `sch_booking`
  MODIFY `sch_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_master`
--
ALTER TABLE `tax_master`
  MODIFY `tax_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cancelation_policy`
--
ALTER TABLE `tbl_cancelation_policy`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cancel_boking_sch`
--
ALTER TABLE `tbl_cancel_boking_sch`
  MODIFY `can_sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_finview_expense`
--
ALTER TABLE `tbl_finview_expense`
  MODIFY `fin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_schdl_cust_group`
--
ALTER TABLE `tbl_schdl_cust_group`
  MODIFY `schdl_cust_grp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_schedule_mang`
--
ALTER TABLE `tbl_schedule_mang`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wallet_transction`
--
ALTER TABLE `tbl_wallet_transction`
  MODIFY `wlt_trn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

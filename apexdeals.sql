-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2022 at 04:34 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apexdeals`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `productname` text NOT NULL,
  `platform` text NOT NULL,
  `category` text NOT NULL,
  `application_url` text NOT NULL,
  `description` text NOT NULL,
  `application_age` varchar(10) NOT NULL,
  `monetisation_method` text NOT NULL,
  `monthly_currency` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `selling_currency` text NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `cover_image` text NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `sold_status` int(11) NOT NULL DEFAULT 0,
  `posted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `productname`, `platform`, `category`, `application_url`, `description`, `application_age`, `monetisation_method`, `monthly_currency`, `amount`, `selling_currency`, `selling_price`, `cover_image`, `date_posted`, `sold_status`, `posted`) VALUES
(2, 2, 'Axis Physiotherapy', 'Cross Platforms', 'Service', 'https://googleplay.axis.store.ru', 'The website is about a Health service that are offered by a qualified physiotherapist. \r\nIt includes the following\r\n1. An appointment booking form\r\n2. Image Gallery to showcase the Works\r\n3. Admin Login to update the images\r\n4. working contact page\r\n5. Customised Domain name. \r\n\r\nWhat you will get\r\n- A domain name\r\n- Transfer of website \r\n- Free Hosting for one year\r\n- Support for 1 year\r\n- Control pannel\r\n\r\n', '2', 'Not Making Any Money', 'USD', '0.00', 'USD', '300.00', '277470564_132218302680869_13736794795019603_n.jpeg', '2022-07-01 17:48:36', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `application_clicks`
--

CREATE TABLE `application_clicks` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `application_id` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `last_clicked` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_clicks`
--

INSERT INTO `application_clicks` (`id`, `user_id`, `application_id`, `clicks`, `last_clicked`) VALUES
(1, '2', 2, 111, '2022-07-01 18:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `application_images`
--

CREATE TABLE `application_images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_images`
--

INSERT INTO `application_images` (`id`, `user_id`, `product_id`, `product_image`) VALUES
(9, 2, 2, '281558426_147961784439854_818430427472832148_n.jpeg'),
(10, 2, 2, '281745977_147961634439869_4815274763990945303_n.jpeg'),
(11, 2, 2, '281465221_147961441106555_8340444378819276654_n.jpeg'),
(12, 2, 2, '281554385_147961241106575_6360244396389044804_n.jpeg'),
(13, 2, 2, '281712081_147960894439943_1351302040185514506_n.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `application_offers`
--

CREATE TABLE `application_offers` (
  `id` int(11) NOT NULL,
  `offer_currency` text NOT NULL,
  `offer_amount` decimal(10,2) NOT NULL,
  `application_id` int(11) NOT NULL,
  `application_url` text NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_email` text NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `buyer_email` text NOT NULL,
  `message` text NOT NULL,
  `date_offered` datetime NOT NULL DEFAULT current_timestamp(),
  `action` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactMessage`
--

CREATE TABLE `contactMessage` (
  `id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `website_url` text NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_email` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_email` text NOT NULL,
  `message` text NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp(),
  `opened` int(11) NOT NULL DEFAULT 0,
  `date_opened` datetime DEFAULT NULL,
  `sender_delete` int(11) NOT NULL DEFAULT 0,
  `receiver_delete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactMessage`
--

INSERT INTO `contactMessage` (`id`, `website_id`, `website_url`, `receiver_id`, `receiver_email`, `sender_id`, `sender_email`, `message`, `date_sent`, `opened`, `date_opened`, `sender_delete`, `receiver_delete`) VALUES
(2, 2, 'httpsaxiphysiotherapy.tk', 2, 'mutamuls@gmail.com', 1, 'mulscoding@gmail.com', 'Hello Weblister&#13;&#10;Mutale is my name. I wish to know more about the website. Can you please explain the functions and how it has been running the last 6 months. &#13;&#10;Will be glad to hear from you.', '2022-07-01 23:53:53', 1, '2022-07-02 17:07:12', 0, 0),
(3, 2, 'httpsaxiphysiotherapy.tk', 2, 'mutamuls@gmail.com', 1, 'mulscoding@gmail.com', 'Hey Weblister. &#13;&#10;I got your mail. &#13;&#10;Here are the few things we should talk about. &#13;&#10;1. Pricing&#13;&#10;2. Handing over&#13;&#10;3. Partnership', '2022-07-02 14:43:12', 1, '2022-07-02 18:07:53', 1, 0),
(4, 2, 'httpsaxiphysiotherapy.tk', 2, 'mutamuls@gmail.com', 1, 'mulscoding@gmail.com', 'Hey Weblister. &#13;&#10;I got your mail. &#13;&#10;Here are the few things we should talk about. &#13;&#10;1. Pricing&#13;&#10;2. Handing over&#13;&#10;3. Partnership', '2022-07-02 14:43:20', 1, '2022-07-02 16:07:14', 0, 1),
(5, 2, 'httpsaxiphysiotherapy.tk', 2, 'mutamuls@gmail.com', 1, 'mulscoding@gmail.com', 'Hello Osabox&#13;&#10;Thanks for contacting me, will surely get back to you so that we can make the deal to go through', '2022-07-02 18:48:34', 0, NULL, 1, 1),
(6, 2, 'httpsaxiphysiotherapy.tk', 2, 'mutamuls@gmail.com', 1, 'mulscoding@gmail.com', 'Thanks for contact me. Am looking at your issue right now.', '2022-07-02 19:07:06', 0, NULL, 1, 1),
(7, 2, 'httpsaxiphysiotherapy.tk', 2, 'mutamuls@gmail.com', 1, 'mulscoding@gmail.com', 'Thanks for contacting me', '2022-07-02 19:09:54', 0, NULL, 1, 1),
(8, 2, 'httpsaxiphysiotherapy.tk', 2, 'mutamuls@gmail.com', 2, 'mutamuls@gmail.com', 'Thank you for contacting me.', '2022-07-02 19:26:08', 0, NULL, 1, 1),
(9, 2, 'httpsaxiphysiotherapy.tk', 1, 'mulscoding@gmail.com', 2, 'mutamuls@gmail.com', 'Thank you very much for contacting me.', '2022-07-02 19:28:53', 1, '2022-07-02 19:07:41', 0, 0),
(10, 2, 'httpsaxiphysiotherapy.tk', 2, 'mutamuls@gmail.com', 1, 'mulscoding@gmail.com', 'I received your mail. And am glad that you got back to me.', '2022-07-02 19:31:08', 1, '2022-07-05 23:07:59', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `code` varchar(4) DEFAULT NULL,
  `minor_unit` smallint(6) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country`, `currency`, `code`, `minor_unit`, `symbol`) VALUES
(1, 'Afghanistan', 'Afghani', 'AFN', 2, '؋'),
(2, 'Åland Islands', 'Euro', 'EUR', 2, '€'),
(3, 'Albania', 'Lek', 'ALL', 2, 'Lek'),
(4, 'Algeria', 'Algerian Dinar', 'DZD', 2, NULL),
(5, 'American Samoa', 'US Dollar', 'USD', 2, '$'),
(6, 'Andorra', 'Euro', 'EUR', 2, '€'),
(7, 'Angola', 'Kwanza', 'AOA', 2, NULL),
(8, 'Anguilla', 'East Caribbean Dollar', 'XCD', 2, NULL),
(9, 'Antigua And Barbuda', 'East Caribbean Dollar', 'XCD', 2, NULL),
(10, 'Argentina', 'Argentine Peso', 'ARS', 2, '$'),
(11, 'Armenia', 'Armenian Dram', 'AMD', 2, NULL),
(12, 'Aruba', 'Aruban Florin', 'AWG', 2, NULL),
(13, 'Australia', 'Australian Dollar', 'AUD', 2, '$'),
(14, 'Austria', 'Euro', 'EUR', 2, '€'),
(15, 'Azerbaijan', 'Azerbaijan Manat', 'AZN', 2, NULL),
(16, 'Bahamas', 'Bahamian Dollar', 'BSD', 2, '$'),
(17, 'Bahrain', 'Bahraini Dinar', 'BHD', 3, NULL),
(18, 'Bangladesh', 'Taka', 'BDT', 2, '৳'),
(19, 'Barbados', 'Barbados Dollar', 'BBD', 2, '$'),
(20, 'Belarus', 'Belarusian Ruble', 'BYN', 2, NULL),
(21, 'Belgium', 'Euro', 'EUR', 2, '€'),
(22, 'Belize', 'Belize Dollar', 'BZD', 2, 'BZ$'),
(23, 'Benin', 'CFA Franc BCEAO', 'XOF', 0, NULL),
(24, 'Bermuda', 'Bermudian Dollar', 'BMD', 2, NULL),
(25, 'Bhutan', 'Indian Rupee', 'INR', 2, '₹'),
(26, 'Bhutan', 'Ngultrum', 'BTN', 2, NULL),
(27, 'Bolivia', 'Boliviano', 'BOB', 2, NULL),
(28, 'Bolivia', 'Mvdol', 'BOV', 2, NULL),
(29, 'Bonaire, Sint Eustatius And Saba', 'US Dollar', 'USD', 2, '$'),
(30, 'Bosnia And Herzegovina', 'Convertible Mark', 'BAM', 2, NULL),
(31, 'Botswana', 'Pula', 'BWP', 2, NULL),
(32, 'Bouvet Island', 'Norwegian Krone', 'NOK', 2, NULL),
(33, 'Brazil', 'Brazilian Real', 'BRL', 2, 'R$'),
(34, 'British Indian Ocean Territory', 'US Dollar', 'USD', 2, '$'),
(35, 'Brunei Darussalam', 'Brunei Dollar', 'BND', 2, NULL),
(36, 'Bulgaria', 'Bulgarian Lev', 'BGN', 2, 'лв'),
(37, 'Burkina Faso', 'CFA Franc BCEAO', 'XOF', 0, NULL),
(38, 'Burundi', 'Burundi Franc', 'BIF', 0, NULL),
(39, 'Cabo Verde', 'Cabo Verde Escudo', 'CVE', 2, NULL),
(40, 'Cambodia', 'Riel', 'KHR', 2, '៛'),
(41, 'Cameroon', 'CFA Franc BEAC', 'XAF', 0, NULL),
(42, 'Canada', 'Canadian Dollar', 'CAD', 2, '$'),
(43, 'Cayman Islands', 'Cayman Islands Dollar', 'KYD', 2, NULL),
(44, 'Central African Republic', 'CFA Franc BEAC', 'XAF', 0, NULL),
(45, 'Chad', 'CFA Franc BEAC', 'XAF', 0, NULL),
(46, 'Chile', 'Chilean Peso', 'CLP', 0, '$'),
(47, 'Chile', 'Unidad de Fomento', 'CLF', 4, NULL),
(48, 'China', 'Yuan Renminbi', 'CNY', 2, '¥'),
(49, 'Christmas Island', 'Australian Dollar', 'AUD', 2, NULL),
(50, 'Cocos (keeling) Islands', 'Australian Dollar', 'AUD', 2, NULL),
(51, 'Colombia', 'Colombian Peso', 'COP', 2, '$'),
(52, 'Colombia', 'Unidad de Valor Real', 'COU', 2, NULL),
(53, 'Comoros', 'Comorian Franc ', 'KMF', 0, NULL),
(54, 'Congo (the Democratic Republic Of The)', 'Congolese Franc', 'CDF', 2, NULL),
(55, 'Congo', 'CFA Franc BEAC', 'XAF', 0, NULL),
(56, 'Cook Islands', 'New Zealand Dollar', 'NZD', 2, '$'),
(57, 'Costa Rica', 'Costa Rican Colon', 'CRC', 2, NULL),
(58, 'Côte D\'ivoire', 'CFA Franc BCEAO', 'XOF', 0, NULL),
(59, 'Croatia', 'Kuna', 'HRK', 2, 'kn'),
(60, 'Cuba', 'Cuban Peso', 'CUP', 2, NULL),
(61, 'Cuba', 'Peso Convertible', 'CUC', 2, NULL),
(62, 'Curaçao', 'Netherlands Antillean Guilder', 'ANG', 2, NULL),
(63, 'Cyprus', 'Euro', 'EUR', 2, '€'),
(64, 'Czechia', 'Czech Koruna', 'CZK', 2, 'Kč'),
(65, 'Denmark', 'Danish Krone', 'DKK', 2, 'kr'),
(66, 'Djibouti', 'Djibouti Franc', 'DJF', 0, NULL),
(67, 'Dominica', 'East Caribbean Dollar', 'XCD', 2, NULL),
(68, 'Dominican Republic', 'Dominican Peso', 'DOP', 2, NULL),
(69, 'Ecuador', 'US Dollar', 'USD', 2, '$'),
(70, 'Egypt', 'Egyptian Pound', 'EGP', 2, NULL),
(71, 'El Salvador', 'El Salvador Colon', 'SVC', 2, NULL),
(72, 'El Salvador', 'US Dollar', 'USD', 2, '$'),
(73, 'Equatorial Guinea', 'CFA Franc BEAC', 'XAF', 0, NULL),
(74, 'Eritrea', 'Nakfa', 'ERN', 2, NULL),
(75, 'Estonia', 'Euro', 'EUR', 2, '€'),
(76, 'Eswatini', 'Lilangeni', 'SZL', 2, NULL),
(77, 'Ethiopia', 'Ethiopian Birr', 'ETB', 2, NULL),
(78, 'European Union', 'Euro', 'EUR', 2, '€'),
(79, 'Falkland Islands [Malvinas]', 'Falkland Islands Pound', 'FKP', 2, NULL),
(80, 'Faroe Islands', 'Danish Krone', 'DKK', 2, NULL),
(81, 'Fiji', 'Fiji Dollar', 'FJD', 2, NULL),
(82, 'Finland', 'Euro', 'EUR', 2, '€'),
(83, 'France', 'Euro', 'EUR', 2, '€'),
(84, 'French Guiana', 'Euro', 'EUR', 2, '€'),
(85, 'French Polynesia', 'CFP Franc', 'XPF', 0, NULL),
(86, 'French Southern Territories', 'Euro', 'EUR', 2, '€'),
(87, 'Gabon', 'CFA Franc BEAC', 'XAF', 0, NULL),
(88, 'Gambia', 'Dalasi', 'GMD', 2, NULL),
(89, 'Georgia', 'Lari', 'GEL', 2, '₾'),
(90, 'Germany', 'Euro', 'EUR', 2, '€'),
(91, 'Ghana', 'Ghana Cedi', 'GHS', 2, NULL),
(92, 'Gibraltar', 'Gibraltar Pound', 'GIP', 2, NULL),
(93, 'Greece', 'Euro', 'EUR', 2, '€'),
(94, 'Greenland', 'Danish Krone', 'DKK', 2, NULL),
(95, 'Grenada', 'East Caribbean Dollar', 'XCD', 2, NULL),
(96, 'Guadeloupe', 'Euro', 'EUR', 2, '€'),
(97, 'Guam', 'US Dollar', 'USD', 2, '$'),
(98, 'Guatemala', 'Quetzal', 'GTQ', 2, NULL),
(99, 'Guernsey', 'Pound Sterling', 'GBP', 2, '£'),
(100, 'Guinea', 'Guinean Franc', 'GNF', 0, NULL),
(101, 'Guinea-bissau', 'CFA Franc BCEAO', 'XOF', 0, NULL),
(102, 'Guyana', 'Guyana Dollar', 'GYD', 2, NULL),
(103, 'Haiti', 'Gourde', 'HTG', 2, NULL),
(104, 'Haiti', 'US Dollar', 'USD', 2, '$'),
(105, 'Heard Island And Mcdonald Islands', 'Australian Dollar', 'AUD', 2, NULL),
(106, 'Holy See (Vatican)', 'Euro', 'EUR', 2, '€'),
(107, 'Honduras', 'Lempira', 'HNL', 2, NULL),
(108, 'Hong Kong', 'Hong Kong Dollar', 'HKD', 2, '$'),
(109, 'Hungary', 'Forint', 'HUF', 2, 'ft'),
(110, 'Iceland', 'Iceland Krona', 'ISK', 0, NULL),
(111, 'India', 'Indian Rupee', 'INR', 2, '₹'),
(112, 'Indonesia', 'Rupiah', 'IDR', 2, 'Rp'),
(113, 'International Monetary Fund (IMF)', 'SDR (Special Drawing Right)', 'XDR', 0, NULL),
(114, 'Iran', 'Iranian Rial', 'IRR', 2, NULL),
(115, 'Iraq', 'Iraqi Dinar', 'IQD', 3, NULL),
(116, 'Ireland', 'Euro', 'EUR', 2, '€'),
(117, 'Isle Of Man', 'Pound Sterling', 'GBP', 2, '£'),
(118, 'Israel', 'New Israeli Sheqel', 'ILS', 2, '₪'),
(119, 'Italy', 'Euro', 'EUR', 2, '€'),
(120, 'Jamaica', 'Jamaican Dollar', 'JMD', 2, NULL),
(121, 'Japan', 'Yen', 'JPY', 0, '¥'),
(122, 'Jersey', 'Pound Sterling', 'GBP', 2, '£'),
(123, 'Jordan', 'Jordanian Dinar', 'JOD', 3, NULL),
(124, 'Kazakhstan', 'Tenge', 'KZT', 2, NULL),
(125, 'Kenya', 'Kenyan Shilling', 'KES', 2, 'Ksh'),
(126, 'Kiribati', 'Australian Dollar', 'AUD', 2, NULL),
(127, 'Korea (the Democratic People’s Republic Of)', 'North Korean Won', 'KPW', 2, NULL),
(128, 'Korea (the Republic Of)', 'Won', 'KRW', 0, '₩'),
(129, 'Kuwait', 'Kuwaiti Dinar', 'KWD', 3, NULL),
(130, 'Kyrgyzstan', 'Som', 'KGS', 2, NULL),
(131, 'Lao People’s Democratic Republic', 'Lao Kip', 'LAK', 2, NULL),
(132, 'Latvia', 'Euro', 'EUR', 2, '€'),
(133, 'Lebanon', 'Lebanese Pound', 'LBP', 2, NULL),
(134, 'Lesotho', 'Loti', 'LSL', 2, NULL),
(135, 'Lesotho', 'Rand', 'ZAR', 2, NULL),
(136, 'Liberia', 'Liberian Dollar', 'LRD', 2, NULL),
(137, 'Libya', 'Libyan Dinar', 'LYD', 3, NULL),
(138, 'Liechtenstein', 'Swiss Franc', 'CHF', 2, NULL),
(139, 'Lithuania', 'Euro', 'EUR', 2, '€'),
(140, 'Luxembourg', 'Euro', 'EUR', 2, '€'),
(141, 'Macao', 'Pataca', 'MOP', 2, NULL),
(142, 'North Macedonia', 'Denar', 'MKD', 2, NULL),
(143, 'Madagascar', 'Malagasy Ariary', 'MGA', 2, NULL),
(144, 'Malawi', 'Malawi Kwacha', 'MWK', 2, NULL),
(145, 'Malaysia', 'Malaysian Ringgit', 'MYR', 2, 'RM'),
(146, 'Maldives', 'Rufiyaa', 'MVR', 2, NULL),
(147, 'Mali', 'CFA Franc BCEAO', 'XOF', 0, NULL),
(148, 'Malta', 'Euro', 'EUR', 2, '€'),
(149, 'Marshall Islands', 'US Dollar', 'USD', 2, '$'),
(150, 'Martinique', 'Euro', 'EUR', 2, '€'),
(151, 'Mauritania', 'Ouguiya', 'MRU', 2, NULL),
(152, 'Mauritius', 'Mauritius Rupee', 'MUR', 2, NULL),
(153, 'Mayotte', 'Euro', 'EUR', 2, '€'),
(154, 'Member Countries Of The African Development Bank Group', 'ADB Unit of Account', 'XUA', 0, NULL),
(155, 'Mexico', 'Mexican Peso', 'MXN', 2, '$'),
(156, 'Mexico', 'Mexican Unidad de Inversion (UDI)', 'MXV', 2, NULL),
(157, 'Micronesia', 'US Dollar', 'USD', 2, '$'),
(158, 'Moldova', 'Moldovan Leu', 'MDL', 2, NULL),
(159, 'Monaco', 'Euro', 'EUR', 2, '€'),
(160, 'Mongolia', 'Tugrik', 'MNT', 2, NULL),
(161, 'Montenegro', 'Euro', 'EUR', 2, '€'),
(162, 'Montserrat', 'East Caribbean Dollar', 'XCD', 2, NULL),
(163, 'Morocco', 'Moroccan Dirham', 'MAD', 2, ' .د.م '),
(164, 'Mozambique', 'Mozambique Metical', 'MZN', 2, NULL),
(165, 'Myanmar', 'Kyat', 'MMK', 2, NULL),
(166, 'Namibia', 'Namibia Dollar', 'NAD', 2, NULL),
(167, 'Namibia', 'Rand', 'ZAR', 2, NULL),
(168, 'Nauru', 'Australian Dollar', 'AUD', 2, NULL),
(169, 'Nepal', 'Nepalese Rupee', 'NPR', 2, NULL),
(170, 'Netherlands', 'Euro', 'EUR', 2, '€'),
(171, 'New Caledonia', 'CFP Franc', 'XPF', 0, NULL),
(172, 'New Zealand', 'New Zealand Dollar', 'NZD', 2, '$'),
(173, 'Nicaragua', 'Cordoba Oro', 'NIO', 2, NULL),
(174, 'Niger', 'CFA Franc BCEAO', 'XOF', 0, NULL),
(175, 'Nigeria', 'Naira', 'NGN', 2, '₦'),
(176, 'Niue', 'New Zealand Dollar', 'NZD', 2, '$'),
(177, 'Norfolk Island', 'Australian Dollar', 'AUD', 2, NULL),
(178, 'Northern Mariana Islands', 'US Dollar', 'USD', 2, '$'),
(179, 'Norway', 'Norwegian Krone', 'NOK', 2, 'kr'),
(180, 'Oman', 'Rial Omani', 'OMR', 3, NULL),
(181, 'Pakistan', 'Pakistan Rupee', 'PKR', 2, 'Rs'),
(182, 'Palau', 'US Dollar', 'USD', 2, '$'),
(183, 'Panama', 'Balboa', 'PAB', 2, NULL),
(184, 'Panama', 'US Dollar', 'USD', 2, '$'),
(185, 'Papua New Guinea', 'Kina', 'PGK', 2, NULL),
(186, 'Paraguay', 'Guarani', 'PYG', 0, NULL),
(187, 'Peru', 'Sol', 'PEN', 2, 'S'),
(188, 'Philippines', 'Philippine Peso', 'PHP', 2, '₱'),
(189, 'Pitcairn', 'New Zealand Dollar', 'NZD', 2, '$'),
(190, 'Poland', 'Zloty', 'PLN', 2, 'zł'),
(191, 'Portugal', 'Euro', 'EUR', 2, '€'),
(192, 'Puerto Rico', 'US Dollar', 'USD', 2, '$'),
(193, 'Qatar', 'Qatari Rial', 'QAR', 2, NULL),
(194, 'Réunion', 'Euro', 'EUR', 2, '€'),
(195, 'Romania', 'Romanian Leu', 'RON', 2, 'lei'),
(196, 'Russian Federation', 'Russian Ruble', 'RUB', 2, '₽'),
(197, 'Rwanda', 'Rwanda Franc', 'RWF', 0, NULL),
(198, 'Saint Barthélemy', 'Euro', 'EUR', 2, '€'),
(199, 'Saint Helena, Ascension And Tristan Da Cunha', 'Saint Helena Pound', 'SHP', 2, NULL),
(200, 'Saint Kitts And Nevis', 'East Caribbean Dollar', 'XCD', 2, NULL),
(201, 'Saint Lucia', 'East Caribbean Dollar', 'XCD', 2, NULL),
(202, 'Saint Martin (French Part)', 'Euro', 'EUR', 2, '€'),
(203, 'Saint Pierre And Miquelon', 'Euro', 'EUR', 2, '€'),
(204, 'Saint Vincent And The Grenadines', 'East Caribbean Dollar', 'XCD', 2, NULL),
(205, 'Samoa', 'Tala', 'WST', 2, NULL),
(206, 'San Marino', 'Euro', 'EUR', 2, '€'),
(207, 'Sao Tome And Principe', 'Dobra', 'STN', 2, NULL),
(208, 'Saudi Arabia', 'Saudi Riyal', 'SAR', 2, NULL),
(209, 'Senegal', 'CFA Franc BCEAO', 'XOF', 0, NULL),
(210, 'Serbia', 'Serbian Dinar', 'RSD', 2, NULL),
(211, 'Seychelles', 'Seychelles Rupee', 'SCR', 2, NULL),
(212, 'Sierra Leone', 'Leone', 'SLL', 2, NULL),
(213, 'Singapore', 'Singapore Dollar', 'SGD', 2, '$'),
(214, 'Sint Maarten (Dutch Part)', 'Netherlands Antillean Guilder', 'ANG', 2, NULL),
(215, 'Sistema Unitario De Compensacion Regional De Pagos \"sucre\"\"\"', 'Sucre', 'XSU', 0, NULL),
(216, 'Slovakia', 'Euro', 'EUR', 2, '€'),
(217, 'Slovenia', 'Euro', 'EUR', 2, '€'),
(218, 'Solomon Islands', 'Solomon Islands Dollar', 'SBD', 2, NULL),
(219, 'Somalia', 'Somali Shilling', 'SOS', 2, NULL),
(220, 'South Africa', 'Rand', 'ZAR', 2, 'R'),
(221, 'South Sudan', 'South Sudanese Pound', 'SSP', 2, NULL),
(222, 'Spain', 'Euro', 'EUR', 2, '€'),
(223, 'Sri Lanka', 'Sri Lanka Rupee', 'LKR', 2, 'Rs'),
(224, 'Sudan (the)', 'Sudanese Pound', 'SDG', 2, NULL),
(225, 'Suriname', 'Surinam Dollar', 'SRD', 2, NULL),
(226, 'Svalbard And Jan Mayen', 'Norwegian Krone', 'NOK', 2, NULL),
(227, 'Sweden', 'Swedish Krona', 'SEK', 2, 'kr'),
(228, 'Switzerland', 'Swiss Franc', 'CHF', 2, NULL),
(229, 'Switzerland', 'WIR Euro', 'CHE', 2, NULL),
(230, 'Switzerland', 'WIR Franc', 'CHW', 2, NULL),
(231, 'Syrian Arab Republic', 'Syrian Pound', 'SYP', 2, NULL),
(232, 'Taiwan', 'New Taiwan Dollar', 'TWD', 2, NULL),
(233, 'Tajikistan', 'Somoni', 'TJS', 2, NULL),
(234, 'Tanzania, United Republic Of', 'Tanzanian Shilling', 'TZS', 2, NULL),
(235, 'Thailand', 'Baht', 'THB', 2, '฿'),
(236, 'Timor-leste', 'US Dollar', 'USD', 2, '$'),
(237, 'Togo', 'CFA Franc BCEAO', 'XOF', 0, NULL),
(238, 'Tokelau', 'New Zealand Dollar', 'NZD', 2, '$'),
(239, 'Tonga', 'Pa’anga', 'TOP', 2, NULL),
(240, 'Trinidad And Tobago', 'Trinidad and Tobago Dollar', 'TTD', 2, NULL),
(241, 'Tunisia', 'Tunisian Dinar', 'TND', 3, NULL),
(242, 'Turkey', 'Turkish Lira', 'TRY', 2, '₺'),
(243, 'Turkmenistan', 'Turkmenistan New Manat', 'TMT', 2, NULL),
(244, 'Turks And Caicos Islands', 'US Dollar', 'USD', 2, '$'),
(245, 'Tuvalu', 'Australian Dollar', 'AUD', 2, NULL),
(246, 'Uganda', 'Uganda Shilling', 'UGX', 0, NULL),
(247, 'Ukraine', 'Hryvnia', 'UAH', 2, '₴'),
(248, 'United Arab Emirates', 'UAE Dirham', 'AED', 2, 'د.إ'),
(249, 'United Kingdom Of Great Britain And Northern Ireland', 'Pound Sterling', 'GBP', 2, '£'),
(250, 'United States Minor Outlying Islands', 'US Dollar', 'USD', 2, '$'),
(251, 'United States Of America', 'US Dollar', 'USD', 2, '$'),
(252, 'United States Of America', 'US Dollar (Next day)', 'USN', 2, NULL),
(253, 'Uruguay', 'Peso Uruguayo', 'UYU', 2, NULL),
(254, 'Uruguay', 'Uruguay Peso en Unidades Indexadas (UI)', 'UYI', 0, NULL),
(255, 'Uruguay', 'Unidad Previsional', 'UYW', 4, NULL),
(256, 'Uzbekistan', 'Uzbekistan Sum', 'UZS', 2, NULL),
(257, 'Vanuatu', 'Vatu', 'VUV', 0, NULL),
(258, 'Venezuela', 'Bolívar Soberano', 'VES', 2, NULL),
(259, 'Vietnam', 'Dong', 'VND', 0, '₫'),
(260, 'Virgin Islands (British)', 'US Dollar', 'USD', 2, '$'),
(261, 'Virgin Islands (U.S.)', 'US Dollar', 'USD', 2, '$'),
(262, 'Wallis And Futuna', 'CFP Franc', 'XPF', 0, NULL),
(263, 'Western Sahara', 'Moroccan Dirham', 'MAD', 2, NULL),
(264, 'Yemen', 'Yemeni Rial', 'YER', 2, NULL),
(265, 'Zambia', 'Zambian Kwacha', 'ZMW', 2, NULL),
(266, 'Zimbabwe', 'Zimbabwe Dollar', 'ZWL', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `productname` text NOT NULL,
  `category` text NOT NULL,
  `website_url` text NOT NULL,
  `description` text NOT NULL,
  `monthly_currency` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `selling_currency` text NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `discount_link` text DEFAULT NULL,
  `price_period` text DEFAULT NULL,
  `cover_image` text NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `posted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `productname`, `category`, `website_url`, `description`, `monthly_currency`, `amount`, `selling_currency`, `selling_price`, `discount_link`, `price_period`, `cover_image`, `date_posted`, `posted`) VALUES
(1, 2, 'Osabox', 'SAAS', 'https://osabox.co', 'Get the best tool that helps your team to focus and achieve more.', 'EUR', '780.00', 'EUR', '90.00', 'https://osabox.co/discount', '12 Months', 'home2.png', '2022-07-23 13:13:38', 0),
(2, 2, 'GolinkJobs', 'Job Portal', 'https://golinkjobs.com', 'Find Jobs that will inspire you to achieve more\r\nWe will never show you jobs that have expired', 'USD', '50.00', 'USD', '29.99', 'https://golinkjobs.com/pricing', '3 Months', 'network1.jpeg', '2022-07-23 18:46:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `parent_id` int(11) DEFAULT NULL,
  `reserve` text NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `user_type` enum('user','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `join_date`, `parent_id`, `reserve`, `verified`, `user_type`) VALUES
(1, 'Osabox', 'mulscoding@gmail.com', '$2y$10$Vb3tNPmVFZAaZWXJ/VXDI.cpTSoTkvZ2BAvHkbpB3gXF39/wrTq9m', '2022-06-22 10:22:50', 1, 'TXV0YWxlQDg1', 1, 'user'),
(2, 'Weblister', 'mutamuls@gmail.com', '$2y$10$8WxRDHdYCu/DUtIbCKDJFOB92CtLYn.JigYAm/8lJ2F6P83t.WH5O', '2022-06-24 15:34:06', 2, 'TXV0YWxlQDg1', 1, 'user'),
(5, 'Multiplying Good ', 'mulenga@weblister.com', '$2y$10$5DvJtBJ2.JDldfH6uSlkFOxjCgnH4r0hBJhXQ8sQw3gH1R8NQkjJ2', '2022-06-28 12:24:37', 5, 'aGR6WXdSaDlP', 0, 'superadmin'),
(6, 'GolinkJobs', 'golinkjobs@gmail.com', '$2y$10$O0fAPnORe.clTlxrUvshzeGQlcPGL2zHxDs2T3H.3SP6iUpG3A9ba', '2022-07-24 02:06:41', NULL, 'TXV0YWxlQDg1', 1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `subscriber_name` text NOT NULL,
  `subscriber_email` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `subscriber_name`, `subscriber_email`, `date_created`) VALUES
(1, 'Noami ', 'mulscoding@gmail.com', '2022-06-25 22:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `the_block`
--

CREATE TABLE `the_block` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `file` text NOT NULL,
  `content` text NOT NULL,
  `posted_by` text DEFAULT NULL,
  `date_posted` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `productname` text NOT NULL,
  `language_used` text NOT NULL,
  `category` text NOT NULL,
  `website_url` text NOT NULL,
  `description` text NOT NULL,
  `website_age` varchar(10) NOT NULL,
  `monetisation_method` text NOT NULL,
  `monthly_currency` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `selling_currency` text NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `cover_image` text NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `sold_status` int(11) NOT NULL DEFAULT 0,
  `posted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `user_id`, `productname`, `language_used`, `category`, `website_url`, `description`, `website_age`, `monetisation_method`, `monthly_currency`, `amount`, `selling_currency`, `selling_price`, `cover_image`, `date_posted`, `sold_status`, `posted`) VALUES
(1, 2, 'Osabox Website', 'PHP', 'SAAS', 'https://osabox.co', 'Project management tool that teams can use for their collaboration, networking, virtual meetings, creating projects, contributing to projects.\r\nThe website can also be used to create fee notes for legal consultations, charge receipts, and invoicing.', '3', 'Not Making Any Money', 'USD', '0.00', 'USD', '5000.00', 'globe.jpeg', '2022-06-29 18:59:02', 0, 1),
(2, 2, 'Axis Physiotherapy', 'PHP', 'Service', 'https://axiphysiotherapy.tk', 'The website is about a Health service that are offered by a qualified physiotherapist. \r\nIt includes the following\r\n1. An appointment booking form\r\n2. Image Gallery to showcase the Works\r\n3. Admin Login to update the images\r\n4. working contact page\r\n5. Customised Domain name. \r\n\r\nWhat you will get\r\n- A domain name\r\n- Transfer of website \r\n- Free Hosting for one year\r\n- Support for 1 year\r\n- Control pannel\r\n\r\n', '.5', 'Ads', 'USD', '10.00', 'USD', '500.00', '277491126_132218279347538_3756751887492428277_n.jpeg', '2022-07-01 17:41:31', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `website_clicks`
--

CREATE TABLE `website_clicks` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `website_id` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `last_clicked` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_clicks`
--

INSERT INTO `website_clicks` (`id`, `user_id`, `website_id`, `clicks`, `last_clicked`) VALUES
(1, '2', 1, 35, '2022-07-23 13:50:41'),
(2, '2', 2, 10, '2022-07-23 18:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `website_images`
--

CREATE TABLE `website_images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_images`
--

INSERT INTO `website_images` (`id`, `user_id`, `product_id`, `product_image`) VALUES
(5, 2, 1, 'network1.jpeg'),
(6, 2, 1, 'hire2.jpeg'),
(7, 2, 1, 'hire1.jpeg'),
(8, 2, 1, 'Pic2.png'),
(9, 2, 2, '277441377_132218159347550_7186446105259921414_n.jpeg'),
(10, 2, 2, '277444098_132218252680874_3116443487491047052_n.jpeg'),
(11, 2, 2, '277467056_132218326014200_7299925384832368304_n.jpeg'),
(12, 2, 2, 'metatag.jpeg'),
(13, 2, 2, '281777300_147961861106513_8944953386013915474_n.jpeg'),
(14, 2, 2, '281782107_147961121106587_5181823108733637360_n.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `website_offers`
--

CREATE TABLE `website_offers` (
  `id` int(11) NOT NULL,
  `offer_currency` text NOT NULL,
  `offer_amount` decimal(10,2) NOT NULL,
  `website_id` int(11) NOT NULL,
  `website_url` text NOT NULL,
  `seller_id` int(11) NOT NULL,
  `seller_email` text NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `buyer_email` text NOT NULL,
  `message` text NOT NULL,
  `date_offered` datetime NOT NULL DEFAULT current_timestamp(),
  `action` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_offers`
--

INSERT INTO `website_offers` (`id`, `offer_currency`, `offer_amount`, `website_id`, `website_url`, `seller_id`, `seller_email`, `buyer_id`, `buyer_email`, `message`, `date_offered`, `action`) VALUES
(1, 'USD', '4300.00', 1, 'https://osabox.co', 2, 'mutamuls@gmail.com', 1, 'mulscoding@gmail.com', 'The website seems cool.  Would love to buy it at the above price.', '2022-07-01 14:50:17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_clicks`
--
ALTER TABLE `application_clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_images`
--
ALTER TABLE `application_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_offers`
--
ALTER TABLE `application_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactMessage`
--
ALTER TABLE `contactMessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `the_block`
--
ALTER TABLE `the_block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_clicks`
--
ALTER TABLE `website_clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_images`
--
ALTER TABLE `website_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_offers`
--
ALTER TABLE `website_offers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_clicks`
--
ALTER TABLE `application_clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_images`
--
ALTER TABLE `application_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `application_offers`
--
ALTER TABLE `application_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactMessage`
--
ALTER TABLE `contactMessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `the_block`
--
ALTER TABLE `the_block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_clicks`
--
ALTER TABLE `website_clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_images`
--
ALTER TABLE `website_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `website_offers`
--
ALTER TABLE `website_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

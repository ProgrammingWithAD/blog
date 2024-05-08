-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 07:09 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drive_billing_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `tag` varchar(155) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `pan_no` varchar(155) DEFAULT NULL,
  `hsc_code` varchar(155) DEFAULT NULL,
  `logo_path` varchar(155) DEFAULT NULL,
  `gst_no` varchar(155) DEFAULT NULL,
  `inv_f_part` varchar(50) DEFAULT NULL,
  `inv_l_part` int(25) NOT NULL DEFAULT 0,
  `inv_session_part` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `tag`, `address`, `phone`, `email`, `pan_no`, `hsc_code`, `logo_path`, `gst_no`, `inv_f_part`, `inv_l_part`, `inv_session_part`) VALUES
(1, 'TEST TRAVELS', 'Making Travel Easy', 'Hakimpara, Siliguri-734001', '9832098320', 'TESTTRAVEL@GMAIL.COM', 'PAN12355', '987654', 'images/company/carCapture-removebg-preview.png', '123GXYZ', 'INV/', 21, '/2023-24');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(250) DEFAULT NULL,
  `guest_type` varchar(250) NOT NULL,
  `guest_email` varchar(250) DEFAULT NULL,
  `guest_phone` varchar(250) DEFAULT NULL,
  `guest_company` varchar(250) DEFAULT NULL,
  `guest_gstn` varchar(250) DEFAULT NULL,
  `guest_address` varchar(250) DEFAULT NULL,
  `guest_discount` int(11) NOT NULL,
  `added_by` varchar(250) DEFAULT NULL,
  `gen_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `guest_name`, `guest_type`, `guest_email`, `guest_phone`, `guest_company`, `guest_gstn`, `guest_address`, `guest_discount`, `added_by`, `gen_date`) VALUES
(4, 'DEMO GUEST COMPANY', 'Company', 'DEMOGUESTCOMPANY@GMAIL.COM', '9988556699', 'CYBER HELP INDIA', 'CYBERGSTN4455665', 'SILIGURI', 0, '1', NULL),
(5, 'DEMO INDIVIDUAL GUEST', 'Individual', 'DEMOGUEST@GMAIL.COM', '78787878788', '', '', 'SILIGURI', 0, '1', NULL),
(7, 'DEMO GHOSH', 'Company', 'DEMO@GMAIL.COM', '9832209832', 'CYBER', 'GST12345', 'SILIGURI', 0, '1', NULL),
(8, 'ANITA GHOSH', 'Individual', 'ANITA@GMAIL.COM', 'SILIGURI', '', 'GST123456', '', 0, '1', NULL),
(9, 'ANITA GHOSH', 'Individual', 'ANITA@GMAIL.COM', 'SILIGURI', '', 'GST123456', '', 0, '1', NULL),
(10, 'BDFB', 'Individual', 'DFBDFB', '78787878788', '', 'CYBERGSTN4455665', 'SILIGURI', 0, '1', NULL),
(11, 'DGBDG', 'Individual', 'HDGHG', 'DGHDGH', '', 'DGHDSGH', '', 0, '1', NULL),
(12, 'DEMO GUEST', 'Individual', 'DEMOGUEST@GMAIL.COM', '9988556699', '', 'CYBERGSTN4455665', 'SILIGURI', 0, '1', NULL),
(14, 'GCNFHJF', '', 'GDBX', '45245254373', NULL, NULL, 'SBXF', 0, '1', '2024-02-20'),
(15, 'RATAN BISWAS', 'Company', 'RATANBISWAS@PPPCOMPANY.COM', '877441563210', 'PPP COMPANY', 'GSTNTNJH8YJB8H', 'SILIGURI,W', 25, '1', '2024-02-20'),
(16, 'HH GHOSH', 'Individual', 'HHGHOSE@GMAIL.COM', '99998855', '', 'SGSTJGKJNOIU', 'IYHGDUCHB', 20, '1', NULL),
(17, 'BIMAL GHOSH', 'Individual', 'BIMALGHOSH@GMAIL.COM', '7774445559', '', '', 'SILIGURI', 0, '1', '2024-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL,
  `tax_name` varchar(105) DEFAULT NULL,
  `tax_percent` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_name`, `tax_percent`) VALUES
(1, 'CGST', '2.5'),
(2, 'SGST', '2.5'),
(3, 'IGST', '5'),
(4, 'CGST RCM', '2.5'),
(5, 'SGST RCM', '2.5'),
(8, 'IGST RCM', '5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `user_email` varchar(155) DEFAULT NULL,
  `password` varchar(155) DEFAULT NULL,
  `tmp_pass` varchar(200) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `user_email`, `password`, `tmp_pass`, `role`) VALUES
(1, 'ADMIN', '', '', 'myuser', '5d5a582e5adf896ed6e1474c700b481a', 'myuser', 'ADMIN'),
(2, 'Test User', '9988774455', 'Siliguri,', 'TEST', 'ceb6c970658f31504a901b89dcd3e461', 'test@123', 'EMPLOYEE'),
(3, 'EMPLOYEE1', '9988556644', 'EMPLOYEE', 'employee', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'employee', 'EMPLOYEE');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(105) DEFAULT NULL,
  `vehicle_type` varchar(15) DEFAULT NULL,
  `vehicle_no` varchar(105) DEFAULT NULL,
  `added_by` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `vehicle_type`, `vehicle_no`, `added_by`) VALUES
(1, 'CRYSTA', 'AC', 'WB 73E 7537', NULL),
(2, 'INNOVA', 'AC', 'WB 73D 7237', NULL),
(3, 'INNOVA', 'AC', 'WB 76 9582', NULL),
(4, 'INNOVA', 'AC', 'WB 02V 9615', NULL),
(5, 'ERTIGA', 'AC', 'WB 73D 5599', NULL),
(6, 'ERTIGA', 'AC', 'WB 73D 4146', NULL),
(7, 'SWIFT DZ', 'AC', 'WB 73E 7420', NULL),
(8, 'SWIFT DZ', 'AC', 'WB 73D 6112', NULL),
(9, 'SWIFT DZ', 'AC', 'WB 60H 3334', NULL),
(10, 'SWIFT DZ', 'AC', 'WB 74AT 9880', NULL),
(11, 'BOLERO', 'AC', 'WB 73D 5363', NULL),
(12, 'ZEST', 'AC', 'WB 74AM 1266', NULL),
(13, 'VISTA', 'AC', 'WB 74U 8577', NULL),
(14, 'SCORPIO', 'AC', 'WB 74L 9179', NULL),
(15, 'XYLO', 'AC', 'WB 74AM 8940', NULL),
(16, 'INNOVA', 'AC', 'SK 01T 7441', NULL),
(17, 'CRYSTA', 'AC', 'WB 73E 5000', NULL),
(18, 'SWIFT DZ', 'AC', 'WB 74A 9172', NULL),
(19, 'INNOVA', 'AC', 'WB 76 6857', NULL),
(20, 'ETIOS', 'AC', 'WB 74V3886', NULL),
(21, 'SWIFT DZ', 'AC', 'WB 76A 4965', NULL),
(22, 'CRYSTA', 'AC', 'WB 73A 8655', NULL),
(23, 'WAGON R', 'AC', 'WB 73D 6089', NULL),
(24, 'INNOVA', 'AC', 'WB 74X 6565', NULL),
(25, 'VISTA', 'AC', 'WB 74Z 7779', NULL),
(26, 'SWIFT DZ', 'AC', 'WB 73E 4467', NULL),
(27, 'ERTIGA', 'AC', 'WB 74AD 4450', NULL),
(28, 'CRYSTA', 'AC', 'WB 73E 7000', NULL),
(29, 'CRYSTA', 'AC', 'WB 73E 9037', NULL),
(30, 'CRYSTA', 'AC', 'WB 73E 5325', NULL),
(31, 'CRYSTA', 'AC', 'WB 76A 1446', NULL),
(32, 'XCENT', 'AC', 'WB 74AU 4530', NULL),
(33, 'INNOVA', 'AC', 'WB 76 5094', NULL),
(34, 'SWIFT', 'AC', 'WB 74J 4141', NULL),
(35, 'SWIFT DZ', 'AC', 'WB 74AU 4390', NULL),
(36, 'SWIFT DZ', 'AC', 'WB 73E 4419', NULL),
(37, 'INNOVA', 'AC', 'WB 73D 9511', NULL),
(38, 'SWIFT DZ', 'AC', 'SK 01T 2757', NULL),
(39, 'INNOVA', 'AC', 'SK 01T 1541', NULL),
(40, 'SWIFT DZ', 'AC', 'WB 74N 1610', NULL),
(41, 'INNOVA', 'AC', 'WB 64N 2722', NULL),
(42, 'SWIFT DZ', 'AC', 'WB 73E 3065', NULL),
(43, 'SWIFT DZ', 'AC', 'WB 73E 7516', NULL),
(44, 'INNOVA', 'AC', 'WB 73D 7806', NULL),
(45, 'XYLO', 'AC', 'WB 76A 6211', NULL),
(46, 'CRYSTA', 'AC', 'WB 74AS 6336', NULL),
(47, 'CRYSTA', 'AC', 'WB 74AQ 3330', NULL),
(48, 'DATSUN GO', 'AC', 'WB 74AU 6605', NULL),
(49, 'SWIFT DZ', 'AC', 'WB 64G 4483', NULL),
(50, 'INNOVA', 'AC', 'WB  74AE 8241', NULL),
(51, 'SWIFT DZ', 'AC', 'WB 73E 7420', NULL),
(52, 'INNOVA', 'AC', 'WB 74 2960', NULL),
(53, 'SWIFT DZ', 'AC', 'WB 76 9955', NULL),
(54, 'CRYSTA', 'AC', 'WB 74AU 2968', NULL),
(55, 'CRYSTA', 'AC', 'WB 73E 9090', NULL),
(56, 'FORTUNER', 'AC', 'WB 74AV 6943', NULL),
(57, 'SWIFT DZ', 'AC', 'WB 74AF 5694', NULL),
(58, 'SUMO', 'AC', 'WB73D3746', NULL),
(59, 'FORTUNER', 'AC', 'WB 68R 6668', NULL),
(60, 'FORTUNER', 'AC', 'WB 74Y 9900', NULL),
(61, 'FORTUNER', 'AC', 'WB 74V 5512', NULL),
(62, 'INNOVA', 'AC', 'WB 74Q 3612', NULL),
(63, 'SWIFT DZ', 'AC', 'WB 74AX 9145', NULL),
(64, 'SWIFT DZ', 'AC', 'WB 73E 7882', NULL),
(65, 'CRYSTA', 'AC', 'WB 02AJ 9367', NULL),
(66, 'INNOVA', 'AC', 'WB 04D 0461', NULL),
(67, 'INNOVA', 'AC', 'WB 73D 7690', NULL),
(68, 'SWIFT DZ', 'AC', 'WB 74AF 7770', NULL),
(69, 'CRYSTA', 'AC', 'WB 73E 8367', NULL),
(70, 'INNOVA', 'AC', 'WB 02Z 0503', NULL),
(71, 'INNOVA', 'AC', 'WB 73D 5353', NULL),
(72, 'SWIFT DZ', 'AC', 'WB 73E 8491', NULL),
(73, 'SWIFT DZ', 'AC', 'WB 73D 5675', NULL),
(74, 'CRYSTA', 'AC', 'WB 76A 9669', NULL),
(75, 'SWIFT DZ', 'AC', 'WB 73F 0415', NULL),
(76, 'SWIFT DZ', 'AC', 'WB 73F 3048', NULL),
(77, 'TEMPO TRAVELLER', 'AC', 'WB 73E 8102', NULL),
(78, 'WAGON R', 'AC', 'WB 74AR 7842', NULL),
(79, 'SWIFT DZ', 'AC', 'WB 73F8609', NULL),
(80, 'SWIFT DZ', 'AC', 'SK 01T 5455', NULL),
(81, 'INNOVA', 'AC', 'WB 74D 5199', NULL),
(82, 'CRYSTA', 'AC', 'WB 73E 2014', NULL),
(83, 'XCENT', 'AC', 'WB 74AF 4048', NULL),
(84, 'SWIFT DZ', 'AC', 'WB 74AU 4390', NULL),
(85, 'SWIFT DZ', 'AC', 'WB 73E 5432', NULL),
(86, 'CRYSTA', 'AC', 'WB 74S 6336', NULL),
(87, 'ETIOS', 'AC', 'WB 74U 6720', NULL),
(88, 'CRYSTA', 'AC', 'WB 73F 4184', NULL),
(89, 'SWIFT DZ', 'AC', 'WB 74AT 9451', NULL),
(90, 'BREEZA', 'AC', 'WB 73F 4189', NULL),
(91, 'SWIFT DZ', 'AC', 'SK 01T 5463', NULL),
(92, 'SWIFT DZ', 'AC', 'WB 73F 0915', NULL),
(93, 'SWIFT DZ', 'AC', 'WB 73E 5460', NULL),
(94, 'SWIFT DZ', 'AC', 'WB 78 3384', NULL),
(95, 'INNOVA', 'AC', 'SK 01T 5691', NULL),
(96, 'CRYSTA', 'AC', 'WB 74AQ 2034', NULL),
(97, 'SWIFT DZ', 'AC', 'WB 02AH 1399', NULL),
(98, 'CRYSTA', 'AC', 'WB 78 3470', NULL),
(99, 'SWIFT DZ', 'AC', 'WB 73F 0060', NULL),
(100, 'SWIFT DZ', 'AC', 'WB 73F 5311', NULL),
(101, 'SWIFT DZ', 'AC', 'WB 73E 4034', NULL),
(102, 'CRYSTA', 'AC', 'WB 73F 0515', NULL),
(103, 'CRYSTA', 'AC', 'WB 74AR 6558', NULL),
(104, 'WAGON R', 'AC', 'WB 73F 6532', NULL),
(105, 'SWIFT DZ', 'AC', 'WB 73E 0422', NULL),
(106, 'ZEST', 'AC', 'WB73E9015', NULL),
(107, 'INNOVA', 'AC', 'WB76A6789', NULL),
(108, 'CRYSTA', 'AC', 'WB783740', NULL),
(109, 'AMAZE', 'AC', 'WB76A9670', NULL),
(110, 'CRYSTA', 'AC', 'WB73F1015', NULL),
(111, 'INNOVA', 'AC', 'WB765476', NULL),
(112, 'INNOVA', 'AC', 'WB76A7850', NULL),
(113, 'INNOVA', 'AC', 'WB 76 5480', NULL),
(114, 'INNOVA', 'AC', 'SK01Z0164', NULL),
(115, 'SWIFT DZ', 'AC', 'WB 73E 5790', NULL),
(116, 'HEXA', 'AC', 'WB 73 E 9716', NULL),
(117, 'INNOVA', 'AC', 'WB73D5353', NULL),
(118, 'INNOVA', 'AC', 'WB73E1234', NULL),
(119, 'BOLERO', 'AC', 'WB73G0375', NULL),
(120, 'CRYSTA', 'AC', 'WB 76 A 9887', NULL),
(121, 'INNOVA', 'AC', 'WB74U5563', NULL),
(122, 'SWIFT DZ', 'AC', 'WB76B0341', NULL),
(123, 'Breeza', 'AC', 'WB73E8547', NULL),
(124, 'SWIFT DZ', 'AC', 'WB84D9840', NULL),
(125, 'WAGON R', 'AC', 'SK 01T 7791', NULL),
(126, 'SWIFT DZ', 'AC', 'WB73E7882', NULL),
(127, 'INNOVA', 'AC', 'SK01Z0164', NULL),
(128, 'SWIFT DZ', 'AC', 'WB64Y9482', NULL),
(129, 'SWIFT DZ', 'AC', 'WB73E5790', NULL),
(130, 'INNOVA', 'AC', 'WB73 E7859', NULL),
(131, 'SWIFT DZ', 'AC', 'WB73E9772', NULL),
(132, 'SWIFT DZ', 'AC', 'WB74BJ6386', NULL),
(133, 'INNOVA', 'AC', 'WB74AJ1182', NULL),
(134, 'SWIFT DZ', 'AC', 'WB 73D5363', NULL),
(135, 'SWIFT DZ', 'AC', 'WB74BC7290', NULL),
(136, 'INNOVA', 'AC', 'WB04D0461', NULL),
(137, 'WAGON R', 'AC', 'WB74AM5319', NULL),
(138, 'SWIFT DZ', 'AC', 'WB73E0347', NULL),
(139, 'CRYSTA', 'AC', 'WB73F4705', NULL),
(140, 'CRYSTA', 'AC', 'WB73E1584', NULL),
(141, 'Marazzo', 'AC', 'WB74BD1861', NULL),
(142, 'Wagon R', 'AC', 'WB74AK9512', NULL),
(143, 'INNOVA', 'AC', 'WB74AA2311', NULL),
(144, 'SWIFT DZ', 'AC', 'WB73F2319', NULL),
(145, 'SWIFT DZIRE', 'AC', 'WB76B2844', NULL),
(146, 'SWIFT DZ', 'AC', 'WB74AS2407', NULL),
(147, 'SWIFT DZ', 'AC', 'WB73G3081', NULL),
(148, 'SWIFT DZ', 'AC', 'WB 76B2844', NULL),
(149, 'ERTIGA', 'AC', 'WB73F4336', NULL),
(150, 'SWIFT DZ', 'AC', 'WB73E9867', NULL),
(151, 'SWIFT DZ', 'AC', 'WB72Y2507', NULL),
(152, 'CRYSTA', 'AC', 'WB73E8181', NULL),
(153, 'SWIFT DZ', 'AC', 'WB73G1828', NULL),
(154, 'Innova ', 'AC', 'WB 73 B 7440', NULL),
(155, 'SWIFT DZ', 'AC', 'WB04D7967', NULL),
(156, 'BUS', 'AC', '25 seater', NULL),
(157, 'CRYSTA', 'AC', 'WB73G4337', NULL),
(158, 'SWIFT DZ', 'AC', 'WB73F3274', NULL),
(159, 'CRYSTA', 'AC', 'WB73TC0522	', NULL),
(160, 'SWIFT DZ', 'AC', 'WB04H1718', NULL),
(161, 'SWIFT DZ', 'AC', 'WB73F1143', NULL),
(162, 'SWIFTDZ', 'AC', 'WB76A7850', NULL),
(163, 'INNOVA', 'AC', 'WB74U5563', NULL),
(164, 'SWIFT DZ', 'AC', 'WB73D1048', NULL),
(165, 'SWIFT DZ', 'AC', 'WB74TC0012', NULL),
(166, 'SWIFT DZ', 'AC', 'WB 79A 9040', NULL),
(167, 'Innova Crysta ', 'AC', 'WB73E8668', NULL),
(168, 'ERTIGA', 'AC', 'WB18AE2175', NULL),
(169, 'Innova', 'AC', 'WB73D7690', NULL),
(170, 'Innova ', 'AC', 'WB76D7690', NULL),
(171, 'INNOVA ', 'AC', 'WB76B3250', NULL),
(172, 'Crysta', 'AC', 'WB783470', NULL),
(173, 'Swift Dz', 'AC', 'WB73E5432', NULL),
(174, 'Innova', 'AC', 'WB783637', NULL),
(175, 'SWIFT DZ', 'AC', 'WB74TC0012', NULL),
(176, 'SWIFT DZ', 'AC', 'WB76B3281', NULL),
(177, 'SWIFT DZ', 'AC', 'WB73G6544', NULL),
(178, 'BREZZA', 'AC', 'WB73E8547', NULL),
(179, 'CRYSTA  ', 'AC', 'WB73E5325', NULL),
(180, 'TATA ACE ', 'NON AC', 'WB73F8373', NULL),
(181, 'SWIFT DZ', 'AC', 'WB73F3048', NULL),
(182, 'Swift dz', 'AC', 'WB73E6864', NULL),
(183, 'CRYSTA', 'AC', 'WB76B3174', NULL),
(184, 'BOLERO GOODS CARRIER', 'NON AC', 'WB73G4251', NULL),
(185, 'Swift dz', 'AC', 'WB73G3081', NULL),
(186, 'Swift Dz', 'AC', 'WB73F5866', NULL),
(187, 'Brezza', 'AC', 'WB73E8547', NULL),
(188, 'INNOVA', 'AC', 'WB73B1015', NULL),
(189, 'INNOVA', 'AC', 'WB73D5353', NULL),
(190, 'Ambulance ', 'AC', 'WB19D4258', NULL),
(191, 'Swift DZ ', 'AC', 'WB76B2788', NULL),
(192, 'INNOVA ', 'AC', 'WB74Q3612', NULL),
(193, 'INNOVA', 'AC', 'WB73F5373', NULL),
(194, 'CRYSTA', 'AC', 'WB74AX2968', NULL),
(195, 'Crysta', 'AC', 'WB76B3250', NULL),
(196, 'WAGON R', 'AC', 'WB74BB4877', NULL),
(197, 'Wagon R', 'AC', 'WB73F0767', NULL),
(198, 'Bolero Ambulance ', 'AC', 'WB73E0737', NULL),
(199, 'CRYSTA', 'AC', 'WB76B3174', NULL),
(200, 'Swift DZ', 'AC', 'WB73G5906', NULL),
(201, 'SWIFT DZ', 'AC', 'WB76B3579', NULL),
(202, 'SWIFT DZ', 'AC', 'WB73G6560', NULL),
(203, 'INNOVA', 'AC', 'WB73D7000', NULL),
(204, 'SWIFT DZ', 'AC', 'WB76B3281', NULL),
(205, 'Swift Dz', 'AC', 'WB73D0485', NULL),
(206, 'SWIFT DZ', 'AC', 'WB73TC-026', NULL),
(208, 'SWIFT DZ', 'AC', 'WB73G8145', NULL),
(209, 'Ambulance ', 'AC', 'WB 73D 9736', NULL),
(210, 'SWIFT DZ', 'AC', 'WB73G5906', NULL),
(211, 'SWIFT DZ', 'AC', 'WB74AL3727', NULL),
(212, 'SWIFT DZ', 'AC', 'WB73B6346', NULL),
(213, 'Hyundai Xcent', 'AC', 'WB73G6620', NULL),
(214, 'SWIFT DZ', 'AC', 'WB73E9881', NULL),
(220, 'TATA NANO', 'AC', 'WB345555', '3');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_bill`
--

CREATE TABLE `vehicle_bill` (
  `id` int(11) NOT NULL,
  `bill_type` varchar(30) DEFAULT NULL,
  `gst_type` varchar(20) NOT NULL DEFAULT 'GST',
  `inv_no` varchar(50) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `name` varchar(105) DEFAULT NULL,
  `company_name` varchar(105) DEFAULT NULL,
  `contact_no` bigint(20) DEFAULT NULL,
  `email` varchar(105) DEFAULT NULL,
  `address` varchar(205) DEFAULT NULL,
  `vehicle_name` varchar(655) DEFAULT NULL,
  `vehicle_type` varchar(500) DEFAULT NULL,
  `vehicle_no` varchar(500) DEFAULT NULL,
  `total_km` varchar(500) DEFAULT NULL,
  `avg` varchar(500) DEFAULT NULL,
  `fuel_price` varchar(500) DEFAULT NULL,
  `total_fuel_price` varchar(500) DEFAULT NULL,
  `daily_basis` varchar(500) DEFAULT NULL,
  `no_days` varchar(500) DEFAULT NULL,
  `total_daily_basis` varchar(500) DEFAULT NULL,
  `total_hr` varchar(500) DEFAULT NULL,
  `hr_rate` varchar(500) DEFAULT NULL,
  `total_hr_price` varchar(500) DEFAULT NULL,
  `night_halt` varchar(500) DEFAULT NULL,
  `extra_hr` varchar(500) DEFAULT NULL,
  `extra_hr_rate` varchar(500) DEFAULT NULL,
  `total_ex_hr_rate` varchar(500) DEFAULT NULL,
  `parking_toll` varchar(500) DEFAULT NULL,
  `per_hr` varchar(500) DEFAULT NULL,
  `gst_no` varchar(155) DEFAULT NULL,
  `rate_per_km` varchar(500) DEFAULT NULL,
  `total_price_per_km` varchar(500) DEFAULT NULL,
  `grand_total` varchar(500) DEFAULT NULL,
  `sub_total` decimal(8,2) NOT NULL,
  `discount_type` tinyint(2) NOT NULL COMMENT '1=amount,2=%',
  `discount` int(11) NOT NULL COMMENT 'if discount_type==1 then amount else if discount_type==2 then %',
  `total_discount` int(11) NOT NULL,
  `is_other_state` int(11) DEFAULT NULL,
  `grand_total_tax` decimal(8,2) DEFAULT NULL,
  `tax_1` varchar(50) NOT NULL,
  `tax_2` varchar(50) NOT NULL,
  `tax_3` varchar(50) NOT NULL,
  `tax_4` varchar(50) NOT NULL,
  `tax_5` varchar(50) NOT NULL,
  `tax_6` varchar(50) DEFAULT NULL,
  `dest_deti` varchar(1000) NOT NULL,
  `date_from` varchar(500) DEFAULT NULL,
  `date_to` varchar(500) DEFAULT NULL,
  `billing_dt` date NOT NULL,
  `gen_date` date NOT NULL,
  `added_by` varchar(220) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_bill`
--

INSERT INTO `vehicle_bill` (`id`, `bill_type`, `gst_type`, `inv_no`, `guest_id`, `name`, `company_name`, `contact_no`, `email`, `address`, `vehicle_name`, `vehicle_type`, `vehicle_no`, `total_km`, `avg`, `fuel_price`, `total_fuel_price`, `daily_basis`, `no_days`, `total_daily_basis`, `total_hr`, `hr_rate`, `total_hr_price`, `night_halt`, `extra_hr`, `extra_hr_rate`, `total_ex_hr_rate`, `parking_toll`, `per_hr`, `gst_no`, `rate_per_km`, `total_price_per_km`, `grand_total`, `sub_total`, `discount_type`, `discount`, `total_discount`, `is_other_state`, `grand_total_tax`, `tax_1`, `tax_2`, `tax_3`, `tax_4`, `tax_5`, `tax_6`, `dest_deti`, `date_from`, `date_to`, `billing_dt`, `gen_date`, `added_by`) VALUES
(4, 'Daily Basis', 'RCM', 'INV/008/2023-24', 0, 'DEMO GOSH', 'CYBER HELP INDIA', 8877556688, 'CYBER@GMAIL.COM', 'HAKIMPARA,SILIGURI', 'BOLERO GOODS CARRIER||INNOVA', 'NON AC||AC', 'WB73G4251||WB 73D 7237', '50||120', '50||36', '50||95', '50.00||316.67', '50||', '50||', '2500.00||0.00', '50||', '50||', '2500.00||0.00', '50||', '50||', '50||', '2500.00||0.00', '50||120', NULL, 'CYBERGSTN1122334455', '', '', '7650.00||436.67', '8086.67', 0, 0, 0, 0, '16982.00', '', '', 'IGST||10||808.67', 'CGST RCM||50||4043.33', 'SGST RCM||50||4043.33', '', 'DESTINATION DETAILS', '08-02-2024||08-02-2024', '08-02-2024||08-02-2024', '2024-02-08', '2024-02-15', '1'),
(6, 'Daily Basis', 'GST', 'INV/012/2023-24', 0, 'MONA MATHUE', 'MONA TECH', 8855225588, 'MONAMATHUE@GMAIL.COM', 'JALPAIGURI', 'TATA ACE ||CRYSTA', 'NON AC||AC', 'WB73F8373||WB 73E 7537', '550||550', '35||29', '96||96', '1508.57||1820.69', '||', '||', '0.00||0.00', '||', '||', '0.00||0.00', '||', '||', '||', '0.00||0.00', '||', NULL, '', '', '', '1508.57||1820.69', '3329.26', 0, 0, 0, 0, '3929.00', 'CGST||9||299.63', 'SGST||9||299.63', '', '', '', '', 'KOLKATA,WB', '08-02-2024||08-02-2024', '09-02-2024||09-02-2024', '2024-02-08', '2024-02-08', '3'),
(7, 'Daily Basis', 'GST', 'INV/013/2023-24', 0, 'TEST', 'TEST COMPANY', 88999999999, 'AAADDD@GMAIL.COM', 'SILIGURI,WB', 'CRYSTA||TATA ACE', 'AC||NON AC', 'WB 73E 7537||WB73F8373', '450||450', '45||33', '96||96', '960.00||1309.09', '||', '||', '0.00||0.00', '||', '||', '0.00||0.00', '||', '||', '||', '0.00||0.00', '||', NULL, 'GSTN11223344', '', '', '960.00||1309.09', '2269.09', 0, 0, 0, 0, '2678.00', 'CGST||9||204.22', 'SGST||9||204.22', '', '', '', '', 'DESTINATION DETAILS', '02-02-2024||02-02-2024', '02-02-2024||03-02-2024', '2024-02-01', '2024-02-08', '1'),
(12, 'Daily Basis', '', 'INV/014/2023-24', 0, 'DEMO GUEST COMPANY', 'CYBER HELP INDIA', 9988556699, 'DEMOGUESTCOMPANY@GMAIL.COM', 'SILIGURI', 'CRYSTA', 'AC', 'WB 73E 7537', '450', '60', '90', '675.00', '', '', '0.00', '', '', '0.00', '', '', '', '0.00', '102', NULL, 'CYBERGSTN4455665', '', '', '777.00', '777.00', 0, 0, 0, 0, '917.00', 'CGST||9||69.93', 'SGST||9||69.93', '', '', '', '', '', '01-02-2024', '15-02-2024', '2024-02-19', '2024-02-19', '1'),
(13, 'Daily Basis', '', 'INV/015/2023-24', 0, 'AMULA BISWAS', '', 8876874123, 'AMULABISWAS@GMAIL.COM', 'SILIGURI,WB', 'TATA ACE', 'NON AC', 'WB73F8373', '999', '40', '95', '2372.63', '', '', '0.00', '', '', '0.00', '', '', '', '0.00', '520', NULL, '', '', '', '2892.63', '2892.63', 0, 0, 0, 0, '3413.00', 'CGST||9||260.34', 'SGST||9||260.34', '', '', '', '', '', '01-02-2024', '02-02-2024', '2024-02-20', '2024-02-20', '1'),
(14, 'Daily Basis', '', 'INV/016/2023-24', 14, 'GCNFHJF', 'JDGJJ', 45245254373, 'GDBX', 'SBXF', 'CRYSTA', 'AC', 'WB 73E 7537', '451', '14', '414', '13336.71', '', '', '0.00', '', '', '0.00', '', '', '', '0.00', '', NULL, 'SFXBFB', '', '', '13336.71', '13336.71', 0, 0, 0, 0, '15737.00', 'CGST||9||1200.30', 'SGST||9||1200.30', '', '', '', '', '', '01-02-2024', '02-02-2024', '2024-02-20', '2024-02-20', '1'),
(15, 'Daily Basis', 'GST', 'INV/017/2023-24', 15, 'TANIA BISWAS', 'PPP COMPANY', 877441563210, 'TANIABISWAS@PPPCOMPANY.COM', 'SILIGURI,WB', 'CRYSTA', 'AC', 'WB 73E 7537', '455', '25', '95', '1729.00', '', '', '0.00', '', '', '0.00', '', '', '', '0.00', '201', NULL, 'GSTNTNJH8YJB8H', '', '', '1930.00', '1930.00', 0, 0, 0, 0, '2277.00', 'CGST||9||173.70', 'SGST||9||173.70', '', '', '', '', '', '01-02-2024', '02-02-2024', '2024-02-01', '2024-02-20', '1'),
(16, 'Daily Basis', 'GST', 'INV/018/2023-24', 15, 'RATAN BISWAS', 'PPP COMPANY', 877441563210, 'RATANBISWAS@PPPCOMPANY.COM', 'SILIGURI,WB', 'TATA ACE', 'NON AC', 'WB73F8373', '555', '30', '95', '1757.50', '', '', '0.00', '12', '100', '1200.00', '', '', '', '0.00', '', NULL, 'SRGSG546', '', '', '2957.50', '2957.50', 0, 0, 0, 0, '3490.00', 'CGST||9||266.18', 'SGST||9||266.18', '', '', '', '', '', '01-02-2024', '02-02-2024', '2024-02-01', '2024-02-20', '1'),
(17, 'Per KM', '', 'INV/019/2023-24', 15, 'RATAN BISWAS', 'PPP COMPANY', 877441563210, 'RATANBISWAS@PPPCOMPANY.COM', 'SILIGURI,W', 'TATA ACE', 'NON AC', 'WB73F8373', '44', '', '', '', '', '', '', '', '', '0.00', '', '', '', '0.00', '', NULL, 'GSTNTNJH8YJB8H', '44', '1936.00', '1936.00', '1458.25', 2, 25, 478, 0, '2284.00', 'CGST||9||174.24', 'SGST||9||174.24', '', '', '', '', '', '02-02-2024', '03-02-2024', '2024-02-01', '2024-02-20', '1'),
(18, 'Per KM', 'GST', 'INV/020/2023-24', 17, 'BIMAL GHOSH', '', 7774445559, 'BIMALGHOSH@GMAIL.COM', 'SILIGURI', 'TATA ACE ||BOLERO GOODS CARRIER', 'NON AC||NON AC', 'WB73F8373||WB73G4251', '110||110', '', '', '', '', '', '', '||', '||', '0.00||0.00', '||', '||', '||', '0.00||0.00', '110||110', NULL, '', '6||6', '660.00||660.00', '770.00||770.00', '1540.00', 2, 10, 154, 0, '1663.00', 'CGST||9||138.60', 'SGST||9||138.60', '', '', '', '', '', '20-02-2024||22-02-2024', '21-02-2024||23-02-2024', '2024-02-02', '2024-02-21', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_bill`
--
ALTER TABLE `vehicle_bill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `vehicle_bill`
--
ALTER TABLE `vehicle_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2017 at 04:48 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtsv3.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `description`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Accountant III', NULL, NULL, NULL),
(4, 'Administrative Aide I', NULL, NULL, NULL),
(5, 'Administrative Aide III', NULL, NULL, NULL),
(6, 'Administrative Aide IV', NULL, NULL, NULL),
(7, 'Administrative Aide VI', NULL, NULL, NULL),
(8, 'Administrative Assistant II', NULL, NULL, NULL),
(9, 'Administrative Assistant III', NULL, NULL, NULL),
(10, 'Administrative Officer IV', NULL, NULL, NULL),
(11, 'Administrative Officer V', NULL, NULL, NULL),
(13, 'BnB Pharmacist', NULL, NULL, NULL),
(15, 'Bookkeeper', NULL, NULL, NULL),
(16, 'Carpenter', NULL, NULL, NULL),
(17, 'Chief, Management Support Division', NULL, NULL, '2017-02-02 03:47:56'),
(18, 'Clerical Aide', NULL, NULL, NULL),
(20, 'Computer Operator II', NULL, NULL, NULL),
(21, 'Computer Operator III', NULL, NULL, NULL),
(22, 'Director IV', NULL, NULL, NULL),
(23, 'Development Management Officer V', NULL, NULL, NULL),
(24, 'Driver I', NULL, NULL, NULL),
(25, 'Driver II', NULL, NULL, NULL),
(26, 'Engineer I', NULL, NULL, NULL),
(27, 'Engineer III', NULL, NULL, NULL),
(28, 'Engineer II', NULL, NULL, NULL),
(29, 'Food-Drug Regulation Officer IV', NULL, NULL, NULL),
(30, 'Food-Drug Regulation Officer I', NULL, NULL, NULL),
(31, 'Food-Drug Regulation Officer II', NULL, NULL, NULL),
(32, 'Food-Drug Regulation Officer III', NULL, NULL, NULL),
(34, 'Field Attendant Worker', NULL, NULL, NULL),
(38, 'Heavy Equipment Operator', NULL, NULL, NULL),
(39, 'HEPO II', NULL, NULL, NULL),
(41, 'Instrumentman', NULL, NULL, NULL),
(42, 'Laboratory Aide I', NULL, NULL, NULL),
(43, 'Laboratory Aide II', NULL, NULL, NULL),
(44, 'Librarian I', NULL, NULL, NULL),
(45, 'Licensing Officer II', NULL, NULL, NULL),
(46, 'Licensing Officer III', NULL, NULL, NULL),
(47, 'Malacologist II', NULL, NULL, NULL),
(48, 'Municipality Malaria Coordinator', NULL, NULL, NULL),
(50, 'SNBC - Medical Technologist', NULL, NULL, NULL),
(52, 'Medical Laboratory Technician II', NULL, NULL, NULL),
(53, 'Medical Equipment Technician I', NULL, NULL, NULL),
(54, 'Medical Equipment Technician II', NULL, NULL, NULL),
(55, 'Medical Equipment Technician III', NULL, NULL, NULL),
(57, 'Medical Laboratory Technician I', NULL, NULL, NULL),
(58, 'Medical Officer V', NULL, NULL, NULL),
(59, 'Medical Specialist II', NULL, NULL, NULL),
(60, 'Medical Specialist III', NULL, NULL, NULL),
(61, 'Medical Specialist IV', NULL, NULL, NULL),
(62, 'Medical Technologist I', NULL, NULL, NULL),
(63, 'Medical Technologist II', NULL, NULL, NULL),
(64, 'Medical Technologist III', NULL, NULL, NULL),
(67, 'Nurse I', NULL, NULL, NULL),
(68, 'Nurse II', NULL, NULL, NULL),
(70, 'Nurse III', NULL, NULL, NULL),
(71, 'Nurse IV', NULL, NULL, NULL),
(72, 'Nurse V', NULL, NULL, NULL),
(73, 'Nutritionist-Dietitian IV', NULL, NULL, NULL),
(74, 'Entomologist III', NULL, NULL, NULL),
(77, 'Pharmacist I', NULL, NULL, NULL),
(78, 'Pharmacist IV', NULL, NULL, NULL),
(79, 'Planning Officer III', NULL, NULL, NULL),
(80, 'Plumber', NULL, NULL, NULL),
(82, 'Regional Health Physicist Designate', NULL, NULL, NULL),
(83, 'Dentist IV', NULL, NULL, NULL),
(85, 'Rural Health Physician', NULL, NULL, NULL),
(86, 'Rural Malaria Coordinator', NULL, NULL, NULL),
(88, 'Statistician I', NULL, NULL, NULL),
(89, 'Statistician II', NULL, NULL, NULL),
(90, 'Statistician III', NULL, NULL, NULL),
(91, 'Surveillance Officer', NULL, NULL, NULL),
(92, 'Utility Worker I', NULL, NULL, NULL),
(93, 'Division Chief', NULL, NULL, NULL),
(94, 'Regional Director', NULL, NULL, NULL),
(95, 'Assistant Regional Director', NULL, NULL, NULL),
(98, 'Section Head', NULL, NULL, NULL),
(99, 'Civil Engineer', NULL, NULL, NULL),
(100, 'Director III', NULL, NULL, NULL),
(101, 'Attorney III', NULL, NULL, NULL),
(102, '', NULL, NULL, NULL),
(103, 'Legal Assistant II', NULL, NULL, NULL),
(104, 'Supervising Administrative Officer', NULL, NULL, NULL),
(105, 'Administrative Officer III', NULL, NULL, NULL),
(106, 'Administrative Officer I', NULL, NULL, NULL),
(107, 'Administrative Assistant V', NULL, NULL, NULL),
(108, 'Administrative Assistant I', NULL, NULL, NULL),
(109, 'Dormitory Manager I', NULL, NULL, NULL),
(110, 'Dormitory Attendant', NULL, NULL, NULL),
(111, 'Computer Maintenance Technologist III', NULL, NULL, NULL),
(112, 'Accountant II', NULL, NULL, NULL),
(113, 'Planning Officer II', NULL, NULL, NULL),
(115, 'Accounting Clerk IV', NULL, NULL, NULL),
(116, 'Accounting Clerk I', NULL, NULL, NULL),
(119, 'Carpernter', NULL, NULL, NULL),
(120, 'Posting Clerk', NULL, NULL, NULL),
(121, 'Aircon Technician', NULL, NULL, NULL),
(122, 'Chief, Local Health Support Division', NULL, NULL, '2017-02-02 03:48:10'),
(123, 'Medical Officer IV', NULL, NULL, NULL),
(124, 'Medical Officer III', NULL, NULL, NULL),
(126, 'Development Management Officer IV', NULL, NULL, NULL),
(127, 'Development Management Officer III', NULL, NULL, NULL),
(129, 'Senior Health Program Officer', NULL, NULL, NULL),
(130, 'Architect II', NULL, NULL, NULL),
(132, 'HEPO III', NULL, NULL, NULL),
(133, 'Midwife VI', NULL, NULL, NULL),
(134, 'Project Assistant III', NULL, NULL, NULL),
(135, 'Project Assistant II', NULL, NULL, NULL),
(136, 'Medical Technologist IV', NULL, NULL, NULL),
(137, 'Dentist III', NULL, NULL, NULL),
(138, 'NCPAM Pharmacist', NULL, NULL, NULL),
(140, 'Health Program Researcher', NULL, NULL, NULL),
(141, 'Disease Surveillance Assistant', NULL, NULL, NULL),
(142, 'SSA Regional Technical Assistant', NULL, NULL, NULL),
(143, 'SNBC Nurse', NULL, NULL, NULL),
(144, 'SIC HIV/AIDS', NULL, NULL, NULL),
(145, 'Regional Field Officer', NULL, NULL, NULL),
(146, 'Health Aiders', NULL, NULL, NULL),
(147, 'HIV/ AIDS Nurse', NULL, NULL, NULL),
(148, 'EDPMS Helpdesk', NULL, NULL, NULL),
(149, 'Training Specialist III', NULL, NULL, NULL),
(150, 'Training Specialist II', NULL, NULL, NULL),
(151, 'Encoder/ Programmer', NULL, NULL, NULL),
(153, 'Licensing Division Chief', NULL, NULL, NULL),
(154, 'Licensing Officer V', NULL, NULL, NULL),
(155, 'GFTB-NFM -Team Leader', NULL, NULL, NULL),
(156, 'GFTB-NFM -Medical Technologist', NULL, NULL, NULL),
(157, 'GFTB-NFM -GeneXpert Staff', NULL, NULL, NULL),
(158, 'GFTB-NFM -Laboratory Aide', NULL, NULL, NULL),
(159, 'Computer Maintenance Technologist II', NULL, NULL, NULL),
(160, 'Project Associate', NULL, NULL, NULL),
(161, 'Dentist Deployment Project', NULL, NULL, NULL),
(162, 'Public Health Assistant', NULL, NULL, NULL),
(163, 'Public Health Associate', NULL, NULL, NULL),
(165, 'Clerical Aid - Excellent', NULL, NULL, NULL),
(166, 'OIC - Chief , Regulation & Licensing Enforcement Divsion', NULL, '2017-02-02 03:58:44', '2017-02-02 03:58:44'),
(167, 'OIC - Assistant Regional Director', NULL, '2017-02-02 05:30:14', '2017-02-02 05:30:14'),
(168, 'Head, Health Facility Development Section', NULL, '2017-03-13 06:18:09', '2017-03-13 06:18:09'),
(169, 'SA II/OIC - ATL', NULL, '2017-05-16 06:51:15', '2017-05-16 06:51:15'),
(170, 'Computer Programmer I', NULL, '2017-06-01 01:24:38', '2017-06-01 01:24:38'),
(171, 'Computer Maintenance Technologist I', NULL, '2017-06-09 03:52:29', '2017-06-09 03:52:29'),
(172, 'Data Encoder III', NULL, '2017-09-06 00:37:58', '2017-09-06 00:37:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

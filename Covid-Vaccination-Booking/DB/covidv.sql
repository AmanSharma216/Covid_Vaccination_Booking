-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 11:42 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `adminEmail` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `adminEmail`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `centres`
--

CREATE TABLE `centres` (
  `ID` int(10) NOT NULL,
  `CITYNAME` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `centres`
--

INSERT INTO `centres` (`ID`, `CITYNAME`) VALUES
(1, 'Chandigarh'),
(2, 'MOHALI'),
(3, 'Ludhiana'),
(4, 'Panchkula'),
(5, 'Jalandhar'),
(6, 'Kanpur');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `patientEmail` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `vaccinename` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `nic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `patientEmail`, `password`, `vaccinename`, `city`, `nic`) VALUES
(1, 'Aman Sharma', 'aman@gmail.com', 'Aman@12345', 'Sputnik V', 'Colombo', '32432'),
(2, 'Pooja', 'pooja@gmail.com', 'pooja@1234', 'Oxford AstraZeneca', 'Chandigarh', '6164146'),
(3, 'AAAA', 'AAA@gmail.com', 'Aman@123455555', 'Oxford AstraZeneca', 'Chandigarh', '5446564'),
(4, 'Harsh', 'harsh@gmail.com', 'Harsh$1234', 'Covaxin', 'Ludhiana', '2123664464'),
(17, 'Aman3', 'Aman3@gmail.com', 'Aman@2023', 'Janssen', 'Kanpur', '123456789'),
(18, 'Aman5', 'Aman5@gmail.com', 'Aman@0258', 'Janssen', 'Raipur', '1232145654'),
(19, 'Aman10', 'aman10@gmail.com', 'Aman@2001', 'Oxford AstraZeneca', 'Chandigarh', '159753'),
(20, 'Aman Sharma', 'amansharma@gmail.com', 'Aman@20230', 'Oxford AstraZeneca', 'Chennai', '946136497');

-- --------------------------------------------------------

--
-- Table structure for table `second_vaccine_requests`
--

CREATE TABLE `second_vaccine_requests` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `vaccinename` varchar(1000) NOT NULL,
  `patientID` varchar(1000) NOT NULL,
  `SvaccineLocation` varchar(1000) NOT NULL,
  `SvaccineTime` varchar(1000) NOT NULL,
  `status` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `second_vaccine_requests`
--

INSERT INTO `second_vaccine_requests` (`id`, `name`, `email`, `city`, `vaccinename`, `patientID`, `SvaccineLocation`, `SvaccineTime`, `status`) VALUES
(10, 'Raj', 'raj@gmail.com', 'Delhi', 'Moderna', '1', 'STFA', '12/12/22.12.01', 'completed'),
(12, 'Ridhim', 'Ridhim@gmail.com', 'Kashmir', 'Oxford AstraZeneca', '6', 'Colombo Genaral', '12/12/22.12.01', 'completed'),
(41, 'Aman10', 'aman10@gmail.com', 'Chandigarh', 'Oxford AstraZeneca', '19', 'MOHALI', '2332-03-21T03:21', 'completed'),
(69, 'Aman Sharma', 'amansharma@gmail.com', 'Chennai', 'Oxford AstraZeneca', '20', 'MOHALI', '111212-12-21T21:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(255) NOT NULL,
  `vaccinename` varchar(1000) NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `vaccinename`, `details`) VALUES
(2, 'Moderna', 'The Moderna COVID-19 vaccine, codenamed mRNA-1273 and sold under the brand name Spikevax'),
(3, 'Oxford AstraZeneca', 'ChAdOx1 nCoV-19 Corona Virus Vaccine (Recombinant) has been given an emergency use authorization (conditional approval) for active immunization of individuals aged 18 years and older for the prevention of coronavirus disease 2019 (COVID-19)'),
(4, 'Janssen', 'The Janssen COVID-19 vaccine is used to provide protection against infection by the SARS-CoV-2 virus in order to prevent COVID-19 in people aged eighteen years and older.'),
(5, 'Sputnik V', 'Sputnik V or Gam-COVID-Vac is an adenovirus viral vector vaccine for COVID-19 developed by the Gamaleya Research Institute of Epidemiology and Microbiology in Russia.'),
(6, 'Sinopharm (WIBP)', 'The Sinopharm BIBP COVID-19 vaccine, also known as BBIBP-CorV, the Sinopharm COVID-19 vaccine, or BIBP vaccine, is one of two whole inactivated virus COVID-19 vaccines developed by Sinopharm\'s Beijing'),
(7, 'Covaxin', 'Covaxin is a whole inactivated virus-based COVID-19 vaccine developed by Bharat Biotech in collaboration with the Indian Council of Medical Research - National Institute of Virology.'),
(9, 'Pfizer BioNTech', 'All images\nPfizer–BioNTech COVID-19 vaccine\n\nCOVID-19 vaccine\nThe Pfizer–BioNTech COVID-19 vaccine, sold under the brand name Comirnaty, is an mRNA-based COVID-19 vaccine developed by the German biotechnology company BioNTech');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `second_vaccine_requests`
--
ALTER TABLE `second_vaccine_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `second_vaccine_requests`
--
ALTER TABLE `second_vaccine_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2017 at 12:07 AM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `hackathon_isro_db1`
--

CREATE TABLE `hackathon_isro_db1` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dob_proof` varchar(100) NOT NULL,
  `cat_cert` varchar(100) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `ed_qual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hackathon_isro_db1`
--

INSERT INTO `hackathon_isro_db1` (`username`, `password`, `dob_proof`, `cat_cert`, `hash`, `ed_qual`) VALUES
('aditi', 'aff024fe4ab0fece4091de044c58c9ae4233383a', '', '', 'b55739b384dd85d6e4d9498c7da057a8bdcb83d7e54a98f70ad83bd247e73ef7', ''),
('vasa', 'a375da4cb6f8a4d722075dad90d225cfef0aac76', 'flight.pdf', 'flight2.pdf', 'd0dab5c6545e1cecf478738e174a41e9bb65b631c08a2844c6e1e15c26ccd7de', 'flight3.pdf'),
('vasa2', '826cf89ec4c6a08ba15f10c1297bcf1e6c67e2f8', '', '', 'ed1d316783b778eff1d0219cc37ee43bb35f9e0c2c938aec6f7dfe93e6bb0733', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hackathon_isro_db1`
--
ALTER TABLE `hackathon_isro_db1`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

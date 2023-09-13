-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 03:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `km_agri`
--

-- --------------------------------------------------------

--
-- Table structure for table `bharat`
--

CREATE TABLE `bharat` (
  `id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bharat`
--

INSERT INTO `bharat` (`id`) VALUES
('16944546472545697'),
('16944549355484741'),
('16944595338433981'),
('16945823618065874'),
('16945857022983373'),
('16945861310688520'),
('16945869427043990'),
('16945872743276232'),
('16945879363351158');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_data`
--

CREATE TABLE `farmer_data` (
  `f_name` varchar(255) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `mno` text NOT NULL,
  `exp` int(32) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer_data`
--

INSERT INTO `farmer_data` (`f_name`, `u_name`, `pass`, `mno`, `exp`) VALUES
('kmagri', 'kmagri123', 'kmagri@123', '+918010269748', 0),
('bharat', 'expt', 'expt', '+919960824505', 1),
('harsh', 'harsh123', 'Harsh@123', '+918010269748', 0);

-- --------------------------------------------------------

--
-- Table structure for table `onion`
--

CREATE TABLE `onion` (
  `name` text NOT NULL,
  `job` int(32) NOT NULL,
  `tb_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onion`
--

INSERT INTO `onion` (`name`, `job`, `tb_name`) VALUES
('Bharat', 10, 'bharat'),
('rushi', 9, 'rushi'),
('onkar', 9, 'onkar');

-- --------------------------------------------------------

--
-- Table structure for table `onkar`
--

CREATE TABLE `onkar` (
  `id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onkar`
--

INSERT INTO `onkar` (`id`) VALUES
('16944549268709752'),
('16944595237314821'),
('16945823545847719'),
('16945856712896888'),
('16945872646086916'),
('16945879251478339');

-- --------------------------------------------------------

--
-- Table structure for table `pik`
--

CREATE TABLE `pik` (
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pik`
--

INSERT INTO `pik` (`name`) VALUES
('onion'),
(''),
('makka'),
('us');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` text NOT NULL,
  `farmer_name` text NOT NULL,
  `img` text NOT NULL,
  `disc` text NOT NULL,
  `que` text NOT NULL,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `farmer_name`, `img`, `disc`, `que`, `ans`) VALUES
('16945872316198182', 'kmagri', 'nature.jfif', 'bharat', '', ''),
('16945872646086916', 'kmagri', 'image1.jpg', 'dsfdf', '', ''),
('16945879154757667', 'kmagri', 'nature.jfif', 'gfdkcgfycid', '', ''),
('16945879251478339', 'kmagri', 'shivaji maharaj.jpg', 'sjdfkf', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rushi`
--

CREATE TABLE `rushi` (
  `id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rushi`
--

INSERT INTO `rushi` (`id`) VALUES
('16944547801843480'),
('16944595159296831'),
('16945823418814935'),
('1694585605273974'),
('16945858956074245'),
('16945872316198182'),
('16945879154757667');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2022 at 04:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankingsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `creditor_name` text NOT NULL,
  `debtor_name` text NOT NULL,
  `transfer_amt` int(9) NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`creditor_name`, `debtor_name`, `transfer_amt`, `date_time`) VALUES
('Mary Anne', 'Arora Beauty', 11200, '2022-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `uid` int(69) NOT NULL,
  `folkname` text NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `balanceamt` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`uid`, `folkname`, `emailid`, `balanceamt`) VALUES
(87, 'Arora Beauty', 'beauty@hotmail.com', 1126199),
(128, 'Mary Anne', 'anne@outlook.com', 40),
(7, 'McGuigan Tracey', 'trasee@hotmail.com', 9022100),
(787, 'Laroi Kid', 'kid@hotmail.com', 13100),
(869, 'Moore Flanagan', 'moore@hotmail.com', 1030),
(13, 'Audrey McConnell', 'aud@outlook.com', 221400),
(112, 'John Auffenberg', 'john@outlook.com', 722200),
(78, 'Maguire Murphy', 'murr@outlook.com', 101),
(897, 'Harkin Mayse', 'maize@hotmail.com', 3004),
(102, 'Abigail Gates', 'gates@outlook.com', 3200),
(8, 'Brain Sully', 'sal@hotmail.com', 100),
(12, 'McNamee Wilson', 'wilson@outlook.com', 700),
(89, 'Devine Bradley', 'brad@outlook.com', 310100),
(4, 'Mary Poppins', 'maryp@hotmail.com', 30000),
(39, 'Aurora Beauty', 'ab123@hotmail.com', 11400),
(987, 'Holland McClure', 'curee@hotmail.com', 22370);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

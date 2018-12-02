-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 06:02 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_max`
--

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`) VALUES
(1, 'Maruti'),
(2, 'Tata');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `model_name` varchar(200) NOT NULL,
  `choose_manu` int(10) NOT NULL,
  `color` varchar(100) NOT NULL,
  `manu_number` varchar(100) NOT NULL,
  `regi_number` varchar(150) NOT NULL,
  `first_image` varchar(200) NOT NULL,
  `second_image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `model_name`, `choose_manu`, `color`, `manu_number`, `regi_number`, `first_image`, `second_image`) VALUES
(3, 'das', 1, 'red', '21341431', 'qeq', '<img src="http://localhost/code_max/uploads/158.jpg" height="150" width="225" class="img-thumbnail" />', '<img src="http://localhost/code_max/uploads/950.jpg" height="150" width="225" class="img-thumbnail" />'),
(4, 'das', 1, 'red', '21341431', 'qeq', '<img src="http://localhost/code_max/uploads/158.jpg" height="150" width="225" class="img-thumbnail" />', '<img src="http://localhost/code_max/uploads/950.jpg" height="150" width="225" class="img-thumbnail" />'),
(5, 'swift200', 1, 'white', 'SW12345', '098789087u98', '<img src="http://localhost/code_max/uploads/218.jpg" height="150" width="225" class="img-thumbnail" />', '<img src="http://localhost/code_max/uploads/670.jpg" height="150" width="225" class="img-thumbnail" />'),
(6, 'indigoE2cs', 2, 'black', '90832414', 'tata23123', '<img src="http://localhost/code_max/uploads/287.jpg" height="150" width="225" class="img-thumbnail" />', '<img src="http://localhost/code_max/uploads/271.jpg" height="150" width="225" class="img-thumbnail" />'),
(7, 'indigoE2cs', 2, 'black', '90832414', 'tata23123', '<img src="http://localhost/code_max/uploads/287.jpg" height="150" width="225" class="img-thumbnail" />', '<img src="http://localhost/code_max/uploads/271.jpg" height="150" width="225" class="img-thumbnail" />');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

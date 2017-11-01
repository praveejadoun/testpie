-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 05:53 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezeeit`
--

-- --------------------------------------------------------

--
-- Table structure for table `ezee_dcbda`
--

CREATE TABLE `ezee_dcbda` (
  `id` int(10) NOT NULL,
  `bda_number` varchar(255) DEFAULT NULL,
  `bda_name` varchar(255) DEFAULT NULL,
  `ldc` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ezee_dcbda`
--

INSERT INTO `ezee_dcbda` (`id`, `bda_number`, `bda_name`, `ldc`, `city`) VALUES
(1, 'BDA Number', 'BDA NAME', 'LDC', ''),
(2, '111111-1', 'Surendra Yadav', 'BADLAPUR DC', 'mumbai'),
(3, '111111-2', 'Sushant Kamble', 'BADLAPUR DC', 'mumbai'),
(4, '111111-3', 'Sunil Kumar Yadav', 'BHIWANDI DC', 'mumbai'),
(5, '111111-4', 'Ratnesh Kumar', 'BHIWANDI DC', 'mumbai'),
(6, '111111-5', 'Rajesh Shukla', 'VASAI DC', 'mumbai'),
(7, '111111-6', 'Krishnadev Pandey', 'BHIWANDI DC', 'mumbai'),
(8, '111111-7', 'Suraj Mishra', 'VASAI DC', 'mumbai'),
(9, '111111-8', 'Jai Prakash Singh', 'BHIWANDI DC', 'mumbai'),
(10, '111111-9', 'Pramod Kumar', 'BHIWANDI DC', 'mumbai'),
(11, '111111-10', 'Vinod Kumar\'', 'BHIWANDI DC', 'mumbai'),
(12, '111111-11', 'Prabhakar Mankar', 'NAGPUR DC', 'nagpur'),
(13, '111111-12', 'Vikas Wanjari', 'NAGPUR DC', 'nagpur'),
(14, '111111-13', 'Nitin Ganvir', 'NAGPUR DC', 'nagpur'),
(15, '111111-14', 'Rajesh Shiv', 'NAGPUR DC', 'nagpur'),
(16, '111111-15', 'Ganesh Ashtapawar', 'NAGPUR DC', 'nagpur'),
(17, '111111-16', 'Rahul Singh', 'BHIWANDI DC', 'mumbai'),
(18, '111111-17', 'Om Prakash Pandey', 'BHIWANDI DC', 'mumbai'),
(19, '111111-18', 'Nafij Shaikh', 'VASAI DC', 'mumbai'),
(20, '111111-19', 'Satish Gaikwad', 'BHIWANDI DC', 'mumbai'),
(21, '111111-20', 'Shantanu Kamble', 'BHIWANDI DC', 'mumbai'),
(22, '111111-21', 'Amit Pandey', 'BHIWANDI DC', 'mumbai'),
(23, '111111-22', 'Kamlesh Mishra', 'BHIWANDI DC', 'mumbai'),
(24, '111111-23', 'Ankit Pandey', 'BHIWANDI DC', 'mumbai'),
(25, '111111-24', 'Akash Pandey', 'BHIWANDI DC', 'mumbai'),
(26, '111111-25', 'Vikas Tiwari', 'BHIWANDI DC', 'mumbai'),
(27, '111111-26', 'Test BDA', '', ''),
(28, '111111-27', 'Ratanpal Patil', 'NAGPUR DC', 'nagpur'),
(29, '111111-28', 'Girijesh Pandey', 'NAGPUR DC', 'nagpur'),
(30, '111111-29', 'Atul Mishra', 'VASAI DC', 'mumbai'),
(31, '111111-30', 'Jitendra Yadav', 'BADLAPUR DC', 'mumbai'),
(32, '111111-31', 'Ashish Dubey', 'VASAI DC', 'mumbai'),
(33, '111111-32', 'Anuj Tiwari', 'BHIWANDI DC', 'mumbai'),
(34, '111111-33', 'Radheshyam Balpande', 'NAGPUR DC', 'nagpur'),
(35, '111111-34', 'Gaurav Kumar', 'NAGPUR DC', 'nagpur'),
(36, '111111-35', 'Umesh Singh', 'VASAI DC', 'mumbai'),
(37, '111111-36', 'Dinesh Singh', 'BHIWANDI DC', 'mumbai'),
(38, '111111-37', 'Shailesh Shukla', 'BHIWANDI DC', 'mumbai'),
(39, '111111-38', 'Anil Kumar Tiwari', 'BHIWANDI DC', 'mumbai'),
(40, '111111-39', 'Umesh Katekhaye', 'NAGPUR DC', 'nagpur'),
(41, '111111-40', 'Ravindra Hari Utekar', 'BHIWANDI DC', 'mumbai'),
(42, '111111-41', 'Suraj Pandey', 'VASAI DC', 'mumbai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ezee_dcbda`
--
ALTER TABLE `ezee_dcbda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ezee_dcbda`
--
ALTER TABLE `ezee_dcbda`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

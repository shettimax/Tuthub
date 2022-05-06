-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2021 at 12:34 AM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-50+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathwaytutors`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `username` varchar(60) NOT NULL COMMENT 'this whatz use for login',
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `regdate` varchar(60) NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` varchar(30) NOT NULL,
  `course` int(11) NOT NULL,
  `paid` int(2) NOT NULL,
  `passport` blob NOT NULL,
  `adder` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `label`, `username`, `fname`, `lname`, `password`, `regdate`, `address`, `state`, `course`, `paid`, `passport`, `adder`) VALUES
(1, 'RBGQ408311206', 'black1337@yahoo.com', 'black', 'haxor', '1337', '2021-08-31', 'earth', 'Kaduna', 1, 1, 0x2052424751343038302e6a7067, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pin` int(11) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `pin`) VALUES
(1, 'adminn', 'admin@admin', 'admin', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  `cosdin` varchar(30) NOT NULL,
  `courseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `cosdin`, `courseid`) VALUES
(1, 'RED', 'HACKING', 2),
(2, 'ORANGE', 'WEBDEV', 1),
(3, 'GRAY', 'LINUX OS', 4),
(4, 'ORANGE', 'DBMS', 6),
(5, 'RED', 'PHISHING', 3),
(6, 'GRAY', 'WINDOWS OS', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `source` int(11) NOT NULL,
  `details` varchar(10000) NOT NULL,
  `date` date NOT NULL,
  `dismiss` tinyint(11) NOT NULL,
  `level` tinyint(11) NOT NULL,
  `fulldetails` varchar(9000) NOT NULL,
  `courseid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `subject`, `source`, `details`, `date`, `dismiss`, `level`, `fulldetails`, `courseid`) VALUES
(1, 'LESSON 1', 1, 'HOW TO HACK INSTAGRAM', '2021-01-09', 0, 2, '1337', 3),
(2, 'LESSON 2', 1, 'HOW TO HACK WHATSAPP', '2021-01-09', 0, 2, '1337', 3),
(3, 'LESSON 3', 1, 'HOW TO HACK GMAIL', '2021-01-09', 0, 2, '1337', 3),
(4, 'LESSON 1', 1, 'DNS SPOOFING', '2021-08-03', 0, 2, 'https://dddd.com', 2),
(5, 'LESSON 1', 2, 'HTML5 BASICS', '2021-09-01', 0, 2, 'https://dddd.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `cost` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `description`, `cost`) VALUES
(1, 'WEB DEVELOPMENT ', 'get guides on coding a successful web application projects + free sourcecodes', '10,000'),
(2, 'WEB HACKING ', 'get insights of how web apps are hacked + free tools', '15,000'),
(3, 'PHISHING ', 'get full key idea on hacking social media accounts +free resources', '5,000'),
(4, 'LINUX OS ', 'tutorials on linux operating system', '20,000'),
(5, 'WINDOWS OS ', 'tutorials on windows operating system', '20,000'),
(6, 'DBMS ', 'database management system', '20,000');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'Abuja'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` int(11) NOT NULL,
  `label` varchar(40) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(500) NOT NULL,
  `gsm` varchar(12) NOT NULL,
  `state` varchar(30) NOT NULL,
  `address` varchar(500) NOT NULL,
  `course` int(2) NOT NULL,
  `paid` int(11) NOT NULL,
  `pix` blob NOT NULL,
  `facebook` varchar(100) NOT NULL COMMENT 'facebook link of tutor for verification',
  `regnumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `label`, `fname`, `lname`, `email`, `password`, `gsm`, `state`, `address`, `course`, `paid`, `pix`, `facebook`, `regnumber`) VALUES
(1, 'TTTI909010640', 'dd', 'oo', 'ss@f.co', 'xx', '081764424', 'Borno', 'mffff', 1, 1, 0x2054493930393031303634306a7067, 'eee', ''),
(2, 'TTKI709010815', 'ax', 'timax', 'black7@yahoo.com', 'ccc', '081476422', 'Borno', 'ffff', 2, 1, 0x2054544b49373039303130383135202e6a7067, 'eee', '1'),
(3, 'TTYZ009011047', 'TEE', 'HAXOR', '1337x@yahoo.com', 'kk', '081766429', 'Jigawa', 'lol', 1, 1, 0x205454595a30303131303437202e6a7067, 'https://ss', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tutsvalidation`
--

CREATE TABLE `tutsvalidation` (
  `id` int(11) NOT NULL,
  `schoolname` varchar(100) NOT NULL,
  `department` varchar(30) NOT NULL DEFAULT 'Computer Science' COMMENT 'computer related fields by default',
  `regnumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutsvalidation`
--

INSERT INTO `tutsvalidation` (`id`, `schoolname`, `department`, `regnumber`) VALUES
(1, 'Kaduna State University', 'Computer Science', 'KS/16/CS0001'),
(2, 'Kaduna State University', 'Computer Science', 'KS/16/CS0002'),
(3, 'Kaduna State University', 'Computer Science', 'KS/1/CS0003'),
(4, 'Kaduna State University', 'Computer Science', 'KS/1/CS0004'),
(5, 'Kaduna State University', 'Computer Science', 'KS/1/CS0005'),
(6, 'Kaduna State University', 'Computer Science', 'KS/1/CS0006'),
(7, 'Kaduna State University', 'Computer Science', 'KS/1/CS0007'),
(8, 'Kaduna State University', 'Computer Science', 'KS/1/CS0008'),
(9, 'Kaduna State University', 'Computer Science', 'KS/1/CS0009'),
(10, 'Kaduna State University', 'Computer Science', 'KS/1/CS0010'),
(11, 'Kaduna State University', 'Computer Science', 'KS/16/CS0011'),
(12, 'Kaduna State University', 'Computer Science', 'KS/1/CS0012'),
(13, 'Kaduna State University', 'Computer Science', 'KS/1/CS0013'),
(14, 'Kaduna State University', 'Computer Science', 'KS/1/CS0014'),
(15, 'Kaduna State University', 'Computer Science', 'KS/1/CS0015'),
(16, 'Kaduna State University', 'Computer Science', 'KS/1/CS0016'),
(17, 'Kaduna State University', 'Computer Science', 'KS/1/CS0017'),
(18, 'Kaduna State University', 'Computer Science', 'KS/1/CS0018'),
(19, 'Kaduna State University', 'Computer Science', 'KS/1/CS0019'),
(20, 'Kaduna State University', 'Computer Science', 'KS/1/CS0020'),
(21, 'Kaduna State University', 'Computer Science', 'KS/1/CS0021'),
(22, 'Kaduna State University', 'Computer Science', 'KS/1/CS0022'),
(23, 'Kaduna State University', 'Computer Science', 'KS/1/CS0023'),
(24, 'Kaduna State University', 'Computer Science', 'KS/1/CS0024'),
(25, 'Kaduna State University', 'Computer Science', 'KS/1/CS0025'),
(26, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/001'),
(27, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/002'),
(28, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/003'),
(29, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/004'),
(30, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/005'),
(31, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/006'),
(32, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/007'),
(33, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/008'),
(34, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/009'),
(35, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/010'),
(36, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/011'),
(37, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/012'),
(38, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/013'),
(39, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/014'),
(40, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/015'),
(41, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/016'),
(42, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/017'),
(43, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/018'),
(44, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/019'),
(45, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/020'),
(46, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/021'),
(47, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/022'),
(48, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/023'),
(49, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/024'),
(50, 'Bayero University Kano', 'Computer Science', 'PS/1/CS/025'),
(51, 'Ahmadu Bello University', 'Computer Science', 'U102'),
(52, 'Ahmadu Bello University', 'Computer Science', 'U1003'),
(53, 'Ahmadu Bello University', 'Computer Science', 'U11004'),
(54, 'Ahmadu Bello University', 'Computer Science', 'U16CS1005'),
(55, 'Ahmadu Bello University', 'Computer Science', 'U16CS1006'),
(56, 'Ahmadu Bello University', 'Computer Science', 'U16CS1007'),
(57, 'Ahmadu Bello University', 'Computer Science', 'U16CS1008'),
(58, 'Ahmadu Bello University', 'Computer Science', 'U16CS1009'),
(59, 'Ahmadu Bello University', 'Computer Science', 'U16CS1010'),
(60, 'Ahmadu Bello University', 'Computer Science', 'U16CS1011'),
(61, 'Ahmadu Bello University', 'Computer Science', 'U16CS1012'),
(62, 'Ahmadu Bello University', 'Computer Science', 'U16CS1013'),
(63, 'Ahmadu Bello University', 'Computer Science', 'U16CS1014'),
(64, 'Ahmadu Bello University', 'Computer Science', 'U16CS1015'),
(65, 'Ahmadu Bello University', 'Computer Science', 'U16CS1016'),
(66, 'Ahmadu Bello University', 'Computer Science', 'U16CS1017'),
(67, 'Ahmadu Bello University', 'Computer Science', 'U16CS1018'),
(68, 'Ahmadu Bello University', 'Computer Science', 'U16CS1019'),
(69, 'Ahmadu Bello University', 'Computer Science', 'U16CS1020'),
(70, 'Ahmadu Bello University', 'Computer Science', 'U16CS1021'),
(71, 'Ahmadu Bello University', 'Computer Science', 'U16CS1022'),
(72, 'Ahmadu Bello University', 'Computer Science', 'U16CS1023'),
(73, 'Ahmadu Bello University', 'Computer Science', 'U16CS1024'),
(74, 'Ahmadu Bello University', 'Computer Science', 'U16CS1025'),
(75, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1001'),
(76, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1002'),
(77, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1003'),
(78, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1004'),
(79, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1005'),
(80, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1006'),
(81, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1007'),
(82, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1008'),
(83, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1009'),
(84, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1010'),
(85, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1011'),
(86, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1012'),
(87, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1013'),
(88, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1014'),
(89, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1015'),
(90, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1016'),
(91, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1017'),
(92, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1018'),
(93, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1019'),
(94, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1020'),
(95, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1021'),
(96, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1022'),
(97, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1023'),
(98, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1024'),
(99, 'Usman Danfodio University', 'Computer Science', 'UD16/CS1025'),
(100, 'University of Lagos', 'Computer Science', 'UL/CE/16001'),
(101, 'University of Lagos', 'Computer Science', 'UL/CE/16002'),
(102, 'University of Lagos', 'Computer Science', 'UL/CE/16003'),
(103, 'University of Lagos', 'Computer Science', 'UL/CE/16004'),
(104, 'University of Lagos', 'Computer Science', 'UL/CE/16005'),
(105, 'University of Lagos', 'Computer Science', 'UL/CE/16006'),
(106, 'University of Lagos', 'Computer Science', 'UL/CE/16007'),
(107, 'University of Lagos', 'Computer Science', 'UL/CE/16008'),
(108, 'University of Lagos', 'Computer Science', 'UL/CE/16009'),
(109, 'University of Lagos', 'Computer Science', 'UL/CE/16010'),
(110, 'University of Lagos', 'Computer Science', 'UL/CE/16011'),
(111, 'University of Lagos', 'Computer Science', 'UL/CE/16012'),
(112, 'University of Lagos', 'Computer Science', 'UL/CE/16013'),
(113, 'University of Lagos', 'Computer Science', 'UL/CE/16014'),
(114, 'University of Lagos', 'Computer Science', 'UL/CE/16015'),
(115, 'University of Lagos', 'Computer Science', 'UL/CE/16016'),
(116, 'University of Lagos', 'Computer Science', 'UL/CE/16017'),
(117, 'University of Lagos', 'Computer Science', 'UL/CE/16018'),
(118, 'University of Lagos', 'Computer Science', 'UL/CE/16019'),
(119, 'University of Lagos', 'Computer Science', 'UL/CE/16020'),
(120, 'University of Lagos', 'Computer Science', 'UL/CE/16021'),
(121, 'University of Lagos', 'Computer Science', 'UL/CE/16022'),
(122, 'University of Lagos', 'Computer Science', 'UL/CE/16023'),
(123, 'University of Lagos', 'Computer Science', 'UL/CE/16024'),
(124, 'University of Lagos', 'Computer Science', 'UL/CE/16025');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`username`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutsvalidation`
--
ALTER TABLE `tutsvalidation`
  ADD PRIMARY KEY (`regnumber`),
  ADD UNIQUE KEY `regnumber` (`regnumber`),
  ADD UNIQUE KEY `idd` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tutsvalidation`
--
ALTER TABLE `tutsvalidation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

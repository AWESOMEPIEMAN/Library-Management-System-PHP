-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2007 at 10:48 AM
-- Server version: 10.5.5-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db22a13`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`admin_id`, `admin_name`, `admin_password`) VALUES
(13, '22a13', '99874');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_cost` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_company` varchar(100) NOT NULL,
  `book_year` date NOT NULL,
  `book_cost` int(11) NOT NULL,
  `book_count` int(11) NOT NULL,
  `book_quality` varchar(20) NOT NULL,
  `book_contributor_name` varchar(30) NOT NULL,
  `book_contributor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_author`, `book_company`, `book_year`, `book_cost`, `book_count`, `book_quality`, `book_contributor_name`, `book_contributor_id`) VALUES
(1, 'Shelby Co', 'Tommy Dik', 'Times', '2006-02-21', 30, 3, 'Excellent', 'usman', 112),
(2, 'MarkTwain', 'Mark Arthur', 'Times', '2022-04-22', 30, 6, 'Good', 'usman', 112),
(3, 'Spiders', 'Mark Hamwell', 'Readers', '2003-12-22', 55, 2, 'Poor', 'usman', 112),
(4, 'Ecostar', 'Shakeel O NEal', 'Haiders', '2005-02-23', 30, 2, 'Bad', 'usman', 112),
(5, 'Strangler', 'Mark Hamil', 'Times Square', '2003-10-10', 20, 4, 'Good', 'touheed', 169),
(6, 'Newtons Law', 'Chipoong', 'SingaporeRead', '2015-09-29', 40, 1, 'Poor', 'touheed', 169),
(7, 'Orange ', 'Emily', 'Readers', '2014-07-23', 30, 2, 'Good', 'touheed', 169),
(8, 'Clock Work', 'James Blunt', 'Rolex', '2019-10-09', 70, 5, 'Excellent', 'touheed', 169),
(9, 'Coke ', 'Benjamin', 'CocaCola', '2012-05-30', 20, 4, 'Good', 'touheed', 169),
(10, 'Chords', 'Mathew ', 'ChordsDay', '2017-11-29', 25, 2, 'Good', 'touheed', 169),
(11, 'ABCs of death', 'Anne Hatheway', 'Readers', '2018-10-24', 50, 2, 'Excellent', 'shamsa h', 448),
(12, 'Encyclopedia', 'Sam Smith', 'ET', '2021-05-20', 20, 1, 'Good', 'shamsa h', 448),
(13, 'Ruison', 'Dillon', 'Doorstep', '2009-10-14', 15, 4, 'Poor', 'shamsa h', 448),
(14, 'Harry Potter', 'JK Rowling', 'Times', '2022-04-09', 32, 1, 'Bad', 'usman', 112),
(15, 'shh', 'jjgj', 'iijnl', '2022-04-11', 10, 3, 'Excellent', 's26j1929', 627),
(16, 'math', 'Mohammed', 'ssdd', '2020-10-13', 10, 2, 'Excellent', 'ali', 557),
(17, 'math', 'Mohammed', 'ssdd', '2020-10-13', 10, 2, 'Excellent', 'ali', 557),
(18, 'math', 'Mohammed', 'ssdd', '2020-10-13', 10, 2, 'Excellent', 'ali', 557),
(19, 'math', 'Mohammed', 'ssdd', '2020-10-13', 10, 2, 'Good', 'ali', 557),
(20, 'math', 'Mohammed', 'ssdd', '2022-01-12', 4, 2, 'Excellent', 'ali', 557),
(21, 'fhfh', 'njbn ', 'gfcg', '2021-06-10', 4, 2, 'Good', 'ali', 557),
(22, 'Coke', 'hhf', 'okuj', '2021-06-23', 8, 2, 'Good', 'ali', 557),
(23, 'shh', 'jjgj', 'iijnl', '2022-09-06', 5, 4, 'Good', 'ali', 603),
(24, 'shh', 'jjgj', 'iijnl', '2022-04-22', 5, 4, 'Poor', 'JJ', 343),
(25, 'Oman', 'Mohammed', 'gjjkl', '2022-01-10', 10, 1, 'Good', 'JJ', 343),
(26, 'cock', 'ali', '345', '2020-03-12', 89, 4, 'Excellent', 's26s123', 444),
(27, 'cock', 'ali', '345', '2022-04-16', 60, 4, 'Excellent', 'S26S123', 706),
(28, 'python2', 'ali', '234', '2021-08-25', 58, 3, 'Good', 's26j123', 336);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `user_id`, `bill_amount`) VALUES
(1, 112, 35),
(2, 627, 96),
(3, 627, 70),
(4, 557, 65),
(5, 557, 166),
(6, 603, 40),
(7, 343, 125),
(8, 343, 70),
(9, 112, 115),
(10, 426, 4),
(11, 336, 95),
(12, 343, 70);

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`user_id`, `user_name`, `user_password`, `user_email`, `user_address`, `user_phone`, `user_position`) VALUES
(112, 'usmanh', '1234', 'usman@gmail.com', 'tech', '666', 'student'),
(169, 'touheed', '4321', 'touheed@gmail.com', 'Iqbal ', '0302', 'Student'),
(557, 'mmm', '2233', 'mmm@gmail.com', 'hgh', '64543', 'Student'),
(627, 'shamsa D', '23663219', 'sgdsh@gmail.com', '2445', '9877', 'cfcdf'),
(371, 's26j1929', '1234', 'sgdsh@gmail.com', '2445', '9877657', 'cfcdf'),
(592, 's26j1929', '1234', 'sgdsh@gmail.com', '2445', '9877657', 'cfcdf'),
(448, 'shamsa h', '4321', 'shamsa@gmail.com', 'whatever', '666', 'student'),
(612, 's26j1929', '1234', 'sgdsh@gmail.com', '2445', '9877657', 'cfcdf'),
(54, 'usman34', '1234', 'some@gmail.com', '2avf', '334', 'student'),
(471, 'tayyab', '1234', 'tayyab@gmail.com', 'Wafaqi', '777', 'student'),
(153, 's26j1929', '1234', 'sgdsh@gmail.com', '2445', '9877657', 'cfcdf'),
(168, 's26j1929', '23663219', 'sgdsh@gmail.com', '2445', '9877657', 'cfcdf'),
(343, 'sonia', '1234', 'aaa@hotmail.com', 'Bahla', '9923335412', 'ggggg'),
(603, 'ali A', '****', 'aliA@gmail.com', '2445', '9877657', 'manger'),
(343, 'sonia', '1234', 'aaa@hotmail.com', 'Bahla', '9923335412', 'manger'),
(601, 'ffgg', '3344', 'ffgg@gmail.com', 'dsv', '7543', 'jjj'),
(265, 'fgj', '123', 'dfghj@erty', 'hikjl', '456899', 'G1'),
(457, 'ali', '1234', 'ali@gmail.com', 'sss', '99887', 'kjhg'),
(313, 'hgh', 'yuio', '88KJJ@gmail.com', 'hjk', '34766', 'ggggg'),
(704, 'ali', '1234', 'ali@gmail.com', 'ddd', '76655', 'vcvcv'),
(460, 'shamsa D', '1234', 'sgdsh@gmail.com', '2445', '9877657', 'cfcdf'),
(167, 'shamsa D', '1234', 'sgdsh@gmail.com', '2445', '9877657', 'cfcdf'),
(664, 'sonia', '123', 'sonia@nct.com', 'Nizwa', '9764332', 'teacher'),
(602, 'ali', '1234', 'ali@gmail.com', 'etyhj', '235679', 'fhjkl'),
(155, 'ali', '1234', 'aliA@gmail.com', '2445', '9877657', 'teacher'),
(426, 's26s1234', '1234', 'abc@gmail.com', 'Nizwa', '976854', 'Teacher'),
(444, 'Fatema', '****', 'Fat@gmail.com', 'Farq', '1985', 'Teacher'),
(123, 's26S1234', '1234', 'Fatema@gmail.com', 'Nizwa', '7928', 'Teacher'),
(706, 'S26S123', '1234', 'Fatema@gmail.com', 'Nizwa', '7928', 'Teacher'),
(49, 'Mosa ', 'mOSA123', 'Mosa.ALNasri@nct.edu.om', 'Bahla', '9923335412', 'Manager'),
(71, 'Mosa ', 'Mosa123', 'Mosa.ALNasri@nct.edu.om', 'Bahla', '9923335412', 'Manager'),
(265, 'Mosa ', 'Mosa', 'Mosa.ALNasri@nct.edu.om', 'Bahla', '9923335412', 'Manager'),
(411, 'Mosa ', 'Mosa1234', 'Mosa@gmail.com', 'Bahla', '9923335412', 'Manager'),
(336, 's26j123', '1234', 's26j123@hotmail.com', 'Muscat', '9615', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

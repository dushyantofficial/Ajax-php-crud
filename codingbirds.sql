-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 06:18 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingbirds`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_application`
--

CREATE TABLE `crud_application` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `courses` varchar(100) NOT NULL,
  `hobby` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud_application`
--

INSERT INTO `crud_application` (`id`, `name`, `email`, `password`, `contact`, `dob`, `gender`, `address`, `city`, `courses`, `hobby`, `image`) VALUES
(31, 'Gabriel Dickerson', 'tuvynexih@mailinator.com', 'Pa$$w0rd!', 'Officia ad et natus ', '1970-06-20', 'Male', 'Sequi sint dolor vol', 'Banglore', 'Array', 'Singing,Dancing,Sketching', 'C:fakepathuser.png'),
(57, 'Hammett Winters', 'lomubujasy@mailinator.com', 'Pa$$w0rd!', 'Architecto alias nos', '1980-11-06', 'Female', 'Dignissimos ex maxim', 'Banglore', 'Data science', 'Drawing,Sketching', 'C:fakepathuser2.png'),
(58, 'Dana Mccarty', 'kulev@mailinator.com', 'Pa$$w0rd!', 'In tempore architec', '1976-02-28', 'Other', 'Aut ea dignissimos p', 'Mumbai', 'Computer Science,Data science', 'Dancing,Sketching', 'C:fakepathRed_Kitten.jpg'),
(60, 'Olympia Sullivan', 'kovydohaj@mailinator.com', 'Pa$$w0rd!', 'Culpa a veniam cum', '2004-05-21', 'Other', 'Quia sapiente ducimu', 'Kolkata', 'Software engineering,BCA,Graphic design,Data science', 'Singing', 'C:fakepathimages.png'),
(61, 'Richard Ford', 'buxiryjawu@mailinator.com', 'Pa$$w0rd!', 'Laborum Ullamco ea ', '2016-03-24', 'Other', 'Et quaerat sunt inc', 'Kolkata', 'Computer Science,Software engineering,Web design,Data science', 'Dancing,Sketching', 'C:fakepathimages.png'),
(62, 'Moses Tanner', 'naqabarun@mailinator.com', 'Pa$$w0rd!', 'Minus inventore ex a', '1973-01-12', 'Other', 'Laboriosam aut eos', 'Kolkata', 'BCA', 'Dancing,Sketching', 'C:fakepathkitten.jpg'),
(63, 'Ryan Garcia', 'sobakebywy@mailinator.com', 'Pa$$w0rd!', 'Nulla odit incididun', '1970-02-23', 'Male', 'Elit enim dolore qu', 'Hyderabad', 'BCA,Web design', 'Singing,Dancing,Sketching', 'C:fakepathRed_Kitten.jpg'),
(64, 'Alana Walls', 'wywabub@mailinator.com', 'Pa$$w0rd!', 'Consectetur et perf', '1994-02-08', 'Male', 'Accusamus repudianda', 'Banglore', 'Graphic design,Web design', 'Singing,Dancing,Sketching,Other', 'C:fakepathuser.png'),
(65, 'Quamar Hayes', 'wede@mailinator.com', 'Pa$$w0rd!', 'Enim eum labore offi', '2022-10-23', 'Female', 'Non accusantium even', 'Hyderabad', 'Computer Science,Software engineering,BCA,Web design,Data science', 'Drawing,Dancing,Sketching,Other', 'C:fakepathkitten.jpg'),
(66, 'Reed Snider', 'hane@mailinator.com', 'Pa$$w0rd!', 'In nostrud perspicia', '1998-03-10', 'Other', 'Id Nam id dignissim', 'Delhi', 'Computer Science,Software engineering,BCA,Graphic design,Web design,Data science', 'Drawing,Other', 'C:fakepathRed_Kitten.jpg'),
(67, 'Idola Parker', 'sanusuq@mailinator.com', 'Pa$$w0rd!', 'Dicta delectus arch', '1991-04-18', 'Other', 'Eum quibusdam simili', 'Ahmedabad', 'Software engineering,Data science', 'Drawing,Singing,Dancing', 'C:fakepathuser1.png'),
(68, 'Idola Parker', 'sanusuq@mailinator.com', 'Pa$$w0rd!', 'Dicta delectus arch', '1991-04-18', 'Other', 'Eum quibusdam simili', 'Ahmedabad', 'Software engineering,Data science', 'Drawing,Singing,Dancing', 'C:fakepathuser1.png'),
(69, 'Rylee Duran', 'zepuhyfuhe@mailinator.com', 'Pa$$w0rd!', 'Qui placeat vero ut', '1973-04-21', 'Female', 'Aliquam pariatur Do', 'Ahmedabad', 'Computer Science,Software engineering,Graphic design,Data science', 'Drawing,Singing,Dancing,Other', 'C:fakepathkitten.jpg'),
(70, 'Wallace Schroeder', 'cuwi@mailinator.com', 'Pa$$w0rd!', 'Repudiandae id quia', '1970-09-16', 'Other', 'Tempora amet qui su', 'Delhi', 'Software engineering,BCA', 'Singing,Dancing,Sketching,Other', 'C:fakepathuser1.png'),
(77, 'Callum Zimmerman', 'qomow@mailinator.com', 'Pa$$w0rd!', 'Qui nihil a optio s', '2019-09-21', 'Other', 'Excepteur aut vero n', 'Ahmedabad', 'Computer Science,Software engineering,Graphic design,Web design', 'Drawing,Dancing,Other', ''),
(78, 'Galvin Franks', 'ritob@mailinator.com', 'Pa$$w0rd!', 'Incidunt voluptas e', '2017-06-19', 'Female', 'Est reprehenderit ', 'Delhi', 'Software engineering', 'Drawing,Sketching', 'C:fakepathkitten.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

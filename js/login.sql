-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2017 at 09:39 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `izvjestaj`
--

CREATE TABLE `izvjestaj` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `datum` varchar(20) NOT NULL,
  `tvrtka` varchar(20) NOT NULL,
  `zadatak` text NOT NULL,
  `rjesenje` text NOT NULL,
  `komentar` text NOT NULL,
  `ocjena` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `izvjestaj`
--

INSERT INTO `izvjestaj` (`id`, `user`, `datum`, `tvrtka`, `zadatak`, `rjesenje`, `komentar`, `ocjena`) VALUES
(1, 'ddankic', '15/03/2017', 'Tvrtka 1', 'Zadatak 1', 'Rješenje 1', 'Komentar 1.2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_ment`
--

CREATE TABLE `login_ment` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ime` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_ment`
--

INSERT INTO `login_ment` (`id`, `user`, `password`, `ime`) VALUES
(1, 'aantic', '123456', 'Ante Antić'),
(2, 'bbrankic', '654321', 'Branko Brankić');

-- --------------------------------------------------------

--
-- Table structure for table `login_stud`
--

CREATE TABLE `login_stud` (
  `id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `mentor` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_stud`
--

INSERT INTO `login_stud` (`id`, `user`, `password`, `ime`, `mentor`) VALUES
(1, 'ddankic', '142536', 'Danko Dankić', 'aantic'),
(2, 'ffranjic', '635241', 'Franjo Franjić', 'aantic'),
(3, 'iivic', '415263', 'Ivan Ivić', 'aantic'),
(4, 'jjosipovic', '362514', 'Josip Josipović', 'aantic'),
(5, 'kkarlovic', '654123', 'Karlo Karlović', 'bbrankic'),
(6, 'llukic', '321456', 'Luka Lukić', 'bbrankic'),
(7, 'mmarkic', '32147', 'Marko Markić', 'bbrankic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `izvjestaj`
--
ALTER TABLE `izvjestaj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_ment`
--
ALTER TABLE `login_ment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_stud`
--
ALTER TABLE `login_stud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `izvjestaj`
--
ALTER TABLE `izvjestaj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_ment`
--
ALTER TABLE `login_ment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_stud`
--
ALTER TABLE `login_stud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

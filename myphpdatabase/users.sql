-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: May 07, 2021 at 09:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `buystuff`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `firstname` varchar(96) DEFAULT NULL,
  `lastname` varchar(96) DEFAULT NULL,
  `email` varchar(96) DEFAULT NULL,
  `password` varchar(96) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `is_admin`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 0, 'Jimmy', 'Bob', 'jimbob@email.com', 'password'),
(2, 1, 'Karen', 'Way', 'crazykaren@gmail.com', '123'),
(3, 0, 'Steven', 'King', 'books@gmail.com', '456'),
(4, 0, NULL, NULL, 'example@gmail.com', '123'),
(5, 0, 'joe', 'b', 'je@gmail.com', '111'),
(6, 0, 'christina', 'b', 'christina@gmail.com', '123'),
(7, 0, 'chris', 'f', 'a@gmail.com', '123'),
(8, 0, 'Paul', 'Joe', 'b@gmail.com', '111'),
(9, 0, 'Pauk', 'Paul', 'bgd@email.com', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

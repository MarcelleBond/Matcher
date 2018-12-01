-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2018 at 07:18 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matcher`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(255) NOT NULL DEFAULT '0',
  `notification` int(1) NOT NULL DEFAULT '1',
  `acthash` varchar(255) NOT NULL DEFAULT '0',
  `profile` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `passw`, `email`, `active`, `notification`, `acthash`, `profile`) VALUES
(1, '', '', 'admin', '$2y$10$SC7z8qoY5h/buRpVljVDtu1ZF1BRkb8/2FLt17SqLJbYwpK6GYRvW', 'zdfvgfd', 0, 0, 'c9892a989183de32e976c6f04e700201', NULL),
(18, '', '', 'test4', '$2y$10$0ADLLYjfsMhW1Un1NKocwO9ONKBZmE4XdP97fri2i16bdhnwDyNny', 'tidilotsotlhe@gmail.com', 0, 1, 'd81f9c1be2e08964bf9f24b15f0e4900', NULL),
(19, '', '', 'new', '$2y$10$B3ZSSMje8eagWieyQu7AZ.JI8yOoIo103A3YqdQg4AC9SUsPLS4be', 'phenom92@gmail.comasfasf', 1, 0, '443cb001c138b2561a0d90720d6ce111', NULL),
(20, '', '', 'again', '$2y$10$./ML0BpJrI5mBava95Giqe1VmMHO8LSUM6VCcuw61.cX7ssutxMGe', 'phenom92@gmail.asfasf', 1, 0, '11b921ef080f7736089c757404650e40', NULL),
(22, '', '', 'qwerty', '$2y$10$jsvnaQZNXKutppQVCmoFIeSCWAu9YQQ8nnmFCxBGpNZBQ8.RIiAYy', 'phenom92@gmail.com', 1, 0, '85d8ce590ad8981ca2c8286f79f59954', NULL),
(24, '', '', 'JSON', '$2y$10$jsvnaQZNXKutppQVCmoFIeSCWAu9YQQ8nnmFCxBGpNZBQ8.RIiAYy', 'phenom92@gmaildsg.sgsdgcom', 1, 0, '85d8ce590ad8981ca2c8286f79f59954', '{\"food\": \"atchaar, mazambani\", \"games\": \"pac man, super mario\", \"movies\": \"kung fu panda, high school musical\", \"sports\": \"soccer, basketball\"}'),
(27, '', '', 'NEWJSON', '$2y$10$SC7z8qoY5h/buRpVljVDtu1ZF1BRkb8/2FLt17SqLJbYwpK6GYRvW', 'zdfvgfdxbdf', 0, 0, 'c9892a989183de32e976c6f04e700201', '{\"food\": \"atchaar, mazambani\", \"games\": \"pac man, super mario\", \"movies\": \"kung fu panda, high school musical\", \"sports\": \"soccer, basketball\"}'),
(28, '', '', 'anotherJson', '$2y$10$SC7z8qoY5h/buRpVljVDtu1ZF1BRkb8/2FLt17SqLJbYwpK6GYRvW', 'zdfvgfdxbdfasfasf', 0, 0, 'c9892a989183de32e976c6f04e700201', '{\"food\": [\"atchaar\", \"mazambani\"], \"games\": [\"pac man\", \"super mario\"], \"movies\": [\"kung fu panda\", \"high school musical\"], \"sports\": [\"soccer\", \"basketball\"]}'),
(30, '', '', 'againJson', '$2y$10$SC7z8qoY5h/buRpVljVDtu1ZF1BRkb8/2FLt17SqLJbYwpK6GYRvW', 'cdcdcdc', 0, 0, 'c9892a989183de32e976c6f04e700201', '{\"food\": [\"salad\", \"cheese\"], \"games\": [\"tekken\", \"street fighter\"], \"movies\": [\"suerman\", \"how high\"], \"sports\": [\"Golf\", \"baseball\"]}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `ugroup` (`notification`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

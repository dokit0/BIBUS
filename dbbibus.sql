-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 дек 2018 в 17:38
-- Версия на сървъра: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbibus`
--

-- --------------------------------------------------------

--
-- Структура на таблица `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `realname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `realname`, `password`) VALUES
(1, 'iunga', 'dek_93@abv.bg', '', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'dek', 'asd@asd.bg', 'Ivan', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'dokit0', 'abv@abv.bg', 'ÐšÑ€Ð°ÑÐ¸Ð¼Ð¸Ñ€ ÐšÐ¾ÑÑ‚Ð°Ð´Ð¸Ð½Ð¾Ð²', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'deki', 'asd@asd.bg', 'Красимир Костадинов', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

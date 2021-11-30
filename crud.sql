-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 11:36 AM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `r_pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `pwd`, `r_pwd`) VALUES
(1, 'fds', 'gfd', 'hjhn', 'hadzo@gmail.com', '$2y$10$nF1KqkUQcNY6A3hnDanBK.Ona9RnhomlpFmd85hhR0POxThnQ2v1W', '$2y$10$nF1KqkUQcNY6A3hnDanBK.Ona9RnhomlpFmd85hhR0POxThnQ2v1W'),
(3, 'fds', 'gfd', 'kjhgf', 'dgfhfhf@gmail.com', '$2y$10$1lXdZuVtkXBgqiCZct9pTusCPpUa7PrS0etq2n/AIkZtCvf2k.Xue', '$2y$10$1lXdZuVtkXBgqiCZct9pTusCPpUa7PrS0etq2n/AIkZtCvf2k.Xue'),
(5, 'hadzo', 'otuzbir', 'hadzo123', 'hadzo.otuzbir2018@gmail.com', '$2y$10$kx1XY8EQrmjM5Rsf8Gl3P.CXJVcElSC6WzX7w/9nibmGtBrjY6q7C', '$2y$10$kx1XY8EQrmjM5Rsf8Gl3P.CXJVcElSC6WzX7w/9nibmGtBrjY6q7C'),
(8, 'hadzo', 'otuzbir', 'hadzoo', 'hadzo_93_nt@hotmail.com', '$2y$10$FZ7RtNUkb84I4.KAV7Cb2ujywpuk0QZ3Tq6IUkDZmdDxR2mWzeqOa', '$2y$10$FZ7RtNUkb84I4.KAV7Cb2ujywpuk0QZ3Tq6IUkDZmdDxR2mWzeqOa'),
(9, 'aaa', 'aaa', 'aaa', 'aaa@aaa.com', '$2y$10$E0mSX7KXX9lBja.PxAnhjO.VJipLKpdn0ws.pkWx1lCg1ZIfUAGoC', '$2y$10$E0mSX7KXX9lBja.PxAnhjO.VJipLKpdn0ws.pkWx1lCg1ZIfUAGoC'),
(10, 'test', 'test', 'test', 'test@test.com', '$2y$10$rDouwqDNweNpgBMTsv3xb.LReD.6SrQjgmyOo2kQmucNIJSdsmt82', '$2y$10$rDouwqDNweNpgBMTsv3xb.LReD.6SrQjgmyOo2kQmucNIJSdsmt82');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

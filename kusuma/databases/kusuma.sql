-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2020 at 01:35 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kusuma`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrow_list`
--

CREATE TABLE `borrow_list` (
  `u_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `date_now` date NOT NULL,
  `status_borrow` varchar(100) NOT NULL,
  `len_der` varchar(200) NOT NULL,
  `borrow_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow_list`
--

INSERT INTO `borrow_list` (`u_id`, `q_id`, `Qty`, `date_now`, `status_borrow`, `len_der`, `borrow_id`) VALUES
(4, 3, 1, '2020-04-06', 'ยังไม่ได้คืน', 'อจ.ทีระ', 4),
(4, 2, 3, '2020-04-08', 'ยังไม่ได้คืน', 'อจ.วอพงค์', 6),
(5, 3, 2, '2020-04-08', 'ยังไม่ได้คืน', 'อจ.ทีระ', 7),
(5, 2, 1, '2020-04-08', 'คืนแล้ว', 'อจ.วอพงค์', 10);

-- --------------------------------------------------------

--
-- Table structure for table `e_quipment`
--

CREATE TABLE `e_quipment` (
  `e_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `e_quipment`
--

INSERT INTO `e_quipment` (`e_id`, `name`, `photo`) VALUES
(2, 'วอลเลย์บอล', 'img_5e8c8c7257bf9.jpg'),
(3, 'แบดมินตัน', 'img_5e8c8c85e8982.jpg'),
(4, 'ฟุตบอล', 'img_5e8c8c96d4bfa.jpg'),
(5, 'เทเบิลเทนนิส', 'img_5e8dad58bbd09.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `number_std` varchar(15) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `class` varchar(200) NOT NULL,
  `deparment` varchar(200) NOT NULL,
  `photo_user` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `number_std`, `user_name`, `password`, `class`, `deparment`, `photo_user`, `phone`, `status`) VALUES
(2, 'admin', 'admin_equipmant', 'admin', 'no-class', 'no-department', '112.jpg', '0630878044', 'admin'),
(4, '6139010020', 'kusuma jeckwer', 'users', 'ปวส 2/2', 'เทคโนโลยีสารสนเทศ', 'img_5e89ae9e2df33.jpg', '0804967156', 'user'),
(5, '6139010023', 'surainee lateh', 'surainee', 'ปวส 2/2', 'เทคโนโลยีสารสนเทศ', 'img_5e8caa9d6f031.jpg', '0804967156', 'user'),
(6, '6139010026', 'alavee saleh', 'alavee', 'ปวส 2/2', 'เทคโนโลยีสารสนเทศ', 'img_5e8dab843f778.jpg', '0630878044', 'user'),
(7, '6139010043', 'อับดุลเราะห์มาน เส็นสอ', 'boss', 'ปวส 2/2', 'เทคโนโลยีสารสนเทศ', 'img_5e8dac46dff45.jpg', '0936789780', 'user'),
(8, '6139010046', 'arwa dome', 'arwa', 'ปวส 2/2', 'เทคโนโลยีสารสนเทศ', 'img_5e8dacb9022ba.jpg', '0630878055', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrow_list`
--
ALTER TABLE `borrow_list`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `e_quipment`
--
ALTER TABLE `e_quipment`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrow_list`
--
ALTER TABLE `borrow_list`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `e_quipment`
--
ALTER TABLE `e_quipment`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

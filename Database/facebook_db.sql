-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 10:49 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `connections_tbl`
--

CREATE TABLE `connections_tbl` (
  `cnx_id` int(11) NOT NULL,
  `cnx_sourceUserID` varchar(100) NOT NULL,
  `cnx_targetUserID` varchar(100) NOT NULL,
  `cnx_isPending` tinyint(1) NOT NULL,
  `cnx_isBlocked` tinyint(1) NOT NULL,
  `cnx_isfriend` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `connections_tbl`
--

INSERT INTO `connections_tbl` (`cnx_id`, `cnx_sourceUserID`, `cnx_targetUserID`, `cnx_isPending`, `cnx_isBlocked`, `cnx_isfriend`) VALUES
(1, '6147975dab4a6', '614799116901d', 0, 0, 1),
(4, '6147c54434eee', '6147975dab4a6', 0, 1, 0),
(5, '614799116901d', '6147c50bef455', 0, 0, 0),
(7, '6147c54434eee', '6147c571121d8', 0, 1, 0),
(9, '6147975dab4a6\r\n', '6147c50bef455\r\n', 1, 0, 0),
(11, '6147c571121d8', '6148ad97db81b', 0, 1, 0),
(14, '6147975dab4a6', '61491ba57af9d', 0, 1, 0),
(16, '6147975dab4a6', '61491bf6ec82f', 1, 0, 0),
(18, '6148add1d0b40', '614799116901d', 0, 1, 0),
(19, '6148add1d0b40', '6147c54434eee', 0, 1, 0),
(21, '6148add1d0b40', '6148ad97db81b', 1, 0, 0),
(22, '6148add1d0b40', '6147c571121d8', 1, 0, 0),
(23, '6148add1d0b40', '61491bf6ec82f', 0, 0, 1),
(24, '6148add1d0b40', '61491ba57af9d', 1, 0, 0),
(26, '6147c50bef455', '6147c571121d8', 1, 0, 0),
(27, '6147975dab4a6', '6147c50bef455', 0, 0, 1),
(28, '6147975dab4a6', '61491ef76b8de', 1, 0, 0),
(29, '614799116901d', '6147c571121d8', 1, 0, 0),
(30, '614799116901d', '61491ba57af9d', 1, 0, 0),
(31, '6147c50bef455', '6148add1d0b40', 1, 0, 0),
(32, '6147c50bef455', '61491bf6ec82f', 0, 0, 1),
(33, '61491ef76b8de', '614799116901d', 1, 0, 0),
(34, '61491bf6ec82f', '614799116901d', 1, 0, 0),
(35, '6147975dab4a6', '6148add1d0b40', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications_tbl`
--

CREATE TABLE `notifications_tbl` (
  `notification_id` int(11) NOT NULL,
  `notfication_userid` varchar(100) NOT NULL,
  `notification_message` varchar(500) NOT NULL,
  `notification_time` datetime NOT NULL,
  `notification_clear` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications_tbl`
--

INSERT INTO `notifications_tbl` (`notification_id`, `notfication_userid`, `notification_message`, `notification_time`, `notification_clear`) VALUES
(1, '6147c50bef455', 'undefined sent tou a friend request', '2021-09-21 12:10:11', 0),
(2, '61491ef76b8de', 'undefined sent tou a friend request', '2021-09-21 12:13:18', 0),
(3, '6147c571121d8', 'Mustafa sent you a friend request', '2021-09-21 12:22:29', 0),
(4, '61491ba57af9d', 'Mustafa sent you a friend request', '2021-09-21 13:04:45', 0),
(5, '6147975dab4a6', 'Amar accepted your friend request', '2021-09-21 13:05:28', 0),
(6, '6148add1d0b40', 'Amar sent you a friend request', '2021-09-21 13:17:28', 0),
(7, '61491bf6ec82f', 'Amar sent you a friend request', '2021-09-21 13:17:29', 0),
(8, '61491bf6ec82f', 'Ahmad accepted your friend request', '2021-09-21 13:19:16', 0),
(9, '6148add1d0b40', 'Ahmad accepted your friend request', '2021-09-21 13:24:45', 0),
(10, '614799116901d', 'Mona sent you a friend request', '2021-09-21 14:18:08', 0),
(11, '614799116901d', 'Ahmad sent you a friend request', '2021-09-21 14:18:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` varchar(100) NOT NULL,
  `user_firstName` varchar(250) NOT NULL,
  `user_lastName` varchar(250) NOT NULL,
  `user_DoB` date NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_details` text NOT NULL,
  `user_country` varchar(100) NOT NULL,
  `user_phoneNumber` varchar(50) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_gender` varchar(1) NOT NULL,
  `user_imgURL` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `user_firstName`, `user_lastName`, `user_DoB`, `user_email`, `user_password`, `user_details`, `user_country`, `user_phoneNumber`, `user_city`, `user_gender`, `user_imgURL`) VALUES
('6147975dab4a6', 'Rewa', 'Shoujaa', '2021-09-08', 'rewa.shoujaa@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'I love reading', 'LBN', '71549884', 'beirut', 'F', 'images/users/Unknown_person.jpg'),
('614799116901d', 'Mustafa', 'Dichari', '2021-09-07', 'mustafa.dichari@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', 'LBN', '', 'saida', 'M', 'images/users/Unknown_person.jpg'),
('6147c50bef455', 'Amar', 'Dichari', '2021-08-30', 'amar.dichari@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', 'AUS', '', 'Saida', 'F', 'images/users/Unknown_person.jpg'),
('6147c54434eee', 'Mohamad', 'Rabaa', '2021-09-16', 'mohamad.rabaa@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', 'LBN', '', 'Beirut', 'M', 'images/users/Unknown_person.jpg'),
('6147c571121d8', 'Mays', 'Kourjieh', '2021-09-09', 'mays.k@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', 'LBN', '', 'Saida', 'F', 'images/users/Unknown_person.jpg'),
('6148ad97db81b', 'Dana', 'Harb', '2021-09-16', 'dana.harb@hotmail.com', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', '', 'AUS', '', 'Tripoli', 'F', 'images/users/Unknown_person.jpg'),
('6148add1d0b40', 'Salim', 'Bsat', '2021-09-14', 's.bsat@google.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', 'LBN', '', 'Beirut', 'M', 'images/users/Unknown_person.jpg'),
('61491ba57af9d', 'Noura', 'Dimassi', '2021-09-08', 'n.d@hotmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', 'ARG', '', 'saida', 'F', 'images/users/Unknown_person.jpg'),
('61491bf6ec82f', 'Ahmad', 'Nasab', '2021-09-08', 'ahmad.n@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', 'SAU', '', 'Riyadh', 'F', 'images/users/Unknown_person.jpg'),
('61491ef76b8de', 'Mona', 'Rabaa', '2021-09-08', 'm.rabaa@hotmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '', 'AZE', '', 'Tripoli', 'F', 'images/users/Unknown_person.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connections_tbl`
--
ALTER TABLE `connections_tbl`
  ADD PRIMARY KEY (`cnx_id`);

--
-- Indexes for table `notifications_tbl`
--
ALTER TABLE `notifications_tbl`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connections_tbl`
--
ALTER TABLE `connections_tbl`
  MODIFY `cnx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notifications_tbl`
--
ALTER TABLE `notifications_tbl`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2014 at 10:35 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `highscore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_board`
--

CREATE TABLE IF NOT EXISTS `tbl_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `type_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_board`
--

INSERT INTO `tbl_board` (`id`, `name`, `type_id`, `author_id`, `create_time`) VALUES
(1, 'Phòng 201 Z7', 1, 28, '2014-08-27 19:12:07'),
(2, 'BK Open', 1, 29, '2014-08-27 23:30:31'),
(3, 'iOs', 4, 29, '2014-08-28 00:17:45'),
(4, 'Chim điên', 2, 29, '2014-08-28 00:18:25'),
(5, 'Premier League', 3, 30, '2014-08-28 00:49:25'),
(6, 'PHP', 4, 30, '2014-08-28 00:49:38'),
(7, 'Chim Kute', 2, 30, '2014-08-28 00:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_game`
--

CREATE TABLE IF NOT EXISTS `tbl_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `player` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `board_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `tbl_game`
--

INSERT INTO `tbl_game` (`id`, `player`, `board_id`, `score`) VALUES
(18, 'Trung', 1, 100000),
(19, 'Quân Kun', 1, 1),
(20, 'Trung', 1, 200000),
(21, 'Chính', 2, 10000),
(22, 'Trung', 2, 12345),
(23, 'Spur', 5, 6),
(24, 'Chelsea', 5, 6),
(25, 'Man City', 5, 6),
(26, 'Swansea', 5, 6),
(27, 'Arsenal', 5, 4),
(29, 'Hull', 5, 4),
(30, 'AstonVilla', 5, 4),
(34, 'Liv', 5, 3),
(35, 'West Ham', 5, 3),
(36, 'Everton', 5, 2),
(37, 'Sunderland', 5, 2),
(38, 'WestBrom', 5, 2),
(39, 'ManUtd', 5, 1),
(40, 'Southamton', 5, 1),
(43, 'Nguyên', 7, 12),
(44, 'Niên', 7, 24),
(45, 'Niên', 7, 13),
(46, 'Hưng', 7, 126),
(47, 'Dũng ', 7, 137),
(49, 'Nguyên', 7, 11),
(51, 'Hưng', 7, 145),
(53, 'Hoàng', 7, 123),
(54, 'Hoàng', 7, 12),
(55, 'Thủy', 7, 145),
(56, 'Ly', 7, 200),
(57, 'Bá Trung', 7, 696),
(58, 'Coder', 3, 1212),
(59, 'Coder', 3, 132231),
(60, 'Designer', 3, 145),
(61, 'Worker', 3, 12),
(62, 'Gamer', 3, 1234),
(63, 'Wayne Rooney', 4, 123),
(64, 'Bá Trung', 4, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE IF NOT EXISTS `tbl_type` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`id`, `name`) VALUES
(1, 'AOE'),
(2, 'Flappy Bird'),
(3, 'Football'),
(4, 'Coding');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) CHARACTER SET utf8 NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `joined` datetime NOT NULL,
  `role` varchar(128) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `joined`, `role`) VALUES
(28, 'supertrung', '$2a$13$m4jg9wqUAQGGnjK2at66lOKfSIkOKsnu3qEME7hC7shag0HvlMluC', 'trungdepzai@gmail.com', '2014-08-27 19:07:32', 'member'),
(29, 'chechao', '$2a$13$34BfgwXb.4CUnYy2tNM5Jul2DXFninTt.K12DzqHaihpnCzSfdFCC', 'chechao@gmail.com', '2014-08-27 23:29:57', 'member'),
(30, 'demo', '$2a$13$3J4CWCv/.tHbQSIOroJ69.0MU4PmaiBWcM.TAfA4nnO63AzvF.F7a', 'demo@gmail.com', '2014-08-28 00:47:40', 'member');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

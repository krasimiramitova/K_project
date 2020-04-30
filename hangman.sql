-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 апр 2020 в 11:57
-- Версия на сървъра: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hangman`
--

-- --------------------------------------------------------

--
-- Структура на таблица `backfeed`
--

CREATE TABLE `backfeed` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(259) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `language_id`) VALUES
(1, 'animal', 1),
(2, 'животнo', 2),
(3, 'country', 1),
(4, 'държавa', 2);

-- --------------------------------------------------------

--
-- Структура на таблица `games`
--

CREATE TABLE `games` (
  `game_id` int(11) NOT NULL,
  `added by` int(11) DEFAULT NULL,
  `word` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `language_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `games`
--

INSERT INTO `games` (`game_id`, `added by`, `word`, `date_added`, `language_id`, `category_id`, `level_id`) VALUES
(1, NULL, 'bear', '2020-04-08 06:47:32', 1, 1, 1),
(2, NULL, 'мечка', '2020-04-08 06:47:32', 2, 2, 2),
(3, NULL, 'China', '2020-04-08 07:25:16', 1, 3, 3),
(4, NULL, 'Китай', '2020-04-08 07:26:17', 2, 4, 4),
(5, NULL, 'camel', '2020-04-08 06:47:32', 1, 1, 1),
(6, NULL, 'dog', '2020-04-08 06:47:32', 1, 1, 1),
(7, NULL, 'cat', '2020-04-08 06:47:32', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `game_players`
--

CREATE TABLE `game_players` (
  `play_id` int(11) NOT NULL,
  `play_date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `play_date_finished` timestamp NULL DEFAULT NULL,
  `play_duration` time DEFAULT NULL,
  `date_deleted` date DEFAULT NULL,
  `play_status` int(11) DEFAULT NULL,
  `player_id` int(11) DEFAULT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Схема на данните от таблица `game_players`
--

INSERT INTO `game_players` (`play_id`, `play_date_start`, `play_date_finished`, `play_duration`, `date_deleted`, `play_status`, `player_id`, `game_id`) VALUES
(1, '2020-04-19 20:33:26', '2020-04-20 08:33:47', '12:00:21', NULL, 3, 1, 7),
(2, '2020-04-19 20:41:44', NULL, NULL, NULL, NULL, NULL, 7),
(3, '2020-04-20 09:56:52', NULL, NULL, NULL, NULL, NULL, 7),
(4, '2020-04-20 09:59:18', NULL, NULL, NULL, NULL, NULL, 7),
(5, '2020-04-20 09:59:27', '2020-04-26 08:27:45', '22:28:18', NULL, 3, 1, 7),
(6, '2020-04-26 09:53:55', NULL, NULL, NULL, NULL, NULL, 6),
(7, '2020-04-26 10:02:49', '2020-04-26 09:06:08', '00:56:41', NULL, 3, 1, 1),
(8, '2020-04-26 14:50:44', NULL, NULL, NULL, NULL, 1, 5),
(9, '2020-04-26 14:54:46', '2020-04-26 14:01:11', '00:53:35', NULL, 3, 1, 6),
(10, '2020-04-26 15:13:21', NULL, NULL, NULL, NULL, 1, 1),
(11, '2020-04-26 15:16:13', NULL, NULL, NULL, NULL, 1, 5),
(13, '2020-04-26 15:21:24', NULL, NULL, NULL, NULL, NULL, 6),
(14, '2020-04-26 15:21:40', '2020-04-26 14:22:25', '00:59:15', NULL, 3, NULL, 1),
(15, '2020-04-26 15:26:19', '2020-04-26 14:26:48', '00:59:31', NULL, 3, NULL, 7),
(16, '2020-04-26 15:31:02', '2020-04-26 14:31:23', '00:59:39', NULL, 3, NULL, 1),
(17, '2020-04-26 15:31:30', NULL, NULL, NULL, NULL, NULL, 5),
(18, '2020-04-26 15:32:48', NULL, NULL, NULL, NULL, NULL, 5),
(19, '2020-04-26 15:32:57', NULL, NULL, NULL, NULL, NULL, 1),
(20, '2020-04-27 20:13:43', NULL, NULL, NULL, NULL, 1, 6),
(21, '2020-04-27 20:16:52', NULL, NULL, NULL, NULL, 1, 1),
(22, '2020-04-27 20:17:06', NULL, NULL, NULL, NULL, 1, 7),
(23, '2020-04-27 20:17:22', NULL, NULL, NULL, NULL, 1, 5),
(24, '2020-04-27 20:17:34', NULL, NULL, NULL, NULL, 1, 7),
(25, '2020-04-27 20:20:56', NULL, NULL, NULL, NULL, 1, 1),
(26, '2020-04-27 20:21:23', NULL, NULL, NULL, NULL, 1, 6),
(27, '2020-04-27 20:22:38', NULL, NULL, NULL, NULL, 1, 5),
(28, '2020-04-27 20:23:14', NULL, NULL, NULL, NULL, 1, 1),
(29, '2020-04-27 20:43:02', NULL, NULL, NULL, NULL, NULL, 7),
(30, '2020-04-27 20:48:46', NULL, NULL, NULL, NULL, 1, 1),
(31, '2020-04-27 20:59:17', NULL, NULL, NULL, NULL, 1, 6),
(32, '2020-04-27 22:21:59', NULL, NULL, NULL, NULL, 1, 7),
(33, '2020-04-27 22:24:41', '2020-04-27 21:34:04', '00:50:37', NULL, 1, 1, 5),
(34, '2020-04-27 22:46:28', NULL, NULL, NULL, NULL, NULL, 7),
(35, '2020-04-27 22:52:28', NULL, NULL, NULL, NULL, NULL, 7),
(36, '2020-04-27 22:53:52', NULL, NULL, NULL, NULL, NULL, 7),
(37, '2020-04-27 22:54:35', '2020-04-27 21:54:35', '01:00:00', NULL, 3, NULL, 7),
(38, '2020-04-27 22:56:02', NULL, NULL, NULL, NULL, NULL, 1),
(39, '2020-04-27 22:58:17', '2020-04-27 22:54:46', '00:03:31', NULL, 1, 1, 1),
(40, '2020-04-27 23:55:12', NULL, NULL, NULL, NULL, 1, 5),
(41, '2020-04-28 19:12:43', NULL, NULL, NULL, NULL, 1, 6),
(42, '2020-04-28 19:25:13', NULL, NULL, NULL, NULL, 1, 1),
(43, '2020-04-28 19:25:16', NULL, NULL, NULL, NULL, 1, 1),
(44, '2020-04-28 19:25:47', NULL, NULL, NULL, NULL, 1, 5),
(45, '2020-04-28 19:26:41', NULL, NULL, NULL, NULL, 1, 6),
(46, '2020-04-28 19:31:54', NULL, NULL, NULL, NULL, 1, 5),
(47, '2020-04-29 19:58:58', NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `inbox`
--

CREATE TABLE `inbox` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `messege` varchar(250) NOT NULL,
  `date_deleted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `languages`
--

CREATE TABLE `languages` (
  `language_id` int(11) NOT NULL,
  `language` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `languages`
--

INSERT INTO `languages` (`language_id`, `language`) VALUES
(1, 'en'),
(2, 'бг');

-- --------------------------------------------------------

--
-- Структура на таблица `levels`
--

CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(250) NOT NULL,
  `language_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `levels`
--

INSERT INTO `levels` (`level_id`, `level_name`, `language_id`) VALUES
(1, 'easy', 1),
(2, 'лесно', 2),
(3, 'medium', 1),
(4, 'средно трудно', 2),
(5, 'hard', 1),
(6, 'трудно', 2);

-- --------------------------------------------------------

--
-- Структура на таблица `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `e-mail` varchar(250) NOT NULL,
  `player_rank` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `date_deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `players`
--

INSERT INTO `players` (`player_id`, `username`, `password`, `register_date`, `e-mail`, `player_rank`, `role_id`, `date_deleted`) VALUES
(1, 'Krasi', '1234', '2020-04-08 06:30:00', 'kr_mitova@abv.bg', '', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура на таблица `play_statuses`
--

CREATE TABLE `play_statuses` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(250) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `play_statuses`
--

INSERT INTO `play_statuses` (`status_id`, `status_name`, `language_id`) VALUES
(1, 'lost', 1),
(2, 'изгубена', 2),
(3, 'won', 1),
(4, 'спечелена', 2),
(5, 'saved', 1),
(6, 'запазена', 2);

-- --------------------------------------------------------

--
-- Структура на таблица `ranks`
--

CREATE TABLE `ranks` (
  `rank_id` int(11) NOT NULL,
  `rank_name` varchar(250) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'player');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backfeed`
--
ALTER TABLE `backfeed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `game_players`
--
ALTER TABLE `game_players`
  ADD PRIMARY KEY (`play_id`),
  ADD KEY `play_status` (`play_status`),
  ADD KEY `player_id` (`player_id`),
  ADD KEY `game_id` (`game_id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `play_statuses`
--
ALTER TABLE `play_statuses`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`rank_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `game_players`
--
ALTER TABLE `game_players`
  MODIFY `play_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `play_statuses`
--
ALTER TABLE `play_statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `game_players`
--
ALTER TABLE `game_players`
  ADD CONSTRAINT `result of the game` FOREIGN KEY (`play_status`) REFERENCES `play_statuses` (`status_id`),
  ADD CONSTRAINT `what plays` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`),
  ADD CONSTRAINT `who plays` FOREIGN KEY (`player_id`) REFERENCES `players` (`player_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

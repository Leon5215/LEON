-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-06-23 01:20:41
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `leon`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cc` varchar(20) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `wd` varchar(20) NOT NULL,
  `people` varchar(20) NOT NULL,
  `text` varchar(20) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `cars`
--

INSERT INTO `cars` (`id`, `name`, `cc`, `hp`, `wd`, `people`, `text`, `img`) VALUES
(2, 'GR86', '2387', '234', 'FR', '4', '前置後驅，操控樂趣十足的跑車。', '20250623010343_5391.jpg'),
(3, 'LFA', '4805', '560', 'ASG', '2', '日系超跑，聲浪迷人，極致工藝代表。', '20250623011621_8529.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp(),
  `content` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `timestamp`, `created_at`, `content`, `is_read`) VALUES
(2, 2, 1, 'HAHA', '2025-06-04 13:17:40', '2025-06-04 13:17:40', '', 1),
(3, 1, 2, '安安', '2025-06-04 13:59:58', '2025-06-04 13:59:58', '', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `name`, `type`) VALUES
(1, '1234', '1234', 'Leon', 'ad'),
(2, '1111', '1111', 'Leon-u1', 'u'),
(3, '1212', '1212', 'Leon-c1', 'c');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

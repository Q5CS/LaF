-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： mysql
-- 生成日期： 2018-11-25 05:47:09
-- 服务器版本： 8.0.13
-- PHP 版本： 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `fly_laf`
--

-- --------------------------------------------------------

--
-- 表的结构 `item_found`
--

CREATE TABLE `item_found` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `descrp` text NOT NULL,
  `place1` text NOT NULL,
  `place2` text NOT NULL,
  `time` bigint(20) NOT NULL,
  `img_name` text,
  `contact` text NOT NULL,
  `status` int(11) NOT NULL,
  `ip` text NOT NULL,
  `ua` text NOT NULL,
  `deled` text NOT NULL,
  `uid` text NOT NULL,
  `name` text NOT NULL,
  `grade` text NOT NULL,
  `class` text NOT NULL,
  `number` text NOT NULL,
  `r_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 表的结构 `item_lost`
--

CREATE TABLE `item_lost` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `descrp` text NOT NULL,
  `place` text NOT NULL,
  `time` bigint(20) NOT NULL,
  `img_name` text,
  `contact` text NOT NULL,
  `status` int(11) NOT NULL,
  `ip` text NOT NULL,
  `ua` text NOT NULL,
  `deled` text NOT NULL,
  `uid` text NOT NULL,
  `name` text NOT NULL,
  `grade` text NOT NULL,
  `class` text NOT NULL,
  `number` text NOT NULL,
  `r_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `item_found`
--
ALTER TABLE `item_found`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `item_lost`
--
ALTER TABLE `item_lost`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `item_found`
--
ALTER TABLE `item_found`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `item_lost`
--
ALTER TABLE `item_lost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

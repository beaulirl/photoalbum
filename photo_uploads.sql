-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 20 2016 г., 19:07
-- Версия сервера: 5.6.24
-- Версия PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `zf2tutorial`
--

-- --------------------------------------------------------

--
-- Структура таблицы `photo_uploads`
--

CREATE TABLE IF NOT EXISTS `photo_uploads` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `adress` varchar(200) NOT NULL,
  `photoalbum_id` int(11) NOT NULL,
  `data_download` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photo_uploads`
--

INSERT INTO `photo_uploads` (`id`, `title`, `filename`, `adress`, `photoalbum_id`, `data_download`) VALUES
(3, 'Натюрморт 3', '13_4403.jpg', 'Студия 3', 3, '2016-03-09'),
(4, 'Улица 1 ', '12_5894.jpg', 'Ф1', 4, '2016-03-09'),
(5, 'Портрет 3', 'jenniferaniston904491.jpg', 'Ф2', 2, '2016-03-09'),
(7, 'Sdfhn', '0_7e55c_722e3dec_orig.jpg', 'jnv', 4, '2016-03-09'),
(10, 'Нат 2', '12_4204.jpg', 'В2', 3, '2016-03-09'),
(11, 'G3', '_7themes-su.jpg', '223', 2, '2016-03-09'),
(12, 'Пейзаж 2', '13_5979.jpg', 'А3', 1, '2016-03-09'),
(13, 'DH2', 'house-md_0003.jpg', 'd4', 2, '2016-03-10'),
(18, 'Натюрморт 5', '13_4225.jpg', 'S1', 2, '2016-03-10'),
(19, 'HD', '13_7190_oboi_doroga_domoj_1280x800.jpg', 'D', 3, '2016-03-10'),
(20, 'Sa', '13_4197.jpg', 'dfdfdf', 2, '2016-03-10'),
(21, 'Test2', '1211833965_CAE8EDEEF1F2F3E4E8FF203434.jpg', '4f', 3, '2016-03-10'),
(22, 'mmmm', '13_4183.jpg', 'mmmm', 4, '2016-03-12'),
(24, 'Silent', 'z_d7fe07f5.jpg', 'Studio 4', 1, '2016-03-12'),
(27, 'Парк 1', '13_5545.jpg', 'S3', 5, '2016-03-12'),
(34, 'fvfvfvf', '3.jpg', 'gbgbgb', 2, '2016-03-12'),
(35, 'njjjn', '6.jpg', 'jnjnjnj', 2, '2016-03-12'),
(36, 'fefefe', '4.jpg', 'egegeg', 2, '2016-03-12'),
(37, 'ррррр', '7.jpg', 'оооо', 4, '2016-03-13'),
(39, 'ррррр', 'phpThumb_generated_thumbnailjpg.jpg', 'оооо', 4, '2016-03-13'),
(40, 'Детали', '6044hstuC0o.jpg', 'И6', 5, '2016-03-13'),
(41, 'rrggrg', 'tn_2.jpg', 'rgrhrh', 4, '2016-03-15'),
(42, 'vfvff', 'tn_8.jpg', 'dddd', 4, '2016-03-15'),
(43, 'Sawerty', 'tn_1.jpg', 'fefe', 5, '2016-03-15'),
(44, 'Fgcx', 'tn_13_4213.jpg', 'D5', 4, '2016-03-15'),
(45, 'Safg', 'tn_13_4225.jpg', 'Grt', 3, '2016-03-15'),
(46, 'Agrey', 'tn_12_6845_oboi_prekrasnyj_den_1024x768.jpg', 'gf4', 2, '2016-03-15'),
(47, 'Saffs', 'tn_-1600×1200.jpg', 'fsf', 1, '2016-03-15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `photo_uploads`
--
ALTER TABLE `photo_uploads`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `filename` (`filename`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `photo_uploads`
--
ALTER TABLE `photo_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

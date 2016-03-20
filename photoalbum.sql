-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 20 2016 г., 18:57
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
-- Структура таблицы `photoalbum`
--

CREATE TABLE IF NOT EXISTS `photoalbum` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `describes` varchar(200) NOT NULL,
  `ph_name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `data_download` date NOT NULL,
  `data_change` datetime NOT NULL,
  `count` int(50) NOT NULL,
  `cover` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photoalbum`
--

INSERT INTO `photoalbum` (`id`, `name`, `describes`, `ph_name`, `email`, `phone`, `data_download`, `data_change`, `count`, `cover`) VALUES
(1, 'Пейзажи', 'очень красивые фото', 'Anna', 'adf@ka.ru', '+7(940)456-45-45', '0000-00-00', '2016-03-15 14:00:12', 3, 'tn_-1600×1200.jpg'),
(2, 'Портреты', 'красивые портреты', 'Jon', 'jin@ff.ru', '+7(943)234-34-56', '0000-00-00', '2016-03-15 13:59:46', 9, 'tn_12_6845_oboi_prekrasnyj_den_1024x768.jpg'),
(3, 'Натюрморты', 'красивые натюрморты', 'Ivan', 'ivan@gaol.con', '+7(984)456-55-76', '2016-03-03', '2016-03-15 13:59:27', 5, 'tn_13_4225.jpg'),
(4, 'Улицы', 'пейзажи нижегородских улиц', 'Arina', 'ar@ha.com', '+7(965)567-76-33', '2016-03-03', '2016-03-15 13:59:03', 8, 'tn_13_4213.jpg'),
(5, 'Парки', 'парки города', 'Thom', 'tom@fad.com', '+7(965)567-79-33', '2016-03-09', '2016-03-15 13:50:47', 3, 'tn_1.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `photoalbum`
--
ALTER TABLE `photoalbum`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `photoalbum`
--
ALTER TABLE `photoalbum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

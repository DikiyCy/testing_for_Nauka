-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 29 2020 г., 11:34
-- Версия сервера: 10.3.22-MariaDB-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database_company`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employes`
--

CREATE TABLE `employes` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthday` varchar(11) NOT NULL,
  `age` int(3) UNSIGNED NOT NULL,
  `position` varchar(150) NOT NULL,
  `remote_work` varchar(3) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(150) DEFAULT NULL,
  `build` varchar(7) DEFAULT NULL,
  `flat` varchar(7) DEFAULT NULL,
  `room` varchar(5) DEFAULT NULL,
  `work_time` varchar(11) DEFAULT NULL,
  `work_phone` bigint(20) NOT NULL,
  `work_email` varchar(150) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employes`
--

INSERT INTO `employes` (`id`, `first_name`, `last_name`, `birthday`, `age`, `position`, `remote_work`, `city`, `street`, `build`, `flat`, `room`, `work_time`, `work_phone`, `work_email`, `logo`) VALUES
(2, 'Иван', 'Иванов', '01.01.1987', 33, 'Техник', 'off', 'г.СПб', 'Невский пр.', '3/6', 'кв. 1', NULL, NULL, 89511234567, NULL, NULL),
(1, 'Петр', 'Петров', '1.12.2000', 23, 'Программист', 'on', 'г.Тюмень', NULL, NULL, NULL, NULL, NULL, 81234567891, NULL, NULL),
(3, 'Женя', 'Безымянный', '1.12.2000', 34, 'Бухгалтер', 'off', 'г.СПб', 'ул. Гжатская', '21/2', 'кв. 3', NULL, NULL, 81987654321, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

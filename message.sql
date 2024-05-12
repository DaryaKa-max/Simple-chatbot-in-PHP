-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 12 2024 г., 17:44
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chatbotshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `message` text NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `message`, `type`) VALUES
(20, 'Здравствуйте!', 'client'),
(21, 'Что вас интересует?', 'consultant'),
(22, 'Здравствуйте! Меня интересует одежда', 'client'),
(23, 'Какая одежда вас интересует? (Например: летняя)', 'consultant'),
(24, 'летняя', 'client'),
(25, 'Какой стиль вас интересует? (Например: классика)', 'consultant'),
(26, 'Классика', 'client'),
(27, 'У вас отличный вкус! Характеристика по модели была отправлена на вашу почту', 'consultant'),
(32, 'У вас отличный выбор! Можете мне, пожалуйста, прислать вашу почту, чтобы мы могли вам выслать примеры и характеристику модели', 'consultant'),
(33, 'Увы! К сожалению, данная модель сейчас на складе отсутствует. У нас есть данная модель 44 размера. Вас интересует данная модель?', 'consultant'),
(34, 'Да', 'client'),
(35, 'Нет', 'client'),
(36, 'Хорошо. Могу ли я вам еще чем-нибудь помочь?', 'consultant'),
(38, 'Nice! Данная модель отправлена на вашу почту! Проверьте почту', 'consultant'),
(39, 'Была рада с вами пообщаться! Хорошего дня!', 'consultant'),
(40, 'Меня интересует одежда', 'client'),
(44, 'Спасибо', 'client'),
(45, 'Хорошо', 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

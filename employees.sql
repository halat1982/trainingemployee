-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 13 2019 г., 22:21
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `employees`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `patronymic` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(64) NOT NULL,
  `room` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `patronymic`, `last_name`, `email`, `room`) VALUES
(1, 'Михаил', 'Иванович', 'Николаев', 'nikol@bnb.by', 9),
(2, 'Константин', 'Васильевич', 'Махеев', 'mahey@bnb.by', 3),
(3, 'Семен', 'Андреевич', 'Поломаев', 'polom@bnb.by', 9),
(4, 'геннадий', 'Петрович', 'Овчаренко', 'ovchar@bnb.by', 6),
(5, 'Константин', 'Васильевич', 'Седовласов', 'sedoy@bnb.by', 1),
(6, 'Петр', 'Ильич', 'Коровин', 'bizon@bnb.by', 2),
(15, 'Анна', 'Сигизмундовна', 'Резедова', 'rezeda@bnb.by', 3),
(19, 'Максим', 'Викторович', 'Чернышев', 'chernish@bnb.by', 2),
(23, 'Алиса', 'Витальевна', 'Игнатенко', 'alisa@bnb.by', 3),
(24, 'Антон', 'Семенович', 'Макаренко', 'makar@bnb.by', 5),
(25, 'Светлана', 'Витальевна', 'Петрова', 'petr@bnb.by', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `employee_phones`
--

CREATE TABLE `employee_phones` (
  `id` int(10) NOT NULL,
  `e_id` int(10) NOT NULL,
  `phone_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee_phones`
--

INSERT INTO `employee_phones` (`id`, `e_id`, `phone_id`) VALUES
(1, 1, 3),
(2, 1, 2),
(3, 2, 5),
(4, 3, 5),
(5, 4, 7),
(6, 5, 1),
(7, 6, 7),
(8, 15, 4),
(9, 19, 13),
(10, 20, 14),
(15, 23, 18),
(16, 23, 19),
(17, 24, 16),
(18, 24, 17),
(19, 24, 3),
(20, 25, 20),
(21, 25, 21);

-- --------------------------------------------------------

--
-- Структура таблицы `phones`
--

CREATE TABLE `phones` (
  `id` int(10) NOT NULL,
  `num_sequence` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `phones`
--

INSERT INTO `phones` (`id`, `num_sequence`) VALUES
(16, '1111111111111'),
(14, '1213141516178'),
(18, '1213141516179'),
(1, '1234567891011'),
(2, '1234567891012'),
(5, '1234567891013'),
(6, '1234567891014'),
(7, '1234567891015'),
(8, '1234567891016'),
(9, '1234567891017'),
(10, '1234567891018'),
(19, '1904'),
(17, '202'),
(3, '3333333333333'),
(20, '402'),
(4, '4444444444444'),
(21, '8(017)923-74-80'),
(13, '9876543210123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `employee_phones`
--
ALTER TABLE `employee_phones`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_sequence` (`num_sequence`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `employee_phones`
--
ALTER TABLE `employee_phones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

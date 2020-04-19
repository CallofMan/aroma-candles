-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2020 г., 17:53
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `aroma_candles`
--

-- --------------------------------------------------------

--
-- Структура таблицы `aromas`
--

CREATE TABLE `aromas` (
  `id_aroma` smallint(5) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` mediumint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `aromas`
--

INSERT INTO `aromas` (`id_aroma`, `name`, `price`, `quantity`) VALUES
(1, 'вишня', '800.00', 300),
(2, 'сакура', '1000.00', 500),
(3, 'шоколад', '1000.00', 1000),
(4, 'хвоя', '250.00', 1000);

-- --------------------------------------------------------

--
-- Структура таблицы `candles`
--

CREATE TABLE `candles` (
  `id_candle` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_color` smallint(5) NOT NULL,
  `id_shape` smallint(5) NOT NULL,
  `id_aroma` smallint(5) NOT NULL,
  `id_size` smallint(5) NOT NULL,
  `id_category` tinyint(3) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` mediumint(7) NOT NULL,
  `total_sold` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `candles`
--

INSERT INTO `candles` (`id_candle`, `name`, `id_color`, `id_shape`, `id_aroma`, `id_size`, `id_category`, `price`, `quantity`, `total_sold`, `id_user`) VALUES
(1, 'Зловоние ', 2, 4, 3, 4, 5, '10000.00', 500, 200, 3),
(2, 'Влекущая наслаждение', 4, 3, 1, 3, 3, '500.00', 989, 991, 3),
(3, 'Адское пламя', 3, 2, 2, 3, 4, '6000.00', 614, 618, 3),
(4, 'Великолепная грусть', 1, 1, 3, 1, 2, '300.00', 228, 228, 3),
(5, 'Вечер у камина', 4, 2, 4, 2, 2, '215.00', 100, 100, 3),
(6, 'Отпугивающая призраков', 3, 4, 4, 1, 2, '10000.00', 333, 333, 3),
(7, 'Тлен', 2, 1, 4, 2, 3, '4000.00', 0, 500, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` tinyint(3) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'пользовательская '),
(2, 'расслабляющая '),
(3, 'афродизиак'),
(4, 'возбуждающая аппетит '),
(5, 'галлюциногенная');

-- --------------------------------------------------------

--
-- Структура таблицы `colors`
--

CREATE TABLE `colors` (
  `id_color` smallint(5) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` mediumint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `colors`
--

INSERT INTO `colors` (`id_color`, `name`, `price`, `quantity`) VALUES
(1, 'синий', '1000.00', 100),
(2, 'зелёный', '150.00', 100),
(3, 'жёлтый', '120.00', 1000),
(4, 'красный', '200.00', 500);

-- --------------------------------------------------------

--
-- Структура таблицы `details_order`
--

CREATE TABLE `details_order` (
  `id_position` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_candle` int(11) NOT NULL,
  `quantity` int(7) NOT NULL,
  `position_sum` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `details_order`
--

INSERT INTO `details_order` (`id_position`, `id_order`, `id_candle`, `quantity`, `position_sum`) VALUES
(21, 16, 6, 2, '20000.00'),
(22, 16, 2, 68, '34000.00'),
(23, 16, 1, 3, '30000.00'),
(24, 16, 5, 117, '25155.00'),
(25, 16, 3, 4, '24000.00'),
(26, 16, 4, 1, '300.00'),
(31, 18, 5, 3, '645.00'),
(32, 18, 2, 2, '1000.00'),
(33, 18, 4, 1, '300.00'),
(41, 19, 2, 4, '2000.00'),
(42, 19, 5, 5, '1075.00'),
(43, 19, 4, 1, '300.00'),
(44, 20, 3, 4, '24000.00'),
(45, 20, 2, 1, '500.00'),
(46, 20, 1, 1, '10000.00'),
(47, 21, 2, 1, '500.00'),
(48, 21, 3, 10, '60000.00'),
(49, 21, 1, 5, '50000.00'),
(50, 22, 3, 50, '300000.00'),
(51, 22, 2, 10, '5000.00'),
(52, 23, 3, 1, '6000.00'),
(53, 23, 2, 1, '500.00'),
(54, 24, 3, 2, '12000.00'),
(55, 24, 2, 1, '500.00'),
(57, 26, 3, 1, '6000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id_image` int(11) NOT NULL,
  `id_candle` int(11) NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id_image`, `id_candle`, `path`) VALUES
(1, 3, 'адское пламя.jpg'),
(2, 6, 'отпугивающий призраков.jpg'),
(3, 2, 'афродизиак.jpg'),
(4, 4, 'perfect blue.jpg'),
(5, 7, 'tlen.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_sum` decimal(10,2) NOT NULL,
  `date_of_start` date NOT NULL,
  `date_of_end` date DEFAULT NULL,
  `id_status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `total_sum`, `date_of_start`, `date_of_end`, `id_status`) VALUES
(16, 2, '133455.00', '2020-04-16', '2020-04-19', 3),
(18, 4, '1945.00', '2020-04-17', '2020-04-19', 3),
(19, 1, '3375.00', '2020-04-19', '2020-04-19', 3),
(20, 1, '34500.00', '2020-04-19', '2020-04-19', 3),
(21, 1, '110500.00', '2020-04-19', '2020-04-19', 3),
(22, 2, '305000.00', '2020-04-19', '2020-04-19', 3),
(23, 2, '6500.00', '2020-04-19', NULL, 1),
(24, 1, '12500.00', '2020-04-19', '2020-04-19', 3),
(26, 1, '6000.00', '2020-04-19', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` tinyint(2) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `shapes`
--

CREATE TABLE `shapes` (
  `id_shape` smallint(5) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` mediumint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shapes`
--

INSERT INTO `shapes` (`id_shape`, `name`, `price`, `quantity`) VALUES
(1, 'цилиндр', '50.00', 200),
(2, 'квадрат', '100.00', 300),
(3, 'роза', '150.00', 140),
(4, 'пирамида', '200.00', 330);

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE `sizes` (
  `id_size` smallint(5) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` mediumint(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`id_size`, `name`, `price`, `quantity`) VALUES
(1, 'маленькая', '100.00', 200),
(2, 'средняя', '200.00', 1000),
(3, 'большая', '300.00', 500),
(4, 'гигантская ', '500.00', 110);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id_status` tinyint(3) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id_status`, `name`) VALUES
(1, 'в корзине'),
(2, 'в процессе'),
(3, 'выполнен');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `telephone`, `email`, `password`, `first_name`, `second_name`, `address`, `id_role`) VALUES
(1, '123', '123@123', '123', 'Несносный', 'deadinside', '123', 2),
(2, '111', '111@111', '111', 'Ерунда', 'Тлена', '111', 2),
(3, 'admin', NULL, 'admin', 'Эру', 'Илуватар', NULL, 1),
(4, '222', '', '222', '222', '222', '222', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `aromas`
--
ALTER TABLE `aromas`
  ADD PRIMARY KEY (`id_aroma`);

--
-- Индексы таблицы `candles`
--
ALTER TABLE `candles`
  ADD PRIMARY KEY (`id_candle`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_shape` (`id_shape`),
  ADD KEY `id_aroma` (`id_aroma`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id_color`);

--
-- Индексы таблицы `details_order`
--
ALTER TABLE `details_order`
  ADD PRIMARY KEY (`id_position`),
  ADD KEY `details_order_ibfk_1` (`id_order`),
  ADD KEY `details_order_ibfk_2` (`id_candle`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `id_candle` (`id_candle`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `shapes`
--
ALTER TABLE `shapes`
  ADD PRIMARY KEY (`id_shape`);

--
-- Индексы таблицы `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id_size`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `aromas`
--
ALTER TABLE `aromas`
  MODIFY `id_aroma` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `candles`
--
ALTER TABLE `candles`
  MODIFY `id_candle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `colors`
--
ALTER TABLE `colors`
  MODIFY `id_color` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `details_order`
--
ALTER TABLE `details_order`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `shapes`
--
ALTER TABLE `shapes`
  MODIFY `id_shape` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id_size` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id_status` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `candles`
--
ALTER TABLE `candles`
  ADD CONSTRAINT `candles_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id_color`),
  ADD CONSTRAINT `candles_ibfk_2` FOREIGN KEY (`id_shape`) REFERENCES `shapes` (`id_shape`),
  ADD CONSTRAINT `candles_ibfk_3` FOREIGN KEY (`id_aroma`) REFERENCES `aromas` (`id_aroma`),
  ADD CONSTRAINT `candles_ibfk_4` FOREIGN KEY (`id_size`) REFERENCES `sizes` (`id_size`),
  ADD CONSTRAINT `candles_ibfk_5` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  ADD CONSTRAINT `candles_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `details_order`
--
ALTER TABLE `details_order`
  ADD CONSTRAINT `details_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `details_order_ibfk_2` FOREIGN KEY (`id_candle`) REFERENCES `candles` (`id_candle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_candle`) REFERENCES `candles` (`id_candle`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `statuses` (`id_status`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

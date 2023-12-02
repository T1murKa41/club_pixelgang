-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 27 2023 г., 16:29
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `soldatov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(121) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `notice`) VALUES
(3, 'Новости', 'Новости сайта'),
(4, 'Разработка', 'Информация о разработке'),
(5, 'Прошивки', 'Прошивки для whyred и begonia');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `page` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `path_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_topic` int DEFAULT NULL,
  `published` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `path_img`, `content`, `id_topic`, `published`, `created`) VALUES
(10, 17, 'Begonia // EvolutionX', '1687882281-Без имени.png', '<p>Evolution X for Redmi Note 8 pro(begonia). Android 13<br><i><strong>Скачать → https://evolution-x.org/device/begonia</strong></i></p>', 3, 1, '2023-06-27 19:08:44');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `age` tinyint DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `name`, `email`, `age`, `password`, `created`) VALUES
(1, 0, 'test', 'test@mail.ru', 17, '1234', '2023-03-25 06:36:52'),
(2, 1, 'nick', 'nick@mail.ru', 20, '1234', '2023-03-25 06:45:08'),
(3, 1, 'nickola', 'nickola@mail.ru', NULL, '1234', '2023-03-25 07:11:31'),
(6, 0, 'oleg', 'oleg2@mail.ru', NULL, '1234', '2023-03-25 07:26:20'),
(7, 0, 'sdcdscd', 'sdc@mail.ri', 20, '$2y$10$5BEzrcn.D7bMQ6Vjd.Btpex6IBYzbsDXSINK4Qi7bdp1yM.L.Y0YS', '2023-03-25 08:07:53'),
(8, 0, 'sasas', 'acsdcd@mail.ru', 14, '$2y$10$IxTBovH0rBJWnIZJdJHkYO/Zwm77AJbq4ppxT2kcs3/a9TRzl2LJ.', '2023-03-25 08:09:03'),
(9, 0, 'sdcds', 'sdcd@mail.ru', 16, '$2y$10$rAzGhgQaXo96qIhVXEjM6uXpbwmhQChmLjjAchiKoXyEuwV9fdAjK', '2023-03-25 08:10:39'),
(10, 0, 'as', 'oleg@mail.ru', 12, '$2y$10$0zMy/B1rmNj3l6fFilD5D.IErnkB/VvxsgVYB7QcG6NyRhjulWvfq', '2023-03-25 09:03:13'),
(11, 0, 'sasa', 'sxa@mail.ru', NULL, '$2y$10$LzdFFia268Qmlnlmlo1QU.ww5aeCeNvQSpj6hEhyKX4BuHquppeJi', '2023-03-25 09:05:17'),
(12, 0, 'sasa', 'sx2a@mail.ru', 1, '$2y$10$dWImTqKE7/sAMYGPcVQaE..Qz/pJIaq1FM21zEeAF/F5Iliz/Unfm', '2023-03-25 09:05:26'),
(13, 0, 'add', 'add@mail.ru', 17, '$2y$10$sfR68hlMvVngmiqH0b2mwuPnqJ4Vhfbav3/X21xWHc079dhDneoTu', '2023-03-25 09:17:13'),
(14, 0, 'add2', 'add2@mail.ru', 12, '$2y$10$icC9uSFPMnbISJI2OTO1iuEiVMvuDeE5DT5vS14Nojnzneiv6.30m', '2023-03-25 09:18:26'),
(15, 1, 'root', 'root@mail.ru', NULL, '$2y$10$why9aAAI57y2eXARMTkvuemITWbQdricZ8aoQ3QXg/kRIVNReYGjG', '2023-03-25 15:55:05'),
(16, 0, 'root', 'root@root', 20, '$2y$10$QYXjZ/4N3YQaAK1rnapcwO17CevoDXuZjlqR9HgeI/Tr.5JNzHmJu', '2023-06-08 16:09:59'),
(17, 1, 'попка', 'wdsadad@goolag.ussr', 66, '$2y$10$xozXTysdBS9S0g5njT14mOITPZ4.pdIZqdC3O5RYvP54uAQ6wrQLu', '2023-06-27 13:24:42');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

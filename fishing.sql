-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 21 2023 г., 21:17
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fishing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advts`
--

CREATE TABLE `advts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2555) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `point_meeting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `advts`
--

INSERT INTO `advts` (`id`, `user_id`, `header`, `description`, `point_meeting`, `date`, `created_at`, `updated_at`) VALUES
(19, 5, 'Надо бы воблы домой привезти', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', '123', '2023-08-11', '2022-11-24 07:53:31', '2022-11-24 07:53:31'),
(20, 5, 'Давно не ездил,захотелось познакомится с единомышленниками ', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'Ярмарка', '2023-09-11', '2022-12-12 05:47:02', '2022-12-12 05:47:02'),
(21, 5, 'Посидим,выпьем с ночевкой', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'test1', '2023-08-14', '2022-12-12 06:02:49', '2022-12-12 06:02:49'),
(22, 5, 'На моторной лодке, вглубь Балды', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'njxrf dcnhtxb', '2023-09-12', '2023-05-02 14:28:32', '2023-05-02 14:28:41'),
(23, 9, 'Ездил туда уже несколько раз,хорошее место', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'лала', '2023-08-23', '2023-05-14 11:48:12', '2023-05-14 11:48:12'),
(24, 5, 'Поедем за город', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'ул. М. Луконина 12', '2023-07-19', '2023-05-14 12:00:30', '2023-05-14 12:00:30'),
(25, 2, 'Я знаю хорошее место', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'У Гранд-Ривера\r\n', '2023-08-20', '2023-05-14 12:32:13', '2023-05-14 12:32:13'),
(26, 4, 'Хочу на сома', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'Алимпик', '2023-06-30', '2023-05-14 12:44:16', '2023-05-14 12:44:16'),
(30, 5, 'Палатка есть, поехали', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'newtest2', '2023-07-22', '2023-06-10 05:33:47', '2023-06-10 05:33:47'),
(31, 5, 'В ночь, с ночевкой, с собой еду', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'newTest333', '2023-07-14', '2023-06-10 11:10:21', '2023-06-10 11:10:21'),
(33, 14, 'Хочу провести время на рыбалке с новыми знакомыми', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'testtest', '2023-06-24', '2023-06-20 06:53:24', '2023-06-20 06:53:24'),
(34, 14, 'Поехали на рыбалку', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'TEST11', '2023-06-24', '2023-06-20 06:54:47', '2023-06-20 06:54:47'),
(35, 15, 'Собираю людей, хочу с ночевкой поехать', 'Одному не хочется ехать,возьму все нужное с собой, на блесну)', 'Спартак', '2023-06-30', '2023-06-21 11:05:37', '2023-06-21 11:05:37'),
(36, 15, 'Хочу поехать на Балду', 'Поедем,порыбачим, проведем время, еду взял с собой', 'Стадион', '2023-06-25', '2023-06-21 11:10:18', '2023-06-21 11:10:18');

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `advt_id` bigint UNSIGNED NOT NULL,
  `name_car` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_places` bigint NOT NULL,
  `allowed_number_of_seats` int NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_from` int NOT NULL,
  `year_to` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `advt_id`, `name_car`, `max_places`, `allowed_number_of_seats`, `country`, `class`, `year_from`, `year_to`, `created_at`, `updated_at`) VALUES
(1, 19, 'TOYOTA Camry', 4, 3, 'Япония', 'D', 1980, NULL, '2022-11-24 07:53:31', '2022-11-24 07:53:31'),
(2, 20, 'TOYOTA Supra', 2, 1, 'Япония', 'S', 1986, NULL, '2022-12-12 05:59:52', '2022-12-12 05:59:52'),
(3, 21, 'LADA 21099', 4, 2, 'Россия', 'B', 1990, 2011, '2022-12-12 06:02:49', '2022-12-12 06:02:49'),
(4, 22, 'LADA 2114', 4, 1, 'Россия', 'B', 2001, 2013, '2023-05-06 12:10:02', '2023-05-06 12:10:06'),
(5, 23, 'BMW X5', 5, 3, 'Германия', 'E', 1999, NULL, '2023-05-14 11:52:42', '2023-05-14 11:52:42'),
(6, 24, 'TESLA Model X', 6, 2, 'США', 'E', 2015, NULL, '2023-05-14 12:02:42', '2023-05-14 12:02:42'),
(7, 25, 'SKODA Kodiaq', 7, 6, 'Чехия', 'D', 2016, NULL, '2023-05-14 12:34:58', '2023-05-14 12:34:58'),
(8, 26, 'LINCOLN Navigator', 8, 6, 'США', 'J', 1997, NULL, '2023-05-14 12:46:15', '2023-05-14 12:46:15'),
(9, 30, 'SKODA Scala', 4, 3, 'Чехия', 'C', 2019, NULL, '2023-06-10 05:33:48', '2023-06-10 05:33:48'),
(10, 31, 'TOYOTA Corolla', 4, 3, 'Япония', 'C', 1966, NULL, '2023-06-10 11:10:21', '2023-06-10 11:10:21'),
(11, 33, 'TOYOTA Supra', 2, 1, 'Япония', 'S', 1986, NULL, '2023-06-20 06:53:24', '2023-06-20 06:53:24'),
(12, 34, 'TOYOTA Supra', 2, 1, 'Япония', 'S', 1986, NULL, '2023-06-20 06:54:47', '2023-06-20 06:54:47'),
(13, 35, 'VAZ 21099', 4, 2, 'Россия', 'B', 1990, 2011, '2023-06-21 11:05:37', '2023-06-21 11:05:37'),
(14, 36, 'HYUNDAI Genesis Coupe', 5, 4, 'Южная Корея', 'D', 2009, 2016, '2023-06-21 11:10:19', '2023-06-21 11:10:19');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `advt_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `description` varchar(2555) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `advt_id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(23, 19, 4, 'Неплохо', '2022-11-24 07:54:43', '2022-11-24 07:54:43'),
(24, 19, 3, 'Круто!', '2023-05-15 15:56:14', '2023-05-15 15:56:14'),
(27, 22, 5, 'Топ', '2023-05-22 11:25:09', '2023-05-22 11:25:09'),
(28, 22, 5, 'Понравилось в целом', '2023-05-22 11:28:27', '2023-05-22 11:28:27'),
(29, 26, 5, 'Было холодно', '2023-05-22 11:29:23', '2023-05-22 11:29:23'),
(30, 26, 5, 'В след раз поедем подальше куда-нибудь', '2023-05-22 11:30:44', '2023-05-22 11:30:44'),
(31, 26, 5, 'Все понравилось, 5 баллов', '2023-05-22 11:35:48', '2023-05-22 11:35:48'),
(32, 26, 5, 'Давай в след раз еще раз', '2023-05-22 11:35:55', '2023-05-22 11:35:55'),
(33, 26, 5, 'Наловили знатно', '2023-05-22 11:36:25', '2023-05-22 11:36:25'),
(34, 19, 9, 'Ура', '2023-05-22 12:43:17', '2023-05-22 12:43:17');

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id` bigint NOT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer` bigint UNSIGNED NOT NULL,
  `win` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_people` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `day` date DEFAULT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `confirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `header`, `description`, `place`, `organizer`, `win`, `max_people`, `created_at`, `updated_at`, `day`, `start`, `end`, `confirmed`) VALUES
(2, 'Выйграй 1000 рублей,нужно поймать быстрее всех 30 вобл', 'Принять участие в соревновании может любой желающий. Нужно только взять с собой удочки (не более трех штук) или спиннинг. Ловля рыбы допускается с берега только в том месте, которое определит организатор турнира.\nМероприятие и награждение проводится по следующим номинациям:\n\n    «Веский довод» – 1, 2, 3 места за улов (в килограммах);\n    «Командный улов» – самый большой улов (в килограммах) среди команд участников;\n    «Со счету сбился» – за большее количество выловленной рыбы (в штуках);\n    «Рук не хватает» – за самую крупную выловленную рыбу;\n    «Пескарик» – самый юный участник соревнований;\n    «Старожила озера» – самой взрослый и опытный участник соревнований;\n    «Рыбочка» – награждается рыбачка. \n\nОстальные участники награждаются грамотами.\nКоличество мест ограничено.', 'Тур-база Соломка', 4, '1000', 14, '2023-01-27 01:48:27', '2023-06-03 13:45:35', '2023-06-01', '09:00:00', '13:00:00', 1),
(3, 'Интересное мероприятие', 'Принять участие в соревновании может любой желающий. Нужно только взять с собой удочки (не более трех штук) или спиннинг. Ловля рыбы допускается с берега только в том месте, которое определит организатор турнира.\nМероприятие и награждение проводится по следующим номинациям:\n\n    «Веский довод» – 1, 2, 3 места за улов (в килограммах);\n    «Командный улов» – самый большой улов (в килограммах) среди команд участников;\n    «Со счету сбился» – за большее количество выловленной рыбы (в штуках);\n    «Рук не хватает» – за самую крупную выловленную рыбу;\n    «Пескарик» – самый юный участник соревнований;\n    «Старожила озера» – самой взрослый и опытный участник соревнований;\n    «Рыбочка» – награждается рыбачка. \n\nОстальные участники награждаются грамотами.\nКоличество мест ограничено.', 'Тур-база Веребка', 3, '11111', 24, '2023-02-09 06:12:11', '2023-02-09 06:12:11', '2023-05-25', '12:00:00', '13:00:00', 1),
(4, 'Соревнования#1', 'Принять участие в соревновании может любой желающий. Нужно только взять с собой удочки (не более трех штук) или спиннинг. Ловля рыбы допускается с берега только в том месте, которое определит организатор турнира.\nМероприятие и награждение проводится по следующим номинациям:\n\n    «Веский довод» – 1, 2, 3 места за улов (в килограммах);\n    «Командный улов» – самый большой улов (в килограммах) среди команд участников;\n    «Со счету сбился» – за большее количество выловленной рыбы (в штуках);\n    «Рук не хватает» – за самую крупную выловленную рыбу;\n    «Пескарик» – самый юный участник соревнований;\n    «Старожила озера» – самой взрослый и опытный участник соревнований;\n    «Рыбочка» – награждается рыбачка. \n\nОстальные участники награждаются грамотами.\nКоличество мест ограничено.', 'Набережная', 3, '3333', 13, '2023-02-09 06:12:56', '2023-02-09 06:12:56', '2023-05-26', '13:00:00', '20:00:00', 1),
(5, '12 участников - один победитель', 'Принять участие в соревновании может любой желающий. Нужно только взять с собой удочки (не более трех штук) или спиннинг. Ловля рыбы допускается с берега только в том месте, которое определит организатор турнира.\nМероприятие и награждение проводится по следующим номинациям:\n\n    «Веский довод» – 1, 2, 3 места за улов (в килограммах);\n    «Командный улов» – самый большой улов (в килограммах) среди команд участников;\n    «Со счету сбился» – за большее количество выловленной рыбы (в штуках);\n    «Рук не хватает» – за самую крупную выловленную рыбу;\n    «Пескарик» – самый юный участник соревнований;\n    «Старожила озера» – самой взрослый и опытный участник соревнований;\n    «Рыбочка» – награждается рыбачка. \n\nОстальные участники награждаются грамотами.\nКоличество мест ограничено.', 'Тополинка', 5, '1222', 12, '2023-06-10 07:05:45', '2023-06-10 07:10:17', '2023-06-17', '12:00:00', '13:00:00', 1),
(6, 'Каждый сам за себя', 'Принять участие в соревновании может любой желающий. Нужно только взять с собой удочки (не более трех штук) или спиннинг. Ловля рыбы допускается с берега только в том месте, которое определит организатор турнира.\nМероприятие и награждение проводится по следующим номинациям:\n\n    «Веский довод» – 1, 2, 3 места за улов (в килограммах);\n    «Командный улов» – самый большой улов (в килограммах) среди команд участников;\n    «Со счету сбился» – за большее количество выловленной рыбы (в штуках);\n    «Рук не хватает» – за самую крупную выловленную рыбу;\n    «Пескарик» – самый юный участник соревнований;\n    «Старожила озера» – самой взрослый и опытный участник соревнований;\n    «Рыбочка» – награждается рыбачка. \n\nОстальные участники награждаются грамотами.\nКоличество мест ограничено.', 'Набережная', 5, '1100', 7, '2023-06-20 07:56:36', '2023-06-20 07:56:43', '2023-07-01', '07:08:00', '07:09:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `interlocutor_id` int NOT NULL,
  `text` varchar(5000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `interlocutor_id`, `text`, `created_at`, `updated_at`) VALUES
(2, 4, 5, 'Привет', '2023-03-02 03:54:02', '2023-03-02 03:54:02'),
(3, 5, 4, 'Привет', '2023-06-11 19:29:16', '2023-06-11 19:29:16'),
(4, 5, 4, 'Давай к 12 00', '2023-06-17 06:00:27', '2023-06-17 06:00:27'),
(5, 5, 4, 'я там буду ждать уже, мой номер если что 8-999-888-99-99', '2023-06-17 06:01:13', '2023-06-17 06:01:13');

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `interlocutor_id` int DEFAULT NULL,
  `description` varchar(777) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `interlocutor_id`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, NULL, 'test111', 'Прочитано', '2023-02-08 05:13:33', '2023-06-20 05:18:23'),
(4, 2, NULL, 'test2222', 'Прочитано', '2023-02-08 05:16:51', '2023-06-20 05:18:23'),
(5, 2, NULL, 'test333', 'Прочитано', '2023-02-08 07:30:27', '2023-06-20 05:18:23'),
(8, 3, NULL, 'Посмотрите свое мероприятие ->', 'Прочитано', '2023-02-09 06:12:57', '2023-02-10 11:12:55'),
(9, 5, NULL, 'К вашему мероприятию\nприсоединился:', 'Прочитано', '2023-02-09 06:30:44', '2023-06-21 13:14:06'),
(11, 3, NULL, 'К вашему мероприятию присоединился:', 'Прочитано', '2023-02-10 01:56:56', '2023-06-20 05:24:26'),
(12, 3, 4, 'Участник решил не учавствовать в вашем мероприятии:', 'Не прочитано', '2023-02-10 01:57:02', '2023-06-20 06:14:29'),
(13, 14, NULL, 'Вы успешно зарегестрировались!', 'Прочитано', '2023-06-20 06:42:02', '2023-06-20 06:57:30'),
(14, 14, NULL, 'Вы успешно cоздали объявление:', 'Прочитано', '2023-06-20 06:53:24', '2023-06-20 06:57:30'),
(15, 14, NULL, 'Вы успешно cоздали объявление:', 'Прочитано', '2023-06-20 06:54:47', '2023-06-20 06:57:30'),
(16, 5, NULL, 'Запрос на создание соревнования потдвержден!', 'Прочитано', '2023-06-20 07:55:52', '2023-06-21 13:14:06'),
(17, 5, NULL, 'Запрос на создание соревнования отклонен!', 'Прочитано', '2023-06-20 07:56:43', '2023-06-21 13:14:06'),
(18, 15, NULL, 'Вы успешно зарегестрировались!', 'Прочитано', '2023-06-21 10:30:56', '2023-06-21 11:22:08'),
(19, 15, NULL, 'Вы успешно cоздали объявление!', 'Прочитано', '2023-06-21 11:05:37', '2023-06-21 11:22:08'),
(20, 15, NULL, 'Вы успешно cоздали объявление!', 'Прочитано', '2023-06-21 11:10:19', '2023-06-21 11:22:08'),
(21, 5, NULL, 'Запрос на создание соревнования подтверждено!', 'Прочитано', '2023-06-21 13:03:38', '2023-06-21 13:14:06');

-- --------------------------------------------------------

--
-- Структура таблицы `participants`
--

CREATE TABLE `participants` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `participants`
--

INSERT INTO `participants` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(18, 5, 2, '2023-06-08 12:31:37', '2023-06-08 12:31:37');

-- --------------------------------------------------------

--
-- Структура таблицы `passengers`
--

CREATE TABLE `passengers` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `advt_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `passengers`
--

INSERT INTO `passengers` (`id`, `user_id`, `advt_id`, `created_at`, `updated_at`) VALUES
(9, 5, 20, '2023-01-18 09:14:24', '2023-01-18 09:14:24'),
(10, 3, 19, '2023-01-27 01:18:15', '2023-01-27 01:18:15'),
(11, 2, 21, '2023-02-03 04:06:16', '2023-02-03 04:06:16'),
(13, 5, 22, '2023-05-22 09:15:34', '2023-05-22 09:15:34'),
(26, 5, 33, '2023-06-21 12:43:51', '2023-06-21 12:43:51');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rest_car` tinyint(1) NOT NULL,
  `rest_advt` tinyint(1) NOT NULL,
  `rest_comment` tinyint(1) NOT NULL,
  `rest_message` tinyint(1) NOT NULL,
  `rest_participate_in_the_event` tinyint(1) NOT NULL,
  `rest_event` tinyint(1) NOT NULL,
  `fishing_rod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motor_boat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`, `rest_car`, `rest_advt`, `rest_comment`, `rest_message`, `rest_participate_in_the_event`, `rest_event`, `fishing_rod`, `tent`, `motor_boat`, `boat`, `token`, `avatar`, `date_of_birth`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Svyat', 'Anufriev', 'asvytoslav2@mail.ru', '70e8e0768930b137f7f24f574b3ea0d0', 0, 0, 0, 0, 0, 1, 'test1', NULL, NULL, NULL, 'MsXgwgiJ4kbQHNu', 'bsUrfrB3msuzYnI.png', '2003-07-26', 'admin', '2022-05-13 12:47:45', '2022-06-16 14:59:54'),
(2, 'Артём', 'Гаврилов ', '12312@mail.ru', 'c9d21e89dc04f9f2b446b4fbdafdf4b8', 0, 0, 0, 0, 1, 0, NULL, 'test2', NULL, NULL, 'Kqnxltxx5QyeFkV', 'Bme8P7zXnguoYcT.png', '2003-01-01', 'organizer', '2022-05-25 01:44:08', '2023-06-21 11:28:21'),
(3, 'Дмитрий', 'Игнатов ', 'test@test.ru', 'c9d21e89dc04f9f2b446b4fbdafdf4b8', 0, 0, 0, 1, 0, 0, NULL, NULL, 'test3', NULL, 'SbqGNZuebbflQgY', 'rlnBOwJ8k7Lja9h.png', '2002-06-06', 'organizer', '2022-06-14 16:28:07', '2023-06-21 11:28:38'),
(4, 'Данил', 'Юдин ', 'danik@danik.ru', 'c9d21e89dc04f9f2b446b4fbdafdf4b8', 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'test4', 'fFjAZ8pXHlIYWZS', 'brZleAtTx5WZphf.png', '1995-06-22', 'organizer', '2022-06-16 04:00:10', '2023-06-21 11:29:26'),
(5, 'Святослав', 'Ануфриев', 'asvytoslav@mail.ru', 'c9d21e89dc04f9f2b446b4fbdafdf4b8', 0, 0, 0, 0, 0, 0, 'test56', 'test56', 'test56', 'test56', 'VxJEWYWvQwan5MJ', 'GwMeH57Ud32W5cM.png', '2003-07-03', 'admin', '2022-10-27 07:45:18', '2023-06-21 12:43:21'),
(9, 'Александр', 'Дьяков ', 'test6@mail.ru', 'c9d21e89dc04f9f2b446b4fbdafdf4b8', 1, 0, 0, 0, 0, 1, NULL, 'test6', NULL, NULL, 'RePjZ9UtAJTVL1n', 'b4Wl4vff3dZG4qp.png', '2003-01-01', 'none', '2023-02-27 05:55:51', '2023-06-21 11:30:48'),
(10, 'Дмитрий', 'Коновалов ', 'newTest1@mail.ru', 'c9d21e89dc04f9f2b446b4fbdafdf4b8', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'CiIyywJeHWY1Y3S', 'fquSpZoxfvDAuFh.png', '1998-05-06', 'none', '2023-06-11 10:13:05', '2023-06-21 11:31:17'),
(13, 'Арсений', 'Майоров ', 'sasdasd@asdas.ru', 'c9d21e89dc04f9f2b446b4fbdafdf4b8', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'hZI77imnF1ksJkh', 'vSnKB4RY8SLulBG.png', '2005-06-01', 'none', '2023-06-20 06:41:33', '2023-06-21 11:31:40'),
(14, 'Илья', 'Иванов', 'sasdasd@asdass.ru', 'c9d21e89dc04f9f2b446b4fbdafdf4b8', 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'FgYSi58GjOlSX83', 'oIoC7Wh0WY2MneN.png', '2005-06-01', 'none', '2023-06-20 06:42:02', '2023-06-21 11:31:56'),
(15, 'Максим', 'Козлов', 'maksim@mail.ru', 'c9d21e89dc04f9f2b446b4fbdafdf4b8', 0, 0, 0, 0, 0, 0, 'Удилище с катушкой Anvento RS-101, 210сm', 'Не имею', 'Не имею', 'Не имею', 'eGdZS7YdDtaWHdE', 'ORYGgI35uWFPPPP.png', '2004-12-09', 'none', '2023-06-21 10:30:55', '2023-06-21 11:21:47');

-- --------------------------------------------------------

--
-- Структура таблицы `user_ratings`
--

CREATE TABLE `user_ratings` (
  `id` int NOT NULL,
  `user_for_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_who_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_ratings`
--

INSERT INTO `user_ratings` (`id`, `user_for_id`, `user_who_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, '3', '1', 5, '2022-06-15 09:54:09', '2022-06-16 15:55:08'),
(2, '5', '2', 4, '2022-06-15 14:14:25', '2022-06-15 14:14:25'),
(3, '1', '4', 3, '2022-06-16 04:02:03', '2022-06-16 04:02:09'),
(4, '4', '5', 5, '2022-06-16 14:38:09', '2023-06-17 07:32:13'),
(5, '4', '1', 2, '2022-06-16 15:45:55', '2022-06-16 15:54:21'),
(6, '3', '5', 5, '2022-10-27 07:48:29', '2022-10-27 08:13:37'),
(7, '1', '5', 5, '2022-10-27 08:14:02', '2022-10-27 08:14:02'),
(8, '2', '5', 5, '2023-06-20 04:55:05', '2023-06-20 04:55:05'),
(9, '14', '5', 5, '2023-06-21 12:43:32', '2023-06-21 12:43:32');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advts`
--
ALTER TABLE `advts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advts_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_advt_id_foreign` (`advt_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`advt_id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizer` (`organizer`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advt_id` (`advt_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_ratings`
--
ALTER TABLE `user_ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `advts`
--
ALTER TABLE `advts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `user_ratings`
--
ALTER TABLE `user_ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `advts`
--
ALTER TABLE `advts`
  ADD CONSTRAINT `advts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_advt_id_foreign` FOREIGN KEY (`advt_id`) REFERENCES `advts` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`advt_id`) REFERENCES `advts` (`id`);

--
-- Ограничения внешнего ключа таблицы `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`organizer`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`advt_id`) REFERENCES `advts` (`id`),
  ADD CONSTRAINT `passengers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Mar 2022, 23:19
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `phpproject`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`usersId`, `usersUid`, `usersPwd`) VALUES
(6, 'admin', '$2a$12$LWCJ.BGDTPMyVM53lOHJUupe.Ix06qxrptRklicOuCslRo8v9cD9K'),
(7, 'peepeepoopoo', '$2y$10$a7zsgC58HeiJu/.1TTIG7.0bN1aCql41sNgefPi0YhRHwTFXa85iO'),
(14, 'testing420123123', '$2y$10$EKhROyM7cJ25l4Xj3VaI7eQdoxUGjMJTk.BwgzNkWpKunpx8F/s6O'),
(15, 'zyzz', '$2y$10$lZQNAOFj0IyAjzne0acql.wLQ.KfwRl4ffsW2B1LwXp5ffUn9fURy'),
(27, 'zyzz2', '$2y$10$xW0EWIjMaIGj2.8rl54rPuj0jyL7o5jmc6CXvoY/GieicigBEJZgK');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

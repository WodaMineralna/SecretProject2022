-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Mar 2022, 23:18
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
-- Struktura tabeli dla tabeli `filesinfo`
--

CREATE TABLE `filesinfo` (
  `filesId` int(11) NOT NULL,
  `filesName` varchar(128) NOT NULL,
  `filesSize` int(11) NOT NULL,
  `filesDest` varchar(128) NOT NULL,
  `filesExt` varchar(128) NOT NULL,
  `filesDesc` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `filesinfo`
--

INSERT INTO `filesinfo` (`filesId`, `filesName`, `filesSize`, `filesDest`, `filesExt`, `filesDesc`) VALUES
(40, '623d12d3b195f5.17863611.gif', 4147921, 'documents/623d12d3b195f5.17863611.gif', 'gif', 'smeiszny kot'),
(41, '623d12dc90ae36.14785903.png', 666840, 'documents/623d12dc90ae36.14785903.png', 'png', 'pee pee poo poo'),
(42, '623d13ab46d5b4.24902253.gif', 2585949, 'documents/623d13ab46d5b4.24902253.gif', 'gif', 'kogut kogut kogut kogut kogut ko'),
(43, '623d13b7d21748.73312928.png', 69128, 'documents/623d13b7d21748.73312928.png', 'png', 'skute bobo');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `filesinfo`
--
ALTER TABLE `filesinfo`
  ADD PRIMARY KEY (`filesId`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `filesinfo`
--
ALTER TABLE `filesinfo`
  MODIFY `filesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

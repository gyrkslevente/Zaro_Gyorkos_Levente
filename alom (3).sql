-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2024. Máj 02. 15:43
-- Kiszolgáló verziója: 8.0.17
-- PHP verzió: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `alom`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `cpid` int(11) NOT NULL,
  `cuid` int(11) NOT NULL,
  `ctext` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cdate` datetime NOT NULL,
  `cstatus` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active' COMMENT 'Active,Archived',
  `cip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`cid`, `cpid`, `cuid`, `ctext`, `cdate`, `cstatus`, `cip`) VALUES
(1, 6, 2, 'Teszt', '2024-04-11 12:14:35', 'Active', '::1'),
(4, 8, 2, 'Teszt', '2024-04-11 14:28:53', 'Active', '::1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `luid` int(11) NOT NULL,
  `ldate` datetime NOT NULL,
  `lip` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `login`
--

INSERT INTO `login` (`lid`, `luid`, `ldate`, `lip`) VALUES
(1, 1, '2024-04-04 14:05:19', '::1'),
(2, 1, '2024-04-04 15:23:45', '::1'),
(3, 1, '2024-04-04 18:29:39', '::1'),
(4, 1, '2024-04-04 18:30:02', '::1'),
(5, 1, '2024-04-07 15:02:44', '::1'),
(6, 1, '2024-04-07 15:07:22', '::1'),
(7, 1, '2024-04-07 15:10:38', '::1'),
(8, 1, '2024-04-07 15:13:38', '::1'),
(9, 1, '2024-04-07 16:09:59', '::1'),
(10, 1, '2024-04-07 16:24:29', '::1'),
(11, 2, '2024-04-07 17:04:27', '::1'),
(12, 2, '2024-04-07 17:04:54', '::1'),
(13, 2, '2024-04-07 17:32:43', '::1'),
(14, 2, '2024-04-07 18:10:24', '::1'),
(15, 2, '2024-04-07 22:41:04', '::1'),
(16, 2, '2024-04-07 23:01:01', '::1'),
(17, 2, '2024-04-08 13:47:44', '::1'),
(18, 2, '2024-04-08 14:10:28', '::1'),
(19, 2, '2024-04-08 15:23:40', '::1'),
(20, 2, '2024-04-09 17:21:38', '::1'),
(21, 2, '2024-04-09 17:24:35', '::1'),
(22, 2, '2024-04-09 17:26:20', '::1'),
(23, 2, '2024-04-09 19:56:50', '::1'),
(24, 2, '2024-04-10 10:54:22', '::1'),
(25, 2, '2024-04-10 10:55:28', '::1'),
(26, 2, '2024-04-10 11:16:46', '::1'),
(27, 2, '2024-04-10 12:34:18', '::1'),
(28, 2, '2024-04-10 12:49:16', '::1'),
(29, 2, '2024-04-10 13:18:53', '::1'),
(30, 2, '2024-04-11 11:53:32', '::1'),
(31, 2, '2024-04-11 13:52:18', '::1'),
(32, 2, '2024-04-12 09:36:01', '::1'),
(33, 2, '2024-04-12 09:43:26', '::1'),
(34, 2, '2024-04-12 09:45:03', '::1'),
(35, 2, '2024-04-15 10:27:04', '::1'),
(36, 2, '2024-04-15 11:40:43', '::1'),
(37, 2, '2024-04-15 11:43:46', '::1'),
(38, 2, '2024-04-15 12:16:30', '::1'),
(39, 2, '2024-04-15 12:50:41', '::1'),
(40, 2, '2024-04-15 14:19:16', '::1'),
(41, 2, '2024-04-16 10:30:52', '::1'),
(42, 2, '2024-04-16 10:31:58', '::1'),
(43, 2, '2024-04-16 10:32:25', '::1'),
(44, 2, '2024-05-02 17:36:50', '::1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `posts`
--

CREATE TABLE `posts` (
  `pid` int(11) NOT NULL,
  `puid` int(11) NOT NULL,
  `ppic` varchar(50) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `ptitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `pdesc` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `ptel` varchar(12) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `pstatus` varchar(8) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL DEFAULT 'Active' COMMENT 'Active,Archived',
  `pdate` datetime NOT NULL,
  `pip` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `posts`
--

INSERT INTO `posts` (`pid`, `puid`, `ppic`, `ptitle`, `pdesc`, `ptel`, `pstatus`, `pdate`, `pip`) VALUES
(2, 2, '20240407153343_2_TqiqZzwyHe.jpg', 'test', 'test', '111111', 'Archived', '2024-04-07 17:33:43', '::1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `umail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `upw` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `upic` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uip` int(40) NOT NULL,
  `udate` date NOT NULL,
  `ustatus` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uperm` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ustrid` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`uid`, `uname`, `umail`, `upw`, `upic`, `uip`, `udate`, `ustatus`, `uperm`, `ustrid`) VALUES
(3, 'tesztelek', 'gyorkos.levi93@gmail.com', '13b40aaa025e43cc12ac61e35a68da5b', 'template.jpg', 0, '2024-04-09', 'A', '', 'umLz9annr1');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- A tábla indexei `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- A tábla indexei `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`pid`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT a táblához `posts`
--
ALTER TABLE `posts`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

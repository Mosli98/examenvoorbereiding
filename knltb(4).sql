-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 jun 2022 om 11:11
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knltb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aanmeldingen`
--

CREATE TABLE `aanmeldingen` (
  `aanmeldingenid` int(11) NOT NULL,
  `spelersid` varchar(255) NOT NULL,
  `scholenid` varchar(255) NOT NULL,
  `toernooienid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `aanmeldingen`
--

INSERT INTO `aanmeldingen` (`aanmeldingenid`, `spelersid`, `scholenid`, `toernooienid`) VALUES
(1, '1', '1', '1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `scholen`
--

CREATE TABLE `scholen` (
  `scholenid` int(11) NOT NULL,
  `schoolnaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `scholen`
--

INSERT INTO `scholen` (`scholenid`, `schoolnaam`) VALUES
(1, 'bijlmer'),
(2, 'laanvspartaan'),
(3, 'rai'),
(4, 'amstelveenn');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `spelers`
--

CREATE TABLE `spelers` (
  `spelersid` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `scholenid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `spelers`
--

INSERT INTO `spelers` (`spelersid`, `voornaam`, `tussenvoegsel`, `achternaam`, `scholenid`) VALUES
(2, 'said', 's', 'kmisha', 2),
(4, 'asd', 'asd', '213', 1),
(5, 'ff', 'f', 'ffff', 1),
(6, 'sda', 'jel', 'abde', 1),
(7, 'jle', 'tor', 'kles', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `toernooien`
--

CREATE TABLE `toernooien` (
  `toernooienid` int(11) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `toernooinaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `toernooien`
--

INSERT INTO `toernooien` (`toernooienid`, `datum`, `toernooinaam`) VALUES
(1, '22-01-2022', 'vierdaagse'),
(2, '12-03-1996', 'calandloop'),
(3, '16-12-3323', 'ronde 1'),
(4, '16-11-2233', 'ronde 2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `uitslagen`
--

CREATE TABLE `uitslagen` (
  `uitslagenid` int(11) NOT NULL,
  `spelersid` varchar(255) NOT NULL,
  `toernooienid` varchar(255) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `wedstrijdid` int(11) NOT NULL,
  `uitslag` varchar(255) NOT NULL,
  `toernooinaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `uitslagen`
--

INSERT INTO `uitslagen` (`uitslagenid`, `spelersid`, `toernooienid`, `voornaam`, `wedstrijdid`, `uitslag`, `toernooinaam`) VALUES
(12, '', '1', 'Mister', 1, '1', 'ronde 1'),
(16, '', '1', 'lidl', 1, '55-22', 'vierdaagse'),
(17, '', '1', 'Mister', 1, '22-22', 'ronde 2');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wedstrijd`
--

CREATE TABLE `wedstrijd` (
  `wedstrijdid` int(11) NOT NULL,
  `toernooienid` int(11) NOT NULL,
  `Ronde` int(11) NOT NULL,
  `speler1id` int(11) NOT NULL,
  `speler2id` int(11) NOT NULL,
  `score1` int(11) NOT NULL,
  `score2` int(11) NOT NULL,
  `winnaarid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `wedstrijd`
--

INSERT INTO `wedstrijd` (`wedstrijdid`, `toernooienid`, `Ronde`, `speler1id`, `speler2id`, `score1`, `score2`, `winnaarid`) VALUES
(1, 1, 1, 4, 2, 0, 0, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aanmeldingen`
--
ALTER TABLE `aanmeldingen`
  ADD PRIMARY KEY (`aanmeldingenid`),
  ADD KEY `spelersid` (`spelersid`),
  ADD KEY `scholenid` (`scholenid`),
  ADD KEY `toernooienid` (`toernooienid`);

--
-- Indexen voor tabel `scholen`
--
ALTER TABLE `scholen`
  ADD PRIMARY KEY (`scholenid`);

--
-- Indexen voor tabel `spelers`
--
ALTER TABLE `spelers`
  ADD PRIMARY KEY (`spelersid`),
  ADD KEY `scholenid` (`scholenid`);

--
-- Indexen voor tabel `toernooien`
--
ALTER TABLE `toernooien`
  ADD PRIMARY KEY (`toernooienid`);

--
-- Indexen voor tabel `uitslagen`
--
ALTER TABLE `uitslagen`
  ADD PRIMARY KEY (`uitslagenid`),
  ADD KEY `spelersid` (`spelersid`),
  ADD KEY `toernooienid` (`toernooienid`);

--
-- Indexen voor tabel `wedstrijd`
--
ALTER TABLE `wedstrijd`
  ADD PRIMARY KEY (`wedstrijdid`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aanmeldingen`
--
ALTER TABLE `aanmeldingen`
  MODIFY `aanmeldingenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `scholen`
--
ALTER TABLE `scholen`
  MODIFY `scholenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `spelers`
--
ALTER TABLE `spelers`
  MODIFY `spelersid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `toernooien`
--
ALTER TABLE `toernooien`
  MODIFY `toernooienid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `uitslagen`
--
ALTER TABLE `uitslagen`
  MODIFY `uitslagenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `wedstrijd`
--
ALTER TABLE `wedstrijd`
  MODIFY `wedstrijdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

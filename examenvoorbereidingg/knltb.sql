-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 jul 2017 om 21:48
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 5.6.30
create database knltb;

use knltb;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolsforever`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `spelers` (
  `spelersid` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `scholenid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `spelers` (`spelersid`, `voornaam`, `tussenvoegsel`, `achternaam`, `scholenid`) VALUES
(1, 'mo', 's', 'sliman', 1),
(2, 'said', 's', 'kmisha', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `toernooien` (
  `toernooienid` int(11) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `toernooinaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `toernooien` (`toernooienid`, `datum`, `toernooinaam`) VALUES
(1, '22-10-2021', 'Hamer');


CREATE TABLE `uitslagen` (
  `uitslagenid` int(11) NOT NULL,
  `spelersid` varchar(255) NOT NULL,
  `toernooienid` varchar(255) NOT NULL,
    `toernooinaam` varchar(255) NOT NULL,
      `voornaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `uitslagen` (`uitslagenid`, `spelersid`, `toernooienid`) VALUES
(1, 1, 1);


CREATE TABLE `aanmeldingen` (
  `aanmeldingenid` int(11) NOT NULL,
  `spelersid` varchar(255) NOT NULL,
  `scholenid` varchar(255) NOT NULL,
  `toernooienid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `aanmeldingen` (`aanmeldingenid`, `spelersid`, `scholenid`,  `toernooienid`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkels`
--

CREATE TABLE `scholen` (
  `schoolid` int(11) NOT NULL,
  `schoolnaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Gegevens worden geëxporteerd voor tabel `winkels`
--

INSERT INTO `scholen` (`schoolid`, `schoolnaam`) VALUES
(1, 'MBO 1'),
(2, 'MBO 2');





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
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `spelers`
  ADD PRIMARY KEY (`spelersid`),
  ADD KEY `scholenid` (`scholenid`);


ALTER TABLE `uitslagen`
  ADD PRIMARY KEY (`uitslagenid`),
  ADD KEY `spelersid` (`spelersid`),
  ADD KEY `toernooienid` (`toernooienid`);

ALTER TABLE `aanmeldingen`
  ADD PRIMARY KEY (`aanmeldingenid`),
  ADD KEY `spelersid` (`spelersid`),
  ADD KEY `scholenid` (`scholenid`),
  ADD KEY `toernooienid` (`toernooienid`);

ALTER TABLE `scholen`
  ADD PRIMARY KEY (`scholenid`);

ALTER TABLE `toernooien`
  ADD PRIMARY KEY (`toernooienid`);

ALTER TABLE `spelers`
  MODIFY `spelersid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `uitslagen`
  MODIFY `uitslagenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT voor een tabel `winkels`
--
ALTER TABLE `aanmeldingen`
  MODIFY `aanmeldingenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `scholen`
  MODIFY `scholenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `toernooien`
  MODIFY `toernooienid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `gebruikers`
--
ALTER TABLE `spelers`
  ADD CONSTRAINT `spelers_ibfk_1` FOREIGN KEY (`scholenid`) REFERENCES `scholen` (`scholenid`);

--
-- Beperkingen voor tabel `producten`
--
ALTER TABLE `uitslagen`
  ADD CONSTRAINT `uitslagen_ibfk_1` FOREIGN KEY (`spelersid`) REFERENCES `spelers` (`spelersid`),
  ADD CONSTRAINT `uitslagen_ibfk_2` FOREIGN KEY (`toernooienid`) REFERENCES `toernooien` (`toernooienid`);

ALTER TABLE `aanmeldingen`
  ADD CONSTRAINT `aanmeldingen_ibfk_1` FOREIGN KEY (`spelersid`) REFERENCES `spelers` (`spelersid`),
  ADD CONSTRAINT `aanmeldingen_ibfk_2` FOREIGN KEY (`toernooienid`) REFERENCES `toernooien` (`toernooienid`),
  ADD CONSTRAINT `aanmeldingen_ibfk_3` FOREIGN KEY (`scholenid`) REFERENCES `scholen` (`scholenid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
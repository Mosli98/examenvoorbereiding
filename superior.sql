-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 mei 2022 om 14:00
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superior`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `apparaten`
--

CREATE TABLE `apparaten` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Omschrijving` varchar(200) NOT NULL,
  `Vergoeding` decimal(10,0) NOT NULL,
  `GewichtGram` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `innameapparaat`
--

CREATE TABLE `innameapparaat` (
  `ID` int(11) NOT NULL,
  `InnameID` int(11) NOT NULL,
  `ApparaatID` int(11) NOT NULL,
  `Ontleed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `innames`
--

CREATE TABLE `innames` (
  `ID` int(11) NOT NULL,
  `MedewerkerID` int(11) NOT NULL,
  `Tijdstip` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerkers`
--

CREATE TABLE `medewerkers` (
  `ID` int(11) NOT NULL,
  `RolID` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Wachtwoord` varchar(40) NOT NULL,
  `Emailadres` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `onderdeelapparaat`
--

CREATE TABLE `onderdeelapparaat` (
  `ID` int(11) NOT NULL,
  `OnderdeelID` int(11) NOT NULL,
  `ApparaatID` int(11) NOT NULL,
  `Percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `onderdelen`
--

CREATE TABLE `onderdelen` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Omschrijving` varchar(200) NOT NULL,
  `VoorraadKg` int(11) NOT NULL,
  `PrijsPerKg` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rollen`
--

CREATE TABLE `rollen` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(40) NOT NULL,
  `Omschrijving` varchar(200) NOT NULL,
  `Waarde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `uitgiftes`
--

CREATE TABLE `uitgiftes` (
  `ID` int(11) NOT NULL,
  `MedewerkerID` int(11) NOT NULL,
  `OnderdeelID` int(11) NOT NULL,
  `Tijdstip` datetime NOT NULL,
  `GewichtKg` int(11) NOT NULL,
  `Prijs` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `apparaten`
--
ALTER TABLE `apparaten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `innameapparaat`
--
ALTER TABLE `innameapparaat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `innames`
--
ALTER TABLE `innames`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `onderdelen`
--
ALTER TABLE `onderdelen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `uitgiftes`
--
ALTER TABLE `uitgiftes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `apparaten`
--
ALTER TABLE `apparaten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `innameapparaat`
--
ALTER TABLE `innameapparaat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `innames`
--
ALTER TABLE `innames`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `onderdeelapparaat`
--
ALTER TABLE `onderdeelapparaat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `onderdelen`
--
ALTER TABLE `onderdelen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `rollen`
--
ALTER TABLE `rollen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `uitgiftes`
--
ALTER TABLE `uitgiftes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

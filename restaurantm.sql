-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 nov 2021 om 07:44
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
-- Database: `restaurantm`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `bestellingscode` varchar(5) NOT NULL,
  `reserveringcode` varchar(5) DEFAULT NULL,
  `menuitemscode` varchar(5) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `gereserveerd` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bestellingen`
--

INSERT INTO `bestellingen` (`bestellingscode`, `reserveringcode`, `menuitemscode`, `aantal`, `gereserveerd`) VALUES
('54e40', '3aa5d', '12458', 44, 1),
('5d8cc', '0f392', '0ab69', 56, 1),
('6d648', '0f392', 'c3cd7', 56, 1),
('88206', '3aa5d', '4b0fb', 65, 0),
('a611a', '0f392', 'b925d', 56, 1),
('bdfe3', '4833b', '1d7a8', 56, 1),
('c6dea', '3aa5d', '4b83b', 56, 0),
('e5c3b', '3aa5d', '0ab69', 65, 0),
('e60b9', '3aa5d', '8a7ac', 65, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechtcategorien`
--

CREATE TABLE `gerechtcategorien` (
  `gerechtcategoriencode` varchar(5) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  `naam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gerechtcategorien`
--

INSERT INTO `gerechtcategorien` (`gerechtcategoriencode`, `code`, `naam`) VALUES
('4cdd0', 'dd6', 'voorgerechten'),
('7ff4f', 'f54', 'hapjes'),
('8286f', '877', 'hoofdgerechten'),
('b4848', '84f', 'nagerechten'),
('c2965', '96a', 'dranken');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechtsoorten`
--

CREATE TABLE `gerechtsoorten` (
  `gerechtsoortencode` varchar(5) NOT NULL,
  `gerechtcategoriencode` varchar(5) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `naam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gerechtsoorten`
--

INSERT INTO `gerechtsoorten` (`gerechtsoortencode`, `gerechtcategoriencode`, `code`, `naam`) VALUES
('07f46', '7ff4f', 'f4f', 'koude hapjes'),
('0a332', '7ff4f', '34b', 'warme hapjes'),
('23c38', 'c2965', 'c3c', 'frisdranken'),
('24dcb', '8286f', 'dd3', 'vegetarisch'),
('5030c', '69a66', '311', 'wijnen'),
('620bc', '4cdd0', '0c1', 'koud'),
('b16a9', '8286f', '6ae', 'vis'),
('bd5fa', '69a66', '5ff', 'bieren'),
('ccfcd', '4cdd0', 'fd3', 'warm'),
('daa50', 'b4848', 'a55', 'ijs'),
('e498a', 'c2965', '99a', 'warme dranken'),
('e6c0f', '8286f', 'c13', 'vlees');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klantencode` varchar(5) NOT NULL,
  `naam` varchar(20) DEFAULT NULL,
  `telefoon` int(11) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klantencode`, `naam`, `telefoon`, `email`) VALUES
('28699', 'appie', 611223344, 'appie@outlook.nl'),
('7eab0', 'joefry', 611223355, 'hans@outlook.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitems`
--

CREATE TABLE `menuitems` (
  `menuitemscode` varchar(5) NOT NULL,
  `gerechtsoortencode` varchar(5) DEFAULT NULL,
  `code` varchar(4) DEFAULT NULL,
  `prijs` double DEFAULT NULL,
  `naam` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `menuitems`
--

INSERT INTO `menuitems` (`menuitemscode`, `gerechtsoortencode`, `code`, `prijs`, `naam`) VALUES
('0ab69', '23c38', 'b6f', 7, 'cola'),
('10630', '07f46', '636', 12, 'kippen vleugels'),
('12458', 'ccfcd', '45d', 7, 'tomatensoep'),
('1d7a8', '24dcb', '7ad', 24, 'bonengerecht met diverse groen'),
('24a2c', 'daa50', 'a30', 7, 'vanille ijs'),
('30e14', 'bd5fa', 'e17', 8, 'pilsner'),
('368db', '5030c', '8e2', 24, 'witte wijn'),
('48b4b', '620bc', 'b52', 7, 'salade met geitenkaas'),
('4b0fb', 'bd5fa', '100', 24, 'palm'),
('4b83b', 'ccfcd', '846', 7, 'aspergesoep'),
('4e0f0', '23c38', '101', 7, 'fanta'),
('51fd3', '23c38', 'fd7', 7, 'sprite'),
('5ba7e', '24dcb', 'a82', 24, 'gebakken banaan'),
('79825', 'e6c0f', '829', 50, 'wienerschnitzel'),
('7bbd3', 'e498a', 'bd9', 7, 'thee'),
('80da4', '620bc', 'db6', 7, 'tonijnsalade'),
('8a7ac', 'e6c0f', '7b2', 100, 'biefstuk goud'),
('905c0', '07f46', '5c5', 12, 'portie salami'),
('b2da8', 'b16a9', 'dae', 24, 'gebakken makreel'),
('b7169', 'bd5fa', '16e', 12, 'kasteel donker'),
('b925d', '24dcb', '261', 24, 'mosselen uit pan'),
('c3cd7', '5030c', 'ce9', 24, 'rode wijn'),
('c7da1', 'e498a', 'da5', 7, 'koffie'),
('db750', '07f46', '755', 12, 'bitterballen'),
('dc809', 'daa50', '80e', 7, 'vruchtenijs'),
('ee595', '07f46', '599', 12, 'portie kaas');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `reserveringcode` varchar(5) NOT NULL,
  `klantencode` varchar(5) DEFAULT NULL,
  `tafel` int(11) DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `tijd` time DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `reserveringstatus` tinyint(4) DEFAULT NULL,
  `datum_toegevoegd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aantal_k` int(11) DEFAULT NULL,
  `allergien` varchar(255) DEFAULT NULL,
  `opmerkingen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen`
--

INSERT INTO `reserveringen` (`reserveringcode`, `klantencode`, `tafel`, `datum`, `tijd`, `aantal`, `reserveringstatus`, `datum_toegevoegd`, `aantal_k`, `allergien`, `opmerkingen`) VALUES
('0f392', '28699', 5, '2021-04-14', '03:44:00', 3, 3, '0000-00-00 00:00:00', 1, '1', '1'),
('3aa5d', '7eab0', 5, '2021-04-14', '12:03:00', 5, 3, '0000-00-00 00:00:00', 3, '3', ''),
('4833b', '7eab0', 13, '2021-04-23', '07:59:00', 9, 3, '0000-00-00 00:00:00', 6, '7', '7');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`bestellingscode`),
  ADD KEY `reserveringcode` (`reserveringcode`),
  ADD KEY `menuitemscode` (`menuitemscode`);

--
-- Indexen voor tabel `gerechtcategorien`
--
ALTER TABLE `gerechtcategorien`
  ADD PRIMARY KEY (`gerechtcategoriencode`);

--
-- Indexen voor tabel `gerechtsoorten`
--
ALTER TABLE `gerechtsoorten`
  ADD PRIMARY KEY (`gerechtsoortencode`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `gerechtcategoriencode` (`gerechtcategoriencode`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klantencode`);

--
-- Indexen voor tabel `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`menuitemscode`),
  ADD KEY `gerechtsoortencode` (`gerechtsoortencode`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`reserveringcode`),
  ADD KEY `klantencode` (`klantencode`);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `bestellingen_ibfk_1` FOREIGN KEY (`reserveringcode`) REFERENCES `reserveringen` (`reserveringcode`),
  ADD CONSTRAINT `bestellingen_ibfk_2` FOREIGN KEY (`menuitemscode`) REFERENCES `menuitems` (`menuitemscode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

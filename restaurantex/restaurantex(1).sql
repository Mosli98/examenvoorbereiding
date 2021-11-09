-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 09 nov 2021 om 08:47
-- Serverversie: 10.4.18-MariaDB
-- PHP-versie: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurantex`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `admintable`
--

INSERT INTO `admintable` (`id`, `username`, `password`) VALUES
(2, 'adminonly1', '*DE60168EFD21A172576C351EAA853EB338BE3C91');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `barman`
--

CREATE TABLE `barman` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `barman`
--

INSERT INTO `barman` (`id`, `username`, `password`) VALUES
(1, 'barman1', '*ED68274EA2972E9F20E35E94810BF35AA401A2D1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id` int(11) NOT NULL,
  `code` varchar(4) DEFAULT NULL,
  `naam` varchar(30) DEFAULT NULL,
  `reservering_id` int(11) NOT NULL,
  `menuitem_id` int(11) NOT NULL,
  `gereserveerd` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechtcatogorien`
--

CREATE TABLE `gerechtcatogorien` (
  `id` int(11) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  `naam` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gerechtcatogorien`
--

INSERT INTO `gerechtcatogorien` (`id`, `code`, `naam`) VALUES
(1, 'G1', 'Hoofdgerechten'),
(2, 'G2', 'Voordekleintjes'),
(3, 'G3', 'Voorgerechten'),
(4, 'M1', 'Frisdranken'),
(5, 'D1', 'Dessert'),
(6, 'H1', 'Huiswijnen'),
(7, 'KF1', 'Koffie en thee'),
(8, 'MI1', 'Mineraalwaters'),
(9, 'S1', 'Specialbier'),
(10, 'T1', 'Tapbier');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechtsoorten`
--

CREATE TABLE `gerechtsoorten` (
  `id` int(11) NOT NULL,
  `code` varchar(4) DEFAULT NULL,
  `naam` varchar(20) DEFAULT NULL,
  `gerechtcategorien_id` int(11) NOT NULL,
  `prijs` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gerechtsoorten`
--

INSERT INTO `gerechtsoorten` (`id`, `code`, `naam`, `gerechtcategorien_id`, `prijs`) VALUES
(1, 'GS1', 'Pasta Green', 1, 12),
(2, 'GS2', 'Pesto', 1, 12),
(3, 'GS3', 'Peterselie', 1, 10),
(4, 'GS4', 'Pizzapesto', 1, 14),
(5, 'GS5', 'Pappen', 2, 8),
(6, 'GS6', 'Aardappelpurree', 2, 5),
(7, 'GS7', 'Purepurre', 2, 10),
(8, 'GS8', 'PurreGreen', 2, 9),
(9, 'GS9', 'Groentesoep', 3, 10),
(10, 'GS10', 'Pindasoep', 3, 8),
(11, 'GS11', 'Purepindasoep', 3, 10),
(12, 'GS12', 'Soep met vlees', 3, 11),
(13, 'GS13', 'Cola', 4, 3.5),
(14, 'GS14', 'Fanta', 4, 5),
(15, 'GS15', 'Fernandes', 4, 5),
(16, 'GS16', 'Fernandes spar', 4, 2),
(17, 'GS17', 'Pudding', 5, 7),
(18, 'GS18', 'Rijsttoetje', 5, 8),
(19, 'GS19', 'Cake', 5, 12),
(20, 'GS20', 'Belegtoetje', 5, 9),
(21, 'GS21', 'Witte wijn', 6, 23),
(22, 'GS22', 'Rode wijn', 6, 32),
(23, 'GS23', 'Rose wijn', 6, 15),
(24, 'GS24', 'Pure wijn', 6, 15),
(25, 'GS25', 'Zwarte koffie', 7, 6),
(26, 'GS26', 'Bruine koffie', 7, 9),
(27, 'GS27', 'Groene thee', 7, 4),
(28, 'GS28', 'Orange thee', 7, 6),
(29, 'GS29', 'Naturel water', 8, 5),
(30, 'GS30', 'Puur water', 8, 4),
(31, 'GS31', 'Mineraal puur water', 8, 4),
(32, 'GS32', 'Spa water', 8, 5),
(33, 'GS33', 'Special Jena bier', 9, 14),
(34, 'GS34', 'Special Jona bier', 9, 12),
(35, 'GS35', 'Special Peer bier', 9, 8),
(36, 'GS36', 'Special Green bier', 9, 15),
(37, 'GS37', 'Tapbier Green', 10, 8),
(38, 'GS38', 'Tapbier Orange', 10, 9),
(39, 'GS39', 'Tapbier Reer', 10, 7),
(40, 'GS40', 'Tapbier Veer', 10, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `telefoon` varchar(11) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `naam`, `telefoon`, `email`) VALUES
(8, 'Pieter', '0612345678', 'samilalparslan11@outlook.com'),
(9, 'qeee', '0612345321', 'peter2@gmail.com'),
(12, 'Peter', '0612345321', 'peter@gmail.com'),
(13, 'Peter', '0612345321', 'peters@gmail.com'),
(16, 'Peter', '0612345321', 'peter12@gmail.com'),
(17, 'Peter', '0612345321', 'peter124@gmail.com'),
(19, 'Peter', '0612345321', 'peter1214@gmail.com'),
(20, 'Peter1', '0612345321', 'peter1@gmail.com'),
(22, 'Peters', '0612345321', 'peter21@gmail.com'),
(23, 'Peters', '0612345321', 'peter1v@gmail.com'),
(24, 'Peter', '0612345321', 'pete5r@gmail.com'),
(26, 'Peter1', '0612345321', 'peter14@gmail.com'),
(27, 'Peter', '0612345321', 'peter55@gmail.com'),
(28, 'Peter', '0612345321', 'peter44@gmail.com'),
(30, 'Peter', '0612345321', 'peter45@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kok`
--

CREATE TABLE `kok` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `kok`
--

INSERT INTO `kok` (`id`, `username`, `password`) VALUES
(1, 'kok1', '*93200EAF2FC1DDE16539FF0B577354B84920C1B1');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitems`
--

CREATE TABLE `menuitems` (
  `id` int(11) NOT NULL,
  `code` varchar(4) DEFAULT NULL,
  `naam` varchar(30) DEFAULT NULL,
  `gerechtsoort_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `menuitems`
--

INSERT INTO `menuitems` (`id`, `code`, `naam`, `gerechtsoort_id`) VALUES
(1, 'MI1', 'R1', 1),
(2, 'MI2', 'Kinderen', 2),
(3, 'MI3', 'Soepen', 3),
(4, 'MI4', 'Drinken', 4),
(5, 'MI5', 'Toetjes', 5),
(6, 'MI6', 'Wijnen', 6),
(7, 'MI7', 'Warm drinken', 7),
(8, 'MI8', 'Wateren', 8),
(9, 'MI9', 'Bieren (secret)', 9),
(10, 'MI10', 'Normaal bier', 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `id` int(11) NOT NULL,
  `tafel` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tijd` time NOT NULL,
  `klant_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `datum_toegevoegd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `aantal_k` int(11) NOT NULL,
  `allergieen` varchar(255) DEFAULT NULL,
  `opmerkingen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen`
--

INSERT INTO `reserveringen` (`id`, `tafel`, `datum`, `tijd`, `klant_id`, `aantal`, `status`, `datum_toegevoegd`, `aantal_k`, `allergieen`, `opmerkingen`) VALUES
(23, 17, '2021-04-17', '09:06:00', 26, 0, 0, '2021-04-16 07:14:19', 0, 'erree', NULL),
(25, 5, '2021-04-25', '11:23:00', 30, 0, 0, '2021-04-16 07:22:19', 2, 'bruine bonen allergie', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tafels`
--

CREATE TABLE `tafels` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `tafels`
--

INSERT INTO `tafels` (`id`, `naam`) VALUES
(1, 'Table1'),
(2, 'Table2'),
(3, 'Table3'),
(4, 'Table4'),
(5, 'Table5'),
(6, 'Table6'),
(7, 'Table7'),
(8, 'Table8'),
(9, 'Table9'),
(10, 'Table10'),
(11, 'Table11'),
(12, 'Table12'),
(13, 'Table13'),
(14, 'Table14'),
(15, 'Table15'),
(16, 'Table16'),
(17, 'Table17'),
(18, 'Table18'),
(19, 'Table19'),
(20, 'Table20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `waiter`
--

CREATE TABLE `waiter` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `waiter`
--

INSERT INTO `waiter` (`id`, `username`, `password`) VALUES
(1, 'waiter1', '*78D479205F00D92D448B3EFA9D4C37AEC2B62129');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `barman`
--
ALTER TABLE `barman`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `fk_reservering` (`reservering_id`),
  ADD KEY `fk_menuitems` (`menuitem_id`);

--
-- Indexen voor tabel `gerechtcatogorien`
--
ALTER TABLE `gerechtcatogorien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexen voor tabel `gerechtsoorten`
--
ALTER TABLE `gerechtsoorten`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `fk_gerechtcategorien` (`gerechtcategorien_id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `kok`
--
ALTER TABLE `kok`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `fk_gerechtsoorten` (`gerechtsoort_id`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `datum` (`datum`),
  ADD UNIQUE KEY `tijd` (`tijd`),
  ADD KEY `fk_klant` (`klant_id`);

--
-- Indexen voor tabel `tafels`
--
ALTER TABLE `tafels`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `waiter`
--
ALTER TABLE `waiter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `barman`
--
ALTER TABLE `barman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `gerechtcatogorien`
--
ALTER TABLE `gerechtcatogorien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `gerechtsoorten`
--
ALTER TABLE `gerechtsoorten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT voor een tabel `kok`
--
ALTER TABLE `kok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT voor een tabel `tafels`
--
ALTER TABLE `tafels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT voor een tabel `waiter`
--
ALTER TABLE `waiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `fk_menuitems` FOREIGN KEY (`menuitem_id`) REFERENCES `menuitems` (`id`),
  ADD CONSTRAINT `fk_reservering` FOREIGN KEY (`reservering_id`) REFERENCES `reserveringen` (`id`);

--
-- Beperkingen voor tabel `gerechtsoorten`
--
ALTER TABLE `gerechtsoorten`
  ADD CONSTRAINT `fk_gerechtcategorien` FOREIGN KEY (`gerechtcategorien_id`) REFERENCES `gerechtcatogorien` (`id`);

--
-- Beperkingen voor tabel `menuitems`
--
ALTER TABLE `menuitems`
  ADD CONSTRAINT `fk_gerechtsoorten` FOREIGN KEY (`gerechtsoort_id`) REFERENCES `gerechtcatogorien` (`id`);

--
-- Beperkingen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD CONSTRAINT `fk_klant` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

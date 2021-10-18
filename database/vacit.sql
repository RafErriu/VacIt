-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 okt 2021 om 14:22
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211018083139', '2021-10-18 08:32:18', 68),
('DoctrineMigrations\\Version20211018114404', '2021-10-18 11:44:23', 263),
('DoctrineMigrations\\Version20211018114849', '2021-10-18 11:50:14', 62),
('DoctrineMigrations\\Version20211018115357', '2021-10-18 11:54:11', 109),
('DoctrineMigrations\\Version20211018121212', '2021-10-18 12:12:26', 89),
('DoctrineMigrations\\Version20211018121706', '2021-10-18 12:17:21', 220),
('DoctrineMigrations\\Version20211018122130', '2021-10-18 12:21:57', 206);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sollicitatie`
--

CREATE TABLE `sollicitatie` (
  `id` int(11) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `werknemer_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `uitgenodigd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `systeem`
--

CREATE TABLE `systeem` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plaatje` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voornaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geboortedatum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefoonnummer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `woonplaats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivatie` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `vacature`
--

CREATE TABLE `vacature` (
  `id` int(11) NOT NULL,
  `titel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `omschrijving` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `systeem_id` int(11) NOT NULL,
  `werkgever_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `sollicitatie`
--
ALTER TABLE `sollicitatie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9577817D6FB89BA0` (`vacature_id`),
  ADD KEY `IDX_9577817D876F9FF5` (`werknemer_id`);

--
-- Indexen voor tabel `systeem`
--
ALTER TABLE `systeem`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indexen voor tabel `vacature`
--
ALTER TABLE `vacature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9E5830F5C1AB1400` (`systeem_id`),
  ADD KEY `IDX_9E5830F5F1317686` (`werkgever_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `sollicitatie`
--
ALTER TABLE `sollicitatie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `systeem`
--
ALTER TABLE `systeem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `vacature`
--
ALTER TABLE `vacature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `sollicitatie`
--
ALTER TABLE `sollicitatie`
  ADD CONSTRAINT `FK_9577817D6FB89BA0` FOREIGN KEY (`vacature_id`) REFERENCES `vacature` (`id`),
  ADD CONSTRAINT `FK_9577817D876F9FF5` FOREIGN KEY (`werknemer_id`) REFERENCES `user` (`id`);

--
-- Beperkingen voor tabel `vacature`
--
ALTER TABLE `vacature`
  ADD CONSTRAINT `FK_9E5830F5C1AB1400` FOREIGN KEY (`systeem_id`) REFERENCES `systeem` (`id`),
  ADD CONSTRAINT `FK_9E5830F5F1317686` FOREIGN KEY (`werkgever_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

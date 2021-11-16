-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 12:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211018083139', '2021-10-18 08:32:18', 68),
('DoctrineMigrations\\Version20211018114404', '2021-10-18 11:44:23', 263),
('DoctrineMigrations\\Version20211018114849', '2021-10-18 11:50:14', 62),
('DoctrineMigrations\\Version20211018115357', '2021-10-18 11:54:11', 109),
('DoctrineMigrations\\Version20211018121212', '2021-10-18 12:12:26', 89),
('DoctrineMigrations\\Version20211018121706', '2021-10-18 12:17:21', 220),
('DoctrineMigrations\\Version20211018122130', '2021-10-18 12:21:57', 206),
('DoctrineMigrations\\Version20211028084815', '2021-11-10 14:30:34', 553),
('DoctrineMigrations\\Version20211028084828', '2021-11-10 14:30:35', 0),
('DoctrineMigrations\\Version20211110142944', '2021-11-10 14:30:35', 54);

-- --------------------------------------------------------

--
-- Table structure for table `sollicitatie`
--

CREATE TABLE `sollicitatie` (
  `id` int(11) NOT NULL,
  `vacature_id` int(11) NOT NULL,
  `werknemer_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `uitgenodigd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sollicitatie`
--

INSERT INTO `sollicitatie` (`id`, `vacature_id`, `werknemer_id`, `datum`, `uitgenodigd`) VALUES
(80, 40, 10, '2021-10-01', 'N'),
(81, 41, 10, '2021-10-01', 'N'),
(82, 42, 10, '2021-10-05', 'Y'),
(85, 40, 25, '2021-10-28', 'Y'),
(98, 43, 25, '2021-11-05', 'Y'),
(102, 43, 25, '2021-11-09', 'N'),
(104, 48, 25, '2021-11-09', 'N'),
(105, 48, 37, '2021-11-09', 'Y'),
(106, 43, 37, '2021-11-09', 'N'),
(107, 49, 37, '2021-11-09', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `systeem`
--

CREATE TABLE `systeem` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plaatje` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `systeem`
--

INSERT INTO `systeem` (`id`, `naam`, `plaatje`) VALUES
(1, 'Linux', 'https://cdn.pixabay.com/photo/2020/02/22/16/29/penguin-4871045_960_720.png'),
(2, 'PHP', 'https://cdn-icons-png.flaticon.com/512/919/919830.png'),
(3, 'Windows', 'https://upload.wikimedia.org/wikipedia/commons/c/c7/Windows_logo_-_2012.png'),
(4, 'JavaScript', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Javascript-shield.svg/1200px-Javascript-shield.svg.png'),
(5, 'Python', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Python-logo-notext.svg/2000px-Python-logo-notext.svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
  `record_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `voornaam`, `achternaam`, `geboortedatum`, `telefoonnummer`, `adres`, `postcode`, `woonplaats`, `motivatie`, `cv`, `record_type`, `foto`) VALUES
(10, 'robkerobke@gmail.com', '[\"ROLE_WERKNEMER\"]', '123', 'Rob', 'de Beste', '10-12-1989', '0611223344', 'Woonlaan 3', '8272PR', 'Geleen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.', NULL, 'N', 'https://www.mantruckandbus.com/fileadmin/media/bilder/021/sebastian-voll-interviewkachel.jpg'),
(12, 'bedrijf@hotmail.com', '[\"ROLE_WERKGEVER\"]', 'bedrijfman', 'HetBedrijf', '', '10-08-2005', '0645781235', 'Bedrijfstraat 4', '8372MN', 'Echt', '', NULL, 'G', NULL),
(15, 'john@hotmail.com', 'ROLE_WERKNEMER', 'johnjohnjohn', 'John', 'de Vries', '23-10-1990', '113038638', 'woonplaats 6', '8274JN', 'Grathem', '', '', 'N', NULL),
(25, 'pietjepietjepietje@hotmail.com', '[\"ROLE_WERKNEMER\"]', '$2y$13$rbIxw8bh3m/SGY0EmQ1QBuuh96aPEr7IS.2gkECGY8OETd2gU15GS', 'Pietje', 'van de Piet', '05-11-1990', '0611225482', 'Ballo 4', '8654NG', 'Roermond', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.', 'upload/618a65d8d963e-linux-logo.png', 'N', 'https://www.mantruckandbus.com/fileadmin/media/bilder/021/sebastian-voll-interviewkachel.jpg'),
(26, 'anoukanouk@hotmail.com', '[\"ROLE_WERKNEMER\"]', '$2y$13$G3HtJur38kvVZVZMGPE81uEkfXQYgDHZZ50KobsZo20kyiZjZQEdW', 'Anouk', NULL, NULL, '', '', '', '', NULL, NULL, 'N', NULL),
(27, 'Bossman123@hotmail.com', '[\"ROLE_WERKGEVER\"]', '$2y$13$eQ.5cS6Kv6P3BtVpMdz7b.p0.98LPzOAmzWhVDKm0QZzJg/VLRI..', 'Boss Job', NULL, '', '06454894', 'Leukadres 43', '8406HG', 'Geleen', NULL, NULL, 'G', NULL),
(37, 'ruudjeruudjeruudje@hotmail.com', '[\"ROLE_WERKNEMER\"]', '$2y$13$7fTlarhUkQ26zt7aypSZK.tmd/qlc4Mg/Zue4bsjsm9txuVYJlnAa', 'Ruud', 'van Ruud', '15-12-1965', '0645861235', 'Ruudlaan 9', '7392JG', 'Eindhoven', 'Ik ben aan het zoeken naar een baan!', 'upload/618a60ae5d400-linux-logo.png', 'N', 'https://s3.eu-central-1.amazonaws.com/kliniekervaringen.nl/img/EP/273/69/5C5FF2DF9B5C08.01046949/img1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vacature`
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
-- Dumping data for table `vacature`
--

INSERT INTO `vacature` (`id`, `titel`, `datum`, `niveau`, `omschrijving`, `systeem_id`, `werkgever_id`) VALUES
(40, 'PHP Developer Gezocht', '2021-11-01', 'Junior', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.', 2, 12),
(41, 'Superster in JavaScript', '2021-12-01', 'Medior', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.', 4, 12),
(42, 'Linux Pinguïn?', '2022-10-03', 'Senior', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.', 1, 12),
(43, 'Hele Fijne Baan', '2021-10-27', 'Junior', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.', 5, 27),
(44, 'De Slimste Windows Kenner', '2022-10-20', 'Senior', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.', 3, 12),
(48, 'Leuke Windows baan', '2021-11-04', 'Medior', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fermentum dui faucibus in ornare quam viverra orci. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Vestibulum sed arcu non odio euismod. At risus viverra adipiscing at in tellus integer. Facilisi morbi tempus iaculis urna id volutpat lacus laoreet non. Nisl tincidunt eget nullam non. Id eu nisl nunc mi ipsum faucibus vitae. Adipiscing elit duis tristique sollicitudin nibh sit amet. Ultricies leo integer malesuada nunc. Auctor neque vitae tempus quam pellentesque nec nam aliquam sem. Ac placerat vestibulum lectus mauris ultrices eros in cursus. Dui accumsan sit amet nulla facilisi morbi tempus iaculis. Massa sapien faucibus et molestie ac. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Aliquam purus sit amet luctus venenatis.', 3, 27),
(49, 'Python rollercoaster builder', '2021-11-05', 'Junior', 'Hallo kom hier werken jaaaa vet gezellig!', 5, 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `sollicitatie`
--
ALTER TABLE `sollicitatie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9577817D6FB89BA0` (`vacature_id`),
  ADD KEY `IDX_9577817D876F9FF5` (`werknemer_id`);

--
-- Indexes for table `systeem`
--
ALTER TABLE `systeem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indexes for table `vacature`
--
ALTER TABLE `vacature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9E5830F5C1AB1400` (`systeem_id`),
  ADD KEY `IDX_9E5830F5F1317686` (`werkgever_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sollicitatie`
--
ALTER TABLE `sollicitatie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `systeem`
--
ALTER TABLE `systeem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vacature`
--
ALTER TABLE `vacature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sollicitatie`
--
ALTER TABLE `sollicitatie`
  ADD CONSTRAINT `FK_9577817D6FB89BA0` FOREIGN KEY (`vacature_id`) REFERENCES `vacature` (`id`),
  ADD CONSTRAINT `FK_9577817D876F9FF5` FOREIGN KEY (`werknemer_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `vacature`
--
ALTER TABLE `vacature`
  ADD CONSTRAINT `FK_9E5830F5C1AB1400` FOREIGN KEY (`systeem_id`) REFERENCES `systeem` (`id`),
  ADD CONSTRAINT `FK_9E5830F5F1317686` FOREIGN KEY (`werkgever_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

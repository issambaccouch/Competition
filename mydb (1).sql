-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2019 at 12:49 AM
-- Server version: 5.7.24
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `actualites`
--

DROP TABLE IF EXISTS `actualites`;
CREATE TABLE IF NOT EXISTS `actualites` (
  `id_actualite` int(12) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_partenaire` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `date` datetime DEFAULT NULL,
  `alert` int(11) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_actualite`),
  KEY `fk_actualites_users1_idx` (`id_user`),
  KEY `fk_actualites_partenaires1_idx` (`id_partenaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commt` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `text` text,
  `id_actualite` int(12) DEFAULT NULL,
  `id_cmpt` int(11) DEFAULT NULL,
  `id_event` int(11) DEFAULT NULL,
  `id_offre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_commt`),
  KEY `fk_commentaires_users1_idx` (`id_user`),
  KEY `fk_commentaires_actualites1_idx` (`id_actualite`),
  KEY `fk_commentaires_competitions1_idx` (`id_cmpt`),
  KEY `fk_commentaires_evenements1_idx` (`id_event`),
  KEY `fk_commentaires_offres1_idx` (`id_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

DROP TABLE IF EXISTS `competitions`;
CREATE TABLE IF NOT EXISTS `competitions` (
  `id_cmpt` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_create` datetime NOT NULL,
  `date_start` date NOT NULL,
  `date_fin` date NOT NULL,
  `ville` varchar(45) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `code_post` varchar(12) NOT NULL,
  `nbr_part` int(10) NOT NULL,
  `prize` text NOT NULL,
  `media` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_cmpt`),
  KEY `fk_competitions_admins1_idx` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`id_cmpt`, `id_admin`, `title`, `type`, `description`, `date_create`, `date_start`, `date_fin`, `ville`, `adresse`, `code_post`, `nbr_part`, `prize`, `media`) VALUES
(12, 1, 'OreedooComptetition', 'Scientific', 'nouvelle competition', '2019-02-27 13:35:16', '2019-02-28', '2019-02-28', 'Tunis', 'Tunis', '5145125', 4562485, 'Phone', '1-AlecsoData-201922833253.jpg'),
(14, 1, 'Orange', 'Sport', 'Orange nouvelle competition', '2019-02-27 14:23:02', '2019-02-06', '2019-02-28', 'Tunis', 'Ariana', '4567', 120, 'phone', '1-AlecsoData-2019227181541.jpg'),
(15, 1, 'Competetition Alecso', 'informatique', 'salut!!', '2019-02-27 18:02:55', '2019-02-28', '2019-02-28', 'fdsfdsfdsfd', 'sfdsfds', '1556', 56156, 'Phone', '1-AlecsoData-201922718256.jpg'),
(17, 1, 'Alecsocompétition', 'informatique', 'bienvenue a notre competition', '2019-02-28 04:46:19', '2019-03-13', '2019-04-25', 'Tunis', 'Marsa', '4755', 121, 'Tablette', '1-AlecsoData-201922844619.jpg'),
(20, NULL, 'nada', 'Sport', 'hello', '2016-04-04 03:10:00', '2018-01-03', '2016-04-28', 'kebili', 'souklahad', '426361yh', 145, 'phone', NULL),
(21, NULL, 'zezez', 'zezezez', 'zezezeze', '2019-04-10 21:50:55', '2019-04-04', '2019-12-28', 'ezez', 'souklahad', '54454', 857, 'aeeazeaz', 'aeeaze');

-- --------------------------------------------------------

--
-- Table structure for table `compitiondemande`
--

DROP TABLE IF EXISTS `compitiondemande`;
CREATE TABLE IF NOT EXISTS `compitiondemande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admindecision` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `$idcompt` int(11) NOT NULL,
  `$iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `compitiondemande`
--

INSERT INTO `compitiondemande` (`id`, `admindecision`, `$idcompt`, `$iduser`) VALUES
(1, NULL, 12, 9),
(2, NULL, 15, 9),
(3, NULL, 21, 7),
(4, NULL, 12, 7);

-- --------------------------------------------------------

--
-- Table structure for table `comp_part`
--

DROP TABLE IF EXISTS `comp_part`;
CREATE TABLE IF NOT EXISTS `comp_part` (
  `id_cmpt` int(11) NOT NULL,
  `id_partenaire` int(11) NOT NULL,
  PRIMARY KEY (`id_cmpt`,`id_partenaire`),
  KEY `IDX_B967CCFC977523A4` (`id_partenaire`),
  KEY `IDX_B967CCFCBBAF0F53` (`id_cmpt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

DROP TABLE IF EXISTS `cvs`;
CREATE TABLE IF NOT EXISTS `cvs` (
  `id_cv` int(11) NOT NULL AUTO_INCREMENT,
  `id_offre` int(11) DEFAULT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `pays` varchar(30) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `diplome` varchar(30) NOT NULL,
  `photos` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_cv`),
  UNIQUE KEY `Offres` (`id_offre`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id_cv`, `id_offre`, `nom`, `prenom`, `date_naissance`, `pays`, `code_postal`, `diplome`, `photos`, `description`, `id_user`) VALUES
(11, NULL, 'issam', 'issam', '2019-04-11', 'tunis', 55855, 'azezae', NULL, 'zaezae', 8);

-- --------------------------------------------------------

--
-- Table structure for table `dmoffre`
--

DROP TABLE IF EXISTS `dmoffre`;
CREATE TABLE IF NOT EXISTS `dmoffre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idoffer` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmoffre`
--

INSERT INTO `dmoffre` (`id`, `idoffer`, `iduser`) VALUES
(3, 1, 8),
(5, 2, 8),
(6, 2, 9),
(7, 1, 9),
(8, 1, 9),
(9, 1, 9),
(10, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `description` text,
  `date_create` datetime DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `code_post` varchar(12) DEFAULT NULL,
  `nbr_part` int(10) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  KEY `fk_evenements_admins1_idx` (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_part`
--

DROP TABLE IF EXISTS `event_part`;
CREATE TABLE IF NOT EXISTS `event_part` (
  `id_event` int(11) NOT NULL,
  `id_partenaire` int(11) NOT NULL,
  PRIMARY KEY (`id_event`,`id_partenaire`),
  KEY `IDX_56C43C6D977523A4` (`id_partenaire`),
  KEY `IDX_56C43C6DD52B4B97` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_group`),
  KEY `fk_group_users1_idx` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group_users`
--

DROP TABLE IF EXISTS `group_users`;
CREATE TABLE IF NOT EXISTS `group_users` (
  `id_GUgroup` int(11) NOT NULL,
  `id_GUuser` int(11) NOT NULL,
  PRIMARY KEY (`id_GUgroup`,`id_GUuser`),
  KEY `IDX_44AF8E8ED98C6774` (`id_GUuser`),
  KEY `IDX_44AF8E8E35FC1765` (`id_GUgroup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  PRIMARY KEY (`id_media`),
  KEY `fk_medias_users1_idx` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `envoyeur` int(11) DEFAULT NULL,
  `recepteur` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_envoi` datetime DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_msg`),
  KEY `fk_messages_users_idx` (`envoyeur`),
  KEY `fk_messages_users1_idx` (`recepteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `moderateurs`
--

DROP TABLE IF EXISTS `moderateurs`;
CREATE TABLE IF NOT EXISTS `moderateurs` (
  `id_moderateur` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_moderateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moderateurs`
--

INSERT INTO `moderateurs` (`id_moderateur`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `offres`
--

DROP TABLE IF EXISTS `offres`;
CREATE TABLE IF NOT EXISTS `offres` (
  `id_offre` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) DEFAULT NULL,
  `id_partenaire` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `type` int(1) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `code_post` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_offre`),
  KEY `fk_offres_partenaires1_idx` (`id_partenaire`),
  KEY `fk_offres_admins1_idx` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offres`
--

INSERT INTO `offres` (`id_offre`, `id_admin`, `id_partenaire`, `title`, `description`, `type`, `categorie`, `date_create`, `date_fin`, `ville`, `adresse`, `code_post`) VALUES
(1, NULL, NULL, 'jjk;k', 'k;nnnnnnnnnnnnnnnnnnnnnnnnnnmlkjmmlkmmkkm;ùmùm', 1, 'sdfddf', '2018-08-07 15:10:00', '2020-08-15 16:14:00', 'cfbgggnng', 'fffffffffffffffff', '555555555555'),
(2, NULL, NULL, 'xxxxxxxxxxxx', 'ddddddddddddddddddddddmlkkkkkkkkkkkkkkkkkkkkkkkkkkjjjjjjjjjjjjjjjjjjjjjjjjjjjjpppppppppppppppppppppppppppp', 2, 'sdfddf', '2019-08-07 14:10:00', '2021-07-08 05:10:00', 'hjjhbjhvg', 'hhhhhhhhhhhhhhh', '555555555555');

-- --------------------------------------------------------

--
-- Table structure for table `partenaires`
--

DROP TABLE IF EXISTS `partenaires`;
CREATE TABLE IF NOT EXISTS `partenaires` (
  `id_partenaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nom` varchar(120) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `description` text,
  `ville` varchar(45) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `code_post` varchar(12) DEFAULT NULL,
  `tel1` varchar(18) DEFAULT NULL,
  `tel2` varchar(18) DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_partenaire`),
  KEY `fk_partenaires_moderateurs1_idx` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partenaires`
--

INSERT INTO `partenaires` (`id_partenaire`, `id_user`, `nom`, `type`, `description`, `ville`, `adresse`, `code_post`, `tel1`, `tel2`, `media`) VALUES
(1, 3, 'Orange', 'telecommunication', 'Hello', 'Tunis ', 'Ariana', '4785', '25146397', '21478963', '001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) DEFAULT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `username` varchar(180) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(180) NOT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `codepost` varchar(12) DEFAULT NULL,
  `creat_date` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `media` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `username_canonical` varchar(180) NOT NULL,
  `email_canonical` varchar(180) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `confirmation_token` varchar(180) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)',
  `notecv` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_1483A5E9A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_1483A5E9C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `dob`, `gender`, `bio`, `username`, `password`, `email`, `tel`, `ville`, `adresse`, `codepost`, `creat_date`, `last_login`, `media`, `status`, `username_canonical`, `email_canonical`, `enabled`, `salt`, `confirmation_token`, `password_requested_at`, `roles`, `notecv`) VALUES
(7, 'nada', 'eladel', '1994-04-04', 'femme', 'vvvvvvvv', 'partenaire', '$2y$13$D11vWY0FZCwG./AoHQfcgeswdTrQpc6Yu8FzZsKUbZUXAVzOz26pi', 'partenaire@esprit.tn', '26549874', 'tunis', 'tunis', '2354698', NULL, '2019-04-10 23:47:12', NULL, 0, 'partenaire', 'partenaire@esprit.tn', 1, NULL, NULL, NULL, 'a:1:{i:0;s:15:\"ROLE_PARTENAIRE\";}', NULL),
(8, 'nessrine', 'hajkhlil', '1996-02-18', 'femme', 'hhhhhhhhh', 'admin', '$2y$13$LtV9h4hJdu66WBC0a63zG.iWugp.COWHHClarISrYcm6vI166hTC2', 'admin@esprit.tn', '96542123', 'tunis', 'ariana', '2134568', NULL, '2019-04-10 21:08:38', NULL, 0, 'admin', 'admin@esprit.tn', 1, NULL, NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', NULL),
(9, 'najla', 'omrani', '2019-04-11', 'femme', 'fdhfjgfh,', 'user', '$2y$13$lASgi./H.eW9wUTf.NwD2.sVXYwGhPoFiUvJpbB9uzdgTYs4yzXCK', 'user@esprit.tn', '25648975', 'bbbbbbbbbbb', 'ariana', '2546855', NULL, '2019-04-10 22:43:33', NULL, 0, 'user', 'user@esprit.tn', 1, NULL, NULL, NULL, 'a:0:{}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_cmpt`
--

DROP TABLE IF EXISTS `users_cmpt`;
CREATE TABLE IF NOT EXISTS `users_cmpt` (
  `id_user` int(11) NOT NULL,
  `id_cmpt` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_cmpt`),
  KEY `IDX_FF065D5F6B3CA4B` (`id_user`),
  KEY `IDX_FF065D5FBBAF0F53` (`id_cmpt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_event`
--

DROP TABLE IF EXISTS `users_event`;
CREATE TABLE IF NOT EXISTS `users_event` (
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_event`),
  KEY `IDX_DCD9AEEE6B3CA4B` (`id_user`),
  KEY `IDX_DCD9AEEED52B4B97` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_offres`
--

DROP TABLE IF EXISTS `users_offres`;
CREATE TABLE IF NOT EXISTS `users_offres` (
  `id_user` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_offre`),
  KEY `IDX_C94BBBD46B3CA4B` (`id_user`),
  KEY `IDX_C94BBBD44103C75F` (`id_offre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actualites`
--
ALTER TABLE `actualites`
  ADD CONSTRAINT `fk_actualites_partenaires1` FOREIGN KEY (`id_partenaire`) REFERENCES `partenaires` (`id_partenaire`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_actualites_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `fk_commentaires_actualites1` FOREIGN KEY (`id_actualite`) REFERENCES `actualites` (`id_actualite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaires_competitions1` FOREIGN KEY (`id_cmpt`) REFERENCES `competitions` (`id_cmpt`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaires_evenements1` FOREIGN KEY (`id_event`) REFERENCES `evenements` (`id_event`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaires_offres1` FOREIGN KEY (`id_offre`) REFERENCES `offres` (`id_offre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaires_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_cmpt`
--
ALTER TABLE `users_cmpt`
  ADD CONSTRAINT `FK_FF065D5F6B3CA4B` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `FK_FF065D5FBBAF0F53` FOREIGN KEY (`id_cmpt`) REFERENCES `competitions` (`id_cmpt`);

--
-- Constraints for table `users_event`
--
ALTER TABLE `users_event`
  ADD CONSTRAINT `FK_DCD9AEEE6B3CA4B` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `FK_DCD9AEEED52B4B97` FOREIGN KEY (`id_event`) REFERENCES `evenements` (`id_event`);

--
-- Constraints for table `users_offres`
--
ALTER TABLE `users_offres`
  ADD CONSTRAINT `FK_C94BBBD44103C75F` FOREIGN KEY (`id_offre`) REFERENCES `offres` (`id_offre`),
  ADD CONSTRAINT `FK_C94BBBD46B3CA4B` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

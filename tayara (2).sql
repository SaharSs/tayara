-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 08 sep. 2020 à 14:15
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tayara`
--

-- --------------------------------------------------------

--
-- Structure de la table `appa`
--

DROP TABLE IF EXISTS `appa`;
CREATE TABLE IF NOT EXISTS `appa` (
  `num` int(11) NOT NULL,
  `adresse` longtext DEFAULT NULL,
  `nombre_de_chambres` varchar(20) DEFAULT NULL,
  `a_id` int(11) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `a_id` (`a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `maisons`
--

DROP TABLE IF EXISTS `maisons`;
CREATE TABLE IF NOT EXISTS `maisons` (
  `num` int(11) NOT NULL,
  `adresse` longtext DEFAULT NULL,
  `nombre_de_chambres` varchar(20) DEFAULT NULL,
  `m_id` int(11) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `m_id` (`m_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` longtext DEFAULT NULL,
  `r_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_SENDER_ID` (`sender_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `r_id`, `sender_id`, `date`) VALUES
(1, 'test\r\n', 11, 12, '2020-09-08 11:57:29'),
(2, 'zefefer', 11, 12, '2020-09-08 12:04:31'),
(3, 'bon', 11, 12, '2020-09-08 12:11:53');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `etat` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT 'default.png',
  `adresse` longtext NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `etat`, `image`, `adresse`, `postcode`, `phone_number`, `role`) VALUES
(1, 'test', 'test', 'test', 'sq@gmail.com', 'v', 'default.png', 'gafsa', '2100', 14578, 'webmaster'),
(2, 'sa', 'hg', 'sa', 'kh981@gmail.com', ' v', '6f5e69ce64397db43f7c37214270d6f1.jpg', 'doualy', '2143', 351354, 'admin'),
(5, 'fd', 'fd', 'fd', 'sa93@Gmail.com', ' v', 'ccf310634c9f3ed5c8d5f38333b00b5e.', 'doualy', '2143', 565486486, 'admin'),
(6, 'sx', 'sx', 'sx', 'jkk@bjbk.com', ' v', 'f001e03e4b74876d805d95777a826a98.jpg', 'doualy', '2143', 216464, 'admin'),
(7, 'lk', 'lk', 'lk', 'kh11451@gmail.com', ' v', '26eca63fffee01ea87a34e2a76c18008.jpg', 'doualy', '2143', 56488877, 'admin'),
(8, 'jh', 'jh', 'jh', 'kh1546511@gmail.com', ' v', '377dd76563fa3b6c0374ef8bf444935c.jpg', 'doualy', '2143', 56448664, 'admin'),
(9, 'sc', 'sc', 'sc', 'sq646@wxkls.com', ' v', 'ee93131fafa4ac04d536df63dbe5e381.jpg', 'doualy', '2143', 5346566, 'admin'),
(10, 'nb', 'nb', 'nb', 'sq15444@wxkls.com', ' v', '00f13ccd77669fcc1ace385477cc6d07.jpg', 'doualy', '2143', 545656, 'admin'),
(11, 'vc', 'vc', 'vc', 'kh14511@gmail.com', ' v', '7f87c609ef6431e3638afea2e2e15892.jpg', 'doualy', '2143', 5465664, 'admin'),
(12, 'kl', 'kl', 'kl', 'sq14@wxkls.com', 'v', '3cd589c5c0671e9b572014b671cddbc1.jpg', 'doualy', '2143', 5589898, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures` (
  `matricule` int(11) NOT NULL,
  `couleur` varchar(20) DEFAULT NULL,
  `marque` varchar(20) DEFAULT NULL,
  `nombre_de_portes` varchar(20) DEFAULT NULL,
  `typecar` varchar(20) NOT NULL,
  `v_id` int(11) NOT NULL,
  PRIMARY KEY (`matricule`),
  KEY `v_id` (`v_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

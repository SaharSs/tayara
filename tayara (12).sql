-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 23 oct. 2020 à 10:26
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
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `texte_annonce` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `cas` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_a_id_id` (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `a_id`, `pid`, `titre`, `texte_annonce`, `prix`, `adresse`, `phone_number`, `date`, `cas`) VALUES
(22, 1, 18, 'T-shirt', 'jkbkjkljkljhk', 50, 'doualy', 147896, '2020-10-14 16:51:15', 0),
(23, 1, 2, 'modulation', 'jkbkjkljkljhk', 30, 'doualy', 1478945, '2020-10-14 16:51:35', 1),
(24, 1, 2, 'modu', 'jkbkjkljkljhk', 30, 'doualy', 14785254, '2020-10-15 05:29:46', 1),
(25, 1, 3, 'ty', 'jkbkjkljkljhk', 30, 'doualy', 14789, '2020-10-15 05:30:32', 1),
(26, 2, 2, 'article ', 'jkbkjklj', 15000, 'doualy', 14789, '2020-10-20 17:09:02', 1),
(27, 4, 3, 'modu', 'jkbkjkljkljhk', 30, 'doualy', 147852, '2020-10-21 06:22:14', 1),
(28, 1, 7, 'mod', 'lk', 30000, 'doualy', 14789, '2020-10-23 11:49:32', 1),
(29, 1, 3, 'modeee', 'jkbkjklhjbhh', 15000, 'doualy', 147896, '2020-10-23 11:54:00', 1);

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
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `cat` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `p_id`, `cat`, `date`) VALUES
(2, NULL, 'vetement', '2020-09-30 22:02:29'),
(3, NULL, 'pan', '2020-09-30 22:02:41'),
(4, NULL, 'ml', '2020-09-30 22:02:53'),
(5, NULL, 'electro-menager', '2020-09-30 22:03:04'),
(6, 2, 'sah', '2020-10-01 02:30:50'),
(7, 3, 'mh11', '2020-10-01 02:31:04'),
(13, 4, 'gf', '2020-10-01 04:03:46'),
(15, NULL, 'jhg', '2020-10-01 04:05:56'),
(16, NULL, 'bgvh', '2020-10-01 04:06:26'),
(17, 15, 'fd', '2020-10-01 04:29:33'),
(18, 6, 'def', '2020-10-12 15:03:17');

-- --------------------------------------------------------

--
-- Structure de la table `image_an`
--

DROP TABLE IF EXISTS `image_an`;
CREATE TABLE IF NOT EXISTS `image_an` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `i_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_image_an_i_id` (`i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image_an`
--

INSERT INTO `image_an` (`id`, `image`, `i_id`) VALUES
(51, 'f104dc3cfd1c554322f13f05efb6b826.jpg', 22),
(52, '58ad674a931b88a2307be96f8ae98a29.jpg', 23),
(53, '7f01cc6eef067198b415908d5efdc286.jpg', 23),
(54, '066c5e3ca1bc00c73b53039c7fa9ef01.jpg', 24),
(55, 'e77686cdd76008a179da72c1dc21370e.jpg', 25),
(56, '45179e736319fcf9beefba7e3c509f63.jpg', 26),
(57, 'e6584c52d124efaa178c4534ddcf7fbf.PNG', 23),
(58, '8826b69115dbfae587a9641be98bb4ad.jpg', 27),
(59, '8cadb4c3cdad3647d962941316990391.jpg', 28),
(60, '548d2cfc6e7cb3f343c808f669ab3a9d.jpg', 23),
(61, '394f96920413b9679921d400eac91e1e.jpg', 29);

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
  `an_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_SENDER_ID` (`sender_id`),
  KEY `fk_im_id` (`an_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `r_id`, `sender_id`, `an_id`, `date`) VALUES
(1, 'bonjour', 11, 13, 0, '2020-09-14 11:08:07'),
(2, 'cv', 11, 13, 0, '2020-09-14 11:09:04'),
(12, 'hi', 3, 1, 0, '2020-10-14 21:33:35'),
(5, 'ahla', 13, 11, 0, '2020-09-14 11:14:26'),
(6, 'bien', 12, 11, 0, '2020-09-14 11:15:11'),
(7, 'kiol', 13, 10, 0, '2020-09-14 11:27:07'),
(8, 'hi', 10, 13, 0, '2020-09-14 11:31:23'),
(34, 'bon', 2, 1, 23, '2020-10-21 02:34:57'),
(42, 'bvcxxd', 4, 1, 23, '2020-10-21 10:14:58'),
(41, 'lkk', 4, 1, 23, '2020-10-21 10:14:44'),
(40, 'fghb', 4, 1, 23, '2020-10-21 10:14:25'),
(39, 'nb', 4, 1, 23, '2020-10-21 07:26:38'),
(38, 'cv bien', 4, 1, 27, '2020-10-21 04:25:23'),
(37, 'hi cv', 1, 4, 23, '2020-10-21 04:23:08'),
(36, 'winik', 2, 1, 26, '2020-10-21 03:38:02'),
(35, 'cvvv', 1, 4, 23, '2020-10-21 02:35:58'),
(33, 'cv', 1, 2, 23, '2020-10-21 02:34:12'),
(32, 'hi', 1, 2, 23, '2020-10-21 02:30:57'),
(31, 'bonjour', 4, 1, 23, '2020-10-21 02:30:04'),
(43, 'bonjour', 1, 2, 23, '2020-10-21 13:15:21');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `postcode` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `etat`, `image`, `adresse`, `postcode`, `phone_number`, `role`) VALUES
(1, 'kl', 'kl', 'kl', 'salk@gmail.com', 'v', 'default.png', 'dualy', 2100, 123456, 'user'),
(2, 'ml', 'ml', 'ml', 'sd@gmail.com', 'v', '', 'doualy', 2100, 56486556, 'user'),
(3, 'jh', 'jh', 'jh', 'ds@gmail.com', 'v', '', 'doualy', 2510, 513353, 'webmaster'),
(4, 'nb', 'nb', 'nb', 'sd11@gmail.com', 'v', 'kd.png', 'doualy', 2100, 123456, 'user');

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

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `fk_a_id_id` FOREIGN KEY (`a_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_p_id` FOREIGN KEY (`p_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `image_an`
--
ALTER TABLE `image_an`
  ADD CONSTRAINT `fk_image_an_i_id` FOREIGN KEY (`i_id`) REFERENCES `annonce` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

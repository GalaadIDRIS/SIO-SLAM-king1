-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 02 jan. 2018 à 15:22
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kingpizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `mdp`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `note` int(9) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `commentaire` varchar(140) NOT NULL,
  `jour` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `jour` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `tel`, `jour`) VALUES
(14, 'Jean-Alphonse', '', '2017-12-20 11:45:16'),
(15, 'Jean-Bernard', '', '2017-12-20 11:52:51'),
(16, 'Jean-Kevin', '0655963215', '2017-12-22 10:59:50');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `client` int(9) NOT NULL,
  `pizza` int(9) NOT NULL,
  `format` varchar(25) NOT NULL,
  `prix` float(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `client`, `pizza`, `format`, `prix`) VALUES
(21, 14, 16, 'medium', 7.00),
(22, 14, 17, 'medium', 7.50),
(23, 14, 21, 'medium', 7.50),
(24, 15, 12, 'medium', 7.50),
(25, 15, 19, 'medium', 7.00),
(26, 16, 22, 'medium', 7.50),
(27, 16, 22, 'medium', 7.50),
(28, 16, 22, 'medium', 7.50);

-- --------------------------------------------------------

--
-- Structure de la table `pizzas`
--

DROP TABLE IF EXISTS `pizzas`;
CREATE TABLE IF NOT EXISTS `pizzas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(140) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix_med` float(4,2) NOT NULL,
  `prix_fam` float(4,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `compteur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pizzas`
--

INSERT INTO `pizzas` (`id`, `nom`, `description`, `prix_med`, `prix_fam`, `image`, `compteur`) VALUES
(12, 'TIMONA', 'Crème , mozzarella, jambon de dinde, basilic, olives', 7.50, 9.00, 'pizzaking.jpg', 0),
(13, 'MARGHERITA', 'Tomates, mozza, olives', 4.90, 6.50, 'pizza.jpg', 0),
(14, 'CREME', 'Tomates, mozza, crème, olives.', 6.00, 7.50, 'pizza.jpg', 0),
(15, 'FORESTIERE', 'Tomates, mozza, champignons, olives.', 7.00, 8.50, 'pizza.jpg', 0),
(16, 'REINE', 'Tomates, mozza, jambon de dinde, olives.', 7.00, 8.50, 'pizza.jpg', 0),
(17, 'DIJONAISE', 'Crème , mozzarella, poulet, moutarde, olives.\r\n', 7.50, 9.00, 'pizzaking.jpg', 0),
(18, 'CLAUDIA', 'Tomates, mozza, champignons, oignons, olives.', 7.00, 8.50, 'pizza.jpg', 0),
(19, 'NAPOLITAINE', 'Tomates, mozza, anchois, câpres, olives.', 7.00, 8.50, 'pizza.jpg', 0),
(20, 'SICILIENNE', 'Tomates, mozza, thon, poivrons, olives.', 7.50, 9.00, 'pizza.jpg', 0),
(21, 'GILLIA', 'Tomates, mozza, thon, champignons, oignons, olives.', 7.50, 9.00, 'pizza.jpg', 0),
(22, 'ROYALE', 'Tomates, mozza, jambon de dinde, champignons, olives', 7.50, 9.00, 'pizza.jpg', 3),
(23, 'SAUMON', 'Crème , mozzarella, chair de saumon, olives.\r\n', 7.50, 9.00, 'pizzaking.jpg', 0),
(24, 'BOLOGNAISE', 'Tomates, mozza, viande hacgée, oignons, olives.', 7.50, 9.00, 'pizza.jpg', 0),
(25, 'ORIENTALE', 'Tomates, mozza, merguez, poivrons, olives.', 7.50, 9.00, 'pizza.jpg', 0),
(26, 'ROQUEFORT', 'Tomates, mozza, roquefort, crème, olives.', 7.50, 9.00, 'pizza.jpg', 0),
(27, 'RAVIOLES', 'Crème , mozzarella, ravioles, basilic, olives.\r\n', 8.00, 9.00, 'pizzaking.jpg', 0),
(28, 'ANTONELLA', 'Tomates, mozza, viande hachée, champignons, olives.', 7.50, 9.00, 'pizza.jpg', 0),
(29, 'SPAGNOLA', 'Tomates, mozza, chorizo, oignons, olives.', 7.50, 9.00, 'pizza.jpg', 0),
(30, 'FRUITS DE MER', 'Tomates, mozza, fruits de mer, persillade.', 7.50, 9.00, 'pizza.jpg', 0),
(31, 'EPINARDS', 'Crème , mozzarella, epinards, mozzarella, saumon.\r\n', 8.00, 9.50, 'pizzaking.jpg', 0),
(32, 'NICOLETTA', 'Tomates, mozza, jambon de dinde, chèvre, olives.', 7.50, 9.00, 'pizza.jpg', 0),
(33, 'VEGETARIENNE', 'Tomates, mozza, aubergines, poivrons, oignons, olives.', 7.50, 9.00, 'pizza.jpg', 0),
(34, 'PIETRA', 'Crème , mozzarella, ravioles, épinards, saumon.\r\n', 8.00, 9.50, 'pizzaking.jpg', 0),
(35, 'PROVENCALE', 'Tomates, mozza, tomates fraiches, oignons, anchois, herbes de provence, huile d’olive.', 7.50, 9.00, 'pizza.jpg', 0),
(36, 'SAVOYARDE', 'Crème , pomme de terre, oignons, jambon de dinde , reblochon.\r\n', 8.00, 9.50, 'pizzaking.jpg', 0),
(37, 'HAWAÏ', 'Tomates, mozza, jambon, ananas.', 7.50, 9.00, 'pizza.jpg', 0),
(38, 'AMIRA', 'Tomates, mozza, viande hachée, champignons, persillade, roquefort.', 8.00, 9.50, 'pizza.jpg', 0),
(39, '4 FROMAGES', 'Tomates, mozza, roquefort, gruyère, chèvre, olives.', 8.00, 9.50, 'pizza.jpg', 0),
(40, 'POTEEEET !', 'Crème , poulet, champignons.\r\n', 8.00, 9.50, 'pizzaking.jpg', 0),
(41, 'SOUDJOUK', 'Tomates, mozza, soudjouk, poivrons, oignons.', 8.00, 9.50, 'pizza.jpg', 0),
(42, 'CHICHE TAOUK', 'Tomates, mozza, poulet mariné, oignons, crème, olives.', 8.00, 9.50, 'pizza.jpg', 0),
(43, 'LA PIQUANTE', 'Tomates, piment vert, viande au choix.', 8.00, 9.50, 'pizza.jpg', 0),
(44, 'MEXICAINE', 'Tomates, mozza, poulet, poivrons, olives, maïs.', 8.00, 9.50, 'pizza.jpg', 0),
(45, 'VENCENZA', 'Crème , mozzarella, poulet, chorizo, poivrons, oignons, olives.\r\n', 8.50, 10.00, 'pizzaking.jpg', 0),
(46, 'MILANAISE', 'Tomates, mozza, jambon, champignons, maïs.', 8.00, 9.50, 'pizza.jpg', 0),
(47, 'FANTAZI', 'Tomates, mozza, jambon, coeurs d’artichaud.', 8.00, 9.50, 'pizza.jpg', 0),
(48, 'MARDINA', 'Crème , mozzarella, ravioles, jambon de dinde, basilic, olives.\r\n', 8.50, 10.00, 'pizzaking.jpg', 0),
(49, 'MARINA', 'Crème , mozzarella, ravioles, basilic, saumon, olives.\r\n', 8.50, 10.00, 'pizzaking.jpg', 0),
(50, 'COMME HIER', 'Crème , mozzarella, jambon, chorizo, chèvre, bleu.\r\n', 8.50, 10.00, 'pizzaking.jpg', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

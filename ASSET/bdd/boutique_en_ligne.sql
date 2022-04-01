-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 avr. 2022 à 14:32
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique_en_ligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_categories` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name_categories`) VALUES
(1, 'Fantastique'),
(2, 'Science-fiction');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `achat` text NOT NULL,
  `date` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `moyen_paiement` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `achat`, `date`, `price`, `moyen_paiement`, `id_user`) VALUES
(2, 'Harry', '2022-03-28 09:50:03', 150, 'Carte bancaire', 5),
(3, 'spiderman', '2022-03-28 10:36:41', 200, 'Carte bancaire', 5),
(4, 'spiderman', '2022-03-28 10:38:50', 200, 'Carte bancaire', 5),
(5, 'spiderman', '2022-03-28 10:41:05', 200, 'Carte bancaire', 5),
(6, 'Harry', '2022-03-28 10:41:48', 150, 'Carte bancaire', 5),
(7, 'spiderman', '2022-03-28 10:51:37', 200, 'Carte bancaire', 5),
(8, 'Harry', '2022-03-28 10:52:26', 150, 'Carte bancaire', 5),
(9, 'Harry', '2022-03-28 10:55:37', 150, 'Carte bancaire', 5),
(10, 'spiderman', '2022-03-28 10:56:07', 200, 'Carte bancaire', 5),
(11, 'spiderman', '2022-03-28 11:06:52', 200, 'Carte bancaire', 5),
(12, 'spiderman', '2022-03-28 11:16:13', 200, 'Carte bancaire', 5),
(13, 'spidermanHarry', '2022-03-28 11:25:37', 200, 'Carte bancaire', 5),
(14, 'Harry-', '2022-04-01 10:54:49', 150, 'Carte bancaire', 5),
(15, 'Harry-', '2022-04-01 10:55:14', 150, 'Carte bancaire', 5),
(16, 'Harry-', '2022-04-01 10:56:15', 150, 'Carte bancaire', 5),
(17, 'Harry-', '2022-04-01 10:57:58', 150, 'Carte bancaire', 5),
(18, 'Array', '2022-04-01 15:58:01', 200, 'Carte bancaire', 5),
(19, 'Array', '2022-04-01 15:59:32', 200, 'Carte bancaire', 5),
(20, 'Array', '2022-04-01 16:02:09', 200, 'Carte bancaire', 5),
(21, 'Array', '2022-04-01 16:03:12', 200, 'Paypal', 5),
(22, 'Array', '2022-04-01 16:06:08', 150, 'Paypal', 5),
(23, 'Array', '2022-04-01 16:07:13', 150, 'Paypal', 5),
(24, 'Array', '2022-04-01 16:09:07', 150, 'Carte bancaire', 5),
(25, 'Array', '2022-04-01 16:14:45', 200, 'Moyen de paiement', 5),
(26, 'Array', '2022-04-01 16:16:40', 200, 'Moyen de paiement', 5),
(27, 'Array', '2022-04-01 16:19:04', 200, 'Moyen de paiement', 5),
(28, 'spiderman;Harry', '2022-04-01 16:23:06', 200, 'Moyen de paiement', 5),
(29, 'Array', '2022-04-01 16:24:44', 200, 'Moyen de paiement', 5),
(30, 'Array', '2022-04-01 16:26:18', 150, 'Moyen de paiement', 5),
(31, 'Harry', '2022-04-01 16:27:15', 450, 'Moyen de paiement', 5);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `approuval` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `droits_user`
--

DROP TABLE IF EXISTS `droits_user`;
CREATE TABLE IF NOT EXISTS `droits_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droits_user`
--

INSERT INTO `droits_user` (`id`, `nom`) VALUES
(1, 'Utilisateur'),
(2, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `prices` int(11) NOT NULL,
  `moyen_de_paiement` varchar(255) NOT NULL,
  `date` timestamp NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  `stock` int(11) NOT NULL,
  `promo` int(11) NOT NULL,
  `image` text NOT NULL,
  `mis_avant` int(11) NOT NULL,
  `short_descr` text NOT NULL,
  `long_descr` text NOT NULL,
  `tags` text NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_souscategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `date`, `stock`, `promo`, `image`, `mis_avant`, `short_descr`, `long_descr`, `tags`, `id_categorie`, `id_souscategorie`) VALUES
(1, 'Harry', 150, '2022-02-16 15:25:13', 120, 0, 'hp funko.png', 0, 'Harry', 'Harry For the win', 'harry', 1, 1),
(2, 'spiderman', 50, '2022-02-20 15:26:10', 9, 0, 'spidey-removebg-preview.png', 1, 'erkjgiuz', 'uegziuerhziughiuze', 'hgreiugiu', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reward`
--

DROP TABLE IF EXISTS `reward`;
CREATE TABLE IF NOT EXISTS `reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reward`
--

INSERT INTO `reward` (`id`, `name`) VALUES
(1, 'bronze'),
(2, 'silver'),
(3, 'or');

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

DROP TABLE IF EXISTS `sous_categories`;
CREATE TABLE IF NOT EXISTS `sous_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `name`, `id_categorie`) VALUES
(1, 'harry_potter', 1),
(2, 'Marvel', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `id_reward` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `adresse`, `id_reward`, `id_droit`) VALUES
(2, 'admin', '$2y$10$Txic5EY3EHgBLi5jCNwbGuv3NfFrZM6VgLR5IBhuX4J4Zf.qqknJa', 'admin@admin.com', '5.cours lieutaud13006Marseille', 1, 2),
(5, 'lol', '$2y$10$1UX8DXKt1P.1imewcWe6PeepBCbH4kgvdhtmBWHjvacGoz1cJM4C2', 'lol', '5.lol5lol', 1, 1),
(16, 'koobiak', '$2y$10$N9uRFrwfM.abvvH0S6VdROJADR7kvbys3jHSaZ75ld7XBbydSA/Ha', 'yonathan.darmon@laplateforme.io', '192.avenue du prado13008Marseille', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

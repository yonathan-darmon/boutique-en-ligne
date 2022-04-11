-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 avr. 2022 à 14:31
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name_categories`) VALUES
(1, 'Fantastique'),
(2, 'Science-fiction'),
(3, 'Manga-Anime'),
(4, 'Super-Heroes'),
(5, 'Dessin-Anime');

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
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `mis_avant` int(11) NOT NULL,
  `short_descr` text NOT NULL,
  `long_descr` text NOT NULL,
  `tags` text NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_souscategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `date`, `stock`, `promo`, `image`, `image2`, `image3`, `mis_avant`, `short_descr`, `long_descr`, `tags`, `id_categorie`, `id_souscategorie`) VALUES
(1, 'Harry', 150, '2022-02-16 15:25:13', 120, 0, 'hp1.jpg', 'hp funko.png', 'hp2.jpg', 0, 'Harry', 'Harry For the win', 'Harry Potter', 1, 1),
(2, 'Spiderman', 45, '2022-02-20 15:26:10', 9, 0, 'spider1.jpg', 'spidey-removebg-preview.png', 'spider2.jpg', 1, 'Spiderman 220', 'Spiderman qui lance sa toile.', 'Spiderman Marvel', 4, 2),
(3, 'Hermione Granger', 15, '2022-04-03 22:00:00', 17, 0, 'hg1.jpg', 'hg2.jpg', 'hg3.jpg', 0, 'Hermione Granger', 'Figurine Hermione en civile avec le Remonteur de Temps', 'Harry Potter Hermione', 1, 1),
(4, 'Dobby', 18, '2022-04-03 22:00:00', 50, 0, 'dobby.jpg', 'dobby2.jpg', 'dobby3.jpg', 0, 'Dobby elfe de maison', 'Dobby jetant un sort', 'Harry Potter Dobby Elfe', 1, 1),
(5, 'Voldemort', 19, '2022-04-03 22:00:00', 72, 0, 'vdm1.jpg', 'vdm2.jpg', 'vdm3.jpg', 0, 'Voldemort 5861', 'Lord Voldemort avec sa baguette', 'Harry Potter Voldemort', 1, 1),
(6, 'Voldemort & Nagini', 43, '2022-04-03 22:00:00', 6, 5, 'vdm4.jpg', 'vdm5.jpg', 'vdm6.jpg', 1, 'Voldemort 109', 'Lord Voldemort avec Nagini', 'Harry Potter Voldemort', 1, 1),
(7, 'Severus Rogue', 16, '2022-04-03 22:00:00', 21, 0, 'ss1.jpg', 'ss2.jpg', 'ss3.jpg', 0, 'Severus Rogue 05', 'Severus Rogue dans son habit legendaire', 'Harry Potter Rogue Snape', 1, 1),
(8, 'Dumbledore', 34, '2022-04-03 22:00:00', 33, 0, 'ad1.jpg', 'ad2.jpg', 'ad3.jpg', 0, 'Albus Dumbledore 110', 'Dumbledore dans sa robe avec le Phenix', 'Harry Potter Dumbledore', 1, 1),
(9, 'Ron Weasley', 20, '2022-04-03 22:00:00', 110, 0, 'ron1.jpg', 'ron2.jpg', 'ron3.jpg', 0, 'Ronald Weasley 02', 'Ronald Weasley original avec baguette', 'Harry Potter Ron', 1, 1),
(10, 'Ironman', 15, '2022-05-03 22:00:00', 31, 0, 'iron1.jpg', 'iron2.jpg', 'iron3.jpg', 0, 'Ironman 626', 'Ironman qui atterit', 'Marvel Ironman Avengers', 4, 2),
(11, 'Hulk', 56, '2022-05-03 22:00:00', 20, 0, 'hulk1.jpg', 'hulk2.jpg', 'hulk3.jpg', 0, 'Hulk 585', 'Hulk féroce deluxe Amazon exclu', 'Marvel Hulk Avengers', 4, 2),
(12, 'Venom', 16, '2022-05-03 22:00:00', 30, 0, 'venom1.jpg', 'venom2.jpg', 'venom3.jpg', 0, 'Venom 888', 'Venom basique langue tirée', 'Marvel Venom', 4, 2),
(13, 'Venom', 66, '2022-05-03 22:00:00', 5, 0, 'venom4.jpg', 'venom5.jpg', 'venom6.jpg', 0, 'Venom 363', 'Venom en transformation', 'Marvel Venom', 4, 2),
(14, 'Captain America', 23, '2022-05-03 22:00:00', 100, 0, 'ca1.jpg', 'ca2.jpg', 'ca3.jpg', 0, 'Captain America 573', 'Captain America avec son bouclier et le marteau de Thor', 'Marvel Avengers Captain America', 4, 2),
(15, 'Moonlight', 25, '2022-05-03 22:00:00', 7, 0, 'mn1.jpg', 'mn2.jpg', 'mn3.jpg', 0, 'Moon Knight 266', 'Moon Knight dans son habit blanc', 'Marvel Moon Knight', 4, 2),
(16, 'Deadpool', 14, '2022-05-03 22:00:00', 20, 0, 'dp1.jpg', 'dp2.jpg', 'dp3.jpg', 0, 'Deadpool 327', 'Deadpool chill en peignoir', 'Marvel Deadpool', 4, 2),
(17, 'Deadpool', 14, '2022-05-03 22:00:00', 20, 0, 'dp4.jpg', 'dp5.jpg', 'dp6.jpg', 0, 'Deadpool 320', 'Deadpool allonge', 'Marvel Deadpool', 4, 2),
(18, 'Falcon', 21, '2022-05-03 22:00:00', 70, 0, 'fal1.jpg', 'fal2.jpg', 'fal3.jpg', 0, 'Falcon 812', 'Falcon en vol', 'Marvel Avengers Falcon', 4, 2),
(19, 'Stan Lee', 80, '2022-05-03 22:00:00', 2, 0, 'sl1.jpg', 'sl2.jpg', 'sl3.jpg', 0, 'Stan Lee 726', 'Stan Lee mains dans les poches', 'Marvel Stan Lee', 4, 2),
(20, 'Captain Marvel', 14, '2022-05-03 22:00:00', 120, 0, 'cm1.jpg', 'cm3.jpg', 'cm2.jpg', 0, 'Captain Marvel 446', 'Captain Marvel yeux blancs en vol', 'Marvel Captain Marvel', 4, 2),
(21, 'She-Hulk', 19, '2022-05-03 22:00:00', 160, 0, 'mh1.jpg', 'mh2.jpg', 'mh3.jpg', 0, 'She-Hulk 147', 'She-Hulk en force', 'Marvel She Hulk', 4, 2),
(22, 'Mickey', 19, '2022-05-03 22:00:00', 10, 0, 'mickey1.jpg', 'mickey2.jpg', 'mickey3.jpg', 0, 'Mickey 01', 'Mickey Original', 'Disney Mickey Original', 5, 3),
(23, 'Minnie', 13, '2022-05-03 22:00:00', 22, 0, 'min1.jpg', 'min2.jpg', 'min3.jpg', 0, 'Minnie 23', 'Minnie Original', 'Disney Minnie Original', 5, 3),
(24, 'Sulley', 24, '2022-05-03 22:00:00', 131, 0, 'sul1.jpg', 'sul2.jpg', 'sul3.jpg', 0, 'Sulley 385', 'Sulley vous salue', 'Disney Pixar Monstre Cie Sulley', 5, 3),
(25, 'Elsa', 13, '2022-05-03 22:00:00', 190, 0, 'fro1.jpg', 'fro2.jpg', 'fro3.jpg', 0, 'Elsa 731', 'Elsa Frozen dans sa robe de soiree', 'Disney Frozen Elsa Reine Neige', 5, 3),
(26, 'Stitch', 40, '2022-05-03 22:00:00', 15, 0, 'sti1.jpg', 'sti2.jpg', 'sti3.jpg', 0, 'Stitch 102', 'Stitch qui dort dans une attraction', 'Disney Lilo Stitch', 5, 3),
(27, 'Batman', 16, '2022-05-03 22:00:00', 8, 0, 'bat1.jpg', 'bat2.jpg', 'bat3.jpg', 0, 'Batman 275', 'Batman avec son Batarang', 'DC Comics Batman', 4, 4),
(28, 'Superman', 55, '2022-05-03 22:00:00', 12, 0, 'sm1.jpg', 'sm2.jpg', 'sm3.jpg', 0, 'Superman 159', 'Superman classique poings sur les hanches', 'DC Comics Superman', 4, 4),
(29, 'The Flash', 15, '2022-05-03 22:00:00', 18, 0, 'fla1.jpg', 'fla2.jpg', 'fla3.jpg', 0, 'The Flash 713', 'Flash qui court', 'DC Comics Flash', 4, 4),
(30, 'The Arrow', 15, '2022-05-03 22:00:00', 43, 0, 'ar1.jpg', 'ar2.jpg', 'ar3.jpg', 0, 'The Arrow 207', 'The Arrow avec son masque', 'DC Comics Arrow', 4, 4),
(31, 'SuperGirl', 19, '2022-05-03 22:00:00', 50, 0, 'sg1.jpg', 'sg2.jpg', 'sg3.jpg', 0, 'SuperGirl 708', 'SuperGirl qui prend son envol', 'DC Comics Supergirl Justice League', 4, 4),
(32, 'Wonder Woman 1984', 180, '2022-05-03 22:00:00', 1, 0, 'ww1.jpg', 'ww2.jpg', 'ww3.jpg', 0, 'Wonder Woman 323', 'Wonder Woman de 1984 avec son armure doree', 'DC Comics Wonder Woman', 4, 4),
(33, 'The Joker', 35, '2022-05-03 22:00:00', 3, 0, 'jok1.jpg', 'jok2.jpg', 'jok3.jpg', 0, 'The Joker 334', 'The Joker Heath Ledger avec sa carte', 'DC Comics Batman Joker', 4, 4),
(34, 'Harley Quinn', 23, '2022-05-03 22:00:00', 7, 0, 'hq1.jpg', 'hq2.jpg', 'hq3.jpg', 0, 'Harley Quinn 97', 'Harley Quinn de Suicide Squad avec sa batte', 'DC Comics Suicide Squad Harley Quinn', 4, 4),
(35, 'Dark Vador', 25, '2022-05-03 22:00:00', 0, 0, 'dv1.jpg', 'dv2.jpg', 'dv3.jpg', 0, 'Dark Vador 343', 'Dark Vador sonore avec son sabre laser lumineux', 'Star Wars Dark Vador', 2, 5),
(36, 'Kylo Ren', 14, '2022-05-03 22:00:00', 70, 0, 'kr1.jpg', 'kr2.jpg', 'kr3.jpg', 0, 'Kylo Ren 308', 'Kylo Ren Suprem Leader sonore avec son sabre laser lumineux', 'Star Wars Kylo Ren', 2, 5),
(37, 'Chewbacca', 16, '2022-05-03 22:00:00', 33, 0, 'ch1.jpg', 'ch2.jpg', 'ch3.jpg', 0, 'Chewbacca 195', 'Chewbacca avec son fidel compagnon', 'Star Wars Chewbacca', 2, 5),
(38, 'Dagobah Yoda', 16, '2022-05-03 22:00:00', 12, 0, 'yo1.jpg', 'yo2.jpg', 'yo3.jpg', 0, 'Yoda 124', 'Dagobah Yoda qui tape la pose', 'Star Wars Yoda Dagobah', 2, 5),
(39, 'Baby Yoda', 15, '2022-05-03 22:00:00', 99, 0, 'by1.jpg', 'by2.jpg', 'by3.jpg', 0, 'Baby Yoda 379', 'Baby Yoda qui mange une grenouille', 'Star Wars Baby Yoda', 2, 5),
(40, 'Princesse Leia', 5, '2022-05-03 22:00:00', 199, 0, 'le1.jpg', 'le2.jpg', 'le3.jpg', 0, 'Princesse Leia 04', 'Princesse Leia Original', 'Star Wars Princesse Leia', 2, 5),
(41, 'Luke Skywalker', 25, '2022-05-03 22:00:00', 9, 0, 'ls1.jpg', 'ls2.jpg', 'ls3.jpg', 0, 'Luke Skywalker 126', 'Luke Skywalkeravec son sabre laser vert', 'Star WarsLuke Skywalker', 2, 5),
(42, 'Han Solo', 35, '2022-05-03 22:00:00', 41, 0, 'hs1.jpg', 'hs2.jpg', 'hs3.jpg', 0, 'Han Solo 286', 'Han Solo en position de tir', 'Star Wars Han Solo', 2, 5),
(43, 'Son Goku', 25, '2022-05-03 22:00:00', 29, 0, 'goku1.jpg', 'goku2.jpg', 'goku3.jpg', 0, 'Son Goku 615', 'Goku en position de combat', 'Dragon Ball Goku DB', 3, 6),
(44, 'Son Goku', 75, '2022-05-03 22:00:00', 9, 0, 'goku4.jpg', 'goku5.jpg', 'goku6.jpg', 0, 'Son Goku 517', 'Goku sur son nuage', 'Dragon Ball Goku DB', 3, 6),
(45, 'Son Gohan', 5, '2022-05-03 22:00:00', 199, 0, 'goha1.jpg', 'goha2.jpg', 'goha3.jpg', 0, 'Son Gohan 106', 'Gohan avec sa queue et sa tenue de combat', 'Dragon Ball Gohan DB', 3, 6),
(46, 'Son Goten', 5, '2022-05-03 22:00:00', 9, 0, 'got1.jpg', 'got2.jpg', 'got3.jpg', 0, 'Son Goten 618', 'Goten dans sa tenue de combat', 'Dragon Ball Goten DB', 3, 6),
(47, 'Tortue Geniale', 18, '2022-05-03 22:00:00', 49, 0, 'tg1.jpg', 'tg2.jpg', 'tg3.jpg', 0, 'Tortue Geniale 382', 'Tortue Geniale et sa canne', 'Dragon Ball Master Roshi Tortue Geniale DB', 3, 6),
(48, 'Piccolo', 14, '2022-05-03 22:00:00', 10, 0, 'pic1.jpg', 'pic2.jpg', 'pic3.jpg', 0, 'Piccolo 11', 'Piccolo dans sa tenue et son turban', 'Dragon Ball Piccolo DB', 3, 6),
(49, 'Majin Buu', 45, '2022-05-03 22:00:00', 5, 0, 'mb1.jpg', 'mb2.jpg', 'mb3.jpg', 0, 'Majin Buu 111', 'Majin Buu chocolat', 'Dragon Ball Majin Buu DB', 3, 6),
(50, 'Cell', 19, '2022-05-03 22:00:00', 12, 0, 'cell1.jpg', 'cell2.jpg', 'cell3.jpg', 0, 'Cell 947', 'Cell dans sa première forme', 'Dragon Ball Cell DB', 3, 6),
(51, 'Freezer', 15, '2022-05-03 22:00:00', 37, 0, 'fr1.jpg', 'fr2.jpg', 'fr3.jpg', 0, 'Freezer 861', 'Freezer dans sa transformation finale', 'Dragon Ball Freezer Frieza DB', 3, 6),
(52, 'Trunks', 15, '2022-05-03 22:00:00', 33, 0, 'tr1.jpg', 'tr2.jpg', 'tr3.jpg', 0, 'Trunks 107', 'Trunks original avec son epee', 'Dragon Ball Trunks DB', 3, 6),
(53, 'Shenron', 130, '2022-05-03 22:00:00', 1, 0, 'sh1.jpg', 'sh2.jpg', 'sh3.jpg', 0, 'Shenron 859', 'Shenron qui se deploie', 'Dragon Ball Shenron DB', 3, 6),
(54, 'Krillin', 15, '2022-05-03 22:00:00', 121, 0, 'kri1.jpg', 'kri2.jpg', 'kri3.jpg', 0, 'Krillin 706', 'Krillin avec le Destructo Disc', 'Dragon Ball Krillin DB', 3, 6),
(55, 'Vegeta', 46, '2022-05-03 22:00:00', 2, 0, 've1.jpg', 've2.jpg', 've3.jpg', 0, 'Vegeta 713', 'Vegeta en transformation fluorescent', 'Dragon Ball Vegeta DB', 3, 6),
(56, 'Luffy', 35, '2022-05-03 22:00:00', 11, 0, 'lu1.jpg', 'lu2.jpg', 'lu3.jpg', 0, 'Monkey D Luffy 98', 'Luffy Classique', 'One Piece Luffy', 3, 7),
(57, 'Shanks', 38, '2022-05-03 22:00:00', 23, 0, 'sha1.jpg', 'sha2.jpg', 'sha3.jpg', 0, 'Shanks 938', 'Shanks Classique', 'One Piece Shanks', 3, 7),
(58, 'Usopp', 15, '2022-05-03 22:00:00', 67, 0, 'us1.jpg', 'us2.jpg', 'us3.jpg', 0, 'Usopp 401', 'Usopp et son lance pierre', 'One Piece Usopp', 3, 7),
(59, 'Brook', 19, '2022-05-03 22:00:00', 44, 0, 'br1.jpg', 'br2.jpg', 'br3.jpg', 0, 'Brook 358', 'Brook et sa guitare', 'One Piece Brook', 3, 7),
(60, 'Nami', 13, '2022-05-03 22:00:00', 32, 0, 'na1.jpg', 'na2.jpg', 'na3.jpg', 0, 'Nami 328', 'Nami Classique', 'One Piece Nami', 3, 7),
(61, 'Nico Robin', 98, '2022-05-03 22:00:00', 3, 0, 'nr1.jpg', 'nr2.jpg', 'nr3.jpg', 0, 'Nico Robin 399', 'Nico Robin Classique', 'One Piece Nico Robin', 3, 7);

-- --------------------------------------------------------

--
-- Structure de la table `reward`
--

DROP TABLE IF EXISTS `reward`;
CREATE TABLE IF NOT EXISTS `reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reward`
--

INSERT INTO `reward` (`id`, `name`) VALUES
(1, 'Pas encore chevalier'),
(2, 'Chevalier de bronze'),
(3, 'Chevalier d\'argent'),
(4, 'Chevalier d\'or');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `name`, `id_categorie`) VALUES
(1, 'harry_potter', 1),
(2, 'Marvel', 4),
(3, 'Disney', 5),
(4, 'dc', 4),
(5, 'StarWars', 2),
(6, 'Dragon-Ball', 3),
(7, 'One-Piece', 3);

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

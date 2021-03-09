-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 mars 2021 à 11:34
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `idArticle` int NOT NULL AUTO_INCREMENT,
  `idUser` int NOT NULL,
  `dateArticle` date NOT NULL,
  `idCategorie` int NOT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `article_ibfk_1` (`idCategorie`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`title`, `content`, `image`, `idArticle`, `idUser`, `dateArticle`, `idCategorie`) VALUES
('dragon ball super', 'L\'histoire de Dragon Ball Super est une suite directe du manga d\'Akira Toriyama et de la série Dragon Ball Z. Elle se situe après la fin de l\'arc Boo et avant le début du 28e Championnat du Monde d\'arts martiaux. Elle ne reprend donc pas le scénario de la série Dragon Ball GT.', 'img/uploads/9a87bbc819ab29c753c0156baaa83ac3.jpg', 2, 1, '2021-02-23', 2),
('dbz', '\r\nDragon Ball Z se déroule cinq ans après le mariage de Son Goku et de Chichi, désormais parents de Son Gohan2. Raditz, un mystérieux guerrier extraterrestre, qui s\'avère être le frère de Son Goku, arrive sur Terre pour retrouver ce dernier. Ce dernier apprend qu\'il vient d\'une planète de guer', 'img/uploads/b10152a5aa91c5df4b3fdd4471f81f14.jpg', 23, 1, '2021-02-22', 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` date NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `name`, `description`) VALUES
(1, 'sf', '2021-02-17'),
(2, 'animation', '2021-02-17'),
(3, 'robot', '2021-02-17'),
(4, 'skynet', '2021-02-17'),
(5, 'dev', '2021-02-17');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `idArticle` int NOT NULL,
  `message` text NOT NULL,
  `dateComment` date NOT NULL,
  PRIMARY KEY (`idComment`),
  KEY `comment_ibfk_1` (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`idComment`, `pseudo`, `idArticle`, `message`, `dateComment`) VALUES
(1, 'flouse', 2, 'ezkeklzk', '2021-02-22'),
(8, 'toto', 2, 'hello\r\n', '2021-02-22'),
(9, 'toto', 2, 'hello\r\n', '2021-02-22'),
(10, 'MAg', 2, 'sazlkalzjadlzka sldks', '2021-02-22'),
(11, 'MAg', 2, 'sazlkalzjadlzka sldks', '2021-02-22'),
(12, 'MAg', 2, 'sazlkalzjadlzka sldks', '2021-02-22'),
(14, 'flouse', 2, 'bonjour', '2021-02-22'),
(15, 'roro', 2, 'super article', '2021-02-22'),
(16, 'hien', 2, 'sjdifjosis', '2021-02-22'),
(17, 'roody', 2, 'surper aticlr', '2021-02-22'),
(18, 'MAg', 2, 'zaz', '2021-02-22');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `password`, `lastname`, `firstname`, `role`) VALUES
(1, 'admin', '$2y$10$iYFJ0cMUobViZ6PNlI89.unEgVWS2QOIFDxkXdTPdqSZzAvA.D7GW', 'admin', 'admin', '0');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

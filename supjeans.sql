-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 29 avr. 2019 à 05:58
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `supjeans`
--

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `products` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `orderDate` datetime NOT NULL,
  `billingAddress` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `billingPc` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `billingCity` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `billingRegion` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `billingCountry` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `deliveryAddress` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `deliveryPc` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `deliveryCity` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `deliveryRegion` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `deliveryCountry` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billingAddress` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billingPc` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billingCity` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billingRegion` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billingCountry` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryAddress` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryPc` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryCity` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryRegion` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliveryCountry` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `username`, `password`, `role`, `billingAddress`, `billingPc`, `billingCity`, `billingRegion`, `billingCountry`, `deliveryAddress`, `deliveryPc`, `deliveryCity`, `deliveryRegion`, `deliveryCountry`) VALUES
(1, 'Admin', 'Root', 'admin.root@gmail.com', 'AdminRoot', '$2y$10$a2YTbh2oXkEIuKU2E3in/env2A5WCorMAP7Fd0TOqoa4ataLOBIAy', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

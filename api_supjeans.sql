-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 29 avr. 2019 à 05:57
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
-- Base de données :  `api_supjeans`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `category`, `title`, `size`, `price`) VALUES
(1, 'jeans', 'skinny-high-rise', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '69.90'),
(2, 'jeans', 'skinny-high-waisted-ripped', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '64.90'),
(3, 'jeans', 'levis-skinny-mid-rise', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '69.90'),
(4, 'jeans', 'skinny-high-rise-grey', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '59.90'),
(5, 'jeans', 'straight-high-waisted', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '59.90'),
(6, 'jeans', 'levis-baggy-mid-rise', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '79.90'),
(7, 'jeans', 'mom-high-rise-light-pink', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '64.90'),
(8, 'jeans', 'mom-high-rise-white', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '64.90'),
(9, 'jeans', 'petite-high-rise-baby-pink', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '59.90'),
(10, 'jeans', 'mom-high-waisted-tropical-green', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '64.90'),
(11, 'jeans', 'levis-skinny-high-waisted', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '79.90'),
(12, 'jeans', 'hollister-skinny-high-waisted-ripped', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '79.90'),
(13, 'jeans', 'levis-mom-special', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '74.90'),
(14, 'jeans', 'mom-light-blue', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '64.90'),
(15, 'jeans', 'levis-501-classic', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '89.90'),
(16, 'jeans', 'skinny-high-waisted-black', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '74.90'),
(17, 'jeans', 'levis-skinny-high-waisted-grey', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '89.90'),
(18, 'jeans', 'slim-floral-black', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '69.90'),
(19, 'jeans', 'levis-510-dark-grey', 'a:5:{i:0;s:2:\"XS\";i:1;s:1:\"S\";i:2;s:1:\"M\";i:3;s:1:\"L\";i:4;s:2:\"XL\";}', '89.90');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

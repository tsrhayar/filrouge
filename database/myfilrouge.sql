-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 31 août 2020 à 23:54
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myfilrouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`) VALUES
(4, 2, 9),
(17, 3, 11),
(18, 3, 13),
(19, 3, 5),
(25, 1, 13);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `commande_id` int(11) NOT NULL,
  `commande_user_id` int(11) NOT NULL,
  `commande_item_id` int(11) NOT NULL,
  `commande_status` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'ordered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`commande_id`, `commande_user_id`, `commande_item_id`, `commande_status`) VALUES
(1, 1, 3, 'ordered'),
(7, 1, 10, 'ordered'),
(8, 1, 3, 'ordered'),
(9, 1, 5, 'ordered'),
(10, 2, 13, 'ordered');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Samsung', 'Samsung Galaxy 10', 1499.00, './assets/products/1.png', '2020-06-28 11:08:57'),
(2, 'Redmi', 'Redmi Note 7', 1999.00, './assets/products/2.png', '2020-06-28 11:08:57'),
(3, 'Redmi', 'Redmi Note 6', 1799.00, './assets/products/3.png', '2020-06-28 11:08:57'),
(4, 'Redmi', 'Redmi Note 5', 1499.00, './assets/products/4.png', '2020-06-28 11:08:57'),
(5, 'Redmi', 'Redmi Note 4', 1249.00, './assets/products/5.png', '2020-06-28 11:08:57'),
(6, 'Redmi', 'Redmi Note 8', 2199.00, './assets/products/6.png', '2020-06-28 11:08:57'),
(7, 'Redmi', 'Redmi Note 9', 2899.00, './assets/products/8.png', '2020-06-28 11:08:57'),
(8, 'Redmi', 'Redmi Note', 1099.00, './assets/products/10.png', '2020-06-28 11:08:57'),
(9, 'Samsung', 'Samsung Galaxy S6', 1999.00, './assets/products/11.png', '2020-06-28 11:08:57'),
(10, 'Samsung', 'Samsung Galaxy S7', 2349.00, './assets/products/12.png', '2020-06-28 11:08:57'),
(11, 'Apple', 'Apple iPhone 5', 999.00, './assets/products/13.png', '2020-06-28 11:08:57'),
(12, 'Apple', 'Apple iPhone 6', 1499.00, './assets/products/14.png', '2020-06-28 11:08:57'),
(13, 'Apple', 'Apple iPhone 7', 1649.00, './assets/products/15.png', '2020-06-28 11:08:57');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_password` int(11) NOT NULL,
  `user_adresse` varchar(255) CHARACTER SET utf16 NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_email`, `user_password`, `user_adresse`, `user_role`) VALUES
(1, 'taha', 'taha@gmail.com', 123456, 'n10, rue12, saada, safi', 'admin'),
(2, 'youness', 'youness@gmail.com', 123456, 'n8, rue33, mhammid, marrakech', 'user'),
(3, 'adam', 'adam@gmail.com', 123456, 'n45, bloc7, hay mohammadi, casablanca', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`commande_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `commande_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

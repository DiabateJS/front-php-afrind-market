-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 09, 2023 at 07:01 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `afrind_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `am_articles` (
  `id` int(11) NOT NULL,
  `libelle` varchar(250) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `img_link` varchar(250) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `am_articles` (`id`, `libelle`, `qte`, `prix`, `img_link`, `commentaire`) VALUES
(1, 'Robe courte', 15, 15000, 'images/1.jpeg', ''),
(2, 'Robe longue', 30, 20000, 'images/2.jpeg', 'com_1'),
(9, 'Robe longue 1', 50, 20000, 'images/3.jpeg', 'com_3'),
(10, 'Robe longue 2', 50, 20000, 'images/4.jpeg', 'com_3'),
(11, 'Robe A', 35000, 35, '', 'com_6'),
(12, 'Robe B', 25000, 10, '', 'com_7'),
(14, 'Robe C', 12000, 35, 'images/balle-tennis.jpeg', 'com');

-- --------------------------------------------------------

CREATE TABLE `am_profil` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil`
--

INSERT INTO `am_profil` (`id`, `libelle`) VALUES
(1, 'user'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profil`
--
ALTER TABLE `am_profil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `am_profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


--
-- Table structure for table `user`
--

CREATE TABLE `am_user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `idprofil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `am_user` (`id`, `login`, `pwd`, `email`, `adresse`, `idprofil`) VALUES
(1, 'jean', 'js', 'DIABATE','JEAN SEKOU','jeansekoudiabate@gmail.com', '23 Rue des Champs', 1),
(2, 'awafrind', 'azerty','FRINDE','AWA', 'afrindmarket@gmail.com', '23 Rue de la victoire', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `am_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `am_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `am_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `am_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


CREATE TABLE `am_commande` (
  `id` int NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `datecmd` varchar(20) NOT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `am_ligne_commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idarticle` int NOT NULL,
  `iduser` int NOT NULL,
  `qte` int NOT NULL,
  `idcmd` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


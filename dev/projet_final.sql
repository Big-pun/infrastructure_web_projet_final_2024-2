-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 28 août 2024 à 00:19
-- Version du serveur : 8.0.31
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_final`
--

-- --------------------------------------------------------

--
-- Structure de la table `campings`
--

CREATE TABLE `campings` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ville` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `code_postal` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `region` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nb_terrains` int NOT NULL,
  `popularite` int NOT NULL,
  `nb_etoiles` int NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `accepte_animaux` tinyint(1) NOT NULL,
  `date_inscription` date NOT NULL,
  `experience_id` int NOT NULL,
  `id_picsum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `campings`
--

INSERT INTO `campings` (`id`, `nom`, `adresse`, `ville`, `code_postal`, `region`, `description`, `nb_terrains`, `popularite`, `nb_etoiles`, `actif`, `accepte_animaux`, `date_inscription`, `experience_id`, `id_picsum`) VALUES
(1, 'Camping Havre de paix', '345 rue du bush', 'Petaouchnok', 'J5G2X0', 'Centre-du-Québec', 'Magnifique camping.... C\'est le camping le plus populaire, il devrait s\'afficher en premier sur la page d\'accueil. Il doit aussi apparaître dans la liste complète des campings, sur la liste des campings 3* et plus dans la liste des campings associés à l\'expérience Tranquilité', 25, 9999999, 5, 1, 1, '2023-06-01', 1, 28),
(2, 'Camping INACTIF', '785 rang 8', 'Saint-joli', 'H6T2S9', 'Centre du Québec', 'Magnifique camping. Puisqu\'il est inactif, il ne doit s\'afficher à aucun endroit sur le site. ', 0, 9999999, 3, 0, 1, '2023-06-02', 1, 34),
(3, 'Camping Sportif', '545 autoroute 137', 'Paspebiac', 'G1A8L5', 'Mauricie', 'Magnifique camping.... C\'est le camping le 2e plus populaire, il devrait s\'afficher en deuxième sur la page d\'accueil. Il doit aussi apparaître dans la liste complète des campings, sur la liste des campings 3* et plus dans la liste des campings associés à l\'expérience Activités sportives', 141, 9999998, 3, 1, 1, '2023-06-03', 2, 177),
(4, 'Camping Hivernal', '151 8eme avenue', 'Sainte-caline', 'B4Z8Y6', 'Montérégie', 'Magnifique camping.... C\'est le camping le 4e plus populaire, il devrait s\'afficher en quatrième sur la page d\'accueil. Il doit aussi apparaître dans la liste complète des campings et dans la liste des campings associés à l\'expérience Hivernale. Il n\'apparaît pas dans la liste des campings 3* et plus. ', 10, 9999996, 2, 1, 1, '2023-06-04', 3, 260),
(5, 'Camping Le paradis perdu', '45 avenue de la route', 'Westfield', 'G2T9F3', 'Saguenay-Lac-Saint-Jean', 'Magnifique camping.... C\'est le camping le 3e plus populaire, il devrait s\'afficher en troisième sur la page d\'accueil. Il doit aussi apparaître dans la liste complète des campings et dans la liste des campings associés à l\'expérience Camping en tente. Il n\'apparaît pas dans la liste des campings 3* et plus. ', 12, 9999997, 2, 1, 1, '2023-06-05', 4, 14),
(6, 'Camping PAS ANIMAUX', '8 rue de la porte', 'Rimouski', 'K2W3P6', 'Centre du Québec', 'Magnifique camping 5 étoiles.. qui n\'accepte pas les animaux!', 99, 165, 5, 1, 0, '2023-06-06', 1, 28),
(7, 'Camping INACTIF et PAS ANIMAUX', '985 rang 7', 'Tadoussac', 'B3S5G7', 'Centre-du-Québec', 'Magnifique camping qui n\'accepte pas les animaux. Puisqu\'il est inactif, il ne doit s\'afficher à aucun endroit sur le site. ', 0, 236, 3, 0, 0, '2023-06-07', 1, 34),
(8, 'Camping Rustique', '', '', '', 'Centre-du-Québec', 'Magnifique camping associé à l\'expérience Camping en tente', 10, 248, 1, 1, 1, '2023-07-02', 4, 11),
(9, 'Camping Sérénité', '6321 rue de la ville', 'Paspebiac', 'G1A8L9', 'Mauricie', 'Magnifique camping associé à l\'expérience Tranquilité', 32, 242, 4, 1, 1, '2023-06-09', 1, 65),
(10, 'Camping Le tout prêt', '875 rue du sacre', 'Tarbelute', 'B35T1F', 'Montérégie', 'Magnifique camping associé à l\'expérience Prêt à camping', 24, 187, 5, 1, 1, '2023-06-10', 5, 103),
(11, 'Camping #11', '', '', '', 'Région X', 'Ceci est la description du camping #11. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 57, 7004, 2, 1, 1, '2024-07-10', 5, 324),
(12, 'Camping #12', '', '', '', 'Région X', 'Ceci est la description du camping #12. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 269, 2637, 3, 1, 1, '2024-07-10', 3, 324),
(13, 'Camping #13', '', '', '', 'Région X', 'Ceci est la description du camping #13. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 177, 6017, 1, 1, 0, '2024-07-10', 4, 324),
(14, 'Camping #14', '', '', '', 'Région X', 'Ceci est la description du camping #14. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 273, 3515, 3, 1, 0, '2024-07-10', 3, 324),
(15, 'Camping #15', '', '', '', 'Région X', 'Ceci est la description du camping #15. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 292, 5227, 2, 1, 0, '2024-07-10', 5, 324),
(16, 'Camping #22', '', '', '', 'Région X', 'Ceci est la description du camping #16. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 59, 9554, 4, 1, 1, '2024-07-10', 5, 324),
(17, 'Camping #23', '', '', '', 'Région X', 'Ceci est la description du camping #17. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 179, 7382, 5, 1, 1, '2024-07-10', 5, 324),
(18, 'Camping #24', '', '', '', 'Région X', 'Ceci est la description du camping #18. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 224, 8167, 1, 1, 0, '2024-07-10', 1, 324),
(19, 'Camping #25', '', '', '', 'Région X', 'Ceci est la description du camping #19. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 33, 6432, 3, 1, 0, '2024-07-10', 3, 324),
(20, 'Camping #26', '', '', '', 'Région X', 'Ceci est la description du camping #20. Ses informations sont générées aléatoirement et diffèrent d\'une personne à l\'autre.', 141, 9304, 5, 1, 0, '2024-07-10', 4, 324);

-- --------------------------------------------------------

--
-- Structure de la table `experiences`
--

CREATE TABLE `experiences` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `experiences`
--

INSERT INTO `experiences` (`id`, `nom`, `description`) VALUES
(1, 'Tranquilité', 'À la recherche d\'un camping où se poser en toute tranquillité? Ces campings sont parfaits pour prendre des vacances et décrocher complètement. Nature et contemplation sont au programme!'),
(2, 'Activités sportives', 'Camping et sport : un duo gagnant pour des vacances actives !\r\nAlliez plaisir sportif et détente en nature en campant ! Randonnée, vélo, canoë ou escalade, les campings regorgent d\'activités.'),
(3, 'Hivernal', 'Le camping d\'hiver est une activité de plus en plus populaire qui offre une expérience unique et inoubliable. C\'est l\'occasion de profiter de la beauté des paysages enneigés,'),
(4, 'Camping en tente', '\r\nLe camping en tente est un excellent moyen de profiter du plein air et de se rapprocher de la nature. Il est relativement peu coûteux et facile à mettre en place, ce qui en fait une excellente option pour les budgets.'),
(5, 'Prêts à camper', 'Le prêt-à-camper, est une option d\'hébergement qui offre tous les conforts de la maison dans un environnement de camping, ce qui en fait un excellent choix pour les personnes qui souhaitent profiter du plein air sans avoir à traîner tout leur équipement.');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int NOT NULL,
  `nom` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `quantite` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fk_recette` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `nom`, `quantite`, `fk_recette`) VALUES
(1, 'Chocolat', '1 tablette', 1),
(2, 'Marshmallows', '1 paquet', 1),
(3, 'Biscuits', '10', 1),
(4, 'Saucisses', '8', 2),
(5, 'Pains', '8', 2),
(6, 'Viande hachée', '500g', 3),
(7, 'Haricots rouges', '1 boîte', 3),
(8, 'Poivrons', '2', 5),
(9, 'Poulet', '500g', 5),
(10, 'Farine', '200g', 4),
(11, 'Oeufs', '2', 4),
(12, 'Sucre', '50g', 4),
(13, 'Lait', '250ml', 4);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` int NOT NULL,
  `nom` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `temps_preparation` int NOT NULL,
  `niveau_difficulte` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `nom`, `description`, `temps_preparation`, `niveau_difficulte`) VALUES
(1, 'S\'mores', 'Classique dessert de camping', 15, 'Facile'),
(2, 'Hot Dogs', 'Simple et rapide', 15, 'Facile'),
(3, 'Chili', 'Parfait pour les soirées plus fraiches', 55, 'Moyen'),
(4, 'Pancakes', 'Pour des petits dejeuner copieux', 25, 'Facile'),
(5, 'Brochettes', 'Viande et légumes grillés', 30, 'Moyen');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `campings`
--
ALTER TABLE `campings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campings_experiences` (`experience_id`);

--
-- Index pour la table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recette` (`fk_recette`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `campings`
--
ALTER TABLE `campings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `campings`
--
ALTER TABLE `campings`
  ADD CONSTRAINT `campings_experiences` FOREIGN KEY (`experience_id`) REFERENCES `experiences` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_ibfk_1` FOREIGN KEY (`fk_recette`) REFERENCES `recettes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

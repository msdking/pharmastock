CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int DEFAULT NULL,
  `descrpt` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table pharmastock. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `tel` int DEFAULT NULL,
  `grade` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table pharmastock. gestionnare
CREATE TABLE IF NOT EXISTS `gestionnaire` (
  `id_gestionnaire` int DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tel` int DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `photo` blob,
  `civilite` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table pharmastock. products
CREATE TABLE IF NOT EXISTS `products` (
  `id_product` int DEFAULT NULL,
  `id_category` int DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `prix_u` float DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `photo` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table pharmastock. vents
CREATE TABLE IF NOT EXISTS `vents` (
  `id_vent` int DEFAULT NULL,
  `id_product` int DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `id_client` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` enum('achat','vente') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


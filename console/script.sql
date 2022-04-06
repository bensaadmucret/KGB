
--  
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `code_identification` varchar(255) NOT NULL, UNIQUE KEY `code_identification` (`code_identification`),
  `nationalite` varchar(255) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `cible`
--

CREATE TABLE `cible` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `code_identification` varchar(255) NOT NULL, UNIQUE KEY `code_identification` (`code_identification`),
  `nationalite` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `code_identification` varchar(255) NOT NULL, UNIQUE KEY `code_identification` (`code_identification`),
  `nationalite` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `planque`
--


CREATE TABLE `planque` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL, UNIQUE KEY `code` (`code`),
  `adresse` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `mission`
-- Create a foreign key while creating a table
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `agent` int(11) NOT NULL,
  `contact` int(11) NOT NULL,
  `cible` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `planque` int(11) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`agent`) REFERENCES `agent`(`id`),
  FOREIGN KEY (`contact`) REFERENCES `contact`(`id`),
  FOREIGN KEY (`cible`) REFERENCES `cible`(`id`),
  FOREIGN KEY (`planque`) REFERENCES `planque`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




--
-- Table structure for table `administrateur`
--


/*Les administrateurs ont un nom, un prénom, une adresse mail, un mot de passe, une date de création*/
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


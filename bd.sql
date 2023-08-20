-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema1
CREATE DATABASE IF NOT EXISTS `cinema1` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema1`;

-- Listage de la structure de table cinema1. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.acteur : ~6 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(1, 4),
	(2, 5),
	(3, 6),
	(4, 7),
	(5, 9),
	(6, 11);

-- Listage de la structure de table cinema1. action
CREATE TABLE IF NOT EXISTS `action` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `action_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `action_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.action : ~8 rows (environ)
INSERT INTO `action` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(5, 1),
	(2, 2),
	(7, 2),
	(8, 2),
	(3, 3),
	(6, 3),
	(4, 4);

-- Listage de la structure de table cinema1. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `anneeSortie` int NOT NULL,
  `duree` int NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `note` int NOT NULL,
  `affiche` varchar(255) NOT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.film : ~8 rows (environ)
INSERT INTO `film` (`id_film`, `titre`, `anneeSortie`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'batman le defi', 1992, 126, 'Non seulement Batman doit affronter le Pingouin, monstre génétique doté d\\\'une intelligence à toute épreuve, qui sème la terreur mais, plus difficile encore, il doit faire face à la séduction de deux super-femmes', 4, 'batman_defi.jpg', 1),
	(2, 'batman_forever', 1995, 135, 'Nul ne sait que Bruce Wayne, le patron d\\\'un vaste et puissant consortium, l\\\'homme le plus riche des Etats-Unis, revêt chaque nuit la combinaison et le masque de cuir de Batman pour voler au secours de ses', 5, 'batman_forever.jpg', 2),
	(3, 'batman et robin', 1997, 140, 'Dans cette nouvelle aventure, Batman aura bien besoin de son audacieux partenaire Robin, juché sur sa fringante moto turbo', 3, 'robin.jpg', 2),
	(4, 'batman begins', 2005, 145, 'Non seulement Batman doit affronter le Pingouin, monstre génétique doté d\\\'une intelligence à toute épreuve', 5, 'begins.jpg', 3),
	(5, 'spider man2', 2004, 127, 'Ecartelé entre son identité secrète de Spider-Man et sa vie d\'étudiant, Peter Parker n\'a pas réussi à garder celle qu\'il aime, Mary Jane, qui est aujourd\'hui comédienne et fréquente quelqu\'un d\'autre. Guidé par son seul sens du devoir', 4, 'spiderman.jpg', 4),
	(6, 'spider man3', 2007, 140, 'Peter Parker a enfin réussi à concilier son amour pour Mary-Jane et ses devoirs de super-héros, mais l\'horizon s\'obscurcit. La brutale mutation de son costume,', 3, 'spiderman3.jpg', 4),
	(7, 'Terminator', 1984, 135, 'Un Terminator, robot d\'aspect humain, est envoyé d\'un futur où sa race livre aux hommes une guerre sans merci. Sa mission est de trouver et d\'éliminer Sarah Connor avant qu\'elle ne donne naissance à John, appelé à devenir le chef de la résistance.', 5, 'terminator.jpg', 6),
	(8, 'Terminator 2', 1991, 137, 'Après l\'immense embrasement nucléaire du 29 août 1997, les rares humains survivants, menés par John Connor, luttent sans relâche contre l\'armée de robots dirigée par Skynet, un ordinateur surpuissant. Skynet tente d\'abord d\'éliminer Sarah Connor', 5, 'terminator2.jpg', 6);

-- Listage de la structure de table cinema1. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.genre : ~4 rows (environ)
INSERT INTO `genre` (`id_genre`, `genre`) VALUES
	(1, 'action'),
	(2, 'fiction\r\n'),
	(3, 'adventure'),
	(4, 'comedie');

-- Listage de la structure de table cinema1. jouer
CREATE TABLE IF NOT EXISTS `jouer` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `jouer_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.jouer : ~8 rows (environ)
INSERT INTO `jouer` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1),
	(4, 4, 1),
	(5, 5, 2),
	(6, 5, 2),
	(7, 6, 3),
	(8, 6, 3);

-- Listage de la structure de table cinema1. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `dateNaissance` date NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.personne : ~11 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `dateNaissance`) VALUES
	(1, 'Tim', 'Burton', 'male', '1958-08-25'),
	(2, 'Joel', 'Schumacher', 'male', '1939-08-29'),
	(3, 'Cristopher', 'Nolan', 'male', '1970-07-30'),
	(4, 'Michael', 'Keaton', 'male', '1951-09-05'),
	(5, 'Val', 'Kilmer', 'male', '1959-12-31'),
	(6, 'George', 'Clooney', 'male', '1961-05-06'),
	(7, 'christian', 'Bale', 'male', '1974-01-30'),
	(8, 'Sam', 'Raimi', 'male', '1959-10-23'),
	(9, 'Tobey', 'Maguire', 'male', '1975-06-27'),
	(10, 'Cameron', 'James', 'male', '1954-08-16'),
	(11, 'Schwarzenegger', 'arnold', 'male', '1947-07-30');

-- Listage de la structure de table cinema1. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.realisateur : ~5 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 8),
	(6, 10);

-- Listage de la structure de table cinema1. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.role : ~3 rows (environ)
INSERT INTO `role` (`id_role`, `role`) VALUES
	(1, 'Batman'),
	(2, 'Spider man'),
	(3, 'Terminator');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

*************************************************************************************222
-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema1
CREATE DATABASE IF NOT EXISTS `cinema1` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema1`;

-- Listage de la structure de table cinema1. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.acteur : ~6 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(1, 4),
	(2, 5),
	(3, 6),
	(4, 7),
	(5, 9),
	(6, 11);

-- Listage de la structure de table cinema1. action
CREATE TABLE IF NOT EXISTS `action` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `action_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `action_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.action : ~8 rows (environ)
INSERT INTO `action` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(5, 1),
	(2, 2),
	(7, 2),
	(8, 2),
	(3, 3),
	(6, 3),
	(4, 4);

-- Listage de la structure de table cinema1. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `anneeSortie` int NOT NULL,
  `duree` int NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `note` int NOT NULL,
  `affiche` varchar(255) NOT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.film : ~8 rows (environ)
INSERT INTO `film` (`id_film`, `titre`, `anneeSortie`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'batman le defi', 1992, 126, 'Non seulement Batman doit affronter le Pingouin, monstre génétique doté d\\\'une intelligence à toute épreuve, qui sème la terreur mais, plus difficile encore, il doit faire face à la séduction de deux super-femmes', 4, 'https://fr.web.img6.acsta.net/pictures/17/11/03/14/52/0823987.jpg', 1),
	(2, 'batman_forever', 1995, 135, 'Nul ne sait que Bruce Wayne, le patron d\\\'un vaste et puissant consortium, l\\\'homme le plus riche des Etats-Unis, revêt chaque nuit la combinaison et le masque de cuir de Batman pour voler au secours de ses', 5, 'https://www.citizenkid.com/uploads/medias/bf/47/bf47ab74ee9eba8dcadd63736d9f6c9f08a6c43d.jpeg', 2),
	(3, 'batman et robin', 1997, 140, 'Dans cette nouvelle aventure, Batman aura bien besoin de son audacieux partenaire Robin, juché sur sa fringante moto turbo', 3, 'https://www.nanarland.com/media/cache/resolve/front_film_single_cover/uploads/films/646cc88fb1818-batman-robin-george-clooney-dvd-zone-2.jpg', 2),
	(4, 'batman begins', 2005, 145, 'Non seulement Batman doit affronter le Pingouin, monstre génétique doté d\\\'une intelligence à toute épreuve', 5, 'https://fr.web.img3.acsta.net/pictures/22/10/04/08/52/2484953.jpg', 3),
	(5, 'spider man2', 2004, 127, 'Ecartelé entre son identité secrète de Spider-Man et sa vie d\'étudiant, Peter Parker n\'a pas réussi à garder celle qu\'il aime, Mary Jane, qui est aujourd\'hui comédienne et fréquente quelqu\'un d\'autre. Guidé par son seul sens du devoir', 4, 'https://www.sonypictures.fr/sites/france2/files/2021-10/spider-man-homecoming-affiche-450x600.jpg', 4),
	(6, 'spider man3', 2007, 140, 'Peter Parker a enfin réussi à concilier son amour pour Mary-Jane et ses devoirs de super-héros, mais l\'horizon s\'obscurcit. La brutale mutation de son costume,', 3, 'https://static.thcdn.com/images/large/original/productimg/0/600/600/43/10047243-1315485179-74433.jpg', 4),
	(7, 'Terminator', 1984, 135, 'Un Terminator, robot d\'aspect humain, est envoyé d\'un futur où sa race livre aux hommes une guerre sans merci. Sa mission est de trouver et d\'éliminer Sarah Connor avant qu\'elle ne donne naissance à John, appelé à devenir le chef de la résistance.', 5, 'https://fr.web.img4.acsta.net/pictures/22/09/27/12/52/4744720.jpg', 6),
	(8, 'Terminator 2', 1991, 137, 'Après l\'immense embrasement nucléaire du 29 août 1997, les rares humains survivants, menés par John Connor, luttent sans relâche contre l\'armée de robots dirigée par Skynet, un ordinateur surpuissant. Skynet tente d\'abord d\'éliminer Sarah Connor', 5, 'https://www.ocvod.fr/wp-content/uploads/2022/04/Terminator-2-dvd-recto.jpg', 6);

-- Listage de la structure de table cinema1. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.genre : ~4 rows (environ)
INSERT INTO `genre` (`id_genre`, `genre`) VALUES
	(1, 'action'),
	(2, 'fiction\r\n'),
	(3, 'adventure'),
	(4, 'comedie');

-- Listage de la structure de table cinema1. jouer
CREATE TABLE IF NOT EXISTS `jouer` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `jouer_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `jouer_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `jouer_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.jouer : ~8 rows (environ)
INSERT INTO `jouer` (`id_film`, `id_acteur`, `id_role`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1),
	(4, 4, 1),
	(5, 5, 2),
	(6, 5, 2),
	(7, 6, 3),
	(8, 6, 3);

-- Listage de la structure de table cinema1. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(15) NOT NULL,
  `dateNaissance` date NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.personne : ~0 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `dateNaissance`) VALUES
	(1, 'Tim', 'Burton', 'male', '1958-08-25'),
	(2, 'Joel', 'Schumacher', 'male', '1939-08-29'),
	(3, 'Cristopher', 'Nolan', 'male', '1970-07-30'),
	(4, 'Michael', 'Keaton', 'male', '1951-09-05'),
	(5, 'Val', 'Kilmer', 'male', '1959-12-31'),
	(6, 'George', 'Clooney', 'male', '1961-05-06'),
	(7, 'christian', 'Bale', 'male', '1974-01-30'),
	(8, 'Sam', 'Raimi', 'male', '1959-10-23'),
	(9, 'Tobey', 'Maguire', 'male', '1975-06-27'),
	(10, 'Cameron', 'James', 'male', '1954-08-16'),
	(11, 'Schwarzenegger', 'arnold', 'male', '1947-07-30');

-- Listage de la structure de table cinema1. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.realisateur : ~0 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 8),
	(6, 10);

-- Listage de la structure de table cinema1. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinema1.role : ~3 rows (environ)
INSERT INTO `role` (`id_role`, `role`) VALUES
	(1, 'Batman'),
	(2, 'Spider man'),
	(3, 'Terminator');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;


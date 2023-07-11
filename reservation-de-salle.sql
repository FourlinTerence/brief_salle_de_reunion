CREATE DATABASE IF NOT EXISTS `Salle de reunion`;

USE `Salle de reunion`;

CREATE TABLE `salleDeReunion` (
	`ID_Salle` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`image` varchar(50) NOT NULL,
	`nbPlace` INT NOT NULL,
	PRIMARY KEY (`ID_Salle`)
);

CREATE TABLE `reservation` (
	`ID_Reservation` INT NOT NULL AUTO_INCREMENT,
	`ID_Salle` INT NOT NULL,
	`nomClient` varchar(50) NOT NULL,
	`date` DATE NOT NULL,
	PRIMARY KEY (`ID_Reservation`)
);

ALTER TABLE `reservation` ADD CONSTRAINT `reservation_fk0` FOREIGN KEY (`ID_Salle`) REFERENCES `salleDeReunion`(`ID_Salle`);

INSERT INTO `salledereunion` (`ID_Salle`, `nom`, `image`, `nbPlace`) VALUES (NULL, 'Salle 1', 'image\\téléchargement(1).jpg', '12'), (NULL, 'Salle 2', 'image\\téléchargement(2).jpg', '20'), (NULL, 'Salle 3', 'image\\téléchargement.jpg', '16'), (NULL, 'Salle 4', 'image\\salle 4.jpg', '30');


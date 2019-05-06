-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bpts
CREATE DATABASE IF NOT EXISTS `bpts` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bpts`;

-- Dumping structure for table bpts.contestants
CREATE TABLE IF NOT EXISTS `contestants` (
  `contestant_id` int(11) NOT NULL AUTO_INCREMENT,
  `contestant_name` varchar(50) DEFAULT NULL,
  `contestant_location` varchar(50) DEFAULT NULL,
  `contestant_details` varchar(50) DEFAULT NULL,
  `contestant_picture` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`contestant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table bpts.contestants: ~36 rows (approximately)
/*!40000 ALTER TABLE `contestants` DISABLE KEYS */;
INSERT INTO `contestants` (`contestant_id`, `contestant_name`, `contestant_location`, `contestant_details`, `contestant_picture`) VALUES
	(1, 'LOIS ANNE BADANDO', 'Location 1', 'Example example example contestant details', '1. Lois Anne Badando.jpg'),
	(2, 'ERICHA ORTIZ REGALADO\r\n', 'Location 2', 'Example example example contestant details', '2. Ericha Regalado.png'),
	(3, 'AUBREY ANGELIC NEIS\r\n', 'Location 3', 'Example example example contestant details', '3. Aubrey Angelic Neis.png'),
	(4, 'MA. ANGELICA REYES\r\n', 'Location 4', 'Example example example contestant details', '4. Ma. Angelica Reyes.png'),
	(5, 'NORI ANN QUESADA\r\n', 'Location 5', 'Example example example contestant details', '5. Nori Ann Quesada.png'),
	(6, 'ALITA ANLEI TUPAZ\r\n', 'Location 6', 'Example example example contestant details', '6. Alita Anlei Topaz.png'),
	(7, 'BETHIA FRANCESCA AROLLADO\r\n', 'Location 7', 'Example example example contestant details', '7. Bethia Franchesca Arollado.png'),
	(8, 'ANGEL NICOLE DE CASTRO\r\n', 'Location 8', 'Example example example contestant details', '8. Angel Nicole De Castro.png'),
	(9, 'KEITH LOVEWIN CRUZ\r\n', 'Location 9', 'Example example example contestant details', '9. Keith Lovewin Cruz.png'),
	(10, 'MARIAH ARISA CERNECHEZ\r\n', 'Location 10', 'Example example example contestant details', '10. Mariah Arisa Cernechez.png'),
	(11, 'ANGEL NICOLE FRANCISCO\r\n', 'Location 10', 'Example example example contestant details', '11. Angel Nicole Francisco.png'),
	(12, 'ALMAS CHOUDHRY\r\n', 'Location 10', 'Example example example contestant details', '12. Almas Choudry.png'),
	(13, 'SHAYNE ALEXANDRA BADUA\r\n', 'Location 10', 'Example example example contestant details', '13. Shayne Alexandra Badua.png'),
	(14, 'GABRIELLE FRANCISCO\r\n', 'Location 10', 'Example example example contestant details', '14. Gabrielle Francisco.png'),
	(15, 'DONABEL SOLANO\r\n', 'Location 10', 'Example example example contestant details', '15. Donabel Solano.png'),
	(16, 'REINA MARIE CARREON\r\n', 'Location 10', 'Example example example contestant details', '16. Reina Carreon.png'),
	(17, 'KRIZIA LUALHATI\r\n', 'Location 10', 'Example example example contestant details', '17. Krizia Lualhati.png'),
	(18, 'ALIYAH FAITH TIANGCO\r\n', 'Location 10', 'Example example example contestant details', '18. Aliyah Cernechez.png'),
	(19, 'GEMAICA COSTAN\r\n', 'Location 10', 'Example example example contestant details', '19. Gemaica Costan.png'),
	(20, 'RASHA MAE PEREZ\r\n', 'Location 10', 'Example example example contestant details', '20. Rasha Perez.png'),
	(21, 'JERRALYN QUIAMBAO\r\n', 'Location 10', 'Example example example contestant details', '21. Jerralyn Quiambao.jpg'),
	(22, 'JOAN AÑONUEVO\r\n', 'Location 10', 'Example example example contestant details', '22. Joan Anonuevo.png'),
	(23, 'CHLOE GREGORIO\r\n', 'Location 10', 'Example example example contestant details', '23. Chloe Gregorio.png'),
	(24, 'LENIE LAGAHAN\r\n', 'Location 10', 'Example example example contestant details', '24. Lenie Lagahan.png'),
	(25, 'CHELCY ANGELI DELA PAZ\r\n', 'Location 10', 'Example example example contestant details', '25. Chelcy Dela Paz.png'),
	(26, 'ABIGAIL ANNE MENDOZA\r\n', 'Location 10', 'Example example example contestant details', '25. Chelcy Dela Paz.png'),
	(27, 'MARY ANNE STA. MARIA\r\n', 'Location 10', 'Example example example contestant details', '27. Mary Anne Sta. Maria.png'),
	(28, 'JASMINE MANGAHAS\r\n', 'Location 10', 'Example example example contestant details', '28. Jasmine Mangahas.png'),
	(29, 'MARY ANN DEL PRADO\r\n', 'Location 10', 'Example example example contestant details', '29. Mary Ann Del Prado.png'),
	(30, 'SHARIELLE YANSON\r\n', 'Location 10', 'Example example example contestant details', '30. Sharielle Yanson.png'),
	(31, 'CAMILLA KIM RAMOS\r\n', 'Location 10', 'Example example example contestant details', '31. Camilla Ramos.png'),
	(32, 'ANDREA FAITH QUIZON\r\n', 'Location 10', 'Example example example contestant details', '32. Andrea Quizon.png'),
	(33, 'MIKEE REPOSO\r\n', 'Location 10', 'Example example example contestant details', '33. Mikee Reposo.png'),
	(34, 'MAULIE JULIENNE RARIZA\r\n', 'Location 10', 'Example example example contestant details', '34. Julienne Rariza.png'),
	(35, 'LHIA MAY CARILLO\r\n', 'Location 10', 'Example example example contestant details', '35. Lhia Carillo.png'),
	(36, 'MARIENELLA CABURIAN\r\n', 'Location 10', 'Example example example contestant details', '36. Marienella Caburian.png');
/*!40000 ALTER TABLE `contestants` ENABLE KEYS */;

-- Dumping structure for table bpts.criteria
CREATE TABLE IF NOT EXISTS `criteria` (
  `criteria_id` int(11) NOT NULL AUTO_INCREMENT,
  `criteria_name` text,
  `criteria_percentage` double DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `visibility` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`criteria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table bpts.criteria: ~10 rows (approximately)
/*!40000 ALTER TABLE `criteria` DISABLE KEYS */;
INSERT INTO `criteria` (`criteria_id`, `criteria_name`, `criteria_percentage`, `level_id`, `visibility`, `active`) VALUES
	(1, 'Pre Pageant', 0.5, 1, 0, 1),
	(2, 'Production Number', 0.15, 1, 1, 1),
	(3, 'Swimsuit', 0.1, 1, 1, 0),
	(4, 'Long Gown', 0.35, 1, 1, 0),
	(5, 'Question & Answer', 0.4, 1, 1, 0),
	(6, 'Beauty', 0.3, 2, 1, 0),
	(7, 'Poise & Personality', 0.25, 2, 1, 0),
	(8, 'Intelligence', 0.4, 2, 1, 0),
	(9, 'Audience Impact', 0.05, 2, 1, 0),
	(10, 'Overall', 1, 3, 1, 0);
/*!40000 ALTER TABLE `criteria` ENABLE KEYS */;

-- Dumping structure for table bpts.levels
CREATE TABLE IF NOT EXISTS `levels` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) DEFAULT NULL,
  `level_limit` int(11) DEFAULT NULL,
  `level_active` int(11) DEFAULT '0',
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table bpts.levels: ~4 rows (approximately)
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` (`level_id`, `level_name`, `level_limit`, `level_active`) VALUES
	(1, 'Top 36', 15, 1),
	(2, 'Top 15', 5, 0),
	(3, 'Top 5', 5, 0),
	(4, 'Winners', 0, 0);
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;

-- Dumping structure for table bpts.score
CREATE TABLE IF NOT EXISTS `score` (
  `score_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `criteria_id` int(11) DEFAULT NULL,
  `contestant_id` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`score_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bpts.score: ~0 rows (approximately)
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
/*!40000 ALTER TABLE `score` ENABLE KEYS */;

-- Dumping structure for table bpts.swimsuit
CREATE TABLE IF NOT EXISTS `swimsuit` (
  `contestant_id` int(11) NOT NULL AUTO_INCREMENT,
  `swimsuit_grade` double DEFAULT NULL,
  PRIMARY KEY (`contestant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table bpts.swimsuit: ~36 rows (approximately)
/*!40000 ALTER TABLE `swimsuit` DISABLE KEYS */;
INSERT INTO `swimsuit` (`contestant_id`, `swimsuit_grade`) VALUES
	(1, 89.2),
	(2, 81.8),
	(3, 79.6),
	(4, 84.2),
	(5, 76),
	(6, 84.6),
	(7, 83),
	(8, 74.8),
	(9, 75.4),
	(10, 76),
	(11, 84.4),
	(12, 82.6),
	(13, 82.8),
	(14, 77.2),
	(15, 79.6),
	(16, 87.8),
	(17, 73),
	(18, 88.6),
	(19, 77.6),
	(20, 73.6),
	(21, 85.6),
	(22, 76.6),
	(23, 79.4),
	(24, 73.8),
	(25, 91),
	(26, 82.2),
	(27, 79.6),
	(28, 75.8),
	(29, 82),
	(30, 89.4),
	(31, 74.8),
	(32, 79.2),
	(33, 75.6),
	(34, 83.8),
	(35, 77.4),
	(36, 73.8);
/*!40000 ALTER TABLE `swimsuit` ENABLE KEYS */;

-- Dumping structure for table bpts.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table bpts.users: ~9 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_type_id`) VALUES
	(1, 'admin', 'admin', 1),
	(2, 'judge1', '11111', 2),
	(3, 'judge2', '22222', 2),
	(4, 'judge3', '33333', 2),
	(5, 'judge4', '44444', 2),
	(6, 'judge5', '55555', 2),
	(7, 'judge6', '66666', 2),
	(8, 'judge7', '77777', 2),
	(9, 'judge8', '88888', 2),
	(10, 'judge9', '99999', 2),
	(11, 'judge10', '10101', 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table bpts.user_type
CREATE TABLE IF NOT EXISTS `user_type` (
  `user_type_id` int(11) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bpts.user_type: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` (`user_type_id`, `user_type`) VALUES
	(1, 'admin'),
	(2, 'judge');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;

-- Dumping structure for table bpts.winners
CREATE TABLE IF NOT EXISTS `winners` (
  `winner_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_id` int(11) DEFAULT NULL,
  `rank_no` int(11) DEFAULT NULL,
  `contestant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`winner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bpts.winners: ~0 rows (approximately)
/*!40000 ALTER TABLE `winners` DISABLE KEYS */;
/*!40000 ALTER TABLE `winners` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

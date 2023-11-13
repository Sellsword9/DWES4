-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para tienda_php
CREATE DATABASE IF NOT EXISTS `tienda_php` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `tienda_php`;

-- Volcando estructura para tabla tienda_php.line
CREATE TABLE IF NOT EXISTS `line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda_php.line: ~5 rows (aproximadamente)
DELETE FROM `line`;
INSERT INTO `line` (`id`, `id_order`, `id_product`, `quantity`) VALUES
	(22, 1, 1, 1),
	(23, 1, 2, 1),
	(24, 1, 2, 1),
	(25, 1, 2, 10),
	(26, 1, 1, 1),
	(27, 2, 1, 1),
	(28, 2, 2, 9),
	(29, 2, 4, 1),
	(30, 2, 3, 100);

-- Volcando estructura para tabla tienda_php.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda_php.orders: ~1 rows (aproximadamente)
DELETE FROM `orders`;
INSERT INTO `orders` (`id`, `id_user`, `STATUS`) VALUES
	(1, 3, 0),
	(2, 4, 0);

-- Volcando estructura para tabla tienda_php.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` text DEFAULT NULL,
  `stock` int(10) unsigned DEFAULT 0,
  `NAME` varchar(32) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda_php.product: ~4 rows (aproximadamente)
DELETE FROM `product`;
INSERT INTO `product` (`id`, `descr`, `stock`, `NAME`, `price`) VALUES
	(1, 'Fiable y destructiva', 20, 'AR-15', 799.99),
	(2, 'Revólver de la gama Python fiable y con capacidad de parada inigualable', 20, 'Colt Python .44', 1200.00),
	(3, 'Arma ornamentada decorada con platino real', 20, '1911 chapado platino', 120000000.00),
	(4, 'Arma de impresora 3d hecha con materiales prácticos y fiables pero baratos. Tipo revólver', 20, 'Ghost .44', 89.90);

-- Volcando estructura para tabla tienda_php.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla tienda_php.user: ~2 rows (aproximadamente)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `username`, `PASSWORD`, `rol`) VALUES
	(1, 'admin', '$2y$10$D0n2lfPjbZ.T/6NbRi5vHe/XbOn3iCwfpQEbN9uu8C9JenbiXch9K', 2),
	(3, 'admin2', '$2y$10$URsSQaJSFlBWqDvfmzxxqeBDe5ya0Vpo83XzbS6JMu3qB4nxIzwem', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

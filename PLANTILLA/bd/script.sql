DROP DATABASE IF EXISTS `prueba`;
CREATE DATABASE `prueba`;
USE `prueba`;

CREATE TABLE `bodega` (
 `idBodega` INT(11) NOT NULL AUTO_INCREMENT,
 `nombre` VARCHAR(255) NOT NULL,
 `comentario` VARCHAR(255) NOT NULL,
 `encargado` VARCHAR(255) NOT NULL,
 `ubicacion` VARCHAR(255) NOT NULL,
 `descripcion` VARCHAR(255) NOT NULL,
 `nombre_usuario_software` VARCHAR(255) NOT NULL,
 `fecha` DATE,
 PRIMARY KEY(`idBodega`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `ejercicios` (
 `idEjercicio` INT(11) NOT NULL AUTO_INCREMENT,
 `nombre` VARCHAR(255) NOT NULL,
 `zona` VARCHAR(255) NOT NULL,
 `objetivo` VARCHAR(255) NOT NULL,
 `implementos` VARCHAR(255) NOT NULL,
 `descripcion` VARCHAR(255) NOT NULL,
 `nombre_usuario_software` VARCHAR(255) NOT NULL,
 `fecha` DATE,
 PRIMARY KEY(`idEjercicio`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
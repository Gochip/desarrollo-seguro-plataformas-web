DROP DATABASE IF EXISTS csrf_form_post;
CREATE DATABASE csrf_form_post;
USE csrf_form_post;

CREATE TABLE IF NOT EXISTS usuarios (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(20) UNIQUE,
	clave VARCHAR(20),
	domicilio VARCHAR(60),
	cbu VARCHAR(60),
	email VARCHAR(60),
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

/* INSERCIONES */

INSERT INTO usuarios (nombre, clave, domicilio, cbu, email) VALUES ('german','123456', 'Facundo Quiroga 380', 'germanparisi', 'germannparisi@gmail.com');
INSERT INTO usuarios (nombre, clave, domicilio, cbu, email) VALUES ('fede','123', 'Illia 600', 'fedebertola', 'federicojbertola@gmail.com');
INSERT INTO usuarios (nombre, clave, domicilio, cbu, email) VALUES ('franco','disenio', 'Illia 600', 'nico123', 'franco_disenio@gmail.com');
INSERT INTO usuarios (nombre, clave, domicilio, cbu, email) VALUES ('valentina','tini', 'TiniTini 200', 'depaul', 'ttt@gmail.com');
INSERT INTO usuarios (nombre, clave, domicilio, cbu, email) VALUES ('nehuel','del1al6', 'Carlos Vega', 'martin', 'martin@gmail.com');
INSERT INTO usuarios (nombre, clave, domicilio, cbu, email) VALUES ('augusto','contrasenia', 'Illia 601', 'cualquiera', 'augusto_disenio@gmail.com');

DROP DATABASE IF EXISTS xss_persistente;
CREATE DATABASE xss_persistente;
USE xss_persistente;

CREATE TABLE IF NOT EXISTS usuarios (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(20) UNIQUE,
	clave VARCHAR(20),
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

CREATE TABLE IF NOT EXISTS comentarios (
	id INT NOT NULL AUTO_INCREMENT,
	comentario TEXT NOT NULL,
	id_usuario INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
		ON DELETE RESTRICT
		ON UPDATE RESTRICT
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

/* INSERCIONES */

INSERT INTO usuarios (nombre, clave) VALUES ('diego','123');
INSERT INTO usuarios (nombre, clave) VALUES ('german','123');
INSERT INTO usuarios (nombre, clave) VALUES ('fede','123');
DROP DATABASE IF EXISTS pa;
CREATE DATABASE pa CHARACTER SET utf8;

USE pa;
CREATE TABLE usuarios (
	id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    codigo VARCHAR(30) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO usuarios (nombre, apellido, codigo) VALUE ('Facundo', 'D', 'AX400YP');
INSERT INTO usuarios (nombre, apellido, codigo) VALUE ('Juan', 'H', 'PL890R6');
INSERT INTO usuarios (nombre, apellido, codigo) VALUE ('Brenda', 'G', 'FA500RT');
INSERT INTO usuarios (nombre, apellido, codigo) VALUE ('Noelia', 'B', 'VFG8887');
DROP DATABASE IF EXISTS nsa;
CREATE DATABASE nsa CHARACTER SET utf8;

USE nsa;

CREATE TABLE tipos(
	id INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE niveles(
	id INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE agentes(
	id INT AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
	PRIMARY KEY (id)
);

CREATE TABLE proyectos(
	id INT AUTO_INCREMENT NOT NULL,
    codigo VARCHAR(8) UNIQUE NOT NULL,
    nombre VARCHAR(50),
    id_agente INT,
    id_tipo INT,
    id_nivel INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id_agente) REFERENCES agentes(id),
    FOREIGN KEY (id_tipo) REFERENCES tipos(id),
    FOREIGN KEY (id_nivel) REFERENCES niveles(id)
);

INSERT INTO tipos (nombre) VALUES ('Spying');
INSERT INTO tipos (nombre) VALUES ('Targeted attack');
INSERT INTO tipos (nombre) VALUES ('APT');

SET @id_tipo_spying = (SELECT id FROM tipos WHERE nombre='Spying');
SET @id_tipo_targeted_attack = (SELECT id FROM tipos WHERE nombre='Targeted attack');
SET @id_tipo_apt = (SELECT id FROM tipos WHERE nombre='APT');

INSERT INTO niveles (nombre) VALUES ('Top Secret');
INSERT INTO niveles (nombre) VALUES ('Secret');
INSERT INTO niveles (nombre) VALUES ('Confidential');
INSERT INTO niveles (nombre) VALUES ('Restricted');
INSERT INTO niveles (nombre) VALUES ('Unclassified');

SET @id_nivel_top_secret = (SELECT id FROM niveles WHERE nombre='Top Secret');
SET @id_nivel_secret = (SELECT id FROM niveles WHERE nombre='Secret');
SET @id_nivel_confidential = (SELECT id FROM niveles WHERE nombre='Confidential');
SET @id_nivel_restricted = (SELECT id FROM niveles WHERE nombre='Restricted');
SET @id_nivel_unclassified = (SELECT id FROM niveles WHERE nombre='Unclassified');

INSERT INTO agentes (nombre, apellido) VALUES ('Frank', 'Johnson');
INSERT INTO agentes (nombre, apellido) VALUES ('Eric', 'Brown');
INSERT INTO agentes (nombre, apellido) VALUES ('Brian', 'Smith');

SET @id_agente_frank = (SELECT id FROM agentes WHERE nombre='Frank');
SET @id_agente_eric = (SELECT id FROM agentes WHERE nombre='Eric');
SET @id_agente_brian = (SELECT id FROM agentes WHERE nombre='Brian');

INSERT INTO proyectos (codigo, nombre, id_agente, id_tipo, id_nivel) VALUES ('NS4_AS2','Colombia warfare',@id_agente_frank, @id_tipo_spying,@id_nivel_secret);
INSERT INTO proyectos (codigo, nombre, id_agente, id_tipo, id_nivel) VALUES ('NS4_AN1','Chinese Firewall',@id_agente_eric, @id_tipo_targeted_attack, @id_nivel_restricted);
INSERT INTO proyectos (codigo, nombre, id_agente, id_tipo, id_nivel) VALUES ('NS4_A1L','Nisman case',@id_agente_brian, @id_tipo_spying, @id_nivel_restricted);
INSERT INTO proyectos (codigo, nombre, id_agente, id_tipo, id_nivel) VALUES ('NS4_B2W','ISIS terrorists',@id_agente_brian, @id_tipo_apt, @id_nivel_top_secret);
INSERT INTO proyectos (codigo, nombre, id_agente, id_tipo, id_nivel) VALUES ('NS4_OIL','EkoParty destruction',@id_agente_eric, @id_tipo_apt, @id_nivel_top_secret);






-- Creo la base de datos
CREATE DATABASE Juego_Alberto;
-- Uso la base de datos creada
USE Juego_Alberto;
-- Creo la tabla Clase
CREATE TABLE clase(
    idClase smallint unsigned AUTO_INCREMENT NOT NULL PRIMARY KEY, 
    nombreClase varchar(20) NOT NULL
);
-- Creo la tabla Alumno
CREATE TABLE alumno(
    idAlumno smallint unsigned AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre varchar(40) NOT NULL,
    idClase smallint unsigned NOT NULL,
    CONSTRAINT FK_idClase FOREIGN KEY (idClase) REFERENCES Clase(idClase) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Creo la tabla competicion
CREATE TABLE competicion(
    idCompeticion smallint unsigned AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombreCompeticion varchar(20) NOT NULL,
    descripcion varchar(60) NOT NULL
);
-- Creo la tabla equipos
CREATE TABLE equipos(
    idEquipo smallint unsigned AUTO_INCREMENT NOT NULL PRIMARY KEY,
    puntos tinyint NOT NULL,
    idCompeticion smallint unsigned NOT NULL,
    CONSTRAINT FK_idCompeticion FOREIGN KEY (idCompeticion) REFERENCES competicion(idCompeticion) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Creo la tabla partida
CREATE TABLE partida(
    idPartida int unsigned AUTO_INCREMENT NOT NULL PRIMARY KEY,
    equipo1 smallint unsigned NOT NULL,
    equipo2 smallint unsigned NOT NULL,
    resultado tinyint NOT NULL,
    CONSTRAINT FK_equipo1 FOREIGN KEY (equipo1) REFERENCES equipos(idEquipo) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_equipo2 FOREIGN KEY (equipo2) REFERENCES equipos(idEquipo) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Creo la tabla alumno_equipo_competicion
CREATE TABLE alumno_equipo_competicion(
    idAlumno smallint unsigned NOT NULL,
    idEquipo smallint unsigned NOT NULL,
    idCompeticion smallint unsigned NOT NULL,
    CONSTRAINT FK_idAlumno FOREIGN KEY (idAlumno) REFERENCES alumno(idAlumno) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_idEquipo FOREIGN KEY (idEquipo) REFERENCES equipos(idEquipo) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_idCompeticion2 FOREIGN KEY (idCompeticion) REFERENCES competicion(idCompeticion) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT PK_alumno_equipo_competicion PRIMARY KEY (idAlumno,idEquipo,idCompeticion)
);

-- INSERCIÓN DATOS DE EJEMPLO

INSERT INTO clase (nombreClase) VALUES 
	('1SMR'),
	('2SMR'),
	('1DAW'),
	('2DAW');
	
INSERT INTO alumno (nombre,idClase) VALUES
	('Alfonso Correa Fernandez',1),
	('Carmen Jaramillo Romero',1),
	('Jose Antonio Cisnero Moreno',1),
	('Carla Marquez Cid',1),
	('Alba Martínez Olivera',1),
	('Marcos Romero Díaz',2),
	('Jose Manuel Torrado Gonzalez',2),
	('María Gil Nuñez',2),
	('Mar Bonito Preciado',2),
	('Carlos Gonzalez Lebrijo',2),
	('Manuel Solis Delgado',3),
	('Mateo Espinosa Albarran',3),
	('Lola Rodríguez Gomez',3),
	('Marta Gonzalez Salas',3),
	('Paola López Correa',3),
	('Esperanza Rodríguez Espinosa',4),
	('Álvaro Romero Antúnez',4),
	('Jose Alejandro Preciado Senero',4),
	('Juan Manuel Toscano Reyes',4),
	('Pablo Ceballos Benitez',4);
	
INSERT INTO competicion (nombreCompeticion,descripcion) VALUES 
	('Cometición de fútbol 1SMR','Competición entre los alumnos de la clase de 1SMR de fútbol'),
	('Cometición de baloncesto 2SMR','Competición entre los alumnos de la clase de 2SMR de baloncesto'),
	('Cometición de batminton 1DAW','Competición entre los alumnos de la clase de 1DAW de batminton'),
	('Cometición de tenis 2DAW','Competición entre los alumnos de la clase de 2DAW de tenis');
	

INSERT INTO equipos (puntos,idCompeticion) VALUES 
	(25,1),
	(15,1),
	(33,1),
	(36,1),
	(30,1),
	(35,2),
	(25,2),
	(31,2),
	(30,2),
	(20,2),
	(15,3),
	(22,3),
	(21,3),
	(33,3),
	(28,3),
	(12,4),
	(21,4),
	(24,4),
	(31,4),
	(23,4);
	
INSERT INTO partida (equipo1,equipo2,resultado) VALUES 
	(1,2,'1 - 2'),
	(2,3,'3 - 1'),
	(2,4,'0 - 0'),
	(7,8,'2 - 2'),
	(8,9,'3 - 1'),
	(10,11,'2 - 0'),
	(12,13,'4 - 2'),
	(12,14,'3 - 2'),
	(12,15,'1 - 0'),
	(17,18,'5 - 2'),
	(17,19,'3 - 0'),
	(17,20,'2 - 0');

	
INSERT INTO alumno_equipo_competicion (idAlumno,idEquipo,idCompeticion) VALUES 
	(1,1,1),
	(2,1,1),
	(3,1,1),
	(4,2,1),
	(5,2,1),
	(6,3,2),
	(7,3,2),
	(8,4,2),
	(9,4,2),
	(10,4,2),
	(11,5,3),
	(12,5,3),
	(13,5,3),
	(14,6,3),
	(15,6,3),
	(16,7,4),
	(17,7,4),
	(18,8,4),
	(19,8,4),
	(20,8,4);
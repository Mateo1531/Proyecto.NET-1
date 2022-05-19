CREATE DATABASE capacitaciones;
USE capacitaciones;

-- CONSTRAINT = RESTRICCIÓN = REGLA
CREATE TABLE personas
(
	idpersona 			INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	apellidos 			VARCHAR(30)		NOT NULL,
	nombres 				VARCHAR(30)		NOT NULL,
	tipodoc 				CHAR(1)			NOT NULL DEFAULT 'D', -- D (DNI), C (Carnet Extranjería)
	numerodoc	 		CHAR(8)			NOT NULL,
	fechanac 			DATE 				NOT NULL,
	CONSTRAINT uk_numerodoc_per UNIQUE (tipodoc, numerodoc)
)
ENGINE = INNODB;

INSERT INTO personas (apellidos, nombres, tipodoc, numerodoc, fechanac) VALUES
	('PRADA GONZALES','Juan Carlos','D','41415522', '1999-10-15'),
	('TORRES MEJIA','Ana Cecilia','D','74757879','2001-11-20'),
	('CÓRDOVA SARAVIA','Carmen','C','12345678','1997-05-11');

SELECT * FROM personas;

CREATE TABLE roles
(
	idrol 			INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nombrerol	 	VARCHAR(60)		NOT NULL,
	CONSTRAINT uk_nombrerol_rol UNIQUE (nombrerol)
)
ENGINE = INNODB;

INSERT INTO roles (nombrerol) VALUES
	('Asistente de mantenimiento'),
	('Soporte TI');
	
SELECT * FROM roles;

SELECT CURDATE();			-- Solo fecha
SELECT CURTIME();			-- Solo hora
SELECT NOW();				-- Fecha + hora

-- RECOMENDACIÓN
-- Las restricciones llevan un nombre, y se recomienda que el nombre inicie
-- con una abreviación de la regla que representa. FK (foreign key), Uk (Unique Key)

CREATE TABLE usuarios
(
	idusuario 		INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	idpersona 		INT 			NOT NULL,		-- FK (Tabla: Personas)
	username 		VARCHAR(30) NOT NULL,		-- Uk (No debe existir dos usuarios iguales)
	userpassword 	VARCHAR(90)	NOT NULL,
	fecharegistro	DATETIME 	NOT NULL DEFAULT NOW(),
	fechabaja 		DATETIME 	NULL,
	estado 			CHAR(1)		NOT NULL DEFAULT '1',
	CONSTRAINT fk_idpersona_usu FOREIGN KEY (idpersona) REFERENCES personas (idpersona),
	CONSTRAINT uk_username_usu UNIQUE (username)
)
ENGINE = INNODB;


-- ACTUALIZANDO TABLA USUARIOS
SELECT * FROM usuarios;
SELECT * FROM roles;

-- Agregar el campo (NULL)
ALTER TABLE usuarios ADD idrol INT;
-- Asignar un valor 1 (para evitar que siga NULL)
UPDATE usuarios SET idrol = 1;
-- Ahora volvemos a actualizar la tabla asignando RESTRICCIÓN NOT NULL "idrol"
ALTER TABLE usuarios MODIFY idrol INT NOT NULL;
-- Pendiente "idrol" debe ser FK (roles)
ALTER TABLE usuarios ADD CONSTRAINT fk_idrol_rol FOREIGN KEY (idrol) REFERENCES roles (idrol);


SELECT * FROM personas;

INSERT INTO usuarios (idpersona, username, userpassword) VALUES
	(1, 'juan', '123456'),
	(2, 'ana', '123456'),
	(3, 'carmen', '123456');

SELECT * FROM usuarios;

UPDATE usuarios 
	SET userpassword = '$2y$10$XW2bpyDJpGaXMzu7mgFwAu9xjCQZKIebpJOvbfnMENdy2D9gnNtba';
	

-- VIERNES 29-04-2022
-- CONSOLIDAR LA BD
CREATE TABLE capacitaciones
(
	idcapacitacion			INT AUTO_INCREMENT PRIMARY KEY,
	titulo					VARCHAR(200) 		NOT NULL,
	descripcion 			TEXT 					NOT NULL,
	idresponsable			INT 					NOT NULL, -- Foráneo (extranjero)
	fecharegistro			DATETIME 			NOT NULL DEFAULT NOW(),
	caratula 				VARCHAR(150)		NULL,
	idusuarioregistro		INT 					NOT NULL, -- Foráneo (extranjero)
	estado					CHAR(1)				NOT NULL DEFAULT '1', -- P = Público, C = Cerrado, R = Restringido, A = Anulado, F = Finalizado 
	CONSTRAINT fk_idresponsable_cpt FOREIGN KEY (idresponsable) REFERENCES usuarios (idusuario),
	CONSTRAINT fk_idusuarioregistro_cpt FOREIGN KEY (idusuarioregistro) REFERENCES usuarios (idusuario)
)
ENGINE = INNODB;

CREATE TABLE temas
(
	idtema 					INT AUTO_INCREMENT PRIMARY KEY,
	idcapacitacion			INT 				NOT NULL, -- FK
	nombretema				VARCHAR(200)	NOT NULL,
	descripcion 			VARCHAR(500)	NOT NULL,
	objetivo 				VARCHAR(500)	NOT NULL,
	totalhoras 				TINYINT 			NOT NULL,
	video 					VARCHAR(50)		NOT NULL,
	fecharegistro 			DATETIME 		NOT NULL DEFAULT NOW(),
	idusuarioregistro		INT 				NOT NULL,
	estado 					CHAR(1)			NOT NULL DEFAULT '1',
	CONSTRAINT fk_idcapacitacion_tem FOREIGN KEY (idcapacitacion) REFERENCES capacitaciones (idcapacitacion),
	CONSTRAINT fk_idusuarioregistro_tem FOREIGN KEY (idusuarioregistro) REFERENCES usuarios (idusuario)
)ENGINE = INNODB;

CREATE TABLE matriculas
(
	idmatricula 			INT AUTO_INCREMENT PRIMARY KEY,
	idcapacitacion			INT 				NOT NULL,
	idparticipante 		INT 				NOT NULL,
	fecharegistro 			DATETIME 		NOT NULL DEFAULT NOW(),
	idusuariomatricula	INT 				NULL,
	estado 					CHAR(1)			NOT NULL DEFAULT '1',
	CONSTRAINT fk_idcapacitacion_mat FOREIGN KEY (idcapacitacion) REFERENCES capacitaciones (idcapacitacion),
	CONSTRAINT fk_idparticipante_mat FOREIGN KEY (idparticipante) REFERENCES usuarios (idusuario),
	CONSTRAINT fk_idusuariomatricula_mat FOREIGN KEY (idusuariomatricula) REFERENCES usuarios (idusuario)
)
ENGINE = INNODB;
























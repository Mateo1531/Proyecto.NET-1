USE capacitaciones;


-- PASO 1: STORE PROCEDURE
DELIMITER $$
CREATE PROCEDURE spu_usuarios_login(IN _username VARCHAR(30))
BEGIN
	SELECT	usuarios.`idusuario`, CONCAT(personas.`apellidos`, ' ', personas.`nombres`)AS 'persona',
				usuarios.`username`, usuarios.`userpassword`
		FROM usuarios 
		INNER JOIN personas ON personas.`idpersona` = usuarios.`idpersona`
		WHERE username = _username AND estado = '1';
END $$

-- UPDATE usuarios SET estado = '1' WHERE idusuario = 3;
-- CALL spu_usuarios_login ('ana');


DELIMITER $$
CREATE PROCEDURE spu_usuarios_actualizarclave
(
	IN _idusuario 			INT,
	IN _userpassword 		VARCHAR(90)		-- NUEVA CONTRASEÑA !!!
)
BEGIN
	UPDATE usuarios SET userpassword = _userpassword WHERE idusuario = _idusuario;
END $$

-- STORE PROCEDURE = Programa / Algoritmo / Input / Output / Nombre / Objeto(BD)
-- STORE PROCEDURE USER (procedimiento almacenado usuario)

DELIMITER $$
CREATE PROCEDURE spu_capacitaciones_registrar
(
	IN _titulo 					VARCHAR(200),
	IN _descripcion			TEXT,
	IN _idresponsable			INT,
	IN _caratula 				VARCHAR(150),
	IN _idusuarioregistro	INT
)
BEGIN

	IF _caratula = '' THEN 
		SET _caratula = NULL;
	END IF;

	INSERT INTO capacitaciones (titulo, descripcion, idresponsable, caratula, idusuarioregistro)
		VALUES (_titulo, _descripcion, _idresponsable, _caratula, _idusuarioregistro);
END $$

-- CALL spu_capacitaciones_registrar('Excel Básico','Conociendo hojas de cálculo', 1, '', 2);
-- CALL spu_capacitaciones_registrar('Normas de seguridad','Empresa segura', 1, '', 2);
-- CALL spu_capacitaciones_registrar('Capacitación COVID','Prevención ante contagios', 1, '001.jpg', 2);
-- SELECT * FROM capacitaciones;

DELIMITER $$
CREATE PROCEDURE spu_capacitaciones_listar(IN _estado CHAR(1))
BEGIN
	SELECT	CPT.idcapacitacion, CPT.titulo, CPT.descripcion,
				CONCAT(PER1.apellidos, ' ', PER1.nombres) AS 'responsable',
				CPT.fecharegistro, CPT.caratula,
				CONCAT(PER2.apellidos, ' ', PER2.nombres) AS 'usuarioregistro'
		FROM capacitaciones CPT
		INNER JOIN usuarios USR1 ON USR1.`idusuario` = CPT.`idresponsable`
		INNER JOIN usuarios USR2 ON USR2.`idusuario` = CPT.`idusuarioregistro`
		INNER JOIN personas PER1 ON PER1.idpersona = USR1.idpersona
		INNER JOIN personas PER2 ON PER2.idpersona = USR2.idpersona
		WHERE CPT.estado = _estado
		ORDER BY CPT.fecharegistro;
END $$


DELIMITER $$
CREATE PROCEDURE spu_capacitaciones_cambiarestado
(
	IN _idcapacitacion 		INT,
	IN _estado 					CHAR(1)
)
BEGIN
	UPDATE capacitaciones SET estado = _estado WHERE idcapacitacion = _idcapacitacion;
END $$

DELIMITER $$
CREATE PROCEDURE spu_capacitaciones_actualizar
(
	IN _idcapacitacion 		INT,
	IN _titulo 					VARCHAR(200),
	IN _descripcion			TEXT,
	IN _idresponsable			INT,
	IN _caratula 				VARCHAR(150),
	IN _idusuarioregistro	INT
)
BEGIN
	UPDATE capacitaciones SET
		-- Actualizando datos...
		titulo = _titulo,
		descripcion = _descripcion,
		idresponsable = _idresponsable,
		caratula = _caratula,
		idusuarioregistro = _idusuarioregistro
	WHERE idcapacitacion = _idcapacitacion;
END $$

-- SELECT * FROM capacitaciones;
-- CALL spu_capacitaciones_cambiarestado(1, '0');
-- CALL spu_capacitaciones_listar('1');
-- CALL spu_capacitaciones_actualizar(3, 'Capacitación COVID19', 'Prevención ante contagios en la empresa', 3, '002.jpg', 1);

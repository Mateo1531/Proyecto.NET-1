-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2022 a las 06:34:45
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataforma_cursos`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `listaTodosCursos` ()  BEGIN
     SELECT * FROM curso c ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_change_password` (IN `_idusuario` INT, `_password` VARCHAR(80))  BEGIN
	UPDATE usuario SET contraseña = _password WHERE id_usuario = _idusuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_create_Curso` (IN `_nombreCurso` VARCHAR(30), IN `_id_instructor` INT, IN `_descripcion` TEXT, IN `_duracion` INT(10), IN `_precio` INT)  BEGIN 
 INSERT INTO curso  (nombre_curso,id_instructor,descripcion,duracion_curso,precio_curso)
 VALUES (_nombreCurso,_id_instructor,_descripcion,_duracion,_precio);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listartodoscurso` ()  BEGIN
SELECT c.*, cat.rama FROM `curso` c 
join categoria cat ON c.id_categoria=cat.id_categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listCategoria` ()  BEGIN
	SELECT * from categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listCurso` (IN `_id_instructor` INT)  BEGIN
     SELECT * FROM curso c  WHERE c.id_instructor= _id_instructor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listUltimoCurso` (IN `_idInstructor` INT)  BEGIN

	select * from curso c where 			  c.id_instructor=_idInstructor 
    order by c.id_curso desc
    limit 1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_login` (IN `_username` VARCHAR(30))  BEGIN
	SELECT usuario.`id_usuario`, perfil.`nombre_completo`, usuario.`nombre_usuario`, usuario.`contraseña`
    FROM usuario 
    INNER JOIN perfil ON perfil.id_perfil = usuario.id_perfil
    WHERE nombre_usuario = _username AND estado = '1';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `rama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion`, `rama`) VALUES
(1, NULL, 'Desarrollo web'),
(2, NULL, 'Ofimatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(30) DEFAULT NULL,
  `id_instructor` int(11) DEFAULT NULL,
  `estado_curso` bit(1) DEFAULT b'1' COMMENT '1(activo) 0(no activo)',
  `id_categoria` int(11) DEFAULT NULL,
  `duracion_curso` varchar(10) DEFAULT NULL,
  `precio_curso` double DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fecha_creacion` date DEFAULT current_timestamp(),
  `imgRuta` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `id_instructor`, `estado_curso`, `id_categoria`, `duracion_curso`, `precio_curso`, `descripcion`, `fecha_creacion`, `imgRuta`) VALUES
(209, 'Word Avanzado', 2, b'1', NULL, '200', 500, 'Utilizar herramientas como WordArt, ClipArt, SmartArt y formas.\r\nAprender a crear referencias y vincularlas con el texto.\r\nFacilitar la navegación en el documento a través del dominio de los estilos.\r', '2022-05-29', 'views/img/imgPublic/209.jpg'),
(216, 'Python', 2, b'1', NULL, '50', 500, 'Python es un lenguaje de alto nivel de programación interpretado cuya filosofía hace hincapié en la legibilidad de su código', '2022-05-29', 'views/img/imgPublic/216.jpg'),
(217, 'Dieseño Grafico', 2, b'1', NULL, '100', 1200, 'Curso avanzado de diseño web orientado para la creacion, maquetacion de una webpage', '2022-05-30', 'views/img/imgPublic/217.'),
(218, 'Programacion orienta a objetos', 2, b'1', NULL, '20', 200, 'Programacion orienta a objetos (basico) (POO)', '2022-05-30', 'views/img/imgPublic/218.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_pago` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `fecha_inscripcion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id_instructor` int(11) NOT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `clasificacion` varchar(20) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `cuenta_bancaria` int(11) DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id_instructor`, `id_perfil`, `clasificacion`, `fecha_registro`, `cuenta_bancaria`, `estado`) VALUES
(1, 1, 'Administrador', '2022-04-15', 137, b'1'),
(2, 2, 'Programador', '2022-04-30', NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `tipo_pago` varchar(20) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre_completo` varchar(50) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `numero_documento` varchar(20) DEFAULT NULL,
  `profesion` varchar(30) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nombre_completo`, `correo`, `numero_documento`, `profesion`, `pais`, `direccion`, `telefono`, `fecha_nacimiento`, `genero`) VALUES
(1, 'Mauricio Gabriel Vega Huamanga', 'mauvega@gmail.com', '65321452', 'Administración', 'Perú', NULL, 965321002, '1988-05-24', 'M'),
(2, 'Fiorella Julia Hernandez Garcia', 'fiohernandez@gmail.c', '70543210', 'Ingeniería de Sistemas', 'Perú', NULL, 963700120, '1994-05-12', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_rol` varchar(20) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `id_usuario`, `tipo_rol`, `descripcion`) VALUES
(1, 1, 'admin', NULL),
(2, 2, 'user', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(30) DEFAULT NULL,
  `contraseña` varchar(80) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `rutaImg` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_perfil`, `nombre_usuario`, `contraseña`, `estado`, `rutaImg`) VALUES
(1, 1, 'Maurucio', '$2y$10$AsboDdzC.YYsuTN81Qz2R.snagk4/nkx91GcPccq9HFwN1rOCOie2', 1, ''),
(2, 2, 'Fiorella', '$2y$10$AsboDdzC.YYsuTN81Qz2R.snagk4/nkx91GcPccq9HFwN1rOCOie2', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripcion`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id_instructor`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_idperfil_usr` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  MODIFY `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id_instructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_idperfil_usr` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_login`(IN _username VARCHAR(30))
BEGIN
	SELECT usuario.`id_usuario`, perfil.`nombre_completo`, usuario.`nombre_usuario`, usuario.`contraseña`
    FROM usuario 
    INNER JOIN perfil ON perfil.id_perfil = usuario.id_perfil
    WHERE nombre_usuario = _username AND estado = '1';
END;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_change_password`(IN _idusuario INT, 	 VARCHAR(80))
BEGIN
	UPDATE usuario SET contraseña = _password WHERE id_usuario = _idusuario;
END;

DELIMITER $$ 
CREATE DEFINER=root@localhost PROCEDURE sp_create_Curso
	(IN _nombreCurso VARCHAR(30), 
    IN _idIntructor INT, 
    IN _descripcion INT, 
    IN _duracion VARCHAR(10), 
    IN _precio INT) 
BEGIN   
	INSERT INTO curso  (nombre_curso, id_instructor, descripcion, duracion_curso, precio_curso)  
	VALUES (_nombreCurso, _idIntructor, _descripcion, _duracion,_precio); 
END $$ 
DELIMITER ;

DELIMITER $$
CREATE DEFINER=root@localhost PROCEDURE sp_listCategoria()
    COMMENT 'Lista las categorias'
BEGIN
  SELECT * FROM curso c 
  JOIN categoria cat ON  c.id_categoria=cat.id_categoria;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=root@localhost PROCEDURE sp_cambiar_curso(
	IN _idIntructor INT, 
	IN _idcurso INT,
	IN _nombreCurso VARCHAR(30), 
    IN _estado INT,
    IN _categoria INT,
    IN _duracion VARCHAR(10), 
    IN _precio INT,
    IN _descripcion INT 
)
BEGIN
	UPDATE curso SET 
		nombre_curso = IFNULL (_nombreCurso, nombre_curso),
        estado_curso = IFNULL (_estado, estado_curso),
        id_categoria = IFNULL (_categoria, id_categoria),
        descripcion = IFNULL (_descripcion, descripcion),
        duracion_curso = IFNULL (_duracion, duracion_curso),
        precio_curso = IFNULL (_precio, precio_curso) WHERE id_instructor = _idIntructor AND id_curso = _idcurso;
END$$
DELIMITER ;

DROP PROCEDURE sp_crear_usuario;

DELIMITER $$sp_change_password
CREATE DEFINER=root@localhost PROCEDURE sp_crear_usuario(
	IN _nombre VARCHAR(30),
    IN _correo VARCHAR(20),
    IN _telefono INT(11),
    IN _contraseña VARCHAR(80))
BEGIN
  INSERT INTO perfil (nombre_completo, correo, telefono)
  VALUES (_nombre, _correo, _telefono);
  SET @id = (SELECT MAX(id_perfil) FROM perfil);
  INSERT INTO usuario (id_perfil, nombre_usuario, contraseña)
  VALUES (@id, _correo, _contraseña);
END$$
DELIMITER ;
-- CALL sp_crear_usuario('Luis Bros','luis@gmail.com','915001456','123456');

-- DELIMITER $$
-- CREATE TRIGGER newUser AFTER INSERT ON `perfil`
--     FOR EACH ROW
--     INSERT INTO usuario
--     (id_perfil, nombre_usuario)
--     VALUES
--     (NEW.id_perfil, NEW.correo);
-- $$
-- DELIMITER ;
-- CALL sp_cambiar_curso('1','4',null,'1',null,null,null,null);
SELECT * FROM usuario;
SELECT * FROM perfil;

SHOW ENGINE INNODB STATUS;
-- SELECT COLUMN_NAME FROM `COLUMNS` C 
-- WHERE table_name = 'subscribers_preferences' AND COLUMN_NAME LIKE _strong_1 INTO @columns;

-- SET @table = 'subscribers_preferences';
-- SET @s = CONCAT('UPDATE ',@table,' SET ', @columns = 1);

-- PREPARE stmt FROM @s;
-- EXECUTE stmt;

-- DELETE FROM usuario WHERE id_usuario > 10 AND id_usuario < 15;
-- SELECT * FROM curso WHERE id_instructor = 1 AND id_curso = 4;

SET FOREIGN_KEY_CHECKS=0;
ALTER TABLE curso ADD CONSTRAINT fk_id_instructor_crs FOREIGN KEY (id_instructor) REFERENCES instructor (id_instructor);
ALTER TABLE instructor ADD CONSTRAINT fk_id_perfil_inst FOREIGN KEY (id_perfil) REFERENCES perfil (id_perfil);
ALTER TABLE rol ADD CONSTRAINT fk_id_usuario_rol FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE curso ADD CONSTRAINT fk_id_categoria_crs FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria);
ALTER TABLE inscripcion ADD CONSTRAINT fk_id_usuario_insc FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE inscripcion ADD CONSTRAINT fk_id_pago_insc FOREIGN KEY (id_pago) REFERENCES pago (id_pago);
ALTER TABLE inscripcion ADD CONSTRAINT fk_id_curso_insc FOREIGN KEY (id_curso) REFERENCES curso (id_curso);
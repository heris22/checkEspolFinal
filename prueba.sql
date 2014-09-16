-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2014 a las 04:58:33
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `idcarrera` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idfacultad` int(3) NOT NULL,
  PRIMARY KEY (`idcarrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idcarrera`, `nombre`, `idfacultad`) VALUES
(1, 'Licenciatura en Sistemas', 3),
(2, 'Licenciatura en Diseño Web y Multimedia', 1),
(3, 'Licenciatura en Diseño Gráfico y Publicitario', 1),
(4, 'Licenciatura en Diseño y Producción Audiovisual', 18),
(18, ' asdads', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `idclub` int(3) NOT NULL AUTO_INCREMENT,
  `nombreclub` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `informacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `mision` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `vision` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idclub`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=45 ;

--
-- Volcado de datos para la tabla `club`
--

INSERT INTO `club` (`idclub`, `nombreclub`, `informacion`, `mision`, `vision`, `contacto`, `twitter`, `imagen`) VALUES
(33, 'CODIES', 'CODIES es una agrupación conformada por estudiantes de todas las facultades e institutos de la ESPOL, comprometidos con la Tecnología y Comunicación.', 'Desarrollar espacios de comunicación digitales y contenidos de calidad, con las herramientas tecnológicas existentes y el talento estudiantil, con compromiso y liderazgo, que contribuyan al fortalecimiento de los vínculos de comunicación ', 'Áreas de Trabajo: Social Media, Periodismo Digital, Diseño Gráfico, Periodismo Científico, Bloggs, Microbloggs, Redes Sociales, Desarrollo Web, Publicidad, E-Marketing, Multimedia, Relaciones Públicas, ', '	http://www.codies.espol.edu.ec', 'codi.espol@gmail.com', 'subidas/clubs/codies.jpg'),
(34, 'ECO', 'Somos un equipo multidisciplinario del \nVoluntariado Universitario de ESPOL \nque trabaja en pro de la conservación del \nmedio ambiente, realizando actividades y \nproyectos dentro y fuera de ESPOL.', '“Fomentar la conciencia ecológica en la co-\nmunidad para inculcar una cultura de desa-\nrrollo sostenible.”', '“Ser un grupo referente en la conservación y \npreservación del ambiente.”', 'ecoclubespol@gmail.com', '@ecoclubespol', 'subidas/clubs/eco.jpg'),
(35, 'EMPRENDEDORES', 'El mundo es tuyo… sueña, emprende y VIVE!!!… Guayaquil - Ecuador', 'El Club de Emprendedores de la ESPOL tiene como objeto exclusivo el fomento y la práctica de actitudes emprendedoras, creativas e innovadoras.', 'ESPOL - Campus Gustavo Galindo Km 30.5 Via Perimetral - Edif. Central FIEC - Planta Baja - Area C - Preincubadora 3', 'clubemprendedores@espol.edu.ec', '@clubemprendedores', 'subidas/clubs/empre.jpg'),
(36, 'FANPOL', ' Club estudiantil de ESPOL de orientación cultural, reúne a los politécnicos amantes del anime, manga, videojuegos y de la cultura asiática.', '"Fomentar el desarrollo de la cultura asiática en nuestro país, así como la creatividad y talentos de los estudiantes universitarios".', '"Promover la unidad y la creatividad, realizando actividades divertidas con personas con los mismos intereses."', 'fanpol@outlook.com', 'https://twitter.com/FanpolEspol', 'subidas/clubs/fanpol.jpg'),
(37, 'CLUB FOTOGRAFICO', 'Si tienes talento en la fotografía y quieres pertenecer a nuestro Club animate te esperamos', 'Buscamos fomentar el arte fotográfico en Ecuador. Reunir talentosos fotógrafos de la ESPOL para servir a la comunidad.', 'Buscamos fomentar el arte fotográfico en Ecuador. Reunir talentosos fotógrafos de la ESPOL para servir a la comunidad y crear un mejor futuro', 'clubfotografíco@espol.edu.ec', 'https://twitter.com/CEFotografico', 'subidas/clubs/foto.jpg'),
(38, 'KOKOA', 'Somos un grupo de investigadores y estudiantes de la ESPOL interesados en promover el uso y distribución del Software Libre.', 'Es una comunidad que se preocupa por la distribución, desarrollo, implementación y aprendizaje de software y tecnologías libres. Realizamos y colaboramos con múltiples departamentos dentro de la ESPOL para desarrollar proyectos de índole académico', 'articipamos en diferentes eventos a nivel local y nacional para la innovación de tecnologías, elaboramos talleres y capacitaciones para ayudar a la comunidad en múltiples necesidades académicas. ', 'http://kokoa.espol.edu.ec/', 'https://twitter.com/kokoaespol', 'subidas/clubs/kokoa.jpg'),
(39, 'ROBOTA', 'Robota fue creado en el 2007 por estudiantes de Ingeniería Mecánica de ESPOL. - See more at: http://blog.espol.edu.ec/robota/about/#sthash.c73eqDos.dpuf', 'El lugar de trabajo de ROBOTA se encuentra en la Facultad de Ingeniería Mecánica y Ciencias de la Producción (FIMCP).', 'El lugar de trabajo de ROBOTA se encuentra en la Facultad de Ingeniería Mecánica y Ciencias de la Producción (FIMCP). ', 'http://blog.espol.edu.ec/robota/about/', 'http://twitter/robota', 'subidas/clubs/robota.jpg'),
(40, 'TAWS', 'Somos un grupo de estudiantes y profesionales de diversas especialidades, interesados en investigar y desarrollar sobre tecnologías web emergentes.', 'Contribuir a la formación de jóvenes investigadores, precursores en el desarrollo de aplicaciones, fomentando el uso de nuevas tecnologías informáticas.', 'Ser profesionales líderes y promotores de proyectos Informáticos y sus aplicaciones de acuerdo a las necesidades que la comunidad requiera satisfacer en el plano educativo, comercial y laboral en general.', 'taws@espol.edu.ec', 'Twitter: taws_espol', 'subidas/clubs/taws.jpg'),
(41, 'TWEENING', 'El club Tweening es la génesis de un estudio de diseño y animación. En sus horas libres -que son pocas-, los alumnos de Diseño Gráfico y Web ponen en práctica las clases de modelaje en 3D y Animación. El producto final: videojuegos, cómics, cortometr', 'En este club estudiantil, las grandes industrias de animación como Pixar son solo un referente. Los jóvenes buscan guiones originales y personajes frescos para luego escanearlos, vectorizarlos y modelarlos digitalmente\n\n', 'Pero la tendencia crece y en Tweening están convencidos. Otra muestra de su decisión para llegar a las grandes ligas es el cortometraje ‘Milenaria’, en stop motion.\n\n', 'https://www.facebook.com/tweening.animation/info', 'https://twitter.com/TweeningStudio', 'subidas/clubs/twen.jpg'),
(44, 'dsfsdfsdf', 'sdfsdfsdfsdfsdf', 'sdfsdfsdfadfs', 'asdfsadf', 'sadfsadf', 'sadfsadf', 'subidas/clubs/Penguins.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comedor`
--

CREATE TABLE IF NOT EXISTS `comedor` (
  `idcomedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  PRIMARY KEY (`idcomedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `comedor`
--

INSERT INTO `comedor` (`idcomedor`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Pasteles de Alberto', 'Buenos pasteles de carne y chorizo', 'subidas/comedores/DSC_0078.JPG'),
(2, 'Malicia', 'Comida típica ecuatoriana', 'subidas/comedores/DSC_0080.JPG'),
(3, 'Pasteles el Chino', 'Buenos pasteles con sabor criollo', 'subidas/comedores/DSC_0082.JPG'),
(8, ' NEO', ' Comída típica ecuatoriana, arroz con menestr', 'subidas/comedores/DSC_0083.JPG'),
(9, 'Don German''s Frutangas Express', ' Comida saludable, batidos, frutas, tostadas.', 'subidas/comedores/DSC_0085.JPG'),
(10, ' Lo mejor de lo nuestro', 'Comida criolla ', 'subidas/comedores/DSC_0086.JPG'),
(11, ' La carreta de Toño', ' Piqueos, burritos, tacos, hamburguesas', 'subidas/comedores/DSC_0087.JPG'),
(12, ' Bar Panchos', ' Deliciosos Yapingachos', 'subidas/comedores/DSC_0084.JPG'),
(13, 'Comoimevoi ', 'Desayunos típicos y piqueos', 'subidas/comedores/DSC_0090.JPG'),
(14, ' LaBarca', ' Almuerzos ejecutivos', 'subidas/comedores/DSC_0089.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idcomentario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idcomentario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idcomentario`, `descripcion`) VALUES
(1, 'probando basura :D'),
(2, 'tomando tu comentario hahahahaha'),
(3, 'comentarioooooooooooooooooooooooo'),
(4, 'segundo comentario venga'),
(5, 'sdfsdfsffsdfsdfsdf'),
(6, 'hola'),
(7, 'comentario telematica'),
(8, 'vengavenga'),
(9, 'comentpa este man'),
(10, 'contario segundo profesor'),
(11, 'ojala sirva'),
(12, 'porque si te envias'),
(13, 'escribe cuaoquier cosa'),
(14, 'VECTOR 70599'),
(15, 'comentario para malicia'),
(16, 'comentario para pasteles de alberto'),
(17, 'pasteles alberto son buenos'),
(18, 'alberto es lo fucking'),
(19, 'comentario para jorge alberto perez'),
(20, 'asdasdad'),
(21, 'prorbando'),
(22, 'chinooooooooooooooo'),
(23, 'los almuerzos de neo son buenos'),
(24, 'Este profesor es muy bueno para enseñar progr'),
(25, 'sin duda los mejores platos de Espol'),
(26, 'probanco'),
(27, 'waaaa funcionoooo al fiiiiin'),
(28, 'Están malos y caros'),
(29, 'comentario de prueba'),
(30, 'demoran demasiado en atender, pero los sanduc'),
(31, 'los yapingachos son ricos'),
(32, 'blah'),
(33, 'su metodologia es excelente para la materia'),
(34, 'probando comnetarios'),
(35, 'excelente metodologia'),
(36, 'copmidaaaaaaaaaaaaaaaaaaaaaa'),
(37, ''),
(38, ''),
(39, ''),
(40, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariocomedor`
--

CREATE TABLE IF NOT EXISTS `comentariocomedor` (
  `idcomentariocomedor` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idcomedor` int(11) NOT NULL,
  `idcomentario` int(11) NOT NULL,
  PRIMARY KEY (`idcomentariocomedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `comentariocomedor`
--

INSERT INTO `comentariocomedor` (`idcomentariocomedor`, `idusuario`, `idcomedor`, `idcomentario`) VALUES
(1, 2, 2, 15),
(2, 2, 1, 16),
(3, 2, 1, 17),
(4, 2, 1, 18),
(5, 2, 1, 20),
(6, 2, 1, 21),
(7, 2, 3, 22),
(8, 2, 8, 23),
(9, 2, 8, 25),
(10, 2, 1, 26),
(11, 2, 1, 27),
(12, 2, 1, 28),
(13, 2, 9, 0),
(14, 2, 8, 31),
(15, 2, 9, 32),
(16, 2, 1, 36),
(17, 0, 0, 37),
(18, 0, 0, 37);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioprofesor`
--

CREATE TABLE IF NOT EXISTS `comentarioprofesor` (
  `idcomentarioprofesor` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idprofesor` int(11) NOT NULL,
  `idcomentario` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  PRIMARY KEY (`idcomentarioprofesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `comentarioprofesor`
--

INSERT INTO `comentarioprofesor` (`idcomentarioprofesor`, `idusuario`, `idprofesor`, `idcomentario`, `idmateria`) VALUES
(1, 4, 1, 1, 3),
(2, 1, 1, 9, 1),
(3, 1, 1, 11, 1),
(4, 1, 1, 0, 1),
(5, 1, 1, 3, 1),
(6, 1, 1, 4, 1),
(7, 1, 1, 5, 1),
(8, 1, 1, 6, 1),
(9, 2, 2, 7, 1),
(10, 1, 1, 8, 1),
(11, 2, 2, 9, 1),
(12, 2, 2, 10, 1),
(13, 2, 2, 11, 1),
(14, 1, 1, 12, 1),
(15, 2, 2, 13, 1),
(16, 2, 2, 14, 1),
(17, 2, 2, 19, 1),
(18, 1, 2, 0, 2),
(19, 1, 1, 29, 1),
(20, 1, 2, 33, 1),
(21, 1, 1, 34, 1),
(22, 1, 2, 35, 1),
(23, 0, 0, 37, 0),
(24, 0, 0, 37, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
  `idfacultad` int(3) NOT NULL AUTO_INCREMENT,
  `siglas` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idfacultad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`idfacultad`, `siglas`, `nombre`, `imagen`) VALUES
(1, 'EDCOM', 'Escuela de Diseño y Comunicación', 'subidas/facultades/edcom.png'),
(2, 'FCNM', 'Facultad de Ciencias Naturales y Matemáticas', 'subidas/facultades/Nueva-imagen2.png'),
(3, 'FCSH', 'Facultad de Ciencias Sociales y Humanísticas', 'subidas/facultades/fsch.jpg'),
(4, 'FICT', 'Facultad de Ingeniería en Ciencias de la Tierra', 'subidas/facultades/fict.png'),
(5, 'FIEC', 'Facultad de Ingeniería en Electricidad y Computación', 'subidas/facultades/fiec.jpg'),
(18, 'FIMCBOR', 'Facultad de Ingeniería Marítima y Ciencias Biológicas', 'subidas/facultades/fimcbor.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `idmateria` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idfacultad` int(3) NOT NULL,
  `idcarrera` int(3) NOT NULL,
  PRIMARY KEY (`idmateria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=89 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idmateria`, `nombre`, `idfacultad`, `idcarrera`) VALUES
(1, 'Ecología', 1, 1),
(2, 'Programación de Sitios Web', 1, 1),
(3, 'Estructura de Datos', 1, 1),
(4, 'Bases de Datos', 1, 1),
(5, 'Contabilidad I', 1, 1),
(6, 'Herramientas de Colaboración Digital', 1, 1),
(7, 'Informática Básica', 1, 1),
(8, 'Matemáticas I', 1, 1),
(9, 'Análisis de Sistemas', 1, 1),
(10, 'Fundamentos de Administración', 1, 1),
(11, 'Estructura de Datos', 1, 1),
(12, 'Matemáticas Financiera', 1, 1),
(13, 'Contabilidad II', 1, 1),
(14, 'Programación Visual', 1, 1),
(15, 'Bases de Datos', 1, 1),
(17, 'Ecología', 1, 3),
(19, ' Fundamentos de Programación Orientado a Objetos', 1, 1),
(20, ' Programación Avanzada Orientada a Objetos', 1, 1),
(21, 'Tec. Exp. Oral y Escrita', 1, 1),
(22, ' Técnicas de Documentación e Investigación', 1, 1),
(23, ' Int. a Redes y Computadoras', 1, 1),
(24, ' Aplicaciones Distribuidas', 1, 1),
(25, ' Sistemas Integrados', 1, 1),
(26, ' Investigación de Operaciones', 1, 1),
(27, ' Sistemas Operativos', 1, 1),
(28, 'Metodología de Desarrollo de Software', 1, 1),
(29, 'Organización de Computadoras', 1, 1),
(30, 'Administración de Servidores', 1, 1),
(31, 'Sistemas de Gestión de Calidad', 1, 1),
(32, 'Organización y Métodos II', 1, 1),
(33, 'Estadística', 1, 1),
(34, 'Finanzas I', 1, 1),
(35, 'Redes de Computadoras', 1, 1),
(36, 'Auditoria de Sistemas y Seguridad de Infraestructu', 1, 1),
(37, 'Sistemas de Información', 1, 1),
(38, 'Formulación y Evaluación de Proyectos', 1, 1),
(39, 'Finanzas II', 1, 1),
(40, 'Internet y Arquitecturas Orientadas a Servicios', 1, 1),
(41, 'Emprendimiento e Innovación Tecnológica', 1, 1),
(42, 'Sistema de Toma de Decisiones', 1, 1),
(43, 'Plan y Control de Proyectos', 1, 1),
(44, 'Interacción Hombre Máquina', 1, 1),
(45, 'Emulación de Negocios', 1, 1),
(46, ' Herramientas de Colaboración Digital', 1, 2),
(47, 'Fundamentos del Diseño Gráfico', 1, 2),
(48, 'Matemáticas I', 1, 2),
(49, 'Informática Básica', 1, 2),
(50, 'Fundamentos de Programación', 1, 2),
(51, 'Color Digital', 1, 2),
(52, 'Métodos Matemáticos de Animación', 1, 2),
(53, 'Análisis de Requerimientos de Usuario', 1, 2),
(54, 'Fundamentos de Programación Orientada a Objetos', 1, 2),
(55, 'Int. a Redes y Computadoras', 1, 2),
(56, 'Software de Ilustración', 1, 2),
(57, 'Base de Datos', 1, 2),
(58, 'Programación Avanzada Orientada a Objetos', 1, 2),
(59, 'Sistemas Operativos', 1, 2),
(60, 'Software de Procesamiento de Imágenes', 1, 2),
(61, 'Diseño de Sitios Web', 1, 2),
(62, 'Programación Visual', 1, 2),
(63, 'Administración de Servidores', 1, 2),
(64, 'Principios de Animación', 1, 2),
(65, 'Guión Audiovisual', 1, 2),
(66, 'Diseño Web', 1, 2),
(67, 'Programación de Sitios Web', 1, 2),
(68, 'Seguridades de Software', 1, 2),
(69, 'Composición Digital', 1, 2),
(70, 'Animación Web', 1, 2),
(71, 'Diseño del Sonido', 1, 2),
(72, 'Interacción Hombre Máquina', 1, 2),
(73, 'Modelado y Animación 3D', 1, 2),
(74, 'Programación Script', 1, 2),
(75, 'Autoría I (Diseño y Multimedia)', 1, 2),
(76, 'Autoría 2 (Programación y Multimedia)', 1, 2),
(77, 'Administradores de Contenido', 1, 2),
(78, 'Emprendimiento e Innovación Tecnológica', 1, 2),
(79, 'E-Commerce', 1, 2),
(80, 'Finanzas para Proyectos', 1, 2),
(81, 'Investigación y Desarrollo', 1, 2),
(82, 'Desarrollo de Videojuegos', 1, 2),
(83, 'Ecología y Educación Ambiental', 1, 2),
(84, 'E-Marketing', 1, 2),
(85, 'Formulación y Evaluación de Proyectos', 1, 2),
(86, 'Aplicaciones Multimedias Interactivas', 1, 2),
(87, 'Dispositivos Móviles', 1, 2),
(88, 'Gestión y Control de Proyectos', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `idprofesor` int(3) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tercernivel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `masterado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idprofesor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idprofesor`, `nombres`, `apellidos`, `tercernivel`, `masterado`) VALUES
(1, 'MARCELA CARINA', 'ZAMBRANO OLIVO', 'Ingeniería Civil', 'Administración de Empresas'),
(2, 'JORGE CARLOS', 'PEREZ CAÑIZARES', 'Ingeniería en Telemática', 'Administración de Empresas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesorpormateria`
--

CREATE TABLE IF NOT EXISTS `profesorpormateria` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `idprofesor` int(3) NOT NULL,
  `idmateria` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `profesorpormateria`
--

INSERT INTO `profesorpormateria` (`id`, `idprofesor`, `idmateria`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 4),
(5, 3, 4),
(6, 3, 1),
(7, 2, 3),
(8, 3, 3),
(10, 2, 2),
(12, 2, 1),
(13, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `username`, `email`, `password`, `imagen`) VALUES
(1, 'Invitado', 'Invitado', 'Invitado', '202cb962ac59075b964b07152d234b70', 'subidas/usuario/7023902.jpg'),
(4, 'andres', 'heris', 'asdasd@hotmail.com', '202cb962ac59075b964b07152d234b70', 'subidas/usuario/5.jpg'),
(5, 'Yamilet', 'yamulema', 'flyleaf_yecc_krb@hotmail.com', 'cc70903297fe1e25537ae50aea186306', 'subidas/usuario/yo lo se.jpg'),
(48, 'Abraham', 'lafuente', 'poringa@hotmail.com', '2e65f2f2fdaf6c699b223c61b1b5ab89', 'subidas/usuario/gatita.jpg'),
(49, 'josty', 'virgo', 'jostym95@hotmail.com', '2e65f2f2fdaf6c699b223c61b1b5ab89', 'subidas/usuario/fondoFacultades.png'),
(50, 'holas', 'venga92', 'venga@hotmail.com', '202cb962ac59075b964b07152d234b70', 'subidas/usuario/fondoFacultades.png'),
(51, 'administrador', 'administrador', 'administrador@hotmail.com', '91f5167c34c400758115c2a6826ec2e3', 'subidas/usuario/bg_player_profile_default_big.png'),
(52, 'Josty', 'Jostym1995', 'josty-12@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'subidas/usuario/profile_picture_by_kid_with_a_pencil-d4w7wqx.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

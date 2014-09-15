-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2014 a las 23:55:58
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

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
`idcarrera` int(3) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idfacultad` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idcarrera`, `nombre`, `idfacultad`) VALUES
(1, 'Licenciatura en Sistemas de Información', 1),
(2, 'Licenciatura en Diseño Web y Multimedia', 1),
(3, 'Licenciatura en Diseño Gráfico y Publicitario', 1),
(4, 'Licenciatura en Diseño y Producción Audiovisual', 1),
(17, 'asdasdasd', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club`
--

CREATE TABLE IF NOT EXISTS `club` (
`idclub` int(3) NOT NULL,
  `nombreclub` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `informacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `mision` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `vision` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=42 ;

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
(41, 'TWEENING', 'El club Tweening es la génesis de un estudio de diseño y animación. En sus horas libres -que son pocas-, los alumnos de Diseño Gráfico y Web ponen en práctica las clases de modelaje en 3D y Animación. El producto final: videojuegos, cómics, cortometr', 'En este club estudiantil, las grandes industrias de animación como Pixar son solo un referente. Los jóvenes buscan guiones originales y personajes frescos para luego escanearlos, vectorizarlos y modelarlos digitalmente\n\n', 'Pero la tendencia crece y en Tweening están convencidos. Otra muestra de su decisión para llegar a las grandes ligas es el cortometraje ‘Milenaria’, en stop motion.\n\n', 'https://www.facebook.com/tweening.animation/info', 'https://twitter.com/TweeningStudio', 'subidas/clubs/twen.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comedor`
--

CREATE TABLE IF NOT EXISTS `comedor` (
`idcomedor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `imagen` varchar(45) NOT NULL
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
`idcomentario` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(22, 'chinooooooooooooooo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariocomedor`
--

CREATE TABLE IF NOT EXISTS `comentariocomedor` (
`idcomentariocomedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcomedor` int(11) NOT NULL,
  `idcomentario` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

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
(7, 2, 3, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioprofesor`
--

CREATE TABLE IF NOT EXISTS `comentarioprofesor` (
`idcomentarioprofesor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idprofesor` int(11) NOT NULL,
  `idcomentario` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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
(17, 2, 2, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
`idfacultad` int(3) NOT NULL,
  `siglas` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

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
`idmateria` int(3) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idfacultad` int(3) NOT NULL,
  `idcarrera` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=18 ;

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
(16, 'Diseño de Sistemas', 1, 2),
(17, 'Ecología', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
`idprofesor` int(3) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tercernivel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `masterado` varchar(50) COLLATE utf8_spanish_ci NOT NULL
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
`id` int(3) NOT NULL,
  `idprofesor` int(3) NOT NULL,
  `idmateria` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `profesorpormateria`
--

INSERT INTO `profesorpormateria` (`id`, `idprofesor`, `idmateria`) VALUES
(4, 1, 1),
(5, 3, 4),
(6, 3, 1),
(7, 2, 3),
(8, 3, 3),
(9, 1, 4),
(30, 2, 2),
(32, 2, 7),
(34, 2, 10),
(35, 2, 8),
(36, 2, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idusuario` int(4) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `username`, `email`, `password`, `imagen`) VALUES
(1, 'Invitado', 'Invitado', 'Invitado', '123', 'subidas/usuario/7023902.jpg'),
(4, 'andres', 'heris', 'asdasd@hotmail.com', '123', 'subidas/usuario/5.jpg'),
(5, 'Yamilet', 'yamulema', 'flyleaf_yecc_krb@hotmail.com', '2621', 'subidas/usuario/yo lo se.jpg'),
(48, 'Abraham', 'lafuente', 'poringa@hotmail.com', '', 'subidas/usuario/gatita.jpg'),
(49, 'josty', 'virgo', 'jostym95@hotmail.com', '741', 'subidas/usuario/fondoFacultades.png'),
(50, 'asd', 'asd', 'asdasdasdasdasd@asdasd.com', '123', 'subidas/usuario/fondoFacultades.png'),
(51, 'Administrador', 'Administrador', 'administrador', 'administrador', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
 ADD PRIMARY KEY (`idcarrera`);

--
-- Indices de la tabla `club`
--
ALTER TABLE `club`
 ADD PRIMARY KEY (`idclub`);

--
-- Indices de la tabla `comedor`
--
ALTER TABLE `comedor`
 ADD PRIMARY KEY (`idcomedor`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
 ADD PRIMARY KEY (`idcomentario`);

--
-- Indices de la tabla `comentariocomedor`
--
ALTER TABLE `comentariocomedor`
 ADD PRIMARY KEY (`idcomentariocomedor`);

--
-- Indices de la tabla `comentarioprofesor`
--
ALTER TABLE `comentarioprofesor`
 ADD PRIMARY KEY (`idcomentarioprofesor`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
 ADD PRIMARY KEY (`idfacultad`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
 ADD PRIMARY KEY (`idmateria`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
 ADD PRIMARY KEY (`idprofesor`);

--
-- Indices de la tabla `profesorpormateria`
--
ALTER TABLE `profesorpormateria`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
MODIFY `idcarrera` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `club`
--
ALTER TABLE `club`
MODIFY `idclub` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `comedor`
--
ALTER TABLE `comedor`
MODIFY `idcomedor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
MODIFY `idcomentario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `comentariocomedor`
--
ALTER TABLE `comentariocomedor`
MODIFY `idcomentariocomedor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `comentarioprofesor`
--
ALTER TABLE `comentarioprofesor`
MODIFY `idcomentarioprofesor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
MODIFY `idfacultad` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
MODIFY `idmateria` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
MODIFY `idprofesor` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `profesorpormateria`
--
ALTER TABLE `profesorpormateria`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idusuario` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-01-2026 a las 13:30:24
-- Versión del servidor: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestimal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `codigo` varchar(4) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precioCompra` double NOT NULL,
  `precioVenta` double NOT NULL,
  `margen` double NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`codigo`, `descripcion`, `precioCompra`, `precioVenta`, `margen`, `stock`) VALUES
('Ep87', 'estuche de camuflaje pequeño', 3, 5, 2, 10),
('g60i', 'cascos gaming con luces led y micrófono', 20, 50, 30, 11),
('hr89', 'silla ergonómica de oficina', 200, 250, 50, 12),
('hs24', 'botella de aluminio de 500ml', 7, 10, 3, 5),
('kd93', 'monitor 4k', 300, 350, 50, 5),
('lf46', 'camiseta deportiva fit Nike ', 20, 50, 30, 22),
('Lgg4', 'Altavoces 5.1 sonido envolvente', 100, 180, 80, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `dia` varchar(50) NOT NULL,
  `primera` varchar(100) NOT NULL,
  `segunda` varchar(100) NOT NULL,
  `tercera` varchar(100) NOT NULL,
  `cuarta` varchar(100) NOT NULL,
  `quinta` varchar(100) NOT NULL,
  `sexta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`dia`, `primera`, `segunda`, `tercera`, `cuarta`, `quinta`, `sexta`) VALUES
('Jueves', 'Despliegue', 'Despliegue', 'Entorno Cliente', 'Entorno Cliente', 'IPEII', 'Optativa'),
('Lunes', 'Inglés', 'Inglés', 'IPEII', 'IPEII', 'Proyecto Intermodular', 'Proyecto Intermodular'),
('Martes', 'Optativa', 'Optativa', 'Diseño de interfaces web', 'Diseño de interfaces web', 'Diseño de interfaces web', 'Diseño de interfaces web'),
('Miércoles', 'Entorno Servidor', 'Entorno Servidor', 'Entorno Servidor', 'Entorno Servidor', 'Entorno Cliente', 'Entorno Cliente'),
('Viernes', 'Entorno Cliente', 'Entorno Cliente', 'Entorno Servidor', 'Entorno Servidor', 'Entorno Servidor', 'Diseño de interfaces web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda7`
--

CREATE TABLE `tienda7` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tienda7`
--

INSERT INTO `tienda7` (`id`, `nombre`, `precio`, `imagen`, `descripcion`) VALUES
(1, 'teclado', 15, 'img/teclado.avif', 'Se utiliza principalmente para introducir texto, datos y comandos específicos en la computadora'),
(2, 'monitor', 150, 'img/monitor.jpg', 'Su función es mostrar de forma visual la información y los datos procesados por el ordenador'),
(3, 'dualsense', 80, 'img/dualsense.jpg', 'Es el mando inalámbrico oficial de la consola PlayStation 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendaZapatos`
--

CREATE TABLE `tiendaZapatos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tiendaZapatos`
--

INSERT INTO `tiendaZapatos` (`id`, `nombre`, `precio`, `imagen`, `descripcion`) VALUES
(1, 'Air Force 1', 80, 'img/force1.jpg', 'Cómodas, duraderas y atemporales: son las número 1 por una razón. El diseño clásico de los 80 se combina con piel lisa y detalles llamativos para conseguir un estilo perfecto tanto en la cancha como fuera de ella'),
(3, 'Air Jordan 1', 140, 'img/jordan1.png', 'Inspirada en las AJ1 originales, esta edición de perfil medio mantiene el look icónico que más te gusta, y los colores elegidos y la piel impecable aportan una identidad distintiva'),
(4, 'Pegasus 41', 150, 'img/pegasus.jpg', 'La amortiguación reactiva de las Pegasus ofrece una pisada enérgica para el running diario sobre asfalto'),
(5, 'Mercurial vapor 16', 260, 'img/mercurial.png', '¿Te obsesiona la velocidad? A las estrellas de fútbol también. Por eso hemos diseñado estas botas Elite con una unidad Air Zoom de 3/4 mejorada'),
(6, 'Vomero 18', 140.99, 'img/vomero18.jpg', 'La geometría de balancín aumentada permite unas transiciones más suaves del talón a la puntera.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`dia`);

--
-- Indices de la tabla `tienda7`
--
ALTER TABLE `tienda7`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiendaZapatos`
--
ALTER TABLE `tiendaZapatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tienda7`
--
ALTER TABLE `tienda7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tiendaZapatos`
--
ALTER TABLE `tiendaZapatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

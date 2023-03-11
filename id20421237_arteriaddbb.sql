-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-03-2023 a las 00:43:27
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id20421237_arteriaddbb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `num` int(100) NOT NULL,
  `cod` int(100) NOT NULL,
  `tipo_pro` varchar(100) NOT NULL,
  `carac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`num`, `cod`, `tipo_pro`, `carac`) VALUES
(0, 4, 'hjfgh', 'jkhdasjkdhkja'),
(0, 123, 'prpr', 'jkhdasjkdhkja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `cod` int(150) NOT NULL,
  `fecha` varchar(150) NOT NULL,
  `IDcliente` int(100) NOT NULL,
  `estadoPedido` varchar(30) NOT NULL,
  `metodoPago` varchar(100) NOT NULL,
  `precioTotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`cod`, `fecha`, `IDcliente`, `estadoPedido`, `metodoPago`, `precioTotal`) VALUES
(8661, '2022-11-08', 0, 'Enviado', 'Tarjeta', 78000),
(7415, '2022-11-08', 0, 'Pendiente', 'Efectivo', 789),
(6361, '2022-11-08', 100789456, 'Pendiente', 'Efectivo', 10000),
(9974, '2022-10-31', 0, 'Pendiente', 'Tarjeta', 123),
(8080, '2022-11-08', 123, 'Pendiente', 'Efectivo', 21312),
(5957, '2023-03-08', 123, 'Pendiente', 'Tarjeta', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loginn`
--

CREATE TABLE `loginn` (
  `user` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `loginn`
--

INSERT INTO `loginn` (`user`, `password`) VALUES
('gustavo', '123'),
('alejandro', '321 '),
('GustavoG', '4321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `no_` int(100) NOT NULL,
  `cod` int(100) NOT NULL,
  `nom_pro` varchar(100) NOT NULL,
  `id_catego` int(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `precio` int(100) NOT NULL,
  `imagenes` longblob NOT NULL,
  `fecha_fab` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`no_`, `cod`, `nom_pro`, `id_catego`, `marca`, `precio`, `imagenes`, `fecha_fab`, `descripcion`) VALUES
(0, 1012, 'pppp', 123, 'tr', 43, 0x74, '2022-11-14', 'tytr'),
(0, 435435345, 'violin', 0, 'gibson', 5000000, 0x6766686667686667, '2022-11-12', 'fghfghfgh'),
(0, 2147483647, 'guitarra', 0, 'gfgffg', 5000000, 0x6766686766, '2022-11-02', 'gfhdfghfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `no_` int(100) NOT NULL,
  `cod` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `apellido` varchar(11) NOT NULL,
  `ciudad` varchar(11) NOT NULL,
  `direccion` varchar(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `correo_cliente` varchar(11) NOT NULL,
  `contrasena` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`no_`, `cod`, `nombre`, `apellido`, `ciudad`, `direccion`, `telefono`, `codigo_postal`, `correo_cliente`, `contrasena`) VALUES
(0, 123, 'ghhg', 'ghjghj', 'tyut', 'ghjghj', 768768, 7678, 'asd@sad.com', '45634564'),
(0, 765, 'hhh', 'hhh', 'hhh', 'hhh', 5555, 666, 'gperez@tgma', '77777'),
(0, 7894455, 'German', 'Gomez', 'Bogota', 'cr 5a # 17 ', 875421, 12456, 'asd@sad.com', '4789463'),
(0, 100789456, 'julio', 'perez', 'bogota', 'cl 2a # 7 -', 4567894, 7894, 'user@user', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cod` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100789457;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

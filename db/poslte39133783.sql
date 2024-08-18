-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2024 a las 07:05:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `poslte39133783`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Equipos Electromecanicos editado', '2024-08-04 03:09:29'),
(2, 'Taladros', '2021-03-27 19:23:47'),
(3, 'Andamios', '2021-03-27 19:24:07'),
(4, 'Generadores de energía', '2021-03-27 19:24:23'),
(5, 'Equipos para construcción', '2021-03-27 19:24:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `telefono` text NOT NULL,
  `direccion` text NOT NULL,
  `compras` int(11) NOT NULL,
  `ultimaCompra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `email`, `telefono`, `direccion`, `compras`, `ultimaCompra`, `fecha`) VALUES
(1, 'Juan Villegas', 'juan@hotmail.com', '(+52) 722-883-8661', 'Calle 23 # 45 - 56', 2, '0000-00-00 00:00:00', '2024-08-17 05:53:45'),
(3, 'Miguel Murillo Prez', 'miguel@gmail.com', '(+52) 722-883-8661', 'calle 34 # 34 - 23', 20, '2024-08-17 22:34:43', '2024-08-18 04:34:43'),
(4, 'Victor Gabriel', 'vg@gmail.com', '(+52) 722-883-8661', 'AV. chapultepec #10', -12, '0000-00-00 00:00:00', '2024-08-18 03:30:20'),
(5, 'Michelle Sandoval', 'michelle@cliente.com', '(+52) 722-883-8661', 'AV. chapultepec #10', 4, '2024-08-17 22:35:04', '2024-08-18 04:35:04'),
(9, 'POSLTE39133783', 'correo@correo.com', '(+55) 555-555-5555', 'Direccion de negocio', 0, '0000-00-00 00:00:00', '2024-08-14 04:14:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `codigo` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `stock` int(11) NOT NULL,
  `precioCompra` float NOT NULL,
  `precioVenta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idCategoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precioCompra`, `precioVenta`, `ventas`, `fecha`) VALUES
(1, 1, '101', 'Aspiradora Industrial 2 editado', 'vistas/img/productos/101/711.png', 156, 90000, 126000, -87, '2024-08-17 05:55:18'),
(2, 1, '102', 'Plato Flotante para Allanadora', 'vistas/img/productos/102/506.jpg', 90, 4500, 6300, -21, '2024-08-18 03:30:20'),
(3, 1, '103', 'Compresor de Aire para pintura', 'vistas/img/productos/103/642.jpg', 81, 3000, 4200, 1, '2024-08-18 04:34:43'),
(4, 1, '104', 'Cortadora de Adobe sin Disco', 'vistas/img/productos/104/274.jpg', 18, 4000, 5600, 8, '2024-08-18 04:34:42'),
(5, 1, '105', 'Cortadora de Piso sin Disco ', 'vistas/img/productos/105/363.jpg', 9, 1540, 2156, 11, '2021-04-15 21:57:24'),
(6, 1, '106', 'Disco Punta Diamante ', 'vistas/img/productos/106/686.jpg', 15, 1100, 1540, 5, '2024-08-18 04:34:42'),
(7, 1, '107', 'Extractor de Aire ', 'vistas/img/productos/107/133.jpg', 15, 1540, 2156, 16, '2024-08-14 04:49:15'),
(8, 1, '108', 'Guadañadora ', 'vistas/img/productos/108/882.jpg', 54, 1540, 2156, -34, '2024-08-18 04:35:04'),
(9, 1, '109', 'Hidrolavadora Eléctrica ', 'vistas/img/productos/109/467.jpg', 24, 2600, 3640, -8, '2024-08-18 04:35:04'),
(10, 1, '110', 'Hidrolavadora Gasolina', 'vistas/img/productos/110/566.jpg', 18, 2210, 3094, 2, '2024-08-18 04:35:04'),
(11, 1, '111', 'Motobomba a Gasolina', 'vistas/img/productos/111/724.jpg', 20, 2860, 4004, 0, '2021-03-29 01:02:26'),
(12, 1, '112', 'Motobomba El?ctrica', '', 20, 2400, 3360, 0, '2021-03-27 23:32:02'),
(13, 1, '113', 'Sierra Circular ', '', 20, 1100, 1540, 0, '2021-03-27 23:32:02'),
(14, 1, '114', 'Disco de tugsteno para Sierra circular', '', 20, 4500, 6300, 0, '2021-03-27 23:32:02'),
(15, 1, '115', 'Soldador Electrico ', '', 20, 1980, 2772, 0, '2021-03-27 23:32:02'),
(16, 1, '116', 'Careta para Soldador', '', 20, 4200, 5880, 0, '2021-03-27 23:32:02'),
(17, 1, '117', 'Torre de iluminacion ', '', 20, 1800, 2520, 0, '2021-03-27 23:32:02'),
(18, 2, '201', 'Martillo Demoledor de Piso 110V', '', 20, 5600, 7840, 0, '2021-03-27 23:32:02'),
(19, 2, '202', 'Muela o cincel martillo demoledor piso', '', 20, 9600, 13440, 0, '2021-03-27 23:32:02'),
(20, 2, '203', 'Taladro Demoledor de muro 110V', '', 20, 3850, 5390, 0, '2021-03-27 23:32:02'),
(21, 2, '204', 'Muela o cincel martillo demoledor muro', '', 20, 9600, 13440, 0, '2021-03-27 23:32:02'),
(22, 2, '205', 'Taladro Percutor de 1/2 Madera y Metal', '', 20, 8000, 11200, 0, '2021-03-28 04:33:20'),
(23, 2, '206', 'Taladro Percutor SDS Plus 110V', '', 20, 3900, 5460, 0, '2021-03-27 23:32:02'),
(24, 2, '207', 'Taladro Percutor SDS Max 110V (Mineria)', '', 20, 4600, 6440, 0, '2021-03-27 23:32:02'),
(25, 3, '301', 'Andamio colgante', '', 20, 1440, 2016, 0, '2021-03-27 23:32:02'),
(26, 3, '302', 'Distanciador andamio colgante', '', 20, 1600, 2240, 0, '2021-03-27 23:32:02'),
(27, 3, '303', 'Marco andamio modular ', '', 20, 900, 1260, 0, '2021-03-27 23:32:02'),
(28, 3, '304', 'Marco andamio tijera', '', 20, 100, 140, 0, '2021-03-27 23:32:02'),
(29, 3, '305', 'Tijera para andamio', '', 20, 162, 226, 0, '2021-03-27 23:32:02'),
(30, 3, '306', 'Escalera interna para andamio', '', 20, 270, 378, 0, '2021-03-27 23:32:02'),
(31, 3, '307', 'Pasamanos de seguridad', '', 20, 75, 105, 0, '2021-03-27 23:32:02'),
(32, 3, '308', 'Rueda giratoria para andamio', '', 20, 168, 235, 0, '2021-03-27 23:32:02'),
(33, 3, '309', 'Arnes de seguridad', '', 20, 1750, 2450, 0, '2021-03-27 23:32:02'),
(34, 3, '310', 'Eslinga para arnes', '', 20, 175, 245, 0, '2021-03-27 23:32:02'),
(35, 3, '311', 'Plataforma Met?lica', '', 20, 420, 588, 0, '2021-03-27 23:32:02'),
(36, 4, '401', 'Planta Electrica Diesel 6 Kva', '', 20, 3500, 4900, 0, '2021-03-27 23:32:02'),
(37, 4, '402', 'Planta Electrica Diesel 10 Kva', '', 20, 3550, 4970, 0, '2021-03-27 23:32:02'),
(38, 4, '403', 'Planta Electrica Diesel 20 Kva', '', 20, 3600, 5040, 0, '2021-03-27 23:32:02'),
(39, 4, '404', 'Planta Electrica Diesel 30 Kva', '', 20, 3650, 5110, 0, '2021-03-27 23:32:02'),
(40, 4, '405', 'Planta Electrica Diesel 60 Kva', '', 20, 3700, 5180, 0, '2021-03-27 23:32:02'),
(41, 4, '406', 'Planta Electrica Diesel 75 Kva', '', 19, 3750, 5250, 1, '2024-08-18 04:35:23'),
(42, 4, '407', 'Planta Electrica Diesel 100 Kva', '', 19, 3800, 5320, 1, '2024-08-18 04:35:23'),
(43, 4, '408', 'Planta Electrica Diesel 120 Kva', '', 19, 3850, 5390, 1, '2024-08-18 04:35:23'),
(44, 5, '501', 'Escalera de Tijera Aluminio ', '', 19, 350, 490, 1, '2024-08-18 04:35:23'),
(45, 5, '502', 'Extension Electrica ', '', 19, 370, 518, 1, '2024-08-18 04:35:23'),
(46, 5, '503', 'Gato tensor', '', 19, 380, 532, 1, '2024-08-18 04:35:23'),
(47, 5, '504', 'Lamina Cubre Brecha ', '', 19, 380, 532, 1, '2024-08-18 04:35:23'),
(48, 5, '505', 'Llave de Tubo', '', 19, 480, 672, 1, '2024-08-18 04:35:23'),
(49, 5, '506', 'Manila por Metro', '', 19, 600, 840, 1, '2024-08-18 04:35:23'),
(50, 5, '507', 'Polea 2 canales', '', 19, 900, 1260, 1, '2024-08-18 04:35:23'),
(51, 5, '508', 'Tensor', '', 20, 100, 140, 0, '2021-03-27 23:32:02'),
(52, 5, '509', 'Bascula ', '', 20, 130, 182, 0, '2021-03-27 23:32:02'),
(53, 5, '510', 'Bomba Hidrostatica', '', 20, 770, 1078, 0, '2021-03-27 23:32:02'),
(54, 5, '511', 'Chapeta', '', 20, 660, 924, 0, '2021-03-27 23:32:02'),
(55, 5, '512', 'Cilindro muestra de concreto', '', 20, 400, 560, 0, '2021-03-27 23:32:02'),
(56, 5, '513', 'Cizalla de Palanca', '', 20, 450, 630, 0, '2021-03-27 23:32:02'),
(57, 5, '514', 'Cizalla de Tijera', '', 20, 580, 812, 0, '2021-03-27 23:32:02'),
(58, 5, '515', 'Coche llanta neumatica', '', 20, 420, 588, 0, '2021-03-27 23:32:02'),
(59, 5, '516', 'Cono slump', '', 20, 140, 196, 0, '2021-03-27 23:32:02'),
(60, 5, '517', 'Cortadora de Baldosin', '', 20, 930, 1302, 0, '2021-03-27 23:32:02'),
(61, 2, '208', 'taladro truper', '', 399, 500, 845, 1, '2024-08-14 04:51:29'),
(63, 2, '209', 'taladro de piso', 'vistas/img/productos/209/245.jpg', 233, 1450, 2175, 1, '2024-08-14 04:51:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `pass` text NOT NULL,
  `perfil` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `ultimologin` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `pass`, `perfil`, `foto`, `estado`, `ultimologin`, `fecha`) VALUES
(1, 'Brayan Sánchez', 'admin@admin.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin@admin.com/472.jpg', 1, '2024-08-17 20:16:17', '2024-08-18 02:16:17'),
(2, 'Jazmin Santiago Jilote', 'jazmin@correo.com', '$2a$07$asxx54ahjppf45sd87a5aupiGnhl9.FyZzovOsxA7OB7y5DFUHCv2', 'Administrador', 'vistas/img/usuarios/jazmin@correo.com/175.jpg', 1, '0000-00-00 00:00:00', '2024-08-04 01:24:52'),
(8, 'Sandra Gomez', 'sandra_gomez@tuempresa.com', '$2a$07$asxx54ahjppf45sd87a5auC3pb4ToxZjdNYgW63UxMggr4pYKb.QK', 'Vendedor', 'vistas/img/usuarios/sandra_gomez@tuempresa.com/615.jpg', 1, '2024-08-03 17:53:57', '2024-08-04 01:20:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL,
  `productos` text NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodoPago` text NOT NULL,
  `referencia` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `idCliente`, `idVendedor`, `productos`, `impuesto`, `neto`, `total`, `metodoPago`, `referencia`, `fecha`) VALUES
(31, 1002, 0, 1, '[{\"id\":\"MQ==\",\"descripcion\":\"Aspiradora Industrial 2 editado\",\"cantidad\":\"10\",\"stock\":\"60\",\"precio\":\"126000\",\"total\":\"1260000\"},{\"id\":\"Mg==\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"1\",\"stock\":\"69\",\"precio\":\"6300\",\"total\":\"6300\"},{\"id\":\"OQ==\",\"descripcion\":\"Hidrolavadora Eléctrica \",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"3640\",\"total\":\"3640\"},{\"id\":\"OA==\",\"descripcion\":\"Guadañadora \",\"cantidad\":\"5\",\"stock\":\"10\",\"precio\":\"2156\",\"total\":\"10780\"}]', 204915, 1280720, 1485640, 'Transferencia Electronica', '0000', '2023-10-16 06:24:40'),
(33, 1003, 1, 1, '[{\"id\":\"Mg==\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"1\",\"stock\":\"73\",\"precio\":\"6300\",\"total\":\"6300\"},{\"id\":\"Mw==\",\"descripcion\":\"Compresor de Aire para pintura\",\"cantidad\":\"1\",\"stock\":\"72\",\"precio\":\"4200\",\"total\":\"4200\"}]', 1680, 10500, 12180, 'Tarjeta Credito', '0000', '2024-07-17 06:24:44'),
(36, 1004, 3, 1, '[{\"id\":\"Ng==\",\"descripcion\":\"Disco Punta Diamante \",\"cantidad\":\"1\",\"stock\":\"15\",\"precio\":\"1540\",\"total\":\"1540\"},{\"id\":\"NA==\",\"descripcion\":\"Cortadora de Adobe sin Disco\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"5600\",\"total\":\"5600\"},{\"id\":\"Mw==\",\"descripcion\":\"Compresor de Aire para pintura\",\"cantidad\":\"1\",\"stock\":\"81\",\"precio\":\"4200\",\"total\":\"4200\"}]', 1814.4, 11340, 13154.4, 'Efectivo', 'Sin Referencia', '2024-08-17 04:34:43'),
(37, 1005, 5, 1, '[{\"id\":\"MTA=\",\"descripcion\":\"Hidrolavadora Gasolina\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"3094\",\"total\":\"3094\"},{\"id\":\"OQ==\",\"descripcion\":\"Hidrolavadora Eléctrica \",\"cantidad\":\"1\",\"stock\":\"24\",\"precio\":\"3640\",\"total\":\"3640\"},{\"id\":\"OA==\",\"descripcion\":\"Guadañadora \",\"cantidad\":\"1\",\"stock\":\"54\",\"precio\":\"2156\",\"total\":\"2156\"}]', 1422.4, 8890, 10312.4, 'Tarjeta Credito', '123', '2024-08-17 04:35:04'),
(38, 1006, 0, 1, '[{\"id\":\"NTA=\",\"descripcion\":\"Polea 2 canales\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"1260\",\"total\":\"1260\"},{\"id\":\"NDk=\",\"descripcion\":\"Manila por Metro\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"840\",\"total\":\"840\"},{\"id\":\"NDg=\",\"descripcion\":\"Llave de Tubo\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"672\",\"total\":\"672\"},{\"id\":\"NDc=\",\"descripcion\":\"Lamina Cubre Brecha \",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"532\",\"total\":\"532\"},{\"id\":\"NDY=\",\"descripcion\":\"Gato tensor\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"532\",\"total\":\"532\"},{\"id\":\"NDU=\",\"descripcion\":\"Extension Electrica \",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"518\",\"total\":\"518\"},{\"id\":\"NDQ=\",\"descripcion\":\"Escalera de Tijera Aluminio \",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"490\",\"total\":\"490\"},{\"id\":\"NDM=\",\"descripcion\":\"Planta Electrica Diesel 120 Kva\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"5390\",\"total\":\"5390\"},{\"id\":\"NDI=\",\"descripcion\":\"Planta Electrica Diesel 100 Kva\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"5320\",\"total\":\"5320\"},{\"id\":\"NDE=\",\"descripcion\":\"Planta Electrica Diesel 75 Kva\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"5250\",\"total\":\"5250\"}]', 3328.64, 20804, 24132.6, 'Tarjeta Debito', '2423', '2024-08-18 04:35:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

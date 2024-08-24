-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2024 a las 23:17:29
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
(13, 'Industria', '2024-08-23 05:31:04'),
(14, 'Construcción y Madera', '2024-08-23 05:31:22'),
(15, 'Sellantes Fijación y Tirafondos', '2024-08-23 05:31:45'),
(16, 'Pintura y Complementos', '2024-08-23 05:31:58'),
(17, 'Protección y Vestuario', '2024-08-23 05:32:08'),
(18, 'Equipos de Trabajo', '2024-08-23 05:32:18'),
(19, 'Electroportátiles', '2024-08-23 05:32:27'),
(20, 'Jardín Agricultura y Trefilados', '2024-08-23 05:32:46'),
(21, 'Mobiliario Jardín Playa Camping y Piscinas', '2024-08-23 05:33:05'),
(22, 'Material Eléctrico y Electrónica', '2024-08-23 05:33:16'),
(23, 'Calefacción y Ventilación', '2024-08-23 05:33:31'),
(24, 'Baño y Fontanería', '2024-08-23 05:33:42'),
(25, 'Cerrajería', '2024-08-23 05:33:48'),
(26, 'Ferretería Doméstica', '2024-08-23 05:33:55'),
(27, 'Menaje', '2024-08-23 05:34:02');

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
(10, 'cliente de prueba', 'cliente.prueba@gmail.com', '(+52) 777-777-7777', 'direccion de usuarios de prueba #34', 11, '2024-08-24 15:09:45', '2024-08-24 21:09:45');

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
(69, 13, '1301', 'Juego de Llaves Fijas', 'vistas/img/productos/1301/597.jpg', 61, 799, 1598, 4, '2024-08-24 21:07:05'),
(70, 13, '1302', 'Juego de Llaves Combinadas', 'vistas/img/productos/1302/812.jpg', 53, 815, 1141, 4, '2024-08-24 21:07:05'),
(71, 13, '1303', 'Llave ajustable Perico', 'vistas/img/productos/1303/658.jpg', 21, 80, 112, 4, '2024-08-24 21:07:05'),
(72, 13, '1304', 'Llave de cruz', 'vistas/img/productos/1304/307.jpg', 84, 299, 320, 1, '2024-08-24 21:03:25'),
(73, 13, '1305', 'Juego de llaves de tubo', 'vistas/img/productos/1305/464.jpg', 96, 455, 637, 0, '2024-08-24 18:14:26'),
(74, 14, '1401', 'Martillo uña', 'vistas/img/productos/1401/190.jpg', 82, 335, 469, 3, '2024-08-24 21:03:50'),
(75, 14, '1402', 'Alcotana 815', 'vistas/img/productos/1402/780.jpg', 22, 355, 497, 3, '2024-08-24 21:05:37'),
(77, 18, '1801', 'Tenazas rusas', 'vistas/img/productos/1801/625.jpg', 35, 995, 1393, 0, '2024-08-24 20:59:02'),
(78, 18, '1802', 'Pala de punta', 'vistas/img/productos/1802/455.jpg', 115, 505, 707, 5, '2024-08-24 21:06:07'),
(79, 25, '2501', 'Cortarremaches', 'vistas/img/productos/2501/936.jpg', 83, 85, 119, 2, '2024-08-24 21:06:07');

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
(1, 'Brayan Sánchez', 'admin@admin.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin@admin.com/603.png', 1, '2024-08-24 15:16:48', '2024-08-24 21:16:48'),
(2, 'Jazmin Santiago Jilote', 'jazmin@correo.com', '$2a$07$asxx54ahjppf45sd87a5auf9Eiqdn10E7o/jsGFivN12XE.wRwyp6', 'Especial', 'vistas/img/usuarios/jazmin@correo.com/274.png', 1, '2024-08-24 15:06:54', '2024-08-24 21:17:02'),
(8, 'Sandra Gomez', 'sandra_gomez@tuempresa.com', '$2a$07$asxx54ahjppf45sd87a5auC3pb4ToxZjdNYgW63UxMggr4pYKb.QK', 'Vendedor', 'vistas/img/usuarios/sandra_gomez@tuempresa.com/662.png', 1, '2024-08-03 17:53:57', '2024-08-23 04:15:48');

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
(39, 1001, 0, 1, '[{\"id\":\"Njk=\",\"descripcion\":\"Juego de Llaves Fijas\",\"cantidad\":\"1\",\"stock\":\"64\",\"precio\":\"1598\",\"total\":\"1598\"},{\"id\":\"NzY=\",\"descripcion\":\"Taladro de prueba 2\",\"cantidad\":\"1\",\"stock\":\"84\",\"precio\":\"497\",\"total\":\"497\"}]', 335.2, 2095, 2430.2, 'Efectivo', 'Sin Referencia', '2024-04-19 19:12:59'),
(40, 1002, 10, 1, '[{\"id\":\"Njk=\",\"descripcion\":\"Juego de Llaves Fijas\",\"cantidad\":\"1\",\"stock\":\"63\",\"precio\":\"1598\",\"total\":\"1598\"},{\"id\":\"NzU=\",\"descripcion\":\"Alcotana 815\",\"cantidad\":\"1\",\"stock\":\"24\",\"precio\":\"497\",\"total\":\"497\"},{\"id\":\"NzQ=\",\"descripcion\":\"Martillo uña\",\"cantidad\":\"1\",\"stock\":\"84\",\"precio\":\"469\",\"total\":\"469\"}]', 410.24, 2564, 2974.24, 'Tarjeta Debito', '2423', '2024-05-20 19:25:02'),
(41, 1003, 10, 1, '[{\"id\":\"NzI=\",\"descripcion\":\"Llave de cruz\",\"cantidad\":\"1\",\"stock\":\"84\",\"precio\":\"320\",\"total\":\"320\"},{\"id\":\"NzA=\",\"descripcion\":\"Juego de Llaves Combinadas\",\"cantidad\":\"1\",\"stock\":\"56\",\"precio\":\"1141\",\"total\":\"1141\"},{\"id\":\"NzE=\",\"descripcion\":\"Llave ajustable Perico\",\"cantidad\":\"1\",\"stock\":\"24\",\"precio\":\"112\",\"total\":\"112\"}]', 251.68, 1573, 1824.68, 'Cheque', '4568', '2024-06-24 21:03:25'),
(42, 1004, 0, 1, '[{\"id\":\"Nzk=\",\"descripcion\":\"Cortarremaches\",\"cantidad\":\"1\",\"stock\":\"84\",\"precio\":\"119\",\"total\":\"119\"},{\"id\":\"NzQ=\",\"descripcion\":\"Martillo uña\",\"cantidad\":\"1\",\"stock\":\"83\",\"precio\":\"469\",\"total\":\"469\"},{\"id\":\"NzU=\",\"descripcion\":\"Alcotana 815\",\"cantidad\":\"1\",\"stock\":\"23\",\"precio\":\"497\",\"total\":\"497\"}]', 173.6, 1085, 1258.6, 'Cheque', '0000', '2024-07-24 21:03:39'),
(43, 1005, 0, 1, '[{\"id\":\"NzQ=\",\"descripcion\":\"Martillo uña\",\"cantidad\":\"1\",\"stock\":\"82\",\"precio\":\"469\",\"total\":\"469\"}]', 75.04, 469, 544.04, 'Efectivo', 'Sin Referencia', '2024-08-24 21:03:50'),
(44, 1006, 10, 1, '[{\"id\":\"NzA=\",\"descripcion\":\"Juego de Llaves Combinadas\",\"cantidad\":\"1\",\"stock\":\"55\",\"precio\":\"1141\",\"total\":\"1141\"},{\"id\":\"NzE=\",\"descripcion\":\"Llave ajustable Perico\",\"cantidad\":\"1\",\"stock\":\"23\",\"precio\":\"112\",\"total\":\"112\"},{\"id\":\"Njk=\",\"descripcion\":\"Juego de Llaves Fijas\",\"cantidad\":\"1\",\"stock\":\"62\",\"precio\":\"1598\",\"total\":\"1598\"},{\"id\":\"NzU=\",\"descripcion\":\"Alcotana 815\",\"cantidad\":\"1\",\"stock\":\"22\",\"precio\":\"497\",\"total\":\"497\"}]', 535.68, 3348, 3883.68, 'Tarjeta Credito', '2423', '2024-08-24 21:05:37'),
(45, 1007, 0, 1, '[{\"id\":\"NzA=\",\"descripcion\":\"Juego de Llaves Combinadas\",\"cantidad\":\"1\",\"stock\":\"54\",\"precio\":\"1141\",\"total\":\"1141\"},{\"id\":\"NzE=\",\"descripcion\":\"Llave ajustable Perico\",\"cantidad\":\"1\",\"stock\":\"22\",\"precio\":\"112\",\"total\":\"112\"}]', 200.48, 1253, 1453.48, 'Efectivo', 'Sin Referencia', '2024-08-24 21:05:50'),
(46, 1008, 0, 1, '[{\"id\":\"Nzk=\",\"descripcion\":\"Cortarremaches\",\"cantidad\":\"1\",\"stock\":\"83\",\"precio\":\"119\",\"total\":\"119\"},{\"id\":\"Nzg=\",\"descripcion\":\"Pala de punta\",\"cantidad\":\"5\",\"stock\":\"115\",\"precio\":\"707\",\"total\":\"3535\"}]', 584.64, 3654, 4238.64, 'Tarjeta Debito', '2423', '2024-08-24 21:06:07'),
(47, 1009, 0, 2, '[{\"id\":\"NzE=\",\"descripcion\":\"Llave ajustable Perico\",\"cantidad\":\"1\",\"stock\":\"21\",\"precio\":\"112\",\"total\":\"112\"},{\"id\":\"NzA=\",\"descripcion\":\"Juego de Llaves Combinadas\",\"cantidad\":\"1\",\"stock\":\"53\",\"precio\":\"1141\",\"total\":\"1141\"},{\"id\":\"Njk=\",\"descripcion\":\"Juego de Llaves Fijas\",\"cantidad\":\"1\",\"stock\":\"61\",\"precio\":\"1598\",\"total\":\"1598\"}]', 456.16, 2851, 3307.16, 'Cheque', '0000', '2024-08-24 21:07:05');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

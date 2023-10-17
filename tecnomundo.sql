-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 05:51:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecnomundo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(2, 'teclados'),
(8, 'monitores'),
(12, 'procesadores'),
(13, 'mouses');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_category_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id_product`, `name`, `description`, `price`, `img`, `id_category_fk`) VALUES
(66, 'Razer Deathadder V2 X Hyperspeed Inalambrico', 'Más de 13 millones de DeathAdders vendidos. Cuenta con más de una década de premios. Una ergonomía icónica que ahora llega con un control sin límites, gracias a la conectividad doble mediante tecnología Razer™ HyperSpeed Wireless ultrarrápida o Bluetooth', 36000, 'img/652dff4e764f7.png', 2),
(67, 'Teclado gamer Redragon Shiva K512W RGB', 'Disfrutá de tus partidas en otro nivel con Redragon, marca reconocida que se especializa en brindar la mejor experiencia de juego al público gamer desde hace más de 20 años. Sus teclados se adaptan a todo tipo de jugadores y esto los convierten en un fiel', 37860, 'img/652df8c8b56be.png', 2),
(68, 'Monitor Led Samsung 22\'\' Con Diseño Sin Bordes ', '- Diseño minimalista, máxima concentración. La pantalla sin bordes en tres de sus lados aporta una estética clara y moderna a cualquier entorno de trabajo. En un entorno de varios monitores, las pantallas se alinean a la perfección para una vista práctica', 75828, 'img/652dfe8e73f19.jpg', 2),
(69, 'Intel Core i9 I9-12900K BX8071512900K', 'Mejora el rendimiento de tu computadora con el Procesador Intel Core i9-12900K, ideal para aquellos que buscan un alto rendimiento en sus tareas diarias y en juegos. Con sus 16 núcleos y 24 hilos, este procesador te permitirá realizar múltiples tareas de ', 545999, 'img/652e01ea02fcf.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `user` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipousuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `fullname`, `user`, `email`, `password`, `tipousuario`) VALUES
(15, 'webadmin', 'webadmin', 'webadmin@gmail.com', '$2y$10$yQC5UtSWBvbVkC76T4Dk2eimUhex8AE4pAULpijKyEWgKLRzpdfpu', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category_fk` (`id_category_fk`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category_fk`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

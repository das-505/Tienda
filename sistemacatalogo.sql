-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2024 a las 23:33:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemacatalogo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commets`
--

CREATE TABLE `commets` (
  `opinionProduct` text NOT NULL,
  `valuationProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `file`
--

INSERT INTO `file` (`id`, `name`, `extension`, `path`) VALUES
(23, 'Maletin-pistola-Sig-Sauer-Negro', 'jpg', '/Tienda/src/public/img/Maletin-pistola-Sig-Sauer-Negro.jpg'),
(25, 'compact-maletin-corta-arma-doble', 'jpg', '/Tienda/src/public/img/compact-maletin-corta-arma-doble.jpg'),
(26, 'funda-de-nylon-blackhawk-tobillera-cal-22-25', 'jpg', '/Tienda/src/public/img/funda-de-nylon-blackhawk-tobillera-cal-22-25.jpg'),
(27, 'funda-escopeta-desmontable-nylon-verde', 'jpg', '/Tienda/src/public/img/funda-escopeta-desmontable-nylon-verde.jpg'),
(28, 'funda-para-carabinas-bullpup-100x32', 'jpg', '/Tienda/src/public/img/funda-para-carabinas-bullpup-100x32.jpg'),
(29, '8206', 'jpg', '/Tienda/src/public/img/8206.jpg'),
(32, 'cuchillo-remate-de-caza-albainox-con-mango-de-cier', 'jpg', '/Tienda/src/public/img/cuchillo-remate-de-caza-albainox-con-mango-de-ciervo.jpg'),
(36, 'pistola-smith-wesson-mp9-m20-metal-nts-4-25-miras-', 'jpg', '/Tienda/src/public/img/pistola-smith-wesson-mp9-m20-metal-nts-4-25-miras-altas_1.jpg'),
(37, 'pistola-ruger-sr-1911-9mm-pb', 'jpg', '/Tienda/src/public/img/pistola-ruger-sr-1911-9mm-pb.jpg'),
(38, 'pistola-ruger-lcp-380-auto-2-75-pulgadas-con-laser', 'jpg', '/Tienda/src/public/img/pistola-ruger-lcp-380-auto-2-75-pulgadas-con-laser-rojo.jpg'),
(39, 'pistola-de-tiro-mpa-ds9-hybrid-black-blue-9mm', 'jpg', '/Tienda/src/public/img/pistola-de-tiro-mpa-ds9-hybrid-black-blue-9mm.jpg'),
(40, 'rifle-tactico-ruger-precision-308-win', 'jpg', '/Tienda/src/public/img/rifle-tactico-ruger-precision-308-win.jpg'),
(41, 'rifle-anschutz-1782-black-line-243-win', 'jpg', '/Tienda/src/public/img/rifle-anschutz-1782-black-line-243-win.jpg'),
(42, 'rifle-de-cerrojo-savage-axis-xp-sr_1_1', 'jpg', '/Tienda/src/public/img/rifle-de-cerrojo-savage-axis-xp-sr_1_1.jpg'),
(43, 'rifle-de-cerrojo-savage-impulse-predator-308-win', 'jpg', '/Tienda/src/public/img/rifle-de-cerrojo-savage-impulse-predator-308-win.jpg'),
(44, 'escopeta-smith-wesson-mp12-12-76', 'jpg', '/Tienda/src/public/img/escopeta-smith-wesson-mp12-12-76.jpg'),
(45, 'mossberg-590-schokwave-cerakote', 'jpg', '/Tienda/src/public/img/mossberg-590-schokwave-cerakote.jpg'),
(46, 'escopeta-semiautomatica-mossberg-930-slugster-12-7', 'jpg', '/Tienda/src/public/img/escopeta-semiautomatica-mossberg-930-slugster-12-76.jpg'),
(47, 'escopeta-pardus-mod-pxd-cal-12-canon-46-cm', 'jpg', '/Tienda/src/public/img/escopeta-pardus-mod-pxd-cal-12-canon-46-cm.jpg'),
(48, 'escopeta-de-corredera-mossberg-500-security-persua', 'jpg', '/Tienda/src/public/img/escopeta-de-corredera-mossberg-500-security-persuader-retrograde-12-76.jpg'),
(49, 'carabina-mauser-m15-us-tan-22lr-hv', 'jpg', '/Tienda/src/public/img/carabina-mauser-m15-us-tan-22lr-hv.jpg'),
(50, 'carabina-mauser-m15-sd-burnt-bronze-cerakota', 'jpg', '/Tienda/src/public/img/carabina-mauser-m15-sd-burnt-bronze-cerakota.jpg'),
(51, 'carabina-gsg-16-calibre-22lr_1', 'jpg', '/Tienda/src/public/img/carabina-gsg-16-calibre-22lr_1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `file_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `file_id`, `description`, `category`) VALUES
(63, 'Maletin pistola sig sauer negro', 22.01, 23, 'Proteja su pistola con este maletín resistente, una protección sólida para cualquiera de las pistolas Sig Sauer. Hecho de plástico resistente a los arañazos . Ofrece almacenamiento seguro y protección para todas las pistolas Sig Sauer. De color negro. Tamaño: 31 x 20 x 7 cm. Peso: 350g', 'Fundas'),
(65, 'Maletin arma corta doble compact negro g.p.s', 33.83, 25, 'Maletín para Arma Corta Doble Compact color Negro, con un sistema de almacenamiento de identificación visual para identificar y mantener las cosas organizadas.', 'Fundas'),
(66, 'Funda para tobillera de nylon BLACKHAWK! cal. .22/.25', 55.05, 26, 'La funda para tobillera hecha de nylon, y de la marca BLACKHAWK!, es una funda cómoda y práctica para un uso constante. Hecha con un tejido suave que no irrita la piel, aportando mayor comodidad y con un velcro para proporcionarte un cierre seguro.', 'Fundas'),
(67, 'Funda para escopeta Joker nylon verde desmontable', 22.01, 27, 'Funda Joker para escopeta. Desmontable y de nylon verde', 'Fundas'),
(68, 'Funda Snowpeak para carabina bullpup', 35.01, 28, 'Largo: 100cm Acolchado: 1cm (espuma de alta densidad)', 'Fundas'),
(69, 'Manta de tiro Casey Coyote Brown', 77.28, 29, 'Manta de tiro Casey Coyote Brown', 'Fundas'),
(72, 'Cuchillo de remate de caza Albainox con mango de asta de ciervo', 122.4, 32, 'Tamaño de la Hoja: 24.40 cm, Tipo de Mango/Color: Asta de Ciervo', 'Cuchillos'),
(76, 'Pistola Smith & Wesson M&P9 M2.0 metal NTS 4.25', 1354.7, 36, 'La Smith & Wesson M&P9 M2.0 Metal NTS es una pistola compacta de tiro con un espectacular armazón de aluminio que ofrece una muy buena precisión. Esta pistola trae 4 lomos de empuñadura intercambiables de diferentes tamaños. ', 'Pistolas'),
(77, 'Pistola Ruger SR 1911 9mm Parabellum', 1156.3, 37, 'La Ruger SR 1911 de calibre 9 mm Pb es una da las más icónicas del mercado. Conocida a nivel mundial por su valor histórico, esta es una de las pistolas más fáciles de reconocer a simple vista debido a su alta fama.', 'Pistolas'),
(78, 'Pistola Ruger 2.75\" LCP con láser rojo - 380 ACP', 503.75, 38, 'La Ruger LCP es una pistola de defensa de porte oculto perfecta para uso policial. Dispara munición de calibre 380 Auto (9 corto) y permite disparos realmente rápidos y precisos gracias a su láser rojo que trae incorporado en el arma. Su cañón mide tan solo 2.75.', 'Pistolas'),
(79, 'Pistola MPA DS9 Hybrid Black & Blue - 9mm.', 4098.4, 39, 'Masterpiece Arms (MPA) es una marca americana creada en el año 2000 que durante estos años ha ido alcanzando un alto prestigio en el mundo del tiro y la competición.', 'Pistolas'),
(80, 'Rifle de cerrojo Ruger Precision 308 Win', 2827.2, 40, 'El Ruger Precision es uno de los rifles de PRS más completos dentro de su precio.', 'Rifles'),
(81, 'Rifle de cerrojo Anschutz 1782 Black Line 243 Win', 3719, 41, 'CARACTERÍSTICAS - Culata Anschütz Classic Pro con carrillera ajustable. - Acabado DLC cerrojo, gatillo y bola de cerrojo. - Disparador directo con opción de escoger 2 tiempos .', 'Rifles'),
(82, 'Rifle de cerrojo Savage Axis XP Compact - 243 Win', 762.86, 42, 'El Savage Axis XP SR calibre 243 Winchester es un rifle que destaca por su precio contenido pero que conserva las grandes ventajas del resto de rifles de la marca.', 'Rifles'),
(83, ' El Savage Impulse Predator es un rifle de caza que dispara munición del calibre 308 Win. Un calibre muy polivalente y muy estándar en España entre los cazadores, gracias a su efectividad y su precio. Este rifle de cerrojo es una opción muy adecuada para ', 1883.32, 43, 'El Savage Impulse Predator es un rifle de caza que dispara munición del calibre 308 Win', 'Rifles'),
(84, 'Escopeta Smith & Wesson M&P12 - .12/76', 2071, 44, 'La escopeta Smith & Wesson MP12 es una escopeta bullpup táctica de tamaño muy compacto con un uso claramente policial', 'Escopetas'),
(85, 'Escopeta Mossberg 590 Shockwave Cerakote .12', 838.89, 45, 'La Mossberg 590 Shockwave Cerakote es una escopeta táctica de calibre 12 que tiene un acabado mate en color arena.', 'Escopetas'),
(86, 'Escopeta semiautomática Mossberg 930 Slugster - 12/76', 1107.7, 46, 'Escopeta de caza Mossberg modelo 930 Slugster en calibre 12/76. Un arma de gran fiabilidad y calidad propia de la marca, con un precio inmejorable.', 'Escopetas'),
(87, 'Escopeta Pardus Mod. PXD Cal. 12 Cañon 46 cm', 750.5, 47, 'Escopeta Pardus Mod. PXD, con sistema Pump Action Cal. 12-46 cm de cañon, culata sintetica. Su peso aprox. es de 3,600 Kg. Culata Telescopica Cañón de 46cm  ', 'Escopetas'),
(88, 'Escopeta MOSSBERG 500 SECURITY Persuader Retrograde', 867.89, 48, 'MOSSBERG 500 SECURITY Persuader Retrograde es una escopeta de acción de corredera con calibre 12 para cartuchos magnum de 76 mm. Perfecta para el uso táctico.', 'Escopetas'),
(89, 'Carabina semiautomática Mauser M15 US TAN HV 22lr', 628.87, 49, 'La Mauser M15 US TAN es una carabina semiautomática de gran calidad que cuenta con un diseño táctico, y dispara munición de calibre 22lr', 'Carabinas'),
(90, 'Carabina semiautomática Mauser M15 SD Burnt Bronze 22lr', 659.86, 50, 'La Mauser M15 SD Burnt Bronze es una carabina plegable semiautomática que cuenta con un diseño muy táctico', 'Carabinas'),
(91, 'Carabina semiautomática GSG 16 - 22 lr', 544.36, 51, 'El GSG 16 es una carabina semiautomática fabricada por German Sport Guns, que está inspirada en el icónico modelo de H&K MP5.', 'Carabinas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `mobilenumber` varchar(30) NOT NULL,
  `postcode` varchar(30) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `mobilenumber`, `postcode`, `username`, `email`, `password`, `file_id`, `is_admin`, `token`) VALUES
(41, 'Darwin ', 'Alemán ', '493820945', '50005', 'das', 'das@das', '$2y$10$FefhD/GNJgybQZzt73q5ceq1l67t/pjUA0rL8aDvE0R128tiBkuDC', NULL, 1, ''),
(42, 'Steven', '', '', '', 'Steven', 'steve@steve', '$2y$10$UitnrqZ4FKjxmCn24YtJNOKnCzQnCEVBSJQ5M5McvL4p6vrGncwtm', NULL, 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_file_id` (`file_id`);

--
-- Indices de la tabla `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `fk_file_id` (`file_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_file_id` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql102.byetcluster.com
-- Tiempo de generación: 05-12-2021 a las 14:10:12
-- Versión del servidor: 5.7.35-38
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `epiz_30279333_iotDB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_colorimeter`
--

CREATE TABLE `data_colorimeter` (
  `color_id` int(11) NOT NULL,
  `color_userid` varchar(100) NOT NULL,
  `color_result` varchar(20) NOT NULL,
  `h_ref1` double(5,2) DEFAULT NULL,
  `h_ref2` double(5,2) DEFAULT NULL,
  `h_ref3` double(5,2) DEFAULT NULL,
  `s_ref1` double(5,2) DEFAULT NULL,
  `s_ref2` double(5,2) DEFAULT NULL,
  `s_ref3` double(5,2) DEFAULT NULL,
  `l_ref1` double(5,2) DEFAULT NULL,
  `l_ref2` double(5,2) DEFAULT NULL,
  `l_ref3` double(5,2) DEFAULT NULL,
  `h_samp` double(5,2) DEFAULT NULL,
  `s_samp` double(5,2) DEFAULT NULL,
  `l_samp` double(5,2) DEFAULT NULL,
  `color_diff` double(5,2) DEFAULT NULL,
  `color_tol` double(5,2) DEFAULT NULL,
  `color_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `color_deviceUniqueId` varchar(50) DEFAULT NULL,
  `color_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `data_colorimeter`
--

INSERT INTO `data_colorimeter` (`color_id`, `color_userid`, `color_result`, `h_ref1`, `h_ref2`, `h_ref3`, `s_ref1`, `s_ref2`, `s_ref3`, `l_ref1`, `l_ref2`, `l_ref3`, `h_samp`, `s_samp`, `l_samp`, `color_diff`, `color_tol`, `color_date`, `color_deviceUniqueId`, `color_username`) VALUES
(1, 'Prueba 1', 'Correcto', 21.00, 22.00, 23.00, 81.00, 82.00, 83.00, 51.00, 52.00, 53.00, 20.00, 80.00, 50.00, 3.00, 4.00, '2021-11-28 04:01:29', 'COLOR0001', 'ADMIN'),
(2, 'Prueba 2', 'Correcto', 121.00, 122.00, 123.00, 71.00, 72.00, 73.00, 61.00, 62.00, 63.00, 120.00, 70.00, 60.00, 5.00, 10.00, '2021-11-28 04:34:27', 'COLOR0002', 'ADMIN'),
(3, 'Test 1', 'Incorrecto', 281.00, 282.00, 283.00, 71.00, 72.00, 73.00, 51.00, 52.00, 53.00, 270.00, 70.00, 50.00, 10.00, 5.00, '2021-11-28 04:40:34', 'COLOR003', 'Joahan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
  `device_id` int(10) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `device_username` varchar(50) NOT NULL,
  `device_uniqueid` varchar(50) NOT NULL,
  `device_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `devices`
--

INSERT INTO `devices` (`device_id`, `device_name`, `device_username`, `device_uniqueid`, `device_date`) VALUES
(1, 'COLORIMETRO', 'ADMIN', 'COLOR001', '2021-11-28 04:23:22'),
(2, 'COLORIMETRO', 'ADMIN', 'COLOR002', '2021-11-28 04:31:05'),
(3, 'COLORIMETRO', 'Joahan', 'COLOR003', '2021-11-28 04:38:40'),
(4, 'TEMPSENSOR', 'ADMIN', 'TEMP001', '2021-12-03 01:24:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_image` varchar(200) NOT NULL DEFAULT '''http://sensorsiot.epizy.com/Practice/ColorSensorPage/Images/user_image/default.png''',
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_image`, `user_date`) VALUES
(1, 'ADMIN', 'ADMIN', 'joahan@outlook.com', '\'http://sensorsiot.epizy.com/Practice/ColorSensorPage/Images/user_image/default.png\'', '2021-11-28 03:54:13'),
(2, 'Joahan', 'joahan2001414', 'joahan@outlook.com', '\'http://sensorsiot.epizy.com/Practice/ColorSensorPage/Images/user_image/default.png\'', '2021-11-28 04:38:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `data_colorimeter`
--
ALTER TABLE `data_colorimeter`
  ADD PRIMARY KEY (`color_id`);

--
-- Indices de la tabla `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data_colorimeter`
--
ALTER TABLE `data_colorimeter`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

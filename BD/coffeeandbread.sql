
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



DROP TABLE IF EXISTS `tbl_cliente`;
CREATE TABLE IF NOT EXISTS `tbl_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(64) NOT NULL,
  `telefono_cliente` varchar(15) NOT NULL,
  `direccion_cliente` varchar(150) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalle_reserva`
--

DROP TABLE IF EXISTS `tbl_detalle_reserva`;
CREATE TABLE IF NOT EXISTS `tbl_detalle_reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(64) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

DROP TABLE IF EXISTS `tbl_productos`;
CREATE TABLE IF NOT EXISTS `tbl_productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `publicacion` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservar`
--

DROP TABLE IF EXISTS `tbl_reservar`;
CREATE TABLE IF NOT EXISTS `tbl_reservar` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `id_usuario` int(15) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(64) NOT NULL,
  `imagen_usuario` text NOT NULL,
  `celular_usuario` varchar(20) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `estado` int(2) NOT NULL,
  `clave_usuario` varchar(64) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

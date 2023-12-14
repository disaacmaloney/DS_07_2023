
use bd_denuncias;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(60) NOT NULL,
  `EntidadResponsable` varchar(60) NOT NULL,
  `Correo` varchar(80) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


CREATE TABLE `ciudadano` (
  `id_ciudadano` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ciudadano` varchar(80) NOT NULL,
  `Lugar_reside` varchar(100) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Correoelectronico` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_ciudadano`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------



CREATE TABLE `denuncia` (
  `id_denuncia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `id_ciudadano` int(11) NOT NULL,
  `provincia_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `au_date` datetime NOT NULL,
  `au_estatus` char(1) NOT NULL,
  `au_lugar` varchar(150) NOT NULL,
  `au_cedula` varchar(20) NOT NULL,
  `au_name` varchar(30) NOT NULL,
  `au_residencia` varchar(30) NOT NULL,
  `au_email` varchar(30) NOT NULL,
  `au_tlf` varchar(20) NOT NULL,
  PRIMARY KEY (`id_denuncia`),
  FOREIGN KEY (`id_ciudadano`) REFERENCES `ciudadano`(`id_ciudadano`),
  FOREIGN KEY (`provincia_id`) REFERENCES `provincia`(`id_provincia`),
  FOREIGN KEY (`categoria_id`) REFERENCES `categoria`(`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_provincia` varchar(40) NOT NULL,
  PRIMARY KEY (`id_provincia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(40) NOT NULL,
  `apellido_usuario` varchar(60) NOT NULL,
  `correoele_usuario` varchar(100) DEFAULT NULL,
  `celular_usuario` varchar(15) DEFAULT NULL,
  `tipo_admin` char(1) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `denuncia`
--

INSERT INTO `denuncia` (`id_denuncia`, `descripcion`, `id_ciudadano`, `provincia_id`, `categoria_id`, `au_date`, `au_estatus`, `au_lugar`, `au_cedula`, `au_name`, `au_residencia`, `au_email`, `au_tlf`) VALUES
(5, 'No se esta recogiendo la basura', 1, 1, 1, '2022-12-09', '', 'San Francisco', '8-789-4562', 'Jason', 'Boca la Caja', 'jeason@gmail.com', '6587-2564');

-- --------------------------------------------------------

-- ... (Tu código restante aquí)

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

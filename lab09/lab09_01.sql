USE LABSDB;

-- CREATE TABLE NOTICE

CREATE TABLE NOTICIAS(
    ID SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    TITULO VARCHAR(100) NOT NULL DEFAULT '',
    TEXTO TEXT NOT NULL,
    CATEGORIA ENUM('PROMOCIONES', 'OFERTAS', 'COSTAS') NOT NULL DEFAULT 'PROMOCIONES',
    FECHA DATE NOT NULL,
    IMAGEN VARCHAR(100) DEFAULT NULL,
    PRIMARY KEY (ID)
);
-- INSERT IN TABLE NOTICIAS VALUES
INSERT INTO noticias VALUES (1, 'Nueva promocion en Ciudad Cristal', '145 viviendas de lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL);
INSERT INTO noticias VALUES (2, 'Ultimas viviendas junto al rio', 'Apartamentos de 1 y 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion.', 'ofertas', '2019-02-05', NULL);
INSERT INTO noticias VALUES (3, 'Apartamentos en el Puerto de San Martin', 'En la Playa del Sol, en primera linea de playa. Pisos reformados y completamente amueblados.', 'costas', '2019-02-06', 'apartamento8.jpg');
INSERT INTO noticias VALUES (4, 'Casa reformada en el barrio de la Palmera', 'Dos plantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle tranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL);
INSERT INTO noticias VALUES (5, 'Promocion en Costa Mar', 'Con vistas al campo de golf, magnificas calidades, entorno ajardinado con piscina y servicio de vigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg');

SELECT * FROM NOTICIAS

-- CREATE SP LIST NOTICIAS
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_NOTICIAS`()
BEGIN
    SELECT ID, TITULO, TEXTO, CATEGORIA, FECHA, IMAGEN  FROM NOTICIAS;
END;


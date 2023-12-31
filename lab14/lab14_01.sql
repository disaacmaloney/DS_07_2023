use labsdb;

-- create table USER
CREATE TABLE IF NOT EXISTS USUARIOS(
    ID SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    USUARIO VARCHAR(20) NOT NULL DEFAULT '',
    CLAVE VARCHAR(20) NOT NULL DEFAULT '',
    PRIMARY KEY (ID)
);

INSERT INTO USUARIOS (ID, USUARIO, CLAVE) VALUES (1, 'testuser', 'teXB5LK3JWG6g');

-- create procedure is valid USER

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VALIDAR_USUARIO`
(IN PARAM_USER VARCHAR(20), IN PARAM_PASS VARCHAR(20))
BEGIN
    SET @S = CONCAT("SELECT COUNT(*) AS CANTIDAD FROM USUARIOS WHERE USUARIO = '", PARAM_USER ,"' AND CLAVE = '", PARAM_PASS, "';");

    PREPARE STMT FROM @S;
    EXECUTE STMT;
    DEALLOCATE PREPARE STMT;
END
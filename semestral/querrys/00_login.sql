-- create table USER
CREATE TABLE IF NOT EXISTS USER(
    ID_USER SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    USE_NAME VARCHAR(20) NOT NULL DEFAULT '',
    USE_PASSWORD VARCHAR(20) NOT NULL DEFAULT '',
    PRIMARY KEY (ID_USER)
);

SELECT * FROM USER;

-- CREATE SP LOGIN
DROP PROCEDURE IF EXISTS SP_LOGIN;

CREATE PROCEDURE `SP_LOGIN`(
    IN VAR_USE_NAME VARCHAR(20),
    IN VAR_USE_PASSWORD VARCHAR(20)
)
BEGIN
    SELECT ID_USER, USE_NAME, USE_LASTNAME, USE_USER ,ID_GENDER, ID_ROLE,  USE_DATE_BIRTH FROM USER WHERE USE_USER = VAR_USE_NAME AND USE_PASSWORD = VAR_USE_PASSWORD;
END;



-- add COLUMN
ALTER TABLE USER ADD COLUMN USE_USER VARCHAR(50) NOT NULL DEFAULT '';
ALTER TABLE USER ADD COLUMN USE_LASTNAME VARCHAR(50) NOT NULL DEFAULT '';
ALTER TABLE USER ADD COLUMN ID_GENDER SMALLINT(5) UNSIGNED NOT NULL;
ALTER TABLE USER ADD COLUMN USE_DATE_BIRTH DATE NOT NULL DEFAULT '0000-00-00';
ALTER TABLE USER ADD COLUMN ID_ROLE SMALLINT(5) UNSIGNED NOT NULL;

SELECT * FROM USER;

SELECT  ID_USER, USE_NAME, USE_PASSWORD,  USE_LASTNAME, USE_USER ,ID_GENDER, USE_DATE_BIRTH, ID_ROLE FROM USER 

DROP PROCEDURE IF EXISTS SP_USER_NEW;
CREATE PROCEDURE SP_USER_NEW
(
    VAR_USE_NAME VARCHAR(20),
    VAR_USE_PASSWORD VARCHAR(20),
    VAR_USE_USER VARCHAR(50),
    VAR_USE_LASTNAME VARCHAR(50),
    VAR_USE_DATE_BIRTH DATE,
    VAR_ID_GENDER SMALLINT(5) UNSIGNED,
    VAR_ID_ROLE SMALLINT(5) UNSIGNED
)
BEGIN
INSERT INTO USER (USE_NAME, USE_PASSWORD, USE_USER, USE_LASTNAME, USE_DATE_BIRTH, ID_GENDER, ID_ROLE)
SELECT VAR_USE_NAME, VAR_USE_PASSWORD, VAR_USE_USER, VAR_USE_LASTNAME, VAR_USE_DATE_BIRTH, VAR_ID_GENDER, VAR_ID_ROLE 
FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM USER WHERE USE_USER = VAR_USE_USER);

SELECT 1 AS RESPONSE;
END;

SELECT * FROM MENU;
SELECT * FROM PERMISSION;
DROP PROCEDURE IF EXISTS SP_GET_MENU;

CREATE PROCEDURE `SP_GET_MENU`(
)
BEGIN
    SELECT ID_MENU, MEN_NAME, IS_PARENT, ID_MENU_PARENT, IFNULL(MEN_URL, "#") AS MEN_URL 
    FROM MENU where ID_MENU <100;
    END;

CALL SP_GET_MENU();

DROP PROCEDURE IF EXISTS SP_GET_SUBMENU;
CREATE PROCEDURE `SP_GET_SUBMENU`(
    IN VAR_ID_ROLE INT(10) UNSIGNED,
    IN VAR_ID_MENU_PARENT INT(10) UNSIGNED
)
BEGIN
SELECT RO.ID_ROLE, RO.ROL_NAME
, ME.ID_MENU, ME.MEN_NAME, ME.ID_MENU_PARENT, IFNULL(ME.MEN_URL, "#") AS MEN_URL  FROM ROLE RO 
INNER JOIN PERMISSION PE ON RO.ID_ROLE = PE.ID_ROLE
INNER JOIN MENU ME ON ME.ID_MENU = PE.ID_MENU
WHERE RO.ID_ROLE = VAR_ID_ROLE AND ME.ID_MENU_PARENT = VAR_ID_MENU_PARENT; 
END;

CALL SP_GET_SUBMENU(1, 1);


SELECT
  TS.ID_USER,
  TS.USE_NAME,
  TS.USE_LASTNAME,
  TS.USE_USER,
  TS.USE_DATE_BIRTH,
  RO.ID_ROLE,
  RO.ROL_NAME,
  TS.ID_GENDER,
  PA.PAR_VALUE AS GENDER_VALUE  -- Agregar un alias para la columna de PARAMETER
FROM USER TS
INNER JOIN ROLE RO ON TS.ID_ROLE = RO.ID_ROLE
INNER JOIN PARAMETER PA ON TS.ID_GENDER = PA.ID_PARAMETER
WHERE RO.ID_ROLE = 1;


-- CREATE SP USER GET BY ROLE
DROP PROCEDURE IF EXISTS SP_USER_GET_BY_ROLE;
CREATE PROCEDURE `SP_USER_GET_BY_ROLE`(
    IN VAR_ID_ROLE INT(10) UNSIGNED
)
BEGIN
    SELECT
    TS.ID_USER,
    TS.USE_NAME,
    TS.USE_LASTNAME,
    TS.USE_USER,
    TS.USE_DATE_BIRTH,
    RO.ID_ROLE,
    RO.ROL_NAME,
    TS.ID_GENDER,
    PA.PAR_VALUE AS GENDER_VALUE  -- Agregar un alias para la columna de PARAMETER
    FROM USER TS
    INNER JOIN ROLE RO ON TS.ID_ROLE = RO.ID_ROLE
    INNER JOIN PARAMETER PA ON TS.ID_GENDER = PA.ID_PARAMETER
    WHERE RO.ID_ROLE = VAR_ID_ROLE;
    END;
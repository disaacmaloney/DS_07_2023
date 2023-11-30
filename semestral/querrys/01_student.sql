USE db_aa090b_ds7utp;

-- create table students
CREATE TABLE STUDENT(
    ID_STUDENT INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    STU_NAME VARCHAR(50) NOT NULL,
    STU_LASTNAME VARCHAR(50) NOT NULL,
    STU_DNI VARCHAR(20) NOT NULL,
    STU_DATE_BIRTH DATE NOT NULL,
    STU_USER VARCHAR(50) NOT NULL,
    STU_PASSWORD VARCHAR(50) NOT NULL,
    ID_GENDER INT(10) UNSIGNED NOT NULL,
    ID_ROL INT(10) UNSIGNED NOT NULL,
    PRIMARY KEY (ID_STUDENT)
    
);
--DROP TABLE parameter;
-- CREATE TABLE PARAMETERS
CREATE TABLE PARAMETER(
    ID_PARAMETER INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    PAR_NAME VARCHAR(50) NOT NULL,
    PAR_VALUE VARCHAR(50) NOT NULL,
    PRIMARY KEY (ID_PARAMETER)
);

-- INSERT PARAMETER GENDER
INSERT INTO PARAMETER (PAR_VALUE, PAR_NAME) VALUES
('MASCULINO', 'GENERO'),
('FEMENINO', 'GENERO');


SELECT ID_PARAMETER, PAR_VALUE, PAR_NAME FROM PARAMETER;
-- CREATE SP GET PARAMETER
DROP PROCEDURE IF EXISTS GET_PARAMETER;
CREATE PROCEDURE GET_PARAMETER(IN PAR_NAME VARCHAR(50))
BEGIN
    SELECT ID_PARAMETER, PAR_VALUE FROM PARAMETER WHERE PAR_NAME = PAR_NAME;
END;

CALL GET_PARAMETER('GENERO');
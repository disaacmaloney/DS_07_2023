use db_aa23a1_labsdb;

--create table factorial (n int, f int);
CREATE TABLE IF NOT EXISTS factorial (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    NUM INT,
    FACTO INT,
    SUM_FACTO INT
);

-- CREATE SP GET FACTORIAL
DROP PROCEDURE IF EXISTS SP_FACTORIAL_GET;
CREATE PROCEDURE SP_FACTORIAL_GET()
BEGIN
    SELECT ID, NUM, FACTO, SUM_FACTO  FROM factorial;
END;

    SELECT * FROM factorial;


DROP PROCEDURE IF EXISTS SP_FACTORIAL_POST;
CREATE PROCEDURE `SP_FACTORIAL_POST`(
    IN VAR_NUM VARCHAR(5)
)
BEGIN
    DECLARE VAR_FACTO INT;
    DECLARE VAR_SUM_FACTO INT;
    SET VAR_FACTO = 1;
    SET VAR_SUM_FACTO = 0;
    WHILE VAR_FACTO <= VAR_NUM DO
        SET VAR_SUM_FACTO = VAR_SUM_FACTO + VAR_FACTO;
        SET VAR_FACTO = VAR_FACTO + 1;
    END WHILE;
    INSERT INTO factorial(NUM, FACTO, SUM_FACTO) VALUES (VAR_NUM, VAR_FACTO, VAR_SUM_FACTO);
    SELECT * FROM factorial;
END;

CALL SP_FACTORIAL_POST(15);
CALL SP_FACTORIAL_POST(12);
SELECT * FROM factorial;



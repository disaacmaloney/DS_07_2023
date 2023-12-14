USE bd_denuncias;

SELECT * FROM ciudadano

ALTER TABLE `denuncia` DROP INDEX `id_ciudadano`;
ALTER TABLE `ciudadano` DROP PRIMARY KEY;

ALTER TABLE `ciudadano` DROP `id_ciudadano`;
ALTER TABLE `ciudadano` ADD `id_ciudadano` VARCHAR(15) NOT NULL AFTER `Correoelectronico`, ADD PRIMARY KEY (`id_ciudadano`(15));

-- Ajusta el tamaño según tus necesidades



INSERT INTO ciudadano (id_ciudadano,nombre_ciudadano,Lugar_reside,Telefono,Correoelectronico) 
VALUES ('123','Registri','Registri','6554','Registri@Registri.com'); 
 select 1 reponse;

-- inserta las provinciasw de panama en la tabla provincias

INSERT into provincia (id_provincia, nombre_provincia) VALUES (1, 'Bocas del Toro'), 
(2, 'Coclé'), 
(3, 'Colón'), 
(4, 'Chiriquí'), 
(5, 'Darién'), 
(6, 'Herrera'), 
(7, 'Los Santos'), 
(8, 'Panamá'), 
(9, 'Veraguas'), 
(10, 'Panamá Oeste');

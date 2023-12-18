use bd_denuncias;

INSERT INTO USUARIO (nombre_usuario, apellido_usuario, correoele_usuario, usuario, contrasena) VALUES ('admin', 'admin', 'admin@admin.com', 'admin', 'admin');
select * from USUARIO;

INSERT INTO CATEGORIA (NOMBRE_CATEGORIA, `EntidadResponsable`, `Correo`)
VALUES ('Aseo', 'Alcaldia', 'Aseo@ALCALDIA.COM'),
('Luminarias', 'Alcaldia', 'Luminarias@ALCALDIA.COM'),
('Seguridad', 'Alcaldia', 'Seguridad@ALCALDIA.COM'),
('Transporte', 'Alcaldia', 'Transporte@ALCALDIA.COM'),
('Agua Potable', 'Alcaldia', 'AGUA@ALCALDIA.COM'),
('Alcantarillado', 'Alcaldia', 'Alcantarillado@ALCALDIA.COM')
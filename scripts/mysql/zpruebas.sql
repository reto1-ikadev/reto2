-- zprueba.sql, la z viene para que se pueda ejecutar después de los comandos de creación
-- de base de datos y tablas.
-- Crear un usuario de prueba llamado Roberto.
INSERT INTO `empleado`  VALUES(90, 'Roberto', 'Prueba', '$2y$10$OUNwNA058r74efK4FXyjKO5u.4s/GzVqJUY32zA9DPjwrbc4M26K2', 'roberto@prueba.com', '1');

-- Crear una pregunta de prueba
INSERT INTO `pregunta` (`titulo`, `contenido`, `fecha`, `tags`, `empleado_numEmple`) VALUES('¿Que se creo primero el huevo o la gallina?', 'Siempre tuve aquella duda, por ello me gustaria ver si en esta pagina web me podriais sacar esta duda de mi cabeza.', CURDATE(), 'mecanica', 90);
SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS mensajes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  texto VARCHAR(255) NOT NULL
);

INSERT INTO mensajes (texto) VALUES
  ('Hola Mundo desde MySQL'),
  ('La app PHP se conectó correctamente a la base de datos');

-- Crea la base de datos 
CREATE DATABASE IF NOT EXISTS musica;
USE musica;

-- Crea las tablas

CREATE TABLE artistas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE discos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    artista_id INT,
    FOREIGN KEY (artista_id) REFERENCES artistas(id) ON DELETE CASCADE
);

CREATE TABLE canciones (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    duracion TIME,
    disco_id INT,
    FOREIGN KEY (disco_id) REFERENCES discos(id) ON DELETE CASCADE
);

-- Tabla de relación corregida
CREATE TABLE artistas_canciones (  
    artista_id INT,
    cancion_id INT,
    PRIMARY KEY (artista_id, cancion_id),
    FOREIGN KEY (artista_id) REFERENCES artistas(id) ON DELETE CASCADE,
    FOREIGN KEY (cancion_id) REFERENCES canciones(id) ON DELETE CASCADE
);

-- Inserta datos en artistas
INSERT INTO artistas (nombre) VALUES 
('Joan Baez'), 
('Coldplay'), 
('Taylor Swift'), 
('Motorhead');

-- Inserta datos en discos (artista_id ajustados)
INSERT INTO discos (nombre, artista_id) VALUES 
('Diamonds & Rust', 1),
('A Rush of Blood to the Head', 2),
('1989', 3),
('Ace of Spades', 4);

-- Inserta datos en canciones (disco_id ajustados)
INSERT INTO canciones (nombre, duracion, disco_id) VALUES 
('Diamonds & Rust', '00:04:45', 1),
('The Scientist', '00:05:09', 2),
('Shake It Off', '00:03:39', 3),
('Ace of Spades', '00:02:49', 4);

-- Inserta datos en la tabla de relación
INSERT INTO artistas_canciones (artista_id, cancion_id) VALUES 
(1, 1), 
(2, 2), 
(3, 3), 
(4, 4);

-- Inserta más artistas
INSERT INTO artistas (nombre) VALUES 
('Lucio Battisti'), 
('Diana Ross'), 
('Pink Floyd'), 
('King Harvest'), 
('Elton John'), 
('David Bowie'), 
('Arcade Fire'), 
('Nina Simone'), 
('Fleetwood Mac'), 
('Sia'), 
('Dionne Warwick');

-- Inserta más discos
INSERT INTO discos (nombre, artista_id) VALUES 
('Il mio canto libero', 5),
('Diana', 6),
('The Dark Side of the Moon', 7),
('Dancing in the Moonlight', 8),
('Goodbye Yellow Brick Road', 9),
('Heroes', 10),
('The Suburbs', 11),
('Little Girl Blue', 12),
('Rumours', 13),
('This Is Acting', 14),
('Heartbreaker', 15);

-- Inserta más canciones
INSERT INTO canciones (nombre, duracion, disco_id) VALUES 
('Il mio canto libero', '00:05:10', 5),
('Aint No Mountain High Enough', '00:03:28', 6),
('Money', '00:06:22', 7),
('Dancing in the Moonlight', '00:03:33', 8),
('Candle in the Wind', '00:03:50', 9),
('Heroes', '00:06:07', 10),
('Ready to Start', '00:04:15', 11),
('Feeling Good', '00:02:54', 12),
('Go Your Own Way', '00:03:43', 13),
('Cheap Thrills', '00:03:31', 14),
('I Say a Little Prayer', '00:03:04', 15);

-- Inserta datos en la tabla de relación
INSERT INTO artistas_canciones (artista_id, cancion_id) VALUES 
(5, 5), 
(6, 6), 
(7, 7), 
(8, 8), 
(9, 9), 
(10, 10), 
(11, 11), 
(12, 12), 
(13, 13), 
(14, 14), 
(15, 15);

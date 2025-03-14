-- Paso 1
CREATE DATABASE IF NOT EXISTS TalotoysDB;

-- Paso 2
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE,
    icono VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL
);

CREATE TABLE marca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE,
    descripcion TEXT NOT NULL
);

CREATE TABLE producto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    id_marca INT NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_marca) REFERENCES marca(id) ON DELETE CASCADE
);

CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telefono VARCHAR(255) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    comentario TEXT
);

CREATE TABLE tematica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL UNIQUE,
    descripcion TEXT NOT NULL,
    foto VARCHAR(255) NOT NULL
);

CREATE TABLE producto_tematica (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT NOT NULL,
    id_tematica INT NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES producto(id) ON DELETE CASCADE,
    FOREIGN KEY (id_tematica) REFERENCES tematica(id) ON DELETE CASCADE
);

CREATE TABLE producto_categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT NOT NULL,
    id_categoria INT NOT NULL,
    FOREIGN KEY (id_producto) REFERENCES producto(id) ON DELETE CASCADE,
    FOREIGN KEY (id_categoria) REFERENCES categorias(id) ON DELETE CASCADE
);

CREATE TABLE venta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_producto INT NOT NULL,
    id_cliente INT NOT NULL,
    fecha DATE NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    comentario TEXT,
    FOREIGN KEY (id_producto) REFERENCES producto(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE CASCADE
);



_________________________________________________________________________________________


--crea contenido de ejemplo para rellenar la base de datos
Me gusta:
-coches hot wheels
- majorettes
- micromachines
- ciguras de acción como action man
y otros artículos vintage de los años 80 y 90 en europa



__________________________________________________________________

-- Insertar categorías
INSERT INTO categorias (nombre, icono, descripcion) VALUES
('Coches de Juguete', 'icon_coches.png', 'Coches a escala de diversas marcas vintage'),
('Figuras de Acción', 'icon_figuras.png', 'Figuras de acción clásicas de los años 80 y 90'),
('Juguetes Vintage', 'icon_vintage.png', 'Juguetes icónicos de los años 80 y 90 en Europa');

-- Insertar marcas
INSERT INTO marca (nombre, descripcion) VALUES
('Hot Wheels', 'Coches a escala de gran popularidad en todo el mundo'),
('Majorette', 'Coches de juguete a escala fabricados en Francia'),
('MicroMachines', 'Coches en miniatura con gran nivel de detalle'),
('Action Man', 'Figuras de acción de Hasbro populares en los 80 y 90');

-- Insertar temáticas
INSERT INTO tematica (nombre, descripcion, foto) VALUES
('Coches Clásicos', 'Modelos de coches icónicos en miniatura', 'coches_clasicos.jpg'),
('Aventuras', 'Figuras de acción de héroes y militares', 'aventuras.jpg');

-- Insertar productos
INSERT INTO producto (nombre, descripcion, precio, stock, id_marca, imagen) VALUES
('Hot Wheels Ferrari F40', 'Modelo icónico de Ferrari en escala 1:64', 15.99, 10, 1, 'ferrari_f40.jpg'),
('Majorette Camping Car nº 276', 'Autocaravana de Majorette escala 1/60', 12.50, 5, 2, 'majorette_camping_car.jpg'),
('MicroMachines Pack de Carreras', 'Set de 5 coches en miniatura', 18.99, 20, 3, 'micromachines_pack.jpg'),
('Action Man Soldado de Combate', 'Figura de acción con uniforme militar', 25.00, 7, 4, 'actionman_soldado.jpg');

-- Relacionar productos con temáticas
INSERT INTO producto_tematica (id_producto, id_tematica) VALUES
(1, 1), -- Hot Wheels Ferrari F40 -> Coches Clásicos
(2, 1), -- Majorette Camping Car -> Coches Clásicos
(3, 1), -- MicroMachines Pack -> Coches Clásicos
(4, 2); -- Action Man -> Aventuras

-- Relacionar productos con categorías
INSERT INTO producto_categoria (id_producto, id_categoria) VALUES
(1, 1), -- Hot Wheels Ferrari F40 -> Coches de Juguete
(2, 1), -- Majorette Camping Car -> Coches de Juguete
(3, 1), -- MicroMachines Pack -> Coches de Juguete
(4, 2); -- Action Man -> Figuras de Acción
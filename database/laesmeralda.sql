-- Elimina la base de datos si existe para evitar conflictos al crearla de nuevo
DROP DATABASE IF EXISTS laesmeralda;

-- Crea la base de datos
CREATE DATABASE laesmeralda;

-- Selecciona la base de datos para trabajar en ella
USE laesmeralda;

-- Crear la tabla de usuarios simplificada
CREATE TABLE usuarios (
    usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT chk_contrasena_length CHECK (CHAR_LENGTH(contrasena) >= 8)
);

-- Crear la tabla de categorías
CREATE TABLE categorias (
    categoria_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT
);

-- Crear la tabla de productos
CREATE TABLE productos (
    producto_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL CHECK (precio > 0),
    stock INT NOT NULL CHECK (stock >= 0),
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categorias(categoria_id) ON DELETE SET NULL
);

-- Crear la tabla de pedidos
CREATE TABLE pedidos (
    pedido_id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    fecha_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id)
);

-- Crear la tabla de detalles de pedidos
CREATE TABLE detalles_pedidos (
    detalle_pedido_id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT,
    producto_id INT,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(pedido_id),
    FOREIGN KEY (producto_id) REFERENCES productos(producto_id)
);

-- Crear índices para mejorar el rendimiento de las consultas
CREATE INDEX idx_usuarios_email ON usuarios(email);
CREATE INDEX idx_productos_nombre ON productos(nombre);
CREATE INDEX idx_pedidos_usuarioid ON pedidos(usuario_id);
CREATE INDEX idx_productos_categoria ON productos(categoria_id);


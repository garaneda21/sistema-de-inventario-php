CREATE DATABASE IF NOT EXISTS inventario;
USE inventario;

CREATE TABLE unidad_de_medida (
	id_unidad INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_unidad VARCHAR(20) NOT NULL,
    PRIMARY KEY (id_unidad)
);

INSERT INTO unidad_de_medida (nombre_unidad) VALUES
('Unidad'),
('Kilo');

-- CREATE TABLE categoria (
--     id_categoria INT UNSIGNED NOT NULL AUTO_INCREMENT,
--     nombre_categoria VARCHAR(20) NOT NULL,
--     PRIMARY KEY (id_categoria)
-- );

CREATE TABLE producto (
    id_producto INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_producto VARCHAR(250) NOT NULL,
    total_vendidos BIGINT UNSIGNED DEFAULT 0, 
    stock_minimo INT UNSIGNED DEFAULT 5,
    codigo_de_barra VARCHAR(25),
    tiempo_alerta_vencimiento INT UNSIGNED DEFAULT 0,
    activo CHAR(1) NOT NULL DEFAULT 1,
    requiere_fecha_vencimiento CHAR(1) NOT NULL DEFAULT 1,
    por_registrar CHAR(1) NOT NULL DEFAULT 0,
    -- id_categoria INT UNSIGNED NOT NULL,
    id_unidad INT UNSIGNED NOT NULL,
    PRIMARY KEY (id_producto)
);

CREATE TABLE precio (
    id_precio INT UNSIGNED NOT NULL AUTO_INCREMENT,
    precio INT UNSIGNED NOT NULL DEFAULT 0,
    fecha_inicio_precio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    fecha_fin_precio DATETIME,
    id_producto INT UNSIGNED NOT NULL,
    PRIMARY KEY (id_precio)
);

CREATE TABLE costo (
    id_costo INT UNSIGNED NOT NULL AUTO_INCREMENT, 
    costo INT UNSIGNED NOT NULL DEFAULT 0, 
    fecha_inicio_costo DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    fecha_fin_costo DATETIME,
    id_producto INT UNSIGNED NOT NULL,
    PRIMARY KEY (id_costo)
);

CREATE TABLE entrada_producto(
    id_producto INT UNSIGNED NOT NULL,
    id_entrada INT UNSIGNED NOT NULL,
    cantidad_entrada DECIMAL(20,2) NOT NULL,
    stock_actual_entrada DECIMAL(20,2) NOT NULL,
    fecha_vencimiento DATETIME,
    PRIMARY KEY (id_producto, id_entrada)
);

CREATE TABLE entrada (
    id_entrada INT UNSIGNED NOT NULL AUTO_INCREMENT,
    fecha_entrada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_entrada)
);

CREATE TABLE salida_producto(
    id_producto INT UNSIGNED NOT NULL,
    id_salida INT UNSIGNED NOT NULL,
    cantidad_salida DECIMAL(20,2) NOT NULL,
    PRIMARY KEY (id_producto, id_salida)
);

CREATE TABLE salida (
    id_salida INT UNSIGNED NOT NULL AUTO_INCREMENT,
    fecha_salida DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    id_motivo INT UNSIGNED NOT NULL,
    PRIMARY KEY (id_salida)
);

CREATE TABLE motivo_salida (
    id_motivo INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nombre_motivo VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_motivo)
);

INSERT INTO motivo_salida (nombre_motivo) VALUES
('Venta'),
('Vencido'),
('Daño');

-- DECLARACIÓN DE FK'S

ALTER TABLE producto
-- ADD FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria),
ADD FOREIGN KEY (id_unidad) REFERENCES unidad_de_medida(id_unidad);

ALTER TABLE precio
ADD FOREIGN KEY (id_producto) REFERENCES producto(id_producto);

ALTER TABLE costo
ADD FOREIGN KEY (id_producto) REFERENCES producto(id_producto);

ALTER TABLE entrada_producto
ADD FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
ADD FOREIGN KEY (id_entrada) REFERENCES entrada(id_entrada);

ALTER TABLE salida_producto
ADD FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
ADD FOREIGN KEY (id_salida) REFERENCES salida(id_salida);

ALTER TABLE salida
ADD FOREIGN KEY (id_motivo) REFERENCES motivo_salida(id_motivo);

INSERT INTO unidad_de_medida (nombre_unidad) VALUES
('Unidad'),
('Kilo');

INSERT INTO categoria (nombre_categoria) VALUES
('Frutas y verduras'),
('Bebidas'),
('Quesos'),
('Otro');

INSERT INTO motivo_salida (nombre_motivo) VALUES
('Venta'),
('Vencido'),
('Daño');

-- Datos de Prueba
-- Productos en la categoría "Frutas y verduras"
INSERT INTO producto (nombre_producto, total_vendidos, stock_actual, stock_minimo, codigo_de_barra, tiempo_alerta_vencimiento, id_categoria, id_unidad)
VALUES
('Manzanas', 0, 50.00, 10, 7801234000012, 7, 1, 2),
('Plátanos', 0, 30.00, 10, 7801234000029, 7, 1, 2);

-- Productos en la categoría "Bebidas"
INSERT INTO producto (nombre_producto, total_vendidos, stock_actual, stock_minimo, codigo_de_barra, tiempo_alerta_vencimiento, id_categoria, id_unidad)
VALUES
('Coca Cola 1.5L', 0, 20.00, 5, 7801234000036, 0, 2, 1),
('Jugo de Naranja Watts 1L', 0, 15.00, 5, 7801234000043, 0, 2, 1);

-- Productos en la categoría "Quesos"
INSERT INTO producto (nombre_producto, total_vendidos, stock_actual, stock_minimo, codigo_de_barra, tiempo_alerta_vencimiento, id_categoria, id_unidad)
VALUES
('Queso Gouda', 0, 10.00, 2, 7801234000050, 10, 3, 2),
('Queso Parmesano', 0, 5.00, 1, 7801234000067, 10, 3, 2);

-- Productos en la categoría "Otro"
INSERT INTO producto (nombre_producto, total_vendidos, stock_actual, stock_minimo, codigo_de_barra, tiempo_alerta_vencimiento, id_categoria, id_unidad)
VALUES
('Detergente Ariel 1kg', 0, 20.00, 3, 7801234000074, 0, 4, 2),
('Papel Higiénico Elite 6 rollos', 0, 15.00, 5, 7801234000081, 0, 4, 1);

-- Productos en la categoría "Comida chatarra"
INSERT INTO producto (nombre_producto, total_vendidos, stock_actual, stock_minimo, codigo_de_barra, tiempo_alerta_vencimiento, id_categoria, id_unidad)
VALUES
('Papas Fritas Lays 170g', 0, 25.00, 5, 7801234000098, 0, 4, 1),
('Barra de Chocolate Sahne-Nuss', 0, 30.00, 10, 7801234000104, 0, 4, 1);

-- Precios de los productos
INSERT INTO precio (precio, id_producto) VALUES
(1200, 1), -- Manzanas
(900, 2),  -- Plátanos
(1600, 3), -- Coca Cola 1.5L
(1400, 4), -- Jugo de Naranja Watts 1L
(7800, 5), -- Queso Gouda
(9200, 6), -- Queso Parmesano
(4500, 7), -- Detergente Ariel 1kg
(2900, 8), -- Papel Higiénico Elite 6 rollos
(1500, 9), -- Papas Fritas Lays 170g
(1000, 10); -- Barra de Chocolate Sahne-Nuss

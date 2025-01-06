-- Productos en la categoría "Frutas y verduras"
INSERT INTO producto (nombre_producto, total_vendidos, stock_minimo, codigo_de_barra, tiempo_alerta_vencimiento, id_unidad)
VALUES
('Manzanas', 0, 10, 7801234000012, 7, 2),
('Plátanos', 0, 10, 7801234000029, 7, 2),
('Coca Cola 1.5L', 0, 5, 7801234000036, 0, 1),
('Jugo de Naranja Watts 1L', 0, 5, 7801234000043, 0, 1),
('Queso Gouda', 0, 2, 7801234000050, 10, 2),
('Queso Parmesano', 0, 1, 7801234000067, 10, 2),
('Detergente Ariel 1kg', 0, 3, 7801234000074, 0, 2),
('Papel Higiénico Elite 6 rollos', 0, 5, 7801234000081, 0, 1),
('Papas Fritas Lays 170g', 0, 5, 7801234000098, 0, 1),
('Barra de Chocolate Sahne-Nuss', 0, 10, 7801234000104, 0, 1);

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

INSERT INTO costo (costo, id_producto) VALUES
(200, 1), -- Manzanas
(500, 2),  -- Plátanos
(600, 3), -- Coca Cola 1.5L
(400, 4), -- Jugo de Naranja Watts 1L
(5000, 5), -- Queso Gouda
(9000, 6), -- Queso Parmesano
(4000, 7), -- Detergente Ariel 1kg
(2000, 8), -- Papel Higiénico Elite 6 rollos
(1000, 9), -- Papas Fritas Lays 170g
(600, 10); -- Barra de Chocolate Sahne-Nuss

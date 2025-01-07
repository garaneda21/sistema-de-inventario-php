-- Productos en la categoría "Frutas y verduras"
INSERT INTO producto (nombre_producto, codigo_de_barra, id_unidad)
VALUES
('Manzanas', NULL, 2),
('Plátanos', NULL, 2),
('Coca Cola 1.5L', 801234000036, 1),
('Jugo de Naranja Watts 1L', 801234000043, 1),
('Queso Gouda', 801234000050, 2),
('Queso Parmesano',7801234000067, 2),
('Detergente Ariel 1kg', 801234000074, 1),
('Papel Higiénico Elite 6 rollos', 801234000081, 1),
('Papas Fritas Lays 170g', 801234000098, 1),
('Barra de Chocolate Sahne-Nuss', 7801234000104, 1);

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

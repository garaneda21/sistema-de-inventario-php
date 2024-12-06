INSERT INTO unidad_de_medida (nombre_unidad) VALUES
('Unidad'),
('Kilo');

INSERT INTO categoria (nombre_categoria) VALUES
('Frutas y verduras'),
('Bebida'),
('Otro');

INSERT INTO motivo_salida (nombre_motivo) VALUES
('Venta'),
('Vencido'),
('Daño');

-- Datos de Prueba

INSERT INTO producto (nombre_producto, total_vendidos, stock_actual, stock_minimo, codigo_de_barra, tiempo_alerta_vencimiento, id_categoria, id_unidad)
VALUES
('Manzana', 120, 50.00, 20, NULL, 5, 1, 2), -- Frutas y verduras, Kilo
('Lechuga', 80, 25.00, 10, NULL, 3, 1, 2), -- Frutas y verduras, Kilo
('Queso Mozzarella', 150, 10.00, 5, 123456789014, 10, 2, 2), -- Queso, Kilo
('Pollo Entero', 200, 15.00, 5, 123456789015, 7, 3, 2), -- Carne, Kilo
('Coca-Cola', 500, 100.00, 20, 123456789016, 30, 4, 1), -- Bebida, Unidad
('Manzana Roja', 220, 60.00, 25, NULL, 4, 1, 2), -- Frutas y verduras, Kilo
('Res Filete', 80, 12.00, 3, 123456789018, 8, 3, 2), -- Carne, Kilo
('Leche Entera', 300, 20.00, 10, 123456789019, 15, 4, 1), -- Bebida, Unidad
('Yogurt Natural', 50, 18.00, 8, 123456789020, 20, 5, 1), -- Otro, Unidad
('Banano', 180, 70.00, 30, NULL, 5, 1, 2) -- Frutas y verduras, Kilo
('Pepsi', 450, 200.00, 50, 223456789012, 30, 4, 1), -- Bebida, Unidad
('Fanta Naranja', 300, 150.00, 30, 323456789012, 30, 4, 1), -- Bebida, Unidad
('Doritos Queso', 600, 75.00, 20, 423456789012, 180, 5, 1), -- Otro, Unidad (Comida Chatarra)
('Lays Clásicas', 500, 80.00, 25, 523456789012, 150, 5, 1), -- Otro, Unidad (Comida Chatarra)
('Red Bull', 1200, 300.00, 100, 623456789012, 365, 4, 1), -- Bebida, Unidad
('Sprite', 350, 180.00, 40, 723456789012, 30, 4, 1), -- Bebida, Unidad
('Cheetos Bolitas', 450, 50.00, 15, 823456789012, 200, 5, 1), -- Otro, Unidad (Comida Chatarra)
('Pringles Original', 400, 120.00, 30, 923456789012, 180, 5, 1), -- Otro, Unidad (Comida Chatarra)
('Monster Energy', 800, 250.00, 70, 1023456789012, 365, 4, 1), -- Bebida, Unidad
('Galletas Oreo', 1000, 90.00, 20, 1123456789012, 120, 5, 1); -- Otro, Unidad (Comida Chatarra)
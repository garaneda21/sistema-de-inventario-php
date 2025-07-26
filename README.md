# sistema de inventario php

Sistema de inventario para un negocio de barrio.

## Funciones

- Dashboard con estadísticas.
- Soporte para escaner de códigos de barra.
- Módulo de ventas tipo cajero automático.
- Módulo de entradas.
- Alertas de stock y vencimiento.
- Filtros de búsqueda.
- Exportar base de datos con productos a archivo excel.
- Ingreso rápido de productos que no se encuentren en el sistema en el proceso de venta al escanear su código de barras, se define un nombre rápido y luego queda en el módulo de "pendientes".

---

## Instalación

- Este sistema está diseñado para ser utilizado de forma local.
- Se debe instalar las herramientas necesarias para correr PHP, como XAMPP o algún stack tecnológico como LAMP.
- Se debe instalar [Composer](https://getcomposer.org/) para instalar las dependencias del proyecto.
- Se puede utilizar como base de datos MySQL o MariaDB.


1. Mover los archivos de este proyecto al directorio raíz del servidor web que se esté utilizando.
2. Ejecurar el código SQL del directorio `db` para montar la base de datos.
3. Configurar archivo `includes/db.php` para la conexión a la base de datos.
4. Instalar las dependencias con composer

```bash
composer install
```

5. Abrir servidor en localhost.

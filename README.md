# sistema de inventario php

Sistema de inventario para un negocio de barrio.

Este proyecto no utiliza las mejores prácticas de organización de código.

---

## Instalación

- Este sistema esta diseñado para ser utilizado de forma local.
- Se debe instalar las herramientas necesarias para correr PHP, como XAMPP o algún stack tecnológico como LAMP.
- Se debe instalar [Composer](https://getcomposer.org/) para instalar las dependencias del proyecto
- Se puede utilizar como gestor de bases de datos MySQL o MariaDB.


1. Mover los archivos de este proyecto al directorio raíz del servidor web que se esté utilizando.
2. Ejecurar el código SQL del directorio `db` para montar la base de datos.
3. Configurar archivo `includes/db.php` para la conexión a la base de datos.
4. Instalar las dependencias con composer

```console
$ composer install
```

5. Abrir servidor en localhost.

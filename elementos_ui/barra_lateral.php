<aside>
    <!-- Logo -->
    <h2>Inventario Almacén Carolina</h2>
    <img src="img/logo.png" alt="Logo" class="logo">

    <a href="index.php" class="sidebar-btn">
        <div class="icon icon-inv">
            <img src="img/botones/home.png" alt="Pantalla Principal">
        </div>
        <p>Pantalla Principal</p>
    </a>

    <hr>

    <!-- Botones grandes -->
    <a href="modulo_ventas.php" class="sidebar-btn sidebar-btn-large sales">
        <div class="icon icon-big">
            <img src="img/botones/bag.png" alt="Módulo de ventas">
        </div>
        <p>Ventas</p>
    </a>
    <a href="modulo_entradas.php" class="sidebar-btn sidebar-btn-large entries">
        <div class="icon icon-big">
            <img src="img/botones/delivery-truck.png" alt="Módulo de Entradas">
        </div>
        <p>Entradas</p>
    </a>

    <hr>

    <a href="modulo_productos.php" class="sidebar-btn">
        <div class="icon icon-inv">
            <img src="img/botones/box.png" alt="Módulo de Productos">
        </div>
        <p>Productos</p>
    </a>

    <a href="modulo_productos_pendientes.php" class="sidebar-btn">
        <div class="icon icon-inv">
            <img src="img/botones/box.png" alt="Módulo de Productos">
        </div>
        <p>Pendientes</p>
        <span><?php require_once "includes/modulo_productos_pendientes/contar_productos_pendientes.php"; ?></span>
    </a>

    

    <a href="opciones.php" class="sidebar-btn last">
        <div class="icon icon-inv">
            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="512" height="512"><path d="M21,12a9.143,9.143,0,0,0-.15-1.645L23.893,8.6l-3-5.2L17.849,5.159A9,9,0,0,0,15,3.513V0H9V3.513A9,9,0,0,0,6.151,5.159L3.107,3.4l-3,5.2L3.15,10.355a9.1,9.1,0,0,0,0,3.29L.107,15.4l3,5.2,3.044-1.758A9,9,0,0,0,9,20.487V24h6V20.487a9,9,0,0,0,2.849-1.646L20.893,20.6l3-5.2L20.85,13.645A9.143,9.143,0,0,0,21,12Zm-6,0a3,3,0,1,1-3-3A3,3,0,0,1,15,12Z"/></svg>
        </div>
        <p>Opciones</p>
    </a>
</aside>

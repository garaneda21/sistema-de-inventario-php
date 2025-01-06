<form method="get">
    <div class="search-card">
        <div class="search-input-group">
            <input type="text" name="busqueda" class="search-input" placeholder="Buscar productos..." value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda']) : ''; ?>" />
            <button type="submit" class="search-button">Buscar</button>
        </div>
        <div class="pagination">
            <button type="button" class="page-btn prev-btn" disabled>&laquo; Anterior</button>
            <div class="page-numbers">
                <button type="button" name="pagina" value="1" class="page-btn">1</button>
                <button type="button" name="pagina" value="2" class="page-btn current">2</button>
                <button type="button" name="pagina" value="3" class="page-btn">3</button>
                <button type="button" name="pagina" value="4" class="page-btn">4</button>
                <button type="button" name="pagina" value="5" class="page-btn">5</button>
            </div>
            <button type="button" class="page-btn next-btn">Siguiente &raquo;</button>
        </div>
    </div>

    <div method="get" class="sorting-bar">
        <span>Ordenar por:
            <select name="orden" onchange="this.form.submit()">
                <option value="nombre">Nombre</option>
                <option value="mas-vendidos">Más Vendidos</option>
                <option value="price">Precio</option>
            </select>
        </span>
    </div>
</form>
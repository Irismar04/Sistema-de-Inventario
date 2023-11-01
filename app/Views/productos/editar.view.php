<!--Alertas-->
<?php if (isset($_GET['error'])): ?>
<?php if ($_GET['error'] == 'nombre'): ?>
<?= generarAlertaError('¡Ya hay un producto con ese nombre!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html"></a></li>
        </ol>
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <div class="mb-3">
                <a href="<?= url('productos') ?>" class="btn btn-info absolute"><i class="fas fa-arrow-left"></i>&nbsp;Volver</a>
                <h2 class="text-center font-weight-light my-4">Editar Producto</h2>
                <form method="post" action="<?= url('productos/actualizar') ?>">

                    <!-- Nombre del Producto -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            value="<?= $producto['nom_producto'] ?>" placeholder="Nombre del Producto" autofocus />
                    </div>

                    <!-- Categorias-->
                    <div class="mb-3">
                        <label for="categorias" class="form-label">Categoría</label>
                        <select name="categorias" id="categorias" class="form-select">
                            <!-- Por cada categoria, se crea una variable $categoria que uso para las opciones-->
                            <?php foreach ($categorias as $categoria):?>
                            <!-- value es lo que guardaremos, que sera el id, nom_categoria es lo que sale al usuario-->
                            <option value="<?= $categoria['id_categoria'] ?>"
                                <?= selected($categoria['id_categoria'], $producto['id_categoria']) ?>>
                                <?= $categoria['nom_categoria']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Marcas-->
                    <div class="mb-3">
                        <label for="marcas" class="form-label">Marca</label>
                        <select name="marcas" id="marcas" class="form-select">
                            <!-- Por cada marca, se crea una variable $marca que uso para las opciones-->
                            <?php foreach ($marcas as $marca):?>
                            <!-- value es lo que guardaremos, que sera el id, nom_marca es lo que sale al usuario-->
                            <option value="<?= $marca['id_marca'] ?>"
                                <?= selected($categoria['id_categoria'], $producto['id_categoria']) ?>>
                                <?= $marca['nom_marca']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Stock Inicial -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock Actual</label>
                        <input class="form-control" disabled value="<?= $producto['stock'] ?>" type="text" id="stock"
                            name="stock">
                    </div>

                    <!-- Stock Minimo -->
                    <div class="mb-3">
                        <label for="stock_minimo" class="form-label">Stock Mínimo</label>
                        <input class="form-control" type="text" value="<?= $producto['stock_minimo'] ?>"
                            id="stock_minimo" name="stock_minimo" placeholder="Stock Mínimo del Producto">
                    </div>

                    <!-- ID del producto a editar -->
                    <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">

                    <button class="btn btn-success" type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="<?= assetsDir('/js/validaciones/productos.js') ?>"></script>
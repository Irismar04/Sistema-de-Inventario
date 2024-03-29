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
                <h2 class="text-center font-weight-light my-4">Añadir Producto</h2>
                <form id="form" autocomplete="off" method="post" action="<?= url('productos') ?>">

                    <!-- Nombre del Producto -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"
                            placeholder="Nombre del Producto" autofocus />
                    </div>

                    <!-- Categorias-->
                    <div class="mb-3">
                        <label for="categorias" class="form-label">Categoría</label>
                        <select name="categorias" id="categorias" class="form-select">
                            <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
                            <option value="" hidden selected>Seleccione una categoria</option>

                            <!-- Por cada categoria, se crea una variable $categoria que uso para las opciones-->
                            <?php foreach ($categorias as $categoria):?>

                            <!-- value es lo que guardaremos, que sera el id, nom_categoria es lo que sale al usuario-->
                            <option value="<?= $categoria['id_categoria'] ?>"><?= $categoria['nom_categoria']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Marcas-->
                    <div class="mb-3">
                        <label for="marcas" class="form-label">Marca</label>
                        <select name="marcas" id="marcas" class="form-select">
                            <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
                            <option value="" hidden selected>Seleccione una marca</option>

                            <!-- Por cada marca, se crea una variable $marca que uso para las opciones-->
                            <?php foreach ($marcas as $marca):?>

                            <!-- value es lo que guardaremos, que sera el id, nom_marca es lo que sale al usuario-->
                            <option value="<?= $marca['id_marca'] ?>"><?= $marca['nom_marca']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Stock Inicial -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock Inicial</label>
                        <input class="form-control" type="number" id="stock" name="stock"
                            placeholder="Stock Inicial del Producto">
                    </div>

                    <!-- Stock Minimo -->
                    <div class="mb-3">
                        <label for="stock_minimo" class="form-label">Stock Mínimo</label>
                        <input class="form-control" type="number" id="stock_minimo" name="stock_minimo"
                            placeholder="Stock Mínimo del Producto">
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio (USD)</label>
                        <input class="form-control" type="number" step="0.01" id="precio" name="precio"
                            placeholder="Precio del producto en dolares">
                    </div>

                    <button class="btn btn-success" type="submit">Guardar</button>
                    <input class="btn btn-danger" type="reset" value="Limpiar">
                </form>
            </div>
        </div>
    </div>
</main>

<script src="<?= assets('/js/validaciones/productos.js') ?>"></script>
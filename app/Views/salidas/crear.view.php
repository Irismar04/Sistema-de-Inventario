<!--Alertas-->
<?php if (isset($_GET['error'])): ?>
<?php if ($_GET['error'] == 'cantidad'): ?>
<?= generarAlertaError('¡La cantidad de salida no puede ser mayor al stock actual!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html"></a></li>
        </ol>
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <div class="mb-3">
                <h2 class="text-center font-weight-light my-4">Añadir Salida</h2>
                <form id="form" method="post" action="<?= url('salidas') ?>">

                    <!-- Productos -->
                    <div class="mb-3">
                        <label for="productos" class="form-label">Producto</label>
                        <select name="id_producto" id="productos" class="form-select">
                            <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
                            <option value="" hidden selected>Seleccione un producto</option>

                            <!-- Por cada categoria, se crea una variable $categoria que uso para las opciones-->
                            <?php foreach ($productos as $producto):?>

                            <!-- value es lo que guardaremos, que sera el id, nom_producto es lo que sale al usuario-->
                            <option id="producto-<?= $producto['id_producto'] ?>" data-stock="<?= $producto['stock'] ?>" value="<?= $producto['id_producto'] ?>"><?= "{$producto['nom_producto']} - {$producto['stock']} unidades" ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Stock del producto seleccionado -->
                    <div class="mb-3">
                        <label for="stock-actual" class="form-label">Stock del producto seleccionado</label>
                        <input class="form-control" placeholder="Seleccione un producto" type="text" id="stock-actual" disabled>
                        <input type="hidden" id="stock-actual-hidden" name="stock_actual">
                    </div>

                    <!-- Cantidad -->
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input class="form-control" type="number" id="cantidad" name="cantidad_salida" 
                             placeholder="Cantidad de productos a restar del inventario">
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio de venta (USD$)</label>
                        <input class="form-control" type="number" step="0.01" id="precio" name="precio_salida" 
                             placeholder="Precio al que se vendieron los productos">
                    </div>

                    <!-- Motivo -->
                    <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo</label>
                        <select name="motivo" id="motivo" class="form-select">
                            <option value="" hidden selected>Seleccione el motivo de la salida</option>
                            <option value="<?= App\Constants\Motivo::SOLD ?>"><?= App\Constants\Motivo::match(App\Constants\Motivo::SOLD) ?></option>
                            <option value="<?= App\Constants\Motivo::DAMAGED ?>"><?= App\Constants\Motivo::match(App\Constants\Motivo::DAMAGED) ?></option>
                        </select>
                    </div>

                    <button class="btn btn-success" type="submit">Guardar</button>
                    <input class="btn btn-danger" type="reset" value="Limpiar">
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    // Obtener referencia a los elementos
    const inputProductos = document.getElementById('productos');
    const inputStockActual = document.getElementById('stock-actual');
    const inputStockActualHidden = document.getElementById('stock-actual-hidden');

    // Agregar evento de cambio al input de productos
    inputProductos.addEventListener('input', actualizarStock);

    // Función para actualizar el stock
    function actualizarStock() {
    const id = inputProductos.value;
    const stock = document.getElementById(`producto-${id}`).getAttribute('data-stock');
    
    // Obtener el valor del input de productos
    const cantidadProductos = parseInt(stock);

    // Actualizar el valor del input de stock actual
    inputStockActual.value = cantidadProductos;
    inputStockActualHidden.value = cantidadProductos;
    }
</script>

<script src="<?= assetsDir('/js/validaciones/salidas.js') ?>"></script>
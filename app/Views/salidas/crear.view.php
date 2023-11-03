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
            <div x-data="filtroDeProductos" class="mb-3">
                <a href="<?= url('salidas') ?>" class="btn btn-info absolute"><i class="fas fa-arrow-left"></i>&nbsp;Volver</a>
                <h2 class="text-center font-weight-light my-4">Añadir Salida</h2>
                <form id="form" autocomplete="off" method="post" action="<?= url('salidas') ?>">

                   <!-- Categorias -->
                   <div class="mb-3">
                        <label for="categorias" class="form-label">Categoría</label>
                        <select x-model="categoria" x-on:change="getProducts" name="id_categoria" id="categorias" class="form-select">
                            <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
                            <option value="" hidden selected>Seleccione una categoría</option>

                            <!-- Por cada categoria, se crea una variable $categoria que uso para las opciones-->
                            <?php foreach ($categorias as $categoria):?>

                            <!-- value es lo que guardaremos, que sera el id, nom_categoria es lo que sale al usuario-->
                            <option value="<?= $categoria['id_categoria'] ?>"><?= "{$categoria['nom_categoria']}" ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Productos -->
                    <div class="mb-3">
                        <label for="productos" class="form-label">Producto</label>
                        <select x-model="idProducto" x-on:change="updatePrice" name="id_producto" id="productos" class="form-select" :disabled="productos.length == 0">
                            <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
                            <option value="" hidden selected x-text="productos.length == 0 ? 'Seleccione una categoría' : 'Seleccione un producto'"></option>
                            <template x-for="producto in productos">
                                <option :value="producto.id_producto" x-text="`${producto.nom_producto} - Precio: ${USDollar.format(producto.precio)}`"></option>
                            </template>
                        </select>
                    </div>

                    <!-- Stock del producto seleccionado -->
                    <div class="mb-3">
                        <label for="stock-actual" class="form-label">Stock del producto seleccionado</label>
                        <input class="form-control" x-model="stock" name="stock_actual" placeholder="Seleccione un producto" type="number" id="stock-actual" readonly>
                    </div>

                    <!-- Cantidad -->
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input x-model="cantidad" x-on:input="updatePrice" class="form-control" type="number" id="cantidad" name="cantidad_salida" 
                             placeholder="Cantidad de productos a restar del inventario">
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio de venta (USD$)</label>
                        <input x-model="precio" class="form-control" type="number" step="0.01" id="precio" name="precio_salida" 
                             placeholder="Precio de venta de los productos" readonly>
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
    document.addEventListener('alpine:init', () => {
        Alpine.data('filtroDeProductos', () => ({
            productos: [],
            idProducto: '',
            categoria: '',
            producto: '',
            stock: '',
            cantidad: '',
            precio: '',
            USDollar: new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
            }),

            async getProducts() {
              const response = await fetch(`http://localhost/sistema-de-inventario/public/api/productos-por-categoria?id=${this.categoria}`);
              const data = await response.json();
              this.productos = data;
              this.producto = '';
              this.precio = '';
            },

            updatePrice() {
              this.producto = this.productos.find((producto) => {
                return producto.id_producto == this.idProducto;
              })

              this.stock = this.producto.stock
              if(this.quantity != ''){
                this.precio = this.producto.precio * this.cantidad;
              } else {
                this.precio = this.producto;
              }
            },
        }))
    })
</script>

<script src="<?= assetsDir('/js/validaciones/salidas.js') ?>"></script>
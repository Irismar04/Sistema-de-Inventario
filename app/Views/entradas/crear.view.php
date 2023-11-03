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
        <div x-data="filtroDeProductos" class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <div class="mb-3">
            <a href="<?= url('entradas') ?>" class="btn btn-info absolute"><i class="fas fa-arrow-left"></i>&nbsp;Volver</a>
                <h2 class="text-center font-weight-light my-4">Añadir Entrada</h2>
                <form id="form" autocomplete="off" method="post" action="<?= url('entradas') ?>">

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
                        <select name="id_producto" id="productos" class="form-select" :disabled="productos.length == 0">
                            <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
                            <option value="" hidden selected x-text="productos.length == 0 ? 'Seleccione una categoría' : 'Seleccione un producto'"></option>
                            <template x-for="producto in productos">
                                <option :value="producto.id_producto" x-text="`${producto.nom_producto} - ${producto.stock} unidades`"></option>
                            </template>
                        </select>
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio de compra (USD$)</label>
                        <input class="form-control" type="number" step="0.01" id="precio" name="precio_entrada" 
                             placeholder="Precio al que se compraron los productos">
                    </div>

                    <!-- Cantidad -->
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input class="form-control" type="number" id="cantidad" name="cantidad_entrada" 
                             placeholder="Cantidad de productos a añadir al inventario">
                    </div>

                    <!-- Fecha de vencimiento -->
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de vencimiento</label>
                        <input id="fecha" type="text" name="fecha_vencimiento" class="form-control" placeholder="Seleccione una fecha de vencimiento">
                        <script>
                            jQuery.datetimepicker.setLocale('es');
                            jQuery('#fecha').datetimepicker({
                            timepicker:false,
                            format:'Y-m-d'
                            });
                        </script>
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
            cantidad: '',
            precio: '',

            async getProducts() {
              const response = await fetch(`http://localhost/sistema-de-inventario/public/api/productos-por-categoria?id=${this.categoria}`);
              const data = await response.json();
              this.productos = data;
              this.producto = '';
              this.precio = '';
              console.log(this.categoria);
            },

            updatePrice() {
              this.producto = this.productos.find((producto) => {
                return producto.id_producto == this.idProducto;
              })
              if(this.quantity != ''){
                this.precio = this.producto.precio * this.cantidad;
              } else {
                this.precio = this.producto;
              }
            }
        }))
    })
</script>

<script src="<?= assetsDir('/js/validaciones/entradas.js') ?>"></script>
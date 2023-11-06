<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó un producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
<?= generarAlertaExito('¡Se editó el producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se eliminó el producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'activado'): ?>
<?= generarAlertaExito('¡Se activó el producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'desactivado'): ?>
<?= generarAlertaExito('¡Se desactivo el producto satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>

<!-- Alertas de error -->
<?php if(isset($_GET['error'])): ?>
<?php if($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al crear el producto!') ?>
<?php elseif($_GET['error'] == 'editar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al editar el producto!') ?>
<?php elseif($_GET['error'] == 'borrar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error borrando el producto!') ?>
<?php elseif($_GET['error'] == 'estado'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al activar o desactivar el producto!') ?>
<?php endif; ?>
<?php endif; ?>


<main class="mx-4">
    <h2 class="text-center font-weight-light my-4">Lista de Productos</h2>
    <a class="btn btn-info" href="<?= url('productos/reportes') ?>" style="float: right;">Generar PDF</a>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th rowspan="2">Nombre del producto</th>
                <th rowspan="2">Categoría</th>
                <th rowspan="2">Marca</th>
                <th rowspan="2">Stock</th>
                <th rowspan="2">Stock Minimo</th>
                <th rowspan="2">Precio (USD)</th>
                <th colspan="2">Acciones</th>
            </tr>
            <tr>
                <th>Estado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto):?>
            <tr>
                <td><?= ucfirst($producto['nom_producto']); ?></td>
                <td><?= ucfirst($producto['nom_categoria']);?></td>
                <td><?= ucfirst($producto['nom_marca']);?></td>
                <td><?= unidades($producto['stock']);?></td>
                <td><?= unidades($producto['stock_minimo']);?></td>
                <td><?= moneyUsd($producto['precio']) ?></td>
                <!-- Boton para cambiar estado del producto -->
                <td>
                    <form action="<?= url('productos/cambiar-estado') ?>" method="post"  onsubmit="return confirm('¿Esta seguro que desea cambiar el estado de este producto?')">
                    <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">
                    <input type="hidden" name="estado_viejo" value="<?= $producto['estado'] ?>">
                    <button type="submit" class="btn btn-<?= ($producto['estado'] == App\Constants\Status::ACTIVE) ? 'success' : 'danger' ?>"><?= App\Constants\Status::match($producto['estado']) ?></button>
                    </form>
                </td>
                <!-- Boton para editar -->
                <td>
                    <a class="btn" title="Editar" href="<?= editarUrl('productos', $producto['id_producto']) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <!-- Modal para borrar -->
                <?= modal('productos', $producto['id_producto'], 'Cuidado, ¿esta seguro que quiere cambiar el estado de este producto?') ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table id="tabla-del-pdf" style="display:none;">
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Stock</th>
                <th>Stock Minimo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto):?>
            <tr>
                <td><?= $producto['nom_producto']; ?></td>
                <td><?= $producto['nom_categoria'];?></td>
                <td><?= $producto['nom_marca'];?></td>
                <td><?= unidades($producto['stock']);?></td>
                <td><?= unidades($producto['stock_minimo']);?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<script>
    $(document).ready(function () {
        $('#tabla-de-reporte').DataTable({
            language: {
                url: '<?= assetsDir('/js/es-ES.json') ?>'
            }
        });
    });

    function generarPDF() {
        const doc = new window.jspdf.jsPDF()

        const titulo = 'Reporte - Productos';
        const rif = 'RIF: J-412948105';
        const direccion = 'Dirección: Guayacán de las Flores, Sector Calle 7, casa n°22';
        const nombre = 'Dueño: Edgar Zorrilla';
        const imgWidth = 32;
        const imgHeight = 28;
        const imgX = 10;
        const imgY = 10;

        // Añadir el título y la imagen en la misma línea
        doc.setFontSize(16);
        doc.text(titulo, imgX + imgWidth + 10, imgY - 8 + imgHeight / 2);
        doc.setFontSize(10);
        doc.text(rif, imgX + imgWidth + 10, imgY + imgHeight / 2);
        doc.text(direccion, imgX + imgWidth + 10, imgY + 8 + imgHeight / 2);
        doc.text(nombre, imgX + imgWidth + 10, imgY + 16 + imgHeight / 2);
        doc.addImage('<?= assetsDir('/img/imagen1.png') ?>', 'PNG', imgX, imgY, imgWidth, imgHeight);
        doc.autoTable({
            html: '#tabla-del-pdf',
            includeHiddenHtml: true,
            margin: { top: 50 },
        })
        doc.save(titulo);

    }
</script>
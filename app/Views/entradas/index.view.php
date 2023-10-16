<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó un producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
<?= generarAlertaExito('¡Se editó un producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se eliminó un producto satisfactoriamente!') ?>
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
<?php endif; ?>
<?php endif; ?>


<main class="mx-4">
    <h2 class="text-center font-weight-light my-4">Lista de Entradas de productos</h2>
    <button class="btn btn-info" onclick="generarPDF()" style="float: right;">Generar PDF</button>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Cantidad</th>
                <th>Precio de entrada (USD$)</th>
                <th>Fecha de entrada</th>
                <th>Fecha de vencimiento</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entradas as $entrada):?>
            <tr>
                <td><?= $entrada['nom_producto']; ?></td>
                <td><?= $entrada['nom_categoria'];?></td>
                <td><?= $entrada['nom_marca'];?></td>
                <td><?= $entrada['precio_entrada'];?></td>
                <td><?= $entrada['stock'];?></td>
                <td><?= $entrada['stock_minimo'];?></td>
                <!-- Boton para editar -->
                <td>
                    <a class="btn" href="<?= editarUrl('entradas', $entrada['id_entrada']) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <!-- Boton para mostrar modal de borrare -->
                <td>
                    <button class="btn" onclick="show(<?= $entrada['id_entrada'] ?>)">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
                <!-- Modal para borrar -->
                <?= modal('entradas', $entrada['id_entrada'], 'Cuidado, ¿esta seguro que quiere borrar esta entrada?') ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table id="tabla-del-pdf" style="display:none;">
        <thead>
            <tr>
                <th>Nombre del entrada</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Precio (USD$)</th>
                <th>Stock</th>
                <th>Stock Minimo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entradas as $entrada):?>
            <tr>
                <td><?= $entrada['nom_entrada']; ?></td>
                <td><?= $entrada['nom_categoria'];?></td>
                <td><?= $entrada['nom_marca'];?></td>
                <td><?= $entrada['precio_entrada'];?></td>
                <td><?= $entrada['stock'];?></td>
                <td><?= $entrada['stock_minimo'];?></td>
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
        doc.autoTable({
            html: '#tabla-del-pdf',
            includeHiddenHtml: true
        })
        doc.save("Reporte - entradas");
    }
    // Cuando cargue
    document.addEventListener("DOMContentLoaded", function () {
        // guarda todas las alertas en una variable
        const alertas = document.querySelectorAll("#alerta");

        alertas.forEach((alerta) => {
            // Le añade las clases para hacer la transición de entrada
            alerta.classList.add('slide-fade-enter-active');
            setTimeout(() => {
                alerta.classList.add('slide-fade-enter-to');
            }, 10);
        });
        setTimeout(() => {
            // Le añade las clases para hacer la transición de salida
            alertas.forEach(function (alerta) {
                alerta.classList.add('slide-fade-leave-active');
                alerta.classList.add('slide-fade-leave-to');
            });
        }, 3000);
    });
</script>
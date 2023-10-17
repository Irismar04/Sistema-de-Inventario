<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó stock a un producto satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>

<!-- Alertas de error -->
<?php if(isset($_GET['error'])): ?>
<?php if($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al añadir stock al producto!') ?>
<?php endif; ?>
<?php endif; ?>


<main class="mx-4">
    <h2 class="text-center font-weight-light my-4">Lista de Salidas de productos</h2>
    <button class="btn btn-info" onclick="generarPDF()" style="float: right;">Generar PDF</button>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Cantidad</th>
                <th>Precio de salida (USD$)</th>
                <th>Motivo de salida</th>
                <th>Fecha de salida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salidas as $salida):?>
            <tr>
                <td><?= $salida['nom_producto']; ?></td>
                <td><?= $salida['cantidad_salida'];?></td>
                <td><?= $salida['precio_salida'];?></td>
                <td><?= $salida['motivo'];?></td>
                <td><?= $salida['fecha_salida'];?></td>
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
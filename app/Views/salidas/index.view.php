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
                <th>Precio de salida (Bs)</th>
                <th>Motivo de salida</th>
                <th>Fecha de salida</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salidas as $salida):?>
            <tr>
                <td><?= $salida['nom_producto']; ?></td>
                <td><?= $salida['cantidad_salida'];?></td>
                <td><?= moneyUsd($salida['precio_salida']);?></td>
                <td><?= moneyBolivar($salida['precio_salida'] * ($divisa['cantidad'] ?? 0));?></td>
                <td><?= App\Constants\Motivo::match($salida['motivo']);?></td>
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

    function generarPDF() {
        const doc = new window.jspdf.jsPDF()

        const titulo = 'Reporte - Salidas';
        const imgWidth = 32;
        const imgHeight = 28;
        const imgX = 10;
        const imgY = 10;

        // Añadir el título y la imagen en la misma línea
        doc.setFontSize(16);
        doc.text(titulo, imgX + imgWidth + 10, imgY + imgHeight / 2);
        doc.addImage('<?= assetsDir('/img/imagen1.png') ?>', 'PNG', imgX, imgY, imgWidth, imgHeight);
        doc.autoTable({
            html: '#tabla-de-reporte',
            includeHiddenHtml: true,
            margin: { top: 50 },
        })
        doc.save(titulo);

    }
</script>
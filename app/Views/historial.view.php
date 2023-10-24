<main class="mx-4">
    <h2 class="text-center font-weight-light my-4">Historial de acciones</h2>
    <button class="btn btn-info" onclick="generarPDF()" style="float: right;">Generar PDF</button>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Acción</th>
                <th>Tabla</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historial as $registro):?>
            <tr>
                <td><?= $registro['nom_usuario']; ?></td>
                <td><?= App\Constants\Acciones::match($registro['accion']);?></td>
                <td><?= $registro['tabla'];?></td>
                <td><?= $registro['creado_en']; ?></td>
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

        const titulo = 'Reporte - Historial';
        const imgWidth = 32;
        const imgHeight = 28;
        const imgX = 10;
        const imgY = 10;

        // Añadir el título y la imagen en la misma línea
        doc.setFontSize(16);
        doc.text(titulo, imgX + imgWidth + 10, imgY + imgHeight / 2);
        doc.addImage('<?= assetsDir('/img/imagen1.png') ?>', 'PNG', imgX, imgY, imgWidth, imgHeight);
        doc.autoTable({
            html: '#tabla-del-pdf',
            includeHiddenHtml: true,
            margin: { top: 50 },
        })
        doc.save(titulo);

    }
</script>
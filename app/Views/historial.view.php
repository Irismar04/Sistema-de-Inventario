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
                <td><?= formatoDeFechaConHora($registro['creado_en']); ?></td>
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
            html: '#tabla-de-reporte',
            includeHiddenHtml: true,
            margin: { top: 50 },
        })
        doc.save(titulo);

    }
</script>
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
        doc.autoTable({
            html: '#tabla-de-reporte',
            includeHiddenHtml: true
        })
        doc.save("Reporte - Historial");
    }
</script>
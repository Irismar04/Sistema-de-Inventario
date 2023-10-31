<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó una categoría satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
<?= generarAlertaExito('¡Se editó una categoría satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se eliminó una categoría satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'activado'): ?>
<?= generarAlertaExito('¡Se activo una categoría satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'desactivado'): ?>
<?= generarAlertaExito('¡Se desactivo una categoría satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>

<!-- Alertas de error -->
<?php if(isset($_GET['error'])): ?>
<?php if($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al crear la categoría!') ?>
<?php elseif($_GET['error'] == 'editar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al editar la categoría!') ?>
<?php elseif($_GET['error'] == 'borrar'): ?>
<?= generarAlertaError('¡La categoría tiene productos asignados!') ?>
<?php elseif($_GET['error'] == 'estado'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al activar o desactivar la categoría!') ?>
<?php endif; ?>
<?php endif; ?>

<!--Contenido-->
<main class="mx-4">
    <h2 class="text-center font-weight-light my-4">Lista de Categorías</h2>
    <button class="btn btn-info" onclick="generarPDF()" style="float: right;">Generar PDF</button>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th rowspan="2">Nombre de la categoría</th>
                <th colspan="2">Acciones</th>
            </tr>
            <tr>
                <th>Estado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria):?>
            <tr>
                <td><?= $categoria['nom_categoria']; ?></td>
                <!-- Boton para cambiar estado del producto -->
                <td>
                    <form action="<?= url('categorias/cambiar-estado') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $categoria['id_categoria'] ?>">
                    <input type="hidden" name="estado_viejo" value="<?= $categoria['estado'] ?>">
                    <button type="submit" class="btn btn-<?= ($categoria['estado'] == App\Constants\Status::ACTIVE) ? 'success' : 'danger' ?>"><?= App\Constants\Status::match($categoria['estado']) ?></button>
                    </form>
                </td>
                <!-- Boton para editar -->
                <td>
                    <a class="btn" title="Editar" href="<?= editarUrl('categorias', $categoria['id_categoria']) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                
                <!-- Modal para borrar -->
                <?= modal('categorias', $categoria['id_categoria'], 'Cuidado, ¿esta seguro que quiere borrar esta categoria?') ?>
            </tr>
            <?php endforeach; ?>
    </table>

    <!-- Tabla a imprimir -->
    <table id="tabla-del-pdf" style="display: none;">
        <thead>
            <tr>
                <th>Nombre de la categoría</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria):?>
            <tr>
                <td><?= $categoria['nom_categoria'] ?></td>
            </tr>
            <?php endforeach; ?>
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

        const titulo = 'Reporte - Categorias';
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

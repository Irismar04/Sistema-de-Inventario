<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó una marca satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
<?= generarAlertaExito('¡Se editó una marca satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se eliminó una marca satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'activado'): ?>
<?= generarAlertaExito('¡Se activo una marca satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'desactivado'): ?>
<?= generarAlertaExito('¡Se desactivo una marca satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>

<!-- Alertas de error -->
<?php if(isset($_GET['error'])): ?>
<?php if($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al crear la marca!') ?>
<?php elseif($_GET['error'] == 'editar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al editar la marca!') ?>
<?php elseif($_GET['error'] == 'borrar'): ?>
<?= generarAlertaError('¡La marca tiene productos asignados!') ?>
<?php elseif($_GET['error'] == 'estado'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al activar o desactivar la marca!') ?>
<?php endif; ?>
<?php endif; ?>

<!--Contenido-->
<main class="mx-4">
    <h2 class="text-center font-weight-light my-4">Lista de Marcas</h2>
    <button class="btn btn-info" onclick="generarPDF()" style="float: right;">Generar PDF</button>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th rowspan="2">Nombre de la marca</th>
                <th rowspan="2">Estado</th>
                <th colspan="2">Acciones</th>
            </tr>
            <tr>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($marcas as $marca):?>
            <tr>
                <td><?= $marca['nom_marca']; ?></td>
                <!-- Boton para cambiar estado del producto -->
                <td>
                    <form action="<?= url('marcas/cambiar-estado') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $marca['id_marca'] ?>">
                        <input type="hidden" name="estado_viejo" value="<?= $marca['estado'] ?>">
                        <button type="submit"
                            class="btn btn-<?= ($marca['estado'] == App\Constants\Status::ACTIVE) ? 'success' : 'danger' ?>"><?= App\Constants\Status::match($marca['estado']) ?></button>
                    </form>
                </td>
                <!-- Boton para editar -->
                <td>
                    <a class="btn" title="Editar" href="<?= editarUrl('marcas', $marca['id_marca']) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <!-- Boton para mostrar modal de borrare -->
                <td>
                    <button class="btn" title="Eliminar" onclick="show(<?= $marca['id_marca'] ?>)">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
                <!-- Modal para borrar -->
                <?= modal('marcas', $marca['id_marca'], 'Cuidado, ¿esta seguro que quiere borrar esta marca?') ?>
            </tr>
            <?php endforeach; ?>
    </table>

    <!-- Tabla a imprimir -->
    <table id="tabla-del-pdf" style="display: none;">
        <thead>
            <tr>
                <th>Nombre de la marca</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($marcas as $marca):?>
            <tr>
                <td><?= $marca['nom_marca']; ?></td>
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
        doc.autoTable({
            html: '#tabla-del-pdf',
            includeHiddenHtml: true
        })
        doc.save("Reporte - Marcas");

    }
</script>
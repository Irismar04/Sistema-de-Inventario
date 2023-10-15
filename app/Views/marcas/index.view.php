<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó una marca satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
<?= generarAlertaExito('¡Se editó una marca satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se eliminó una marca satisfactoriamente!') ?>
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
                <th>Nombre de la marca</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($marcas as $marca):?>
            <tr>
                <td><?= $marca['nom_marca']; ?></td>
                <!-- Boton para editar -->
                <td>
                    <a class="btn" href="<?= editarUrl('marcas', $marca['id_marca']) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <!-- Boton para mostrar modal de borrare -->
                <td>
                    <button class="btn" onclick="show(<?= $marca['id_marca'] ?>)">
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
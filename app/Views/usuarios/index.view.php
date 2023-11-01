<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó un usuario satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
<?= generarAlertaExito('¡Se editó el usuario satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se eliminó el usuario satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'activado'): ?>
<?= generarAlertaExito('¡Se activó el usuario satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'desactivado'): ?>
<?= generarAlertaExito('¡Se desactivo el usuario satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'password'): ?>
<?= generarAlertaExito('¡Se ha cambiado la contraseña satisfactoriamenet!') ?>
<?php endif; ?>
<?php endif; ?>

<!-- Alertas de error -->
<?php if(isset($_GET['error'])): ?>
<?php if($_GET['error'] == 'crear'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al crear el usuario!') ?>
<?php elseif($_GET['error'] == 'editar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al editar el usuario!') ?>
<?php elseif($_GET['error'] == 'borrar'): ?>
<?= generarAlertaError('¡Ha ocurrido un error borrando el usuario!') ?>
<?php elseif($_GET['error'] == 'estado'): ?>
<?= generarAlertaError('¡Ha ocurrido un error al activar o desactivar el usuario!') ?>
<?php endif; ?>
<?php endif; ?>


<main class="mx-4">
    <h2 class="text-center font-weight-light my-4">Lista de Usuarios</h2>
    <button class="btn btn-info" onclick="generarPDF()" style="float: right;">Generar PDF</button>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th rowspan="2">Nombre de usuario</th>
                <th rowspan="2">Rol</th>
                <th rowspan="2">Nombre completo</th>
                <th rowspan="2">Cédula</th>
                <th rowspan="2">Genero</th>
                <th rowspan="2">Datos</th>
                <th colspan="3">Acciones</th>
            </tr>
            <tr>
                <th>Estado</th>
                <th>Contraseña</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario):?>
            <tr>
                <td><?= $usuario['nom_usuario']; ?></td>
                <td><?= $usuario['nom_rol']; ?></td>
                <td><?= ucwords("{$usuario['nom_per']} {$usuario['apellido_per']}"); ?></td>
                <td><?= $usuario['cedula']; ?></td>
                <td><?= App\Constants\Genero::match($usuario['genero']); ?></td>
                <td>
                    <a href="<?= url('usuarios')."/datos?id={$usuario['id_usuario']}" ?>" class="btn btn-info" title="Datos">
                        Datos
                    </a>
                </td>
                <!-- Boton para cambiar estado del usuario -->
                <td>
                    <form action="<?= url('usuarios/cambiar-estado') ?>" method="post" onsubmit="return confirm('¿Esta seguro que desea cambiar el estado de este usuario?')">
                    <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">
                    <input type="hidden" name="estado_viejo" value="<?= $usuario['estado'] ?>">
                    <button type="submit" class="btn btn-<?= ($usuario['estado'] == App\Constants\Status::ACTIVE) ? 'success' : 'danger' ?>"
                    <?= disabled($_SESSION['usuario']['id_usuario'], $usuario['id_usuario']) ?>><?= App\Constants\Status::match($usuario['estado']) ?></button>
                    </form>
                </td>
                <!-- Boton para cambiar contraseña -->
                <td class="text-center">
                    <a class="btn" title="Cambiar contraseña" href="<?= passUrl('usuarios', $usuario['id_usuario']) ?>" onclick="return confirm('¿Esta seguro que desea cambiar la contraseña de este usuario?')">
                        <i class="fa fa-lock"></i>
                    </a>
                </td>
                <!-- Boton para editar -->
                <td class="text-center">
                    <a class="btn" title="Editar" href="<?= editarUrl('usuarios', $usuario['id_usuario']) ?>" onclick="return confirm('¿Esta seguro que desea editar este usuario?')">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <!-- Modal para borrar -->
                <?= modal('usuarios', $usuario['id_usuario'], 'Cuidado, ¿esta seguro que quiere borrar esta usuario?') ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table id="tabla-del-pdf" style="display:none;">
        <thead>
            <tr>
            <th rowspan="2">Nombre de usuario</th>
                <th rowspan="2">Rol</th>
                <th rowspan="2">Nombre completo</th>
                <th rowspan="2">Cédula</th>
                <th rowspan="2">Genero</th>
                <th rowspan="2">Telefono</th>
                <th rowspan="2">Dirección</th>
                <th rowspan="2">Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario):?>
            <tr>
                <td><?= $usuario['nom_usuario']; ?></td>
                <td><?= $usuario['nom_rol']; ?></td>
                <td><?= ucwords("{$usuario['nom_per']} {$usuario['apellido_per']}"); ?></td>
                <td><?= $usuario['cedula']; ?></td>
                <td><?= $usuario['genero']; ?></td>
                <td><?= $usuario['telefono'] ?? 'No registrado'; ?></td>
                <td><?= $usuario['direccion'] ?? 'No registrado'; ?></td>
                <td><?= $usuario['correo'] ?? 'No registrado'; ?></td>      
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

        const titulo = 'Reporte - Usuarios';
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

<!-- Alertas de exito -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
<?= generarAlertaExito('¡Se agregó un producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
<?= generarAlertaExito('¡Se editó el producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
<?= generarAlertaExito('¡Se eliminó el producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'activar'): ?>
<?= generarAlertaExito('¡Se activó el producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'desactivar'): ?>
<?= generarAlertaExito('¡Se desactivo el producto satisfactoriamente!') ?>
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
    <h2 class="text-center font-weight-light my-4">Lista de Productos</h2>
    <button class="btn btn-info" onclick="generarPDF()" style="float: right;">Generar PDF</button>
    <br>
    <br>
    <table id="tabla-de-reporte">
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Estado</th>
                <th>Stock</th>
                <th>Stock Minimo</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto):?>
            <tr>
                <td><?= $producto['nom_producto']; ?></td>
                <td><?= $producto['nom_categoria'];?></td>
                <td><?= $producto['nom_marca'];?></td>
                <td>
                    <?= ($producto['estado']) ? "<button type=\"button\" onclick=\"desactivarProducto({$producto['id_producto']})\" class=\"btn btn-success\">Activo</button>" : "<button type=\"button\" onclick=\"activarProducto({$producto['id_producto']})\" class=\"btn btn-danger\">Inactivo</button>" ?>
                </td>
                <td><?= $producto['stock'];?></td>
                <td><?= $producto['stock_minimo'];?></td>
                <!-- Boton para editar -->
                <td>
                    <a class="btn" href="<?= editarUrl('productos', $producto['id_producto']) ?>">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table id="tabla-del-pdf" style="display:none;">
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Stock</th>
                <th>Stock Minimo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto):?>
            <tr>
                <td><?= $producto['nom_producto']; ?></td>
                <td><?= $producto['nom_categoria'];?></td>
                <td><?= $producto['nom_marca'];?></td>
                <td><?= $producto['stock'];?></td>
                <td><?= $producto['stock_minimo'];?></td>
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
        doc.save("Reporte - Productos");
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

<script>
function desactivarProducto(id) {
    const formData = new FormData();
    formData.append('id', id);
  fetch('<?= url('productos/desactivar') ?>', {
    method: 'POST',
    body: formData,
    credentials: "include"
  })
  .then(response => {
    if (response.ok) {
      window.location.href = '<?= url('productos?success=desactivar') ?>'
    } else {
      // La solicitud no fue exitosa
      console.error('Hubo un problema al desactivar el producto');
    }
  })
  .catch(error => {
    console.error('Error en la solicitud:', error);
  });
}

function activarProducto(id) {
    const formData = new FormData();
    formData.append('id', id);
  fetch('<?= url('productos/activar') ?>', {
    method: 'POST',
    body: formData,
    credentials: "include"
  })
  .then(response => {
    if (response.ok) {
        window.location.href = '<?= url('productos?success=activar') ?>'
    } else {
      // La solicitud no fue exitosa
      console.error('Hubo un problema al activar el producto');
    }
  })
  .catch(error => {
    console.error('Error en la solicitud:', error);
  });
}
</script>
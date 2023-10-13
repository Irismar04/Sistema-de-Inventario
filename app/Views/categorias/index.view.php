
<!-- Alertas -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
    <?= generarAlertaExito('¡Se agregó una categoría satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
    <script>
        if (confirm("¿Estás seguro de que quieres editar esta categoría?")) {
            window.location.href = "http://localhost/sistema-de-inventario/public/categorias/editar?id=<?= $categoria['id_categoria'] ?>";
        }
    </script>
    <?= generarAlertaExito('¡Se editó una categoría satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
    <script>
        if (confirm("¿Estás seguro de que quieres eliminar esta categoría?")) {
            window.location.href = "http://localhost/sistema-de-inventario/public/categorias/destruir?id=<?= $categoria['id_categoria'] ?>";
        }
    </script>
    <?= generarAlertaExito('¡Se eliminó una categoría satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>
<!--Contenido-->
<main>
    
    <h2 class="text-center font-weight-light my-4">Lista de Categorías</h2>
    <input type="button" class="btn btn-success" onclick="generarPDF()" value="General PDF" style="float: right;">

    <br>
    <br>
    <table id="tabla-de-reporte" style="margin: 0 auto;" class="table table-light table-striped ">
        <thead>
            <tr>
                <th>Nombre de la categoría</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($categorias as $categoria):?>
        <tr>
            <td><?= $categoria['nom_categoria']; ?></td>
            <!-- Boton para editar -->
            <td>
                <a class="btn" href="<?= editarUrl('categorias', $categoria['id_categoria']) ?>">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
            <!-- Boton para mostrar modal de borrare -->
            <td>
                <button class="btn" onclick="show(<?= $categoria['id_categoria'] ?>)">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
            <!-- Modal para borrar -->
            <?= modal('categorias', $categoria['id_categoria'], 'Cuidado, ¿esta seguro que quiere borrar esta categoria?') ?>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div style="height: 100vh"></div>
    </div>
</main>

<script>

     function generarPDF() {
        const doc = new window.jspdf.jsPDF()
        doc.autoTable({ html: '#tabla-de-reporte'})
        doc.save("Reporte");

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



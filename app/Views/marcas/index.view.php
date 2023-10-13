<!-- Alertas -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
    <?= generarAlertaExito('¡Se agregó una marca satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
    <?= generarAlertaExito('¡Se editó una marca satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
    <?= generarAlertaExito('¡Se eliminó una marca satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>


<main>
    
    <h2 class="text-center font-weight-light my-4">Lista de Marcas</h2>
    
<input type="button" class="btn btn-info" onclick="generarPDF()" value="General PDF" style="float: right;">
<br>
<br>

   
    
<table id="tabla-de-reporte" style="margin: 0 auto;" class="table table-light table-striped ">

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
            <th><a class="btn" 
href="http://localhost/sistema-de-inventario/public/marcas/editar?id=<?= $marca['id_marca'] ?>"><i class="fa fa-edit"></i></a></th>
            <th><a class="btn"
            href="http://localhost/sistema-de-inventario/public/marcas/destruir?id=<?= $marca['id_marca'] ?>"><i class="fa fa-trash"></i></a></th>
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
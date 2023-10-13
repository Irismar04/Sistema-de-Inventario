<!-- Alertas -->
<?php if(isset($_GET['success'])): ?>
<?php if($_GET['success'] == 'crear'): ?>
    <?= generarAlertaExito('¡Se agregó un Producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'editar'): ?>
    <?= generarAlertaExito('¡Se editó un Producto satisfactoriamente!') ?>
<?php elseif($_GET['success'] == 'borrar'): ?>
    <?= generarAlertaExito('¡Se eliminó un Producto satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>


<main>

    <h2 class="text-center font-weight-light my-4">Lista de Productos</h2>

    <br> 
    <input type="button" class="btn btn-info" onclick="generarPDF()" value="General PDF" style="float: right;">
    
    <table id="tabla-de-reporte" style="margin: 0 auto;" class="table table-light table-striped ">
        <br>
        <br>
        <thead>
            <tr>
                
                <th>Nombre del producto</th>
                <th>Categoría</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Stock Minimo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead> 
        <tbody>
        <?php foreach ($productos as $producto):?> 
        <tr>
            <td><?= $producto['nom_producto']; ?></td>
            <td><?= $producto['nom_categoria'];?></td>
            <td><?= $producto['nom_marca'];?></td>
            <td><?= $producto['precio_producto'];?></td>
            <td><?= $producto['stock'];?></td>
            <td><?= $producto['stock_minimo'];?></td>



            <th><a class="btn" 
href="http://localhost/sistema-de-inventario/public/productos/editar?id=<?= $producto['id_producto'] ?>"><i class="fa fa-edit"></i></a></th>
            <th><a class="btn"
            href="http://localhost/sistema-de-inventario/public/productos/destruir?id=<?= $producto['id_producto'] ?>"><i class="fa fa-trash"></i></a></th>
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
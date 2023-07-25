<main>
    <h2 class="text-center font-weight-light my-4">Lista de Productos</h2>
    <table style="margin: 0 auto;" class="table table-light table-striped ">
        <thead>
            <tr>
                <th>Nombre del producto</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto):?>
        <tr>
            <td><?= $producto['nom_producto']; ?></td>
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
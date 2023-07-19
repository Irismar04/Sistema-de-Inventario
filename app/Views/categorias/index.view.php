<main>
    <h2 class="text-center font-weight-light my-4">Lista de Categorias</h2>
    <table style="margin: 0 auto;" class="table table-light table-striped ">
        <thead>
            <tr>
                <th>Nombre de la categoria</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($categorias as $categoria):?>
        <tr>
            <td><?= $categoria['nom_categoria']; ?></td>
            <th><a class="btn" 
href="http://localhost/sistema-de-inventario/public/categorias/editar?id=<?= $categoria['id_categoria'] ?>"><i class="fa fa-edit"></i></a></th>
            <th><a class="btn"
            href="http://localhost/sistema-de-inventario/public/categorias/destruir?id=<?= $categoria['id_categoria'] ?>"><i class="fa fa-trash"></i></a></th>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div style="height: 100vh"></div>
    </div>
</main>
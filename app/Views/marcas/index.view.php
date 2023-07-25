<main>
    <h2 class="text-center font-weight-light my-4">Lista de Marcas</h2>
    <table style="margin: 0 auto;" class="table table-light table-striped ">
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
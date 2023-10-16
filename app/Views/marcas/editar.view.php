<main>
    <div class="container-fluid px-4">
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <h2 class="text-center font-weight-light my-4"> Editar Marca</h2>
            <form id="form" method="post" action="<?= url('marcas/actualizar') ?>">

                <!-- Nombre de la marca -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la marca</label>
                    <input type="text" class="form-control" value="<?= $marca['nom_marca'] ?>" name="nombre" id="nombre"
                        placeholder="Nombre de la marca" autofocus />
                    <p class="mt-2"><i>*Solo guarda letras</i></p>
                </div>

                <!-- ID de la marca a editar -->
                <input type="hidden" name="id" value="<?= $marca['id_marca'] ?>">

                <!-- Botones -->
                <button class="btn btn-success" type="submit">Editar</button>
                <input class="btn btn-danger" type="reset" value="Limpiar"></a>
            </form>
        </div>
    </div>
</main>

<script src="<?= assetsDir('/js/validaciones/marcas-y-categorias.js') ?>"></script>
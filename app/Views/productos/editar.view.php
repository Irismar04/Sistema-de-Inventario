<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html"></a></li>
            <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
                <h2 class="text-center font-weight-light my-4">Formulario de Editar Productos</h2>
                <form method="post" action="http://localhost/sistema-de-inventario/public/producto/actualizar">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del producto</label>

                        <input type="text" class="form-control" value="<?= $producto['nom_producto'] ?>" name="nombre" id="nombre" placeholder="Nombre del producto" autofocus />
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0"></div>
                        <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">
                        <button class="btn btn-success" type="submit">Editar</button>
                        <input class="btn btn-danger" type="reset" value="Limpiar"></a>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 py-4 bg-white">
            </div>
            <div style="height: 100vh"></div>
    </div>
</main>
<!--Alertas-->
<?php if (isset($_GET['error'])): ?>
<?php if ($_GET['error'] == 'nombre'): ?>
<?= generarAlertaError('¡Ya hay una marca con ese nombre!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html"></a></li>
        </ol>
            <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
                <h2 class="text-center font-weight-light my-4"> Añadir Marcas</h2>
                <form method="post" action="http://localhost/sistema-de-inventario/public/marcas">
                    <div class="mb-3">
                        <!-- Nombre de marca -->
                        <label for="nombre" class="form-label">Nombre </label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la marca" required="required" autofocus pattern="[a-zA-Z]+" />
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0"></div>
                        <p><i>*Solo guarda letras</i></p>

                        <button class="btn btn-success" type="submit">Guardar</button>
                        <input class="btn btn-danger" type="reset" value="Limpiar"></a>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 py-4 bg-white">
            </div>
            <div style="height: 100vh"></div>
    </div>
</main>
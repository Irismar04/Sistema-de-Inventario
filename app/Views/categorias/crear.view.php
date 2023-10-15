<!--Alertas-->
<?php if (isset($_GET['error'])): ?>
<?php if ($_GET['error'] == 'nombre'): ?>
<?= generarAlertaError('¡Ya hay una categoria con ese nombre!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
            <h2 class="text-center font-weight-light my-4"> Añadir Categoría</h2>
            <form id="form" method="post" action="http://localhost/sistema-de-inventario/public/categorias">
                <!-- Nombre de la categoría -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input class="form-control" name="nombre" id="nombre" placeholder="Nombre de la categoría" autofocus
                        type="text" />
                    <p class="mt-2"><i>*Solo guarda letras</i></p>
                </div>

                <!-- Botones -->
                <button class="btn btn-success" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Limpiar</button>
            </form>
        </div>
    </div>
</main>

<script>
    // Función para validar campos
    function validarCampo(campo, regla) {
        const valido = regla.test(campo)

        return valido;
    }

    // Formulario a validar
    const formulario = document.getElementById('form');


    formulario.addEventListener('submit', function (submit) {

        // Evita que se envie el formulario prematuramente
        submit.preventDefault();

        // Estado inicial de la validacion del formulario
        let formularioValido = true;

        // Campos
        const nombre = document.getElementById('nombre');

        // Valida nombre
        formularioValido = validarCampo(nombre.value, /^[a-zA-Z]+$/);

        // Si el nombre no es valido, tira una alerta
        if (!formularioValido) {
            alert('El nombre solo puede tener letras')
        }

        // Si todos los campos son validos, envia el formulario
        if (formularioValido) {
            formulario.submit();
        }

    })
</script>
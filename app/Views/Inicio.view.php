<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="/sistema-de-inventario/assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="/sistema-de-inventario/assets/css/custom.css">
    <script src="/sistema-de-inventario/assets/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Inicio de sesión</h3>
                            <h4 class="text-center font-weight-light my-4">Sistema de Inventario</h4>
                            <p style="text-align:center;"><img
                                    src="http://localhost/sistema-de-inventario/assets/img/imagen1.png" height="190px"
                                    alt="Logo InternetCtrl"></p>


                </div>
            <div class="card-body">
    <form method="post" action="/sistema-de-inventario/public/login">
    <div class="form-group">
    <label class="small mb-1" for="usuario"><i class="fas fa-user"></i>Usuario</label>
    <input class="form-control py-3" id="usuario" name="usuario" type="text"
                                        placeholder="Ingrese Usuario" />
</div>
    <br>
    <form id="form1">
            <div class="container">
    <div class="row">
    <div class="col-md-">

    <label class="small mb-1" for="clave"><i class="fas fa-key"></i>Contraseña</label>
        
<input id="clave" type="Password" name="contrasena" class="form-control py-3" placeholder="Ingrese Contraseña" />
    
           
            </div>

    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    <input class="btn btn-primary" type="reset" value="Limpiar"></a>

                </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    </div>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Derechos de autor &copy; Irismar Oliveros - Louwis Hernandez - 2023</div>
                <div>
                    <a href="#">Política de Privacidad</a>
                    &middot;
                    <a href="#">Términos &amp; Condiciones</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="/sistema-de-inventario/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/sistema-de-inventario/assets/js/scripts.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel</title>
        <link href="/sistema-de-inventario/assets/css/styles.css" rel="stylesheet" />
        <script src="/sistema-de-inventario/assets/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="http://localhost/sistema-de-inventario/public">Inversiones Zormar</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscador.." aria-label="Buscador..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Ajustes</a></li>
                        <li><a class="dropdown-item" href="#!">Registro de Actividades</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="http://localhost/sistema-de-inventario/public/inicio">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-cart-plus"></i></div>
                            Productos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="http://localhost/sistema-de-inventario/public/anadir">Añadir Productos</a>
                                    <a class="nav-link" href="http://localhost/sistema-de-inventario/public/lista">Lista de Productos</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Categorias
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Agregar categorias
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Eliminar categorias
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                            </div>
                            <a class="nav-link" href="http://localhost/sistema-de-inventario/public/usuario">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Gestion de usuarios
                            </a>
                            <a class="nav-link" href="http://localhost/sistema-de-inventario/public/tables">
                                <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></i></div>
                                Entrada de productos
                            </a>
                            <a class="nav-link" href="http://localhost/sistema-de-inventario/public/usuario">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                Salidas de productos
                            </a>
                            <a class="nav-link" href="http://localhost/sistema-de-inventario/public/tables">
                                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                                Historial
                            </a>
                            
                                    
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp;ADMINISTRADOR</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form>
                                            <fieldset>
                                                <legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group label-floating">
                                                                  <label class="control-label">DNI/CEDULA *</label>
                                                                  <input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="form-group label-floating">
                                                                  <label class="control-label">Nombres *</label>
                                                                  <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="nombre-reg" required="" maxlength="30">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="form-group label-floating">
                                                                  <label class="control-label">Apellidos *</label>
                                                                  <input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,30}" class="form-control" type="text" name="apellido-reg" required="" maxlength="30">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="form-group label-floating">
                                                                  <label class="control-label">Teléfono</label>
                                                                  <input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-reg" maxlength="15">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="form-group label-floating">
                                                                  <label class="control-label">Dirección</label>
                                                                  <textarea name="direccion-reg" class="form-control" rows="2" maxlength="100"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <br>
                                            <fieldset>
                                                <legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <div class="form-group label-floating">
                                                                  <label class="control-label">Nombre de usuario *</label>
                                                                  <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-reg" required="" maxlength="15">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="form-group label-floating">
                                                                  <label class="control-label">Contraseña *</label>
                                                                  <input class="form-control" type="password" name="password1-reg" required="" maxlength="70">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="form-group label-floating">
                                                                  <label class="control-label">Repita la contraseña *</label>
                                                                  <input class="form-control" type="password" name="password2-reg" required="" maxlength="70">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="form-group label-floating">
                                                                  <label class="control-label">E-mail</label>
                                                                  <input class="form-control" type="email" name="email-reg" maxlength="50">
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Genero</label>
                                                                <div class="radio radio-primary">
                                                                    <label>
                                                                        <input type="radio" name="optionsGenero" id="optionsRadios1" value="Masculino" checked="">
                                                                        <i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
                                                                    </label>
                                                                </div>
                                                                <div class="radio radio-primary">
                                                                    <label>
                                                                        <input type="radio" name="optionsGenero" id="optionsRadios2" value="Femenino">
                                                                        <i class="zmdi zmdi-female"></i> &nbsp; Femenino
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <br>
                                            <fieldset>
                                                <legend><i class="zmdi zmdi-star"></i> &nbsp; Nivel de privilegios</legend>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        
                                                        <div class="col-xs-12 col-sm-6">
                                                            <div class="radio radio-primary">
                                                                <div class="col-xs-12 col-sm-6">
                                                                    <p class="text-left">
                                                                        <b><div class="label label-success">Nivel 1</div> Control total del sistema</b>
                                                                    </p>
                                                                    <p class="text-left">
                                                                        <b><div class="label label-primary">Nivel 2</div> Permiso para registro y actualización</b>
                                                                    </p>
                                                                    <p class="text-left">
                                                                        <b><div class="label label-info">Nivel 3</div> Permiso para registro</b>
                                                                    </p>
                                                                </div>
                                                                <label>
                                                                    
                                                                    <input type="radio" name="optionsPrivilegio" id="optionsRadios1" value="1">
                                                                    <i class="zmdi zmdi-star"></i> &nbsp; Nivel 1 
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-primary">
                                                                <label>
                                                                    <input type="radio" name="optionsPrivilegio" id="optionsRadios2" value="2">
                                                                    <i class="zmdi zmdi-star"></i> &nbsp; Nivel 2
                                                                </label>
                                                            </div>
                                                            <div class="radio radio-primary">
                                                                <label>
                                                                    <input type="radio" name="optionsPrivilegio" id="optionsRadios3" value="3" checked="">
                                                                    <i class="zmdi zmdi-star"></i> &nbsp; Nivel 3
                                                                </label>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <p class="text-center" style="margin-top: 20px;">
                                                <button class="btn btn-success">Guardar</button>
                                                <input class="btn btn-danger"  type="reset" value="Limpiar"></a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            

                        </div>
                        <div style="height: 100vh"></div>
                       
                    </div>
                </main>
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
            </div>
        </div>
        <script src="/sistema-de-inventario/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/sistema-de-inventario/assets/js/scripts.js"></script>
    </body>
</html>

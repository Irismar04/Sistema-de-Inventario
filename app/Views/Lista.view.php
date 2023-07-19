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
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Buscador.." aria-label="Buscador..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Ajustes</a></li>
                    <li><a class="dropdown-item" href="#!">Registro de Actividades</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="http://localhost/sistema-de-inventario/public/inicio">Cerrar
                            sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-cart-plus"></i></div>
                            Productos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="http://localhost/sistema-de-inventario/public/anadir">Añadir
                                    Productos</a>
                                <a class="nav-link" href="http://localhost/sistema-de-inventario/public/lista">Lista de
                                    Productos</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Categorias
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Agregar categorias
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
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





                <h2 class="text-center font-weight-light my-4">Lista de Productos</h2>
                <table style="margin: 0 auto;" class="table table-light table-striped ">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>

                    <tfoot>


                    </tfoot>

                    <tr>
                        <td>Enlatados</td>
                        <td>Margarita</td>
                        <td>Atun enlanta</td>
                        <td>5</td>
                        <td>5$</td>
                        <td>07-03-2023</td>
                        <th><i class="fa fa-edit"></i></th>
                        <th><i class="fa fa-trash"></i></th>


                    </tr>
                    <tr>
                        <td>Charcuteria</td>
                        <td>SanBlas</td>
                        <td>Pollo</td>
                        <td>5</td>
                        <td>10$</td>
                        <td>08-03-2023</td>
                        <th><i class="fa fa-edit"></i></th>
                        <th><i class="fa fa-trash"></i></th>
                    </tr>
                    <tr>
                        <td>Viveres</td>
                        <td>Fina</td>
                        <td>Harinas</td>
                        <td>20</td>
                        <td>17$</td>
                        <td>10-03-2023</td>
                        <th><i class="fa fa-edit"></i></th>
                        <th><i class="fa fa-trash"></i></th>
                    </tr>
                    <tr>
                        <td>Bebida</td>
                        <td>Pepsi</td>
                        <td>Refresco</td>
                        <td>5</td>
                        <td>7$</td>
                        <td>12-03-2023</td>
                        <th><i class="fa fa-edit"></i></th>
                        <th><i class="fa fa-trash"></i></th>
                    </tr>
                    <tr>
                        <td>Viveres</td>
                        <td>Montalban</td>
                        <td>Azucar</td>
                        <td>4</td>
                        <td>3$</td>
                        <td>15-03-2023</td>
                        <th><i class="fa fa-edit"></i></th>
                        <th><i class="fa fa-trash"></i></th>
                    </tr>
                    <tr>
                        <td>Viveres</td>
                        <td>Mavesa</td>
                        <td>Mantequilla</td>
                        <td>25</td>
                        <td>19$</td>
                        <td>17-03-2023</td>
                        <th><i class="fa fa-edit"></i></th>
                        <th><i class="fa fa-trash"></i></th>
                    </tr>

                    </tbody>
                </table>
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
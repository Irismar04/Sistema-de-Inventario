<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel de Administrador</title>
        <link href="/sistema-de-inventario/assets/css/style.min.css" rel="stylesheet" />
        <link href="/sistema-de-inventario/assets/css/styles.css" rel="stylesheet" />
        <script src="/sistema-de-inventario/assets/js/all.js" crossorigin="anonymous"></script>
</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="http://localhost/sistema-de-inventario/public"><?= $titulo ?></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Buscador..." aria-label="Buscador..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                            
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link collapsed" href="http://localhost/sistema-de-inventario/public/anadir" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Gestionar Producto
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    <a class="nav-link" href="http://localhost/sistema-de-inventario/public/anadir">Consultar Producto</a>
                                    <a class="nav-link" href="http://localhost/sistema-de-inventario/public/anadir">Agregar Producto</a>
                                    <a class="nav-link" href="http://localhost/sistema-de-inventario/public/lista">Consultar Entrada</a>
                                    <a class="nav-link" href="http://localhost/sistema-de-inventario/public/lista">Consultar Salida</a>
                                    <a class="nav-link" href="http://localhost/sistema-de-inventario/public/lista">Consultar Categorias</a>
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
                                        Agregar Categorias
                                        
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Eliminar Categorias
                                        
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        
                                    </div>
                                    </nav>
                            </div>
                            <a class="nav-link" href="http://localhost/sistema-de-inventario/public/usuario">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Gestion de Usuarios
                            </a>
                            <a class="nav-link" href="http://localhost/sistema-de-inventario/public/tables">
                                <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                               Entradas de Productos
                            </a>
                            <a class="nav-link" href="http://localhost/sistema-de-inventario/public/usuario">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                               Salidas de Productos
                            </a>
                            <a class="nav-link" href="http://localhost/sistema-de-inventario/public/tables">
                                <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                               Historial
                            </a>
                        </div>

                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Bienvenido</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">
                                    <p>Usuarios Registrados</p>
                                    <p>05</p>
                                        
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Más información</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body">
                                        <p>Productos Registrados</p>
                                        <p>15</p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Más información</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                        <p>Categorias Registradas</p>
                                        <p>02</p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Más información</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <p>Marcas Registradas</p>
                                        <p>03</p>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Más información</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    
                                <div class="card bg-dark text-white mb-4">  
                                        Resumen de Actividades
                                    </div>
                                    <div class="card bg-primary text-white mb-4">
                                        <br>
                                    
                                        <b><p>Ultimos producto agregado: Coca-Cola 2L</p>
                                        <p>Ultimas entradas registrada: +20 PAN 1Kg</p>
                                        <p>Ultimas salidas registradas: -3 Ariel 500g </p></b>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Derechos de autor &copy; Irismar Oliveros - Louwis Hernandez - 2023</div>
                            <div>
                                <a href="#">Políticas de Privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="/sistema-de-inventario/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/sistema-de-inventario/assets/js/scripts.js"></script>
        <script src="/sistema-de-inventario/assets/js/chart.min.js" crossorigin="anonymous"></script>
        <script src="/sistema-de-inventario/assets/demo/chart-area-demo.js"></script>
        <script src="/sistema-de-inventario/assets/demo/chart-bar-demo.js"></script>
        <script src="/sistema-de-inventario/assets/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="/sistema-de-inventario/assets/js/datatables-simple-demo.js"></script>
    </body>
</html>

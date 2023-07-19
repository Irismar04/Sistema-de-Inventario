<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="http://localhost/sistema-de-inventario/public/anadir"
                    data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Gestionar Producto
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">

                        <a class="nav-link" href="http://localhost/sistema-de-inventario/public/anadir">Consultar
                            Producto</a>
                        <a class="nav-link" href="http://localhost/sistema-de-inventario/public/anadir">Agregar
                            Producto</a>
                        <a class="nav-link" href="http://localhost/sistema-de-inventario/public/lista">Consultar
                            Entrada</a>
                        <a class="nav-link" href="http://localhost/sistema-de-inventario/public/lista">Consultar
                            Salida</a>
                        <a class="nav-link" href="http://localhost/sistema-de-inventario/public/lista">Consultar
                            Categorias</a>
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
                    <a class="nav-link" href="http://localhost/sistema-de-inventario/public/categorias">
                        Consultar Categorias
                    </a>
                    <a class="nav-link" href="http://localhost/sistema-de-inventario/public/categorias/crear">
                        Agregar Categorias
                    </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">

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
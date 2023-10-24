<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="<?= url('dashboard') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Inicio
                </a>

                <!-- Productos -->
                <a class="nav-link collapsed pointer" href="#"
                    data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false"
                    aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Gestionar Producto
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link"
                            href="<?= url('productos/crear') ?>">Añadir</a>
                        <a class="nav-link" href="<?= url('productos') ?>">Consultar</a>
                    </nav>
                </div>
                <!--Fin de Productos -->

                <!--Categorias-->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Gestionar Categorias
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="<?= url('categorias/crear') ?>">
                            Añadir
                        </a>
                        <a class="nav-link" href="<?= url('categorias') ?>">
                            Consultar
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                        </div>
                    </nav>
                </div>

                <!--Fin Categoria -->

                <!--Marcas-->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMarcas"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Gestionar Marcas
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMarcas" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="<?= url('marcas/crear') ?>">
                            Añadir
                        </a>
                        <a class="nav-link" href="<?= url('marcas') ?>">
                            Consultar
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                        </div>
                    </nav>
                </div>
                <!--Fin Marcas -->
                
                <!--Gestion de Entradas  -->
                <a class="nav-link collapsed" href="#"
                    data-bs-toggle="collapse" data-bs-target="#collapseEntrada" aria-expanded="false"
                    aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Entradas de Productos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseEntrada" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="<?= url('entradas/crear') ?>">
                            Añadir
                        </a>
                        <a class="nav-link" href="<?= url('entradas') ?>">
                            Consultar
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">

                        </div>
                    </nav>
                </div>

                <!--Gestion de Salidas  -->
                <a class="nav-link collapsed" href="#"
                    data-bs-toggle="collapse" data-bs-target="#collapseSalida" aria-expanded="false"
                    aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                    Salidas de Productos
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSalida" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="<?= url('salidas/crear') ?>">
                            Añadir
                        </a>
                        <a class="nav-link" href="<?= url('salidas') ?>">
                            Consultar
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">

                        </div>
                    </nav>
                </div>

                <?php if($_SESSION['usuario']['nom_rol'] == 'Administrador'): ?>
                <!--Gestion de Usuario  -->
                <a class="nav-link collapsed" href="#"
                    data-bs-toggle="collapse" data-bs-target="#collapseUsuario" aria-expanded="false"
                    aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Gestion de Usuarios
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsuario" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="<?= url('usuarios/crear') ?>">
                            Añadir
                        </a>
                        <a class="nav-link" href="<?= url('usuarios') ?>">
                            Consultar
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">

                        </div>
                    </nav>
                </div>
                <!--Fin de Gestion de Usuario -->

                <!-- Historial -->
                <a class="nav-link" href="<?= url('historial') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                    Ver Historial
                </a>

                <!-- Divisa -->
                <a class="nav-link" href="<?= url('divisa') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                    Cambiar Divisa
                </a>
                <?php endif; ?>

                <a href="/sistema-de-inventario/Manual.pdf" download="Manual de Usuario.pdf" class="nav-link">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-pdf"></i>
                        Manual de Usuario
                </a>
            </div>
        </div>
    </nav>
</div>
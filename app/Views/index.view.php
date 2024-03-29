<!--Alertas-->
<?php if (isset($_GET['success'])): ?>
<?php if ($_GET['success'] == 'perfil-contrasena'): ?>
<?= generarAlertaExito('¡La contraseña de su cuenta se ha cambiado satisfactoriamente!') ?>
<?php endif; ?>
<?php if ($_GET['success'] == 'perfil-editar'): ?>
<?= generarAlertaExito('¡se ha editado su perfil satisfactoriamente!') ?>
<?php endif; ?>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bienvenido</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></li>
        </ol>
        <div class="row">
            <?php if($_SESSION['usuario']['nom_rol'] == 'Administrador'): ?>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <p>Usuarios activos en el sistema</p>
                        <p><?= "$usuariosActivos / $usuarios" ?></p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= url('usuarios') ?>">Más información</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <p>Productos debajo del stock minimo</p>
                        <p><?= "$productosDebajoDeStockMinimo / $productos" ?></p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= url('productos') ?>">Más información</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <p>Producto mas vendido</p>
                        <p><?= isset($productoMasVendido['nom_producto']) ? ucfirst($productoMasVendido['nom_producto']) : '¡No hay productos!' ?></p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= url('salidas') ?>">Más información</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <p>Producto menos vendido</p>
                        <p><?= isset($productoMenosVendido['nom_producto']) ? ucfirst($productoMenosVendido['nom_producto']) : '¡No hay productos!' ?></p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?= url('salidas') ?>">Más información</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Actividades -->
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card bg-dark text-white mb-4">
                        Resumen de Actividades
                    </div>
                    <div class="card bg-primary text-white mb-4">
                        <br>
                        <b>
                            <?php if($ultimoProducto): ?>
                            <p>Ultimo producto agregado:&nbsp;<?= ucfirst($ultimoProducto['nom_producto']) ?></p>
                            <?php endif ?>
                            <?php if($ultimaEntrada): ?>
                            <p>Ultima entrada
                                registrada:&nbsp;<?= "+{$ultimaEntrada['cantidad_entrada']} {$ultimaEntrada['nom_producto']}" ?>
                            </p>
                            <?php endif ?>
                            <?php if($ultimaSalida): ?>
                            <p>Ultima salida
                                registrada:&nbsp;<?= "-{$ultimaSalida['cantidad_salida']} {$ultimaSalida['nom_producto']}" ?>
                            </p>
                            <?php endif ?>
                        </b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<main>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html"></a></li>
            <div class="col-sm-5 col-md-10 col-lg-10 col-xl-10 py-10 bg-white">
                <h2 class="text-center font-weight-light my-4"> Editar Productos</h2>
                <form method="post" action="http://localhost/sistema-de-inventario/public/productos/actualizar">
                    <div class="mb-3">
                        <form method="post" action="http://localhost/sistema-de-inventario/public/productos/actualizar">


                    <!-- Nombre del Producto -->
                    <label for="nombre" class="form-label">Nombre</label>
<input type="text" class="form-control" name="nombre" value="<?= $producto['nom_producto']?>" id="nombre" placeholder="Nombre del Producto" required="" autofocus pattern="[a-zA-Z]+" />
                </div>
                
            
                        <!-- Categorias-->
    <label for="categorias">Categoría:</label>                            
<select name="categorias" class="form-control">
        
        <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
        <option value="" hidden selected>Seleccione una categoria</option>
    
    <!-- Por cada categoria, se crea una variable $categoria que uso para las opciones-->
    <?php foreach ($categorias as $categoria):?>

 <!-- value es lo que guardaremos, que sera el id, nom_categoria es lo que sale al usuario-->
    <option value="<?= $categoria['id_categoria']?>"
    <?php if($categoria['id_categoria'] == $producto['id_categoria']) {
        echo 'selected';
    }?>
    >
        <?= $categoria['nom_categoria']?></option>
    <?php endforeach; ?>
</select>
            

                <!-- Marcas-->
<label for="marcas">Marcas:</label> 
<select name="marcas" class="form-control">
        
        <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
        <option value="" hidden selected>Seleccione una marca</option>
    
    <!-- Por cada marca, se crea una variable $marca que uso para las opciones-->
    <?php foreach ($marcas as $marca):?>

 <!-- value es lo que guardaremos, que sera el id, nom_marca es lo que sale al usuario-->
    <option value="<?= $marca['id_marca']?>"

        <?php if($marca['id_marca'] == $producto['id_marca']) {
            echo 'selected';
        }?>
    >
        <?= $marca['nom_marca']?></option>
    <?php endforeach; ?>
</select> 
            

                <label class="control-label">Precio</label>
                <input pattern="[0-9-]{1,30}" class="form-control" type="text" name="precio" value="<?= $producto['precio_producto']?>" required="" maxlength="30" placeholder="Precio del Producto">


                <label class="control-label">Stock Mínimo</label>
                <input pattern="[0-9-]{1,30}" class="form-control" type="text" name="stock_minimo" value="<?= $producto['stock_minimo']?>" required="" maxlength="30" placeholder="Stock Mínimo del Producto">

              <br>

    <input type="hidden" value="<?= $_GET['id'] ?>">

                <button class="btn btn-success" type="submit">Guardar</button>
                <input class="btn btn-danger" type="reset" value="Limpiar">
            </form>
                        <form method="post" action="http://localhost/sistema-de-inventario/public/productos/actualizar">


                    <!-- Nombre del Producto -->
                    <label for="nombre" class="form-label">Nombre</label>
<input type="text" class="form-control" name="nombre" value="<?= $producto['nom_producto']?>" id="nombre" placeholder="Nombre del Producto" required="" autofocus pattern="[a-zA-Z]+" />
                </div>
                
            
                        <!-- Categorias-->
    <label for="categorias">Categoría:</label>                            
<select name="categorias" class="form-control">
        
        <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
        <option value="" hidden selected>Seleccione una categoria</option>
    
    <!-- Por cada categoria, se crea una variable $categoria que uso para las opciones-->
    <?php foreach ($categorias as $categoria):?>

 <!-- value es lo que guardaremos, que sera el id, nom_categoria es lo que sale al usuario-->
    <option value="<?= $categoria['id_categoria']?>"
    <?php if($categoria['id_categoria'] == $producto['id_categoria']) {
        echo 'selected';
    }?>
    >
        <?= $categoria['nom_categoria']?></option>
    <?php endforeach; ?>
</select>
            

                <!-- Marcas-->
<label for="marcas">Marcas:</label> 
<select name="marcas" class="form-control">
        
        <!-- Opcion que sale mostrado un texto de ayuda al usuario-->
        <option value="" hidden selected>Seleccione una marca</option>
    
    <!-- Por cada marca, se crea una variable $marca que uso para las opciones-->
    <?php foreach ($marcas as $marca):?>

 <!-- value es lo que guardaremos, que sera el id, nom_marca es lo que sale al usuario-->
    <option value="<?= $marca['id_marca']?>"

        <?php if($marca['id_marca'] == $producto['id_marca']) {
            echo 'selected';
        }?>
    >
        <?= $marca['nom_marca']?></option>
    <?php endforeach; ?>
</select> 
            

                <label class="control-label">Precio</label>
                <input pattern="[0-9-]{1,30}" class="form-control" type="text" name="precio" value="<?= $producto['precio_producto']?>" required="" maxlength="30" placeholder="Precio del Producto">


                <label class="control-label">Stock Mínimo</label>
                <input pattern="[0-9-]{1,30}" class="form-control" type="text" name="stock_minimo" value="<?= $producto['stock_minimo']?>" required="" maxlength="30" placeholder="Stock Mínimo del Producto">

              <br>

    <input type="hidden" value="<?= $_GET['id'] ?>">

                <button class="btn btn-success" type="submit">Guardar</button>
                <input class="btn btn-danger" type="reset" value="Limpiar">
            </form>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 py-4 bg-white">
            </div>
            <div style="height: 100vh"></div>
    </div>
</main>


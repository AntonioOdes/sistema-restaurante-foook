
<?php foreach ($listaProductos as $producto) { ?>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <h6 class="categoria_sub"><i><?php echo $producto['categoria_nombre'] ?></i></h6>
                <h5><?php echo $producto['nombre']; ?></h5>
                <h5 class="card-title">$<?php echo $producto['precio']; ?></h5>
               
                <form action="" method="post">
                <input  hidden type="text" name="id"  value="<?php echo  openssl_encrypt($producto['id'],COD,KEY);  ?>">
                <input  hidden type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY);?>">
                <input  hidden type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY);?>">
                <input  hidden type="text" name="descripcion" id="descripcion" value="<?php echo openssl_encrypt($producto['descripcion'],COD,KEY);?>">
                <input  hidden type="text" name="id_categoria"  value="<?php echo openssl_encrypt($producto['id_categoria'],COD,KEY);?>">
                    <button class="btn btn-danger" type="submit" name="btnCRUD" value="eliminarProducto">Eliminar</button>
                   
                </form>
               
                <a href="../admin/modificarProducto.php?id=<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
    <button class="btn btn-primary">Modificar</button>
</a>
          
            </div>
        </div>
    </div>
<?php } ?>

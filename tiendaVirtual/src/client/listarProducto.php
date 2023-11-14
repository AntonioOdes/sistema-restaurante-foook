<?php
include('../../config/config.php');
include('../../config/connection.php');
include('../carritoProducto.php');
include('../templates/cabecera.php');
?>
    <section class="section-portada">
        <div>
            <img src="../images/prsfoodok.gif" alt="">
        </div>
       <button>s</button>
        
    </section>
    <section class="section-menu">

        <h1>CARTA ONLINE</h1>
        <div class="row">
          <?php 
          $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre
          FROM producto, categoria where producto.id_categoria = categoria.id");
          $sentencia->execute();
          $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
           //print_r($listaProductos);
           ?>
            <?php foreach($listaProductos as $producto){ ?>
          <div class="col-3">
          <div class="card">
                <img 
                title="<?php echo $producto['nombre'];?>"
                class="card-img-top"
                alt="<?php echo $producto['nombre'];?>"
                src="<?php echo $producto['imagen'];?>"
                data-toggle="popover"
                data-trigger="hover"
                data-content="And here's some amazing content. It's very engaging. Right?"
                height="180"
            >

            <div class="card-body">
              <span><h6><?php echo $producto['categoria_nombre']?></h6></span>
              <span><?php echo $producto['nombre'];?></span>
              <h5 class="card-title">$<?php echo $producto['precio'];?></h5>
              <p class="card-text"><?php echo $producto['descripcion'];?></p>

              <form action="" method="post">
                <input  hidden type="text" name="id" id="id" value="<?php echo  openssl_encrypt($producto['id'],COD,KEY);  ?>">
                <input  hidden type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY);?>">
                <input  hidden type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY);?>">
                <input  hidden type="text" name="descripcion" id="descripcion" value="<?php echo openssl_encrypt($producto['descripcion'],COD,KEY);?>">
                <input  hidden type="text" name="categoria_nombre" id="categoria_nombre" value="<?php echo openssl_encrypt($producto['categoria_nombre'],COD,KEY);?>">
                <input  hidden type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                

                <button 
                  class="btn btn-primary" 
                  name="btnAccion"
                  value="AgregarCarrito"
                  type="submit" >
                  agregar al carrito
                </button>

              </form>    
            </div>
          </div>
        </div>
        <?php } ?>      
      </div>

    </section>
    
    </header>
    <script>
      $(function () {
        $('[data-toggle="popover"]').popover()
      })
    </script>
</body>
</html>
<?php include('../templates/pie.php')?>
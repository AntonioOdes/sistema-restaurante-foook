<?php
include('../../config/config.php');
include('../../config/connection.php');
include('./../templates/cabecera.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Admin</title>
</head>
<body>
    <section class="section-gestionarProductos">
        <h2>Agregar producto</h2>
        <?php 
        $sentencia = $pdo->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        $listaCategoria=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        ?>
        
       
    <form action="../carritoProducto.php" method="post">
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nombre</span>
        <input type="text" class="form-control" placeholder="Username"  name="nombreProducto" id="nombreProducto" aria-label="nombreProducto" aria-describedby="basic-addon1">
        </div>

        <select class="form-select" id="categoriaProducto" name="categoriaProducto" aria-label="Default select example">
         <option selected>Open this select menu</option>
         <?php foreach($listaCategoria as $categoria){ ?>
             <option value= ><?php echo $categoria['id'];?></option>      
        <?php } ?> 

        
        
        </select>

        <div class="mb-3">
        <label for="basic-url" class="form-label">Agrega una URL a una imagen</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon3">URL</span>
            <input type="text" name="urlImagenProducto" class="form-control" id="urlImagenProducto" aria-describedby="basic-addon3 basic-addon4">
        </div>
        <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
        </div>
     
        
        <div class="input-group mb-3">
        <span class="input-group-text">Precio $</span>
        <input type="text"  name="precioProducto" id="precioProducto"class="form-control" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-text">.00</span>
        </div>

        <div class="input-group">
        <span class="input-group-text">Descripción</span>
        <textarea class="form-control" name="descripcionProducto" id="descripcionProducto" aria-label="With textarea"></textarea>
        </div>

        <button 
        class="btn btn-primary" 
        name="btnAccion"
        value="AgregarProducto"
        type="submit" >
        agregar producto
        </button>
    </form>
    
    </section>
    
</body>
</html>
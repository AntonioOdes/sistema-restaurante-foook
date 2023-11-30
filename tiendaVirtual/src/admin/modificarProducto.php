<?php
include('../../config/config.php');
include('../../config/connection.php');
include('./../templates/cabecera.php');
include('../carritoProducto.php');

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
    <section class="section-menu">
        <section class="contenido">
        <h2>Modificar Prodkucto</h2>
        <?php 
        $sentencia = $pdo->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        $listaCategoria=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        ?>
         <script>
            alert("dsdf");
            $id = $_POST['id'];
            alert('categoria' . $id.);
        </script>
        
       
    <form action="../carritoProducto.php" method="post">
        
   
        <label for="modP">producto</label>
        <div class="input-group mb-3">
        <input type="text" class="form-control" value=""  placeholder="nombre"  name="modificarProducto" id="modP" aria-label="nombreProducto" aria-describedby="basic-addon1">
        </div>

        <label for="modC">categoria</label>
        <select class="form-select" id="modC" name="modificarCategoria" aria-label="Default select example">
            <option selected>categoria</option>
            <?php
            $conta = 0; // Agregamos la inicialización de $conta
            foreach ($listaCategoria as $categoria) {
                $conta += 1; // Añadimos el punto y coma
            ?>
                <option value="<?php echo $conta; ?>"><?php echo $categoria['nombre']; ?></option>
            <?php } ?>
        </select>
        <br>
        
        <label for="modP">precio (CL)</label>
       
        <input type="text"  name="modificarPrecio" id="modP"class="form-control" aria-label="Amount (to the nearest dollar)">
       
        <br>

        <label for="modD">descripción</label>
        <div class="input-group">
        <span class="input-group-text">Descripción</span>
        <textarea class="form-control" name="modificarDescripcion" id="modD" aria-label="With textarea"></textarea>
        </div>

        <button 
        class="btn btn-primary" 
        name="btnAccion"
        value="modificarProducto"
        type="submit" >
        modificar
        </button>
    </form>
    
    </section>
    </section>
    
    
</body>
</html>
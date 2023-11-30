<?php
include('../../config/config.php');
include('../../config/connection.php');
include('./../templates/cabecera.php');

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['btnCRUD']) && $_POST['btnCRUD'] == 'agregar') {
        // Obtener los datos del formulario
        $nombreProducto = $_POST['nombreProducto'];
        $categoriaProducto = $_POST['categoriaProducto'];
        $precioProducto = $_POST['precioProducto'];
        $descripcionProducto = $_POST['descripcionProducto'];

        // Realizar las operaciones necesarias con los datos (por ejemplo, insertar en la base de datos)
        // ...

        // Imprimir el valor de 'nombreProducto' después de procesar el formulario
        echo "Nombre del producto: " . $nombreProducto;
    }
}
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
        <h2>Agregar producto</h2>
        <?php 
        $sentencia = $pdo->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        $listaCategoria = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        ?>
        
    <form action="../carritoProducto.php" method="post">
        <label for="MnombreProducto">producto</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="nombre"  name="nombreProducto" id="MnombreProducto" aria-label="nombreProducto" aria-describedby="basic-addon1">
        </div>

        <label for="McategoriaProducto">categoria</label>
        <select class="form-select" id="McategoriaProducto" name="categoriaProducto" aria-label="Default select example">
            <option selected>categoria</option>
            <?php
            foreach ($listaCategoria as $conta => $categoria) {
            ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                
            <?php } ?>
            
        </select>

        <br>
        
        <label for="MprecioProducto">precio (CL)</label>
        <input type="text" name="precioProducto" id="MprecioProducto" class="form-control" aria-label="Amount (to the nearest dollar)">
        <br>

        <label for="MdescripcionProducto">descripción</label>
        <div class="input-group">
            <span class="input-group-text">Descripción</span>
            <textarea class="form-control" name="descripcionProducto" id="MdescripcionProducto" aria-label="With textarea"></textarea>
        </div>

        <button class="btn btn-primary" name="btnCRUD" value="agregar" type="submit">Agregar producto</button>
    </form>
    
    </section>
    </section>
    
</body>
</html>

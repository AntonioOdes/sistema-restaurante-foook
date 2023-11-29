<?php
include('../../config/config.php');
include('../../config/connection.php');
include('../templates/cabecera.php');
include('../carritoProducto.php');

?>
<?php
foreach($_SESSION['carrito'] as $indice => $producto) {
    
    echo $producto['id'];
    echo $producto['nombre'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


</body>
</html>
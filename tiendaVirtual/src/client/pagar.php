<?php
include('../../config/config.php');
include('../../config/connection.php');
include('../templates/cabecera.php');
include('../carritoProducto.php');

?>
<?php 

/*if($_POST){
  $total=0;
  $SID = session_id();
  $correo = $_POST['email'];


  foreach($_SESSION['carrito'] as $indice => $producto) {
    $total = $total + ($producto['precio'] * $producto['cantidad']);
}


$sentencia = $pdo->prepare("INSERT INTO `venta` (`id`, `clavetransaccion`, `datoscuenta`, `correo`, `fecha`, `total`, `status`)
   VALUES (NULL, :claveTransaccion, '', :correo, NOW(), :total, 'procesado')");

$sentencia->bindParam(":claveTransaccion", $SID);
$sentencia->bindParam(":total", $total);
$sentencia->bindParam(":correo", $correo);

$exitoInsercion = $sentencia->execute();

if ($exitoInsercion) {
    $idInsertado = $pdo->lastInsertId();

    // Ahora puedes realizar una consulta para obtener los datos de la fila insertada
    $consulta = $pdo->prepare("SELECT * FROM `venta` WHERE `id` = :id");
    $consulta->bindParam(":id", $idInsertado);
    $consulta->execute();

    $filaInsertada = $consulta->fetch(PDO::FETCH_ASSOC);

    // Muestra los datos de la fila insertada
    print_r($filaInsertada);
} else {
    echo "Error en la inserción.";
}

 
}
*/

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal JS SDK Standard Integration</title>
  </head>
  <body>

  <div class="card-columns">
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Confirmar Pago</h4>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
        <!--<h3>total: <?php// echo $total?></h3>-->
        <hr>
        <?php
         $sentencia = $pdo->prepare("SELECT producto.*, categoria.nombre as categoria_nombre, categoria.id
         as categoria_id from producto  JOIN categoria ON producto.id_categoria = categoria.id where categoria.id = id_categoria ");
        $sentencia->execute();
        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        //print_r($listaProductos);
        ?>
        <table>
          <tr>
            <th></th>
            <th>producto</th>
            <th>precio</th>
          </tr>
          <?php foreach($_SESSION['carrito'] as $indice=>$producto)  {
          $total = 0 ?>
          <tr>
            <th></th>
            <td><?php echo $producto["nombre"]?></td>
            <td><?php echo $producto["precio"]?></td>
            <td><?php echo $producto["id"]?></td>

          </tr>
          <?php $total=$total+($producto['precio']*$producto['cantidad'])?>
          <?php }?>
        <tr>
            <th>precio unitario</th>   
          </tr>
          <tr>
          <th>total</th>
          <td><?php echo $total?></td>
         </tr>
        </table>
  
      
       
        
     
       
      
    </div>
</div>

    
  </body>
</html>
<?php include('../templates/pie.php')?>
<?php 

session_start();
$mensaje = "";
$mensajesql = "";

if(isset($_POST['btnAccion'])){
    
    switch($_POST['btnAccion']){
        case 'AgregarCarrito':
            
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $id = openssl_decrypt($_POST['id'],COD,KEY);
               $mensaje.= "Ok id correcto =".$id. "</br>";
            }else{
                $mensaje.= "Error id correcto =".$id. "</br>"; break;  
            }
            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $nombre = openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.= "Ok nombre  =".$nombre. "</br>";
            }else{
                $mensaje.= "Error nombre =".$nombre. "</br>"; break;  
            }
            if(is_string(openssl_decrypt($_POST['categoria_nombre'],COD,KEY))){
                $categoria_nombre = openssl_decrypt($_POST['categoria_nombre'],COD,KEY);
                $mensaje.= "Ok categoria_nombre  =".$categoria_nombre. "</br>";
            }else{
                $mensaje.= "Error categoria_nombre =".$categoria_nombre. "</br>";  
            }

            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $cantidad = openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.= "Ok cantidad =".$cantidad. "</br>";
            }else{
                $mensaje.= "Error cantidad =".$cantidad. "</br>"; break;  
            }
            if(is_string(openssl_decrypt($_POST['descripcion'],COD,KEY))){
                $descripcion = openssl_decrypt($_POST['descripcion'],COD,KEY);
                $mensaje.= "Ok descripcion =".$descripcion. "</br>";
            }else{
                $mensaje.= "Error descripcion =".$descripcion. "</br>"; break;  
            }
            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $precio = openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.= "Ok descripcion =".$precio. "</br>";
            }else{
                $mensaje.= "Error descripcion =".$precio. "</br>"; break;  
            }
        if(!isset($_SESSION['carrito'])){
            $producto = array(
                'id' => $id,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => $cantidad
            );
            $_SESSION['carrito'][0]=$producto;
        }else{
            
            $numeroProductos=count($_SESSION['carrito']);
            $producto = array(
                'id' => $id,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => $cantidad
            );
            
            $_SESSION['carrito'][$numeroProductos]=$producto;
           
        }
        //$mensaje= print_r($_SESSION,true);
        
    break;
    case 'Eliminar':
       
        if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){

            $id = openssl_decrypt($_POST['id'],COD,KEY);
           $mensaje.= "Ok id correcto =".$id. "</br>";

           foreach( $_SESSION['carrito'] as $indice=>$producto){
            if($producto['id'] ==  $id){
                unset($_SESSION['carrito'][$indice]);
                echo "<script>alert('Elemento borrado')</script>";
                
                break;
            }
           }
        }else{
            $mensaje.= "Ok id correcto =".$id. "</br>"; break;  
        }
    header('Location: listarCarrito.php'); 
    exit;
    break;
    case 'AgregarProducto':
        echo "<script>alert('agregandoProducto... ')</script>";
        $nombre= $_POST['nombreProducto'];
        $descripcion = $_POST['descripcionProducto'];
        $precio = $_POST['precioProducto'];
        $imagen = $_POST['urlImagenProducto'];
        $categoria = $_POST['categoriaProducto'];

        $sentencia = $pdo->prepare("INSERT INTO `producto` (`id`, `id_categoria`, `nombre`, `precio`, `descripcion`, `imagen`) 
         VALUES (NULL, '1', '$nombre', '$precio', '$descripcion', '$categoria')");
        

        $sentencia->execute();

 
        
    }


}


?>
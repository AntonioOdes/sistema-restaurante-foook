<?php

session_start();

$mensaje = ""; // Variable de mensaje general
$mensajeSql = ""; // Variable de mensaje específico para consultas SQL

if (isset($_POST['btnCRUD'])) {
    switch ($_POST['btnCRUD']) {
        case 'eliminarProducto':
            $id = openssl_decrypt($_POST['id'], COD, KEY);
            $nombre = openssl_decrypt($_POST['nombre'], COD, KEY);
            $sentencia = $pdo->prepare("DELETE FROM producto WHERE `producto`.`id` = $id");
            $sentencia->execute();
            echo "<script>alert('producto [$nombre] eliminado');</script>";
            echo $mensaje;
            echo "<script>window.location.href='home.php';</script>";
            exit();
    
        case 'limpiar':
            session_unset();
            header('Location: listarProducto.php#carta');
            exit(); 

        case 'agregar':
            include('../config/config.php');
            include('../config/connection.php');
            $nombre = $_POST['nombreProducto'];
            $id_categoria = $_POST['categoriaProducto'];
            $precio = $_POST['precioProducto'];
            $descripcion = $_POST['descripcionProducto'];
            echo "<script>alert('categoria [$id_categoria]');</script>";
            
            $sentencia = $pdo->prepare("INSERT INTO `producto` (`id`, `id_categoria`, `nombre`, `precio`, `descripcion`, `imagen`)
                    VALUES (NULL, :id_categoria, :nombre, :precio, :descripcion, '')");
        
            
            $sentencia->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
            $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $sentencia->bindParam(':precio', $precio, PDO::PARAM_INT);
            $sentencia->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        
            $sentencia->execute();
        
            header('Location: admin/home.php');
            exit();
        
       
    
    }
}

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        // ... (otros casos)
        
        case 'EliminarProductoCarrito':
            if (isset($_SESSION['carrito']) && is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);

                foreach ($_SESSION['carrito'] as $indice => $producto) {
                    if ($producto['id'] == $id) {
                        unset($_SESSION['carrito'][$indice]);
                        echo "<script>alert('Elemento borrado')</script>";
                        break;
                    }
                }
            } else {
                $mensaje .= "Error al intentar eliminar producto del carrito. ";
            }
            header('Location: detalleCarrito.php');
            exit();
           
            
       
        case 'AgregarCarrito':
            function generarIDProducto() {
                return rand(1, 9999999);
                }
                
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
    header('Location: listarProducto.php#carta');
    break;
    
    
    
    
    

        


       

 
        
    }


}


?>

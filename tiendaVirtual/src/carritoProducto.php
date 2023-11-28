<?php 

session_start();

$mensaje = ""; // Variable de mensaje general
$mensajeSql = ""; // Variable de mensaje específico para consultas SQL

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
            header('Location: listarCarrito.php');
            exit;
            break;

        case 'EliminarProducto':
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $id = openssl_decrypt($_POST['id'], COD, KEY);

                // Tu conexión a la base de datos debería estar establecida antes de este punto
                include('../../config/config.php');
                include('../../config/connection.php');

                // Utiliza prepared statements para prevenir SQL injection
                $sentencia = $pdo->prepare("DELETE FROM producto WHERE id = :id");
                $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
                $resultado = $sentencia->execute();

                if ($resultado) {
                    $mensajeSql = "La eliminación fue exitosa.";
                } else {
                    $mensajeSql = "Error al intentar eliminar el producto.";
                }

                echo $mensajeSql;

                // Añadir el código necesario para manejar la respuesta después de la eliminación
            } else {
                $mensaje .= "Error al intentar eliminar producto. ";
            }
            break;
        
    case 'AgregarProducto':
        $valorSeleccionado = $_POST['categoriaProducto'];

        // Preparamos el mensaje JavaScript
        $script = "<script>alert('El valor seleccionado es: " . $valorSeleccionado . "');</script>";

        // Imprimimos el script
        echo $script;
        $nombre= $_POST['nombreProducto'];
        $descripcion = $_POST['descripcionProducto'];
        $precio = $_POST['precioProducto'];
        $categoria = $_POST['categoriaProducto'];

        
        $sentencia = $pdo->prepare("INSERT INTO `producto` (`id`, `id_categoria`, `nombre`, `precio`, `descripcion`, `imagen`) 
         VALUES (NULL, '$categoria', '$nombre', '$precio', '$descripcion', '$categoria')");

        $sentencia->execute();
    header('Location: home.php');
    exit;
    break;
    case 'modificarProducto':
        $nombre= $_POST['nuevoNombreProducto'];
        $descripcion = $_POST['nuevaDescripcionProducto'];
        $precio = $_POST['nuevoPrecioProducto'];
        $categoria = $_POST['nuevaCategoriaProducto'];

        $sentencia = $pdo->prepare("UPDATE producto SET nombre = :nuevo_nombre, precio = :nuevo_precio WHERE id = :id");
        $sentencia->bindParam(':nuevo_nombre', $nuevo_nombre, PDO::PARAM_STR);
        $sentencia->bindParam(':nuevo_precio', $nuevo_precio, PDO::PARAM_INT);
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);

        $resultado = $sentencia->execute();
    case 'validarUsuario':
        include('../config/config.php');
        include('../config/connection.php');
        $rut = $_POST['rut'];
        $password = $_POST['password'];

        $sentencia = $pdo->prepare("SELECT * FROM cajero");
        $sentencia->execute();
        $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        $validado = false; // Initialize $validado outside the loop

        foreach ($listaProductos as $producto) {
            if ($rut == $producto['rut']) {
                if ($password == $producto['password']) {
                    $validado = true;
                    header('Location: ./admin/home.php');
                    exit(); // Add exit to stop further execution after redirection
                } else {
                    $mensaje = "<script>alert('Contraseña incorrecta');</script>";
                }
            } else {
                $mensaje = "<script>alert('RUT incorrecto');</script>";
            }
        }
       header('Location: ./admin/login.php');
       exit;
        break;

        


       

 
        
    }


}


?>

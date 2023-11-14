<?php
// Crear una conexión a la base de datos
$server = "mysql:dbname=".db.";host=".server;

try {

    $pdo = new PDO($server, user, password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    // Ahora que la conexión se ha establecido, puedes realizar consultas aquí

    // ... Tu código para manejar los resultados de la consulta

} catch (PDOException $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "')</script>";
}
?>

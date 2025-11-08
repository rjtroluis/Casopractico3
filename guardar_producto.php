<?php
    session_start(); 

    if (!isset($_SESSION['usuario_id'])) {
        header('Location: index.php');
        exit; 
}

ini_set('display_errors', E_ALL);
error_reporting(E_ALL);

include "mysqli_aux.php";

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];



$query = "INSERT INTO productos_tienda
          (Nombre, Descripcion, Precio, Stock) 
          VALUES('$nombre','$descripcion',$precio, $stock)";

$id_nuevo = insertar($query, "sql111.infinityfree.com", "if0_40261665_productos", "if0_40261665", "pYooPY0fSqy");


if ($id_nuevo) {
    header('Location: tabla_productos.php');
    exit;
} else {
    echo "Error: No se pudo insertar el producto.";
}

?>
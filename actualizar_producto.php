<?php
include "mysqli_aux.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

$query = "UPDATE productos_tienda SET Nombre = '$nombre', Descripcion = '$descripcion', 
            Precio = $precio, Stock = $stock WHERE ID_Producto = $id";

$resultado = ejecutar($query, "sql111.infinityfree.com", "if0_40261665_productos", "if0_40261665", "pYooPY0fSqy");

header('Location: tabla_productos.php');
exit;
?>
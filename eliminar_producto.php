<?php
ini_set('display_errors', E_ALL);
error_reporting(E_ALL);

include "mysqli_aux.php";

$id = $_GET['id'];

$query = "DELETE FROM productos_tienda WHERE ID_Producto = $id";

$resultado = ejecutar($query, "sql111.infinityfree.com", "if0_40261665_productos", "if0_40261665", "pYooPY0fSqy");

header('Location: tabla_productos.php');
exit;
?>
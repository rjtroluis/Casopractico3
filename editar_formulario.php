<?php
    session_start(); 
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: index.php');
        exit;
}

include "mysqli_aux.php";

$id = $_GET['id'];

$query = "SELECT * FROM productos_tienda WHERE ID_Producto = $id";

$datos = seleccionar($query, "sql111.infinityfree.com", "if0_40261665_productos", "if0_40261665", "pYooPY0fSqy");


$producto = $datos[0];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4" style="max-width: 600px;">
    <h1>Editar Producto: <?php echo $producto[1]; ?></h1>

    <form action="actualizar_producto.php" method="POST">
        
        <input type="hidden" name="id" value="<?php echo $producto[0]; ?>">
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $producto[1]; ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php echo $producto[2]; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="<?php echo $producto[3]; ?>" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock (Cantidad):</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $producto[4]; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        <a href="tabla_productos.php" class="btn btn-secondary">Cancelar</a>

    </form>
</div>

</body>
</html>
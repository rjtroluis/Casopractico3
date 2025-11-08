<?php
    session_start(); 
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: index.php');
        exit; 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
 
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1 class="mb-3">Agregar Nuevo Producto</h1>

    <form action="guardar_producto.php" method="POST">
        
        <div class="mb-3">
            <label for="nombre" class="form-label">Producto:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Cantidad:</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Producto</button>
        <a href="tabla_productos.php" class="btn btn-secondary">Ver Lista</a>

    </form>
</div>

</body>
</html>
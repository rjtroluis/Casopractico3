<?php
	ini_set('display_errors', E_ALL);
	error_reporting(E_ALL);
	session_start(); 

	if (!isset($_SESSION['usuario_id'])) {
    	header('Location: index.php');
    	exit; 
	}
	include "mysqli_aux.php";
	
	$datos = seleccionar("SELECT * FROM productos_tienda", "sql111.infinityfree.com", "if0_40261665_productos", "if0_40261665", "pYooPY0fSqy");
	
?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </head>
  <body>
	<div class="container mt-4">
		<div class="d-flex justify-content-between align-items-start mb-3">
    		<div>
        		<h1 class="mb-2">Productos de la tienda</h1>
        		<a href="formulario.php" class="btn btn-primary">Añadir producto</a>
    		</div>
    		<a href="logout.php" class="btn btn-outline-secondary">Cerrar Sesión</a>
		</div>

			<table class="table table-striped table-hover table-bordered">
				<thead class="table-dark">
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Precio</th>
						<th>Stock</th>
						<th>Fecha de registro </th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($datos as $dato):?>
					<tr>
						<td><?php echo $dato[0] ?></td>
						<td><?php echo $dato[1] ?></td>
						<td><?php echo $dato[2] ?></td>
						<td><?php echo $dato[3] ?></td>
						<td><?php echo $dato[4] ?></td>
						<td><?php echo $dato[5] ?></td>
					

						<td>
                        	<a href="editar_formulario.php?id=<?php echo $dato[0] ?>" class="btn btn-warning">
                            	Actualizar
                        	</a>
                        
                        	<a href="eliminar_producto.php?id=<?php echo $dato[0] ?>" class="btn btn-danger" 
                           		onclick="return confirm('¿Estas seguro?');">
                            	Eliminar
                        	</a>
                    	</td>
					</tr>
					<?php endforeach?>
				</tbody>
    		</table>
	</div>
  </body>
</html>





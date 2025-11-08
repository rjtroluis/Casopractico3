<?php
ini_set('display_errors', E_ALL);
session_start();
$error = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "mysqli_aux.php";
    $db_host = "sql111.infinityfree.com"; 
    $db_name = "if0_40261665_productos";  
    $db_user = "if0_40261665";          
    $db_pass = "pYooPY0fSqy";          
    
    $usuario = $_POST['usuario'];
    $password_simple = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario'";
    $datos = seleccionar($query, $db_host, $db_name, $db_user, $db_pass);

    if (count($datos) == 1) {
        $usuario_encontrado = $datos[0];
        $password_hash_bd = $usuario_encontrado[2]; 

        if (password_verify($password_simple, $password_hash_bd)) {
            
            $_SESSION['usuario_id'] = $usuario_encontrado[0];
            $_SESSION['usuario_nombre'] = $usuario_encontrado[1];
            
            header('Location: tabla_productos.php');
            exit; 
        }
    }
    $error = "Usuario o contraseña incorrectos.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container" style="max-width: 500px; margin-top: 100px;">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">Iniciar Sesión</h1>
            
            <?php 
            if ($error): 
            ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="index.php" method="POST">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
<?php
// adminpage.php

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Obtener el nombre de usuario del usuario actual
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Administrador</title>
</head>

<body>
    <h1>Bienvenido, <?php echo $username; ?>!</h1>
    <p>Este es el área de administración donde puedes realizar tareas específicas para administrar el sitio web.</p>
    <p>Por ejemplo, puedes agregar, editar o eliminar contenido, administrar usuarios y realizar otras acciones de administración.</p>
    <p>Recuerda que esta es solo una página de ejemplo y no tiene implementadas todas las funcionalidades de un área de administración completa.</p>

    <a href="logout.php">Cerrar sesión</a>
</body>

</html>

<?php
session_start(); 
include "funciones.php";
include "config.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>
    
<?php

if (isset($_GET['id'])) {

    $query = mysqli_query($connect, "SELECT * FROM users WHERE id = '".$_GET['id']."'");

    while($row = mysqli_fetch_array($query)) { ?>

        <form action="" method="post">

            <label for="textfield2">Usuario</label>
            <input type="text" name="username" value="<?php echo $row['username']; ?>">
            <br>
            <label for="textfield3">Contraseña</label>
            <input type="password" name="password" >
            <br>
            <input type="submit" name="editar" value="Editar Perfil">
        </form>
      
      <?php
        if (isset($_POST['editar'])) {
    $username = clean($_POST['username']);
    if ($_POST['password'] != '') {
        $password = md5($_POST['password']);
    } else {
        $password = $row['password'];
    }
} }

    // Utilizar sentencia preparada para actualizar los datos
    $stmt = mysqli_prepare($connect, "UPDATE users SET username = ?, password = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $username, $password, $_GET['id']);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Se han actualizado los datos";
    } else {
        echo "No se han actualizado los datos";
    }

    mysqli_stmt_close($stmt);
}
?>

</body>
</html>

<?php
include("config.php");

session_start(); // Asegúrate de iniciar la sesión

if (isset($_POST['guardar'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']); // Escapa el nombre de usuario para evitar inyección SQL
    $password = md5($_POST['password']); // Aunque no se recomienda usar md5 para almacenar contraseñas, corregiremos esto por ahora.

    $query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");

    if (!$query) {
        die("Error en la consulta: " . mysqli_error($connect));
    }

    $contar = mysqli_num_rows($query);

    if ($contar !== 0) {
        while ($row = mysqli_fetch_array($query)) {
            if ($username == $row['username'] && $password == $row['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit;
            }
        }
    } else {
        echo "El nombre de usuario o contraseña no coinciden.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form action="login.php" method="post">
        <label class="" for="textfield3">Usuario</label>
        <input type="text" name="username">
        <br>
        <label class="password" for="textfield3">Contraseña</label>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Enviar" name="guardar" >
    </form>

    <a href="registro.php">Registrate</a>
</body>

</html>

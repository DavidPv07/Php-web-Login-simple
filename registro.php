<?php
include("config.php");

if (isset($_POST['button'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Aunque no se recomienda usar md5 para almacenar contraseñas, corregiremos esto por ahora.

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($connect));
    }

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "El usuario está en uso, elija otro";
    } else {
        $query_insert = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $result_insert = mysqli_query($connect, $query_insert);

        if ($result_insert) {
            echo "$username  registrado exitosamente.";
            
        } else {
            echo "Error al registrar el usuario: " . mysqli_error($connect);
        }
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
    <form method="post" action="registro.php">
        <p>
            <label for="textfield3">Usuario</label>
            <input type="text" name="username" id="">
        </p>

        <br>
     <label  class="password" for="">Contraseña</label>
        <input type="password" name="password">
        <br>
        <input type="submit" name="button" value="Registrarse">
    </form>
    <a href="index.php">inicio</a>
</body>

</html>

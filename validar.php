<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('config.php');

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    $stmt = $connect->prepare("SELECT * FROM adminlogin WHERE username = ?");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $connect->error);
    }

    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        header("location: adminpage.php");
        exit;
    } else {
        echo "<script language='javascript'>";
        echo "alert('WRONG INFORMATION')";
        echo "</script>";
        die();
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <form action="adminpage.php" method="post">
        <label class="" for="textfield3">Usuario</label>
        <input type="text" name="username">
        <br>
        <label class="password" for="textfield3">Contraseña</label>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Enviar" name="guardar" >
    </form>
</body>
</html>

<?php


session_start();

include "config.php";

if (!isset ($_SESSION['username'])){

    header ("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

if(isset($_GET['id'])){

    $query = mysqli_query($connect, "SELECT * FROM users WHERE id = '".$_GET['id']."'");

    while($row=mysqli_fetch_array($query)){ ?>

<a href="index.php">regresar al inicio</a>
<br> <br>
Bienvenido <strong>  <?php echo $_SESSION['username']; ?> </strong>

<br>
<a href="editarperfil.php?id= <?php echo $_SESSION['id'];?> ">Editar Mi Perfil</a>
    
<?php
    }
}


?>


</body>
</html>
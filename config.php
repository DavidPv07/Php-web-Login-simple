<?php
$host = "localhost";
$dbuser = "root";
$dbpw = "";
$db = "usuarios";

$connect = mysqli_connect($host, $dbuser, $dbpw);

if (!$connect) {
    die("No se ha podido conectar a la base de datos: " . mysqli_connect_error());
} else {
    $select = mysqli_select_db($connect, $db);
    if (!$select) {
        die("No se ha podido seleccionar la base de datos: " . mysqli_error($connect));
    }
}

?>

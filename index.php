
<?php
session_start();
include ("config.php");

if (!isset ($_SESSION['username'] )) {
    header ("Location: login.php");
}




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

 <!-- Encabezado con estilo de Bootstrap -->
 <header class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Peliculas y series</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="registro.php">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Iniciar Sesión</a>
                </li>
              <li class="nav-item" >
                <a  class="nav-link"  href="perfil.php?id=<?php echo $_SESSION['id'];  ?>">Mi perfil</a>
</li>

                <li class="nav-item">
                    <a class="nav-link" href="nosotros.html">Nosotros</a>
                </li>
            </ul>
        </div>
    </header>



Bienvenido <?php  echo $_SESSION['username'];       ?>
<br>


  

    

</body>









  <!-- Asegúrate de incluir los archivos de JavaScript de Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>



</body>
</html>

























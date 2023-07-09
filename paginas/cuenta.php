<?php 
    session_start();

    if (!isset($_SESSION['idUsuario'])) {
      header("Location: login.php");
      exit;
    }
    
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: login.php");
        exit;
    }

    require_once('../conexion/conexion.php');

    function cargarCuenta() {
        global $conn;
        $idUsuario = $_SESSION['idUsuario'];
        $sql = "SELECT * FROM usuario WHERE idUsuario = '$idUsuario'";
        $result = $conn->query($sql);
        $usuario = $result->fetch_assoc();
        return $usuario;
    }
    $usuario = cargarCuenta();
    
    //var_dump($usuario);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["guardar"])) {
        global $conn;
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $idUsuario = $_SESSION['idUsuario'];
        $sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', email='$email' WHERE idUsuario='$idUsuario'";
        $conn->query($sql);
        $usuario = cargarCuenta();
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/Fuente_css.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style-cuenta.css">
    <link rel="stylesheet" href="../css/style-cuenta.css">

    <link rel="shortcut icon" href="../img/Inicio/newLogoInvert-ico3.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div class="box">
          <img
            src="../img/Inicio/LogoSinFondo.png"
            alt="Gym Herculiano"
            width="300"
            height="250"
          />
          <!-- <h1>GYM HERCULIANO</h1> -->
          <nav>
            <ul>
              <li><a href="../index.php">Inicio</a></li>
              <li><a href="servicios.php">Servicios</a></li>
              <li><a href="productos.php">Productos</a></li>
              <li><a href="sedes.php">Locales</a></li>
              <li>|</li>
              <li><?php $pagina = isset($_SESSION['idUsuario']) ? "cuenta" : "login" ?>
                <a href="<?= $pagina?>.php"><?= $pagina?></a></li>
            </ul>
          </nav>
        </div>
    </header>
    <h1 class="titulo">Mi cuenta</h1>
    <div class="login-box">
      <h3>Información de la cuenta</h3>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="nombre" class="label-n" >Nombre</label>
        <input id="nombre" class="input-n" name="nombre" value="<?= $usuario['nombre']; ?>" type="text" required>
        <label for="apellido" class="label-n">Apellido</label>
        <input id="apellido" class="input-n" name="apellido" value="<?= $usuario['apellido']; ?>" type="text" required>
        <label for="email" class="label-n">Email</label>
        <input id="email" class="input-n" name="email" value="<?= $usuario['email']; ?>" type="email" required>
        <!-- <label for="password">Password</label> -->
        <!-- <input id="password" name="password" value="<?= $usuario['clave']; ?>" type="password" required> -->
        
        <!-- <button  type="submit" value="Guardar" name="guardar" ><span>Guardar</span></button> -->
        <input type="submit" class="input-b" value="Guardar" name="guardar">
      
        
    </form>
    <br>
    <!-- <input type="button" value="Cambiar contraseña"> -->
    <a href="?logout=true" class="">Cerrar sesión</a>
    </div>
    

</body>
</html>
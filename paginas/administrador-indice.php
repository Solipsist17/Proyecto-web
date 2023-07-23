<?php
  session_start();

  // Verificar si el usuario ha iniciado sesión
  if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
    exit;
  }
  // Cerrar sesión si se envió la solicitud de cierre de sesión
  if (isset($_GET['logout'])) {
      session_destroy();
      header("Location: login.php");
      exit;
  }

  //require_once('../conexion/conexion.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pagina de Administrador</title>
<link rel="stylesheet" type="text/css" href ="../css/style-administrador-indice.css">
</head>
<body>
<header>
    <h1>Bienvenido</h1>
    <a href="?logout=true" class="logout-link">Cerrar sesión</a>

  </header>
      <main>
        <div class="container-G">
          <div>
            <img src="../img/Inicio/imagen_menu18.jpg" alt="" height="465px" width="300px">
          </div>
          <div class= "container-lista">
          <?php if (isset($_SESSION['idUsuario'])) { ?>
          <h2>Opciones</h2>
          <ul>
          <li><a href="../paginas/administrador-productos.php">Mantenimiento de Productos</a></li>
          <li><a href="../paginas/administrador-usuarios.php">Administrador de Cuentas</a></li>
          <!-- Agrega más opciones -->
          </ul>
          <?php } ?>
          </div>
          <div>
            <img src="../img/Inicio/imagen_menu19.jpg" alt="" height="465px" width="300px">
          </div>
        </div>
        
        
      </main>
    <footer>
      <div class="cuadrito">
        <p>&copy; 1997-2023, Gym Herculiano. Todos lo derechos reservados <?php echo date('Y'); ?></p>
      </div>
    
    </footer>
</body>
</html>
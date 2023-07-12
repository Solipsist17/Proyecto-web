<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['UsuarioId'])) {
  header("Location: ../php/php-registro-login.php");
  exit;
}
// Cerrar sesión si se envió la solicitud de cierre de sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../php/php-registro-login.php");
    exit;
  }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pagina de Bienvenida</title>
<link rel="stylesheet" type="text/css" href ="index.css">
</head>
<body>
<header>
    <h1>Bienvenido</h1>
    <a href="?logout=true" class="logout-link">Cerrar sesión</a>

  </header>
      <main>
        <?php if (isset($_SESSION['UsuarioId'])) { ?>
        <h2>Opciones:</h2>
        <ul>
        <li><a href="../paginas/administrador-productos.php">Mantenimiento de Artículos</a></li>
        <!-- Agrega más opciones -->
        </ul>
        <?php } ?>
      </main>
    <footer>
     Derechos reservados &copy; <?php echo date('Y'); ?>
    </footer>
</body>
</html>
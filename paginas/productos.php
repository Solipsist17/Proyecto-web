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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Productos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/Fuente_css.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style-productos.css" />

    <link rel="shortcut icon" href="../img/Inicio/newLogoInvert-ico3.ico" type="image/x-icon">
    
  </head>
  <body>
    
      <header>
        <div class="box">
          <img
            src="../img/inicio/LogoSinFondo.png" 
            alt="Gym Herculiano"
            width="300"
            height="250"
          />
          <nav>
            <ul>
              <li><a href="../index.php">Inicio</a></li>
              <li><a href="servicios.php">Servicios</a></li>
              <li><a href="productos.php">Productos</a></li>
              <li><a href="sedes.php">Locales</a></li>
              <li>|</li>
              <li><?php 
               $pagina = isset($_SESSION['idUsuario']) ? $usuario['nombre'] : "Login" ?>
                <a href="<?= $pagina?>.php"><?= $pagina?></a></li>
            </ul>
          </nav>
        </div>
      </header>
      
      <!-- Barra de búsqueda -->
      <div class="search-bar">
        <input type="text" placeholder="Buscar">
        
      </div>
    
      <nav class="categorias">
        <ul>
          <li><a id="todos" href="productos.php?categoria=todos#producto">Todos</a></li>
          <li>|</li>
          <li><a id="equipamiento" href="productos.php?categoria=equipamiento#producto">Equipamiento deportivo</a></li>
          <li>|</li>
          <li><a id="suplementos" href="productos.php?categoria=suplementos#producto">Suplementos nutricionales</a></li>
          <li>|</li>
          <li><a id="accesorios" href="productos.php?categoria=accesorios#producto">Accesorios deportivos</a></li>
        </ul>
      </nav>

      <!-- Banner de promociones -->
      
      <section class="producto-banner" id="producto-banner">
        
        <button class="pre-btn"><img src="../img/Productos/arrow.png" alt=""></button>
        <?php  include "../php/php-productos-banner.php" ?>
        <button class="nxt-btn"><img src="../img/Productos/arrow.png" alt=""></button>
        
        
</div>
      </section>

      <hr>
      
      <!-- Mostrador de productos -->
      <?php include("../php/php-productos-mostrador.php") ?>
      <!-- Carrito de compras -->
      <div class="seleccion" id="seleccion">

        <div id="seleccionContainer" class="seleccion-container">
        </div>
        
        <div class="calculo-precio">
          <span class="subtotal">
            Subtotal
            <!-- <p id="subtotal">90</p> -->
          </span>
          <span class="envio">
            Envío: S/20.00
          </span>
        </div>

        <div class="carrito">
          <img src="../img/Productos/carrito-de-compras.png" alt="">
        </div>

        <div class="cerrar" id="cerrar" onclick="cerrar()">
          &#x2715
        </div>

        <button class="boton-comprar">
          Comprar
        </button>

      </div>

      
       
    <footer>
      <div class="logo_footer">
        <img src="../img/inicio/LogoSinFondo.png" alt="Gym Herculiano"  width="150" height="140">
      </div>
      <h2>CONTACTOS</h2>
      <div class="contactos">
        <ul>
         <li>
          <a href="" class="fa fa-volume-control-phone"> +51 987 654 321</a><br><br><br>
         </li>
         <li>
          <a href="" class="fa fa-envelope-o"> correoEjemplo@gmail.com</a>
         </li>
        </ul>
        <ul>
          <li>
           <a href="">FAQ</a><br><br><br>
          </li>
         <li>
           <a href="">Libro de reclamaciones</a>
         </li>
        </ul>
        
      </div>
      <div class="redes-sociales">
        <h2><b>Síguenos</b></h2>
        <ul>
          <a href="https://www.facebook.com" class="fa fa-facebook"></a>
          <a href="https://www.twitter.com" class="fa fa-twitter"></a>
          <a href="https://www.youtube.com" class="fa fa-youtube"></a>
          <a href="https://www.twitter.com" class="fa fa-linkedin"></a>
        </ul>
      </div>
      <div class="derechos-reservados">
        <small>&copy; 1997-2023, Gym Herculiano. Todos lo derechos reservados</small>
      </div>
    </footer>

    <script src="../js/script-productos.js"></script>
  </body>
</html>

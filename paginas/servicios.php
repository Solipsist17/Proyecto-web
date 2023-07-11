<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Membresías</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../css/Fuente_css.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <!-- <link rel="stylesheet" href="../css/style-membresia.css"> -->
    <link rel="stylesheet" href="../css/style-especialistas.css" />

    <link
      rel="shortcut icon"
      href="../img/Inicio/newLogoInvert-ico3.ico"
      type="image/x-icon"
    />
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
             $pagina = isset($_SESSION['idUsuario']) ? "Cuenta": "Login" ?>
                <a href="<?= $pagina?>.php"><?= $pagina?></a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main>
      <section class="price container">
        <h2 class="subtitle">OBTEN EL PLAN PERFECTO</h2>
        <div class="price__table">
      <?php
     include("../php/php-servicios-membresia.php")
      ?>
    </div>
      </section>
      <section class="especialista">
    <div class="especialista__container container">
      <img src="../img/Especialistas/leftarroy.svg" class="especialista__arrow" id="before" />

      <?php
      
      include("../php/php-servicios-especialistas.php")
      ?>

      <img src="../img/Especialistas/rightarrow.svg" class="especialista__arrow" id="next" />
    </div>
  </section>
      


      
    </main>
    <script src="../js/script-servicios.js"></script>
    
    <footer>
      <div class="logo_footer">
        <img
          src="../img/inicio/LogoSinFondo.png"
          alt="Gym Herculiano"
          width="150"
          height="140"
        />
      </div>
      <h2>CONTACTOS</h2>
      <div class="contactos">
        <ul>
          <li>
            <a href="" class="fa fa-volume-control-phone"> +51 987 654 321</a
            ><br /><br /><br />
          </li>
          <li>
            <a href="" class="fa fa-envelope-o"> correoEjemplo@gmail.com</a>
          </li>
        </ul>
        <ul>
          <li><a href="">FAQ</a><br /><br /><br /></li>
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
        <small
          >&copy; 1997-2023, Gym Herculiano. Todos lo derechos reservados</small
        >
      </div>
    </footer>
  </body>
</html>

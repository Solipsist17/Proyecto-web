<?php //include_once '../php/php-registro-login.php' 

  require_once('../conexion/conexion.php');
  //echo "AAAA";
  //header('Location: ../paginas/formulario.php');

  session_start();

  if (isset($_SESSION['idUsuario'])) {
      header("Location: ../paginas/cuenta.php");
      exit; 
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrarse"])) {
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $email = $_POST['email'];
      $clave = $_POST['clave'];
      $hash = password_hash($clave, PASSWORD_DEFAULT);
      $idRol = '2';

      $sql = "INSERT INTO usuario(nombre, apellido, email, clave, idRol) VALUES('$nombre', '$apellido', '$email', '$hash', '$idRol')";
      // validar que no se pueda repetir el email
      if ($conn->query($sql) === true) {
          //echo "Usuario creado con éxito";
          $mensaje = "Registro exitoso, inicie sesión con su cuenta";
      } else {
          //echo "Error: " . $conn->error;
          $mensaje = "Error al crear usuario";
      }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
      $email = $_POST['email'];
      $clave = $_POST['clave'];

      $sql = "SELECT * FROM usuario WHERE email = '$email'";
      $result = $conn->query($sql);

      if ($result->num_rows == 1) {
          $row = $result->fetch_assoc();
          $hashedClave = $row['clave'];

          if (password_verify($clave, $hashedClave)) {
              $_SESSION["idUsuario"] = $row['idUsuario'];
              $_SESSION["idRol"] = $row['idRol'];
              $conn->close();
              if ($_SESSION["idRol"] == 2) {
                header('Location: ../paginas/productos.php');
              } 
              if ($_SESSION["idRol"] == 1) {
                header('Location: ../paginas/administrador-indice.php');
              }
              
              exit;
          } else {
              $mensaje = "Contraseña incorrecta";
          } 
      } else {
          $mensaje = "Email incorrecto";
      }

      $conn->close();

  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
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
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/Fuente_css.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style-home.css" />
    <link rel="stylesheet" href="../css/style-formulario.css" />

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
            <!-- Modificar el nombre de formulario.php para que sea dinámico -->
            <li><?php $pagina = isset($_SESSION['idUsuario']) ? "Cuenta" : "Login" ?>
                <a href="<?= $pagina?>.php"><?= $pagina?></a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main>
      <div class="message">
        <?php if (isset($mensaje)) { ?>
        <p><?php echo $mensaje; ?></p>
        <?php } ?>
      </div>
      
      <div class="container-form sign-up">
        <div class="welcome-back">
          <div class="message">
            <h2>Bienvenido a Gym Herculiano</h2>
            <p>Si ya tienes una cuenta por favor inicia sesion aqui</p>
            <button class="sign-up-btn">Iniciar Sesion</button>
          </div>
        </div>
        <form class="formulario" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
          <h2 class="create-account">Crear una cuenta</h2>
          <div class="iconos">
            <div class="border-icon">
              <i class="bx bxl-instagram"></i>
            </div>
            <div class="border-icon">
              <i class="bx bxl-facebook-circle"></i>
            </div>
            <div class="border-icon">
              <i class="bx bxl-twitter"></i>
            </div>
          </div>
          <p class="cuenta-gratis">Crear una cuenta gratis</p>
          <input type="text" name="nombre" placeholder="Nombre" required />
          <input type="text" name="apellido" placeholder="Apellido" required />
          <input type="email" name="email" placeholder="Email" required />
          <input type="password" name="clave" placeholder="Contraseña" required />
          <input type="submit" name="registrarse" value="Registrarse" />
        </form>
      </div>
      <div class="container-form sign-in">
        <form class="formulario" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
          <h2 class="create-account">Iniciar Sesion</h2>
          <div class="iconos">
            <div class="border-icon">
              <i class="bx bxl-instagram"></i>
            </div>
            <div class="border-icon">
              <i class="bx bxl-facebook-circle"></i>
            </div>
            <div class="border-icon">
              <i class="bx bxl-twitter"></i>
            </div>
          </div>
          <p class="cuenta-gratis">¿Aun no tienes una cuenta?</p>
          <input type="email" name="email" placeholder="Email" required />
          <input type="password" name="clave" placeholder="Contraseña" required />
          <input type="submit" name="login" value="Iniciar Sesion" />
        </form>
        <div class="welcome-back">
          <div class="message">
            <h2>Bienvenido de nuevo</h2>
            <p>Si aun no tienes una cuenta por favor registrese aqui</p>
            <button class="sign-in-btn">Registrarse</button>
          </div>
        </div>
      </div>
    </main>
    <script src="../js/Formulario_js.js"></script>

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
            <a href="" class="fa fa-volume-control-phone"> +51 987 654 321</a>
          </li>
          <li>
            <a href="" class="fa fa-envelope-o"> correoEjemplo@gmail.com</a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="">FAQ</a>
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
        <small
          >&copy; 1997-2023, Gym Herculiano. Todos lo derechos reservados</small
        >
      </div>
    </footer>
  </body>
</html>

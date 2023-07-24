<?php 
  session_start();

  // Hacer la consulta a la BD
  require_once("../conexion/conexion.php");

  function obtenerProductos($categoria) {
    global $conn;
    if ($categoria == 'todos') {
      $sql = "SELECT idProducto, nombre, descripcion, precio, imagen, idCategoria FROM producto";
    } else {
      $sql = "SELECT idProducto, nombre, descripcion, precio, imagen, idCategoria FROM producto WHERE idCategoria = (SELECT idCategoria FROM categoria WHERE nombre = '$categoria')";
    }
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $productos = array();
        while ($row = $result->fetch_assoc()) {
          $productos[] = $row;
        }
        return $productos;
    } else {
        return array();
    }
  }

  function buscarProducto($nombre) {
    global $conn;
    $sql = "SELECT idProducto, nombre, descripcion, precio, imagen, idCategoria FROM producto WHERE nombre LIKE '%$nombre%'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $productos = array();
        while ($row = $result->fetch_assoc()) {
          $productos[] = $row;
        }
        return $productos;
    } else {
        return array();
    }
  }

  // Cargar categorías
  function obtenerCategorias() {
    global $conn;
    $sql = "SELECT idCategoria, nombre FROM categoria";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $categorias = array();
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
        return $categorias;
    } else {
        return array();
    }
  }

  $categorias = obtenerCategorias();
  $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'todos';
  

  if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["buscar"])) {
    $nombre = $_GET['producto'];
    $productos = buscarProducto($nombre);
    //exit();
  } else {
    $productos = obtenerProductos($categoria);
  }
  
  
  //print_r($categorias);
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
               $pagina = isset($_SESSION['idUsuario']) ? "Cuenta" : "Login" ?>
                <a href="<?= $pagina?>.php"><?= $pagina?></a></li>
            </ul>
          </nav>
        </div>
      </header>
      
      <!-- Barra de búsqueda -->
      <!-- <form action="<?php echo $_SERVER['PHP_SELF'];?>#producto" method="get" class="form-search">
        <div class="search-bar">
          <input type="text" name="producto" placeholder="Buscar">
        </div>
        <input type="submit" name="buscar" value="" class="custom-submit-button">
      </form> -->

      <form action="<?php echo $_SERVER['PHP_SELF'];?>#producto" method="get" class="form-search">
        <div class="search-bar">
          <input type="text" name="producto" placeholder="Buscar">
          <input type="submit" name="buscar" value="" class="custom-submit-button" id="submit">
        </div>
      </form>
    
      <nav class="categorias">
        <ul>
          <li>|</li>
          <li><a id="" href="productos.php?categoria=todos#producto">todos</a></li>
          <li>|</li>
          <?php foreach ($categorias as $fila) { ?>
            <li><a id="" href="productos.php?categoria=<?=$fila['nombre']?>#producto"><?=$fila['nombre']?></a></li>
            <li>|</li>
          <?php } ?>  
          <!-- <li><a id="todos" href="productos.php?categoria=todos#producto">Todos</a></li>
          <li>|</li>
          <li><a id="equipamiento" href="productos.php?categoria=equipamiento#producto">Equipamiento deportivo</a></li>
          <li>|</li>
          <li><a id="suplementos" href="productos.php?categoria=suplementos#producto">Suplementos nutricionales</a></li>
          <li>|</li>
          <li><a id="accesorios" href="productos.php?categoria=accesorios#producto">Accesorios deportivos</a></li> -->
          
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
      <!-- <?php include("../php/php-productos-mostrador.php") ?> -->

      
      <!-- Nuevo mostrador con consultas a la DB -->
      
      <section class="producto" id="producto">
        <h2 class="producto-categoria"><?= $categoria ?></h2>
        <div class="producto-mostrador" id="productoMostrador">
        <script>
        // Limpiamos el mostrador
        document.getElementById("productoMostrador").innerHTML = "";      
        </script>
        <?php for ($i=0; $i < count($productos); $i++): ?>
              <div class="producto-card">
                  <div class="producto-img">
                  <?php 
                      $datosImagen = $productos[$i]['imagen']; // Recuperar los datos binarios de la base de datos

                      // Obtener el tipo de imagen utilizando finfo_buffer
                      $finfo = new finfo(FILEINFO_MIME_TYPE);
                      $tipoImagen = $finfo->buffer($datosImagen);

                      // Codificar los datos binarios en formato Base64
                      $imagenCodificada = base64_encode($datosImagen);

                      // Mostrar la imagen 
                      echo '<img src="data:' . $tipoImagen . ';base64,' . $imagenCodificada . '" alt="' . $productos[$i]['nombre'] . '" class="producto-miniatura">';
                  ?>  
                      <!-- <img src=<?= $productos[$i]["imagen"] ?> class="producto-miniatura" alt=<?= $productos[$i]["nombre"] ?>> -->
                    <button id="<?= $productos[$i]["idProducto"] ?>" class="card-btn" onclick="cargar(this)">Agregar al carrito</button>
                  </div>
                  <div class="producto-info">
                      <h2 class="producto-marca"><?= $productos[$i]["nombre"] ?></h2>
                      <p class="producto-descripcion"><?= $productos[$i]["descripcion"] ?></p>
                      <span class="precio">S/<?= $productos[$i]["precio"] ?></span>
                  </div>
              </div>
        <?php endfor ?>
        </div>  
      </section>




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

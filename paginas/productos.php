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
              <li><a href="formulario.php">Login</a></li>
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
        <!-- <div class="producto-container">
           <div class="producto-card">
            <div class="producto-img">
              <span class="descuento-tag">50% off</span>
              <img src="../img/Productos/mancuerna-20kg1.jpg" class="producto-miniatura" alt="">
              <button class="card-btn">Agregar al carrito</button>
            </div>
          </div> 
        </div> -->

      </section>
<!-- <br>
<br>
<br>
<br>
<br> -->
      <hr>
      
      <!-- Mostrador de productos -->
      <?php include("../php/php-productos-mostrador.php") ?>

      <!-- <section class="producto" id="producto">
        <h2 class="producto-categoria" ></h2>

        <div class="producto-mostrador" id="productoMostrador">

          <div class="producto-card">
            <div class="producto-img">
              <span class="descuento-tag">50% off</span>
              <img src="../img/Productos/mancuerna-20kg1.jpg" class="producto-miniatura" alt="">
              <button class="card-btn" onclick="cargar(this)">Agregar al carrito</button>
            </div>
            <div class="producto-info">
              <h2 class="producto-marca">Mancuernas</h2>
              <p class="producto-descripcion">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, tempore qui repellendus recusandae tenetur eaque!</p>
              <span class="precio">S/120</span>
              <span class="precio-actual">S/120</span>
            </div>
          </div>

        </div>  
      </section> -->


      <!-- Carrito de compras -->
      <div class="seleccion" id="seleccion">

        <div id="seleccionContainer" class="seleccion-container">
          
          <!-- <div class="producto-seleccion"> 
            <p id="nombreProducto">Lorem, ipsum dolor.</p>
            <div class="imagen-seleccion">
              <img src="../img/Productos/mancuerna-20kg1.jpg" id="imgSeleccionada" class="producto-miniatura" alt="">
            </div>
            <select class="select-unidades">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
            <div class="producto-eliminar">
              <img src="../img/Productos/eliminar.png" onclick="quitarCarrito(this)" alt="">
            </div>
            <p class="precio-unitario">S/50.00</p>
          </div> -->

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

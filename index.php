<?php 
    session_start();
?>
<!DOCTYPE html>
<?php
?>
<html>
  <head>  
    <meta charset="”UTF-8”" />
    <title>ProyectoGYM_Herculiano</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/Fuente_css.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-home.css">

    <link rel="shortcut icon" href="img/Inicio/newLogoInvert-ico3.ico" type="image/x-icon">
  </head>
  <body>

    <header>
        <div class="box">
            <img src="img/inicio/LogoSinFondo.png" alt="Gym Herculiano" width="300" height="250">
            <!-- <h1>GYM HERCULIANO</h1> -->
            <nav>
                <ul>
                  <li><a href="index.php">Inicio</a></li>
                  <li><a href="paginas/servicios.php">Servicios</a></li>
                  <li><a href="paginas/productos.php">Productos</a></li>
                  <li><a href="paginas/sedes.php">Locales</a></li>
                  <li>|</li>
                  <li><?php $pagina = isset($_SESSION['idUsuario']) ? "Cuenta" : "Login" ?>
                <a href="paginas/<?= $pagina?>.php"><?= $pagina?></a></li>
                </ul>
            </nav>
        </div> 
    </header>

    <br />
    <main>
      

      
        <!-- <div class="spot-publicitario">
          <iframe src="https://www.youtube.com/embed/DIcsxdFjCRk" width="560" height="315" frameborder="0"
          allowfullscreen></iframe>
        </div> -->
<!-- INTENTAR HACERLO DINAMICAMENTE -->
         <div class="galeria">
          <div class="eslogan">
            <p>Desafía tus límites.</p>
          </div>
          <!-- <img src="img/Inicio/imagen_menu1.jpg" alt="">
          <img src="img/Inicio/imagen_menu2.jpg" alt="">
          <img src="img/Inicio/img-gym3.jpg" alt=""> -->
          <!-- <img src="img/Inicio/img-gym4.jpg" alt="">
          <img src="img/Inicio/imagen_menu3.jpg" alt="">
          <img src="img/Inicio/imagen_menu4.jpg" alt=""> -->
          <!-- <img src="img/Inicio/imagen_menu5.jpg" alt="">
          <img src="img/Inicio/imagen_menu6.jpg" alt=""> -->
        </div>
        <section>
        <div class="sobre-nosotros">
          <h1>NOSOTROS.</h1>
          <p>
            El gym Herculiano es una empresa que se dedica a brindar el servicio
            de acondicionamiento fisico a nuestros clientes, en pocas palabras,
            nuestra empresa se encarga de brindar las herramientas a nuestros
            suscriptores para que sean capaces de mejorar su estilo de vida y lo
            más importante lograr la mejor version de ellos mismos. Nuestro local
            central esta ubicado en la calle lima Nro 204, exactamente en el
            corazón de Ica. Contamos con modernos equipos de entrenamiento como
            son caminadoras, mancuernas, racks, bandas elasticas, pesas rusas y
            mucho más; tambien contamos con modernos vestidores, duchas y más.
            Nuestro gym comenzó como un pequeño establecimiento para la
            realizacion de variadas actividades relacionadas con la actividad
            fisica y con el transcurrir del tiempo, termino como una de las mas
            conocidas en la region. El GYM se encuentra registrado y bajo cargo
            del senor Juan Perez.
          </p>
        </div>
        <!-- <div class="banner-gym"> 
          <img src="img/Inicio/bannerGym1.jpg" alt="Banner gym">
        </div>  -->
        <br>
      </section>
      <script src="js/script-home.js"></script> 
      <section>
         <article id="mision">
          <div class="img-mision">
            <img src="img/Inicio/img-gym3.jpg" alt="Gym image" id="imagen_mision"/>
          </div>
          <div class="mision-container">
            <h1>NUESTRA MISIÓN</h1>
            <p>
            Nuestra misión como empresa es ayudar a nuestros subscriptores a
            alcanzar sus objetivos de fitness ofreciendo un seguro y acogedor
            ambiente con equipos de calidad y programas de entrenamiento
            personalizados. Ser la opción número uno en el mercado de la industria
            del fitness es a lo que apuntamos ser, brindando un excelente servicio
            a nuestros cliente, y creando una comunidad de apoyo que motive a
            nuestros clientes a alcanzar sus metas.                
            </p>  
          </div>          
        </article> 
      </section>
      <section>
        <article id="vision">
          <div class="img-vision">
            <img src="img/Inicio/img-gym4.jpg" alt="Gym image" id="imagen_vision"> 
          </div>
          <div class="vision-container">
            
            <h1>NUESTRA VISIÓN</h1>
               <p>
                La visión de nuestra empresa es convertirnos en la cadena de gimnasios
                más grande y reconocida a nivel nacional e internacional, siendo
                líderes en innovación y tecnología, para ofrecer la mejor experiencia
                de fitness a nuestros clientes. Queremos ser la marca que represente
                el estilo de vida saludable y activo, y ser reconocidos por nuestra
                pasión y compromiso en ayudar a nuestros clientes a mejorar su calidad
                de vida a través del ejercicio y la nutrición adecuada.
               </p>
          </div>        
          
                
        </article> 
      </section>
    </main>
    <footer>
      <div class="logo_footer">
        <img src="img/inicio/LogoSinFondo.png" alt="Gym Herculiano"  width="150" height="140">
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
    
  </body>
  
</html>

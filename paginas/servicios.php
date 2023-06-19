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
            <li><a href="formulario.php">Login</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main>
      <section class="price container">
        <h2 class="subtitle">OBTEN EL PLAN PERFECTO</h2>

        <!-- <div class="price__table">
          <div class="price__element">
            <p class="price__name">BASIC</p>
            <h3 class="price__price">$15/MES</h3>

            <div class="price__items">
              <p class="price__features">
                Accede a todas las áreas del gimnasio
              </p>
              <p class="price__features">Herculiano GO</p>
              <p class="price__features">Vestidores</p>
            </div>

            <a href="#" class="price__cta">Empieza ahora</a>
          </div>

          <div class="price__element price__element--best">
            <p class="price__name">SMART</p>
            <h3 class="price__price">$30/mes</h3>

            <div class="price__items">
              <p class="price__features">
                Accede a todas las áreas del gimnasio
              </p>
              <p class="price__features">Herculiano GO</p>
              <p class="price__features">Vestidores</p>
              <p class="price__features">Relájate en los sillones de masajes</p>
            </div>

            <a href="#" class="price__cta">Empieza ahora</a>
          </div>

          <div class="price__element price__element--second">
            <p class="price__name">VIP PRO</p>
            <h3 class="price__price">$40/mes</h3>

            <div class="price__items">
              <p class="price__features">Animation</p>
              <p class="price__features">Herculiano GO</p>
              <p class="price__features">Relájate en los sillones de masajes</p>
              <p class="price__features">
                Entrena en todas nuestras sedes de Perú
              </p>
              <p class="price__features">Vestidores, Lockers</p>
            </div>

            <a href="#" class="price__cta">Empieza ahora</a>
          </div>
        </div> -->
        <div class="price__table">
      <?php
      /* $planes = [
        [
          'name' => 'BASIC',
          'price' => '$15/MES',
          'features' => [
            'Accede a todas las áreas del gimnasio',
            'Herculiano GO',
            'Vestidores'
          ]
        ],
        [
          'name' => 'SMART',
          'price' => '$30/mes',
          'features' => [
            'Accede a todas las áreas del gimnasio',
            'Herculiano GO',
            'Vestidores',
            'Relájate en los sillones de masajes'
          ]
        ],
        [
          'name' => 'VIP PRO',
          'price' => '$40/mes',
          'features' => [
            'Animation',
            'Herculiano GO',
            'Relájate en los sillones de masajes',
            'Entrena en todas nuestras sedes de Perú',
            'Vestidores, Lockers'
          ]
        ]
      ];

      foreach ($planes as $plan) {
        echo '<div class="price__element">';
        echo '<p class="price__name">' . $plan['name'] . '</p>';
        echo '<h3 class="price__price">' . $plan['price'] . '</h3>';
        echo '<div class="price__items">';
        foreach ($plan['features'] as $feature) {
          echo '<p class="price__features">' . $feature . '</p>';
        }
        echo '</div>';
        echo '<a href="#" class="price__cta">Empieza ahora</a>';
        echo '</div>';
      } */ include("../php/php-servicios-membresia.php")
      ?>
    </div>
      </section>
      <section class="especialista">
    <div class="especialista__container container">
      <img src="../img/Especialistas/leftarroy.svg" class="especialista__arrow" id="before" />

      <?php
      /* $especialistas = [
        [
          'name' => 'Jordan Alexander',
          'course' => 'Asesor Nutricional Deportivo',
          'review' => 'Asesor destacado por su gran actitud y estilo de vida alimentacio. Grado superior de FP en nutrición y dietética, cuenta con una experiencia de más de 10 años.',
          'image' => '../img/Especialistas/nutricion.jpg'
        ],
        [
          'name' => 'Juan Cuadro',
          'course' => 'Maestro en Fitness',
          'review' => 'Maestro destacada por su exigencia, comprometido y disciplina que busca la mejora fisica de sus alumnos. Grado en Ciencias de la Actividad Física y del Deporte. Experiencia de más de 8 años.',
          'image' => '../img/Especialistas/Ejercicio.jpg'
        ],
        [
          'name' => 'Karen Arteaga',
          'course' => 'Asesora en Yoga',
          'review' => 'Una gran persona destacada por su amabilidad y disciplina. Comprometida en la mejora fisica y mental de sus alumnos con formación en SUP Yoga y con una experiencia de más de 7 años.',
          'image' => '../img/Especialistas/yoga.jpg'
        ]
      ];

      foreach ($especialistas as $key => $especialista) {
        echo '<section class="especialista__body ' . (($key === 0) ? 'especialista__body--show' : '') . '" data-id="' . ($key + 1) . '">';
        echo '<div class="especialista__texts">';
        echo '<h2 class="subtitle">Mi nombre es ' . $especialista['name'] . ', <span class="especialista__course">' . $especialista['course'] . '</span></h2>';
        echo '<p class="especialista__review">' . $especialista['review'] . '</p>';
        echo '</div>';
        echo '<figure class="especialista__picture">';
        echo '<img src="' . $especialista['image'] . '" class="especialista__img" />';
        echo '</figure>';
        echo '</section>';
      } */
      include("../php/php-servicios-especialistas.php")
      ?>

      <img src="../img/Especialistas/rightarrow.svg" class="especialista__arrow" id="next" />
    </div>
  </section>
      


      <!-- <section class="especialista">
        <div class="especialista__container container">
          <img
            src="../img/Especialistas/leftarroy.svg"
            class="especialista__arrow"
            id="before"
          />

          <section
            class="especialista__body especialista__body--show"
            data-id="1"
          >
            <div class="especialista__texts">
              <h2 class="subtitle">
                Mi nombre es Jordan Alexander,
                <span class="especialista__course"
                  >Asesor Nutricional Deportivo</span
                >
              </h2>
              <p class="especialista__review">
                Asesor destacado por su gran actitud y estilo de vida
                alimentacio. Grado superior de FP en nutrición y dietética,
                cuenta con una experiencia de más de 10 años.
              </p>
            </div>

            <figure class="especialista__picture">
              <img
                src="../img/Especialistas/nutricion.jpg"
                class="especialista__img"
              />
            </figure>
          </section>

          <section class="especialista__body" data-id="2">
            <div class="especialista__texts">
              <h2 class="subtitle">
                Mi nombre es Juan Cuadro,
                <span class="especialista__course">Maestro en Fitness</span>
              </h2>
              <p class="especialista__review">
                Maestro destacada por su exigencia, comprometido y disciplina
                que busca la mejora fisica de sus alumnos. Grado en Ciencias de
                la Actividad Física y del Deporte. Experiencia de más de 8 años.
              </p>
            </div>

            <figure class="especialista__picture">
              <img
                src="../img/Especialistas/Ejercicio.jpg"
                class="especialista__img"
              />
            </figure>
          </section>

          <section class="especialista__body" data-id="3">
            <div class="especialista__texts">
              <h2 class="subtitle">
                Mi nombre es Karen Arteaga,
                <span class="especialista__course">Asesora en Yoga</span>
              </h2>
              <p class="especialista__review">
                Una gran persona destacada por su amabilidad y disciplina.
                Comprometida en la mejora fisica y mental de sus alumnos con
                formación en SUP Yoga y con una experiencia de más de 7 años.
              </p>
            </div>

            <figure class="especialista__picture">
              <img
                src="../img/Especialistas/yoga.jpg"
                class="especialista__img"
              />
            </figure>
          </section>

          <img
            src="../img/Especialistas/rightarrow.svg"
            class="especialista__arrow"
            id="next"
          />
        </div>
      </section> -->
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

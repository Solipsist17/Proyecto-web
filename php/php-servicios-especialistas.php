<?php include("php-servicios-data.php") ?>
<?php 
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
      } ?>
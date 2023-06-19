    <?php include("php-servicios-data.php") ?>
      <?php
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
      } 
      ?>
  

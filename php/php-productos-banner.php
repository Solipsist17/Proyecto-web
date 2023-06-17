<?php
//Banner de productos
$productosBanner = ["../img/Productos/banner1.png", "../img/Productos/banner2.png", "../img/Productos/banner3.png"];
/* $container = '<div class="producto-container"></div>'; */

/* for ($i = 0; $i < count($productosBanner); $i++) {
    $cardDiv = '<div class="producto-card" style="width: 100%; height: 100%;">';
    $imgDiv = '<div class="producto-img" style="height: 100%;">';
    $img = '<img src="' . $productosBanner[$i] . '" style="width: 100%; height: 100%;">';
    $imgDiv .= $img;
    $cardDiv .= $imgDiv;
    $container .= $cardDiv;
}
echo $container; */
?>
<div class="producto-container">
        <?php foreach ($productosBanner as $imagen): ?>
        <div class="producto-card" style="width: 100%; height: 100%;">
        <div class="producto-img" style="height: 100%;">
        <img style="width: 100%; height: 100%;" src="<?php echo $imagen; ?>">
       </div>
       </div>
        <?php endforeach; ?>

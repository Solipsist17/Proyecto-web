<?php 
include("php-productos-data.php"); // Traemos los arrays con los datos
?>

<?php 
function cargarProductos($productos) { ?>
    <script>
        // Limpiamos el mostrador
        document.getElementById("productoMostrador").innerHTML = "";      
    </script>

    <?php 
    for ($i=0; $i < count($productos); $i++): ?>
        <div class="producto-card">
            <div class="producto-img">
                <img src=<?= $productos[$i]["imagen"] ?> class="producto-miniatura" alt=<?= $productos[$i]["nombre"] ?>>
                <button id="<?= $productos[$i]["id"] ?>" class="card-btn" onclick="cargar(this)">Agregar al carrito</button>
            </div>
            <div class="producto-info">
                <h2 class="producto-marca"><?= $productos[$i]["nombre"] ?></h2>
                <p class="producto-descripcion"><?= $productos[$i]["descripcion"] ?></p>
                <span class="precio">S/<?= $productos[$i]["precio"] ?></span>
            </div>
        </div>
    <?php endfor ?>
<?php } ?>


<?php 
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'todos';
?>

<section class="producto" id="producto">
    <h2 class="producto-categoria"><?= $categoria ?></h2>
    <div class="producto-mostrador" id="productoMostrador">

    <?php
    //cargarProductos($todos); // Cargamos todos los productos 
    switch ($categoria) {
        case 'todos':
            cargarProductos($todos);
            break; 
        case 'equipamiento':
            cargarProductos($equipamiento); 
            break;
        case 'suplementos':
            cargarProductos($suplementos);
            break;
        case 'accesorios':
            cargarProductos($accesorios); 
        default:   
            break;
    } ?>

    </div>  
</section>
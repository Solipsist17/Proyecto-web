<?php 

// FALTA AGREGAR EL RESTO DE PRODUCTOS EN LOS ARRAY, DE ACUERDO A SU CATEGORIA (ASIGNARLE UN ID SECUENCIAL)

$equipamiento = [
    ["id" => 1, "categoria" => "equipamiento", "nombre" => "Mancuernas", "descripcion" => "Par de mancuernas de 20kg cada una", "precio" => 90, "imagen" => "../img/Productos/mancuerna-20kg1.jpg"],
    ["id" => 2, "categoria" => "equipamiento", "nombre" => "Banco ejercicios", "descripcion" => "Banco para realizar ejercicios", "precio" => 250, "imagen" => "../img/Productos/banco-ejercicios.jpg"]
];

$suplementos = [
    ["id" => 7, "categoria" => "suplementos", "nombre" => "Creatina", "descripcion" => "Creatina en polvo", "precio" => 60.00, "imagen" => "../img/Productos/creatina.jpg"],
    ["id" => 8, "categoria" => "suplementos", "nombre" => "Proteína", "descripcion" => "Proteína en polvo", "precio" => 65.90, "imagen" => "../img/Productos/proteina.jpg"]
];

$accesorios = [
    ["id" => 13, "categoria" => "accesorios", "nombre" => "Rodilleras", "descripcion" => "Par de rodilleras adidas", "precio" => 75.90, "imagen" => "../img/Productos/rodilleras.jpg"],
    ["id" => 14, "categoria" => "accesorios", "nombre" => "Muñequeras", "descripcion" => "Par de muñequeras nike", "precio" => 30.90, "imagen" => "../img/Productos/muñequeras.jpg"]
];

$todos = array_merge($equipamiento, $suplementos, $accesorios);
//var_dump($todos);
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
                <!-- <span class="descuento-tag">50% off</span> -->
                <img src=<?= $productos[$i]["imagen"] ?> class="producto-miniatura" alt=<?= $productos[$i]["nombre"] ?>>
                <button class="card-btn" onclick="cargar(this)">Agregar al carrito</button>
            </div>
            <div class="producto-info">
                <h2 class="producto-marca"><?= $productos[$i]["nombre"] ?></h2>
                <p class="producto-descripcion"><?= $productos[$i]["descripcion"] ?></p>
                <span class="precio">S/<?= $productos[$i]["precio"] ?></span>
                <!-- <span class="precio-actual">S/120</span> -->
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
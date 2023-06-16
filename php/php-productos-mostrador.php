<?php 

// FALTA AGREGAR EL RESTO DE PRODUCTOS EN LOS ARRAY, DE ACUERDO A SU CATEGORIA (ASIGNARLE UN ID SECUENCIAL)

$equipamiento = [
    ["id" => 1, "categoria" => "equipamiento", "nombre" => "Mancuernas", "descripcion" => "Par de mancuernas de 20kg cada una", "precio" => 90, "imagen" => "../img/Productos/mancuerna-20kg1.jpg"],
    ["id" => 2, "categoria" => "equipamiento", "nombre" => "Banco ejercicios", "descripcion" => "Banco para realizar ejercicios", "precio" => 250, "imagen" => "../img/Productos/banco-ejercicios.jpg"],
    ["id" => 3, "categoria" => "equipamiento", "nombre" => "Bandas elasticas", "descripcion" => "Set de 5 bandas", "precio" => 20, "imagen" => "../img/Productos/bandas-elasticas.jpg"],
    ["id" => 4, "categoria" => "equipamiento", "nombre" => "Chaleco peso", "descripcion" => "Chaleco con pesos para 20kg máximo", "precio" => 100, "imagen" => "../img/Productos/chaleco_de_peso.jpg"],
    ["id" => 5, "categoria" => "equipamiento", "nombre" => "Bicicletas", "descripcion" => "Bicicleta para ejercicios", "precio" => 160, "imagen" => "../img/Productos/bicicleta-ejercicios.jpg"],
    ["id" => 6, "categoria" => "equipamiento", "nombre" => "Caminadora", "descripcion" => "Múltiples funcionalidades", "precio" => 300, "imagen" => "../img/Productos/caminadora.jpg"]
];

$suplementos = [
    ["id" => 7, "categoria" => "suplementos", "nombre" => "Creatina", "descripcion" => "Creatina en polvo", "precio" => 60.00, "imagen" => "../img/Productos/creatina.jpg"],
    ["id" => 8, "categoria" => "suplementos", "nombre" => "Proteína", "descripcion" => "Proteína en polvo", "precio" => 65.90, "imagen" => "../img/Productos/proteina.jpg"],
    ["id" => 9, "categoria" => "suplementos", "nombre" => "Glutamina", "descripcion" => "Glutamina en polvo", "precio" => 104.90, "imagen" => "../img/Productos/glutamina.jpg"],
    ["id" => 10, "categoria" => "suplementos", "nombre" => "Omega 3", "descripcion" => "Capsulas", "precio" => 67.80, "imagen" => "../img/Productos/omega3.jpg"],
    ["id" => 11, "categoria" => "suplementos", "nombre" => "Vitamina C", "descripcion" => "Tabletas", "precio" => 54.90, "imagen" => "../img/Productos/vitaminaC.jpg"],
    ["id" => 12, "categoria" => "suplementos", "nombre" => "Oxido Nitrico", "descripcion" => "Solucion", "precio" => 84.90, "imagen" => "../img/Productos/oxido_nitrico.jpg"]

];

$accesorios = [
    ["id" => 13, "categoria" => "accesorios", "nombre" => "Rodilleras", "descripcion" => "Par de rodilleras adidas", "precio" => 75.90, "imagen" => "../img/Productos/rodilleras.jpg"],
    ["id" => 14, "categoria" => "accesorios", "nombre" => "Muñequeras", "descripcion" => "Par de muñequeras nike", "precio" => 30.90, "imagen" => "../img/Productos/muñequeras.jpg"],
    ["id" => 15, "categoria" => "accesorios", "nombre" => "Guantes", "descripcion" => "Par de guantes adidas", "precio" => 59.90, "imagen" => "../img/Productos/guantes.jpg"],
    ["id" => 16, "categoria" => "accesorios", "nombre" => "Bandas Cabeza", "descripcion" => "Banda de cabeza adidas", "precio" => 60.50, "imagen" => "../img/Productos/banda-cabeza.png"],
    ["id" => 17, "categoria" => "accesorios", "nombre" => "Tobillera", "descripcion" => "Par de tobilleras deportivas", "precio" => 20.00, "imagen" => "../img/Productos/tobillera.jpg"],
    ["id" => 18, "categoria" => "accesorios", "nombre" => "Codera", "descripcion" => "Par de coderas nike", "precio" => 35.90, "imagen" => "../img/Productos/codera.jpg"],
    ["id" => 19, "categoria" => "accesorios", "nombre" => "Correas Levantamiento", "descripcion" => "Par de correas", "precio" => 39.00, "imagen" => "../img/Productos/correas_levantamiento.jpg"],
    ["id" => 20, "categoria" => "accesorios", "nombre" => "Ejercitador dedos", "descripcion" => "Ejercitador para los dedos", "precio" => 29.00, "imagen" => "../img/Productos/ejercitador_dedos.jpg"],
    ["id" => 21, "categoria" => "accesorios", "nombre" => "Mat", "descripcion" => "Mat para yoga", "precio" => 30.50, "imagen" => "../img/Productos/mat.jpg"]
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
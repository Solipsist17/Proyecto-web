<?php 
session_start();
//session_unset();
//unset($_SESSION['productosCarrito']);

include("php-productos-data.php");

$productosCarrito = isset($_SESSION['productosCarrito']) ? $_SESSION['productosCarrito'] : [];

if ($_SERVER["REQUEST_METHOD"] === "POST") { 

    // Obtener el contenido del cuerpo de la solicitud
    $jsonData = file_get_contents('php://input');

    // Decodificar la cadena JSON en un arreglo asociativo
    $data = json_decode($jsonData, true);
    
    $id = $data["id"];
    $accion = $data["accion"];

    foreach ($todos as $elemento) {
        if ($elemento['id'] == $id) { // buscamos por su id
            $producto = [
                "id" => $elemento['id'],
                "categoria" => $elemento['categoria'], 
                "nombre" => $elemento['nombre'], 
                "descripcion" => $elemento['descripcion'], 
                "precio" => $elemento['precio'], 
                "imagen" => $elemento['imagen']
            ];
            
            if ($accion == "agregar") {

                if (!in_array($producto, $productosCarrito)) { // verificamos si no existe en el array carrito
                    array_push($productosCarrito, $producto);
                    $_SESSION['productosCarrito'] = $productosCarrito;
                }
            
            } elseif ($accion == "quitar") {

                if (in_array($producto, $productosCarrito)) { // Verificamos si existe en el array carrito
                    $indice = array_search($producto, $productosCarrito);
                    unset($productosCarrito[$indice]);
                    $productosCarrito = array_values($productosCarrito); // reorganizamos los índices
                    $_SESSION['productosCarrito'] = $productosCarrito;
                }
            }

            break;
        }
    }

    $subtotal = calcularSubTotal($productosCarrito); // calculamos el subtotal

    $data = [
        'productosCarrito' => $productosCarrito,
        'subtotal' => $subtotal
    ];

    //var_dump($productosCarrito);
    echo json_encode($data);

}

function calcularSubTotal($productosCarrito) {
    $subtotal = 0;
    foreach ($productosCarrito as $elemento) {
        $subtotal += $elemento['precio'];
    }
    return $subtotal;
}

?>

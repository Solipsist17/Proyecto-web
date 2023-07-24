<?php 
session_start();
//session_unset();
//unset($_SESSION['productosCarrito']);

//include("php-productos-data.php");


// Hacer la consulta a la BD
require_once("../conexion/conexion.php");
function obtenerProductos() {
  global $conn;
  $sql = "SELECT idProducto, nombre, descripcion, precio, imagen, idCategoria FROM producto";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $productos = array();
      while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
      }
      return $productos;
  } else {
      return array();
  }
}

//$categoria = "todos";
$productos = obtenerProductos();


if ($_SERVER["REQUEST_METHOD"] === "POST") { 

    // Obtener el contenido del cuerpo de la solicitud
    $jsonData = file_get_contents('php://input');

    // Decodificar la cadena JSON en un arreglo asociativo
    $data = json_decode($jsonData, true);
    
    $id = $data["id"];
    $accion = $data["accion"];

    $productosCarrito = isset($_SESSION['productosCarrito']) ? $_SESSION['productosCarrito'] : [];


    foreach ($productos as $elemento) {
        if ($elemento['idProducto'] == $id) { // buscamos por su id
            $producto = [
                "idProducto" => $elemento['idProducto'],
                "idCategoria" => $elemento['idCategoria'], 
                "nombre" => $elemento['nombre'], 
                "descripcion" => $elemento['descripcion'], 
                "precio" => $elemento['precio'], 
                "imagen" => base64_encode($elemento['imagen'])
            ];
            
            if ($accion == "agregar") {

                $existe = false;
                foreach ($productosCarrito as $item) { 
                    if ($item['idProducto'] == $id) { // Verificamos si existe 
                        $existe=true;
                    }    
                }
                if (!$existe) { // si no existe entonces lo agregamos
                    array_push($productosCarrito, $producto);
                    $_SESSION['productosCarrito'] = $productosCarrito;
                }
            
            } elseif ($accion == "quitar") {

                foreach ($productosCarrito as $clave => $item) { 
                    if ($item['idProducto'] == $id) { // Verificamos si existe 
                        $indice = $clave;
                        unset($productosCarrito[$indice]);
                        $productosCarrito = array_values($productosCarrito); // reorganizamos los índices
                        $_SESSION['productosCarrito'] = $productosCarrito;
                    }    
                }
            }

            break;
        }
    }

    $subtotal = calcularSubTotal($productosCarrito); // calculamos el subtotal
    //unset($productosCarrito);
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

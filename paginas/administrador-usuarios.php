<?php 
    session_start();
    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['idUsuario'])) {
        header("Location: login.php");
        exit;
    }

    require_once("../conexion/conexion.php");
    // Función para obtener todos los artículos de la base de datos
    //session_start();
    function obtenerProductos() {
        global $conn;
        $sql = "SELECT idProducto, nombre, descripcion, precio FROM producto";
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
  
    // Agregar un nuevo artículo
    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST["agregar"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
/*     $imagen = $_POST["imagen"]; */
    $sql = "INSERT INTO productos (nombre,
    descripcion, precio)VALUES ('$nombre', '$descripcion', $precio,)";
    $conn->query($sql);
    }

    // Modificar un artículo existente
    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST["modificar"])) {
    $idProducto = $_POST["idProducto"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
/*     $imagen = $_POST["imagen"]; */
    $sql = "UPDATE productos SET nombre='$nombre',
    descripcion=$descripcion, precio='$precio'WHERE idProducto=$idProducto";
    
    $conn->query($sql);
    }

        // Eliminar un artículo
    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST["eliminar"])) {
    $idProducto = $_POST["idProducto"];
    $sql = "DELETE FROM productos WHERE idProducto=$idProducto";
    $conn->query($sql);
    }
    // Obtener todos los artículos
    $productos = obtenerProductos();
?>

<!DOCTYPE html>
<html>
<head>
 <title>Productos</title>
 <link rel="stylesheet" type="text/css"
href="../css/style-administrador-productos.css">
</head>
<body>
    <a class="volver" href="administrador-indice.php">Volver</a>
    <div>
        <h1 class="a1">Productos</h1>
    </div>
    <br>
    <br>
    <!-- Formulario para agregar un nuevo artículo -->
    <div class="a2">
    <h2>Agregar producto</h2>
    </div>
    <div class="agr_prod" >
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="descripcion" placeholder="Descripcion" required>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required>
    </select>
    <input type="submit" name="agregar" value="Agregar">
    </form>
    </div>
    
<br><br><br>
    <!-- Tabla de artículos -->
    <div class="a2">
    <h2 >Listado de productos</h2>
    </div>
    
    <table>
    <tr>
    <th>ID</th> <th>Nombre</th> <th>Descripcion</th> <th>Precio</th>
    
    </tr>
    <?php foreach ($productos as $fila) { ?> <tr>
    <td><?php echo $fila['idProducto']; ?></td> <td><?php echo $fila['nombre']; ?></td>
    <td><?php echo $fila['descripcion']; ?></td> <td><?php echo $fila['precio']; ?></td>
    <td>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="idProducto" value="<?php echo $fila['idProducto']; ?>">
    <input type="submit" name="eliminar" value="Eliminar">
    </form>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="idProducto" value="<?php echo $fila['idProducto']; ?>">
    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required>
    <input type="text" name="descripcion" value="<?php echo $fila['descripcion']; ?>" required>
    <input type="number" step="0.01" name="precio" value="<?php echo $fila['precio']; ?>" required>
    <input type="submit" name="modificar" value="Modificar"> </form> </td>
    </tr> <?php } ?> </table>

</body>
</html>
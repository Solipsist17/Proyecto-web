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
        $sql = "SELECT * FROM producto";
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
//DONE    
    // Agregar un nuevo artículo
    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_POST["agregar"])) {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
/*     $imagen = $_POST["imagen"]; */
    $sql = "INSERT INTO productos (nombre,
    descripcion, precio)/*Agregar imagen*/ 
    VALUES ('$nombre', '$descripcion', $precio,)";
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
 <title>Artículos</title>
 <link rel="stylesheet" type="text/css"
href="../css/style.administrador.css">
</head>
<body>
    <h1>Artículos</h1>
    <!-- Formulario para agregar un nuevo artículo -->
    <h2>Agregar artículo</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="descripcion" placeholder="Descripcion" required>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required>
    </select>
    <input type="submit" name="agregar" value="Agregar">
    </form>

    <!-- Tabla de artículos -->
    <h2>Listado de artículos</h2>
    <table>
    <tr>
    <th>ID</th> <th>Nombre</th> <th>Descripcion</th> <th>Precio</th>
    
    </tr>
    <?php foreach ($productos as $productos) { ?> <tr>
    <td><?php echo $productos['idProducto']; ?></td> <td><?php echo $productos['nombre']; ?></td>
    <td><?php echo $productos['descripcion']; ?></td> <td><?php echo $productos['precio']; ?></td>
    <td>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="idProducto" value="<?php echo $productos['idProducto']; ?>">
    <input type="submit" name="eliminar" value="Eliminar">
    </form>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="idProducto" value="<?php echo $productos['idProducto']; ?>">
    <input type="text" name="nombre" value="<?php echo $productos['nombre']; ?>" required>
    <input type="text" name="descripcion" value="<?php echo $productos['descripcion']; ?>" required>
    <input type="number" step="0.01" name="precio" value="<?php echo $productos['precio']; ?>" required>
    <input type="submit" name="modificar" value="Modificar"> </form> </td>
    </tr> <?php } ?> </table>

</body>
</html>
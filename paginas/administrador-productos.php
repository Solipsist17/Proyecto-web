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
  
    // Agregar un nuevo producto
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar"])) {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];

        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            $nombreImagen = $_FILES["imagen"]["name"];
            $tipoImagen = $_FILES["imagen"]["type"];
            $datosImagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

            // Preparar la consulta SQL con un marcador de posición (?)
            $sql = "INSERT INTO producto (nombre, descripcion, precio, imagen, idCategoria) VALUES (?, ?, ?, ?, ?)";
            
            // Preparar la sentencia
            $stmt = $conn->prepare($sql);
            
            // Asignar los valores a los marcadores de posición
            $stmt->bind_param("ssdss", $nombre, $descripcion, $precio, $datosImagen, $categoria);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Producto agregado exitosamente.";
            } else {
                echo "Error al agregar el producto: " . $stmt->error;
            }
        } else {
            echo "error";
        }
    }

    // Modificar un producto existente
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modificar"])) {
        $idProducto = $_POST["idProducto"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $categoria = $_POST["categoria"];

        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
            // si hay imagen cargada
            $nombreImagen = $_FILES["imagen"]["name"];
            $tipoImagen = $_FILES["imagen"]["type"];
            $datosImagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

            // Preparar la consulta SQL con un marcador de posición (?)
            $sql = "UPDATE producto SET nombre=?, descripcion=?, precio=?, imagen=?, idCategoria=? WHERE idProducto=?";
                
            // Preparar la sentencia
            $stmt = $conn->prepare($sql);
                
            // Asignar los valores a los marcadores de posición
            $stmt->bind_param("ssdsss", $nombre, $descripcion, $precio, $datosImagen, $categoria, $idProducto);
                
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Producto modificado exitosamente.";
            } else {
                echo "Error al modificar el producto: " . $stmt->error;
            }
        } else {
            // si no hay imagen cargada
            $sql = "UPDATE producto SET nombre=?, descripcion=?, precio=?, idCategoria=? WHERE idProducto=?";
            
            $stmt = $conn->prepare($sql);
            
            $stmt->bind_param("ssdss", $nombre, $descripcion, $precio, $categoria, $idProducto);
            
            if ($stmt->execute()) {
                echo "Producto modificado exitosamente.";
            } else {
                echo "Error al modificar el producto: " . $stmt->error;
            }
        }

    }

    // Eliminar un producto
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
        $idProducto = $_POST["idProducto"];
        $sql = "DELETE FROM producto WHERE idProducto=$idProducto";
        $conn->query($sql);
    }
    // Obtener todos los productos
    $productos = obtenerProductos();

    // Cargar categorías
    function obtenerCategorias() {
        global $conn;
        $sql = "SELECT idCategoria, nombre FROM categoria";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $categorias = array();
        while ($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
            return $categorias;
        } else {
            return array();
        }
    }
    $categorias = obtenerCategorias();  
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
    <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="descripcion" placeholder="Descripcion" required>
        <input type="number" step="0.01" name="precio" placeholder="Precio" required>
        <!-- <label for="imagen">Imagen</label> -->
        <input type="file" name="imagen" id="imagen" accept="image/*" placeholder="Seleccionar imagen..." required>
        <select name="categoria" id=""> <!-- Traer los datos de categorías de la bd -->
            <?php foreach ($categorias as $categoria) { ?>
                <option value="<?= $categoria['idCategoria']?>" ><?= $categoria['nombre'] ?></option>
            <?php } ?>
            <!-- <option value="1">Equipamiento</option>
            <option value="2">Suplementos</option>
            <option value="3">Accesorios</option> -->
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
        <th>ID</th> 
        <th>Nombre</th> 
        <th>Descripcion</th> 
        <th>Precio</th>
        <th>Imagen</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($productos as $fila) { ?> 

    <tr>
        <td><?php echo $fila['idProducto']; ?></td> 
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['descripcion']; ?></td> 
        <td><?php echo $fila['precio']; ?></td>
        <td>
            <?php 
                $datosImagen = $fila['imagen']; // Recuperar los datos binarios de la base de datos

                // Obtener el tipo de imagen utilizando finfo_buffer
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $tipoImagen = $finfo->buffer($datosImagen);

                // Codificar los datos binarios en formato Base64
                $imagenCodificada = base64_encode($datosImagen);

                // Mostrar la imagen 
                echo '<img src="data:' . $tipoImagen . ';base64,' . $imagenCodificada . '" alt="Imagen" width="100px" height="100px">';
            ?>
        </td>
        <td><?php echo $fila['idCategoria']; ?></td>
        <td>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="idProducto" value="<?php echo $fila['idProducto']; ?>">
                <input type="submit" name="eliminar" value="Eliminar">
            </form>
            <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="idProducto" value="<?php echo $fila['idProducto']; ?>">
                <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>" required>
                <input type="text" name="descripcion" value="<?php echo $fila['descripcion']; ?>" required>
                <input type="number" step="0.01" name="precio" value="<?php echo $fila['precio']; ?>" required>
                <input type="file" name="imagen" id="imagen" accept="image/*" placeholder="Seleccionar imagen...">
                <select name="categoria" id=""> <!-- Traer los datos de categorías de la bd -->
                    <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?= $categoria['idCategoria']?>" <?php if ($fila['idCategoria'] == $categoria['idCategoria']) echo "selected"; ?> ><?= $categoria['nombre'] ?></option>
                    <?php } ?>
                </select>
                <input type="submit" name="modificar" value="Modificar"> 
            </form> 
        </td>
    </tr> 
    <?php } ?> 
    </table>

</body>
</html>
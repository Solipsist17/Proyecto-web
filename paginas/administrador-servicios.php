<?php 
    session_start();
    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['idUsuario'])) {
        header("Location: login.php");
        exit;
    }
    require_once("../conexion/conexion.php");
    function obtenerPlan() {
        global $conn;
        $sql = "SELECT idPlan, nombre, precio, idBeneficio FROM plan";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $planes = array();
        while ($row = $result->fetch_assoc()) {
            $planes[] = $row;
        }
            return $planes;
        } else {
            return array();
        }
    }
    $planes = obtenerPlan();


    function obtenerEspecialista() {
        global $conn;
        $sql = "SELECT especialista.idEspecialista, especialista.nombre AS nombreEspecialista, especialista.apellido, especialista.idArea, sede.nombre AS nombreSede, area.idArea, area.nombre AS nombreArea
        FROM especialista
        LEFT JOIN area ON especialista.idArea = area.idArea
        LEFT JOIN sede ON especialista.idSede = sede.idSede;";
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $especialistas = array();
        while ($row = $result->fetch_assoc()) {
            $especialistas[] = $row;
        }
            return $especialistas;
        } else {
            return array();
        }
    }
    $especialistas = obtenerEspecialista();

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

<br><br><br>
    <!-- Tabla de planes -->
    <div class="a2">
    <h2 >Listado de productos</h2>
    </div>
    
    <table>
    <tr>
        <th>ID</th> 
        <th>Nombre</th> 
        <th>Precio</th> 


    </tr>

    <?php foreach ($planes as $fila) { ?> 

    <tr>
        <td><?php echo $fila['idPlan']; ?></td> 
        <td><?php echo $fila['nombre']; ?></td>
        <td><?php echo $fila['precio']; ?></td> 
  
       
            
        </td>
    </tr> 
    <?php } ?> 
    </table>

    <!-- Tabla de especialistas -->
    <div class="a2">
    <h2 >Listado de especialistas</h2>
    </div>
    
    <table>
    <tr>
        <th>ID</th> 
        <th>Nombre</th> 
        <th>Apellido</th> 
        <th>Area</th>
        <th>Sede</th>
    </tr>

    <?php foreach ($especialistas as $fila) { ?> 

    <tr>
        <td><?php echo $fila['idEspecialista']; ?></td> 
        <td><?php echo $fila['nombreEspecialista']; ?></td>
        <td><?php echo $fila['apellido']; ?></td> 
        <td><?php echo $fila['nombreArea']; ?></td> 
        <td><?php echo $fila['nombreSede']; ?></td> 
            
        </td>
    </tr> 
    <?php } ?> 
    </table>

</body>
</html>
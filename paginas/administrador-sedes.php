<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
    exit;
}
include_once("../conexion/conexion.php"); 
//Obtener usuarios
function obtenerSedes() {
  global $conn;
  $sql = "SELECT sede.idSede, sede.nombre AS nombreSede, sede.idDireccion, sede.telefono, sede.mapa, direccion.nombre AS nombreDireccion FROM sede
  LEFT JOIN direccion ON sede.idDireccion = direccion.idDireccion";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $sedes = array();
  while ($row = $result->fetch_assoc()) {
      $sedes[] = $row;
  }
      return $sedes;
  } else {
      return array();
  }
}   

$sedes = obtenerSedes();

// Modificar un producto existente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modificar"])) {
    $idSede = $_POST["idSede"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["idDireccion"];
    $telefono = $_POST["telefono"];
    $mapa = $_POST["mapa"];
    
    $sql = "UPDATE sede SET nombre=?, direccion=?, telefono=?, mapa=? WHERE idSede=?";
              
    $stmt = $conn->prepare($sql);
              
    $stmt->bind_param("isss", $idSede, $nombre, $direccion, $telefono, $mapa);
              
    if ($stmt->execute()) {
      echo "Usuario modificado exitosamente.";
    } else {
      echo "Error al modificar la sede: " . $stmt->error;
    }
  
  }
  // Eliminar un usuario
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
    $idUsuario = $_POST["idSede"];
    $sql = "DELETE FROM sede WHERE idSede=$idSede";
    $conn->query($sql);
  }
  
  // Cargar categorías
  function obtenerDireccion() {
    global $conn;
    $sql = "SELECT idDireccion, nombre FROM direccion";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $roles = array();
    while ($row = $result->fetch_assoc()) {
        $direcciones[] = $row;
    }
        return $direcciones;
    } else {
        return array();
    }
  }
  $direcciones = obtenerDireccion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
<link rel="stylesheet" href="../css/style-administrador-users.css">
    <title>Usuarios</title>
</head>
<body>
<a class="volver" href="administrador-indice.php">Volver</a>
<div class="container is-fluid">
<div class="col-xs-12">
  		<h1>Administrador Actual: </h1>
      <br>
		<h1>Lista de usuarios</h1>
    <br>
		<div>
      <i class="fa fa-power-off" aria-hidden="true"></i>
       </a>
		</div>
		<br>
           <br>
			</form>
      <table class="table table-striped table-dark " id= "table_id">
        <thead>    
            <tr>
              <th>ID de Sede</th>
              <th>Nombre</th>
              <th>Telefono</th>
              <th>Link del Mapa</th>
              <th>Direccion</th>
              <th>Acciones</th>
            </tr>
          </thead>
 
              
          
          <tbody>
          <?php foreach ($sedes as $fila) { ?> 
            <tr>
              <td><?php echo $fila['idSede']; ?></td>
              <td><?php echo $fila['nombreSede']; ?></td>
              <td><?php echo $fila['telefono']; ?></td>
              <td><?php echo $fila['mapa']; ?></td>
              <td><?php echo $fila['nombreDireccion']; ?></td>
              <td>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="idSede" value="<?php echo $fila['idSede']; ?>">
                <input type="submit" name="eliminar" value="Eliminar">
            </form>
            
                <input type="hidden" name="idSede" value="<?php echo $fila['idSede']; ?>">
                <input type="text" name="nombreSede" value="<?php echo $fila['nombreSede']; ?>" required>
                <input type="number" name="telefono" value="<?php echo $fila['telefono']; ?>" required>
                <input type="url" name="mapa" value="<?php echo $fila['mapa']; ?>" required>
                <select name="direccion" id=""> <!-- Traer los datos de categorías de la bd -->
                    <?php foreach ($direcciones as $direccion) { ?>
                        <option value="<?= $direccion['idDireccion']?>" <?php if ($fila['idDireccion'] == $direccion['idDireccion']) echo "selected"; ?> ><?= $direccion['nombre'] ?></option>
                    <?php } ?>
                </select>
                <input type="submit" name="modificar" value="Modificar"> 
            </form> 
        </td>
           </tr>
           <?php } ?> 



          </tbody>
				
	</body>
  </table>
</html>
<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['idUsuario'])) {
    header("Location: login.php");
    exit;
}
include_once("../conexion/conexion.php"); 
//Obtener usuarios
function obtenerUsuarios() {
  global $conn;
  $sql = "SELECT usuario.idUsuario, usuario.nombre AS nombreUsuario, usuario.apellido, usuario.email, usuario.idRol, rol.nombre AS nombreRol FROM usuario
  LEFT JOIN rol ON usuario.idRol = rol.idRol";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $usuarios = array();
  while ($row = $result->fetch_assoc()) {
      $usuarios[] = $row;
  }
      return $usuarios;
  } else {
      return array();
  }
}   
 // Modificar un producto existente
 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modificar"])) {
  $idUsuario = $_POST["idUsuario"];
  $nombre = $_POST["nombre"];
  $apellido = $_POST["apellido"];
  $email = $_POST["email"];
  
  $sql = "UPDATE usuario SET nombre=?, apellido=?, email=? WHERE idUsuario=?";
            
  $stmt = $conn->prepare($sql);
            
  $stmt->bind_param("isss", $idUsuario, $nombre, $apellido, $email);
            
  if ($stmt->execute()) {
    echo "Usuario modificado exitosamente.";
  } else {
    echo "Error al modificar el usuario: " . $stmt->error;
  }

}
// Eliminar un usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
  $idUsuario = $_POST["idUsuario"];
  $sql = "DELETE FROM usuario WHERE idUsuario=$idUsuario";
  $conn->query($sql);
}
$usuarios = obtenerUsuarios();

// Cargar categorías
function obtenerRoles() {
  global $conn;
  $sql = "SELECT idRol, nombre FROM rol";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $roles = array();
  while ($row = $result->fetch_assoc()) {
      $roles[] = $row;
  }
      return $roles;
  } else {
      return array();
  }
}
$roles = obtenerRoles();  
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
              <th>ID del Usuario</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>E-mail</th>
              <th>Rol</th>
              <th>Acciones</th>
            </tr>
          </thead>
 
              
          
          <tbody>
          <?php foreach ($usuarios as $fila) { ?> 
            <tr>
              <td><?php echo $fila['idUsuario']; ?></td>
              <td><?php echo $fila['nombreUsuario']; ?></td>
              <td><?php echo $fila['apellido']; ?></td>
              <td><?php echo $fila['email']; ?></td>
              <td><?php echo $fila['nombreRol']; ?></td>
              <td>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="idUsuario" value="<?php echo $fila['idUsuario']; ?>">
                <input type="submit" name="eliminar" value="Eliminar">
            </form>
            
                <input type="hidden" name="idUsuario" value="<?php echo $fila['idUsuario']; ?>">
                <input type="text" name="nombre" value="<?php echo $fila['nombreUsuario']; ?>" required>
                <input type="text" name="descripcion" value="<?php echo $fila['apellido']; ?>" required>
                <input type="email" name="email" value="<?php echo $fila['email']; ?>" required>
                <select name="categoria" id=""> <!-- Traer los datos de categorías de la bd -->
                    <?php foreach ($roles as $rol) { ?>
                        <option value="<?= $rol['idRol']?>" <?php if ($fila['idRol'] == $rol['idRol']) echo "selected"; ?> ><?= $rol['nombre'] ?></option>
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
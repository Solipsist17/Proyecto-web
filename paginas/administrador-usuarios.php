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
  $sql = "SELECT usuario.idUsuario, usuario.nombre AS nombreUsuario, usuario.apellido, usuario.email, rol.nombre AS nombreRol FROM usuario
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

$usuarios = obtenerUsuarios();
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



             </td>
           </tr>
           <?php } ?> 



          </tbody>
				
	</body>
  </table>
</html>
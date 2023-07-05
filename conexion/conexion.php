<?php
$servername = "localhost:33081";//Cambiar aca el puerto
$username = "root";
$password = "";
$dbname = "gimnasio";
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
die("Error en la conexión: " . $conn->connect_error);
echo "Pendejo";
}else {
    echo "Conectado con exito";
}
?>

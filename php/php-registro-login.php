<?php 
    require_once('../conexion/conexion.php');
    //echo "AAAA";
    //header('Location: ../paginas/formulario.php');

    session_start();

    if (isset($_SESSION['idUsuario'])) {
        header("Location: ../paginas/cuenta.php");
        exit; 
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registrarse"])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $idRol = '2';

        $sql = "INSERT INTO usuario(nombre, apellido, email, clave, idRol) VALUES('$nombre', '$apellido', '$email', '$hash', '$idRol')";
        // validar que no se pueda repetir el email
        if ($conn->query($sql) === true) {
            //echo "Usuario creado con éxito";
            $mensaje = "Registro exitoso, inicie sesión con su cuenta";
        } else {
            //echo "Error: " . $conn->error;
            $mensaje = "Error al crear usuario";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        $email = $_POST['email'];
        $clave = $_POST['clave'];

        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedClave = $row['clave'];

            if (password_verify($clave, $hashedClave)) {
                $_SESSION["idUsuario"] = $row['idUsuario'];
                $_SESSION["idRol"] = $row['idRol'];
                $conn->close();
                header('Location: ../paginas/productos.php');
                exit;
            } else {
                $mensaje = "Contraseña incorrecta";
            } 
        } else {
            $mensaje = "Email incorrecto";
        }

        $conn->close();

    }
?>
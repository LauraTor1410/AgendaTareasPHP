<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión, si es así, redirigirlo a la página principal
if (isset($_SESSION['nombre_usuario'])) {
    header("Location: index.php");
    exit();
}

// Procesar el inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales (comparar con los datos almacenados en el archivo)

    $archivo = file("usuarios.txt");
    foreach ($archivo as $linea) {
        list($usuario, $contrasena_guardada) = explode(":", $linea);
        if (trim($usuario) == $nombre_usuario && trim($contrasena_guardada) == $contrasena) {
            // Iniciar sesión
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            // Redirigir al usuario a la página principal
            header("Location: index.php");
            exit();
        }
    }

    // Si las credenciales son incorrectas, mostrar un mensaje de error
    $mensaje_error = "Credenciales incorrectas.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link  rel="stylesheet" href=style.css type="text/css">
    <title>Iniciar sesión</title>
</head>
<body>
    <fieldset id="inicioS">
        <legend>Iniciar sesión</legend>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="nombre_usuario">Nombre de usuario:</label>
            <input type="text" name="nombre_usuario">
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena"><br>
            <button type="submit" class="btnInicio">Iniciar sesión</button>
            <a href="registro.php" class="btnRegistro">Registrarse</a>
        </form>
         
        <?php if(isset($mensaje_error)) echo $mensaje_error; ?>
    </fieldset>
</body>
</html>

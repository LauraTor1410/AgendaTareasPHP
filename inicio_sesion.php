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
    <fieldset>
        <legend>Iniciar sesión</legend>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Nombre de usuario: <input type="text" name="nombre_usuario"><br>
            Contraseña: <input type="password" name="contrasena"><br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <a href="registro.php">Registrarse</a>
        <?php if(isset($mensaje_error)) echo $mensaje_error; ?>
    </fieldset>
</body>
</html>

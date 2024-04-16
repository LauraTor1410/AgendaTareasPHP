// registro.php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Validar datos (por ejemplo, verificar si el nombre de usuario ya está en uso)

    // Guardar información en un archivo de texto plano
    $archivo = fopen("usuarios.txt", "a");
    fwrite($archivo, $nombre_usuario . ":" . $contrasena . "\n");
    fclose($archivo);

    // Redirigir al usuario a la página de inicio de sesión
    header("Location: inicio_sesion.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link  rel="stylesheet" href=style.css type="text/css">
    <title>Registro</title>
</head>
<body>
    <fieldset>
        <legend>Registro de usuario</legend>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Nombre de usuario: <input type="text" name="nombre_usuario"><br>
            Contraseña: <input type="password" name="contrasena"><br>
            <input type="submit" value="Registrar">
        </form>
    </fieldset>
    
</body>
</html>

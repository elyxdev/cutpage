<?php
require 'header.php';
require 'connect.php';
echo '<div style="border: 1px solid white; width: fit-content; margin: auto; margin-top: 15px; text-align:center; padding:20px;">';
$nombre = $_POST['nombre'];
$correo_electronico = $_POST['correo_electronico'];
$contrasena = $_POST['contrasena'];
$confirmar_contrasena = $_POST['confirmar_contrasena'];

// Comprobar si los campos están vacíos
if (empty($nombre) || empty($correo_electronico) || empty($contrasena) || empty($confirmar_contrasena)) {
  echo "<br><h1 style='color: white;'>Debe completar todos los campos<br><br><a href='register.php'>Volver</a></h1>"; exit;
}

// Comprobar si las contraseñas coinciden
if ($contrasena != $confirmar_contrasena) {
  echo "<br><h1 style='color: white;'>Las contraseñas no coinciden<br><br><a href='register.php'>Volver</a></h1>"; exit;
}

// Comprobar si el correo electrónico ya existe
$consulta = "SELECT * FROM usuarios WHERE correo_electronico = '$correo_electronico'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
  echo "<br><h1 style='color: white;'>El correo ya está registrado<br><br><a href='register.php'>Volver</a></h1>"; exit;
}

$consulta = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
  echo "<br><h1 style='color: white;'>El usuario ya está en uso<br><br><a href='register.php'>Volver</a></h1>"; exit;
}


// Si todos los datos son válidos, registrar al usuario
else {
  // Encriptar la contraseña
  $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

  // Insertar los datos del usuario en la base de datos
  $consulta = "INSERT INTO usuarios (nombre, correo_electronico, contrasena) VALUES ('$nombre', '$correo_electronico', '$hash_contrasena')";
  $conexion->query($consulta);

  // Cerrar la conexión a la base de datos
  $conexion->close();

  // Redirigir al usuario a la página de inicio de sesión
  header("Location: login.php?s=success");
}
$conexion->close();
require 'footer.php';
?>
</div>
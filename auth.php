<?php
require 'header.php';
require 'connect.php';
echo '<div style="border: 1px solid white; width: fit-content; margin: auto; margin-top: 15px; text-align:center; padding:20px;">';
// Validar los datos introducidos por el usuario
if (isset($_GET['act'])) {
    if ($_GET['act'] == "logout") {
        session_destroy();
        header("Location: login.php"); exit;
      }
}
$nombre_usuario = $_POST['nombre_usuario'];
$contrasena = $_POST['contrasena'];
$hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

// Comprobar si el usuario existe en la base de datos
$consulta = "SELECT * FROM usuarios WHERE nombre = '$nombre_usuario'";
$resultado = $conexion->query($consulta);

// Si el usuario existe, iniciar sesión
if ($resultado->num_rows > 0 ) {
  // Obtener los datos del usuario
  $fila = $resultado->fetch_assoc();
  if (password_verify($_POST['contrasena'], $fila['contrasena'])) {
  // Iniciar sesión
  $_SESSION['lg_in'] = 1;
  $_SESSION['id_usuario'] = $fila['id'];
  $_SESSION['nombre_usuario'] = $fila['nombre'];
  // Redirigir al usuario a la página principal
  header("Location: index.php");
  } else {
    echo "<br><h1 style='color: white;'>El nombre de usuario o la contraseña no son correctos<br><br><a href='login.php'>Volver</a></h1>";
  }
} else {
  // El usuario no existe o la contraseña es incorrecta
  echo "<br><h1 style='color: white;'>El nombre de usuario o la contraseña no son correctos<br><br><a href='login.php'>Volver</a></h1>";
}
echo '</div>';
$conexion->close();
require 'footer.php';
?>
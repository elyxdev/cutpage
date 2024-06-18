<?php
require '../layouts/header.php';
require 'connect.php';
// Validar los datos introducidos por el usuario
if (isset($_GET['act'])) {
    if ($_GET['act'] == "logout") {
        session_destroy();
        header("Location: login"); exit;
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
  header("Location: ../panel");
  } else {
    echo "<div class='p-6 w-auto h-auto text-2xl font-semibold xl:pt-[10%] pt-[60%]'><p>¡El nombre de usuario o la contraseña no son correctos! <br> <a href='login'><button class='rounded-full bg-malo hover:bg-malodo transition duration-300 text-white p-2 mt-[10%] font-normal'>Regresar</button></a></p></div>";
  }
} else {
  // El usuario no existe o la contraseña es incorrecta
  echo "<div class='p-6 w-auto h-auto text-2xl font-semibold xl:pt-[10%] pt-[60%]'><p>¡El nombre de usuario o la contraseña no son correctos! <br> <a href='login'><button class='rounded-full bg-malo hover:bg-malodo transition duration-300 text-white p-2 mt-[10%] font-normal'>Regresar</button></a></p></div>";
}
$conexion->close();
require '../layouts/footer.php';
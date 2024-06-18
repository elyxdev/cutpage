<?php
require 'layouts/header.php';
if (isset($_GET['l'])) {
  require 'auth/connect.php';
  require 'utils/log.php';
  $banana_phone = $_GET['l'];
  $consulta = "SELECT * FROM direcciones WHERE url = '$banana_phone'";
  $resultado = $conexion->query($consulta);
  if ($resultado->num_rows > 0 ) {
      $fila = $resultado->fetch_assoc();
      $destino = $fila['destino'];
      $id_del_coso = $fila['id'];
      $gtips_actual = $fila['gtips'];
      $ip_actual = getIP();
      $date = new DateTime();
      $datap = $date->format('Y-m-d-H-i-s');
      
      $nuevo_gtips = "$gtips_actual" . "$ip_actual" . "#" . $datap . ",";
      // reg ip
      $consulta_b = "UPDATE direcciones SET gtips = '$nuevo_gtips' WHERE direcciones.id = $id_del_coso";
      $resultado_b = $conexion->query($consulta_b);
      header("Location: $destino", true, 302); //de
  } else {
      header("Location: https://youtube.com", true, 302); //de
  }
}
?>

<div class="text-xl w-[60%] pt-[10vh] xl:pt-[6%] ml-auto mr-auto">
  <h1 class="text-4xl pb-[25px] font-bold from-blue-500 to-red-500 bg-gradient-to-r bg-clip-text text-transparent">¡Cutpage!</h1>
  <p>Despídete de los links largos, Cutpage es una web para crear links de bolsillo, con una instalación rápida y redireccionamiento veloz.</p><br>
  <p>Para empezar a usarlo <a href="auth/register" class="text-rosanav hover:text-purple-700 hover:underline transition duration-200">regístrate</a>, si ya tienes una cuenta <a href="auth/login" class="text-rosanav hover:text-purple-700 hover:underline transition duration-200">inicia sesión</a></p><br>
  <p>Este es un proyecto de fuente abierta, siéntete libre de obtener el código en mi <a href="https://github.com/elyxdev" class="text-rosanav hover:text-purple-700 hover:underline transition duration-200">Github</a>.</p>
</div>

<?php 
require 'layouts/footer.php';
?>
<?php
$possible_core_route_a = "../utils/core.php";
$possible_core_route_b = "utils/core.php";

if (file_exists($possible_core_route_a)) {
  require $possible_core_route_a;
} else {
  if (file_exists($possible_core_route_b)) {
    require $possible_core_route_b;
  } else {
    exit("Fatal error.");
  }
}
// Establecer conexión
$conexion = new mysqli($d_host, $d_usuario, $d_pswd, $d_db);
?>
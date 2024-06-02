<?php
require 'connect.php';
require 'ut.php';
$banana_phone = "google";
if (isset($_GET['u'])) {
    $banana_phone = $_GET['u'];
}
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
?>
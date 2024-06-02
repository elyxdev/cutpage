<?php
require 'header.php';
require 'connect.php';
require 'ut.php';
if ($_SESSION['lg_in'] != 1) {
    header("Location: login.php"); exit;
  }

echo '<div style="border: 1px solid white; width: fit-content; margin: auto; margin-top: 15px; text-align:center; padding:20px;">';

$url = $_POST['url_acortada'];
if ($url == "") {
    $url = generarStringAleatorio();
}
$track_code = $_POST['trackcode'];
if ($track_code == "") {
    $track_code = generarStringAleatorio();
}
$creador = $_SESSION['nombre_usuario'];
$destino = $_POST['url_destino'];
if (!str_starts_with($destino, "http")) {
    $destino = "https://" . $destino;
}

$consulta = "SELECT * FROM direcciones WHERE url = '$url'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0 ) {
    echo "<br><h1 style='color: white;'>Esta URL ya está en uso.<br><br><a href='index.php'>Volver</a></h1>"; exit;
}

$consulta = "SELECT * FROM direcciones WHERE trackcode = '$track_code'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0 ) {
    echo "<br><h1 style='color: white;'>Este código de rastreo ya está en uso.<br><br><a href='index.php'>Volver</a></h1>"; exit;
}



$consulta = "INSERT INTO direcciones (url, trackcode, creador, destino) VALUES ('$url', '$track_code', '$creador', '$destino')";
$conexion->query($consulta);

// Cerrar la conexión a la base de datos
$conexion->close();
echo "<br><h2 style='color: white;'>¡Acortador creado!<br><br><a class='btn btn-success' style='width: 130px' href='index.php'>Volver</a></h2>";
echo "<br><h4 style='color: white;'><a style='width: 130px' class='btn btn-primary' onclick=\"copiarAlPortapapeles('" . $_SERVER['SERVER_ADDR']."/l?u=$url" . "')\">Copiar link</a> | <a style='width: 130px' class='btn btn-warning' href='track.php?code=" . $track_code . "'>Rastrear</a></h4>";
?>

</div>

<?php
require 'footer.php';
?>
<?php
require '../layouts/header.php';
require '../auth/connect.php';
require 'log.php';
if ($_SESSION['lg_in'] != 1) {
    header("Location: auth/login"); exit;
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
    echo "<h1 class='xl:pt-[45%] pt-[70%] text-lg font-bold mb-[50px] text-center text-gray-800'>Error: Esta URL ya está en uso.<br><br><a href='".$rp."panel' class='p-2 rounded-full bg-prpl hover:bg-azulnav text-white transition duration-200' >Volver</a></h1>"; exit;
}

$consulta = "SELECT * FROM direcciones WHERE trackcode = '$track_code'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0 ) {
    echo "<h1 class='xl:pt-[45%] pt-[70%] text-lg font-bold mb-[50px] text-center text-gray-800'>Este código de rastreo ya está en uso.<br><br><a href='".$rp."panel' class='p-2 rounded-full bg-prpl hover:bg-azulnav text-white transition duration-200'>Volver</a></h1>"; exit;
}



$consulta = "INSERT INTO direcciones (url, trackcode, creador, destino) VALUES ('$url', '$track_code', '$creador', '$destino')";
$conexion->query($consulta);

// Cerrar la conexión a la base de datos
$conexion->close();
echo "<h2 class='text-2xl font-bold mb-[25px] pt-[100%] text-center text-gray-800 xl:pt-[45%]'>¡Acortador creado!</h2>";
echo "<a class='p-2 text-lg font-bold rounded-full bg-prpl hover:bg-azulnav text-white transition duration-200 mr-[20px]' href='".$rp."panel'>Volver</a>";
echo "<a class='p-2 text-lg font-bold rounded-full bg-prpl hover:bg-azulnav text-white transition duration-200' href='".$rp."track?code=" . $track_code . "'>Rastrear</a>";
?>

</div>

<?php
require '../layouts/footer.php';
?>
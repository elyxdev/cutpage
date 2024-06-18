<?php

function generarStringAleatorio() {
    $letras = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $string = "";
    for ($i = 0; $i < rand(5, 6); $i++) {
      $string .= $letras[rand(0, strlen($letras) - 1)];
    }
    return $string;
  }

function getIP() 
{ 
	if (isset($_SERVER)) 
	{ 
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) 
		{ 
			$realip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
		} 
		else
			if (isset($_SERVER['HTTP_CLIENT_IP'])) 
			{ 
				$realip = $_SERVER['HTTP_CLIENT_IP']; 
			} 
			else 
			{ 
				$realip = $_SERVER['REMOTE_ADDR']; 
			} 
		} 
	else 
	{
		if (getenv("HTTP_X_FORWARDED_FOR")) 
		{ 
			$realip = getenv( "HTTP_X_FORWARDED_FOR"); 
		} 
		else
			if (getenv("HTTP_CLIENT_IP")) 
			{ 
				$realip = getenv("HTTP_CLIENT_IP"); 
			}
			else
			{ 
				$realip = getenv("REMOTE_ADDR"); 
	} 
} 
return $realip; 
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['remove'])) {
    require '../layouts/header.php';
    require '../auth/connect.php';
    $remove = $_GET['remove'];
    $consulta = "SELECT * FROM direcciones WHERE direcciones.trackcode = '$remove'";
    $resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    if ($fila['creador'] != $_SESSION['nombre_usuario']) {
        exit;
    } 
} else {
    exit;
}

$consulta = "DELETE FROM direcciones WHERE direcciones.trackcode = '$remove'";
$conexion->query($consulta);
// Cerrar la conexión a la base de datos
$conexion->close();
echo "<h2 class='text-2xl font-bold mb-[25px] pt-[80%] text-gray-800 xl:pt-[150px]'>¡Acortador eliminado!</h2>";
echo "<a class='p-2 text-lg font-bold rounded-full bg-prpl hover:bg-azulnav text-white transition duration-200 mr-[20px]' href='".$rp."acortadores'>Volver</a>";
}
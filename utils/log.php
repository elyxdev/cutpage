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
    require 'header.php';
    require 'connect.php';
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
echo '<div style="border: 1px solid white; width: fit-content; margin: auto; margin-top: 15px; text-align:center; padding:20px;">';
echo "<br><h1 style='color: white;'>¡Acortador eliminado!<br><br><a href='me.php'>Volver</a></h1></div>";
}

?>
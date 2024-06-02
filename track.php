<?php 
require 'header.php';
require 'connect.php';
if ($_SESSION['lg_in'] != 1) {
  header("Location: login.php"); exit;
}
if (!isset($_GET['code'])) {
    '<h3 style="text-align:center; color: white; margin-top: 50px">No hay ningún código para rastrear. <a href="me.php">Regresa al inicio</a></h3>'; exit;
}
$codigoa = $_GET['code'];
$consulta = "SELECT * FROM direcciones WHERE trackcode = '$codigoa'";
$resultado = $conexion->query($consulta);
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    if ($fila['creador'] != $_SESSION['nombre_usuario'] && $_SESSION['nombre_usuario'] != "pispitdev") {
        echo '<h3 style="text-align:center; color: white; margin-top: 50px">No puedes usar este código de rastreo. <a href="me.php">Regresa al inicio</a></h3>'; exit;
    }
} else {
    echo '<h3 style="text-align:center; color: white; margin-top: 50px">Este código no existe. <a href="me.php">Regresa al inicio</a></h3>'; exit;
}
?>

<h3 style="text-align:center; color: white; margin-top: 50px">Rastreando: <?php echo $codigoa?></h3>
<table class="table table-success table-striped" style="width: 600px; margin: auto; margin-top: 30px; border: 2px solid green; border-radius: 12px;">
    <tr>
        <th>IP</th>
        <th>Timestamp</th>
        <th>Opciones</th>
    </tr>
    <?php
    
    $creador = $_SESSION['nombre_usuario'];
    $consulta = "SELECT * FROM direcciones WHERE trackcode = '$codigoa'";
    $resultado = $conexion->query($consulta);
    
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        if (!strlen($fila['gtips']) < 1) {
            
        
        $regips_b = substr($fila['gtips'], 0, -1);
        $regips = explode(",", $regips_b);
        foreach ($regips as $x) {
            echo "<tr>";
            echo "<td><b>".explode("#",$x)[0]."</b></td>"; //ip
            echo "<td>".explode("#",$x)[1]."</td>"; //timestamp
            echo '<td><button class="btn btn-success" onclick="ijuemadre(\''.explode("#",$x)[0].'\')" style="width: 70px; text-decoration: none;">Ver</button></td>'; //geolookup
            echo "</tr>";
        }
    } else {
        echo '<td><h3>No hay registros todavía.</h3></td>';
    }
}
            ?>
</table>

<?php
require 'footer.php';
?>
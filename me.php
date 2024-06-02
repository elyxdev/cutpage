<?php
require 'header.php';
require 'connect.php';
if ($_SESSION['lg_in'] != 1) {
    header("Location: login.php"); exit;
  }
?>
<h3 style="text-align:center; color: white; margin-top: 50px">Mis acortadores</h3>
<table class="table table-success table-striped" style="width: 650px; margin: auto; margin-top: 30px; border: 2px solid green; border-radius: 12px;">
    <tr>
        <th>Track Code</th>
        <th>Acortador</th>
        <th>Destino</th>
        <th>Opciones</th>
    </tr>
    <?php
    
    $creador = $_SESSION['nombre_usuario'];
    $consulta = "SELECT * FROM direcciones WHERE creador = '$creador'";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
            <td><b><?php echo $fila['trackcode']; ?></b></td>
            <td><?php $paputi=$fila['url'];echo "<a onclick=\"copiarAlPortapapeles('".$_SERVER['SERVER_ADDR']."/l?u=$paputi"."')\" href='l?u=$paputi'>zentrum.totalh.net/l?u=".$paputi."</a>"; ?></td>
            <td><?php echo $fila['destino']; ?></td>
            <td>
                <a class="btn btn-success" href="track.php?code=<?php echo $fila['trackcode'] ?>" style="width: 90px; text-decoration: none;">Ver</a>
                <!-- <a style="width: 90px; margin-top:10px;" class="btn btn-warning">Editar</a> -->
                <br>
                <a style="width: 90px; margin-top:10px;" href="ut.php?remove=<?php echo $fila['trackcode']?>" class="btn btn-danger">Eliminar</a>
            </td>
            </tr>
            <?php
        }
    }
    ?>
</table>

<?php
require 'footer.php';
?>
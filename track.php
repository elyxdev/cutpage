<?php 
require 'layouts/header.php';
require 'auth/connect.php';
if ($_SESSION['lg_in'] != 1) {
  header("Location: login"); exit;
}
if (!isset($_GET['code'])) {
    echo "<h1 class='xl:pt-[15%] pt-[70%] text-lg font-bold mb-[50px] text-center text-gray-800'>No hay ningún código para rastrear.<br><br><a href='".$rp."acortadores' class='p-2 rounded-full bg-prpl hover:bg-azulnav text-white transition duration-200'>Volver</a></h1>"; exit;
}
$codigoa = $_GET['code'];
$consulta = "SELECT * FROM direcciones WHERE trackcode = '$codigoa'";
$resultado = $conexion->query($consulta);
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    if ($fila['creador'] != $_SESSION['nombre_usuario'] && $_SESSION['nombre_usuario'] != $admin_u) {
        echo "<h1 class='xl:pt-[15%] pt-[70%] text-lg font-bold mb-[50px] text-center text-gray-800'>No puedes usar este código de rastreo.<br><br><a href='".$rp."acortadores' class='p-2 rounded-full bg-prpl hover:bg-azulnav text-white transition duration-200'>Volver</a></h1>"; exit;
    }
} else {
    echo "<h1 class='xl:pt-[15%] pt-[70%] text-lg font-bold mb-[50px] text-center text-gray-800'>Este código no existe.<br><br><a href='".$rp."acortadores' class='p-2 rounded-full bg-prpl hover:bg-azulnav text-white transition duration-200'>Volver</a></h1>"; exit;
}
?>

<h2 class="text-3xl font-bold mb-[50px] text-center text-gray-800 pt-[5%]" >Rastreando: <a class="hover:underline hover:text-azulnav transition duration-300" href="<?php echo $rp ?>track?code=<?php echo $codigoa?>"><?php echo $codigoa?></a> <a href="acortadores"><i class="fa-solid fa-reply text-prpl hover:text-azulnav transition duration-200"></i></a></h2>
<div class="xl:h-[61vh] h-[87%] overflow-auto w-fit ml-auto mr-auto ">
<table class="w-fit border-2 border-separate border-spacing-2 border border-azulnav hover:border-prpl transition duration-300 rounded-3xl ml-auto mr-auto p-3" id="tablaTracking">
    <thead>    
    <tr>
        <th class="p-2 border border-slate-700 rounded-3xl">IP</th>
        <th class="p-2 border border-slate-700 rounded-3xl">Tiempo</th>
        <th class="p-2 border border-slate-700 rounded-3xl">Opciones</th>
    </tr>
    </thead>
    <tbody>
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
            echo "<td class='font-bold text-prpl hover:text-azulnav transition duration-300'>".explode("#",$x)[0]."</td>"; //ip
            echo "<td>".explode("#",$x)[1]."</td>"; //timestamp
            echo '<td><i class="fa-solid fa-globe text-xl hover:text-prpl transition duration-300 cursor-pointer" onclick="ijuemadre(\''.explode("#",$x)[0].'\')"></i></button></td>'; //geolookup
            echo "</tr>";
        }
    } else {
        echo '<h3 class="text-lg font-bold mb-[50px] text-center text-gray-800">No hay registros todavía.</h3>';
    }
}
            ?>
</tbody>
</table>
</div>
<?php
require 'layouts/footer.php';
?>
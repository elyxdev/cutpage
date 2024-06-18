<?php
require 'layouts/header.php';
require "auth/connect.php";
if ($_SESSION['lg_in'] != 1) {
  header("Location: auth/login"); exit;
}
?>
<h1 class="text-3xl font-bold mb-[50px] text-center text-gray-800 pt-[2%]">Mis acortadores<?php if($_SESSION['nombre_usuario'] == $admin_u) {echo ' <i onclick="ntrack()" class="fa-solid fa-magnifying-glass font-bold text-prpl hover:cursor-pointer hover:text-azulnav transition duration-200"></i>';}?></h1>
<div class="xl:h-[61vh] h-[87%] overflow-auto w-fit ml-auto mr-auto ">
<table id="misAcortadores" class="w-fit border-2 border-separate border-spacing-2 border border-azulnav hover:border-prpl transition duration-300 rounded-3xl p-3">
<thead> 
<tr>
        <th class="p-2 border rounded-3xl border-slate-700 transtion duration-200">Track Code</th>
        <th class="p-2 border border-slate-700 rounded-3xl hidden xl:table-cell">Acortador</th>
        <th class="p-2 border border-slate-700 rounded-3xl hidden xl:table-cell">Destino</th>
        <th class="p-2 border border-slate-700 rounded-3xl">Opciones</th>
</tr>
</thead>
<tbody class="overflow-auto h-[20%]">
    <?php
    
    $creador = $_SESSION['nombre_usuario'];
    $consulta = "SELECT * FROM direcciones WHERE creador = '$creador'";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            ?>
            <tr>
            <td class="text-prpl hover:text-azulnav transtion hover:cursor-pointer duration-200" onclick="info_d('<?php $paputi=$fila['url']; echo $fila['destino']; ?>', '<?php echo $rp.'?l='.$paputi ?>')"><b><?php echo $fila['trackcode']; ?></b></td>
            <td class="hidden xl:table-cell"><?php echo "<a class='hover:text-prpl hover:underline transition duration-200' href='$rp?l=$paputi'>$rp?l=".$paputi."</a>"; ?></td>
            <td class="hidden xl:table-cell hover:text-green-500 hover:underline transition duration-200"><a href="<?php echo $fila['destino']; ?>"><?php echo $fila['destino']; ?></a></td>
            <td>
                <a class="hover:text-prpl text-[17px] mr-[18px] xl:mr-[10px] transition duration-200" href="track?code=<?php echo $fila['trackcode'] ?>"><i class="fa-solid fa-eye"></i></a>
                <a class="hover:text-red-700 text-[17px] transition duration-200" href="<?php echo $r_utils ?>log?remove=<?php echo $fila['trackcode']?>"><i class="fa-solid fa-trash"></i></a>
            </td>
            </tr>
            <?php
        }
    }
    ?>    
</tbody>
</table>
</div>
<?php
require 'layouts/footer.php';
?>
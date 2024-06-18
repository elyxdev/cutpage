<?php 
require 'layouts/header.php';
if ($_SESSION['lg_in'] != 1) {
  header("Location: auth/login"); exit;
}
?>

      <form class="p-6 xl:pt-[5%] pt-[40%]" action="utils/new_route.php" method="post">
      <h1 class="text-3xl font-bold mb-[50px] text-center text-gray-800">Acortar</h1>  
      <div class="mb-3">
        <label for="xsds" class="block text-gray-700 mb-2">Página de destino</label>
        <input placeholder="Ej: www.youtube.com" id="xsds" class="xl:w-[38%] w-[95%] px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-slate-200 transition duration-200" name="url_destino" required>
      </div>
      <div class="mb-3">
          <label for="txd" class="block text-gray-700 mb-2">Código de rastreo</label>
          <input placeholder="En blanco: Autogenerarlo" class="xl:w-[38%] w-[95%] px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-slate-200 transition duration-200" name="trackcode" id="txd" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="vfvf" class="block text-gray-700 mb-2">Custom URL</label>
            <input class="xl:w-[38%] w-[95%] px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-slate-200 transition duration-200" placeholder="En blanco: Autogenerarlo" id="vfvf" name="url_acortada" >
          </div>
        <button type="submit" class="rounded-full bg-prpl w-[95%] xl:w-auto p-2 hover:bg-azulnav text-white transition duration-200">Crear</button>
      </form>

<?php 
require 'layouts/footer.php';
?>
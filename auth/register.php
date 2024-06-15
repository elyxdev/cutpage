<?php
require '../layouts/header.php';
if ($_SESSION['lg_in'] == 1) {
    header("Location: ../index"); exit;
}
?>

<section class="items-center text-center float-left w-[50%] hidden xl:block pt-[12%] text-gray-600">
  <h1 class="text-3xl font-bold mb-[50px] text-center text-gray-800">Registrarse</h1>
  <p>
    Llena este formulario con los datos que se te piden para crear tu cuenta en Cutpage!
  </p>
  <p class="mt-4 text-center">Ya tienes una cuenta? <a class="text-blue-500 hover:underline hover:text-prpl transtion duration-200" href="login">Inicia sesión</a></p>
</section>

<form action="./reg_auth.php" method="post" class="p-6 rounded-lg xl:w-[50%] w-full max-w-md xl:float-right mb-auto mr-[120px] xl:mt-[25px] xl:pt-[0px] pt-[28%]">

<h1 class="text-3xl font-bold mb-[50px] xl:hidden text-center text-gray-800">Registrarse</h1>

  <div class="mb-4">
    <label class="block text-gray-700 mb-2" for="form2Example17a">Nombre de usuario</label>
    <input name="nombre" id="form2Example17a" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-slate-200 transition duration-200" required/>
   </div>

   <div class="mb-4">
     <label class="block text-gray-700 mb-2" for="form2Example17b">Correo electrónico</label>
     <input name="correo_electronico" type="email" id="form2Example17b" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-slate-200 transition duration-200" required/>
   </div>

   <div class="mb-4">
     <label class="block text-gray-700 mb-2" for="form2Example27c">Contraseña</label>
     <input type="password" name="contrasena" id="form2Example27c" name="contrasena" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-slate-200 transition duration-200" required/>
   </div>

   <div class="mb-4">
     <label class="block text-gray-700 mb-2" for="form2Example27d">Confirmar contraseña</label>
     <input type="password" name="confirmar_contrasena" id="form2Example27d" name="contrasena" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-slate-200 transition duration-200" required/>
   </div>

   <button type="submit" class="w-full bg-prpl text-white py-2 rounded-lg transition hover:bg-[#726cf7] duration-300">¡Regístrate!</button>
   <p class="xl:hidden mt-4 text-center">Ya tienes una cuenta? <a class="text-blue-500 hover:underline hover:text-prpl transtion duration-200" href="login">Inicia sesión</a></p>
</form>

<?php
require '../layouts/footer.php';
?>
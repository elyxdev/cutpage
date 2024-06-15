<?php
require '../layouts/header.php';
if ($_SESSION['lg_in'] == 1) {
    header("Location: ../index"); exit;
}
if (isset($_GET['s'])) {
  echo "<script>alert('Registro exitoso, ahora inicie sesión.')</script>";
}
?>

<form action="./auth" method="post" class="p-6 rounded-lg w-full max-w-md mb-auto ml-auto mr-auto xl:pt-[70px] pt-[50%]">
    <h1 class="text-3xl font-bold mb-[50px] text-center text-gray-800">Iniciar sesión</h1>

    <div class="mb-4">
      <label for="form2Example17" class="block text-gray-700 mb-2">Nombre de usuario</label>
      <input name="nombre_usuario" id="form2Example17" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-slate-200 transition duration-200" required/>
    </div>

    <div class="mb-6">
      <label for="form2Example27" class="block text-gray-700 mb-2">Contraseña</label>
      <input type="password" id="form2Example27" name="contrasena" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-slate-200 transition duration-200" required/>
    </div>

    <button type="submit" class="w-full bg-prpl text-white py-2 rounded-lg transition hover:bg-[#726cf7] duration-300">Entrar</button>

    <p class="mt-4 text-center text-gray-600">No tienes una cuenta? <a href="register.php" class="text-blue-500 hover:underline hover:text-prpl transtion duration-200">Regístrate aquí</a></p>
  </form>

<?php
require '../layouts/footer.php';
?>
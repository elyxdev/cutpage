<?php
session_start();
if (!isset($_SESSION['lg_in'])) {
    $_SESSION['lg_in'] = 0;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./js/tailwind.config.js"></script>
    <script src="./js/re.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Cutpage</title>
</head>
<body class="font-sans w-[100%]">
    <nav class="flex p-[20px] pt-[40px] w-[100%] h-[9vh] items-center text-white bg-black ">
      <section class="w-fit"> <!-- Section con el título -->
        <a href="index"><h1 class="text-2xl hover:to-purple-600 hover:from-blue-500 font-bold from-purple-600 to-blue-500 bg-gradient-to-r bg-clip-text text-transparent">Cutpage</h1></a>
      </section>


      <section class="w-[100%] text-center text-azulnav font-light hidden xl:block"> <!-- Section con los items PC -->
      <?php if ($_SESSION['lg_in'] == 1) {
                // Sesión iniciada
                // Acortar
                echo '<a href="acortar" class="mr-[22px]"><button class="bg-black rounded-full p-[4px] transition duration-200 hover:font-bold hover:text-prpl"><p class="font-medium text-lg pt-[3px]">Acortar</p></button></a>';
                // Acortadores
                echo '<a href="acortadores" class="mr-[22px]"><button class="bg-black rounded-full p-[4px] transition duration-200 hover:font-bold hover:text-prpl"><p class="font-medium text-lg pt-[3px]">Mis acortadores</p></button></a>';
                // Perfil
                echo '<a href="perfil"><button class="bg-black rounded-full p-[4px] transition duration-200 hover:font-bold hover:text-prpl"><p class="font-medium text-lg pt-[3px]">Perfil</p></button></a>';
                // Cerrar sesión
                echo '<a href="auth.php?act=logout" class="mr-[10px] float-right pt-[6px]"><button class="bg-malo rounded-full p-[4px] text-white hover:bg-malodo transition duration-300"><p>Cerrar sesión</p></button></a>';
            } else {
                // Sesión no iniciada
                echo '<a href="login" class="mr-[10px] float-right pt-[6px]"><button class="bg-rosanav rounded-full p-[4px] text-white hover:bg-prpl transition duration-300"><p>Iniciar sesión</p></button></a>';
            }
      ?>
      </section>

      <!-- Section con los items móvil -->
      <section class="z-20 bg-grisva w-[80%] h-fit fixed top-[9%] left-[18%] rounded-xl p-6 items-center text-center hidden xl:hidden" id="items">
      <?php if ($_SESSION['lg_in'] == 1) {
                // Sesión iniciada
                // Acortar
                echo '<a href="#"><button class="rounded-full bg-prpl hover:bg-azulnav transtion duration-200 p-1 w-full mb-[25px]">Acortar</button></a>';
                // Acortadores
                echo '<a href="#"><button class="rounded-full bg-prpl hover:bg-azulnav transtion duration-200 p-1 w-full mb-[25px]">Mis acortadores</button></a>';
                // Perfil
                echo '<a href="#"><button class="rounded-full bg-prpl hover:bg-azulnav transtion duration-200 p-1 w-full mb-[25px]">Perfil</button></a>';
                // Cerrar sesión
                echo '<a href="auth.php?act=logout"><button class="rounded-full bg-malo hover:bg-malodo transtion duration-200 p-1 w-full mb-[5px]">Cerrar sesión</button></a>';
      } else {
                // Sesión no iniciada
                // Iniciar sesión
                echo '<a href="login"><button class="rounded-full bg-prpl hover:bg-azulnav transtion duration-200 p-1 w-full mb-[5px]">Iniciar sesión</button></a>';
      }
      ?>
        
        
        
        

      </section>

      <section class="w-[100%] text-center text-azulnav bg-white-600 font-light block xl:hidden">  <!-- botón movil -->
        <button class="float-right text-white z-10" id="menuhamburguesa"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 50 50">
          <path fill="#fff" d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"></path>
            </svg>

        </button>
      </section>


      
    </nav>
    <div class="w-[100%] h-[91vh] bg-black pt-[2%]">
      <div class="mr-[5%] ml-[5%] w-[90%] bg-white h-[90%] rounded-2xl items-center text-center">
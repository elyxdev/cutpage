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
        <a href="acortar" class="mr-[22px]"><button class="bg-black rounded-full p-[4px] transition duration-200 hover:font-bold hover:text-prpl"><p class="font-medium text-lg pt-[3px]">Acortar</p></button></a>
        <a href="acortadores" class="mr-[22px]"><button class="bg-black rounded-full p-[4px] transition duration-200 hover:font-bold hover:text-prpl"><p class="font-medium text-lg pt-[3px]">Mis acortadores</p></button></a>
        <a href="perfil"><button class="bg-black rounded-full p-[4px] transition duration-200 hover:font-bold hover:text-prpl"><p class="font-medium text-lg pt-[3px]">Perfil</p></button></a>

        <a href="login" class="mr-[10px] float-right pt-[6px]"><button class="bg-rosanav rounded-full p-[4px] text-white hover:bg-prpl transition duration-300"><p>Iniciar sesión</p></button></a>
      </section>
      
    </nav>
    <div class="w-[100%] h-[91vh] bg-black pt-[2%]">
      <div class="mr-[5%] ml-[5%] w-[90%] bg-white h-[90%] rounded-2xl items-center text-center">
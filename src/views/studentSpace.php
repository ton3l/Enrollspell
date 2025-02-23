<?php
    require_once __DIR__ . '\..\repository\dbConnection.php';
    
    $DAL = dbConnection::getInstance(); 
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <title>Portal do estudante</title>
    </head>
    <body class="flex justify-center bg-[url(../assets/imgs/bgStudentSpace.png)] bg-no-repeat bg-cover">

    <aside class="fixed left-0 top-0 h-screen w-60 bg-black/85 text-white flex flex-col justify-center items-center">
        <ul class="w-full">
            <li class="border-b border-white w-full text-center hover:bg-[#333333] cursor-pointer">Boletins</li>
            <li class="w-full text-center hover:bg-[#333333] cursor-pointer">Calendário</li>
        </ul>
    </aside>
    <main class="bg-black/86 h-screen w-200 flex flex-col items-center justify-center">
        <header class="flex gap-8">
            <img src="../assets/imgs/simple-line-icons_user.png" alt="" class="h-32">
            <div class="flex flex-col h-32 justify-center">
                <p class="text-3xl text-white"> Kleyton Araujo Dantas </p>
                <p class="text-3xl text-white">19 anos</p>
            </div>
        </header>
        <section class="w-full pt-8 ps-44 pe-32 grid grid-cols-2 gap-y-8 gap-x-16">
            <p class="text-white text-start ">
                <span class="font-medium">Teste das ervas:</span> <br>
                Pendente
            </p>
            <p class="text-white text-start">
                <span class="font-medium">CPF:</span> <br>
                123.456.789-10
            </p>

            <p class="text-white text-start">
                <span class="font-medium">Matrícula:</span> <br>
                20250840001
            </p>
            <p class="text-white text-start">
                <span class="font-medium">Período:</span> <br>
                3º
            </p>
            
            <p class="text-white text-start">
                <span class="font-medium">Nível de combate:</span> <br>
                Médio
            </p>
            <p class="text-white text-start">
                <span class="font-medium">Estado médico:</span> <br>
                Saudável
            </p>
        </section>
    </main>
</body>
</html>
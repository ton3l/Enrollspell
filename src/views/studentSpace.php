<?php
    require_once __DIR__ . '\..\repository\dbConnection.php';
    
    $DAL = dbConnection::getInstance();

    $stmt = $DAL->query("SELECT * FROM aluno WHERE matricula = " . $_GET['matricula']);
    $user = $stmt->fetch();
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
        <a href="./bulletin.php?matricula=<?php echo $_GET['matricula'] ?>"><li class="border-b border-white w-full text-center hover:bg-[#333333] cursor-pointer">Boletins</li></a>
        </ul>
        <button class="absolute bottom-4 cursor-pointer">
            <a href="../../index.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="16" stroke-dashoffset="16" d="M4.5 21.5h15"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="16;0"/></path><path stroke-dasharray="16" stroke-dashoffset="16" d="M4.5 21.5v-13.5M19.5 21.5v-13.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="16;0"/></path><path stroke-dasharray="28" stroke-dashoffset="28" d="M2 10l10 -8l10 8"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.4s" values="28;0"/></path><path stroke-dasharray="24" stroke-dashoffset="24" d="M9.5 21.5v-9h5v9"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.4s" values="24;0"/></path></g></svg></a>
        </button>
    </aside>
    <main class="bg-black/86 h-screen w-200 flex flex-col items-center justify-center">
        <header class="flex gap-8">
            <div class="flex flex-col h-32 justify-center">
                <p class="text-3xl text-white"> <?php echo $user['nome'] ?> </p>
            </div>
        </header>
        <section class="w-full pt-8 ps-44 pe-32 grid grid-cols-2 gap-y-8 gap-x-16">
            <p class="text-white text-start ">
                <span class="font-medium">Teste das ervas:</span> <br>
                <?php echo $user['teste'] ?>
            </p>
            <p class="text-white text-start">
                <span class="font-medium">CPF:</span> <br>
                <?php echo $user['cpf'] ?>
            </p>

            <p class="text-white text-start">
                <span class="font-medium">Matrícula:</span> <br>
                <?php echo $user['matricula'] ?>
            </p>
            <p class="text-white text-start">
                <span class="font-medium">Período:</span> <br>
                <?php echo $user['periodo'] ?>º
            </p>
            
            <p class="text-white text-start">
                <span class="font-medium">Nível de combate:</span> <br>
                <?php echo $user['combate'] ?>
            </p>
            <p class="text-white text-start">
                <span class="font-medium">Estado médico:</span> <br>
                <?php echo $user['saude'] ?>
            </p>
        </section>
    </main>
</body>
</html>
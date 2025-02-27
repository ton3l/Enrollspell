<?php
    session_start();

    require_once __DIR__ . '\..\repository\dbConnection.php';
    
    $DAL = dbConnection::getInstance();

    $stmt = "
        SELECT disciplina.nome, nota.nota, nota.periodo  FROM nota 
        JOIN disciplina ON nota.disciplina = disciplina.id
        WHERE nota.aluno = " . $_SESSION['matricula'] . "
        ORDER BY nota.periodo ASC, disciplina.nome ASC
    ";

    if(isset($_POST['periodo'])){
        $stmt = "
            SELECT disciplina.nome, nota.nota, nota.periodo  FROM nota 
            JOIN disciplina ON nota.disciplina = disciplina.id
            WHERE nota.aluno = " . $_SESSION['matricula'] . " AND nota.periodo = ".$_POST['periodo']."
            ORDER BY nota.periodo ASC, disciplina.nome ASC
        ";
    }
    
    $getBulletin = $DAL->query($stmt);

    $stmt = $DAL->query("SELECT * FROM aluno WHERE matricula = " . $_SESSION['matricula']);
    $user = $stmt->fetch();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <title>Boletim</title>
    </head>
    <body class="flex justify-center bg-[url(../assets/imgs/bgStudentSpace.png)] bg-no-repeat bg-cover">

    <aside class="fixed left-0 top-0 h-screen w-60 bg-black/85 text-white flex flex-col justify-center items-center">
        <ul class="w-full">
        <a href="./studentSpace.php"><li class="border-b border-white w-full text-center hover:bg-[#333333] cursor-pointer">Espaço do estudante</li></a>
        </ul>
        <button class="absolute bottom-4 cursor-pointer">
            <a href="/Enrollspell/index.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="16" stroke-dashoffset="16" d="M4.5 21.5h15"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="16;0"/></path><path stroke-dasharray="16" stroke-dashoffset="16" d="M4.5 21.5v-13.5M19.5 21.5v-13.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="16;0"/></path><path stroke-dasharray="28" stroke-dashoffset="28" d="M2 10l10 -8l10 8"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.4s" values="28;0"/></path><path stroke-dasharray="24" stroke-dashoffset="24" d="M9.5 21.5v-9h5v9"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.4s" values="24;0"/></path></g></svg></a>
        </button>
    </aside>
    <main class="bg-black/86 h-screen w-200 flex flex-col items-center justify-center">
        <header class="flex gap-8">
            <div class="flex h-32 gap-8 justify-center items-center">
                <p class="text-3xl text-white"> <?php echo $user['nome'] ?> </p>
                
                <form class="max-w-sm mx-auto flex flex-col justify-center" action="#" method="post">
                    <label for="countries" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Selecione um período</label>
                    <select id="countries" name="periodo" class="mb-2 bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected hidden>Período</option>
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        <option value="19">19º</option>
                        <option value="20">20º</option>
                    </select>
                    <button type="submit" class="text-neutral-900 bg-white border border-neutral-300 focus:outline-none hover:bg-neutral-100 focus:ring-4 focus:ring-neutral-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-neutral-800 dark:text-white dark:border-neutral-600 dark:hover:bg-neutral-700 dark:hover:border-neutral-600 dark:focus:ring-neutral-700">Filtrar</button>
                </form>
            </div>
        </header>
        <section class="w-full pt-8  gap-y-8 gap-x-16">
            <div class="overflow-x-auto overflow-y-auto h-100">
                <table class="w-full text-sm text-left rtl:text-right text-neutral-500 dark:text-neutral-400">
                    <thead class="text-xs text-neutral-700 uppercase bg-neutral-50 dark:bg-neutral-700 dark:text-neutral-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Matéria
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nota
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Período
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($materia = $getBulletin->fetch()){
                                $nome = $materia['nome'];
                                $nota = $materia['nota'];
                                $periodo = $materia['periodo'];
                                
                                echo "
                                    <tr class='bg-white border-b dark:bg-neutral-800 dark:border-neutral-700 border-neutral-200'>
                                        <th scope='row' class='px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white'>
                                            $nome
                                        </th>
                                        <td class='px-6 py-4 text-white'>
                                            $nota
                                        </td>
                                        <td class='px-6 py-4 text-white'>
                                            $periodo
                                        </td>
                                    </tr>
                                ";
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
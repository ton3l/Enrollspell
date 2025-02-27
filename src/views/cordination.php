<?php
    session_start();
    if(isset($_SESSION['cordenation'])){
        header("Location: ../views/login.html"); 
        exit();
    }

    require_once __DIR__ . '\..\repository\dbConnection.php';
    
    $DAL = dbConnection::getInstance();

    $stmt = $DAL->query("SELECT * FROM aluno WHERE nome IS NOT NULL ORDER BY nome ");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="./scripts/cordination.js"></script>
    <title>Enrollspell</title>
    
</head>
<body>
    <nav class="flex justify-between items-center h-20 w-screen ps-10 pe-10 fixed top-0 left-0 bg-[url(../assets/imgs/formBackground.png)] z-2" style="background-position-y: -650px; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
        <h1 class="text-white text-6xl font-[Times]">Cordenação</h1>
        <div>
            <a href="/Enrollspell/index.php"><button class="hover:bg-[#6C6C6CBB] bg-[#6C6C6C70] text-white font-[Times] ps-5 pe-5 pb-1 pt-1 rounded-sm cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="16" stroke-dashoffset="16" d="M4.5 21.5h15"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.2s" values="16;0"/></path><path stroke-dasharray="16" stroke-dashoffset="16" d="M4.5 21.5v-13.5M19.5 21.5v-13.5"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.2s" dur="0.2s" values="16;0"/></path><path stroke-dasharray="28" stroke-dashoffset="28" d="M2 10l10 -8l10 8"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s" dur="0.4s" values="28;0"/></path><path stroke-dasharray="24" stroke-dashoffset="24" d="M9.5 21.5v-9h5v9"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.4s" values="24;0"/></path></g></svg></button></a>
        </div>
    </nav>
    <main class="ps-[8vw] pe-[8vw] mt-22 bg-white>">
    <div class="relative overflow-x-auto h-128 w-full overflow-y-auto shadow-md sm:rounded-lg z-0 mb-1">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Aluno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Matrícula
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Período
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telefone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CPF
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Teste das ervas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Combate
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Saúde
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($aluno = $stmt->fetch()){
                        $nome = $aluno['nome'];
                        $matricula = $aluno['matricula'];
                        $periodo = $aluno['periodo'];
                        $telefone = $aluno['telefone'];
                        $cpf = $aluno['cpf'];
                        $teste = $aluno['teste'];
                        $combate = $aluno['combate'];
                        $saude = $aluno['saude'];

                        $dados = [
                            "matricula" => $matricula,
                            "saude" => $saude,
                            "combate" => $combate,
                            "teste" => $teste,
                            "periodo" => $periodo
                        ];
                        
                        // Convertendo array para JSON
                        $jsonData = json_encode($dados);
                        
                        echo "
                            <tr class='odd:bg-white even:bg-gray-50 border-b border-gray-200'>
                                <th scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap'>
                                    $nome
                                </th>
                                <td class='px-6 py-4'>
                                    $matricula
                                </td>
                                <td class='px-6 py-4'>
                                    $periodo
                                </td>
                                <td class='px-6 py-4'>
                                    $telefone
                                </td>
                                <td class='px-2 py-4'>
                                    $cpf
                                </td>
                                <td class='px-6 py-4'>
                                    $teste
                                </td>
                                <td class='px-6 py-4'>
                                    $combate
                                </td>
                                <td class='px-6 py-4'>
                                    $saude
                                </td>
                                <td class='px-6 py-4'>
                                    <a href='#' class='font-medium text-blue-600 hover:underline' data-bs-toggle='modal' data-bs-target='#exampleModal' data-default=$jsonData>Edit</a>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Disciplina
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nota
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Período
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aulno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4">
                        Laptop
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Disciplina
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </main>

    <!-- Modal -->
    <section class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formAlunos">Editar informações</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="max-w-md mx-auto" action="../API/updateStudent.php" method="post">
                <label for="combate" class="block mb-2 text-sm font-medium text-gray-700">Combate</label>
                <select id="combate" name="combate" class="border rounded-md w-full p-2 text-sm bg-white focus:ring focus:border-blue-400 mb-4">
                    <option selected hidden>Selecione</option>
                    <option value="ruim" id="option-ruim">Ruim</option>
                    <option value="médio" id="option-médio">Médio</option>
                    <option value="bom" id="option-bom">Bom</option>
                    <option value="ótimo" id="option-otimo">Ótimo</option>
                </select>
                <label for="saude" class="block mb-2 text-sm font-medium text-gray-700">Saúde</label>
                <select id="saude" name="saude" class="border rounded-md w-full p-2 text-sm bg-white focus:ring focus:border-blue-400 mb-4">
                    <option selected hidden>Selecione</option>
                    <option value="ferido" id="option-ferido">Ferido</option>
                    <option value="saudável" id="option-saudável">Saudável</option>
                    <option value="doente" id="option-doente">Doente</option>
                    <option value="morto" id="option-morto">Morto</option>
                </select>
                <label for="teste" class="block mb-2 text-sm font-medium text-gray-700">Teste das ervas</label>
                <select id="teste" name="teste" class="border rounded-md w-full p-2 text-sm bg-white focus:ring focus:border-blue-400 mb-4">
                    <option selected hidden>Selecione</option>
                    <option value="pendente" id="option-pendente">Pendente</option>
                    <option value="concluído" id="option-concluído">Concluído</option>
                </select>
                <label for="periodo" class="block mb-2 text-sm font-medium text-gray-700">Período</label>
                <select id="periodo" name="periodo" class="border rounded-md w-full p-2 text-sm bg-white focus:ring focus:border-blue-400 mb-4">
                    <option selected hidden>Selecione</option>
                    <option value="1" id="option1">1</option>
                    <option value="2" id="option2">2</option>
                    <option value="3" id="option3">3</option>
                    <option value="4" id="option4">4</option>
                    <option value="5" id="option5">5</option>
                    <option value="6" id="option6">6</option>
                    <option value="7" id="option7">7</option>
                    <option value="8" id="option8">8</option>
                    <option value="9" id="option9">9</option>
                    <option value="10" id="option10">10</option>
                    <option value="11" id="option11">11</option>
                    <option value="12" id="option12">12</option>
                    <option value="13" id="option13">13</option>
                    <option value="14" id="option14">14</option>
                    <option value="15" id="option15">15</option>
                    <option value="16" id="option16">16</option>
                    <option value="17" id="option17">17</option>
                    <option value="18" id="option18">18</option>
                    <option value="19" id="option19">19</option>
                    <option value="20" id="option20">20</option>
                </select>
                <input type="hidden" name="matricula" id="matricula" value="" />
                <div class="flex w-full justify-between">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-3.5 py-2.5 text-center">Concluir</button>
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-3.5 py-2.5 text-center" formaction="../API/deleteStudent.php">Excluir aluno</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </section>
</body>
</html>
<div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nota</label>
                        <div class="border-b-2 border-gray-300 mt-1"></div> 
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                        <div class="border-b-2 border-gray-300 mt-1"></div>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="floating_repeat_password" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
                        <div class="border-b-2 border-gray-300 mt-1"></div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                            <div class="border-b-2 border-gray-300 mt-1"></div>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
                            <div class="border-b-2 border-gray-300 mt-1"></div>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (123-456-7890)</label>
                            <div class="border-b-2 border-gray-300 mt-1"></div> 
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="floating_company" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company (Ex. Google)</label>
                            <div class="border-b-2 border-gray-300 mt-1"></div>
                        </div>
                    </div>
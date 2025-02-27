<?php 
    require_once __DIR__ . '\..\repository\dbConnection.php';
        
    $DAL = dbConnection::getInstance(); 
    
    $saude = $_POST['saude'];
    $combate = $_POST['combate'];
    $teste = $_POST['teste'];
    $periodo = $_POST['periodo'];
    $matricula = $_POST['matricula'];

    $stmt = $DAL->query("UPDATE aluno SET saude = '$saude', combate = '$combate', teste = '$teste', periodo = '$periodo' WHERE matricula = '$matricula'");
    $stmt->execute();

    header("Location: ../views/cordination.php"); 
    exit();
?>
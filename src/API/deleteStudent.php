<?php 
    require_once __DIR__ . '\..\repository\dbConnection.php';
        
    $DAL = dbConnection::getInstance(); 

    $matricula = $_POST['matricula'];

    $stmt = $DAL->query("DELETE FROM aluno WHERE matricula = '$matricula'");
    $stmt->execute();

    header("Location: ../views/cordination.php"); 
    exit();
?>
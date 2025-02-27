<?php 
    require_once __DIR__ . '\..\repository\dbConnection.php';
        
    $DAL = dbConnection::getInstance(); 

    $nomeDisc = $_POST['nomeDisc'];

    $stmt = $DAL->prepare("INSERT INTO disciplina (nomeDisc) VALUES (:nomeDisc)");
    $stmt->bindParam(':nomeDisc', $nomeDisc);
    
    $stmt->execute();

    header("Location: ../views/cordination.php");
?>

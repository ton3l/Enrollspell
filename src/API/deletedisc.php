<?php 
    require_once __DIR__ . '\..\repository\dbConnection.php';
        
    $DAL = dbConnection::getInstance(); 

    $disciplina = $_POST['disciplina'];

    $sql = "DELETE FROM disciplina WHERE nome = :disciplina";
    $stmt = $DAL->prepare($sql);
    
    $stmt->bindParam(':disciplina', $disciplina, PDO::PARAM_STR);

    $stmt->execute();

    header("Location: ../views/cordination.php"); 
    exit();
?>

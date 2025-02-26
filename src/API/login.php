<?php
    require_once __DIR__ . '\..\repository\dbConnection.php';
    
    $DAL = dbConnection::getInstance(); 

    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];
    
    $stmt = $DAL->query("SELECT matricula, senha FROM aluno WHERE matricula = '$matricula'");
    $verify = $stmt->fetch();
    
    if(isset($verify['matricula']) && $matricula == $verify['matricula'] && $senha == $verify['senha']){
        session_start();
        $_SESSION['matricula'] = $matricula;
        
        header("Location: ../views/studentSpace.php"); 
        exit();
    }
    else{
        header("Location: ../views/login.html"); 
        exit();
    }
?>
<?php
    require_once __DIR__ . '\..\repository\dbConnection.php';
    
    $DAL = dbConnection::getInstance(); 

    $matricula = $_POST['matricula'];
    $senha = $_POST['senha'];
    
    $stmt = $DAL->query("SELECT matricula, senha FROM aluno WHERE matricula = '$matricula'");
    $verify = $stmt->fetch();
    
    if(isset($verify['matricula']) && $matricula == $verify['matricula'] && $senha == $verify['senha']){
        header("Location: http://127.0.0.1/Enrollspell/src/views/studentSpace.php?matricula=$matricula"); 
        exit();
    }
    else{
        header("Location: http://127.0.0.1/Enrollspell/src/views/login.html"); 
        exit();
    }
?>
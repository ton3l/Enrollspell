<?php
    require_once __DIR__ . '\..\repository\dbConnection.php';
    
    $DAL = dbConnection::getInstance(); 

    function gerarMatriculaAuto() {
        return date('Ymd') . sprintf('%04d', rand(0, 9999));
    }

    $matricula = gerarMatriculaAuto();

    $nome    = $_POST['name'];
    $cpf     = $_POST['cpf'];
    $tel     = $_POST['tel'];
    $senha   = $_POST['password'];
    $teste   = 'pendente';
    $periodo = 1;
    $combate = 'ruim';
    $saude   = 'saudável';

    $stmt = $DAL->prepare("SELECT COUNT(*) FROM aluno WHERE matricula = ?");
    $stmt->execute([$matricula]);
    $count = $stmt->fetchColumn();

    while ($count > 0) {
        $matricula = gerarMatritculaAuto();
        $stmt->execute([$matricula]);
        $count = $stmt->fetchColumn();
    }

    $stmt = $DAL->prepare("INSERT INTO aluno (matricula, nome, cpf, telefone, senha, teste, periodo, combate, saude ) 
    VALUES (?, ?, ?, ?, ?,?,?,?,?)");
    $stmt->execute([$matricula, $nome, $cpf, $tel, $senha, $teste, $periodo, $combate, $saude]);

    $getAllDisciplines = $DAL->query("SELECT id FROM disciplina");
    
    while($disciplina = $getAllDisciplines -> fetch()){
        for($i = 0; $i < 20; $i++){
            $periodo = $i+1;
            $insertNota = $DAL->prepare("INSERT INTO nota(nota, periodo, aluno, disciplina) VALUES (0, $periodo, '$matricula', $disciplina[0])");
            $insertNota->execute();
        }
    }

    session_start();
    $_SESSION['matricula'] = $matricula;
    
    header("Location: ../views/studentSpace.php");
    exit();
    ?>

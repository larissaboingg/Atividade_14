<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];
    $setor = $_POST['setor'];
    $usuario_id = $_POST['usuario_id'];
    $prioridade = $_POST['prioridade'];
    $status_tarefa = $_POST['status_tarefa'];
    
    $sql = "INSERT INTO tarefas (descricao, setor, usuario_id, prioridade, status_tarefa) VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ssis", $descricao, $setor, $usuario_id, $prioridade, $status_tarefa);
        
        if ($stmt->execute()) {
            echo "<script>alert('Tarefa cadastrada com sucesso!');
            window.location='gerenciar_tarefas.php';</script>";
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
}
?>

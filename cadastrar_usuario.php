<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nome) VALUES (?)"); 
    
    if ($stmt) {
        $stmt->bind_param("s", $nome);
        
        if ($stmt->execute()) {
            echo "<script>alert('Usuário cadastrado!'); window.location='gerenciar_tarefas.php';</script>"; 
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastro de Usuário</title>
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gerenciamento de Tarefas</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link"
                href="cadastrar_usuario.php">Cadastro de Usuários</a></li>
                <li class="nav-item"><a class="nav-link"
                href="index.php">Cadastro de Tarefas</a></li>
                <li class="nav-item"><a class="nav-link"
                href="gerenciar_tarefas.php">Gerenciar Tarefas</a></li>
                </ul>
            </div>
    </div>
</nav>

<div class="container mt-4">
    <h3>Cadastro de Usuário</h3>
    <form method="POST">
            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
        <button type="submit" class="btn
        btn-primary">Cadastrar</button>
    </form>
</div>
</body>
</html>

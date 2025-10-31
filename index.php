<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Gerenciamento de Tarefas</title>
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
<h3>Cadastro de Tarefas</h3>
<form action="cadastrar_tarefa.php" method="POST">
<div class="mb-3">
<label>Descrição:</label>
<input type="text" name="descricao" class="form-control"
required>
</div>
<div class="mb-3">
<label>Setor:</label>
<input type="text" name="setor" class="form-control">
</div>
<div class="mb-3">
<label>Usuário:</label>

<select name="usuario_id" class="form-select" required>
<option value="">Selecione</option>
<?php
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
echo "<option
value='{$row['id']}'>{$row['nome']}</option>";
}
?>
</select>
</div>
<div class="mb-3">
    <label>Prioridade:</label>
    <select name="prioridade" class="form-select">
    <option>Baixa</option>
    <option>Média</option>
    <option>Alta</option>
</select>
</div>
<button type="submit" class="btn
btn-primary">Cadastrar</button>
</form>
</div>
</body>
</html>

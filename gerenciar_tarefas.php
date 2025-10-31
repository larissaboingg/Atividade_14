<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Gerenciar Tarefas</title>
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
<h3>Gerenciamento de Tarefas</h3>
<table class="table table-striped">

<thead>
    <tr>
    <th>Descrição</th>
    <th>Setor</th>
    <th>Usuário</th>
    <th>Prioridade</th>
    <th>Status tarefa</th>
    </tr>
</thead>
<tbody>
<?php
$sql = "SELECT t.*, u.nome AS usuario FROM tarefas t
LEFT JOIN usuarios u ON t.usuario_id = u.id ORDER BY t.data_criacao DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
echo "<tr>
<td>{$row['descricao']}</td>
<td>{$row['setor']}</td>
<td>{$row['usuario']}</td>
<td>{$row['prioridade']}</td>
<td>{$row['status_tarefa']}</td>
</tr>";
}
?>
</tbody>
</table>
</div>
</body>
</html>

<?php

    include_once '../Controllers/UsuarioController.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $controller = new UsuarioController();
        if (isset($_POST['cadastrar'])) {
            $controller->cadastrarUsuario($_POST['usuario']);
        }
    }

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Usuarios</title>
</head>
<body>
    <h1>Cadastro</h1>

        <form method="post" action="UsuarioCadastro.php">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="nome" required>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="email" required>
            <label for="cpf">Cpf</label>
            <input type="text" id="cpf" name="cpf" placeholder="cpf" required>
            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" placeholder="telefone" required>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="senha" required>
            <label for="tipo">Tipo</label>
            <input type="text" id="Tipo" placeholder="tipo" required>
            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
</body>
</html>
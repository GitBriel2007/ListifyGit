<?php

    include_once __DIR__ . '/../Controllers/UsuarioController.php';

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
<h1>Cadastre-Se</h1>

        <form method="post" action="UsuarioCadastro.php" enctype="multipart/form-data">
            <label for="nome">Nome</label>
            <input type="text" placeholder="Nome" id="nome" name="usuario[nome]" required>

            <label for="cpf">CPF</label>
            <input type="text" inputmode="numeric" maxlength="14" placeholder="000.000.000-00" id="cpf" name="usuario[cpf]"
                   required>

            <label for="email">Email</label>
            <input type="email" placeholder="exemplo@com.com" id="email" name="usuario[email]" required>

            <label for="tipo">Tipo de Usuário</label>
            <select id="tipo" name="usuario[tipoUsuario]" required>
                <option value="cliente">Cliente</option>
                <option value="fabricante">Fabricante</option>
            </select>

            <label for="telefone">Telefone</label>
            <input type="text" placeholder="(00) 00000-0000" maxlength="15" id="telefone" name="usuario[telefone]" required>

            <label for="senha">Senha</label>
            <input type="password" placeholder="Senha" id="senha" name="usuario[senha]" required>

            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
</body>
</html>
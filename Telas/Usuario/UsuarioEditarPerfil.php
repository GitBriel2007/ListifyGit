<?php

    include_once __DIR__  . '/../../Controllers/UsuarioController.php';

    $controller = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["editarPerfil"])) {
        $edicao = $controller->pesquisarUsuarioID($_GET["editarPerfil"]);
    if (isset($_POST['atualizar'])) {
        $controller->atualizarUsuario($_POST['usuario']);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["usuario"])) {
        $controller->atualizarUsuario($_POST['usuario']);
    } else {
        header("Location: index.php");
    }
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edição de Perfil</title>
</head>
<body>
<h1>Editar Perfil</h1>

        <form method="post" action="UsuarioCadastro.php" enctype="multipart/form-data">

            <label for="fileToUpload">Imagem </label>
            <input type="file" placeholder="Selecione uma Boa Imagem" id="fileToUpload" name="usuario[fileToUpload]" required>

            <label for="nome">Nome</label>
            <input type="text" placeholder="Nome" id="nome" name="usuario[nome]" required>

            <label for="email">Email</label>
            <input type="email" placeholder="exemplo@com.com" id="email" name="usuario[email]" required>

            <label for="cpf">CPF</label>
            <input type="text" inputmode="numeric" maxlength="14" placeholder="000.000.000-00" id="cpf" name="usuario[cpf]"
                   required>

            <label for="telefone">Telefone</label>
            <input type="text" placeholder="(00) 00000-0000" maxlength="15" id="telefone" name="usuario[telefone]" required>

            <label for="senha">Senha</label>
            <input type="password" placeholder="Senha" id="senha" name="usuario[senha]" required>

            <label for="tipo">Tipo de Usuário</label>
            <select id="tipo" name="usuario[tipoUsuario]" required>
                <option value="cliente">Cliente</option>
                <option value="fabricante">Fabricante</option>
            </select>

            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
</body>
</html>
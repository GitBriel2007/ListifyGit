<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . '/../../Controllers/UsuarioController.php';

$controller = new UsuarioController();
$edicao = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["editarPerfil"])) {
    $edicao = $controller->pesquisarUsuarioID($_GET["editarPerfil"]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["usuario"])) {
    $controller->atualizarUsuario($_POST['usuario'], $_FILES['usuario']);
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

<form method="post" action="UsuarioClienteEditarPerfil.php" enctype="multipart/form-data">

    <input type="text" name="usuario[id]" id="id" value="<?= isset($edicao) ? $edicao->id : ''?>" hidden >

    <label for="fileToUpload">Imagem </label>
    <input type="file" placeholder="Selecione uma Boa Imagem" id="fileToUpload" name="usuario[fileToUpload]"
           value="<?= isset($edicao) ? $edicao->fileToUpload : '' ?>" required>

    <label for="nome">Nome</label>
    <input type="text" placeholder="Nome" id="nome" name="usuario[nome]" value="<?= isset($edicao) ? $edicao->nome : '' ?>" required>

    <label for="email">Email</label>
    <input type="email" placeholder="exemplo@com.com" id="email" name="usuario[email]" value="<?= isset($edicao) ? $edicao->email : ''  ?>"
           required>

    <label for="cpf">CPF</label>
    <input type="text" inputmode="numeric" maxlength="14" placeholder="000.000.000-00" id="cpf" name="usuario[cpf]"
           value="<?= isset($edicao) ? $edicao->cpf : ''  ?>" required>

    <label for="telefone">Telefone</label>
    <input type="text" placeholder="(00) 00000-0000" maxlength="15" id="telefone" name="usuario[telefone]"
           value="<?= isset($edicao) ? $edicao->telefone : ''  ?>" required>

    <label for="senha">Senha</label>
    <input type="password" placeholder="Senha" id="senha" name="usuario[senha]" value="<?= isset($edicao) ? $edicao->senha : ''  ?>" required>

    <label for="tipo">Tipo de Usuário</label>
    <select id="tipo-usuario" name="usuario[tipoUsuario]" required>
        <option value="cliente"  <?= isset($edicao) && $edicao->tipoUsuario === 'cliente' ? 'selected' : '' ?>>Cliente</option>
        <option value="fabricante"  <?= isset($edicao) && $edicao->tipoUsuario === 'fabricante' ? 'selected' : '' ?>>Fabricante</option>
    </select>

    <button type="submit" name="editar">Editar</button>
</form>
</body>
</html>
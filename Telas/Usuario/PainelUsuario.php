<?php

include_once '../Configs/Database.php';
include_once '../Objects/Usuario.php';
include_once '../Controllers/UsuarioController.php';

$controller = new UsuarioController();
$usuarios = $controller->indexUsuario();
global $usuarios;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['pesquisa'])) {
        $usuarios = $controller->pesquisarUsuario($_POST['pesquisa']);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    <a href="UsuarioCadastro.php">Cadastrar Usuario</a>
    <h1>Usuarios Cadastrados</h1>

        <form action="PainelUsuario.php" method="post">
            <label for="pesquisa">Pesquisa</label>
            <input type="text" name="pesquisa" id="pesquisa">
            <button type="submit">Pesquisar</button>
        </form>

        <table>
             <thead>
                <tr>
                    <th><h2>Nome</h2></th>
                    <th><h2>Email</h2></th>
                    <th><h2>Cpf</h2></th>
                    <th><h2>Telefone</h2></th>
                    <th><h2>Senha</h2></th>
                    <th><h2>Tipo</h2></th>
                </tr>
            </thead>

            <tbody>
                <?php if ($usuarios) : ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <tr>
                            <td><h3><?= $usuario->id ?></h3></td>
                            <td><h3><?= $usuario->nome ?></h3></td>
                            <td><h3><?= $usuario->email ?></h3></td>
                            <td><h3><?= $usuario->cpf ?></h3></td>
                            <td><h3><?= $usuario->telefone ?></h3></td>
                            <td><h3><?= $usuario->senha ?></h3></td>
                            <td><h3><?= $usuario->tipo ?></h3></td>
                        </tr>
                     <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
</body>
</html>
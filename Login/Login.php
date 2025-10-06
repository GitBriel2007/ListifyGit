<?php

include_once 'objects/AlunoController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["email"]) && isset($_POST["senha"])) {
        $controller = new AlunoController();
        $controller->login($_POST["email"], $_POST["senha"]);
    }
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="styleLogin.css ">
</head>
<body>
<form action="login.php" method="post">
    <h1>Login</h1>
    <p value=""></p>
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
    <label for="senha">Senha</label>
    <input type="text" name="senha" id="senha">
    <button>Logar</button>
    <a href="cadastro.php">Cadastrar</a>
</form>

</body>
</html>
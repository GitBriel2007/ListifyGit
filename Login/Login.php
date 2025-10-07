<?php

include_once __DIR__ . "/../Controllers/UsuarioController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["email"]) && isset($_POST["senha"])) {
        $controller = new UsuarioController();
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
    <link rel="stylesheet" href="">
</head>
<body>

<form action="Login.php" method="post">
    <h1>Listify</h1>
    <div class="input">
        <input type="email" placeholder="exemplo@com.com" id="email">
        <img src="../Images/Icons/User.png">
    </div>

    <a href="#API">Esqueceu sua senha?</a>
    <div>
        <input type="password" placeholder="Senha" id="senha">
        <img src="../Images/Icons/Lock.png">
    </div>

    <button>Log in</button>
    <a href="../Telas/UsuarioCliente/UsuarioClienteCadastro.php">Não tem uma conta? Resgistrar</a>
</form>

</body>
</html>
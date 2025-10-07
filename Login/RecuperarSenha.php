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
    <link rel="stylesheet" href="../Css/Main.css">
</head>
<body>
<form action="Login.php" method="post">
    <h1>Recuperar senha</h1>
    <div class="input-email">
        <input type="email" placeholder="exemplo@com.com" id="email">
        <img src="../Images/Icons/User.png">
    </div>

    <div class="input-senha">
        <input type="password" placeholder="Senha" id="senha">
        <img src="../Images/Icons/Lock.png">
    </div>

    <div class="input-senha">
        <input type="password" placeholder="Confirmar Senha" id="senha">
        <img src="../Images/Icons/Lock.png">
    </div>

    <button>Logar</button>
    <a href="../Login/Login.php">Voltar ao Login</a>
</form>

</body>
</html>
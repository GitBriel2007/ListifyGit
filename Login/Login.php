<?php

session_start();

include_once __DIR__ . "/../Controllers/UsuarioController.php";

if (isset($_SESSION['usuario'])) {
    header('Location: PainelVerFabricantes.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["email"]) && isset($_POST["senha"])) {
        $controller = new UsuarioController();
        $loginSuceso = $controller->loginUsuario($_POST["email"], $_POST["senha"]);

        if ($loginSuceso) {
            if (isset($_SESSION["redirect_after_login"])) {
                $destiny = $_SESSION["redirect_after_login"];
                unset($_SESSION["redirect_after_login"]);

                if (basename($destiny) != "Login.php") {
                    header('Location: ' . $destiny);
                    exit();
                }
            }

            header('Location: PainelVerFabricantes.php');
            exit();
        }
    }
}

if (!isset($_SESSION['usuario'])) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage != "Login.php") {
        $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
    }
    header('Location: ../../Login/Login.php');
    exit();
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

    <a href="RecuperarSenha.php">Esqueceu sua senha?</a>
    <div>
        <input type="password" placeholder="Senha" id="senha">
        <img src="../Images/Icons/Lock.png">
    </div>

    <button>Log in</button>
    <a href="../Telas/UsuarioCadastro.php">Não tem uma conta? Resgistrar</a>
</form>

</body>
</html>
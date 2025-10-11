<?php

session_start();

include_once __DIR__ . "/../Controllers/UsuarioController.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["email"]) && isset($_POST["senha"])) {
        $controller = new UsuarioController();
        $login = $controller->loginUsuario($_POST["email"], $_POST["senha"]);

        if ($login && isset($_SESSION['PainelVerFabricantes'])) {
            header("Location: ../Telas/UsuarioCliente/PainelVerFabricantes.php");
            exit();
        }

        if ($login && isset($_SESSION['PainelProdutos'])) {
            header("Location: ../Telas/UsuarioCliente/PainelVerFabricantes.php");
            exit();
        }
/*
        if ($login === "cliente") {
            header("Location: ../index.php");
            exit();
        }

        if ($login === "fabricante") {
            header("Location: ../Telas/UsuarioFabricante/HomeFabricante.php");
            exit();
        }
*/
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
        <input type="email" placeholder="exemplo@com.com" id="email" name="email" required>
        <img src="../Images/Icons/User.png">
    </div>

    <a href="RecuperarSenha.php">Esqueceu sua senha?</a>
    <div>
        <input type="password" placeholder="Senha" id="senha" name="senha" required>
        <img src="../Images/Icons/Lock.png">
    </div>

    <button>Log in</button>
    <a href="../Telas/UsuarioCadastro.php">Não tem uma conta? Resgistrar</a>
</form>

</body>
</html>
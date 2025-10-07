<?php

include_once __DIR__ . '/../../Configs/Database.php';
include_once __DIR__ . '/../../Objects/Usuario.php';
include_once __DIR__ . '/../../Controllers/UsuarioController.php';

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
    <link rel="stylesheet" href="">
    <title>Fabricantes</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
    />
</head>
<body>

<header>
    <img
            id="img-perfil-padrao"
            class="img-fluid"
            src="../../Images/Icons/PerfilPadrao.png"
    />

    <div class="menuDropdown" id="menuDropdown">
        <ul
                class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center align-items-center"
        >
            <li class="nav-item dropdown">
                <a
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                >
                    <i class="bi bi-caret-left-fill"></i>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item"
                           href="UsuarioFabricanteEditarPerfil.php">Editar
                            Perfil</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Ver Perfil</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Sua Loja</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider"/>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Sair</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div id="divLogo">
            <img
                    id="imgPrincipalListify"
                    class="img-fluid"
                    src="../../Images/Logo/imgSecundariaListify.png"
            />
        </div>

    </div>
</header>

<form action="PainelOutrosFabricantes.php" method="post" enctype="multipart/form-data">
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

<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"
></script>
</body>
</html>
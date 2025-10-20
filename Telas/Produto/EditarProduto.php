<?php

include_once __DIR__ . '/../../Controllers/ProdutoController.php';

$controller = new ProdutoController();
$edicao = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["editarProduto"])) {
    $edicao = $controller->pesquisarProdutoID($_GET["editarProduto"]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["produto"])) {
    $controller->atualizarProduto($_POST['produto'], $_FILES['produto']);
}

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Produto</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
    />
</head>
<body>


<header>
    <div class="menuDropdown" id="menuDropdown">
        <img
                id="img-perfil-padrao"
                class="img-fluid"
                src="../../Images/Icons/PerfilPadrao.png"
        />

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
                           href="UsuarioClienteEditarPerfil.php?editarPerfil=<?= $_SESSION['usuario']->id ?>">Editar
                            Perfil</a>
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
            <a href="../UsuarioFabricante/HomeFabricante.php">
                <img
                        id="imgSecundariaListify"
                        class="img-fluid"
                        src="../../Images/Logo/imgSecundariaListify.png"
                />
            </a>

        </div>

    </div>


    <form action="DetalhesProprioProduto.php" method="post" enctype="multipart/form-data">
        <label for="pesquisa">Pesquisa</label>
        <input type="text" name="pesquisa" id="pesquisa">
        <button type="submit">Pesquisar</button>
    </form>

    <aside class="categorias-painel">
        <ul>
            <li class="nav-item dropdown">
                <a
                        href="#"
                        class="btn btn-dark dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                >Categorias</a
                >

                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>

            </li>
        </ul>
    </aside>

</header>

<main>
    <h1>Atualizar Produto</h1>

    <form class="produto">
        <?php if (isset($_SESSION['produto'])) : ?>
        <input type="file" name="produto[fileToUpload]" class="img" value="<?= $_SESSION['produto']->imagem ?>">

        <img src="../../Images/Produto/">


        <section class="infos-produto">
            <input type="text" value="<?= $_SESSION['produto']->nome ?>">

            <input type="text" value="<?= $_SESSION['produto']->descricao ?>">

            <div class="ajustes">
                <input type="text" value="<?= $_SESSION['produto']->categoria ?>">
                <input type="text" value="<?= $_SESSION['produto']->qntEstoque ?>">
                <input type="text" value="<?= $_SESSION['produto']->preco ?>">
            </div>

            <?php endif; ?>

        </section>

        <div class="buttons-link">
            <a href="#">Excluir Produto</a>
            <a href="teste.php?editarProduto">Atualizar Produto</a>
        </div>
    </form>


</main>

<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"
></script>
</body>
</html>

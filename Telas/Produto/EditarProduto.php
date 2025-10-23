<?php

include_once __DIR__ . '/../../Controllers/ProdutoController.php';

$controller = new ProdutoController();
$edicao = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["editarProduto"])) {
    $edicao = $controller->pesquisarProdutoID($_GET["editarProduto"]);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["produto"])) {
    $controller->editarProduto($_POST['produto'], $_FILES['produto']);
}
var_dump($edicao);

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
    <link rel="stylesheet" href="/Css/EditarProduto.css">
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

    <form class="produto" action="EditarProduto.php" method="post">
        <input type="text" name="produto[id]" id="id" value="<?= $edicao->id ?>" hidden>

        <div class="img-produto" >
            <img id="imgAtual" src="../../Images/Produto/<?= $edicao->imagem ?>" alt="">
            <div id="div-editar">
                <img id="botaoEditar" src="/Images/Icons/Edit.png"  alt="">
            </div>
        </div>

        <input type="file" name="produto[fileToUpload]" id="imagem"
               value="<?= $edicao->imagem ?>"
               accept="image/jpg, image/png, image/jpeg, image/gif" style="display: none;">

        <section class="infos-produto">
            <input type="text" name="produto[nome]" id="nome" placeholder="Nome do Produto"
                   value="<?= $edicao->nome ?>">

            <input type="text" name="produto[descricao]" id="descricao" placeholder="Descrição do Produto"
                   value="<?= $edicao->descricao ?>">

            <div class="ajustes">
                <input type="text" name="produto[qntEstoque]" id="qntEstoque"
                       placeholder="Quantidade de Produtos Disponivel"
                       value="<?= $edicao->qntEstoque ?>">
                <input type="text" name="produto[preco]" id="preco" placeholder="R$0.00"
                       value="<?= $edicao->preco ?>">
            </div>

        </section>

        <button type="submit">Editar</button>
    </form>

</main>

<script src="/ScriptJS/ImagemNova.js"></script>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"
></script>
</body>
</html>

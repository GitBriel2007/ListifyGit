<?php

include_once '../../Controllers/ProdutoController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new ProdutoController();
    if (isset($_POST['cadastrar'])) {
        $controller->cadastrarProduto($_POST['produto'], $_FILES['produto']);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Adicionar Produtos</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/Css/AdicionarProduto.css">
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

</header>

<main>
    <h1>Adicionar Produto</h1>

    <form method="post" action="AdicionarProduto.php" enctype="multipart/form-data">
        <div>

            <label for="nome">Nome</label>
            <input type="text" placeholder="Nome do Produto" id="nome" name="produto[nome]" required>

            <label for="qntEstoque">Quantidade no Estoque</label>
            <input type="number" min="1" placeholder="Quantidade de Produtos Disponivel" id="qntEstoque"
                   name="produto[qntEstoque]" required>

            <label for="preco">Preço</label>
            <input type="text" step="0.00" min="0" inputmode="numeric" placeholder="R$0.00" id="preco"
                   name="produto[preco]" required>

            <label for="tipo">Categoria</label>
            <select id="tipo" name="produto[categoria]" required>
                <option disabled selected>Selecione uma categoria</option>
                <option value="eletroeletronicos">Eletroeletrônicos</option>
                <option value="casaDecoracao">Casa e Decoração</option>
                <option value="modaAcessorios">Moda e Acessórios</option>
                <option value="alimentosBebidas">Alimentos e Bebidas</option>
                <option value="belezaCuidadosPessoais">Beleza e Cuidados Pessoais</option>
                <option value="esporteLazer">Esporte e Lazer</option>
                <option value="brinquedosJogos">Brinquedos e Jogos</option>
                <option value="livrosPapelariaEscritorio">Livros, Papelaria e Escritório</option>
                <option value="automotivo">Automotivo</option>
                <option value="jardimFerramentas">Jardim e Ferramentas</option>
                <option value="petShop">Pet Shop</option>
                <option value="informatica">Informática</option>
                <option value="servicosAssinaturas">Serviços e Assinaturas</option>
                <option value="construcaoReforma">Construção e Reforma</option>
                <option value="viagemTurismo">Viagem e Turismo</option>
                <option value="saudeBemEstar">Saúde e Bem-Estar</option>
                <option value="bebesInfantil">Bebês e Infantil</option>
                <option value="arteHobbies">Arte e Hobbies</option>
                <option value="produtosDigitais">Produtos Digitais</option>
            </select>

        </div>

        <div>
            <label for="descricao">Descrição</label>
            <input type="text" placeholder="Descrição do Produto" id="descricao" name="produto[descricao]" required>

            <label for="fileToUpload">Imagem do seu Produto</label>
            <div class="img-produto">
                <img id="img-cadastrada" src="" alt="">
                <div>
                    <img  id="sem-imagem" src="../../Images/Icons/ImagemAdicionaProduto.png" alt="">
                </div>

            </div>

            <input type="file" placeholder="Selecione uma Boa do Produto" id="fileToUpload"
                   name="produto[fileToUpload]" style="display: none" required>

        </div>

        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
</main>

<script src="/ScriptJS/Imagens/SemImagem.js"></script>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"
></script>
</body>
</html>

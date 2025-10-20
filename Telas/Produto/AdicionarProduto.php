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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Adicionar Produtos</title>
  </head>
  <body>

  <header>


  </header>

  <h1>Adicionar Produto</h1>

  <form method="post" action="AdicionarProduto.php" enctype="multipart/form-data">
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

      <label for="descricao">Descrição</label>
      <input type="text" placeholder="Descrição do Produto" id="descricao" name="produto[descricao]" required>

      <label for="fileToUpload">Imagem do Produto</label>
      <input type="file" placeholder="Selecione uma Boa do Produto" id="fileToUpload" name="produto[fileToUpload]" required>

      <button type="submit" name="cadastrar">Cadastrar</button>
  </form>
  </body>
</html>

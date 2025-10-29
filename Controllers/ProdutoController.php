<?php

include_once __DIR__ . '/../Configs/Database.php';
include_once __DIR__ . '/../Objects/Produto.php';
include_once __DIR__ . '/../Objects/Usuario.php';

Class ProdutoController {
   private $bd;
   private $produto;
   private $usuario;
    private $imgName;

   function __construct() {
       $banco = new Database();
       $this->bd = $banco->conectar();
       $this->produto = new Produto($this->bd);
       $this->usuario = new Usuario($this->bd);
   }

   public function indexProduto() {
       return $this->produto->lerTodosProdutos();
   }

    public function pesquisarProduto($nome) {
        return $this->produto->lerProdutos($nome);
    }

    public function pesquisarProdutoID($id) {
        return $this->produto->pesquisaProduto($id);
    }

    public function cadastrarProduto($dados, $produto_imagem)
    {

        if ($this->uploadProduto($produto_imagem)) {

            $this->produto->nome = $dados["nome"];
            $this->produto->descricao = $dados["descricao"];
            $this->produto->preco = $dados["preco"];
            $this->produto->qntEstoque = $dados["qntEstoque"];
            $this->produto->categoria = $dados["categoria"];
            $this->produto->imagem = $this->imgName;
            $this->produto->idUsuario = $_SESSION["usuario"]->id;

            if ($this->produto->cadastrar()) {
                header("Location: /../Telas/Produto/DetalhesProprioProduto.php");
                exit();
            }
            return false;

        }

    }

    public function editarProduto($dados, $produto_imagem)
    {

        if ($this->uploadProduto($produto_imagem)) {

            $this->produto->id = $dados["id"];
            $this->produto->nome = $dados["nome"];
            $this->produto->descricao = $dados["descricao"];
            $this->produto->preco = $dados["preco"];
            $this->produto->qntEstoque = $dados["qntEstoque"];
            $this->produto->categoria = $dados["categoria"];
            $this->produto->imagem = $this->imgName;
            $this->produto->idUsuario = $_SESSION["usuario"]->id;

            if ($this->produto->atualizar()) {
                header("Location: ../Telas/Produto/DetalhesProprioProduto.php");
                exit();
            }
            return false;

        }

    }

    public function uploadProduto($produto_imagem)
    {
        $target_dir = __DIR__ . "/../Images/Produto/";
        $uploadOk = 1;
        $target_file = $target_dir . $produto_imagem["name"]["fileToUpload"];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $random_name = uniqid('img', true) . "." . pathinfo($produto_imagem['name']['fileToUpload'], PATHINFO_EXTENSION);
        $this->imgName = $random_name;
        $uploadFile = $target_dir . $random_name;
        $check = getimagesize($produto_imagem["tmp_name"]["fileToUpload"]);

        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;

        }

        if (!empty($produto_imagem["name"]['fileToUpload'])) {
            $this->imgName = __DIR__ . "/../Images/Produto/Icons/ImagemAdicionaProduto.png";
        }

        if (file_exists($uploadFile)) {
            $uploadOk = 0;
        }

        if ($produto_imagem["size"]['fileToUpload'] > 5000000) {
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($produto_imagem["tmp_name"]["fileToUpload"], $uploadFile)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function excluirProduto($id , $idUsuario) {
       $this->produto->id = $id;
       $this->usuario->idUsuario = $idUsuario;

       if ($this->produto->excluir($id)) {
            header("Location: index.php");
            exit();
       }

    }

}
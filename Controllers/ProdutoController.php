<?php

include_once '../Configs/Database.php';
include_once '../Objects/Produto.php';

Class ProdutoController {
   private $bd;
   private $produto;

   function __construct() {
       $banco = new Database();
       $this->bd = $banco->conectar();
       $this->produto = new Produto($this->bd);
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

    public function cadastrarProduto($dados) {
        $this->produto->id = $dados["id"];
        $this->produto->nome = $dados["nome"];
        $this->produto->descricao = $dados["descricao"];
        $this->produto->preco = $dados["preco"];
        $this->produto->qntEstoque = $dados["qntEstoque"];
        $this->produto->categoria = $dados["categoria"];
        $this->produto->imagem = $dados["imagem"];
        $this->produto->idUsuario = $dados["idUsuario"];

        if ($this->produto->cadastrar()) {
            header("Location: index.php");
            exit();
        }
        return false;
    }

    public function atualizarProduto($dados) {
        $this->produto->id = $dados["id"];
        $this->produto->nome = $dados["nome"];
        $this->produto->descricao = $dados["descricao"];
        $this->produto->preco = $dados["preco"];
        $this->produto->qntEstoque = $dados["qntEstoque"];
        $this->produto->categoria = $dados["categoria"];
        $this->produto->imagem = $dados["imagem"];
        $this->produto->idUsuario = $dados["idUsuario"];

        if ($this->produto->atualizar()) {
            header("Location: index.php");
            exit();
        }
        return false;
    }

    public function excluirProduto($id , $idUsuario) {
       $this->produto->id = $id;
       $this->produto->idUsuario = $idUsuario;

       if ($this->produto->excluir($id, $idUsuario)) {
            header("Location: index.php");
            exit();
       }

    }
}
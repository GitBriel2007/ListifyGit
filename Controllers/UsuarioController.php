<?php

include_once '../Configs/Database.php';
include_once '../Objects/Usuario.php';

Class UsuarioController {
   private $bd;
   private $usuario;

   function __construct() {
       $banco = new Database();
       $this->bd = $banco->conectar();
       $this->usuario = new Usuario($this->bd);
   }

   public function indexUsuario() {
       return $this->usuario->lerTodosUsuarios();
   }

    public function pesquisarUsuario($nome) {
        return $this->usuario->lerUsuario($nome);
    }

    public function pesquisarUsuarioID($id) {
        return $this->usuario->pesquisaUsuario($id);
    }

    public function cadastrarUsuario($dados) {
        $this->usuario->senha = $dados["senha"];
        $this->usuario->cpf = $dados["cpf"];
        $this->usuario->nome = $dados["nome"];
        $this->usuario->email = $dados["email"];
        $this->usuario->telefone = $dados["telefone"];
        $this->usuario->imagem = $dados["imagem"];
        $this->usuario->tipoUsuario = $dados["tipoUsuario"];

        if ($this->usuario->cadastrar()) {
            header("Location: index.php");
            exit();
        }

        return false;
    }

    public function atualizarUsuario($dados) {
        $this->usuario->id = $dados["id"];
        $this->usuario->senha = $dados["senha"];
        $this->usuario->cpf = $dados["cpf"];
        $this->usuario->nome = $dados["nome"];
        $this->usuario->email = $dados["email"];
        $this->usuario->telefone = $dados["telefone"];
        $this->usuario->imagem = $dados["imagem"];
        $this->usuario->tipoUsuario = $dados["tipoUsuario"];

        if ($this->usuario->atualizar()) {
            header("Location: index.php");
            exit();
        }

        return false;
    }

    public function excluirUsuario($id) {
       $this->usuario->id = $id;

       if ($this->usuario->excluir()) {
            header("Location: index.php");
            exit();
       }

    }
}
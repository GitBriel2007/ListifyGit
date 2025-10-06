<?php

include_once __DIR__ . '/../Configs/Database.php';
include_once __DIR__ . '/../Objects/Usuario.php';

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

    public function cadastrarUsuario($dados, $usuario_imagem)
    {

        if ($this->uploadUsuario($usuario_imagem)) {
            $this->usuario->senha = $dados["senha"];
            $this->usuario->cpf = $dados["cpf"];
            $this->usuario->nome = $dados["nome"];
            $this->usuario->email = $dados["email"];
            $this->usuario->telefone = $dados["telefone"];
            $this->usuario->tipoUsuario = $dados["tipoUsuario"];

            if ($this->usuario->cadastrar()) {
                header("Location: index.php");
                exit();
            }

            return false;
        }
    }

    public function atualizarUsuario($dados, $usuario_imagem)
    {

        if ($this->uploadUsuario($usuario_imagem)) {
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
    }

    public function excluirUsuario($id) {
       $this->usuario->id = $id;

       if ($this->usuario->excluir()) {
            header("Location: index.php");
            exit();
       }

    }

    public function uploadUsuario($usuario_imagem)
    {
        $target_dir = __DIR__ . "/../Images/Usuario/";
        $uploadOk = 1;
        $target_file = $target_dir . $usuario_imagem["name"]["fileToUpload"];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $random_name = uniqid('img', true) . "." . pathinfo($usuario_imagem['name']['fileToUpload'], PATHINFO_EXTENSION);
        $this->imgName = $random_name;
        $uploadFile = $target_dir . $random_name;
        $check = getimagesize($usuario_imagem["tmp_name"]["fileToUpload"]);

        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;

        }

        if (file_exists($uploadFile)) {
            $uploadOk = 0;
        }

        if ($usuario_imagem["size"]['fileToUpload'] > 5000000) {
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            return false;
        } else {
            if (move_uploaded_file($usuario_imagem["tmp_name"]["fileToUpload"], $uploadFile)) {
                return true;
            } else {
                return false;
            }
        }
    }
}
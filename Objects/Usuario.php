<?php

Class Usuario {

    public $id;
    public $senha;
    public $cpf;
    public $nome;
    public $email;
    public $telefone;
    public $imagem;
    public $tipo;

    public function __construct($bd) {
        $this->bd = $bd;
    }

    public function lerTodosUsuarios() {
        $sql = "SELECT * FROM usuario ORDER BY nome ASC";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function lerUsuario($nome) {
        $nome = "%" . $nome ."%";
        $sql = "SELECT * FROM usuario WHERE nome LIKE :nome ORDER BY nome ASC";
        $resultado = $this->bd->query($sql);
        $resultado ->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisaUsuario($id) {
        $sql = "SELECT * FROM usuario WHERE id LIKE :id ORDER BY id ASC";
        $resultado = $this->bd->query($sql);
        $resultado ->bindParam(':id', $id, PDO::PARAM_STR);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function cadastrar() {
        $sql = "INSERT  INTO usuario(senha, cpf, nome, email, telefone, imagem, tipo) VALUES(:senha, :cpf, :nome, :email, :telefone, :imagem, :tipo)";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $this->tipo, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizar() {
        $sql = "UPDATE usuarios SET senha = :senha, cpf = :cpf, nome = :nome, email - :email, telefone = :telefone, imagem = :imagem, tipo = :tipo WHERE id = :id";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $this->tipo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir() {
        $sql =  "DELELE FROM usuario WHERE id = :id";   
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>
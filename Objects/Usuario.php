<?php

class Usuario
{

    public $id;
    public $senha;
    public $cpf;
    public $nome;
    public $email;
    public $telefone;
    public $imagem;
    public $tipoUsuario;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function lerTodosUsuarios()
    {
        $sql = "SELECT * FROM READ_ALL_USUARIOS";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function lerUsuario($nome)
    {
        $nome = "%" . $nome . "%";
        $sql = "SELECT * FROM READ_USUARIO";
        $resultado = $this->bd->query($sql);
        $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisaUsuario($id)
    {
        $sql = "SELECT * FROM SEARCH_USUARIO";
        $resultado = $this->bd->query($sql);
        $resultado->bindParam(':id', $id, PDO::PARAM_STR);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function cadastrar()
    {
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "CALL create_Usuario ( :senha , :cpf , :nome ,  :email , :telefone,  :imagem ,  :tipoUsuario )";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':senha', $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':tipoUsuario', $this->tipoUsuario, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizar()
    {
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $sql = "CALL update_Usuario ( :id , :senha , :cpf , :nome ,  :email , :telefone,  :imagem ,  :tipoUsuario )";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':senha', $senha_hash, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $this->cpf, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':tipoUsuario', $this->tipoUsuario, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir()
    {
        $sql = "CALL delete_Usuario( :id )";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        $sql = "SELECT * FROM  usuario  WHERE email = :email";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if ($result) {
            if (password_verify($this->senha, $result->senha)) {
                $_SESSION['usuario'] = $result;
                return true;
            }
        }
        return false;
    }

}

?>
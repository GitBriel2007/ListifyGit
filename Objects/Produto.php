<?php

class Produto
{
    public $id;
    public $nome;
    public $descricao;
    public $preco;
    public $qntEstoque;
    public $categoria;
    public $imagem;
    public $idUsuario;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function lerTodosProdutos()
    {
        $sql = "SELECT * FROM produto";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function lerProdutos($nome)
    {
        $nome = "%" . $nome . "%";
        $sql = "SELECT * FROM produto WHERE nome LIKE :nome";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisaProduto($id)
    {
        $sql = "SELECT * FROM produto WHERE id LIKE :id";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':id', $id, PDO::PARAM_STR);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function cadastrar()
    {
        $sql = "INSERT INTO produto (nome, descricao, preco, qntEstoque, categoria, imagem, idUsuario)  VALUES(:nome, :descricao, :preco, :qntEstoque, :categoria, :imagem, :idUsuario)";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $this->preco, PDO::PARAM_STR);
        $stmt->bindParam(':qntEstoque', $this->qntEstoque, PDO::PARAM_INT);
        $stmt->bindParam(':categoria', $this->categoria, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizar()
    {
        $sql = "UPDATE produto SET nome = :nome, descricao = :descricao, preco = :preco, qntEstoque = :qtdEstoque, categoria = :categoria, imagem =  :imagem WHERE idUsuario = :idUsuario and id = :id)";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $this->preco, PDO::PARAM_STR);
        $stmt->bindParam(':qntEstoque', $this->qntEstoque, PDO::PARAM_INT);
        $stmt->bindParam(':categoria', $this->categoria, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM produto WHERE id = :id";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}

?>
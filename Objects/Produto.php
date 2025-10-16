<?php

session_start();

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
        $sql = "SELECT * FROM ler_Todos_Produtos";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function lerProdutos($nome)
    {
        $nome = "%" . $nome . "%";
        $sql = "SELECT * FROM ler_Produtos";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':nome', $nome, PDO::PARAM_STR);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function pesquisaProduto($id)
    {
        $sql = "SELECT * FROM pesquisar_Produto";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(':id', $id, PDO::PARAM_STR);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function cadastrar()
    {

        $this->idUsuario = $_SESSION['usuario']->id;

        $sql = "CALL create_Produto ( :nome , :descricao, :preco , :qntEstoque  , :categoria,  :imagem, :idUsuario)";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $this->preco, PDO::PARAM_STR);
        $stmt->bindParam(':qntEstoque', $this->qntEstoque, PDO::PARAM_INT);
        $stmt->bindParam(':categoria', $this->categoria, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizar()
    {
        $this->idUsuario = $_SESSION['usuario']->id;

        $sql = "CALL update_Produto ( :id, :nome , :descricao, :preco , :qntEstoque  , :categoria,  :imagem, :idUsuario)";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $this->preco, PDO::PARAM_STR);
        $stmt->bindParam(':qntEstoque', $this->qntEstoque, PDO::PARAM_INT);
        $stmt->bindParam(':categoria', $this->categoria, PDO::PARAM_STR);
        $stmt->bindParam(':imagem', $this->imagem, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $this->idUsuario, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function excluir($id , $idUsuario)
    {
        $this->idUsuario = $_SESSION['usuario']->id;

        $sql = "CALL delete_Produto( :id , :idUsuario )";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        return $stmt->execute();
    }

}

?>
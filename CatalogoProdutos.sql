CREATE DATABASE catalogoProdutos;

USE catalogoProdutos;

CREATE TABLE usuario (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(20) NOT NULL UNIQUE,
    nome VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
	imagem VARCHAR(255) NOT NULL,
    tipoUsuario VARCHAR(20) NOT NULL
);

CREATE TABLE produto (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nome VARCHAR(30) NOT NULL,
	descricao VARCHAR(255) NOT NULL,
	preco DECIMAL(10,2) NOT NULL,
	qntEstoque INT NOT NULL DEFAULT 0,
	categoria VARCHAR(30) NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    idUsuario INT NOT NULL,
    CONSTRAINT fk_idUsuario FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);

INSERT INTO usuario (id, senha, cpf, nome, email, telefone, imagem, tipoUsuario) VALUES
(1, 'senha123', '111.111.111-11', 'João Silva', 'joao@email.com', 11999999999, 'joao.jpg', 'fabricante'),
(2, 'senha456', '222.222.222-22', 'Maria Souza', 'maria@email.com', 21988888888, 'maria.png', 'cliente'),
(3, 'senha789', '333.333.333-33', 'Carlos Pereira', 'carlos@email.com', 31977777777, 'carlos.png', 'fabricante'),
(4, 'senha321', '444.444.444-44', 'Ana Costa', 'ana@email.com', 41966666666, 'ana.jpg', 'cliente'),
(5, 'senha654', '555.555.555-55', 'Lucas Oliveira', 'lucas@email.com', 51955555555, 'lucas.jpg', 'fabricante'),
(6, '123456',  '123.456.789-00', 'João Silva', 'joao@email.com', 11987654321, 'joao.jpg', 'fabricante'),
(7, 'abcdef',  '987.654.321-00', 'Maria Souza', 'maria@email.com', 21987654321, 'maria.png', 'cliente');

INSERT INTO produto (id, nome, descricao, preco, qntEstoque, categoria, imagem, idUsuario) VALUES
(1, 'Fone Esportivo', 'Fone Bluetooth resistente à água e bateria de 12h.', 199.90, 50, 'Eletrônicos', 'fone.jpg', 1),
(2, 'Notebook Gamer', 'Notebook com RTX 3060, 16GB RAM e SSD 512GB.', 5999.99, 10, 'Informática', 'notebook.jpg', 1),
(3, 'Camiseta Dry Fit', 'Camiseta esportiva leve e respirável.', 79.90, 100, 'Roupas', 'camiseta.jpg', 2),
(4, 'Smartwatch Fit', 'Relógio inteligente com monitoramento cardíaco e GPS.', 899.99, 30, 'Eletrônicos', 'smartwatch.jpg', 3),
(5, 'Tênis Running', 'Tênis confortável para corrida e academia.', 299.90, 80, 'Calçados', 'tenis.jpg', 3),
(6, 'Bolsa Feminina', 'Bolsa de couro sintético com alça ajustável.', 159.90, 40, 'Acessórios', 'bolsa.jpg', 4),
(7, 'Cadeira Gamer', 'Cadeira ergonômica reclinável com apoio para pés.', 1299.99, 15, 'Móveis', 'cadeira.jpg', 1),
(8, 'Monitor Ultrawide', 'Monitor de 34 polegadas curvo, resolução 3440x1440.', 2499.90, 12, 'Informática', 'monitor.jpg', 5),
(9, 'Mochila Executiva', 'Mochila resistente à água com compartimento para notebook.', 249.99, 60, 'Acessórios', 'mochila.jpg', 5),
(10, 'Jaqueta Corta Vento', 'Jaqueta leve e impermeável para esportes ao ar livre.', 199.90, 35, 'Roupas', 'jaqueta.jpg', 2);

DELIMITER $$
CREATE PROCEDURE update_Produto (_id INT, _nome VARCHAR(30) , _descricao VARCHAR(255) , _preco DECIMAL(10,2) , _qntEstoque INT , _categoria VARCHAR(30), _imagem VARCHAR(255), _idUsuario INT) 
BEGIN
	UPDATE produto 
		SET nome = nome, descricao = descricao, preco = preco, qntEstoque = qntEstoque, categoria = categoria, imagem =  imagem 
    WHERE id = _id  and  idUsuario = _idUsuario;
END $$
DELIMITER ;




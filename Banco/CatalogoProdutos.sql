CREATE DATABASE catalogoProdutos;

USE catalogoProdutos;

CREATE TABLE usuario (
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(20) NOT NULL UNIQUE,
    nome VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    telefone VARCHAR(15) NOT NULL,
	imagem VARCHAR(255),
    tipoUsuario VARCHAR(20) NOT NULL
);
select * from usuario;
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

INSERT INTO usuario (senha, cpf, nome, email, telefone, imagem, tipoUsuario) VALUES
('senha123', '111.111.111-11', 'João Silva', 'joao@email.com', '11999999999', 'joao.jpg', 'fabricante'),
('senha456', '222.222.222-22', 'Maria Souza', 'maria@email.com', '21988888888', 'maria.png', 'cliente'),
('senha789', '333.333.333-33', 'Carlos Pereira', 'carlos@email.com', '31977777777', 'carlos.png', 'fabricante'),
('senha321', '444.444.444-44', 'Ana Costa', 'ana@email.com', '41966666666', 'ana.jpg', 'cliente'),
('senha654', '555.555.555-55', 'Lucas Oliveira', 'lucas@email.com', '51955555555', 'lucas.jpg', 'fabricante');

INSERT INTO produto (nome, descricao, preco, qntEstoque, categoria, imagem, idUsuario) VALUES
('Fone Esportivo', 'Fone Bluetooth resistente à água e bateria de 12h.', 199.90, 50, 'Eletrônicos', 'fone.jpg', 1),
('Notebook Gamer', 'Notebook com RTX 3060, 16GB RAM e SSD 512GB.', 5999.99, 10, 'Informática', 'notebook.jpg', 1),
('Camiseta Dry Fit', 'Camiseta esportiva leve e respirável.', 79.90, 100, 'Roupas', 'camiseta.jpg', 2),
('Smartwatch Fit', 'Relógio inteligente com monitoramento cardíaco e GPS.', 899.99, 30, 'Eletrônicos', 'smartwatch.jpg', 3),
('Tênis Running', 'Tênis confortável para corrida e academia.', 299.90, 80, 'Calçados', 'tenis.jpg', 3),
('Bolsa Feminina', 'Bolsa de couro sintético com alça ajustável.', 159.90, 40, 'Acessórios', 'bolsa.jpg', 4),
('Cadeira Gamer', 'Cadeira ergonômica reclinável com apoio para pés.', 1299.99, 15, 'Móveis', 'cadeira.jpg', 1),
('Monitor Ultrawide', 'Monitor de 34 polegadas curvo, resolução 3440x1440.', 2499.90, 12, 'Informática', 'monitor.jpg', 5),
('Mochila Executiva', 'Mochila resistente à água com compartimento para notebook.', 249.99, 60, 'Acessórios', 'mochila.jpg', 5),
('Jaqueta Corta Vento', 'Jaqueta leve e impermeável para esportes ao ar livre.', 199.90, 35, 'Roupas', 'jaqueta.jpg', 2);

-- Procedure UsuarioCliente

DELIMITER $$
CREATE PROCEDURE create_Usuario (_senha VARCHAR(255), _cpf VARCHAR(20), _nome VARCHAR(30), _email VARCHAR(30) , _telefone VARCHAR(15), _imagem VARCHAR(255),  _tipoUsuario VARCHAR(20))
BEGIN
    INSERT  INTO usuario( senha, cpf, nome, email, telefone, imagem, tipoUsuario) 
	VALUES( _senha, _cpf, _nome, _email, _telefone, _imagem, _tipoUsuario);
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE update_Usuario (_id INT,_senha VARCHAR(255), _cpf VARCHAR(20), _nome VARCHAR(30), _email VARCHAR(30) , _telefone VARCHAR(15), _imagem VARCHAR(255),  _tipoUsuario VARCHAR(20))
BEGIN
   UPDATE usuario SET senha = _senha, cpf = _cpf, nome = _nome, email = _email, telefone = _telefone, imagem = _imagem, tipoUsuario = _tipoUsuario
   WHERE id = _id;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE delete_Usuario( _id INT)
BEGIN
	DELETE FROM Usuario	WHERE id = _id;
END $$
DELIMITER ;

-- View UsuarioCliente

CREATE VIEW READ_ALL_USUARIOS AS
SELECT * FROM usuario ORDER BY nome ASC;

CREATE VIEW READ_USUARIO AS
SELECT * FROM usuario WHERE nome LIKE nome ORDER BY nome ASC;

CREATE VIEW SEARCH_USUARIO AS
SELECT * FROM usuario ORDER BY id ASC;

-- Procedure Produto

DELIMITER $$
CREATE PROCEDURE create_Produto (_nome VARCHAR(30) , _descricao VARCHAR(255) , _preco DECIMAL(10,2) , _qntEstoque INT , _categoria VARCHAR(30), _imagem VARCHAR(255), _idUsuario INT) 
BEGIN
	INSERT INTO produto ( nome, descricao, preco, qntEstoque, categoria, imagem, idUsuario)
	VALUES ( _nome , _descricao , _preco , _qntEstoque , _categoria , _imagem , _idUsuario );
    
    SELECT * FROM produto WHERE id = LAST_INSERT_ID();
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE update_Produto (_id INT, _nome VARCHAR(30) , _descricao VARCHAR(255) , _preco DECIMAL(10,2) , _qntEstoque INT , _categoria VARCHAR(30), _imagem VARCHAR(255), _idUsuario INT) 
BEGIN
	UPDATE produto 
		SET nome = _nome, descricao = _descricao, preco = _preco, qntEstoque = _qntEstoque, categoria = _categoria, imagem =  _imagem 
    WHERE id = _id  and  idUsuario = _idUsuario;
END $$
DELIMITER ;

DELIMITER $$
CREATE PROCEDURE delete_Produto( _id INT, _idUsuario INT)
BEGIN
	DELETE FROM produto 	
		WHERE id = _id AND idUsuario = _idUsuario;
END $$
DELIMITER ;

-- View Produto

CREATE VIEW ler_Todos_Produtos AS
SELECT * FROM produto;

CREATE VIEW ler_Produtos As
SELECT * FROM produto WHERE nome LIKE nome;	

CREATE VIEW  pesquisar_Produto AS
SELECT * FROM produto WHERE id LIKE id;
/* Base de Dados da Pizzaria Baue */
create database pizza;
use pizza;

CREATE TABLE usuario(
    id_usuario int primary key auto_increment,
    nome VARCHAR(60) not null,
    email VARCHAR(100) not null,
    cpf VARCHAR(15) not null,
    senha VARCHAR(100) not null,
    funcionario VARCHAR(3)
);

CREATE TABLE endereco(
    id_endereco INT primary key auto_increment,
    cep VARCHAR(10),
    bairro VARCHAR(100) not null,
    logradouro VARCHAR(100) not null,
    numero VARCHAR(10) not null,
    referencia VARCHAR(100),
    id_usuario_fk INT,
    FOREIGN KEY (id_usuario_fk) REFERENCES usuario (id_usuario)
);

CREATE TABLE telefone(
    id_telefone int primary key auto_increment,
    numero varchar(15),
    tipo varchar(15),
    identificacao varchar(20),
    id_usuario_fk INT,
    FOREIGN KEY (id_usuario_fk) REFERENCES usuario (id_usuario)
);

CREATE TABLE pedido(
    id_pedido INT PRIMARY KEY auto_increment,
    num_pedido VARCHAR(15) not null,
    data_ped VARCHAR (15) not null,
    descricao VARCHAR(100),
    situacao VARCHAR(10),
    id_usuario_fk INT,
    FOREIGN KEY (id_usuario_fk) REFERENCES usuario(id_usuario)
);

CREATE TABLE imagem(
    id_imagem INT PRIMARY KEY auto_increment,
    nome VARCHAR(100),
    id_usuario_fk INT,
    FOREIGN KEY (id_usuario_fk) REFERENCES usuario(id_usuario)
);

CREATE TABLE cardapio(
    crdcodigo int PRIMARY KEY AUTO_INCREMENT,
    crdnome varchar(100) NOT NULL,
    crddescricao varchar(150) NOT NULL,
    crdpreco float(5.2) NOT NULL,
    crdimagem varchar(100)
);


insert into usuario (nome, email, cpf, senha, funcionario) values("Administrador", "admin@admin.com", "999.999.999-99", MD5("123456"), "Sim");

CREATE TABLE categoria(
    ctgcodigo int PRIMARY KEY AUTO_INCREMENT,
    ctgnome varchar(50)
);

CREATE TABLE ingrediente(
    igdcodigo int PRIMARY KEY AUTO_INCREMENT,
    igdnome varchar(70),
    igdvalor float(5.2),
    igdimagem varchar(100),
    igdcategoria int,
    FOREIGN KEY (igdcategoria) REFERENCES categoria(ctgcodigo)
);

INSERT INTO categoria(ctgnome) VALUES("Massas"), ("Molhos"), ("Queijos"), ("Carnes"), ("Complementos"), ("Finalizações");
INSERT INTO `ingrediente` (`igdcodigo`, `igdnome`, `igdvalor`, `igdimagem`, `igdcategoria`) VALUES (NULL, 'Massa Pan', '2.99', 'pan2.png', '1');
INSERT INTO ingrediente(igdnome, igdvalor, igdimagem, igdcategoria) VALUES("Bacon", 10.50, "bacon.png", 4), ("Atum", 2.50, "atum.png", 4), ("Calabresa", 5.99, "calabresa.png", 4);
INSERT INTO `ingrediente` (`igdcodigo`, `igdnome`, `igdvalor`, `igdimagem`, `igdcategoria`) VALUES (NULL, 'Massa Tradicional', '2.99', 'tradicional.png', '1'), (NULL, 'Molho de Tomate', '2.99', 'tomate.png', '2'), (NULL, 'Presunto', '2.99', 'presunto.png', '3'), (NULL, 'Azeitona Preta', '2.99', 'azeitona-preta.png', '5'), (NULL, 'Manjericão', '2.99', 'manjericao.png', '6');
INSERT INTO `ingrediente` (`igdcodigo`, `igdnome`, `igdvalor`, `igdimagem`, `igdcategoria`) VALUES (NULL, 'Tomate e Pimenta', '3.50', 'tomate-e-pimenta.png', '2'), (NULL, 'Molho Pesto', '2.50', 'pesto.png', '2');
INSERT INTO `ingrediente` (`igdcodigo`, `igdnome`, `igdvalor`, `igdimagem`, `igdcategoria`) VALUES (NULL, 'Massa Integral', '4.99', 'integral.png', '1');
INSERT INTO `ingrediente` (`igdcodigo`, `igdnome`, `igdvalor`, `igdimagem`, `igdcategoria`) VALUES (NULL, 'Queijo Parmesão', '2.99', 'parmesao.png', '3'), (NULL, 'Mussarela', '1.99', 'mussarela.png', '3'), (NULL, 'Catupiry', '3.99', 'catypiry.png', '3'), (NULL, 'Gorgonzola', '3.50', 'gorgonzola.png', '3');
INSERT INTO `ingrediente` (`igdcodigo`, `igdnome`, `igdvalor`, `igdimagem`, `igdcategoria`) VALUES (NULL, 'Lombo', '4.00', 'lombo.png', '4'), (NULL, 'Pepperoni', '5.50', 'pepperoni.png', '4'), (NULL, 'Frango', '6.99', 'frango.png', '4');
INSERT INTO `ingrediente` (`igdcodigo`, `igdnome`, `igdvalor`, `igdimagem`, `igdcategoria`) VALUES (NULL, 'Tomate em Cubos', '2.99', 'tomate-em-cubos.png', '5'), (NULL, 'Tomate Cereja', '2.50', 'tomate-cereja.png', '5'), (NULL, 'Milho', '2.99', 'milho.png', '5'), (NULL, 'Ovos', '1.50', 'ovo.png', '5');
INSERT INTO `ingrediente` (`igdcodigo`, `igdnome`, `igdvalor`, `igdimagem`, `igdcategoria`) VALUES (NULL, 'Champignon', '4.99', 'champingnon.png', '5'), (NULL, 'Pimentão', '2.99', 'pimentao.png', '5'), (NULL, 'Abacaxi', '3.99', 'abacaxi.png', '5'),(NULL, 'Palmito', '3.99', 'palmito.png', '5');
INSERT INTO `ingrediente` (`igdcodigo`, `igdnome`, `igdvalor`, `igdimagem`, `igdcategoria`) VALUES (NULL, 'Orégano', '1.50', 'oregano.png', '6'), (NULL, 'Pimenta Calabresa', '2.50', 'pimenta-calabresa.png', '6'), (NULL, 'Azeite de Oliva', '1.10', 'azeite-de-oliva.png', '6'), (NULL, 'Alho Torrado', '1.50', 'alho-torrado.png', '6'), (NULL, 'Rúcula', '2.80', 'rucula.png', '6'), (NULL, 'Escarola', '2.50', 'escarola.png', '6'), (NULL, 'Tomate Seco', '1.10', 'tomate-seco.png', '6');



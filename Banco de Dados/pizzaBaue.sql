/* Base de Dados da Pizzaria Baue */
create database pizza;
use pizza;

CREATE TABLE usuario(
    id_usuario int primary key auto_increment,
    nome VARCHAR(60) not null,
    email VARCHAR(100) not null,
    cpf VARCHAR(15) not null,
    senha VARCHAR(100) not null,
    funcionario BOOLEAN
);

CREATE TABLE endereco(
    id_endereco INT primary key auto_increment,
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


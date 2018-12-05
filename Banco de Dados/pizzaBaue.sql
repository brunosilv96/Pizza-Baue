/* Base de Dados da Pizzaria Baue */
create database pizza;
use pizza;

CREATE TABLE usuario(
    id_usuario int primary key auto_increment,
    nome VARCHAR(60) not null,
    email VARCHAR(100) not null unique,
    cpf VARCHAR(15) not null,
    senha VARCHAR(100) not null
);

CREATE TABLE endereco(
    id_endereco INT primary key auto_increment,
    logradouro VARCHAR(100) not null,
    numero VARCHAR(10) not null,
    cidade VARCHAR(30),
    uf CHAR(2),
    complemento VARCHAR(100),
    id_usuario_fk INT,
    FOREIGN KEY (id_usuario_fk) REFERENCES usuario (id_usuario)
);

CREATE TABLE pedido(
    id_pedido INT PRIMARY KEY auto_increment,
    num_pedido VARCHAR(15) not null unique,
    data_ped DATE not null,
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



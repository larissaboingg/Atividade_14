CREATE DATABASE industria_alimenticia;

USE industria_alimenticia;

CREATE TABLE usuarios (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE
);

CREATE TABLE tarefas (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario_id INT,
    descricao VARCHAR(200) NOT NULL,
    setor VARCHAR(100) NOT NULL,
    prioridade enum ("Baixa","Média","Alta"),
    status_tarefa enum("a fazer","fazendo","pronto") DEFAULT "a fazer",
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE DATABASE IF NOT EXISTS crud_estoque;
use crud_estoque;

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nome varchar(100) NOT NULL,
    categoria varchar(100) NOT NULL,
    preco decimal (10,2) NOT NULL,
    quantiaEstoque int  NOT NULL,
    dataValidade date NOT NULL
)
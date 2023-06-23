$sql_tb_usuario = "CREATE TABLE tb_usuario (
id_usuario int NOT NULL AUTO_INCREMENT,
nome varchar(255) NOT NULL,
email varchar(255),
senha varchar(255),
data_nascimento date,
admin int,
PRIMARY KEY (id_usuario)
);";





// Consulta SQL para criar a tablea "tb_produto"
$sql_tb_produto = "CREATE TABLE tb_produto (
id_produto int NOT NULL AUTO_INCREMENT,
nome varchar(255) NOT NULL,
descricao varchar(255),
preco float,
quantidade int,
PRIMARY KEY (id_produto)
);";





// Consulta SQL para criar a tablea "tb_categoria"
$sql_tb_categoria = "CREATE TABLE tb_categoria (
id_categoria int NOT NULL AUTO_INCREMENT,
nome varchar(255) NOT NULL,
PRIMARY KEY (id_categoria)
);";





// Consulta SQL para criar a tabela "tb_compra"
$sql_tb_compra = "CREATE TABLE tb_compra (
id_compra int NOT NULL AUTO_INCREMENT,
id_usuario int NOT NULL,
valor float,
data_compra date,
PRIMARY KEY (id_compra),
FOREIGN KEY (id_usuario) REFERENCES tb_usuario(id_usuario)
)";





// Consulta SQL para criar a tabela "tb_compra_produto"
$sql_tb_compra_produto = "CREATE TABLE tb_compra_produto (
id_compra integer,
id_produto integer,
quantidade float,
FOREIGN KEY (id_compra) REFERENCES tb_compra(id_compra),
FOREIGN KEY (id_produto) REFERENCES tb_produto(id_produto)
)";
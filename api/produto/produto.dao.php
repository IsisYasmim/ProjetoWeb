<?php
class ProdutoDAO
{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function getAll(){
        $sql = "SELECT * From tb_produto";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $produtos;
    }


    // Insert um produto no banco de dados
    public function insert($produto){
        $stmt = $this->pdo->prepare("INSERT INTO tb_produto (nome, descricao, preco, quantidade) VALUES (:nome, :descricao, :preco, :quantidade)");

        $stmt->bindValue("nome", $produto->nome);
        $stmt->bindValue("descricao", $produto->descricao);
        $stmt->bindValue("preco", $produto->preco);
        $stmt->bindValue("quantidade", $produto->quantidade);

        $stmt->execute();
        $produto = clone $produto;
        $produto->id_produto = $this->pdo->lastInsertId();
        return $produto;
    }

    public function delete($id_produto){
        $stmt = $this->pdo->prepare("DELETE FROM tb_produto WHERE id_produto = :id_produto");

        $stmt->bindValue("id_produto", $id_produto);

        $stmt->execute();

        // Retorna a quantidade de linhas afetadas
        return $stmt-> rowCount();
        
    }

    public function update($id_produto, $produto){

        $stmt = $this->pdo->prepare("UPDATE tb_produto SET 
        nome = :nome, 
        descricao = :descricao,
        preco = :preco, 
        quantidade = :quantidade
        WHERE id_produto = :id_produto");

        $data = [
            "id_produto" => $id_produto,
            "nome" =>  $produto->nome,
            "descricao" =>  $produto->descricao,
            "preco" =>  $produto->preco,
            "quantidade" =>  $produto->quantidade
        ];

        return $stmt->execute($data);
    }
}

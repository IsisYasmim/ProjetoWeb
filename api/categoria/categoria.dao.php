<?php
class CategoriaDAO
{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function getAll(){
        $sql = "SELECT * From tb_categoria";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categorias;
    }


    // Insert uma pessoa no banco de dados
    public function insert($categoria){
        $stmt = $this->pdo->prepare("INSERT INTO tb_categoria (nome) VALUES (:nome)");

        $stmt->bindValue("nome", $categoria->nome);

        $stmt->execute();
        $categoria = clone $categoria;
        $categoria->id_categoria = $this->pdo->lastInsertId();
        return $categoria;
    }
    

    public function delete($id_categoria){
        $stmt = $this->pdo->prepare("DELETE FROM tb_categoria WHERE id_categoria = :id_categoria");

        $stmt->bindValue("id_categoria", $id_categoria);

        $stmt->execute();

        // Retorna a quantidade de linhas afetadas
        return $stmt-> rowCount();
        
    }

    public function update($id_categoria, $categoria){

        $stmt = $this->pdo->prepare("UPDATE tb_categoria SET 
        nome = :nome, 
        WHERE id_categoria = :id_categoria");

        $data = [
            "id_categoria" => $id_categoria,
            "nome" =>  $categoria->nome,
        ];

        return $stmt->execute($data);
    }
}

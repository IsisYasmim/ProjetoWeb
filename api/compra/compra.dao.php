<?php
class CompraDAO
{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function getAll(){
        $sql = "SELECT * From tb_compra";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $compras = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $compras;
    }


    // Insert uma pessoa no banco de dados
    public function insert($compra){
        $stmt = $this->pdo->prepare("INSERT INTO tb_compra (id_usuario, valor, data_compra) VALUES (:id_usuario, :valor, :data_compra)");

        $stmt->bindValue("id_usuario", $compra->id_usuario);
        $stmt->bindValue("valor", $compra->valor);
        $stmt->bindValue("data_compra", $compra->data_compra);

        $stmt->execute();
        $compra = clone $compra;
        $compra->id_compra = $this->pdo->lastInsertId();
        return $compra;
    }

    public function delete($id_compra){
        $stmt = $this->pdo->prepare("DELETE FROM tb_compra WHERE id_compra = :id_compra");

        $stmt->bindValue("id_compra", $id_compra);

        $stmt->execute();

        // Retorna a quantidade de linhas afetadas
        return $stmt-> rowCount();
        
    }

    public function update($id_compra, $compra){

        $stmt = $this->pdo->prepare("UPDATE tb_compra SET 
        valor = :valor,
        data_compra = :data_compra
        WHERE id_compra = :id_compra");

        $data = [
            "id_compra" => $id_compra,
            "valor" =>  $compra->valor,
            "data_compra" =>  $compra->data_compra
        ];

        return $stmt->execute($data);
    }
}

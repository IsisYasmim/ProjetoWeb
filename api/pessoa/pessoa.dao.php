<?php
class PessoaDAO
{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function getAll(){
        $sql = "SELECT * From tb_pessoa";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $pessoas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $pessoas;
    }


    // Insert uma pessoa no banco de dados
    public function insert($pessoa){
        $stmt = $this->pdo->prepare("INSERT INTO tb_pessoa (nome, email, telefone, nascimento, senha) VALUES (:nome, :email, :telefone, :nascimento, :senha)");

        $stmt->bindValue("nome", $pessoa->nome);
        $stmt->bindValue("email", $pessoa->email);
        $stmt->bindValue("telefone", $pessoa->telefone);
        $stmt->bindValue("nascimento", $pessoa->nascimento);
        $stmt->bindValue("senha", $pessoa->senha);

        $stmt->execute();
        $pessoa = clone $pessoa;
        $pessoa->id = $this->pdo->lastInsertId();
        return $pessoa;
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM tb_pessoa WHERE id= :id");

        $stmt->bindValue("id", $id);

        $stmt->execute();

        // Retorna a quantidade de linhas afetadas
        return $stmt-> rowCount();
        
    }

    public function update($id, $pessoa){

        $stmt = $this->pdo->prepare("UPDATE tb_pessoa SET 
        nome = :nome, 
        nascimento = :nascimento,
        telefone = :telefone, 
        email = :email
        WHERE id= :id");

        $data = [
            "id" => $id,
            "nome" =>  $pessoa->nome,
            "nascimento" =>  $pessoa->nascimento,
            "telefone" =>  $pessoa->telefone,
            "email" =>  $pessoa->email
        ];

        return $stmt->execute($data);
    }
}

<?php
class UsuarioDAO
{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }
    public function getAll(){
        $sql = "SELECT * From tb_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $usuarios;
    }


    // Insert um usuario no banco de dados
    public function insert($usuario){
        $stmt = $this->pdo->prepare("INSERT INTO tb_usuario (nome, email, senha, data_nascimento, admin) VALUES (:nome, :email, :senha, :data_nascimento, :admin)");

        $stmt->bindValue("nome", $usuario->nome);
        $stmt->bindValue("email", $usuario->email);
        $stmt->bindValue("senha", $usuario->senha);
        $stmt->bindValue("data_nascimento", $usuario->data_nascimento);
        $stmt->bindValue("admin", $usuario->admin);

        $stmt->execute();
        $usuario = clone $usuario;
        $usuario->id_usuario = $this->pdo->lastInsertId();
        return $usuario;
    }

    public function delete($id_usuario){
        $stmt = $this->pdo->prepare("DELETE FROM tb_usuario WHERE id_usuario= :id_usuario");

        $stmt->bindValue("id_usuario", $id_usuario);

        $stmt->execute();

        // Retorna a quantidade de linhas afetadas
        return $stmt-> rowCount();
        
    }

    public function update($id_usuario, $usuario){

        $stmt = $this->pdo->prepare("UPDATE tb_usuario SET 
        nome = :nome, 
        email = :email,
        senha = :senha, 
        data_nascimento = :data_nascimento
        WHERE id_usuario= :id_usuario");

        $data = [
            "id_usuario" => $id_usuario,
            "nome" =>  $usuario->nome,
            "data_nascimento" =>  $usuario->data_nascimento,
            "senha" =>  $usuario->senha,
            "email" =>  $usuario->email
        ];

        return $stmt->execute($data);
    }
}

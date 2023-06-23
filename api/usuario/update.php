<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('usuario.dao.php');

// Instanciar o DAO
$usuarioDAO = new UsuarioDAO($pdo);

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro";

//obtendo o parâmetro id vindo pela URL da requisição
$id_usuario = $_REQUEST["id_usuario"];

if (!$id_usuario) {
    $responseBody = '{ "message": "Usuário não informado"}';
    http_response_code(404);
} else {
    //Receber os dados do cliente
    $json = file_get_contents('php://input');

    //Criar um objeto a partir do JSON
    $usuario = json_decode($json);

    // Inserir o usuário no banco de dados
    $usuario = $usuarioDAO->update($id_usuario, $usuario);
    $responseBody = json_encode($usuario); // Transforma em JSON
}

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

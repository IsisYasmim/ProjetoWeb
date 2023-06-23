<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('usuario.dao.php');

// Instanciar o DAO
$usuarioDAO = new UsuarioDAO($pdo);

//Receber os dados do cliente
$id_usuario = $_REQUEST["id_usuario"];

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro, n foi a função de deletar kkkkk";

// Inserir o usuário no banco de dados
$usuario = $usuarioDAO->delete($id_usuario);
$responseBody = json_encode($usuario); // Transforma em JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>
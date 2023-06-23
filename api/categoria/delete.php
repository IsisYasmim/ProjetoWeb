<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('categoria.dao.php');

// Instanciar o DAO
$categoriaDAO = new CategoriaDAO($pdo);

//Receber os dados do cliente
$id_categoria = $_REQUEST["id_categoria"];

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro, n foi a função de deletar kkkkk";

// Inserir o usuário no banco de dados
$categoria = $categoriaDAO->delete($id_categoria);
$responseBody = json_encode($categoria); // Transforma em JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>
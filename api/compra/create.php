<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('compra.dao.php');
//require_once("../auth/validate-jwt.inc.php");

// validar se o usuario é adm
// if(!@userAuth["admin"]) {

//     //enviar a mensagem que o user não é adm
//     echo "Desculpe, você não tem permissão de administrador.";

//     exit;
// }

// Instanciar o DAO
$compraDAO = new CompraDAO($pdo);

//Receber os dados do cliente
$json = file_get_contents('php://input');

//Criar um objeto a partir do JSON
$compra = json_decode($json);

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro";

// Inserir a compra no banco de dados
$compra = $compraDAO->insert($compra);

foreach($compra->itens as $item) {
    $item->id_compra = $compra->id_compra;
    // inserir na tb_cmopra_produto
    // $compraProdutoDAO->insert($item);
}

$responseBody = json_encode($compra); // Transforma em JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

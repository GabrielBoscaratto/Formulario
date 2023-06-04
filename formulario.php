<?php


$dbHost = 'localhost'; 
$dbUsername = 'root' ;
$dbPassword = "";
$dbName = 'dbimovelguide';
$port = '3306';

$conexao = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName, $port) or die ('Não foi possivel fazer a conexão com o banco de dados!!!'); 
$name = $_POST["nome"];
$cpf = $_POST["cpf"];
$creci = $_POST["creci"];

$sql = "INSERT INTO corretores (`name`, cpf, creci) VALUES ('$name', '$cpf', $creci)";

if ($conexao->query($sql)) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $conexao->error;
}


$conexao->close();
?>
<?php


//Arquivo realiza a conexão do sistema com o banco de dados hospedado no google cloud

$host = "localhost";
$user = "root";
$pass = "123";
$dbname = "cad_user";
$port = 3306;

try{
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    
}catch(PDOException $err){
    echo "Erro: falha na conexão com o banco de dados. Erro: " . $err->getMessage();
}
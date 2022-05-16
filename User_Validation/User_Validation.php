<?php
    include_once "../conection/conex.php";

    $user = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT 'nome','login','senha','permissao','situacao' WHERE 'login' = ".$user.", 'senha' =".$senha."";
    $query_sql = mysql_query($query);
    if($mysql_row_query($query_sql) != 1){
        echo 'Login Inválido!!!';

    }else{
        echo 'Sucesso';
    }

    
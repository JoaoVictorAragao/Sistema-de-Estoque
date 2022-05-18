<?php
    include_once "../conection/conex_cad_user.php";
    include "../User/user.php";

    $bd = filter_input_array(INPUT_POST, FILTER_DEFAULT);

   
    session_start();

    $query = "SELECT * from user_cad WHERE login = :login AND senha = :senha";
 
    $usuario = new User();

    $usuario->setLogin($bd['login']);
    $usuario->setSenha($bd['senha']);

    $login = $conn->prepare($query);
    $login -> bindValue(':login', $usuario->getLogin());
    $login -> bindValue(':senha', $usuario->getSenha());
    $login -> execute();
    
    $userdb = $login->fetch(PDO::FETCH_OBJ);

    //print_r($userdb);

    $usuario->setNome($userdb->nome);
    $usuario->setPermissao($userdb->permissao);

    if($login->rowCount() != 0){
       if($userdb->situacao != 1){
           echo 'Usuário Desativado';
           
       }else{
        if($usuario->getPermissao() == 0){
            echo 'Administrador';
        }else if($usuario->getPermissao() == 1){
            echo 'Visualizador';
        }else if($usuario->getPermissao() == 2){

        }else if($usuario->getPermissao() == 3){

        }else if($usuario->getPermissao() == 4){

        }
       }
    }else{
        echo 'Usuário não encontrado';
    }
    
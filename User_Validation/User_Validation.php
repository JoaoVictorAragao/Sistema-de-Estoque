<?php
    session_start();
    include_once "../conection/conex.php";
    include "../User/user.php"; 

    //Melhorias: Criptografar as senhas, criar variáveis globais de $_SESSION.

    $bd = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $usuario = new User();

    $usuario->setLogin($bd['login']);
    $usuario->setSenha($bd['senha']);

    if($bd['login'] === '' || $bd['senha'] === ''){
        header("Location: ../index.php");
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Necessário preencher ambos os campos! </div></br>"];
        echo json_encode($retorna);
    }else{
        $query = "SELECT * from user_cad WHERE login = :login AND senha = :senha";
    
        $login = $conn->prepare($query);
        $login -> bindValue(':login', $usuario->getLogin());
        $login -> bindValue(':senha', $usuario->getSenha());
        $login -> execute();
        
        $userdb = $login->fetch(PDO::FETCH_OBJ);

        if($login->rowCount() != 0){
            if($userdb->situacao != 1){
                $retorna = ['erro' => true, 'msg' => "</br><div class='alert alert-danger' role='alert'> Usuário desativado! </div></br>"];
                echo json_encode($retorna);
                    
            }else{
                $_SESSION['autenticado'] = 'SIM';
                $_SESSION['id'] = $userdb->id;
                $_SESSION['nome'] = $userdb->nome;
                $_SESSION['login'] = $userdb->login;
                $_SESSION['senha'] = $userdb->senha;
                $_SESSION['permissao'] = $userdb->permissao;
                
                if($_SESSION['permissao'] == 0){
                    header("Location: ../home.php");
                }else if($_SESSION['permissao'] == 1){
                    header("Location: ../home.php");
                }else if($_SESSION['permissao'] == 2){
                    header("Location: ../home.php");
                }else if($_SESSION['permissao'] == 3){
                    header("Location: ../home.php");
                }else if($_SESSION['permissao'] == 4){
                    header("Location: ../home.php");
                }
            }
        }else{
            $retorna = ['erro' => true, 'msg' => "</br><div class='alert alert-danger' role='alert'> Login ou senha inválidos! </div></br>"];
            echo json_encode($retorna);
        }
    }
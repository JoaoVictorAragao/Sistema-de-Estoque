<?php
    
    require 'User_Service/User_Service.php';
    require_once 'conexao.php';
    require 'User/user.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'login'){
        $user = new user();
        $user->setLogin($_POST['login']);
        $user->setSenha($_POST['senha']);

        $conn = new Conexao();

        $userService = new UserService($conn, $user);
        //print_r($userService->Valida_Login());
        //echo $userService->Valida_Login();
        
        if($userService->Valida_Login()){
            //echo '123';
            header('Location: ../home.php');
        }else{
            //Retornar para a index com ?error=login para exibir mensagem de erro utilizando PHP (tentar utilizando js)
            //header('Location: ../index.php');
            echo '123456';
        }

    } else if($acao == 'sair'){
        session_start();
        session_destroy();
        session_unset();
        header('Location: ../index.php');

    } else if($acao == 'criar'){
        $user = new user();
        $user->setLogin($_POST['login']);
        $user->setSenha($_POST['senha']);
        //set nome, permissão etc

    } else if($acao == 'listar'){
        $user = new user();
        $conn = new Conexao();

        $userService = new UserService($conn, $user);
        $users = $userService->Listar_Usuarios();
        
    } else if($acao == 'atualizar'){

        $user = new User();
        

    }


?>
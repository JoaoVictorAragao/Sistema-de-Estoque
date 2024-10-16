<?php
    
    require 'Services/User_Service.php';
    require_once 'conexao.php';
    require 'Entities/user.php';

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
           
            header('Location: ../home.php');
        }else{
            //echo '123';
            //Retornar para a index com ?error=login para exibir mensagem de erro utilizando PHP (tentar utilizando js)
            header('Location: ../index.php');
            
        }

    } else if($acao == 'sair'){
        session_start();
        session_destroy();
        session_unset();
        header('Location: ../index.php');

    } else if($acao == 'listar'){
        $user = new user();
        $conn = new Conexao();

        $userService = new UserService($conn, $user);
        $users = $userService->Listar_Usuarios();

    } else if($acao == 'atualizar'){
        $id = $_POST['id'];
        $login = $_POST['login'];
        $nome = $_POST['username'];
        $situacao = $_POST['situacao'];

        $user = new user();
        $user->setId($id);
        $user->setLogin($login);
        $user->setNome($nome);
        $user->setSituacao($situacao);

        $conn = new Conexao();
        //var_dump($user);    
        $userService = new UserService($conn, $user);
        $userService->Atualizar_Usuario();
       
        header('Location: ../Public/user_adm.php');
        
        

    } else if($acao == 'desativar'){
        $id = $_POST['id'];
        $login = $_POST['login'];
        $nome = $_POST['username'];
        $situacao = $_POST['situacao'];

        $user = new user();
        $user->setId($id);
        $user->setLogin($login);
        $user->setNome($nome);
        $user->setSituacao( ($situacao == "ativo") ? "inativo" : "ativo");

        $conn = new Conexao();

        //var_dump($user);    
        $userService = new UserService($conn, $user);
        $userService->Atualizar_Usuario();
       
        header('Location: ../Public/user_adm.php');

    } else if($acao == 'criar'){
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nome = $_POST['username'];
        var_dump($_POST);
        $user = new user();
        $user->setLogin($login);
        $user->setSenha($senha);
        $user->setNome($nome);
        $user->setSituacao('ativo');

        $conn = new Conexao();

        $userService = new UserService($conn, $user);
        $userService->Criar_Usuario();

        header('Location: ../Public/user_adm.php');
    }


?>
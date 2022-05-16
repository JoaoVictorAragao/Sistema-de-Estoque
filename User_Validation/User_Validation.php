<?php
    include_once "conex_cad_user.php";
    include_once "user.php";

    $bd = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $user = new user();

    $user->setLogin($bd['email']);
    $user->setSenha($bd['senha']);

    



    
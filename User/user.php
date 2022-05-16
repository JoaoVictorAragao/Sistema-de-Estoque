<?php

    class user{
        private $login;
        private $senha;
        private $nome;

        function setLogin($login){
            $this->login = $login;
        }

        function getLogin(){
            return $this->login;
        }

        function setSenha($senha){
            $this->senha = $senha;
        }

        function getSenha(){
            return $this->senha;
        }

        function setNome($nome){
            $this->nome = $nome;
        }

        function getNome(){
            return $this->nome;
        }

    }
?>
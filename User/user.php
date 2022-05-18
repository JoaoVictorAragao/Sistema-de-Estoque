<?php

    class user{
        private $id;
        private $login;
        private $senha;
        private $nome;
        private $permissao;
        
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

        function setId($id){
            $this->id = $id;
        }

        function getId(){
            return $this->id;
        }

        function setPermissao($permissao){
            $this->permissao = $permissao;
        }

        function getPermissao(){
            return $this->permissao;
        }

    }
?>
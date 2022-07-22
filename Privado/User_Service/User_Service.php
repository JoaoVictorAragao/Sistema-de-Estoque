<?php

    class UserService{
        private $conexao;
        private $user;

        public function __construct(Conexao $conexao, user $user){
            $this->conexao = $conexao->conectar();
            $this->user = $user;
        }
        
        public function Valida_Login(){
            $query = 'SELECT login, senha 
                FROM user_cad  
                WHERE login = :login 
                AND senha = :senha';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':login', $this->user->getLogin());
            $stmt->bindValue(':senha', $this->user->getSenha());
            $stmt->execute();
            return $stmt->rowCount();

        }

        public function Listar_Usuarios(){

            $query = 'SELECT *
            FROM user_cad';
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function Info_Login(){
            //Após consulta com o BD retorna as informações do login
        }

    }

?>
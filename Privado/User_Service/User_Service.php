<?php

    class UserService{
        private $conexao;
        private $user;

        public function __construct(Conexao $conexao, user $user){
            $this->conexao = $conexao->conectar();
            $this->user = $user;
        }
        
        public function Valida_Login(){         
            $query = 'SELECT * FROM user_cad WHERE login = :login';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':login', $this->user->getLogin());
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $senha_hash = password_hash($user['senha'], PASSWORD_DEFAULT);
            
            if ($senha_hash && password_verify($this->user->getSenha(), $senha_hash) 
            && $user['situacao'] == 'ativo') {
                // login e senha corretos
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $this->user->getLogin();
                $this->user->setId($user['id']);
                
                return true;
            } else {
                // login ou senha incorretos
                return false;
            }
            
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
            //$_SESSION['id'];
        }

        public function Atualizar_Usuario(){

            $query = 'UPDATE user_cad
            SET username = :username, login = :login, situacao = :situacao
            WHERE id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->user->getId());
            $stmt->bindValue(':username', $this->user->getNome());
            $stmt->bindValue(':login', $this->user->getLogin());
            $stmt->bindValue(':situacao', $this->user->getSituacao());
            //$stmt->bindValue(':permissao', $this->user->getPermissao());
            $stmt->execute();
        
        }

    }

?>
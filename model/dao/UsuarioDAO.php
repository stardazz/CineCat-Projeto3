<?php
    class UsuarioDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM usuario");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaUsuarios = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $usuario = new Usuario(); // Classe bean
                    $usuario->setId($linha['id_usuario']);
                    $usuario->setNome($linha['nome']);
                    $usuario->setEmail($linha['email']);
                    $usuario->setSenha($linha['senha']);

                    array_push($listaUsuarios, $usuario);
                }

                return $listaUsuarios;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
            
        }
    }
<?php
    class UsuarioDAO {
        public function create($usuario) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO usuario(nome, email, senha) 
                    VALUES (:n, :e, :s)"
                );
                $query->bindValue(':n', $usuario->getNome(), PDO::PARAM_STR);
                $query->bindValue(':e', $usuario->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':s', $usuario->getSenha(), PDO::PARAM_STR);

                 if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
                catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

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
    
     public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM usuario WHERE id_usuario = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $usuario = new Usuario(); // Classe bean
                    $usuario->setId($linha['id_usuario']);
                    $usuario->setNome($linha['nome']);
                    $usuario->setEmail($linha['email']);
                    $usuario->setSenha($linha['senha']);
                }
                return $usuario;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($usuario) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE usuario SET nome = :n, email = :e, senha= :s 
                    WHERE id_usuario = :i"
                );
                $query->bindValue(':n', $usuario->getNome(), PDO::PARAM_STR);
                $query->bindValue(':e', $usuario->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':s', $usuario->getSenha(), PDO::PARAM_STR);
                $query->bindValue(':i', $usuario->getId(), PDO::PARAM_INT);

                 if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
                catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM usuario
                    WHERE id_usuario = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                 if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
                catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    } 
<?php
    class IngressoDAO {
        public function create($ingresso) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO ingresso(id_usuario, id_sessao, assento_idassento, formapagamento) 
                    VALUES ( :u, :s, :a, :f)"
                );
                $query->bindValue(':u', $ingresso->getUsuario()->getId(), PDO::PARAM_INT);
                $query->bindValue(':s', $ingresso->getSessao()->getId(), PDO::PARAM_INT);
                $query->bindValue(':a', $ingresso->getAssento()->getId(), PDO::PARAM_INT);
                $query->bindValue(':f', $ingresso->getFormaPagamento(), PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM ingresso");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaingressos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $ingresso = new Ingresso(); // Classe bean
                    $ingresso->setId($linha['id_ingresso']);
                    $ingresso->setUsuario($linha['id_usuario']);
                    $ingresso->setSessao($linha['id_sessao']);
                    $ingresso->setAssento($linha['assento']);
                    $ingresso->setFormaPagamento($linha['formapagamento']);
                    // Atributo da associação (com Usuario)
                    $daoUsuario = new UsuarioDAO();
                    $usuario = $daoUsuario->find($linha['id_usuario']);
                    $ingresso->setUsuario($usuario);

                    // Atributo da associação (com Sessão)
                    $daoSessao = new SessaoDAO();
                    $sessao = $daoSessao->find($linha['id_sessao']);
                    $ingresso->setSessao($sessao);

                    // Atributo da associação (com Assento)
                    $daoAssento = new AssentoDAO();
                    $assento = $daoAssento->find($linha['id_assento']);
                    $ingresso->setAssento($assento);


                    array_push($listaingressos, $ingresso);
                }
                
                return $listaingressos;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

        public function find($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "SELECT * FROM ingresso WHERE id_ingresso = :i"
                );
                $query->bindValue(':i', $id, PDO::PARAM_INT);
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $ingresso = new Ingresso(); // Classe bean
                    $ingresso->setId($linha['id_ingresso']);
                    $ingresso->setUsuario($linha['id_usuario']);
                    $ingresso->setSessao($linha['id_sessao']);
                    $ingresso->setAssento($linha['assento']);
                    $ingresso->setFormaPagamento($linha['formapagamento']);
                }
                
                return $ingresso;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }            
        }

        public function update($ingresso) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE ingresso
                    SET id_usuario = :u, id_sessao = :s, assento_idassento = :a, formapagamento = :f
                    WHERE id_ingresso = :i"
                );
                $query->bindValue(':u', $ingresso->getUsuario()->getId(), PDO::PARAM_INT);
                $query->bindValue(':s', $ingresso->getSessao()->getId(), PDO::PARAM_INT);
                $query->bindValue(':a', $ingresso->getAssento()->getId(), PDO::PARAM_INT);
                $query->bindValue(':f', $ingresso->getFormaPagamento(), PDO::PARAM_STR);
                $query->bindValue(':i', $ingresso->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM ingresso
                    WHERE id_ingresso = :i"
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
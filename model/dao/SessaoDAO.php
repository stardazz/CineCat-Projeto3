<?php
    class SessaoDAO {
        public function create($sessao) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO sessao(data, horario, preco, id_filme, id_sala) 
                    VALUES (:d, :h, :p, :f, :s)"
                );
                $query->bindValue(':d', $sessao->getData(), PDO::PARAM_STR);
                $query->bindValue(':h', $sessao->getHorario(), PDO::PARAM_INT);
                $query->bindValue(':p', $sessao->getPreco(), PDO::PARAM_STR);
                // Bind para a chave estrangeira
                $query->bindValue(':f', $sessao->getFilme()->getId(), PDO::PARAM_INT);
                $query->bindValue(':s', $sessao->getSala()->getId(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM sessao");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaSessoes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $sessao = new Sessao(); // Classe bean
                    $sessao->setId_Sessao($linha['id_sessao']);
                    $sessao->setData($linha['data']);
                    $sessao->setHorario($linha['horario']);
                    $sessao->setPreco($linha['preco']);
                    // Atributo da associação
                    $daoFilme = new FilmeDAO();
                    $filme = $daoFilme->find($linha['id_filme']);
                    $sessao->setFilme($filme);
                    // Atributo da associação
                    $daoSala = new SalaDAO();
                    $sala = $daoSala->find($linha['id_sala']);
                    $sessao->setSala($sala);

                    array_push($listaSessoes, $sessao);
                }
                
                return $listaSessoes;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }

         public function find($id_sessao) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM sessao WHERE id_sessao = :i");
                $query->bindValue(':i', $id_sessao, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $sessao = new Sessao(); // Classe bean
                    $sessao->setId_Sessao($linha['id_sessao']);
                    $sessao->setData($linha['data']);
                    $sessao->setHorario($linha['horario']);
                    $sessao->setPreco($linha['preco']);
                    // Atributo da associação
                    $daoFilme = new FilmeDAO();
                    $filme = $daoFilme->find($linha['id_filme']);
                    $sessao->setFilme($filme);
                    // Atributo da associação
                    $daoSala = new SalaDAO();
                    $sala = $daoSala->find($linha['id_sala']);
                    $sessao->setSala($sala);


                }
                return $sessao;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($sessao) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE sessao SET data = :d, horario = :h, preco = :p, id_filme = :f, id_sala = :s    
                    WHERE id_sessao = :i"
                );
                $query->bindValue(':d', $sessao->getData(), PDO::PARAM_STR);
                $query->bindValue(':h', $sessao->getHorario(), PDO::PARAM_STR);
                $query->bindValue(':p', $sessao->getPreco(), PDO::PARAM_STR);
                $query->bindValue(':f', $sessao->getFilme()->getId(), PDO::PARAM_INT);
                $query->bindValue(':s', $sessao->getSala()->getId(), PDO::PARAM_INT);
                $query->bindValue(':i', $sessao->getId_Sessao(), PDO::PARAM_INT);

                 if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
                catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id_sessao) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM sessao
                    WHERE id_sessao = :i"
                );
                $query->bindValue(':i', $id_sessao, PDO::PARAM_INT);

                 if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
                catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }
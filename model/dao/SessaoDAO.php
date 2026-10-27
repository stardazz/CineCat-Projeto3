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
                    $sessao->setId($linha['id_sessao']);
                    $sessao->setData($linha['data']);
                    $sessao->setHorario($linha['horario']);
                    $sessao->setPreco($linha['preco']);
                    // Atributo da associação
                    $daoFilme = new FilmeDAO();
                    $filme = $daoFilme->find($linha['id_filme'])
                    $sessao->setFilme($filme);
                    
                    $daoSala = new SalaDAO();
                    $sala = $daoSala->find($linha['id_sala'])
                    $sessao->setSala($sala);

                    array_push($listaSessoes, $sessao);
                }
                
                return $listaSessoes;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }
    }
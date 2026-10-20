<?php
    class FilmeDAO {
        public function create($filme) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO filme(titulo, genero, duracao, classificacao, sinopse) 
                    VALUES (:t, :g, :d, :c, :s)"
                );
                $query->bindValue(':t', $filme->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':g', $filme->getGenero(), PDO::PARAM_STR);
                $query->bindValue(':d', $filme->getDuracao(), PDO::PARAM_STR);
                $query->bindValue(':c', $filme->getClassificacao(), PDO::PARAM_STR);
                $query->bindValue(':s', $filme->getSinopse(), PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM filme");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listafilmes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $filme = new Filme(); // Classe bean
                    $filme->setId($linha['id_filme']);
                    $filme->setTitulo($linha['titulo']);
                    $filme->setGenero($linha['genero']);
                    $filme->setDuracao($linha['duracao']);
                    $filme->setClassificacao($linha['classificacao']);
                    $filme->setSinopse($linha['sinopse']);

                    array_push($listafilmes, $filme);
                }

                return $listafilmes;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
            
        }
    
     public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM filme WHERE id_filme = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $filme = new Filme(); // Classe bean
                    $filme->setId($linha['id_filme']);
                    $filme->setTitulo($linha['titulo']);
                    $filme->setGenero($linha['genero']);
                    $filme->setDuracao($linha['duracao']);
                    $filme->setClassificacao($linha['classificacao']);
                    $filme->setSinopse($linha['sinopse']);
                }
                return $filme;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($filme) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE filme SET titulo = :t, genero = :g, duracao = :d, classificacao = :c, sinopse = :s
                    WHERE id_filme = :i"
                );
                $query->bindValue(':t', $filme->getTitulo(), PDO::PARAM_STR);
                $query->bindValue(':g', $filme->getGenero(), PDO::PARAM_STR);
                $query->bindValue(':d', $filme->getDuracao(), PDO::PARAM_STR);
                $query->bindValue(':c', $filme->getClassificacao(), PDO::PARAM_STR);
                $query->bindValue(':s', $filme->getSinopse(), PDO::PARAM_STR);
                $query->bindValue(':i', $filme->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM filme
                    WHERE id_filme = :i"
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
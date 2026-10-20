<?php
    class SalaDAO {
        public function create($sala) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO sala(nome, capacidade) 
                    VALUES (:n, :c)"
                );
                $query->bindValue(':n', $sala->getNome(), PDO::PARAM_STR);
                $query->bindValue(':c', $sala->getCapacidade(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM sala");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listasalas = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $sala = new Sala(); // Classe bean
                    $sala->setId($linha['id_sala']);
                    $sala->setNome($linha['nome']);
                    $sala->setCapacidade($linha['capacidade']);

                    array_push($listasalas, $sala);
                }

                return $listasalas;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
            
        }
    
     public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM sala WHERE id_sala = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $sala = new Sala(); // Classe bean
                    $sala->setId($linha['id_sala']);
                    $sala->setNome($linha['nome']);
                    $sala->setCapacidade($linha['capacidade']);
                }
                return $sala;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($sala) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE sala SET nome = :n, capacidade = :c
                    WHERE id_sala = :i"
                );
                $query->bindValue(':n', $sala->getNome(), PDO::PARAM_STR);
                $query->bindValue(':c', $sala->getCapacidade(), PDO::PARAM_INT);
                $query->bindValue(':i', $sala->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM sala
                    WHERE id_sala = :i"
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
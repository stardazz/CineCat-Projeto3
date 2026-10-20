<?php
    class AssentoDAO {
        public function create($assento) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO assento(numero, fila) 
                    VALUES (:n, :f)"
                );
                $query->bindValue(':n', $assento->getNumero(), PDO::PARAM_INT);
                $query->bindValue(':f', $assento->getFila(), PDO::PARAM_STR);

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
                $query = BD::getConexao()->prepare("SELECT * FROM assento");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaassentos = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $assento = new assento(); // Classe bean
                    $assento->setId($linha['idassento']);
                    $assento->setNumero($linha['numero']);
                    $assento->setFila($linha['fila']);

                    array_push($listaassentos, $assento);
                }

                return $listaassentos;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
            
        }
    
     public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM assento WHERE idassento = :i");
                $query->bindValue(':i', $id, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $assento = new assento(); // Classe bean
                    $assento->setId($linha['idassento']);
                    $assento->setNumero($linha['numero']);
                    $assento->setFila($linha['fila']);
                }
                return $assento;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

         public function update($assento) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE assento SET numero = :n, fila = :f 
                    WHERE idassento = :i"
                );
                $query->bindValue(':n', $assento->getNumero(), PDO::PARAM_INT);
                $query->bindValue(':f', $assento->getFila(), PDO::PARAM_STR);
                $query->bindValue(':i', $assento->getId(), PDO::PARAM_INT);

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
                    "DELETE FROM assento
                    WHERE idassento = :i"
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
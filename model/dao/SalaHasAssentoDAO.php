<?php
    class SalaHasAssentoDAO {
        public function create($sala_has_assento) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO sala_has_assento(sala_id_sala, assento_idassento) 
                    VALUES (:s, :a)"
                );
                $query->bindValue(':s', $sala_has_assento->getSala_id_sala(), PDO::PARAM_INT);
                $query->bindValue(':a', $sala_has_assento->getAssento_idassento(), PDO::PARAM_INT);

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
                $query = BD::getConexao()->prepare("SELECT * FROM sala_has_assento");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listasala_has_assento = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $sala_has_assento = new SalaHasAssento(); // Classe bean
                    $sala_has_assento->setSala_id_sala($linha['sala_id_sala']);
                    $sala_has_assento->setAssento_idassento($linha['assento_idassento']);

                    array_push($listasala_has_assento, $sala_has_assento);
                }

                return $listasala_has_assento;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
            
        }
    
     public function find($sala_id_sala, $assento_idassento) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM sala_has_assento WHERE sala_id_sala = :s AND assento_idassento");
                $query->bindValue(':s', $sala_id_sala, PDO::PARAM_INT);
                $query->bindValue(':a', $assento_idassento, PDO::PARAM_INT);

                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                if($linha = $query->fetch(PDO::FETCH_ASSOC)) {
                    $sala_has_assento = new SalaHasAssento(); // Classe bean
                    $sala_has_assento->setSala_id_sala($linha['sala_id_sala']);
                    $sala_has_assento->setAssento_idassento($linha['assento_idasssento']);
                }
                return $sala_has_assento;
            } 
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function destroy($sala_id_sala, $assento_idassento) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM sala_has_assento
                    WHERE sala_id_sala = :s AND assento_idassento = :a"
                );
                $query->bindValue(':s', $sala_id_sala, PDO::PARAM_INT);
                $query->bindValue(':a', $assento_idassento, PDO::PARAM_INT);

                 if(!$query->execute()) {
                    print_r($query->errorInfo());
                }
            }
                catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    } 
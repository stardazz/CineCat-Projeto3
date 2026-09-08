<?php 
    class SalaDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM sala");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaSala = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $sala = new Sala(); // Classe bean
                    $sala->setId($linha['id_sala']);
                    $sala->setNome($linha['nome']);
                    $sala->setCapacidade($linha['capacidade']);

                    array_push($listaSala, $sala);
                }
                
                return $listaSala;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }
    }
?>
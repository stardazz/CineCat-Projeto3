<?php 
    class AssentoDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM assento");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaAssento = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $assento = new Assento(); // Classe bean
                    $assento->setId($linha['idassento']);
                    $assento->setNumero($linha['numero']);
                    $assento->setFila($linha['fila']);

                    array_push($listaAssento, $assento);
                }
                
                return $listaAssento;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }
    }
?>
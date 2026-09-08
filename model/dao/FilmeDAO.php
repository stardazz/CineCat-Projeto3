<?php 
    class FilmeDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM filme");
                
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaFilme = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $filme = new Filme(); // Classe bean
                    $filme->setId($linha['id_filme']);
                    $filme->setTitulo($linha['titulo']);
                    $filme->setGenero($linha['genero']);
                    $filme->setClassificacao($linha['classificacao']);
                    $filme->setSinopse($linha['sinopse']);

                    array_push($listaFilme, $filme);
                }
                
                return $listaFilme;
            } 
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }            
        }
    }
?>
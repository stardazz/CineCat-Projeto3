<?php
    class SalaHasAssento{
        //Atributos
        private $sala_id_sala;
        private $assento_idassento;

        //Métodos de encapsulamento (getters e setters)
        public function getSala_id_sala(){
            return $this->sala_id_sala;
        }

        public function setSala_id_sala($sala_id_sala){
            $this->sala_id_sala = $sala_id_sala;
        }

        public function getAssento_idassento(){
            return $this->assento_idassento;
        }

        public function setAssento_idassento($assento_idassento){
            $this->assento_idassento = $assento_idassento;
        }
    }
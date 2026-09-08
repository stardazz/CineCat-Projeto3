<?php
    class Assento{
        //Atributos
        private $id;
        private $numero;
        private $fila;

        //Métodos de encapsulamento (getters e setters)
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNumero(){
            return $this->numero;
        }

        public function setNumero($numero){
            $this->numero = $numero;
        }

        public function getFila(){
            return $this->fila;
        }

        public function setFila($fila){
            $this->fila = $fila;
        }
    }
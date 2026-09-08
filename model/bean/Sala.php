<?php
    class Sala{
        //Atributos
        private $id;
        private $nome;
        private $capacidade;

        //Métodos de encapsulamento (getters e setters)
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getCapacidade(){
            return $this->capacidade;
        }

        public function setCapacidade($capacidade){
            $this->capacidade = $capacidade;
        }
    }
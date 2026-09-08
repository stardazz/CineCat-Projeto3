<?php
    class Filme{
        //Atributos
        private $id;
        private $titulo;
        private $genero;
        private $duracao;
        private $classificacao;
        private $sinopse;

        //Métodos de encapsulamento (getters e setters)
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getTitulo(){
            return $this->titulo;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }

        public function getGenero(){
            return $this->genero;
        }

        public function setGenero($genero){
            $this->genero = $genero;
        }

        public function getDuracao(){
            return $this->duracao;
        }

        public function setDuracao($duracao){
            $this->duracao = $duracao;
        }

        public function getClassificacao(){
            return $this->classificacao;
        }

        public function setClassificacao($classificacao){
            $this->classificacao = $classificacao;
        }

        public function getSinopse(){
            return $this->sinopse;
        }

        public function setSinopse($sinopse){
            $this->sinopse = $sinopse;
        }
    }
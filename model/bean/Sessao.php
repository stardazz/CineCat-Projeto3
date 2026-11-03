<?php
    class Sessao{
        //Atributos
        private $id_sessao;
        private $data;
        private $horario;
        private $preco;
        private $filme; //ASSOCIAÇÃO COM CLASSE FILME
        private $sala; //ASSOCIAÇÃO COM CLASSE SALA

        //Métodos de encapsulamento (getters e setters)
        public function getId_Sessao(){
            return $this->id_sessao;
        }

        public function setId_Sessao($id_sessao){
            $this->id_sessao = $id_sessao;
        }

        public function getData(){
            return $this->data;
        }

        public function setData($data){
            $this->data = $data;
        }

        public function getHorario(){
            return $this->horario;
        }

        public function setHorario($horario){
            $this->horario = $horario;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function setPreco($preco){
            $this->preco = $preco;
        }
        public function getFilme(){
            return $this->filme;
        }

        public function setFilme($filme){
            $this->filme = $filme;
        }
        public function getSala(){
            return $this->sala;
        }

        public function setSala($sala){
            $this->sala = $sala;
        }
    }
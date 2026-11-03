<?php
    class Ingresso {
        // Atributos
        private $id;
        private $usuario; // Associação com a classe Usuarios
        private $sessao;  // Associação com a classe Sessao
        private $assento; // Associação com a classe Assento
        private $formapagamento;

        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getUsuario() {
            return $this->usuario;
        }

        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        public function getSessao() {
            return $this->sessao;
        }

        public function setSessao($sessao) {
            $this->sessao = $sessao;
        }

        public function getAssento() {
            return $this->assento;
        }

        public function setAssento($assento) {
            $this->assento = $assento;
        }

        public function getFormaPagamaneto() {
            return $this->formapagamento;
        }

        public function setFormaPagamento($formapagamento) {
            $this->formapagamento = $formapagamento;
        }
    }
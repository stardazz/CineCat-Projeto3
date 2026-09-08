<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                "mysql:host=localhost;dbname=cinecat",
                "root",
                "root"
            );

            return $conn;
        }
    }
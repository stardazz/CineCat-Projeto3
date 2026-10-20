<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Sala (bean)
    $sala = new Sala();

    // Definir os valores dos atributos a partir dos dados do form
    $sala->setNome($_POST['nome']);
    $sala->setCapacidade($_POST['capacidade']);
    $sala->setId($_POST['id']);

    // Instanciar um objeto da classe salaDAO
    $dao = new SalaDAO();

    // Invocar o método update da class salaDAO
    $dao->update($sala);

    // Redirecionar para o index 
    header('location: index.php');
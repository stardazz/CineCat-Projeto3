<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $assento = new Assento();

    // Definir os valores dos atributos a partir dos dados do form
    $assento->setNumero($_POST['numero']);
    $assento->setFila($_POST['fila']);
    $assento->setId($_POST['id']);

    // Instanciar um objeto da classe assentoDAO
    $dao = new assentoDAO();

    // Invocar o método update da class assentoDAO
    $dao->update($assento);

    // Redirecionar para o index
    header('location: index.php');
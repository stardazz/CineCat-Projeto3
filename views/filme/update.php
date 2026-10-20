<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $filme = new filme();

    // Definir os valores dos atributos a partir dos dados do form
    $filme->setTitulo($_POST['titulo']);
    $filme->setGenero($_POST['genero']);
    $filme->setDuracao($_POST['duracao']);
    $filme->setClassificacao($_POST['classificacao']);
    $filme->setSinopse($_POST['sinopse']);
    $filme->setId($_POST['id']);

    // Instanciar um objeto da classe filmeDAO
    $dao = new FilmeDAO();

    // Invocar o método update da class filmeDAO
    $dao->update($filme);

    // Redirecionar para o index
    header('location: index.php');
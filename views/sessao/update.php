<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe sessao (bean)
    $sessao = new Sessao();

    // Definir os valores dos atributos a partir dos dados do form
    $sessao->setData($_POST['data']);
    $sessao->setHorario($_POST['horario']);
    $sessao->setPreco($_POST['preco']);
    $sessao->setId_Sessao($_POST['id_sessao']);
    $sessao->setFilme($_POST['id_filme']);
    $sessao->setSala($_POST['id_sala']);


    // Instanciar um objeto da classe sessaoDAO
    $dao = new SessaoDAO();

    // Invocar o método update da class sessaoDAO
    $dao->update($sessao);

    // Redirecionar para o index 
    header('location: index.php');
<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe sessao (bean)
    $sessao = new Sessao();

    // Definir os valores dos atributos a partir dos dados do form
    $sessao->setData($_POST['data']);
    $sessao->setHorario($_POST['horario']);
    $sessao->setPreco($_POST['preco']);
    $sessao->setId_Sessao($_POST['id_sessao']);

    // Instanciar um objeto do Filme
    $filme = new Filme();
    $filme->setId($_POST['id_filme']);

    // Definir o filme na sessão
    $sessao->setFilme($filme);

    // Instanciar um objeto da Sala
    $sala = new Sala();
    $sala->setId($_POST['id_sala']);

    // Definir a sala na sessão
    $sessao->setSala($sala);

    // Instanciar um objeto da classe sessaoDAO
    $dao = new SessaoDAO();

    // Invocar o método update da class sessaoDAO
    $dao->update($sessao);

    // Redirecionar para o index 
    header('location: index.php');
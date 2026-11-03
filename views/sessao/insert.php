<?php
    require "../../autoload.php";

    $sessao = new Sessao();

    // Definir os valores da sessão
    $sessao->setData($_POST['data']);
    $sessao->setHorario($_POST['horario']);
    $sessao->setPreco($_POST['preco']);

    // Instanciar objeto Filme
    $filme = new Filme();
    $filme->setId($_POST['id_filme']);

    $sessao->setFilme($filme);

    // Instanciar objeto Sala
    $sala = new Sala();
    $sala->setId($_POST['id_sala']);

    $sessao->setSala($sala);

    // Instanciar DAO
    $dao = new SessaoDAO();

    // Invocar método create
    $dao->create($sessao);

    // Redirecionar
    header('Location: index.php');
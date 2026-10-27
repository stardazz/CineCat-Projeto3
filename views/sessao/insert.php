<?php
    // Incluir o arquivo de autload 
    require "../../autoload.php";

    //Instanciar um obejto da classe Cliente (bean)
    $sessao = new Sessao();

    //Definir os valores dos atributos a partir do form
    $sessao->setData($_POST['data']);
    $sessao->setHorario($_POST['horario']);
    $sessao->setPreco($_POST['preco']);

    //Instanciar um objeto dA classe salaDAO
    $dao = new SessaoDAO();

    //Invocar o metodo create
    $dao->create($sessao);

    //Redirecionar para o index (COMENTAR CASAO NÃO FUNCIONE)
    header('Location: index.php');
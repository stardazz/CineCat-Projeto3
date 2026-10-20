<?php
    // Incluir o arquivo de autload 
    require "../../autoload.php";

    //Instanciar um obejto da classe Cliente (bean)
    $filme = new Filme();

    //Definir os valores dos atributos a partir do form
    $filme->setTitulo($_POST['titulo']);
    $filme->setGenero($_POST['genero']);
    $filme->setDuracao($_POST['duracao']);
    $filme->setClassificacao($_POST['classificacao']);
    $filme->setSinopse($_POST['sinopse']);

    //Instanciar um objeto da classe filmeDAO
    $dao = new FilmeDAO();

    //Invocar o metodo create
    $dao->create($filme);

    //Redirecionar para o index (COMENTAR CASAO NÃO FUNCIONE)
    header('Location: index.php');
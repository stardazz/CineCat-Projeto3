<?php
    // Incluir o arquivo de autload 
    require "../../autoload.php";

    //Instanciar um obejto da classe Cliente (bean)
    $sala = new Sala();

    //Definir os valores dos atributos a partir do form
    $sala->setNome($_POST['nome']);
    $sala->setCapacidade($_POST['capacidade']);

    //Instanciar um objeto dA classe salaDAO
    $dao = new SalaDAO();

    //Invocar o metodo create
    $dao->create($sala);

    //Redirecionar para o index (COMENTAR CASAO NÃO FUNCIONE)
    header('Location: index.php');
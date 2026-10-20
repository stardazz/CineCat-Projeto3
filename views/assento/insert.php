<?php
    // Incluir o arquivo de autload 
    require "../../autoload.php";

    //Instanciar um obejto da classe Assento (bean)
    $assento = new Assento();

    //Definir os valores dos atributos a partir do form
    $assento->setNumero($_POST['numero']);
    $assento->setFila($_POST['fila']);

    //Instanciar um onjeto da classe UsuarioDAO
    $dao = new AssentoDAO();

    //Invocar o metodo create
    $dao->create($assento);

    //Redirecionar para o index (COMENTAR CASAO NÃO FUNCIONE)
    header('Location: index.php');
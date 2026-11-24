<?php
    require "../../autoload.php";

    $salahasassento = new SalaHasAssento();

    // Instanciar objeto
    $sala = new Sala();
    $sala->setId($_POST['sala_id_sala']);

    $salahasassento->setSala_id_sala($sala);

    // Instanciar objeto 
    $assento = new Assento();
    $assento->setId($_POST['assento_idassento']);

    $salahasassento->setAssento_idassento($assento);

    // Instanciar DAO
    $dao = new SalaHasAssentoDAO();

    // Invocar método create
    $dao->create($salahasassento);

    // Redirecionar
    header('Location: index.php');
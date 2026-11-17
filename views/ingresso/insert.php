<?php
    require "../../autoload.php";

    $ingresso = new Ingresso();

    // Definir os valores do ingresso
    $ingresso->setFormaPagamento($_POST['formapagamento']);

    // Instanciar objeto Usuário
    $usuario = new Usuario();
    $usuario->setId($_POST['id_usuario']);

    $ingresso->setUsuario($usuario);

    // Instanciar objeto Sessão
    $sessao = new Sessao();
    $sessao->setId_Sessao($_POST['id_sessao']);

    $ingresso->setSessao($sessao);

    // Instanciar objeto Assento
    $assento = new Assento();
    $assento->setId($_POST['assento_idassento']);

    $ingresso->setAssento($assento);

    // Instanciar DAO
    $dao = new IngressoDAO();

    // Invocar método create
    $dao->create($ingresso);

    // Redirecionar
    header('Location: index.php');
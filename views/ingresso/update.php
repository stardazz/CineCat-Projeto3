<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe sessao (bean)
    $ingresso = new Ingresso();

    // Definir os valores dos atributos a partir dos dados do form
    $ingresso->setUsuario($_POST['id_usuario']);
    $ingresso->setSessao($_POST['id_sessao']);
    $ingresso->setAssento($_POST['assento_idassento']);
    $ingresso->setFormaPagamento($_POST['formapagamento']);
    $ingresso->setId($_POST['id_ingresso']);

    // Instanciar um objeto do Usuario
    $usuario = new Usuario();
    $usuario->setId($_POST['id_usuario']);

    // Definir o usuário no ingresso
    $ingresso->setUsuario($usuario);

    // Instanciar um objeto da Sessao
    $sessao = new Sessao();
    $sessao->setId_Sessao($_POST['id_sessao']);

    // Definir a sessão no ingresso
    $ingresso->setSessao($sessao);

    // Instanciar um objeto do Assento
    $assento = new Assento();
    $assento->setId($_POST['assento_idassento']);

    // Definir o assento no ingresso
    $ingresso->setAssento($assento);

    // Instanciar um objeto da classe ingressoDAO
    $dao = new IngressoDAO();

    // Invocar o método update da class ingressoDAO
    $dao->update($ingresso);

    // Redirecionar para o index 
    header('location: index.php');
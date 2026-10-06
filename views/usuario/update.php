<?php
    require "../../autoload.php";

    // Instanciar um objeto da classe Cliente (bean)
    $usuario = new Usuario();

    // Definir os valores dos atributos a partir dos dados do form
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setId($_POST['id']);

    // Instanciar um objeto da classe UsuarioDAO
    $dao = new UsuarioDAO();

    // Invocar o método update da class UsuarioDAO
    $dao->update($usuario);

    // Redirecionar para o index
    header('location: index.php');
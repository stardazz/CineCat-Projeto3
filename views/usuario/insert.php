<?php
    // Incluir o arquivo de autload 
    require "../../autoload.php";

    //Instanciar um obejto da classe Cliente (bean)
    $usuario = new Usuario();

    //Definir os valores dos atributos a partir do form
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);

    //Instanciar um onjeto dA classe UsuarioDAO
    $dao = new UsuarioDAO();

    //Invocar o metodo create
    $dao->create($usuario);

    //Redirecionar para o index (COMENTAR CASAO NÃO FUNCIONE)
    header('Location: index.php');
<?php
    require "../../autoload.php";

    // Coletar o valor deo id pela URL
    $id = $_GET['id'];

    // Instanciar um objeto da classe UsuarioDAO
    $dao = new UsuarioDAO();

    // Invocar o método para excluir
    $dao->destroy($id);

    // Redirecionar para o index
    header('location: index.php');
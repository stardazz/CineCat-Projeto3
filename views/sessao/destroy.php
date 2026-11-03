<?php
    require "../../autoload.php";

    // Coletar o valor deo id pela URL
    $id = $_GET['id_sessao'];

    // Instanciar um objeto da classe SessaoDAO
    $dao = new SessaoDAO();

    // Invocar o método para excluir
    $dao->destroy($id);

    // Redirecionar para o index
    header('location: index.php');
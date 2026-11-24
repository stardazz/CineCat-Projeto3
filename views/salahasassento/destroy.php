<?php
    require "../../autoload.php";

    // Coletar o valor deo id pela URL
    $sala_id_sala = $_GET['sala_id_sala'];
    $sessao_idsessao = $_GET['sessao_idsessao'];

    // Instanciar um objeto da classe
    $dao = new SalaHasAssentoDAO();

    // Invocar o método para excluir
    $dao->destroy($sala_id_sala, $assento_idassento);

    // Redirecionar para o index
    header('location: index.php');
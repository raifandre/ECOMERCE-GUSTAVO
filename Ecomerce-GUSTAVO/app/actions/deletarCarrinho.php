<?php
    include_once("../controllers/Carrinho_Controller.php");
    $id = $_GET['id'];
    $carrinho = new Carrinho_Controller;
    $deletar = $carrinho->deletar($id);
?>
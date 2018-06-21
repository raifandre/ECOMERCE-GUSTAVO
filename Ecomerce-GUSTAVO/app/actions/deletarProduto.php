<?php
    include_once("../controllers/Produto_Controller.php");
    $id = $_GET['id'];
    $produto = new Produto_Controller;
    $deletar = $produto->deletar($id);
?>
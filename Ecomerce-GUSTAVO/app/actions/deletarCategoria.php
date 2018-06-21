<?php
    include_once("../controllers/Categoria_Controller.php");
    $id = $_GET['id'];
    $categoria = new Categoria_Controller;
    $deletar = $categoria->deletar($id);
?>
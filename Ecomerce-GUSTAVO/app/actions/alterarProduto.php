<?php
	include_once("../controllers/Produto_Controller.php");
	$produto = new Produto_Controller;

	if (isset ($_POST ["alterarProduto"])){
	    $produto->alterar();
	}
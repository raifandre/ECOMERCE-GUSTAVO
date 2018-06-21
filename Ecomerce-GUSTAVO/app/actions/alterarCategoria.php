<?php
	include_once("../controllers/Categoria_Controller.php");
	$categoria = new Categoria_Controller;

	if (isset ($_POST ["alterarCategoria"])){
	    $categoria->alterar();
	}
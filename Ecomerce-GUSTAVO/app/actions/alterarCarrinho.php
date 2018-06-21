<?php

  include_once("../controllers/Carrinho_Controller.php");
  $carrinho = new Carrinho_Controller;
  $id = $_GET ["id"];

  if (isset ($_POST ["alterarCarrinho".$id])){

      $carrinho->alterar($id);
  }
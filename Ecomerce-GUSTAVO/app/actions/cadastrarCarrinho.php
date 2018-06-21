<?php

  if (isset($_POST ["cadastrarCarrinho".$_GET['contador']])){
    echo $_POST ["cadastrarCarrinho".$_GET['contador']];

    include_once("../controllers/Carrinho_Controller.php");
    $carrinho = new Carrinho_Controller;
    $carrinho->cadastrar();

}
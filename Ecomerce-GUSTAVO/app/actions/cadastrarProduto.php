<?php
if (isset($_POST ["cadastrarProduto"])){

  include_once("../controllers/Produto_Controller.php");
  $produto = new Produto_Controller;
  $produto->cadastrar();

}
<?php
if (isset($_POST ["cadastrarCategoria"])){

  include_once("../controllers/Categoria_Controller.php");
  $categoria = new Categoria_Controller;
  $categoria->cadastrar();

}
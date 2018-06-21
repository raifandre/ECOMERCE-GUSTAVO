<?php
    include_once ('Controller.php');
    include_once (__DIR__.'../../models/carrinho.php');

class Carrinho_Controller extends Controller{

    private $carrinho;

    public function __construct() {
        parent::__construct();
        $this->carrinho = new carrinho;
    }

    public function cadastrar() {

      $this->carrinho->nome($this->input->get('nome'))
                    ->preco($this->input->get('preco'))
                    ->quantidade($this->input->get('quantidade'));

      $resultado = $this->carrinho->cadastrar();

      if($resultado) {
        echo ('Produto adicionado no carrinho.');
        return true;
      } else {
        echo ('Ocorreu um erro durante o cadastro, tente novamente mais tarde.');
        return false;
      }
    }

    public function alterar($id) {


        $this->carrinho->id($id)
                      ->quantidade($this->input->get('quantidade'));

        $resultado = $this->carrinho->alterar($id);

        if($resultado) {
          echo ('Carrinho alterado com sucesso.');
          return true;
        } else {
          echo ('Ocorreu um erro, tente novamente mais tarde.');
          return false;
        }
    }

    public function buscarId($id) {

        return $this->carrinho->buscarId($id);

    }

    public function listar() {

        return $this->carrinho->listar();

    }

    public function deletar($id) {

        try {
          $resultado = $this->carrinho->deletar($id);
        } catch(Exception $e) {
          echo $e->getMessage();
        }

        if($resultado) {
            header('Location: ../views/carrinho.php');
        }

    }

}
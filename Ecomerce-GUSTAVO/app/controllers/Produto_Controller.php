<?php
    include_once ('Controller.php');
    include_once (__DIR__.'../../models/produto.php');

class Produto_Controller extends Controller{

    private $produto;

    public function __construct() {
        parent::__construct();
        $this->produto = new produto;
    }

    public function cadastrar() {

      $this->produto->nome($this->input->get('nome'))
                    ->categoria($this->input->get('categoria'))
                    ->preco($this->input->get('preco'))
                    ->descricao($this->input->get('descricao'));

      $resultado = $this->produto->cadastrar();

      if($resultado) {
        echo ('Cadastro realizado com sucesso.');
        return true;
      } else {
        echo ('Ocorreu um erro durante o cadastro, tente novamente mais tarde.');
        return false;
      }
    }

    public function alterar() {

        $this->produto->id($this->input->get('alterarProduto'))
                      ->nome($this->input->get('nome'))
                      ->categoria($this->input->get('categoria'))
                      ->preco($this->input->get('preco'))
                      ->descricao($this->input->get('descricao'));

        $resultado = $this->produto->alterar();

        if($resultado) {
          echo ('Dados alterado com sucesso.');
          return true;
        } else {
          echo ('Ocorreu um erro, tente novamente mais tarde.');
          return false;
        }
    }

    public function buscarId($id) {

        return $this->produto->buscarId($id);

    }

    public function listar() {

        return $this->produto->listar();

    }

    public function deletar($id) {

        try {
          $resultado = $this->produto->deletar($id);
        } catch(Exception $e) {
          echo $e->getMessage();
        }

        if($resultado) {
            header('Location: ../views/listarProdutos.php');
        }

    }

}
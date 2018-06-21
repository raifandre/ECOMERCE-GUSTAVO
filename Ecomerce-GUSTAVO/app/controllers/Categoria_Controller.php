<?php
    include_once ('Controller.php');
    include_once (__DIR__.'../../models/categoria.php');

class Categoria_Controller extends Controller{

    private $categoria;

    public function __construct() {
        parent::__construct();
        $this->categoria = new categoria;
    }

    public function cadastrar() {

      $this->categoria->nome($this->input->get('nome'));

      $resultado = $this->categoria->cadastrar();

      if($resultado) {
        echo ('Cadastro realizado com sucesso.');
        return true;
      } else {
        echo ('Ocorreu um erro durante o cadastro, tente novamente mais tarde.');
        return false;
      }
    }

    public function alterar() {

        $this->categoria->id($this->input->get('alterarCategoria'))
                        ->nome($this->input->get('nome'));

        $resultado = $this->categoria->alterar();

        if($resultado) {
          echo ('Dados alterado com sucesso.');
          return true;
        } else {
          echo ('Ocorreu um erro, tente novamente mais tarde.');
          return false;
        }
    }

    public function buscarId($id) {

        return $this->categoria->buscarId($id);

    }

    public function listar() {

        return $this->categoria->listar();

    }

    public function deletar($id) {

        try {
          $resultado = $this->categoria->deletar($id);
        } catch(Exception $e) {
          echo $e->getMessage();
        }

        if($resultado) {
            header('Location: ../views/listarCategorias.php');
        }

    }

}
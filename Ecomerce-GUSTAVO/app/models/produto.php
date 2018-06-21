<?php
include_once(__DIR__."../../models/Model.php");

  class produto extends Model {
    // propriedades da classe objeto
    public $id;
    public $nome;
    public $categoria;
    public $preco;
    public $descricao;

   	public function __construct() {
        $this->open();
    }

    public function cadastrar(){

        $this->conn->beginTransaction();

        $cadastrar = $this->conn->query("INSERT INTO produto (nome, categoria, preco, descricao)
            VALUES ('$this->nome', '$this->categoria', '$this->preco', '$this->descricao')");

        if($cadastrar){

            $this->conn->commit();
            return true;

        } else {

            $this->conn->rollBack();
            return false;
        }

    }

    public function alterar() {
        $this->conn->beginTransaction();

        $alterar = $this->conn->query("UPDATE produto SET nome = '$this->nome', categoria = '$this->categoria', preco = '$this->preco', descricao = '$this->descricao' WHERE id = '$this->id'");


        if($alterar) {

            $this->conn->commit();
            return true;

        } else {

            $this->conn->rollBack();
            return false;
        }

    }

    public function deletar($id) {

        $sql = "DELETE FROM produto WHERE id = '$id'";
        $stmt = $this->conn->prepare($sql);
        $resultado = $stmt->execute();
        return $resultado;

    }

    public function buscarId($id) {
        $sql = "SELECT * FROM produto WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function listar() {
        $sql = "SELECT * FROM produto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

};
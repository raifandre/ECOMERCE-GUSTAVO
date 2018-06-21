<?php
include_once(__DIR__."../../models/Model.php");

  class carrinho extends Model {
    // propriedades da classe objeto
    public $id;
    public $nome;
    public $preco;
    public $quantidade;

    public function __construct() {
        $this->open();
    }

    public function cadastrar(){

        $this->conn->beginTransaction();

        $cadastrar = $this->conn->query("INSERT INTO carrinho (nome, preco, quantidade)
            VALUES ('$this->nome', '$this->preco', '$this->quantidade')");

        if($cadastrar){

            $this->conn->commit();
            return true;

        } else {

            $this->conn->rollBack();
            return false;
        }

    }

    public function alterar($id) {
        $this->conn->beginTransaction();

        $alterar = $this->conn->query("UPDATE carrinho SET quantidade = '$this->quantidade' WHERE id = '$this->id'");


        if($alterar) {

            $this->conn->commit();
            return true;

        } else {

            $this->conn->rollBack();
            return false;
        }

    }

    public function deletar($id) {

        $sql = "DELETE FROM carrinho WHERE id = '$id'";
        $stmt = $this->conn->prepare($sql);
        $resultado = $stmt->execute();
        return $resultado;

    }

    public function buscarId($id) {
        $sql = "SELECT * FROM carrinho WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function listar() {
        $sql = "SELECT * FROM carrinho";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

};
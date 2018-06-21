<?php
include_once(__DIR__."../../models/Model.php");

  class categoria extends Model {
    // propriedades da classe objeto
    public $id;
    public $nome;

   	public function __construct() {
        $this->open();
    }

    public function cadastrar(){

        $this->conn->beginTransaction();

        $cadastrar = $this->conn->query("INSERT INTO categoria (nome)
            VALUES ('$this->nome')");

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

        $alterar = $this->conn->query("UPDATE categoria SET nome = '$this->nome'  WHERE id = '$this->id'");


        if($alterar) {

            $this->conn->commit();
            return true;

        } else {

            $this->conn->rollBack();
            return false;
        }

    }

    public function deletar($id) {

        $sql = "DELETE FROM categoria WHERE id = '$id'";
        $stmt = $this->conn->prepare($sql);
        $resultado = $stmt->execute();
        return $resultado;

    }

    public function buscarId($id) {
        $sql = "SELECT * FROM categoria WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function listar() {
        $sql = "SELECT * FROM categoria";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

    }

};
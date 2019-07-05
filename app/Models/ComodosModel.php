<?php

namespace App\Models\ComodosModel;

use PDO;

class ComodosModel
{
    private $conexao;
    private $dsn;
    private $schema;
    private $table = 'comodos';


    function __construct()
    {
        $this->schema = "public";
        $this->dsn =
            "pgsql:host=187.105.41.24;
              port=5432;
              dbname=controlhome;
              user=postgres;
              password=210981;";
        $this->conexao = new PDO($this->dsn);
    }


    public function listAll()
    {

        $sql = "SELECT * from {$this->schema}.comodos ORDER BY descricao,id asc";

        $st = $this->conexao->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listById($id)
    {
        $sql = "SELECT * from {$this->schema}.comodos WHERE id = {$id}";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }

    public function findByAssunto($assunto)
    {
        $sql = "SELECT * from {$this->schema}.tips WHERE assunto = {$assunto}";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }

    public function save($nome)
    {
 
        if ($nome != '') {
            $sql = "INSERT INTO {$this->schema}.comodos (descricao) VALUES ('{$nome}')";
        }
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " .  $e->getMessage();
        }

        return "salvo com sucesso!";
    }

    public function update($id,$nome)
    {
  
         echo   $sql = "UPDATE {$this->schema}.comodos SET descricao = '{$nome}' WHERE id = {$id}";
      
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " .  $e->getMessage();
        }

        return "atualizado com sucesso!";
    }


    public function delete($id)
    {
        echo $sql = "DELETE from {$this->schema}.comodos where id={$id}";
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " . $e->getMessage();
        }
        return "excluido com sucesso!";
    }
}

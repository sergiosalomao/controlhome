<?php

namespace App\Models\AmbientesModel;

use PDO;

class AmbientesModel
{
    private $conexao;
    private $dsn;
    private $schema;
    private $table = 'ambientes';

    function __construct()
    {
        $this->schema = DBSCHEMA;
        $this->dsn = DSN;            
        $this->conexao = new PDO($this->dsn);
    }
    
    public function listAll()
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} ORDER BY descricao,id_ambiente asc";
        
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listById($id)
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} WHERE id = {$id}";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }

    public function save($nome)
    {
        if ($nome != '') {
            $sql = "INSERT INTO {$this->schema}.{$this->table} (descricao) VALUES ('{$nome}')";
        }else
        return "informe um nome!";

        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " .  $e->getMessage();
        }

        return "salvo com sucesso!";
    }

    public function update($id, $nome)
    {
        $sql = "UPDATE {$this->schema}.{$this->table} SET descricao = '{$nome}' WHERE id = {$id}";

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
        $sql = "DELETE from {$this->schema}.{$this->table} where id={$id}";
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " . $e->getMessage();
        }
        return "excluido com sucesso!";
    }
}

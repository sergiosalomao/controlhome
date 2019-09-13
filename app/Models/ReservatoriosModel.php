<?php

namespace App\Models\ReservatoriosModel;

use PDO;

class ReservatoriosModel
{
    private $conexao;
    private $dsn;
    private $schema;
    private $table = 'reservatorios';

    function __construct()
    {
        $this->schema = DBSCHEMA;
        $this->dsn = DSN;            
        $this->conexao = new PDO($this->dsn);
    }
    
    public function listAll()
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} ";
        
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listById($id)
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} WHERE id_reservatorio = {$id}";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }

    public function save($dados)
    {
            $sql = "INSERT INTO {$this->schema}.{$this->table} ";
            $sql .="(descricao,capacidade,id_componente) VALUES ";
            $sql.= "('{$dados['descricao']}', ";
            $sql.= "{$dados['capacidade']}, ";
            $sql.= "{$dados['id_componente']} )";
         

        try{
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " .  $e->getMessage();
        }

        return "salvo com sucesso!";
    }

    public function update($dados)
    {
       
        $sql ="UPDATE {$this->schema}.{$this->table} SET ";
        $sql.="descricao = '{$dados['descricao']}',";
        $sql.="capacidade = {$dados['capacidade']}, ";
        $sql.="id_componente = {$dados['id_componente']} ";
        $sql.="WHERE id_reservatorio = {$dados['id_reservatorio']}";
      
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
        $sql = "DELETE from {$this->schema}.{$this->table} where id_reservatorio={$id}";
      
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " . $e->getMessage();
        }
        return "excluido com sucesso!";
    }
}

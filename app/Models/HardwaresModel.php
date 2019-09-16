<?php

namespace App\Models\HardwaresModel;

use PDO;

class HardwaresModel
{
    private $conexao;
    private $dsn;
    private $schema;
    private $table = 'hardwares';

    function __construct()
    {
        $this->schema = DBSCHEMA;
        $this->dsn = DSN;
        $this->conexao = new PDO($this->dsn);
    }

    public function adicionaHardware($dados)
    {
        $sql = "INSERT INTO {$this->schema}.{$this->table}
             (descricao,modelo,serial,status,versao) VALUES
              (
              '{$dados['descricao']}',
              '{$dados['modelo']}',
              '{$dados['serial']}',
              '{$dados['status']}',
              '{$dados['versao']}'
              )";
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " .  $e->getMessage();
        }
        return "salvo com sucesso!";
    }


    public function atualizaHardware($dados)
    {
        $sql = "UPDATE {$this->schema}.{$this->table} SET ";
        $sql .= "descricao = '{$dados['descricao']}', ";
        $sql .= "modelo = '{$dados['modelo']}', ";
        $sql .= "serial = '{$dados['serial']}', ";
        $sql .= "status = '{$dados['status']}', ";
        $sql .= "versao = '{$dados['versao']}' ";
        $sql .= "WHERE id_hardware = {$dados['id_hardware']}";
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " .  $e->getMessage();
        }
        return "atualizado com sucesso!";
    }

    public function listById($id)
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} WHERE id_hardware = '{$id}'";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }
}
<?php

namespace App\Models\UsuariosModel;

use PDO;

class UsuariosModel
{
    private $conexao;
    private $dsn;
    private $schema;
    private $table = 'usuarios';

    function __construct()
    {
        $this->schema = DBSCHEMA;
        $this->dsn = DSN;
        $this->conexao = new PDO($this->dsn);
    }

    public function listAll()
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} as U ";
        $sql .= "JOIN usuarios_tipos as UT ON U.tipo = UT.id_usuario_tipo";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listById($id)
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} WHERE id_usuario = {$id}";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }

    public function listByName($nome)
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} WHERE nome = {$nome}";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }

    public function save($dados)
    {
        if ($dados != '') {
            $sql = "INSERT INTO {$this->schema}.{$this->table} (nome,email,senha,tipo,mac) ";
            $sql .= "VALUES ('{$dados['nome']}','{$dados['email']}','{$dados['senha']}','{$dados['tipo']}','{$dados['mac']}')";
        } else
            return "informe um nome!";
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " .  $e->getMessage();
        }
        return "salvo com sucesso!";
    }

    public function update($dados)
    {
        $sql = "UPDATE {$this->schema}.{$this->table} SET ";
        $sql .= "nome = '{$dados['nome']}', ";
        $sql .= "email = '{$dados['email']}', ";
        $sql .= "senha = '{$dados['senha']}', ";
        $sql .= "tipo = {$dados['tipo']}, ";
        $sql .= "mac = '{$dados['mac']}' ";
        $sql .= "WHERE id_usuario = {$dados['id_usuario']}";
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
        $sql = "DELETE from {$this->schema}.{$this->table} where id_usuario={$id}";
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " . $e->getMessage();
        }
        return "excluido com sucesso!";
    }

    public function LocalizaUsuario($email)
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} WHERE email = '{$email}'";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }
}
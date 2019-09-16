<?php

namespace App\Models\UsuariosTiposModel;

use PDO;

class UsuariosTiposModel
{
    private $conexao;
    private $dsn;
    private $schema;
    private $table = 'usuarios_tipos';

    function __construct()
    {
        $this->schema = DBSCHEMA;
        $this->dsn = DSN;
        $this->conexao = new PDO($this->dsn);
    }

    public function listAll()
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} as UT ";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}

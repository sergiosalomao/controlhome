<?php

namespace App\Models\TiposComponentesModel;

use PDO;

class TiposComponentesModel
{
    private $conexao;
    private $dsn;
    private $schema;
    private $table = 'componentes_tipos';

    function __construct()
    {
        $this->schema = DBSCHEMA;
        $this->dsn = DSN;
        $this->conexao = new PDO($this->dsn);
    }

    public function listAll()
    {
        $sql = "SELECT * from {$this->schema}.{$this->table}";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}

<?php
namespace App\Models\ComponentesModel;

use PDO;

class ComponentesModel
{
    private $conexao;
    private $dsn;
    private $schema;
    private $table = 'componentes';

    function __construct()
    {
         $this->schema = DBSCHEMA;
        $this->dsn =
            "pgsql:host=". DBHOST . ";
              port=". DBPORTA . ";
              dbname=". DBDEFAULT.";
              user=". DBUSUARIO . ";
              password=". DBSENHA. ";";
        $this->conexao = new PDO($this->dsn);
        
    }

    public function listAll()
    {
        $sql = "SELECT * from {$this->schema}.componentes ORDER BY tipo,descricao asc";
        $st = $this->conexao->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listByComodo($id,$tipo = null)
    {
        $sql = "SELECT * from {$this->schema}.componentes WHERE idcomodo = {$id}";
       
        if ($tipo != null)
         $sql = "SELECT * from {$this->schema}.componentes WHERE idcomodo = {$id} AND tipo = {$tipo}";
       
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listById($id)
    {
        $sql = "SELECT * from {$this->schema}.componentes WHERE id = {$id}";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }
    
    public function save($dados)
    {
        #verifica se salva ou edita
        if ($dados['descricao'] != '') {
            $sql = "INSERT INTO {$this->schema}.componentes
             (idcomodo,tipo,descricao,codigo) VALUES
              (
              '{$dados['idcomodo']}',
              '{$dados['tipo']}',
              '{$dados['descricao']}',
              '{$dados['codigo']}'
              )";
        }
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
         $sql = "UPDATE {$this->schema}.componentes SET 
         tipo = '{$dados['tipo']}',
         descricao = '{$dados['descricao']}',
         codigo = '{$dados['codigo']}'
          WHERE id = {$dados['id']}";
      
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
        echo $sql = "DELETE from {$this->schema}.componentes where id={$id}";
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " . $e->getMessage();
        }
        return "excluido com sucesso!";
    }
}

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
        $this->dsn = DSN;
        $this->conexao = new PDO($this->dsn);
    }

    public function listAll()
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} ORDER BY tipo,descricao asc";
        $st = $this->conexao->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listaSensores($tiposSensores)
    {
        $sql = "SELECT ";
        $sql .= "cmp.status as status,";
        $sql .= "cmp.id_componente as id_componente,";
        $sql .= "cmp.descricao as descricao_componente,";
        $sql .= "cmp.codigo as codigo_componente,";
        $sql .= "cmp.tipo as tipo_componente,";
        $sql .= "cmp.id_ambiente as id_ambiente,";
        $sql .= "amb.descricao as descricao_ambiente,";
        $sql .= "ct.descricao as descricao_tipo_componente ";
        $sql .= "FROM {$this->schema}.{$this->table} AS cmp ";
        $sql .= "JOIN ambientes AS amb ON cmp.id_ambiente = amb.id_ambiente ";
        $sql .= "JOIN componentes_tipos AS ct ON cmp.tipo = ct.id_componente_tipo ";
        $sql .= "WHERE cmp.tipo IN ({$tiposSensores}) ";
        $sql .= "ORDER BY cmp.tipo,cmp.codigo,cmp.descricao asc ";

        $st = $this->conexao->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }


    public function listaSensoresNivelAgua($tiposSensores)
    {
        $sql = "SELECT ";
        $sql .= "r.capacidade as capacidade,";
        $sql .= "cmp.status as status,";
        $sql .= "cmp.id_componente as id_componente,";
        $sql .= "cmp.descricao as descricao_componente,";
        $sql .= "cmp.codigo as codigo_componente,";
        $sql .= "cmp.tipo as tipo_componente,";
        $sql .= "cmp.id_ambiente as id_ambiente,";
        $sql .= "amb.descricao as descricao_ambiente,";
        $sql .= "ct.descricao as descricao_tipo_componente ";
        $sql .= "FROM {$this->schema}.{$this->table} AS cmp ";
        $sql .= "JOIN ambientes AS amb ON cmp.id_ambiente = amb.id_ambiente ";
        $sql .= "JOIN reservatorios AS r ON cmp.id_componente = r.id_componente ";
        $sql .= "JOIN componentes_tipos AS ct ON cmp.tipo = ct.id_componente_tipo ";
        $sql .= "WHERE cmp.tipo IN ({$tiposSensores}) ";
        $sql .= "ORDER BY cmp.tipo,cmp.descricao asc ";

        $st = $this->conexao->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listByAmbiente($id, $tipo = null)
    {
        $sql = "SELECT ";
        $sql.= "cmp.status,cmp.id_componente,cmp.descricao as descricao_componente,ct.descricao as descricao_tipo_componente,icone,codigo,id_ambiente,tipo ";
        $sql.= "from {$this->schema}.{$this->table} as cmp ";
        $sql.= "JOIN componentes_tipos as ct ON ct.id_componente_tipo = cmp.tipo ";
        $sql.= "WHERE id_ambiente = {$id}";
        $sql.= ($tipo != '') ? " AND tipo = {$tipo} " : " ";
        $sql.= "ORDER BY cmp.descricao";

        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listById($id)
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} WHERE id_componente = {$id}";
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }

    public function save($dados)
    {
        #verifica se salva ou edita
        if ($dados['descricao'] != '') {
            $sql = "INSERT INTO {$this->schema}.{$this->table}
             (id_ambiente,tipo,descricao,codigo) VALUES
              (
              '{$dados['id_ambiente']}',
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
        $sql = "UPDATE {$this->schema}.{$this->table} SET 
         tipo = {$dados['tipo']},
         descricao = '{$dados['descricao']}',
         codigo = '{$dados['codigo']}'
          WHERE id_componente = {$dados['id_componente']}";

        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " .  $e->getMessage();
        }
        return "atualizado com sucesso!";
    }

    public function updateStatus($dados)
    {
       
      $sql = "UPDATE {$this->schema}.{$this->table} SET 
         status = '{$dados[1]}'
          WHERE codigo = '{$dados[0]}'";
       
  
       
       try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " .  $e->getMessage();
        }
        return "atualizado com sucesso!";
    }


    public function updateStatusComponente($dados)
    {
      $sql = "UPDATE {$this->schema}.{$this->table} SET 
         status = '{$dados['status']}'
          WHERE codigo = '{$dados['codigo']}'";
       //var_dump($sql);
  
       
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
        $sql = "DELETE from {$this->schema}.{$this->table} where id_componente={$id}";
    
        try {
            $st = $this->conexao->prepare($sql);
            $st->execute();
        } catch (Exception $e) {
            return "erro: " . $e->getMessage();
        }
        return "excluido com sucesso!";
    }

    public function verificaStatus($codigo)
    {
        $sql = "SELECT status from {$this->schema}.{$this->table} WHERE codigo = '{$codigo}'";
        $st = $this->conexao->prepare($sql);
      
        $st->execute();
        return $st->fetch();
    }

    

    public function adicionaDados($dados)
    {
        
      #verifica se salva ou edita
      if ($dados['descricao'] != '') {
        $sql = "INSERT INTO {$this->schema}.{$this->table}
         (id_ambiente,tipo,descricao,codigo) VALUES
          (
          '{$dados['id_ambiente']}',
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

    public function listByCodigo($codigo)
    {
        $sql = "SELECT * from {$this->schema}.{$this->table} WHERE codigo = '{$codigo}'";
   
      
        $st = $this->conexao->prepare($sql);
        $st->execute();
        return $st->fetch();
    }




}

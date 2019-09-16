<?php

use App\Models\TiposComponentesModel\TiposComponentesModel;
?>

<body>
  <div class="addambiente-dashboard-panel">
    <div class="row ">
      <div id="dashboard-panel-left" class="col-3">
        <a href="../show/<?php echo $this->id_componente ?>"><i class="fas fa-arrow-circle-left icon-left"></i></a>
      </div>
      <div id="dashboard-panel-center" class="col-4">
        <span class="title-panel">ControlHome</span>
      </div>
      <div id="dashboard-panel-right" class="col-3">
        <div>
        </div>
      </div>

      <div class="container dashboard">
        <form action="../update" method="POST">

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <select class="browser-default custom-select" name="tipo">
              <option selected value="<?php echo $this->tipo ?>">Selecione um tipo de componente</option>
              <?php
              $objTipoComponente = new TiposComponentesModel();

              foreach ($objTipoComponente->listAll() as $dado) { ?>
                <option value="<?php echo $dado['id_componente_tipo'] ?>"><?php echo $dado['descricao'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="nome">Adicione um novo componente:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Ex.:Tomada" value="<?php echo $this->descricao ?>">
            <input type="text" class="form-control" id="id_componente" name="id_componente" placeholder="Ex.:Sala" value="<?php echo $this->id_componente ?>" hidden>
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="nome">Codigo de integração:</label>
            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="TS01" value="<?php echo $this->codigo ?>">
          </div>

          <div class="form-group col-sm-11 ">
            <button type="submit" class="btn btn-warning btn-block">Atualizar</button>
          </div>
        </form>
      </div>
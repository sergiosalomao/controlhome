<?php
use App\Models\ComponentesModel\ComponentesModel;
?>
<body>
<div class="addambiente-dashboard-panel">
    <div class="row ">
      <div id="dashboard-panel-left" class="col-3">
        <a href="../../../configuracao/reservatorios"><i class="fas fa-arrow-circle-left icon-left"></i></a>
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
            <label for="descricao">Alterar nome do Reservatorio</label>
            <input type="text" class="form-control" id="id_reservatorio" name="id_reservatorio"  value="<?php echo $this->id_reservatorio ?>" hidden>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $this->descricao ?>">
          </div>
          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="capacidade">Capacidade</label>
          
            <input type="text" class="form-control" id="capacidade" name="capacidade" value="<?php echo $this->capacidade ?>">
          </div>
          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <select class="browser-default custom-select" name="id_componente">
              <option selected value="<?php echo $this->tipo ?>">Componente Instalado</option>
              <?php
              $objComponentes = new ComponentesModel();

              foreach ($objComponentes->listaSensores(7) as $dado) { ?>

                <option value="<?php echo $dado['id_componente'] ?>"><?php echo $dado['descricao_componente'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-sm-11 ">
            <button type="submit" class="btn btn-warning btn-block">Atualizar</button>
          </div>
        </form>
      </div>
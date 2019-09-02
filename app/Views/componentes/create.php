<!DOCTYPE html>
<html>


<body>
  <div class="addcomodo-dashboard-panel">
    <div class="row ">
      <div id="dashboard-panel-left" class="col-3">
        <a href="../show/<?php echo $this->idcomodo?>"><i class="fas fa-arrow-circle-left icon-left"></i></a>
      </div>
      <div id="dashboard-panel-center" class="col-4">
        <span class="title-panel">ControlHome</span>
      </div>
      <div id="dashboard-panel-right" class="col-3">

        <div>
        </div>
      </div>

      <div class="container dashboard">
        <form action="../save" method="POST">
        <input type="text" class="form-control" id="idcomodo" name="idcomodo" value="<?php echo $this->idcomodo?>" hidden>
          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <select class="browser-default custom-select" name="tipo">
              <option selected>Selecione um tipo de componente</option>
              <option value="1">Tomada</option>
              <option value="2">Luz</option>
              <option value="3">Sensor</option>
            </select>
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="nome">Adicione um novo componente:</label>
            <input type="text" class="form-control" id="nome" name="descricao" placeholder="Ex.:Tomada">
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="nome">Codigo de integração:</label>
            <input type="text" class="form-control" id="nome" name="codigo" placeholder="LAMP-S01" maxlength="12">
          </div>



          <div class="form-group col-sm-11 ">
            <button type="submit" class="btn btn-warning btn-block">Adicionar</button>
          </div>
        </form>
      </div>
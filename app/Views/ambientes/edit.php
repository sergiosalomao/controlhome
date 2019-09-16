<body>
  <div class="addambiente-dashboard-panel">
    <div class="row ">
      <div id="dashboard-panel-left" class="col-3">
        <a href="../../../configuracao/ambientes"><i class="fas fa-arrow-circle-left icon-left"></i></a>
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
            <label for="nome">Alterar nome do Ambiente</label>
            <input type="text" class="form-control" id="id_ambiente" name="id_ambiente" placeholder="Ex.:Sala" value="<?php echo $this->id_ambiente ?>" hidden>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.:Sala" value="<?php echo $this->nome ?>">
          </div>
          <div class="form-group col-sm-11 ">
            <button type="submit" class="btn btn-warning btn-block">Atualizar</button>
          </div>
        </form>
      </div>
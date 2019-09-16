<?php

use App\Models\UsuariosTiposModel\UsuariosTiposModel;
?>

<body>
  <div class="addambiente-dashboard-panel">
    <div class="row ">
      <div id="dashboard-panel-left" class="col-3">
        <a href="../../configuracao/usuarios"><i class="fas fa-arrow-circle-left icon-left"></i></a>
      </div>
      <div id="dashboard-panel-center" class="col-4">
        <span class="title-panel">ControlHome</span>
      </div>
      <div id="dashboard-panel-right" class="col-3">

        <div>
        </div>
      </div>
      <div class="lista-titulo"><i class="fas fa-dice-d6" style="margin-left:0px"></i><span style="margin-left:0px"> Novo Usuario </span></div>
      <div class="container dashboard">
        <form action="save" method="POST">
          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <select class="browser-default custom-select" name="tipo">
              <option selected value="<?php echo $this->tipo ?>">Selecione um tipo de componente</option>
              <?php
              $objTipoUsuario = new UsuariosTiposModel();
              foreach ($objTipoUsuario->listAll() as $dado) { ?>
                <option value="<?php echo $dado['id_usuario_tipo'] ?>"><?php echo $dado['descricao'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" ">
          </div>

          <div class=" form-group col-sm-11 " style=" margin-left: 0px;">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha">
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="senha">Confirma Senha:</label>
            <input type="text" class="form-control" id="senha" name="senha">
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="mac">MAC:</label>
            <input type="text" class="form-control" id="mac" name="mac" placeholder="00:00:00:00:00:00">
          </div>

          <div class="form-group col-sm-11 ">
            <button type="submit" class="btn btn-warning btn-block">Adicionar</button>
          </div>
        </form>
      </div>
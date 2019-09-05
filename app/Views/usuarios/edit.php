<?php

use App\Models\UsuariosTiposModel\UsuariosTiposModel;
?>


<body>
  <div class="addambiente-dashboard-panel">
    <div class="row ">
      <div id="dashboard-panel-left" class="col-3">
        <a href="../../../configuracao/usuarios"><i class="fas fa-arrow-circle-left icon-left"></i></a>
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
              <option selected value="<?php echo $this->tipo ?>">Selecione um tipo de usuario</option>
              <?php
              $objTipoUsuario = new UsuariosTiposModel();

              foreach ($objTipoUsuario->listAll() as $dado) { ?>

                <option value="<?php echo $dado['id_usuario_tipo'] ?>"><?php echo $dado['descricao'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $this->id_usuario ?>" hidden>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.:Sala" value="<?php echo $this->nome ?>">
          </div>
          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="nome">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $this->email ?>">
          </div>
          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" value="">
          </div>
          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="confirma_senha">Confirma senha:</label>
            <input type="text" class="form-control" id="nome" name="confirma_senha" value="">
          </div>
          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="mac">mac:</label>
            <input type="text" class="form-control" id="mac" name="mac" placeholder="Ex.:Sala" value="<?php echo $this->mac ?>">
          </div>
          <div class="form-group col-sm-11 ">
            <button type="submit" class="btn btn-warning btn-block">Atualizar</button>
          </div>
        </form>
      </div>

      <script>
        </
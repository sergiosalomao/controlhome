<?php

use App\Models\UsuariosTiposModel\UsuariosTiposModel;
?>

<body>
  <div class="addambiente-dashboard-panel">
    <div class="row ">
      <div id="dashboard-panel-left" class="col-3">

      </div>
      <div id="dashboard-panel-center" class="col-4">
        <span class="title-panel">Autenticação </span>
      </div>
      <div id="dashboard-panel-right" class="col-3">

        <div>
        </div>
      </div>

      <div class="container dashboard">
        <form action="login/autentica" method="POST">
          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha">
          </div>

          <div class="form-group col-sm-11 " style="margin-left: 0px;">
            <label for="mac">MAC:</label>
            <input type="text" class="form-control" id="mac" name="mac">
          </div>

          <div class="form-group col-sm-11 ">
            <button type="submit" class="btn btn-warning btn-block">Autenticar</button>
          </div>
        </form>
      </div>
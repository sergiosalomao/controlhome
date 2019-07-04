<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="../../../public/css/main.css">
  <link href="../../../libs/font-awesome/css/all.css" rel="stylesheet"> <!--load all styles -->

</head>

<body>
<div class="addcomodo-dashboard-panel">
    <div class="row ">
      <div id="dashboard-panel-left" class="col-3">
        <a href="../../configuracao"><i class="fas fa-arrow-circle-left icon-left"></i></a>
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
            <label for="nome">Alterar nome do comodo</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="Ex.:Sala" value="<?php echo $this->id ?>" hidden>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.:Sala" value="<?php echo $this->nome ?>">
          </div>
          <div class="form-group col-sm-11 ">
            <button type="submit" class="btn btn-warning btn-block">Atualizar</button>
          </div>
        </form>
      </div>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../libs/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/main.css">
  <link href="../libs/font-awesome/css/all.css" rel="stylesheet"> <!--load all styles -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../public/js/functions.js"></script>
</head>
<body>
  <div class="container dashboard-panel">
    <div class="row">
      <div id="dashboard-panel-left" class="col-3"><i class="fas fa-thermometer-quarter"></i><span> 30°C<span></div>
      <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
      <div id="dashboard-panel-right" class="col-4"><span id="relogio"></span>pm<div>
        </div>
      </div>

      <div class="dashboard">
        <div class="container">
          <table class="table ">
            <tr>
              <td style="border:none"><a href="seguranca.php"><img src="../public/images/seguranca.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="temperatura.php"><img src="../public/images/temperatura.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="iluminacao"><img src="../public/images/iluminacao.png" width="86pxpx" height="86pxpx"></a></td>
            </tr>

            <tr>
              <td style="border:none"><a href="agua.php"><img src="../public/images/agua.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="energia.php"><img src="../public/images/energia.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="tomadas.php"><img src="../public/images/tomada.png" width="86pxpx" height="86pxpx"></a></td>
            </tr>

            <tr>
              <td style="border:none"><a href="seguranca.php"><img src="../public/images/camera.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="portas.php"><img src="../public/images/porta.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="configuracao"><img src="../public/images/conf.png" width="86pxpx" height="86pxpx"></a></td>
            </tr>
          </table>
        </div>

        <div id="main-footer"><span >Developer Sergio Salomão</span></div>
</body>
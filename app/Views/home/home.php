<script>
  //TEMPO DOS SENSORES DE TEMPERATURA
  setInterval(function() {
      verificaSensores("ST1");
    },
    <?php echo TEMPO_SENSOR_TEMPERATURA ?>)
</script>

<body>
  <div class="container dashboard-panel">
    <div class="row">
      <div id="dashboard-panel-left" class="col-3"><i class="fas fa-thermometer-quarter"></i><span id="sensor-ST1"><span></div>
      <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
      <div id="dashboard-panel-right" class="col-4"><span id="relogio"></span>
        <div>
        </div>
      </div>

      <div class="container">
        <div class="dashboard">
          <table class="table table stripped ">
            <tr>
              <!-- <td style="border:none"><a href="seguranca.php"><img src="../public/images/seguranca.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="temperatura.php"><img src="../public/images/temperatura.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="iluminacao"><img src="../public/images/iluminacao.png" width="86pxpx" height="86pxpx"></a></td> -->
              <td style="border:none"><a href="seguranca.php"><i class="fas fa-user icon-home"></i></a></td>
              <td style="border:none"><a href="sensores/temperatura"><i class="fas fa-temperature-low icon-home"></i></a></td>
              <td style="border:none"><a href="iluminacao"><i class="fas fa-lightbulb icon-home"></i></a></td>
            </tr>

            <tr>
              <!-- <td style="border:none"><a href="agua.php"><img src="../public/images/agua.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="energia.php"><img src="../public/images/energia.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="tomadas.php"><img src="../public/images/tomada.png" width="86pxpx" height="86pxpx"></a></td> -->
              <td style="border:none"><a href="sensores/agua"><i class="fas fa-tint icon-home"></i></a></td>
              <td style="border:none"><a href="sensores/energia"><i class="fas fa-bolt icon-home"></i></a></td>
              <td style="border:none"><a href="sensores/presenca"><i class="fas fa-compress-arrows-alt icon-home"></i></a></td>
            </tr>

            <tr>
              <!-- <td style="border:none"><a href="seguranca.php"><img src="../public/images/camera.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="portas.php"><img src="../public/images/porta.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="configuracao"><img src="../public/images/conf.png" width="86pxpx" height="86pxpx"></a></td>
               -->
              <td style="border:none"><a href="seguranca"><i class="fas fa-video icon-home"></i></a></td>
              <td style="border:none"><a href="sensores/portas"><i class="fas fa-door-open icon-home"></i></a></td>
              <td style="border:none"><a href="configuracao"><i class="fas fa-cog icon-home"></i></a></td>
            </tr>

          </table>

        </div>
      </div>
      <div id="main-footer"><span>Developer Sergio Salomão</span></div>

</body>
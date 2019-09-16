<?php

use App\Models\ComponentesModel\ComponentesModel;
?>

<body>
  <div class="configuracao-dashboard-panel">
    <div class="row">
      <div id="dashboard-panel-left" class="col-3"><a href="../"><i class="fas fa-home icon-left"></i></a></div>
      <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
      <div id="dashboard-panel-right" class="col-4">
        <div>
        </div>
      </div>

      <div class="container dashboard-configuracao">
        <table class="table table-hover table-striped">
          <?php
          $componentes = new ComponentesModel();
          $dados = $componentes->listaSensores(3);
          foreach ($dados as $key => $lista) {
            $codigo = $lista['codigo_componente'];
            $item = $lista['codigo_componente'] . '-' . $lista['descricao_tipo_componente'] . '<br>Ambiente : ' . $dados[$key]['descricao_ambiente'];
            $status = explode(";", $lista['status']);
            ?>
            <tr>
              <td style="width:1%;border:none;color:goldenrod"><i class="fas fa-stroopwafel" style="margin-left:5px"></i></td>
              <td style="width:1%;border:none;color:goldenrod"><?php echo $item ?></a></td>
              <td style="width:1%;border:none;color:goldenrod">
                Temperatura: <span id="sensor-<?php echo $codigo ?>"><?php echo  $status[0]; ?></span><br>
                Umidade: <span id="sensor-SU<?php echo $codigo[2] ?>"><?php echo  $status[1]; ?></span>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
</body>

<script>
  //TEMPO DOS SENSORES DE TEMPERATURA
  setInterval(function() {
      verificaSensoresTemperatura("C01");
      verificaSensoresTemperatura("C02");
      verificaSensoresTemperatura("C03");
      verificaSensoresTemperatura("C04");
      verificaSensoresTemperatura("C05");
      verificaSensoresTemperatura("C06");
      verificaSensoresTemperatura("C07");
      verificaSensoresTemperatura("C08");
      verificaSensoresTemperatura("C09");
      verificaSensoresTemperatura("C10");
    },
    <?php echo TEMPO_SENSOR_TEMPERATURA ?>)

  function verificaSensoresTemperatura(codigo) {
    $.get({
      dataType: 'text',
      url: "../configuracao/componentes/verificastatus/" + codigo,
      success: function(data) {
        console.log(data);
        data = data.split(';')
        temperatura = data[0];
        umidade = data[1];
        document.getElementById("sensor-" + codigo).innerText = temperatura + "°C";
        if (temperatura > 26) document.getElementById("sensor-" + codigo).innerText = temperatura + "°C[H]";
        document.getElementById("sensor-SU" + codigo[2]).innerText = umidade + "%";
        if (umidade < 55) document.getElementById("sensor-SU" + codigo[2]).innerText = umidade + "%[L]";
      },
      error: function(error) {
        console.log("erro");
        document.getElementById("sensor-" + codigo).innerText = "E°C";
        document.getElementById("sensor-SU" + codigo[2]).innerText = "E%";
      }
    });
  }
</script>
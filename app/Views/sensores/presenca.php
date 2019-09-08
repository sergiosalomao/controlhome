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
                    $dados = $componentes->listaSensores(5);
                    foreach ($dados as $key => $lista) {
                        $codigo = $lista['codigo_componente'];
                        $item = $lista['codigo_componente'] . '-' . $lista['descricao_tipo_componente'] . '<br>Ambiente : ' . $dados[$key]['descricao_ambiente'];
                        $status = explode(";",$lista['status']);
                        if ($status[0] == 0) {
                            $msg = 'Observando...';
                            $tempo = 0;
                        }

                        if ($status[0] == 1){
                            $msg = 'Presença detectada';
                            $tempo = "Tempo: " . $status[1];
                        } 
                        ?>
                        <tr>
                            <td style="width:1%;border:none;color:goldenrod"><i class="fas fa-stroopwafel" style="margin-left:5px"></i></td>
                            <td style="width:1%;border:none;color:goldenrod"><?php echo $item ?></a></td>
                            <td style="width:1%;border:none;color:goldenrod">
                                <span id="sensor-<?php echo $codigo?>" ><?php echo $msg?></span><br>
                                <span id="sensor-SU<?php echo $key+1?>"><?php echo $tempo?></span>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
</body>
<script>
  //TEMPO DOS SENSORES DE TEMPERATURA
  setInterval(function() {
    verificaSensoresPresenca("SP1");
    verificaSensoresPresenca("SP2");
    
      
    },
    <?php echo TEMPO_SENSOR_PRESENCA ?>)


    function verificaSensoresPresenca(codigo) {
    
    $.get({
      url: "configuracao/componentes/verificastatus/" + codigo,
      success: function(data) {
        data = data.split(';')
        status = data[0];
        if (status == 0) status = 'Observando...';
        if (status == 1) status = 'Presença detectada';
        tempo = data[1];
        document.getElementById("sensor-"+ codigo).innerText = status ;
        document.getElementById("sensor-SPT"+ codigo[2]).innerText = tempo + "seg";
       
      
       
      },
      error: function(error) {
        console.log("erro");
        document.getElementById("sensor-"+ codigo).innerText = "E";
        document.getElementById("sensor-SPT"+ codigo[2]).innerText = "E";
      }
    });
  }

  function verificaSensoresPresenca(codigo) {
    tempo = 0;
    status ='';
    $.get({
      url: "../configuracao/componentes/verificastatus/" + codigo,
      success: function(data) {
        data = data.split(';')
       status = data[0];
         tempo = data[1] ;
        if (status == 0) status = 'Observando...';
        if (status == 1) status = 'Presença detectada';
       
       
        document.getElementById("sensor-"+ codigo).innerText = status ;
       
        document.getElementById("sensor-SPT"+ codigo[2]).innerText = tempo + "seg";
         
      },
      error: function(error) {
        console.log("erro");
        document.getElementById("sensor-"+ codigo).innerText = "E";
        document.getElementById("sensor-SPT"+ codigo[2]).innerText = "E";
      }
    });
  }





</script>

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
                    $dados = $componentes->listaSensoresNivelAgua(7);
                   
               
                    foreach ($dados as $key => $lista) {
                        $codigo = $lista['codigo_componente'];
                        $item = $lista['codigo_componente'] . '-' . $lista['descricao_tipo_componente'] . '<br>Ambiente : ' . $dados[$key]['descricao_ambiente'];
                        
                        ?>
                        <tr>
                            <td style="width:1%;border:none;color:goldenrod"><i class="fas fa-stroopwafel" style="margin-left:5px"></i></td>
                            <td style="width:1%;border:none;color:goldenrod"><?php echo $item ?></a></td>
                            <td style="width:1%;border:none;color:goldenrod">
                                Capacidade: <span id="capacidade-<?php echo $codigo?>" ><?php echo $lista['capacidade']?>lts</span><br>
                                Litros: <span id="sensor-<?php echo $codigo?>" ><?php echo $lista['status']?></span><br>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
</body>
<script>
  //TEMPO DOS SENSORES DE TEMPERATURA
  setInterval(function() {
    verificaSensoresNivelAgua("CX1");
   
      
    },
    <?php echo TEMPO_SENSOR_TEMPERATURA ?>)


    function verificaSensoresNivelAgua(codigo) {

    $.get({
      url: "../configuracao/componentes/verificastatus/" + codigo,
      success: function(data) {
         document.getElementById("sensor-"+ codigo).innerText = data ;
         console.log(data)
       },
      error: function(error) {
        console.log("erro");
        document.getElementById("sensor-"+ codigo).innerText = "E";
      
      }
    });
  }





</script>
<script>
    //TEMPO DOS SENSORES DE TEMPERATURA
    setInterval(function() {
            verificaSensorTemperatura("http://<?php echo HOST_CENTRAL_1 ?>/sensores/temperatura/all");
        },
        <?php echo TEMPO_SENSOR_TEMPERATURA ?>)
</script>
<?php

use App\Models\ComponentesModel\ComponentesModel;
?>
<!DOCTYPE html>
<html>

<body>
    <div class="configuracao-dashboard-panel">
        <div class="row">
            <div id="dashboard-panel-left" class="col-3"><a href="."><i class="fas fa-home icon-left"></i></a></div>
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
                        $item = $dados[$key]['codigosensor'] . '-' . $dados[$key]['descricaotipocomponente'] . '<br>Ambiente : ' . $dados[$key]['descricaocomodo'];
                        ?>
                        <tr>
                            <td style="width:1%;border:none;color:goldenrod"><i class="fas fa-stroopwafel" style="margin-left:5px"></i></a></td>
                            <td style="width:1%;border:none;color:goldenrod"><?php echo $item ?></a></td>
                            <td style="width:1%;border:none;color:goldenrod">
                                Temperatura: <span id="sensor-" + <?php echo $codigo ?>></span><br>
                                Umidade: <span id="sensor-" + <?php echo $codigo ?>></span>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
</body>
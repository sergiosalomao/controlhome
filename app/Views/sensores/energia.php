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
            <div class="lista-titulo"><i class="fas fa-dice-d6" style="margin-left:10px"></i><span style="margin-left:10px"> Sensor de consumo eletrico </span></div>
            <div class="container dashboard-configuracao">
                <table class="table table-hover table-striped">
                    <?php
                    $componentes = new ComponentesModel();
                    $dados = $componentes->listaSensores(8);
                    foreach ($dados as $key => $lista) {
                        $codigo = $dados[$key]['codigo_componente'];
                        $item = $dados[$key]['codigo_componente'] . '-' . $dados[$key]['descricao_tipo_componente'] . '<br>Ambiente : ' . $dados[$key]['descricao_ambiente'];
                        $status = explode("|", $dados[$key]['status']);
                        ?>
                        <tr>
                            <td style="width:1%;border:none;color:goldenrod"><i class="fas fa-stroopwafel" style="margin-left:5px"></i></td>
                            <td style="width:1%;border:none;color:goldenrod"><?php echo $item ?></a></td>
                            <td style="width:1%;border:none;color:goldenrod">
                                Consumo Atual: <span id="sensor-<?php echo $codigo ?>"><?php isset($status[0]) ? $status[0] : "" ?></span><br>
                                Consumo Medio/dia: <span id="sensor-<?php echo $codigo ?>"><?php isset($status[0]) ? $status[0] : "" ?></span><br>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
</body>
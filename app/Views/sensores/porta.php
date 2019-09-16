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
                    $dados = $componentes->listaSensores(6);
                    foreach ($dados as $key => $lista) {
                        $codigo = $dados[$key]['codigo_componente'];
                        $item = $dados[$key]['codigo_componente'] . '-' . $dados[$key]['descricao_tipo_componente'] . '<br>Ambiente : ' . $dados[$key]['descricao_ambiente'];
                        $status = explode("|", $dados[$key]['status']);
                        if ($status[0] == 0) {
                            $msg = 'Fechada';
                            $tempo = 0;
                        }
                        if ($status[0] == 1) {
                            $msg = 'Aberta';
                        }
                        ?>
                        <tr>
                            <td style="width:1%;border:none;color:goldenrod"><i class="fas fa-stroopwafel" style="margin-left:5px"></i></td>
                            <td style="width:1%;border:none;color:goldenrod"><?php echo $item ?></a></td>
                            <td style="width:1%;border:none;color:goldenrod">
                                <span id="sensor-<?php echo $codigo ?>"><?php echo $msg ?></span><br>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
</body>
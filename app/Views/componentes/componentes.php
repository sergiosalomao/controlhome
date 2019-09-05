<?php


use App\Models\ComponentesModel\ComponentesModel;
use App\Models\AmbientesModel\AmbientesModel;

?>

<!DOCTYPE html>
<html>


<body>
    <div class="configuracao-dashboard-panel">
        <div class="row">
            <div id="dashboard-panel-left" class="col-3"> <a href="../../configuracao"><i class="fas fa-arrow-circle-left icon-left"></i></a></div>
            <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
            <div id="dashboard-panel-right" class="col-4"><a href="../create/<?php echo $this->id_ambiente?>"><i class="fas fa-plus-circle icon-right"></i></a>
                <div>
                </div>
            </div>

            <?php 
                $objAmbiente = new AmbientesModel();
                $dadosAmbiente = $objAmbiente->listById($this->id_ambiente);
            ?>

            <div class="lista-titulo"><i class="fas fa-dice-d6" style="margin-left:10px" ></i><span style="margin-left:10px"> Ambiente /  <?php echo $dadosAmbiente['descricao']?></span></div>
            
            <div class="container dashboard-configuracao">
                <table class="table table-hover table-striped">

                    <?php
                       $objComponentes = new ComponentesModel();
                       $dadosComponentes = $objComponentes->listByAmbiente($this->id_ambiente);
                    foreach ($dadosComponentes as $key => $lista){
                      
                   
                     ?>
                        <tr>
                            <td style="width:10%;border:none"><a href="configuracao"><i class="<?php echo $dadosComponentes[$key]['icone'] ?>" style="margin-left:5px"></i></a></td>
                            <td style="width:60%;border:none"><?php echo $dadosComponentes[$key]['descricao'] ?></td>
                            <td style="width:60%;border:none"><?php echo $dadosComponentes[$key]['codigo'] ?></td>
                            <td style="width:10%;border:none"><a href="../edit/<?php echo $dadosComponentes[$key]['id_componente'] ?>"><i class="fas fa-edit"></i></a></td>
                            <td style="width:10%;border:none"><a href="<?php echo "../delete/" . $dadosComponentes[$key]['id_componente'] ?> "><i class="fas fa-trash"></i></a></td>
                            <!-- <td style="width:10%;border:none"><a href="addcomponente"><i class="fas fa-wrench"></i></a></td> -->
                        </tr>
                    <?php } ?>



                </table>

            </div>
</body>

<?php


use App\Models\ComponentesModel\ComponentesModel;
use App\Models\ComodosModel\ComodosModel;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
    <link href="../../../libs/font-awesome/css/all.css" rel="stylesheet">
    <!--load all styles -->
    <link rel="stylesheet" href="../../../public/css/main.css">

</head>

<body>
    <div class="configuracao-dashboard-panel">
        <div class="row">
            <div id="dashboard-panel-left" class="col-3"> <a href="../../configuracao"><i class="fas fa-arrow-circle-left icon-left"></i></a></div>
            <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
            <div id="dashboard-panel-right" class="col-4"><a href="../create/<?php echo $this->idcomodo?>"><i class="fas fa-plus-circle icon-right"></i></a>
                <div>
                </div>
            </div>

            <?php 
                $comodo = new ComodosModel();
                $dados = $comodo->listById($this->idcomodo);
           
            ?>

            <div class="lista-titulo"><i class="fas fa-dice-d6" style="margin-left:10px" ></i><span style="margin-left:10px"> Componentes - <?php echo $dados['descricao']?></span></div>
            
            <div class="container dashboard-configuracao">
                <table class="table table-hover table-striped">

                    <?php
                       $comp = new ComponentesModel();
                       $dados = $comp->listByComodo($this->idcomodo);
                    foreach ($dados as $key => $lista){
                      
                    if ($dados[$key]['tipo'] == 1) {
                            $tipo = 'Tomada';
                            $icone = 'fas fa-plug';
                        }
                    if ($dados[$key]['tipo'] == 2) {
                        $tipo = 'Luz';
                        $icone = "fas fa-lightbulb";
                    }
                    if ($dados[$key]['tipo'] == 3) {
                        $tipo = 'Sensor';
                        $icone="fas fa-stroopwafel";
                    } 
                     ?>
                        <tr>
                            <td style="width:10%;border:none"><a href="configuracao"><i class="<?php echo $icone ?>" style="margin-left:5px"></i></a></td>
                            <td style="width:60%;border:none"><?php echo $dados[$key]['descricao'] ?></td>
                            <td style="width:60%;border:none"><?php echo $dados[$key]['codigo'] ?></td>
                            <td style="width:10%;border:none"><a href="../edit/<?php echo $dados[$key]['id'] ?>"><i class="fas fa-edit"></i></a></td>
                            <td style="width:10%;border:none"><a href="<?php echo "../delete/" . $dados[$key]['id'] ?> "><i class="fas fa-trash"></i></a></td>
                            <!-- <td style="width:10%;border:none"><a href="addcomponente"><i class="fas fa-wrench"></i></a></td> -->
                        </tr>
                    <?php } ?>



                </table>

            </div>
</body>

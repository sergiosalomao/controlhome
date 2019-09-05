<?php
use App\Models\UsuariosModel\UsuariosModel;
?>

<div class="configuracao-dashboard-panel">
    <div class="row">
        <div id="dashboard-panel-left" class="col-3"><a href="../"><i class="fas fa-home icon-left"></i></a></div>
        <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
        <div id="dashboard-panel-right" class="col-4"><a href="usuarios/create"><i class="fas fa-plus-circle icon-right"></i></a>
            <div>
            </div>
        </div>

        <div class="lista-titulo"><i class="fas fa-dice-d6" style="margin-left:10px" ></i><span style="margin-left:10px"> Lista de Usuarios </span></div>

        <div class="container dashboard-configuracao">
            <table class="table table-hover table-striped">

                <?php
                $objUsuarios = new UsuariosModel();
                $dados = $objUsuarios->listAll();
                foreach ($dados as $key => $lista) { ?>
                    <tr>
                        <td style="width:10%;border:none"><a href="configuracao"><i class="fas fa-map" style="margin-left:5px"></i></a></td>
                        <td style="width:60%;border:none"><?php echo $dados[$key]['nome'] ?></td>
                        <td style="width:60%;border:none"><?php echo $dados[$key]['descricao'] ?></td>
                        <td style="width:10%;border:none"><a href="usuarios/showedit/<?php echo $dados[$key]['id_usuario'] ?>"><i class="fas fa-edit"></i></a></td>
                        <td style="width:10%;border:none"><a href="usuarios/delete/<?php echo $dados[$key]['id_usuario'] ?> "><i class="fas fa-trash"></i></a></td>
                        <td style="width:10%;border:none"><a href="componentes/show/<?php echo $dados[$key]['id_usuario'] ?>"><i class="fas fa-wrench"></i></a></td>
                    </tr>
                <?php } ?>



            </table>

        </div>
        </body>
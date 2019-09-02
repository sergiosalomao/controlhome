<?php

use App\Models\ComodosModel\ComodosModel;

?>

<!DOCTYPE html>
<html>

<body>
 <div class="configuracao-dashboard-panel">
    <div class="row">
        <div id="dashboard-panel-left" class="col-3"><a href="."><i class="fas fa-home icon-left"></i></a></div>
        <div id="dashboard-panel-center" class="col-5" ><span class= "title-panel">ControlHome</span></div>
        <div id="dashboard-panel-right"class="col-4" ><div>
    </div>
</div>

        <div class="container dashboard-configuracao">
        <table class="table table-hover table-striped">

            <?php 
                $comodos = new ComodosModel();
                $dados = $comodos->listAll();
                foreach($dados as $key=>$lista)
                
                {?>
                <tr>
                    <td style="width:10%;border:none"><a href="iluminacao"><i class="fas fa-map" style="margin-left:5px"></i></a></td>
                    <td style="width:80%;border:none"><a href="iluminacao/componentes/<?php echo $dados[$key]['id'] ?> "><?php echo $dados[$key]['descricao']?></a></td>
                   
                    <td style="width:10%;border:none;"><a href="iluminacao/componentes/<?php echo $dados[$key]['id'] ?>"><i class="fas fa-eye"></i></a></td>
                </tr>
            <?php } ?>

   

</table>  
      
      </div> 
</body>

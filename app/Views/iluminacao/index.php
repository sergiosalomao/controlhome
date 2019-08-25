<?php

use App\Models\ComodosModel\ComodosModel;

?>

<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../libs/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/main.css">
  <link href="../libs/font-awesome/css/all.css" rel="stylesheet"> <!--load all styles -->
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="../public/js/functions.js"></script>
</head>
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

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
            <div id="dashboard-panel-left" class="col-3"> <a href="../../iluminacao"><i class="fas fa-arrow-circle-left icon-left"></i></a></div>
            <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
            <div id="dashboard-panel-right" class="col-4">
               
            </div>

            

            <div class="lista-titulo"><i class="fas fa-dice-d6" style="margin-left:10px" ></i><span style="margin-left:10px"> Acionadores </span></div>
            
            <div class="container ">
                <table class="table table-striped ">
                    
                    <?php
                       $comp = new ComponentesModel();
                       $dados = $comp->listByComodo($this->idcomodo,2);
                    foreach ($dados as $key => $lista){
                      
                //    legenda de icones
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
                            <td style="width:10%;border:none"><a href="#"><i class="<?php echo $icone ?>" style="margin-left:5px"></i></a></td>
                            <td style="width:80%;border:none"><?php echo $dados[$key]['descricao'] ?></td>
                            <td class="icon-acionador" style="width:10%;border:none;"><i id="comp-<?php echo $dados[$key]['codigo'] ?>"  class="fas fa-toggle-off " ></i></td>
                        </tr>
                    <?php } ?>



                </table>

            </div>
</body>

<script>

$(document).ready(function(){
    consulta()
});


function ativa(modulo){

$.get({
    url : 'http://192.168.0.99/'+ modulo +"/1",

   
   success: function(data){
    console.log('http://192.168.0.99/'+ modulo + "/1")
   },   
       
    error : function(error) {
        alert("erro")
    }

});
}


function desativa(modulo){

$.get({
    url : 'http://192.168.0.99/'+ modulo+"/0",
   success: function(data){
      console.log('http://192.168.0.99/'+ modulo+"/0")
   },   
       
    error : function(error) {
        alert("erro")
    }

});
}



function consulta(){

$.get({
    url : 'http://192.168.0.99/',
    data : 'status',
    success: function(data){
      
       var dados = data.split("|");
       console.log(dados);
     
       dados.forEach(imprimir);
      
       function imprimir(item, index, arr) 
       {
         var i = item.split(":");
         
         if(i[1] == 1){
                $("#comp-"+ i).removeClass("fa-toggle-off");   
                $("#comp-"+ i).addClass("fa-toggle-on"); 
                $("#comp-"+ i).attr("status","1"); 
            }

            if(i[1] == 0){
                $("#comp-"+ i).removeClass("fa-toggle-on");   
                $("#comp-"+ i).addClass("fa-toggle-off");   
                $("#comp-"+ i).attr("status","0"); 
            }
        }
       
    },
    error : function(error) {
        alert("erro")
    }
});
}

M1R1 = "M1R1";
M1R2 = "M1R2";
M1R3 = "M1R3";
M1R4 = "M1R4";
M1R5 = "M1R5";
M1R6 = "M1R6";
M1R7 = "M1R7";
M1R8 = "M1R8";

         $("#comp-"+M1R1).click(function()
         {
            if($("#comp-"+M1R1).attr("status") == 1){
                $("#comp-"+ M1R1).addClass("fa-toggle-off");   
                $("#comp-"+ M1R1).removeClass("fa-toggle-on"); 
                $("#comp-"+ M1R1).attr("status","0"); 
                desativa(M1R1);
            }
            else
            if($("#comp-"+M1R1).attr("status") == 0){
                $("#comp-"+ M1R1).addClass("fa-toggle-on");   
                $("#comp-"+ M1R1).removeClass("fa-toggle-off");   
                $("#comp-"+ M1R1).attr("status","1"); 
                ativa(M1R1);
                
            };
         })

        $("#comp-"+M1R2).click(function()
         {
            if($("#comp-"+M1R2).attr("status") == 1){
                $("#comp-"+ M1R2).addClass("fa-toggle-off");   
                $("#comp-"+ M1R2).removeClass("fa-toggle-on"); 
                $("#comp-"+ M1R2).attr("status","0"); 
                desativa(M1R2);
            }
            else
            if($("#comp-"+M1R2).attr("status") == 0){
                $("#comp-"+ M1R2).addClass("fa-toggle-on");   
                $("#comp-"+ M1R2).removeClass("fa-toggle-off");   
                $("#comp-"+ M1R2).attr("status","1"); 
                ativa(M1R2);
                
            };
         })

         $("#comp-"+M1R3).click(function()
         {
            if($("#comp-"+M1R3).attr("status") == 1){
                $("#comp-"+ M1R3).addClass("fa-toggle-off");   
                $("#comp-"+ M1R3).removeClass("fa-toggle-on"); 
                $("#comp-"+ M1R3).attr("status","0"); 
                desativa(M1R3);
            }
            else
            if($("#comp-"+M1R3).attr("status") == 0){
                $("#comp-"+ M1R3).addClass("fa-toggle-on");   
                $("#comp-"+ M1R3).removeClass("fa-toggle-off");   
                $("#comp-"+ M1R3).attr("status","1"); 
                ativa(M1R3);
                
            };
         })

        $("#comp-"+M1R4).click(function()
         {
            if($("#comp-"+M1R4).attr("status") == 1){
                $("#comp-"+ M1R4).addClass("fa-toggle-off");   
                $("#comp-"+ M1R4).removeClass("fa-toggle-on"); 
                $("#comp-"+ M1R4).attr("status","0"); 
                desativa(M1R4);
            }
            else
            if($("#comp-"+M1R4).attr("status") == 0){
                $("#comp-"+ M1R4).addClass("fa-toggle-on");   
                $("#comp-"+ M1R4).removeClass("fa-toggle-off");   
                $("#comp-"+ M1R4).attr("status","1"); 
                ativa(M1R4);
                
            };
         })

         $("#comp-"+M1R5).click(function()
         {
            if($("#comp-"+M1R5).attr("status") == 1){
                $("#comp-"+ M1R5).addClass("fa-toggle-off");   
                $("#comp-"+ M1R5).removeClass("fa-toggle-on"); 
                $("#comp-"+ M1R5).attr("status","0"); 
                desativa(M1R5);
            }
            else
            if($("#comp-"+M1R5).attr("status") == 0){
                $("#comp-"+ M1R5).addClass("fa-toggle-on");   
                $("#comp-"+ M1R5).removeClass("fa-toggle-off");   
                $("#comp-"+ M1R5).attr("status","1"); 
                ativa(M1R5);
                
            };
         })

        $("#comp-"+M1R6).click(function()
         {
            if($("#comp-"+M1R6).attr("status") == 1){
                $("#comp-"+ M1R6).addClass("fa-toggle-off");   
                $("#comp-"+ M1R6).removeClass("fa-toggle-on"); 
                $("#comp-"+ M1R6).attr("status","0"); 
                desativa(M1R6);
            }
            else
            if($("#comp-"+M1R6).attr("status") == 0){
                $("#comp-"+ M1R6).addClass("fa-toggle-on");   
                $("#comp-"+ M1R6).removeClass("fa-toggle-off");   
                $("#comp-"+ M1R6).attr("status","1"); 
                ativa(M1R6);
                
            };
         })


         $("#comp-"+M1R7).click(function()
         {
            if($("#comp-"+M1R7).attr("status") == 1){
                $("#comp-"+ M1R7).addClass("fa-toggle-off");   
                $("#comp-"+ M1R7).removeClass("fa-toggle-on"); 
                $("#comp-"+ M1R7).attr("status","0"); 
                desativa(M1R7);
            }
            else
            if($("#comp-"+M1R7).attr("status") == 0){
                $("#comp-"+ M1R7).addClass("fa-toggle-on");   
                $("#comp-"+ M1R7).removeClass("fa-toggle-off");   
                $("#comp-"+ M1R7).attr("status","1"); 
                ativa(M1R7);
                
            };
         })

         $("#comp-"+M1R8).click(function()
         {
            if($("#comp-"+M1R8).attr("status") == 1){
                $("#comp-"+ M1R8).addClass("fa-toggle-off");   
                $("#comp-"+ M1R8).removeClass("fa-toggle-on"); 
                $("#comp-"+ M1R8).attr("status","0"); 
                desativa(M1R8);
            }
            else
            if($("#comp-"+M1R8).attr("status") == 0){
                $("#comp-"+ M1R8).addClass("fa-toggle-on");   
                $("#comp-"+ M1R8).removeClass("fa-toggle-off");   
                $("#comp-"+ M1R8).attr("status","1"); 
                ativa(M1R8);
                
            };
         })

</script>

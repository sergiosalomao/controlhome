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
  <div class="container dashboard-panel">
    <div class="row">
      <div id="dashboard-panel-left" class="col-3"><i class="fas fa-thermometer-quarter"></i><span id="sensor-T1">??<span></div>
      <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
      <div id="dashboard-panel-right" class="col-4"><span id="relogio"></span>pm<div>
    </div>
</div>



<script>

$.ajax ({ 
  url : "http://192.168.0.99",
  
  })
  .done( function ( data ) { 
  console.log(data);
  })
  
</script>


<script>
function verificaTemperatura(sensor){

$.ajax({
    url : 'http://192.168.0.99/'+ sensor,
   success: function(data){
    dados = data.split("|");
    dados.forEach(verifica);
   
      function verifica(item, index, arr) 
      {
        var i = item.split(":");
        val = i[1];
        
        if(i[0] == "T1" && val <= 25){
               $("#sensor-T1").text(" "+val.substring(0,4)+"°C"); 
               //$("#comp-"+ i).removeClass("fa-toggle-off");   
              // $("#comp-"+ i).addClass("fa-toggle-on"); 
              // $("#comp-"+ i).attr("status","1"); 
           }
          else
           if(i[0] == "T1" && val > 25){
            $("#sensor-T1").text(" "+val.substring(0,4)+"°C"); 
               //$("#comp-"+ i).removeClass("fa-toggle-on");   
              // $("#comp-"+ i).addClass("fa-toggle-off");   
              // $("#comp-"+ i).attr("status","0"); 
           }
           console.log(i[1])
       }
    
    
   
    
    
    
    
      
   },   
       
    error : function(error) {
        alert("erro")
    }

});

}


setInterval(function(){
 verificaTemperatura();
},2000)

</script>

      
        <div class="container">
        <div class="dashboard">
        <table class="table table stripped ">
            <tr>
              <!-- <td style="border:none"><a href="seguranca.php"><img src="../public/images/seguranca.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="temperatura.php"><img src="../public/images/temperatura.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="iluminacao"><img src="../public/images/iluminacao.png" width="86pxpx" height="86pxpx"></a></td> -->
              <td style="border:none"><a href="seguranca.php"><i class="fas fa-user icon-home"></i></a></td>
              <td style="border:none"><a href="temperatura.php"><i class="fas fa-temperature-low icon-home"></i></a></td>
              <td style="border:none"><a href="iluminacao"><i class="fas fa-lightbulb icon-home"></i></a></td> 
            </tr>

            <tr>
              <!-- <td style="border:none"><a href="agua.php"><img src="../public/images/agua.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="energia.php"><img src="../public/images/energia.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="tomadas.php"><img src="../public/images/tomada.png" width="86pxpx" height="86pxpx"></a></td> -->
              <td style="border:none"><a href="agua.php"><i class="fas fa-tint icon-home"></i></a></td>
              <td style="border:none"><a href="energia.php"><i class="fas fa-bolt icon-home"></i></a></td>
              <td style="border:none"><a href="tomadas.php"><i class="fas fa-plug icon-home"></i></a></td>
            </tr>

            <tr>
              <!-- <td style="border:none"><a href="seguranca.php"><img src="../public/images/camera.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="portas.php"><img src="../public/images/porta.png" width="86pxpx" height="86pxpx"></a></td>
              <td style="border:none"><a href="configuracao"><img src="../public/images/conf.png" width="86pxpx" height="86pxpx"></a></td>
               -->
               <td style="border:none"><a href="seguranca.php"><i class="fas fa-video icon-home"></i></a></td>
              <td style="border:none"><a href="portas.php"><i class="fas fa-door-open icon-home"></i></a></td>
              <td style="border:none"><a href="configuracao"><i class="fas fa-cog icon-home"></i></a></td>
            </tr>
             
          </table>
       
        </div>
 </div>
    <div id="main-footer"><span >Developer Sergio Salomão</span></div>
  
    
       
       
     
</body>
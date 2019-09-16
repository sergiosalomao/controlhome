<?php 
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
?>

<!DOCTYPE html>
<html>


<body>

<p id="pe">status</p>
    
</body>

<script>
$("#pe").click(function(){
  consulta()
});
function consulta(){
$.get("http://192.168.0.99/MOD001/status", function(res){
  
  if (res == "1"){
   $("#green").show();
   $("#red").hide();
  }

  if (res == "0"){
   $("#green").hide();
   $("#red").show();
  }
  
  if ((res != "0" ) && (res != "1" )){
   alert("error")
  }
})
}
</script>


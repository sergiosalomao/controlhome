
// //*  Relogio
// var myVar = setInterval(relogio, 1000);
// function relogio() {
//   var d = new Date(),
//   displayDate;
//   if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1)
//     displayDate = d.toLocaleTimeString('pt-BR');
//    else
//        displayDate = d.toLocaleTimeString('pt-BR', {timeZone: 'America/Belem'});
//        document.getElementById("relogio").innerHTML = displayDate;
// }

// //chama o primeiro acesso ao servidor para testar o CORS (temporarioo)
// $.ajax({
// url: "localhost"}).done(function(data) {
// //console.log("iniciando" + data);
// })
 
function verificaSensorTemperatura(central) {
  temperatura = 0;
  umidade = 0;
  $.ajax({
      url: central,
        success: function(data) {
        var exemplo = '{"id": "ST1", "tipo": "Sensor de Temperatura","Modelo": "DHT11","temperatura":28.6,"umidade":56.80,"Log":"01/09/2019"}';
        var objeto = JSON.parse(data);
        
      //COMPONENTES INSTALADOS
        ST1 = "SP1";
        SU1 = "SU1";
        
        if (objeto.id == SP1){  
          if (objeto.temperatura <=27) document.getElementById("sensor-"+ST1).innerText = objeto.temperatura.substring(0, 4) + "°C";
          else
            if (objeto.temperatura > 27) document.getElementById("sensor-"+ST1).innerText =  objeto.temperatura.substring(0, 4) + "°C [H]";
        
        if ( objeto.umidade <= 50) document.getElementById("sensor-"+SU1).innerText =  objeto.umidade.substring(0, 4) + "%";
        else
          if (objeto.umidade > 80) document.getElementById("sensor-"+SU1).innerText = objeto.umidade.substring(0, 4) + "% [H]";
        }    
      },
      error: function(error) {
        console.log("nao foi possivel ler os sensores");
    }
  });
}

// function ativa(central,idInterruptor){

//   $.get({
//       url : central + "/" + idInterruptor +"/1",
//   success: function(data){
//       console.log(central + idInterruptor + "/1")
//   },   
//       error : function(error) {
//           console.log("erro ao ativar modulo "+modulo)
//       }
//   });
//   }

//   function desativa(central,idInterruptor){

//   $.get({
//       url : central + "/" + idInterruptor +"/0",
//   success: function(data){
//       console.log(central + idInterruptor + "/0")
//   },   
//       error : function(error) {
//           console.log("erro ao desativar modulo"+idInterruptor)
//       }

//   });
//   }


  function verificaInterruptores(central){
console.log(central);
  $.get({
      url : "localhost",
      success: function(data){
            
        var exemplo = '{"id": "INTERRUPTOR_1", "tipo": "Interruptor de pulso","Modelo": "modelo x","status":1,"Log":"01/09/2019"}';
        var objeto = JSON.parse(exemplo);
            
        
              if(objeto.status == 1){
                    $("#comp-M1R7").removeClass("fa-toggle-off");   
                    $("#comp-M1R7").addClass("fa-toggle-on"); 
                    $("#comp-M1R7").attr("status","1"); 
                }
  
                if(objeto.status ==0){
                    $("#comp-M1R7").removeClass("fa-toggle-on");   
                    $("#comp-M1R7").addClass("fa-toggle-off");   
                    $("#comp-M1R7").attr("status","0"); 
                }
          
        console.log(objeto.status);
        
      },
      error : function(error) {
      console.log("erro");
      }
  });
  }

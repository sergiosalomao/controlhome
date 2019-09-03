
    // //*  Relogio
    // var myVar = setInterval(relogio, 1000);
    // function relogio() {
    //   var d = new Date(),
    //   displayDate;
    //   if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1)
    //     displayDate = d.toLocaleTimeString('pt-BR');
    //   else
    //       displayDate = d.toLocaleTimeString('pt-BR', {timeZone: 'America/Belem'});
    //       document.getElementById("relogio").innerHTML = displayDate;
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
        
            var objeto = JSON.parse(data);
            console.log(objeto[0]['temperatura']);
          //COMPONENTES INSTALADOS
              
            if (objeto[0]['id'] == "ST1" && parseFloat(objeto[0]['temperatura']) <= 26) document.getElementById("sensor-ST1").innerText = objeto[0]['temperatura'].substring(0, 4) + "°C";
            if (objeto[0]['id'] == "ST1" && parseFloat(objeto[0]['temperatura']) > 26)  document.getElementById("sensor-ST1").innerText =  objeto[0]['temperatura'].substring(0, 4) + "°C [H]";
            if (objeto[0]['id'] == "ST1" && parseFloat(objeto[0]['umidade']) <= 50) document.getElementById("sensor-SU1").innerText =  objeto[0]['umidade'].substring(0, 4) + "%";
            if (objeto[0]['id'] == "ST1" && parseFloat(objeto[0]['umidade']) > 50)  document.getElementById("sensor-SU1").innerText = objeto[0]['umidade'].substring(0, 4) + "% [H]";
              
            if (objeto[1]['id'] == "ST2" && parseFloat(objeto[1]['temperatura']) <= 26) document.getElementById("sensor-ST2").innerText = objeto[1]['temperatura'].substring(0, 4) + "°C";
            if (objeto[1]['id'] == "ST2" && parseFloat(objeto[1]['temperatura']) > 26)  document.getElementById("sensor-ST2").innerText =  objeto[1]['temperatura'].substring(0, 4) + "°C [H]";
            if (objeto[1]['id'] == "ST2" && parseFloat(objeto[1]['umidade']) <= 50) document.getElementById("sensor-SU2").innerText =  objeto[1]['umidade'].substring(0, 4) + "%";
            if (objeto[1]['id'] == "ST2" && parseFloat(objeto[1]['umidade']) > 50)  document.getElementById("sensor-SU2").innerText = objeto[1]['umidade'].substring(0, 4) + "% [H]";

            if (objeto[2]['id'] == "ST3" && parseFloat(objeto[2]['temperatura']) <= 26) document.getElementById("sensor-ST3").innerText = objeto[2]['temperatura'].substring(0, 4) + "°C";
            if (objeto[2]['id'] == "ST3" && parseFloat(objeto[2]['temperatura']) > 26)  document.getElementById("sensor-ST3").innerText =  objeto[2]['temperatura'].substring(0, 4) + "°C [H]";
            if (objeto[2]['id'] == "ST3" && parseFloat(objeto[2]['umidade']) <= 50) document.getElementById("sensor-SU3").innerText =  objeto[2]['umidade'].substring(0, 4) + "%";
            if (objeto[2]['id'] == "ST3" && parseFloat(objeto[2]['umidade']) > 50)  document.getElementById("sensor-SU3").innerText = objeto[2]['umidade'].substring(0, 4) + "% [H]";







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
          url : central,
          success: function(data){
                
           
            var objeto = JSON.parse(data);
                
            console.log(objeto[0]['status'])
                  if(objeto[0]['status'] == 1){
                        $("#comp-M1R7").removeClass("fa-toggle-off");   
                        $("#comp-M1R7").addClass("fa-toggle-on"); 
                        $("#comp-M1R7").attr("status","1"); 
                    }
      
                    if(objeto[0]['status'] ==0){
                        $("#comp-M1R7").removeClass("fa-toggle-on");   
                        $("#comp-M1R7").addClass("fa-toggle-off");   
                        $("#comp-M1R7").attr("status","0"); 
                    }
              
         
            
          },
          error : function(error) {
          console.log("erro");
          }
      });
      }

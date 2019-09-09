
    //*  Relogio
    var myVar = setInterval(relogio, 1000);
    function relogio() {
      var d = new Date(),
      displayDate;
      if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1)
        displayDate = d.toLocaleTimeString('pt-BR');
      else
          displayDate = d.toLocaleTimeString('pt-BR', {timeZone: 'America/Belem'});
         
          var visivel  = $('#relogio').is(':visible');
          if (visivel) document.getElementById("relogio").innerHTML = displayDate;         
          
    }
  //====================================================================================
  function verificaSensorHome(codigo) {
    
    $.get({
      url: "configuracao/componentes/verificastatus/" + codigo,
      success: function(data) {
        data = data.split(';')
        temperatura = data[0];
        umidade = data[1];
        document.getElementById("sensor-"+ codigo).innerText = temperatura + "°C";
        if (temperatura > 26) document.getElementById("sensor-" + codigo).innerText = temperatura + "°C[H]";
   
         document.getElementById("sensor-SU"+ codigo[2]).innerText = umidade + "%";
         if (umidade < 55) document.getElementById("sensor-SU"+  codigo[2]).innerText = umidade + "%[L]";
      
       
      },
      error: function(error) {
        console.log("erro");
        document.getElementById("sensor-"+ codigo).innerText = "E°C";
        document.getElementById("sensor-SU"+ codigo[2]).innerText = "E%";
      }
    });
  }
   //====================================================================================
   

    //====================================================================================
    function verificaSensoresTemperatura(codigo) {
    
      $.get({
        url: "../configuracao/componentes/verificastatus/" + codigo,
        success: function(data) {
          data = data.split(';')
          temperatura = data[0];
          umidade = data[1];
          document.getElementById("sensor-"+ codigo).innerText = temperatura + "°C";
          if (temperatura > 26) document.getElementById("sensor-" + codigo).innerText = temperatura + "°C[H]";
     
           document.getElementById("sensor-SU"+ codigo[2]).innerText = umidade + "%";
           if (umidade < 55) document.getElementById("sensor-SU"+  codigo[2]).innerText = umidade + "%[L]";
        
         
        },
        error: function(error) {
          console.log("erro");
          document.getElementById("sensor-"+ codigo).innerText = "E°C";
          document.getElementById("sensor-SU"+ codigo[2]).innerText = "E%";
        }
      });
    }
    
    //====================================================================================

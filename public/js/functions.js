// Relogio
    var myVar = setInterval(relogio, 1000);
    function relogio() {
      var d = new Date(),
        displayDate;
      if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
        displayDate = d.toLocaleTimeString('pt-BR');
      } else {
        displayDate = d.toLocaleTimeString('pt-BR', {
          timeZone: 'America/Belem'
        });
      }
      document.getElementById("relogio").innerHTML = displayDate;
    }


    //chama o primeiro acesso ao servidor para testar o CORS (temporrario)
    $.ajax({
        url: "http://192.168.0.99",

      })
      .done(function(data) {
        //console.log("iniciando" + data);
      })
 
 
 
      function verificaTemperatura(sensor) {
      
        temperatura = 0;
      umidade = 0;
      $.ajax({
        
        url: 'http://192.168.0.99/',

        success: function(data) {
        objetos = data.split("|");
       // console.log(data);        
       
       var IdValor = 0;
       for (i=0;i<=objetos.length;i++){
       campos = objetos[i];
       
       campos = campos.split(",");
       id = campos[0] 
       tipo = campos[1] 
       modelo = campos[2] 
       temperatura = campos[3]
       umidade = campos[4]
       log = campos[5]


       IdDados = id.split(":");
       IdIndex = IdDados[0];
       IdValor = IdDados[1];

       

       temperaturaDados = temperatura.split(":");
       temperaturaIndex = temperaturaDados[0];
       temperaturaValor = temperaturaDados[1];
     
 
     

     if (IdValor == sensor){
     
      if (temperaturaValor <=27) {
        document.getElementById("sensor-ST1").innerText = temperaturaValor.substring(0, 4) + "°C";
      } else
      if (temperaturaValor > 27) {
        document.getElementById("sensor-ST1").innerText =  temperaturaValor.substring(0, 4) + "°C [H]";
      }


      if ( umidade <= 50) {
        document.getElementById("sensor-U1").innerText =  umidade.substring(0, 4) + "%";
      } else
      if (umidade > 80) {
        document.getElementById("sensor-U1").innerText = umidade.substring(0, 4) + "% [H]";
      }






      }
          

        
 
         



          }    
          
      
        },
        error: function(error) {
          console.log("erro ao ler sensor")
        }
      });
    }

    function verificaSensorPresenca(sensor) {
      estado = 0;
      tempo = 0;
      $.ajax({
        url: 'http://192.168.0.99/' + sensor,

        success: function(data) {
          dados = data.split("|");
          dados.forEach(verificaValor);

          function verificaValor(item, index, arr) {
            dados = item.split(":");
            codigo = dados[0];

            valor = dados[1];
            if (valor != undefined) {
              valor = valor.split(";");
              estado = valor[0];
              tempo = valor[1];

            }
            console.log("sensor: " + sensor + "codigo: " + codigo + "| estado: " + estado+ "| tempo: "+ ((tempo /100000 )));
          
            
            
            if (codigo == sensor && estado == 0) {
              $("#sensor-SP1").text("Nenhuma presenca detectada");
            } else

            if (codigo == sensor && estado == 1) {
              $("#sensor-SP1").text("Presenca detectada");
            }


            

          }
        },
        error: function(error) {
          console.log("erro ao ler sensor");
        }
      });
    }



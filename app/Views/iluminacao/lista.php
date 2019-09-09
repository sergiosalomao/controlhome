<script>
  //TEMPO DOS SENSORES DE TEMPERATURA
  setInterval(function() {
 
    verificaStatusComponente("IT1");
    
      
    },
    <?php echo TEMPO_LEITURA_INTERRUPTORES ?>)

    
    function verificaStatusComponente(idInterruptor){
      console.log(idInterruptor)
      $.get({
      
        url : "../../configuracao/componentes/verificastatus/" + idInterruptor,
      success: function(data){
        console.log("recarrega")
        console.log(data)
        if (data == 0){
        $('#comp'+codigo).removeClass("fas fa-toggle-off");
        $('#comp'+codigo).addClass("fas fa-toggle-on");
        }     
                          
        window.location.reload()
        },
        error : function(error) {
        console.log("erro");
        }
    });
    }





    function atualizaStatusComponente(idInterruptor,$status){
      console.log(idInterruptor)
      $.get({
      
        url : "../../configuracao/componentes/atualizastatus/" + idInterruptor,
      success: function(data){
        console.log("recarrega")
        console.log(data)
        window.location.reload()
        },
        error : function(error) {
        console.log("erro");
        }
    });
    }
    </script>
    
    <?php
    use App\Models\AmbientesModel\AmbientesModel;
    use App\Models\ComponentesModel\ComponentesModel;
   
    $objAmbientes = new AmbientesModel();
    $dadosAmbiente = $objAmbientes->listById($this->id_ambiente);
    ?>
    <body>
        <div class="configuracao-dashboard-panel">
            <div class="row">
                <div id="dashboard-panel-left" class="col-3"> <a href="../../iluminacao"><i class="fas fa-arrow-circle-left icon-left"></i></a></div>
                <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
                <div id="dashboard-panel-right" class="col-4">
                </div>
                <div class="lista-titulo"><i class="fas fa-dice-d6" style="margin-left:10px"></i><span style="margin-left:10px"> Acionadores / <?php echo $dadosAmbiente['descricao'] ?> </span></div>

                <div class="container ">
                    <table class="table table-striped ">

                        <?php
                        $objComponentes = new ComponentesModel();
                        $dadosComponentes = $objComponentes->listByAmbiente($this->id_ambiente, 2);
                        foreach ($dadosComponentes as $key => $lista) {
                            if ($lista['status'] == 0) $classEstado = 'fas fa-toggle-off';
                            
                            if ($lista['status'] == 1) $classEstado = 'fas fa-toggle-on';
                            ?>
                            <tr>
                                <td style="width:10%;border:none"><a href="#"><i class="<?php echo $lista['icone'] ?>" style="margin-left:5px"></i></a></td>
                                <td style="width:80%;border:none"><?php echo $lista['descricao_componente'] ?></td>
                                <td class="icon-acionador" style="width:10%;border:none;" onclick="atualizaStatusComponente('<?php echo $lista['codigo'] ?>')"><i id="comp-<?php echo $lista['codigo'] ?>" class="<?php echo $classEstado ?> "></i></td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
    </body>
    
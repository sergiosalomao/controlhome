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
                            $classEstado = "fas fa-toggle-off";
                            if ($dadosComponentes[$key]['status'] == 1) $classEstado = 'fas fa-toggle-on';
                            ?>
                            <tr>
                                <td style="width:10%;border:none"><a href="#"><i class="<?php echo $dadosComponentes[$key]['icone'] ?>" style="margin-left:5px"></i></a></td>
                                <td style="width:80%;border:none"><?php echo $dadosComponentes[$key]['descricao_componente'] ?></td>
                                <td class="icon-acionador" style="width:10%;border:none;" onclick="mudaStatusComponente('<?php echo $dadosComponentes[$key]['codigo'] ?>')"><i id="comp-<?php echo $dadosComponentes[$key]['codigo'] ?>" class="<?php echo $classEstado ?> "></i></td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
    </body>
    <script>

        function mudaStatusComponente(idInterruptor){
        
        $.get({
        url : "../../componentes/updatecomponente/" + idInterruptor,
          success: function(data){
          console.log("teste de retorno")
          
         
            
          },
          error : function(error) {
          console.log("erro");
          }
      });
      }

        //LER INTERRUPTORES
        setInterval(function() {
                mudamudaStatusInterruptor("http://<?php echo HOST_CENTRAL_1 ?>/interruptores/all");
            },
            <?php echo TEMPO_LEITURA_INTERRUPTORES ?>)
    </script>
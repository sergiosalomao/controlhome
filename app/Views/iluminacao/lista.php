    <?php
    use App\Models\ComponentesModel\ComponentesModel;

?>

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
                        $objComponentes = new ComponentesModel();
                        $dados = $objComponentes->listByAmbiente($this->id_ambiente,2);
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

    
//LER INTERRUPTORES
setInterval(function() {
  verificaInterruptores("http://<?php echo HOST_CENTRAL_1 ?>/interruptores/all");
}, 
<?php echo TEMPO_LEITURA_INTERRUPTORES ?>)


   



    </script>

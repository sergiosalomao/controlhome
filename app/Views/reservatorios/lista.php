    <?php
    use App\Models\ReservatoriosModel\ReservatoriosModel;
   
   
    $objReservatorio = new ReservatoriosModel();
    $dadosReservatorio = $objReservatorio->listById($this->id_reservarorio);
    ?>
    <body>
        <div class="configuracao-dashboard-panel">
            <div class="row">
                <div id="dashboard-panel-left" class="col-3"> <a href="../configuracao"><i class="fas fa-arrow-circle-left icon-left"></i></a></div>
                <div id="dashboard-panel-center" class="col-5"><span class="title-panel">ControlHome</span></div>
                <div id="dashboard-panel-right" class="col-4"><a href="reservatorios/create"><i class="fas fa-plus-circle icon-right"></i></a>
                </div>
                <div class="lista-titulo"><i class="fas fa-dice-d6" style="margin-left:10px"></i><span style="margin-left:10px"> Reservatorios </span></div>

                <div class="container ">
                    <table class="table table-striped ">

                        <?php
                        $objReservatorios = new ReservatoriosModel();
                        $dadosReservatorios = $objReservatorios->listAll();
                        foreach ($dadosReservatorios as $key => $lista) {
                            if ($lista['capacodade'] == 0) $classEstado = 'fas fa-toggle-off';
                            
                            if ($lista['status'] == 1) $classEstado = 'fas fa-toggle-on';
                            ?>
                            <tr>
                                <td style="width:10%;border:none"><a href="#"><i class="<?php echo $lista['icone'] ?>" style="margin-left:5px"></i></a></td>
                                <td style="width:80%;border:none"><?php echo $lista['descricao'] ?></td>
                                <td style="width:80%;border:none"><?php echo $lista['capacidade'] ?></td>
                                <td style="width:10%;border:none"><a href="reservatorios/showedit/<?php echo $lista['id_reservatorio'] ?>"><i class="fas fa-edit"></i></a></td>
                                <td style="width:10%;border:none"><a href="reservatorios/delete/<?php echo$lista['id_reservatorio']  ?> "><i class="fas fa-trash"></i></a></td>

                            </tr>
                        <?php } ?>

                    </table>
                </div>
    </body>
    
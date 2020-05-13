<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>Estatística mensal</h1>
</section>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <!-- gráfico de coluna -->
            <div id="barrasnovomensal" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
</section>
<section class="content">
    <!-- Small boxes (Stat box) -->

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $stat_mensal_novo_simone; ?></h3>

                    <p>Novos contatos SIMONE</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</section>
<?php
$contador = 1;
foreach ($stat_mensal_convertido as $value) {
    ?>
    <input type="hidden" name="stat_mensal_convertido_<?php echo $contador ?>" id="stat_mensal_convertido_<?php echo $contador ?>" value="<?php echo $value->convertidos; ?>" />
    <input type="hidden" name="mes_convertido_<?php echo $contador ?>" id="mes_convertido_<?php echo $contador ?>" value="<?php echo date('m/Y', strtotime($value->data)); ?>" />
    <?php
    $contador ++;
    // echo $teste = date('m/Y', strtotime($value->data));
    // echo $teste->format("m");
    //  echo '<br>';
}

var_dump($stat_mensal_convertido);
//$teste = date("m/Y", strtotime("-11 month"));

?>

<?php
$contador2 = 1;
foreach ($stat_mensal_novo as $value) {
    ?>
    <input type="hidden" name="stat_mensal_novo_<?php echo $contador2 ?>" id="stat_mensal_novo_<?php echo $contador2 ?>" value="<?php echo $value->novos; ?>" />
    <input type="hidden" name="mes_novo_<?php echo $contador2 ?>" id="mes_novo_<?php echo $contador2 ?>" value="<?php echo date('m/Y', strtotime($value->data)); ?>" />

    <?php
    $contador2 ++;
    // echo $teste = date('m/Y', strtotime($value->data));
    // echo $teste->format("m");
    //  echo '<br>';
}

var_dump($stat_mensal_novo);
//$teste = date("m/Y", strtotime("-11 month"));

?>

<?php $this->load->view('template/footer'); ?>
<script>
   window.onload = function () {

        //RECEBE INFORMAÇÕES PARA MONTAR GRÁFICO DE OPORTUNIDADES CONVERTIDAS NOS ÚLTIMOS 6 MESES
        var meses = 1;
        var stat_mensal_convertido = [];
        var stat_mensal_convertido_n = [];
        var mes_convertido = [];
        var mes_convertido_n = [];

        var stat_mensal_novo = [];
        var stat_mensal_novo_n = [];
        var mes_novo = [];
        var mes_novo_n = [];
        while (meses < 7) { // se alterar este valor para 13 e mudar no cotroller para pegar 12 meses, pga o ano todo.
            stat_mensal_convertido[meses] = document.getElementById("stat_mensal_convertido_" + meses);
            stat_mensal_convertido_n[meses] = Number(stat_mensal_convertido[meses].value);
            stat_mensal_novo[meses] = document.getElementById("stat_mensal_novo_" + meses);
            stat_mensal_novo_n[meses] = Number(stat_mensal_novo[meses].value);

            mes_convertido[meses] = document.getElementById("mes_convertido_" + meses);
            mes_convertido_n[meses] = mes_convertido[meses].value;
            mes_novo[meses] = document.getElementById("mes_novo_" + meses);
            mes_novo_n[meses] = mes_novo[meses].value;
            //alert(stat_mensal_novo_n[meses]);
            meses++;
        }



        var options = {
            title: {
                text: "NOVOS CADASTROS E CONVERTIDOS ÚLTIMOS 6 MESES"
            },
            legend: {
                verticalAlign: "top",
                horizontalAlign: "right",
                dockInsidePlotArea: true
            },
            toolTip: {
                shared: true
            },
            data: [
                {
                    name: "Novos cadastros",
                    showInLegend: true,
                    legendMarkerType: "square",
                    type: "splineArea",
                    color: "green",
                    dataPoints: [
                        {label: mes_novo_n[1], y: stat_mensal_novo_n[1]},
                        {label: mes_novo_n[2], y: stat_mensal_novo_n[2]},
                        {label: mes_novo_n[3], y: stat_mensal_novo_n[3]},
                        {label: mes_novo_n[4], y: stat_mensal_novo_n[4]},
                        {label: mes_novo_n[5], y: stat_mensal_novo_n[5]},
                        {label: mes_novo_n[6], y: stat_mensal_novo_n[6]}
//                        {label: mes_convertido_n[7], y: stat_mensal_convertido_n[7]}, // se tirar comentario destas linhas pega 12 meses
//                        {label: mes_convertido_n[8], y: stat_mensal_convertido_n[8]},
//                        {label: mes_convertido_n[9], y: stat_mensal_convertido_n[9]},
//                        {label: mes_convertido_n[10], y: stat_mensal_convertido_n[10]},
//                        {label: mes_convertido_n[11], y: stat_mensal_convertido_n[11]},
//                        {label: mes_convertido_n[12], y: stat_mensal_convertido_n[12]}
                    ]


                },
                {
                    name: "Convertidos",
                    showInLegend: true,
                    legendMarkerType: "square",
                    type: "splineArea",
                    color: "blue",
                    dataPoints: [
                        {label: mes_convertido_n[1], y: stat_mensal_convertido_n[1]},
                        {label: mes_convertido_n[2], y: stat_mensal_convertido_n[2]},
                        {label: mes_convertido_n[3], y: stat_mensal_convertido_n[3]},
                        {label: mes_convertido_n[4], y: stat_mensal_convertido_n[4]},
                        {label: mes_convertido_n[5], y: stat_mensal_convertido_n[5]},
                        {label: mes_convertido_n[6], y: stat_mensal_convertido_n[6]}
//                        {label: mes_convertido_n[7], y: stat_mensal_convertido_n[7]}, // se tirar comentario destas linhas pega 12 meses
//                        {label: mes_convertido_n[8], y: stat_mensal_convertido_n[8]},
//                        {label: mes_convertido_n[9], y: stat_mensal_convertido_n[9]},
//                        {label: mes_convertido_n[10], y: stat_mensal_convertido_n[10]},
//                        {label: mes_convertido_n[11], y: stat_mensal_convertido_n[11]},
//                        {label: mes_convertido_n[12], y: stat_mensal_convertido_n[12]}
                    ]

                }
            ]
        };

        $("#barrasnovomensal").CanvasJSChart(options);


</script>
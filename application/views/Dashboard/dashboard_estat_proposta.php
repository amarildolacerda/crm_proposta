<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Funil de vendas CRM

    </h1>
    <ol class="breadcrumb">
        <li><i class="active fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-6">
            <!-- gráfico de coluna -->
            <div id="barrasgeral" style="height: 300px; width: 100%;"></div>
        </div>

        <div class="col-md-6">
            <!-- funil de vendas -->
            <div id="funilgeral" style="height: 300px; width: 100%;"></div>
        </div>
        <div class="col-lg-12">
            <br><br>
        </div>
        <div class="col-md-6">
            <div id="barrasindividual" style="height: 300px; width: 100%;"></div>
        </div>

        <div class="col-md-6">
            <div id="funilindividual" style="height: 300px; width: 100%;"></div>
        </div>

<!-- planoB caso o outro pare <div id="chartContainer" style="width:100%; height:280px"></div>  -->

    </div>
</section>



<section class="content-header">
    <h1>
        ESTATÍSTICAS INDIVIDUAIS DE PROPOSTAS

    </h1>
    <ol class="breadcrumb">
        <li><i class="active fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $count_proposta ?></h3>

                    <p>Total de propostas</p>
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
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?php
                        echo $count_proposta_aguardando;

                        if ($count_proposta_aguardando > 0) {
                            echo " / " . number_format((($count_proposta_aguardando / $count_proposta) * 100), 2, ",", ".");
                            ?><sup style="font-size: 20px">%</sup>
                        <?php } ?>
                    </h3>


                    <p>Aguardando aprovação</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/proposta/gerenciar?pesquisa=&pesquisa2=&status=1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php
                        echo $count_proposta_ganho;
                        if ($count_proposta_ganho > 0) {
                            echo " / " . number_format((($count_proposta_ganho / $count_proposta) * 100), 2, ",", ".")
                            ?><sup style="font-size: 20px">%</sup>
                        <?php } ?>
                    </h3>

                    <p>Fechado ganho</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/proposta/gerenciar?pesquisa=&pesquisa2=&status=2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php
                        echo $count_proposta_perdido;
                        if ($count_proposta_perdido > 0) {
                            echo " / " . number_format((($count_proposta_perdido / $count_proposta) * 100), 2, ",", ".")
                            ?><sup style="font-size: 20px">%</sup>
                        <?php } ?>
                    </h3>

                    <p>Fechado perdido</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="<?php echo base_url(); ?>index.php/proposta/gerenciar?pesquisa=&pesquisa2=&status=3" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-12">
            <h3>ESTATÍSTICAS GERAIS DE PROPOSTAS</h3>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $count_proposta_geral ?></h3>

                    <p>Total de propostas</p>
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
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?php
                        echo $count_proposta_aguardando_geral;

                        if ($count_proposta_aguardando_geral > 0) {
                            echo " / " . number_format((($count_proposta_aguardando_geral / $count_proposta_geral) * 100), 2, ",", ".");
                            ?><sup style="font-size: 20px">%</sup>
                        <?php } ?>
                    </h3>


                    <p>Aguardando aprovação</p>
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
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php
                        echo $count_proposta_ganho_geral;
                        if ($count_proposta_ganho_geral > 0) {
                            echo " / " . number_format((($count_proposta_ganho_geral / $count_proposta_geral) * 100), 2, ",", ".")
                            ?><sup style="font-size: 20px">%</sup>
                        <?php } ?>
                    </h3>

                    <p>Fechado ganho</p>
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
                    <h3><?php
                        echo $count_proposta_perdido_geral;
                        if ($count_proposta_perdido_geral > 0) {
                            echo " / " . number_format((($count_proposta_perdido_geral / $count_proposta_geral) * 100), 2, ",", ".")
                            ?><sup style="font-size: 20px">%</sup>
                        <?php } ?>
                    </h3>

                    <p>Fechado perdido</p>
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
<!-- DASH GERAL ------------------------ -->
<input type="hidden" name="crm_total" id="crm_total" value="<?php echo $count_crm_total ?>" />
<input type="hidden" name="crm_prospect" id="crm_prospect" value="<?php echo $count_crm_prospect ?>" />
<input type="hidden" name="crm_oportunidade" id="crm_oportunidade" value="<?php echo $count_crm_oportunidade ?>" />
<input type="hidden" name="crm_entregue" id="crm_entregue" value="<?php echo $count_crm_entregue ?>" />
<input type="hidden" name="crm_provavel" id="crm_provavel" value="<?php echo $count_crm_provavel ?>" />
<input type="hidden" name="crm_ganho" id="crm_ganho" value="<?php echo $count_crm_ganho ?>" />
<input type="hidden" name="crm_perdido" id="crm_perdido" value="<?php echo $count_crm_perdido ?>" />

<!-- DADOS INDIVIDUAIS DE FUNIL -->
<input type="hidden" name="crm_total_individual" id="crm_total_individual" value="<?php echo $count_crm_total_individual ?>" />
<input type="hidden" name="crm_prospect_individual" id="crm_prospect_individual" value="<?php echo $count_crm_prospect_individual ?>" />
<input type="hidden" name="crm_oportunidade_individual" id="crm_oportunidade_individual" value="<?php echo $count_crm_oportunidade_individual ?>" />
<input type="hidden" name="crm_entregue_individual" id="crm_entregue_individual" value="<?php echo $count_crm_entregue_individual ?>" />
<input type="hidden" name="crm_provavel_individual" id="crm_provavel_individual" value="<?php echo $count_crm_provavel_individual ?>" />
<input type="hidden" name="crm_ganho_individual" id="crm_ganho_individual" value="<?php echo $count_crm_ganho_individual ?>" />
<input type="hidden" name="crm_perdido_individual" id="crm_perdido_individual" value="<?php echo $count_crm_perdido_individual ?>" />

<?php
$this->load->view('template/footer');
?>

<script>
    window.onload = function () {
        var crm_total = document.getElementById("crm_total");
        var crm_prospect = document.getElementById("crm_prospect");
        var crm_oportunidade = document.getElementById("crm_oportunidade");
        var crm_entregue = document.getElementById("crm_entregue");
        var crm_provavel = document.getElementById("crm_provavel");
        var crm_ganho = document.getElementById("crm_ganho");
        var crm_perdido = document.getElementById("crm_perdido");


        var crm_totaln = Number(crm_total.value);
        var crm_prospectn = Number(crm_prospect.value);
        var crm_oportunidaden = Number(crm_oportunidade.value);
        var crm_entreguen = Number(crm_entregue.value);
        var crm_provaveln = Number(crm_provavel.value);
        var crm_ganhon = Number(crm_ganho.value);
        var crm_perdidon = Number(crm_perdido.value);

        // update chart every second

//Better to construct options first and then pass it as a parameter
        var options = {
            title: {
                text: "COLUNAS FÚNIL GERAL"
            },
            data: [
                {

                    // Change type to "doughnut", "line", "splineArea", etc.
                    type: "column",
                    dataPoints: [
                        {label: "Total", y: crm_totaln},
                        {label: "Prospect", y: crm_prospectn},
                        {label: "Oportunidade", y: crm_oportunidaden},
                        {label: "Proposta entregue", y: crm_entreguen},
                        {label: "Negócio provável", y: crm_provaveln},
                        {label: "Negócio ganho", y: crm_ganhon},
                        {label: "Negócio perdido", y: crm_perdidon}
                    ]
                }
            ]
        };

        $("#barrasgeral").CanvasJSChart(options);



        var options = {
            animationEnabled: true,
            theme: "light", //"light1", "light2", "dark1", "dark2"
            title: {
                text: "FÚNIL DE VENDAS GERAL"
            },
            data: [{
                    type: "funnel",
                    toolTipContent: "<b>{label}</b>: {y} <b>({percentage}%)</b>",
                    indexLabel: "{label} ({percentage}%)",
                    dataPoints: [
                        {y: crm_totaln, label: "Total"},
                        {y: crm_prospectn, label: "Prospect"},
                        {y: crm_oportunidaden, label: "Oportunidade"},
                        {y: crm_entreguen, label: "Proposta entregue"},
                        {y: crm_provaveln, label: "Negócio provável"},
                        {y: crm_ganhon, label: "Negócio ganho"},
                        {y: crm_perdidon, label: "Negócio perdido"}
                    ]
                }]
        };
        calculatePercentage();
        $("#funilgeral").CanvasJSChart(options);

        function calculatePercentage() {
            var dataPoint = options.data[0].dataPoints;
            var total = dataPoint[0].y;
            for (var i = 0; i < dataPoint.length; i++) {
                if (i == 0) {
                    options.data[0].dataPoints[i].percentage = 100;
                } else {
                    options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total) * 100).toFixed(2);
                }
            }
        }



//PARTE DE GERAÇÃO DOS GRÁFICOS INDIVIDUAIS

    var crm_total = document.getElementById("crm_total_individual");
        var crm_prospect = document.getElementById("crm_prospect_individual");
        var crm_oportunidade = document.getElementById("crm_oportunidade_individual");
        var crm_entregue = document.getElementById("crm_entregue_individual");
        var crm_provavel = document.getElementById("crm_provavel_individual");
        var crm_ganho = document.getElementById("crm_ganho_individual");
        var crm_perdido = document.getElementById("crm_perdido_individual");


        var crm_totaln = Number(crm_total.value);
        var crm_prospectn = Number(crm_prospect.value);
        var crm_oportunidaden = Number(crm_oportunidade.value);
        var crm_entreguen = Number(crm_entregue.value);
        var crm_provaveln = Number(crm_provavel.value);
        var crm_ganhon = Number(crm_ganho.value);
        var crm_perdidon = Number(crm_perdido.value);

        // update chart every second

//Better to construct options first and then pass it as a parameter
        var options = {
            title: {
                text: "COLUNAS FÚNIL INDIVIDUAL"
            },
            data: [
                {

                    // Change type to "doughnut", "line", "splineArea", etc.
                    type: "column",
                    dataPoints: [
                        {label: "Total", y: crm_totaln},
                        {label: "Prospect", y: crm_prospectn},
                        {label: "Oportunidade", y: crm_oportunidaden},
                        {label: "Proposta entregue", y: crm_entreguen},
                        {label: "Negócio provável", y: crm_provaveln},
                        {label: "Negócio ganho", y: crm_ganhon},
                        {label: "Negócio perdido", y: crm_perdidon}
                    ]
                }
            ]
        };

        $("#barrasindividual").CanvasJSChart(options);



        var options = {
            animationEnabled: true,
            theme: "light", //"light1", "light2", "dark1", "dark2"
            title: {
                text: "FÚNIL DE VENDAS INDIVIDUAL"
            },
            data: [{
                    type: "funnel",
                    toolTipContent: "<b>{label}</b>: {y} <b>({percentage}%)</b>",
                    indexLabel: "{label} ({percentage}%)",
                    dataPoints: [
                        {y: crm_totaln, label: "Total"},
                        {y: crm_prospectn, label: "Prospect"},
                        {y: crm_oportunidaden, label: "Oportunidade"},
                        {y: crm_entreguen, label: "Proposta entregue"},
                        {y: crm_provaveln, label: "Negócio provável"},
                        {y: crm_ganhon, label: "Negócio ganho"},
                        {y: crm_perdidon, label: "Negócio perdido"}
                    ]
                }]
        };
        calculatePercentage();
        $("#funilindividual").CanvasJSChart(options);

        function calculatePercentage() {
            var dataPoint = options.data[0].dataPoints;
            var total = dataPoint[0].y;
            for (var i = 0; i < dataPoint.length; i++) {
                if (i == 0) {
                    options.data[0].dataPoints[i].percentage = 100;
                } else {
                    options.data[0].dataPoints[i].percentage = ((dataPoint[i].y / total) * 100).toFixed(2);
                }
            }
        }

    }
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bower_components/jquery.canvasjs.min.js') ?>"></script>
<!--
<script type="text/javascript">
    window.onload = function () {
       
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Adding & Updating dataPoints"
            },
            data: [
                {
                    type: "column",
                    dataPoints: [
                        {label: "Prospect", y: 80},
                        {label: "Oportunidade", y: 70},
                        {label: "Proposta entregue", y: 35},
                        {label: "Negócio provável", y: 12},
                        {label: "Negócio ganho", y: 5},
                        {label: "Negócio perdido", y: 56}
                    ]
                }
            ]
        });
        chart.render();

        $("#addDataPoint").click(function () {

            var length = chart.options.data[0].dataPoints.length;
            chart.options.title.text = "New DataPoint Added at the end";
            chart.options.data[0].dataPoints.push({y: 25 - Math.random() * 10});
            chart.render();

        });

        $("#updateDataPoint").click(function () {
            var teste1 = document.getElementById("teste");
            var n = Number(teste1.value);
            var length = chart.options.data[0].dataPoints.length;
            chart.options.title.text = "Last DataPoint Updated";
            chart.options.data[0].dataPoints[length - 1].y = n;
            chart.render();

        });
    }
</script>
-->
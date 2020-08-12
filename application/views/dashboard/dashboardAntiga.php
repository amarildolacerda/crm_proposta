<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>Estatística mensal</h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <!-- gráfico de coluna -->
            <div id="barrasnovomensal" style="height: 300px; width: 100%;"></div>
        </div>
    </div>
</section>
<section class="content-header">
    <h1>Funil de vendas CRM</h1>
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
</div>
</section>

<!-- DASH META DE VENDAS  ------------------------ 
<input type="hidden" name="meta_vendas" id="meta_vendas" value="<?php echo $meta_vendas ?>" />
<input type="hidden" name="meta_atingida" id="meta_atingida" value="<?php echo $meta_atingida ?>" />
<input type="hidden" name="mes_atual" id="mes_atual" value="<?php echo $mes_atual ?>" />-->

<!-- ESTATÍSTICA MENSAL  ----------------FAZER UM FOREACH PEGANDO MES E TOTAL-------- -->
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

//var_dump($stat_mensal_convertido);
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

//var_dump($stat_mensal_convertido);
//$teste = date("m/Y", strtotime("-11 month"));

?>


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

        // recebe dados do input hidden para montar o funil de vendas
        var crm_total = document.getElementById("crm_total");
        var crm_prospect = document.getElementById("crm_prospect");
        var crm_oportunidade = document.getElementById("crm_oportunidade");
        var crm_entregue = document.getElementById("crm_entregue");
        var crm_provavel = document.getElementById("crm_provavel");
        var crm_ganho = document.getElementById("crm_ganho");
        var crm_perdido = document.getElementById("crm_perdido");

        // converte o objeto recebido anteriormente para um numero
        var crm_totaln = Number(crm_total.value);
        var crm_prospectn = Number(crm_prospect.value);
        var crm_oportunidaden = Number(crm_oportunidade.value);
        var crm_entreguen = Number(crm_entregue.value);
        var crm_provaveln = Number(crm_provavel.value);
        var crm_ganhon = Number(crm_ganho.value);
        var crm_perdidon = Number(crm_perdido.value);


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


        // grafico colunas fúnil geral
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


    //BAR CHART
    var meta_vendas = document.getElementById("meta_vendas");
    var meta_atingida = document.getElementById("meta_atingida");
    var mes_atual = document.getElementById("mes_atual");

    var vendas = Number(meta_vendas.value);
    var atingida = Number(meta_atingida.value);
    var atual = Number(mes_atual.value);



    var bar = new Morris.Bar({
        element: 'bar-chart',
        resize: true,
        data: [
            {y: "Mês: " + atual, a: atingida, b: vendas}

        ],
        barColors: ['#00a65a', '#f56954'],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['ATINGIDO', 'META'],
        hideHover: 'auto'
    });


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
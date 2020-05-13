<?php $this->load->view('template/menu'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h2>ALERTAS</h2>
        </div>
<!--        <div class="row">
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?garantia=1&encerrada=nao&dataEntradaMenor=<?php echo date("Y-m-d", strtotime("-31 days")) ?>" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-android-warning" target="_blank"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS garantia vencida </span>
                            <span class="info-box-number"><h2><?php echo $totalAbertasGarantiaVencida ?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?garantia=1&encerrada=nao&dataEntradaMenor=<?php echo date("Y-m-d", strtotime("-25 days")) ?>" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-android-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS garantia 25d+ </span>
                            <span class="info-box-number"><h2><?php echo $totalAbertasGarantiaProxPrazo ?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?encerrada=nao&dataAlteracaoMenor=<?php echo date("Y-m-d", strtotime("-3 days")) ?>" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-android-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS 3d+ sem interação </span>
                            <span class="info-box-number"><h2><?php echo $totalAbertasMais3diasSemInteracao ?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>-->
        <div class="row">
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?garantia=1&encerrada=nao" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-android-desktop"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Novas oportunidades últimos 7 dias</span>
                            <span class="info-box-number"><h2><?php echo $totalOportunidadesAbertas7dias ?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?encerrada=nao" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow-active"><i class="ion ion-android-desktop"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Oportunidades fechadas últimos 7 dias</span>
                            <span class="info-box-number"><h2><strong><?php echo $totalOportunidadesFechadas7dias?></strong></h2></span>
                        </div>
                    </div>
                </div>
            </a>
<!--            <a href="<?php echo base_url() ?>index.php/os/gerenciar?encerrada=nao&dataEntradaMaior=<?php echo date("Y-m-d", strtotime("-7 days")) ?>">
                <div class="col-md-3 text-center" target="_blank">
                    <div class="info-box">
                        <span class="info-box-icon bg-green-active"><i class="ion ion-android-desktop" ></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">OS abertas últimos 7 dias</span>
                            <span class="info-box-number"><h2><strong><?php echo $totalAbertas7dias ?></strong></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?encerrada=sim&dataEncerraMaior=<?php echo date("Y-m-d", strtotime("-7 days")) ?>">
                <div class="col-md-3 text-center" target="_blank">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple-active"><i class="ion ion-android-desktop" ></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">OS fechadas últimos 7 dias</span>
                            <span class="info-box-number"><h2><strong><?php echo $totalFechadas7dias ?></strong></h2></span>
                        </div>
                    </div>
                </div>
            </a>-->
        </div>
        <div class="text-center">
            <h2>QUANTIDADE DE OS's SEPARADAS POR STATUS</h2>
        </div>
        <div class="row">
           <?php foreach ($status as $s) { ?>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?status=<?php echo $s->idStatus ?>" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-navy"><i class="ion ion-android-clipboard" target="_blank"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><?php echo $s->descricao ?> </span>
                            <span class="info-box-number"><h2><?php echo $this->dashboard_model->countOsStatus($s->idStatus);?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <?php }?>
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>

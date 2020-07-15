<?php $this->load->view('template/menu'); ?>
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#individual" data-toggle="tab" aria-expanded="true">Dashboard Idividual</a></li>
            <li class=""><a href="#geral" data-toggle="tab" aria-expanded="false">Dashboard Geral</a></li>
        </ul>
        <div class="tab-content" style="background-color: rgb(236,240,245);">
            <div class="tab-pane active" id="individual">
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
                            <a href="<?php echo base_url() ?>index.php/crm/gerenciar?garantia=1&encerrada=nao" target="_blank">
                                <div class="col-md-3 text-center">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-aqua"><i class="ion ion-android-desktop"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Novas oport. últimos 7 dias</span>
                                            <span class="info-box-number"><h2><?php echo $totalOportunidadesAbertas7diasIndividual ?></h2></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo base_url() ?>index.php/crm/gerenciar?encerrada=nao" target="_blank">
                                <div class="col-md-3 text-center">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-yellow-active"><i class="ion ion-android-desktop"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Oport. fechadas últimos 7 dias</span>
                                            <span class="info-box-number"><h2><strong><?php echo $totalOportunidadesFechadas7diasIndividual ?></strong></h2></span>
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
                            <h2>OPORTUNIDADES SEPARADAS POR FASES DO FUNIL</h2>
                        </div>
                        <div class="row">
                            <?php foreach ($statusIndividual as $s) { ?>
                                <a href="<?php echo base_url() ?>index.php/crm/gerenciar?status=<?php echo $s->idstatus ?>" target="_blank">
                                    <div class="col-md-3 text-center">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-navy"><i class="ion ion-android-clipboard" target="_blank"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><?php echo $s->descricao ?> </span>
                                                <span class="info-box-number"><h2><?php echo $s->quantidade; ?></h2></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>

                        <div class="text-center">
                            <h2>OPORTUNIDADES SEPARADAS POR FONTE DE INDICAÇÃO</h2>
                        </div>
                        <div class="row">
                            <?php foreach ($fonteIndividual as $f) { ?>
                                <a href="<?php echo base_url() ?>index.php/crm/gerenciar?indicacao=<?php echo $f->idindicacao ?>" target="_blank">
                                    <div class="col-md-3 text-center">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-green-gradient"><i class="ion ion-android-clipboard" target="_blank"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><?php echo $f->descricao ?> </span>
                                                <span class="info-box-number"><h2><?php echo $f->quantidade; ?></h2></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="geral">
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
                            <a href="<?php echo base_url() ?>index.php/crm/gerenciar?garantia=1&encerrada=nao" target="_blank">
                                <div class="col-md-3 text-center">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-aqua"><i class="ion ion-android-desktop"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Novas oport. últimos 7 dias</span>
                                            <span class="info-box-number"><h2><?php echo $totalOportunidadesAbertas7dias ?></h2></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo base_url() ?>index.php/crm/gerenciar?encerrada=nao" target="_blank">
                                <div class="col-md-3 text-center">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-yellow-active"><i class="ion ion-android-desktop"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Oport. fechadas últimos 7 dias</span>
                                            <span class="info-box-number"><h2><strong><?php echo $totalOportunidadesFechadas7dias ?></strong></h2></span>
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
                            <h2>OPORTUNIDADES SEPARADAS POR FASES DO FUNIL</h2>
                        </div>
                        <div class="row">
                            <?php foreach ($status as $s) { ?>
                                <a href="<?php echo base_url() ?>index.php/crm/gerenciar?status=<?php echo $s->idstatus ?>" target="_blank">
                                    <div class="col-md-3 text-center">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-navy"><i class="ion ion-android-clipboard" target="_blank"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><?php echo $s->descricao ?> </span>
                                                <span class="info-box-number"><h2><?php echo $this->dashboard_model->countCrmStatus($s->idstatus); ?></h2></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>

                        <div class="text-center">
                            <h2>OPORTUNIDADES SEPARADAS POR FONTE DE INDICAÇÃO</h2>
                        </div>
                        <div class="row">
                            <?php foreach ($fonte as $f) { ?>
                                <a href="<?php echo base_url() ?>index.php/crm/gerenciar?indicacao=<?php echo $f->idindicacao ?>" target="_blank">
                                    <div class="col-md-3 text-center">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-green-gradient"><i class="ion ion-android-clipboard" target="_blank"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text"><?php echo $f->descricao ?> </span>
                                                <span class="info-box-number"><h2><?php echo $f->quantidade; ?></h2></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
<!-- /.col -->


<?php $this->load->view('template/footer'); ?>

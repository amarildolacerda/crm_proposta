<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Propostas
        <small>Gerenciar propostas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar propostas</li>
    </ol>
</section>
<section class="content-header">
    <div class="col-xs-12">
        <div class="col-xs-9">
            <h1>GERADOR DE PROPOSTAS WBA </h1>
        </div>
        <div class="col-xs-3 text-right">
            <a title="editar" href="<?php echo base_url() ?>index.php/proposta/edit/<?php echo $result->numpropostas; ?>" class="btn btn-primary btn-lg">Editar <i class="fa-fw glyphicon glyphicon-edit"></i> </a>
            <a class="btn btn-warning btn-lg" name="imprimir" href='javascript:window.print()' >IMPRIMIR</a>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <table class="table table-borderless">
        <tbody >
            <tr>
                <td>
                    <figure class="figure">
                        <img src="<?php echo base_url() ?>assets/imagens/logo.png" title="Logo" width="30%" height="30%" />
                    </figure>
                </td>
                <td class="text-left"> 
                    <div class="text-center">
                        <h2>Proposta</h2>
                        <h1><strong><?php echo $result->numpropostas; ?></strong></h1>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <br><br><br><br><br>
    <div class="row">
        <div class="col-xs-12">
            <div>
                <div class="col-xs-6">
                    <label>Nome Fantasia: <strong> <?php echo strtoupper($result->fantasia); ?></strong></label>
                </div>
                <div class="col-xs-6">
                    <label>CNPJ: <?php echo strtoupper($result->cnpj); ?></label>
                </div>
                <div class="col-xs-6">
                    <label>Endereço: <?php echo strtoupper($result->endereco); ?></label>
                </div>
                <div class="col-xs-3">
                    <label>Cidade: <?php echo strtoupper($result->cidade); ?></label>
                </div>
                <div class="col-xs-3">
                    <label>Estado: <?php echo strtoupper($result->estado); ?></label>
                </div>
                <div class="col-xs-6">
                    <label>E-mail: <?php echo strtoupper($result->email); ?></label>
                </div>
                <div class="col-xs-3">
                    <label>Contato: <?php echo strtoupper($result->contato); ?></label>
                </div>
                <div class="col-xs-3">
                    <label>Telefone: <?php echo strtoupper($result->telefone); ?></label>
                </div>
            </div> <!-- /.box-body -->

        </div> <!--/.col md-12) -->
        <!-- right column -->

        <!-- SELECT que verifica se tem equipamentos na proposta -->
        <?php
        if ($count_prod > 0) {
            ?> <!-- abre o if que verifica se tem equipamentos na proposta -->

            <div class="col-xs-12">
                <!-- Horizontal Form -->

                <!-- general form elements disabled -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Equipamentos adicionados a proposta</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-xs-6">
                            <label>Equipamento</label>
                            <br>
                            <?php
                            foreach ($produtos as $p) {
                                echo strtoupper($p->produto);
                                ?>
                                <br>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-xs-2 text-center">
                            <label>Quantidade</label>
                            <br>
                            <?php
                            foreach ($produtos as $p) {
                                echo strtoupper($p->quantidade);
                                ?>
                                <br>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-xs-2 text-center">
                            <label>Unitário (R$)</label>
                            <br>
                            <?php
                            foreach ($produtos as $p) {
                                echo number_format($p->vlunitario, 2, ',', '.');
                                ?>
                                <br>
                                <?php
                            }
                            ?>

                            ______________________________________________
                            <label>TOTAL (R$)</label>
                        </div>
                        <div class="col-xs-2 text-center">
                            <label>Total (R$)</label>
                            <br>
                            <?php
                            $totalequip = 0;
                            foreach ($produtos as $p) {
                                $totalequip = $totalequip + $p->vltotal;
                                echo number_format($p->vltotal, 2, ',', '.');
                                ?>
                                <br>
                                <?php
                            }
                            ?>
                            <br>
                            <label>
                                <?php echo number_format($totalequip, 2, ',', '.'); ?>
                            </label>
                        </div>
                        <?php
                        ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        <?php } ?> <!-- fecha o if que verifica se tem equipamentos na proposta -->

        <!-- SELECT que verifica se tem serviços na proposta -->    
        <?php
        if ($count_serv > 0) {
            ?> <!-- abre o if que verifica se tem serviços na proposta -->

            <div class="col-xs-12">
                <!-- Horizontal Form -->

                <!-- general form elements disabled -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Serviços adicionados a proposta</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="col-xs-6">
                            <label>Serviço</label>
                            <br>
                            <?php
                            foreach ($servicos as $s) {
                                echo strtoupper($s->servico);
                                ?>
                                <br>
                                <?php
                            }
                            ?>  
                        </div>
                        <div class="col-xs-2 text-center">
                            <label>Quantidade</label>
                            <br>
                            <?php
                            foreach ($servicos as $s) {
                                echo strtoupper($s->quantidade);
                                ?>
                                <br>
                                <?php
                            }
                            ?>  
                        </div>
                        <div class="col-xs-2 text-center">
                            <label>Unitário (R$)</label>
                            <br>
                            <?php
                            foreach ($servicos as $s) {
                                echo number_format($s->vlunitario, 2, ',', '.');
                                ?>
                                <br>
                                <?php
                            }
                            ?>

                            ______________________________________________
                            <label>TOTAL (R$)</label>
                        </div>
                        <div class="col-xs-2 text-center">
                            <label>Total (R$)</label>
                            <br>
                            <?php
                            $totalserv = 0;
                            foreach ($servicos as $s) {
                                $totalserv = $totalserv + $s->vltotal;
                                echo number_format($s->vltotal, 2, ',', '.');
                                ?>
                                <br>
                                <?php
                            }
                            ?>
                            <br>
                            <label>
                                <?php echo number_format($totalserv, 2, ',', '.'); ?>
                            </label>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <?php
        } // fecha o if que verifica se tem serviços na proposta

        if ($count_prod > 0 and $count_serv > 0) {
            ?> 
            <div class="col-xs-12">
                <!-- Horizontal Form -->
                <div class="box box-success">
                    <div class="box-header with-border text-center">
                        <?php
                        $totalgeral = $totalserv + $totalequip;
                        ?>
                        <div class="col-xs-10">
                            <strong>TOTAL GERAL EQUIPAMENTOS + SERVIÇOS</strong>
                        </div>
                        <div class="col-xs-2">
                            <strong>R$<?php echo number_format($totalgeral, 2, ',', '.'); ?> </strong>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        <?php } ?>


        <!-- SELECT que verifica se tem modulos na proposta -->
        <?php
        if ($count_mod > 0) {
            ?> <!-- abre o if que verifica se tem modulos na proposta -->
            <div class="col-xs-7">
                <!-- Horizontal Form -->

                <!-- general form elements disabled -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Módulos adicionados a proposta</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-xs-8">
                            <label>Módulos</label>
                            <br>
                            <?php
                            foreach ($modulos as $m) {
                                echo strtoupper($m->modulo);
                                ?>
                                <br>
                                <?php
                            }
                            ?>  
                        </div>
                        <div class="col-xs-4 text-center">
                            <label>Quantidade</label>
                            <br>
                            <?php
                            foreach ($modulos as $m) {
                                echo strtoupper($m->quantidade);
                                ?>
                                <br>
                                <?php
                            }
                            ?>  
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        <?php } ?>  <!-- fecha o if que verifica se tem modulos na proposta -->

        <?php
        if ($count_mod > 0) {
            ?> <!-- abre o if que verifica se tem modulos na proposta -->
            <div class="col-xs-5">
                <div class="box box-success">
                    <div class="box-header with-border text-center">
                        <?php if ($result->totalmensalidade > 0) { ?>

                            <font size="4"> Mensalidade:
                            <strong>R$<?php echo number_format($result->totalmensalidade, 2, ',', '.'); ?></strong></font>
                        <?php } ?>
                    </div>
                </div>
                <div>
                    <strong> Pagamento da mensalidade 30 dias após a instalação.</strong>
                </div>
            </div>
            <?php
        }
        ?> <!-- fecha o if que verifica se tem modulos na proposta -->

        <div class="col-xs-12">    
            <div class="col-xs-6">
                Prazo Pagamento: <strong><?php echo nl2br($result->prazopagamento); ?></strong>
            </div>  
            <div class="col-xs-3">
                Validade proposta:<strong><?php echo $result->validade; ?> dias</strong>
            </div>
            <div class="col-xs-3">
                Previsao instalação:<strong><?php echo $result->previsaoinst; ?> dias</strong>
                <br><br>
            </div>
        </div>
        <div class="col-xs-12">
            <strong>Nossa missão: </strong>
            “Oferecer aos nossos clientes soluções tecnológicas de gestão de negócios integrados aprimorando diariamente a prestação de serviço. ”
            <br>
            <strong>Nossa visão: </strong>
            “Ser o melhor grupo de tecnologia integrada levando ao cliente informações de decisões que permita as empresas prosperarem. ”
            <br><br>
            <?php if ($result->observacao != null) { ?>
                <strong>Observações: </strong>
                <?php echo nl2br($result->observacao); ?>
                <br><br>
            <?php } ?>
        </div>
        <div class="col-xs-6">
            <strong>
                ________________________________________
                <br>
                Cliente
            </strong>
        </div>
        <div class="col-xs-6">
            <strong>
                _______________________________________
                <br>
                <?php
                echo $dadoslogin['nome'];
                echo " - ";
                echo $dadoslogin['telefone'];
                ?> 
            </strong>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
<?php $this->load->view('template/footer'); ?>
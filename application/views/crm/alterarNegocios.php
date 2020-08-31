<?php $this->load->view('template/menu'); ?>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-6">
                                <label style="font-size:20px"><?php echo $negocios->nomeDoNegocio ?> </label> <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-nomeDoNegocio">Alterar nome <i class="fa fa-hand-spock-o"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <form action="<?php echo current_url(); ?>" method="post">
                                    <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                                    <input type="hidden" name="nomeDoNegocio" value="<?php echo $negocios->nomeDoNegocio ?>">
                                    <input type="hidden" name="valorDoNegocio" value="<?php echo $negocios->valorDoNegocio ?>">
                                    <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                                    <input type="hidden" name="mensalidade" value="<?php echo $negocios->mensalidade ?>">
                                    <input type="hidden" name="faseDoFunil" value="1">
                                    <button class="btn col-md-12 " type="submit" style="background: gray; color: white">Oportunidade <i class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="<?php echo current_url(); ?>" method="post">
                                    <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                                    <input type="hidden" name="nomeDoNegocio" value="<?php echo $negocios->nomeDoNegocio ?>">
                                    <input type="hidden" name="valorDoNegocio" value="<?php echo $negocios->valorDoNegocio ?>">
                                    <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                                    <input type="hidden" name="mensalidade" value="<?php echo $negocios->mensalidade ?>">
                                    <input type="hidden" name="faseDoFunil" value="2">
                                    <button class="btn btn-primary col-md-12 " type="submit" >Demo agendada <i class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="<?php echo current_url(); ?>" method="post">
                                    <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                                    <input type="hidden" name="nomeDoNegocio" value="<?php echo $negocios->nomeDoNegocio ?>">
                                    <input type="hidden" name="valorDoNegocio" value="<?php echo $negocios->valorDoNegocio ?>">
                                    <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                                    <input type="hidden" name="mensalidade" value="<?php echo $negocios->mensalidade ?>">
                                    <input type="hidden" name="faseDoFunil" value="3">
                                    <button class="btn col-md-12 " type="submit" style="background: purple; color: white" >Proposta entregue <i class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="<?php echo current_url(); ?>" method="post">
                                    <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                                    <input type="hidden" name="nomeDoNegocio" value="<?php echo $negocios->nomeDoNegocio ?>">
                                    <input type="hidden" name="valorDoNegocio" value="<?php echo $negocios->valorDoNegocio ?>">
                                    <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                                    <input type="hidden" name="mensalidade" value="<?php echo $negocios->mensalidade ?>">
                                    <input type="hidden" name="faseDoFunil" value="4">
                                    <button class="btn btn-warning col-md-12 " type="submit" >Em negociação <i class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-success col-md-12" data-toggle="modal" data-target="#modal-negocioGanho">Ganho</a>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-danger col-md-12" data-toggle="modal" data-target="#modal-negocioPerdido">Perdido</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--CARREGA OS MODALs QUE ESTÃO na CRM/config-->
            <?php $this->load->view('crm/config/modalAlterarNegocios'); ?>

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
                    <li><a href="#produtos" data-toggle="tab">Propostas</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="geral">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <div class="col-md-10">
                                            <h3 class="box-title">SOBRE O NEGÓCIO</h3>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="label label-danger"><?php
                                                foreach ($usuarios as $comercial) {
                                                    if ($negocios->vendedor == $comercial->idusuarios) {
                                                        echo $comercial->nome;
                                                    }
                                                }
                                                ?></span>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <form action="<?php echo current_url(); ?>" method="post">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                                                        <input type="hidden" name="nomeDoNegocio" value="<?php echo $negocios->nomeDoNegocio ?>">
                                                        <input type="hidden" name="valorDoNegocio" value="<?php echo $negocios->valorDoNegocio ?>">
                                                        <input type="hidden" name="dataFechamentoEsperada" value="<?php echo $negocios->dataFechamentoEsperada ?>">
                                                        <input type="hidden" name="mensalidade" value="<?php echo $negocios->mensalidade ?>">
                                                        <p style="font-size:30px">Valor do negócio R$<?php echo number_format($negocios->valorDoNegocio, 2, ',', '.'); ?><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-valorNegocio">Alterar <i class="fa fa-dollar"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a class="btn btn-foursquare" href="tel:+55<?php echo $empresa->telefone; ?>"><i class="fa fa-industry"></i></a>
                                                </div>
                                                <div class="col-md-1">
                                                    <a class="btn btn-github" href="tel:+55<?php echo $contato->whatsappContato; ?>"><i class="fa fa-user"></i></a>
                                                </div>
                                                <div class="col-md-1">
                                                    <a class="btn btn-success" target="blank" href="https://api.whatsapp.com/send?phone=<?php echo $contato->whatsappContato ?>"><i class="fa fa-whatsapp"></i></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <p style="font-size:30px">Mensalidade R$<?php echo number_format($negocios->mensalidade, 2, ',', '.'); ?><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-mensalidade">Alterar <i class="fa fa-dollar"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Data de fechamento esperada </label>
                                                        <input type="date" class="form-control" name="dataFechamentoEsperada" required="" minlength=3 value="<?php echo $negocios->dataFechamentoEsperada ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Fase do fúnil</label>
                                                        <select 
                                                        <?php
                                                        switch ($negocios->faseDoFunil) {
                                                            case 1:
                                                                echo 'style="background: gray; color: white"';
                                                                break;
                                                            case 2:
                                                                echo 'style="background: #3C8DBC; color: white"';
                                                                break;
                                                            case 3:
                                                                echo 'style="background: purple; color: white"';
                                                                break;
                                                            case 4:
                                                                echo 'style="background: #F39C12; color: white"';
                                                                break;
//                                                        case 5:
//                                                            echo 'style="background: #00A65A; color: white"';
//                                                            break;
//                                                        case 6:
//                                                            echo 'style="background: #DD4B39; color: white"';
//                                                            break;
                                                        }
                                                        ?>
                                                            required=""
                                                            class="form-control" name="faseDoFunil">
                                                            <option value = "" ></option>
                                                            <?php
                                                            foreach ($status as $value2) {
                                                                ?>
                                                                <option value = <?php echo $value2->idstatus; ?> <?php
                                                                if ($negocios->faseDoFunil == $value2->idstatus) {
                                                                    echo "selected";
                                                                }
                                                                ?>><?php echo $value2->descricao; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group text-right">
                                                        <button type="submit" class="btn btn-success"> SALVAR </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <div class="col-md-4">
                                            <h3 class="box-title">EMPRESA</h3>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Nome da empresa / Razão Social </label> <a title="editar" href="<?php echo base_url() ?>index.php/empresa/edit/<?php echo $empresa->idEmpresas . "/" . $negocios->idNegocio ?>" class="btn btn-primary btn-xs">Alterar <i class="fa fa-industry"></i></a>
                                                    <input type="text" class="form-control" name="nomeEmpresa" required="" minlength=3 readonly="" value="<?php echo $empresa->nomeEmpresa ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>CNPJ</label>
                                                    <input type="text" class="form-control" maxlength="18" name="cnpjEmpresa" readonly="" value="<?php echo $empresa->cnpj ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Tipo</label>
                                                    <select readonly="" class="form-control" name="tipoEmpresa" data-toggle="tooltip" data-placement="left" title="Tipo do contato?">
                                                        <option value = "" ></option>
                                                        <?php
                                                        foreach ($tipo as $value2) {
                                                            ?>
                                                            <option value = <?php echo $value2->idTipoEmpresa; ?> <?php
                                                            if ($empresa->tipo == $value2->idTipoEmpresa) {
                                                                echo "selected";
                                                            }
                                                            ?>><?php echo $value2->descricao; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Fonte da indicação</label>
                                                    <select readonly=""class="form-control" name="fonte" data-toggle="tooltip" data-placement="left" title="Quem indicou?">
                                                        <option value = "" ></option>
                                                        <?php
                                                        foreach ($indicacao as $value2) {
                                                            ?>
                                                            <option value = <?php echo $value2->idindicacao; ?> <?php
                                                            if ($empresa->fonteIndicacao == $value2->idindicacao) {
                                                                echo "selected";
                                                            }
                                                            ?>><?php echo $value2->descricao; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Segmento</label>
                                                    <select readonly="" class="form-control" name="segmentoEmpresa">
                                                        <option value = "" ></option>
                                                        <?php
                                                        foreach ($segmento as $value2) {
                                                            ?>
                                                            <option value = <?php echo $value2->idseguimento; ?> <?php
                                                            if ($empresa->segmento == $value2->idseguimento) {
                                                                echo "selected";
                                                            }
                                                            ?>><?php echo $value2->descricao; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Endereço </label>
                                                    <input type="text" class="form-control" name="enderecoEmpresa" readonly="" value="<?php echo $empresa->enderecoEmpresa ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label>Compl. </label>
                                                    <input type="text" class="form-control" name="complementoEmpresa" readonly="" value="<?php echo $empresa->complementoEmpresa ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Bairro </label>
                                                    <input type="text" class="form-control" name="bairroEmpresa" readonly="" value="<?php echo $empresa->bairroEmpresa ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Cidade </label>
                                                    <input type="text" class="form-control" name="cidadeEmpresa" readonly="" value="<?php echo $empresa->cidadeEmpresa ?>"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Telefone</label>
                                                    <input type="text" class="form-control" maxlength="15" name="telefoneEmpresa" readonly="" value="<?php echo $empresa->telefone ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Rede social / Site</label>
                                                    <input type="text" class="form-control" name="siteEmpresa" readonly="" value="<?php echo $empresa->site ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Qual software usa?</label>
                                                    <input required="" type="text" class="form-control" maxlength="15" readonly="" name="softwareAtual" data-toggle="tooltip" data-placement="bottom" title="Colocar o nome do sistema" value="<?php echo $empresa->softwareAtual ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <div class="col-md-4">
                                            <h3 class="box-title">CONTATO</h3>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nome do contato </label> <a title="editar" href="<?php echo base_url() ?>index.php/empresa/edit/<?php echo $empresa->idEmpresas . "/" . $negocios->idNegocio ?>" class="btn btn-primary btn-xs">Alterar <i class="fa fa-user"></i></a>
                                                    <input type="text" class="form-control" name="nomeContato" readonly="" value="<?php echo $contato->nomeContato ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Cargo </label>
                                                    <input type="text" class="form-control" name="cargo" readonly="" value="<?php echo $contato->cargo ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Papel na compra </label>
                                                    <select class="form-control" readonly="" name="papelNaCompra" data-toggle="tooltip" data-placement="left" title="Decisor: Quem decide a compra Influenciador: Influencia compra">
                                                        <option value="naosei" <?php
                                                        if ($contato->papelNaCompra == "naosei") {
                                                            echo "selected";
                                                        }
                                                        ?>>Não sei</option>
                                                        <option value="decisor" <?php
                                                        if ($contato->papelNaCompra == "decisor") {
                                                            echo "selected";
                                                        }
                                                        ?>>Decisor</option>
                                                        <option value="influenciador" <?php
                                                        if ($contato->papelNaCompra == "influenciador") {
                                                            echo "selected";
                                                        }
                                                        ?>>Influenciador</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Telefone</label>
                                                    <input type="text" readonly="" class="form-control" maxlength="15" name="telefoneContato" value="<?php echo $contato->telefoneContato ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Whatsapp</label>
                                                    <input type="text" readonly="" class="form-control" maxlength="15" name="whatsappContato" value="<?php echo $contato->whatsappContato ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="email" readonly="" class="form-control" name="emailContato" value="<?php echo $contato->emailContato ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-foursquare" data-toggle="modal" data-target="#modal-adicionarTarefasLigacao">
                                        <i class="fa fa-phone"> Ligação</i> 
                                    </button>
                                    <button type="button" class="btn btn-github" data-toggle="modal" data-target="#modal-adicionarTarefasVisita">
                                        <i class="fa  fa-calendar-plus-o"> Visita</i> 
                                    </button>
                                    <button type="button" class="btn btn-instagram" data-toggle="modal" data-target="#modal-adicionarTarefasEmail">
                                        <i class="fa  fa-envelope"> E-mail</i> 
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="box-body">
                                    <div class="box box-primary">
                                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                                            <i class="ion ion-clipboard"></i>
                                            <h3 class="box-title">Tarefas planejadas</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                                            <ul class="todo-list ui-sortable">
                                                <?php
                                                foreach ($tarefas as $t) {
                                                    ?>
                                                    <li>
                                                        <input type="checkbox" value="fechado" data-toggle="modal" data-target="#modal-encerrarTarefa<?php echo $t->idTarefasNegocios ?>">
                                                        <span class="text"> <a class="btn-xs <?php echo $t->icone ?>"></a><?php echo " " . substr($t->titulo, 0, 40) ?></span>
                                                        <a  
                                                        <?php
                                                        date_default_timezone_set('America/Sao_Paulo');
                                                        $date = new DateTime($t->data);
                                                        if ($date->format('Y-m-d') == date('Y-m-d')) {
                                                            echo 'class="btn btn-danger"> Hoje / ' . $date->format('H:i');
                                                        } else if ($date->format('Y-m-d') == date('Y-m-d', strtotime("+1 day"))) {
                                                            echo 'class="btn btn-warning"> Amanhã / ' . $date->format('H:i');
                                                        } else {
                                                            echo 'class="btn btn-success">' . $date->format('d-m-Y H:i');
                                                        }
                                                        ?>
                                                            <i class="fa fa-clock-o"></i>
                                                        </a>
                                                        <div class="tools">
                                                            <i data-toggle="modal" data-target="#modal-alterarTarefa<?php echo $t->idTarefasNegocios ?>" class="fa fa-edit"></i>   
                                                            <i data-toggle="modal" data-target="#modal-excluirTarefa<?php echo $t->idTarefasNegocios ?>" class="fa fa-trash-o"></i>
                                                        </div>
                                                    </li>

                                                    <!--MODAL ALTERAR TAREFAS-->
                                                    <div class="modal fade" id="modal-alterarTarefa<?php echo $t->idTarefasNegocios ?>" >
                                                        <div class="modal-dialog">
                                                            <div class="modal-content" >
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Alterar Tarefa</h4>
                                                                </div>
                                                                <form action="<?php echo base_url() ?>index.php/crm/alterarTarefas" method="post">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="idTarefasNegocios" value="<?php echo $t->idTarefasNegocios ?>">
                                                                            <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                                                                            <input type="hidden" name="tipo" class="form-control" value="<?php echo $t->tipo ?>">
                                                                            <input type="hidden" name="icone" class="form-control" value="<?php echo $t->icone ?>">
                                                                            <input type="hidden" name="status" class="form-control" value="<?php echo $t->status ?>">
                                                                            <input type="hidden" name="tarefaAlteradaEncerrada" value="TAREFA ALTERADA">

                                                                            <label>Título</label>
                                                                            <input type="text" class="form-control"  name="titulo" required="" value="<?php echo $t->titulo ?>">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Descrição da tarefa</label>
                                                                            <textarea class="form-control" rows="3" name="descricao" ><?php echo $t->descricao ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Data</label>
                                                                            <input type="datetime-local" name="data" class="form-control" required="" value="<?php echo $date->format('Y-m-d') . "T" . $date->format('h:i') ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div>
                                                                            <div class="form-group">
                                                                                <label>Registrar alterações na Timeline?</label>
                                                                                <input type="checkbox" name="registraNaTimeline" value="sim" checked="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Não</button>
                                                                        <button type="submit" class="btn btn-success ">Sim<i class="icon-remove icon-white"></i></button>
                                                                    </div>

                                                                </form>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    <!--MODAL ALTERAR TAREFAS-->
                                                    <!--MODAL ENCERRAR TAREFAS-->
                                                    <div class="modal fade" id="modal-encerrarTarefa<?php echo $t->idTarefasNegocios ?>" >
                                                        <div class="modal-dialog">
                                                            <div class="modal-content" >
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Concluir Tarefa?</h4>
                                                                </div>
                                                                <form action="<?php echo base_url() ?>index.php/crm/alterarTarefas" method="post">

                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="idTarefasNegocios" value="<?php echo $t->idTarefasNegocios ?>">
                                                                            <input type="hidden" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                                                                            <input type="hidden" name="tipo" class="form-control" value="<?php echo $t->tipo ?>">
                                                                            <input type="hidden" name="icone" class="form-control" value="<?php echo $t->icone ?>">
                                                                            <input type="hidden" name="titulo" class="form-control" value="<?php echo $t->titulo ?>">
                                                                            <input type="hidden" name="descricao" class="form-control" value="<?php echo $t->descricao ?>">
                                                                            <input type="hidden" name="status" class="form-control" value="fechado">
                                                                            <input type="hidden" name="data" class="form-control" value="<?php echo $t->data ?>">
                                                                            <input type="hidden" name="registraNaTimeline" class="form-control"  value="sim">
                                                                            <input type="hidden" name="tarefaAlteradaEncerrada" value="TAREFA CONCLUÍDA">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Não</button>
                                                                        <button type="submit" class="btn btn-success ">Sim<i class="icon-remove icon-white"></i></button>
                                                                    </div>

                                                                </form>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    <!--MODAL ENCERRAR TAREFAS-->
                                                    <!--MODAL EXCLUIR TAREFAS-->
                                                    <div class="modal fade" id="modal-excluirTarefa<?php echo $t->idTarefasNegocios ?>" >
                                                        <div class="modal-dialog">
                                                            <div class="modal-content" >
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Deseja excluir a tarefa <?php echo $t->titulo ?>?</h4>
                                                                </div>
                                                                <form action="<?php echo base_url() ?>index.php/crm/excluirTarefas" method="post">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="idTarefasNegocios" value="<?php echo $t->idTarefasNegocios ?>">
                                                                            <input type="hidden" name="idNegocio" value="<?php echo $t->idNegocio ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Não</button>
                                                                        <button type="submit" class="btn btn-success ">Sim<i class="icon-remove icon-white"></i></button>
                                                                    </div>

                                                                </form>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    <!--MODAL EXCLUIR TAREFAS-->
                                                    <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="box-body box box-primary">
                                        <h4 class="box-title">TIMELINE DE HISTÓRICO</h4>
                                        <form id="formTimeline" action="<?php echo base_url() ?>crm/adicionarTimeline" method="post">
                                            <div class="col-md-10">

                                                <input type="hidden" name="tipo" id="tipo" value="fa fa-comments bg-yellow" />
                                                <input type="hidden" name="idNegocio" id="idEmpresas" value="<?php echo $negocios->idNegocio ?>" />
                                                <label for="">Descrição</label>
                                                <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva o que foi conversado com o cliente"></textarea>
                                            </div>
                                            <div class="col-md-1">
                                                <label for="">.</label>
                                                <button class="btn btn-primary span12" id="btnAdicionarProduto"><i class="icon-white icon-plus"></i> Adicionar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="timeline" id="divTimeline">
                                        <?php
                                        foreach ($timelineNegocios as $t) {
                                            ?>
                                            <!-- timeline time label -->
                                            <li class="time-label">
                                                <span class="bg-green">
                                                    <?php
                                                    echo $t->data;
                                                    ?>
                                                </span>
                                            </li><!-- /.timeline-label -->
                                            <li> <!-- timeline item -->
                                                <i class="<?php echo $t->tipo ?>"></i> <!-- timeline icon -->
                                                <div class="timeline-item" >
                                                    <h3 class="timeline-header"><a class="text blue"><?php echo $t->nome; ?> </a> 
                                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dAgenda')) { ?>
                                                            <?php echo '<a href="" idAcao="' . $t->idTimeline_negocios . '" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i></a>'; ?>                                            

                                                        <?php } ?>                                    
                                                    </h3>
                                                    <div class="timeline-body ">
                                                        <?php echo nl2br($t->descricao) ?>
                                                    </div>  
                                                </div>
                                            </li><!-- TIME LINE - FIM DO CODIGO -->
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="tab-pane" id="produtos">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-success">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Propostas</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <form action="<?php echo base_url() ?>index.php/proposta/adicionarProposta" method="post">
                                                <input type="hidden" class="form-control" name="idEmpresas" value="<?php echo $negocios->idEmpresas ?> ">
                                                <input type="hidden" class="form-control" name="idContatos" value="<?php echo $negocios->idContatos ?>">
                                                <input type="hidden" class="form-control" name="idNegocio" value="<?php echo $negocios->idNegocio ?>">
                                                <input type="hidden" class="form-control" name="prazoPagamento" value="a combinar">
                                                <input type="hidden" class="form-control" name="validade" value="<?php echo "10 dias" ?>">
                                                <input type="hidden" class="form-control" name="previsaoInstalacao" value="<?php echo "10 dias" ?>">
                                                <input type="hidden" class="form-control" name="vendedor" value="<?php echo $dadoslogin['idusuarios'] ?>">
                                                <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Proposta</button>
                                            </form>
                                            <?php if (!$proposta) { ?>
                                                <div class="widget-box">
                                                    <div class="widget-title">

                                                        <h5>PROPOSTAS</h5>
                                                    </div>
                                                    <div class="widget-content nopadding table-responsive">
                                                        <table class="table table-bordered table-hover table-striped table-condensed">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Descrição</th>
                                                                    <th>Status</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="5">Nenhum Lead Cadastrado</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="widget-box">
                                                    <div class="widget-title">
                                                        <span class="icon">
                                                            <i class="icon-barcode"></i>
                                                        </span>
                                                    </div>
                                                    <div class="widget-content nopadding table-responsive">
                                                        <table class="table table-bordered table-hover table-striped table-condensed">
                                                            <thead>
                                                                <tr style="backgroud-color: #2D335B">
                                                                    <th>Proposta</th>
                                                                    <th>Produtos</th>
                                                                    <th>Serviços</th>
                                                                    <th>Mensalidade</th>
                                                                    <th>Cadastro</th>
                                                                    <th>Alteração</th>
                                                                    <th>Ações</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($proposta as $r) { ?>
                                                                    <tr> 
                                                                        <td class="text-middle ng-binding"><?php echo $r->idPropostas; ?></td>
                                                                        <td class="text-middle ng-binding"><?php echo "R$" . number_format($r->totalProdutos, 2, ',', '.'); ?></td> 
                                                                        <td class="text-middle ng-binding"><?php echo "R$" . number_format($r->totalServicos, 2, ',', '.'); ?></td> 
                                                                        <td class="text-middle ng-binding"><?php echo "R$" . number_format($r->mensalidade, 2, ',', '.'); ?></td> 
                                                                        <td class="text-middle ng-binding">
                                                                            <?php
                                                                            $date = new DateTime($r->dataCadastro);
                                                                            echo $date->format('d-m-Y');
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-middle ng-binding">
                                                                            <?php
                                                                            $date = new DateTime($r->dataAlteracao);
                                                                            echo $date->format('d-m-Y');
                                                                            ?>
                                                                        </td> 
                                                                        <td class="text-center">
                                                                            <a title="imprimir" href="<?php echo base_url() . 'index.php/proposta/imprimir/' . $r->idPropostas ?>" class="btn btn-warning btn-xs"><i class="fa-fw glyphicon glyphicon-print"></i> </a>
                                                                            <a title="editar" href="<?php echo base_url() ?>index.php/proposta/editarProposta/<?php echo $r->idPropostas; ?>" class="btn btn-primary btn-xs"><i class="fa-fw glyphicon glyphicon-edit"></i> 
                                                                            </a>
                                                                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dLead')) { ?>
                                                                                <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->idPropostas; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
                                                                            <?php } ?>
                                                                            <!--MODAL BOTÃO EXCLUIR-->
                                                                            <div class="modal modal-default fade" id="modal-danger<?php echo $r->idPropostas; ?>">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">×</span></button>
                                                                                            <h4 class="modal-title">Deseja excluir a proposta <?php echo $r->idPropostas; ?> ?  ?</h4>
                                                                                        </div>
                                                                                        <form action="<?php echo base_url() ?>index.php/proposta/excluirProposta" method="post">
                                                                                            <input type="hidden" id="idPropostaExcluir" name="idPropostaExcluir" value="<?php echo $r->idPropostas; ?>">
                                                                                            <input type="hidden" id="idNegocio" name="idNegocio" value="<?php echo $r->idNegocio; ?>">
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                                                                                                <button type="submit" class="btn btn-danger ">Excluir<i class="icon-remove icon-white"></i></button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div><!-- /.modal-content -->
                                                                                </div><!-- /.modal-dialog -->
                                                                            </div>
                                                                            <!--MODAL BOTÃO EXCLUIR-->
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <?php
                                                //echo $this->pagination->create_links();
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <?php $this->load->view('template/footer'); ?>


            <script type="text/javascript">
                $(document).ready(function () {

                    $("#formTimeline").validate({
                        rules: {
                            descricao: {required: true}
                        },
                        messages: {
                            descricao: {required: 'Insira a descrição'}
                        },
                        submitHandler: function (form) {

                            var dados = $(form).serialize();
                            $("#divTimeline").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>index.php/crm/adicionarTimeline",
                                data: dados,
                                dataType: 'json',
                                success: function (data)
                                {
                                    if (data.result == true) {
                                        $("#divTimeline").load("<?php echo current_url(); ?> #divTimeline");
                                        $("#idNegocio").val('');
                                        $("#descricao").val('');
                                        $("#descricao").val('').focus();
                                    } else {
                                        alert('Ocorreu um erro ao tentar adicionar timeline.');
                                    }
                                }
                            });
                            return false;
                        }

                    });
                    $(document).on('click', 'a', function (event) {
                        var idTimeline_negocios = $(this).attr('idAcao');
                        if ((idTimeline_negocios % 1) == 0) {
                            $("#divTimeline").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>index.php/crm/excluirTimeline",
                                data: "idTimeline_negocios=" + idTimeline_negocios,
                                dataType: 'json',
                                success: function (data)
                                {
                                    if (data.result == true) {
                                        $("#divTimeline").load("<?php echo current_url(); ?> #divTimeline");
                                        $("#descricao").val('');
                                        $("#descricao").val('').focus();
                                    } else {
                                        alert('Ocorreu um erro ao tentar excluir timeline.');
                                    }
                                }
                            });
                            return false;
                        }

                    });
                });
            </script>


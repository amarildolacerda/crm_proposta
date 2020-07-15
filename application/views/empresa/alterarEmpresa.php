<?php $this->load->view('template/menu'); ?>
<section class="content">
    <div class="col-md-8 col-md-offset-2">
        <?php if ($formErrors) { ?>
            <div class="alert alert-danger">
                <?= $formErrors ?>
            </div>
            <?php
        } else {
            if ($this->session->flashdata('success_msg')) {
                ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success_msg') ?>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Geral</a></li>
                <li><a href="#tab_2" data-toggle="tab">Negócios</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <div class="col-md-10">
                                        <h3 class="box-title">EMPRESA</h3>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="label label-danger"><?php
                                            foreach ($usuarios as $comercial) {
                                                if ($empresa->vendedor == $comercial->idusuarios) {
                                                    echo $comercial->nome;
                                                }
                                            }
                                            ?></span>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Nome da empresa / Razão Social </label>
                                                <input type="text" class="form-control" name="nomeEmpresa" required="" minlength=3 value="<?php echo $empresa->nomeEmpresa ?>">
                                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CNPJ</label>
                                                <input type="text" class="form-control" maxlength="18" name="cnpjEmpresa" value="<?php echo $empresa->cnpj ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <select required="" class="form-control" name="tipoEmpresa" data-toggle="tooltip" data-placement="left" title="Tipo do contato?">
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
                                                <select required="" class="form-control" name="fonte" data-toggle="tooltip" data-placement="left" title="Quem indicou?">
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
                                                <select required="" class="form-control" name="segmentoEmpresa">
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
                                                <input type="text" class="form-control" name="enderecoEmpresa" value="<?php echo $empresa->enderecoEmpresa ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>Compl. </label>
                                                <input type="text" class="form-control" name="complementoEmpresa" value="<?php echo $empresa->complementoEmpresa ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bairro </label>
                                                <input type="text" class="form-control" name="bairroEmpresa" value="<?php echo $empresa->bairroEmpresa ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cidade </label>
                                                <input type="text" class="form-control" name="cidadeEmpresa" value="<?php echo $empresa->cidadeEmpresa ?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Telefone</label>
                                                <input type="text" class="form-control" maxlength="15" name="telefoneEmpresa" value="<?php echo $empresa->telefone ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Rede social / Site</label>
                                                <input type="text" class="form-control" name="siteEmpresa" value="<?php echo $empresa->site ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Qual software usa?</label>
                                                <input required="" type="text" class="form-control" maxlength="15" name="softwareAtual" data-toggle="tooltip" data-placement="bottom" title="Colocar o nome do sistema" value="<?php echo $empresa->softwareAtual ?>">
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
                                                <label>Nome do contato </label>
                                                <input type="text" class="form-control" name="nomeContato" required="" value="<?php echo $contato->nomeContato ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cargo </label>
                                                <input type="text" class="form-control" name="cargo" value="<?php echo $contato->cargo ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Papel na compra </label>
                                                <select class="form-control" name="papelNaCompra" data-toggle="tooltip" data-placement="left" title="Decisor: Quem decide a compra Influenciador: Influencia compra">
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
                                                <input type="text" class="form-control" maxlength="15" name="telefoneContato" value="<?php echo $contato->telefoneContato ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Whatsapp</label>
                                                <input type="text" class="form-control" maxlength="15" name="whatsappContato" value="<?php echo $contato->whatsappContato ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" name="emailContato" value="<?php echo $contato->emailContato ?>">
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
                                <button type="button" class="btn btn-foursquare" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa fa-phone"> Ligação</i> 
                                </button>
                                <button type="button" class="btn btn-github" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa  fa-calendar-plus-o"> Visita</i> 
                                </button>
                                <button type="button" class="btn btn-instagram" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa  fa-envelope"> E-mail</i> 
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="box-body">
                                <div class="box-body box box-primary">
                                    <h4 class="box-title">TIMELINE DE HISTÓRICO</h4>
                                    <form id="formTimeline" action="<?php echo base_url() ?>empresa/adicionarTimeline" method="post">
                                        <div class="col-md-10">
                                            
                                            <input type="hidden" name="tipo" id="tipo" value="fa fa-comments bg-yellow" />
                                            <input type="hidden" name="idEmpresas" id="idEmpresas" value="<?php echo $empresa->idEmpresas ?>" />
                                            <label for="">Descrição</label>
                                            <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva o que foi conversado com o cliente"></textarea>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="">.</label>
                                            <button class="btn btn-primary span12" id="btnAdicionarProduto"><i class="icon-white icon-plus"></i> Adicionar</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="box box-primary">
                                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                                        <i class="ion ion-clipboard"></i>
                                        <h3 class="box-title">Planejado</h3>
                                        <!--
                                                                    <div class="box-tools pull-right">
                                                                        <ul class="pagination pagination-sm inline">
                                                                            <li><a href="#">«</a></li>
                                                                            <li><a href="#">1</a></li>
                                                                            <li><a href="#">2</a></li>
                                                                            <li><a href="#">3</a></li>
                                                                            <li><a href="#">»</a></li>
                                                                        </ul>
                                                                    </div>-->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                                        <ul class="todo-list ui-sortable">
                                            <li>
                                                <input type="checkbox" value="">
                                                <span class="text">Design a nice theme</span>
                                                <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                                <div class="tools">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <input type="checkbox" value="">
                                                <span class="text">Make the theme responsive</span>
                                                <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                                                <div class="tools">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <input type="checkbox" value="">
                                                <span class="text">Let theme shine like a star</span>
                                                <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                                                <div class="tools">
                                                    <i class="fa fa-edit"></i>
                                                    <i class="fa fa-trash-o"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="timeline" id="divTimeline">
                                    <?php
                                    foreach ($timelineEmpresas as $t) {
                                        ?>
                                        <!-- timeline time label -->
                                        <li class="time-label">
                                            <span class="bg-blue">
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
                                                        <?php echo '<a href="" idAcao="' . $t->idTimeline_empresas . '" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i></a>'; ?>                                            

                                                    <?php } ?>                                    
                                                </h3>
                                                <div class="timeline-body">
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
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success">
                                <form action="<?php echo base_url() ?>index.php/proposta/add" method="post">
                            <!--                        <input type="hidden" class="form-control" name="fantasia" value="<?php echo $empresa->empresa; ?>">
                                        <input type="hidden" class="form-control" name="cnpj" value="0">
                                        <input type="hidden" class="form-control" name="endereco" value="<?php echo $empresa->endereco; ?>">
                                        <input type="hidden" class="form-control" name="estado" value="SP">
                                        <input type="hidden" class="form-control" name="cidade" value="<?php echo $empresa->cidade; ?>">
                                        <input type="hidden" class="form-control" name="email" value="<?php echo $empresa->email; ?>">
                                        <input type="hidden" class="form-control" name="contato" value="<?php echo $empresa->nome; ?>">
                                        <input type="hidden" class="form-control" name="telefone" value="<?php echo $result->telefone; ?>">
                                        <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                                        <input type="hidden" class="form-control" name="idLead_proposta" value="<?php echo $result->idcrm ?>">-->
                                    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Novo</button>
                                </form>

                                <div class="box-body">
                                    <?php if (!$proposta) { ?>
                                        <div class="widget-box">
                                            <div class="widget-content nopadding table-responsive">
                                                <table class="table table-bordered ">
                                                    <thead>
                                                        <tr style="backgroud-color: #2D335B">
                                                            <th>Negócio</th>
                                                            <th>Empresa</th>
                                                            <th>Contato</th>
                                                            <th>Fase</th>
                                                            <th>Total</th>
                                                            <th>Criado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="5">Nenhuma proposta cadastrada</td>
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
                                                <table class="table table-bordered ">
                                                    <thead>
                                                        <tr style="backgroud-color: #2D335B">
                                                            <th>Nº Proposta</th>
                                                            <th>Cliente</th>
                                                            <th>Contato</th>
                                                            <th>Data</th>
                                                            <th>Status</th>
                                                            <th>Ações</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($proposta as $r) { ?>
                                                            <tr> 
                                                                <td><?php echo $r->numpropostas; ?></td>
                                                                <td><?php echo $r->fantasia; ?></td> 
                                                                <td><?php echo $r->contato; ?></td> 
                                                                <td><?php echo $r->data; ?></td> 
                                                                <td><?php
                                                                    if ($r->status == 1) {
                                                                        echo "<span class='label label-primary'>Aguardando Aprovação</span>";
                                                                    }
                                                                    if ($r->status == 2) {
                                                                        echo "<span class='label label-success'>Fechado Ganho</span>";
                                                                    }
                                                                    if ($r->status == 3) {
                                                                        echo "<span class='label label-danger'>Fechado Perdido</span>";
                                                                    }
                                                                    ?>
                                                                </td>


                                                                <td class="text-center">
                                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'iProposta')) { ?>
                                                                        <a title="imprimir" href="<?php echo base_url() . 'index.php/proposta/imprimir/' . $r->numpropostas ?>" class="btn btn-warning btn-small"><i class="fa-fw glyphicon glyphicon-print"></i> </a>
                                                                    <?php } ?>
                                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProposta')) { ?>
                                                                        <a title="editar" href="<?php echo base_url() ?>index.php/proposta/edit/<?php echo $r->numpropostas; ?>" class="btn btn-primary btn-small"><i class="fa-fw glyphicon glyphicon-edit"></i> </a>
                                                                    <?php } ?>
                                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dProposta')) { ?>
                                                                        <a title="excluir"  class="btn btn-danger btn-small" data-toggle="modal" data-target="#modal-danger<?php echo $r->numpropostas; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
                                                                    <?php } ?>
                                                                    <!--MODAL BOTÃO EXCLUIR-->
                                                                    <div class="modal modal-default fade" id="modal-danger<?php echo $r->numpropostas; ?>">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">×</span></button>
                                                                                    <h4 class="modal-title">Deseja excluir a proposta <?php echo $r->numpropostas; ?>?</h4>
                                                                                </div>
                                                                                <form action="<?php echo base_url() ?>index.php/proposta/excluirProposta" method="post">
                                                                                    <input type="hidden" id="numPropostasExcluir" name="numPropostasExcluir" value="<?php echo $r->numpropostas; ?>">
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                                                                                        <button type="submit" class="btn btn-danger">Excluir<i class="icon-remove icon-white"></i></button'; ?>
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
                                                        <tr>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
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
                        url: "<?php echo base_url(); ?>index.php/empresa/adicionarTimeline",
                        data: dados,
                        dataType: 'json',
                        success: function (data)
                        {
                            if (data.result == true) {
                                $("#divTimeline").load("<?php echo current_url(); ?> #divTimeline");
                                $("#idEmpresas").val('');
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
                var idTimeline_empresas = $(this).attr('idAcao');
                if ((idTimeline_empresas % 1) == 0) {
                    $("#divTimeline").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/empresa/excluirTimeline",
                        data: "idTimeline_empresas=" + idTimeline_empresas,
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


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
    <div class="col-md-4">
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
            <button type="submit" class="btn btn-warning"> GERAR PROPOSTA PARA ESTE LEAD</button>
        </form>
    </div>
    <div class="col-md-12">
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
                                <i class="fa fa-envelope bg-blue"></i> <!-- timeline icon -->
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

    <!-- Modal ATRIBUIR CLIENTE -->
    <div class="modal fade" id="ModalAtribuir" tabindex="-1" role="dialog" aria-labelledby="ModalAtribuir" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atribuir Lead a um Consultor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url() ?>index.php/crm/atribuir" method="post">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <?php echo form_hidden('idcrm', $result->idcrm) ?>
                                <select name="vendedoratribuir" id="vendedoratribuir" class="form-control">
                                    <option value="">Selecione o vendedor</option>
                                    <?php
                                    foreach ($usuarios as $value) {
                                        ?>
                                        <option value = "<?php echo $value->idusuarios; ?>"><?php echo $value->nome; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">VOLTAR</button>
                        <button type="submit" class="btn btn-success">SALVAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog -->
    <div class="modal modal-info fade" id="modal-info" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">CONVERTER LEAD / ENCERRAR LEAD</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo current_url(); ?>" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div >
                                    <div>
                                        <div class="col-md-12">
                                            <?php echo form_hidden('idcrm', $result->idcrm) ?>
                                            <?php echo form_hidden('empresa', $result->empresa) ?>
                                            <?php echo form_hidden('nome', $result->nome) ?>
                                            <?php echo form_hidden('whatsapp', $result->whatsapp) ?>
                                            <?php echo form_hidden('telefone', $result->telefone) ?>
                                            <?php echo form_hidden('email', $result->email) ?>
                                            <?php echo form_hidden('cargo', $result->cargo) ?>
                                            <?php echo form_hidden('endereco', $result->endereco) ?>
                                            <?php echo form_hidden('bairro', $result->bairro) ?>
                                            <?php echo form_hidden('cidade', $result->cidade) ?>
                                            <?php echo form_hidden('fonte', $result->fonte) ?>
                                            <?php echo form_hidden('seguimento', $result->seguimento) ?>
                                            <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <?php
                                                    foreach ($statusencerra as &$value) {
                                                        ?>
                                                        <option <?php
                                                        if ($result->status == $value->idstatus) {
                                                            echo "selected";
                                                        }
                                                        ?> value = <?php echo $value->idstatus; ?> >
                                                            <?php echo $value->descricao; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline">Save changes</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">PROPOSTAS CRIADAS PARA ESTE LEAD</h3>
                </div>
                <div class="box-body">
                    <?php if (!$proposta) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Propostas</h5>
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

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">

                <div class="box-header with-border">
                    <div class="col-md-3">
                        <h3 class="box-title">EVENTOS CRIADOS PARA ESTE LEAD</h3>
                    </div>
                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aAgenda')) { ?>
                        <div class="col-md-2 text-right">

                            <form action="<?php echo base_url() ?>index.php/calendario/addVinculado" method="post">
                                <input type="hidden" class="form-control" name="titulo" value="Visitar o cliente: <?php echo $result->empresa; ?>">
                                <input type="hidden" class="form-control" name="descricao" value="Visitar o cliente: <?php echo $result->empresa; ?>">
                                <input type="hidden" class="form-control" name="datetimes" value="<?php echo date('Y/m/d h:00:00'); ?> - <?php echo date('Y/m/d h:00:00', strtotime('1 hour')); ?> ">
                                <input type="hidden" class="form-control" name="color" value="blue">
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                                <input type="hidden" class="form-control" name="idLead_proposta" value="<?php echo $result->idcrm ?>">
                                <button type="submit" class="btn btn-primary"> Adicionar Visita</button>
                            </form>

                        </div>
                        <div class="col-md-2 text-left">
                            <form action="<?php echo base_url() ?>index.php/calendario/addVinculado" method="post">
                                <input type="hidden" class="form-control" name="titulo" value="Ligar para o cliente: <?php echo $result->empresa; ?>">
                                <input type="hidden" class="form-control" name="descricao" value="Ligar para o cliente: <?php echo $result->empresa; ?>">
                                <input type="hidden" class="form-control" name="datetimes" value="<?php echo date('Y/m/d h:00:00'); ?> - <?php echo date('Y/m/d h:00:00', strtotime('1 hour')); ?> ">
                                <input type="hidden" class="form-control" name="color" value="green">
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                                <input type="hidden" class="form-control" name="idLead_proposta" value="<?php echo $result->idcrm ?>">
                                <button type="submit" class="btn btn-success"> Adicionar Ligação</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <div class="box-body">
                    <?php if (!$agenda) { ?>
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
                                            <th>Título</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td colspan="5">Nenhuma agenda criada</td>
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
                                            <th>Título</th>
                                            <th>Tipo</th>
                                            <th>Início</th>
                                            <th>Fim</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($agenda as $r) { ?>
                                            <tr> 
                                                <td><?php echo $r->title; ?></td>
                                                <td><?php
                                                    if ($r->color == "green") {
                                                        echo "<span class='label label-success'>Ligação</span>";
                                                    }
                                                    if ($r->color == "blue") {
                                                        echo "<span class='label label-primary'>Visita</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo date("d/m/y - H:i", strtotime($r->start)) ?></td>
                                                <td><?php echo date("d/m/y - H:i", strtotime($r->end)) ?></td>
                                                <td class="text-center">
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProposta')) { ?>
                                                                                                                                                                                                                    <!--<a title="imprimir" href="<?php echo base_url() . 'index.php/proposta/imprimir/' . $r->numpropostas ?>" class="btn btn-warning btn-small">Imprimir <i class="fa-fw glyphicon glyphicon-print"></i> </a>-->
                                                    <?php } ?>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eAgenda')) { ?>
                                                        <a title="editar" href="<?php echo base_url() ?>index.php/calendario/editVinculado/<?php echo $r->id; ?>" class="btn btn-primary btn-small"><i class="fa-fw glyphicon glyphicon-edit"></i> </a>
                                                    <?php } ?>
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

    <!-- TIME LINE - INICIO DO CODIGO -->
    <div class="row">
        <div class="col-md-12">
            <div class="box-body">
                <div class="box-body box box-success">
                    <h4 class="box-title">TIMELINE DE HISTÓRICO</h4>
                    <form id="formTimeline" action="<?php echo base_url() ?>crm/adicionarTimeline" method="post">
                        <div class="col-md-10">

                            <input type="hidden" name="idcrm" id="idCrm" value="<?php echo $result->idcrm ?>" />
                            <label for="">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva o que foi conversado com o cliente"></textarea>
                        </div>
                        <div class="col-md-1">
                            <label for="">.</label>
                            <button class="btn btn-success span12" id="btnAdicionarProduto"><i class="icon-white icon-plus"></i> Adicionar</button>
                        </div>
                    </form>
                </div>
                <ul class="timeline" id="divTimeline">
                    <?php
                    foreach ($timeline as $t) {
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
                            <i class="fa fa-envelope bg-blue"></i> <!-- timeline icon -->
                            <div class="timeline-item" >
                                <h3 class="timeline-header"><a class="text blue"><?php echo $t->nome; ?> </a> 
                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dAgenda')) { ?>
                                        <?php echo '<a href="" idAcao="' . $t->idTimeline_crm . '" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i></a>'; ?>                                            

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
</section>

<!--MODAL BOTÃO EXCLUIR TIMELINE-->
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
                            $("#idcrm").val('');
                            $("#descricao").val('');
                            $("#descricao").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });
                return false;
            }

        });
        $(document).on('click', 'a', function (event) {
            var idTimeline_crm = $(this).attr('idAcao');
            if ((idTimeline_crm % 1) == 0) {
                $("#divTimeline").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/crm/excluirTimeline",
                    data: "idTimeline_crm=" + idTimeline_crm,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divTimeline").load("<?php echo current_url(); ?> #divTimeline");
                            $("#descricao").val('');
                            $("#descricao").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });

    });
</script>


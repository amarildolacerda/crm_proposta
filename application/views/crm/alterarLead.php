<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Alterar Lead</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > CRM</li>
        <li class="active"> Alterar Lead</li>
    </ol>
</section>
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
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <h3 class="box-title">PREENCHA OS DADOS DO LEAD ABAIXO</h3>
                    </div>
                    <div class="col-md-2">
                        <span class="label label-danger"><?php
                            foreach ($usuarios as $comercial) {
                                if ($result->usuario == $comercial->idusuarios) {
                                    echo $comercial->nome;
                                }
                            }
                            ?></span>
                    </div>
                    <div class="col-md-5 text-right">
                        <!-- <?php // if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) {    ?> -->
                        <?php //if ($result->atribuido == 0) {  ?>
                        <a href="<?php echo base_url(); ?>index.php/crm/addnaoatribuido" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus-sign"></i> Novo Não atribuido</a>
                        <?php // } else {  ?>
                        <a href="<?php echo base_url(); ?>index.php/crm/add" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-plus-sign"></i> Novo atribuido</a>
                        <?php // }  ?> 
                        <?php // } ?> 
                    </div>
                    <div class="col-md-1 text-right">
                        <?php if ($result->atribuido == 0) { ?>
                            <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalAtribuir">
                                Atribuir
                            </button>
                        <?php } ?>
                    </div>
                </div>

                <div class="box-body">
                    <form action="<?php echo current_url(); ?>" method="post">
                        <div class="col-md-6">
                            <?php echo form_hidden('idcrm', $result->idcrm) ?>
                            <div class="form-group">
                                <label>Empresa </label>
                                <input type="text" class="form-control" name="empresa" value="<?php echo $result->empresa; ?>">
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do contato</label>
                                <input type="text" class="form-control" name="nome" placeholder="Ex.: João da Silva" value="<?php echo $result->nome; ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control" maxlength="18" name="cnpj" value="<?php echo $result->cnpj; ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Whatsapp</label>
                                <input type="text" class="form-control" maxlength="15" name="whatsapp" value="<?php echo $result->whatsapp; ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" maxlength="15" name="telefone" value="<?php echo $result->telefone; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email"  value="<?php echo $result->email; ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Cargo </label>
                                <input type="text" class="form-control" name="cargo"  value="<?php echo $result->cargo; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Endereço </label>
                                <input type="text" class="form-control" name="endereco"  value="<?php echo $result->endereco; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Bairro </label>
                                <input type="text" class="form-control" name="bairro"  value="<?php echo $result->bairro; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cidade </label>
                                <input type="text" class="form-control" name="cidade"  value="<?php echo $result->cidade; ?>">
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <?php
                                    foreach ($statusfunil as $value) {
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Probabilidade venda (%)</label>
                                <select class="form-control" name="probabilidade">
                                    <option value="10" <?php
                                    if ($result->probabilidade == 10) {
                                        echo "selected";
                                    }
                                    ?>>0%</option>

                                    <option value="20" <?php
                                    if ($result->probabilidade == 20) {
                                        echo "selected";
                                    }
                                    ?> >20%</option>
                                    <option value="40" <?php
                                    if ($result->probabilidade == 40) {
                                        echo "selected";
                                    }
                                    ?> >40%</option>
                                    <option value="60" <?php
                                    if ($result->probabilidade == 60) {
                                        echo "selected";
                                    }
                                    ?> >60%</option>
                                    <option value="80" <?php
                                    if ($result->probabilidade == 80) {
                                        echo "selected";
                                    }
                                    ?> >80%</option>
                                    <option value="100" <?php
                                    if ($result->probabilidade == 100) {
                                        echo "selected";
                                    }
                                    ?> >100%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Fonte da indicação</label>
                                <select class="form-control" name="fonte">
                                    <?php
                                    foreach ($indicacao as $value2) {
                                        ?>
                                        <option <?php
                                        if ($result->fonte == $value2->idindicacao) {
                                            echo "selected";
                                        }
                                        ?> value = <?php echo $value2->idindicacao; ?> >
                                            <?php echo $value2->descricao; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Seguimento</label>
                                <select class="form-control" name="seguimento">
                                    <?php
                                    foreach ($seguimento as $value2) {
                                        ?>
                                        <option <?php
                                        if ($result->seguimento == $value2->idseguimento) {
                                            echo "selected";
                                        }
                                        ?> value = <?php echo $value2->idseguimento; ?> >
                                            <?php echo $value2->descricao; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Possui sistema?</label>
                                <select class="form-control" name="possuisistema">
                                    <option value="0" <?php
                                    if ($result->possuisistema == 0) {
                                        echo "selected";
                                    }
                                    ?>>Não</option>

                                    <option value="1" <?php
                                    if ($result->possuisistema == 1) {
                                        echo "selected";
                                    }
                                    ?> >Sim</option>
                                    <option value="2" <?php
                                    if ($result->possuisistema == 2) {
                                        echo "selected";
                                    }
                                    ?> >Não informado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success"> SALVAR </button>
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/crm/gerenciar" class="btn btn-danger btn-small">CANCELAR </a>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                                    Converter / Encerrar LEAD
                                </button>

                            </div>
                        </div>
                    </form>
                    <div class="col-md-4">
                        <form action="<?php echo base_url() ?>index.php/proposta/add" method="post">
                            <input type="hidden" class="form-control" name="fantasia" value="<?php echo $result->empresa; ?>">
                            <input type="hidden" class="form-control" name="cnpj" value="0">
                            <input type="hidden" class="form-control" name="endereco" value="<?php echo $result->endereco; ?>">
                            <input type="hidden" class="form-control" name="estado" value="SP">
                            <input type="hidden" class="form-control" name="cidade" value="<?php echo $result->cidade; ?>">
                            <input type="hidden" class="form-control" name="email" value="<?php echo $result->email; ?>">
                            <input type="hidden" class="form-control" name="contato" value="<?php echo $result->nome; ?>">
                            <input type="hidden" class="form-control" name="telefone" value="<?php echo $result->telefone; ?>">
                            <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                            <input type="hidden" class="form-control" name="idLead_proposta" value="<?php echo $result->idcrm ?>">
                            <button type="submit" class="btn btn-warning"> GERAR PROPOSTA PARA ESTE LEAD</button>
                        </form>
                    </div>
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


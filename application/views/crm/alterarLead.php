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
                    <h3 class="box-title">PREENCHA OS DADOS DO LEAD ABAIXO</h3>
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" maxlength="15" name="telefone" value="<?php echo $result->telefone; ?>">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email"  value="<?php echo $result->email; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
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

                        <div class="col-md-3">
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

                        <div class="col-md-3">
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
                            <input type="hidden" class="form-control" name="telefone" value="<?php echo $result->empresa; ?>">
                            <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                            <input type="hidden" class="form-control" name="idLead_proposta" value="<?php echo $result->idcrm ?>">
                            <button type="submit" class="btn btn-warning"> GERAR PROPOSTA PARA ESTE LEAD</button>
                        </form>
                    </div>
                </div>
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
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog -->

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
                                                        <a title="imprimir" href="<?php echo base_url() . 'index.php/proposta/imprimir/' . $r->numpropostas ?>" class="btn btn-warning btn-small">Imprimir <i class="fa-fw glyphicon glyphicon-print"></i> </a>
                                                    <?php } ?>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProposta')) { ?>
                                                        <a title="editar" href="<?php echo base_url() ?>index.php/proposta/edit/<?php echo $r->numpropostas; ?>" class="btn btn-primary btn-small">Editar <i class="fa-fw glyphicon glyphicon-edit"></i> </a>
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
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">TIMELINE DE HISTÓRICO</h3>
                </div>
                <div class="box-body">

                    <div class="box-body">

                        <form id="formTimeline" action="<?php echo base_url() ?>crm/adicionarTimeline" method="post">
                            <div class="col-md-5">

                                <input type="hidden" name="idcrm" id="idCrm" value="<?php echo $result->idcrm ?>" />
                                <label for="">Descrição</label>
                                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Descreva o que foi conversado com o cliente">
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
                                <span class="bg-red">
                                    <?php
                                    echo $t->data;
                                    ?>
                                </span>
                            </li>
                            <!-- /.timeline-label -->

                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-envelope bg-blue"></i>
                                <div class="timeline-item" >

                                    <h3 class="timeline-header"><a href="#"><?php echo $t->nome; ?> </a> 
                                        <button href="" idAcao="' . $t->idTimeline_crm . '"  class="fa fa-eraser"><i class="icon-remove icon-white"></i></button>
                                    </h3>

                                    <div class="timeline-body">
                                        <?php echo $t->descricao ?>
                                    </div>  

                                </div>
                            </li>
                            <!-- TIME LINE - FIM DO CODIGO -->

                            <?php
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
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


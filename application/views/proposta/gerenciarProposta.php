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

<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR PROPOSTAS INSERIDAS NO SISTEMA</h3>
                </div>
                <div class="box-body">
                    <form method="get" action="<?php echo base_url(); ?>index.php/proposta/gerenciar">
                        <div class="col-md-2">
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aProposta')) { ?>
                                <a href="<?php echo base_url(); ?>index.php/proposta/add" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar proposta</a>
                            <?php } ?>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="pesquisa"  id="pesquisa"  placeholder="Nome do cliente" value="" >
                        </div>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="pesquisa2"  id="pesquisa2"  placeholder="Nº proposta" value="" >
                        </div>
                        <div class="col-md-3">
                            <select name="status" id="status" class="form-control">
                                <option value="">Selecione status</option>
                                <option value="1">Aguardando aprovação</option>
                                <option value="2">Fechado ganho</option>
                                <option value="3">Fechado perdido</option>
                            </select>

                        </div>

                        <div class="col-md-1">
                            <button class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-search"></i> Pesquisar</button>
                        </div>
                        <br><br>
                    </form>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Propostas</h5>

                            </div>

                            <div class="widget-content nopadding table-responsive">


                                <table class="table table-bordered table-hover table-striped table-condensed">
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


                                <table class="table table-bordered table-hover table-striped table-condensed ">
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
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td class="text-middle ng-binding"><?php echo $r->numpropostas; ?></td>
                                                <td class="text-middle ng-binding"><?php echo $r->fantasia; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->contato; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->data; ?></td> 
                                                <td class="text-middle ng-binding"><?php
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


                                                <td class="text-center text-middle ng-binding">
                                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'iProposta')) { ?>
                                                        <a title="imprimir" href="<?php echo base_url() . 'index.php/proposta/imprimir/' . $r->numpropostas ?>" class="btn btn-warning btn-xs"><i class="fa-fw glyphicon glyphicon-print"></i> </a>
                                                        <?php } ?>
                                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProposta')) { ?>
                                                        <a title="editar" href="<?php echo base_url() ?>index.php/proposta/edit/<?php echo $r->numpropostas; ?>" class="btn btn-primary btn-xs"><i class="fa-fw glyphicon glyphicon-edit"></i> </a>
                                                    <?php } ?>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dProposta')) { ?>
                                                        <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->numpropostas; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
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
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php
                        echo $this->pagination->create_links();
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</section>
<?php $this->load->view('template/footer'); ?>
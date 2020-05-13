<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Posvendas
        <small>Gerenciar pós vendas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar pós vendas</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR PÓS VENDAS</h3>
                </div>
                <div class="box-body">
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Gerenciar usuários</h5>
                            </div>
                            <div class="widget-content nopadding table-responsive">
                                <table class="table table-bordered table-hover table-striped table-condense">
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
                                            <td colspan="5">Nenhum Tipo Cadastrado</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="widget-box">
                            <div class="widget-content nopadding table-responsive">
                                <table class="table table-bordered table-hover table-striped table-condense">
                                    <thead>
                                        <tr style="backgroud-color: #2D335B">
                                            <th>#</th>
                                            <th>Cliente</th>
                                            <th>Tipo de contato</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td class="text-middle ng-binding"><?php echo $r->idposvendas; ?></td>
                                                <td class="text-middle ng-binding"><?php echo $r->nomeCliente; ?></td> 
                                                <td class="text-center">
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dLead')) { ?>
                                                        <a title="mensagem"  class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->idposvendas; ?>"><i class="fa-fw glyphicon glyphicon-envelope"></i> </a>
                                                    <?php } ?>
                                                    <!--MODAL BOTÃO EXCLUIR-->
                                                    <div class="modal modal-default fade" id="modal-danger<?php echo $r->idposvendas; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Mensagem enviada para o cliente <?php echo $r->nomeCliente; ?></h4>
                                                                </div>
                                                                <label> TESTES</label>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                    <!--MODAL BOTÃO EXCLUIR-->
                                                </td>
                                                <td class="text-middle ng-binding"><?php
                                                    if ($r->status == 1) {
                                                        echo '<label class="label-success text-center">Enviado</label>';
                                                    } else {
                                                        echo "Não enviado";
                                                    }
                                                    ?>
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
                        echo $this->pagination->create_links();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('template/footer'); ?>
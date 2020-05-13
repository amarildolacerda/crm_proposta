<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Gerenciar Arquivos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar Arquivos</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR ARQUIVOS ADICIONADOS A BIBLIOTECA</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-1">
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aBiblioteca')) { ?>
                            <a href="<?php echo base_url(); ?>index.php/biblioteca/add" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Arquivo</a>
                        <?php } ?>
                    </div>
                    <br>
                    <br>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Gerenciar Arquivos</h5>
                            </div>
                            <div class="widget-content nopadding table-responsive">
                                <table class="table table-bordered table-hover table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Data</th>
                                            <th>Responsável</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5">Nenhum arquivo adicionado</td>
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
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Data</th>
                                            <th>Responsável</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td class="text-middle ng-binding"><?php echo $r->idbiblioteca; ?></td>
                                                <td class="text-middle ng-binding"><?php echo $r->nome; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->descricao; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->data; ?></td> 
                                                <td class="text-middle ng-binding">
                                                    <?php
                                                    foreach ($usuarios as $value) {
                                                        if ($r->usuario == $value->idusuarios) {
                                                            echo $value->nome;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-middle ng-binding text-center">
                                                    
                                                    <a download title="download" href="<?php echo $upload_path.$r->caminho; ?>" class="btn btn-success btn-xs"><i class="fa-fw glyphicon glyphicon-save"></i> </a>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dBiblioteca')) { ?>
                                                        <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->idbiblioteca; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
                                                    <?php } ?>

                                                    <!--MODAL BOTÃO EXCLUIR-->
                                                    <div class="modal modal-default fade" id="modal-danger<?php echo $r->idbiblioteca; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                    <h4 class="modal-title">Deseja excluir o arquivo <?php echo $r->nome; ?>?</h4>
                                                                </div>
                                                                <form action="<?php echo base_url() ?>index.php/biblioteca/excluir" method="post">
                                                                    <input type="hidden" id="idBibliotecaExcluir" name="idBibliotecaExcluir" value="<?php echo $r->idbiblioteca; ?>">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                                                                        <button type="submit" class="btn btn-danger">Excluir<i class="icon-remove icon-white"></i></button>
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
                        echo $this->pagination->create_links();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('template/footer'); ?>

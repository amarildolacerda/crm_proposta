<?php $this->load->view('template/menu'); ?>
<section class="content">
    <div class="row">
        <form method="get" action="<?php echo base_url(); ?>index.php/empresa/gerenciar">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">FILTROS DE BUSCA</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div><!-- /.box-tools -->
                    </div> <!-- /.box-header -->
                    <div class="box-body">
                        <!-- INICIO DE FORM DE FILTRO DE BUSCA -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="empresa"  id="empresa"  placeholder="Empresa" value="<?php echo $empresaget ?>" minlength=3 >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="tipoEmpresa" id="tipoEmpresa" class="form-control">
                                        <option value="">Selecione o Tipo</option>
                                        <?php foreach ($tipoEmpresa as $value) { ?>
                                            <option value = "<?php echo $value->idTipoEmpresa; ?>" <?php
                                            if ($value->idTipoEmpresa == $tipoEmpresaget) {
                                                echo "selected";
                                            }
                                            ?> ><?php echo $value->descricao; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select name="vendedor" id="vendedor" class="form-control">
                                    <option value="">Selecione o vendedor</option>
                                    <?php foreach ($usuarios as $value) { ?>
                                        <option value = "<?php echo $value->idusuarios; ?>" <?php
                                        if ($value->idusuarios == $vendedorget) {
                                            echo "selected";
                                        }
                                        ?> ><?php echo $value->nome; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-2 text-right">
                                <a href="<?php echo base_url(); ?>index.php/empresa/gerenciar" class="btn btn-primary"><i class="glyphicon glyphicon-erase"></i></a>
                                <button class="btn btn-danger"> <i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.box-body -->
            </div><!-- /.box -->
        </form> <!-- FIM DE FORM DE FILTRO DE BUSCA -->
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">EMPRESAS CADASTRADAS</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-1">
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                                <a href="<?php echo base_url(); ?>index.php/empresa/add" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Empresa</a>
                            <?php } ?>
                        </div>
                        <div class="col-md-11 text-right">
                            <span class='label label-primary'>Total: <?php echo $count; ?></span>
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mPermissao')) { ?>
                                <a href="<?php echo base_url(); ?>index.php/crm/csv" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Exportar</a>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <h5></h5>
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
                                            <td colspan="5">Nenhuma empresa cadastrada</td>
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
                                            <th>ID</th>
                                            <th>Empresa</th>
                                            <th>Telefone</th>
                                            <th>Seguimento</th>
                                            <th>Tipo</th>
                                            <th>Vendedor</th>
                                            <th>Cadastro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td class="text-middle ng-binding"><?php echo $r->idEmpresas; ?></td>
                                                <td class="text-middle ng-binding"><?php echo $r->nomeEmpresa; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->telefone; ?></td> 
                                                <td class="text-middle ng-binding"><?php 
                                                foreach ($segmento as $value) {
                                                        if ($r->segmento == $value->idseguimento) {
                                                            echo $value->descricao;
                                                        }
                                                    }
                                                    ?>
                                                </td> 
                                                <td class="text-middle ng-binding"><?php
                                                    foreach ($tipoEmpresa as $value) {
                                                        if ($r->tipo == $value->idTipoEmpresa) {
                                                            echo $value->descricao;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-middle ng-binding">
                                                    <?php
                                                    foreach ($usuarios as $value) {
                                                        if ($r->vendedor == $value->idusuarios) {
                                                            echo $value->nome;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-middle ng-binding"><?php echo $r->dataCadastro; ?></td> 
                                                <td class="text-center">
                                                    <a title="editar" href="<?php echo base_url() ?>index.php/empresa/edit/<?php echo $r->idEmpresas; ?>" 
                                                       class="btn btn-primary btn-xs"><i class="fa-fw glyphicon glyphicon-edit"></i> 
                                                    </a>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dLead')) { ?>
                                                        <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->idEmpresas; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
                                                    <?php } ?>
                                                    <!--MODAL BOTÃO EXCLUIR-->
                                                    <div class="modal modal-default fade" id="modal-danger<?php echo $r->idEmpresas; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Deseja excluir a EMPRESA <?php echo $r->idEmpresas; ?> e todas as proposta(s), agenda(s) e timeline(s) associados a ela?</h4>
                                                                </div>
                                                                <form action="<?php echo base_url() ?>index.php/empresa/excluirEmpresa" method="post">
                                                                    <input type="hidden" id="idcrmExcluir" name="idEmpresaExcluir" value="<?php echo $r->idEmpresas; ?>">
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
                        echo $this->pagination->create_links();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('template/footer'); ?>

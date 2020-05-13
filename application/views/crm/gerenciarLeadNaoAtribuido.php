<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Gerenciar Leads</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar Leads não atribuídos a Vendedor</li>
    </ol>
</section>
<section class="content">
    <div class="row">
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
                    <form method="post" action="<?php echo base_url(); ?>index.php/crm/filtronaoatribuido"> <!-- INICIO DE FORM DE FILTRO DE BUSCA -->
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="empresa"  id="empresa"  placeholder="Empresa" value="<?= set_value('empresa') ?>" >
                        </div>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="idcrm"  id="idcrm"  placeholder="ID CRM" value="<?= set_value('idcrm') ?>" >
                        </div>
                        <div class="col-md-4">
                            <select name="status" id="status" class="form-control" value="<?= set_value('status') ?>">
                                <option value="">Selecione status</option>
                                <?php
                                foreach ($status as $value) {
                                    ?>
                                    <option value = "<?php echo $value->idstatus; ?>" <?php
                                    if ($value->idstatus == $statuspost) {
                                        echo "selected";
                                    }
                                    ?> ><?php echo $value->descricao; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="probabilidade">
                                <option value="0">Selecione a propabilidade</option>
                                <option value="10"<?php
                                if (10 == $probabilidadepost) {
                                    echo "selected";
                                }
                                ?> >0%</option>
                                <option value="20" <?php
                                if (20 == $probabilidadepost) {
                                    echo "selected";
                                }
                                ?>>20%</option>
                                <option value="40" <?php
                                if (40 == $probabilidadepost) {
                                    echo "selected";
                                }
                                ?>>40%</option>
                                <option value="60" <?php
                                if (60 == $probabilidadepost) {
                                    echo "selected";
                                }
                                ?>>60%</option>
                                <option value="80" <?php
                                if (80 == $probabilidadepost) {
                                    echo "selected";
                                }
                                ?>>80%</option>
                                <option value="100" <?php
                                if (100 == $probabilidadepost) {
                                    echo "selected";
                                }
                                ?>>100%</option>
                            </select>
                        </div>
                        <br><br><br>
                        <div class="col-md-3">
                            <select name="indicacao" id="indicacao" class="form-control">
                                <option value="">Selecione a fonte de indicação</option>
                                <?php
                                foreach ($indicacao as $value) {
                                    ?>
                                    <option value ="<?php echo $value->idindicacao; ?>" <?php
                                    if ($value->idindicacao == $indicacaopost) {
                                        echo "selected";
                                    }
                                    ?> ><?php echo $value->descricao; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="seguimento" id="seguimento" class="form-control">
                                <option value="">Selecione o seguimento</option>
                                <?php
                                foreach ($seguimento as $value) {
                                    ?>
                                    <option value ="<?php echo $value->idseguimento; ?>" <?php
                                    if ($value->idseguimento == $seguimentopost) {
                                        echo "selected";
                                    }
                                    ?> ><?php echo $value->descricao; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="date" class="form-control" name="datainicial" id="datainicial" value="<?= set_value('datainicial') ?>">
                                </div> <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="date" class="form-control" name="datafinal" id="datafinal" value="<?= set_value('datafinal') ?>">
                                </div> <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <a href="<?php echo base_url(); ?>index.php/crm/gerenciar" class="btn btn-primary"><i class="glyphicon glyphicon-erase"></i></a>
                            <button class="btn btn-danger"> <i class="glyphicon glyphicon-search"></i></button>
                        </div>
                        <br><br>
                    </form> <!-- FIM DE FORM DE FILTRO DE BUSCA -->
                </div> <!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR LEADS NÃO ATRIBUÍDOS A VENDEDOR</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-1">
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                            <a href="<?php echo base_url(); ?>index.php/crm/addnaoatribuido" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Lead não atribuído</a>
                        <?php } ?>
                    </div>
                    <div class="col-md-11 text-right">
                        <span class='label label-primary'>Total: <?php echo $count; ?></span>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mPermissao')) { ?>
                            <a href="<?php echo base_url(); ?>index.php/crm/csvnaoatribuido" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Exportar</a>
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
                                <h5>Gerenciar Leads</h5>
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
                                            <th>ID</th>
                                            <th>Empresa</th>
                                            <th>Contato</th>
                                            <th>Telefone</th>
                                            <th>Seguimento</th>
                                            <th>Data</th>
                                            <th>Comercial</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td text-middle ng-binding><?php echo $r->idcrm; ?></td>
                                                <td text-middle ng-binding><?php echo $r->empresa; ?></td> 
                                                <td text-middle ng-binding><?php echo $r->nome; ?></td> 
                                                <td text-middle ng-binding><?php echo $r->telefone; ?></td> 
                                                <td text-middle ng-binding><?php
                                                    foreach ($seguimento as $value) {
                                                        if ($r->seguimento == $value->idseguimento) {
                                                            echo $value->descricao;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td text-middle ng-binding><?php echo $r->data; ?></td> 
                                                <td text-middle ng-binding>
                                                    <?php
                                                    foreach ($usuarios as $value) {
                                                        if ($r->usuario == $value->idusuarios) {
                                                            echo $value->nome;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td text-middle ng-binding>
                                                    <?php
                                                    foreach ($status as $value) {
                                                        if ($r->status == $value->idstatus) {
                                                            echo $value->descricao;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center" text-middle ng-binding>
                                                    <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#ModalAtribuir<?php echo $r->idcrm; ?>">
                                                        Atribuir
                                                    </button>

                                                    <a title="editar" href="<?php echo base_url() ?>index.php/crm/edit/<?php echo $r->idcrm; ?>" 
                                                       class="btn btn-primary btn-xs
                                                       <?php
                                                       foreach ($status as $value) {
                                                           if ($r->status == $value->idstatus) {
                                                               if ($value->encerra == 1) {
                                                                   echo "disabled";
                                                               }
                                                           }
                                                       }
                                                       ?>
                                                       "><i class="fa-fw glyphicon glyphicon-edit"></i> 
                                                    </a>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dLead')) { ?>
                                                        <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->idcrm; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
                                                    <?php } ?>
                                                    <!--MODAL BOTÃO EXCLUIR-->
                                                    <div class="modal modal-default fade" id="modal-danger<?php echo $r->idcrm; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Deseja excluir o LEAD <?php echo $r->idcrm; ?> e todas as proposta(s), agenda(s) e timeline(s) associados a ele? ?</h4>
                                                                </div>
                                                                <form action="<?php echo base_url() ?>index.php/crm/excluirCRM" method="post">
                                                                    <input type="hidden" id="idcrmExcluir" name="idcrmExcluir" value="<?php echo $r->idcrm; ?>">
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

                                            <!-- Modal ATRIBUIR CLIENTE -->
                                        <div class="modal fade" id="ModalAtribuir<?php echo $r->idcrm; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalAtribuir" aria-hidden="true">
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
                                                                    <?php echo form_hidden('idcrm', $r->idcrm) ?>
                                                                    <select name="vendedoratribuir" id="vendedoratribuir" class="form-control">
                                                                        <option value="">Selecione o vendedor</option>
                                                                        <?php
                                                                        foreach ($usuarios as $value) {
                                                                            ?>
                                                                            <option value = "<?php echo $value->idusuarios; ?>" <?php
                                                                            if ($value->idusuarios == $vendedorpost) {
                                                                                echo "selected";
                                                                            }
                                                                            ?> ><?php echo $value->nome; ?></option>
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

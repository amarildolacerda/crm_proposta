<?php $this->load->view('template/menu'); ?>

<div class="row">
    <a href="<?php echo base_url(); ?>index.php/crm/negociosKanban" class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: green">Mostrar em Kanban <i class="glyphicon glyphicon-list"></i></a>   
</div>
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
                    <form method="get" action="<?php echo base_url(); ?>index.php/crm/negociosLista"> <!-- INICIO DE FORM DE FILTRO DE BUSCA -->
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="empresa"  id="empresa"  placeholder="Empresa"  >
                        </div>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="idNegocio"  id="idNegocio"  placeholder="Id Negocio"  >
                        </div>
                        <div class="col-md-4">
                            <select name="status" id="status" class="form-control" >
                                <option value="">Selecione status</option>
                                <?php
                                foreach ($status as $value) {
                                    ?>
                                    <option value = "<?php echo $value->idstatus; ?>" <?php
                                    if ($value->idstatus == $statusget) {
                                        echo "selected";
                                    }
                                    ?> ><?php echo $value->descricao; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>

                        <br><br><br>
                        <div class="col-md-3">
                            <select name="vendedor" id="vendedor" class="form-control">
                                <option value="">Selecione o vendedor</option>
                                <?php
                                foreach ($usuarios as $value) {
                                    ?>
                                    <option value = "<?php echo $value->idusuarios; ?>" <?php
                                    if ($value->idusuarios == $vendedorget) {
                                        echo "selected";
                                    }
                                    ?> ><?php echo $value->nome; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="indicacao" id="indicacao" class="form-control">
                                <option value="">Selecione a fonte de indicação</option>
                                <?php
                                foreach ($indicacao as $value) {
                                    ?>
                                    <option value ="<?php echo $value->idindicacao; ?>" <?php
                                    if ($value->idindicacao == $indicacaoget) {
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
                                    if ($value->idseguimento == $seguimentoget) {
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
                            <a href="<?php echo base_url(); ?>index.php/crm/negociosLista" class="btn btn-primary"><i class="glyphicon glyphicon-erase"></i></a>
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
                    <h3 class="box-title">NEGÓCIOS CADASTRADOS</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-1">
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                            <a href="<?php echo base_url(); ?>index.php/crm/add" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Lead</a>
                        <?php } ?>
                    </div>
                    <div class="col-md-11 text-right">
                        <span class='label label-primary'>Total: <?php echo $count; ?></span>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mPermissao')) { ?>
                            <a href="<?php echo base_url(); ?>index.php/crm/csv" class="btn btn-success btn-xs"><i class="fa fa-file-excel-o"></i> Exportar</a>
                        <?php } ?>
                    </div>
                    <br>
                    <br>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">

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
                                            <th>Cadastro</th>
                                            <th>Fechamento esperado</th>
                                            <th>Comercial</th>
                                            <th>Funil</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td class="text-middle ng-binding"><?php echo $r->idNegocio; ?></td>
                                                <td class="text-middle ng-binding"><?php echo $r->nomeEmpresa; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->nomeContato; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->telefoneContato. " / ". $r->whatsappContato;//$r->telefoneContato . " / ". $r->celularContato; ?></td> 
                                                <td class="text-middle ng-binding"><?php 
                                                    foreach ($seguimento as $value) {
                                                        if ($r->segmento == $value->idseguimento) {
                                                            echo $value->descricao;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-middle ng-binding"><?php $date = new DateTime($r->dataCadastro);echo  $date->format('d-m-Y'); ?></td> 
                                                <td class="text-middle ng-binding"><?php $date = new DateTime($r->dataFechamentoEsperada);echo  $date->format('d-m-Y');  ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->nome; ?></td>
                                                <td class="text-middle ng-binding"><?php 
                                                foreach ($status as $value) {
                                                        if ($r->faseDoFunil == $value->idstatus) {
                                                            echo $value->descricao;
                                                        }
                                                    }
                                                ?></td>
                                                <td class="text-center">
                                                    <a title="visualizar" href="<?php echo base_url() ?>index.php/crm/view/<?php echo $r->idNegocio; ?>" class="btn btn-success btn-xs"><i class="fa-fw glyphicon glyphicon-eye-open"></i> </a>
                                                    <a title="editar" href="<?php echo base_url() ?>index.php/crm/editNegocios/<?php echo $r->idNegocio; ?>" 
                                                       class="btn btn-primary btn-xs
                                                       <?php
                                                       if ($r->situacao == "ganho" or $r->situacao == "perdido") {
                                                           echo "disabled";
                                                       }
                                                       ?>
                                                       "><i class="fa-fw glyphicon glyphicon-edit"></i> 
                                                    </a>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dLead')) { ?>
                                                        <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->idNegocio; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
                                                    <?php } ?>
                                                    <!--MODAL BOTÃO EXCLUIR-->
                                                    <div class="modal modal-default fade" id="modal-danger<?php echo $r->idNegocio; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Deseja excluir o LEAD <?php echo $r->idNegocio; ?> e todas as proposta(s), agenda(s) e timeline(s) associados a ele?  ?</h4>
                                                                </div>
                                                                <form action="<?php echo base_url() ?>index.php/crm/excluirCRM" method="post">
                                                                    <input type="hidden" id="idcrmExcluir" name="idcrmExcluir" value="<?php echo $r->idNegocio; ?>">
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

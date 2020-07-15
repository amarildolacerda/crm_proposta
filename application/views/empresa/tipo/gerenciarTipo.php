<?php $this->load->view('template/menu'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR TIPOS DE EMPRESAS</h3>
                </div>
                <div class="box-body">
                    <a href="<?php echo base_url(); ?>index.php/empresa/addTipo" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Novo Status</a>
                    <br>
                    <br>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-content nopadding">
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
                                            <td colspan="5">Nenhum Status Cadastrado</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <?php } else { ?>

                        <div class="widget-box">
                            <div class="widget-content nopadding">
                                <table class="table table-bordered table-hover table-striped table-condensed">
                                    <thead>
                                        <tr style="backgroud-color: #2D335B">
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td class="text-middle ng-binding"><?php echo $r->idTipoEmpresa; ?></td>
                                                <td class="text-middle ng-binding"><?php echo $r->descricao; ?></td> 
                                                <td class="text-middle ng-binding"><?php
                                                    if ($r->status == 1) {
                                                        echo "Ativo";
                                                    } else {
                                                        echo "Desativado";
                                                    }
                                                    ?></td>

                                                <td class="text-middle ng-binding text-center">
                                                    <a title="editar" href="<?php echo base_url() ?>index.php/empresa/editTipo/<?php echo $r->idTipoEmpresa; ?>" class="btn btn-primary btn-xs"><i class="fa-fw glyphicon glyphicon-edit"></i> </a>

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
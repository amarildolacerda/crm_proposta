<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Gerenciar Fonte de Indicação</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar Fonte de Indicação</li>
    </ol>
</section>
<section class="content">


    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR FONTE DE INDICAÇÃO</h3>
                </div>
                <div class="box-body">
                    <a href="<?php echo base_url(); ?>index.php/crm/addindicacao" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Nova Indicação</a>
                    <br>
                    <br>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Gerenciar Fonte de Indicação</h5>

                            </div>

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
                                            <td colspan="5">Nenhum Indicação cadastrada</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <?php } else { ?>

                        <div class="widget-box">
                            <div class="widget-content nopadding">
                                <table class="table table-bordered table-hover table-striped table-condensed ">
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
                                                <td class="text-middle ng-binding"><?php echo $r->idindicacao; ?></td>
                                                <td class="text-middle ng-binding"><?php echo $r->descricao; ?></td> 
                                                <td class="text-middle ng-binding"><?php
                                                    if ($r->status == 1) {
                                                        echo "Ativo";
                                                    } else {
                                                        echo "Desativado";
                                                    }
                                                    ?></td> 

                                                <td class="text-middle ng-binding text-center">
                                                    <a title="visualizar" href="<?php base_url() . 'index.php/crm/view/' . $r->idindicacao ?>" class="btn btn-success btn-xs"><i class="fa-fw glyphicon glyphicon-eye-open"></i> </a>
                                                    <a title="editar" href="<?php echo base_url() ?>index.php/crm/editindicacao/<?php echo $r->idindicacao; ?>" class="btn btn-primary btn-xs"><i class="fa-fw glyphicon glyphicon-edit"></i> </a>

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
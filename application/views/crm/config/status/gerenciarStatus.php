<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Gerenciar Status Leads</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar Status Leads</li>
    </ol>
</section>
<section class="content">


    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR STATUS DE LEADS</h3>
                </div>
                <div class="box-body">
                    <a href="<?php echo base_url(); ?>index.php/crm/addstatus" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Novo Status</a>
                    <br>
                    <br>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Gerenciar Status Leads</h5>

                            </div>

                            <div class="widget-content nopadding">


                                <table class="table table-bordered ">
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
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                            </div>

                            <div class="widget-content nopadding">


                                <table class="table table-bordered ">
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
                                                <td><?php echo $r->idstatus; ?></td>
                                                <td><?php echo $r->descricao; ?></td> 
                                                <td><?php
                                                    if ($r->status == 1) {
                                                        echo "Ativo";
                                                    } else {
                                                        echo "Desativado";
                                                    }
                                                    ?></td>
                                                
                                                <td class="text-center">
                                                    <a title="visualizar" href="<?php base_url() . 'index.php/crm/view/' . $r->idstatus ?>" class="btn btn-success btn-small">Visualizar <i class="fa-fw glyphicon glyphicon-eye-open"></i> </a>
                                                    <a title="editar" href="<?php echo base_url() ?>index.php/crm/editstatus/<?php echo $r->idstatus; ?>" class="btn btn-primary btn-small">Editar <i class="fa-fw glyphicon glyphicon-edit"></i> </a>

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
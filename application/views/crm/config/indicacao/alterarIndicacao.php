<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Alterar Fonte de Indicação</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > CRM</li>
        <li class="active"> Alterar Fonte de Indicação</li>
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
    <form action="<?php echo current_url(); ?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">PREENCHA OS DADOS ABAIXO</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <?php echo form_hidden('idindicacao',$result->idindicacao) ?>
                            <div class="form-group">
                                <label>Descricao </label>
                                <input type="text" class="form-control" name="descricao" value="<?php echo $result->descricao; ?>">
                            </div>
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="0" <?php if($result->status == 0){echo "selected";} ?>>Inativo</option>
                                    <option value="1" <?php if($result->status == 1){echo "selected";} ?>>Ativo</option>
                                </select>
                            </div>
                        </div>
                        
                        
                       
                     
                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success"> SALVAR </button>
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/crm/gerenciarindicacao" class="btn btn-danger btn-small">CANCELAR </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
<?php $this->load->view('template/footer'); ?>

    
    
    
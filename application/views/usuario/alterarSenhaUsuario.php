<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Usuários
        <small>Cadastrar usuário</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > Usuários</li>
        <li class="active"> Alterar senha usuário</li>
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
                        <h3 class="box-title">Digite a nova senha</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <?php echo form_hidden('idusuarios',$result->idusuarios) ?>
                            
                        <div class="form-group col-md-5">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="senha" value="<?php echo $result->senha; ?>">
                        </div>
                       <div class="col-md-12">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success"> SALVAR </button>
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/dashboard" class="btn btn-danger btn-small">CANCELAR </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
<?php $this->load->view('template/footer'); ?>

    
    
    
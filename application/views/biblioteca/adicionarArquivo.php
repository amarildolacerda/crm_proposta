<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Adicionar Arquivo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > CRM</li>
        <li class="active"> Adicionar Arquivo</li>
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
    <?php echo form_open_multipart('biblioteca/add'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">PREENCHA OS DADOS DO ARQUIVO</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome </label>
                            <input type="text" class="form-control" name="nome" placeholder="Ex.: Arquivo XXXX" value="<?= set_value('nome') ?>">
                            <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva mais informações sobre o arquivo"></textarea>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="">Arquivo</label>
                            <input type="file" class="form-control-file" name="arquivo">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-left">
                            <button type="submit" class="btn btn-success"> SALVAR </button>
                            <a title="cancelar" href="<?php echo base_url() ?>index.php/biblioteca/gerenciar" class="btn btn-danger btn-small">CANCELAR </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</section>
<?php $this->load->view('template/footer'); ?>
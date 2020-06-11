<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Adicionar Status Lead</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > CRM</li>
        <li > Configurações</li>
        <li class="active"> Adicionar Status Lead</li>
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
    <form action="<?php echo base_url() ?>index.php/crm/addstatus" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">PREENCHA AS INFORMAÇÕES ABAIXO</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descrição </label>
                                <input type="text" class="form-control" name="descricao" value="<?= set_value('descricao') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="0">Inativo</option>
                                    <option selected="" value="1">Ativo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Posição menu </label>
                                <input type="text" class="form-control" name="posicaoMenu" data-toggle="tooltip" data-placement="bottom" title="Ordem que vai aparecer na tela da OS" value="<?= set_value('posicaoMenu') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>Encerra?</label>
                                <select class="form-control" name="encerra">
                                    <option selected="" value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success"> SALVAR </button>
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/crm/gerenciarstatus" class="btn btn-danger btn-small">CANCELAR </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
<?php $this->load->view('template/footer'); ?>
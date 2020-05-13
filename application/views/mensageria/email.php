<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Propostas
        <small>Adicionar propostas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Gerenciar propostas</li>
        <li class="active"> Adicionar propostas</li>
    </ol>
</section>
<?php
echo $this->session->flashdata('email_sent');
?>
<section class="content">
    <div class="col-md-8 col-md-offset-2">
        <?php
        if ($this->session->flashdata('success_msg')) {
            ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success_msg') ?>
            </div>
            <?php
        }
        ?>
    </div>
    <form action="<?php echo base_url() ?>index.php/mensageria/email" method="post">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações do cliente</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Destino</label>
                                <input type="text" class="form-control" id="destino" name="destino">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Assunto</label>
                                <input type="text" class="form-control" id="assunto" name="assunto">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Mensagem</label>
                            <textarea id="mensagem" name="mensagem" class="form-control" rows="4" ></textarea>
                        </div>
                    </div> <!-- /.box-body -->
                </div> <!-- /.box box-info-->
            </div> <!--/.col md-12) -->
            <!-- right column -->


            <div  class="col-md-3">

            </div>
            <div  class="col-md-6">
                <button type="submit" class="btn btn-block btn-success">Enviar </button>
            </div>
        </div>
    </form>
</section>

<?php $this->load->view('template/footer'); ?>

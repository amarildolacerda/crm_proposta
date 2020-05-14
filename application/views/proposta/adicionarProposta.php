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
    <form action="<?php echo base_url() ?>index.php/proposta/add" method="post">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações do cliente</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" onblur="loginPesquisaCliente()" placeholder="Ex.: 11.111.111/0001-01">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome Fantasia</label>
                                <input type="text" class="form-control" readonly="" id="fantasia" name="fantasia" placeholder="Ex.: Empresa X">
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Endereço</label>
                            <input type="text" class="form-control" readonly="" id="endereco" name="endereco" placeholder="Ex.: Rua Euclides da cunha,198">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Cidade</label>
                            <input type="text" class="form-control" readonly="" id="cidade" name="cidade" placeholder="Ex.: Santos">
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-group">
                                <label>Estado</label>
                                <select class="form-control" name="estado">
                                    <option>AC</option>
                                    <option>AL</option>
                                    <option>AP</option>
                                    <option>AM</option>
                                    <option>BA</option>
                                    <option>CE</option>
                                    <option>DF</option>
                                    <option>ES</option>
                                    <option>GO</option>
                                    <option>MA</option>
                                    <option>MT</option>
                                    <option>MS</option>
                                    <option>MG</option>
                                    <option>PA</option>
                                    <option>PB</option>
                                    <option>PR</option>
                                    <option>PE</option>
                                    <option>PI</option>
                                    <option>RJ</option>
                                    <option>RN</option>
                                    <option>RS</option>
                                    <option>RO</option>
                                    <option>RR</option>
                                    <option>SC</option>
                                    <option selected="">SP</option>
                                    <option>SE</option>
                                    <option>TO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ex.: email@dominio.com.br">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Contato</label>
                            <input type="text" class="form-control" id="contato" name="contato" placeholder="Ex.: Sr. João">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Ex.: (13)XXXX-XXXX" maxlength="15" name="phone">
                        </div>
                    </div> <!-- /.box-body -->
                </div> <!-- /.box box-info-->
            </div> <!--/.col md-12) -->
            <!-- right column -->


            <div  class="col-md-3">

            </div>
            <div  class="col-md-6">
                <button class="btn btn-block btn-success">AVANÇAR </button>
            </div>

        </div>
        <!-- /.row -->


    </form>

</section>
<?php $this->load->view('proposta/script'); ?>
<?php $this->load->view('template/footer'); ?>

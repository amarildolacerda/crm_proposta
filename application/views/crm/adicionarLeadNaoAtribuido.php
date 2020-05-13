<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Adicionar Lead</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > CRM</li>
        <li class="active"> Adicionar Lead</li>
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
    <form action="<?php echo base_url() ?>index.php/crm/addnaoatribuido" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">PREENCHA OS DADOS DO LEAD</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Empresa </label>
                                <input type="text" class="form-control" name="empresa" placeholder="Ex.: Empresa XXXX" value="<?= set_value('empresa') ?>">
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do contato </label>
                                <input type="text" class="form-control" name="nome" placeholder="Ex.: João da Silva" value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control" maxlength="18" name="cnpj" value="<?= set_value('cnpj') ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Whatsapp</label>
                                <input type="text" class="form-control" maxlength="15" name="whatsapp" value="<?= set_value('whatsapp') ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" maxlength="15" name="telefone" value="<?= set_value('telefone') ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="Ex.: xxxxxxx@storeware.com.br" value="<?= set_value('email') ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Cargo </label>
                                <input type="text" class="form-control" name="cargo"  value="<?= set_value('cargo') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Endereço </label>
                                <input type="text" class="form-control" name="endereco"  value="<?= set_value('endereco') ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Bairro </label>
                                <input type="text" class="form-control" name="bairro"  value="<?= set_value('bairro') ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cidade </label>
                                <input type="text" class="form-control" name="cidade"  value="<?= set_value('cidade') ?>">
                            </div>
                        </div>

                        <div class=" col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <?php
                                    foreach ($status as $value) {
                                        ?>
                                        <option value = <?php echo $value->idstatus; ?> <?php
                                        if ($value->idstatus == $statuspost) {
                                            echo "selected";
                                        }
                                        ?> ><?php echo $value->descricao; ?></option>
                                                <?php
                                            }
                                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Probabilidade venda (%)</label>
                                <select class="form-control" name="probabilidade">
                                    <option value="10"<?php
                                    if (10 == $probabilidadepost) {
                                        echo "selected";
                                    }
                                    ?> >0%</option>
                                    <option value="20" <?php
                                    if (20 == $probabilidadepost) {
                                        echo "selected";
                                    }
                                    ?>>20%</option>
                                    <option value="40" <?php
                                    if (40 == $probabilidadepost) {
                                        echo "selected";
                                    }
                                    ?>>40%</option>
                                    <option value="60" <?php
                                    if (60 == $probabilidadepost) {
                                        echo "selected";
                                    }
                                    ?>>60%</option>
                                    <option value="80" <?php
                                    if (80 == $probabilidadepost) {
                                        echo "selected";
                                    }
                                    ?>>80%</option>
                                    <option value="100" <?php
                                    if (100 == $probabilidadepost) {
                                        echo "selected";
                                    }
                                    ?>>100%</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Fonte da indicação</label>
                                <select class="form-control" name="fonte">
                                    <?php
                                    foreach ($indicacao as $value2) {
                                        ?>
                                        <option value = <?php echo $value2->idindicacao; ?> <?php
                                        if ($value2->idindicacao == $fontepost) {
                                            echo "selected";
                                        }
                                        ?> ><?php echo $value2->descricao; ?></option>
                                                <?php
                                            }
                                            ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Seguimento</label>
                                <select class="form-control" name="seguimento">
                                    <?php
                                    foreach ($seguimento as $value2) {
                                        ?>
                                        <option value = <?php echo $value2->idseguimento; ?> <?php
                                        if ($value2->idseguimento == $seguimentopost) {
                                            echo "selected";
                                        }
                                        ?> ><?php echo $value2->descricao; ?></option>
                                                <?php
                                            }
                                            ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Possui sistema?</label>
                                <select class="form-control" name="possuisistema">
                                    <option value="0"<?php
                                    if (0 == $possuisistemapost) {
                                        echo "selected";
                                    }
                                    ?> >Não</option>
                                    <option value="1" <?php
                                    if (1 == $possuisistemapost) {
                                        echo "selected";
                                    }
                                    ?>>Sim</option>
                                    <option value="2" <?php
                                    if (2 == $possuisistemapost) {
                                        echo "selected";
                                    }
                                    ?>>Não informado</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success"> SALVAR </button>
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/crm/gerenciar" class="btn btn-danger btn-small">CANCELAR </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
<?php $this->load->view('template/footer'); ?>
<?php $this->load->view('template/menu'); ?>

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
    <form action="<?php echo base_url() ?>index.php/crm/add" method="post">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <h3 class="box-title">Adicione um negócio</h3>
                    </div>
                    <div class="col-md-2">
                        <span class="label label-success">Cliente de carteira</span>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Empresa </label>
                                <input type="text" class="form-control" name="nomeEmpresa" value="<?= set_value('nomeEmpresa') ?>">
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control" maxlength="18" name="cnpj" value="<?= set_value('cnpj') ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nome do contato </label>
                                <input type="text" class="form-control" name="nomeContato" value="<?= set_value('nomeContato') ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Cargo </label>
                                <input type="text" class="form-control" name="cargo"  value="<?= set_value('cargo') ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Papel na compra </label>
                                <select class="form-control" name="papelNaCompra" data-toggle="tooltip" data-placement="left" title="Decisor: Quem decide a compra Influenciador: Influencia compra">
                                    <option value="naosei"<?php
                                    if ($papelNaCompraPost == "naosei") {
                                        echo "selected";
                                    }
                                    ?> >Não sei</option>
                                    <option value="decisor"<?php
                                    if ($papelNaCompraPost == "decisor") {
                                        echo "selected";
                                    }
                                    ?> >Decisor</option>
                                    <option value="influenciador" <?php
                                    if ($papelNaCompraPost == "influenciador") {
                                        echo "selected";
                                    }
                                    ?>>Influenciador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Endereço </label>
                                <input type="text" class="form-control" name="endereco"  value="<?= set_value('endereco') ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Bairro </label>
                                <input type="text" class="form-control" name="bairro"  value="<?= set_value('bairro') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Cidade </label>
                                <input type="text" class="form-control" name="cidade"  value="<?= set_value('cidade') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>Fase do fúnil</label>
                                <select class="form-control" name="status" >
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
                                <label>Fonte da indicação</label>
                                <select class="form-control" name="fonte" data-toggle="tooltip" data-placement="left" title="Quem indicou?">
                                    <option value = "" ></option>
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
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Segmento</label>
                                <select class="form-control" name="segmento">
                                    <option value = "" ></option>
                                    <?php
                                    foreach ($segmento as $value2) {
                                        ?>
                                        <option value = <?php echo $value2->idseguimento; ?> <?php
                                        if ($value2->idseguimento == $segmentopost) {
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
                                <label>Probabilidade venda (%)</label>
                                <select class="form-control" name="probabilidade" data-toggle="tooltip" data-placement="left" title="Com base no que você sentiu na negociação">
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
                                <label>Qual software usa?</label>
                                <input type="text" class="form-control" maxlength="15" name="softwareAtual" data-toggle="tooltip" data-placement="bottom" title="Colocar o nome do sistema" value="<?= set_value('softwareAtual') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/crm/gerenciar" class="btn btn-danger btn-small">CANCELAR </a>
                                <button type="submit" class="btn btn-success"> SALVAR </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

</section>
<script type="text/javascript">
    $(document).ready(function () {

        alert("status");
    });
</script>
<?php $this->load->view('template/footer'); ?>

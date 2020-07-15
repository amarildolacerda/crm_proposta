<?php $this->load->view('template/menu'); ?>

<section class="content">
    <form action="<?php echo base_url() ?>index.php/empresa/add" method="post">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <h3 class="box-title">Dados da empresa</h3>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nome da empresa / Razão Social </label>
                                <input type="text" class="form-control" name="nomeEmpresa" required="" minlength=3>
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control" maxlength="18" name="cnpjEmpresa" >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" maxlength="15" name="telefoneEmpresa">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Fonte da indicação</label>
                                <select required="" class="form-control" name="fonte" data-toggle="tooltip" data-placement="left" title="Quem indicou?">
                                    <option value = "" ></option>
                                    <?php
                                    foreach ($indicacao as $value2) {
                                        ?>
                                        <option value = <?php echo $value2->idindicacao; ?>><?php echo $value2->descricao; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Segmento</label>
                                <select required="" class="form-control" name="segmentoEmpresa">
                                    <option value = "" ></option>
                                    <?php
                                    foreach ($segmento as $value2) {
                                        ?>
                                        <option value = <?php echo $value2->idseguimento; ?>><?php echo $value2->descricao; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Endereço </label>
                                <input type="text" class="form-control" name="enderecoEmpresa" >
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>Compl. </label>
                                <input type="text" class="form-control" name="complementoEmpresa" >
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Bairro </label>
                                <input type="text" class="form-control" name="bairroEmpresa">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Cidade </label>
                                <input type="text" class="form-control" name="cidadeEmpresa">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Tipo</label>
                                <select required="" class="form-control" name="tipoEmpresa" data-toggle="tooltip" data-placement="left" title="Tipo do contato?">
                                    <option value = "" ></option>
                                    <?php
                                    foreach ($tipo as $value2) {
                                        ?>
                                        <option value = <?php echo $value2->idTipoEmpresa; ?>><?php echo $value2->descricao; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rede social / Site</label>
                                <input type="text" class="form-control" name="siteEmpresa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Qual software usa?</label>
                                <input required="" type="text" class="form-control" maxlength="15" name="softwareAtual" data-toggle="tooltip" data-placement="bottom" title="Colocar o nome do sistema" value="<?= set_value('softwareAtual') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <h3 class="box-title">Contato</h3>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do contato </label>
                                <input type="text" class="form-control" name="nomeContato" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Cargo </label>
                                <input type="text" class="form-control" name="cargo">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Papel na compra </label>
                                <select class="form-control" name="papelNaCompra" data-toggle="tooltip" data-placement="left" title="Decisor: Quem decide a compra Influenciador: Influencia compra">
                                    <option value="naosei">Não sei</option>
                                    <option value="decisor">Decisor</option>
                                    <option value="influenciador">Influenciador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" maxlength="15" name="telefoneContato">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Whatsapp</label>
                                <input type="text" class="form-control" maxlength="15" name="whatsappContato">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="emailContato">
                            </div>
                        </div>
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

    </form>
</section>
<?php $this->load->view('template/footer'); ?>

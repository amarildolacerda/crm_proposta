<?php $this->load->view('template/menu'); ?>


<section class="content-header">
    <h1>
        CRM
        <small>Visualizar Lead</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > CRM</li>
        <li class="active"> Visualizar Lead</li>
    </ol>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="form-group text-left">

            <a title="Voltar" href="<?php echo base_url() ?>index.php/crm/gerenciar" class="btn btn-danger btn-small">VOLTAR </a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body">
                    <div class="col-md-6">
                        <?php echo form_hidden('idcrm', $result->idcrm) ?>
                        <div class="form-group">
                            <label>Empresa </label>
                            <input type="text" class="form-control" disabled name="empresa" value="<?php echo $result->empresa; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome do contato</label>
                            <input type="text" class="form-control" disabled name="nome" placeholder="Ex.: João da Silva" value="<?php echo $result->nome; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" class="form-control" disabled maxlength="18" name="cnpj" value="<?php echo $result->cnpj; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Whatsapp</label>
                            <input type="text" class="form-control" disabled maxlength="15" name="whatsapp" value="<?php echo $result->whatsapp; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" class="form-control" disabled maxlength="15" name="telefone" value="<?php echo $result->telefone; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" disabled name="email"  value="<?php echo $result->email; ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Cargo </label>
                            <input type="text" class="form-control" disabled name="cargo"  value="<?php echo $result->cargo; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Endereço </label>
                            <input type="text" class="form-control" disabled name="endereco"  value="<?php echo $result->endereco; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Bairro </label>
                            <input type="text" class="form-control" disabled name="bairro"  value="<?php echo $result->bairro; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Cidade </label>
                            <input type="text" class="form-control" disabled name="cidade"  value="<?php echo $result->cidade; ?>">
                        </div>
                    </div>
                    <div class=" col-md-3">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" disabled name="status">
                                <?php
                                foreach ($statusfunil as &$value) {
                                    ?>
                                    <option <?php
                                    if ($result->status == $value->idstatus) {
                                        echo "selected";
                                    }
                                    ?> value = <?php echo $value->idstatus; ?> >
                                        <?php echo $value->descricao; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fonte da indicação</label>
                            <select class="form-control" disabled name="fonte">
                                <?php
                                foreach ($indicacao as $value2) {
                                    ?>
                                    <option <?php
                                    if ($result->fonte == $value2->idindicacao) {
                                        echo "selected";
                                    }
                                    ?> value = <?php echo $value2->idindicacao; ?> >
                                        <?php echo $value2->descricao; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Seguimento</label>
                            <select class="form-control" disabled name="seguimento">
                                <?php
                                foreach ($seguimento as $value2) {
                                    ?>
                                    <option <?php
                                    if ($result->seguimento == $value2->idseguimento) {
                                        echo "selected";
                                    }
                                    ?> value = <?php echo $value2->idseguimento; ?> >
                                        <?php echo $value2->descricao; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Possui sistema?</label>
                            <select class="form-control" disabled name="possuisistema">
                                <option value="0" <?php
                                if ($result->possuisistema == 0) {
                                    echo "selected";
                                }
                                ?>>Não</option>

                                <option value="1" <?php
                                if ($result->possuisistema == 1) {
                                    echo "selected";
                                }
                                ?> >Sim</option>
                                <option value="2" <?php
                                if ($result->possuisistema == 2) {
                                    echo "selected";
                                }
                                ?> >Não informado</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">PROPOSTAS CRIADAS PARA ESTE LEAD</h3>
                </div>
                <div class="box-body">
                    <?php if (!$proposta) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Propostas</h5>

                            </div>

                            <div class="widget-content nopadding table-responsive">


                                <table class="table table-bordered ">
                                    <thead>
                                        <tr style="backgroud-color: #2D335B">
                                            <th>Nº Proposta</th>
                                            <th>Cliente</th>
                                            <th>Contato</th>
                                            <th>Data</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td colspan="5">Nenhuma proposta cadastrada</td>
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

                            <div class="widget-content nopadding table-responsive">


                                <table class="table table-bordered ">
                                    <thead>
                                        <tr style="backgroud-color: #2D335B">
                                            <th>Nº Proposta</th>
                                            <th>Cliente</th>
                                            <th>Contato</th>
                                            <th>Data</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($proposta as $r) { ?>
                                            <tr> 
                                                <td><?php echo $r->numpropostas; ?></td>
                                                <td><?php echo $r->fantasia; ?></td> 
                                                <td><?php echo $r->contato; ?></td> 
                                                <td><?php echo $r->data; ?></td> 
                                                <td><?php
                                                    if ($r->status == 1) {
                                                        echo "<span class='label label-primary'>Aguardando Aprovação</span>";
                                                    }
                                                    if ($r->status == 2) {
                                                        echo "<span class='label label-success'>Fechado Ganho</span>";
                                                    }
                                                    if ($r->status == 3) {
                                                        echo "<span class='label label-danger'>Fechado Perdido</span>";
                                                    }
                                                    ?>
                                                </td>


                                                <td class="text-center">
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'iProposta')) { ?>
                                                        <a title="imprimir" href="<?php echo base_url() . 'index.php/proposta/imprimir/' . $r->numpropostas ?>" class="btn btn-warning btn-small">Imprimir <i class="fa-fw glyphicon glyphicon-print"></i> </a>
                                                    <?php } ?>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProposta')) { ?>
                                                        <a title="editar" href="<?php echo base_url() ?>index.php/proposta/edit/<?php echo $r->numpropostas; ?>" class="btn btn-primary btn-small">Editar <i class="fa-fw glyphicon glyphicon-edit"></i> </a>
                                                    <?php } ?>
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
                        
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- TIME LINE - INICIO DO CODIGO -->

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">TIMELINE DE HISTÓRICO</h3>
                </div>
                <div class="box-body">
                    <ul class="timeline" id="divTimeline">
                        <?php
                        foreach ($timeline as $t) {
                            ?>
                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-red">
                                    <?php
                                    echo $t->data;
                                    ?>
                                </span>
                            </li>
                            <!-- /.timeline-label -->

                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-envelope bg-blue"></i>
                                <div class="timeline-item" >
                                    <h3 class="timeline-header"><?php echo $t->nome; ?></h3>
                                    <div class="timeline-body">
                                        <?php echo $t->descricao ?>
                                    </div>  

                                </div>
                            </li>
                            <!-- TIME LINE - FIM DO CODIGO -->

                            <?php
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('template/footer'); ?>

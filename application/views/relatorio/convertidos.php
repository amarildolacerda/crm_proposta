<?php $this->load->view('template/menu'); ?>
<?php $this->load->view('relatorio/menu'); ?>
<section>

    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">FILTROS DE BUSCA</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div><!-- /.box-tools -->
            </div> <!-- /.box-header -->
            <div class="box-body">
                <form method="post" action="<?php echo base_url(); ?>index.php/relatorio/filtro"> <!-- INICIO DE FORM DE FILTRO DE BUSCA -->
                    <div class="col-md-3">
                        <select name="vendedor" id="vendedor" class="form-control">
                            <option value="">Selecione o vendedor</option>
                            <?php
                            foreach ($usuarios as $value) {
                                ?>
                                <option value = "<?php echo $value->idusuarios; ?>" <?php
                                if ($value->idusuarios == $vendedorpost) {
                                    echo "selected";
                                }
                                ?> ><?php echo $value->nome; ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="seguimento" id="seguimento" class="form-control">
                            <option value="">Selecione o seguimento</option>
                            <?php
                            foreach ($seguimento as $value) {
                                ?>
                                <option value ="<?php echo $value->idseguimento; ?>" <?php
                                if ($value->idseguimento == $seguimentopost) {
                                    echo "selected";
                                }
                                ?> ><?php echo $value->descricao; ?></option>
                                        <?php
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" class="form-control" name="datainicial" id="datainicial" value="<?= set_value('datainicial') ?>">
                            </div> <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="date" class="form-control" name="datafinal" id="datafinal" value="<?= set_value('datafinal') ?>">
                            </div> <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a href="<?php echo base_url(); ?>index.php/relatorio/convertidos" class="btn btn-primary"><i class="icon-plus icon-white"></i>Limpar filtros</a>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-danger"> <i class="icon-search"></i> Pesquisar</button>
                    </div>
                    <br><br>
                </form> <!-- FIM DE FORM DE FILTRO DE BUSCA -->
            </div> <!-- /.box-body -->
        </div><!-- /.box -->
    </div>

    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Leads convertidos / perdidos</h3>
            </div>
            <div class="box-body">
                <?php if (!$results) { ?>
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="icon-barcode"></i>
                            </span>
                            <h5>Gerenciar Leads</h5>
                        </div>
                        <div class="widget-content nopadding table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Descrição</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="5">Nenhum Lead Cadastrado</td>
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="backgroud-color: #2D335B">
                                        <th>ID</th>
                                        <th>Empresa</th>
                                        <th>Seguimento</th>
                                        <th>Data</th>
                                        <th>Comercial</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $r) { ?>
                                        <tr> 
                                            <td><?php echo $r->idcrm; ?></td>
                                            <td><?php echo $r->empresa; ?></td> 
                                            <td><?php
                                                foreach ($seguimento as $value) {
                                                    if ($r->seguimento == $value->idseguimento) {
                                                        echo $value->descricao;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $r->data; ?></td> 
                                            <td>
                                                <?php
                                                foreach ($usuarios as $value) {
                                                    if ($r->usuario == $value->idusuarios) {
                                                        echo $value->nome;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                foreach ($status as $value) {
                                                    if ($r->status == $value->idstatus) {
                                                        echo $value->descricao;
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    echo $this->pagination->create_links();
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('template/footer'); ?>
<?php $this->load->view('template/menu'); ?>
<div class="row">

    <div class="col-md-12">
        <div class="col-md-1"></div>
        <form method="post" action="<?php echo base_url(); ?>index.php/calendario"> <!-- INICIO DE FORM DE FILTRO DE BUSCA -->
            <input type="hidden" id="vend" value="<?php echo $vend ?>">
            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'tAgenda')) { ?>
                <div class="col-md-9">
                    <div class="form-group">
                        <label>Selecione a vendedor</label>
                        <select name="vendedor" id="vendedor" class="form-control">
                            <?php foreach ($vendedor as $p) { ?>
                                <option value="<?php echo $p->idusuarios; ?>" <?php
                                if ($p->idusuarios == $vend) {
                                    echo "selected";
                                }
                                ?>><?php echo $p->nome; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-1">
                    <label>.</label>
                    <button class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-search"></i> Pesquisar</button>
                </div>
            <?php } ?>
            <br><br>
        </form> <!-- FIM DE FORM DE FILTRO DE BUSCA -->
        <div class="col-md-1"></div>
    </div>

    <div class="col-md-12">
        <div class="col-md-1">

            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aAgenda')) { ?>
            <a href="<?php echo base_url(); ?>index.php/calendario/add" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Add Evento</a>
            <?php } ?>

        </div>
<!--        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />-->
        <script>
            $(function () {
                $('input[name="datetimes"]').daterangepicker({
                    timePicker: true,
                    startDate: moment().startOf('hour'),
                    endDate: moment().startOf('hour').add(32, 'hour'),
                    locale: {
                        format: 'YYYY/MM/DD HH:mm A'
                    }
                });
            });
        </script>
        <div class="col-md-10">
            <div class="box box-success">
                <div class="box-body no-padding">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('calendario/script'); ?>
<?php $this->load->view('template/footer'); ?>

<?php $this->load->view('template/menu'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(function () {
        $('input[name="datetimes"]').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(1, 'hour'),
            locale: {
                format: 'YYYY/MM/DD HH:mm'
            }
        });
    });
</script>
<section class="content-header">
    <h1>
        CRM
        <small>Adicionar evento na agenda</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > CRM</li>
        <li > Calendario</li>
        <li class="active"> Adicionar evento na agenda</li>
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

    <form action="<?php echo base_url() ?>index.php/calendario/add" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">PREENCHA AS INFORMAÇÕES ABAIXO</h3>
                    </div>

                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Título do evento</label>
                                <input type="text" class="form-control" name="titulo" value="<?= set_value('titulo') ?>">
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                                <input type="hidden" class="form-control" name="idLead_proposta" value="<?= set_value('idLead_proposta') ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Periodo do evento</label>
                                <input type="text"class="form-control"  name="datetimes" value="<?= set_value('periodo') ?>" />
                            </div>
                        </div>
<!--                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data inicial</label>
                                <input type="date"class="form-control" value="<?php  date_default_timezone_set('America/Sao_Paulo'); echo date("Y-m-d") ?>" />
                            </div>
                        </div>
                       
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hora inicial</label>
                                <input type="time"class="form-control" value="<?php   echo date("H:i") ?>"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data final</label>
                                <input type="date"class="form-control" value="<?php   echo date("Y-m-d") ?>" />
                            </div>
                        </div>
                       
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hora final</label>
                                <input type="time"class="form-control" value="<?php   echo date("H:i",strtotime("+1 hour")) ?>"/>
                            </div>
                        </div>-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo de agenda</label>
                                <select name="color" id="color" class="form-control">
                                   <option value="green">Ligação</option>
                                   <option value="blue">Visita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrição da agenda</label>
                                <textarea class="form-control" rows="5" name="descricao" id="descricao" value="<?= set_value('descricao') ?>"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success"> SALVAR </button>
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/calendario" class="btn btn-danger btn-small">CANCELAR </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
<?php $this->load->view('template/footer'); ?>
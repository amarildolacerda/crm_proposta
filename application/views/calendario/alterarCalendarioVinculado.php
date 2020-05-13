<?php $this->load->view('template/menu'); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
    $(function () {
        $('input[name="datetimes"]').daterangepicker({
            timePicker: true,
            locale: {
                format: 'YYYY/MM/DD HH:mm'
            }
        });
    });
</script>
<section class="content-header">
    <h1>
        CRM
        <small>Editar evento na agenda</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li > Calendario</li>
        <li class="active"> Editar evento da agenda</li>
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
    <form action="<?php echo current_url(); ?>" method="post">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">PREENCHA AS INFORMAÇÕES ABAIXO</h3>
                    </div>

                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo form_hidden('id', $result->id) ?>
                                <label>Título do evento</label>
                                <input type="text" class="form-control" name="titulo" value="<?php echo $result->title; ?>">
                                <input type="hidden" class="form-control" name="idLead" value="<?php echo $result->idLead_proposta; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Periodo do evento</label>
                                <input type="text"class="form-control"  name="datetimes" value="<?php echo $result->start; ?> - <?php echo $result->end; ?>" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipo de agenda</label>
                                <select name="color" id="color" class="form-control">
                                    <option value="green" <?php
                                    if ($result->color == 'green') {
                                        echo "selected";
                                    }
                                    ?>>Ligação</option>

                                    <option value="blue" <?php
                                    if ($result->color == 'blue') {
                                        echo "selected";
                                    }
                                    ?> >Visita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrição da agenda</label>
                                <textarea class="form-control" rows="5" name="descricao" id="descricao"><?php echo $result->description; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success"> SALVAR </button>
                                <a title="cancelar" href="#" class="btn btn-primary btn-small" onclick="history.go(-1)">CANCELAR </a>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dAgenda')) { ?>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                                        Excluir
                                    </button>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
<!--MODAL BOTÃO EXCLUIR-->
<div class="modal modal-default fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Deseja excluir o calendario?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                <?php echo '<td><span href="" idAcao="' . $result->id . '"  class="btn btn-danger">Excluir<i class="icon-remove icon-white"></i></span></td>'; ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--MODAL BOTÃO EXCLUIR-->
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', 'span', function (event) {
            var id = $(this).attr('idAcao');
            if ((id % 1) == 0) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/Calendario/excluirCalendario",
                    data: "id=" + id,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            history.go(-1);
                        } else {
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });
    });
</script>
<?php $this->load->view('template/footer'); ?>
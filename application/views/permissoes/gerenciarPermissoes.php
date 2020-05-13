<?php $this->load->view('template/menu'); ?>


<section class="content-header">
    <h1>
        Permissões
        <small>Gerenciar permissões</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar permissões</li>
    </ol>
</section>
<section class="content">


    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR PERMISSÕES DO SISTEMA</h3>
                </div>
                <div class="box-body">
                    <a href="<?php echo base_url(); ?>index.php/permissoes/add" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar permissões</a>
                    <br>
                    <br>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Gerenciar permissões</h5>

                            </div>

                            <div class="widget-content nopadding table-responsive">


                                <table class="table table-bordered table-hover table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Data de Criação</th>
                                            <th>Situação</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td colspan="5">Nenhuma permissão cadastrada</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <?php } else { ?>

                        <div class="widget-box">
                            <div class="widget-content nopadding table-responsive">
                                <table class="table table-bordered table-hover table-striped table-condensed">
                                    <thead>
                                        <tr style="backgroud-color: #2D335B">
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Data de Criação</th>
                                            <th>Situação</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        foreach ($results as $r) {
                                            if ($r->situacao == 1) {
                                                $situacao = 'Ativo';
                                            } else {
                                                $situacao = 'Inativo';
                                            }
                                            echo '<tr class="text-middle ng-binding">';
                                            echo '<td class="text-middle ng-binding">' . $r->idPermissao . '</td>';
                                            echo '<td class="text-middle ng-binding">' . $r->nome . '</td>';
                                            echo '<td class="text-middle ng-binding">' . date('d/m/Y', strtotime($r->data)) . '</td>';
                                            echo '<td class="text-middle ng-binding">' . $situacao . '</td>';
                                            echo '<td class="text-middle ng-binding text-center">
                      <a href="' . base_url() . 'index.php/permissoes/editar/' . $r->idPermissao . '" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="#modal-excluir" role="button" data-toggle="modal" permissao="' . $r->idPermissao . '" class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-remove"></i></a>
                  </td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                        <tr class="text-middle ng-binding">

                                        </tr>
                                        <tr class="text-middle ng-binding">
                                        </tr>
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
    </div>


</section>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/permissoes/desativar" method="post" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Desativar Permissão</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idPermissao" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente desativar esta permissão?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>


<script type="text/javascript">
    $(document).ready(function () {


        $(document).on('click', 'a', function (event) {

            var permissao = $(this).attr('permissao');
            $('#idPermissao').val(permissao);

        });

    });

</script>

<?php $this->load->view('template/footer'); ?>



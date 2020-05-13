<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Usuários
        <small>Gerenciar usuários</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar usuários</li>
    </ol>
</section>
<section class="content">


    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR USUÁRIOS CADASTRADOS NO SISTEMA</h3>
                </div>
                <div class="box-body">
                    <a href="<?php echo base_url(); ?>index.php/usuario/add" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar usuário</a>
                    <br>
                    <br>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Gerenciar usuários</h5>

                            </div>

                            <div class="widget-content nopadding table-responsive">


                                <table class="table table-bordered table-hover table-striped table-condense">
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
                                            <td colspan="5">Nenhum Tipo Cadastrado</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <?php } else { ?>

                        <div class="widget-box">
                            <div class="widget-content nopadding table-responsive">
                                <table class="table table-bordered table-hover table-striped table-condense">
                                    <thead>
                                        <tr style="backgroud-color: #2D335B">
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Permissão</th>
                                            <th>Filial</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td class="text-middle ng-binding"><?php echo $r->idusuarios; ?></td>
                                                <td class="text-middle ng-binding"><?php echo $r->nome; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->permissao; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->filial; ?></td> 
                                                <td class="text-middle ng-binding"><?php
                                                    if ($r->status == 1) {
                                                        echo "Ativo";
                                                    } else {
                                                        echo "Desativado";
                                                    }
                                                    ?></td>


                                                <td class="text-middle ng-binding text-center">
                                                    <a href="<?php echo base_url(); ?>index.php/usuario/alterarsenha/<?php echo $dadoslogin['idusuarios']; ?>" class="btn btn-success btn-xs">Alterar senha<i class="fa-fw glyphicon glyphicon-user"></i></a>
                                                    <a title="editar" href="<?php echo base_url() ?>index.php/usuario/edit/<?php echo $r->idusuarios; ?>" class="btn btn-primary btn-xs"><i class="fa-fw glyphicon glyphicon-edit"></i> </a>
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
    <form action="<?php echo base_url() ?>produtos/excluir" method="post" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir Produto</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idProduto" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este produto?</h5>
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

            var produto = $(this).attr('produto');
            $('#idProduto').val(produto);

        });

    });

</script>

<?php $this->load->view('template/footer'); ?>
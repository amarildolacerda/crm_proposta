<?php $this->load->view('template/menu'); ?>
<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nome da empresa</label>
                                <input type="text" name="nomeEmpresa" class="form-control" required="">
                            </div>
                            <div class="col-md-6">
                                <label>Nome do negócio</label>
                                <input type="text" name="nomeDoNegocio" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#geral" data-toggle="tab">Geral</a></li>
            <li><a href="#produtos" data-toggle="tab">Produtos/Serviços</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="geral">
                <div class="col-md-6">
                    <div class="row">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <div class="col-md-10">
                                    <h3 class="box-title">SOBRE O NEGÓCIO</h3>
                                </div>

                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Valor do negócio</label>
                                            <input type="text" name="valorDoNegocio" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Data de fechamento esperada </label>
                                            <input type="date" class="form-control" name="dataFechamentoEsperada" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fase do fúnil</label>
                                            <select required="" class="form-control" name="faseDoFunil">
                                                <option value = "" ></option>
                                                <?php
                                                foreach ($status as $value2) {
                                                    ?>
                                                    <option value = <?php echo $value2->idstatus; ?>><?php echo $value2->descricao; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Nome da empresa / Razão Social </label> 
                                            <input type="text" class="form-control" name="nomeEmpresa" required="" minlength=3 >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>CNPJ</label>
                                            <input type="text" class="form-control" maxlength="18" name="cnpjEmpresa" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control" name="tipoEmpresa" data-toggle="tooltip" data-placement="left" title="Tipo do contato?">
                                                <option value = "" ></option>
                                                <?php
                                                foreach ($tipo as $value2) {
                                                    ?>
                                                    <option value = <?php echo $value2->idTipoEmpresa; ?> ><?php echo $value2->descricao; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Fonte da indicação</label>
                                            <select class="form-control" name="fonte" data-toggle="tooltip" data-placement="left" title="Quem indicou?">
                                                <option value = "" ></option>
                                                <?php
                                                foreach ($indicacao as $value2) {
                                                    ?>
                                                    <option value = <?php echo $value2->idindicacao; ?> ><?php echo $value2->descricao; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Segmento</label>
                                            <select class="form-control" name="segmentoEmpresa">
                                                <option value = "" ></option>
                                                <?php
                                                foreach ($segmento as $value2) {
                                                    ?>
                                                    <option value = <?php echo $value2->idseguimento; ?> ><?php echo $value2->descricao; ?></option>
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
                                            <input type="text" class="form-control" name="enderecoEmpresa"   >
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>Compl. </label>
                                            <input type="text" class="form-control" name="complementoEmpresa" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Bairro </label>
                                            <input type="text" class="form-control" name="bairroEmpresa" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cidade </label>
                                            <input type="text" class="form-control" name="cidadeEmpresa" > 
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control" maxlength="15" name="telefoneEmpresa" >
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Rede social / Site</label>
                                            <input type="text" class="form-control" name="siteEmpresa" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Qual software usa?</label>
                                            <input required="" type="text" class="form-control" maxlength="15" name="softwareAtual" data-toggle="tooltip" data-placement="bottom" title="Colocar o nome do sistema">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <div class="col-md-4">
                                    <h3 class="box-title">CONTATO</h3>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nome do contato </label>
                                            <input type="text" class="form-control" name="nomeContato" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Cargo </label>
                                            <input type="text" class="form-control" name="cargo" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Papel na compra </label>
                                            <select class="form-control" readonly="" name="papelNaCompra" data-toggle="tooltip" data-placement="left" title="Decisor: Quem decide a compra Influenciador: Influencia compra">
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
                                            <input type="text"  class="form-control" maxlength="15" name="telefoneContato" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Whatsapp</label>
                                            <input type="text"  class="form-control" maxlength="15" name="whatsappContato" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email"  class="form-control" name="emailContato">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-foursquare" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-phone"> Ligação</i> 
                            </button>
                            <button type="button" class="btn btn-github" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa  fa-calendar-plus-o"> Visita</i> 
                            </button>
                            <button type="button" class="btn btn-instagram" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa  fa-envelope"> E-mail</i> 
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box-body">
                            <div class="box-body box box-primary">
                                <h4 class="box-title">TIMELINE DE HISTÓRICO</h4>
                                <form id="formTimeline" action="<?php echo base_url() ?>empresa/adicionarTimeline" method="post">
                                    <div class="col-md-10">

                                        <input type="hidden" name="tipo" id="tipo" value="fa fa-comments bg-yellow" />
                                        <input type="hidden" name="idEmpresas" id="idEmpresas" />
                                        <label for="">Descrição</label>
                                        <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva o que foi conversado com o cliente"></textarea>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="">.</label>
                                        <button class="btn btn-primary span12" id="btnAdicionarProduto"><i class="icon-white icon-plus"></i> Adicionar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="box box-primary">
                                <div class="box-header ui-sortable-handle" style="cursor: move;">
                                    <i class="ion ion-clipboard"></i>
                                    <h3 class="box-title">Planejado</h3>
                                    <!--
                                                                <div class="box-tools pull-right">
                                                                    <ul class="pagination pagination-sm inline">
                                                                        <li><a href="#">«</a></li>
                                                                        <li><a href="#">1</a></li>
                                                                        <li><a href="#">2</a></li>
                                                                        <li><a href="#">3</a></li>
                                                                        <li><a href="#">»</a></li>
                                                                    </ul>
                                                                </div>-->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                                    <ul class="todo-list ui-sortable">
                                        <li>
                                            <input type="checkbox" value="">
                                            <span class="text">Design a nice theme</span>
                                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <input type="checkbox" value="">
                                            <span class="text">Make the theme responsive</span>
                                            <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <input type="checkbox" value="">
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                                            <div class="tools">
                                                <i class="fa fa-edit"></i>
                                                <i class="fa fa-trash-o"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div class="tab-pane" id="produtos">
                <div class="form-group">
                    <label>Produtos </label>
                    <select class="scriptEmpresas" id="nomeEmpresa" name="nomeEmpresa" style="width: 100%">></select>
                    <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php $this->load->view('template/footer'); ?>
<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    $(".scriptEmpresas").select2({
        tags: true, //PODE ESCOLHER O QUE DIGITOU MESMO QUE NAO TENHA NA BUSCA
        //multiple: true, //PODE ESCOLHER MAIS DE UMA OPÇÃO

        //  tokenSeparators: [',', ' '],
        minimumInputLength: 3,
        minimumResultsForSearch: 10,
        ajax: {
            url: BASE_URL + 'index.php/crm/autocompleteCliente',
            dataType: "json",
            quietMillis: 500,
            type: "GET",
            data: function (params) {
                var queryParameters = {
                    term: params.term
                };
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nomeEmpresa,
                            id: item.idEmpresas
                        };
                    })
                };
            }
        }

    });

</script>  
<script type="text/javascript">
    $(document).ready(function () {

        $("#formTimeline").validate({
            rules: {
                descricao: {required: true}
            },
            messages: {
                descricao: {required: 'Insira a descrição'}
            },
            submitHandler: function (form) {

                var dados = $(form).serialize();
                $("#divTimeline").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/empresa/adicionarTimeline",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divTimeline").load("<?php echo current_url(); ?> #divTimeline");
                            $("#idEmpresas").val('');
                            $("#descricao").val('');
                            $("#descricao").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar timeline.');
                        }
                    }
                });
                return false;
            }

        });
        $(document).on('click', 'a', function (event) {
            var idTimeline_empresas = $(this).attr('idAcao');
            if ((idTimeline_empresas % 1) == 0) {
                $("#divTimeline").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/empresa/excluirTimeline",
                    data: "idTimeline_empresas=" + idTimeline_empresas,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divTimeline").load("<?php echo current_url(); ?> #divTimeline");
                            $("#descricao").val('');
                            $("#descricao").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar excluir timeline.');
                        }
                    }
                });
                return false;
            }

        });

    });
</script>


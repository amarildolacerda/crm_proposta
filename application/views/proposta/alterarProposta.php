<?php $this->load->view('template/menu'); ?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo current_url(); ?>" method="post">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações da proposta</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="font-size:30px">Proposta #<?php echo $proposta->idPropostas . " | " ?></label>
                                    <label style="font-size:30px">Negócio #<?php echo $proposta->idNegocio ?></label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Prazo de pagamento</label>
                                    <input type="text" class="form-control" name="prazoPagamento" value="<?php echo $proposta->prazoPagamento ?>">
                                    <input type="hidden" class="form-control" name="idNegocio" value="<?php echo $proposta->idNegocio ?>">
                                    <input type="hidden" class="form-control" name="idPropostas" value="<?php echo $proposta->idPropostas ?>">
                                    <input type="hidden" class="form-control" name="idEmpresas" value="<?php echo $proposta->idEmpresas ?>">
                                    <input type="hidden" class="form-control" name="idContatos" value="<?php echo $proposta->idContatos ?>">
                                    <input type="hidden" class="form-control" name="vendedor" value="<?php echo $proposta->vendedor ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Validade da proposta</label>
                                    <input type="number" class="form-control" name="validade"  value="<?php echo $proposta->validade ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Previsão de instalação</label>
                                <input type="number" class="form-control" name="previsaoInstalacao" value="<?php echo $proposta->previsaoInstalacao ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Observações</label>
                                <textarea name="observacao" class="form-control" rows="4" ><?php echo $proposta->observacao ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <a title="cancelar" href="<?php echo base_url() ?>index.php/crm/editNegocios/<?php echo $proposta->idNegocio ?>" class="btn btn-danger btn-small">CANCELAR </a>
                                    <button type="submit" class="btn btn-success"> SALVAR </button>
                                    <a title="imprimir" href="<?php echo base_url() . 'index.php/proposta/imprimir/' . $proposta->idPropostas ?>" class="btn btn-warning btn-small"><i class="fa-fw glyphicon glyphicon-print"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.box-body -->
                </div> <!-- /.box box-info-->
            </form>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Informações do cliente</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nome da empresa / Razão Social</label>
                                <input type="text" class="form-control" id="fantasia" readonly="" value="<?php echo $proposta->nomeEmpresa ?>" >
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $proposta->vendedor ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" readonly="" name="cnpj" value="<?php echo $proposta->cnpj ?>" >
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Endereço</label>
                            <input type="text" class="form-control" readonly="" id="endereco" name="endereco"value="<?php echo $proposta->enderecoEmpresa . ', ' . $proposta->bairroEmpresa ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Cidade</label>
                            <input type="text" class="form-control" readonly="" id="cidade" name="cidade" value="<?php echo $proposta->cidadeEmpresa ?>" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label>E-mail</label>
                            <input type="email" class="form-control" readonly="" id="email" name="email" value="<?php echo $proposta->emailContato ?>" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>Contato</label>
                            <input type="text" class="form-control" readonly="" id="contato" name="contato"  value="<?php echo $proposta->nomeContato ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Telefone</label>
                            <input type="tel" class="form-control" readonly="" id="telefone" name="telefone"  maxlength="15" name="phone" value="<?php echo $proposta->telefoneContato ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Whatsapp</label>
                            <input type="tel" class="form-control" readonly="" id="whatsapp" name="whatsapp"  maxlength="15" name="phone" value="<?php echo $proposta->whatsappContato ?>">
                        </div>
                    </div>
                </div>
            </div>
            <!-- MENSALIDADE -->
            <div class="row">
                <div class="col-md-5">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Mensalidade</h3>
                        </div>
                        <div class="box-body">
                            <form action="<?php echo base_url() ?>index.php/proposta/mensalidadeProposta" method="post">
                                <div class="col-md-10">
                                    <label>Mensalidade</label>
                                    <input type="text" class="form-control" name="mensalidade" value="<?php echo $proposta->mensalidade ?>">
                                    <input type="hidden" class="form-control" name="idPropostas" value="<?php echo $proposta->idPropostas ?>">
                                </div>
                                <div class="col-md-1">
                                    <label>.</label>
                                    <button class="btn btn-success span6" id="atualizarMensalidade"><i class="fa fa-calculator"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="form-group">
                            <label style="font-size:30px">Mensalidade <?php echo "R$" . $proposta->mensalidade . ",00" ?></label>
                        </div>
                    </div>
                    <div class="row" id="totalGeral">
                        <div class="form-group">
                            <label style="font-size:30px">Total da Proposta <?php $totalGeral=$proposta->totalServicos + $proposta->totalProdutos; echo "R$" . $totalGeral . ",00" ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODULOS -->
            <div class="row">
                <div class="col-md-5">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Módulos</h3>
                        </div>
                        <div class="box-body">
                            <form id="formModulos" action="<?php echo base_url() ?>index.php/proposta/adicionarModulosProposta" method="post">
                                <div class="col-md-9">
                                    <label>Módulos </label>
                                    <input type="hidden" class="form-control" name="idPropostas" value="<?php echo $proposta->idPropostas ?>">
                                    <select class="form-control" id="idModulo" name="idModulo" required="">
                                        <option></option>
                                        <?php
                                        foreach ($modulosCadastrados as $value2) {
                                            ?>
                                            <option value="<?php echo $value2->idModulos; ?>">
                                                <?php echo $value2->descricao; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label >Qtde</label>
                                    <input type="number" id="quantidade" name="quantidade" class="form-control" value="1" />
                                </div>
                                <div class="col-md-1">
                                    <br>
                                    <button class="btn btn-success span6" ><i class="fa fa-plus"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Módulos adicionados</h3>
                        </div>
                        <div class="box-body">

                            <div  id="divModulos" class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Descricao</th>
                                            <th>Qtde</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($modulos as $m) {

                                            echo '<tr>';
                                            echo '<td>' . $m->descricao . '</td>';
                                            echo '<td>' . $m->quantidade . '</td>';
                                            echo '<td><a href="" idAcao="' . $m->idModulo_proposta . '" class="btn btn-danger"><i class="fa-fw glyphicon glyphicon-trash"></i></a></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PRODUTOS -->
            <div class="row">
                <div class="col-md-5">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Adicionar produtos</h3>
                        </div>
                        <div class="box-body">
                            <form id="formProdutos" action="<?php echo base_url() ?>index.php/proposta/adicionarProduto" method="post">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Produtos </label>
                                        <input type="hidden" class="form-control" name="idPropostas" value="<?php echo $proposta->idPropostas ?>>">
    <!--                                    <select class="scriptProdutos" id="idProduto" name="idProdutos" style="width: 100%">></select>-->
                                        <input type="text" class="form-control" id="descricaoProduto" name="descricaoProduto" required="" >
                                    </div>
                                    <div class="col-md-3">
                                        <label>Valor </label>
                                        <input type="number" class="form-control" id="vlunitarioProduto" name="vlunitarioProduto" required="">
                                    </div>
                                    <div class="col-md-2">
                                        <label >Qtde</label>
                                        <input type="number" id="quantidadeProduto" name="quantidadeProduto" class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <br>
                                        <button class="btn btn-success span6" id="btnAdicionarProduto"><i class="fa fa-plus"></i> Adicionar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Produtos adicionados</h3>
                        </div>
                        <div class="box-body">

                            <div  id="divProdutos" class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Produto</th>
                                            <th>Qtde</th>
                                            <th>Unitário</th>
                                            <th>Sub-total</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalProdutos = 0;
                                        foreach ($produtos as $p) {

                                            $totalProdutos = $totalProdutos + $p->vltotal;
                                            echo '<tr>';
                                            echo '<td>' . $p->idProduto_proposta . '</td>';
                                            echo '<td>' . $p->produto . '</td>';
                                            echo '<td>' . $p->quantidade . '</td>';
                                            echo '<td>R$ ' . number_format($p->vlunitario, 2, ',', '.') . '</td>';
                                            echo '<td>R$ ' . number_format($p->vltotal, 2, ',', '.') . '</td>';
                                             echo '<td><button  onclick="excluirProdutos(' . $p->idProduto_proposta . ',' . $proposta->idPropostas . ',' . $p->vltotal . ')" class="btn btn-danger"><i class="fa-fw glyphicon glyphicon-trash"></i></button></td>';
                                            echo '</tr>';
                                        }
                                        ?>

                                        <tr>
                                            <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>R$ <?php echo number_format($totalProdutos, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalProdutos, 2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SERVIÇOS -->
            <div class="row">
                <div class="col-md-5">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Adicionar serviços</h3>
                        </div>
                        <div class="box-body">
                            <form id="formServicos" action="<?php echo base_url() ?>index.php/proposta/adicionarServico" method="post">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label>Serviços </label>
<!--                                        <input type="hidden" class="scriptServicos" id="idServicos" name="idServicos" value="1">-->
                                        <input type="hidden" class="form-control" name="idPropostas" id="idPropostas" value="<?php echo $proposta->idPropostas ?>">
                                        <input type="text" class="form-control" id="descricaoServico" name="descricaoServico" required="" >
                                    </div>
                                    <div class="col-md-3">
                                        <label>Valor </label>
                                        <input type="number" class="form-control" id="vlunitarioServico" name="vlunitarioServico" required="">
                                    </div>
                                    <div class="col-md-2">
                                        <label >Qtde</label>
                                        <input type="number" id="quantidadeServico" name="quantidadeServico" class="form-control" required="" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <br>
                                        <button class="btn btn-success span6" id="btnAdicionarServico"><i class="fa fa-plus"></i> Adicionar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Serviços adicionados</h3>
                        </div>
                        <div class="box-body">

                            <div  id="divServicos" class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Produto</th>
                                            <th>Qtde</th>
                                            <th>Unitário</th>
                                            <th>Sub-total</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalServicos = 0;
                                        foreach ($servicos as $s) {

                                            $totalServicos = $totalServicos + $s->vltotal;
                                            echo '<tr>';
                                            echo '<td>' . $s->idServico_proposta . '</td>';
                                            echo '<td>' . $s->servico . '</td>';
                                            echo '<td>' . $s->quantidade . '</td>';
                                            echo '<td>R$ ' . number_format($s->vlunitario, 2, ',', '.') . '</td>';
                                            echo '<td>R$ ' . number_format($s->vltotal, 2, ',', '.') . '</td>';
                                            echo '<td><button  onclick="excluirServicos(' . $s->idServico_proposta . ',' . $proposta->idPropostas . ',' . $s->vltotal . ')" class="btn btn-danger"><i class="fa-fw glyphicon glyphicon-trash"></i></button></td>';
                                            echo '</tr>';
                                        }
                                        ?>

                                        <tr>
                                            <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>R$ <?php echo number_format($totalServicos, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalProdutos, 2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--/.col md-12) -->
    </div>
</form>

</section>
<?php $this->load->view('template/footer'); ?>

<script>
    function excluirProdutos(a, b, c) {
        var idProduto_proposta = a;
        var idProdutos = b;
        var vltotal = c;
        if ((idProduto_proposta % 1) == 0) {
            $("#divProdutos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>index.php/proposta/excluirProduto",
                data: "idProduto_proposta=" + idProduto_proposta + "-" + idProdutos + "-" + vltotal,
                dataType: 'json',
                success: function (data)
                {
                    if (data.result == true) {
                        $("#totalGeral").load("<?php echo current_url(); ?> #totalGeral");
                        $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                        $("#idProdutos").val('').focus();
                    } else {
                        alert('Ocorreu um erro ao tentar excluir o serviço.');
                    }
                }
            });
            return false;
        }
    }
</script>

<script>
    function excluirServicos(a, b, c) {
        var idServico_proposta = a;
        var idServicos = b;
        var vltotal = c;
        if ((idServico_proposta % 1) == 0) {
            $("#divServicos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>index.php/proposta/excluirServico",
                data: "idServico_proposta=" + idServico_proposta + "-" + idServicos + "-" + vltotal,
                dataType: 'json',
                success: function (data)
                {
                    if (data.result == true) {
                        $("#totalGeral").load("<?php echo current_url(); ?> #totalGeral");
                        $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                        $("#idServicos").val('').focus();
                    } else {
                        alert('Ocorreu um erro ao tentar excluir o serviço.');
                    }
                }
            });
            return false;
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#formModulos").validate({
            submitHandler: function (form) {

                var dados = $(form).serialize();
                $("#divModulos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/proposta/adicionarModulosProposta",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divModulos").load("<?php echo current_url(); ?> #divModulos");
                            $("#idModulo").val('');
                            $("#quantidade").val('1');
                            $("#idModulo").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar timeline.');
                        }
                    }
                });
                return false;
            }

        });
        $(document).on('click', 'a', function (event) {
            var idModulo_proposta = $(this).attr('idAcao');
            if ((idModulo_proposta % 1) == 0) {
                $("#divModulos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/proposta/excluirModulo",
                    data: "idModulo_proposta=" + idModulo_proposta,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divModulos").load("<?php echo current_url(); ?> #divModulos");

                        } else {
                            alert('Ocorreu um erro ao tentar excluir timeline.');
                        }
                    }
                });
                return false;
            }

        });

        $("#formProdutos").validate({
            submitHandler: function (form) {

                var dados = $(form).serialize();
                $("#divProdutos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/proposta/adicionarProduto",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#totalGeral").load("<?php echo current_url(); ?> #totalGeral");
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            $("#descricaoProduto").val('');
                            $("#vlunitarioProduto").val('');
                            $("#quantidadeProduto").val(1);
                            $("#descricaoProduto").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar timeline.');
                        }
                    }
                });
                return false;
            }

        });

        $("#formServicos").validate({
            submitHandler: function (form) {

                var dados = $(form).serialize();
                $("#divServicos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/proposta/adicionarServico",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#totalGeral").load("<?php echo current_url(); ?> #totalGeral");
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                            $("#descricaoServico").val('');
                            $("#vlunitarioServico").val('');
                            $("#quantidadeServico").val('1');
                            $("#descricaoServico").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar timeline.');
                        }
                    }
                });
                return false;
            }

        });
    });
</script>

<!--<script>
var BASE_URL = "<?php echo base_url(); ?>";
$(".scriptServicos").select2({
    tags: true, //PODE ESCOLHER O QUE DIGITOU MESMO QUE NAO TENHA NA BUSCA
    //multiple: true, //PODE ESCOLHER MAIS DE UMA OPÇÃO

    //  tokenSeparators: [',', ' '],
    minimumInputLength: 3,
    minimumResultsForSearch: 10,
    ajax: {
        url: BASE_URL + 'index.php/crm/autocompleteServico',
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
                        text: "Código: " + item.idServicos + " - " + item.descricao + " - " + item.valorUnitario,
                        id: item.idServicos
                    };
                })
            };
        }
    }

});
</script> -->

<!--<script> ESSE É O QUE PEGA DADOS DO BANCO E DA PRA ALTERAR VALOR, POREM NAO FICA ALINHADO
    var BASE_URL = "<?php echo base_url(); ?>";
    $(document).ready(function () {

        $("#cliente").autocomplete({
            source: function (request, response) {
                var ele = document.getElementsByName('optionsRadios');

                for (i = 0; i < ele.length; i++) {
                    if (ele[i].checked) {

                        $.ajax({
                            url: BASE_URL + "index.php/os/autocompleteCliente",
                            data: {
                                term: request.term,
                                tipo: ele[i].value
                            },
                            dataType: "json",
                            success: function (data) {

                                var resp = $.map(data.value, function (obj) {
                                    return obj.codigo + " - " + obj.nome + " - " + obj.ender + " - " + obj.cidade;
                                });
                                response(resp);
                            }
                        });
                    }
                }
            },
            minLength: 3,
            delay: 1000
        });
    });
</script>   -->

<!--<script> ESSE É O QUE PEGA RODUTOS DO BANCO, MAS NAO DA PRA MUDAR NADA
    var BASE_URL = "<?php echo base_url(); ?>";
    $(".scriptProdutos").select2({
        //tags: true, //PODE ESCOLHER O QUE DIGITOU MESMO QUE NAO TENHA NA BUSCA
        //multiple: true, //PODE ESCOLHER MAIS DE UMA OPÇÃO

        //  tokenSeparators: [',', ' '],
        minimumInputLength: 3,
        minimumResultsForSearch: 10,
        ajax: {
            url: BASE_URL + 'index.php/crm/autocompleteProduto',
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
                            text: "Código: " + item.idProdutos + " - " + item.descricao + " - " + item.valorUnitario,
                            id: item.idProdutos
                        };
                        $("#formProdutos").load("<?php echo current_url(); ?> #divServicos");
                        $("#quantidade").val('2')
                    })
                };
            }
        }

    });
</script> -->
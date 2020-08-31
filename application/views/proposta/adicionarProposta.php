<?php $this->load->view('template/menu'); ?>
<section class="content">
    <form action="<?php echo base_url() ?>index.php/proposta/add" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações da proposta</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label style="font-size:30px">Proposta #<?php echo "? | " ?></label>
                                    <label style="font-size:30px">Negócio #<?php echo $negocios; ?></label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Prazo de pagamento</label>
                                    <input type="text" class="form-control" name="prazo">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Validade da proposta</label>
                                    <input type="number" class="form-control" name="validade" >
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Previsão de instalação</label>
                                <input type="number" class="form-control" name="previsao">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Observações</label>
                                <textarea name="observacao" class="form-control" rows="4" ></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <a title="cancelar" href="<?php echo base_url() ?>index.php/empresa/gerenciar" class="btn btn-danger btn-small">CANCELAR </a>
                                    <button type="submit" class="btn btn-success"> SALVAR </button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.box-body -->
                </div> <!-- /.box box-info-->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações do cliente</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome da empresa / Razão Social</label>
                                    <input type="text" class="form-control" id="fantasia" readonly="" name="fantasia" >
                                    <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>CNPJ</label>
                                    <input type="text" class="form-control" id="cnpj" readonly="" name="cnpj" >
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Endereço</label>
                                <input type="text" class="form-control" readonly="" id="endereco" name="endereco" >
                            </div>
                            <div class="form-group col-md-2">
                                <label>Cidade</label>
                                <input type="text" class="form-control" readonly="" id="cidade" name="cidade" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5">
                                <label>E-mail</label>
                                <input type="email" class="form-control" readonly="" id="email" name="email" >
                            </div>
                            <div class="form-group col-md-3">
                                <label>Contato</label>
                                <input type="text" class="form-control" readonly="" id="contato" name="contato" >
                            </div>
                            <div class="form-group col-md-2">
                                <label>Telefone</label>
                                <input type="tel" class="form-control" readonly="" id="telefone" name="telefone"  maxlength="15" name="phone">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Whatsapp</label>
                                <input type="tel" class="form-control" readonly="" id="whatsapp" name="whatsapp"  maxlength="15" name="phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Adicionar produtos</h3>
                    </div>
                    <div class="box-body">
                        <form id="formProdutos" action="<?php echo base_url() ?>index.php/proposta/adicionarProduto" method="post">
                            <div class="col-md-9">
                                <label>Produtos </label>
                                <select class="scriptEmpresas" id="nomeEmpresa" name="nomeEmpresa" style="width: 100%">></select>
                                <input type="hidden" class="form-control" name="usuario" value="<?php echo $dadoslogin['idusuarios'] ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="">Quantidade</label>
                                <input type="number" id="quantidade" name="quantidade" class="form-control" value="1" />
                            </div>
                            <div class="col-md-1">
                                <br>
                                <button class="btn btn-success span6" id="btnAdicionarProduto"><i class="fa fa-plus"></i></button>
                            </div>
                        </form>

                        <div  id="divProdutos" class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
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
                                        echo '<td>' . $p->codigo . '</td>';
                                        echo '<td>' . $p->produto . '</td>';
                                        echo '<td>' . $p->quantidade . '</td>';
                                        echo '<td>R$ ' . number_format($p->vlunitario, 2, ',', '.') . '</td>';
                                        echo '<td>R$ ' . number_format($p->vltotal, 2, ',', '.') . '</td>';
                                        echo '<td><a href="" vltotal="' . $p->vltotal . '" idCrm="' . $result->numpropostas . '" idAcao="' . $p->idProduto_proposta . '"  class="btn btn-danger">Excluir<i class="icon-remove icon-white"></i></a></td>';
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
            </div> <!--/.col md-12) -->
        </div>
    </form>

</section>
<?php $this->load->view('proposta/script'); ?>
<?php $this->load->view('template/footer'); ?>
<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    $(".scriptEmpresas").select2({
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
                    })
                };
            }
        }

    });
</script> 
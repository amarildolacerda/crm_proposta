<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Propostas
        <small>Editar propostas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Gerenciar propostas</li>
        <li class="active"> Editar propostas</li>
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
                <!-- Custom Tabs (Pulled to the right) -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1-1" data-toggle="tab">Cliente / proposta</a></li>
                        <li><a href="#tab_2-2" data-toggle="tab">Produtos</a></li>
                        <li><a href="#tab_3-2" data-toggle="tab">Serviços</a></li>
                        <li><a href="#tab_4-2" data-toggle="tab">Módulos</a></li>
                        <li class="btn-small btn-warning btn-small"><a title="imprimir" href="<?php echo base_url() . 'index.php/proposta/imprimir/' . $result->numpropostas ?>" >Imprimir <i class="fa-fw glyphicon glyphicon-print"></i> </a></li>

                        <li class="pull-right header"><i class="fa fa-th"></i> Selecione as abas desejadas</li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1-1">
                            <?php
 $variavelphp = "<script>document.write(variaveljs)</script>";
 echo $variavelphp;
 echo "teste";
?>
                            <form action="<?php echo current_url(); ?>" method="post">
                                <div class="box box-success" >
                                    <div class="box-header with-border">
                                        <div class="col-md-6">
                                            <div class="info-box-text bg-green">
                                                <h3 class="box-title">Faturamento direto?&nbsp;&nbsp;&nbsp;</h3>
                                                <label class="radio-inline"><input type="radio" name="fatdireto" id="fatdireto" value="1" <?php
                                                    if ($result->fatdireto == 1) {
                                                        echo "checked";
                                                    }
                                                    ?>>SIM
                                                </label>
                                                <label class="radio-inline"><input type="radio" name="fatdireto" id="fatdireto" value="0" <?php
                                                    if ($result->fatdireto == 0) {
                                                        echo "checked";
                                                    }
                                                    ?>>NÃO
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="status" class="form-control">
                                                <option value="1"<?php
                                                if ($result->status == 1) {
                                                    echo "selected";
                                                }
                                                ?>>Aguardando Aprovação
                                                </option>
                                                <option value="2" <?php
                                                if ($result->status == 2) {
                                                    echo "selected";
                                                }
                                                ?>>Fechado Ganho
                                                </option>
                                                <option value="3" <?php
                                                if ($result->status == 3) {
                                                    echo "selected";
                                                }
                                                ?>>Fechado Perdido
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CNPJ</label>
                                                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Ex.: 11.111.111/0001-01" onblur="loginPesquisaCliente()" value="<?php echo $result->cnpj; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_hidden('numpropostas', $result->numpropostas) ?>
                                                <label>Nome Fantasia</label>
                                                <input type="text" class="form-control" id="fantasia" name="fantasia" readonly="" placeholder="Ex.: Empresa X" value="<?php echo $result->fantasia; ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Endereço</label>
                                            <input type="text" class="form-control" id="endereco" name="endereco" readonly="" placeholder="Ex.: Rua Euclides da cunha,198" value="<?php echo $result->endereco; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Cidade</label>
                                            <input type="text" class="form-control" id="cidade" name="cidade" readonly="" placeholder="Ex.: Santos" value="<?php echo $result->cidade; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <select class="form-control" name="estado">
                                                    <option <?php
                                                    if ($result->estado == 'AC') {
                                                        echo "selected";
                                                    }
                                                    ?>>AC</option>
                                                    <option <?php
                                                    if ($result->estado == 'AL') {
                                                        echo "selected";
                                                    }
                                                    ?>>AL</option>
                                                    <option <?php
                                                    if ($result->estado == 'AP') {
                                                        echo "selected";
                                                    }
                                                    ?>>AP</option>
                                                    <option <?php
                                                    if ($result->estado == 'AM') {
                                                        echo "selected";
                                                    }
                                                    ?>>AM</option>
                                                    <option <?php
                                                    if ($result->estado == 'BA') {
                                                        echo "selected";
                                                    }
                                                    ?>>BA</option>
                                                    <option <?php
                                                    if ($result->estado == 'CE') {
                                                        echo "selected";
                                                    }
                                                    ?>>CE</option>
                                                    <option <?php
                                                    if ($result->estado == 'DF') {
                                                        echo "selected";
                                                    }
                                                    ?>>DF</option>
                                                    <option <?php
                                                    if ($result->estado == 'ES') {
                                                        echo "selected";
                                                    }
                                                    ?>>ES</option>
                                                    <option <?php
                                                    if ($result->estado == 'GO') {
                                                        echo "selected";
                                                    }
                                                    ?>>GO</option>
                                                    <option <?php
                                                    if ($result->estado == 'MA') {
                                                        echo "selected";
                                                    }
                                                    ?>>MA</option>
                                                    <option <?php
                                                    if ($result->estado == 'MT') {
                                                        echo "selected";
                                                    }
                                                    ?>>MT</option>
                                                    <option <?php
                                                    if ($result->estado == 'MS') {
                                                        echo "selected";
                                                    }
                                                    ?>>MS</option>
                                                    <option <?php
                                                    if ($result->estado == 'MG') {
                                                        echo "selected";
                                                    }
                                                    ?>>MG</option>
                                                    <option <?php
                                                    if ($result->estado == 'PA') {
                                                        echo "selected";
                                                    }
                                                    ?>>PA</option>
                                                    <option <?php
                                                    if ($result->estado == 'PB') {
                                                        echo "selected";
                                                    }
                                                    ?>>PB</option>
                                                    <option <?php
                                                    if ($result->estado == 'PR') {
                                                        echo "selected";
                                                    }
                                                    ?>>PR</option>
                                                    <option <?php
                                                    if ($result->estado == 'PE') {
                                                        echo "selected";
                                                    }
                                                    ?>>PE</option>
                                                    <option <?php
                                                    if ($result->estado == 'PI') {
                                                        echo "selected";
                                                    }
                                                    ?>>PI</option>
                                                    <option <?php
                                                    if ($result->estado == 'RJ') {
                                                        echo "selected";
                                                    }
                                                    ?>>RJ</option>
                                                    <option <?php
                                                    if ($result->estado == 'RN') {
                                                        echo "selected";
                                                    }
                                                    ?>>RN</option>
                                                    <option <?php
                                                    if ($result->estado == 'RS') {
                                                        echo "selected";
                                                    }
                                                    ?>>RS</option>
                                                    <option <?php
                                                    if ($result->estado == 'RO') {
                                                        echo "selected";
                                                    }
                                                    ?>>RO</option>
                                                    <option <?php
                                                    if ($result->estado == 'RR') {
                                                        echo "selected";
                                                    }
                                                    ?>>RR</option>
                                                    <option <?php
                                                    if ($result->estado == 'SC') {
                                                        echo "selected";
                                                    }
                                                    ?>>SC</option>
                                                    <option <?php
                                                    if ($result->estado == 'SP') {
                                                        echo "selected";
                                                    }
                                                    ?>>SP</option>
                                                    <option <?php
                                                    if ($result->estado == 'SE') {
                                                        echo "selected";
                                                    }
                                                    ?>>SE</option>
                                                    <option <?php
                                                    if ($result->estado == 'TO') {
                                                        echo "selected";
                                                    }
                                                    ?>>TO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Ex.: email@dominio.com.br" value="<?php echo $result->email; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Contato</label>
                                            <input type="text" class="form-control" id="contato" name="contato" placeholder="Ex.: Sr. João" value="<?php echo $result->contato; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Telefone</label>
                                            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Ex.: (13)XXXX-XXXX" maxlength="15" name="phone" value="<?php echo $result->telefone; ?>">
                                        </div>
                                    </div> <!-- /.box-body -->
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Informações da Proposta</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Prazo de pagamento</label>
                                                    <input type="text" class="form-control" name="prazo" value="<?php echo $result->prazopagamento; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Validade da proposta</label>
                                                    <input type="number" class="form-control" name="validade" value="<?php echo $result->validade; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Previsão de instalação</label>
                                                <input type="number" class="form-control" name="previsao" value="<?php echo $result->previsaoinst; ?>">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Observações</label>
                                                <textarea name="observacao" class="form-control" rows="4" ><?php echo $result->observacao; ?></textarea>
                                            </div>
                                            <div  class="col-md-3">
                                            </div>
                                            <div  class="col-md-3">
                                                <button class="btn btn-block btn-success">Alterar proposta<i class="fa-fw glyphicon glyphicon-ok"></i></button>
                                            </div>
                                            <div  class="col-md-3">
                                                <a href="<?php echo base_url() ?>index.php/proposta/gerenciar" class="btn btn-block btn-danger"> Voltar<i class="fa-fw glyphicon glyphicon-remove"></i></a>
                                            </div>
                                        </div> <!-- /.box-body -->
                                    </div> <!-- /.box box-info-->
                                </div> <!-- /.box box-info-->
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="tab_2-2">

                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Insira os produtos na sua proposta</h3>
                                </div>
                                <div class="box-body">

                                    <form id="formProdutos" action="<?php echo base_url() ?>proposta/adicionarProduto" method="post">
                                        <div class="col-md-2">
                                            <label for="">Codigo</label>
                                            <input type="text" class="form-control" maxlength="48" name="codigo" id="codigo"  onblur="loginPesquisaProduto()" placeholder="Ex.: 125">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" name="numpropostas" id="idOsProduto" value="<?php echo $result->numpropostas ?>" />
                                            <label for="">Produto</label>
                                            <input type="text" name="produto" id="produto" class="form-control" placeholder="Digite o produto">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Quantidade</label>
                                            <input type="number" placeholder="Quantidade" id="quantidade" name="quantidade" class="form-control" />
                                        </div>
                                        <div class="col-md-2">
                                            <label>Unitario</label>
                                            <input type="number" min="0" step=0.01 class="form-control" name="vlunitario" id="vlunitario" placeholder="Ex.: 1300,00">
                                        </div>
                                        <div class="col-md-2">
                                            <br>
                                            <button class="btn btn-success span6" id="btnAdicionarProduto"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-warning span6" data-toggle="modal" data-target="#modal-produtos"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Produtos adicionados à proposta</h3>
                                </div>
                                <!-- /.box-header -->
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
                                            $total = 0;
                                            foreach ($produtos as $p) {

                                                $total = $total + $p->vltotal;
                                                echo '<tr>';
                                                echo '<td>' . $p->codigo . '</td>';
                                                echo '<td>' . $p->produto . '</td>';
                                                echo '<td>' . $p->quantidade . '</td>';
                                                echo '<td>R$ ' . number_format($p->vlunitario, 2, ',', '.') . '</td>';
                                                echo '<td>R$ ' . number_format($p->vltotal, 2, ',', '.') . '</td>';
                                                echo '<td><a href="" idAcao="' . $p->idProduto_proposta . '"  class="btn btn-danger">Excluir<i class="icon-remove icon-white"></i></a></td>';
                                                echo '</tr>';
                                            }
                                            ?>

                                            <tr>
                                                <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                                <td><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>"></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.tab-pane -->

                        <div class="modal modal-warning fade" id="modal-produtos" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Pesquisar produto</h4>
                                    </div>


                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form id="formProdutos" action="<?php echo base_url() ?>proposta/adicionarProduto" method="post">
                                                    <div class="col-md-11">
                                                        <label for="">Digite o nome do produto</label>
                                                        <input type="text" name="produtopesq" id="produtopesq" class="form-control" placeholder="Digite o produto">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label for="">.</label>
                                                        <button type="button" class="btn btn-default" onclick="pesquisaProdutoNome()" ><i class="fa fa-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div  id="divProdutosPesquisa" class="box-body table-responsive no-padding">
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
                                                   
                                                <div class="col-md-11">
                                                    <label for="">Nome do produto</label>
                                                    <input type="text" name="nomeprod" id="nomeprod" class="form-control" placeholder="Digite o produto">
                                                </div>
                                                <div class="col-md-11">
                                                    <label for="">Codigo produto</label>
                                                    <input type="text" name="codprod" id="codprod" class="form-control" placeholder="Digite o produto">
                                                </div>
                                                <div class="col-md-11">
                                                    <label for="">Valor</label>
                                                    <input type="text" name="vlunitariomodal" id="vlunitariomodal" class="form-control" placeholder="Digite o produto">
                                                </div>
                                                
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                        <button id="btAtualizarValor" type="button" class="btn btn-primary" data-dismiss="modal">Atualizar</button>
                                    </div>

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog -->





                        <!-- ABA DE SERVIÇOS -->

                        <div class="tab-pane" id="tab_3-2">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Insira os serviços na sua proposta</h3>
                                </div>
                                <div class="box-body">
                                    <form id="formServicos" action="<?php echo base_url() ?>proposta/adicionarServico" method="post">
                                        <div class="col-md-7">
                                            <input type="hidden" name="numpropostas" id="idOsServico" value="<?php echo $result->numpropostas ?>" />
                                            <label for="">Serviço</label>
                                            <input type="text" name="servico" id="servico" class="form-control" placeholder="Digite o serviço">
                                        </div>
                                        <div class="col-md-2">
                                            <label >Quantidade</label>
                                            <input type="number" placeholder="Quantidade" id="quantidadeserv" name="quantidadeserv" class="form-control" />
                                        </div>
                                        <div class="col-md-2">
                                            <label>Unitario</label>
                                            <input type="number" min="0" step=0.01 class="form-control" name="vlunitarioserv" id="vlunitarioserv" placeholder="Ex.: 1300,00">
                                        </div>
                                        <div class="col-md-1">
                                            <label >.</label>
                                            <button class="btn btn-success span12" id="btnAdicionarServico"><i class="icon-white icon-plus"></i> Adicionar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Serviços adicionados à proposta</h3>
                                </div>
                                <!-- /.box-header -->
                                <div  id="divServicos" class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Serviço</th>
                                                <th>Quantidade</th>
                                                <th>Unitário</th>
                                                <th>Sub-total</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($servicos as $p) {

                                                $total = $total + $p->vltotal;
                                                echo '<tr>';
                                                echo '<td>' . $p->servico . '</td>';
                                                echo '<td>' . $p->quantidade . '</td>';
                                                echo '<td>R$ ' . number_format($p->vlunitario, 2, ',', '.') . '</td>';
                                                echo '<td>R$ ' . number_format($p->vltotal, 2, ',', '.') . '</td>';
                                                echo '<td><span href="" idAcao="' . $p->idServico_proposta . '"  class="btn btn-danger">Excluir<i class="icon-remove icon-white"></i></span></td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                                <td><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>"></strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.tab-pane -->
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_4-2">
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Insira o valor da mensalidade</h3>
                                </div>
                                <div class="box-body">
                                    <form id="formMensalidade" action="<?php echo base_url() ?>proposta/adicionarMensalidade" method="post">
                                        <div class="col-md-4">
                                            <input type="hidden" name="numpropostas" value="<?php echo $result->numpropostas ?>" />
                                            <label for="">Valor da mensalidade</label>
                                            <input type="text" name="totalmensalidade" id="totalmensalidade" class="form-control" placeholder="Digite o valor da mensalidade">
                                        </div>
                                        <div class="col-md-2">
                                            <label >.</label><br>
                                            <button class="btn btn-success span12" id="btnAdicionarMensalidade"><i class="icon-white icon-plus"></i> Adicionar/alterar</button>
                                        </div>
                                    </form>
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            Valor de mensalidade adicionado à proposta
                                        </label>
                                        <div id="divMensalidade" class="small-box bg-blue-active">
                                            <div class="inner">
                                                <h3><?php echo number_format($result->totalmensalidade, 2, ',', '.') ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Insira os módulos na sua proposta</h3>
                                </div>
                                <div class="box-body">
                                    <form id="formModulos" action="<?php echo base_url() ?>proposta/adicionarModulo" method="post">
                                        <div class="col-md-7">
                                            <input type="hidden" name="numpropostas" value="<?php echo $result->numpropostas ?>" />
                                            <!-- <label for="">Módulo</label>
                                             <input type="text" name="modulo" id="modulo" class="form-control" placeholder="Digite o serviço">-->
                                            <div class="form-group">
                                                <label>Módulos</label>
                                                <select name="modulo" id="modulo" class="form-control">
                                                    <option></option>
                                                    <option>Supervisor</option>
                                                    <option>Pedido</option>
                                                    <option>PDV</option>
                                                    <option>Estoque</option>
                                                    <option>Financeiro</option>
                                                    <option>NF-e</option>
                                                    <option>Vendas</option>
                                                    <option>PDVSync</option>
                                                    <option>Comanda Cel/tablet</option>
                                                    <option>Comanda</option>
                                                    <option>Store Pet</option>
                                                    <option>Cobrebem</option>
                                                    <option>Estação Storeware</option>
                                                    <option>Busca preço</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label >Quantidade</label>
                                            <input type="number" placeholder="Quantidade" id="quantidademod" name="quantidademod" class="form-control" />
                                        </div>
                                        <div class="col-md-1">
                                            <label >.</label>
                                            <button class="btn btn-success span12" id="btnAdicionarModulo"><i class="icon-white icon-plus"></i> Adicionar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Módulos adicionados à proposta</h3>
                                </div>
                                <!-- /.box-header -->
                                <div  id="divModulos" class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Módulo</th>
                                                <th>Quantidade</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            foreach ($modulos as $p) {

                                                //$total = $total + $p->vltotal;
                                                echo '<tr>';
                                                echo '<td>' . $p->modulo . '</td>';
                                                echo '<td>' . $p->quantidade . '</td>';
                                                //echo '<td>R$ ' . number_format($p->vlunitario, 2, ',', '.') . '</td>';
                                                // echo '<td>R$ ' . number_format($p->vltotal, 2, ',', '.') . '</td>';
                                                echo '<td><button href="" idAcao="' . $p->idModulo_proposta . '"  class="btn btn-danger">Excluir<i class="icon-remove icon-white"></i></button></td>';
                                                echo '</tr>';
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>
        <!-- /.row -->
    </form>

</section>
<?php $this->load->view('proposta/script'); ?>
<?php $this->load->view('template/footer'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $("#btAtualizarValor").click(function () {
                $("#codigo").val($("#codprod").val());
                $("#produto").val($("#nomeprod").val());
                $("#quantidade").val('1');
                $("#vlunitario").val($("#vlunitariomodal").val());


            });
        });

        $("#formProdutos").validate({
            rules: {
                codigo: {required: true},
                vlunitario: {required: true},
                quantidade: {required: true}
            },
            messages: {
                codigo: {required: 'Insira o codigo'},
                vlunitario: {required: 'Verifique se o produto/preço estão digitados corretamente'},
                quantidade: {required: 'Digite a quantidade'}
            },
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
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            $("#codigo").val('');
                            $("#produto").val('');
                            $("#quantidade").val('');
                            $("#vlunitario").val('');
                            $("#codigo").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;


            }

        });


        $(document).on('click', 'a', function (event) {
            var idProduto_proposta = $(this).attr('idAcao');

            if ((idProduto_proposta % 1) == 0) {
                $("#divProdutos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/proposta/excluirProduto",
                    data: "idProduto_proposta=" + idProduto_proposta,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");

                        } else {
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });

        $("#formServicos").validate({
            rules: {
                servico: {required: true},
                quantidadeserv: {required: true},
                vlunitarioserv: {required: true}
            },
            messages: {
                servico: {required: 'Insira o nome do serviço'},
                quantidadeserv: {required: 'Digite a quantidade'},
                vlunitarioserv: {required: 'Digite o valor unitário'}
            },
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
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                            $("#servico").val('');
                            $("#quantidadeserv").val('');
                            $("#vlunitarioserv").val('');
                            $("#servico").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;
            }
        });

        $(document).on('click', 'span', function (event) {
            var idServico_proposta = $(this).attr('idAcao');

            if ((idServico_proposta % 1) == 0) {
                $("#divServicos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/proposta/excluirServico",
                    data: "idServico_proposta=" + idServico_proposta,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");

                        } else {
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });

        $("#formModulos").validate({
            rules: {
                modulo: {required: true},
                quantidademod: {required: true}
            },
            messages: {
                modulo: {required: 'Selecione o módulo'},
                quantidademod: {required: 'Digite a quantidade'}
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $("#divModulos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/proposta/adicionarModulo",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divModulos").load("<?php echo current_url(); ?> #divModulos");
                            $("#modulo").val('');
                            $("#quantidademod").val('');
                            $("#modulo").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;
            }
        });

        $(document).on('click', 'button', function (event) {
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
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });


        $("#formMensalidade").validate({
            rules: {
                totalmensalidade: {required: true},
            },
            messages: {
                totalmensalidade: {required: 'Selecione o módulo'},
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $("#divMensalidade").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/proposta/adicionarMensalidade",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divMensalidade").load("<?php echo current_url(); ?> #divMensalidade");
                            $("#totalmensalidade").val('');
                            $("#totalmensalidade").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;
            }
        });


        $(".datepicker").datepicker({dateFormat: 'dd/mm/yy'});




    });

</script>
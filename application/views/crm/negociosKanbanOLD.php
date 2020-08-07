<?php $this->load->view('template/menu'); ?>
<div class="row">
    <a href="<?php echo base_url(); ?>index.php/crm/negociosLista" class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: green">Mostrar em lista <i class="glyphicon glyphicon-list"></i></a>   
</div>
<div class="col-md-12">
    <div class="col-md-2">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="box-title">Oportunidade</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <small>R$500,00 - <?php echo $countOportunidade; ?> negócios</small>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                                                                <!--                                <a  class="btn btn-light btn-sm col-sm-12" data-toggle="modal" data-target="#modal-adicionar-negociacao" style="font-size:20px; color: gray"><i class="glyphicon glyphicon-plus-sign"></i></a>-->
        <!--                                <a href="<?php echo base_url(); ?>index.php/crm/add" class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: gray"><i class="glyphicon glyphicon-plus-sign"></i></a>                        -->

                            <a title="excluir"  class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: gray" data-toggle="modal" data-target="#modal-danger"><i class="glyphicon glyphicon-plus-sign"></i> </a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="box-body overflow-auto">
                <?php foreach ($oportunidade as $opt) { ?>

                    <a data-toggle="tooltip" data-placement="top" title="<?php
                    foreach ($oportunidadeNegocios as $optNegocios) {
                        if ($opt->idcrm === $optNegocios->idLead_proposta) {
                            echo "Produtos: R$" . $optNegocios->totalequip . ",00 " . "Serviços: R$" . $optNegocios->totalservico . ",00 " . "Mensalidade: R$" . $optNegocios->totalmensalidade . ",00";
                        }
                    }
                    ?>" href="<?php echo base_url(); ?>index.php/crm/editNegocios/<?php echo $opt->idcrm; ?>">  
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="small-box bg-gray" >
                                    <div class="inner">
                                        <?php echo $opt->nome; ?><br>
                                        <small><?php echo $opt->empresa; ?></small><br>
                                        <i class="fa fa-dollar"></i><?php
                                        foreach ($oportunidadeNegocios as $optNegocios) {
                                            if ($opt->idcrm === $optNegocios->idLead_proposta) {
                                                echo number_format($optNegocios->totalequip + $optNegocios->totalservico, 2, ',', '.');
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 style="color: blue" class="box-title">Demo agendada</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <small style="color: blue">R$500,00 - <?php echo $countDemoagendada; ?> negócios</small>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                            <a  class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: #0066cc" data-toggle="modal" data-target="#modal-danger"><i class="glyphicon glyphicon-plus-sign"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="box-body overflow-auto">
                <?php foreach ($demoagendada as $demo) { ?>
                    <a data-toggle="tooltip" data-placement="top" title="<?php
                    foreach ($demoagendadaNegocios as $demoNegocios) {
                        if ($demo->idcrm === $demoNegocios->idLead_proposta) {
                            echo "Produtos: R$" . $demoNegocios->totalequip . ",00 " . "Serviços: R$" . $demoNegocios->totalservico . ",00 " . "Mensalidade: R$" . $demoNegocios->totalmensalidade . ",00";
                        }
                    }
                    ?>" href="<?php echo base_url(); ?>index.php/crm/editNegocios/<?php echo $demo->idcrm; ?>">  
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="small-box bg-primary" >
                                    <div class="inner">
                                        <?php echo $demo->nome; ?><br>
                                        <small><?php echo $demo->empresa; ?></small><br>
                                        <i class="fa fa-dollar"></i><?php
                                        foreach ($demoagendadaNegocios as $demoNegocios) {
                                            if ($demo->idcrm === $demoNegocios->idLead_proposta) {
                                                echo number_format($demoNegocios->totalequip + $demoNegocios->totalservico, 2, ',', '.');
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="box box-default">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 style="color: purple" class="box-title">Proposta entregue</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <small style="color: purple">R$500,00 - <?php echo $countPropostaentregue; ?> negócios</small>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                            <a class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: purple" data-toggle="modal" data-target="#modal-danger"><i class="glyphicon glyphicon-plus-sign"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="box-body overflow-auto">
                <?php foreach ($propostaentregue as $entregue) { ?>
                    <a data-toggle="tooltip" data-placement="top" title="<?php
                    foreach ($propostaentregueNegocios as $entregueNegocios) {
                        if ($entregue->idcrm === $entregueNegocios->idLead_proposta) {
                            echo "Produtos: R$" . $entregueNegocios->totalequip . ",00 " . "Serviços: R$" . $entregueNegocios->totalservico . ",00 " . "Mensalidade: R$" . $entregueNegocios->totalmensalidade . ",00";
                        }
                    }
                    ?>"  href="<?php echo base_url(); ?>index.php/crm/editNegocios/<?php echo $entregue->idcrm; ?>">  
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="small-box bg-purple" >
                                    <div class="inner">
                                        <?php echo $entregue->nome; ?><br>
                                        <small><?php echo $entregue->empresa; ?></small><br>
                                        <i class="fa fa-dollar"></i><?php
                                        foreach ($propostaentregueNegocios as $entregueNegocios) {
                                            if ($entregue->idcrm === $entregueNegocios->idLead_proposta) {
                                                echo number_format($entregueNegocios->totalequip + $entregueNegocios->totalservico, 2, ',', '.');
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="box box-warning">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 style="color: orange" class="box-title">Em negociação</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <small style="color: orange">R$500,00 - <?php echo $countEmnegociacao; ?> negócios</small>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                            <a class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: orange" data-toggle="modal" data-target="#modal-danger"><i class="glyphicon glyphicon-plus-sign"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="box-body overflow-auto">
                <?php foreach ($emnegociacao as $negociacao) { ?>
                    <a data-toggle="tooltip" data-placement="top" title="<?php
                    foreach ($emnegociacaoNegocios as $negociacaoNegocios) {
                        if ($negociacao->idcrm === $negociacaoNegocios->idLead_proposta) {
                            echo "Produtos: R$" . $negociacaoNegocios->totalequip . ",00 " . "Serviços: R$" . $negociacaoNegocios->totalservico . ",00 " . "Mensalidade: R$" . $negociacaoNegocios->totalmensalidade . ",00";
                        }
                    }
                    ?>"   href="<?php echo base_url(); ?>index.php/crm/editNegocios/<?php echo $negociacao->idcrm; ?>">  
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="small-box bg-yellow" >
                                    <div class="inner">
                                        <?php echo $negociacao->nome; ?><br>
                                        <small><?php echo $negociacao->empresa; ?></small><br>
                                        <i class="fa fa-dollar"></i><?php
                                        foreach ($emnegociacaoNegocios as $negociacaoNegocios) {
                                            if ($negociacao->idcrm === $negociacaoNegocios->idLead_proposta) {
                                                echo number_format($negociacaoNegocios->totalequip + $negociacaoNegocios->totalservico, 2, ',', '.');
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="box box-success">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 style="color: green" class="box-title">Ganho</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <small style="color: green">R$500,00</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <small style="color: green">Últ. 7 negócios ganhos / <?php echo "Total: " . $countGanho; ?></small>
                    </div>
                </div>
            </div>
            <div class="box-body overflow-auto">
                <?php foreach ($ganho as $gain) { ?>
                    <a data-toggle="tooltip" data-placement="top" title="<?php
                    foreach ($ganhoNegocios as $gainNegocios) {
                        if ($gain->idcrm === $gainNegocios->idLead_proposta) {
                            echo "Produtos: R$" . $gainNegocios->totalequip . ",00 " . "Serviços: R$" . $gainNegocios->totalservico . ",00 " . "Mensalidade: R$" . $gainNegocios->totalmensalidade . ",00";
                        }
                    }
                    ?>"   href="<?php echo base_url(); ?>index.php/crm/viewNegocios/<?php echo $gain->idcrm; ?>">  
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="small-box bg-green" >
                                    <div class="inner">
                                        <?php echo $gain->nome; ?><br>
                                        <small><?php echo $gain->empresa; ?></small><br>
                                        <i class="fa fa-dollar"></i><?php
                                        foreach ($ganhoNegocios as $gainNegocios) {
                                            if ($gain->idcrm === $gainNegocios->idLead_proposta) {
                                                echo number_format($gainNegocios->totalequip + $gainNegocios->totalservico, 2, ',', '.');
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="box box-danger" >
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 style="color: red" class="box-title">Perdido</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <small style="color: red">R$500,00</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <small style="color: red">Últ. 7 negócios perdidos / <?php echo "Total: " . $countPerdido; ?></small>
                    </div>
                </div>
            </div>
            <div class="box-body overflow-auto">
                <?php foreach ($perdido as $perd) { ?>
                    <a data-toggle="tooltip" data-placement="top" title="<?php
                    foreach ($perdidoNegocios as $perdNegocios) {
                        if ($perd->idcrm === $perdNegocios->idLead_proposta) {
                            echo "Produtos: R$" . $perdNegocios->totalequip . ",00 " . "Serviços: R$" . $perdNegocios->totalservico . ",00 " . "Mensalidade: R$" . $perdNegocios->totalmensalidade . ",00";
                        }
                    }
                    ?>"   href="<?php echo base_url(); ?>index.php/crm/viewNegocios/<?php echo $perd->idcrm; ?>">  
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="small-box bg-red" >
                                    <div class="inner">
                                        <?php echo $perd->nome; ?><br>
                                        <small><?php echo $perd->empresa; ?></small><br>
                                        <i class="fa fa-dollar"></i><?php
                                        foreach ($perdidoNegocios as $perdNegocios) {
                                            if ($perd->idcrm === $perdNegocios->idLead_proposta) {
                                                echo number_format($perdNegocios->totalequip + $perdNegocios->totalservico, 2, ',', '.');
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--MODAL BOTÃO EXCLUIR-->
    <div class="modal modal-default fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Negócio rápido</h4>
                </div>
                <form action="<?php echo base_url() ?>index.php/crm/addNegocios" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Empresa </label>
                            <select class="scriptEmpresas" name="nomeEmpresa" required="" style="width: 100%"></select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome do negócio </label>
                            <input type="text" class="form-control" name="nomeDoNegocio" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome do contato</label>
                            <input type="text" class="form-control" name="nomeContato" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Valor do negócio </label>
                            <input type="number" class="form-control" name="valorDoNegocio" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Data fechamento esperada </label>
                            <input type="date" class="form-control" name="dataFechamentoEsperada" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Fase do fúnil</label>
                            <select class="form-control" name="faseDoFunil" >
                                <?php
                                foreach ($status as $value) {
                                    ?>
                                    <option value = <?php echo $value->idstatus; ?>> <?php echo $value->descricao; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                        <button type="submit" class="btn btn-success ">Salvar<i class="icon-remove icon-white"></i></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!--MODAL BOTÃO EXCLUIR-->
</div>
<?php $this->load->view('template/footer'); ?>
<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    $(".scriptEmpresas").select2({
        tags: true, //PODE ESCOLHER O QUE DIGITOU MESMO QUE NAO TENHA NA BUSCA
        //multiple: true, //PODE ESCOLHER MAIS DE UMA OPÇÃO

        //  tokenSeparators: [',', ' '],
        minimumInputLength: 3,
        minimumResultsForSearch: 2,
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
                            text: item.idEmpresas + "-" + item.nomeEmpresa,
                            id: item.idEmpresas
                        };
                    })
                };
            }
        }

    });

</script>  
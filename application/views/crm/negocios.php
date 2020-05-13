<?php $this->load->view('template/menu'); ?>
<div class="container-fluid">
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
                            <small>R$500,00 - 1 negócio</small>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
        <!--                                <a  class="btn btn-light btn-sm col-sm-12" data-toggle="modal" data-target="#modal-adicionar-negociacao" style="font-size:20px; color: gray"><i class="glyphicon glyphicon-plus-sign"></i></a>-->
                                <a href="<?php echo base_url(); ?>index.php/crm/add" class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: gray"><i class="glyphicon glyphicon-plus-sign"></i></a>                        
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--                <div class="modal modal-default fade" id="modal-adicionar-negociacao" style="display: none;">
                                    <div class="modal-dialog" >
                                        <div class="modal-content" style="background-color: #F3F3F3">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title text-center">Adicione um negócio</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row" style="background-color: #FFFFFF" >
                                                    <div class="col-md-6" >
                                                        <div class="form-group">
                                                            <label>Nome da empresa </label>
                                                            <input type="text" class="form-control" name="nomeEmpresa">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="background-color: #F3F3F3" >
                                                        <div class="form-group">
                                                            <label>Nome da empresa </label>
                                                            <input type="text" class="form-control" name="nomeEmpresa">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-6" style="background-color: #FFFFFF">
                                                        <div class="form-group">
                                                            <label>Nome do contato </label>
                                                            <input type="text" class="form-control" name="nomeContato" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-6" style="background-color: #FFFFFF">
                                                        <div class="form-group">
                                                            <label>Título do negócio </label>
                                                            <input type="text" class="form-control" name="tituloNegocio" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-6" style="background-color: #FFFFFF">
                                                        <div class="form-group">
                                                            <label>Probabilidade de fechamento</label>
                                                            <select class="form-control" name="probabilidade">
                                                                <option value="10">0%</option>
                                                                <option value="20">20%</option>
                                                                <option value="40">40%</option>
                                                                <option value="60">60%</option>
                                                                <option value="80">80%</option>
                                                                <option value="100">100%</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" style="background-color: #FFFFFF">
                                                        <div class="form-group">
                                                            <label>data de fechamento esperada </label>
                                                            <input type="date" class="form-control" name="dataFechamentoEsperada" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="background-color: #F3F3F3">
                                                        <div class="form-group">
                                                            <label></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success">Salvar</button>
                                            </div>
                                        </div>  /.modal-content 
                                    </div> /.modal-dialog 
                                </div>-->
                <div class="box-body overflow-auto">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-gray" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="box-title">Demo agendada</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <small>R$500,00 - 1 negócio</small>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                                <a href="<?php echo base_url(); ?>index.php/crm/add" class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: #0066cc"><i class="glyphicon glyphicon-plus-sign"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-primary" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-primary" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="box-title">Proposta entregue</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <small>R$500,00 - 1 negócio</small>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                                <a href="<?php echo base_url(); ?>index.php/crm/add" class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: purple"><i class="glyphicon glyphicon-plus-sign"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-purple" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-purple" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="box-title">Em negociação</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <small>R$500,00 - 1 negócio</small>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                                <a href="<?php echo base_url(); ?>index.php/crm/add" class="btn btn-light btn-sm col-sm-12" style="font-size:20px; color: orange"><i class="glyphicon glyphicon-plus-sign"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-yellow" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ganho</h3><br>
                    <small>R$500,00 - 1 negócio</small>
                </div>
                <div class="box-body">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-green" >
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box box-danger" >
                <div class="box-header with-border">
                    <h3 class="box-title">Perdido</h3><br>
                    <small>R$500,00 - 1 negócio</small>
                </div>
                <div class="box-body">
                    <div class="row ">
                        <div class="col-sm-12">
                            <a title="editar" href="<?php echo base_url() ?>index.php/crm/edit/7261">
                                <div class="small-box bg-red  col-sm-11">
                                    <div class="inner">
                                        Negócio Fujiyama<br>
                                        <small>Empresa</small><br>
                                        <i class="fa fa-dollar"></i>R$500,00
                                    </div>
                                </div>

                            </a>
                            <div class="col-sm-1" >

                                a
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    Negócio Fujiyama<br>
                                    <small>Empresa</small><br>
                                    <i class="fa fa-dollar"></i>R$500,00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('template/footer'); ?>
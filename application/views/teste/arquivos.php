<?php $this->load->view('template/menu'); ?>

<form action="salvar" method="POST" enctype="multipart/form-data">
    <input type="text" name="cpf" placeholder="Informe seu CPF"/>
    <br/>
     <input type="file" name="curriculo">
     <br/>
    <input type="submit" value="Salvar"/>
 </form>
<!--<section class="content-header">
    <h1>
        Propostas
        <small>Adicionar propostas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Gerenciar propostas</li>
        <li class="active"> Adicionar propostas</li>
    </ol>
</section>
<section class="content">
    <form action="<?php echo base_url() ?>index.php/proposta/add" method="post">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações do cliente</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CNPJ</label>
                                <input type="text" class="form-control" id="cnpj" name="cnpj" onblur="teste2()" placeholder="Ex.: 11.111.111/0001-01">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome Fantasia</label>
                                <input type="text" class="form-control" id="fantasia" name="fantasia" placeholder="Ex.: Empresa X">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Ex.: Rua Euclides da cunha,198">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Ex.: Santos">
                        </div>
                    </div>  /.box-body 
                </div>  /.box box-info
            </div> /.col md-12) 
             right column 


            <div  class="col-md-3">

            </div>
            <div  class="col-md-6">
                <button class="btn btn-block btn-success">AVANÇAR </button>
            </div>

        </div>
         /.row 


    </form>

</section>-->
<?php $this->load->view('teste/script'); ?>
<?php $this->load->view('template/footer'); ?>

<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <div class="col-xs-12">
        <div class="col-xs-7">
            <h1>GERADOR DE PROPOSTAS WBA </h1>
        </div>
        <div class="col-xs-5 text-right">
            <a title="voltar" href="<?php echo base_url() ?>index.php/proposta/editarProposta/<?php echo $result->idPropostas; ?>" class="btn btn-danger btn-lg">Voltar <i class="fa-fw glyphicon glyphicon-arrow-left"></i> </a>
            <a title="editar" href="<?php echo base_url() ?>index.php/proposta/editarProposta/<?php echo $result->idPropostas; ?>" class="btn btn-primary btn-lg">Editar <i class="fa-fw glyphicon glyphicon-edit"></i> </a>
            <a class="btn btn-warning btn-lg" name="imprimir" href='javascript:window.print()' ><i class="fa-fw glyphicon glyphicon-print"></i>IMPRIMIR</a>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="col-xs-12">
        <div class="col-xs-6 text-left">
            <figure class="figure">
                <img src="<?php echo base_url() ?>assets/imagens/logo.png" title="Logo" width="50%" height="42%" />
            </figure>
        </div>
        <div class="col-xs-6 text-center">
            <p style="font-size: 24px">PROPOSTA COMERCIAL</p>
            <div class="col-xs-6 text-left">
                <strong><?php echo "Nº da proposta: "; ?></strong>
            </div>
            <div class="col-xs-6 text-right">
                <?php echo $result->idPropostas; ?>
            </div>
            <br>
            <div class="col-xs-6 text-left">
                <strong><?php echo "Data da proposta: "; ?></strong>
            </div>
            <div class="col-xs-6 text-right">
                <?php echo "18/08/2020" ?>
            </div>
            <br>
            <div class="col-xs-6 text-left">
                <strong><?php echo "Prazo de validade: "; ?></strong>
            </div>
            <div class="col-xs-6 text-right">
                <?php echo "30/08/2020" ?>
            </div>
        </div>
    </div>

    <br><br>
    <div class="col-xs-12">
        <div class="col-xs-6 text-left">
            <div class="col-xs-12 text-left">
                <strong><p style="font-size: 20px">WBAGESTÃO</p></strong> 
            </div>
            <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="sr-only">40% Complete (success)</span>
            </div>
            <div class="col-xs-12 text-left">
                <strong><p style="font-size: 16px"><?php echo $dadoslogin['nome']; ?></p></strong> 
            </div>
            <div class="col-xs-12 text-left">
                <?php echo "WBAGESTAO TECNOLOGIA E SOFTWARE LTDA"; ?>
            </div>
            <div class="col-xs-12 text-left">
                <?php echo "Rua marquês de São Vicente, 134" ?>
            </div>
            <div class="col-xs-12">
                <?php echo "Campo Grande, Santos - SP" ?>
            </div>
            <div class="col-xs-12">
                <?php echo "gabrielgrimellO@gmail.com" ?>
            </div>
            <div class="col-xs-12">
                <?php echo "13 3257-8080 | " . $dadoslogin['telefone']; ?>
            </div>
        </div> <!-- /.box-body -->
        <div class="col-xs-6 text-left">
            <div class="col-xs-12 text-left">
                <strong><p style="font-size: 20px">WBAGESTÃO</p></strong> 
            </div>
            <hr style="	border: 0; border-top-color: green">
            <div class="col-xs-12 text-left">
                <strong><p style="font-size: 16px"><?php echo $dadoslogin['nome']; ?></p></strong> 
            </div>
            <div class="col-xs-12 text-left">
                <?php echo "WBAGESTAO TECNOLOGIA E SOFTWARE LTDA"; ?>
            </div>
            <div class="col-xs-12 text-left">
                <?php echo "Rua marquês de São Vicente, 134" ?>
            </div>
            <div class="col-xs-12">
                <?php echo "Campo Grande, Santos - SP" ?>
            </div>
            <div class="col-xs-12">
                <?php echo "gabrielgrimellO@gmail.com" ?>
            </div>
            <div class="col-xs-12">
                <?php echo "13 3257-8080 | " . $dadoslogin['telefone']; ?>
            </div>
        </div> <!-- /.box-body -->

    </div> <!--/.col md-12) -->
    <!-- right column -->
    <br/><br/>
    <!-- SELECT que verifica se tem equipamentos na proposta -->


    <div class="col-xs-12">
        <strong>Nossa missão: </strong>
        “Oferecer aos nossos clientes soluções tecnológicas de gestão de negócios integrados aprimorando diariamente a prestação de serviço. ”
        <br>
        <strong>Nossa visão: </strong>
        “Ser o melhor grupo de tecnologia integrada levando ao cliente informações de decisões que permita as empresas prosperarem. ”
        <br><br>

    </div>
    <div class="col-xs-6">
        <strong>
            ________________________________________
            <br>
            Cliente
        </strong>
    </div>
    <div class="col-xs-6">
        <strong>
            _______________________________________
            <br>
            <?php
            echo $dadoslogin['nome'];
            echo " - ";
            echo $dadoslogin['telefone'];
            ?> 
        </strong>
    </div>

    <!-- /.row -->

</section>
<!-- /.content -->
<?php $this->load->view('template/footer'); ?>
